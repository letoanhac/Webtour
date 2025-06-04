const express = require('express');
const fs = require('fs');
const path = require('path');
const app = express();
const http = require('http').createServer(app);
const io = require('socket.io')(http, {
  cors: {
    origin: "*"
  }
});

const MESSAGES_FILE = path.join(__dirname, 'messages.json');
app.use(express.static('public'));

let messages = [];
let usersInRooms = {};

try {
  messages = JSON.parse(fs.readFileSync(MESSAGES_FILE, 'utf8'));
} catch {
  messages = [];
}

function getRoomList() {
  const rooms = new Set();
  messages.forEach(m => m.room && rooms.add(m.room));
  return Array.from(rooms);
}

function updateUsersInRoom(room) {
  io.to(room).emit('user list', usersInRooms[room] || []);
}

io.on('connection', (socket) => {
  socket.on('get rooms', () => {
    socket.emit('room list', getRoomList());
  });

  socket.on('join room', (room) => {
    socket.join(room);
    socket.room = room;
    usersInRooms[room] = usersInRooms[room] || [];
    socket.emit('chat history', messages.filter(m => m.room === room));
    io.emit('room list', getRoomList());
  });

  socket.on('add user', (username) => {
    socket.username = username;
    const room = socket.room;
    if (!usersInRooms[room].includes(username)) {
      usersInRooms[room].push(username);
    }
    updateUsersInRoom(room);
  });

  socket.on('new message', (message) => {
    const msgObj = {
      id: Date.now().toString(),
      username: socket.username,
      message: message,
      timestamp: new Date().toISOString(),
      room: socket.room
    };
    messages.push(msgObj);
    fs.writeFileSync(MESSAGES_FILE, JSON.stringify(messages, null, 2));
    io.to(socket.room).emit('new message', msgObj);
  });

  socket.on('delete message', (id) => {
    messages = messages.filter(m => m.id !== id);
    fs.writeFileSync(MESSAGES_FILE, JSON.stringify(messages, null, 2));
    io.to(socket.room).emit('message deleted', id);
  });

  socket.on('leave room', () => {
    const { room, username } = socket;
    if (usersInRooms[room]) {
      usersInRooms[room] = usersInRooms[room].filter(u => u !== username);
      updateUsersInRoom(room);
    }
    socket.leave(room);
  });

  socket.on('disconnect', () => {
    const { room, username } = socket;
    if (room && usersInRooms[room]) {
      usersInRooms[room] = usersInRooms[room].filter(u => u !== username);
      updateUsersInRoom(room);
    }
  });
});

http.listen(3000, () => {
  console.log('✅ Node Chat Server đang chạy tại: http://localhost:3000');
});
