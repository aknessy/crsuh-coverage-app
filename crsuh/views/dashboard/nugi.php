	<ul class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>                    
        <li class="active">Taxpayers</li>
    </ul>
	<div class="page-title">                    
		<h4><span class="fa fa-money"></span> Taxpayers Record </h4>
	</div>
	
	<div class="page-content-wrap">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-12">
					<div class="panel panel-primary">
						<div class="panel-heading" style="background:#33414E;">
							Taxpayer Record
						</div>
						<div class="panel-body">
							<div class="col-md-12">
								<div class="form-group" style="margin-bottom:0px;display:block;">
									<div class="input-group input-group-lg">
										<?php 
												
											echo form_input(
												array(
													'name' => 'search',
													'id' => 'keyword',
													'class' => 'form-control input-lg',
													'value' => set_value('search'),
													'autocomplete' => 'off',
													'title'=>'Enter Keyword e.g name or email',
													'placeholder' => 'Keyword',
													'aria-describedby'=>'basic-addon1',
													'style' => 'font-size:15px'
												)
											);
											?>
										<span class="input-group-addon" id="searchsubmit" style="cursor:pointer">
											<span class="fa fa-search"></span>
										</span>
									</div>
									<span class="search-info" style="font-size:15px; text-align:left; margin-top:7px;">Search by: Name,  phone, email and address</span>
								</div>
							</div>
							<div class="col-md-12" id="results" style="padding-left:0;padding-right:0;">
							</div>
							<? /*
							<div class="table-responsive">
								<table class="table datatable table-striped table table-bordered table-hover table-actions">
									<thead>
										<tr>
											<th class="col-md-1">S/N</th>
											<th class="col-md-3">Name</th>
											<th>Tin</th>
											<th>Phone</th>
											<th>Email</th>
											<th>Address</th>
											<th>TaxOffice</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; foreach($payers as $payer){ ?>
											<tr>
												<td><?=$i++?></td>
												<td><?=ucwords(strtolower($payer->name))?></td>
												<td><?=$this->taxpayment_m->get_tin_by_payerID($payer->id)->tin?></td>
												<td><?=$payer->phone?></td>
												<td><?=$payer->email?></td>
												<td><?=$payer->address?></td>
												<td><?=$payer->taxoffice_id?></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
							*/ ?>
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