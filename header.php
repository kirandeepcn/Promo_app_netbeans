<?phpsession_start();function __autoload($classname) {    include "include/" . $classname . ".class.php";}?><html><head>    <title>Promo App</title><meta charset="UTF-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="stylesheet" href="css/applogo.css"><link rel="stylesheet" type="text/css" href="css/spectrum.css"><link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/ ><script src="jquery/jquery.js"></script><script src="jquery/jquery.datetimepicker.js"></script><link rel="stylesheet" type="text/css" href="css/style.css" /><link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css' /><noscript>  <link rel="stylesheet" type="text/css" href="css/noJS.css" /></noscript><script type="text/javascript">            function validate()            {                var userObj = $("#username");                var passObj = $("#password");                flag = 1;                $("#user_error").html("");                $("#user_pass").html("");                if(userObj.val() === "") {                    $("#user_error").html('Please fill this field');                    flag = 0;                }                if(passObj.val() === "") {                    $("#user_pass").html('Please fill this field');                    flag = 0 ;                }                 if(flag == 1){                                $.ajax({                        method: "POST",                        url: "API/index.php",                        data: { username: userObj.val(), password: passObj.val(), type:"login" }                    }).done(function( data ) {                        var returnedData = JSON.parse(data);                        if(returnedData.code == 1) {                            location.href = "admin.php";                        } else {                            alert(returnedData.message);                        }                      });                }                  return false;            }                        // run the currently selected effect            function runEffect() {              // get effect type from              var selectedEffect = $( "#effectTypes" ).val();              // most effect types need no options passed by default              var options = {};              // some effects have required parameters              if ( selectedEffect === "scale" ) {                options = { percent: 0 };              } else if ( selectedEffect === "size" ) {                options = { to: { width: 200, height: 60 } };              }              // run the effect              $( ".hide_toggle" ).toggle( selectedEffect, options, 500 );            }            $(document).ready(function(){                $("#log").click(function(){                    $.ajax({                            method: "POST",                            url: "API/index.php",                            data: { type:"logout" }                        }).done(function( data ) {                            location.href = "login.php";                          });                });                                                              // set effect from select menu value                $( "#taber" ).click(function() {                  runEffect();                });            });        </script></head><body><header>  <div class="wrapper">    <div class="outer_header">        <div class="logo head"> <a href="admin.php" ><img src="images/logo.jpg" alt="logo"> </a> </div>      <div class="ryt_admin">        <div class="inner_admin">          <div class="droper">            <div class="dropper_inner">            <?php if(isset($_SESSION['access_token'])) {             ?>              <div class="user_name"> Admin <img src="images/arrow.jpg" alt="arrow" id="show"> </div>                                 <div class="htab_o">                      <div class="htab hr_l"> Change Password </div>                      <div class="htab" id="log"> Logout </div>                    </div>              <?php } ?>            </div>          </div>        </div>      </div>    </div>	</div>	</header>