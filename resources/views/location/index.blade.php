<!doctype html>
<html lang="en">
    <head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

      <title>Signum</title>

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
        <!-- Page Container -->
        <!--
            Available classes for #page-container:

        GENERIC

            'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

        SIDEBAR & SIDE OVERLAY

            'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
            'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
            'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
            'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
            'sidebar-dark'                              Dark themed sidebar

            'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
            'side-overlay-o'                            Visible Side Overlay by default

            'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

            'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

        HEADER

            ''                                          Static Header if no class is added
            'page-header-fixed'                         Fixed Header


        Footer

            ''                                          Static Footer if no class is added
            'page-footer-fixed'                         Fixed Footer (please have in mind that the footer has a specific height when is fixed)

        HEADER STYLE

            ''                                          Classic Header style if no class is added
            'page-header-dark'                          Dark themed Header
            'page-header-glass'                         Light themed Header with transparency by default
                                                        (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
            'page-header-glass page-header-dark'         Dark themed Header with transparency by default
                                                        (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

        MAIN CONTENT LAYOUT

            ''                                          Full width Main Content if no class is added
            'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
            'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
        -->
        <div id="page-container" class="page-header-fixed page-header-glass main-content-boxed">

            <!-- Header -->
            <header id="page-header" class="invisible" data-toggle="appear" data-class="animated fadeInDown" data-timeout="600">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="d-flex align-items-center">
                        <!-- Logo -->
                        <a class="link-fx font-size-lg font-w700 text-dark" href="index.html">
                            Dash<span class="text-primary">mix</span> <small class="font-w600 text-black">1.5</small>
                        </a>
                        <!-- END Logo -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Center Section -->
                    <div class="d-none d-lg-flex align-items-center">
                        <!-- Menu -->
                        <ul class="nav-main nav-main-horizontal nav-main-hover">
                            <li class="nav-main-item">
                                <a class="nav-main-link" data-toggle="scroll-to" data-speed="750" href="#dm-dashboards">
                                    <i class="nav-main-link-icon fa fa-compass"></i>
                                    <span class="nav-main-link-name">Dashboards</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" data-toggle="scroll-to" data-speed="750" href="#dm-widgets">
                                    <i class="nav-main-link-icon fa fa-puzzle-piece"></i>
                                    <span class="nav-main-link-name">Widgets</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" data-toggle="scroll-to" data-speed="750" href="#dm-layout">
                                    <i class="nav-main-link-icon fa fa-fire"></i>
                                    <span class="nav-main-link-name">Layout</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" data-toggle="scroll-to" data-speed="750" href="#dm-toolkit">
                                    <i class="nav-main-link-icon fab fa-node-js"></i>
                                    <span class="nav-main-link-name">Toolkit</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" data-toggle="scroll-to" data-speed="750" href="#dm-features">
                                    <i class="nav-main-link-icon fa fa-heartbeat"></i>
                                    <span class="nav-main-link-name">Features</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-brush"></i>
                                    <span class="nav-main-link-name">Themes</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" data-toggle="theme" data-theme="default" href="#">
                                            <i class="nav-main-link-icon fa fa-circle text-default"></i>
                                            <span class="nav-main-link-name">Default</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" data-toggle="theme" data-theme="assets/css/themes/xwork.min.css" href="#">
                                            <i class="nav-main-link-icon fa fa-circle text-xwork"></i>
                                            <span class="nav-main-link-name">xWork</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" data-toggle="theme" data-theme="assets/css/themes/xmodern.min.css" href="#">
                                            <i class="nav-main-link-icon fa fa-circle text-xmodern"></i>
                                            <span class="nav-main-link-name">xModern</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" data-toggle="theme" data-theme="assets/css/themes/xeco.min.css" href="#">
                                            <i class="nav-main-link-icon fa fa-circle text-xeco"></i>
                                            <span class="nav-main-link-name">xEco</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" data-toggle="theme" data-theme="assets/css/themes/xsmooth.min.css" href="#">
                                            <i class="nav-main-link-icon fa fa-circle text-xsmooth"></i>
                                            <span class="nav-main-link-name">xSmooth</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" data-toggle="theme" data-theme="assets/css/themes/xinspire.min.css" href="#">
                                            <i class="nav-main-link-icon fa fa-circle text-xinspire"></i>
                                            <span class="nav-main-link-name">xInspire</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" data-toggle="theme" data-theme="assets/css/themes/xdream.min.css" href="#">
                                            <i class="nav-main-link-icon fa fa-circle text-xdream"></i>
                                            <span class="nav-main-link-name">xDream</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" data-toggle="theme" data-theme="assets/css/themes/xpro.min.css" href="#">
                                            <i class="nav-main-link-icon fa fa-circle text-xpro"></i>
                                            <span class="nav-main-link-name">xPro</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" data-toggle="theme" data-theme="assets/css/themes/xplay.min.css" href="#">
                                            <i class="nav-main-link-icon fa fa-circle text-xplay"></i>
                                            <span class="nav-main-link-name">xPlay</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!-- END Menu -->
                    </div>
                    <!-- END Center Section -->

                    <!-- Right Section -->
                    <div class="d-flex align-items-center">
                        <!-- Call to action -->
                        <a class="btn btn-outline-primary" href="https://1.envato.market/r6y">
                            <i class="fa fa-fw fa-shopping-bag mr-1 opacity-75"></i>
                            <span class="font-w700 font-size-sm text-uppercase">Buy Now</span>
                        </a>
                        <!-- END Call to action -->
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


                <footer id="page-footer" class="bg-white">
                    <div class="content py-5">
                        <div class="row font-size-sm">
                            <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-right">
                                Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
                            </div>
                            <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-left">
                                <a class="font-w600" href="https://1.envato.market/r6y" target="_blank">Dashmix 1.5</a> &copy; <span data-toggle="year-copy">2018</span>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- END Footer -->

            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->


        <script src="/js/dashmix.core.min.js"></script>
        <script src="/js/dashmix.app.min.js"></script>
        <script src="/js/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

        <!-- Page JS Helpers (jQuery Sparkline Plugin) -->
    </body>
</html>
