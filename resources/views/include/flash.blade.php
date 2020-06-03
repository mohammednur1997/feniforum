@if(session()->has('message'))

 <script type="text/javascript">
            $(document).ready(function () {
                swal("Success!!", "{{session()->get('message')}}", "success")
            });
        </script>
@endif

@if(session()->has('alert'))
    <script type="text/javascript">
        $(document).ready(function () {
            swal("Failed!!", "{{session()->get('alert')}}", "warning")
        });
    </script>
@endif