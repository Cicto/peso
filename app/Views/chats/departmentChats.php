<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<style>
    .dataTables_filter{
        display: none
    }
</style>
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"><?= $title ?></h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="<?= base_url()?>" class="text-muted text-hover-primary">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted"><?= $title ?></li>
            </ul>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!-- <a href="#" class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Rollover</a>
            <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">Add Target</a> -->
            <!-- <button type="button" id = "add-user-btn" class="btn btn-primary btn-sm waves-effect waves-light float-right"><span class = "ri-user-add-line"></span> Add User</button> -->
        </div>
    </div>
</div>

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="row">
                <div class="col-lg-4">
                    <div class="flex-column flex-lg-row-auto">
                        <!--begin::Contacts-->
                        <!-- <div class="card"> -->
                            <!-- <div class="card-header" id="kt_chat_messenger_header">
                                <div class="card-title">
                                    <div class="d-flex justify-content-center flex-column me-3">
                                        <a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">Clients</a>
                                        <div class="mb-0 lh-1">
                                            <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                                            <span class="fs-7 fw-semibold text-muted">Active</span>
                                        </div>
                                    </di>
                                </div>
                            </div> -->
                            <!--begin::Card header-->
                            <!-- <div class="card-header pt-7" id="kt_chat_contacts_header">
                                <form class="w-100 position-relative" autocomplete="off">
                                    <span class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control form-control-solid px-15" name="search" value="" placeholder="Search by username or email...">
                                </form>
                            </div> -->
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <!-- <div class="card-body" id="kt_chat_contacts_body"> -->
                                <!--begin::List-->
                                <table id = "data-table-clients" class = "table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="filterhead">
                                            </tr>
                                        </thead>
                                    </table>
                                <div class="scroll-y me-n5 pe-5 h-200px h-lg-auto" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_toolbar, #kt_app_toolbar, #kt_footer, #kt_app_footer, #kt_chat_contacts_header" data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_contacts_body" data-kt-scroll-offset="5px" style="max-height: 67px;">
                                    
                                </div>
                                <!--end::List-->
                            <!-- </div> -->
                            <!--end::Card body-->
                        <!-- </div> -->
                        <!--end::Contacts-->
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="flex-lg-row-fluid">
                        <div class="card" id="kt_chat_messenger">
                            <div class="card-header" id="kt_chat_messenger_header">
                                <div class="card-title">
                                    <div class="d-flex justify-content-center flex-column me-3">
                                        <a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1" id = "clientName">No active conversation</a>
                                        <div class="mb-0 lh-1">
                                            <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                                            <span class="fs-7 fw-semibold text-muted">Active</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-toolbar">
                                    <div class="me-n3">
                                        <button class="btn btn-sm btn-icon btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="bi bi-three-dots fs-2"></i>
                                        </button>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                                            <!--begin::Heading-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Contacts</div>
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_users_search">Add Contact</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">Invite Contacts
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" aria-label="Specify a contact email to send an invitation" data-kt-initialized="1"></i></a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                                <a href="#" class="menu-link px-3">
                                                    <span class="menu-title">Groups</span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <!--begin::Menu sub-->
                                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip" data-kt-initialized="1">Create Group</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip" data-kt-initialized="1">Invite Members</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip" data-kt-initialized="1">Settings</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu sub-->
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3 my-1">
                                                <a href="#" class="menu-link px-3" data-bs-toggle="tooltip" data-kt-initialized="1">Settings</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu 3-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                            </div>
                            <div class="card-body" id="kt_chat_messenger_body h">
                                <div class="scroll-y me-n5 pe-5 h-400px" id = "messages" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_app_toolbar, #kt_toolbar, #kt_footer, #kt_app_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_messenger_body" data-kt-scroll-offset="5px" style="max-height: 118px;">
                                    
                                </div>
                            </div>
                            <div class="card-footer pt-4" id="kt_chat_messenger_footer">
                                <form action="" id = "chat-form">
                                    <input type="hidden" class = "form-control" id = "chatRoom" value = "0">
                                    <input class="form-control form-control-flush mb-3" rows="1" data-kt-element="input" placeholder="Type a message" id = "message-input" ></textarea>
                                    <div class="d-flex flex-stack">
                                        <div class="d-flex align-items-center me-2">
                                            <!-- <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" aria-label="Coming soon" data-kt-initialized="1">
                                                <i class="bi bi-paperclip fs-3"></i>
                                            </button>
                                            <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" aria-label="Coming soon" data-kt-initialized="1">
                                                <i class="bi bi-upload fs-3"></i>
                                            </button> -->
                                        </div>
                                        <button class="btn btn-primary" type="submit" data-kt-element="send" id = "send">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>

<!-- third party js -->
<script src="<?= base_url()?>/public/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url()?>/public/assets/libs/pdfmake/build/vfs_fonts.js"></script>

<!-- CHAT JS -->
<script src="https://cdn.socket.io/4.6.0/socket.io.min.js" integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous"></script>
<script src="<?= base_url()?>/public/assets/js/chat.js"></script>

<script>
    
    $(document).ready(function(){

        let chatInput = $('#message-input');
        
        receiveChat();

        $(document).on('submit', '#chat-form', function(){
            
            event.preventDefault();
            
            if(chatInput.val() != ""){
                let message = chatInput.val();
                sendChat($('#chatRoom').val(), message);
            }   
            
        });

        $(document).on('click', '.clientHead', function(){

            let roomId = parseInt($(this).attr('data-room'));
            // leaveChat(roomId);
            joinChat(roomId);
            $('#chatRoom').val(roomId);

            $.post(base_url+'/socket/getInfo', {'room_id' : roomId}, function(data, status){

                $('#clientName').text(data.clientInfo.firstname+' '+data.clientInfo.lastname);

                if(!data.conversation){
                    
                }
                else{

                    data.conversation.forEach((i) => {

                        (i.author == 'You') ? 
                            $('#messages').append(`<div class="d-flex justify-content-end mb-10" >
                                <div class="d-flex flex-column align-items-start">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="symbol symbol-35px symbol-circle">
                                        </div>
                                        <div class="ms-3">
                                            <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">`+i.author+`</a>
                                            <span class="text-muted fs-7 mb-1"></span>
                                        </div>
                                    </div>
                                    <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">`+i.message+`</div>
                                </div>
                            </div>`)
                        : 
                            $('#messages').append(`<div class="d-flex justify-content-start mb-10" >
                                <div class="d-flex flex-column align-items-start">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="`+baseUrl+`/baliwag/bessy/public/assets/media/avatars/300-25.jpg">
                                        </div>
                                        <div class="ms-3">
                                            <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">`+i.author+`</a>
                                            <span class="text-muted fs-7 mb-1">2 mins</span>
                                        </div>
                                    </div>
                                    <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">`+i.message+`</div>
                                </div>
                            </div>`)
                        ;

                    });
                    scrollMsgBottom();
                }

            }, 'json');

        });



        // DATATABLES FOR MESSAGES LIST
        let dataTables = $('#data-table-clients').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: base_url + '/socket/fetchClients/'+<?= $departmentInfo[0]->dept_id?>,
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

    });
    
</script>

<!-- CUSTOM JS FOR THIS PAGE -->

<?= $this->endSection(); ?>