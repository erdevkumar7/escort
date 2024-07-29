    <!-- jQuery -->
    <script src="{{ asset('/public/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('/public/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('/public/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('/public/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('/public/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('/public/vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('/public/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('/public/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('/public/vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('/public/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('/public/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('/public/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('/public/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('/public/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('/public/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('/public/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('/public/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('/public/vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('/public/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('/public/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('/public/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('/public/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('/public/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('/public/build/js/custom.min.js') }}"></script>
     <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!--- custome JS -->
    <script>
        //handleLogOut
        function handleLogOut() {
            event.preventDefault();
            document.getElementById('logout-form').submit();
        }
        // removeError
        function removeError(id) {
            var errElement = document.getElementById(id);
            if (errElement) {
                errElement.style.display = 'none'
            }
        }
        // select2
        $(document).ready(function() {
            $('#services').select2({
                placeholder: "Select Services"
            });

            $('#language_spoken').select2({
                placeholder: "Select Language"
            });

            $('#availability').select2({
                placeholder: "Select Availability"
            });

            $('#currencies_accepted').select2({
                placeholder: "Select Currencies"
            });

            $('#payment_method').select2({
                placeholder: "Select Payment Methods"
            });
        });
    </script>
