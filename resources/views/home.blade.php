<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="The ecommerce website was created in Dec 2020">
    <meta name="author" content="Ashley Tendai Muzuro">

    <title> BigData Ecommerce | Admin </title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/sb-admin.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/products') }}">Admin</a>
                <a class="navbar-brand" href="{{ url('/products') }}">Home</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="{{ url('/products') }}"><i class="fa fa-fw fa-bar-chart-o"></i> View Products</a>
                    </li>
                    <li>
                        <a href="{{ url('/add_product') }}"><i class="fa fa-fw fa-table"></i> Add Product</a>
                    </li>
                    <li>
                        <a href="{{ url('/categories') }}"><i class="fa fa-fw fa-desktop"></i> Categories</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        <script src="{{ asset('assets/js/jquery.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/morris/raphael.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/morris/morris.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/morris/morris-data.js') }}"></script>
    </div>

    </body>

</html>