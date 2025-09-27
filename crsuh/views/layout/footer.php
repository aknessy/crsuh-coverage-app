
  </div>

  <div class="d-flex" style="height: 50px;">
    <div class="unlimited-access-title" style="width: 100%">
      <p class="mb-6 ms-6 text-dark text-end me-7">&copy; Copyright <?=date('Y')?>. <?=$app_name?>, powered by
        <a href="<?=$app_powered_by_url?>" class=""><?=$app_powered_by?></a>
      </p>
    </div>
  </div>
</div>


<!--  Search Bar -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-1">
      <div class="modal-header border-bottom">
        <input type="search" class="form-control fs-3" placeholder="Search here" id="search" />
        <span data-bs-dismiss="modal" class="lh-1 cursor-pointer">
          <i class="ti ti-x fs-5 ms-3"></i>
        </span>
      </div>
      <!-- <div class="modal-body message-body" data-simplebar="">
        <h5 class="mb-0 fs-5 p-1">Quick Page Links</h5>
        <ul class="list mb-0 py-2">
          <li class="p-1 mb-1 bg-hover-light-black">
            <a href="#">
              <span class="fs-3 text-black fw-normal d-block">Modern</span>
              <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
            </a>
          </li>
        </ul>
      </div> -->
    </div>
  </div>
</div>

<!--  Import Js Files -->
    <!-- <script src="<?=base_url()?>assets/libs/jquery/dist/jquery.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>
    <script src="<?=base_url()?>assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="<?=base_url()?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--  core files -->
    <script src="<?=base_url()?>assets/js/app.min.js"></script>
    <script src="<?=base_url()?>assets/js/app.init.js"></script>
    <script src="<?=base_url()?>assets/js/app-style-switcher.js"></script>
    <script src="<?=base_url()?>assets/js/sidebarmenu.js"></script>
    <script src="<?=base_url()?>assets/js/custom.js"></script>

    <script src="<?=base_url()?>assets/libs/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="<?=base_url()?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/js/datatable/datatable-basic.init.js"></script>

    <script src="<?=base_url()?>assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="<?=base_url()?>assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="<?=base_url()?>assets/js/forms/select2.init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/select2.min.js')?>"></script>

    <script>
      getTheme()

      function getTheme(){
        var storedValue = localStorage.getItem('setTheme');

        if(storedValue == '' || storedValue == null || storedValue == undefined){
          toggleTheme('<?=base_url()?>assets/css/style.min.css', 'light');
        }else{

          if(storedValue == 'light'){
            toggleTheme('<?=base_url()?>assets/css/style.min.css', 'light');
            $('.light-logo').hide();
            $('.dark-logo').show();
          }else{
            toggleTheme('<?=base_url()?>assets/css/style-dark.min.css', 'dark');
            $('.dark-logo').hide();
            $('.light-logo').show();
          }
        }
      }

      /*Theme color change*/
      function toggleTheme(value, theme) {

        localStorage.setItem('setTheme', theme);
        // $(".preloader").show();
        var sheets = document.getElementById("themeColors");
        sheets.href = value;

        $(".preloader").fadeOut();
      }

    </script>

    <?php if($this->session->flashdata('success') || $this->session->flashdata('flashSuccess')){ ?>
      <script>
        Toastify({
          text: "<?=($this->session->flashdata('success')) ? $this->session->flashdata('success') : $this->session->flashdata('flashSuccess') ?>",
          duration: 3000,
          // destination: "https://github.com/apvarun/toastify-js",
          // newWindow: true,
          close: true,
          gravity: "top", // `top` or `bottom`
          position: "right", // `left`, `center` or `right`
          stopOnFocus: true, // Prevents dismissing of toast on hover
          style: {
            background: "#15deb9",
          },
          onClick: function(){} // Callback after click
        }).showToast();
      </script>
    <?php } ?>

    <?php if($this->session->flashdata('error') || $this->session->flashdata('flashError')){ ?>
      <script>
        Toastify({
          text: "<?=$this->session->flashdata('error') ? $this->session->flashdata('error') : $this->session->flashdata('flashError')?>",
          duration: 3000,
          // destination: "https://github.com/apvarun/toastify-js",
          // newWindow: true,
          close: true,
          gravity: "top", // `top` or `bottom`
          position: "right", // `left`, `center` or `right`
          stopOnFocus: true, // Prevents dismissing of toast on hover
          style: {
            background: "#f9896b",
          },
          onClick: function(){} // Callback after click
        }).showToast();
      </script>
    <?php }

      if($this->session->flashdata('flashFileUploadError')){
    ?>
    <script>
        Toastify({
          text: "<?=$this->session->flashdata('flashFileUploadError')?>",
          duration: 5000,
          // destination: "https://github.com/apvarun/toastify-js",
          // newWindow: true,
          close: true,
          gravity: "top", // `top` or `bottom`
          position: "right", // `left`, `center` or `right`
          stopOnFocus: true, // Prevents dismissing of toast on hover
          style: {
            background: "#f9896b",
          },
          onClick: function(){} // Callback after click
        }).showToast();
    </script>
  <?php } ?>

    <script>
      $('#table').DataTable({
        "ordering": false
      });
      $('#table2').DataTable({
        "ordering": false
      });
      $('#table3').DataTable({
        "ordering": false,
        dom: 'Bfrtip',  // Add this to enable buttons
        buttons: [
            {
                extend: 'csvHtml5',
                text: 'Export as CSV',
                className: 'btn btn-primary',  // Optional: Add Bootstrap styling
                exportOptions: {
                    columns: ':visible'  // Export only visible columns
                }
            }
        ]
      });
      $('.select22').select2();
      $('#dataTable').DataTable(
        {
          'ordering' : false
        }
      );

      function errorMessage(message){
        Toastify({
          text: message,
          duration: 3000,
          // destination: "https://github.com/apvarun/toastify-js",
          newWindow: true,
          close: true,
          gravity: "top", // `top` or `bottom`
          position: "center", // `left`, `center` or `right`
          stopOnFocus: true, // Prevents dismissing of toast on hover
          style: {
            background: "#f9896b",
          },
          onClick: function(){} // Callback after click
        }).showToast();
      }

      function successMessage(message){
        Toastify({
          text: message,
          duration: 3000,
          newWindow: true,
          close: true,
          gravity: "top", // `top` or `bottom`
          position: "center", // `left`, `center` or `right`
          stopOnFocus: true, // Prevents dismissing of toast on hover
          style: {
            background: "#15deb9",
          },
          onClick: function(){} // Callback after click
        }).showToast();
      }

    </script>

    <script>
      $(document).ready(function(){
        options = {
          altInput: true,
          altFormat: "F j, Y",
          dateFormat: "Y-m-d",
        }
        $('.datepicker-widget').flatpickr(options);
        $('.datepicker-widget-w-range').flatpickr({mode:'range', dateFormat:'Y-m-d',altFormat:'Fj, Y'});

        options2 = {
          altInput: true,
          altFormat: "M, Y",
          dateFormat: "Y-m",
        }

        $('.datepicker-widget2').flatpickr(options2);

        flatpickrWithTimeOption = {
          enableTime: true,
          dateFormat: "Y-m-d H:i",
        }

        $('.datepicker-with-time').flatpickr(flatpickrWithTimeOption);

        if($('.select2').length > 0) {
            $('.select2').select2({
                theme: 'bootstrap-5',
                width: '100%'
            });
        }

        // Initialize CKEditor if description is not empty and if description is not empty
        if (document.querySelector('#desc') && document.querySelector('#desc').value) {
            ClassicEditor
            .create(document.querySelector('#desc'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'undo', 'redo'],
                placeholder: 'Enter book description here...'
            })
            .catch(error => {
                console.error(error);
            });
        }
      })
    </script>
  </body>
</html>
