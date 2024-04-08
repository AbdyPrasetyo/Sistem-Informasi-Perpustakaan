<!DOCTYPE html>

<html lang="en" class="lidght-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>SmackOne | {{ $title }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />


    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ url('../assets') }}/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ url('../assets') }}/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ url('../assets') }}/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ url('../assets') }}/css/demo.css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ url('../assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="{{ url('../assets') }}/vendor/libs/apex-charts/apex-charts.css" />

{{-- b --}}

<link href="{{ url('../assets') }}/vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
{{-- b --}}
    <!-- DataTable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    @stack('css')

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ url('../assets') }}/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ url('../assets') }}/js/config.js"></script>

  </head>
  <body>
    <!-- Layout wrapper -->
    <div class=" layout-wrapper layout-content-navbar">
    <div class="layout-container">
