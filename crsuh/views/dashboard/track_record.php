
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
                    <div class="">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addKpiModal">Add KPI</button>
                    </div>
                </div>
                <div class="card-body py-3">
                    <div>
                        <form id="trackRecordForm" action="" method="post">
                            <div class="form-step row mb-3">
                                <div class="col-sm-12">
                                    <label for="index" class="form-label fw-semibold mb-0">Key Performance Index(es)</label>
                                    <select id="index" class="form-select" name="kpi">
                                        <option value="">Select KPI</option>
                                        <?php 
                                            if($md_kpi_list){
                                                foreach($md_kpi_list as $kpi){
                                                    echo "<option value='" . $kpi->kpi_uuid . "' data-kpi='" . $kpi->kpi_name . "'>" . strtoupper($kpi->kpi_name) . "</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div id="loadIndexForm" class= "form-step row mb-3"></div>
                            
                            <div class="form-step row d-none">
                                <div class="col-sm-12">
                                    <div class="mb-4 py-4 px-3 bg-light rounded">
                                        <h5 class="fw-semibold text-uppercase mb-3">Patient Information</h5>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="patient_fname" class="form-label fw-semibold mb-0">First Name</label>
                                                <input type="text" name="fname" class="form-control" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="patient_lname" class="form-label fw-semibold mb-0">Last Name</label>
                                                <input type="text" name="lname" class="form-control" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="patient_phone" class="form-label fw-semibold mb-0">Contact</label>
                                                <input type="text" name="phone" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-sm-12">
                                            <div class="d-flex align-items-center justify-content-end">
                                                <button id="backBtn" type="button" class="btn btn-lg btn-outline-primary me-2">Back</button>
                                                <button id="submit" type="submit" class="btn btn-lg btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addKpiModal" tabindex="-1" aria-labelledby="addKpiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addKpiModalLabel">Add KPI</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="kpiName" class="form-label">KPI Name</label>
                            <input type="text" class="form-control" id="kpiName" placeholder="Enter KPI Name">
                        </div>
                        <div class="mb-3">
                            <label for="kpiDescription" class="form-label">KPI Description</label>
                            <textarea class="form-control" id="kpiDescription" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="kpiValue" class="form-label">KPI Value</label>
                            <input type="number" class="form-control" id="kpiValue" placeholder="Enter KPI Value">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
                            
                            if (document.querySelector('#desc') && document.querySelector('#desc').value) {
                                ClassicEditor.create(document.querySelector('#desc'), {
                                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'undo', 'redo'],
                                    placeholder: 'Enter book description here...'
                                })
                                .catch(error => {
                                    console.error(error);
                                });
                            }

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
        });

        $('#backBtn').on('click', function(){
            var currentForm = $(this).closest('.form-step');
            var previousForm = currentForm.prev('.form-step');

            currentForm.addClass('d-none');
            previousForm.removeClass('d-none');
        });

        $('#submit').on('click', function(){
            alert('Form submission initiated!');
        })
    });
</script>