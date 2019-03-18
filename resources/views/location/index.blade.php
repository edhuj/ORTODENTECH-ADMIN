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
      <!-- <link rel="stylesheet" id="css-theme" href="/css/themes/xwork.min.css"> -->
      <!-- END Stylesheets -->

      <style>
        #map {
          height: 100%;
        }
        html, body {
          height: 100%;
          margin: 0;
          padding: 0;
        }
      </style>

      <script>
        function initMap() {

          signalLocations = {!!json_encode($locations)!!};

          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 11,
            center: {lat:-12.066910, lng:-77.023073},
            mapTypeId: 'terrain',
            styles: [
            {
              featureType: 'poi',
              stylers: [{visibility: 'off'}]
            }
          ]
          });


          console.log(signalLocations.length);
          for (i = 0; i < signalLocations.length; i++) {
            console.log("Hello "+signalLocations[i].accuracy);
            if(parseInt(signalLocations[i].networkType) == 15 ){ //3G
                if(parseInt(signalLocations[i].level) == 1){
                  mycolor = '#f03b20'
                }
                if(parseInt(signalLocations[i].level) == 2){
                  mycolor = '#feb24c'
                }
                if(parseInt(signalLocations[i].level) == 3){
                  mycolor = '#ffeda0'
                }
                if(parseInt(signalLocations[i].level) == 4){
                  mycolor = '#31a354'
                }
                if(parseInt(signalLocations[i].level) == 5){
                  mycolor = '#31a354'
                }
            }
            else if(parseInt(signalLocations[i].networkType) == 13){//4G
              mycolor = '#0000ff'
            }
            new google.maps.Circle({
              strokeColor: mycolor,
              strokeOpacity: 1.0,
              strokeWeight: 2,
              fillColor: mycolor,
              fillOpacity: 1.0,
              map: map,
              center: {
                lat: parseFloat(signalLocations[i].latitude),lng: parseFloat(signalLocations[i].longitude),
              },
              radius:20
            });
          }

        }
      </script>

    </head>
    <body>

        <div id="page-container" class="enable-page-overlay side-scroll page-header-fixed page-header-dark main-content-narrow side-trans-enabled">
            <!-- Side Overlay-->
            <aside id="side-overlay">
                <!-- Side Header -->
                <div class="bg-image" style="background-image: url('/media/various/bg_side_overlay_header.jpg');">
                    <div class="bg-primary-op">
                        <div class="content-header">

                            <!-- User Info -->
                            <div class="ml-2">
                                <a class="text-white font-w600" href="be_pages_generic_profile.html">Filtrar signals</a>
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

                        <div class="block-content tab-content overflow-hidden">
                            <!-- Profile -->
                            <div class="tab-pane pull-x fade fade-up show active" id="so-profile" role="tabpanel">
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

                    <!-- Right Section -->
                    <div>
                        <button type="button" class="btn btn-dual" data-toggle="layout" data-action="side_overlay_toggle">
                            <i class="far fa-fw fa-list-alt"></i>
                        </button>
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

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
              <div id="map"></div>
              <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGAOvDgtDnuRnLbShwZpEGVZTRPZNINIQ&callback=initMap">
              </script>
                <!-- Page Content -->
                <div class="content">


                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->

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
