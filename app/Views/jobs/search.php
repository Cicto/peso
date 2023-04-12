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
</style>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12 col-md-10 offset-md-1">
        <div class="card align-self-center d-flex p-5 mt-md-10">
            <form action="" id="job-search-form" class="row">
                <div class="col-12 col-md-5 col-lg-5">
                    <div class="input-group mb-md-0 mb-5">
                        <span class="input-group-text border-end-0 bg-white border-focus fw-bold"
                            id="basic-addon1">What</span>
                        <input type="text" class="form-control form-control-lg border-start-0 border-focus"
                            placeholder="Job title, Company, etc..." aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-5">
                    <div class="input-group mb-md-0 mb-5">
                        <span class="input-group-text border-end-0 bg-white border-focus fw-bold"
                            id="basic-addon1">Where</span>
                        <input type="text" class="form-control form-control-lg border-start-0 border-focus"
                            placeholder="City, Province" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-12 col-md-3 col-lg-2">
                    <button type="submit" class="btn btn-blue w-100 fw-semibold text-nowrap"><i
                            class="fas fa-search text-white"></i> Find Jobs</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row my-5 mx-0">
    <div class="col-12 col-lg-10 offset-lg-1 mb-10">
        <div class="row m-0">
            <div class="col-12 col-md-5 rounded">
                <div class="ff-noir row m-0 mb-5">
                    <div class="col-1 bg-green" style="clip-path: polygon(100% 0%, 100% 100%, 0% 100%);"></div>
                    <div class="col-10 bg-green text-center">
                        <h1 class="display-4 text-white"> JOBS LIST </h1>
                    </div>
                    <div class="col-1 position-relative p-0">
                        <div class="position-absolute bg-dark-green top-0 w-100 h-100"
                            style="clip-path: polygon(0% 0%, 100% 100%, 0% 100%);"></div>
                        <div class="position-absolute bg-green top-0 w-100 h-100"
                            style="clip-path: polygon(0% 0%, 100% 0%, 0% 100%);"></div>
                    </div>
                </div>
                <ul class="p-0" id="job-list">
                    <li class="card p-5 shadow-none mb-5 job-list-item pointer active"
                        style="border-bottom: 5px #2966b1 solid !important;">
                        <a class="h2 fw-semibold pointer hover-a-underline" href="#">Sample Job Title</a>
                        <div class="company-name fs-5 text-gray-700 text-truncate"><i class="fas fa-city text-blue"></i>
                            Sample Company Name</div>
                        <div class="company-location fs-5 text-gray-700 text-truncate mt-2"><i
                                class="fas fa-map-marker-alt text-blue"></i> Sample Company Location, Baliwag, Bulacan
                        </div>
                        <div class="job-description text-muted border-top mt-2 pt-2 d-flex">
                            <div class="px-1">●</div>
                            <div class="truncate-2 flex-grow-1 ms-1" style="">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt, aliquam sequi?
                                Soluta eveniet quod, consequuntur distinctio facilis dolores consectetur? Esse dolore
                                nihil voluptas explicabo illo mollitia vero debitis quod similique?
                            </div>
                        </div>
                        <i class="text-muted d-block text-end mt-4 px-2">Posted 1 hour ago</i>
                    </li>
                    <li class="card p-5 shadow-none mb-5 job-list-item pointer"
                        style="border-bottom: 5px #2966b1 solid !important;">
                        <a class="h2 fw-semibold pointer hover-a-underline" href="#">Sample Job Title</a>
                        <div class="company-name fs-5 text-gray-700 text-truncate"><i class="fas fa-city text-blue"></i>
                            Sample Company Name</div>
                        <div class="company-location fs-5 text-gray-700 text-truncate mt-2"><i
                                class="fas fa-map-marker-alt text-blue"></i> Sample Company Location, Baliwag, Bulacan
                        </div>
                        <div class="job-description text-muted border-top mt-2 pt-2 d-flex">
                            <div class="px-1">●</div>
                            <div class="truncate-2 flex-grow-1 ms-1" style="">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt, aliquam sequi?
                                Soluta eveniet quod, consequuntur distinctio facilis dolores consectetur? Esse dolore
                                nihil voluptas explicabo illo mollitia vero debitis quod similique?
                            </div>
                        </div>
                        <i class="text-muted d-block text-end mt-4 px-2">Posted 1 hour ago</i>
                    </li>
                    <li class="card p-5 shadow-none mb-5 job-list-item pointer"
                        style="border-bottom: 5px #2966b1 solid !important;">
                        <a class="h2 fw-semibold pointer hover-a-underline" href="#">Sample Job Title</a>
                        <div class="company-name fs-5 text-gray-700 text-truncate"><i class="fas fa-city text-blue"></i>
                            Sample Company Name</div>
                        <div class="company-location fs-5 text-gray-700 text-truncate mt-2"><i
                                class="fas fa-map-marker-alt text-blue"></i> Sample Company Location, Baliwag, Bulacan
                        </div>
                        <div class="job-description text-muted border-top mt-2 pt-2 d-flex">
                            <div class="px-1">●</div>
                            <div class="truncate-2 flex-grow-1 ms-1" style="">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt, aliquam sequi?
                                Soluta eveniet quod, consequuntur distinctio facilis dolores consectetur? Esse dolore
                                nihil voluptas explicabo illo mollitia vero debitis quod similique?
                            </div>
                        </div>
                        <i class="text-muted d-block text-end mt-4 px-2">Posted 1 hour ago</i>
                    </li>
                    <li class="card p-5 shadow-none mb-5 job-list-item pointer"
                        style="border-bottom: 5px #2966b1 solid !important;">
                        <a class="h2 fw-semibold pointer hover-a-underline" href="#">Sample Job Title</a>
                        <div class="company-name fs-5 text-gray-700 text-truncate"><i class="fas fa-city text-blue"></i>
                            Sample Company Name</div>
                        <div class="company-location fs-5 text-gray-700 text-truncate mt-2"><i
                                class="fas fa-map-marker-alt text-blue"></i> Sample Company Location, Baliwag, Bulacan
                        </div>
                        <div class="job-description text-muted border-top mt-2 pt-2 d-flex">
                            <div class="px-1">●</div>
                            <div class="truncate-2 flex-grow-1 ms-1" style="">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt, aliquam sequi?
                                Soluta eveniet quod, consequuntur distinctio facilis dolores consectetur? Esse dolore
                                nihil voluptas explicabo illo mollitia vero debitis quod similique?
                            </div>
                        </div>
                        <i class="text-muted d-block text-end mt-4 px-2">Posted 1 hour ago</i>
                    </li>
                    <li class="card p-5 shadow-none mb-5 job-list-item pointer"
                        style="border-bottom: 5px #2966b1 solid !important;">
                        <a class="h2 fw-semibold pointer hover-a-underline" href="#">Sample Job Title</a>
                        <div class="company-name fs-5 text-gray-700 text-truncate"><i class="fas fa-city text-blue"></i>
                            Sample Company Name</div>
                        <div class="company-location fs-5 text-gray-700 text-truncate mt-2"><i
                                class="fas fa-map-marker-alt text-blue"></i> Sample Company Location, Baliwag, Bulacan
                        </div>
                        <div class="job-description text-muted border-top mt-2 pt-2 d-flex">
                            <div class="px-1">●</div>
                            <div class="truncate-2 flex-grow-1 ms-1" style="">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt, aliquam sequi?
                                Soluta eveniet quod, consequuntur distinctio facilis dolores consectetur? Esse dolore
                                nihil voluptas explicabo illo mollitia vero debitis quod similique?
                            </div>
                        </div>
                        <i class="text-muted d-block text-end mt-4 px-2">Posted 1 hour ago</i>
                    </li>
                    <li class="card p-5 shadow-none mb-5 job-list-item pointer"
                        style="border-bottom: 5px #2966b1 solid !important;">
                        <a class="h2 fw-semibold pointer hover-a-underline" href="#">Sample Job Title</a>
                        <div class="company-name fs-5 text-gray-700 text-truncate"><i class="fas fa-city text-blue"></i>
                            Sample Company Name</div>
                        <div class="company-location fs-5 text-gray-700 text-truncate mt-2"><i
                                class="fas fa-map-marker-alt text-blue"></i> Sample Company Location, Baliwag, Bulacan
                        </div>
                        <div class="job-description text-muted border-top mt-2 pt-2 d-flex">
                            <div class="px-1">●</div>
                            <div class="truncate-2 flex-grow-1 ms-1" style="">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt, aliquam sequi?
                                Soluta eveniet quod, consequuntur distinctio facilis dolores consectetur? Esse dolore
                                nihil voluptas explicabo illo mollitia vero debitis quod similique?
                            </div>
                        </div>
                        <i class="text-muted d-block text-end mt-4 px-2">Posted 1 hour ago</i>
                    </li>
                    <li class="card p-5 shadow-none mb-5 job-list-item pointer"
                        style="border-bottom: 5px #2966b1 solid !important;">
                        <a class="h2 fw-semibold pointer hover-a-underline" href="#">Sample Job Title</a>
                        <div class="company-name fs-5 text-gray-700 text-truncate"><i class="fas fa-city text-blue"></i>
                            Sample Company Name</div>
                        <div class="company-location fs-5 text-gray-700 text-truncate mt-2"><i
                                class="fas fa-map-marker-alt text-blue"></i> Sample Company Location, Baliwag, Bulacan
                        </div>
                        <div class="job-description text-muted border-top mt-2 pt-2 d-flex">
                            <div class="px-1">●</div>
                            <div class="truncate-2 flex-grow-1 ms-1" style="">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt, aliquam sequi?
                                Soluta eveniet quod, consequuntur distinctio facilis dolores consectetur? Esse dolore
                                nihil voluptas explicabo illo mollitia vero debitis quod similique?
                            </div>
                        </div>
                        <i class="text-muted d-block text-end mt-4 px-2">Posted 1 hour ago</i>
                    </li>
                </ul>
            </div>
            <div class="d-none d-md-block col-12 col-md-7 d-flex flex-column" style="position: relative;">
                <div class="card  shadow-none ff-noir" id="job-overview-container" style="
                    border: 1px var(--my-blue) solid !important;
                    position: sticky;
                    height: 97vh;
                    top: 10px;
                    z-index: 100;
                    overflow-y: auto;

                    background-image: url(<?=base_url()?>/public/assets/media/misc/peso-job-bg.png);
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: bottom;
                    ">
                    <div class="p-7 flex-grow-1">
                        <div class="d-flex mt-5">
                            <h1 class="bg-blue d-inline text-white px-3 py-1 text-uppercase">REFERRAL</h1>
                        </div>
                        <h1 class="display-4 fw-bolder text-green text-uppercase my-7 text-decoration-underline">
                            TECHNICAL STAFF</h1>
                        <h2 class="company-name text-blue text-truncate display-7 text-uppercase fw-normal mb-0">KEBA
                            ENGINEERING</h2>
                        <h3 class="company-location text-blue text-truncate mt-2 display-8 fw-normal text-uppercase">
                            Sample Company Location, Baliwag, Bulacan</h3>

                        <p class=" fs-4 text-blue my-5">
                            All interested applicant may submit the requirements on March 07, 2023 (10 AM) at PESO
                            Baliwag located at Baliwag Star Arena, Pagala, Baliwag, Bulacan.
                        </p>
                        <div class="w-75 border-bottom-dashed my-10" style="border-color: var(--my-blue) ;"></div>

                        <h2 class="company-name text-green text-truncate display-7 text-uppercase fw-normal mb-0">
                            QUALIFICATIONS:</h2>
                        <ul>
                            <li class="fs-4 text-blue">High school diploma or equivalent preferred</li>
                            <li class="fs-4 text-blue">Detail oriented</li>
                            <li class="fs-4 text-blue">Ability to follow directions</li>
                            <li class="fs-4 text-blue">Understand quality requirements </li>
                            <li class="fs-4 text-blue">Piece rate</li>
                        </ul>
                        <h2 class="company-name text-green text-truncate display-7 text-uppercase fw-normal mb-0">
                            REQUIREMENTS:</h2>
                        <ul>
                            <li class="fs-4 text-blue">2 copies of updated resume</li>
                            <li class="fs-4 text-blue">Ballpen</li>
                        </ul>

                        <div class="d-flex my-10">
                            <div class="">
                                <div
                                    class="company-name text-green text-truncate display-7 text-uppercase fw-normal mb-0">
                                    DATE POSTED:</div>
                                <div
                                    class="company-name text-blue text-truncate display-8 text-uppercase fw-normal mb-0">
                                    March 06, 2023</div>
                            </div>
                            <div class="ms-10">
                                <div
                                    class="company-name text-green text-truncate display-7 text-uppercase fw-normal mb-0">
                                    CLOSING DATE:</div>
                                <div
                                    class="company-name text-blue text-truncate display-8 text-uppercase fw-normal mb-0">
                                    March 07, 2023</div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-blue rounded-bottom position-sticky bottom-0">
                        <button type="submit" class="btn btn-blue w-100 fw-semibold text-nowrap display-8 "><i
                                class="fas fa-file-alt text-white fs-3"></i> Apply Now!</button>
                    </div>

                    <!-- PLACEHOLDER============================================================================================================ -->

                    <div class="position-absolute top-0 w-100 h-100 bg-white rounded-3 p-7"
                        id="job-container-placeholder"
                        style="display: none;-webkit-user-select: none; -ms-user-select: none; user-select: none;">
                        <div class="placeholder-glow">

                            <div class="d-flex mt-5">
                                <h1 class="bg-blue d-inline text-blue px-3 py-1 text-uppercase placeholder">REFERRAL
                                </h1>
                            </div>
                            <h1 class="display-4 text-green text-uppercase my-7"><span
                                    class="bg-green placeholder">TECHNICAL</span> <span
                                    class="bg-green placeholder">STAFF</span></h1>
                            <h2 class="company-name text-blue display-7 mb-0"><span
                                    class="bg-blue placeholder">KEBA</span> <span
                                    class="bg-blue placeholder">ENGINEERING</span></h2>
                            <h3
                                class="company-location text-blue text-truncate mt-2 display-8 fw-normal text-uppercase">
                                <span class="bg-blue placeholder">Sample</span> <span
                                    class="bg-blue   placeholder">Company</span> <span
                                    class="bg-blue   placeholder">Location,</span> <span
                                    class="bg-blue   placeholder">Baliwag,</span> <span
                                    class="bg-blue   placeholder">Bulacan</span></h3>

                            <p class="card-text">
                                <span class="placeholder bg-blue col-7"></span>
                                <span class="placeholder bg-blue col-1"></span>
                                <span class="placeholder bg-blue col-4"></span>
                                <span class="placeholder bg-blue col-1"></span>
                                <span class="placeholder bg-blue col-5"></span>
                                <span class="placeholder bg-blue col-6"></span>
                                <span class="placeholder bg-blue col-3"></span>
                                <span class="placeholder bg-blue col-8"></span>
                            </p>

                            <div class="w-75 border-bottom-dashed mt-8 mb-10 placeholder bg-transparent"
                                style="border-color: var(--my-blue) ;"></div>

                            <h2
                                class="company-name text-green text-truncate display-7 text-uppercase fw-normal mb-0 text0-green placeholder">
                                QUALIFICATIONS:</h2>
                            <p class="card-text ms-5">
                                <span class="placeholder bg-blue col-5"></span>
                                <span class="placeholder bg-blue col-2"></span>
                                <span class="placeholder bg-blue col-4"></span>
                                <span class="placeholder bg-blue col-1"></span>
                                <span class="placeholder bg-blue col-3"></span>
                                <span class="placeholder bg-blue col-2"></span>
                                <span class="placeholder bg-blue col-6"></span>
                                <span class="placeholder bg-blue col-3"></span>
                                <span class="placeholder bg-blue col-1"></span>
                                <span class="placeholder bg-blue col-6"></span>
                            </p>
                            <h2
                                class="company-name text-green text-truncate display-7 text-uppercase fw-normal mb-0 bg-green placeholder">
                                REQUIREMENTS:</h2>
                            <p class="card-text ms-5">
                                <span class="placeholder bg-blue col-6"></span>
                                <span class="placeholder bg-blue col-2"></span>
                                <span class="placeholder bg-blue col-4"></span>
                                <span class="placeholder bg-blue col-1"></span>
                                <span class="placeholder bg-blue col-3"></span>
                            </p>

                            <div class="d-flex my-10">
                                <div class="">
                                    <div
                                        class="company-name text-green text-truncate display-7 text-uppercase fw-normal mb-0 bg-green placeholder">
                                        DATE POSTED:</div>
                                    <div
                                        class="company-name text-blue text-truncate display-8 text-uppercase fw-normal mb-0 placeholder bg-blue mt-1">
                                        March 06, 2023</div>
                                </div>
                                <div class="ms-10">
                                    <div
                                        class="company-name text-green text-truncate display-7 text-uppercase fw-normal mb-0 bg-green placeholder">
                                        CLOSING DATE:</div>
                                    <div
                                        class="company-name text-blue text-truncate display-8 text-uppercase fw-normal mb-0 placeholder bg-blue mt-1">
                                        March 07, 2023</div>
                                </div>
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
<script>
    let news_and_updates = [
        `<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FOfficialPESOBaliwag%2Fposts%2Fpfbid0zRarzvW1aQGVHxKjEDZL9arNQYjGYYD16xxowY428EGTBfj26aWUEaLtwGKmeqpLl&show_text=true&width=500" width="500" height="698" style="border:none;overflow:hidden" scrolling="yes" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>`,
        `<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FOfficialPESOBaliwag%2Fposts%2Fpfbid02eGvg8xBZfC2z2A4uQEfVCZWtq8nWZSLNbUXHdNyH1tmkYMZWU6PMBih5DQeBGbzrl&show_text=true&width=500" width="500" height="653" style="border:none;overflow:hidden" scrolling="yes" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>`,
        `<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FOfficialPESOBaliwag%2Fposts%2Fpfbid0WsjPBgySbqPppqDXxAZUqRKVhdm6hYhvkyQKgSaGK21mreToaSiQ6FrDp2QMr6e9l&show_text=true&width=500" width="500" height="722" style="border:none;overflow:hidden" scrolling="yes" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>`,
    ]
    $(function () {
        $("#job-list").on("click", ".job-list-item, .job-list-item a", function (e) {
            e.preventDefault()
            $("#job-list").find(".job-list-item").removeClass("active");
            $(this).addClass("active");
            $("#job-overview-container")[0].scrollTop = 0;

            $("#job-container-placeholder").show().parent().css("overflow-y", "hidden")
            setTimeout(() => {
                $("#job-container-placeholder").hide().parent().css("overflow-y", "auto")
            }, 3000);
        })
    });
</script>
<?= $this->endSection(); ?>