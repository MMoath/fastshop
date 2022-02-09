@if(Session::has('message') && Session::get('message_type') == "sweet" )
<script>
    Swal.fire({
        icon: "{{ Session::get('alert-type') }}",
        title: "{{ Session::get('message') }}",
        // text: "{{ Session::get('message') }}",
        // footer: '<a href="">Why do I have this issue?</a>'
    })
</script>
@endif