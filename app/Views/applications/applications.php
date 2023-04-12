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
                                <!-- <span class="number">2</span> -->
                                <span class="d-none d-sm-inline">Health Declaration</span>
                            </a>
                        </li>
                        <li class="nav-item" data-target-form="#packagePlanForm">
                            <a href="#forth" data-bs-toggle="tab" data-toggle="tab" class="nav-link">
                                <!-- <span class="number">3</span> -->
                                <span class="d-none d-sm-inline">Visa Type</span>
                            </a>
                        </li>
                        <li class="nav-item" data-target-form="#reviewForm">
                            <a href="#fifth" data-bs-toggle="tab" data-toggle="tab" class="nav-link">
                                <!-- <span class="number">4</span> -->
                                <span class="d-none d-sm-inline">Review</span>
                            </a>
                        </li>
                        <!-- <li class="nav-item" data-target-form="#termsConditionsForm">
                            <a href="#sixth" data-bs-toggle="tab" data-toggle="tab" class="nav-link">
                                <span class="number">5</span>
                                <span class="d-none d-sm-inline">Terms & Conditions</span>
                            </a>
                        </li> -->
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
                                                        <input class="form-check-input" type="radio" name="application_q1" id="q1_option1" value = "Yes" required>
                                                        <label class="form-check-label" for="q1_option1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="application_q1" id="q1_option2" value = "No" required>
                                                        <label class="form-check-label" for="q1_option2">
                                                            No
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="application_q1" id="q1_option3" value = "Maybe" required>
                                                        <label class="form-check-label" for="q1_option3">
                                                            Maybe
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row col-auto">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Have you ever been refused a visa or permit to any visa application you applied for?</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="application_q2" id="q2_option1" value = "Yes" required>
                                                        <label class="form-check-label" for="q2_option1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="application_q2" id="q2_option2" value = "No" required>
                                                        <label class="form-check-label" for="q2_option2">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id = "table1-list-container">
                                                <div class = "row">
                                                    <div class = "col-12 text-end mb-2">
                                                        <button id = "add-tr-table1" class = "btn btn-sm btn-outline-success" type = "button">Add Country</button>
                                                    </div>
                                                </div>

                                                <table class = "table table-hover table-sm">
                                                    <thead class = "table-light">
                                                        <th>Country</th>
                                                        <th>Purpose of Travel</th>
                                                        <th>Date Applied & Refused</th>
                                                        <th>Main Reason of Refusal</th>
                                                        <th></th>
                                                    </thead>
                                                    <tbody id = "table1-list">
                                                        <!-- COUNTRY LIST WILL BE APPENDED HERE -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row col-auto">
                                            <div class="col-md-12">
                                                <div class="mb-1">
                                                    <label for="application_q_3" class="form-label">Have you ever been denied entry or ordered to leave in an overseas country?</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="application_q3" id="q3_option1" value = "Yes" required>
                                                        <label class="form-check-label" for="q3_option1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="application_q3" id="q3_option2" value = "No" required>
                                                        <label class="form-check-label" for="q3_option2">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id = "table2-list-container">
                                                <div class = "row">
                                                    <div class = "col-12 text-end mb-2">
                                                        <button id = "add-tr-table2" class = "btn btn-sm btn-outline-success" type = "button">Add Country</button>
                                                    </div>
                                                </div>

                                                <table class = "table table-hover table-sm">
                                                    <thead class = "table-light">
                                                        <th>Country</th>
                                                        <th>Purpose of Travel</th>
                                                        <th>Date Applied & Refused</th>
                                                        <th>Main Reason of Refusal</th>
                                                        <th></th>
                                                    </thead>
                                                    <tbody id = "table2-list">
                                                        <!-- COUNTRY LIST WILL BE APPENDED HERE -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row col-auto">
                                            <div class="col-md-12">
                                                <div class="mb-1">
                                                    <label for="" class="form-label">Do you have a family or relatives in the country that you are about to set off?</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="application_q4" id="q4_option1" value = "Yes" required>
                                                        <label class="form-check-label" for="q4_option1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="application_q4" id="q4_option2" value = "No" required>
                                                        <label class="form-check-label" for="q4_option2">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id = "table3-list-container">
                                                <div class = "row">
                                                    <div class = "col-12 text-end mb-2">
                                                        <button id = "add-tr-table3" class = "btn btn-sm btn-outline-success" type = "button">Add Country</button>
                                                    </div>
                                                </div>

                                                <table class = "table table-hover table-sm">
                                                    <thead class = "table-light">
                                                        <th>Name</th>
                                                        <th>Relationship</th>
                                                        <th>Address</th>
                                                        <th>Residence Status</th>
                                                        <th></th>
                                                    </thead>
                                                    <tbody id = "table3-list">
                                                        <!-- COUNTRY LIST WILL BE APPENDED HERE -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <ul class="pager wizard mb-0 list-inline text-end mt-2">
                                            <li class="next list-inline-item">
                                                <button type="submit" class="btn btn-success">Next <i class="mdi mdi-arrow-right ms-1"></i></button>
                                            </li>
                                        </ul>
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
                                                        <input class="form-check-input with_disability" type="radio" name="with_disability" id="with_disability1" value = "Yes" required>
                                                        <label class="form-check-label" for="with_disability1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input with_disability" type="radio" name="with_disability" id="with_disability2" value = "No" required>
                                                        <label class="form-check-label" for="with_disability2">
                                                            No
                                                        </label>
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
                                                        <input class="form-check-input" type="radio" name="is_vaccinated" id="is_vaccinated1" value = "Yes" required>
                                                        <label class="form-check-label" for="is_vaccinated1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="is_vaccinated" id="is_vaccinated2" value = "No" required>
                                                        <label class="form-check-label" for="is_vaccinated2">
                                                            No
                                                        </label>
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
                                                            <td><input type="text" class = "form-control" name = "first_emergency_contact_name" id = "first_emergency_contact_name" required></td>
                                                            <td><input type="text" class = "form-control" name = "first_emergency_contact_relationship" id = "first_emergency_contact_relationship" required></td>
                                                            <td><input type="text" class = "form-control" name = "first_emergency_contact_number" id = "first_emergency_contact_number" required></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" class = "form-control" name = "second_emergency_contact_name" id = "second_emergency_contact_name"></td>
                                                            <td><input type="text" class = "form-control" name = "second_emergency_contact_relationship" id = "second_emergency_contact_relationship"></td>
                                                            <td><input type="text" class = "form-control" name = "second_emergency_contact_number" id = "second_emergency_contact_number"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <ul class="pager wizard mb-0 list-inline mt-2">
                                    <li class="previous list-inline-item">
                                        <button type="button" class="btn btn-light"><i class="mdi mdi-arrow-left me-1"></i> Back to Program Details</button>
                                    </li>
                                    <li class="next list-inline-item float-end">
                                        <button type="submit" class="btn btn-success">Next <i class="mdi mdi-arrow-right ms-1"></i></button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <!-- end tab pane -->

                        <div class="tab-pane fade" id="forth">
                            <form id="packagePlanForm" method="post" action="#" class="form-horizontal">
                                <!-- <div class="row">
                                    <div class="col-10 mx-auto">
                                        <table class = "table table-striped table-sm">
                                            <thead>
                                                <th></th>
                                                <th>Student Visa Starter - Php 4,995</th>
                                                <th>Visa Package Classic - Php 52,990</th>
                                                <th>Visa Package Plus - Php 62,990</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><b>School Info Kit </b></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                    <td class = "text-primary"><small>Unlimited</small></td>
                                                    <td class = "text-primary"><small>Unlimited</small></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Consultation & Assessment</b></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                    <td class = "text-primary"><small>Unlimited</small></td>
                                                    <td class = "text-primary"><small>Unlimited</small></td>
                                                </tr>
                                                <tr>
                                                    <td ><b>Career Guidance</b></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>School Placement Assistance</b></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                </tr><tr>
                                                    <td><b>Conditional Offer Letter</b></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Letter of Acceptance</b></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Complete List of Requirements</b></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Briefing and Timelining</b></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Customer Care 24/7</b></td>
                                                    <td><span class = "ri-check-double-fill"></span></td>
                                                    <td class = "text-primary"><small>Lifetime</small></td>
                                                    <td class = "text-primary"><small>Lifetime</small></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Documents Evaluation</b></td>
                                                    <td class = "text-primary"></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Visa Processing</b></td>
                                                    <td class = "text-primary"></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Visa Lodging</b>(Embassy Fees not included)</td>
                                                    <td class = "text-primary"></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Accommodation Assistance</b></td>
                                                    <td class = "text-primary"></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Accommodation Assistance</b></td>
                                                    <td class = "text-primary"></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Free Send Off Transportation</b></td>
                                                    <td class = "text-primary"></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Free IPAD / Luggage</b></td>
                                                    <td class = "text-primary"></td>
                                                    <td class = "text-primary">Luggage</td>
                                                    <td class = "text-primary">Ipad</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Free File Case Envelope</b></td>
                                                    <td class = "text-primary"></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Partner’s Temporary /</b></td>
                                                    <td class = "text-primary"></td>
                                                    <td class = "text-primary"></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Open Work Permit</b></td>
                                                    <td class = "text-primary"></td>
                                                    <td class = "text-primary"></td>
                                                    <td class = "text-primary"><span class = "ri-check-double-fill"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Dependent Visa (1)</b></td>
                                                    <td class = "text-primary"></td>
                                                    <td class = "text-primary"></td>
                                                    <td class = "text-primary">Free</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class = "table table-striped table-sm">
                                            <thead>
                                                <th>Package</th>
                                                <th>Straight Payment</th>
                                                <th>Installment</th>
                                            </thead>
                                            <tbody>
                                                <?php if($applicationPackages != FALSE) : ?>
                                                    <?php foreach ($applicationPackages as $packages) : ?>
                                                        <tr>
                                                            <td><?= $packages->ap_code.' - '.$packages->ap_description ?></td>
                                                            <td><?= $packages->ap_straight_payment ?></td>
                                                            <td><?= $packages->ap_installment ?></td>
                                                        </tr>
                                                    <?php endforeach ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                        <div class = "row">
                                            <div class="col-md-12">
                                                <div class="mb-1">
                                                    <label for="application_q_4" class="form-label">Select Package</label>
                                                    <select name="application_package" id="application_package" class = "form-control" required>
                                                        <option value="" selected disabled>Select Option</option>
                                                        <?php if($applicationPackages != FALSE) : ?>
                                                            <?php foreach ($applicationPackages as $packages) : ?>
                                                                <option value="<?= $packages->ap_id ?>"><?= $packages->ap_code.' - '.$packages->ap_description.' - Php '.number_format($packages->ap_price, 2) ?></option>
                                                            <?php endforeach ?>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    end col

                                </div> -->
                                <!-- end row -->
                                <div class="row">
                                    <div class="col-10 mx-auto">
                                        
                                        <div class="row">
                                            
                                        </div>

                                        <div class="row">
                                            <?php if($visaList != FALSE) : ?>
                                                <?php foreach ($visaList as $list) : ?>
                                                    <div class = "col-4">
                                                        <div class="widget-simple text-center card visa-item" data-id = "<?= $list->visa_id ?>">
                                                            <div class="card-body">
                                                                <h3 class="text-primary mt-0 visa_desc"><?= $list->visa_description ?></h3>
                                                                <small class="text-muted mb-0 visa_click">Click to see packages and prices</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="card"  id = "choices-list-container">
                                            <div class="card-body">
                                                <div class="col-md-12 mx-auto">
                                                    <div class="row">
                                                        <!-- <form id="programDetailsForm" method="post" action="#" class="form-horizontal"> -->
                                                            <div class="col-md-12">
                                                                <!-- <div class="col-md-12"> -->
                                                                    <div class="mb-3">
                                                                        <p><b>Important Note:</b></p>
                                                                        <p>Please indicate the final decision of the corresponding questions below to avoid delays or
                                                                        complicated application process. If there’s any changes, kindly coordinate with your program specialist.</p>
                                                                    </div>
                                                                <!-- </div> -->
                                                                <table class = "table table-hover table-sm">
                                                                    <thead class = "table-light">
                                                                        <th>#</th>
                                                                        <th>School Name</th>
                                                                        <th>Campus Address</th>
                                                                        <th>Preferred Program</th>
                                                                        <th>Preferred Intake Date</th>
                                                                    </thead>
                                                                    <tbody id = "program-list">
                                                                        <tr>
                                                                            <td>First Choice</td>
                                                                            <td><input type="text" class = "form-control" name = "first_choice_school" id = "first_choice_school" ></td>
                                                                            <td><input type="text" class = "form-control" name = "first_choice_address" id = "first_choice_address" ></td>
                                                                            <td><input type="text" class = "form-control" name = "first_choice_program" id = "first_choice_program" ></td>
                                                                            <td><input type="date" class = "form-control" name = "first_choice_date" id = "first_choice_date" ></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Second Choice</td>
                                                                            <td><input type="text" class = "form-control" name = "second_choice_school" id = "second_choice_school"></td>
                                                                            <td><input type="text" class = "form-control" name = "second_choice_address" id = "second_choice_address"></td>
                                                                            <td><input type="text" class = "form-control" name = "second_choice_program" id = "second_choice_program"></td>
                                                                            <td><input type="date" class = "form-control" name = "second_choice_date" id = "second_choice_date"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Third Choice</td>
                                                                            <td><input type="text" class = "form-control" name = "third_choice_school" id = "third_choice_school"></td>
                                                                            <td><input type="text" class = "form-control" name = "third_choice_address" id = "third_choice_address"></td>
                                                                            <td><input type="text" class = "form-control" name = "third_choice_program" id = "third_choice_program"></td>
                                                                            <td><input type="date" class = "form-control" name = "third_choice_date" id = "third_choice_date"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        <!-- </form> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">

                                            <div class="card-body">
                                                <h5 class="card-title">Prices/Packages</h5>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="sub-header font-13">Select one(1) option.</p>
                                                        <table class = "table table-sm table-bordered" id = "visa-prices-table">
                                                            <thead class = "bg-light">
                                                                <th>Code</th>
                                                                <th>Price</th>
                                                                <th>Remarks</th>
                                                            </thead>
                                                            <tbody>
                                                                <!-- PRICES WILL BE APPENDED HERE -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="sub-header font-13">Additional options</p>
                                                        <table class = "table table-sm table-bordered" id = "visa-addons-table">
                                                            <thead class = "bg-light">
                                                                <th>Code</th>
                                                                <th>Description</th>
                                                                <th>Price</th>
                                                                <th>Remarks</th>
                                                            </thead>
                                                            <tbody>
                                                                <!-- PRICES WILL BE APPENDED HERE -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class = "col-12">
                                                        <div class="widget-simple text-center card">
                                                            <div class="card-body">
                                                                <h2 class="text-success mt-0" id = "package-total">0.00</h2>
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
                                <ul class="pager wizard mb-0 list-inline mt-2">
                                    <li class="previous list-inline-item">
                                        <button type="button" class="btn btn-light"><i class="mdi mdi-arrow-left me-1"></i> Back to Health Declaration</button>
                                    </li>
                                    <li class="next list-inline-item float-end">
                                        <button type="submit" class="btn btn-success">Next <i class="mdi mdi-arrow-right ms-1"></i></button>
                                    </li>
                                </ul>
                                <!-- end row -->
                            </form>
                        </div>
                        <!-- end tab pane -->

                        <div class="tab-pane fade" id="fifth">
                            <form id="reviewForm" method="post" action="#" class="form-horizontal">
                                <div class="row">
                                    <div class = "col-md-10 mx-auto">
                                        <div class = "card">
                                            <div class="card-body">
                                                <h5 class="card-title">Immigration Questionare</h5>
                                                <div class="row">
                                                    <p>Do you have a plan to apply your Immediate family (Spouse / Children) for the qualified visa application (i.e., Temporary or Open Work permit / Dependent) in line with your student permit application?</p>
                                                    <h5>Answer: <span id = "q1_option1-review"></span></h5>
                                                </div>
                                                <div class="row">
                                                    <p>Have you ever been refused a visa or permit to any visa application you applied for?</p>
                                                    <div class="col-md-10 mx-auto">
                                                        <h5>Answer: <span id = "q2_option1-review"></span></h5>
                                                        <table class = "table table-hover table-sm">
                                                            <thead class = "table-light">
                                                                <th>Country</th>
                                                                <th>Purpose of Travel</th>
                                                                <th>Date Applied &amp; Refused</th>
                                                                <th>Main Reason of Refusal</th>
                                                                <th></th>
                                                            </thead>
                                                            <tbody id = "table1-list-review">

                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <p>Have you ever been denied entry or ordered to leave in an overseas country?</p>
                                                    <div class="col-md-10 mx-auto">
                                                        <h5>Answer: <span id = "q3_option1-review"></span></h5>
                                                        <table class = "table table-hover table-sm">
                                                            <thead class = "table-light">
                                                                <th>Country</th>
                                                                <th>Purpose of Travel</th>
                                                                <th>Date Applied &amp; Refused</th>
                                                                <th>Main Reason of Refusal</th>
                                                                <th></th>
                                                            </thead>
                                                            <tbody id = "table2-list-review">

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <p>Do you have a family or relatives in the country that you are about to set off?</p>
                                                    <div class="col-md-10 mx-auto">
                                                    <h5>Answer: <span id = "q4_option1-review"></span></h5>
                                                        <table class = "table table-hover table-sm">
                                                            <thead class = "table-light">
                                                                <th>Name</th>
                                                                <th>Relationship</th>
                                                                <th>Address</th>
                                                                <th>Residence Status</th>
                                                                <th></th>
                                                            </thead>
                                                            <tbody id = "table3-list-review"></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h5 class="card-title">Program Details</h5>
                                                    <div class="row">
                                                        <div class="col-md-10 mx-auto">
                                                            <table class = "table table-hover table-sm">
                                                                <thead class = "table-light">
                                                                    <th>#</th>
                                                                    <th>School Name</th>
                                                                    <th>Campus Address</th>
                                                                    <th>Preferred Program</th>
                                                                    <th>Preferred Intake Date</th>
                                                                </thead>
                                                                <tbody id = "program-list-review"></tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <hr>
                                                <h5 class="card-title">Health Declaration</h5>
                                                <div class="row">
                                                    <p>Do you have any disability, impairment, or long-term medical condition, which may affect your studies?</p>
                                                    <div class="col-md-10 mx-auto">
                                                        <h5>Answer: <span id = "with_disability-review"></span></h5>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <p>Impairment:</p>
                                                    <div class="col-md-10 mx-auto">
                                                        <h5>Answer: <span id = "yes_disability-review"></span></h5>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <p>Are you fully vaccinated from COVID-19?</p>
                                                    <div class="col-md-10 mx-auto">
                                                        <h5>Answer: <span id = "is_vaccinated-review"></span></h5>
                                                    </div>
                                                </div>
                                                <div class = "row">
                                                    <div class="col-md-10 mx-auto">
                                                        <table class = "table table-hover table-sm">
                                                            <thead class = "table-light">
                                                                <th>Name</th>
                                                                <th>Relationship</th>
                                                                <th>Contact Details</th>
                                                            </thead>
                                                            <tbody id = "emergency-contact-list-review"></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h5 class="card-title">Package Plan</h5>
                                                <div class = "row">
                                                    <div class="col-md-10 mx-auto">
                                                        <table class = "table table-hover table-sm">
                                                            <thead class = "table-light">
                                                                <th>Visa Type</th>
                                                                <th>Package Description</th>
                                                                <th>Package Price</th>
                                                            </thead>
                                                            <tbody id = "visa-type-review"></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class = "row">
                                                    <div class="col-md-10 mx-auto">
                                                        <table class = "table table-hover table-sm">
                                                            <thead class = "table-light">
                                                                <th>Addons Description</th>
                                                                <th>Price</th>
                                                                <th>Remarks</th>
                                                            </thead>
                                                            <tbody id = "visa-addons-review"></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-10 mx-auto">
                                                        <div class="widget-simple text-center card">
                                                            <div class="card-body">
                                                                <h2 class="text-success mt-0" id="package-total-review">0.00</h2>
                                                                <small class="text-muted mb-0 visa_click">Total Price</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-10 mx-auto">
                                                        <div class="mb-3">
                                                            <div class="form-check d-inline-block">
                                                                <input class="form-check-input" type="checkbox" value="" id="terms-conditions-validationwizard" required>
                                                                <label class="form-check-label" for="terms-conditions-validationwizard">
                                                                    I agree with the <a href="" data-link = "<?= base_url().'/public/assets/terms-conditions/'?>" target = "_blank" id = "terms-condition-link">Terms and Conditions</a>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <ul class="pager wizard mb-0 list-inline mt-2">
                                    <li class="previous list-inline-item">
                                        <button type="button" class="btn btn-light"><i class="mdi mdi-arrow-left me-1"></i> Back to Health Declaration</button>
                                    </li>
                                    <li class="next list-inline-item float-end">
                                        <button type="submit" class="btn btn-success">Finish<i class="mdi mdi-arrow-right ms-1"></i></button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <!-- end tab pane -->
                        <div class="tab-pane fade" id="sixth">
                            <form id="termsConditionsForm" method="post" action="#" class="form-horizontal">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-center">
                                            <h2 class="mt-0">
                                                <i class="mdi mdi-check-all"></i>
                                            </h2>
                                            <!-- <h3 class="mt-0">Almost done !</h3> -->

                                            <!-- <p class="w-75 mb-2 mx-auto">Quisque nec turpis at urna dictum luctus. Suspendisse convallis dignissim eros at volutpat. In egestas mattis dui. Aliquam mattis dictum aliquet.</p> -->

                                            <!-- <div class="mb-3">
                                                <div class="form-check d-inline-block">
                                                    <input class="form-check-input" type="checkbox" value="" id="terms-conditions-validationwizard">
                                                    <label class="form-check-label" for="terms-conditions-validationwizard">
                                                        I agree with the Terms and Conditions
                                                    </label>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>

                                <ul class="pager wizard mb-0 list-inline mt-2">
                                    <li class="previous list-inline-item">
                                        <button type="button" class="btn btn-light"><i class="mdi mdi-arrow-left me-1"></i> Back to Package Plan</button>
                                    </li>
                                    <li class="next list-inline-item float-end">
                                        <button type="button" class="btn btn-success">Submit <i class="mdi mdi-arrow-right ms-1"></i></button>
                                    </li>
                                </ul>
                                <!-- end row -->
                            </form>
                        </div>
                        <!-- end tab pane -->

                    </div> <!-- tab-content -->
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('css'); ?>
<!-- CUSTOM CSS FOR THIS PAGE -->
<link href="<?= base_url()?>/public/assets/libs/jquery-toast-plugin/jquery.toast.min.css" rel="stylesheet" type="text/css">
<link href="<?= base_url()?>/public/assets/libs/signature-pad/jquery.signaturepad.css" rel="stylesheet" type="text/css">
<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>

<!-- CUSTOM JS FOR THIS PAGE -->
<script src="<?= base_url()?>/public/assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="<?= base_url()?>/public/assets/js/applications/applications.js"></script>
<script src="<?= base_url()?>/public/assets/js/applications/form-wizard.js"></script>
<script src="<?= base_url()?>/public/assets/libs/jquery-toast-plugin/jquery.toast.min.js"></script>

<script src="<?= base_url()?>/public/assets/libs/signature-pad/sketchpad.js"></script>

<?= $this->endSection(); ?>