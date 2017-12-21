<?
  if(!isset($_REQUEST['id']))
  {
    header('Location /');
  }

  //IVAO LOGIN API
  define('cookie_name', 'ivao_token');
  define('login_url', 'http://login.ivao.aero/index.php');
  define('api_url', 'http://login.ivao.aero/api.php');
  define('url', 'http://booking.ivaothai.com/book?id='.$_REQUEST['id']);
  function redirect()
  {
  	setcookie(cookie_name, '', time()-3600);
  	header('Location: '.login_url.'?url='.url);
  	exit;
  }
  if($_GET['IVAOTOKEN'] && $_GET['IVAOTOKEN'] !== 'error')
  {
  	setcookie(cookie_name, $_GET['IVAOTOKEN'], time()+3600);
  	header('Location: '.url);
  	exit;
  }
  else if($_GET['IVAOTOKEN'] == 'error')
  {
	   die('This domain is not allowed to use the Login API! Contact the System Adminstrator!');
  }
  if($_COOKIE[cookie_name]) {
  	$user_array = json_decode(file_get_contents(api_url.'?type=json&token='.$_COOKIE[cookie_name]));
  	if($user_array->result)
    {
  		//Success! A user has been found!
  		//echo 'Hello '.utf8_decode($user_array->firstname).' '.utf8_decode($user_array->lastname).'!';
  	}
    else
    {
  		redirect();
    }
  }
  else
  {
  	redirect();
  }

  include('/script/conn.php');
  connect_mysql();
  mysql_select_db('ivaoth_book') or die('ERR: Database not found');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>#TITLE# | IVAO Thailand Booking System</title>
  <meta name="theme-color" content="#3a87ad">
  <meta name="msapplication-navbutton-color" content="#3a87ad">
  <meta name="apple-mobile-web-app-status-bar-style" content="#3a87ad">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/css?family=Kanit:400,400i,700,700i|Material+Icons&amp;subset=thai" rel="stylesheet">
</head>
<body>
  <nav class="blue darken-2">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo center">LOGO</a>
      <ul class="left hide-on-med-and-down">
        <li class="active"><a href="#">Event</a></li>
        <li><a href="#">Rules</a></li>
        <li><a href="#">About</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col s12 l4">
        <div class="row">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Event Details</span>
              ...
            </div>
          </div>
        </div>
      </div>
      <div class="col s12 l8">
        <div class="row">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Pilot Booking</span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="card">
            <div class="card-content">
              <span class="card-title">ATC Booking</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer><center>© <? if(date("Y")>2017){ echo '2017-'; } echo date("Y"); ?> RiffyTech Corporation</center></footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</body>
</html>
