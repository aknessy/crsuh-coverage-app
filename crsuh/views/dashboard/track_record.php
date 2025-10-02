
<div class="container-fluid">
	<div class="card bg-light-info shadow-none position-relative overflow-hidden">
	    <div class="card-body px-4 py-3">
	      	<div class="row align-items-center">
		        <div class="col-9">
		          <h4 class="fw-semibold mb-8"><?=ucwords($this->session->login->md_name)?>'S DASHBOARD</h4>
		          <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted" href="<?=base_url('md')?>">Dashboard</a>
                        </li>
                      <li class="breadcrumb-item" aria-current="page">Track Record</li>
                    </ol>
		          </nav>
		        </div>
		        <div class="col-3">
		          <div class="text-center mb-n5">
		              <img src="<?=base_url()?>assets/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
		          </div>
		        </div>
	      	</div>
	    </div>
  	</div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card w-100 p-0">
                <div class="d-sm-flex d-block align-items-center justify-content-between bg-light border-bottom px-3 py-3">
                    <div class="mb-3 mb-sm-0">
                        <h5 class="card-title fw-semibold">Track Key Performance Indexes</h5>
                        <p class="card-subtitle mb-0">Keep a record of KPIs associated with <?=ucwords($this->session->login->md_name)?></p>
                    </div>
                </div>
                <div class="card-body py-3">
                    <?php echo validation_errors(); ?>
                    <div>
                        <?=form_open_multipart(base_url('md/record_kpi'), ['id' => 'trackRecordForm', 'class' => 'w-100'])?>
                            <div class="form-step row mb-3">
                                <?php
                                    if($md_kpi_list): ?>
                                        <div class="col-sm-12">
                                            <label for="index" class="form-label fw-semibold mb-0">Key Performance Index(es)</label>
                                            <select id="index" class="form-select" name="kpi" required>
                                                <option value="">Select KPI</option>
                                                <?php 
                                                    foreach($md_kpi_list as $kpi){
                                                        echo "<option value='" . $kpi->kpi_uuid . "' data-kpi='" . $kpi->kpi_name . "'>" . strtoupper($kpi->kpi_name) . "</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    <?php else: ?>
                                        <div class="alert alert-warning" role="alert">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="fs-4"><small>It appears this Ministry/Department does not have any <strong><em>Key Performance Indexe(s)</em></strong> associated with it. Click the "Add KPI" button to create KPIs.</small></span>
                                                <button class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#addKpiModal">Add KPI</button>
                                            </div>
                                        </div>
                                <?php endif;?>
                            </div>
                            
                            <div id="loadIndexForm" class= "form-step row mb-3"></div>
                            
                            <div class="form-step row d-none">
                                <div class="col-sm-12 mb-3">
                                    <div class="py-4 px-3 bg-light rounded">
                                        <div class="w-100 mb-3">
                                            <h5 class="fw-semibold text-uppercase mb-3 border-bottom pb-1">Patient Information</h5>
                                            <div class="row">
                                                <div class="col-sm-12 mb-3">
                                                    <label class="form-label fw-semibold mb-0">Patient's ID (PID)</label>
                                                    <input type="text" name="patient_pid[]" class="form-control" placeholder="Patient's ID" value="" />
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="form-label fw-semibold mb-0">First Name</label>
                                                    <input type="text" name="patient_fname[]" class="form-control" placeholder="Firstname">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="form-label fw-semibold mb-0">Last Name</label>
                                                    <input type="text" name="patient_lname[]" class="form-control" placeholder="Lastname">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="form-label fw-semibold mb-0">Phone</label>
                                                    <input type="text" name="patient_phone[]" class="form-control" placeholder="Phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="newPatientContainer" class="w-100"></div>
                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <div class="col-sm-12">
                                            <h4 class="fs-4 text-info">Or Download the attached template, Fill it and click the input field below to attach same</h4>
                                            <div class="mb-2">
                                                <label class="form-label fw-semibold mb-0">Click to select completed excel file</label>
                                                <input type="file" name="attached_file" value="" accepts=".xls,.xlsx" class="form-control form-control-lg" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-sm-12">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div id="addPatientButtonContainer" class="d-none">
                                                    <div class="d-flex align-items-center justify-content-around">
                                                        <button id="addNewPatient" type="button" class="btn me-2 btn-lg btn-secondary">Add Patient</button>
                                                        <a href="<?=base_url('md/download_template')?>" class="btn btn-lg btn-outline-dark">Download Template</a>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button id="backBtn" type="button" class="btn btn-lg btn-outline-primary me-2">Back</button>
                                                    <button id="submit" type="submit" class="btn btn-lg btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?=form_close()?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addKpiModal" tabindex="-1" aria-labelledby="addKpiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white text-uppercase" id="addKpiModalLabel">Add Key Performance Index(es)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="kpiForm" action="<?=base_url('md/create_kpi')?>" method="post">
                        <div class="mb-3">
                            <h5 class="mb-1">Key Performance Indexes</h5>
                            <p class="mb-0"><small>Choose KPIs that are associated with the current Ministry/Department</p>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="Enrollment" id="enrollment" name="kpi[]">
                            <label class="form-check-label fs-4" for="enrollment">Enrollment</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="Empanelment" id="empanelment" name="kpi[]">
                            <label class="form-check-label fs-4" for="empanelment">Empanelment</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="Accreditation" id="accreditation" name="kpi[]">
                            <label class="form-check-label fs-4" for="accreditation">Accreditation</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="Capitation Payment" id="capitation_payment" name="kpi[]">
                            <label class="form-check-label fs-4" for="capitation_payment">Capitation Payment</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="Fee for Service" id="fee_for_service" name="kpi[]">
                            <label class="form-check-label fs-4" for="fee_for_service">Fee For Service</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="Interventions" id="interventions" name="kpi[]">
                            <label class="form-check-label fs-4" for="interventions">Interventions</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="Quality Assurance" id="qual_ass" name="kpi[]">
                            <label class="form-check-label fs-4" for="qual_ass">Quality Assurance</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="SOC Meetings" id="soc_meetings" name="kpi[]">
                            <label class="form-check-label fs-4" for="soc_meetings">SOC Meetings</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="Trainings" id="trainings" name="kpi[]">
                            <label class="form-check-label fs-4" for="trainings">Trainings</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="saveKPIsBtn" data-target="#kpiForm" type="button" class="btn btn-primary">Save Selections</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){
        let kpIndex = $('#index');

        $(kpIndex).on('change', function(){
            $('#activityRunner').removeClass('d-none');

            let selectedKPI = $(this).val();
            let kpiName = $(this).find(':selected').data('kpi');

            if(selectedKPI !== ''){
                $.ajax({
                    url: '<?=base_url('md/load_kpi_form')?>',
                    method: 'POST',
                    data: {kpi : kpiName},
                    success: function(res){
                        if(res){
                            let options = {
                                altInput: true,
                                altFormat: "M, Y",
                                dateFormat: "Y-m",
                            }

                            let flatpickrWithTimeOption = {
                                enableTime: true,
                                dateFormat: "Y-m-d H:i",
                            }
                            
                            $('#loadIndexForm').empty().append(res);
                            $('#loadIndexForm').find('.picker-with-time').flatpickr(flatpickrWithTimeOption);
                            $('#loadIndexForm').find('.date-widget').flatpickr(options);
                            
                            //if (document.querySelector('#desc') && document.querySelector('#desc').value) {
                                ClassicEditor.create(document.querySelector('#desc'), {
                                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'undo', 'redo'],
                                    placeholder: 'Enter book description here...'
                                })
                                .catch(error => {
                                    console.error(error);
                                });
                            //}

                            $('#activityRunner').addClass('d-none')
                        }
                    },
                    error: function(err){
                        console.log(err);
                        $('#activityRunner').addClass('d-none')
                    }
                });
            }
        });

        $('#loadIndexForm').on('click', '#continueBtn', function(){
            var currentForm = $(this).closest('.form-step');
            var nextForm = currentForm.next('.form-step');

            currentForm.addClass('d-none');
            nextForm.removeClass('d-none');
            $('#addPatientButtonContainer').removeClass('d-none');
        });

        $('#backBtn').on('click', function(){
            var currentForm = $(this).closest('.form-step');
            var previousForm = currentForm.prev('.form-step');

            currentForm.addClass('d-none');
            previousForm.removeClass('d-none');
            $('#addPatientButtonContainer').addClass('d-none');
        });

        $('#saveKPIsBtn').click(function(){
            var formToSubmit = $(this).data('target')
            $(formToSubmit).submit();
        });

        const newPatientBlockContainer = document.getElementById('newPatientContainer');
        let childElementCount = newPatientBlockContainer.childElementCount;

        $('#addNewPatient').click(function(){
            if(childElementCount == 0)
                childElementCount = 2;

            const newPatientBlock = createNewPatient(childElementCount);
            newPatientBlockContainer.appendChild(newPatientBlock);
            
            childElementCount++;
        });

        $('#trackRecordForm').on('click', '.removeNewPatientBtn', function(){
            const newPatientBlockContainer = document.getElementById('newPatientContainer');
            removeLastElement(newPatientBlockContainer.id);
        });

        $('#trackRecordForm').on('submit', function(e) {
            let isValid = true;

            // Check all required inputs inside the form
            $('#trackRecordForm [required]').each(function() {
                if ($(this).is(':visible') && !$(this).val()) {
                    isValid = false;
                    $(this).addClass('input-error'); // Optional: highlight error
                } else {
                    $(this).removeClass('input-error');
                }
            });

            // If invalid, prevent submission
            if (!isValid) {
                e.preventDefault();
                alert('Please fill all required fields.');
            }
        });

    });
</script>

<script>
    function createNewPatient(trackChildCount) {
        const wrapper = document.createElement('div');
        
        const timestamp = Date.now();
        let newElementID = `new-patient-block-${timestamp}`;

        wrapper.id = newElementID;

        wrapper.innerHTML = `
                    <div class="w-100 mb-3">
                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <label for="patient-${trackChildCount}" class="form-label fw-semibold mb-0">Patetient's ID (PID) ${trackChildCount}</label>
                                <input id="patient-${trackChildCount} type="text" name="patient_pid[]" class="form-control" placeholder="Patient's ID ${trackChildCount}" value="" />
                            </div>
                            <div class="col-sm-2 d-flex align-items-end justify-content-center">
                                <button type="button" class="removeNewPatientBtn btn btn-danger">Remove</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="patient-fname-${trackChildCount}" class="form-label fw-semibold mb-0">First Name ${trackChildCount}</label>
                                <input id="patient-fname-${trackChildCount}" type="text" name="patient_fname[]" class="form-control" placeholder="Firstname ${trackChildCount}">
                            </div>
                            <div class="col-sm-4">
                                <label for="patient-lname-${trackChildCount}" class="form-label fw-semibold mb-0">Last Name ${trackChildCount}</label>
                                <input type="text" name="patient_lname[]" class="form-control" placeholder="Lastname ${trackChildCount}">
                            </div>
                            <div class="col-sm-4">
                                <label for="patient-phone-${trackChildCount}" class="form-label fw-semibold mb-0">Phone ${trackChildCount}</label>
                                <input id="patient-phone-${trackChildCount}" type="text" name="patient_phone[]" class="form-control" placeholder="Phone ${trackChildCount}">
                            </div>
                        </div>
                    </div>
                `;
        
        return wrapper;
    }

    function removeLastElement(containerId) {
        const container = document.getElementById(containerId);
        if (!container || !container.lastElementChild) return;
        container.removeChild(container.lastElementChild);
    }
</script>