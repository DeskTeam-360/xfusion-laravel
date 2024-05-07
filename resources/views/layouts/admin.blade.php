<!DOCTYPE html>
<html lang="en" dir="ltr" data-color-theme="Blue_Theme" class="light selected"
      data-layout="vertical" data-boxed-layout="boxed" data-card="shadow">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png"
          href="{{ asset('assets/images/logos/favicon.png') }}"/>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap"
          rel="stylesheet"/>
{{--    <link rel="stylesheet" href="{{asset('assets/fonts/icons/tabler-icons/tabler-icons.css')}}">--}}
    <link rel="stylesheet" href="{{asset('assets/icons-webfont/tabler-icons.min.css')}}">
    <!-- Core Css -->
{{--    @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
    <link rel="stylesheet" href="{{ asset('build/assets/app-DrKqg2nF.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('vendor/carousel/carousel.min.css') }}">
    <script src="{{ asset('build/assets/app-Dh7MYzNA.js') }}"></script>
    @livewireStyles

</head>

<body class="DEFAULT_THEME bg-white dark:bg-dark">

<main>
    <!--start the project-->
    <div id="main-wrapper" class="flex">
        @include('layouts.admin-component.sidebar-vertical')

        <!-- </aside> -->
        <div class="page-wrapper w-full" role="main">
            <!--  Header Start -->
            @include('layouts.admin-component.header')
            <!--  Header End -->

            <!-- Horizontal Header Menu -->
            @include('layouts.admin-component.sidebar-horizontal')
            <!-- Horizontal Header Menu End -->

            <!-- Main Content -->
            <div class=" max-w-full pt-6">
                {{ $slot }}
            </div>
            <!-- Main Content End -->
        </div>
    </div>
    <!--end of project-->

</main>
@include('layouts.admin-component.toast')
<!-- Menu Canvas-->
@include('layouts.admin-component.navbar-md')




<!------- Customizer button--------->
<button type="button"
        class="btn overflow-hidden  sm:h-14 sm:w-14 h-10 w-10 rounded-full fixed sm:bottom-8 bottom-5 right-8 flex justify-center items-center rtl:left-8 rtl:right-auto z-10"
        data-hs-overlay="#hs-overlay-right">
    <i class="ti ti-settings sm:text-2xl text-lg text-white"></i>
</button>

<!------- Customizer Options--------->
@include('layouts.admin-component.settings')

<script>
    function handleColorTheme(e) {
        console.log(e)
        document.documentElement.setAttribute("data-color-theme", e);
        localStorage.setItem('ColorTheme', e)
        console.log(localStorage.getItem('ColorTheme'))
    }
</script>


<script src="{{ asset('assets/js/theme.js') }}"></script>
<script src="{{ asset('assets/js/theme/app.init.js') }}"></script>
<script src="{{ asset('assets/js/theme/app.min.js') }}"></script>

<script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/preline/dist/preline.js') }}"></script>
<script src="{{ asset('assets/libs/@preline/input-number/index.js') }}"></script>
<script src="{{ asset('assets/libs/@preline/tooltip/index.js') }}"></script>
<script src="{{ asset('assets/libs/@preline/stepper/index.js') }}"></script>
<script src="{{ asset('assets/libs/preline/dist/components/hs-accordion/hs-accordion.js') }}"></script>
<script src="{{ asset('assets/libs/preline/dist/components/hs-collapse/hs-collapse.js') }}"></script>
<script src="{{ asset('assets/libs/preline/dist/components/hs-dropdown/hs-dropdown.js') }}"></script>
<script src="{{ asset('assets/libs/preline/dist/components/hs-overlay/hs-overlay.js') }}"></script>
<script src="{{ asset('assets/libs/preline/dist/components/hs-remove-element/hs-remove-element.js') }}"></script>
<script src="{{ asset('assets/libs/preline/dist/components/hs-scrollspy/hs-scrollspy.js') }}"></script>
<script src="{{ asset('assets/libs/preline/dist/components/hs-tabs/hs-tabs.js') }}"></script>
<script src="{{ asset('assets/libs/preline/dist/components/hs-tooltip/hs-tooltip.js') }}"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>--}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/gh/fcmam5/nightly.js@v1.0/dist/nightly.min.js"></script>

@livewireScripts
<script>


    const SwalModal = (icon, title, html) => {
        Swal.fire({
            icon,
            title,
            html
        })
    }

    const SwalConfirm = (icon, title, html, confirmButtonText, method, params, callback) => {
        Swal.fire({
            icon,
            title,
            html,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText,
            reverseButtons: true,
        }).then(result => {
            if (result.value) {
                // $wire.dispatch('post-created', { refreshPosts: true });
                return Livewire.dispatch(method, params)
            }

            if (callback) {
                return Livewire.dispatch(callback)
            }
        })
    }

    const SwalAlert = (icon, title, timeout = 2000) => {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: timeout,
            onOpen: toast => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon,
            title
        })
    }

    document.querySelectorAll("#dark-layout").forEach((element) => {
        element.addEventListener("click", () => {
            var ss = document.createElement('link');
            ss.rel = "stylesheet";
            ss.href = "//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css";
            ss.id="dark-alert"
            document.head.appendChild(ss);
            document.getElementById("light-alert").remove();

            }
        );
    });

    document.querySelectorAll("#light-layout").forEach((element) => {
        element.addEventListener("click", () => {
            // var ss = document.createElement('link');
            // ss.rel = "stylesheet";
            // ss.href = "//cdn.jsdelivr.net/npm/@sweetalert2/theme-minimal/minimal.css";
            // ss.id="light-alert"
            // document.head.appendChild(ss);
            document.getElementById("dark-alert").remove();
            }
        );
    });

    document.addEventListener('DOMContentLoaded', () => {
        var ss = document.createElement('link');
        ss.rel = "stylesheet";
        if (localStorage.getItem("Theme")=="dark") {
            ss.id="dark-alert"
            ss.href = "//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css";
        } else {
            ss.id="light-alert"
            // ss.href = "//cdn.jsdelivr.net/npm/@sweetalert2/theme-minimal/minimal.css";
        }
        document.head.appendChild(ss);


        window.addEventListener('swal:modal', function (d){
            const data = d.__livewire.params.data;
            SwalModal(data.icon, data.title, data.text)
        })

        window.addEventListener('swal:confirm', function (d) {
            const data = d.__livewire.params.data;
            SwalConfirm(data.icon, data.title, data.text, data.confirmText, data.method, data.params, data.callback)
        })

        window.addEventListener('swal:alert', function (d) {
            const data = d.__livewire.params.data;
            SwalAlert(data.icon, data.title, data.timeout)
        })
    })
</script>
</body>


</html>

