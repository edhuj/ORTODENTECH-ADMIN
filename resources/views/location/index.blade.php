<!doctype html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

      <title>Ortodontech</title>

      <!-- Icons -->
      <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
      <link rel="shortcut icon" href="media/favicons/favicon.png">
      <link rel="icon" type="image/png" sizes="192x192" href="media/favicons/favicon-192x192.png">
      <link rel="apple-touch-icon" sizes="180x180" href="media/favicons/apple-touch-icon-180x180.png">
      <!-- END Icons -->

      <!-- Stylesheets -->
      <!-- Fonts and Dashmix framework -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
      <link rel="stylesheet" id="css-main" href="/css/dashmix.min.css">

      <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
      <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
      <!-- END Stylesheets -->
    </head>
    <body>

        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-fixed page-header-dark main-content-narrow">
            <!-- Side Overlay-->
            <aside id="side-overlay">
                <!-- Side Header -->
                <div class="bg-image" style="background-image: url('/media/various/bg_side_overlay_header.jpg');">
                    <div class="bg-primary-op">
                        <div class="content-header">
                            <!-- User Avatar -->
                            <a class="img-link mr-1" href="be_pages_generic_profile.html">
                                <img class="img-avatar img-avatar48" src="/media/avatars/avatar10.jpg" alt="">
                            </a>
                            <!-- END User Avatar -->

                            <!-- User Info -->
                            <div class="ml-2">
                                <a class="text-white font-w600" href="be_pages_generic_profile.html">George Taylor</a>
                                <div class="text-white-75 font-size-sm font-italic">Full Stack Developer</div>
                            </div>
                            <!-- END User Info -->

                            <!-- Close Side Overlay -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="ml-auto text-white" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
                                <i class="fa fa-times-circle"></i>
                            </a>
                            <!-- END Close Side Overlay -->
                        </div>
                    </div>
                </div>
                <!-- END Side Header -->

                <!-- Side Content -->
                <div class="content-side">
                    <!-- Side Overlay Tabs -->
                    <div class="block block-transparent pull-x pull-t">
                        <ul class="nav nav-tabs nav-tabs-block nav-justified" data-toggle="tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#so-settings">
                                    <i class="fa fa-fw fa-cog"></i>
                                </a>
                            </li>

                        </ul>
                        <div class="block-content tab-content overflow-hidden">
                            <!-- Profile -->
                            <div class="tab-pane pull-x fade fade-up" id="so-settings" role="tabpanel">
                                <form action="be_pages_dashboard.html" method="POST" onsubmit="return false;">
                                    <div class="block mb-0">
                                        <!-- Personal -->
                                        <div class="block-content block-content-sm block-content-full bg-body">
                                            <span class="text-uppercase font-size-sm font-w700">Personal</span>
                                        </div>
                                        <div class="block-content block-content-full">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" readonly class="form-control" id="staticEmail" value="Admin">
                                            </div>
                                            <div class="form-group">
                                                <label for="so-profile-name">Name</label>
                                                <input type="text" class="form-control" id="so-profile-name" name="so-profile-name" value="George Taylor">
                                            </div>
                                            <div class="form-group">
                                                <label for="so-profile-email">Email</label>
                                                <input type="email" class="form-control" id="so-profile-email" name="so-profile-email" value="g.taylor@example.com">
                                            </div>
                                        </div>
                                        <!-- END Personal -->

                                        <!-- Password Update -->
                                        <div class="block-content block-content-sm block-content-full bg-body">
                                            <span class="text-uppercase font-size-sm font-w700">Password Update</span>
                                        </div>
                                        <div class="block-content block-content-full">
                                            <div class="form-group">
                                                <label for="so-profile-password">Current Password</label>
                                                <input type="password" class="form-control" id="so-profile-password" name="so-profile-password">
                                            </div>
                                            <div class="form-group">
                                                <label for="so-profile-new-password">New Password</label>
                                                <input type="password" class="form-control" id="so-profile-new-password" name="so-profile-new-password">
                                            </div>
                                            <div class="form-group">
                                                <label for="so-profile-new-password-confirm">Confirm New Password</label>
                                                <input type="password" class="form-control" id="so-profile-new-password-confirm" name="so-profile-new-password-confirm">
                                            </div>
                                        </div>
                                        <!-- END Password Update -->

                                        <!-- Options -->
                                        <div class="block-content block-content-sm block-content-full bg-body">
                                            <span class="text-uppercase font-size-sm font-w700">Options</span>
                                        </div>
                                        <div class="block-content">
                                            <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                                <input type="checkbox" class="custom-control-input" id="so-settings-status" name="so-settings-status" value="1">
                                                <label class="custom-control-label" for="so-settings-status">Online Status</label>
                                            </div>
                                            <p class="text-muted font-size-sm">
                                                Make your online status visible to other users of your app
                                            </p>
                                            <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                                <input type="checkbox" class="custom-control-input" id="so-settings-notifications" name="so-settings-notifications" value="1" checked>
                                                <label class="custom-control-label" for="so-settings-notifications">Notifications</label>
                                            </div>
                                            <p class="text-muted font-size-sm">
                                                Receive desktop notifications regarding your projects and sales
                                            </p>
                                            <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                                <input type="checkbox" class="custom-control-input" id="so-settings-updates" name="so-settings-updates" value="1" checked>
                                                <label class="custom-control-label" for="so-settings-updates">Auto Updates</label>
                                            </div>
                                            <p class="text-muted font-size-sm">
                                                If enabled, we will keep all your applications and servers up to date with the most recent features automatically
                                            </p>
                                        </div>
                                        <!-- END Options -->

                                        <!-- Submit -->
                                        <div class="block-content row justify-content-center border-top">
                                            <div class="col-9">
                                                <button type="submit" class="btn btn-block btn-hero-primary">
                                                    <i class="fa fa-fw fa-save mr-1"></i> Save
                                                </button>
                                            </div>
                                        </div>
                                        <!-- END Submit -->
                                    </div>
                                </form>
                            </div>
                            <!-- END Profile -->
                        </div>
                    </div>
                    <!-- END Side Overlay Tabs -->
                </div>
                <!-- END Side Content -->
            </aside>
            <!-- END Side Overlay -->



            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div>
                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                        <button type="button" class="btn btn-dual mr-1" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                        <!-- END Toggle Sidebar -->

                        <!-- Open Search Section -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-dual" data-toggle="layout" data-action="header_search_on">
                            <i class="fa fa-fw fa-search"></i> <span class="ml-1 d-none d-sm-inline-block">Search</span>
                        </button>
                        <!-- END Open Search Section -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div>
                        <!-- User Dropdown -->
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-fw fa-user d-sm-none"></i>
                                <span class="d-none d-sm-inline-block">Admin</span>
                                <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                                <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                                    User Options
                                </div>
                                <div class="p-2">
                                    <a class="dropdown-item" href="be_pages_generic_profile.html">
                                        <i class="far fa-fw fa-user mr-1"></i> Profile
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_inbox.html">
                                        <span><i class="far fa-fw fa-envelope mr-1"></i> Inbox</span>
                                        <span class="badge badge-primary">3</span>
                                    </a>
                                    <a class="dropdown-item" href="be_pages_generic_invoice.html">
                                        <i class="far fa-fw fa-file-alt mr-1"></i> Invoices
                                    </a>
                                    <div role="separator" class="dropdown-divider"></div>

                                    <!-- Toggle Side Overlay -->
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                                        <i class="far fa-fw fa-building mr-1"></i> Settings
                                    </a>
                                    <!-- END Side Overlay -->

                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="op_auth_signin.html">
                                        <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> Sign Out
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END User Dropdown -->


                        <!-- Toggle Side Overlay -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-dual" data-toggle="layout" data-action="side_overlay_toggle">
                            <i class="far fa-fw fa-list-alt"></i>
                        </button>
                        <!-- END Toggle Side Overlay -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                <!-- Header Search -->
                <div id="page-header-search" class="overlay-header bg-primary">
                    <div class="content-header">
                        <form class="w-100" action="be_pages_generic_search.html" method="POST">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <button type="button" class="btn btn-primary" data-toggle="layout" data-action="header_search_off">
                                        <i class="fa fa-fw fa-times-circle"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control border-0" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Header Search -->

                <!-- Header Loader -->
                <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-primary-darker">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">

                <!-- Hero -->
                <div class="bg-image" style="background-image: url('assets/media/various/bg_dashboard.jpg');">
                    <div class="bg-white-90">
                        <div class="content content-full">
                            <div class="row">
                                <div class="col-md-6 d-md-flex align-items-md-center">
                                    <div class="py-4 py-md-0 text-center text-md-left invisible" data-toggle="appear">
                                        <h1 class="font-size-h2 mb-2">Dashboard</h1>
                                        <h2 class="font-size-lg font-w400 text-muted mb-0">Today is a great one!</h2>
                                    </div>
                                </div>
                                <div class="col-md-6 d-md-flex align-items-md-center">
                                    <div class="row w-100 text-center">
                                        <div class="col-6 col-xl-4 offset-xl-4 invisible" data-toggle="appear" data-timeout="300">
                                            <p class="font-size-h3 font-w600 text-body-color-dark mb-0">
                                                67
                                            </p>
                                            <p class="font-size-sm font-w700 text-uppercase mb-0">
                                                <i class="far fa-chart-bar text-muted mr-1"></i> Sales
                                            </p>
                                        </div>
                                        <div class="col-6 col-xl-4 invisible" data-toggle="appear" data-timeout="600">
                                            <p class="font-size-h3 font-w600 text-body-color-dark mb-0">
                                                $980
                                            </p>
                                            <p class="font-size-sm font-w700 text-uppercase mb-0">
                                                <i class="far fa-chart-bar text-muted mr-1"></i> Earnings
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">

                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="bg-body-light">
                <div class="content py-0">
                    <div class="row font-size-sm">
                        <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right">
                            Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
                        </div>
                        <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                            <a class="font-w600" href="https://1.envato.market/r6y" target="_blank">Dashmix 1.5</a> &copy; <span data-toggle="year-copy">2018</span>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->


        <script src="/js/dashmix.core.min.js"></script>
        <script src="/js/dashmix.app.min.js"></script>
        <script src="/js/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="/js/plugins/chart.js/Chart.bundle.min.js"></script>
        <script src="/js/pages/be_pages_dashboard.min.js"></script>
        <script>jQuery(function(){ Dashmix.helpers('sparkline'); });</script>
    </body>
</html>
