<?
  include('../script/conn.php');
  include('../script/function.php');
  if(!isset($_COOKIE['stafflogintoken']) || !isset($_COOKIE['staffvid']))
  {
    header('Location: login.php');
  }
  if($_COOKIE['stafflogintoken'] != hashplz($_COOKIE['staffvid']))
  {
    setcookie('stafflogintoken', null, time()-7200);
    setcookie('staffvid', null, time()-7200);
    header('Location: login.php?error=3');
  }
  header('Location: ../');
?>
