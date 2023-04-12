<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box page-title-box-alt">
            <h4 class="page-title"></h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active"><?= $title ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class = "card-title"><?= $visaDetails->visa_description?> Checklist</h4>
                <?php 
                    // echo '<pre>';
                    // var_dump($documents);
                    // echo '</pre>';
                ?>
                <?php $count = 0;?>
                <?php foreach($documents as $docs):?>
                    <table class = "table table-row-dashed align-middle gs-0 gy-3 my-0">
                        <thead class = "">
                            <tr>
                                <th colspan = "3"><?= str_replace('â€™', "'", $docs['rt_description']) ?></th>
                                <th>Uploads</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $rtId = $docs['rt_id'];?>
                            <?php foreach($docs['reqList'] as $req):?>
                                <tr>
                                    <td id = "status<?= $applicationId.$rtId.$req['subDocDetails']['reqId'] ?>">
                                        <?php if($req['uploadStatus'] == FALSE):?>
                                            <h2 class = "text-primary"><span class = "ri-close-line"></span></h2>
                                        <?php else:?>
                                            <h2 class = "text-success"><span class = "ri-check-line"></span></h2>
                                        <?php endif;?>
                                    </td>
                                    <td style = "width: 800px">
                                        <p>
                                            <?= $req['subDocDetails']['reqTitle']?>
                                            <a class = "ri-information-fill ms-1" style = "font-size: 16px" data-bs-toggle="tooltip" data-bs-placement="top" title data-bs-original-title="<?= $req['subDocDetails']['reqDesc'] ?>" ></a>
                                        </p>
                                        
                                        <!-- <small class = "text-muted font-11"><?= $req['subDocDetails']['reqDesc'] ?></small> -->
                                    </td>
                                    <td>
                                        <!-- <button class = "btn btn-outline-success btn-xs mt-1"></button> -->
                                        <form enctype = "multipart/form-data" id = "form<?= $count?>" class = "upload-form" data-appid = "<?= $applicationId ?>"  data-rtid = "<?= $rtId ?>" data-reqid = "<?= $req['subDocDetails']['reqId'] ?>">
                                            <div class="fileupload btn btn-success btn-xs waves-effect mt-1" data-bs-toggle="tooltip" data-bs-placement="top" title data-bs-original-title="Click here to upload file." >
                                                <span><i class="ri-add-fill"></i></span>
                                                <input type="file" name = "userDocs" class="upload">
                                            </div>
                                        </form>
                                    </td>
                                    <td class = "fileList<?= $applicationId.$rtId.$req['subDocDetails']['reqId'] ?> ">
                                        <div class="uploads-list">
                                            <?php if($req['uploadStatus'] == FALSE):?>
                                                <p class = "text-custom text<?= $applicationId.$rtId.$req['subDocDetails']['reqId'] ?>">Uploaded files will be listed here.</p>
                                            <?php else:?>
                                                <?php foreach($req['uploadStatus'] as $req):?>
                                                    <div class="btn-group mt-1 ">
                                                        <a type="button" href = "<?= base_url()?>/public/uploads/documents/<?= $userInformation->firstname.'_'.$userInformation->lastname.'_'.$userInformation->user_id.'/'.$req->filename?>" target = "_blank" class="btn btn-outline-success btn-xs" data-bs-toggle="tooltip" data-bs-placement="top" title data-bs-original-title="<?= $req->filename?>" ><span class = "ri-file-list-line"></span></a>
                                                        <a type="button" href = "<?= base_url()?>/public/uploads/documents/<?= $userInformation->firstname.'_'.$userInformation->lastname.'_'.$userInformation->user_id.'/'.$req->filename?>" target = "_blank" class="btn btn-outline-success btn-xs" data-bs-toggle="tooltip" data-bs-placement="top" title data-bs-original-title="Download File" download><span class = "ri-download-cloud-2-line"></span></a>
                                                        <button type="button" data-id = "<?= $req->upload_id?>" class="btn btn-danger btn-xs delete-file-btn"><span class = "ri-delete-bin-line"></span></button>
                                                    </div>
                                                <?php endforeach;?>
                                                
                                            <?php endif;?>
                                        </div>
                                    </td>
                                </tr>
                                <?php $count++;?>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                <?php  endforeach;?>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form enctype = "multipart/form-data" method = "POST" role = "form" id = "additional-form" data-appid = "<?= $applicationId ?>">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-2">
                                <label for="requirement_name" class="form-label">File Name:</label>
                                <input type="text" class="form-control" id="requirement_name" name="requirement_name" required>
                                <small class = "text-muted">What is the filename of the documents that you want to upload?</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-2">
                                <label for="requirement_file" class="form-label">&nbsp</label>
                                <input type="file" class="form-control" id="requirement_file" name="requirement_file" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 float-end">
                        <button class = "btn btn-outline-danger btn-sm" type = "reset">Reset</button>
                        <button class = "btn btn-primary btn-sm" type = "submit">Add File</button>
                    </div>
                </form>
                <table class = "table table-bordered table-sm">
                    <thead class = "table-light">
                        <tr>
                            <th colspan = "2">Additional Document/s</th>
                        </tr>
                    </thead>
                    <tbody id = "additionalDocs-cont">
                        <?php if($additionalDocs != FALSE):?>
                            <?php foreach($additionalDocs as $doc):?>
                                <tr>
                                    <td style = "width: 800px"><?= $doc->filename?></td>
                                    <td>
                                        <a class = "btn btn-primary btn-sm" href="<?= base_url().'/public/uploads/documents/'.$userInformation->firstname.'_'.$userInformation->lastname.'_'.$userInformation->user_id.'/'.$doc->filename?>" target = "_blank"><span class = "ri-eye-line"></span></a>
                                        <a class = "btn btn-primary btn-sm" href="<?= base_url().'/public/uploads/documents/'.$userInformation->firstname.'_'.$userInformation->lastname.'_'.$userInformation->user_id.'/'.$doc->filename?>" target = "_blank" download><span class = "ri-download-cloud-2-line"></span></a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('css'); ?>
<!-- CUSTOM CSS FOR THIS PAGE -->

<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
<!-- CUSTOM JS FOR THIS PAGE -->

<script src="<?= base_url()?>/public/assets/js/requirements/requirements.js"></script>
<?= $this->endSection(); ?>