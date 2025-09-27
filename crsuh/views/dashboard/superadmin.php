<style type="text/css">
	td{
		font-size:15px !important;
		padding:8px 20px !important;
	}
</style>
	 <ul class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a></li>                    
        <li class="active">Home</li>
    </ul>
    <!-- END BREADCRUMB -->

    <div class="content-frame-top">                        
        <div class="page-title override_title">                    
            <h4><span class="fa fa-laptop"></span> Cross River Internal Revenue Service</h4>
        </div>                         
    </div>
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        
    <!-- START WIDGETS -->                    
    <div class="row">
        <div class="col-md-3">
			<span class="tile tile-primary">
				<?=$total_taxpayers;?>
				<p>Taxpayers</p>
			</span>
        </div>
		
        <div class="col-md-3">
			<span class="tile tile-success">
				<?=$payment_old_total?>
				<p>Old Payments</p>
			</span>
        </div>
		
        <div class="col-md-3">
			<span class="tile tile-danger">
				<?=$payment_new_total?>
				<p>New Payments</p>
			</span>
        </div>
		
        <div class="col-md-3">
			<span class="tile tile-warning">
				&#8358;<?=number_format(floatval($payment_sum), 2);?>
				<p>Total Income</p>
			</span>
        </div>
		
        <div class="col-md-3">
			<span class="tile tile-info">
				<?=$payment_by_card['number']?>
				<p>Card Payments</p>
			</span>
        </div>
		
        <div class="col-md-3">
			<span class="tile tile-default">
				<?=$payment_by_branch['number']?>
				<p>Bank Payments</p>
			</span>
        </div>
		
		<div class="col-md-3">
			<span class="tile tile-primary">
				<?=$payment_by_internet_banking['number']?>
				<p>Internet Banking</p>
			</span>
        </div>
		
        <div class="col-md-3">
			<span class="tile tile-success">
				<?=$payment_by_clearance['number']?>
				<p>Tax Clearance Payments</p>
			</span>
        </div>
		
        <div class="col-md-3">
			<span class="tile tile-danger">
				<?=$payment_by_direct['number']?>
				<p>Direct Assessment Payments</p>
			</span>
        </div>
		
        <div class="col-md-3">
			<a href="<?=base_url('mdas')?>" class="tile tile-warning">
				<?=$total_mdas?>
				<p>MDAs</p>
			</a>
        </div>
		
        <div class="col-md-3">
			<span class="tile tile-info">
				<?=$total_txoffices?>
				<p>Tax Offices</p>
			</span>
        </div>
		
        <div class="col-md-3">
			<span class="tile tile-default">
				<?=$revenue_sources?>
				<p>Revenue Heads</p>
			</span>
        </div>
		<?php if($this->session->username == 'docaustyne'){ ?>
			<div class="col-md-3">
				<span class="tile tile-primary">
					&#8358;<?=number_format(floatval($nugitech_fee->sum), 2)?>
					<p>Total Nugi Commission</p>
				</span>
			</div>
			<div class="col-md-3">
				<span class="tile tile-success">
					<?=$paid_invoices?>
					<p>Paid Invoices</p>
				</span>
			</div>
			<div class="col-md-3">
				<span class="tile tile-danger">
					<?=$unpaid_invoices?>
					<p>Unpaid Invoices</p>
				</span>
			</div>
		<?php } ?>
		
		<? /*
        <div class="col-md-4">
            
            <!-- START WIDGET REGISTRED -->
            <div class="widget widget-success widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-briefcase"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">
                    	<?php
							if($total_sectors != 0){
								
								echo  $total_sectors;
							
							}else{
								
								echo '0';
							
							}
						?>
                    </div>
                    <div class="widget-title">Different Sectors</div>
                    <a href="<?php echo base_url('admin/sectors') ?>" class="widget-subtitle">View all</a>
                </div>
            </div>                            
            <!-- END WIDGET REGISTRED -->
            
        </div>

        <div class="col-md-4">
            
            <!-- START WIDGET REGISTRED -->
            <div class="widget widget-info widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-building"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">
                    	<?php
							if($total_txoffices != 0){
								
								echo  $total_txoffices;
							
							}else{
								
								echo '0';
							
							}
						?>
                    </div>
                    <div class="widget-title">Tax Offices</div>
                    <a href="<?php echo base_url('admin/taxoffices') ?>" class="widget-subtitle">View all</a>
                </div>
            </div>                            
            <!-- END WIDGET REGISTRED -->
            
        </div>

        <div class="col-md-4">
            
            <!-- START WIDGET REGISTRED -->
            <div class="widget widget-warning widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-group"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">
                    	<?php
							if($total_taxpayers != 0){
								
								echo  $total_taxpayers;
							
							}else{
								
								echo '0';
							
							}
						?>
                    </div>
                    <div class="widget-title">Total taxpayers</div>
                    <a href="<?php echo base_url('admin/taxpersons') ?>" class="widget-subtitle">View all</a>
                </div>
            </div>                            
            <!-- END WIDGET REGISTRED -->
            
        </div>

        <div class="col-md-4">
            
            <!-- START WIDGET REGISTRED -->
            <div class="widget widget-default widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-list"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">
                    	<?php
							if($revenue_sources != 0){
								
								echo  $revenue_sources;
							
							}else{
								
								echo '0';
							
							}
						?>
                    </div>
                    <div class="widget-title">Revenue Sources</div>
                    <a href="<?php echo base_url('admin/revenueheads') ?>" class="widget-subtitle">View all</a>
                </div>
            </div>                            
            <!-- END WIDGET REGISTRED -->
            
        </div>
		*/ ?>
    </div>
    <!-- END WIDGETS --> 
    
    <div class="row">
    	<div class="col-md-7">
                            
            <!-- START USERS ACTIVITY BLOCK -->
            <div class="panel panel-primary">
                <div class="panel-heading" style="background:#33414E;">
                    <div class="panel-title-box">
                        <h3 style="color:#fff;">Payment History</h3>
                        <span>Statistics of payment recorded.</span>
                    </div>                                    
                    <ul class="panel-controls" style="margin-top: 2px;">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>                                      
                    </ul>                                    
                </div>                                
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="dashboard-bar-1" style="height: 285px;"></div>
					<?php
						//echo $payment_sum;
					?>
                </div>                                    
            </div>
            <!-- END USERS ACTIVITY BLOCK -->
            
        </div>

        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background:#33414E;">
					<div class="panel-title-box">
                        <h3 style="color:#fff;">Payment Statistics</h3>
						<span>Statistics Of All Payments</span>
                    </div>
				</div>
				<div class="panel-body">
					<?php //var_dump($this->reports_m->get_payments_by_category()); ?>
					
					<table class="table table-responsive table-bordered table-hover">
						<thead>
							<tr>
								<th>Payment</th>
								<th>Revenue</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Tax Payment</td><td><strong>&#8358;<?=$payment_by_tax['income'] ? number_format(floatval($payment_by_tax['income']), 2) : '0.00'?></strong></td>
							</tr>
							<tr>
								<td>Direct Assessment</td><td><strong>&#8358;<?=$payment_by_direct['income'] ? number_format(floatval($payment_by_direct['income']), 2) : '0.00' ; ?></strong></td>
							</tr>
							<tr>
								<td>Tax Clearance</td><td><strong>&#8358;<?=$payment_by_clearance['income'] ? number_format(floatval($payment_by_clearance['income']), 2) : '0.00' ; ?></strong></td>
							</tr>
						</tbody>
					</table>
				</div>
            </div>
        </div>
    </div>
</div>
