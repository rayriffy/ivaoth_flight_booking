<?
  include('../script/conn.php');
  include('../script/function.php');
  if(!isset($_COOKIE['stafflogintoken']) || !isset($_COOKIE['staffvid']))
  {
    header('Location: login.php');
    exit();
  }
  if($_COOKIE['stafflogintoken'] != hashplz($_COOKIE['staffvid']))
  {
    setcookie('stafflogintoken', null, time()-7200);
    setcookie('staffvid', null, time()-7200);
    setcookie('staffloginstat',3,time()+600);
    header('Location: login.php');
    exit();
  }
  else {
    header('Location: ../');
  }
?>
