
<!-- Include Font Awesome for the eye icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
  <div class="position-relative overflow-hidden radial-gradient min-vh-100">
    <div class="position-relative z-index-5">
      <div class="row">
        <div class="col-xl-7 col-xxl-8" style="background-image: url(<?=base_url('assets/uploads/crsuh.jpg')?>); background-size: cover;">
          
        </div>
        <div class="col-xl-5 col-xxl-4">
          <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
            <div class="col-sm-8 col-md-6 col-xl-9">
              <h2 class="mb-3 fs-7 fw-bolder">Welcome to Cross River State Universal Health Monitor Coverage</h2>
              <p class=" mb-9">Cross River State Universal Healthcare Reporting</p>
              <form method="post">
                <?php  if ($this->session->flashdata('error')){ ?>
                  <!-- <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                  <strong>Error - </strong> <?=$this->session->flashdata('error')?>
                  </div> -->
                  <?php } ?>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-semibold mb-0">MD Code</label>
                    <input type="text" name="md_code" class="form-control" required>
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label fw-semibold mb-0">MD Password</label>
                    <div class="input-group">
                      <input type="password" name="md_pwd" class="form-control" required id="exampleInputPassword1">
                      <button type="button" class="btn btn-outline-primary" id="togglePassword">
                        <i class="fa fa-eye"></i>
                      </button>
                    </div>
                  </div>

                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remeber this Device
                      </label>
                    </div>
                    <!-- <a class="text-primary fw-medium" href="<?=base_url('request_password')?>">Forgot Password?</a> -->
                  </div>

                  <button class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</button>

                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-medium">Powered By </p>
                    <a class="text-primary fw-medium ms-2" href="https://www.nugitech.com">Nugitech</a>
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    $("#togglePassword").click(function() {
      let passwordField = $("#exampleInputPassword1");
      let type = passwordField.attr("type") === "password" ? "text" : "password";
      passwordField.attr("type", type);

      // Toggle eye icon
      $(this).find("i").toggleClass("fa-eye fa-eye-slash");
    });
  });
</script>
