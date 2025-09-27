 <ul class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard/user') ?>">Home</a></li>                    
        <li class="active">Dashboard</li>
    </ul>
    <!-- END BREADCRUMB -->                       
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        
        <!-- START WIDGETS -->                    
        <div class="row">
            <div class="col-md-4">

                <!-- START WIDGET REGISTRED -->
                <div class="widget widget-primary widget-item-icon">
                    <div class="widget-item-left">
                        <span class="fa fa-list"></span>
                    </div>
                    <div class="widget-data">
                        <div class="widget-int num-count"><?php echo count($new_payments); ?></div>
                        <div class="widget-title">New Payments</div>
                        <a href='<?php echo base_url("payments"); ?>'><div class="widget-subtitle">View Reports</div></a>
                    </div>
                </div>                            
                <!-- END WIDGET REGISTRED -->
            </div>
			
			<div class="col-md-4">

                <!-- START WIDGET REGISTRED -->
                <div class="widget widget-warning widget-item-icon">
                    <div class="widget-item-left">
                        <span class="fa fa-list"></span>
                    </div>
                    <div class="widget-data">
                        <div class="widget-int num-count"><?php echo count($old_payments); ?></div>
                        <div class="widget-title">Old Payments</div>
                        <a href='<?php echo base_url("payments/old"); ?>'><div class="widget-subtitle">View Reports</div></a>
                    </div>
                </div>                            
                <!-- END WIDGET REGISTRED -->
            </div>
			
            <div class="col-md-4">
			
                
                <!-- START WIDGET REGISTRED -->
                <div class="widget widget-success widget-item-icon">
                    <div class="widget-item-left">
                        <span class="fa fa-user"></span>
                    </div>
					<?php if(isset($payer->email)){
						$q = 1;
					}
					if(isset($payer->name)){
						$p = 1;
					}
					if(isset($payer->address)){
						$r = 1;
					}
					if(isset($payer->phone)){
						$s = 1;
					}
					if(isset($payer->type)){
						$t = 1;
					}
					$percent = ($p + $q + $r + $s + $t) * 20;
					
					?>
                    <div class="widget-data">
                        <div class="widget-int num-count"><?php echo $percent; ?>%</div>
                        <div class="widget-title">My Profile</div>
                        <div class="widget-subtitle"><?php if ($percent == 100) echo 'Complete!'; ?></div>
                    </div>
                </div>                            
                <!-- END WIDGET REGISTRED -->
                
            </div>
        </div>
        <!-- END WIDGETS --> 
        
        <div class="row">
            <div class="col-md-7">
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
					</div>                                    
				</div>
				<!-- END USERS ACTIVITY BLOCK -->
				
			</div>
            <div class="col-md-5">
				<div class="panel panel-primary">
					<div class="panel-heading" style="background:#33414E;">
						<div class="panel-title-box">
							<h3 style="color:#fff;">Profile</h3>
							<span>User Profile</span>
						</div>
					</div>
					<div class="panel-body form-group-separated">
						<div class="form-group col-md-12">
							<label class="col-md-3 col-xs-12 control-label">Fullname</label>
							<div class="col-md-6 col-xs-12">                                            
								<?=$payer->name?>
							</div>
						</div>
						<div class="form-group col-md-12">
							<label class="col-md-3 col-xs-12 control-label">TIN</label>
							<div class="col-md-6 col-xs-12">                                            
								<?=$this->taxpayment_m->get_tin_by_payerID($payer->id)->tin?>
							</div>
						</div>
						<div class="form-group col-md-12">
							<label class="col-md-3 col-xs-12 control-label">Email</label>
							<div class="col-md-6 col-xs-12">                                            
								<?=$payer->email?>
							</div>
						</div>
						<div class="form-group col-md-12">
							<label class="col-md-3 col-xs-12 control-label">Phone</label>
							<div class="col-md-6 col-xs-12">                                            
								<?=$payer->phone?>
							</div>
						</div>
						<div class="form-group col-md-12">
							<label class="col-md-3 col-xs-12 control-label">Address</label>
							<div class="col-md-6 col-xs-12">                                            
								<?=$payer->address?>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
	</div>
        
    <!-- END PAGE CONTENT WRAPPER -->  