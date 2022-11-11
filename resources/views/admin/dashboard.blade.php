<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('admin.layouts.head')
</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="{{asset('assets/images/pre-loader/loader-01.svg')}}" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('admin.layouts.main-header')

        @include('admin.layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0"> Dashboard</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <!-- widgets -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">Posts</p>
                                    <h4>{{\App\Models\Post::count()}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">Comments</p>
                                    <h4>{{\App\Models\Comment::count()}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Orders Status widgets-->
            <div class="row">
                <div class="col-xl-4 mb-30">
                    <div class="card card-statistics h-100">
                        <!-- action group -->
                        <div class="btn-group info-drop">
                            <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#"><i class="text-primary ti-reload"></i>Refresh</a>
                                <a class="dropdown-item" href="#"><i class="text-secondary ti-eye"></i>View
                                    all</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Market summary</h5>
                            <h4>$50,500 </h4>
                            <div class="row mt-20">
                                <div class="col-4">
                                    <h6>Apple</h6>
                                    <b class="text-info">+ 82.24 % </b>
                                </div>
                                <div class="col-4">
                                    <h6>Instagram</h6>
                                    <b class="text-danger">- 12.06 % </b>
                                </div>
                                <div class="col-4">
                                    <h6>Google</h6>
                                    <b class="text-warning">+ 24.86 % </b>
                                </div>
                            </div>
                        </div>
                        <div id="sparkline2" class="scrollbar-x text-center"></div>
                    </div>
                </div>
                <div class="col-xl-8 mb-30">
                    <div class="card h-100">
                        <div class="btn-group info-drop">
                            <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#"><i class="text-primary ti-reload"></i>Refresh</a>
                                <a class="dropdown-item" href="#"><i class="text-secondary ti-eye"></i>View
                                    all</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-block d-md-flexx justify-content-between">
                                <div class="d-block">
                                    <h5 class="card-title">Site Visits Growth </h5>
                                </div>
                                <div class="d-flex">
                                    <div class="clearfix mr-30">
                                        <h6 class="text-success">Income</h6>
                                        <p>+584</p>
                                    </div>
                                    <div class="clearfix  mr-50">
                                        <h6 class="text-danger"> Outcome</h6>
                                        <p>-255</p>
                                    </div>
                                </div>
                            </div>
                            <div id="morris-area" style="height: 320px;"></div>
                        </div>
                    </div>
                </div>
            </div>


            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            @include('admin.layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('admin.layouts.footer-scripts')

</body>

</html>
