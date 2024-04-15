

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title> @yield('title') </title>

    <meta name="description" content="@yield('meta_description')" />
    <meta name="keyword" content="@yield('meta_keyword')" />
    <meta name="author" content="Motomart" />


    <!-- Font Awesome -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
        />
        <!-- Google Fonts -->
        <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
        />



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    {{-- motomart icon --}}
    <link rel="icon"  src="{{ asset('assets/images/logomotomart.ico') }}">

    <!-- plugins:css -->

   <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
   <link rel="stylesheet" href="{{ asset('admin/vendors/base/vendor.bundle.base.css')}}">

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}" />
    <!-- responsive style -->
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/slider.css') }}">

    {{-- Login & register styles --}}

     <link rel="stylesheet" href="{{ asset('assets/css-login/style.css') }}">

     <link rel="stylesheet" href="{{ asset('assets/css-login/css/demo.css') }}">



    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/exzoom/jquery.exzoom.css')}}" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

    {{-- owl css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">



    @livewireStyles

</head>
<body style="background-color: #ffffff">
    <div id="app">
        @include('layouts.inc.frontend.navbar')
    <main>
            @yield('content')

    </main>
    @include('layouts.inc.frontend.footer')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
        crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>



    <!-- Custom JavaScript for modal switching -->
<script>
    $(document).ready(function() {
        $('#switchToRegister').click(function() {
            $('#loginModal').modal('hide');
            $('#registermodal').modal('show');
        });

        $('#switchToLogin').click(function() {
            $('#registermodal').modal('hide');
            $('#loginModal').modal('show');
        });
    });
</script>

    <!-- Custom JavaScript for modal closing -->
<script>


    $(document).ready(function() {
        // Function to handle hiding the modal and resetting form fields
        function closeModal(modalId) {
            $(modalId).modal('hide'); // Hide the modal
            $(modalId).find('form')[0].reset(); // Reset form fields on close
        }

        // Click event handler for the close button in login modal
        $('#loginModal .close').click(function() {
            closeModal('#loginModal');
        });

        // Click event handler for the close button in register modal
        $('#registermodal .close').click(function() {
            closeModal('#registermodal');
        });

        // Click event handler for clicking outside the modal
        $('#loginModal, #registermodal').on('click', function(event) {
            if (event.target == this) {
                closeModal($(this));
            }
        });

        // Function to switch between login and register modals
        $('#switchToRegister').click(function() {
            closeModal('#loginModal');
            $('#registermodal').modal('show');
        });

        $('#switchToLogin').click(function() {
            closeModal('#registermodal');
            $('#loginModal').modal('show');
        });
    });
</script>



    {{-- Login & register script --}}
    <script  src="{{ asset('assets/js-login/script.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        window.addEventListener('message', event => {
        if(event.detail)
        {
            alertify.set('notifier','position', 'top-right');
            alertify.notify(event.detail.text, event.detail.type);
        }
        });

    </script>


        <script  src="{{ asset('assets/exzoom/jquery.exzoom.js') }}"></script>
    <!-- Scripts -->
    {{-- @vite(['public/assets/js/jquery-3.7.1.min.js']) --}}
    {{-- @vite(['public/assets/js/bootstrap.bundle.min.js']) --}}
    @vite(['public/assets/js/bootstrap.js'])
    @vite(['public/assets/js/custom.js'])

    @yield('script')
    @livewireStyles
    @stack('scripts')




</body>

</html>
