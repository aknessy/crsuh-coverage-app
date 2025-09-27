<div class="container-fluid">
	<div class="card bg-light-info shadow-none position-relative overflow-hidden">
	    <div class="card-body px-4 py-3">
	      	<div class="row align-items-center">
		        <div class="col-9">
		          <h4 class="fw-semibold mb-8"><?=ucwords(strtolower($company_name))?>'s Pay As You Earn (PAYE)</h4>
		          <nav aria-label="breadcrumb">
		            <ol class="breadcrumb">
		              <li class="breadcrumb-item">
		                <a class="text-muted" href="<?=base_url('dashboard')?>">Dashboard</a>
		              </li>
		              <li class="breadcrumb-item" <?=($this->uri->segment(1) == 'company' && $this->uri->segment(2) == 'paye') ? 'aria-current="page"' : ''?>>Paye</li>
		            </ol>
		          </nav>
		        </div>
		        <div class="col-3">
		          <div class="text-center mb-n5">
		              <img src="<?=base_url()?>assets/images/crypto/c3.jpg" alt="" class="img-fluid mb-n4">
		          </div>
		        </div>
	      	</div>
	    </div>
  	</div>
  	<div class="card w-100 position-relative overflow-hidden">
	    <div class="px-4 py-3 border-bottom">
	      <h5 class="card-title mb-0">
	        <span class="fw-semibold d-block 1h-sm">Processed Paye list</span>
	      </h5>
	    </div>
	    <div class="card-body p-4">
      		<div class="table-responsive rounded-2 mb-4">
		        <table id="dataTable" class="table border text-nowrap customize-table mb-0 align-middle">
		          	<thead class="text-dark fs-4">
			            <tr>
			              <?php 
			                foreach(['sn','ref','amount','year','month','status',''] as $key):
			                  echo "<th><h6 class='fs-4 fw-semibold mb-0'>" . ucfirst($key) . '</h6></th>';
			                endforeach;
			              ?>
			            </tr>
			        </thead>
		          	<tbody>
		          		<?php $i = 1; foreach($payments as $payment) { ?>
							<tr>
								<td><?=$i++?></td>
								<td><?=$payment->company_ref?></td>
								<td><?=$payment->amount?></td>
								<td><?=$payment->paye_year?></td>
								<td><?=$this->reports_m->get_month($payment->month)?></td>
								<td><?=$payment->status?></td>
								<td><a href="<?=base_url('company/invoice') . '/' . $payment->orderID?>" class="label label-primary">View</a></td>
							</tr>
						<?php } ?>
		         	</tbody>
		        </table>
			</div>
		</div>

	</div>

	<div class="row mt-10">
		<div class="col-6">
			<div class="card">
				<div class="px-4 py-3 border-bottom">
					<h5 class="card-title fw-semibold mb-0">Process New PAYE</h5>
				</div>
				<div class="card-body p-4">
					<form method="post" action="<?=base_url('company/paye')?>">
						<div class="mb-4">
							<label class="form-label fw-semibold">Year</label>
							<select class="form-select" name="year" required aria-label="Default select example">
								<option value="">Select A Year</option>
								<?php for($date = Date('Y'); $date >= 2000; $date--){ ?>
								<option value="<?=$date?>"><?=$date?></option>
								<?php } ?>
							</select>
							<?=form_error('year')?>
						</div>
						<div class="mb-4">
							<label class="form-label fw-semibold">Month</label>
							<select name="month" required class="form-select" required aria-label="Default select example">
								<?php $months = array("" => "Select A Month", "01" => "January", "02" => "February", "03" => "March", "04" => "April", "05" => "May", "06" => "June", "07" => "July", "08" => "August", "09" => "September", "10" => "October", "11" => "November", "12" => "December");
									foreach($months as $item => $month){ ?>
										<option value="<?=$item?>"><?=$month?></option>
								<?php } ?>
							</select>
							<?=form_error('year')?>
						</div>
						<div class="mb-4">
							<label class="form-label fw-semibold">Payment Method</label>
							<?php				
								$method_array = array(
									'' => 'Select An Option',
									'BANK_BRANCH' => 'BANK BRANCH - VISIT ANY BANK TO PAY',
									'UPL' => 'MASTER CARD / VISA CARD - PAY NOW WITH AN ATM CARD',
									'Interswitch' => 'VERVE CARD - PAY NOW WITH A VERVE CARD ATM',
									'BANK_INTERNET' => 'INTERNET BANKING/MOBILE WALLETS/OTHERS'
								);
								echo form_dropdown('paytype', $method_array, set_value('paytype'), "required class='form-select'");
								
							?>
							<span class="text-danger"><?=form_error('paytype')?></span>
						</div>
						<div class="col-12">
	                      <div class="d-flex align-items-center gap-3">
	                        <button class="btn btn-primary" type="submit">Submit</button>
	                        <button class="btn btn-light-danger text-danger" type="reset">Cancel</button>
	                      </div>
	                    </div>
	                </form>
				</div>
			</div>
		</div>
	</div>
</div>