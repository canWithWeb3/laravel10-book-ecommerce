<script type="text/javascript">
    // toastr.options.positionClass = 'toast-bottom-right';

    toastr.{{ session("alert_status") }}("{{ session('alert_message') }}");
</script>
