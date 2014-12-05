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

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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

          <div class="inner cover">
            <h1 class="cover-heading">Découvrez l'étendu de la situation.</h1>
            <p class="lead">
              <?php 
                session_start();
                require_once("twitteroauth/twitteroauth/twitteroauth.php"); //Path to twitteroauth library
                 
                $twitteruser = "AirEsiea";
                $notweets = 10;
                $consumerkey = "Ru6ucQXdi8Kr9MYzGgIz56n87";
                $consumersecret = "4jtyeJb9Lc8oj5xTbyb8u2X361l3ZbRPrCokksYMJVWjm25nTo";
                $accesstoken = "1086420055-LXc5AXhslGY3pLRR2HSKqFkeACvFs5SINdonzJq";
                $accesstokensecret = "BrqKBnWDWUhqRMBq5vTKJZ5kkRfGHFmgHTT82VgpGJ0ye";
                 
                function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
                $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
                echo "func";
                return $connection;
              }
               
              $connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
               
              $tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
               
              echo json_encode($tweets);

              echo "test";
              ?>
            </p>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p> Nuit de l'info</p>
            </div>
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
