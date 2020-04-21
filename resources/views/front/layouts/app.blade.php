<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{url('/front')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('/front')}}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('/front')}}/css/style.css">

    <title>Hello, world!</title>
</head>

<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Aflamna</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Actions</a></li>
                        <li><a href="#">Adventure</a></li>
                        <li><a href="#">Children's/Family   </a></li>
                        <li><a href="#">Crime </a></li>
                        <li><a href="#">Epic  </a></li>
                        <li><a href="#">Historical Film  </a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" id="search" placeholder="Find Movies, TV shows, Celebrities and more...">
                    <select id="my-select" class="form-control" name="filter">
                        <option>ALL</option>
                        <option>Movies</option>
                        <option>Series</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">WatchList</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="">Login</a></li>
                        <li><a href="#">Register</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

@yield('content')
<!-- Grid row -->
<!-- Grid row -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{url('/front')}}/{{url('/front')}}/js/jquery-3.3.1.slim.min.js"></script>
<script src="{{url('/front')}}/{{url('/front')}}/js/popper.min.js"></script>
<script src="{{url('/front')}}/{{url('/front')}}/js/bootstrap.min.js"></script>
</body>

</html>
