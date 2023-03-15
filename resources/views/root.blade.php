<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Expense Manager</title>

        <!--begin::Vendor Stylesheets(used for this page only)-->
        <link href="{{ asset('js/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <!--end::Vendor Stylesheets-->

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/js/app.js'])
        @spladeHead
    </head>
    <body class="font-sans antialiased">
        @splade

        <!--begin::Custom Javascript(used for products.index view only)-->
        <script src="{{ asset('js/datatables/datatables.bundle.js') }}"></script>
        <script src="{{ asset('js/products.js') }}"></script>
        <!--end::Custom Javascript-->
    </body>
</html>
