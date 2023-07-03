<?= $this->extend('layouts/emptyMain'); ?>

<?= $this->section('css'); ?>
<style>
    @font-face {
        font-family: 'noirpro';
        src: url('<?=base_url()?>/public/assets/fonts/noir-pro-semi-bold-webfont.woff2') format('woff2'),
            url('<?=base_url()?>/public/assets/fonts/noir-pro-semi-bold-webfont.woff') format('woff');
        font-weight: normal;
        font-style: normal;
    }

    .mx-1-5{
        margin-left:0.14rem !important;
        margin-right:0.14rem !important;
    }
    .approved{
        border-left: 3px var(--kt-success) solid;
    }

    .add-shadow{
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 0px 0px
    }

</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="card my-5" style="min-height: 87.5vh;">
            <div class="card-body py-5 pe-2 h-100">
                <div class="row m-0 h-100">
                    <div class="col-12 col-md-6 col-lg-8 d-flex flex-column justify-content-between h-100">
                        <div class="">
                            <div class="ff-noir">
                                <div class="d-flex mt-5">
                                    <h1 class="bg-blue d-inline text-white px-3 py-1 text-uppercase text-truncate">Local Recruitment Activity</h1>
                                </div>
                                <h1 class="display-4 fw-bolder text-green text-uppercase my-3 my-md-7 text-decoration-underline">EIUSMOD COMMODI MAXI</h1>
                                <h2 class="company-name text-blue display-7 text-uppercase fw-normal mb-0">VERO ALIAS CUPIDITAT</h2>
                                <div class="d-flex">
                                    <h3><i class="fas fa-map-marker-alt text-blue mt-2 fs-2 me-3"></i></h3>
                                    <h3 class="company-location text-blue mt-2 display-8 fw-normal text-uppercase text-truncate"> DOYLE WALSH INC, HAGONOY, BULACAN</h3>
                                </div>
                                <div class="w-75 border-bottom-dashed mt-10" style="border-color: var(--my-blue) ;"></div>
                            </div>
                            <div class="alert alert-warning d-flex align-items-center p-5 w-100 w-md-75 mt-5">
                                <span class="svg-icon svg-icon-warning svg-icon-2hx me-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
                                        <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor"/>
                                        <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor"/>
                                    </svg>
                                </span>
                                <div class="d-flex flex-column">
                                    <h4 class="mb-1 text-warning">Notice!</h4>
                                    <span>Do not close this page until all emails are sent. Closing this tab will stop the emailing process.</span>
                                </div>
                            </div>
                        </div>

                        <div class="text-center pt-10 d-none d-md-block" style="position: sticky; bottom: 0;">
                            Sendin email to : <span class="text-primary" id="applicant-email"> geslanidarrel@gmail.com</span>
                            <div class="small">Sent <span class="sent-count">1</span>/10 email(s)</div>

                            <div class="progress w-100 w-md-50 mx-auto">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary text-white" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">75%</div>
                            </div>
                            <div class="alert w-md-50 alert-primary p-2 mx-auto mb-0" style="display: none;"><b>Success!</b> <br>All applicants are successfully notified through email <span></span></div>
                            <div class="alert w-md-50 alert-danger p-2 mx-auto mb-0" style="display: none;"><b>Error:</b> <br> Something went wrong :( <span></span></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-1 col-lg-1 border-end d-none d-md-block" style=""></div>
                    <div class="col-12 col-md-5 col-lg-3 rounded pb-5 d-flex flex-column">
                        <div class="sticky-top bg-white applicants-label">
                            <div class="ff-noir row m-0 my-5 mx-auto px-2 w-100 w-md-75 w-lg-75">
                                <div class="col-1 bg-green" style="clip-path: polygon(100% 0%, 100% 100%, 0% 100%);"></div>
                                <div class="col-10 bg-green text-center">
                                    <h1 class="text-white text-nowrap"> APPLICANTS </h1>
                                </div>
                                <div class="col-1 position-relative p-0">
                                    <div class="position-absolute bg-dark-green top-0 w-100 h-100" style="clip-path: polygon(0% 0%, 100% 100%, 0% 100%);"></div>
                                    <div class="position-absolute bg-green top-0 w-100 h-100" style="clip-path: polygon(0% 0%, 100% 0%, 0% 100%);"></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1" style="overflow: scroll;">
                            <ul class="list-group">
                                
                                <!-- <li class="list-group-item d-flex justify-content-between align-items-center">
                                    A list item
                                    <span class="badge bg-success rounded-pill"><i class="fas fa-check text-white"></i></span>
                                </li> -->
                                <?php foreach($applicants as $key => $applicant):?>
                                <li class="list-group-item d-flex justify-content-between align-items-center approved" id="applicant-">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px">
                                            <img src="<?=base_url()?>/public/assets/media/avatars/<?=$applicant->user_photo?>" alt=""/>
                                        </div>
                                        <div class="ms-2">
                                            <h5 class="m-0"><?=$applicant->firstname?> <?=$applicant->middlename?> <?=$applicant->lastname?></h5>
                                            <small class="text-primary"><?=$applicant->email?></small>
                                        </div>
                                    </div>
                                    <span class="badge bg-primary rounded-pill"><i class="fas fa-circle-notch text-white spinning"></i></span>
                                    <!-- <span class="badge bg-danger rounded-pill"><i class="fas fa-times text-white mx-1-5"></i></span> -->
                                </li>
                                <?php endforeach;?>
                                <!-- <li class="list-group-item d-flex justify-content-between align-items-center">
                                    A third list item
                                    <span class="badge bg-primary rounded-pill"><i class="fas fa-circle-notch text-white spinning"></i></span>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="text-center pt-10 d-block d-md-none">
                        Sendin email to : <span class="text-primary" id="applicant-email"> geslanidarrel@gmail.com</span>
                        <div class="small">Sent <span class="sent-count">1</span>/10 email(s)</div>

                        <div class="progress w-100 w-md-50 mx-auto">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary text-white" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">75%</div>
                        </div>
                        <div class="alert w-md-50 alert-primary p-2 mx-auto mb-0" style="display: none;"><b>Success!</b> <br>All applicants are successfully notified through email <span></span></div>
                        <div class="alert w-md-50 alert-danger p-2 mx-auto mb-0" style="display: none;"><b>Error:</b> <br> Something went wrong :( <span></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
<script>
    $(function () {

        window.addEventListener('scroll',(e)=>{
            const applicants_label = document.querySelector('.applicants-label');
            if(window.pageYOffset>0){
                applicants_label.classList.add("add-shadow");
            }else{
                applicants_label.classList.remove("add-shadow");
            }
        });
    });

    function sendEmails(){
        AJAX({
            method: "POST",
            url: `<?=base_url()?>/jobs/`
        })
    }
</script>
<?= $this->endSection(); ?>
