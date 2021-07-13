<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Star Admin Premium Bootstrap Admin Dashboard Template</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('back/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('back/assets/vendors/iconfonts/ionicons/dist/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('back/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('back/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('back/assets/vendors/css/vendor.bundle.addons.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('back/assets/css/shared/style.css')}}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('back/assets/css/demo_1/style.css')}}">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{asset('back/assets/images/favicon.ico')}}">
    <!-- file-manager styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
</head>
<style>
    body {
        direction: rtl;
        text-align: right;
    }

    .menu-arrow {
        position: absolute;
        left: 10%;
    }

    .sidebar > .nav > .nav-item:not(.nav-profile) > .nav-link:before {
        left: 50%;
        right: 30px;
    }

    .sidebar > .nav .nav-item .nav-link .menu-title {
        margin: 0 auto;
    }
</style>
<body>
<div class="container-scroller">
    @include('back.nav_top')
    <div class="container-fluid page-body-wrapper">
        @include('back.sidebar')
        @yield('content')
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{asset('back/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('back/assets/vendors/js/vendor.bundle.addons.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('back/assets/js/shared/off-canvas.js')}}"></script>
<script src="{{asset('back/assets/js/shared/misc.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('back/assets/js/demo_1/dashboard.js')}}"></script>
<!-- End custom js for this page-->
<script src="{{asset('back/assets/js/shared/jquery.cookie.js')}}" type="text/javascript"></script>




<script src="https://cdn.tiny.cloud/1/oshfp9q15aycmfephmldo5s2qhr6wt6a7tx62c036zd2vidp/tinymce/4/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    var editor_config = {
        path_absolute : "/",
        selector: "textarea.my-editor",
        height: 300,
        relative_urls: false,
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern","link image code"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };
    tinymce.init(editor_config);
</script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>

</body>
</html>