<?
function hashplz($str) {
  $salt="Y10gjnnwhG";
  return hash('sha256', $salt.$str, false);
}
?>
