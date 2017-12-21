<?
  function connect_mysql()
  {
    $conn = mysql_connect('localhost','USER','PASS') or die('ERR: Could not connect to MySQL');
    return $conn;
  }
?>
