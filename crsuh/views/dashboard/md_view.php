<?php 
    $user = '';

    if($this->session->login->username):
        $user = $this->session->login->username;
    elseif($this->session->login->firstname && $this->session->login->lastname):
        $user = $this->session->login->firstname . ' ' . $this->session->login->lastname;
	else:
		$user = $this->session->login->usertype;
	endif;
?>

<div class="container-fluid">
	<div class="card bg-light-info shadow-none position-relative overflow-hidden">
	    <div class="card-body px-4 py-3">
	      	<div class="row align-items-center">
		        <div class="col-9">
		          <h4 class="fw-semibold mb-8"><?=strtoupper($user)?>'S DASHBOARD</h4>
		          <nav aria-label="breadcrumb">
		            <ol class="breadcrumb">
		              <li class="breadcrumb-item">
		                <a class="text-muted" href="<?=base_url('dashboard')?>">Dashboard</a>
		              </li>
                      <li class="breadcrumb-item">View MDs</li>
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
    <div class="row align-items-center justify-content-center">
        <div class="col-sm-12 col-md-7">
            <div class="card">
                <div class="px-4 py-3 border-bottom">
                    <h5 class="card-title fw-semibold mb-0">View MD</h5>
                    <p class="mb-0">View details of selected MD</p>
                </div>
                <div class="card-body">
                    <?=validation_errors() ?>
					<p class="mb-4"><em>Fields marked with <span class="text-danger">*</span> are required.</em></p>
                    <?=form_open('', ['id' => 'addMDUserForm', 'class'=>'w-100'])?>
                    <div class="row mb-3">
						<div class="col-sm-6">
							<label class="form-label fw-semibold mb-0">MD Name<span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="md_name" placeholder="MD Name" value="<?=set_value('md_name', $md->md_name)?>" required />
						</div>
						<div class="col-sm-6">
							<label class="form-label fw-semibold mb-0">MD Code<span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="md_code" placeholder="MD Code" value="<?=set_value('md_code', $md->md_code)?>" required />
						</div>
					</div>
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <label clss="form-label fw-semibold mb-0">MD State</label>
                            <select id="states" name="md_state" class="form-select">
                                <option value="">Select Option</option>
                                <?php 
                                    if($states){
                                        foreach($states as $state){
                                            ?>
                                            <option value="<?=$state->id?>" <?php if($state->id == $md->md_state){echo 'selected';} ?>><?=$state->name?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label fw-semibold mb-0">MD LGA</label>
                            <select id="lgas" name="md_lga" class="form-select" disabled>
                                <option value="">Select Option</option>
                                <?php 
                                    if($lgas){
                                        foreach($lgas as $lga){
                                            ?>
                                            <option value="<?=$lga->id?>" <?php if($lga->id == $md->md_lga){echo 'selected';} ?>><?=$lga->name?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-12 rounded bg-light-secondary shadow-sm py-3 px-4">
                            <label class="form-label fw-semibold mb-0">MD Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="mdPassword" name="md_password" placeholder="MD Password" value="<?=set_value('md_password', $md->pwd_text)?>" required />
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="ti ti-eye-off"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 d-flex align-items-center justify-content-end">
                            <button type="reset" class="btn btn-lg btn-outline-secondary me-2">Cancel</button>
                            <button type="submit" class="btn btn-lg btn-primary">Update</button>
                        </div>
                    </div>
                    <?=form_close()?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#states').change(function(){
            $('#activityRunner').removeClass('d-none');

            var stateId = $(this).val();
            $.ajax({
                url: '<?=base_url('users/get_lgas_by_state_id')?>',
                type: 'POST',
                data: {state_id: stateId},
                success: function(data){
                    var lgas = JSON.parse(data);
                    $('#lgas').empty().html('<option value="">Select Option</option>');

                    if(lgas.status){
                        $.each(lgas.lgas, function(key, value){
                            $('#lgas').append('<option value="'+value.id+'">'+value.name+'</option>');
                        });

                        $('#lgas').prop('disabled', false);
                        $('#activityRunner').addClass('d-none');
                    }else{
                        $('#lgas').prop('disabled', true);
                        $('#activityRunner').addClass('d-none');
                    }
                }
            });
        });
    });
</script>
<script>
    // Toggle password visibility
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#mdPassword');
    const icon = togglePassword.querySelector('i');

    togglePassword.addEventListener('click', function (e) {
        // Toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        
        // Toggle the eye / eye-off icon
        icon.classList.toggle('ti-eye');
        icon.classList.toggle('ti-eye-off');
    });
</script>
