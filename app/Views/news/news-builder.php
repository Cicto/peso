<?= $this->extend('layouts/main'); ?>
<?= $this->section('css'); ?>
<style>
    @font-face {
        font-family: 'noirpro';
        src: url('<?=base_url()?>/public/assets/fonts/noir-pro-semi-bold-webfont.woff2') format('woff2'),
            url('<?=base_url()?>/public/assets/fonts/noir-pro-semi-bold-webfont.woff') format('woff');
        font-weight: normal;
        font-style: normal;
    }

    div.ck-content.ck-focused{
        border-color: var(--bs-info) !important;
    }

    div.ck-content{
        border-color: var(--bs-info) !important;
    }

    .ck.ck-button{
        color: var(--bs-info) !important;
    }

    .ck.ck-button:hover{
        color: var(--bs-info) !important;
    }

    .ck.ck-toolbar{
        border-color: var(--bs-info) !important;
    }

    .ck.ck-editor__editable > .ck-placeholder::before {
        font-weight: 500;
        color: rgba(var(--bs-info-rgb), .5) !important;
    }

    .ck.ck-list__item .ck-button.ck-on{
        background-color: #e6e6e6 !important;
    }

    .ck.ck-sticky-panel .ck-sticky-panel__content_sticky{
        top: var(--kt-app-header-height) !important;
    }
    .ck .ck-sticky-panel__content{
        background: white !important;
    }
    .news-builder-ck{

    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"><?= $title ?></h1>
            <ul class="breadcrumb fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="<?=base_url()?>/news/manage" class="text-muted text-hover-primary">News and Updates</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="text-muted text-hover-primary"><?= $title ?></a>
                </li>
            </ul>
        </div>
        <?php if($is_edit):?>
        <!-- <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="<?=base_url()?>/news/post/<?= $post_info['result'][0]->id?>" class="btn btn-sm fw-bold btn-info"><i class="fas fa-eye"></i> View</a>
        </div> -->
        <?php endif;?>
    </div>
</div>

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="card card-content">
            <div class="card-body py-5 px-3 px-md-9 d-flex flex-column">
                <form id="post-form" action="<?=base_url()?>/news/<?= $is_edit ? "updatePost/" . $post_info['result'][0]->id : "createPost"?>" method="POST" class="h-100 d-flex flex-column justify-content-between flex-grow-1">
                    <div class="">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border-info fw-bold text-dark fs-1" required id="post-title" name="post_title" placeholder="Post Title" value="<?php echo $is_edit ? $post_info['result'][0]->post_title : ""?>"/>
                            <label for="post-title" class="fw-bold text-info"> Post Title </label>
                        </div>
                        <div class="input-group input-group-sm w-100 w-md-50">
                            <span class="input-group-text border-info text-info">Author:</span>
                            <input type="text" class="form-control border-info" required placeholder="Author name" aria-label="Author" aria-describedby="basic-addon1" name="post_author" value="<?php echo $is_edit ? $post_info['result'][0]->post_author : ""?>">
                        </div>
                        <div class="separator my-5"></div>
                        <textarea class="" name="post_body" id="post-body" placeholder="Type the content here!">
                            <?php if($is_edit):?>
                                <?= stripslashes($post_info['result'][0]->post_body)?>
                            <?php endif;?>
                        </textarea>
                        <input hidden type="checkbox" name="status" id="status" checked>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="<?=base_url()?>/news/manage" class="btn btn-secondary my-6 mx-2 d-flex align-items-center">Cancel</a>
                        <div class="d-flex">
                            <button type="submit" class="d-none" id="post-form-submit"></button>
                            <?php if($is_edit):?>
                                <button type="button" id="save-post" class="btn btn-info my-6 mx-2 d-flex align-items-center"><i class="fas fa-save"></i> Save Changes</button>
                            <?php else:?>
                                <button type="button" id="upload-post" class="btn btn-info my-6 mx-2 d-flex align-items-center"><i class="fas fa-file-upload"></i> Upload Post</button>
                                <button type="button" id="draft-post" class="btn btn-info my-6 mx-2 d-flex align-items-center"><i class="fas fa-save"></i> Save Draft</button>
                            <?php endif;?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
<script src="<?=base_url()?>/public/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>
<script>
    let editor;
    $(function () {
        editor = ClassicEditor.create(document.querySelector('#post-body'), {
            mediaEmbed: {
                previewsInData: true
            }
        })
        .then(editor => {
            editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                return new MyUploadAdapter( loader );
            };
        })
        .catch(error => {
            console.error(error);
        });
        
        $("#draft-post").click(function() {
            $("#status")[0].checked = false;
            askConfirmation(function(){
                $("#post-form-submit")[0].click()
            }, "Notice", "The post you've created will not be posted and only be stored in drafts. Are you sure you would like to continue?")
        })

        $("#upload-post").click(function() {
            $("#status")[0].checked = true;
            $("#post-form-submit")[0].click()
        })

        $("#save-post").click(function() {
            $("#post-form-submit")[0].click()
        })

        $("#post-form").submit(async function (e) { 
            e.preventDefault();
            const form_data_array = $(this).serializeArray()
            const form_data = $(this).serialize()
            let form_url = $(this).attr("action")
            let is_ok = true;
            const is_update = <?= $is_edit ? 1 : 0?>;

            form_data_array.forEach(element => {
                if(!element.value){
                    is_ok = false;
                    warningAlert("Error", "Some fields are not filled")
                    return false;
                }
            });

            if(is_ok){
                const result = await AJAX({
                    method: "POST",
                    url: form_url,
                    data: form_data,
                    successAlert: true,
                    success: function(data){
                        setTimeout(() => {
                            window.location.href = "<?=base_url()?>/news/manage";
                        }, 1000);
                    }
                })
            }
        });
    });

    class MyUploadAdapter {
        constructor( loader ) {
            this.loader = loader;
        }

        upload() {
        return this.loader.file
            .then( file => new Promise( ( resolve, reject ) => {
                this._initRequest();
                this._initListeners( resolve, reject, file );
                this._sendRequest( file );
            } ) );
        }

        abort() {
            if ( this.xhr ) {
                this.xhr.abort();
            }
        }

        _initRequest() {
            const xhr = this.xhr = new XMLHttpRequest();
            xhr.open( 'POST', '<?=base_url()?>/utilcontroller/uploadCkImage', true );
        }

        _initListeners( resolve, reject, file ) {
            const xhr = this.xhr;
            const loader = this.loader;
            const genericErrorText = `Couldn't upload file: ${ file.name }.`;

            xhr.addEventListener( 'error', () => reject( genericErrorText ) );
            xhr.addEventListener( 'abort', () => reject() );
            xhr.addEventListener( 'load', () => {
                let response = xhr.response;
                response = JSON.parse(response);

                if ( !response || response.error ) {
                    const error_response = response && response.error ? response.error.message : genericErrorText;
                    warningAlert("Error", error_response);
                    return reject();
                }

                resolve( {
                    default: response.url
                } );
            } );

            if ( xhr.upload ) {
                xhr.upload.addEventListener( 'progress', evt => {
                    if ( evt.lengthComputable ) {
                        loader.uploadTotal = evt.total;
                        loader.uploaded = evt.loaded;
                    }
                } );
            }
        }

        _sendRequest( file ) {
            const data = new FormData();
            data.append( 'fileToUpload', file );
            this.xhr.send( data );
        }
    }

</script>
<?= $this->endSection(); ?>