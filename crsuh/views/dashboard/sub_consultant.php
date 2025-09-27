<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>                    
    <li class="active">Dashboard</li>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title override_title">
    <h2><span class="fa fa-black-tie"></span> <?php echo $agent_profile->agent_name .' - '. $sub_agent_profile->name ?><span style="font-weight: bold; font-size: 25px; color: #2d3945;"></span></h2>
</div>                   

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    
    <!-- START WIDGETS -->                    
    <div class="row">
		<div class="col-md-4">
			<span class="tile tile-primary">
				<?=($payment_count == NULL)? '0' : $payment_count;?>
				<p>Generated Invoice</p>
			</span>
        </div>
		
        <div class="col-md-4">
			<span class="tile tile-success">
				<?=($approved_count == NULL)? '0' : $approved_count;?>
				<p>Approved Invoice</p>
			</span>
        </div>
		
		<div class="col-md-4">
			<span class="tile tile-warning">
				<?=($pending_count == NULL)? '0' : $pending_count;?>
				<p>Pending Invoice</p>
			</span>
        </div>
    </div>
    <!-- END WIDGETS -->                    
    
    <div class="row">
        <div class="col-md-8">
            
            <!-- START USERS ACTIVITY BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Monthly Income</h3>
                        <span>Review of income made for the month of <?php echo date('F Y'); ?></span>
                    </div>                                    
                    <ul class="panel-controls" style="margin-top: 2px;">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                            <ul class="dropdown-menu">
                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                            </ul>                                        
                        </li>                                        
                    </ul>                                    
                </div>                                
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="dashboard-bar-1" style="height: 330px;"></div>
                </div>                                    
            </div>
            <!-- END USERS ACTIVITY BLOCK -->
            
        </div>

        <div class="col-md-4">
            
            <!-- START PROJECTS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-body profile bg-primary">
                    <div class="profile-image">
                        <img src="https://crossriverpay.com/assets/main/img/user_avatar.png" alt="John Doe" style="background: #fff;">
                    </div>

                    <div class="profile-data">
                        <div class="profile-data-name"> </div>
                        <div class="profile-data-title"></div>
                    </div>

                    <div class="profile-controls">
                        <a href="#" class="profile-control-left"><span class="fa fa-twitter"></span></a>
                        <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                    </div>
                </div>

                <div class="panel-body list-group">
                    <a href="#" class="list-group-item" style="height: 62px; line-height: 38px;"><div class="list-group-status status-online"></div> <?php echo 'Name: '.$sub_agent_profile->name ?></a>
                    <a href="#" class="list-group-item" style="height: 62px; line-height: 38px;"><div class="list-group-status status-online"></div> <?php echo 'Username: '.$sub_agent_profile->username ?></a>
                    <a href="#" class="list-group-item" style="height: 62px; line-height: 38px;"><div class="list-group-status status-online"></div> <?php echo 'Phone: '. $sub_agent_profile->phone ?></a>
                    <a href="#" class="list-group-item" style="height: 62px; line-height: 20px;"><div class="list-group-status status-online"></div> <?php echo 'Collection Point: '. $sub_agent_profile->col_point ?></a>
                </div>
            </div>
            <!-- END PROJECTS BLOCK -->
            
        </div>
    </div>
    
</div>
<!-- END PAGE CONTENT WRAPPER --> 