<div class="container-fluid">
	<div class="card bg-light-info shadow-none position-relative overflow-hidden">
	    <div class="card-body px-4 py-3">
	      	<div class="row align-items-center">
		        <div class="col-9">
		          <h4 class="fw-semibold mb-8">ADMIN DASHBOARD</h4>
		          <nav aria-label="breadcrumb">
		            <ol class="breadcrumb">
		              <li class="breadcrumb-item">
		                <a class="text-muted" href="<?=base_url('dashboard')?>">Dashboard</a>
		              </li>
					  <li class="breadcrumb-item">Users</li>
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
                    <h5 class="card-title fw-semibold mb-0">Add User</h5>
                </div>
                <div class="card-body">
					<?=validation_errors() ?>
					<p class="mb-4"><em>Fields marked with <span class="text-danger">*</span> are required.</em></p>
                    <?=form_open('', ['id' => 'addUserForm', 'class'=>'w-100'])?>
                    <div class="row mb-3">
						<div class="col-sm-6">
							<label class="form-label fw-semibold mb-0">Firstname<span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="fname" placeholder="First name" value="<?=set_value('fname')?>" required />
						</div>
						<div class="col-sm-6">
							<label class="form-label fw-semibold mb-0">Lastname<span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="lname" placeholder="Last name" value="<?=set_value('lname')?>" required />
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-sm-6">
							<label class="form-label fw-semibold mb-0">Phone</label>
							<input type="text" class="form-control" name="phone" placeholder="Phone number" value="<?=set_value('phone')?>" />
						</div>
						<div class="col-sm-6">
							<label class="form-label fw-semibold mb-0">Email<span class="text-danger">*</span></label>
							<input type="email" class="form-control" name="email" placeholder="Email" value="<?=set_value('email')?>" required />
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-sm-6">
							<label class="form-label fw-semibold mb-0">Username<span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="username" placeholder="Username" value="<?=set_value('username')?>" required />
						</div>
						<div class="col-sm-6">
							<label class="form-label fw-semibold mb-0">Password<span class="text-danger">*</span></label>
							<div class="input-group align-items-center">
								<input type="password" name="password" class="form-label fs-3 form-control" placeholder="Login Password" required id="exampleInputPassword1">
								<button title="" type="button" class="btn btn-outline-primary mb-2" id="togglePassword">
									<i class="ti ti-eye-off"></i>
								</button>
							</div>
						</div>
					</div>
					<div class="row mb-3">
						<label class="form-label fw-semibold mb-0">Confirm Password</label>
						<div class="input-group align-items-center">
							<input type="password" name="confirm_password" class="form-label fs-3 form-control" placeholder="Confirm Password" required id="exampleInputPassword2">
							<button title="" type="button" class="btn btn-outline-primary mb-2" id="toggleConfirmPassword">
								<i class="ti ti-eye-off"></i>
							</button>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-sm-12">
							<label class="form-label fw-semibold mb-0">Address</label>
							<textarea id="address" class="form-control" name="address" placeholder="Address"></textarea>
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-sm-6">
							<label class="form-label fw-semibold mb-0">Role<span class="text-danger">*</span></label>
							<select class="form-select" name="role">
								<option value="">Select User Role</option>
								<option value="md_user">MD Dashboard</option>
								<option value="admin">Administrator</option>
							</select>
						</div>
						<div class="col-sm-6">
							<label class="form-label fw-semibold mb-0">Usertype<span class="text-danger">*</span></label>
							<select class="form-select" name="usertype" required>
								<option value="">Select User Type</option>
								<option value="User">User</option>
								<option value="Super Admin">Super Admin</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 d-flex align-items-center justify-content-end">
							<button type="reset" class="btn btn-outline-secondary me-3">Cancel</button>
							<button type="submit" class="btn btn-primary">Create User</button>
						</div>
					</div>
                    <?=form_close()?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
	ClassicEditor
	.create(document.querySelector('#address'), {
		toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'undo', 'redo'],
		placeholder: 'Enter address here...'
	})
	.catch(error => {
		console.error(error);
	});
</script>
<script>
  $(document).ready(function() {
    $("#togglePassword").click(function() {
      let passwordField = $("#exampleInputPassword1");
      let type = passwordField.attr("type") === "password" ? "text" : "password";
      passwordField.attr("type", type);

      // Toggle eye icon
      $(this).find("i").toggleClass("ti ti-eye-on");
    });
  });
</script>
<script>
  $(document).ready(function() {
    $("#toggleConfirmPassword").click(function() {
      let passwordField = $("#exampleInputPassword2");
      let type = passwordField.attr("type") === "password" ? "text" : "password";
      passwordField.attr("type", type);

      // Toggle eye icon
      $(this).find("i").toggleClass("ti ti-eye-on");
    });
  });
</script>