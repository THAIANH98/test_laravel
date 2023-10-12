<!-- jQuery -->
<script src="/test_laravel/test_laravel/public/template/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/test_laravel/test_laravel/public/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/test_laravel/test_laravel/public/template/admin/dist/js/adminlte.min.js"></script>

<script src="/test_laravel/test_laravel/public/template/admin/js/main.js"></script>


@if( Session::has('error'))
    <script>
        $(document).ready(function () {
            document.getElementById('error').style.visibility = 'visible';
            setTimeout(function(){
                document.getElementById('error').style.visibility = 'hidden';
            }, 5000);
        })
    </script>
@endif

@if(Session::has('success'))
    <script>
        $(document).ready(function () {
            document.getElementById('success').style.visibility = 'visible';
            setTimeout(function(){
                document.getElementById('success').style.visibility = 'hidden';
            }, 5000);
        })
    </script>
@endif
@yield('footer')

