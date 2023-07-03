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

    .list-group-item-action{
        background: rgba(0,0,0,0.0);
    }
    .list-group-item-action:hover{
        background: rgba(0,0,0,0.15);
    }
    .hover-arrow{
        transition: 0.25s;
        opacity: 0;
        transform: translateX(0px);
    }
    .list-group-item-action:hover .hover-arrow{
        opacity: 1;
        transform: translateX(3px);
    }
</style>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>

<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Dashboard
            </h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="#" class="text-muted text-hover-primary">Admin Dashboard</a>
                </li>
            </ul>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!-- <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">New System</a> -->
        </div>
    </div>
</div>

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid row">
        <div class="col-12 col-md-7">
            <div class="card mb-6">
                <div class="card-body" style="overflow: hidden;">
                    <div class="ff-noir row m-0 mb-5 pe-2 w-100 w-md-75 w-lg-75 position-relative">
                        <div class="bg-green w-25 h-100 position-absolute end-100"></div>
                        <div class="col-11 bg-green text-start">
                            <h1 class="display-7 text-white"> System Statistics as of 2023 </h1>
                        </div>
                        <div class="col-1 position-relative p-0">
                            <div class="position-absolute bg-dark-green top-0 w-100 h-100" style="clip-path: polygon(0% 0%, 100% 100%, 0% 100%);"></div>
                            <div class="position-absolute bg-green top-0 w-100 h-100" style="clip-path: polygon(0% 0%, 100% 0%, 0% 100%);"></div>
                        </div>
                    </div>
                    <div id="job-posts-and-applications" class=""></div>
                </div>
            </div>

            <div class="card mb-6">
                <div class="card-body" style="overflow: hidden;">
                    <div class="ff-noir row m-0 mb-5 pe-2 w-100 w-md-75 w-lg-75 position-relative">
                        <div class="bg-green w-25 h-100 position-absolute end-100"></div>
                        <div class="col-11 bg-green text-start">
                            <h1 class="display-7 text-white"> Applicants Status Chart </h1>
                        </div>
                        <div class="col-1 position-relative p-0">
                            <div class="position-absolute bg-dark-green top-0 w-100 h-100" style="clip-path: polygon(0% 0%, 100% 100%, 0% 100%);"></div>
                            <div class="position-absolute bg-green top-0 w-100 h-100" style="clip-path: polygon(0% 0%, 100% 0%, 0% 100%);"></div>
                        </div>
                    </div>
                    <div id="application-statuses" class="w-100 w-md-75 mx-auto"></div>
                    <div class="text-gray-700 small">
                    The pie chart showcases the distribution of applicant statuses. It provides a visual representation of the current stage of the selection process, offering a quick overview of the applicant pool and their progress in the hiring process.
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-5">

            <div class="card card-flush mb-6 position-relative" style="overflow: hidden;">
                <div class="card-header pt-5">
                    <div class="card-title d-flex align-items-end">
                        <div class="display-5 m-0"><?= $title ?></div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="border-top py-2">
                        <div class="alert alert-success m-0 fw-bold"><i class="fas fa-user-cog text-success"></i> System Administrator</div>
                    </div>
                </div>
                <div class="position-absolute top-100 start-100 translate-middle opacity-10 spinning">
                    <i class="fas fa-cloud-sun fs-10tx" style="transform: rotate(-45deg);"></i>
                </div>
            </div>

            <div class="card card-flush mb-6 bg-success position-relative" style="overflow: hidden;">
                <div class="card-header pt-5">
                    <div class="card-title d-flex align-items-end text-white">
                        <?php 
                            $total_pending_applicants = 0;
                            if($pending_applicants_job_posts["status"]){
                                foreach ($pending_applicants_job_posts["result"] as $key => $job_post) {
                                    $total_pending_applicants += intval($job_post->total_pending_applicants);
                                }
                            }
                        ?>
                        <div class="display-4 m-0"><?=$total_pending_applicants?></div>
                        <p class="mb-2 mx-2">Pending Applicant(s)</p>
                    </div>
                </div>
                <div class="card-body pt-0 text-white">
                    <div class="border border-white p-2 rounded mb-2">
                        These applicants are waiting for your response of approval on their application
                    </div>
                    <div class="mb-2" id="view-job-posts-with-pending-applications-list" style="display: none;">
                        <div class="list-group" style="--bs-list-group-border-color: white;">
                            <?php 
                            if($pending_applicants_job_posts["status"]):
                                foreach ($pending_applicants_job_posts["result"] as $key => $job_post):
                                $total_pending_applicants += intval($job_post->total_pending_applicants);
                            ?>
                            <a href="<?=base_url()?>/jobs/applicants/<?=$job_post->id?>" class="list-group-item list-group-item-action text-white ff-noir d-flex justify-content-between">
                                <div class=" text-truncate">
                                    <?=$job_post->job_title?>
                                </div>
                                <div class="d-flex">
                                    <span class="text-nowrap mx-3">
                                        <span><?=$job_post->total_pending_applicants?></span>
                                        <i class="fas fa-users text-white"></i>
                                    </span>
                                    <i class="fas fa-chevron-right text-white pt-1 hover-arrow"></i>
                                </div>
                            </a>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </div>
                    </div>
                    <div class="text-center text-white pointer" id="view-job-posts-with-pending-applications" data-job-list-show="1">View Job Posts <i class="fas fa-chevron-down text-white"></i></div>
                </div>

                <div class="position-absolute top-100 start-100 translate-middle opacity-10 spinning">
                    <i class="fas fa-circle-notch fs-10tx text-white" style="transform: rotate(-45deg);"></i>
                </div>
            </div>

            <div class="card card-flush mb-6 bg-primary position-relative" style="overflow: hidden;">
                <div class="card-header pt-5">
                    <div class="card-title d-flex align-items-end text-white">
                        <div class="display-4 m-0"><?=$total_jobs_posted?></div>
                        <p class="mb-2 mx-2">Jobs Posted</p>
                    </div>
                </div>
                <div class="card-body pt-0 text-white pb-5">
                    <div class="border-top border-white p-2 pb-0">
                        <div class="card-title d-flex align-items-end text-white">
                            <div class="display-7 m-0 fw-bold"><?=$available_job_posts?></div>
                            <p class="mb-2 mx-2">Active Job Post(s) are available to apply on.</p>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="#" class="text-white">View Job Posts</a>
                    </div>
                </div>

                <div class="position-absolute top-100 start-100 translate-middle opacity-10 spinning">
                    <i class="fas fa-suitcase fs-10tx text-white" style="transform: rotate(-45deg);"></i>
                </div>
            </div>
            
            <div class="card card-flush mb-6 bg-info position-relative" style="overflow: hidden;">
                <div class="card-header pt-5">
                    <div class="card-title d-flex align-items-end text-white">
                        <div class="display-4 m-0"><?=$total_news_posted?></div>
                        <p class="mb-2 mx-2">News and Updates Posted</p>
                    </div>
                </div>
                <div class="card-body pt-0 text-white pb-5">
                    <div class="border-top border-white pt-2 pb-0">
                        <p class="">Keep Baliwagenyos updated with the latest happenings in their possible career opportunities.</p>
                    </div>
                    <div class="text-center">
                        <a href="#" class="text-white">View News Posts</a>
                    </div>
                </div>

                <div class="position-absolute top-100 start-100 translate-middle opacity-10 spinning">
                    <i class="fas fa-thumbtack fs-10tx text-white" style="transform: rotate(-45deg);"></i>
                </div>
            </div>

            <div class="card card-flush mb-6 bg-yellow position-relative" style="overflow: hidden;">
                <div class="card-header pt-5">
                    <div class="card-title d-flex align-items-end text-white">
                        <div class="h2 fw-bold m-0 text-white">Need Help?</div>
                    </div>
                </div>
                <div class="card-body pt-0 text-white pb-5">
                    <div class="border-top border-white pt-2 pb-0">
                        <p class="">If you have any concerns, questions or queries regardin the system, you can contact the developers at:</p>
                        <ul><li>geslanidarrel@gmail.com</li></ul>
                    </div>
                    <div class="text-center">
                    </div>
                </div>

                <div class="position-absolute top-100 start-100 translate-middle opacity-10 spinning">
                    <i class="fas fa-headset fs-10tx text-white" style="transform: rotate(-45deg);"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
<script>
    $(function () {
        const job_posts_and_applications_options = {
            chart: {
                type: 'area'
            },
            dataLabels: {
                enabled: true,
                formatter: function (val, opts) {
                    return val ? val : "";
                },
            },
            series: [{
                    name: 'Job Applications',
                    data: [
                        <?php
                        if($job_applications_created_by_month){
                            for ($i=1; $i <= 12 ; $i++) { 
                                $total = 0;
                                foreach ($job_applications_created_by_month as $key => $job_posts) {
                                    if(intval($job_posts->created_at)==$i){
                                        $total=$job_posts->job_applications_created;
                                    }
                                }
                                echo $total.", ";
                            }
                        }
                        ?>
                    ]
                },
                {
                    name: 'Job Posts Created',
                    data: [
                        <?php
                        if($job_posts_created_by_month){
                            for ($i=1; $i <= 12 ; $i++) { 
                                $total = 0;
                                foreach ($job_posts_created_by_month as $key => $job_posts) {
                                    if(intval($job_posts->created_at)==$i){
                                        $total=$job_posts->job_posts_created;
                                    }
                                }
                                echo $total.", ";
                            }
                        }
                        ?>
                    ]
                },
                {
                    name: 'Accounts Created',
                    data: [
                        <?php
                        if($account_created_by_month){
                            for ($i=1; $i <= 12 ; $i++) { 
                                $total = 0;
                                foreach ($account_created_by_month as $key => $account) {
                                    if(intval($account->created_at)==$i){
                                        $total = $account->accounts_created;
                                    }
                                }
                                echo $total.", ";
                            }
                        }
                        ?>
                        
                    ]
                },
            ],
            xaxis: {
                categories: ["January", "February", "March", "April", "May", "June", "July", "August",
                    "September", "October", "November", "December",
                ]
            },
            stroke: {
                curve: 'smooth',
            },
            colors:['#00e396', '#009ef7', '#ffc928']
        }
        const job_posts_and_applications_chart = new ApexCharts(document.querySelector(
            "#job-posts-and-applications"), job_posts_and_applications_options);
        job_posts_and_applications_chart.render();
        
        let application_statuses_series = [
            <?php
                $hireds = 0;
                for ($i=0; $i < 3; $i++){
                    if(array_key_exists($i,$pending_applicants)){
                        echo $pending_applicants[$i]["count"] . ", ";
                        $hireds += $pending_applicants[$i]["hireds"];
                    }else{
                        echo 0 . ", ";
                    }
                }
            ?>
        ];
        const series = [
            ...application_statuses_series.slice(0, 2),
            <?=$hireds.", "?>
            ...application_statuses_series.slice(2)
        ]
        console.log(series)
        const application_statuses_options = {
            chart: {
                type: 'donut',
                toolbar: {
                    show: true,
                }
            },
            
            series: series,
            labels: ['Pending', 'Qualified', 'Hired', 'Not Qualified'],
            colors:['#009ef7','#00e396', '#00e396', '#f1416c']

        }
        const application_statuses_chart = new ApexCharts(document.querySelector("#application-statuses"),
            application_statuses_options);
        application_statuses_chart.render();

        $("#view-job-posts-with-pending-applications").click(function(){
            const is_show = Number(this.dataset.jobListShow)?true:false;
            if(is_show){
                $("#view-job-posts-with-pending-applications-list").slideDown();
                $(this).html(`Hide Job Posts <i class="fas fa-chevron-up text-white"></i>`);
            }else{
                $("#view-job-posts-with-pending-applications-list").slideUp();
                $(this).html(`View Job Posts <i class="fas fa-chevron-down text-white"></i>`);
            }
            $(this).attr("data-job-list-show", `${is_show?0:1}`)
        })


    });
</script>
<?= $this->endSection(); ?>