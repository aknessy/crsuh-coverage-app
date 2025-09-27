	<ul class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>                    
        <li class="active">Manage Staff</li>
    </ul>
	<div class="page-title">                    
		<h4><?=$this->session->name?></h4>
	</div>
	
	<div class="page-content-wrap">
		<div class="row">
			<div class="col-md-12">
			
				<?php if(isset($_SESSION['flashSuccess'])){ ?>
					<div class="col-md-12">
						<div class="alert alert-info push-down-20">
							<span style="color: #FFF500;"><i class="fa fa-check"></i></span> <?php echo $this->session->flashdata('flashSuccess'); ?>
							<button type="button" class="close" style="font-size:17px;" data-dismiss="alert">x</button>
						</div>
					</div>
				<?php } ?>
				
				<?php if(isset($_SESSION['flashError'])){ ?>
					<div class="col-md-12">
						<div class="alert alert-danger push-down-20">
							<?php echo $this->session->flashdata('flashError'); ?>
						</div>
					</div>
				<?php } ?>
				
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Staff Account List
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table datatable table-striped table-bordered table-hover table-actions">
									<thead>
										<tr>
											<th class="col-md-1">S/N</th>
											<th>Fullname</th>
											<th>Username</th>
											<th>Phone</th>
											<th>Email</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; foreach($staffs as $staff){ ?>
											<tr>
												<td><?=$i++?></td>
												<td><?=$staff->first_name . ' ' . $staff->last_name?></td>
												<td><?=$staff->username?></td>
												<td><?=$staff->phone?></td>
												<td><?=$staff->email?></td>
												<td><?=$staff->active == 1 ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>'?></td>
												<td>
													<?php if($staff->active == 1){ ?>
														<a href="<?=base_url('staff/deactivate') . '/' . $staff->id?>" class="label label-warning">Deactivate</a>
													<?php }else{ ?>
														<a href="<?=base_url('staff/activate') . '/' . $staff->id?>" class="label label-warning">Activate</a>
													<?php } ?>
													<a class="label label-danger" href="<?=base_url('staff/delete') . '/' . $staff->id?>">Delete</a>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							Add New Staff Account
						</div>
						<div class="panel-body">
							<form action="<?=base_url('users/add')?>" method="post">
								<div class="form-group" style="margin-bottom:15px">
									<label class="col-md-12 control-label" style="margin-top:7px;">Fullname</label>
									<?php echo form_input(
											array(
												'name'=>'name',
												'value'=>set_value('name'),
												'class'=>'form-control col-md-12',
												'placeholder'=>'Fullname')
											); 
									?>
									<?=form_error('name')?>
								</div>
								
								<div class="form-group" style="margin-bottom:15px">
									<label class="col-md-12 control-label" style="margin-top:7px;">Username</label>
									<?php echo form_input(
												array(
													'name'=>'username',
													'value'=>set_value('username'),
													'class'=>'form-control col-md-12',
													'placeholder'=>'Username')
												); 
										?>
									<?=form_error('username')?>
								</div>
								
								<div class="form-group" style="margin-bottom:15px">
									<label class="col-md-12 control-label" style="margin-top:7px;">User Type</label>
									<select name="type" class="form-control col-md-12">
										<option value="">Select A User</option>
										<option value="Nugi">Nugi Staff</option>
										<option value="Accountant">Accountant</option>
										<option value="Auditor">Auditor</option>
									</select>
									<?=form_error('type')?>
								</div>
								
								<div class="form-group" style="margin-bottom:15px">
									<label class="col-md-12 control-label" style="margin-top:7px;">Company</label>
									<select name="company" class="form-control col-md-12">
										<option value="">Select An Option</option>
										<option value="Nugi Technologies">Nugi Technologies</option>
										<option value="IRS">IRS</option>
									</select>
									<?=form_error('company')?>
								</div>
								
								<div class="form-group" style="margin-bottom:15px">
									<label class="col-md-12 control-label" style="margin-top:7px;">Password</label>
									<?php echo form_input(
												array(
													'name'=>'password',
													'value'=>set_value('password'),
													'class'=>'form-control col-md-12',
													'placeholder'=>'Password')
												); 
										?>
									<?=form_error('password')?>
								</div>
								
								<div class="form-group" style="margin-bottom:15px">
									<label class="col-md-12 control-label" style="margin-top:7px;">Phone</label>
									<?php echo form_input(
												array(
													'name'=>'phone',
													'value'=>set_value('phone'),
													'class'=>'form-control col-md-12',
													'placeholder'=>'Phone')
												); 
										?> 
									<?=form_error('phone')?>
								</div>
								
								<div class="form-group" style="margin-bottom:15px">
									<label class="col-md-12 control-label" style="margin-top:7px;">Email</label>
									<?php echo form_input(
												array(
													'name'=>'email',
													'value'=>set_value('email'),
													'class'=>'form-control col-md-12',
													'placeholder'=>'Email')
												); 
										?> 
									<?=form_error('email')?>
								</div>
								
								
								<div class="form-group" >
									<div class="col-md-12 col-xs-7" style="margin-top:8px;">
										<button type="submit" class="btn btn-primary pull-right" style="border-radius:2px;">Submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>