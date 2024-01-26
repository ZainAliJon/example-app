
</div>
<script src="{{url('/public/dashboard/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{url('/public/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('/public/dashboard/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<script src="{{url('/public/dashboard/plugins/moment/moment.min.js')}}"></script>
<script src="{{url('/public/dashboard/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<script src="{{url('/public/dashboard/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{url('/public/dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{url('/public/dashboard/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script src="{{url('/public/dashboard/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<script src="{{url('/public/dashboard/plugins/dropzone/min/dropzone.min.js')}}"></script>
<script src="{{url('/public/dashboard/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{url('/public/dashboard/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{url('/public/dashboard/dist/js/adminlte.js')}}"></script>
<script src="{{url('/public/dashboard/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{url('/public/dashboard/dist/js/demo.js')}}"></script>
<script src="{{url('/public/dashboard/dist/js/pages/dashboard3.js')}}"></script>
<script src="{{url('/public/dashboard/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script src="{{url('/public/dashboard/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
<script src="{{url('/public/dashboard/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{url('/public/dashboard//plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('/public/dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('/public/dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('/public/dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-alphabetSearch/1.2.5/js/dataTables.alphabetSearch.min.js"></script>
<script type="text/javascript">

	$(function() {
		var Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});

    // $('.swalDefaultSuccess').click(function() {
   @if(session('message'))
   Toast.fire({
    icon: 'success',
    title: '{{ session('message') }}'
  })
   @endif
    // });
   $('.swalDefaultInfo').click(function() {
     Toast.fire({
      icon: 'info',
      title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
   });
    // $('.swalDefaultError').click(function() {
   @if(session('error'))

   Toast.fire({
    icon: 'error',
    title: '{{ session('error') }}'
  })

   @endif
    // });
   $('.swalDefaultWarning').click(function() {
     Toast.fire({
      icon: 'warning',
      title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
   });
   $('.swalDefaultQuestion').click(function() {
     Toast.fire({
      icon: 'question',
      title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
   });

   $('.toastrDefaultSuccess').click(function() {
     toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
   });
   $('.toastrDefaultInfo').click(function() {
     toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
   });
   $('.toastrDefaultError').click(function() {
     toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
   });
   $('.toastrDefaultWarning').click(function() {
     toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
   });

   $('.toastsDefaultDefault').click(function() {
     $(document).Toasts('create', {
      title: 'Toast Title',
      body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
   });
   $('.toastsDefaultTopLeft').click(function() {
     $(document).Toasts('create', {
      title: 'Toast Title',
      position: 'topLeft',
      body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
   });
   $('.toastsDefaultBottomRight').click(function() {
     $(document).Toasts('create', {
      title: 'Toast Title',
      position: 'bottomRight',
      body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
   });
   $('.toastsDefaultBottomLeft').click(function() {
     $(document).Toasts('create', {
      title: 'Toast Title',
      position: 'bottomLeft',
      body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
   });
   $('.toastsDefaultAutohide').click(function() {
     $(document).Toasts('create', {
      title: 'Toast Title',
      autohide: true,
      delay: 750,
      body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
   });
   $('.toastsDefaultNotFixed').click(function() {
     $(document).Toasts('create', {
      title: 'Toast Title',
      fixed: false,
      body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
   });
   $('.toastsDefaultFull').click(function() {
     $(document).Toasts('create', {
      body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
      title: 'Toast Title',
      subtitle: 'Subtitle',
      icon: 'fas fa-envelope fa-lg',
    })
   });
   $('.toastsDefaultFullImage').click(function() {
     $(document).Toasts('create', {
      body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
      title: 'Toast Title',
      subtitle: 'Subtitle',
      image: '../../dist/img/user3-128x128.jpg',
      imageAlt: 'User Picture',
    })
   });
   $('.toastsDefaultSuccess').click(function() {
     $(document).Toasts('create', {
      class: 'bg-success',
      title: 'Toast Title',
      subtitle: 'Subtitle',
      body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
   });
   $('.toastsDefaultInfo').click(function() {
     $(document).Toasts('create', {
      class: 'bg-info',
      title: 'Toast Title',
      subtitle: 'Subtitle',
      body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
   });
   $('.toastsDefaultWarning').click(function() {
     $(document).Toasts('create', {
      class: 'bg-warning',
      title: 'Toast Title',
      subtitle: 'Subtitle',
      body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
   });
   $('.toastsDefaultDanger').click(function() {
     $(document).Toasts('create', {
      class: 'bg-danger',
      title: 'Toast Title',
      subtitle: 'Subtitle',
      body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
   });
   $('.toastsDefaultMaroon').click(function() {
     $(document).Toasts('create', {
      class: 'bg-maroon',
      title: 'Toast Title',
      subtitle: 'Subtitle',
      body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
   });
 });

</script>
<script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  });
  $(document).ready(function () {
        // Add change event listener to the editable elements
    $('.note-editing-area').on('input', function () {
            // Update the value of textarea with the content of .note-editable
      $('#messageSec').val($('.note-editing-area').text());
    });
  });
</script>

<script>
$(document).ready(function(){
   var table = $('#example1').DataTable({
      dom: 'Alfrtip',
      alphabetSearch: {
         column: 0
      }      
   });
});
</script>
<script type="text/javascript">
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
  $(document).ready(function(){
    $('#UserSubmitBtn').click(function(e){
      // alert('ok');
      e.preventDefault();
      var formdate = $('#UserPasswordForm').serialize();
      $.ajax({
        type: 'POST',
        url: '{{ url("user/create") }}',
        data: formdate,
        success: function (response) {
          if(response == "Password error: Must be in uppercase, lowercase, number, and symbol"){
            $('.ErrorDiv').css('display', 'block');
          }else{
           $('.ErrorDiv').css('display', 'none');
           $('#user-modal').modal('hide'); 

           window.location.reload();

         }
       },
       error: function (error) {
        console.log(error); 
      }
    });
    })
  })

  $(document).ready(function(){
    $('.usereditform').submit(function(e){
      // alert('ok');
      e.preventDefault();
      var id = $(this).attr('user_id');
      var formdate = $(this).serialize();
      $.ajax({
        type: 'POST',
        url: '{{ url("user/edit/") }}/'+id,
        data: formdate,
        success: function (response) {
          if(response == "Password error: Must be in uppercase, lowercase, number, and symbol"){

            $('.ErrorDivEdit').css('display', 'block');
          }else{
            $('.ErrorDivEdit').css('display','none');
            $('#site-edit-modal' + id).modal('hide'); 
            window.location.reload();
            
          }
        },
        error: function (error) {
          console.log(error); 
        }
      });
    })
  })



  $(document).ready(function(){
    $('#SubmitBtn').click(function(e){
      // alert('ok');
      e.preventDefault();
      var formdate = $('#PasswordForm').serialize();
      $.ajax({
        type: 'POST',
        url: '{{ url("site/create") }}',
        data: formdate,
        success: function (response) {
          if(response == "Password error: Must be in uppercase, lowercase, number, and symbol"){
            $('.ErrorDiv').css('display', 'block');
          }else{
           $('.ErrorDiv').css('display', 'none');
           $('#user-modal').modal('hide'); 
                       Toast.fire({
              icon: 'success',
              title: response,
            })
           window.location.reload();
 
         }
       },
       error: function (error) {
        console.log(error); 
      }
    });
    })
  })

  $(document).ready(function(){
    $('.editform').submit(function(e){
      // alert('ok');
      e.preventDefault();
      var id = $(this).attr('site_id');
      var formdate = $(this).serialize();
      $.ajax({
        type: 'POST',
        url: '{{ url("site/edit/") }}/'+id,
        data: formdate,
        success: function (response) {
          if(response == "Password error: Must be in uppercase, lowercase, number, and symbol"){

            $('.ErrorDivEdit').css('display', 'block');
          }else{
            $('.ErrorDivEdit').css('display','none');
            $('#site-edit-modal' + id).modal('hide'); 
            Toast.fire({
              icon: 'success',
              title: response,
            })

            window.location.reload();


          }
        },
        error: function (error) {
          console.log(error); 
        }
      });
    })
  })
</script>
</body>