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

          window.map = new google.maps.Map(document.getElementById('map'), {
            zoom: 11,
            center: {lat:-12.066910, lng:-77.023073},
            styles: [
            {
              featureType: 'poi',
              stylers: [{visibility: 'off'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry',
              stylers: [{color: '#ffffff'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry.stroke',
              stylers: [{color: '#ffffff'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'labels.text.fill',
              stylers: [{color: '#000000'}]
            },
            {
              featureType: 'administrative',
              elementType: 'labels.text.fill',
              stylers: [{visibility: 'off'}]
            },
            {
              featureType: 'transit',
              elementType: 'labels.text.fill',
              stylers: [{visibility: 'off'}]
            }
          ]
          });

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
                                <form name="signum_filter_form" action="/api/hexaquery">
                                    <div class="block mb-0">

                                        <!-- Options -->
                                        <div class="block-content block-content-sm block-content-full bg-body">
                                            <span class="text-uppercase font-size-sm font-w700">FABRICANTE</span>
                                        </div>
                                        <div class="block-content">
                                        @foreach($manufacturers as $manufacturer)
                                            <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                              <input type="checkbox" class="custom-control-input" id="so-.{{$manufacturer->manufacturer}}-status" name="so-manufacturer-status[]" value="{{$manufacturer->manufacturer}}">
                                              <label class="custom-control-label" for="so-.{{$manufacturer->manufacturer}}-status">{{$manufacturer->manufacturer}}</label>
                                            </div>
                                        @endforeach

                                        </div>
                                        <!-- END Options -->
                                        <!-- Options -->
                                        <div class="block-content block-content-sm block-content-full bg-body">
                                            <span class="text-uppercase font-size-sm font-w700">RED</span>
                                        </div>
                                        <div class="block-content">
                                            <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                                <input type="checkbox" class="custom-control-input" id="so-4g-status" name="so-network-status[]" value="4G">
                                                <label class="custom-control-label" for="so-4g-status">4G</label>
                                            </div>

                                            <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                                <input type="checkbox" class="custom-control-input" id="so-3g-status" name="so-network-status[]" value="3G" checked>
                                                <label class="custom-control-label" for="so-3g-status">3G</label>
                                            </div>

                                            <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                                <input type="checkbox" class="custom-control-input" id="so-2g-status" name="so-network-status[]" value="2G" checked>
                                                <label class="custom-control-label" for="so-2g-status">2G</label>
                                            </div>

                                            <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                                <input type="checkbox" class="custom-control-input" id="so-nn-status" name="so-network-status[]" value="NN" checked>
                                                <label class="custom-control-label" for="so-nn-status">Sin señal</label>
                                            </div>


                                        </div>
                                        <!-- END Options -->

                                        <!-- Submit -->
                                        <div class="block-content row justify-content-center border-top">
                                            <div class="col-9">
                                                <input  value = "Check" type ="button" class="btn btn-block btn-hero-primary" onclick="invocar();return false;">
                                                    <i class="fa fa-fw fa-save mr-1"></i> Save
                                                </input>
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
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGAOvDgtDnuRnLbShwZpEGVZTRPZNINIQ&callback=initMap&libraries=geometry">
              </script>
                <!-- Page Content -->
                <div class="content">
                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->

        </div>
        <!-- END Page Container -->

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Modal Header</h4>
              </div>
              <table class="table table-bordered table-striped table-vcenter" id="signum_data_table">
                  <thead>
                      <tr>
                          <th style="width: 20%;">Marca</th>
                          <th style="width: 10%;">Mediciones</th>
                          <th style="width: 10%;">Promedio</th>
                      </tr>
                  </thead>
                  <tbody>
                        <tr>
                            <td>Motorola</td>
                            <td>45</td>
                            <td>3.5</td>
                        </tr>
                  </tbody>
              </table>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Entendido</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Loader -->
        <div class="modal fade" id="myLoader" role="dialog">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Obteniendo información</h4>
                <img src="/uploads/spinner.gif" alt="" width="50px" height="50px">
              </div>
            </div>
          </div>
        </div>


        <script src="/js/dashmix.core.min.js"></script>
        <script src="/js/dashmix.app.min.js"></script>
        <script src="/js/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="/js/plugins/chart.js/Chart.bundle.min.js"></script>
        <script src="/js/pages/be_pages_dashboard.min.js"></script>
        <script>jQuery(function(){ Dashmix.helpers('sparkline'); });</script>
        <script src="/js/signum2.js"> </script>
    </body>
</html>
