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
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<!-- Latest Bootstrap -->
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

{{-- toaster message script --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    // Configure Toastr options
    toastr.options = {
        "closeButton": true, // Enable close button
        "progressBar": true, // Optional: show a progress bar
        "timeOut": "3000", // Optional: duration in milliseconds
        "extendedTimeOut": "1000", // Optional: additional time after mouse over
        "positionClass": "toast-top-right" // Optional: set position
    };

    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif

    @if (Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
    @endif

    @if (Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
    @endif

    @if (Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
    @endif
</script>


{{-- datatables --}}


<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.7/js/dataTables.bootstrap4.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.bootstrap4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.colVis.min.js"></script>
<script>
    new DataTable('#all_datatables_id', {
        layout: {
            topStart: {
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            }
        }
    });
</script>

<script>
    // Password field toggle
    document.getElementById('eyeIcon').addEventListener('click', function() {
        var passwordField = document.getElementById('password');
        var icon = document.getElementById('eyeIcon');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });

    // Confirm password field toggle
    document.getElementById('eyeIconConfirm').addEventListener('click', function() {
        var confirmPasswordField = document.getElementById('password_confirmation');
        var icon = document.getElementById('eyeIconConfirm');

        if (confirmPasswordField.type === 'password') {
            confirmPasswordField.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            confirmPasswordField.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
</script>
