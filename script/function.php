<?
function hashplz($str) {
  $salt="Y10gjnnwhG";
  return hash('sha256', $salt.$str, false);
}
function check_is_staff($vid, $hash) {
  require_once('conn.php');
  $sql="SELECT * FROM `allowed_vid_staff` WHERE `vid` = ".$vid;
  $query=mysql_query($sql);
  while($row=mysql_fetch_array($query))
  {
    $response=$row[0];
  }
  if($vid==$response && $hash==hashplz($response))
    return true;
  else
    return false;
}
?>
