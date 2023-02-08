
<!-- partial -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{asset('public/dashboard/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('public/dashboard/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('public/dashboard/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('public/dashboard/vendors/progressbar.js/progressbar.min.js')}}"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('public/dashboard/js/off-canvas.js')}}"></script>
<script src="{{asset('public/dashboard/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('public/dashboard/js/template.js')}}"></script>
<script src="{{asset('public/dashboard/js/settings.js')}}"></script>
<script src="{{asset('public/dashboard/js/todolist.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('public/dashboard/js/jquery.cookie.js')}}" type="text/javascript"></script>
<script src="{{asset('public/dashboard/js/dashboard.js')}}"></script>
<script src="{{asset('public/dashboard/js/Chart.roundedBarCharts.js')}}"></script>
<script src="{{asset('public/dashboard/js/tinymce.min.js')}}"></script>

<!--Modal-->
<script src="{{asset('public/modal/js/jquery.min.js')}}"></script>
<script src="{{asset('public/modal/js/popper.js')}}"></script>
<script src="{{asset('public/modal/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/modal/js/main.js')}}"></script>




<script>
  tinymce.init({
  selector: '#tinyMceExampl',
  plugins: [
      'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars code fullscreen',
      'insertdatetime media nonbreaking save table contextmenu directionality',
      'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
  image_advtab: true,
  templates: [{
          title: 'Test template 1',
          content: 'Test 1'
      },
      {
          title: 'Test template 2',
          content: 'Test 2'
      }
  ],
  content_css: [
      '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
      '//www.tinymce.com/css/codepen.min.css'
  ]
  });
  </script>
  <script>

    tinymce.init({

      selector: '#tinyMceExample',
      plugins: [

        'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',

        'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',

        'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'

      ],
      content_css: [
      '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
      '//www.tinymce.com/css/codepen.min.css'
  ],
      toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +

        'alignleft aligncenter alignright alignjustify | ' +

        'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'

    });

  </script>
<!-- End custom js for this page-->
<script>

$(document).ready(function (){
    $('#table_dmd').DataTable();
});
$(document).ready(function (){
    $('#table_d').DataTable();
});
</script>
</body>

</html>
