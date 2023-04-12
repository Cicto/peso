<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box page-title-box-alt">
            <h4 class="page-title"><?= $title ?></h4>
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
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="text-center">

                            <img src="<?= base_url()?>/public/assets/images/animat-rocket-color.gif" alt="" height="160">

                            <h3 class="mt-4"><b><?= $applicationDetails->status?></b></h3>
                            <p class="text-muted">Application Status:</p>
                        </div> <!-- end /.text-center-->

                    </div> <!-- end col -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div id="rootwizard">
                    <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                        <li class="nav-item ribbon-box" data-target-form="#immigrationForm">
                            <a href="#first" data-bs-toggle="tab" data-toggle="tab" class="nav-link active">
                                <!-- <span class="number">1</span> -->
                                <span class="d-none d-sm-inline">Immigration</span>
                            </a>
                        </li>
                        <li class="nav-item" data-target-form="#healthDeclarationForm">
                            <a href="#third" data-bs-toggle="tab" data-toggle="tab" class="nav-link">
                                <!-- <span class="number">3</span> -->
                                <span class="d-none d-sm-inline">Health Declaration</span>
                            </a>
                        </li>
                        <li class="nav-item" data-target-form="#packagePlanForm">
                            <a href="#forth" data-bs-toggle="tab" data-toggle="tab" class="nav-link">
                                <!-- <span class="number">4</span> -->
                                <span class="d-none d-sm-inline">Visa Type</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content mb-0 b-0 ">
                        <div class="tab-pane active show" id="first">
                            <div class = "row">
                                <div class="col-10 mx-auto">
                                    <form id="immigrationForm" method="post" action="#" class="form-horizontal">
                                        <div class="row mb-4">
                                            <div class = "row text-center">
                                                <h3>CONSULTATION IMMIGRATION BRIEF QUESTIONAIRE</h3>
                                            </div>
                                        </div>
                                        <div class="row col-auto">
                                            <div class="col-md-12">
                                                <div class="mb-1">
                                                    <label for="" class="form-label">Do you have a plan to apply your Immediate family (Spouse / Children) for the qualified visa application (i.e., Temporary or Open Work permit / Dependent) in line with your student permit application?</label>
                                                    <div class="form-check">
                                                        <p><b>Answer: </b><?= $applicationDetails->application_q1?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row col-auto">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Have you ever been refused a visa or permit to any visa application you applied for?</label>
                                                    <div class="form-check">
                                                        <p><b>Answer: </b><?= $applicationDetails->application_q2?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id = "">

                                                <table class = "table table-hover table-sm">
                                                    <thead class = "table-light">
                                                        <th>Country</th>
                                                        <th>Purpose of Travel</th>
                                                        <th>Date Applied & Refused</th>
                                                        <th>Main Reason of Refusal</th>
                                                    </thead>
                                                    <tbody id = "table1-list">
                                                        <?php if($applicationRefusedCountry != FALSE):?>
                                                            <?php foreach($applicationRefusedCountry as $country):?>
                                                                <tr>
                                                                    <td><?= $country->arc_country?></td>
                                                                    <td><?= $country->arc_purpose_of_travel?></td>
                                                                    <td><?= $country->arc_date?></td>
                                                                    <td><?= $country->arc_reason?></td>
                                                                </tr>
                                                            <?php endforeach;?>
                                                        <?php endif;?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row col-auto">
                                            <div class="col-md-12">
                                                <div class="mb-1">
                                                    <label for="application_q_3" class="form-label">Have you ever been denied entry or ordered to leave in an overseas country?</label>
                                                    <div class="form-check">
                                                        <p><b>Answer: </b><?= $applicationDetails->application_q3?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id = "">
                                                <table class = "table table-hover table-sm">
                                                    <thead class = "table-light">
                                                        <th>Country</th>
                                                        <th>Purpose of Travel</th>
                                                        <th>Date Applied & Refused</th>
                                                        <th>Main Reason of Refusal</th>
                                                        <th></th>
                                                    </thead>
                                                    <tbody id = "table2-list">
                                                        <?php if($applicationForcedLeave != FALSE):?>
                                                            <?php foreach($applicationForcedLeave as $leaveCountry):?>
                                                                <tr>
                                                                    <td><?= $leaveCountry->aoc_country?></td>
                                                                    <td><?= $leaveCountry->aoc_purpose_of_travel?></td>
                                                                    <td><?= $leaveCountry->aoc_date?></td>
                                                                    <td><?= $leaveCountry->aoc_reason?></td>
                                                                </tr>
                                                            <?php endforeach;?>
                                                        <?php endif;?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row col-auto">
                                            <div class="col-md-12">
                                                <div class="mb-1">
                                                    <label for="" class="form-label">Do you have a family or relatives in the country that you are about to set off?</label>
                                                    <div class="form-check">
                                                        <p><b>Answer: </b><?= $applicationDetails->application_q4?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id = "">
                                                <table class = "table table-hover table-sm">
                                                    <thead class = "table-light">
                                                        <th>Name</th>
                                                        <th>Relationship</th>
                                                        <th>Address</th>
                                                        <th>Residence Status</th>
                                                        <th></th>
                                                    </thead>
                                                    <tbody id = "table3-list">
                                                        <?php if($applicationRelatives != FALSE):?>
                                                            <?php foreach($applicationRelatives as $relative):?>
                                                                <tr>
                                                                    <td><?= $relative->ar_name?></td>
                                                                    <td><?= $relative->ar_relationship?></td>
                                                                    <td><?= $relative->ar_address?></td>
                                                                    <td><?= $relative->ar_residence?></td>
                                                                </tr>
                                                            <?php endforeach;?>
                                                        <?php endif;?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- end tab pane -->


                        <div class="tab-pane fade" id="third">
                            <form id="healthDeclarationForm" method="post" action="#" class="form-horizontal">
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <p><b>Important Note:</b></p>
                                                    <p>
                                                        Kindly acknowledge and abide any preventive or medical measures, to undergo medical and
                                                        laboratory check-ups, or any other procedure determined if necessary. Please present the following information that
                                                        are correct and legally binding. Movenstudy have no responsibility for COVID-19-related requirements that travel
                                                        suppliers and governments may impose from time to time, such as required vaccinations, health affidavit forms,
                                                        COVID-19 screenings prior to departure or upon arrival, face coverings, or quarantines. For your protection, we
                                                        strongly recommend that you purchase health or travel accident insurance. No representation or description of the
                                                        insurance made by Movenstudy constitutes a binding assurance or promise about the insurance. Hence, please hold
                                                        Movenstudy harmless for your election not to purchase travel insurance or for any denial of claim by travel insurer as
                                                        it relates to COVID-19 or any other claim under the policy. Rest assured that this information will be used in a
                                                        confidential manner.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="application_q_3_1" class="form-label">Do you have any disability, impairment, or long-term medical condition, which may affect your studies?</label>
                                                    <div class="form-check">
                                                        <p><b>Answer: </b><?= $applicationDetails->with_disability?></p>
                                                        <?php if($applicationDetails->with_disability == 'Yes'):?>
                                                            <p><b>Disability: </b><?= $applicationDetails->yes_disability?></p>
                                                        <?php endif;?>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10" id = "disability-container">
                                                <div class="mb-3">
                                                    <label for="application_q_3_1" class="form-label">If yes, please indicate the information below: (Hearing, Vision, Medical, Pregnant, etc.)</label>
                                                    <input type="text" class = "form-control" name = "yes_disability" id = "yes_disability">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label for="application_q_3_1" class="form-label">Are you fully vaccinated from COVID-19?</label>
                                                    <div class="form-check">
                                                        <p><b>Answer: </b><?= $applicationDetails->is_vaccinated?></p>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-12" id = "emergency-contact-list-container">
                                                <table class = "table table-hover table-sm">
                                                    <thead class = "table-light">
                                                        <th>Name</th>
                                                        <th>Relationship</th>
                                                        <th>Contact Details</th>
                                                    </thead>
                                                    <tbody id = "emergency-contact-list">
                                                        <tr>
                                                            <td><?= $applicationDetails->first_emergency_contact_name?></td>
                                                            <td><?= $applicationDetails->first_emergency_contact_relationship?></td>
                                                            <td><?= $applicationDetails->first_emergency_contact_number?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><?= $applicationDetails->second_emergency_contact_name?></td>
                                                            <td><?= $applicationDetails->second_emergency_contact_relationship?></td>
                                                            <td><?= $applicationDetails->second_emergency_contact_number?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end tab pane -->

                        <div class="tab-pane fade" id="forth">
                            <form id="packagePlanForm" method="post" action="#" class="form-horizontal">
                                <div class="row">
                                    <div class="col-10 mx-auto">
                                        <div class="card">

                                            <div class="card-body">

                                                <div class="row">
                                                    <div class="col-12">
                                                        <table class = "table table-sm table-bordered" id = "visa-prices-table">
                                                            <thead class = "bg-light">
                                                                <th>Code</th>
                                                                <th>Price</th>
                                                                <th>Remarks</th>
                                                            </thead>
                                                            <tbody>
                                                                <?php if($visaPrices != FALSE):?>
                                                                    <tr>
                                                                        <td><?= $visaPrices[0]->vp_code?></td>
                                                                        <td><?= number_format($visaPrices[0]->vp_price, 2)?></td>
                                                                        <td><?= $visaPrices[0]->remarks?></td>
                                                                    </tr>
                                                                <?php endif;?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="sub-header font-13">Additional options</p>
                                                        <table class = "table table-sm table-bordered" id = "visa-addons-table">
                                                            <thead class = "bg-light">
                                                                <th>Description</th>
                                                                <th>Price</th>
                                                            </thead>
                                                            <tbody>
                                                                <?php if($applicationDetails->visa_addons != NULL):?>
                                                                    <?php foreach(json_decode($applicationDetails->visa_addons) as $addons):?>
                                                                        <tr>
                                                                            <td><?= $addons->desc?></td>
                                                                            <td><?= number_format($addons->price, 2)?></td>
                                                                        </tr>
                                                                    <?php endforeach;?>
                                                                <?php endif;?>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class = "col-12">
                                                        <div class="widget-simple text-center card">
                                                            <div class="card-body">
                                                                <h2 class="text-success mt-0" id = "package-total"><?= number_format($applicationDetails->visa_price, 2)?></h2>
                                                                <small class="text-muted mb-0 visa_click">Total Price</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="loader-wrapper">
                                                    <div id="loader"></div>
                                                </div>

                                                <input type="hidden" class = "form-control" name = "visaItem" id = "visaItem">
                                                <input type="hidden" class = "form-control" name = "visaPackage" id = "visaPackage">
                                                <input type="hidden" class = "form-control" name = "visaPrice" id = "visaPrice">
                                            </div>
                                        </div>

                                        <div class="col-md-12">

                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </form>
                        </div>
                        <!-- end tab pane -->

                    </div> <!-- tab-content -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h4>Status History</h4>
                <ul class="list-unstyled timeline-sm" id = "status-timeline">
                    <?php if($statusHistory != FALSE):?>
                        <?php foreach($statusHistory as $history):?>
                            <li class="timeline-sm-item">
                                <span class="timeline-sm-date"><?= date_format(date_create($history->created_at), 'M d, Y')?></span>
                                <h5 class="mt-0 mb-1"><?= $history->log_message?></h5>
                                <p><?= date_format(date_create($history->created_at), 'h:i:s A')?></p>
                            </li>
                        <?php endforeach;?>
                    <?php endif;?>
                </ul>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>

<?= $this->section('css'); ?>
<!-- CUSTOM CSS FOR THIS PAGE -->
<?= $this->endSection(); ?>



<?= $this->section('javascript'); ?>

<?= $this->endSection(); ?>