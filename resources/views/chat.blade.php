<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <title>Tour Chat</title>
  <style>
    html, body {
      height: 100%;
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background:rgb(255, 255, 255);
      color: #fff;
      overflow: hidden;
    }
    #chatbox {
  background: rgb(39, 17, 17);
  display: flex;
  flex-direction: column;
  height: calc(100vh - 72px); /* Trừ chiều cao header, chỉnh 72px theo thực tế của bạn */
  padding: 24px;
  box-sizing: border-box;
}
    h3 {
      text-align: center;
      color: #eee;
      margin-bottom: 12px;
    }
    .messages {
      flex: 1;
      list-style: none;
      padding: 10px;
      overflow-y: auto;
      background: linear-gradient(120deg,rgb(90, 89, 132),rgb(125, 27, 217));
      border-radius: 12px;
      display: flex;
      flex-direction: column;
      scrollbar-width: thin;
      scrollbar-color: #555 #181818;
    }
    .messages::-webkit-scrollbar {
      width: 8px;
    }
    .messages::-webkit-scrollbar-track {
      background: #181818;
    }
    .messages::-webkit-scrollbar-thumb {
      background-color: #555;
      border-radius: 4px;
    }
    .message {
      display: flex;
      align-items: flex-start;
      margin: 10px 0;
      position: relative;
      max-width: 70%;
    }
    .message.me {
      align-self: flex-end;
      flex-direction: row-reverse;
    }
    .avatar {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #444;
      margin-right: 10px;
      user-select: none;
    }
    .message.me .avatar {
      margin-left: 10px;
      margin-right: 0;
    }
    .bubble {
      padding: 10px 14px;
      border-radius: 16px;
      background: linear-gradient(135deg, #2a2a2a, #3b3b3b);
      color: #eee;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
      position: relative;
      word-wrap: break-word;
      white-space: pre-wrap;
    }
    .message.me .bubble {
      background: linear-gradient(135deg, #00c6ff, #0072ff);
      color: #fff;
    }
    .bubble strong {
      font-weight: 600;
      display: block;
      margin-bottom: 4px;
    }
    .bubble small {
      font-size: 10px;
      color: #ccc;
    }
    /* Dấu 3 chấm (⋮) bên trái tin nhắn */
    .delete-btn {
      position: absolute;
      left: -30px;
      top: 50%;
      transform: translateY(-50%);
      background: transparent;
      border: none;
      color: rgba(255,255,255,0.7);
      font-size: 20px;
      cursor: pointer;
      user-select: none;
      padding: 0 4px;
      border-radius: 4px;
      transition: background-color 0.2s;
    }
    .delete-btn:hover {
      background-color: rgba(255, 255, 255, 0.15);
    }
    #form {
      display: flex;
      gap: 12px;
      margin-top: 12px;
    }
    #input {
      flex: 1;
      padding: 12px;
      font-size: 14px;
      border: 1px solid #555;
      border-radius: 8px;
      outline: none;
      background: #222;
      color: #eee;
    }
    #input::placeholder {
      color: #888;
    }
    #send {
      padding: 12px 24px;
      background: #0072ff;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s ease;
    }
    #send:hover {
      background: #005fcc;
    }
    /* Popup overlay & box */
    #deletePopup {
      display: none;
      position: fixed;
      z-index: 9999;
      top: 0; left: 0; right: 0; bottom: 0;
      background-color: rgba(0,0,0,0.7);
      align-items: center;
      justify-content: center;
    }
    #deletePopup .popup-content {
      background: #222;
      padding: 20px 24px;
      border-radius: 12px;
      max-width: 320px;
      width: 90%;
      text-align: center;
      box-shadow: 0 8px 20px rgba(0,0,0,0.8);
    }
    #deletePopup .popup-content p {
      margin-bottom: 20px;
      font-size: 16px;
      color: #eee;
    }
    #deletePopup button {
      cursor: pointer;
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      margin: 0 10px;
      transition: background-color 0.25s ease;
    }
    #deletePopup .confirm {
      background: #d9534f;
      color: white;
    }
    #deletePopup .confirm:hover {
      background: #b52b27;
    }
    #deletePopup .cancel {
      background: #444;
      color: #ccc;
    }
    #deletePopup .cancel:hover {
      background: #666;
      color: white;
    }
  </style>
</head>
<body>
    @include('clients.blocks.Header')
  <div id="chatbox">
    <h3>Chat trong tour ID: <span id="room-name">{{ $tourID }}</span></h3>
    <ul class="messages"></ul>
    <form id="form">
      <input id="input" autocomplete="off" placeholder="Nhập tin nhắn..." />
      <button id="send">Gửi</button>
    </form>
  </div>

  <!-- Popup xác nhận xóa -->
  <div id="deletePopup">
    <div class="popup-content">
      <p>Bạn có chắc muốn xóa tin nhắn này?</p>
      <button class="confirm">Xóa</button>
      <button class="cancel">Hủy</button>
    </div>
  </div>

  <script src="http://localhost:3000/socket.io/socket.io.js"></script>
  <script>
    const room = "tour_{{ $tourID }}";
    const username = "{{ session('username') ?? 'ẩn danh' }}";
    const avatar = "{{ session('avatar') ?? '' }}";
    const socket = io("http://localhost:3000");

    socket.emit('join room', room);
    socket.emit('add user', username);

    const messages = document.querySelector('.messages');
    const input = document.getElementById('input');
    const form = document.getElementById('form');
    const deletePopup = document.getElementById('deletePopup');
    let messageIdToDelete = null;

    socket.on('chat history', (history) => {
      messages.innerHTML = '';
      history.forEach(addMessage);
    });

    socket.on('new message', addMessage);

    socket.on('message deleted', (id) => {
      const el = document.querySelector(`.message[data-id="${id}"]`);
      if (el) el.remove();
    });

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      if (input.value.trim()) {
        socket.emit('new message', input.value.trim());
        input.value = '';
      }
    });

    function addMessage(data) {
      // Tạo li message
      const item = document.createElement('li');
      item.classList.add('message');
      if (data.username === username) item.classList.add('me');
      item.setAttribute('data-id', data.id);

      // Tạo avatar img nếu có session avatar
      let avatarHtml = '';
      if (data.username === username && avatar) {
        avatarHtml = `<img class="avatar" src="{{ asset('admin/assets/img/user-profile/') }}/${avatar}" alt="avatar">`;
      } else {
        // Có thể thêm avatar mặc định hoặc để trống
        avatarHtml = `<img class="avatar" src="https://ui-avatars.com/api/?name=${encodeURIComponent(data.username)}&background=777&color=fff&size=36" alt="avatar">`;
      }

      // Format thời gian
      const time = new Date(data.timestamp).toLocaleTimeString();

      // Nội dung bubble
      const bubble = document.createElement('div');
      bubble.classList.add('bubble');
      bubble.innerHTML = `<strong>${escapeHtml(data.username)}</strong><small>${time}</small><div>${escapeHtml(data.message)}</div>`;

      item.innerHTML = avatarHtml;
      item.appendChild(bubble);

      // Nếu tin nhắn của mình, thêm nút dấu 3 chấm bên trái để xóa
      if (data.username === username) {
        const delBtn = document.createElement('button');
        delBtn.classList.add('delete-btn');
        delBtn.title = 'Xóa tin nhắn';
        delBtn.innerHTML = '⋮';
        delBtn.onclick = (e) => {
          e.stopPropagation();
          messageIdToDelete = data.id;
          showDeletePopup();
        };
        item.appendChild(delBtn);
      }

      messages.appendChild(item);
      messages.scrollTop = messages.scrollHeight;
    }

    function escapeHtml(text) {
      const map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
      };
      return text.replace(/[&<>"']/g, m => map[m]);
    }

    function showDeletePopup() {
      deletePopup.style.display = 'flex';
    }

    function hideDeletePopup() {
      deletePopup.style.display = 'none';
      messageIdToDelete = null;
    }

    // Xử lý popup button
    deletePopup.querySelector('.confirm').addEventListener('click', () => {
      if (messageIdToDelete) {
        socket.emit('delete message', messageIdToDelete);
      }
      hideDeletePopup();
    });

    deletePopup.querySelector('.cancel').addEventListener('click', () => {
      hideDeletePopup();
    });

    // Click ngoài popup để đóng
    deletePopup.addEventListener('click', (e) => {
      if (e.target === deletePopup) {
        hideDeletePopup();
      }
    });

  </script>
</body>
</html>
