@section('footer')
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> SMART BUILD Asia ADMIN. Brought to you by <a href="https://smartbuild.asia/">smartbuild.asia</a> </div>
</div>

<!--end-Footer-part-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>

<script src="{{asset('js/admin/canvas.js')}}"></script> 
<script src="{{asset('js/admin/jquery.min.js')}}"></script> 
<script src="{{asset('js/admin/jquery.ui.custom.js')}}"></script> 
<script src="{{asset('js/admin/bootstrap.min.js')}}"></script> 
<script src="{{asset('js/admin/jquery.dataTables.min.js')}}"></script> 
<script src="{{asset('js/admin/matrix.tables.js')}}"></script> 
<script src="{{asset('js/admin/jquery.flot.min.js')}}"></script> 
<script src="{{asset('js/admin/jquery.flot.resize.min.js')}}"></script> 
<script src="{{asset('js/admin/jquery.peity.min.js')}}"></script> 
<script src="{{asset('js/admin/fullcalendar.min.js')}}"></script> 
<script src="{{asset('js/admin/matrix.js')}}"></script> 
<script src="{{asset('js/admin/matrix.dashboard.js')}}"></script> 
<script src="{{asset('js/admin/jquery.gritter.min.js')}}"></script> 
<script src="{{asset('js/admin/matrix.interface.js')}}"></script> 
<script src="{{asset('js/admin/jquery.validate.js')}}"></script> 
<script src="{{asset('js/admin/matrix.form_validation.js')}}"></script> 
<script src="{{asset('js/admin/jquery.wizard.js')}}"></script> 
<script src="{{asset('js/admin/jquery.uniform.js')}}"></script> 
<script src="{{asset('js/admin/select2.min.js')}}"></script> 
<script src="{{asset('js/admin/matrix.popover.js')}}"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {
      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
@if(Session::has('alert-success'))
	$.gritter.add({
		title: '',
		text: '{{ Session::get('alert-success') }}',
		sticky: false
	});

@endif
</script>
</body>
</html>
@endsection