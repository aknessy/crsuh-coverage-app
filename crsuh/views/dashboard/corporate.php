<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3">
      <div class="card border-0 zoom-in bg-light-info shadow-none">
        <div class="card-body">
          <div class="text-center">
            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-speech-bubble.svg" width="50" height="50" class="mb-3" alt="">
            <p class="fw-semibold fs-3 text-info mb-1">Payroll</p>
            <h5 class="fw-semibold text-info mb-0"><?=CURRENCY.number_format(floatval($total_salary), 2)?></h5>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card border-0 zoom-in bg-light-danger shadow-none">
        <div class="card-body">
          <div class="text-center">
            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-connect.svg" width="50" height="50" class="mb-3" alt="">
            <p class="fw-semibold fs-3 text-danger mb-1">Payments</p>
            <h5 class="fw-semibold text-danger mb-0"><?=number_format(count($payments))?></h5>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card border-0 zoom-in bg-light-warning shadow-none">
        <div class="card-body">
          <div class="text-center">
            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-user-male.svg" width="50" height="50" class="mb-3" alt="">
            <p class="fw-semibold fs-3 text-warning mb-1">Employees</p>
            <h5 class="fw-semibold text-warning mb-0"><?=number_format(count($employees))?></h5>
          </div>
        </div>
      </div> 
    </div>
  </div>
  <div class="row">
    <div class="col-lg-5 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body">
          <div>
            <h5 class="card-title fw-semibold mb-1">Employee Salary</h5>
            <p class="card-subtitle mb-0">Every month</p>
            <div id="salaryGraph" class="mb-7 pb-8"></div>
            <div class="d-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center">
                <div class="bg-light-primary rounded me-8 p-8 d-flex align-items-center justify-content-center">
                  <i class="ti ti-grid-dots text-primary fs-6"></i>
                </div>
                <div>
                  <p class="fs-3 mb-0 fw-normal">Average Salary</p>
                  <h6 class="fw-semibold text-dark fs-4 mb-0"><?=CURRENCY.number_format(floatval($total_salary/count($employees)),2)?></h6>
                </div>
              </div>
              <div class="d-flex align-items-center">
                <div class="bg-light rounded me-8 p-8 d-flex align-items-center justify-content-center">
                  <i class="ti ti-grid-dots text-muted fs-6"></i>
                </div>
                <div>
                  <p class="fs-3 mb-0 fw-normal">Revenue</p>
                  <h6 class="fw-semibold text-dark fs-4 mb-0">$5,296</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-7 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="px-4 py-3 border-bottom">
          <h5 class="card-title mb-0">
            <span class="fw-semibold d-block 1h-sm mb-1">Payment Records</span>
            <span class="d-block text-muted" style="font-size: 12px;">Statistics of payments recorded</span>
          </h5>
        </div>
        <div class="card-body">
          <div id="paymentRecordsChart" class="pb-8"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    var salary = {
      series: [
        {
          name: "Employee Salary Graph",
          data: <?=$monthly_salary?>,
        },
      ],

    chart: {
      toolbar: {
        show: false,
      },
      height: 260,
      type: "bar",
      fontFamily: "Plus Jakarta Sans', sans-serif",
      foreColor: "#adb0bb",
    },
    colors: ["#f2f6fad9", "#f2f6fad9", "var(--bs-primary)", "#f2f6fad9", "#f2f6fad9", "#f2f6fad9"],
    plotOptions: {
      bar: {
        borderRadius: 4,
        columnWidth: "45%",
        distributed: true,
        endingShape: "rounded",
      },
    },

    dataLabels: {
      enabled: false,
    },
    legend: {
      show: false,
    },
    grid: {
      yaxis: {
        lines: {
          show: false,
        },
      },
      xaxis: {
        lines: {
          show: false,
        },
      },
    },
    xaxis: {
      categories: <?=$month_names?>,
      axisBorder: {
        show: false,
      },
      axisTicks: {
        show: false,
      },
    },
    yaxis: {
      labels: {
        show: false,
      },
    },
    tooltip: {
      theme: "dark",
    },
  };

  var chart = new ApexCharts(document.querySelector("#salaryGraph"), salary);
  chart.render();

  var options = {
    series: [{
      name: "Payment Records",
      data: <?=$payment_records_amount?>
  }],
    chart: {
    height: 350,
    type: 'line',
    zoom: {
      enabled: false
    }
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    curve: 'straight'
  },
  title: {
    text: 'Amount paid per year',
    align: 'left'
  },
  grid: {
    row: {
      colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
      opacity: 0.5
    },
  },
  xaxis: {
    categories: <?=$payment_records_years?>,
  }
  };

  var chart = new ApexCharts(document.querySelector("#paymentRecordsChart"), options);
  chart.render();

</script>