<!--  Import Js Files -->
   
   <script src="<?=base_url()?>assets/libs/simplebar/dist/simplebar.min.js"></script>
   <script src="<?=base_url()?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
   <!--  core files -->
   <script src="<?=base_url()?>assets/js/app.min.js"></script>
   <script src="<?=base_url()?>assets/js/app.init.js"></script>
   <script src="<?=base_url()?>assets/js/app-style-switcher.js"></script>
   <script src="<?=base_url()?>assets/js/sidebarmenu.js"></script>

   <script src="<?=base_url()?>assets/js/custom.js"></script>
   <script src="<?=base_url()?>assets/libs/prismjs/prism.js"></script>

   <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


   <?php if($this->session->flashdata('success')){ ?>
     <script>
       Toastify({
         text: "<?=$this->session->flashdata('success')?>",
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

   <?php if($this->session->flashdata('error')){ ?>
     <script>
       Toastify({
         text: "<?=$this->session->flashdata('error')?>",
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
   <?php } ?>

 </body>
</html>
