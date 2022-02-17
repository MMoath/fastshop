  <!-- /.content-wrapper -->
  <footer class="main-footer">
      <strong>Copyright &copy; 2022 <a href="https://adminlte.io">Fast shop</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.2.0-rc
      </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->


  <!-- jQuery  -->
  <script src="{{ URL::asset('admin/plugins/jquery/jquery.min.js'); }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ URL::asset('admin/plugins/jquery-ui/jquery-ui.min.js'); }}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
      $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ URL::asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js'); }}"></script>
  <!-- ChartJS -->
  <script src="{{ URL::asset('admin/plugins/chart.js/Chart.min.js'); }}"></script>
  <!-- Sparkline -->
  <script src="{{ URL::asset('admin/plugins/sparklines/sparkline.js'); }}"></script>
  <!-- JQVMap -->
  <script src="{{ URL::asset('admin/plugins/jqvmap/jquery.vmap.min.js'); }}"></script>
  <script src="{{ URL::asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js'); }}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ URL::asset('admin/plugins/jquery-knob/jquery.knob.min.js'); }}"></script>
  <!-- daterangepicker -->
  <script src="{{ URL::asset('admin/plugins/moment/moment.min.js'); }}"></script>
  <script src="{{ URL::asset('admin/plugins/daterangepicker/daterangepicker.js'); }}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ URL::asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); }}"></script>
  <!-- Summernote -->
  <script src="{{ URL::asset('admin/plugins/summernote/summernote-bs4.min.js'); }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ URL::asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ URL::asset('admin/dist/js/adminlte.js'); }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ URL::asset('admin/dist/js/demo.js'); }}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ URL::asset('admin/dist/js/pages/dashboard.js'); }}"></script>
  <!-- Toastr -->
  <script src="{{ URL::asset('admin/plugins/toastr/toastr.min.js'); }}"></script>
  <!-- SweetAlert2
  <script src="{{ URL::asset('admin/plugins/sweetalert2/sweetalert2.min.js'); }}"></script> -->
  <script src="{{ URL::asset('frontend/js/sweetalert.min.js'); }}"></script>

  <script>
      $(document).ready(function() {
          $('.product-image-thumb').on('click', function() {
              var $image_element = $(this).find('img')
              $('.product-image').prop('src', $image_element.attr('src'))
              $('.product-image-thumb.active').removeClass('active')
              $(this).addClass('active')
          })
      })

      $(function() {
          $('[data-toggle="tooltip"]').tooltip()
      })

      function buttonReset() {
          document.getElementById('resetForm').reset();
          document.getElementById('from').text = null;
          return false;
      }
  </script>
  @include('layouts.massage.toastr')
  @include('layouts.massage.sweetalert')
  @yield('script')
  </body>

  </html>