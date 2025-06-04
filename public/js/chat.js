$(function () {
  const socket = io('http://localhost:3000');

  const username = $('#username').val();
  const userID = $('#userID').val();
  const adminID = $('#adminID').val();

  const $messages = $('.messages');
  const $inputMessage = $('.inputMessage');

  socket.emit('add user', { username, userID, adminID });

  $inputMessage.on('keypress', function (e) {
    if (e.which === 13) {
      const message = $inputMessage.val();
      if (message.trim() === '') return;
      socket.emit('new message', { username, userID, adminID, message });
      addMessage(username, message);
      $inputMessage.val('');

      // Save message via AJAX to DB
      $.post('/chat/save', {
        username,
        userID,
        adminID,
        message,
        _token: $('meta[name="csrf-token"]').attr('content')
      });
    }
  });

  socket.on('new message', function (data) {
    addMessage(data.username, data.message);
  });

  function addMessage(user, msg) {
    const $el = $('<li>').text(user + ': ' + msg);
    $messages.append($el);
  }
});
