<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>小豆沙</title>
    <!-- CSS 及 JavaScript -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link href="//cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" >
    <link rel="icon" href="/images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon"/>
    <!--[if IE]>
    <script src="//cdn.bootcss.com/html5shiv/r29/html5.js"></script>
    <![endif]-->

    <style>
         li{list-style:none}
    </style>

</head>


<nav class="navbar navbar-default" role="navigation" style="background-color:rgb(255,255,255)">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#example-navbar-collapse">
            <span class="sr-only">切换导航</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">小豆沙</a>
    </div>
    <div class="collapse navbar-collapse" id="example-navbar-collapse" >
        <ul class="nav navbar-nav">


            @yield('checkbox')
        </ul>
    </div>
</nav>
<script src="//cdn.bootcss.com/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>

@yield('content')


</html>