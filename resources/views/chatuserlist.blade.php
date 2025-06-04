@php
    $adminID = session('adminID');
    $username = session('username') ?? 'Admin';

    if (!$adminID) {
        echo '<p style="color:white; background:#000; padding:20px;">Vui lòng đăng nhập admin để xem chat</p>';
        return;
    }
@endphp

<style>
  body {
    margin: 30px;;
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(to right, #0f0c29, #302b63, #24243e);
    color: white;
  }

  .chat-container {
    display: flex;
    max-width: 1200px;
    height: 90vh;
    margin: 40px auto;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0,255,255,0.3);
    border: 1px solid rgba(0,255,255,0.4);
    background: rgba(0, 0, 0, 0.4);
    backdrop-filter: blur(10px);
  }

  .user-list {
    width: 280px;
    background: #111122;
    border-right: 1px solid #00fff7;
    overflow-y: auto;
    padding: 20px;
  }

  .user-item {
    padding: 12px 16px;
    margin-bottom: 10px;
    background: #1c1c3c;
    border-radius: 8px;
    transition: 0.2s;
    cursor: pointer;
    border: 1px solid transparent;
  }

  .user-item:hover {
    background: #272752;
    border-color: #00fff7;
  }

  .chat-box {
    flex: 1;
    padding: 20px;
    position: relative;
    display: flex;
    flex-direction: column;
  }

  .messages {
    flex: 1;
    list-style: none;
    padding: 15px;
    background: #0f112b;
    border-radius: 10px;
    overflow-y: auto;
    border: 1px solid rgba(0,255,255,0.3);
    margin-bottom: 12px;
  }

  .message {
    margin-bottom: 10px;
    padding: 8px 12px;
    border-radius: 6px;
    max-width: 70%;
    word-wrap: break-word;
  }

  /* Tin nhắn của admin - căn phải */
  .message.me {
    background: rgba(255, 0, 200, 0.2);
    text-align: right;
    margin-left: auto;
  }

  /* Tin nhắn của user - căn trái */
  .message.other {
    background: rgba(0, 255, 247, 0.1);
    text-align: left;
    margin-right: auto;
  }

  .form-input {
    display: flex;
    border-top: 1px solid rgba(255,255,255,0.2);
  }

  .form-input input {
    flex: 1;
    padding: 12px;
    border: none;
    border-radius: 6px 0 0 6px;
    font-size: 16px;
    outline: none;
    background: #222244;
    color: #fff;
  }

  .form-input button {
    padding: 12px 20px;
    background: #00fff7;
    color: black;
    font-weight: bold;
    border: none;
    border-radius: 0 6px 6px 0;
    cursor: pointer;
    transition: 0.2s;
  }

  .form-input button:hover {
    background: #00caca;
  }
  .back-home-btn {
    display: block;
    width: 100%;
    padding: 12px 0;
    margin-top: 20px;
    background-color: #00fff7;
    border: none;
    border-radius: 8px;
    color: black;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
    }

    .back-home-btn:hover {
    background-color: #00caca;
    }
</style>
<body>
<div class="chat-container">
  <div class="user-list" id="userList">
    <h3>👥 Người dùng đã chat</h3>
    <div style="margin-top: 20px;">Đang tải danh sách...</div>
  </div>

  <div class="chat-box" id="chatBox">
    <h3>📩 Chọn một người dùng để bắt đầu chat</h3>
  </div>
</div>

<script src="http://localhost:3001/socket.io/socket.io.js"></script>
<script>
  const adminID = {{ $adminID }};
  const username = "{{ $username }}";
  let currentRoom = null;

  const socket = io('http://localhost:3001');

  const userListEl = document.getElementById('userList');
  const chatBox = document.getElementById('chatBox');
  socket.on('connect', () => {
    socket.emit('join private', {
      room: `admin_${adminID}_user_list`,
      username,
      adminID
    });
  });

  socket.on('user list', (users) => {
    renderUserList(users);
  });

  function renderUserList(users) {
    if (!users.length) {
      userListEl.innerHTML = '<p>Chưa có người dùng nào nhắn tin.</p>';
      return;
    }

    userListEl.innerHTML = '<h3>👥 Người dùng đã chat</h3>';
    users.forEach(u => {
      const div = document.createElement('div');
      div.classList.add('user-item');
      div.textContent = `${u.username} (ID: ${u.userID})`;
      div.onclick = () => joinRoom(u.room || `admin_${adminID}_user_${u.userID}`, u.username);
      userListEl.appendChild(div);
    });
    const backBtn = document.createElement('button');
    backBtn.textContent = 'Quay về trang quản trị';
    backBtn.classList.add('back-home-btn');
    backBtn.onclick = () => {
        window.location.href = "{{ route('admin.tour.index')}}";
    };
    userListEl.appendChild(backBtn);
  }

  function joinRoom(room, peerUsername) {
    currentRoom = room;
    chatBox.innerHTML = `
      <h3>💬 Chat với <span style="color:#00fff7;">${peerUsername}</span></h3>
      <ul class="messages"></ul>
      <form id="form" class="form-input">
        <input id="input" autocomplete="off" placeholder="Nhập tin nhắn..." />
        <button id="send" type="submit">Gửi</button>
      </form>`;

    const messages = chatBox.querySelector('.messages');
    const input = chatBox.querySelector('#input');
    const form = chatBox.querySelector('#form');

    socket.emit('join private', { room, username, adminID });

    socket.off('chat history');
    socket.on('chat history', (history) => {
      messages.innerHTML = '';
      history.forEach(m => addMessage(m, messages));
      messages.scrollTop = messages.scrollHeight;
    });

    socket.off('new message');
    socket.on('new message', (m) => {
      if (m && currentRoom === room) {
        addMessage(m, messages);
      }
    });

    form.onsubmit = e => {
      e.preventDefault();
      const msg = input.value.trim();
      if (!msg) return;
      socket.emit('send message', { room, username, message: msg });
      input.value = '';
    };
  }

  function addMessage(msg, container) {
    const li = document.createElement('li');
    li.classList.add('message');
    if (msg.username === username) {
      li.classList.add('me');
    } else {
      li.classList.add('other');
    }

    li.textContent = `[${new Date(msg.timestamp).toLocaleTimeString()}] ${msg.username}: ${msg.message}`;
    container.appendChild(li);
    container.scrollTop = container.scrollHeight;
  }
</script>
</body>