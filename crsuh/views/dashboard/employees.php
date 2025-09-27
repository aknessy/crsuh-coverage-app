

<div class="container-fluid">

  <div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">Company Employees</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted" href="<?=base_url('dashboard')?>">Dashboard</a>
              </li>
              <li class="breadcrumb-item" <?=($this->uri->segment(1) == 'company' && $this->uri->segment(2) == 'employees') ? 'aria-current="page"' : ''?>>Employees</li>
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
  <div class="card w-100 position-relative overflow-hidden">
    <div class="px-4 py-3 border-bottom">
      <h5 class="card-title mb-0">
        <span class="fw-semibold d-block 1h-sm">Employees</span>
        <span class="d-block text-muted" style="font-size: 12px;">List of company employees and their necessary information.</span>
      </h5>
    </div>
    <div class="card-body p-4">
      <div class="table-responsive rounded-2 mb-4">
        <table id="dataTable" class="table border text-nowrap customize-table mb-0 align-middle">
          <thead class="text-dark fs-4">
            <tr>
              <?php 
                foreach(['sn','name','tin','salary','paye',''] as $key):
                  echo "<th><h6 class='fs-4 fw-semibold mb-0'>" . ucfirst($key) . '</h6></th>';
                endforeach;
              ?>
            </tr>
          </thead>
          <tbody>
            <?php 
              $i = 1;
              foreach($employees as $staff):
            ?>

              <tr>
                <td><?=$i?></td>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="<?=base_url()?>assets/images/profile/user-1.jpg" class="rounded-circle" width="40" height="40">
                    <div class="ms-3">
                      <h6 class="fs-3 fw-semibold mb-0"><?=$this->taxpayment_m->get_payer_details($staff->tin)->name?></h6>
                      <span class="fs-2 fw-normal text-muted"><?=strtoupper($staff->designation)?></span>
                    </div>
                  </div>
                </td>
                <td><p class="mb-0 fw-normal fs-3"><?=$staff->tin?></p></td>
                <td>
                  <h6 class="fs-3 fw-semibold mb-0"><?=CURRENCY.number_format(floatval($staff->salary), 2);?></h6>
                </td>
                <td>
                  <h6 class="fs-3 fw-semibold mb-0"><?=CURRENCY.number_format(floatval($this->employees_m->vat($staff->salary)), 2);?></h6>
                </td>
                <td>
                  <div class="dropdown dropstart">
                    <a href="#" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="ti ti-dots fs-5"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                      <li>
                        <a class="dropdown-item d-flex align-items-center gap-3" href="#" data-bs-toggle="modal" data-bs-target="#al-danger-alert"><i class="fs-3 ti ti-trash"></i>Delete</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>

            <?php
              $i++;
              endforeach;
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="modal fade show" id="al-warning-alert" tabindex="-1" aria-labelledby="vertical-center-modal" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content modal-filled bg-light-warning">
        <div class="modal-body p-4">
          <div class="text-center text-warning">
            <i class="ti ti-alert-octagon fs-7"></i>
            <h4 class="mt-2">Confirm Action</h4>
            <p class="mt-3">
              The selected action will delete the employee. Please confirm that this is what you wish to do.
            </p>
            <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">
              Confirm
            </button>
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
  </div>

</div>