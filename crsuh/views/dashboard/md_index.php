<div class="container-fluid">
	<div class="card bg-light-info shadow-none position-relative overflow-hidden">
	    <div class="card-body px-4 py-3">
	      	<div class="row align-items-center">
		        <div class="col-9">
		          <h4 class="fw-semibold mb-8"><?=strtoupper($this->session->login->md_name)?>'S DASHBOARD</h4>
		          <nav aria-label="breadcrumb">
		            <ol class="breadcrumb">
		              <li class="breadcrumb-item">
		                <a class="text-muted" href="<?=base_url('dashboard')?>">Dashboard</a>
		              </li>
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
</div>