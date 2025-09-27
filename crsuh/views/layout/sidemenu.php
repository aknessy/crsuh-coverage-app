<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="<?= base_url('dashboard') ?>" class="text-nowrap logo-img">
                <img src="<?=base_url('assets/uploads/app_favicon.png')?>" class="dark-logo" height="40" alt="" />
                <img src="<?=base_url('assets/uploads/app_transparent_logo.png')?>" class="light-logo" height="40" alt="" />
            </a>
            <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link <? echo ($this->uri->segment(1) == 'md' && NULL == $this->uri->segment(2)) ? 'active' : ''; ?>"
                        href="<?= base_url('md') ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-home-2"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link <? echo ($this->uri->segment(1) == 'md/track_record' && $this->uri->segment(2) == 'track_record') ? 'active' : ''; ?>"
                        href="<?= base_url('md/track_record') ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-git-cherry-pick"></i>
                        </span>
                        <span class="hide-menu">Track Record</span>
                    </a>
                </li>

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Support</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link <? echo ($this->uri->segment(1) == 'chat') ? 'active' : ''; ?>"
                        href="<?= base_url('chat') ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-message-2"></i>
                        </span>
                        <span class="hide-menu">Chat</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link <? echo ($this->uri->segment(1) == 'support') ? 'active' : ''; ?>"
                        href="<?= base_url('support') ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-headset"></i>
                        </span>
                        <span class="hide-menu">Support Tickets</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link <? echo ($this->uri->segment(1) == 'profile') ? 'active' : ''; ?>"
                        href="<?= base_url('profile') ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-circle"></i>
                        </span>
                        <span class="hide-menu">Profile</span>
                    </a>
                </li>

            </ul>
            <div class="position-relative my-7 mt-7 rounded" style="margin-top: 100px!important;">
                <div class="d-flex">
                    <div class="unlimited-access-title w-100">
                        <p class="mb-6 text-dark w-100">App Version:</p>
                        <a href=""
                            class="fs-2 fw-semibold lh-sm">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3">
            <div class="hstack gap-3">
                <div class="john-img">
                    <img src="<?= base_url() ?>assets/images/profile/user-1.jpg" class="rounded-circle" width="40"
                        height="40" alt="">
                </div>
                <!-- <div class="john-title">
                    <h6 class="mb-0 fs-4 fw-semibold"><?= $this->session->userdata("username"); ?></h6>
                    <span class="fs-2 text-dark"><?= $this->session->userdata("usertype"); ?></span>
                </div>
                <a href="<?= base_url('login/logout') ?>" class="border-0 bg-transparent text-primary ms-auto"
                    tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="logout">
                    <i class="ti ti-power fs-6"></i>
                </a> -->
            </div>
        </div>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
<!--  Main wrapper -->
<div class="body-wrapper">