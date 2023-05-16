<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ustora Demo</title>
    <style>
        .review-section {
            background-color: #f5f5f5;
            padding: 20px;
        }

        .review-list {
            list-style-type: none;
            padding: 0;
        }

        .review-item {
            margin-bottom: 20px;
        }

        .reviewer-name {
            margin: 0;
            font-size: 18px;
        }

        .reviewer-date {
            margin: 0;
            font-size: 14px;
        }

        .review-text {
            margin-top: 0;
            font-size: 16px;
            line-height: 1.5;
        }

        .rating-star {
            color: #ffc107;
            font-size: 20px;
        }

        .rating-value {
            font-size: 14px;
            margin-left: 10px;
            font-weight: bold;
        }

    </style>


    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/backend/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/backend/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/backend/css/owl.carousel.css">
    <link rel="stylesheet" href="/backend/style.css">
    <link rel="stylesheet" href="/backend/css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
</head>
<body>

{{--start header--}}
@include('admin.layout.header')
{{--start menubar--}}
@include('admin.layout.menubar')
{{--end menubar--}}

@yield('content')
{{--start footer--}}
@include('admin.layout.footer')
{{--end footer--}}
<!-- Latest jQuery form server -->
<script src="https://code.jquery.com/jquery.min.js"></script>

<!-- Bootstrap JS form CDN -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- jQuery sticky menu -->
<script src="/backend/js/owl.carousel.min.js"></script>
<script src="/backend/js/jquery.sticky.js"></script>

<!-- jQuery easing -->
<script src="/backend/js/jquery.easing.1.3.min.js"></script>

<!-- Main Script -->
<script src="/backend/js/main.js"></script>

<!-- Slider -->
<script type="text/javascript" src="/backend/js/bxslider.min.js"></script>
<script type="text/javascript" src="/backend/js/script.slider.js"></script>

</body>
</html>

