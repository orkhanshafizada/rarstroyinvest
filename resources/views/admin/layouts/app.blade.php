<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ setting('title') }}</title>
    <link href="{{ asset('admin/assets/plugins/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet"
          type="text/css">
    <link href="{{ asset('admin/assets/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/material-design/material-components.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/material-select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css"/>
    <style>
        .content {
            overflow: auto !important;
        }

        .plus {
            position: absolute;
            top: 15px;
            right: 20px;
        }
        .margin-form{
            margin-top: 40px;
        }
        .nav-profile {
            right: 0;
            position: absolute;
        }

        .trashForm button {
            border: none;
            background: none;
            cursor: pointer;
            margin: 0;
            padding: 0;
        }

        .trashForm button i:hover {
            color: #ff0000;
        }

        .updateButton {
            color: #000;
        }
        .form-control {
            padding-left: 0.75rem !important;
        }
    </style>
    @yield('css_admin')
</head>
<body>
@include('admin.layouts.header')
<div class="page-content">
    @include('admin.layouts.navbar')
    @yield('content')
</div>
<script src="{{ asset('admin/global_assets/js/main/jquery.min.js') }}"></script>
<script src="{{ asset('admin/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/app.js') }}"></script>
<script src="{{ asset('admin/global_assets/js/demo_pages/dashboard.js') }}"></script>
<script src="{{ asset('admin/global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('admin/global_assets/js/demo_pages/datatables_basic.js') }}/"></script>
<script src="{{ asset('admin/global_assets/js/demo_pages/datatables_sorting.js') }}"></script>
<script src="{{ asset('admin/assets/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('admin/global_assets/js/demo_pages/gallery.js') }}"></script>
<script src="{{ asset('admin/global_assets/js/demo_pages/gallery_library.js') }}"></script>
<script src="{{ asset('admin/global_assets/js/plugins/media/glightbox.min.js') }}"></script>
<script src="{{ asset('admin/global_assets/js/demo_pages/components_buttons.js') }}"></script>
<!-- Material io design -->
<script src="{{ asset('admin/assets/plugins/material-design/material-components.min.js') }}"></script>
<!-- Select2 material design -->
<script src="{{ asset('admin/assets/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/material-select2.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
<div class="ajax-loader">
    <img src="{{ asset('/admin/assets/image/loader.gif') }}" class="img-responsive"/>
</div>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    setTimeout(function () {
        $('.alert').slideUp(500);
    }, 3000);

    function loader() {
        $('.ajax-loader').css("visibility", "visible");
        setTimeout(function () {
            $('.ajax-loader').css("visibility", "hidden");
        }, 2000);
    }

    $('.textarea').each(function (e) {
         CKEDITOR.replace(this.id, {
            removePlugins: 'newpage,elementspath,save',
            extraPlugins: 'wysiwygarea',
            height: '400px',
            filebrowserUploadUrl: "{{route('admin.ckeditor.store', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    });

    $(function () {

        function formatText(icon) {
            return $('<span><i class="' + $(icon.element).data('icon') + '"></i> ' + icon.text + '</span>');
        }

        $('#selectIcon').select2({
            theme: 'outlined',
            placeholder: "Select icon",
            templateSelection: formatText,
            templateResult: formatText,
            width: '100%'
        });

    });
</script>
@yield('javascripts')
</body>
</html>

