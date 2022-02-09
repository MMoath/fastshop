  @if(Session::has('message') && Session::get('message_type') == "toast")
  <script>
      toastr.options = {
          "positionClass": "toast-top-left",
          "hideMethod": "slideUp",
          //"progressBar": "true",
      }

      var type = "{{Session::get('alert-type','info')}}"
      switch (type) {
          case 'info':
              toastr.info("{{ Session::get('message') }}");
              break;
          case 'success':
              toastr.success("{{ Session::get('message') }}");
              break;
          case 'error':
              toastr.error("{{ Session::get('message') }}");
              break;
          case 'warning':
              toastr.warning("{{ Session::get('message') }}");
              break;
      }
  </script>
  @endif