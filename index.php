<?
  require_once('script/conn.php');
  include('script/function.php');
  $today=date('Y-m-d')." 23:59:59";
  $sql="SELECT `table_name`, `full_name`, `book_end_expire` FROM `name` WHERE `event_expire`<".$today;
  $query=mysql_query($sql);
  $count=0;
  $is_staff=false;
  if(isset($_COOKIE['stafflogintoken']) && isset($_COOKIE['staffvid']))
  {
    $is_staff=check_is_staff($_COOKIE['staffvid'],$_COOKIE['stafflogintoken']);
  }
  while($row=mysql_fetch_array($query))
  {
    $dat[$count][0]=$row[0]; //ID
    $dat[$count][1]=$row[1]; //NAME
    $dat[$count][2]=$row[2]; //BOOKING END
    $count++;
  }/*
  if(isset($_COOKIE['staffvid']) && isset($_COOKIE['stafflogintoken']))
  {
    if($_COOKIE['stafflogintoken'] != hashplz($_COOKIE['staffvid']))
    {
      setcookie('stafflogintoken', null, time()-7200);
      setcookie('staffvid', null, time()-7200);
      header('Location: manage/login.php?error=3');
    }
    else
    {
      $staff_success=1;
    }
  }*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>IVAO Thailand Booking System</title>
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
        <? if($is_staff) { ?><li><a onclick="$('#create_ev').modal('open');" <? //class="modal-trigger" href="#create_ev" ?>><i class="material-icons">add</i></a></li><? } ?>
      </ul>
      <ul class="right hide-on-med-and-down">
        <? if($is_staff) { ?><li><span class="red darken-3 new badge" data-badge-caption="Staff Access"></span>&nbsp;&nbsp;</li><? } else { ?><li><span class="blue darken-3 new badge" data-badge-caption="Normal Access"></span>&nbsp;&nbsp;</li><? } ?>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="card">
        <div class="card-content">
          <table>
            <thead>
              <tr>
                <th>Event Name</th>
                <th>Booked</th>
                <th>Booking Expiration</th>
              </tr>
            </thead>
            <tbody>
              <?
                for($i=0;$i<$count;$i++)
                {
              ?>
              <tr>
                <td><a href="/book?id=<? echo $dat[$i][0]; ?>"><? echo $dat[$i][1]; ?></a></td>
                <td>#UNKNOWN#</td>
                <td><? echo $dat[$i][2]; ?></td>
              </tr>
              <?
                }
              ?>
              <? /*<tr>
                <td><a href="#">Booking Test Event 1</a></td>
                <td>0</td>
                <td>2020-01-31 23:59:00</td>
              </tr> */?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <? if($is_staff) { ?>
  <div id="create_ev" class="modal">
    <div class="modal-content">
      <h4>Creating Event</h4>
      <div class="container">
        <div class="row">
          <div class="input-field col s6 l4">
            <input disabled value="1" id="ev_id" type="text" class="validate">
            <label for="ev_id">Event ID</label>
          </div>
          <div class="input-field col s6 l8">
            <input id="ev_img" type="text" class="validate">
            <label for="ev_img">Image URL</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 l6">
            <input id="ev_name" type="text" class="validate">
            <label for="ev_name">Event name</label>
          </div>
          <div class="input-field col s12 l6">
            <input id="ev_des" type="text" class="validate">
            <label for="ev_des">Description</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 l6">
            <input id="ev_date" type="text" class="datepicker">
            <label for="ev_date">Event Date</label>
          </div>
          <div class="input-field col s6 l3">
            <input id="ev_start" type="text" class="timepicker">
            <label for="ev_start">Start at</label>
          </div>
          <div class="input-field col s6 l3">
            <input id="ev_end" type="text" class="timepicker">
            <label for="ev_end">End at</label>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <a href="#" class="waves-effect waves-light btn-flat">Create</a>
      <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat">Close</a>
    </div>
  </div>
  <? } ?>

  <footer><center>© <? if(date("Y")>2017){ echo '2017-'; } echo date("Y"); ?> RiffyTech Corporation</center></footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('.modal').modal();
    $('.datepicker').pickadate({
      selectMonths: true,
      selectYears: 2,
      today: 'Today',
      clear: 'Clear',
      close: 'Ok',
      closeOnSelect: false
    });
    $('.timepicker').pickatime({
      default: 'now',
      fromnow: 0,
      twelvehour: false,
      donetext: 'OK',
      cleartext: 'Clear',
      canceltext: 'Cancel',
      autoclose: false
    });
  });
  </script>
</body>
</html>
