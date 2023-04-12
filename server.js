const { Socket } = require('engine.io');
const express = require('express');

const app = express();

const server = require('http').createServer(app);

const io = require('socket.io')(server, {
    cors: {
        origin: "*" 
    }
});

io.on('connection', (socket) => {
    console.log('Connected with ID: '+ socket.id);

    socket.on('send-message', (message, room) => {

        console.log(message);
        socket.to(room).emit('receive-message', message);

        // socket.broadcast.emit('receive-message', message);
        // socket.emit('receive-message', message, sender);
        // socket.emit('receive-message', message, sender);
        // io.sockets.emit('receive-message', message, sender);
    });

    socket.on('join-room', room => {
        console.log(socket.id+' joined room: '+ room);
        socket.join(room);
        console.log(socket.rooms);
    });

    socket.on('leave-room', room => {
        console.log('Left room: '+ room);
        socket.leave(room);
    });

    socket.on('disconnect', (socket) => {
        console.log('Disconnect');
    });
});

server.listen(3000, () => {
    console.log('Server is running');
})