  <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('static/back_end/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('static/back_end/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('static/back_end/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <script src="{{ asset('static/back_end/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('static/back_end/dist/js/app.init.horizontal.js') }}"></script>
    <script src="{{ asset('static/back_end/dist/js/app-style-switcher.horizontal.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('static/back_end/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('static/back_end/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('static/back_end/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('static/back_end/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('static/back_end/dist/js/custom.js') }}"></script>

    <script src="{{ asset('static/back_end/extra-libs/jquery-sessiontimeout/jquery.sessionTimeout.min.js') }}"></script>
    <script src="{{ asset('static/back_end/extra-libs/jquery-sessiontimeout/session-timeout-init.js') }}"></script>

     <script src="{{ asset('static/back_end/libs/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('static/back_end/libs/sweetalert2/sweet-alert.init.js') }}"></script>
     <!-- DataTable js for this page-->
      <script type="text/javascript" src="{{ asset('js/datatables.min.js') }}"></script>
     <script type="text/javascript">
       $(document).ready( function () {
          $('#myTable').DataTable();
         });
     </script>

     <script type="text/javascript">
  $("#upozila_id").change(function(){
        var upozila = $("#upozila_id").val();
        // Send an ajax request to server with this division
        $("#union_id").html("");
        var option = "";
        var url = "{{ url('/') }}";
        $.get( url+"/get-union/"+upozila, function( data ) {
            data = JSON.parse(data);
            data.forEach( function(element) {
              option += "<option value='"+ element.id +"'>"+ element.name +"</option>";
            });

          $("#union_id").html(option);

        });
    })
</script>

 <script type="text/javascript">
  $("#upozila").change(function(){
        var upozila = $("#upozila").val();
        // Send an ajax request to server with this division
        $("#union").html("");
        var option = "";
        var url = "{{ url('/') }}";
        $.get( url+"/get-unionEdit/"+upozila, function( data ) {
            data = JSON.parse(data);
            data.forEach( function(element) {
              option += "<option value='"+ element.id +"'>"+ element.name +"</option>";
            });

          $("#union").html(option);

        });
    })
</script>
    <!--End DataTable js for this page-->

    
   @include('include.flash')


     @stack('jsfile')

</body>

</html>