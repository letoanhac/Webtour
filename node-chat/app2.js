const express = require('express');
const http = require('http');
const { Server } = require('socket.io');
const fs = require('fs');
const path = require('path');

const app = express();
const server = http.createServer(app);
const io = new Server(server, {
  cors: { origin: "*" }
});

const PORT = 3001;
const MESSAGE_PATH = path.join(__dirname, 'messageprivate.json');

function readJSON(filePath) {
  try {
    if (!fs.existsSync(filePath)) return {};
    const data = fs.readFileSync(filePath);
    return JSON.parse(data);
  } catch {
    return {};
  }
}

function writeJSON(filePath, data) {
  fs.writeFileSync(filePath, JSON.stringify(data, null, 2));
}

// Hàm lấy danh sách user chat với admin
function getUserListForAdmin(adminID) {
  const allChats = readJSON(MESSAGE_PATH);
  const prefix = `admin_${adminID}_user_`;
  const userList = [];

  for (const roomKey in allChats) {
    if (roomKey.startsWith(prefix)) {
      const userID = roomKey.split('_').pop();
      const messages = allChats[roomKey];
      let username = userID; // default nếu không có username trong message
      if (messages.length > 0) {
        // lấy username người dùng của message đầu tiên (không phải admin)
        const firstUserMsg = messages.find(m => !m.username.toLowerCase().includes('admin'));
        username = firstUserMsg ? firstUserMsg.username : messages[0].username;
      }
      userList.push({ userID, username, room: roomKey });
    }
  }

  return userList;
}

io.on('connection', (socket) => {
  console.log('User connected', socket.id);

  socket.on('join private', ({ room, username, userID, adminID }) => {
    if (!room) return;
    socket.join(room);
    console.log(`${username} joined room ${room}`);

    const allMessages = readJSON(MESSAGE_PATH);
    const history = allMessages[room] || [];
    socket.emit('chat history', history);

    // Nếu là admin join, gửi danh sách user chat cho admin đó
    if (adminID) {
      const userList = getUserListForAdmin(adminID);
      socket.emit('user list', userList);
    }
  });

  socket.on('send message', ({ room, username, message }) => {
    if (!room || !message.trim()) return;

    const allMessages = readJSON(MESSAGE_PATH);

    const newMessage = {
      id: Date.now().toString(),
      username,
      message,
      timestamp: new Date().toISOString()
    };

    if (!allMessages[room]) allMessages[room] = [];
    allMessages[room].push(newMessage);

    writeJSON(MESSAGE_PATH, allMessages);
    io.to(room).emit('new message', newMessage);
    const parts = room.split('_');
    if (parts.length === 4) {
      const adminID = parts[1];
      const userList = getUserListForAdmin(adminID);
      io.to(room).emit('user list', userList);
    }
  });
  
  socket.on('disconnect', () => {
    console.log('User disconnected', socket.id);
  });
});

server.listen(PORT, () => {
  console.log(`Socket.IO server running at http://localhost:${PORT}`);
});
