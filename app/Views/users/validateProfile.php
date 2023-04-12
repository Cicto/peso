<?= $this->extend('layouts/noSideBarMain'); ?>
<?= $this->section('content'); ?>

<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"><?= $title ?>
            </h1>
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
    </div>
</div>

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card bg-gradient-primary">
                <?php if($is_validated==0):?>
                    <div class="card-body" style="transition: 0.25s;">
                        <div class="d-flex align-items-start">
                            <button type="button" class="btn opacity-0 p-0 d-none d-md-inline-block"
                                style="pointer-events: none;">
                                <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z"
                                            fill="#12a4f7" />
                                    </svg>
                                </span>
                            </button>
                            <div class="">
                                <h1 class="text-gray-900">Get the most out of Baliwag eServices System when your account is
                                    validated!</h1>
                                <p class="text-gray-700">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio
                                    deserunt sed atque voluptatum dolore? Praesentium dolor officiis facilis libero in
                                    quaerat aliquid numquam! Eum quam iusto dolor cupiditate voluptates quae!</p>
                            </div>
                        </div>
                        <div class="row gy-5">
                            <div class="col-12">
                                <div class="card bg-light-primary shadow-none">
                                    <div class="card-body p-5 row m-0">
                                        <div
                                            class="col-6 col-md-7 card-body rounded-4 border border-primary d-flex flex-column justify-content-center">
                                            <h3 class="text-primary">Answering forms are much more convenient!</h3>
                                            <p class="d-none d-md-block text-gray-800">
                                                A verified profile availing online services can do so at ease with form id
                                                fields being pre-filled for you. Lorem ipsum dolor sit amet consectetur
                                                adipisicing elit. Delectus amet minima perspiciatis impedit, veritatis
                                                incidunt eum quae!
                                            </p>
                                        </div>
                                        <div class="col-6 col-md-5 text-center row">
                                            <div class="col-md-6 offset-md-3">
                                                <img class="theme-light-show img-fluid w-100"
                                                    src="<?=base_url()?>/public/assets/media/illustrations/sigma-1/upgrade.svg"
                                                    alt="Upgrade Profile">
                                                <img class="theme-dark-show img-fluid w-100"
                                                    src="<?=base_url()?>/public/assets/media/illustrations/sigma-1/upgrade-dark.svg"
                                                    alt="Upgrade Profile">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card h-100 bg-light-primary shadow-none">
                                    <div class="card-body p-5">
                                        <h3 class="text-primary">Another reason to get verified</h3>
                                        <p class="d-none d-md-block text-gray-800">Lorem ipsum dolor, sit amet consectetur
                                            adipisicing elit. Aliquam id modi similique possimus labore asperiores suscipit
                                            commodi laboriosam iste.</p>
                                        <div class="text-center">

                                            <img class="theme-light-show img-fluid w-100 w-md-50"
                                                src="<?=base_url()?>/public/assets/media/illustrations/sigma-1/1.png"
                                                alt="Upgrade Profile">
                                            <img class="theme-dark-show img-fluid w-100 w-md-50"
                                                src="<?=base_url()?>/public/assets/media/illustrations/sigma-1/1-dark.png"
                                                alt="Upgrade Profile">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card h-100 bg-light-primary shadow-none">
                                    <div class="card-body p-5">
                                        <h3 class="text-primary">Another reason to get verified</h3>
                                        <p class="d-none d-md-block text-gray-800">Lorem ipsum dolor, sit amet consectetur
                                            adipisicing elit. Aliquam id modi similique possimus labore asperiores suscipit
                                            commodi laboriosam iste.</p>
                                        <div class="text-center">
                                            <img class="theme-light-show img-fluid w-100 w-md-50"
                                                src="<?=base_url()?>/public/assets/media/illustrations/sigma-1/2.png"
                                                alt="Upgrade Profile">
                                            <img class="theme-dark-show img-fluid w-100 w-md-50"
                                                src="<?=base_url()?>/public/assets/media/illustrations/sigma-1/2-dark.png"
                                                alt="Upgrade Profile">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-10">
                            <button type="button" id="proceed-to-form" data-kt-scrolltop="true"
                                class="btn btn-primary my-5 px-10 fs-2 fw-bold w-100 w-md-auto">Get Started </button>
                        </div>
                    </div>
                    <div class="card-body rounded-4 w-100 h-100 position-absolute top-0 left-0"
                        id="validation-form-container" style="display: none; overflow: auto;">
                        <div class="d-flex flex-column h-100">
                            <div class="d-flex">
                                <button type="button" class="btn align-self-stretch p-0 d-none d-md-inline-block"
                                    id="go-back-to-start">
                                    <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z"
                                                fill="#12a4f7" />
                                        </svg>
                                    </span>
                                </button>
                                <div class="">
                                    <h1 class="text-gray-900">Let's get started with your account validation</h1>
                                    <p class="text-gray-700">Upload images as requested in every step. Fill all the required
                                        steps and follow their prescribed photo specifications.
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex flex-column flex-grow-1" style="">
                                <div class="d-flex">
                                    <div class="w-0 w-md-25 px-2 d-none d-md-flex flex-column justify-content-center">
                                        <hr class="m-0 text-primary">
                                    </div>
                                    <div class="alert alert-primary d-flex align-items-center p-5 w-100 w-md-50 mx-auto mb-0 pointer"
                                        data-bs-toggle="modal" data-bs-target="#validIdModal">
                                        <span class="svg-icon svg-icon-2hx svg-icon-primary me-3 d-none d-md-inline">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3"
                                                    d="M22.9558 10.2848L21.3341 8.6398C21.221 8.52901 21.1317 8.39637 21.0715 8.24996C21.0114 8.10354 20.9816 7.94641 20.9841 7.78814V5.4548C20.9826 5.13514 20.9179 4.81893 20.7938 4.52433C20.6697 4.22973 20.4887 3.96255 20.261 3.73814C20.0333 3.51374 19.7636 3.33652 19.4672 3.21668C19.1709 3.09684 18.8538 3.03673 18.5341 3.0398H16.2008C16.0425 3.04229 15.8854 3.01255 15.739 2.95238C15.5925 2.89221 15.4599 2.80287 15.3491 2.6898L13.7158 1.0448C13.2608 0.590273 12.6439 0.334961 12.0008 0.334961C11.3576 0.334961 10.7408 0.590273 10.2858 1.0448L8.64078 2.66647C8.52999 2.77954 8.39735 2.86887 8.25094 2.92904C8.10452 2.98922 7.94739 3.01896 7.78911 3.01647H5.45578C5.13612 3.01799 4.8199 3.08266 4.5253 3.20675C4.23071 3.33085 3.96353 3.51193 3.73912 3.73959C3.51471 3.96724 3.3375 4.237 3.21766 4.53335C3.09781 4.82971 3.0377 5.14682 3.04078 5.46647V7.7998C3.04327 7.95808 3.01353 8.11521 2.95335 8.26163C2.89318 8.40804 2.80385 8.54068 2.69078 8.65147L1.04578 10.2848C0.591249 10.7398 0.335938 11.3567 0.335938 11.9998C0.335938 12.6429 0.591249 13.2598 1.04578 13.7148L2.66745 15.3598C2.78051 15.4706 2.86985 15.6032 2.93002 15.7496C2.99019 15.8961 3.01994 16.0532 3.01745 16.2115V18.5448C3.01897 18.8645 3.08363 19.1807 3.20773 19.4753C3.33182 19.7699 3.5129 20.0371 3.74056 20.2615C3.96822 20.4859 4.23798 20.6631 4.53433 20.7829C4.83068 20.9028 5.14779 20.9629 5.46745 20.9598H7.80078C7.95906 20.9573 8.11619 20.9871 8.2626 21.0472C8.40902 21.1074 8.54166 21.1967 8.65245 21.3098L10.2974 22.9548C10.7525 23.4093 11.3693 23.6646 12.0124 23.6646C12.6556 23.6646 13.2724 23.4093 13.7274 22.9548L15.3608 21.3331C15.4716 21.2201 15.6042 21.1307 15.7506 21.0706C15.897 21.0104 16.0542 20.9806 16.2124 20.9831H18.5458C19.1894 20.9831 19.8066 20.7275 20.2617 20.2724C20.7168 19.8173 20.9724 19.2001 20.9724 18.5565V16.2231C20.97 16.0649 20.9997 15.9077 21.0599 15.7613C21.12 15.6149 21.2094 15.4823 21.3224 15.3715L22.9674 13.7265C23.1935 13.5002 23.3726 13.2314 23.4944 12.9357C23.6162 12.64 23.6784 12.3231 23.6773 12.0032C23.6762 11.6834 23.6119 11.3669 23.4881 11.072C23.3643 10.7771 23.1834 10.5095 22.9558 10.2848Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M12.0039 15.4998C11.7012 15.4998 11.4109 15.38 11.1969 15.1668C10.9829 14.9535 10.8626 14.6643 10.8626 14.3627V13.9382C10.8467 13.2884 10.9994 12.6456 11.306 12.0718C11.6126 11.4981 12.0627 11.013 12.6126 10.6634C12.7969 10.561 12.9505 10.4114 13.0575 10.2302C13.1645 10.049 13.221 9.84266 13.2213 9.63242C13.2213 9.31073 13.0931 9.00223 12.8648 8.77476C12.6365 8.5473 12.3268 8.41951 12.0039 8.41951C11.6811 8.41951 11.3714 8.5473 11.1431 8.77476C10.9148 9.00223 10.7865 9.31073 10.7865 9.63242C10.7865 9.93399 10.6663 10.2232 10.4523 10.4365C10.2382 10.6497 9.94792 10.7695 9.64522 10.7695C9.34253 10.7695 9.05223 10.6497 8.83819 10.4365C8.62415 10.2232 8.50391 9.93399 8.50391 9.63242C8.50763 9.02196 8.67214 8.42317 8.98099 7.89592C9.28984 7.36868 9.7322 6.93145 10.2639 6.62796C10.7955 6.32447 11.3978 6.16535 12.0105 6.16651C12.6233 6.16767 13.225 6.32908 13.7554 6.63458C14.2859 6.94009 14.7266 7.37899 15.0335 7.9074C15.3403 8.43582 15.5025 9.03522 15.5039 9.64569C15.5053 10.2562 15.3458 10.8563 15.0414 11.3861C14.7369 11.9159 14.2983 12.3568 13.7692 12.6647C13.5645 12.8132 13.4003 13.0101 13.2913 13.2378C13.1824 13.4655 13.1322 13.7167 13.1453 13.9685V14.3931C13.1373 14.6894 13.0136 14.9708 12.8004 15.1776C12.5872 15.3843 12.3014 15.4999 12.0039 15.4998Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M12.0026 18.9998C12.6469 18.9998 13.1693 18.4775 13.1693 17.8332C13.1693 17.1888 12.6469 16.6665 12.0026 16.6665C11.3583 16.6665 10.8359 17.1888 10.8359 17.8332C10.8359 18.4775 11.3583 18.9998 12.0026 18.9998Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
        
                                        <div class="d-flex flex-column">
                                            <h4 class="mb-1 text-primary">Having difficulty selecting a valid ID?</h4>
                                            <span>Click here to get a list of valid IDs you an use to get your profile
                                                verified</span>
                                        </div>
                                    </div>
                                    <div class="w-0 w-md-25 px-2 d-none d-md-flex flex-column justify-content-center">
                                        <hr class="m-0 text-primary">
                                    </div>
                                </div>
        
                                <form action="<?=base_url()?>/users/uploadUserIDs" id="validation-form" method="POST" class="my-10 flex-grow-1 d-flex flex-column justify-content-center">
                                    <!--begin::Stepper-->
                                    <div class="stepper stepper-pills stepper-column d-flex flex-column flex-lg-row"
                                        id="kt_stepper_example_vertical">
                                        <!--begin::Aside-->
                                        <div class="d-flex flex-row-auto w-100 w-lg-300px">
                                            <!--begin::Nav-->
                                            <div class="stepper-nav justify-content-between justify-content-lg-center flex-center flex-row flex-lg-column w-100 w-lg-auto">
                                                <!--begin::Step 1-->
                                                <div class="stepper-item me-5 current" data-kt-stepper-element="nav">
                                                    <!--begin::Wrapper-->
                                                    <div class="stepper-wrapper d-flex align-items-center">
                                                        <!--begin::Icon-->
                                                        <div class="stepper-icon w-40px h-40px">
                                                            <i class="stepper-check fas fa-check"></i>
                                                            <span class="stepper-number">1</span>
                                                        </div>
                                                        <!--end::Icon-->
        
                                                        <!--begin::Label-->
                                                        <div class="stepper-label d-none d-md-block">
                                                            <h3 class="stepper-title">
                                                                Step 1
                                                            </h3>
        
                                                            <div class="stepper-desc text-truncate">
                                                                Front of ID
                                                            </div>
                                                        </div>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Wrapper-->
        
                                                    <!--begin::Line-->
                                                    <div class="stepper-line h-40px d-none d-lg-block"></div>
                                                    <!--end::Line-->
                                                </div>
                                                <!--end::Step 1-->
        
                                                <!--begin::Step 2-->
                                                <div class="stepper-item me-5" data-kt-stepper-element="nav">
                                                    <!--begin::Wrapper-->
                                                    <div class="stepper-wrapper d-flex align-items-center">
                                                        <!--begin::Icon-->
                                                        <div class="stepper-icon w-40px h-40px">
                                                            <i class="stepper-check fas fa-check"></i>
                                                            <span class="stepper-number">2</span>
                                                        </div>
                                                        <!--begin::Icon-->
        
                                                        <!--begin::Label-->
                                                        <div class="stepper-label d-none d-md-block">
                                                            <h3 class="stepper-title">
                                                                Step 2
                                                            </h3>
        
                                                            <div class="stepper-desc text-truncate">
                                                                Back of ID
                                                            </div>
                                                        </div>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Wrapper-->
        
                                                    <!--begin::Line-->
                                                    <div class="stepper-line h-40px d-none d-lg-block"></div>
                                                    <!--end::Line-->
                                                </div>
                                                <!--end::Step 2-->
        
                                                <!--begin::Step 3-->
                                                <div class="stepper-item me-5" data-kt-stepper-element="nav">
                                                    <!--begin::Wrapper-->
                                                    <div class="stepper-wrapper d-flex align-items-center">
                                                        <!--begin::Icon-->
                                                        <div class="stepper-icon w-40px h-40px">
                                                            <i class="stepper-check fas fa-check"></i>
                                                            <span class="stepper-number">3</span>
                                                        </div>
                                                        <!--begin::Icon-->
        
                                                        <!--begin::Label-->
                                                        <div class="stepper-label d-none d-md-block">
                                                            <h3 class="stepper-title">
                                                                Step 3
                                                            </h3>
        
                                                            <div class="stepper-desc text-truncate">
                                                                Selfie with ID
                                                            </div>
                                                        </div>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Wrapper-->
        
                                                    <!--begin::Line-->
                                                    <div class="stepper-line h-40px d-none d-lg-block"></div>
                                                    <!--end::Line-->
                                                </div>
                                                <!--end::Step 3-->
                                            </div>
                                            <!--end::Nav-->
                                        </div>
                                        <!-- <hr class="d-block d-md-none"> -->
                                        <!--begin::Content-->
                                        <div class="flex-row-fluid">
                                            <!--begin::Form-->
                                            <form class="form w-lg-500px mx-auto" novalidate="novalidate">
                                                <!--begin::Group-->
                                                <div class="my-5">
                                                    <!--begin::Step 1-->
                                                    <div class="flex-column current" data-kt-stepper-element="content">
                                                        <label for="" class="form-label fs-3 fw-semibold">Front of ID</label>
                                                        <ul>
                                                            <li>Please make sure that the photo of the ID has a clear picture of your face and readable details</li>
                                                            <li>Landscape view would be much preferred</li>
                                                        </ul>
                                                        <div class="w-100 p-3 px-md-10">
                                                            <label for="id-front" class="d-block bg-light border border-gray-300 border-dashed border-3 p-2 p-md-10 text-center pointer validation-preview" style="">
                                                                <div class="" id="id-front-temp-container">
                                                                    <img src="<?=base_url()?>/public/assets/media/svg/misc/ID Front.svg" class="w-75 w-md-50 opacity-50 theme-light-show" id="id-front-svg" style="mix-blend-mode: multiply;" alt="">
                                                                    <img src="<?=base_url()?>/public/assets/media/svg/misc/ID Front.svg" class="w-75 w-md-50 opacity-50 theme-dark-show" style="" alt="">
                                                                </div>
                                                                <img src="" alt="" id="id-front-temp-preview" class="img-fluid rounded validation-id-preview" data-name="id_front" style="display: none;">
                                                            </label>
                                                            <input type="file" name="id_front" id="id-front" class="d-none">
                                                        </div>
                                                    </div>
                                                    <!--begin::Step 1-->
        
                                                    <!--begin::Step 2-->
                                                    <div class="flex-column" data-kt-stepper-element="content">
                                                        <label for="" class="form-label fs-3 fw-semibold">Back of ID</label>
                                                        <ul>
                                                            <li>Please make sure that the photo of the ID readable details</li>
                                                            <li>Landscape view would be much preferred</li>
                                                        </ul>
                                                        <div class="w-100 p-3 px-md-10">
                                                            <label for="id-back" class="d-block bg-light border border-gray-300 border-dashed border-3 p-2 p-md-10 text-center pointer validation-preview" style="">
                                                                <div class="" id="id-back-temp-container">
                                                                    <img src="<?=base_url()?>/public/assets/media/svg/misc/ID Back.svg" class="w-75 w-md-50 opacity-50 theme-light-show" style="mix-blend-mode: multiply;" alt="">
                                                                    <img src="<?=base_url()?>/public/assets/media/svg/misc/ID Back.svg" class="w-75 w-md-50 opacity-50 theme-dark-show" style="" alt="">
                                                                </div>
                                                                <img src="" alt="" id="id-back-temp-preview" class="img-fluid rounded validation-id-preview" data-name="id_back" style="display: none;">
                                                            </label>
                                                            <input type="file" name="id_back" id="id-back" class="d-none">
                                                        </div>
                                                    </div>
                                                    <!--begin::Step 2-->
        
                                                    <!--begin::Step 3-->
                                                    <div class="flex-column" data-kt-stepper-element="content">
                                                        <label for="" class="form-label fs-3 fw-semibold">Selfie with ID</label>
                                                        <ul>
                                                            <li>Please remove all facial accessories that may block facial features</li>
                                                            <li>Make sure that the photo on the ID can be seen</li>
                                                        </ul>
                                                        <div class="w-100 p-3 px-md-10">
                                                            <label for="id-selfie" class="d-block bg-light border border-gray-300 border-dashed border-3 p-2 p-md-10 text-center pointer validation-preview" style="">
                                                                <div class="" id="id-selfie-temp-container">
                                                                    <img src="<?=base_url()?>/public/assets/media/svg/misc/ID Selfie.svg" class="opacity-50 theme-light-show id-selfie" style="mix-blend-mode: multiply;" alt="">
                                                                    <img src="<?=base_url()?>/public/assets/media/svg/misc/ID Selfie.svg" class="opacity-50 theme-dark-show id-selfie" style="" alt="">
                                                                </div>
                                                                <img src="" alt="" id="id-selfie-temp-preview" class="img-fluid rounded validation-id-preview" data-name="id_selfie" style="display: none;">
                                                            </label>
                                                            <input type="file" name="id_selfie" id="id-selfie" class="d-none">
                                                        </div>
                                                    </div>
                                                    <!--begin::Step 3-->
                                                </div>
                                                <!--end::Group-->
        
                                                <!--begin::Actions-->
                                                <div class="d-flex flex-stack">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-2">
                                                        <button type="button" class="btn btn-light btn-active-light-primary"
                                                            data-kt-stepper-action="previous">
                                                            Back
                                                        </button>
                                                    </div>
                                                    <!--end::Wrapper-->
        
                                                    <!--begin::Wrapper-->
                                                    <div>
                                                        <button type="submit" class="btn btn-primary"
                                                            data-kt-stepper-action="submit">
                                                            <span class="indicator-label">
                                                                Submit
                                                            </span>
                                                            <span class="indicator-progress">
                                                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                            </span>
                                                        </button>
        
                                                        <button type="button" class="btn btn-primary" data-kt-stepper-action="next">
                                                            Continue
                                                        </button>
                                                    </div>
                                                    <!--end::Wrapper-->
                                                </div>
                                                <!--end::Actions-->
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                    </div>
                                    <!--end::Stepper-->
                                </form>
                            </div>
                        </div>
                    </div>
                <?php elseif($is_validated==1):?>
                    <div class="card-body" style="
                        background-image: url(<?=base_url()?>/public/assets/media/stock/900x600/42.png);
                        background-repeat: no-repeat; 
                        background-size: cover; 
                        ">
                        <div class="">
                            <h1 class="text-gray-900 text-center">Your BESSY profile is currently being examined for validation</h1>
                            <p class=" text-center">
                                Thanks for doing the extra effort of applying for the profile validation for Baliwag eServices System.
                            </p>
                            <div class="alert alert-info d-flex align-items-center p-5 w-100 w-md-75 mx-auto">
                                <span class="svg-icon svg-icon-2hx svg-icon-info me-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.6 7C12 7 11.6 6.6 11.6 6V3C11.6 2.4 12 2 12.6 2C13.2 2 13.6 2.4 13.6 3V6C13.6 6.6 13.2 7 12.6 7ZM10 7.59998C10.5 7.29998 10.6 6.69995 10.4 6.19995L9 3.80005C8.7 3.30005 8.10001 3.20002 7.60001 3.40002C7.10001 3.70002 7.00001 4.30005 7.20001 4.80005L8.60001 7.19995C8.80001 7.49995 9.1 7.69995 9.5 7.69995C9.7 7.69995 9.9 7.69998 10 7.59998ZM8 9.30005C8.3 8.80005 8.10001 8.20002 7.60001 7.90002L5.5 6.69995C5 6.39995 4.40001 6.59998 4.10001 7.09998C3.80001 7.59998 4 8.2 4.5 8.5L6.60001 9.69995C6.80001 9.79995 6.90001 9.80005 7.10001 9.80005C7.50001 9.80005 7.9 9.70005 8 9.30005ZM7.20001 12C7.20001 11.4 6.80001 11 6.20001 11H4C3.4 11 3 11.4 3 12C3 12.6 3.4 13 4 13H6.20001C6.70001 13 7.20001 12.6 7.20001 12Z" fill="currentColor"/>
                                        <path opacity="0.3" d="M17.4 5.5C17.4 6.1 17 6.5 16.4 6.5C15.8 6.5 15.4 6.1 15.4 5.5C15.4 4.9 15.8 4.5 16.4 4.5C17 4.5 17.4 5 17.4 5.5ZM5.80001 17.1L7.40001 16.1C7.90001 15.8 8.00001 15.2 7.80001 14.7C7.50001 14.2 6.90001 14.1 6.40001 14.3L4.80001 15.3C4.30001 15.6 4.20001 16.2 4.40001 16.7C4.60001 17 4.90001 17.2 5.30001 17.2C5.50001 17.3 5.60001 17.2 5.80001 17.1ZM8.40001 20.2C8.20001 20.2 8.10001 20.2 7.90001 20.1C7.40001 19.8 7.3 19.2 7.5 18.7L8.30001 17.3C8.60001 16.8 9.20002 16.7 9.70002 16.9C10.2 17.2 10.3 17.8 10.1 18.3L9.30001 19.7C9.10001 20 8.70001 20.2 8.40001 20.2ZM12.6 21.2C12 21.2 11.6 20.8 11.6 20.2V18.8C11.6 18.2 12 17.8 12.6 17.8C13.2 17.8 13.6 18.2 13.6 18.8V20.2C13.6 20.7 13.2 21.2 12.6 21.2ZM16.7 19.9C16.4 19.9 16 19.7 15.8 19.4L15.2 18.5C14.9 18 15.1 17.4 15.6 17.1C16.1 16.8 16.7 17 17 17.5L17.6 18.4C17.9 18.9 17.7 19.5 17.2 19.8C17 19.9 16.8 19.9 16.7 19.9ZM19.4 17C19.2 17 19.1 17 18.9 16.9L18.2 16.5C17.7 16.2 17.6 15.6 17.8 15.1C18.1 14.6 18.7 14.5 19.2 14.7L19.9 15.1C20.4 15.4 20.5 16 20.3 16.5C20.1 16.8 19.8 17 19.4 17ZM20.4 13H19.9C19.3 13 18.9 12.6 18.9 12C18.9 11.4 19.3 11 19.9 11H20.4C21 11 21.4 11.4 21.4 12C21.4 12.6 20.9 13 20.4 13ZM18.9 9.30005C18.6 9.30005 18.2 9.10005 18 8.80005C17.7 8.30005 17.9 7.70002 18.4 7.40002L18.6 7.30005C19.1 7.00005 19.7 7.19995 20 7.69995C20.3 8.19995 20.1 8.79998 19.6 9.09998L19.4 9.19995C19.3 9.19995 19.1 9.30005 18.9 9.30005Z" fill="currentColor"/>
                                    </svg>
                                </span>

                                <div class="d-flex flex-column">
                                    <h4 class="mb-1 text-info">Validation Pending</h4>
                                    <span>
                                         Your validation status is currently <b> pending </b>.
                                        Please wait for 1 - 3 working days for an update to your application. 
                                    </span>
                                </div>
                            </div>
                            <div class="w-100 text-center">
                                <img src="<?=base_url()?>/public/assets/media/illustrations/sigma-1/16.png" alt="Validation Pending" class="w-75 w-md-50 theme-light-show">
                                <img src="<?=base_url()?>/public/assets/media/illustrations/sigma-1/16-dark.png" alt="Validation Pending" class="w-75 w-md-50 theme-dark-show">
                            </div>
                        </div>
                    </div>
                <?php elseif($is_validated==2):?>
                    <div class="card-body" style="
                        background-image: url(<?=base_url()?>/public/assets/media/stock/900x600/42.png);
                        background-repeat: no-repeat; 
                        background-size: cover; 
                        ">
                        <div class="">
                            <h1 class="text-gray-900 text-center">Your BESSY profile has been verified</h1>
                            <p class=" text-center">
                                Enjoy the convinience and added perks of a validated account on Baliwag eServices System.
                            </p>
                            <div class="alert alert-primary d-flex align-items-center p-5 w-100 w-md-75 mx-auto">
                                <span class="svg-icon svg-icon-2hx svg-icon-primary me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                        <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="currentColor"/>
                                        <path d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white"/>
                                    </svg>
                                </span>

                                <div class="d-flex flex-column">
                                    <h4 class="mb-1 text-primary">Account Validated</h4>
                                    <span>
                                        After thorough manual examination, your application for validation is successful.
                                        Your profile is now <b> validated </b>.
                                    </span>
                                </div>
                            </div>
                            <div class="w-100 text-center">
                                <img src="<?=base_url()?>/public/assets/media/illustrations/sigma-1/17.png" alt="Validation Pending" class="w-75 w-md-50 theme-light-show">
                                <img src="<?=base_url()?>/public/assets/media/illustrations/sigma-1/17-dark.png" alt="Validation Pending" class="w-75 w-md-50 theme-dark-show">
                            </div>
                        </div>
                    </div>
                <?php elseif($is_validated==3):?>
                    <div class="card-body" style="
                        background-image: url(<?=base_url()?>/public/assets/media/stock/900x600/42.png);
                        background-repeat: no-repeat; 
                        background-size: cover; 
                        ">
                        <div class="">
                            <h1 class="text-gray-900 text-center">Your BESSY profile has failed validation</h1>
                            <p class=" text-center">
                                There seems to be a problem with validating your Baliwag eServices System account.
                            </p>
                            <div class="alert alert-danger d-flex align-items-center p-5 w-100 w-md-75 mx-auto">
                                <span class="svg-icon svg-icon-2hx svg-icon-danger me-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
                                        <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor"/>
                                        <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor"/>
                                    </svg>
                                </span>

                                <div class="d-flex flex-column">
                                    <h4 class="mb-1 text-danger">Validation Failed</h4>
                                    <span>
                                        <?=$userInformation->validation_remarks ? $userInformation->validation_remarks :
                                            "
                                            Upon thorough manual examination of your application for profile validation, it seems that you didn't meet the needed information to be verified.
                                            "
                                        ?>
                                        <span class="d-block text-end">
                                            You can always try again for an account validation. Thank you very much
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="w-100 text-center">
                                <img src="<?=base_url()?>/public/assets/media/illustrations/sigma-1/21.png" alt="Validation Pending" class="w-75 w-md-50 theme-light-show">
                                <img src="<?=base_url()?>/public/assets/media/illustrations/sigma-1/21-dark.png" alt="Validation Pending" class="w-75 w-md-50 theme-dark-show">
                            </div>
                        </div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="validIdModal" tabindex="-1" aria-labelledby="validIdModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="validIdModalLabel">List of Valid IDs</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                The following are valid IDs you can use to verify your account profile.
                <ul class="list-group">
                    <li class="list-group-item">ASD</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary w-100">Close</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
<?= $this->section('javascript'); ?>
<script src="<?= base_url()?>/public/assets/js/users/users.js"></script>
<script>
    $(document).ready(function () {
        
        $("#proceed-to-form").click(function () {
            $("#validation-form-container").fadeIn().prev().css("opacity", "0");
            console.log($(".id-selfie"), $("#id-front-svg"), $("#id-front-svg").height() + "px")
            $(".id-selfie").css("height", $("#id-front-svg").height() + "px")
        })

        $("#go-back-to-start").click(function () {
            $("#validation-form-container").fadeOut().prev().css("opacity", "1");
        })

        // Stepper lement
        var element = document.querySelector("#kt_stepper_example_vertical");

        // Initialize Stepper
        var stepper = new KTStepper(element);

        // Handle next step
        stepper.on("kt.stepper.next", function (stepper) {
            stepper.goNext(); // go next step
        });

        // Handle previous step
        stepper.on("kt.stepper.previous", function (stepper) {
            stepper.goPrevious(); // go previous step
        });

        $("#id-front, #id-back, #id-selfie").change(function(){
            const this_id = $(this).attr("id")
            $(`#${this_id}-temp-container`).hide()
            $(`#${this_id}-temp-preview`).show()
            const [file] = this.files
            if (file) {
                $(`#${this_id}-temp-preview`).attr("src", URL.createObjectURL(file)).show()
            }
        })

        $("#validation-form").submit(function (e) { 
            e.preventDefault();
            let id_data = {};
            let are_ids_ok = true;
            $(".validation-id-preview").each(function (index, element) {
                console.log($(element).attr("src"))
                if(!$(element).attr("src")){
                    are_ids_ok = false;
                    return false;
                }
                id_data[element.dataset.name] = toImageToDataURL(element)
            });

            if(are_ids_ok){
                $.ajax({
                    type: "POST",
                    url: this.getAttribute('action'),
                    data: id_data,
                    success: function (response) {
                        const data = JSON.parse(response)
                        if (!data.error) {
                            Swal.fire({
                                icon: 'success',
                                title: data.success_message,
                                showConfirmButton: false,
                                timer: 3000
                            }).then((result)=>{
                                window.location.href = "<?=base_url()?>/users/profile_validation/success";
                            });
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: data.error_message,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    }
                });
            }else{
                Swal.fire({
                    icon: 'error',
                    title: "Please upload all required images",
                    showConfirmButton: false,
                    timer: 3000
                });
            }
            
        });
    });

    function toImageToDataURL(image_element){
        var canvas = document.createElement("canvas", { class: "expanding-list" });
        console.log(canvas, image_element.naturalWidth, image_element.naturalHeight)
        canvas.width = image_element.naturalWidth;
        canvas.height = image_element.naturalHeight;

        var ctx = canvas.getContext("2d");
        ctx.drawImage(image_element, 0, 0);

        return canvas.toDataURL("image/png");
    }
</script>
<?= $this->endSection(); ?>