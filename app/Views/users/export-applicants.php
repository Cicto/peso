<?php
    function getAge($dateOfBirth){
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        return $diff->format('%y');
    }
?>
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
    .a4{
        /* height: 297mm;
        width: 210mm; */
        height: 279.4mm;
        width: 215.9mm;
        background: white;
        page-break-after: always;
        page-break-inside : avoid;
        margin: 5px auto;
        position: relative;
    }

    .page-number-container{
        background: white;
        border-radius: 50rem !important;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
    <div class="d-flex flex-column align-items-center w-100" id="applicant-papers">
        <?php foreach ($applicants as $key => $applicant):?>
        <div class="page a4" id="applicant-<?=$applicant["id"]?>">
            <div class="row m-0 h-100 py-5 px-3">
                <div class="col-12 col-md-3 border-end position-relative d-none d-md-block">
                    <div class="p-1 border bg-light rounded-3">
                        <img src="<?=base_url()?>/public/assets/media/avatars/<?=$applicant["user_photo"]?>" alt="Applicant Photo" class="img-fluid rounded-3 applicant-photo">
                    </div>
                    <div class="bg-light text-gray-800 border mt-3 rounded p-1">
                        Applied on: <span class="d-block text-end applicant-applied-on"><?=date("F d, Y", strtotime(explode(" ",$applicant["applied_on"])[0]))?> <?=date("h:i A", strtotime(explode(" ",$applicant["applied_on"])[1]))?></span>
                    </div>
    
                    <div class="position-absolute bottom-0 end-0">
                        <div class="" style="width: 1px;">
                            <div style="transform: rotate(-90deg); transform-origin: top;" class="text-nowrap">Applicant #<?=$key+1?> </div>
                        </div>
                        <div class="p-1 bg-dark rounded-circle m-4" style="width: fit-content;"></div>
                        <div class="p-1 bg-dark rounded-circle m-4" style="width: fit-content;"></div>
                    </div>
                </div>
                <div class="col-12 col-md-9 ps-0 ps-md-5 position-relative">

                    <div class="">
                        <h1 class="display-3 lh-1 border-start border-dark border-5">
                            <span ><?=$applicant["firstname"]?></span> <br>
                            <span ><?=$applicant["middlename"]?></span> <br>
                            <span ><?=$applicant["lastname"]?></span>
                        </h1>
                        <p class="m-0">
                            <i class="far fa-envelope text-primary"></i>
                            <a href="#"  class="m-0"><?=$applicant["email"]?></a>
                        </p>
                        <p class="m-0">
                            <i class="fas fa-phone-alt text-dark"></i> +63<span class="m-0"><?=$applicant["contact_number"]?></span>
                        </p>
                    </div>

                    <div class="separator separator-dashed my-5"></div>
                    <div class="row m-0">
                        <div class="col-4 mb-3 px-0">Birthdate</div>
                        <div class="col-1">:</div>
                        <div class="col-7 mb-3"><span ><?=date("F d, Y", strtotime($applicant["birthdate"]))?></span> <small><span id="applicant-age"><?=getAge($applicant["birthdate"])?></span> years old</small></div>
    
                        <div class="col-4 mb-3 px-0">Address</div>
                        <div class="col-1">:</div>
                        <div class="col-7 mb-3"><span> <?=$applicant["house_number"]?> <?=$applicant["street_name"]?>, <?=$applicant["brgyDesc"]?>, <?=ucfirst(strtolower($applicant["citymunDesc"]))?>, <?=ucfirst(strtolower($applicant["provDesc"]))?> </span></div>
    
                        <div class="col-4 mb-3 px-0">Educational Attainment</div>
                        <div class="col-1">:</div>
                        <div class="col-7 mb-3">
                            <?php
                                $educational_attainment = [
                                    [
                                        "name" => "Elementary",
                                        "school_name" => $applicant["elementary_school_name"],
                                        "year_graduated" => $applicant["elementary_year_graduated"],
                                        "is_undergrad" => intval($applicant["elementary_is_undergrad"]),
                                        "last_year_attended" => $applicant["elementary_last_year_attended"],
                                    ],
                                    [
                                        "name" => "Secondary",
                                        "school_name" => $applicant["secondary_school_name"],
                                        "year_graduated" => $applicant["secondary_year_graduated"],
                                        "is_undergrad" => intval($applicant["secondary_is_undergrad"]),
                                        "last_year_attended" => $applicant["secondary_last_year_attended"],
                                    ],
                                    [
                                        "name" => "Tertiary",
                                        "school_name" => $applicant["tertiary_school_name"],
                                        "year_graduated" => $applicant["tertiary_year_graduated"],
                                        "is_undergrad" => intval($applicant["tertiary_is_undergrad"]),
                                        "last_year_attended" => $applicant["tertiary_last_year_attended"],
                                        "course" => $applicant["tertiary_course"],
                                    ],
                                    [
                                        "name" => "Graduate Studies",
                                        "school_name" => $applicant["graduate_studies_school_name"],
                                        "year_graduated" => $applicant["graduate_studies_year_graduated"],
                                        "is_undergrad" => intval($applicant["graduate_studies_is_undergrad"]),
                                        "last_year_attended" => $applicant["graduate_studies_last_year_attended"],
                                        "course" => $applicant["graduate_studies_course"],
                                    ]
                                ]
                            ?>
                            <div id="">
                                <div>
                                    <?php
                                        $counter = 0;
                                        $educational_attainment_element = '';
                                        for ($index = count($educational_attainment)-1; $index >= 0; $index--) :
                                            $education = $educational_attainment[$index];
                                            if($education["school_name"]):
                                                $counter++;
                                                $educational_attainment_pre_element = "";
                                                $educational_attainment_pre_element = "<p>
                                                    {$education['name']} :
                                                    <span class=\"d-block text-center lh-sm\">
                                                        {$education['school_name']}";
                                                if($education["course"]){
                                                    $educational_attainment_pre_element .= " <br> 
                                                    <small>{$education['course']}</small>";
                                                }
                                                if($education["is_undergrad"]){
                                                    $educational_attainment_pre_element .= "<br> <small>
                                                    UnderGraduate S.Y. {$education['last_year_attended']}</small>";
                                                }else{
                                                    $educational_attainment_pre_element .= "<br> <small>
                                                    Graduated S.Y. {$education['year_graduated']}</small>";
                                                }
                                                $educational_attainment_element = $educational_attainment_pre_element . "</span> </p>" . $educational_attainment_element;
                                            endif;
                                            if($counter >= 2){
                                                $index = -1;
                                            }
                                        endfor;
                                    ?>
                                    <?=$educational_attainment_element?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col-4 mb-3 px-0">Current Employment Status</div>
                        <div class="col-1">:</div>
                        <div class="col-7 mb-3">
                        <span id="applicant-current-employment-status">
                            <?=$applicant["employment_status"]?> <br>
                            <small class="ps-1">
                                <b class="text-blue"> - </b> <?=$applicant["employment_type"]?>
                            </small>
                        </span></div>
                    </div>
                    

                    <div class="row m-0" >
                        <div class="col-4 mb-3 px-0">Work Experience(s)</div>
                        <div class="col-1">:</div>
                        <div class="col-7 mb-3">
                            <ul class="text-blue ps-4 m-0" id="">
                                <?php
                                    $work_experiences = json_decode($applicant["work_experience"]);
                                    foreach ($work_experiences as $work_experience):
                                ?>
                                <li class="">
                                    <span class="text-dark work-experience"><?=$work_experience->position?></span>
                                    <br>
                                    <small class="ps-1 text-dark">
                                        <b class="text-blue"> - </b> <?=$work_experience->{"company name"}?> (<?=$work_experience->address?>)
                                    </small>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>

                    <div class="row m-0">
                        <div class="col-4 mb-3 px-0">Preferred Occupation</div>
                        <div class="col-1">:</div>
                        <div class="col-7 mb-3">
                            <ul class="text-blue ps-4">
                                <?php
                                    $preferred_occupations = json_decode($applicant["preferred_occupation"]);
                                    foreach ($preferred_occupations as $preferred_occupation):
                                ?>
                                <li class="">
                                    <span class="text-dark preferred-occupation"><?=$preferred_occupation?></span>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>

                    <?php if($applicant["resume"]):?>
                        <div class="position-absolute text-center bottom-0 start-0 w-100"><i class="text-muted"><i class="fas fa-info-circle"></i> Applicant resumé on next page.</i></div>
                    <?php endif;?>
                    <div class="position-absolute bottom-0 end-0 mx-5 p-1 page-number-container"><i class="text-muted page-number"><?=$key+1?></i></div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
        <div class="d-flex my-5 no-print">
            <button class="btn btn-secondary me-2" id="cancel-printing">Cancel</button>
            <button class="btn btn-blue text-white" id="download-applicant-papers"><i class="fas fa-print text-white"></i> Print Applicant Papers</button>
        </div>
	</div>

<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
<script src="https://code.jquery.com/jquery-2.1.3.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<script src="<?= base_url()?>/public/assets/libs/pdfjs-3.5.141-dist/build/pdf.js"></script>
<script src="<?= base_url()?>/public/assets/libs/pdfjs-3.5.141-dist/build/pdf.worker.js"></script>

<script>
    const resume_list = {
        <?php foreach ($applicants as $key => $applicant):?>
            "<?=$applicant["id"]?>": "<?=$applicant["resume"]?>",
        <?php endforeach;?>
    }

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

    $(document).ready(function(){
        pdfjsLib.GlobalWorkerOptions.workerSrc = '<?= base_url()?>/public/assets/libs/pdfjs-3.5.141-dist/build/pdf.worker.js';

        renderResume(resume_list)
        $("#kt_app_footer").addClass("no-print")

        $("#download-applicant-papers").click(function(){
            // splitHTMLtoMultiPagePDF();
            // console.log($(".resume-canvas")[0].toDataURL())
            // $(".resume-canvas").each((index, canvas) => {
            //     $(canvas).replaceWith(`
            //     <img class="w-100" src="${canvas.toDataURL()}"/>
            //     `);
            // })
            window.print();
        })

        $("#cancel-printing").click(function(){
            window.close();
        })
    });

    function addHTMLToPDFPage() {

        var doc = new jsPDF('p', 'pt', [$("body").width(), $("body").height()]);
        
        converHTMLToCanvas($("#html-template")[0], doc, false, false);
        
        converHTMLToCanvas($("#html-template1")[0], doc, true, false);
        
        converHTMLToCanvas($("#html-template2")[0], doc, true, true);
    }

    function converHTMLToCanvas(element, jspdf, enableAddPage, enableSave) {
        html2canvas(element, { allowTaint: true }).then(function(canvas) {
            if(enableAddPage == true) {
                jspdf.addPage($("body").width(), $("body").height());
            }
            
            image = canvas.toDataURL('image/png', 1.0);
            jspdf.addImage(image, 'PNG', 15, 15, $(element).width(), $(element).height()); // A4 sizes
            
            if(enableSave == true) {
                jspdf.save("add-to-multi-page.pdf");
            }
        });
    }

    function splitHTMLtoMultiPagePDF() {
        var htmlWidth = $(".page").width();
        var htmlHeight = $(".page").height();
        // var pdfWidth = htmlWidth + (15 * 2);
        // var pdfHeight = (pdfWidth * 1.5) + (15 * 2);
        var pdfWidth = htmlWidth;
        var pdfHeight = htmlHeight;
        console.log($("#applicant-papers")[0])
        var doc = new jsPDF('p', 'pt', [pdfWidth, pdfHeight]);

        var pageCount = 2;

        
        html2canvas($(".page")[0], { allowTaint: true }).then(function(canvas) {
            canvas.getContext('2d');

            var image = canvas.toDataURL("image/png", 1.0);
            doc.addImage(image, 'PNG', 15, 15, htmlWidth, htmlHeight);


            for (var i = 1; i <= pageCount; i++) {
                doc.addPage(pdfWidth, pdfHeight);
                doc.addImage(image, 'PNG', 15, -(pdfHeight * i)+15, htmlWidth, htmlHeight);
            }

            doc.save("split-to-multi-page.pdf");
        });
    };

    async function renderResume(resume_list){
        let counter = 0;
        for (const id in resume_list) {
            if (Object.hasOwnProperty.call(resume_list, id)) {
                const resume = resume_list[id];
                const url = '<?=base_url()?>/public/assets/files/resumes/'+resume;
                counter++
                
                console.log(url)
                loadingTask = await pdfjsLib.getDocument(url);
                
                loadingTask.promise.then(function(pdf) {
                    const page_count = pdf.numPages
                    for (let pageNum = 0; pageNum < page_count; pageNum++) {
                        console.log($(`#applicant-${id}`))
                        $(`#applicant-${id}`).after(`
                            <div class="page a4 applicant-resume-${id} d-flex align-items-center p-1">
                                <canvas class="w-100 resume-canvas" id="applicant-resume-canvas-${id}-${pageNum}"></canvas>
                                <div class="position-absolute bottom-0 end-0 mx-8 mb-5 p-1 page-number-container"><i class="text-muted page-number"></i></div>
                            </div>
                        `)

                        pdf.getPage(pageNum+1).then(function(page) {
                            console.log('Page loaded');
                            
                            var scale = 2;
                            var viewport = page.getViewport({scale: scale});
    
                            // Prepare canvas using PDF page dimensions
                            var canvas = document.getElementById(`applicant-resume-canvas-${id}-${pageNum}`);
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
                        })
                        renderPageNumbers()
                    }
                }, function (reason) {
                    // PDF loading error
                    console.error(reason);
                });
            }
        }
        console.log(resume_list)
        
    }

    function renderPageNumbers(){
        $(".a4").find(".page-number").each(function (index, element) {
            $(this).html(`${index+1}`)            
        });
    }
</script>
<?= $this->endSection(); ?>