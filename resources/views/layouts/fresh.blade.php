<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<head>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({'gtm.start': new Date().getTime(), event: 'gtm.js'});
            var f = d.getElementsByTagName(s)[0], j = d.createElement(s), dl = l != 'dataLayer' ? '&amp;l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5FS8GGP');</script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8"/>
    <title>Foundry Chat Super Admin</title>
    <meta name="description"
          content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets."/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="canonical" href="https://keenthemes.com/metronic"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link
        href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.2.9"
        rel="stylesheet" type="text/css"/>
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link
        href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/plugins/global/plugins.bundle.css?v=7.2.9"
        rel="stylesheet" type="text/css"/>
    <link
        href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.2.9"
        rel="stylesheet" type="text/css"/>
    <link href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/css/style.bundle.css?v=7.2.9"
          rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link
        href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/css/themes/layout/header/base/light.css?v=7.2.9"
        rel="stylesheet" type="text/css"/>
    <link
        href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/css/themes/layout/header/menu/light.css?v=7.2.9"
        rel="stylesheet" type="text/css"/>
    <link
        href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/css/themes/layout/brand/dark.css?v=7.2.9"
        rel="stylesheet" type="text/css"/>
    <link
        href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/css/themes/layout/aside/dark.css?v=7.2.9"
        rel="stylesheet" type="text/css"/>
    <!--end::Layout Themes-->
    <link rel="shortcut icon"
          href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/logos/favicon.ico"/>
    <!-- Hotjar Tracking Code for keenthemes.com -->

</head>
<!--end::Head-->
<!--begin::Body-->
<body class="d-flex align-items-center justify-content-center">

@yield('content')


<!--end::Demo Panel-->
<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = {
        "breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400},
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#EBEDF3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
        "font-family": "Poppins"
    };</script>
<!--end::Global Config-->

<script type="module">
    // Import the functions you need from the SDKs you need
    import {initializeApp} from "https://www.gstatic.com/firebasejs/9.6.10/firebase-app.js";
    import {getAnalytics} from "https://www.gstatic.com/firebasejs/9.6.10/firebase-analytics.js";
    import {getDatabase} from "https://www.gstatic.com/firebasejs/9.6.10/firebase-database.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyCEjcCPhzeEtj9Tp_MDZM3waHxM97JeahM",
        authDomain: "schooapp2022.firebaseapp.com",
        databaseURL: "https://schooapp2022-default-rtdb.firebaseio.com",
        projectId: "schooapp2022",
        storageBucket: "schooapp2022.appspot.com",
        messagingSenderId: "26197024544",
        appId: "1:26197024544:web:209e7d360fb391cc3ac145",
        measurementId: "G-74SZW3KGPH"
    };

    // Initialize Firebase
    var app = initializeApp(firebaseConfig);
    var firebase = app;
    var analytics = getAnalytics(app);
    var database = getDatabase(app);

</script>
<!--begin::Global Theme Bundle(used by all pages)-->
<script
    src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/plugins/global/plugins.bundle.js?v=7.2.9"></script>
<script
    src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.2.9"></script>
<script
    src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/js/scripts.bundle.js?v=7.2.9"></script>
<script src="https://keenthemes.comhttps://preview.keenthemes.com/metronic/assets/js/engage_code.js"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script
    src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.2.9"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/js/pages/widgets.js?v=7.2.9"></script>


<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<!--end::Page Scripts-->

@yield('scripts')
@yield('js')
</body>
<!--end::Body-->
</html>
