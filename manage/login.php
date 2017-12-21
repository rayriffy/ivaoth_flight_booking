<?
  if(isset($_COOKIE['stafflogintoken']) && isset($_COOKIE['staffvid']))
  {
    header('Location: ../');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login | IVAO-TBS</title>
  <meta name="theme-color" content="#3a87ad">
  <meta name="msapplication-navbutton-color" content="#3a87ad">
  <meta name="apple-mobile-web-app-status-bar-style" content="#3a87ad">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/css?family=Kanit:400,400i,700,700i|Material+Icons&amp;subset=thai" rel="stylesheet">
  <style media="screen">
  body {
    overflow: hidden;
  }
  #centering {
    transform: translate(-50%, -50%);
    position: absolute;
    top: 50%;
    left: 50%;
    padding: 20px;
    resize: both;
    overflow: auto;
  }
  </style>
</head>
<body class="blue darken-2">
  <div class="container" id="centering">
    <div class="row">
      <div class="col l4 offset-l4 s10 offset-s1">
        <div class="card">
          <div class="card-content">
            <span class="card-title">Login</span>
            <div class="row">
              <? if($_REQUEST['error']==2){ ?>
              <div class="chip red lighten-1 white-text col s12">
                <center>Restricted Area
                <i class="close material-icons">close</i></center>
              </div>
              <? } else if($_REQUEST['error']==3) { ?>
              <div class="chip red lighten-1 white-text col s12">
                <center>Invalid session!
                <i class="close material-icons">close</i></center>
              </div>
              <? } ?>
              <div class="col s12">&nbsp;</div>
              <a class="btn waves-effect waves-light blue col s12" href="act_login.php">LOGIN VIA <b>IVAO ID</b></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="white-text"><center>© <? if(date("Y")>2017){ echo '2017-'; } echo date("Y"); ?> RiffyTech Corporation</center></footer>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</body>
</html>
