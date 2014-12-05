<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Nuit de l'info 2014</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
    <link href="map.css" rel="stylesheet"/>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- <script src="../../assets/js/ie-emulation-modes-warning.js"></script> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">

      var markersArray = [];

      function clearOverlaysEbola() 
      {
        for (var i = 0; i < markersArray.length; i++ ) 
        {
          if(markersArray[i].strokeColor != "#000000")
          {
            markersArray[i].setVisible(false);
          }
          }
      }

      function clearOverlaysPolio() 
      {
        for (var i = 0; i < markersArray.length; i++ ) 
        {
          if(markersArray[i].strokeColor != "#800080")
          {
            markersArray[i].setVisible(false);
          }
          }
      }

      function clearOverlaysSida() 
      {
        for (var i = 0; i < markersArray.length; i++ ) 
        {
          if(markersArray[i].strokeColor != "#FF0000")
          {
            markersArray[i].setVisible(false);
          }
          }
      }

      function initialisation()
      {
        var centreCarte = new google.maps.LatLng( 4.430006, 15.766131 );
        var optionsCarte = {
          zoom: 4,
          center: centreCarte,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var Map = new google.maps.Map( document.getElementById("EmplacementDeMap"), optionsCarte);
        addCircleContaminationEbola(Map, 4.430006, 15.766131, 500);
        addCircleContaminationSida(Map, 1.430006, 11.766131, 200);
        addCircleContaminationPolio(Map, 9.430006, 19.766131, 400);
        addCircleContaminationEbola(Map, 25.430006, 25.766131, 150);
        addCircleContaminationSida(Map, 10.430006, 22.766131, 300);
        addCircleContaminationPolio(Map, 0.430006, 35.766131, 800);
      }

      function addCircleContaminationEbola(Map, lat, lon, nbInfecte)
      {
        var nbInfectes = nbInfecte*1000;
        var pos = new google.maps.LatLng(lat, lon);
        var optionsCercle = {
          center: pos,
          map: Map,
          radius: 0,
          strokeColor: "#000000",
          fillColor: "000000"
        };
        var cercle = new google.maps.Circle(optionsCercle);
        markersArray.push(cercle);
        google.maps.event.addDomListener(document.getElementById("Ebola"), "click", function(){
          clearOverlaysEbola();
          cercle.setVisible(true);
          agrandirCercle(cercle, nbInfectes);
        });
      }

      function addCircleContaminationSida(Map, lat, lon, nbInfecte)
      {
        var nbInfectes = nbInfecte*1000;
        var pos = new google.maps.LatLng(lat, lon);
        var optionsCercle = {
          center: pos,
          map: Map,
          radius: 0,
          strokeColor: "#FF0000",
          fillColor: "FF0000"
        };
        var cercle = new google.maps.Circle(optionsCercle);
        markersArray.push(cercle);
        google.maps.event.addDomListener(document.getElementById("Sida"), "click", function(){
          clearOverlaysSida();
          cercle.setVisible(true);
          agrandirCercle(cercle, nbInfectes);
        });
      }

      function addCircleContaminationPolio(Map, lat, lon, nbInfecte)
      {
        var nbInfectes = nbInfecte*1000;
        var pos = new google.maps.LatLng(lat, lon);
        var optionsCercle = {
          center: pos,
          map: Map,
          radius: 0,
          strokeColor: "#800080",
          fillColor: "800080"
        };
        var cercle = new google.maps.Circle(optionsCercle);
        markersArray.push(cercle);
        google.maps.event.addDomListener(document.getElementById("Polio"), "click", function(){
          clearOverlaysPolio();
          cercle.setVisible(true);
          agrandirCercle(cercle, nbInfectes);
          
        });
      }

      function agrandirCercle(objetCercle, rayonFinal) 
      {
        var rayon = 0;
        var ajoute = 10000;
        var delai = 30;
        function incremente() {
          objetCercle.setRadius(rayon);
          if( rayon<=rayonFinal ) {
            rayon=rayon+ajoute;
            setTimeout(incremente, delai);
          }
        };
        setTimeout(incremente, delai);
      }

      google.maps.event.addDomListener( window, 'load', initialisation );
    </script>

  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Urgence Afrique</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="#">Carte</a></li>
                  <li><a href="association.html">Associations</a></li>
                  <li><a href="#">Donner</a></li>
                </ul>
              </nav>
            </div>
          </div>
          <div id="EmplacementDeMap"></div>
          <div id="Ebola" class="btn">Ebola</div>
          <div id="Sida" class="btn">Sida</div>
          <div id="Polio" class="btn">Poliomyelite</div>
         </div>
     <!-- </div>
    </div>
    
    <div class="site-wrapper">
      <div class="site-wrapper-inner"> -->
        <div class="mastfoot">
          <div class="inner">
            <p> Nuit de l'info</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
