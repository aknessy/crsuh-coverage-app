<div class="container-fluid">
  <div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">Enrollments</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item" aria-current="page">All Enrollments</li>
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
  <div class="widget-content list">
    <!---end Contact -->

    <div class="card card-body">
      <?php if($records){ ?>
        <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
					<div class="mb-3 mb-sm-0">
						<h5 class="card-title fw-semibold">All Enrollment</h5>
						<p class="card-subtitle mb-0">List of all enrollments</p>
					</div>
				</div>
        <div class="table-responsive" id="resultDisplay">
          <table class="table search-table table-bordered align-middle table-responsive" id="table">
						<thead>
							<tr>
								<th class="col-md-1">S/N</th>
                <th>Name</th>
                <th>TIN</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Date Enrolled</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; foreach($records as $record){ ?>
								<tr>
									<td><?=$i++?></td>
									<td><?=$record->name?></td>
                  <td><?=$record->tin?></td>
									<td><?=$record->phone?></td>
                  <td><?=$record->address?></td>
                  <td><?=$record->datemodified?></td>
								</tr>
							<?php } ?>
						</tbody>
          </table>
        </div>
      <?php }else{ ?>
        <div class="row justify-content-center w-100">
          <div class="col-lg-4">
            <div class="text-center">
              <img src="<?=base_url()?>assets/images/backgrounds/taxpayer.png" alt="" style="width: 200px;" class="img-fluid">
              <h1 class="fw-semibold mb-2 fs-9">No Enrollments Found</h1>
              <p class="mb-7">All Enrollments will be displayed here!</p>
              <a class="btn btn-primary" href="javascript:location.reload();" role="button">Reload Data</a>
            </div>
          </div>
        </div>
			<?php } ?>
    </div>
  </div>
</div>
<script type="text/javascript">
	function search_payments(){

		var search = $('#input-search').val();
		var date = "<?=$date?>";

		if (search == "" || search == undefined || search == null) {
			errorMessage('Search cannot be empty!')
			return false
		}

		$('#btn-search').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`)

		$.ajax({
	    type: "POST",
	    url: '<?=base_url('invoice/search_payments')?>',
	    data: {search: search, date: date},
	    success: function(res){

	      $('#btn-search').html(`<i class="ti ti-search text-white me-1 fs-5"></i> Search`);

	      if(res == 400){
	        // $('.loader').hide();
					errorMessage('Reference not found!')
          $('#resultDisplay').html('');
          $('#table').dataTable();
	      }else{
	        $('#resultDisplay').html(res);
          $('#table').dataTable();
	      }
	    },
	    error: function(error){
	      errorMessage('Oops! Something went wrong.')
	      $('.loader').html(`<i class="ti ti-search text-white me-1 fs-5"></i> Search`);
	    }
	  });
	}

	var count = "<?=$recordsCount?>";
	function loadMore(){

	  if($(".order-each").length == count){
	    $('.load_more').hide();
	    return false;
	  }

	  $('.load_more').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`);
	  var offset = $(".order-each").length;

	  var data = get_query();
	  data.offset = offset;

	  // console.log(data);

	  $.ajax({
	    type: "POST",
	    url: '<?=base_url('pay/filter')?>',
	    data: data,
	    success: function(res){

	      $('.load_more').html('Load More');

	      if(res == 400){
	        $('.load_more').hide();
	      }else{
	        $('#products-result').append(res);

	        if($(".order-each").length == count){
	          $('.load_more').hide();
	        }
	      }

	      $('#eachCount').html($(".order-each").length);
	    },
	    error: function(error){
	      errorMessage('Oops! Something went wrong.')
	      $('.load_more').html('Load More');
	    }
	  });
	}
</script>

<script>
$(function(e){

	if(e.keyCode == 13) {
		search_payments();
	}

	$(document).keyup(function(e){
		if(e.keyCode == 27){
			// $('#resultDisplay').html('');
		}
	});

	$('#input-search').keyup(function(e) {
		if(e.keyCode == 13) {
			search_payments();
		}
		if(e.keyCode == 8 && $('#input-search').val() == ''){
			// $('#resultDisplay').html('');
		}
	});

});
</script>
