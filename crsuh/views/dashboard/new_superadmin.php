<div class="container-fluid">

  <div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100 bg-light-info overflow-hidden shadow-none">
        <div class="card-body position-relative">
          <div class="row">
            <div class="col-sm-7">
              <div class="d-flex align-items-center mb-7">
                <h5 class="fw-semibold mb-0 fs-5">Welcome back <?=$this->session->userdata("fullname");?></h5>
              </div>
              <div class="d-flex align-items-center">
                <div class="border-end pe-4 border-muted border-opacity-10">
                  <h3 class="mb-1 fw-semibold fs-8 d-flex text-danger align-content-center"><?=CURRENCY.number_format(floatval($today_payment), 2);?></h3>
                  <p class="mb-0 text-info">Today’s Collections</p>
                </div>
                <div class="border-end pe-4 border-muted border-opacity-10 ps-4">
                  <h3 class="mb-1 fw-semibold fs-8 d-flex text-info align-content-center"><?=CURRENCY.number_format(floatval($payment_sum), 2);?><i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                  <p class="mb-0 text-info">Total Collections</p>
                </div>
                <div class="ps-4">
                  <h3 class="mb-1 fw-semibold fs-8 d-flex text-success align-content-center"><?=CURRENCY.number_format(floatval($payment_settled), 2);?></h3>
                  <p class="mb-0 text-info">Total Settled</p>
                </div>
              </div>
            </div>
            <div class="col-sm-5">
              <div class="welcome-bg-img mb-n7 text-end">
                <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/welcome-bg.svg" alt="" class="img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!--  Row 1 -->
  <div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-body">
          <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
            <div class="mb-3 mb-sm-0">
              <h5 class="card-title fw-semibold">Collections Report by Month for <?=($year) ? $year : "All Time"?></h5>
              <p class="card-subtitle mb-0">Overview of Monthly Collections</p>
            </div>
            <div>
              <select class="form-select" id="year">
  							<?php
  							if(count($years)>0){
  								foreach($years as $object){

                    if ($year){
    									if($object->year==$year){ ?>
    										<option value="<?=$object->year;?>" selected="selected"><?=$object->year;?></option>
          							 <?php }else{ ?>
          									<option value="<?=$object->year;?>"><?=$object->year;?></option>
          							<?php }
          					}else{ ?>

          									<option value="<?=$object->year;?>"><?=$object->year;?></option>

                    <? }
                  }
  							} ?>
              </select>
            </div>
          </div>
          <div class="row align-items-center">
            <div class="col-lg-9 col-md-9">
              <!-- <div id="chart"></div> -->
              <div id="investmentsGraph"></div>
            </div>
            <div class="col-lg-3 col-md-3">
              <div>
                <div class="d-flex align-items-baseline mb-4">
                  <span class="round-8 bg-primary rounded-circle me-6"></span>
                  <div>
                    <p class="fs-3 mb-1">This Month's Collections</p>
                    <h6 class="fs-5 fw-semibold mb-0"><?=CURRENCY?><?=number_format($monthly_total, 2)?></h6>
                  </div>
                </div>
                <div class="d-flex align-items-baseline mb-4 pb-1">
                  <span class="round-8 bg-secondary rounded-circle me-6"></span>
                  <div>
                    <p class="fs-3 mb-1">This Month's Settlements</p>
                    <h6 class="fs-5 fw-semibold mb-0"><?=CURRENCY?><?=number_format($monthly_settled, 2)?></h6>
                  </div>
                </div>
                <div class="d-flex align-items-baseline mb-4 pb-1">
                  <span class="round-8 bg-info rounded-circle me-6"></span>
                  <div>
                    <p class="fs-3 mb-1">This Month's Enrollments</p>
                    <h6 class="fs-5 fw-semibold mb-0">36,180</h6>
                  </div>
                </div>
                <div>
                  <a href="<?=base_url('payreports')?>" class="btn btn-light-primary w-100">View Full Report</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="row">

    <div class="col-lg-4">
      <div class="card bg-light-primary">
        <div class="card-body">
          <div class="row alig n-items-start">
            <div class="col-8">
              <h5 class="card-title fw-semibold"> Total Collections </h5>
              <p class="text-dark me-1 fs-3 mb-9">Yesterday</p>
              <h4 class="fw-semibold mb-3"><?=CURRENCY?><?=number_format($yesterday_payment, 2)?></h4>
            </div>
            <div class="col-4">
              <div class="d-flex justify-content-end">
                <div class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                  <i class="ti ti-users fs-6"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card bg-light-danger">
        <div class="card-body">
          <div class="row alig n-items-start">
            <div class="col-8">
              <h5 class="card-title fw-semibold"> Total Collections </h5>
              <p class="text-dark me-1 fs-3 mb-9">Last Month</p>
              <h4 class="fw-semibold mb-3"><?=CURRENCY?><?=number_format($lastmonth_total, 2)?></h4>

            </div>
            <div class="col-4">
              <div class="d-flex justify-content-end">

                <div class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                  <i class="ti ti-receipt fs-6"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card bg-light-info">
        <div class="card-body">
          <div class="row alig n-items-start">
            <div class="col-8">
              <h5 class="card-title  fw-semibold"> Total Enrollment </h5>
              <p class="text-dark me-1 fs-3 mb-9">Last Month</p>
              <h4 class="fw-semibold mb-3"><?=number_format($approved_tins)?></h4>

            </div>
            <div class="col-4">
              <div class="d-flex justify-content-end">

                <div class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                  <i class="ti ti-user-check fs-6"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!--  Row 2 -->

  <!--  Row 3 -->


    <!-- Top Performers -->
  <div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-body">
          <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
            <div class="mb-3 mb-sm-0">
              <h5 class="card-title fw-semibold">Most Recent Collections</h5>
              <p class="card-subtitle mb-0">Latest Collections</p>
            </div>

            <a href="<?=base_url('pay/admin')?>" class="btn btn-primary">See All Transactions</a>
          </div>
          <div class="table-responsive">
            <?php if($payments){ ?>
              <div class="table-responsive" id="resultDisplay" style="overflow-x: auto;">
                <table class="table search-table align-middle table-responsive">
                  <thead>
                    <tr>
                      <th class="col-md-1">S/N</th>
                      <th>Reference</th>
                      <th>Payer Name</th>
                      <th>Amount</th>
                      <th>Revenue Head</th>
                      <th>Date</th>
                      <th>Teller</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; foreach($payments as $record){ ?>
                      <tr>
                        <td><?=$i++?></td>
                        <td><?=$record->ref?></td>
                        <td><?=$record->payer_name?></td>
                        <td><?=CURRENCY.number_format(floatval($record->amount), 2)?></td>
                        <td><?=$record->revenue_name?></td>
                        <td><?=$record->trans_date?></td>
                        <td><?=$record->agent?></td>
                        <td>
                          <a href="<?=base_url('invoice/receipt') . '/' . $record->rrr?>" class="btn btn-light-info">Receipt</a>
                        </td>
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
                    <h1 class="fw-semibold mb-2 fs-9">No Payments Yet</h1>
                    <p class="mb-7">All Payments will be displayed here!</p>
                    <a class="btn btn-primary" href="javascript:location.reload();" role="button">Reload Data</a>
                  </div>
                </div>
              </div>
            <?php } ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  $('#year').on('change', function(){
    var val = $('#year').val();
    if(val == ''){
      errorMessage("Please select a year");
    }else{
      window.location.href = '<?=base_url('dashboard')?>' + '?year=' + val;
    }
  });
});

$(function () {

  //
  // Carousel
  //
  $(".counter-carousel2").owlCarousel({
    loop: true,
    margin: 30,
    mouseDrag: true,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplaySpeed: 2000,
    nav: false,
    rtl: true,
    responsive: {
      0: {
        items: 2,
      },
      576: {
        items: 2,
      },
      768: {
        items: 3,
      },
      1200: {
        items: 5,
      },
      1400: {
        items: 6,
      },
    },
  });

  ///yearly graph
  var investments = {
    series: [
        {
          name: "<?=$year?> Formal",
          data: <?=$graphYear?>,
        },
        {
          name: "<?=$year?> Informal",
          data: [13000000, 259000000, 34990000, 12900000, 48999992.90, 0, 0, 0, 0, 0, 0, 0],
        }
      ],
      chart: {
        ffontFamily: "Darker Grotesque', sans-serif",
        foreColor: "#adb0bb",
        height: 325,
        type: "line",
        toolbar: {
          show: false,
        },
      },
      legend: {
        show: false,
      },
      stroke: {
        width: 4,
        curve: "smooth",
      },
      grid: {
        borderColor: "transparent",
      },
      colors: ["#030064", '#4abeff'],
      fill: {
        type: "gradient",
        gradient: {
          shade: "dark",
          gradientToColors: ["#6993ff"],
          shadeIntensity: 1,
          type: "horizontal",
          opacityFrom: 1,
          opacityTo: 1,
          stops: [0, 100, 100, 100],
        },
      },
      markers: {
        size: 0,
      },
      xaxis: {
        type: 'category',
        categories: [
          "Jan", "Feb", "Mar", "Apr", "May", "Jun", "July", "Aug", "Sept", "Oct", "Nov", "Dec"
        ],
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false,
        }
      },
      tooltip: {
        theme: "dark",
      },
  };
  new ApexCharts(document.querySelector("#investmentsGraph"), investments).render();

  // =====================================
  // Stats
  // =====================================
  var stats = {
    chart: {
      id: "sparkline3",
      type: "area",
      height: 180,
      sparkline: {
        enabled: true,
      },
      group: "sparklines",
      fontFamily: "Plus Jakarta Sans', sans-serif",
      foreColor: "#adb0bb",
    },
    series: [
      {
        name: "Weekly Stats",
        color: "var(--bs-primary)",
        data: [5, 15, 10, 20],
      },
    ],
    stroke: {
      curve: "smooth",
      width: 2,
    },
    fill: {
      type: "gradient",
      gradient: {
        shadeIntensity: 0,
        inverseColors: false,
        opacityFrom: 0.20,
        opacityTo: 0,
        stops: [20, 180],
      },
    },

    markers: {
      size: 0,
    },
    tooltip: {
      theme: "dark",
      fixed: {
        enabled: true,
        position: "right",
      },
      x: {
        show: false,
      },
    },
  };
  new ApexCharts(document.querySelector("#stats"), stats).render();
});
</script>
