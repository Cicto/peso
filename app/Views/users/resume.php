<?= $this->extend('layouts/emptyMain'); ?>
<?= $this->section('content'); ?>

<style>
    .content-page {
        background-image: url(<?=base_url("public/assets/media/auth/bg1.png")?>);
        background-size: cover;
        background-position: center;
        min-height: 100vh;
    }
</style>
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-start">
                        <h3 class="text-blue">- -</h3> &nbsp; <h3 class="theme-light-show text-blue"
                            style="color: #21366b;"> Upload a Resume </h3>
                        <h3 class="text-white theme-dark-show"> Upload a Resume </h3> &nbsp; <h3
                            class="text-blue">- -</h3>
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
                                    <!-- <span>Page: <span id="page_num"></span> / <span id="page_count"></span></span> -->
                                </div>
                                <label for="resume-upload" class="btn btn-sm btn-green" id="prev">Upload a different resume</label>
                            </div>
                            <canvas id="pdfViewer" class="w-100"></canvas>
                        </div>
                    </div>
                    <form id="resume-upload-form">
                        <input type="file" name="resume" id="resume-upload" class="d-none" accept="application/pdf,application/vnd.ms-excel" >
                        <div class="text-center mt-4">
                            <a href="<?=base_url()?>/logout" class="btn btn-secondary">Cancel</a>
                            <button type="submit" id="resume-upload-submit" class="btn btn-blue"><i class="fas fa-check text-white"></i> Done</button>
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

    $(function () {
        canvas = document.getElementById('pdfViewer'),
        ctx = canvas.getContext('2d');
        pdfjsLib.GlobalWorkerOptions.workerSrc = '<?= base_url()?>/public/assets/libs/pdfjs-3.5.141-dist/build/pdf.worker.js';
        
        var pdfData;
        var loadingTask;
        let pdfs;
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
                                }).then((result) => {
                                    location.reload();
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
</script>
<?= $this->endSection(); ?>