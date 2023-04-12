let host = 'localhost';
let port = '3000';
let socket = io(host+':'+port);

socket.on('connect', () => {
    console.log('Coonected with ID: '+ socket.id);
});


let sendChat = (roomId, message) => {

    $.post(base_url+'/socket/insertConversation', {'socket_id' : socket.id, 'roomId' : roomId, 'message' : message}, function(data, status){
        
        socket.emit('send-message', message, roomId);
        myMessage($('#message-input').val(), socket.id);
        $('#message-input').val('');
        scrollMsgBottom();
    });
}

let receiveChat = () => {
    socket.on('receive-message', (message, sender) => {
        console.log(message);
        receivedMessage(message, sender);
        scrollMsgBottom();
    });
}   

let joinChat = (room) => {
    socket.emit('join-room', room);
}

let leaveChat = (room) => {
    socket.emit('leave-room', room);
}



let myMessage = (message, sender) => {
    $('#messages').append(`<div class="d-flex justify-content-end mb-10" >
        <div class="d-flex flex-column align-items-start">
            <div class="d-flex align-items-center mb-2">
                <div class="symbol symbol-35px symbol-circle">
                    <img alt="Pic" src="${base_url}/public/assets/media/avatars/300-25.jpg">
                </div>
                <div class="ms-3">
                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">You</a>
                    <span class="text-muted fs-7 mb-1">2 mins</span>
                </div>
            </div>
            <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">${message}</div>
        </div>
    </div>`);
}

let receivedMessage = (message, sender) => {
    
    $('#messages').append(`<div class="d-flex justify-content-start mb-10" >
        <div class="d-flex flex-column align-items-start">
            <div class="d-flex align-items-center mb-2">
                <div class="symbol symbol-35px symbol-circle">
                    <img alt="Pic" src="${base_url}/public/assets/media/avatars/300-25.jpg">
                </div>
                <div class="ms-3">
                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">name here</a>
                    <span class="text-muted fs-7 mb-1">2 mins</span>
                </div>
            </div>
            <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">${message}</div>
        </div>
    </div>`);
    
}


function scrollMsgBottom(){

    var messageCont = $('#messages');
    messageCont.scrollTop(messageCont.prop("scrollHeight"));
    
}
