	<ul class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>                    
        <li class="active">Generate Invoice</li>
    </ul>
	<div class="page-title">                    
		<h4><span class="fa fa-money"></span> Suctamba Resources Limited </h4>
	</div>
	
	<div class="page-content-wrap">
		<div class="row">
		
			<div class="col-md-3">
				<span class="tile tile-primary">
					<?=$total_invoices?>
					<p>Total Invoices</p>
				</span>
			</div>
			
			<div class="col-md-3">
				<a href="<?=base_url('payments/mvl')?>" class="tile tile-success">
					<?=$paid_invoices?>
					<p>Paid Invoices</p>
				</a>
			</div>
			
			<div class="col-md-3">
				<span class="tile tile-danger">
					<?=$unpaid_invoices?>
					<p>Unpaid Invoices</p>
				</span>
			</div>
			
			<div class="col-md-3">
				<span class="tile tile-warning">
					&#8358;<?=number_format(floatval($total_earning), 2)?>
					<p>Total Earnings</p>
				</span>
			</div>
			
			<div class="col-md-3">
				<span class="tile tile-warning">
					&#8358;<?=number_format(floatval($total_govt_rev), 2)?>
					<p>Total Govt Revenue</p>
				</span>
			</div>
		
			<div class="col-md-12">
				<?php if(isset($_SESSION['fail'])){ ?>
					<div class="col-md-12">
						<div class="alert alert-info push-down-20">
							<span style="color: #FFF500;"><i class="fa fa-check"></i></span> <?php echo $this->session->flashdata('fail'); ?>
							<button type="button" class="close" style="font-size:17px;" data-dismiss="alert">x</button>
						</div>
					</div>
				<?php } ?>
				<div class="col-md-7">
					<div class="panel panel-primary">
						<div class="panel-heading" style="background:#33414E;">
							Generate Invoice
						</div>
						<div class="panel-body">
							<div class="col-md-12">
								<form class="form-horizontal" action="<?php echo base_url('mvl'); ?>" name="formElem" method="post" role="form">
									<div class="form-group">
										<label class="col-md-3 control-label">TIN</label>
										<div class="col-md-9">                                                                                
											<input type="text" required class="form-control" autocomplete="off" name="tin" placeholder="TIN" value="<?=set_value('tin')?>" id="phone" style="width:100%;" />
											<span class="text-danger"><?=form_error('tin')?></span>
										</div>
									</div>
									<div class="form-group" style="margin-bottom:5px;">
										<label class="col-md-3 control-label">MDA</label>
										<div class="col-md-9">
											<?php
												
												$method_array = array(
													'4190005' => 'CRS INTERNAL REVENUE SERVICE'
												);
												echo form_dropdown('mda', $method_array, set_value('mda'), "required class='form-control myselect' style='width:100%'");
												
											?>
											<span class="text-danger"><?=form_error('mda')?></span>
										</div>
									</div>
									<div class="col-md-12" style="margin-bottom:7px;">
										 <span class="label label-danger label-form pull-right" id="mdaCode" style="display:none; font-size:15px; font-weight:600"></span> 
										<i class="fa fa-spinner fa-spin pull-right" id="spinner" style="display:none; margin-top:7px; margin-right:5px;"></i> 
										
									</div>
									<div class="form-group" style="margin-bottom:5px;">
										<label class="col-md-3 control-label">Revenue Head</label>
										<div class="col-md-9" id="revID">
											<?php
												
												$method_array = array(
													'' => 'Select An Option',
													'408012' => 'Road Worthiness Certificate',
													'403007' => 'Vehicle License',
													'408013' => 'Hackney Stage Carriage'
												);
												echo form_dropdown('revhead', $method_array, set_value('revhead'), "required class='form-control myselect' style='width:100%'");
												
											?>
											<span class="text-danger"><?=form_error('revhead')?></span>
										</div>
									</div>
									<div class="col-md-12" style="margin-bottom:7px;">
										<span class="label label-danger label-form pull-right" id="revHeadsCode" style="display:none; font-size:15px; font-weight:600"></span>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Amount</label>
										<div class="col-md-9">                                                                                
											<input type="text" step="0.001" required class="form-control" autocomplete="off" name="amount" placeholder="Amount" value="<?=set_value('amount')?>" id="amount" style="width:100%;" />
											<span class="text-danger"><?=form_error('amount')?></span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-3 control-label">Number Of Payments</label>
										<div class="col-md-9">                                                                                
											<input type="text" required class="form-control" autocomplete="off" name="num" placeholder="Number Of Payment" value="<?=set_value('num')?>" id="amount" style="width:100%;" />
											<span class="text-danger"><?=form_error('num')?></span>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Payment Method</label>
										<div class="col-md-9">
											<?php
												
												$method_array = array(
													'BANK_BRANCH' => 'BANK BRANCH - VISIT ANY BANK TO PAY',
												);
												echo form_dropdown('paytype', $method_array, set_value('paytype'), "required class='form-control myselect' style='width:100%'");
												
											?>
											<span class="text-danger"><?=form_error('paytype')?></span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-3 control-label">Phone Number</label>
										<div class="col-md-9">                                                                                
											<input type="text" required class="form-control" autocomplete="off" name="phone" placeholder="Phone Number" value="<?=set_value('phone', trim($payer_details->phone))?>" id="phone" style="width:100%;" maxlength="11" />
											<span class="text-danger"><?=form_error('phone')?></span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-3 control-label">Email</label>
										<div class="col-md-9">                                                                                
											<input type="email" autocomplete="off" required class="form-control" name="email" placeholder="Email Address" value="<?=set_value('email', trim($payer_details->email))?>" id="email" style="width:100%;" />
											<span class="text-danger"><?=form_error('email')?></span>
										</div>
									</div>
									
									<div class="col-md-6 pull-right col-xs-12 col-sm-12" style="background:#2D3945; border-radius:0px; margin-top:10px; margin-right:10px;">
										<button class="btn btn-primary btn-block home-button" style="border-radius:0px !important; padding-top:8px !important; padding-bottom:10px !important; color:#ccc;">Process Payment</button>
									</div>
								</form>
							</div>
							<div class="col-md-12" id="results" style="padding-left:0;padding-right:0;">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<script> 
	$(function(){
		
		function search(){
			var val = $('#keyword').val();
			if(val == ''){
				alert('Please enter a value');
			}else{
				$('#results').html('<div class="text-center" style="font-size:20px; color:#000; margin-top:15px;"><i class="fa fa-spinner fa-spin"></i> Processing...</div>');
				
				window.location.href="<?=base_url('taxpayers/search')?>" + '/' + val;
				/*
				$.ajax({
					url : '<?php echo base_url(); ?>' + 'lock/dosearch',
					type : 'POST',
					dataType : 'html',
					data : "keyword=" + val,
					success : function(response){
						$('#results').html(response);
					},
					error : function(resp){
						alert('An Error Occured!');
					}
				});
				*/
			}
		}
		
		$(document).keyup(function(e){
			if(e.keyCode == 27){
				$('#results').html('');
			}
		});

		$('#keyword').keyup(function(e) {
			if(e.keyCode == 13) {
				search();
			}
			if(e.keyCode == 8 && $('#keyword').val() == ''){
				$('#results').html('');
			}
		});
		
		$('#searchsubmit').on('click', function(e){
			e.preventDefault();
			search();
		});
		
	});
</script>