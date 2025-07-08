<script src="{{ asset('assets/frontend/js/jquery.3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
<!-- sweetalert2 CSS File -->
{{-- <script src="{{ asset('assets/sweetalert/sweetalert2.all.js') }}"></script> --}}
<script src="{{ asset('assets/sweetalert/sweetalert2.all.min.js') }}"></script>
{{-- <script src="{{ asset('assets/sweetalert/sweetalert2.js') }}"></script> --}}
<script src="{{ asset('assets/sweetalert/sweetalert2.min.js') }}"></script>
<!-- sweetalert2 CSS File -->

<script src="{{ asset('assets/frontend/js/script.js') }}" defer></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
