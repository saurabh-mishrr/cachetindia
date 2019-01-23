<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       <title>Cachet Admin</title>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       {{ HTML::style('css/bootstrap.min.css') }}
       {{ HTML::style('css/adminstyle.css') }}
     
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
       {{ HTML::script('js/bootstrap.min.js') }}
       <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
       <link href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" rel="stylesheet">
    </head>
    <body>
            <div class="container-fluid fixed-top bg-primary py-3">
            <div class="row collapse show no-gutters d-flex h-100 position-relative">
                <div class="col-3 px-0 w-sidebar navbar-collapse collapse d-none d-md-flex">
                    <!-- spacer col -->
                </div>
                <div class="col px-3 px-md-0">
                    <!-- toggler -->
                    <a data-toggle="collapse" href="#" data-target=".collapse" role="button" class="text-white p-1">
                        <i class="fa fa-bars fa-lg"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="container-fluid px-0">
                <div class="row collapse show no-gutters d-flex h-100 position-relative">
                    <div class="col-3 p-0 h-100 w-sidebar navbar-collapse collapse d-none d-md-flex sidebar">
                        <!-- fixed sidebar -->
                        <div class="navbar-dark bg-dark text-white position-fixed h-100 align-self-start w-sidebar">
                            <h6 class="px-3 pt-3">Fixed Menu <a data-toggle="collapse" class="px-1 d-inline d-md-none text-white" href="#" data-target=".collapse"><i class="fa fa-bars"></i></a></h6>
                            <ul class="nav flex-column flex-nowrap text-truncate">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">Employee Docs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Events</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Birthday Wishes</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col p-3">
                       @yield('content');
                    </div>
                </div>
        </div>
    </body>
</html>
