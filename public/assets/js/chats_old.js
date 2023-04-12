let initChat = (access_token, chatRoom, deptId) => {

    let conn = new WebSocket('ws://localhost:8080?access_token='+access_token+'&chat_room='+chatRoom+'&dept_id='+deptId);

    scrollMsgBottom();
    conn.onopen = function(e) {
        console.log("Connection established!");
    };

    conn.onmessage = function(e) {

        let chatData = JSON.parse(e.data);
        
        if('users' in chatData){

            dataTables.draw();
            // updateUsers(chatData.users.result);

        }else if('message' in chatData){

            var data = e.data;
            newMessage(data);

        }

    };

    $('#chat-form').on('submit', function () {

        event.preventDefault();

        let data = [
            $('#message-input').val(),
            $('#chatRoom').val()
        ];

        if(data[0].trim() == '' && $('#chatRoom').val() == ''){
            return false
        }
        else{

            conn.send(data);
            myMessage(data[0]);
            $('#message-input').val('');

        }
    });

    function newMessage(messageData){
        
        let mesData = JSON.parse(messageData);
        // console.log(messageData);
        if(mesData.chat_room == $('#chatRoom').val()){
            $('#messages').append(`<div class="d-flex justify-content-start mb-10" >
                <div class="d-flex flex-column align-items-start">
                    <div class="d-flex align-items-center mb-2">
                        <div class="symbol symbol-35px symbol-circle">
                            <img alt="Pic" src="`+baseUrl+`/baliwag/bessy/public/assets/media/avatars/300-25.jpg">
                        </div>
                        <div class="ms-3">
                            <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">`+mesData.author+`</a>
                            <span class="text-muted fs-7 mb-1">2 mins</span>
                        </div>
                    </div>
                    <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">`+mesData.message+`</div>
                </div>
            </div>`);
        }
        
        scrollMsgBottom();
    }

    function myMessage(messageData){

        $('#messages').append(`<div class="d-flex justify-content-end mb-10" >
                <div class="d-flex flex-column align-items-start">
                    <div class="d-flex align-items-center mb-2">
                        <div class="symbol symbol-35px symbol-circle">
                        </div>
                        <div class="ms-3">
                            <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">You</a>
                            <span class="text-muted fs-7 mb-1"></span>
                        </div>
                    </div>
                    <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">`+messageData+`</div>
                </div>
            </div>`);
        scrollMsgBottom();
    }

    function updateUsers(users){

        // users.forEach(function(i){
        //     console.log(i);
        // });
    }

    let dataTables = $('#data-table-clients').DataTable({
        processing: true,
        serverSide: true,
        orderCellsTop: true,
        ajax: base_url + '/chats/fetchClients/'+deptId,
        'createdRow': function (row, data, rowIndex) {
            // Per-cell function to do whatever needed with cells
            // $(row).attr('data-id', data['id']).addClass("pointer");
            // console.log(row);
    
        },
        columns: [
            {
                data: 'CONCAT(user_info.firstname, user_info.lastname)',
                render: function(data, type, row){
                    
                    let fullname = row.firstname+' '+row.lastname;
                    let roomId = row.room_id;
                    let email = row.email;
    
                    return  `<div class="d-flex flex-stack py-2 ps-2 clientHead" data-room = "`+roomId+`">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45px symbol-circle">
                                        <span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder">M</span>
                                    </div>
                                    <div class="ms-5">
                                        <a href="javascript:void(0)" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">`+fullname+`</a>
                                        <div class="fw-semibold text-muted">`+email+`</div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-end ms-2">
                                </div>
                            </div>
                            <div class="separator separator-dashed d-none"></div>`
                },
            }
        ],
        info : false, 
        ordering : false,
        lengthChange: false,
        initComplete: function (settings, json) {
            var indexColumn = 0;
    
            this.api().columns().every(function () {
                var column = this;
                var input = document.createElement("input");
    
                $(input).attr('placeholder', 'Search by Name or Email')
                    .addClass('form-control  form-control-lg')
                    .appendTo($('.filterhead:eq(' + indexColumn + ')').empty())
                    .on('keyup', function () {
                        column.search($(this).val(), false, false, true).draw();
                    });
    
                indexColumn++;
            });
        }
    });

}

