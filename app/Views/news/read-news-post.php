<?php 
    if(!$post_info["status"]){
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
    $post_info = $post_info["result"][0];
?>
<?= $this->extend('layouts/noSideBarMain'); ?>
<?= $this->section('css'); ?>
<style>
    @font-face {
        font-family: 'noirpro';
        src: url('<?=base_url()?>/public/assets/fonts/noir-pro-semi-bold-webfont.woff2') format('woff2'),
            url('<?=base_url()?>/public/assets/fonts/noir-pro-semi-bold-webfont.woff') format('woff');
        font-weight: normal;
        font-style: normal;
    }

    .image-style-side{
        width: 50%;
        float: right;
        margin-left: 1em; 
    }
    
    @media only screen and (max-width: 768px) {
        .image-style-side{
            width: 100%;
        }
    }

    blockquote {
        border-left: 5px solid #ccc;
        font-style: italic;
        margin-left: 0;
        margin-right: 0;
        overflow: hidden;
        padding-left: 1.5em;
        padding-right: 1.5em;
    }

    .modal-fullscreen .modal-content{
        height: fit-content;
    }
</style>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="d-flex flex-column flex-column-fluid mt-6 mt-md-10">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="card card-content">
            <div class="card-body px-2 px-md-8 py-5">
                <div class="row m-0">
                    <div class="col-12 col-lg-4 d-flex flex-column justify-content-between">
                        <div class="sticky-lg-top pt-2">
                            <div class="ff-noir row m-0 mb-5 mx-auto px-2 w-100">
                                <div class="col-1 bg-green" style="clip-path: polygon(100% 0%, 100% 100%, 0% 100%);"></div>
                                <div class="col-10 bg-green text-center">
                                    <div class="display-6 text-white mb-1"> NEWS AND UPDATES </div>
                                </div>
                                <div class="col-1 position-relative p-0">
                                    <div class="position-absolute bg-dark-green top-0 w-100 h-100" style="clip-path: polygon(0% 0%, 100% 100%, 0% 100%);"></div>
                                    <div class="position-absolute bg-green top-0 w-100 h-100" style="clip-path: polygon(0% 0%, 100% 0%, 0% 100%);"></div>
                                </div>
                            </div>
                            <h1 class="display-4 text-end ff-noir text-gray-900" style="hyphens: auto"><?=$post_info->post_title?></h1>
                            <div class="text-end text-gray-900"><b> Post Author: </b><?=$post_info->post_author?></div>
                            <div class="text-end text-gray-600"><i class="far fa-clock"></i> <?=$post_info->updated_at == "0000-00-00 00:00:00" ? date('M j Y g:i A', strtotime($post_info->created_at)) : date('M j Y g:i A', strtotime($post_info->updated_at))?></div>
                        </div>
                        <div class="text-end text-gray-400 mt-3"></i># <?=$post_info->id?></div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="d-flex align-items-center">
                            <div class="separator w-100 m-0" style="border-width: 2px;"></div>
                            <span><img alt="Logo" src="<?=base_url()?>/public/assets/media/peso/logo-small.svg" class="h-30px mx-3 theme-light-show"></span>
                            <span><img alt="Logo" src="<?=base_url()?>/public/assets/media/peso/logo-small-dark.svg" class="h-30px mx-3 theme-dark-show"></span>
                            <div class="separator w-100 m-0" style="border-width: 2px;"></div>
                        </div>
                        <div class="d-flex">
                            <div class="border-start border-2 d-none d-lg-block"></div>
                            <div class="ps-0 ps-md-10 fs-5 my-3" id="post-body">
                                <p class="d-none d-lg-block">&nbsp;</p>
                                <p class="border-bottom d-block d-lg-none">&nbsp;</p>
                                <embed src="https://www.youtube.com/watch?v=sRSZ1Fr3kxI" height="200" width="200" type="">
                                <?=stripslashes($post_info->post_body)?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal bg-blur fade" tabindex="-1" id="image-modal">
    <div class="modal-dialog modal-fullscreen d-flex d-sm-block flex-column justify-content-center">
        <div class="modal-content shadow-none position-relative p-1 p-md-10 w-100 bg-transparent" id="image-modal-content">
            <div class="btn btn-icon btn-sm btn-light btn-active-light-primary position-absolute top-0 end-0 m-1 m-md-5" data-bs-dismiss="modal" aria-label="Close">
                <span class="svg-icon svg-icon-2x">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="currentColor"/>
                        <rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="currentColor"/>
                    </svg>
                </span>
            </div>

            <img class="w-100 w-md-75 mx-auto rounded" alt="">
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
<script>
    $(function () {
        $("#post-body img").addClass("img-fluid rounded")
        // $("figure.media").append(<>)
        $(".image").click(function(){
            const image_src = $(this).find("img").attr("src")
            $("#image-modal").modal("show")
            $("#image-modal-content img").attr("src", image_src)
        })
    });
</script>
<?= $this->endSection(); ?>