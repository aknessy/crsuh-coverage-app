<div class="container-fluid">

  <div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100 bg-light-info overflow-hidden shadow-none">
        <div class="card-body position-relative">
          <div class="row">
            <div class="col-sm-7">
              <div class="d-flex align-items-center mb-7">
                <h5 class="fw-semibold mb-0 fs-5">Welcome back <?= $this->session->userdata("fullname"); ?></h5>
              </div>
              <div class="d-flex align-items-center">
                <div class="border-end pe-4 border-muted border-opacity-10">
                  <h3 class="mb-1 fw-semibold fs-8 d-flex text-danger align-content-center">
                    <?= CURRENCY . number_format(floatval($today_payment->amount), 2); ?></h3>
                  <p class="mb-0 text-info">Today’s Collections</p>
                </div>
                <div class="border-end pe-4 border-muted border-opacity-10 ps-4">
                  <h3 class="mb-1 fw-semibold fs-8 d-flex text-info align-content-center">
                    <?= CURRENCY . number_format(floatval($monthly_total->amount), 2); ?><i
                      class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                  <p class="mb-0 text-info">This Month Payments </p>
                </div>
                <div class="ps-4">
                  <h3 class="mb-1 fw-semibold fs-8 d-flex text-success align-content-center">
                    <?= CURRENCY . number_format(floatval($payment_settled->amount), 2); ?></h3>
                  <p class="mb-0 text-info">Total Payments</p>
                </div>
              </div>
            </div>
            <div class="col-sm-5">
              <div class="welcome-bg-img mb-n7 text-end">
                <img
                  src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/welcome-bg.svg"
                  alt="" class="img-fluid">
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
              <h5 class="card-title fw-semibold">Collections Report by Month for <?= ($year) ? $year : "All Time" ?></h5>
              <p class="card-subtitle mb-0">Overview of Monthly Collections</p>
            </div>
            <div>
              <select class="form-select" id="year">
                <option value="">Choose Year</option>
                <?php
                if (count($years) > 0) {
                  foreach ($years as $object) {
                    if ($year) {
                      if ($object->year == $year) { ?>
                        <option value="<?= $object->year; ?>" selected="selected"><?= $object->year; ?></option>
                      <?php } else { ?>
                        <option value="<?= $object->year; ?>"><?= $object->year; ?></option>
                      <?php }
                    } else { ?>
                      <option value="<?= $object->year; ?>"><?= $object->year; ?></option>
                    <?php }
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
                    <p class="fs-3 mb-1">This Month's Pending Collections</p>
                    <h6 class="fs-5 fw-semibold mb-0"><?= CURRENCY ?><?= number_format($pending_collection->amount, 2) ?>
                    </h6>
                  </div>
                </div>
                <div class="d-flex align-items-baseline mb-4 pb-1">
                  <span class="round-8 bg-secondary rounded-circle me-6"></span>
                  <div>
                    <p class="fs-3 mb-1">This Month's Approved Collections</p>
                    <h6 class="fs-5 fw-semibold mb-0"><?= CURRENCY ?><?= number_format($approved_collection->amount, 2) ?>
                    </h6>
                  </div>
                </div>
                <div class="d-flex align-items-baseline mb-4 pb-1">
                  <span class="round-8 bg-info rounded-circle me-6"></span>
                  <div>
                    <p class="fs-3 mb-1">This Month's Total Collections</p>
                    <h6 class="fs-5 fw-semibold mb-0"><?= CURRENCY ?><?= number_format($total_collection->amount, 2) ?>
                    </h6>
                  </div>
                </div>
                <div>
                  <a href="<?= base_url('payreports') ?>" class="btn btn-light-primary w-100">View Full Report</a>
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
              <h5 class="card-title fw-semibold"> Todays payments </h5>
              <p class="text-dark me-1 fs-3 mb-9"></p>
              <h4 class="fw-semibold mb-3"><?= $todays_payment_count->count ?></h4>
            </div>
            <div class="col-4">
              <div class="d-flex justify-content-end">
                <div
                  class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
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
              <h5 class="card-title fw-semibold"> This Month's Payment </h5>
              <p class="text-dark me-1 fs-3 mb-9"></p>
              <h4 class="fw-semibold mb-3"><?= $monthly_payment_count->count ?></h4>

            </div>
            <div class="col-4">
              <div class="d-flex justify-content-end">

                <div
                  class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
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
              <h5 class="card-title  fw-semibold"> Total Payment </h5>
              <p class="text-dark me-1 fs-3 mb-9"></p>
              <h4 class="fw-semibold mb-3"><?= $total_payment_count->count ?></h4>

            </div>
            <div class="col-4">
              <div class="d-flex justify-content-end">

                <div
                  class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
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


  <div class="owl-carousel counter-carousel2 owl-theme" style="direction: rtl !important;">
    <div class="item">
      <div class="card border-0 zoom-in bg-light-primary shadow-none">
        <div class="card-body">
          <div class="text-center">
            <img src="<?= base_url() ?>assets/images/svgs/icon-user-male.svg" width="60" height="60" class="mb-3"
              alt="" />
            <p class="fw-semibold fs-2 text-primary mb-1"> Operators </p>
            <h5 class="fw-semibold text-primary mb-0"><?= count($totalOperators); ?></h5>
          </div>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="card border-0 zoom-in bg-light-info shadow-none">
        <div class="card-body">
          <div class="text-center">
            <img src="<?= base_url() ?>assets/images/svgs/icon-mastercard.svg" width="60" height="60" class="mb-3"
              alt="" />
            <p class="fw-semibold fs-2 text-info mb-1">Agents</p>
            <h5 class="fw-semibold text-info mb-0"><?= count($totalAgents) ?></h5>
          </div>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="card border-0 zoom-in bg-light-secondary shadow-none">
        <div class="card-body">
          <div class="text-center">
            <img src="<?= base_url() ?>assets/images/svgs/icon-connect.svg" width="60" height="60" class="mb-3" alt="" />
            <p class="fw-semibold fs-2 text-secondary mb-1">Operators Payments</p>
            <h5 class="fw-semibold text-secondary mb-0"><?= $totalOperatorsPayment ?></h5>
          </div>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="card border-0 zoom-in bg-light-success shadow-none">
        <div class="card-body">
          <div class="text-center">
            <img src="<?= base_url() ?>assets/images/svgs/icon-toolbox.svg" width="60" height="60" class="mb-3" alt="" />
            <p class="fw-semibold fs-2 text-success mb-1">Agents Payments</p>
            <h5 class="fw-semibold text-success mb-0"><?= $totalAgentsPayment ?></h5>
          </div>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="card border-0 zoom-in bg-light-success shadow-none">
        <div class="card-body">
          <div class="text-center">
            <img src="<?= base_url() ?>assets/images/svgs/icon-document.svg" width="60" height="60" class="mb-3" alt="" />
            <p class="fw-semibold fs-2 text-success mb-1">No Operators Payment</p>
            <h5 class="fw-semibold text-success mb-0"><?= $totalOperatorsPaymentCount ?></h5>
          </div>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="card border-0 zoom-in bg-light-secondary shadow-none">
        <div class="card-body">
          <div class="text-center">
            <img src="<?= base_url() ?>assets/images/svgs/icon-briefcase.svg" width="60" height="60" class="mb-3"
              alt="" />
            <p class="fw-semibold fs-2 text-secondary mb-1">No Agents Payment</p>
            <h5 class="fw-semibold text-secondary mb-0"><?= $totalAgentsPaymentCount ?></h5>
          </div>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="card border-0 zoom-in bg-light-danger shadow-none">
        <div class="card-body">
          <div class="text-center">
            <img src="<?= base_url() ?>assets/images/svgs/icon-favorites.svg" width="60" height="60" class="mb-3"
              alt="" />
            <p class="fw-semibold fs-3 text-danger mb-1">Daily Operators Payment</p>
            <h5 class="fw-semibold text-danger mb-0"><?= $totalDailyOperatorsPaymentCount ?></h5>
          </div>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="card border-0 zoom-in bg-light-danger shadow-none">
        <div class="card-body">
          <div class="text-center">
            <img src="<?=base_url()?>assets/images/svgs/icon-contacts.svg" width="60" height="60" class="mb-3" alt="" />
            <p class="fw-semibold fs-3 text-danger mb-1">Daily Agents Payment</p>
            <h5 class="fw-semibold text-danger mb-0"><?=$totalDailyAgentsPaymentCount?></h5>
          </div>
        </div>
      </div>
    </div>
  </div>


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

            <!-- <a href="<?= base_url('pay/admin') ?>" class="btn btn-primary">See All Transactions</a> -->
          </div>
          <div class="table-responsive">
            <?php if ($last_10_quries) { ?>
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
                      <!-- <th>Teller</th> -->
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach ($last_10_quries as $record) { ?>
                      <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $record->reference ?></td>
                        <td><?= $record->payer_name ?></td>
                        <td><?= CURRENCY . number_format(floatval($record->amount), 2) ?></td>
                        <td><?= $record->revenue_head ?></td>
                        <td><?= $record->confirmation_date ?></td>
                        <!-- <td><?= $record->agent ?></td> -->
                        <td>
                          <!-- <a href="<?= base_url('invoice/receipt') . '/' . $record->rrr ?>" class="btn btn-light-info">Receipt</a> -->
                          <button type="button" class="btn btn-success" name="button"><?= $record->status ?></button>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            <?php } else { ?>
              <div class="row justify-content-center w-100">
                <div class="col-lg-4">
                  <div class="text-center">
                    <img src="<?= base_url() ?>assets/images/backgrounds/taxpayer.png" alt="" style="width: 200px;"
                      class="img-fluid">
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
  $(document).ready(function () {
    $('#year').on('change', function () {
      var val = $('#year').val();
      if (val == '') {
        errorMessage("Please select a year");
      } else {
        window.location.href = '<?= base_url('dashboard') ?>' + '?year=' + val;
      }
    });
  });

  $(function () {

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
          name: "<?= $year ?> Formal",
          data: <?= $graphYear ?>,
        },

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