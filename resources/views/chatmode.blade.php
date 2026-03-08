@php
    $adminID = session('adminID');
    $userID = session('userID');
    $peerID = request('peer'); // peerID được truyền qua URL ?peer=xxx

    $isAdmin = $adminID !== null;
    $isUser = $userID !== null;

    $username = session('username') ?? 'Ẩn danh';
    $avatar = session('avatar') ?? '';

    if ($isAdmin && $peerID) {
        $room = "admin_{$adminID}_user_{$peerID}";
    } elseif ($isUser && $peerID) {
        $room = "admin_{$peerID}_user_{$userID}";
    } else {
        $room = null;
    }
@endphp

@if (!$room)
    <p>Vui lòng đăng nhập và truy cập đúng link chat. URL phải có tham số ?peer=xxx</p>
@else
<style>
  body, html {
    height: 100%;
    margin: 0;
    padding: 0;
    background: linear-gradient(to bottom, rgb(18,18,18), rgb(34,34,34));
    color: #eee;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    overflow: hidden;
  }

  #chatbox {
    position: fixed;
    top: 70px;
    left: 0;
    right: 0;
    bottom: 0;
    background: #1f1f2a;
    border-radius: 20px;
    box-shadow: none;
    display: flex;
    flex-direction: column;
    padding: 20px;
    height: calc(100vh - 75px);
    width: 100vw;
    box-sizing: border-box;
    }

  #chatbox h3 {
    text-align: center;
    margin-bottom: 15px;
    color: #00d5d5;
    text-shadow: 0 0 4px #00d5d5;
    flex-shrink: 0;
  }

  .messages {
    list-style: none;
    padding: 10px;
    background: #181820;
    border: 1px solid #00d5d5;
    border-radius: 8px;
    box-shadow: inset 0 0 5px rgba(0, 255, 255, 0.1);
    margin-bottom: 15px;
    overflow-y: auto;
    flex-grow: 1;
    scrollbar-width: thin;
    scrollbar-color: #00d5d5 #181820;
  }

  .messages::-webkit-scrollbar {
    width: 8px;
  }

  .messages::-webkit-scrollbar-track {
    background: #181820;
    border-radius: 8px;
  }

  .messages::-webkit-scrollbar-thumb {
    background: #00d5d5;
    border-radius: 8px;
  }

  .message {
    display: flex;
    align-items: flex-start;
    margin-bottom: 12px;
  }

  .message.me {
    justify-content: flex-end;
  }

  .bubble {
    max-width: 70%;
    padding: 10px 15px;
    border-radius: 12px;
    background: #00bfbf;
    color: #fff;
    font-size: 14px;
    box-shadow: 0 0 5px rgba(0, 255, 255, 0.2);
    word-wrap: break-word;
  }

  .message.me .bubble {
    background: #cc3399;
    box-shadow: 0 0 5px rgba(255, 0, 153, 0.2);
  }

  .bubble strong {
    font-weight: 600;
  }

  .bubble small {
    font-size: 11px;
    opacity: 0.7;
    margin-left: 10px;
  }

  form#form {
    display: flex;
    flex-shrink: 0;
  }

  #input {
    background: #181820;
    border: 1px solid #00d5d5;
    border-radius: 8px 0 0 8px;
    color: #eee;
    font-size: 14px;
    padding: 10px 15px;
    outline: none;
    flex-grow: 1;
  }

  #input::placeholder {
    color: #8888aa;
  }

  #input:focus {
    border-color: #cc3399;
  }

  button#send {
    background: #00bfbf;
    border: none;
    color: white;
    padding: 10px 20px;
    font-weight: 600;
    border-radius: 0 8px 8px 0;
    cursor: pointer;
    box-shadow: 0 0 5px rgba(0, 255, 255, 0.3);
    transition: background 0.3s ease;
  }

  button#send:hover {
    background: #00d5d5;
  }
</style>

@include('clients.blocks.Header')
<div id="chatbox">
    <h3>Chat hỗ trợ với admin</h3>
    <ul class="messages"></ul>
    <form id="form">
        <input id="input" autocomplete="off" placeholder="Nhập tin nhắn..."/>
        <button id="send" type="submit" style="padding:8px 16px;">Gửi</button>
    </form>
</div>

<script src="http://localhost:3001/socket.io/socket.io.js"></script>
<script>
  const socket = io('http://localhost:3001');
  const room = "{{ $room }}";
  const username = "{{ $username }}";

  socket.emit('join private', { room, username });

  const messages = document.querySelector('.messages');
  const input = document.getElementById('input');
  const form = document.getElementById('form');

  socket.on('chat history', (history) => {
    messages.innerHTML = '';
    history.forEach(addMessage);
    messages.scrollTop = messages.scrollHeight;
  });

  socket.on('new message', addMessage);

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    const msg = input.value.trim();
    if (!msg) return;

    socket.emit('send message', { room, username, message: msg });
    input.value = '';
  });

  function addMessage(data) {
    const li = document.createElement('li');
    li.classList.add('message');
    if (data.username === username) li.classList.add('me');

    const bubble = document.createElement('div');
    bubble.classList.add('bubble');
    const time = new Date(data.timestamp).toLocaleTimeString();
    bubble.innerHTML = `<strong>${data.username}</strong> <small>${time}</small><div>${data.message}</div>`;
    li.appendChild(bubble);

    messages.appendChild(li);
    messages.scrollTop = messages.scrollHeight;
  }
</script>
@endif
