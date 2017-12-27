<?
  require_once('../script/conn.php');
  include('../script/function.php');
  //IVAO LOGIN API
  define('cookie_name', 'ivao_token');
  define('login_url', 'http://login.ivao.aero/index.php');
  define('api_url', 'http://login.ivao.aero/api.php');
  define('url', 'http://booking.ivaothai.com/manage/act_login.php');
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
      $vid=utf8_decode($user_array->vid);
      $sql="SELECT * FROM `allowed_vid_staff` WHERE `vid` = ".$vid;
      $query=mysql_query($sql);
      while($row=mysql_fetch_array($query))
      {
        $response=$row[0];
      }
      if($vid==$response)
      {
        $salt="Y10gjnnwhG";
        setcookie('stafflogintoken', hashplz($vid), time()+7200,'/');
        setcookie('staffvid',$vid, time()+7200,'/');
        header('Location: /');
      }
      else
      {
        setcookie('staffloginstat',2,time()+600,'/');
        header('Location: login.php');
      }
      mysql_close();
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
?>
