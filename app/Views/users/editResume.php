<?= $this->extend('layouts/noSideBarMain'); ?>
<?= $this->section('content'); ?>
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"><?=$title?></h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Edit Resume File</a>
                </li>
            </ul>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            
            <!-- <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">New System</a> -->
        </div>
    </div>
</div>

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-start">
                        <h3 class=""> Update Resume </h3>
                    </div>
                    <small class=" mb-5 d-block text-muted text-center">Resume is a vital part of a job application, make sure to upload one</small>
                    <div class="">
                        <label for="resume-upload" id="resume-upload-label" class="w-100 pointer">
                            <div  style="min-height: 75vh;" class="rounded border-gray-300 border-dashed bg-secondary bg-opacity-50 d-flex flex-column justify-content-center align-items-center p-1 text-gray-600">
                                <div class="text-center">
                                    Upload your resume here.
                                    <br>
                                    Resume must only be of <span class="fw-bold"> .pdf </span> type
                                </div>
                            </div>
                        </label>
                        <div class="w-100 bg-white rounded border-gray-300 border-dashed p-1" id="pdfViewer-container" style="display: none;">
                            <div class="d-flex justify-content-between mb-2">
                                <div class="">
                                    <button type="button" class="btn btn-sm btn-blue" id="prev">Previous</button>
                                    <button type="button" class="btn btn-sm btn-blue" id="next">Next</button>
                                    &nbsp; &nbsp;
                                </div>
                                <label for="resume-upload" class="btn btn-sm btn-green" id="prev">Upload a different resume</label>
                            </div>
                            <canvas id="pdfViewer" class="w-100"></canvas>
                        </div>
                    </div>
                    <form id="resume-upload-form">
                        <input type="file" name="resume" id="resume-upload" class="d-none" accept="application/pdf,application/vnd.ms-excel" >
                        <div class="text-center mt-4">
                            <a href="<?=base_url()?>/dashboard/profile" class="btn btn-secondary">Cancel</a>
                            <button type="submit" id="resume-upload-submit" class="btn btn-blue" disabled><i class="fas fa-check text-white"></i> Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
<script src="<?= base_url()?>/public/assets/js/services/form-misc.js"></script>
<script src="<?= base_url()?>/public/assets/libs/pdfjs-3.5.141-dist/build/pdf.js"></script>
<script src="<?= base_url()?>/public/assets/libs/pdfjs-3.5.141-dist/build/pdf.worker.js"></script>
<script>

    var pdfjsLib = window['pdfjs-dist/build/pdf'];
    var pdfDoc = null,
        pageNum = 1,
        pageRendering = false,
        pageNumPending = null,
        scale = 0.8,
        canvas = null,
        ctx = null;
    let resume_file = null
    var pdfData;
    var loadingTask;
    let pdfs;

    $(function () {

        canvas = document.getElementById('pdfViewer'),
        ctx = canvas.getContext('2d');
        pdfjsLib.GlobalWorkerOptions.workerSrc = '<?= base_url()?>/public/assets/libs/pdfjs-3.5.141-dist/build/pdf.worker.js';
        
        <?=$userInformation->resume ? "previewResume()" : ""?>
        
        $("#resume-upload").change(function(e){
            var file = e.target.files[0]
            resume_file = file
            if(file.type == "application/pdf"){
                var fileReader = new FileReader();
                console.log(file)
                if(file.size > 9000000){
                    warningAlert("Error", "File is too big");
                    $(this).val('')
                    return false;
                }
                fileReader.onload = function() {
                    pageNum = 1
                    pdfData = new Uint8Array(this.result);
                    // Using DocumentInitParameters object to load binary data.
                    loadingTask = pdfjsLib.getDocument({data: pdfData});
                    loadingTask.promise.then(function(pdf) {
                        console.log('PDF loaded');
                        // Fetch the first page
                        var pageNumber = 1;
                        pdfs = pdf;
                        pdf.getPage(pageNumber).then(function(page) {
                            console.log('Page loaded');
                            
                            var scale = 2;
                            var viewport = page.getViewport({scale: scale});

                            // Prepare canvas using PDF page dimensions
                            var canvas = $("#pdfViewer")[0];
                            var context = canvas.getContext('2d');
                            canvas.height = viewport.height;
                            canvas.width = viewport.width;

                            // Render PDF page into canvas context
                            var renderContext = {
                            canvasContext: context,
                            viewport: viewport
                            };
                            var renderTask = page.render(renderContext);
                            renderTask.promise.then(function () {
                            console.log('Page rendered');
                            });
                        });
                    }, function (reason) {
                        // PDF loading error
                        console.error(reason);
                    });
                };

                $("#resume-upload-label").hide()
                $("#pdfViewer-container").show()
                $("#resume-upload-submit").removeAttr("disabled")
                fileReader.readAsArrayBuffer(file);
            }else{
                warningAlert("Error", "File is not a PDF");
                $(this).val('')
                return false;
            }
        })

        $("#prev").click(function(){
            if(pageNum > 1){
                pageNum --;
                pdfs.getPage(pageNum).then(function(page) {
                    
                    var scale = 2;
                    var viewport = page.getViewport({scale: scale});
    
                    // Prepare canvas using PDF page dimensions
                    var canvas = $("#pdfViewer")[0];
                    var context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;
    
                    // Render PDF page into canvas context
                    var renderContext = {
                    canvasContext: context,
                    viewport: viewport
                    };
                    var renderTask = page.render(renderContext);
                    renderTask.promise.then(function () {
                    });
                })
            }
        })

        $("#next").click(function(){
            if(pageNum < pdfs.numPages){
                pageNum ++;
                pdfs.getPage(pageNum).then(function(page) {
                    
                    var scale = 2;
                    var viewport = page.getViewport({scale: scale});
    
                    // Prepare canvas using PDF page dimensions
                    var canvas = $("#pdfViewer")[0];
                    var context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;
    
                    // Render PDF page into canvas context
                    var renderContext = {
                    canvasContext: context,
                    viewport: viewport
                    };
                    var renderTask = page.render(renderContext);
                    renderTask.promise.then(function () {
                    });
                })
            }
        })

        $("#resume-upload-form").submit(function (e) { 
            e.preventDefault();
            loading(true)

            if(!resume_file){
                warningAlert();
                return false;
            }

            let data = new FormData()
            data.append( 'fileToUpload', resume_file );

            $.ajax({
                url: "<?=base_url()?>/utilcontroller/uploadUserResume/<?=$userInformation->user_id?>", 
                type: "POST",
                data: data,
                contentType: false,
                processData:false,
                success: function(data)   
                {
                    console.log(data)

                    if(isJsonString(data)){
                        data = JSON.parse(data)
                        if(data.hasOwnProperty('error')){
                            warningAlert("Error", data.error.message);
                            return false;
                        }

                        AJAX({
                            url: "<?=base_url()?>/users/updateUserResume/<?=$userInformation->user_id?>",
                            method: "POST",
                            data: {"resume": data.file_name},
                            success: function(){
                                Swal.fire({
                                    icon: 'success',
                                    title: "Resume successfully uploaded",
                                    showConfirmButton: false,
                                    timer: 3000
                                })
                            }
                        })
                    }else{
                        warningAlert();
                    }
                    loading(false)
                }
            });
        });
    });

    function previewResume(){
        $("#resume-upload-label").hide()
        $("#pdfViewer-container").show()

        // If absolute URL from the remote server is provided, configure the CORS
        // header on that server.
        var url = '<?=base_url()?>/public/assets/files/resumes/<?=$userInformation->resume?>';

        // Asynchronous download of PDF
        loadingTask = pdfjsLib.getDocument(url);
        loadingTask.promise.then(function(pdf) {
            console.log('PDF loaded');
            
            // Fetch the first page
            pageNum = 1
            pdfs = pdf;
            pdf.getPage(pageNum).then(function(page) {
                console.log('Page loaded');
                
                var scale = 2;
                var viewport = page.getViewport({scale: scale});

                // Prepare canvas using PDF page dimensions
                var canvas = document.getElementById('pdfViewer');
                var context = canvas.getContext('2d');
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                // Render PDF page into canvas context
                var renderContext = {
                canvasContext: context,
                viewport: viewport
                };
                var renderTask = page.render(renderContext);
                renderTask.promise.then(function () {
                console.log('Page rendered');
                });
            });
        }, function (reason) {
            // PDF loading error
            console.error(reason);
        });
    }
</script>
<?= $this->endSection(); ?>