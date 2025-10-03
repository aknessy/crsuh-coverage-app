<div class="container-fluid">
	<div class="row mb-3">
		<div class="col-xl-4 col-lg-4 col-sm-6">
			<div class="card border-0 zoom-in bg-light-success border border-success shadow-sm">
				<div class="card-body">
					<div class="text-center">
					<img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-speech-bubble.svg" width="50" height="50" class="mb-3" alt="">
					<p class="fw-semibold fs-3 text-success mb-1">Total MDs</p>
					<h5 class="fw-semibold text-success mb-0"><?=number_format($total_mds, 0, ',', ',')?></h5>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-sm-6">
			<div class="card border-0 zoom-in bg-light-warning border border-warning shadow-sm">
				<div class="card-body">
					<div class="text-center">
						<img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-briefcase.svg" width="50" height="50" class="mb-3" alt="">
						<p class="fw-semibold fs-3 text-warning mb-1">KPIs</p>
						<h5 class="fw-semibold text-warning mb-0"><?=number_format($total_kpis, 0, ',', ',')?></h5>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-sm-6">
			<div class="card border-0 zoom-in bg-light-danger border border-danger shadow-sm">
                <div class="card-body">
					<div class="text-center">
						<img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-favorites.svg" width="50" height="50" class="mb-3" alt="">
						<p class="fw-semibold fs-3 text-danger mb-1">Tracked Patients</p>
						<h5 class="fw-semibold text-danger mb-0"><?=number_format($total_tracked_patients, 0, ',', ',')?></h5>
					</div>	
                </div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-sm-12">
			<div class="card shadow-sm">
				<div class="px-4 py-3 bg-light d-flex align-items-center justify-content-between">
					<div>
						<h4 class="card-title fw-semibold mb-0">MD List</h4>
						<p class="card-text">List of all saved MDs</p>
					</div>
					<div>
						<a href="<?=base_url('users/create_md')?>" class="btn btn-primary"><i class="ti ti-plus"></i> Add MD</a>
					</div>
				</div>
				<div class="card-body">
					<?php if($total_mds == 0): ?>
                        <div class="row mt-4" id="emptyState">
                            <div class="col-12 text-center">
                                <div class="text-center">
                                    <img src="<?= base_url('assets/images/empty-state.svg') ?>" alt="No Members" class="img-fluid" style="max-height: 200px;">
                                    <h4 class="mt-3">No MDs Found</h4>
                                    <p class="text-muted">No MDs currently exists. Click the button above to add your first MD.</p>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
						<div class="table-responsive">
                            <table id="mds-table" class="table table-centered w-100 dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>MD NAME</th>
                                        <th>MD CODE</th>
                                        <th>MD STATE</th>
                                        <th>MD LGA</th>
										<th>PASSWORD</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    <?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function() {
    var table = $('#mds-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '<?= base_url('dashboard/get_md_data') ?>',
            type: 'POST'
			// dataSrc: function(json) {
            //     console.log('Server response:', json); // Log the raw response
            //     return json.data;
            // },
            // error: function(xhr, error, thrown) {
            //     console.error('AJAX Error:', xhr.responseText);
            // }
        },
        columns: [
            { data: 'id' },
            { data: 'md_name' },
            { data: 'md_code' },
            { data: 'md_state' },
            { data: 'md_lga' },
            { data: 'password' },
            { 
                data: 'actions',
                orderable: false,
                searchable: false
            }
        ],
        order: [[0, 'desc']],
        pageLength: 5,
        language: {
            paginate: {
                previous: "<i class='ti caret-left'>",
                next: "<i class='ti caret-right'>"
            }
        },
        drawCallback: function() {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
        }
    });
});
</script>