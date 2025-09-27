
<!--  Header Start -->
<header class="app-header">
  <nav class="navbar navbar-expand-lg navbar-light">
    <ul class="navbar-nav">
      <?php if($this->uri->segment(1) != "dashboard"){ ?>
        <li class="nav-item">
          <a class="nav-link ms-n3" href="javascript:history.back()">
            <div class="p-6 bg-light-primary rounded me-6 d-flex align-items-center justify-content-center">
              <i class="ti ti-arrow-left text-primary fs-6"></i>
            </div>
          </a>
        </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
          <i class="ti ti-menu-2"></i>
        </a>
      </li>
      <li class="nav-item d-none d-lg-block">
        <a class="nav-link nav-icon-hover" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="ti ti-search"></i>
        </a>
      </li>
    </ul>

    <div class="d-block d-lg-none">
      <img src="<?=base_url()?>assets/uploads/<?=$app_logo?>" class="dark-logo" height="40" alt="" />
      <img src="<?=base_url()?>assets/uploads/<?=$app_logo_white?>" class="light-logo"  height="40" alt="" />
    </div>
    <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="p-2">
        <i class="ti ti-dots fs-7"></i>
      </span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <div class="d-flex align-items-center justify-content-between">

        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
          <li class="nav-item">
            <div class="d-flex align-items-center gap-2 my-2">
              <a href="javascript:void(0)"  onclick="toggleTheme('<?=base_url()?>assets/css/style.min.css', 'light')"  class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 light-theme text-dark">
                <i class="ti ti-brightness-up fs-7 text-primary"></i>
                <span class="text-dark">Light</span>
              </a>
              <a href="javascript:void(0)" onclick="toggleTheme('<?=base_url()?>assets/css/style-dark.min.css', 'dark')" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 dark-theme text-dark">
                <i class="ti ti-moon fs-7 "></i>
                <span class="text-dark">Dark</span>
              </a>
            </div>
          </li>
          <!-- <li class="nav-item dropdown">
            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="ti ti-bell-ringing"></i>
              <div class="notification bg-primary rounded-circle"></div>
            </a>
            <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
              <div class="d-flex align-items-center justify-content-between py-3 px-7">
                <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
              </div>
              <div class="message-body" data-simplebar>
                <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                  <span class="me-3">
                    <img src="<?=base_url()?>assets/images/profile/user-1.jpg" alt="user" class="rounded-circle" width="48" height="48" />
                  </span>
                  <div class="w-75 d-inline-block v-middle">
                    <h6 class="mb-1 fw-semibold">Roman Joined the Team!</h6>
                    <span class="d-block">Congratulate him</span>
                  </div>
                </a>

              </div>
              <div class="py-6 px-7 mb-1">
                <button class="btn btn-outline-primary w-100"> See All Notifications </button>
              </div>
            </div>
          </li> -->
          <li class="nav-item dropdown">
            <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="d-flex align-items-center">
                <div class="user-profile-img">
                  <img src="<?=base_url()?>assets/images/profile/user-1.jpg" class="rounded-circle" width="35" height="35" alt="" />
                </div>
              </div>
            </a>
            <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
              <div class="profile-dropdown position-relative" data-simplebar>
                <div class="py-3 px-7 pb-0">
                  <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                </div>
                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                  <img src="<?=base_url()?>assets/images/profile/user-1.jpg" class="rounded-circle" width="80" height="80" alt="" />
                  <div class="ms-3">
                    <h5 class="mb-1 fs-3"><?=ucfirst($this->session->userdata("username"));?></h5>
                    <span class="mb-1 d-block text-dark"><?=$this->session->userdata("usertype");?></span>

                  </div>
                </div>

                <div class="d-grid py-4 px-7 pt-8">
                  <!-- <div class="upgrade-plan bg-light-primary position-relative overflow-hidden rounded-4 p-4 mb-9">
                    <div class="row">
                      <div class="col-6">
                        <h5 class="fs-4 mb-3 w-50 fw-semibold text-dark">Unlimited Access</h5>
                        <button class="btn btn-primary text-white">Upgrade</button>
                      </div>
                      <div class="col-6">
                        <div class="m-n4">
                          <img src="<?=base_url()?>assets/images/backgrounds/unlimited-bg.png" alt="" class="w-100">
                        </div>
                      </div>
                    </div>
                  </div> -->
                  <a href="<?=base_url('login/logout')?>" class="btn btn-outline-primary">Log Out</a>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<!--  Header End -->
