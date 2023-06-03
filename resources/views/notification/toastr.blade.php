<!-- Thư viện hiển thị thông báo -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

@if(Session::has('success'))
<script>
    toastr.success("{!! Session::get('success') !!}", "Success");
</script>
@endif

@if(Session::has('info'))
<script>
    toastr.info("{!! Session::get('info') !!}", "Info");
</script>
@endif

@if(Session::has('warning'))
<script>
    toastr.warning("{!! Session::get('warning') !!}", "Warning");
</script>
@endif

@if(Session::has('error'))
<script>
    toastr.error("{!! Session::get('error') !!}", "Error");
</script>
@endif