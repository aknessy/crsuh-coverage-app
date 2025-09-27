<div class="container-fluid">
	<div class="card bg-light-info shadow-none position-relative overflow-hidden">
	    <div class="card-body px-4 py-3">
	      <div class="row align-items-center">
	        <div class="col-9">
	          <h4 class="fw-semibold mb-8">Company Payments</h4>
	          <nav aria-label="breadcrumb">
	            <ol class="breadcrumb">
	              <li class="breadcrumb-item">
	                <a class="text-muted" href="<?=base_url('dashboard')?>">Dashboard</a>
	              </li>
	              <li class="breadcrumb-item" <?=($this->uri->segment(1) == 'company' && $this->uri->segment(2) == 'payments') ? 'aria-current="page"' : ''?>>Payments</li>
	            </ol>
	          </nav>
	        </div>
	        <div class="col-3">
	          <div class="text-center mb-n5">
	              <img src="<?=base_url()?>assets/images/products/payment-complete.gif" alt="" class="img-fluid mb-n4">
	          </div>
	        </div>
	      </div>
	    </div>
  	</div>

  	<div class="card w-100 position-relative overflow-hidden">
	    <div class="px-4 py-3 border-bottom">
	      <h5 class="card-title mb-0">
	        <span class="fw-semibold d-block 1h-sm mb-2">Payments Table</span>
	        <span class="d-block text-muted" style="font-size: 12px;">List of all <?=ucwords(strtolower($company_name))?>'s old and new payments.</span>
	      </h5>
    	</div>
    	<div class="card-body p-4">
      		<div class="table-responsive rounded-2 mb-4">
      			<table id="dataTable" class="table border text-nowrap customize-table mb-0 align-middle">
          			<thead class="text-dark fs-4">
			            <tr>
			              <?php 
			                foreach(['sn','rrr','amount','year','datetime','channel','description','status',''] as $key):
			                  echo "<th><h6 class='fs-4 fw-semibold mb-0'>" . ucfirst($key) . '</h6></th>';
			                endforeach;
			              ?>
			            </tr>
			        </thead>
          			<tbody>
          				<?php $i = 1; foreach($payments as $payment) { ?>
							<tr>
								<td><?=$i++?></td>
								<td><?=$payment->rrr?></td>
								<td><?=CURRENCY.number_format(floatval($payment->amount), 2)?></td>
								<td><?=$payment->year?></td>
								<td><?=$payment->generation_date . ' ' . $payment->time?></td>
								<td><?=$payment->payment_type?></td>
								<td><?=$payment->description?></td>
								<td><?=$payment->status == 'Approved' ? "<span class='badge bg-light-primary rounded-3 py-8 text-primary fw-semibold fs-2'>Paid</span>" : "<span class='badge bg-light-danger rounded-3 py-8 text-danger fw-semibold fs-2'>Unpaid</span>"?>
								</td>
								<td>
									<div class="dropdown dropstart">
					                    <a href="#" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
					                      <i class="ti ti-dots fs-5"></i>
					                    </a>
					                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
					                      <li>
					                        <a class="dropdown-item d-flex align-items-center gap-3" href="#" data-bs-toggle="modal" data-bs-target="#al-danger-alert">
					                        	<span class="fw-semibold <?=$payment->status=='Approved' ? 'text-success':'text-primary'?>">
					                        		<i class="fs-3 ti ti-trash"></i><?=$payment->status=='Approved'?'View':'Pay'?>
					                        	</span>
					                        </a>
					                      </li>
					                    </ul>
					                </div>
					            </td>
							</tr>
						<?php }$i++; ?>
          			</tbody>
          		</table>
      		</div>
      	</div>
    </div>
</div>