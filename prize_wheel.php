<!--DOCTYPE html-->
<html>
<head>
<?php
include "./header.php";
include "./check_session.php";

$title = $title_size = $title_font = $text = $text_size = $text_font = $button_name = $button_size  = $runner_title_show = $runner_title_size_show = $runner_title_font_show = $runner_text_show = $runner_text_size_show = $runner_text_font_show = $runner_button_name_show = $runner_button_size_show = $looser_title_show = $looser_title_size_show = $looser_title_font_show = $looser_text_show =  $looser_text_size_show =  $looser_text_font_show = $looser_button_name_show = "";

$range_value = 50;
$runner_range_show = 50;
$runner_background_range_show  = 50;
$looser_background_range_show = 50;
$looser_button_color_show = "orangered";
$looser_button_text_color_show = "orangered";
$looser_background_image_color_show = "orangered";
$looser_background_color_show = "orangered";
$looser_text_color_show = "orangered";
$looser_title_color_show = "orangered";
$runner_background_color_show = "orangered";
$runner_background_image_color_show = "orangered";
$runner_title_color_show = "orangered";
$runner_text_color_show = "orangered";
$runner_button_text_color_show = "orangered";
$runner_button_color_show = "orangered";
$title_color = "orangered";
$text_color = "orangered";
$button_color = "orangered";
$button_text_color = "orangered";
$background_color = "orangered";
$background_image_color = "orangered";
$hour_chg = 50;
$xperson = 60;
$grand_prize = 60;
$runner = 60;
$winner_range = "";
$grand_prize = 50;
$runner_up_range  = 50;
$winner_range_1 = 50;
$grand_range = 50;
$xperson_yes = $hour_yes = 0;
?>

<?php

if(!isset($_GET['ques_id'])) {
    echo '<h1>Invalid Access !!</h1>';
    echo '<script>location.href = "admin.php";</script>';
    exit();
} else {
    include "./API/include/Connection.class.php";
    include "./API/include/Quest.class.php";
    $questObj = new Quest();
    $ques_id = $_GET['ques_id'];
    $bool = $questObj->isValidQuesID($ques_id);
    if($bool) {
        echo '<h1>Invalid Question ID passed !!</h1>';
        exit();
    }
}
	
	
	if(isset($_POST['perview_submit']))
	{
			$setting_id[] = 13;
			$setting_id[] = 13;
			$setting_id[] = 13;
			$perview_grand_color = isset($_POST['perview_grand_color'])?$_POST['perview_grand_color']:"";
		$perview_runner_color = isset($_POST['perview_runner_color'])?$_POST['perview_runner_color']:"";
		$perview_loser_color = isset($_POST['perview_loser_color'])?$_POST['perview_loser_color']:"";
		    
			$element_type = array();
       		    	$element_type[] = 'perview grand color';
			$element_type[] = 'perview runner color';	
			$element_type[] = 'perview loser color';
	

        		$element_name = array();        
       			$element_name[] = '';
			$element_name[] = '';
			$element_name[] = '';


        		$element_size = array();
        		$element_size[] = '';
			$element_size[] = '';
			$element_size[] = '';
 

		        $element_font = array();
			$element_font[] = '';
			$element_font[] = '';
			$element_font[] = '';

        		$element_color = array();
        		$element_color[] = $perview_grand_color;
			$element_color[] = $perview_runner_color;
			$element_color[] = $perview_loser_color;

        		$element_attachment = array();
			$element_attachment[] = '';	
			$element_attachment[] = '';	
			$element_attachment[] = '';	

		        $active = array();
			$active[] = '1';
			$active[] = '1';
			$active[] = '1';

        $count = count($element_type);
        $access_token = $_SESSION['access_token'];
	$file_name = "NULL";
       // $questObj->deleteQnsrSettings($ques_id, array($setting_id));
        for($i=0;$i<$count;$i++) {
            $questObj->insertQuesElement($ques_id, $setting_id[$i], $element_type[$i], $element_name[$i], $element_color[$i], $element_size[$i], $element_font[$i], $file_name, $active[$i]);            
        }
}
	
			
	

	if(isset($_POST['submitted'])) {       
        $setting_id[] = 9;
	$setting_id[] = 9;
	$setting_id[] = 9;
	$setting_id[] = 9;
	$setting_id[] = 9;
        $setting_id[] = 10;
	$setting_id[] = 10;
	$setting_id[] = 10;
	$setting_id[] = 11;
	$setting_id[] = 11;
	$setting_id[] = 11;
	$setting_id[] = 11;
	$setting_id[] = 11;
	$setting_id[] = 12;
	$setting_id[] = 12;
	$setting_id[] = 12;
	$setting_id[] = 12;
	$setting_id[] = 12;
	        
	$header_image = isset($_FILES['headerimage'])?$_FILES['headerimage']:array();

        $title = isset($_POST['title_text'])?$_POST['title_text']:"";
        $title_size = isset($_POST['title_size'])?$_POST['title_size']:"";
        $title_font = isset($_POST['title_font'])?$_POST['title_font']:"";        
        $title_color = isset($_POST['title_color'])?$_POST['title_color']:"";

        $text = isset($_POST['text'])?$_POST['text']:"";
        $text_size = isset($_POST['text_size'])?$_POST['text_size']:"";
        $text_font = isset($_POST['text_font'])?$_POST['text_font']:"";        
        $text_color = isset($_POST['text_color'])?$_POST['text_color']:"";

        $background_image = isset($_FILES['bgimage'])?$_FILES['bgimage']:array();
        $background_image_color = isset($_POST['background_image_color'])?$_POST['background_image_color']:"";
	$background_range = isset($_POST['range'])?$_POST['range']:"";
	$background_color = isset($_POST['background_color'])?$_POST['background_color']:"";
	

        $button_text = isset($_POST['button_text'])?$_POST['button_text']:"";
        $button_size = isset($_POST['button_size'])?$_POST['button_size']:"";        
        $button_color = isset($_POST['button_color'])?$_POST['button_color']:"";
        $button_switch = isset($_POST['button_switch'])?"1":"0";
	

	$winner_option = isset($_POST['radio_range'])?$_POST['radio_range']:"";
	//$winner_range = isset($_POST['radio_range'])?$hour_chg:$xperson;
	if(isset($_POST['radio_range']))
	{
		if($_POST['radio_range'] == "Every 2 hour")
			$winner_range = $_POST['range_hour'];
		else if($_POST['radio_range'] == "Every X person")
			$winner_range = $_POST['range_person'];
		else if($_POST['radio_range'] == "Random")
			$winner_range = "";
	}
	
	$grand_winner_range = isset($_POST['range_grand'])?$_POST['range_grand']:"";

	$runner_up_range = isset($_POST['range_runner'])?$_POST['range_runner']:"";
	$runner_up_switch = isset($_POST['onoffswitch'])?"1":"0";



	$runner_title = isset($_POST['runner_title_text'])?$_POST['runner_title_text']:"";
        $runner_title_size = isset($_POST['runner_title_size'])?$_POST['runner_title_size']:"";
        $runner_title_font = isset($_POST['runner_title_font'])?$_POST['runner_title_font']:"";        
        $runner_title_color = isset($_POST['runner_title_color'])?$_POST['runner_title_color']:"";

	$runner_text = isset($_POST['runner_text'])?$_POST['runner_text']:"";
        $runner_text_size = isset($_POST['runner_text_size'])?$_POST['runner_text_size']:"";
        $runner_text_font = isset($_POST['runner_text_font'])?$_POST['runner_text_font']:"";        
        $runner_text_color = isset($_POST['runner_text_color'])?$_POST['runner_text_color']:"";

	

	$runner_background_image = isset($_FILES['bgimage'])?$_FILES['bgimage']:array();
        $runner_background_image_color = isset($_POST['runner_background_image_color'])?$_POST['runner_background_image_color']:"";
	$runner_background_range = isset($_POST['runner_background_range'])?$_POST['runner_background_range']:"";
	$runner_background_color = isset($_POST['runner_background_color'])?$_POST['runner_background_color']:"";

	
        $runner_button_text = isset($_POST['runner_button_text'])?$_POST['runner_button_text']:"";
        $runner_button_size = isset($_POST['runner_button_size'])?$_POST['runner_button_size']:"";        
        $runner_button_color = isset($_POST['runner_button_color'])?$_POST['runner_button_color']:"";
        $runner_button_text_color = isset($_POST['runner_button_text_color'])?$_POST['runner_button_text_color']:"";

	
	$looser_title = isset($_POST['looser_title_text'])?$_POST['looser_title_text']:"";
        $looser_title_size = isset($_POST['looser_title_size'])?$_POST['looser_title_size']:"";
        $looser_title_font = isset($_POST['looser_title_font'])?$_POST['looser_title_font']:"";        
        $looser_title_color = isset($_POST['looser_title_color'])?$_POST['looser_title_color']:"";

	$looser_text = isset($_POST['looser_text'])?$_POST['looser_text']:"";
        $looser_text_size = isset($_POST['looser_text_size'])?$_POST['looser_text_size']:"";
        $looser_text_font = isset($_POST['looser_text_font'])?$_POST['looser_text_font']:"";        
        $looser_text_color = isset($_POST['looser_text_color'])?$_POST['looser_text_color']:"";

	$looser_background_image = isset($_FILES['bgimage'])?$_FILES['bgimage']:array();
        $looser_background_image_color = isset($_POST['looser_background_image_color'])?$_POST['looser_background_image_color']:"";
	$looser_background_range = isset($_POST['looser_background_range'])?$_POST['looser_background_range']:"";
	$looser_background_color = isset($_POST['looser_background_color'])?$_POST['looser_background_color']:"";

	
	$looser_button_text = isset($_POST['looser_button_text'])?$_POST['looser_button_text']:"";
        $looser_button_size = isset($_POST['looser_button_size'])?$_POST['looser_button_size']:"";        
        $looser_button_color = isset($_POST['looser_button_color'])?$_POST['looser_button_color']:"";
	$looser_button_text_color = isset($_POST['looser_button_text_color'])?$_POST['looser_button_text_color']:"";
       
	


        $element_type = array();
        $element_type[] = 'Header Image';
        $element_type[] = 'Title';
        $element_type[] = 'Text';
        $element_type[] = 'Background Image';
        $element_type[] = 'Button';
	$element_type[] = 'Winer option';
	$element_type[] = 'Grand prize';
	$element_type[] = 'Runner up';
	$element_type[] = 'Header Image';
	$element_type[] = 'Title';
	$element_type[] = 'Text';
	$element_type[] = 'Background Image';
	$element_type[] = 'Button';
	$element_type[] = 'Header Image';
	$element_type[] = 'Title';
	$element_type[] = 'Text';
	$element_type[] = 'Background Image';
	$element_type[] = 'Button';
	
        $element_name = array();        
        $element_name[] = '';
        $element_name[] = $title;
        $element_name[] = $text;
        $element_name[] = '';
        $element_name[] = $button_text;
	$element_name[] = $winner_option;
	$element_name[] = '';
	$element_name[] = '';
	$element_name[] = '';
	$element_name[] = $runner_title;
	$element_name[] = $runner_text;
	$element_name[] = '';
	$element_name[] = $runner_button_text;
	$element_name[] = '';
	$element_name[] = $looser_title;
	$element_name[] = $looser_text;
	$element_name[] = '';
	$element_name[] = $looser_button_text;
	

        $element_size = array();
        $element_size[] = '';
        $element_size[] = $title_size;
        $element_size[] = $text_size;
        $element_size[] = $background_range;
        $element_size[] = $button_size;
	$element_size[] = $winner_range;
	$element_size[] = $grand_winner_range;
	$element_size[] = $runner_up_range;
	$element_size[] = '';
	$element_size[] = $runner_title_size;
	$element_size[] = $runner_text_size;
	$element_size[] = $runner_background_range;
	$element_size[] = $runner_button_size;
	$element_size[] = '';
	$element_size[] = $looser_title_size;
	$element_size[] = $looser_text_size;
	$element_size[] = $looser_background_range;
	$element_size[] = $looser_button_size;
	

        $element_font = array();
        $element_font[] = '';
        $element_font[] = $title_font;
        $element_font[] = $text_font;
        $element_font[] = $background_image_color;
        $element_font[] = '';
	$element_font[] = '';
	$element_font[] = '';
	$element_font[] = '';
	$element_font[] = '';
	$element_font[] = $runner_title_font;
	$element_font[] = $runner_text_font;
	$element_font[] = $runner_background_image_color;
	$element_font[] = '';
	$element_font[] = '';
	$element_font[] = $looser_title_font;
	$element_font[] = $looser_text_font;
	$element_font[] = $looser_background_image_color;
	$element_font[] = '';
	
        $element_color = array();
        $element_color[] = '';
        $element_color[] = $title_color;
        $element_color[] = $text_color;
        $element_color[] = $background_color;
        $element_color[] = $button_color;
	$element_color[] = '';
	$element_color[] = '';
	$element_color[] = '';
	$element_color[] = '';
	$element_color[] = $runner_title_color;
	$element_color[] = $runner_text_color;
	$element_color[] = $runner_background_color;
	$element_color[] = $runner_button_color;
	$element_color[] = '';
	$element_color[] = $looser_title_color;
	$element_color[] = $looser_text_color;
	$element_color[] = $looser_background_color;
	$element_color[] = $looser_button_color;
	
        $element_attachment = array();
        $element_attachment[] = $header_image;
        $element_attachment[] = '';
        $element_attachment[] = '';
        $element_attachment[] = $background_image;
        $element_attachment[] = '';
	$element_attachment[] = '';
	$element_attachment[] = '';	
	$element_attachment[] = '';
	$element_attachment[] = $header_image;
	$element_attachment[] = '';
	$element_attachment[] = '';
	$element_attachment[] = $background_image;
	$element_attachment[] = '';
	$element_attachment[] = $header_image;
	$element_attachment[] = '';
	$element_attachment[] = '';
	$element_attachment[] = $background_image;
	$element_attachment[] = '';	
	
        $active = array();
        $active[] = '1';
        $active[] = '1';
        $active[] = '1';
        $active[] = '1';
        $active[] = '1';
	$active[] = '';
	$active[] = '';
	$active[] = $runner_up_switch;
	$active[] = '1';
	$active[] = '1';
	$active[] = '1';
	$active[] = '1';
	$active[] = '1';
	$active[] = '1';
	$active[] = '1';
	$active[] = '1';
	$active[] = '1';
	$active[] = '1';
	
        $count = count($element_type);
        $access_token = $_SESSION['access_token'];
	$file_name = "NULL";
      // $questObj->deleteQnsrSettings($ques_id, array($setting_id));
        for($i=0;$i<$count;$i++) {
           /* if($element_attachment[$i] != '') {
                $file_name = $questObj->uploadFile($element_attachment[$i], $access_token);
            } else {
                $file_name = '';
            }*/
            $questObj->insertQuesElement($ques_id, $setting_id[$i], $element_type[$i], $element_name[$i], $element_color[$i], $element_size[$i], $element_font[$i], $file_name, $active[$i]);            
        }
	
        
echo "<script>location.href = 'thankyou_page.php?ques_id=$ques_id'; </script>";
        exit();
}

	
	
        
        

else
{
	$quest_app_arr = $questObj->getQuesSettingElement($ques_id, array(9,10,11,12));
	
	foreach($quest_app_arr as $quest_app) {
	if($quest_app['setting_id'] == "9")
	{
	if($quest_app['element_type'] == "Title") {
                    $title = $quest_app['element_name'];
                    $title_size = $quest_app['element_size'];
                    $title_font = $quest_app['element_font'];
                    $title_color = $quest_app['element_color'];
                }

 
	else if($quest_app['element_type'] =="Text") {
                    $text = $quest_app['element_name'];
                    $text_size = $quest_app['element_size'];
                    $text_font = $quest_app['element_font'];
                    $text_color = $quest_app['element_color'];
	}

	else if($quest_app['element_type'] == "Button")
	{
			$button_name = $quest_app['element_name'];
                    	$button_size = $quest_app['element_size'];
                    	$button_color = $quest_app['element_color'];
	}
	else if($quest_app['element_type'] == "Background Image")
	{
		$background_image_color = $quest_app['element_font'];
		$range_value = $quest_app['element_size'];
		$background_color = $quest_app['element_color'];
		}
	}
	if($quest_app['setting_id'] == "10")
	{
		
		if($quest_app['element_type'] == "Winer option")
		{		
			$winner_name =  $quest_app['element_name'];
			$winner_range_1 = $quest_app['element_size'];
			if($winner_name == "Every 2 hour")			
				{
					$hour_chg = $winner_range_1;
					$hour_yes = 1;
				}	
			else if($winner_name == "Every 2 hour")
			{
				$xperson = $winner_range_1;
				$xperson_yes = 1;
			}
		
				
			
		
		}
		else if($quest_app['element_type'] == "Grand prize")
		{
			$grand_range = $quest_app['element_size'];
		}
		else if($quest_app['element_type'] == "Runner up")
		{
			$runner_up_range = $quest_app['element_size'];
			$runner_button =  $quest_app['active'];
		}
	}
	if($quest_app['setting_id'] == "11")
	{
		if($quest_app['element_type'] == "Title") {
                    $runner_title_show = $quest_app['element_name'];
                    $runner_title_size_show = $quest_app['element_size'];
                    $runner_title_font_show = $quest_app['element_font'];
                    $runner_title_color_show = $quest_app['element_color'];
                }
		else if($quest_app['element_type'] =="Text") {
                    $runner_text_show = $quest_app['element_name'];
                    $runner_text_size_show = $quest_app['element_size'];
                    $runner_text_font_show = $quest_app['element_font'];
                    $runner_text_color_show = $quest_app['element_color'];
		}
		else if($quest_app['element_type'] == "Background Image"){
			$runner_background_image_color_show = $quest_app['element_font'];
			$runner_background_range_show = $quest_app['element_size'];
			$runner_background_color_show = $quest_app['element_color'];
		}
		else if($quest_app['element_type'] == "Button"){
			$runner_button_name_show = $quest_app['element_name'];
                    	$runner_button_size_show = $quest_app['element_size'];
                    	$runner_button_color_show = $quest_app['element_color'];
		}

	}
	if($quest_app['setting_id'] == "12")
	{
		if($quest_app['element_type'] == "Title") {
                    $looser_title_show = $quest_app['element_name'];
                    $looser_title_size_show = $quest_app['element_size'];
                    $looser_title_font_show = $quest_app['element_font'];
                    $looser_title_color_show = $quest_app['element_color'];
                }
	else if($quest_app['element_type'] =="Text") {
                    $looser_text_show = $quest_app['element_name'];
                    $looser_text_size_show = $quest_app['element_size'];
                    $looser_text_font_show = $quest_app['element_font'];
                    $looser_text_color_show = $quest_app['element_color'];
		}
	else if($quest_app['element_type'] == "Background Image"){
			$looser_background_image_color_show = $quest_app['element_font'];
			$looser_background_range_show = $quest_app['element_size'];
			$looser_background_color_show = $quest_app['element_color'];
		
	}
	else if($quest_app['element_type'] == "Button"){
			$looser_button_name_show = $quest_app['element_name'];
                    	$looser_button_size_show = $quest_app['element_size'];
                    	$looser_button_color_show = $quest_app['element_color'];
			$looser_button_text_color_show = $quest_app['element_font'];
		}
	}
    }
}	


?>

<link rel="stylesheet" href="css/applogo.css">
<script src="jquery/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/spectrum.css">
<script type="text/javascript" src="jquery/jquery-1.9.1.js"></script>
<script type="text/javascript" src="jquery/spectrum.js"></script>
<script type='text/javascript' src="jquery/docs.js"></script>
<script src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="http://www.amcharts.com/lib/3/pie.js"></script>
<!--script src="http://www.amcharts.com/lib/3/themes/light.js"></script-->
<script>

    

 function showpop(id) {
    if (confirm("Wouuld you like to remove this color box") == true) {
         $("#"+id).remove();
    } else {
       
    }    
}
$(document).ready(function(){
	var  box_col = 0;
	var  num = 0;
	
	$(".minus_img3 img").click(function(){
		box_col++;
		num++;
		 var abc=$("#op");
		$("#op").append("<div id='drag_"+box_col+"'class='wheel_tabs'><div class='example'><input type='text' name='preferredRgb' id='num' value='orangered'/><div><img src='images/minus.png' onclick='showpop(\"drag_"+box_col+"\")'></div></div>");	
	});  
});
</script>


<script>

function outputUpdate(vol) {

document.querySelector('#volume').value = vol;

}

</script>
<script>
$(document).ready(function(){
	$(".bb_ques").click(function(){
		$(".browewin").click();	
	});
    
});
</script>
<script>

function outputUpdate_1(vol) {

document.querySelector('#volume_1').value = vol; 	
	$('#pr_span').html(vol);
	
}


function outputUpdate_2(vol) {
document.querySelector('#volume_2').value = vol; 
	$('#pr_span_1').html(vol);
}

function outputUpdate_3(vol) {
document.querySelector('#volume_3').value = vol;
	$('#pr_span_2').html(vol);
}

function outputUpdate_4(vol) {
	document.querySelector('#volume_4').value = vol;
	$('#pr_span_3').html(vol);
}

function outputUpdate_5(vol) {
	document.querySelector('#volume_5').value = vol;
	$('#pr_span_5').html(vol);
}

function outputUpdate_6(vol) {
	document.querySelector('#volume_6').value = vol;
	$('#pr_span_6').html(vol);
}


$(document).ready(function(){
    
     $('#saveandnext').click(function(event){
            event.preventDefault();
            $("#form").submit();
	    
        });
            
});

</script>
<script type="text/javascript">

$(document).ready(function(){
	$('#hmw').click(function(){
		$('#hmws_bt').click();
	});
   });
       

</script>
<script>
function coupon_page()
{
	location.href = 'coupon.php?ques_id=<?php echo $ques_id?>';
}


</script>

<?php
if(isset($_POST['bcol']))
{
	$bcol = $_POST['bcol'];
}
if(isset($_POST['pb_col']))
{
	$pb_col = $_POST['pb_col'];
}
if(isset($_POST['spin_col']))
{
$spin_col = $_POST['spin_col'];
}
?>
<!--/style-->
</head>
<body>
<!--header>
  <div class="wrapper">
    <div class="logo"> <img src="images/logo.jpg" alt="logo"> </div>
  </div>
</header-->
<div class="sec_create">
  <h2 class="sec_head_ques"> Create a Questionnaire</h2>
</div>
<section>
  <div class="wrapper" style="background-color:<?php echo $pb_col ?>">
    <div class="container ww">
      <h2 class="sec_head_ques1">Would You Like a...</h2>
      <div class="prize"> <img src="images/radio.jpg"><span class="pr_span bg_random">Prize Wheel</span> <span class="or_span">OR</span>
        <input type="radio" value="" onclick="coupon_page();">
        <span class="pr_span">Coupon Code</span> </div>
      <div class="blank_div"> </div>
    </div>
  </div>
</section>

<section>
<div class="wrapper"  style="background-color:<?php echo $pb_col ?>">
  <div class="container ww">
    <div class="wheel_app">
      <h2 class="sec_head_ques1">Prize Wheel Appearance</h2>
      <div class="fleft wheel_inn"> 
	  <div class="arrow-down" style="border-top:20px solid <?php echo $spin_col ?>"></div>
	<div class="outer_can" style="border: 5px solid <?php echo $bcol ?>">
	<div class="cnt_img"><img src="images/logo_cnt2.png"></div>
	</div> 
	<canvas id="canvas" width="400" height="300"></canvas>



<script type="text/javascript">
//var tval = document.getElementById("tval").value;
//function gettotal_1(){


var k = "";
var i  = 4;
//var tval = $("#hmw_id").val();
//k  = <?php isset($_POST['tval'])?$_POST['tval']:""?>;
<?php
	if(isset($_POST['tval'])){
?>
	i = <?php echo $_POST['tval']; ?>;
<?php
	}else{
?>
	//i = k;
<?php
	}
?>

	var value=360/i;	 
	var myColor = ["#ECD078","#D95B43","#C02942","#542437","#53777A","red","pink","yellow","green"];
	var myData = [];
	for(var k = 0; k < i; k++){
		myData[k] = value;
	}
	//$("#hmw_id").val(tval);
	//alert(myData);
//}

function getTotal(){
	
var myTotal = 0;
for (var j = 0; j < myData.length; j++) {
myTotal += (typeof myData[j] == 'number') ? myData[j] : 0;
}
return myTotal;
}

function plotData() {
var canvas;
var ctx;
var lastend = 0;
var myTotal = getTotal();

canvas = document.getElementById("canvas");



ctx = canvas.getContext("2d");
ctx.clearRect(0, 0, canvas.width, canvas.height);


for (var i = 0; i < myData.length; i++) {
ctx.fillStyle = myColor[i];
ctx.beginPath();
ctx.moveTo(200,150);
ctx.arc(200,150,150,lastend,lastend+
  (Math.PI*2*(myData[i]/myTotal)),false);
ctx.lineTo(200,150);
ctx.fill();
lastend += Math.PI*2*(myData[i]/myTotal);
}
}

plotData();

</script>

     <input type="button" id="hmw" class="pre_bb" value="Preview Button"  />
  
      .
       </div>
      <!---wheel_inn closed----->
	   <form id="numpie" method="POST" name="col" action="#" >
      <div class="fright wheel_inn">
        <div class="wheel_tabs">
          <label class="fleft wh_tab_mm">Page Background Color</label>
          <div class='example'>
            <input type='text' name="pb_col" id='18' value="<?php echo $pb_col?>" />
          </div>
        </div>
        <div class="clear"></div>
        <br>
        <div class="wheel_tabs">
		
          <label class="fleft wh_tab_mm ">Spin Arrow Color</label>
          <div class='example spin_mm'>
            <input type='text' name="spin_col" id='19' value="<?php echo $spin_col ?>" />
          </div>
        </div>
        <div class="clear"></div>
        <br>
        <div class="wheel_tabs">
          <label class="fleft wh_tab_mm ouline_mm">Wheel Outline Color</label>
          <div class='example outline_mm'>
            <input type='text' name="bcol" id='2' value="<?php echo $bcol ?>" />
          </div>
        </div>
        <div class="clear"></div>
        <br>
        <div class="wheel_tabs">
		
		
        
          <label class="fleft wh_tab_mm">How Many Wheel Panels?</label>
          <div class="panel_mm fleft">
            <input type="number"  name="tval" class="title_size title_size_font" value="" id="hmw_id"/>
          </div>
        </div>
        <div class="clear"></div>
        <br>
        <div class="wheel_tabs">
          <label class="fleft wh_tab_mm ">Grand Prize Winner Color</label>
          <div class='example grand_mm'>
            <input type='text' name='perview_grand_color' id='21' value='orangered' />
          </div>
        </div>
        <div class="clear"></div>
        <br>
        <div class="wheel_tabs">
          <label class="fleft wh_tab_mm">Runner Up Winner Color</label>
          <div class='example runner_mm'>
            <input type='text' name='perview_runner_color' id='22' value='orangered' />
          </div>
        </div>
        <div class="clear"></div>
        <br>
        <div class="wheel_tabs">
          <label class="fleft wh_tab_mm">Loser Color</label>
          <div class='example'>
            <input type='text' name='perview_loser_color' id='23' value='orangered' />
          </div>
        </div>
        <div class="clear"></div>
        <br>
        <div class="wheel_tabs">
          <label class="fleft wh_tab_mm">Panel Color</label>
          <div class='example'>
            <input type='text' name='preferredRgb' id='24' value='orangered' />
          </div>
        </div>
		<div id="op"></div>
        <div class="clear"></div>
		<div id="op"></div>
        <br>
        <div class="inner_drag minus_img3"><img src="images/lgt_p.png" style="margin-left:100px;">Add another color</div>
        
        <label class="fleft wh_tab_mm">Upload logo for center of the wheel </label>
        <input type="text">
        <button class="bb_ques fright browse_tab">Browse..</button>
        <div class="clear"></div>
        <br>
        <div class="wheel_tabs">
          <label class="fleft wh_tab_mm">Spin Time</label>
          <div class="panel_mm fleft">
            <input type="number" class="title_size title_size_font">
          </div>
        </div>
        <div class="clear"></div>
        <br>
        <div class="wheel_tabs">
          <label class="fleft wh_tab_mm">Spin Sound</label>
          <div class="panel_mm fleft">
            <input type="number" class="title_size title_size_font">
          </div>
        </div>

		 <input type="submit"  name ="perview_submit" id="hmws_bt" style="display:none;"  />
		       
         </form>
	
		 
        <div class="clear"></div>
        <br>
      </div>
      <!---fright wheel_inn closed----->
      <div class="clear"></div>
    </div>
    <!---wheel_app closed----->
    <div class="blank_div"> </div>
  </div>
  <!---container closed-----> 
</div>
<!---wrapper closed----->
</section>
<section>
  <div class="wrapper"  style="background-color:<?php echo $pb_col ?>">
    <div class="container ww">
<form action="#" id="form" method="post" enctype="multipart/form-data">
      <h2 class="sec_head_ques1">Winner Options</h2>
      <div class="random_outer">
        <div class="random fleft"> <img src="images/radio.jpg"><span class="pr_span bg_random">Random</span> </div>
        <div class="random_center fleft">
          <input type="radio" class="rad_coup" name="radio_range" value="Every 2 hour">
          <span class="pr_span1">Timed</span> <br>
          <!--span class="pr_span">Every 2 Hours</span-->
		<div class="pr_span">Every 2 Hours</div>
		<label for ="fader_1" id="pr_span"><?php echo $hour_chg?></label>

	<input type=range class="range_wheel" name ="range_hour" min=0 max=100 value="" id=fader_1 step=1 oninput="outputUpdate_1(value)">

	<output for=fader_1 id=volume_1><?php echo $hour_yes == 1?$winner_range_1:50?></output>
        </div>
        <div class="random_corner fright">
          <input type="radio" name="radio_range" value="Every X person">
         
	<label for = "fader_2">Every X Person</label><br>
          <span class="pr_span" id="pr_span_1"><?php echo $xperson?></span> <br>
          <input type=range class="range_wheel" name ="range_person" min=0 max=100 value="" id=fader_2 step=1 oninput="outputUpdate_2(value)">

	<output for=fader_2 id=volume_2><?php echo $xperson_yes == 1?$winner_range_1:50?></output>
        </div>
      </div>

      <div class="clear"></div>
      <h2 class="sec_head_ques1">Number Of Winners</h2>
      <div class="winnr_div1 fleft"> 
	<label for="fader_3"><span class="pr_span">Grand Prize</span></label> <br>
        <span class="pr_span spn_positn" id="pr_span_2"><?php echo $grand_prize?></span> <br>
	<input type=range class="range_wheel" name ="range_grand" min=0 max=100 value="" id=fader_3 step=1 oninput="outputUpdate_3(value)">

	<output for=fader_3 id=volume_3><?php echo $grand_range?></output>
        
      </div>
      <div class="winnr_div2 fleft txt_coup"> <label for="fader_4"><span class="pr_span">Runner Up</label></span>
        <div class="run_bb">
          <div class="onoffswitch1 fright">
            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab12" checked>
            <label class="onoffswitch-label" for="tab12"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
            <div class="font_bb fright"> Yes </div>
          </div>
        </div>
        <span class="pr_span spn_positn"id = "pr_span_3"><?php echo $runner?></span> <br>
        <input type=range class="range_wheel switch_coup" name ="range_runner" min=0 max=100 value=" " id=fader_4 step=1 oninput="outputUpdate_4(value)">

	<output for=fader_4 id=volume_4><?php echo $runner_up_range?></output>
      </div>

      <div class="clear"></div>
      <div class="blank_div"> </div>
    </div>
    <!---container closed-----> 
  </div>
  <!---wrapper closed-----> 
</section>
<section>
  <div class="wrapper"  style="background-color:<?php echo $pb_col; ?>">
    <div class="container ww">
      <h2 class="sec_head_ques1">Grand Prize Winner Page</h2>
      <div class="sec_ques_div">
        <label class="sec_head_ques1 fleft">Header image/video </label>
        <label class="sec_head_ques1 fright">(crop to fit 0*0 area)</label>
      </div>
 
      <div class="sec_ques_div">
        <input type="text" class="fleft" >
        <button class="bb_ques fleft">Browse..</button>
        <input type="file" class="browewin" style="display:none;"/>
      </div>
      <div class="outer_title1">
        <div class="inner_title1 fleft">
          <label>Title</label>
          <br>
          <input type="text" class="title_text" name="title_text" value="<?php echo $title?>">
        </div>
        <div class="inner_title1 fleft ">
          <label>Title Size</label>
          <br>
		  
		  <div class="wrapper-demo">

                                        <div id="dd5" class="wrapper-dropdown-3" tabindex="1">
						<span>Dropdown </span>
						<ul class="dropdown">
							<li><a href="#">Element 1</a></li>
							<li><a href="#">Element 2</a></li>
							<li><a href="#">Element 3</a></li>
						</ul>
					</div>

                                        ​</div>
		  
          <!--input type="number" class="title_size" name="title_size" value="<?php echo $title_size?>"-->
        </div>
        <div class="inner_title1 fleft">
          <label>Title Font</label>
          <br>
		  
		  <div class="wrapper-demo">

                                        <div id="dd6" class="wrapper-dropdown-3" tabindex="1">
						<span>Dropdown </span>
						<ul class="dropdown">
							<li><a href="#">Element 1</a></li>
							<li><a href="#">Element 2</a></li>
							<li><a href="#">Element 3</a></li>
						</ul>
					</div>

                                        ​</div>
		  
          <!--input type="number" class="title_size title_size_font" name="title_font" value="<?php echo $title_font?>"-->
        </div>
        <div class="inner_title1 fleft">
          <label>Title Color</label>
          <br>
          <div class='example'>
            <input type='text' name='title_color' id='25' value="<?php echo $title_color?>" />
          </div>
        </div>
      </div>
      <div class="clear"> </div>
      <div class="outer_title1">
        <div class="inner_title1 fleft">
          <label>Text</label>
          <br>
          <textarea rows="5" cols="25" name="text" class="txt-coup"><?php echo $text?></textarea>
        </div>
        <div class="inner_title1 fleft ">
          <label>Text Size</label>
          <br>
		  
		  <div class="wrapper-demo">

                                        <div id="dd7" class="wrapper-dropdown-3" tabindex="1">
						<span>Dropdown </span>
						<ul class="dropdown">
							<li><a href="#">Element 1</a></li>
							<li><a href="#">Element 2</a></li>
							<li><a href="#">Element 3</a></li>
						</ul>
					</div>

                                        ​</div>
		  
          <!--input type="number" class="title_size" name="text_size" value="<?php echo $text_size?>"-->
        </div>
        <div class="inner_title1 fleft">
          <label>Text Font</label>
          <br>
		  
		  <div class="wrapper-demo">

                                        <div id="dd8" class="wrapper-dropdown-3" tabindex="1">
						<span>Dropdown </span>
						<ul class="dropdown">
							<li><a href="#">Element 1</a></li>
							<li><a href="#">Element 2</a></li>
							<li><a href="#">Element 3</a></li>
						</ul>
					</div>

                                        ​</div>
		  
          <!--input type="number" class="title_size title_size_font" name="text_font" value="<?php echo $text_font?>"-->
        </div>
        <div class="inner_title1 fleft">
          <label>Text Color</label>
          <br>
          <div class='example'>
            <input type='text' name='text_color' id='26' value="<?php echo $text_color?>"/>
          </div>
        </div>
      </div>
      <div class="clear"> </div>
    </div>
    <!--container closed--> 
  </div>
  <!--wrapper closed--> 
</section>
<section>
  <div class="wrapper"  style="background-color:<?php echo $pb_col; ?>">
    <div class="container ww">
      <div class="outer_title1">
        <div class="inner_title6 inner_title_ttl hh fleft">
          <label class="sec_head_ques1 "> Background-image </label>
          <div class="sec_ques_div">
            <input type="text" class="fleft txt-coup">
            <button class="bb_ques fleft txt-coup">Browse..</button>
          </div>
        </div>
        <div class="inner_title6 inner_title_ttl hh fleft ">
          <label>Background image color overlay</label>
          <br>
          <div class='example'>
            <input type='text' name='background_image_color' id='20' value="<?php echo $background_image_color?>" />
          </div>
        </div>
        <div class="inner_title6 inner_title_ttl hh fleft">
          <label for=fader>Opacity</label>
          <br>
	
          <!--input type=range class="range" name ="range" min=0 max=100 value="<?php echo $range_value?>" id=fader step=1 oninput="outputUpdate(value)">
          <output for=fader id=volume>100%</output-->

<input type=range min=0 max=100 value=50 id=fader step=1 oninput="outputUpdate(value)">

<output for=fader id=volume><?php echo $range_value?></output>

        </div>
      </div>
      <!--outer_title1 closed-->
      <div class="inner_title2 inner_title_ttl  fleft">
        <label>Background Color</label>
        <br>
        <div class='example'>
            <input type='text' name='background_image_color' id='4' value="<?php echo $background_image_color?>" />
          </div>
      </div>
      <div class="clear"> </div>
    </div>
    <!--container closed--> 
  </div>
  <!--wrapper closed--> 
</section>
<section>
  <div class="wrapper"  style="background-color:<?php echo $pb_col; ?>">
  <div class="container ww">
    <div class="outer_sec4">
      <div class="fleft inner_title_ttl txt_coup">
        <label>Button Text</label>
        <br>
        <input type="text" class="bb_text" name="button_text" value="<?php echo $button_name?>">
      </div>
    </div>
	
    <div class="clear"> </div>
    <!--container closed--> 
  </div>
  <!--wrapper closed--> 
</section>
<section>
  <div class="wrapper"  style="background-color:<?php echo $pb_col; ?>">
    <div class="container ww">
      <div class="outer_sec5">
        <div class="inn_sec5 fleft inner_title_ttl">
          <label>Button Color</label>
          <br>
          <div class='example'>
            <input type='text' name='button_color' id='8' value="<?php echo $button_color?>" />
          </div>
        </div>
        <div class="inn_sec5 hh fleft inner_title_ttl">
          <label>Button Size</label>
          <br>
		  
		  <div class="wrapper-demo">

                                        <div id="dd9" class="wrapper-dropdown-3" tabindex="1">
						<span>Dropdown </span>
						<ul class="dropdown">
							<li><a href="#">Element 1</a></li>
							<li><a href="#">Element 2</a></li>
							<li><a href="#">Element 3</a></li>
						</ul>
					</div>

                                        ​</div>
		  
          <!--input type="number" class="title_size" name="button_size" value="<?php echo $button_size?>"-->
        </div>
        <div class="inn_sec5 fleft inner_title_ttl">
          <label>Button TextColor</label>
          <br>
          <div class='example'>
            <input type='text' name='button_text_color' id='9' value="<?php echo $button_text_color?>" />
          </div>
        </div>
		        <div class="inner_title1 inner_title_ttl hh fleft">
          <label class="sec_head_ques1 "> Upload Video </label>
          <div class="sec_ques_div">
            <input type="text" class="fleft txt-coup">
            <button class="bb_ques fleft txt-coup">Browse..</button>
          </div>
        </div>
      </div>
       <div class="clear"> </div>
 <div class="blank_div">
       </div>
</section>

     
       <!--section start -->
	<section>
  <div class="wrapper"  style="background-color:<?php echo $pb_col; ?>">
    <div class="container ww">
      <label class="sec_head_ques1 fleft">Runner Up Winner Page </label>
<br><br>
      <div class="sec_ques_div">
        <label class="sec_head_ques1 fleft">Header image/video </label>
        <label class="sec_head_ques1 fright">(crop to fit 0*0 area)</label>
      </div>
 
      <div class="sec_ques_div">
        <input type="text" class="fleft" >
        <button class="bb_ques fleft">Browse..</button>
        <input type="file" class="browewin" style="display:none;"/>
      </div>
      <div class="outer_title1">
        <div class="inner_title1 fleft">
          <label>Title</label>
          <br>
          <input type="text" class="title_text" name="title_text" value="<?php echo $title?>">
        </div>
        <div class="inner_title1 fleft ">
          <label>Title Size</label>
          <br>
		  
		  <div class="wrapper-demo">

                                        <div id="dd5" class="wrapper-dropdown-3" tabindex="1">
						<span>Dropdown </span>
						<ul class="dropdown">
							<li><a href="#">Element 1</a></li>
							<li><a href="#">Element 2</a></li>
							<li><a href="#">Element 3</a></li>
						</ul>
					</div>

                                        ​</div>
		  
          <!--input type="number" class="title_size" name="title_size" value="<?php echo $title_size?>"-->
        </div>
        <div class="inner_title1 fleft">
          <label>Title Font</label>
          <br>
		  
		  <div class="wrapper-demo">

                                        <div id="dd6" class="wrapper-dropdown-3" tabindex="1">
						<span>Dropdown </span>
						<ul class="dropdown">
							<li><a href="#">Element 1</a></li>
							<li><a href="#">Element 2</a></li>
							<li><a href="#">Element 3</a></li>
						</ul>
					</div>

                                        ​</div>
		  
          <!--input type="number" class="title_size title_size_font" name="title_font" value="<?php echo $title_font?>"-->
        </div>
        <div class="inner_title1 fleft">
          <label>Title Color</label>
          <br>
          <div class='example'>
            <input type='text' name='title_color' id='1' value="<?php echo $title_color?>" />
          </div>
        </div>
      </div>
      <div class="clear"> </div>
      <div class="outer_title1">
        <div class="inner_title1 fleft">
          <label>Text</label>
          <br>
          <textarea rows="5" cols="25" name="text" class="txt-coup"><?php echo $text?></textarea>
        </div>
        <div class="inner_title1 fleft ">
          <label>Text Size</label>
          <br>
		  
		  <div class="wrapper-demo">

                                        <div id="dd7" class="wrapper-dropdown-3" tabindex="1">
						<span>Dropdown </span>
						<ul class="dropdown">
							<li><a href="#">Element 1</a></li>
							<li><a href="#">Element 2</a></li>
							<li><a href="#">Element 3</a></li>
						</ul>
					</div>

                                        ​</div>
		  
          <!--input type="number" class="title_size" name="text_size" value="<?php echo $text_size?>"-->
        </div>
        <div class="inner_title1 fleft">
          <label>Text Font</label>
          <br>
		  
		  <div class="wrapper-demo">

                                        <div id="dd8" class="wrapper-dropdown-3" tabindex="1">
						<span>Dropdown </span>
						<ul class="dropdown">
							<li><a href="#">Element 1</a></li>
							<li><a href="#">Element 2</a></li>
							<li><a href="#">Element 3</a></li>
						</ul>
					</div>

                                        ​</div>
		  
          <!--input type="number" class="title_size title_size_font" name="text_font" value="<?php echo $text_font?>"-->
        </div>
        <div class="inner_title1 fleft">
          <label>Text Color</label>
          <br>
          <div class='example'>
            <input type='text' name='text_color' id='40' value="<?php echo $text_color?>"/>
          </div>
        </div>
      </div>
      <div class="clear"> </div>
    </div>
    <!--container closed--> 
  </div>
  <!--wrapper closed--> 
</section>
<section>
  <div class="wrapper"  style="background-color:<?php echo $pb_col; ?>">
    <div class="container ww">
      <div class="outer_title1">
        <div class="inner_title6 inner_title_ttl hh fleft">
          <label class="sec_head_ques1 "> Background-image </label>
          <div class="sec_ques_div">
            <input type="text" class="fleft txt-coup">
            <button class="bb_ques fleft txt-coup">Browse..</button>
          </div>
        </div>
        <div class="inner_title6 inner_title_ttl hh fleft ">
          <label>Background image color overlay</label>
          <br>
          <div class='example'>
            <input type='text' name='background_image_color' id='3' value="<?php echo $background_image_color?>" />
          </div>
        </div>
        <div class="inner_title6 inner_title_ttl hh fleft">
          <label for=fader>Opacity</label>
          <br>
	
          <!--input type=range class="range" name ="range" min=0 max=100 value="<?php echo $range_value?>" id=fader step=1 oninput="outputUpdate(value)">
          <output for=fader id=volume>100%</output-->

<input type=range min=0 max=100 value=50 id=fader step=1 oninput="outputUpdate(value)">

<output for=fader id=volume><?php echo $range_value?></output>

        </div>
      </div>
      <!--outer_title1 closed-->
      <div class="inner_title2 inner_title_ttl  fleft">
        <label>Background Color</label>
        <br>
        <div class='example'>
            <input type='text' name='background_image_color' id='34' value="<?php echo $background_image_color?>" />
          </div>
      </div>
      <div class="clear"> </div>
    </div>
    <!--container closed--> 
  </div>
  <!--wrapper closed--> 
</section>
<section>
  <div class="wrapper"  style="background-color:<?php echo $pb_col; ?>">
  <div class="container ww">
    <div class="outer_sec4">
      <div class="fleft inner_title_ttl txt_coup">
        <label>Button Text</label>
        <br>
        <input type="text" class="bb_text" name="button_text" value="<?php echo $button_name?>">
      </div>
    </div>
	
    <div class="clear"> </div>
    <!--container closed--> 
  </div>
  <!--wrapper closed--> 
</section>
<section>
  <div class="wrapper"  style="background-color:<?php echo $pb_col; ?>">
    <div class="container ww">
      <div class="outer_sec5">
        <div class="inn_sec5 fleft inner_title_ttl">
          <label>Button Color</label>
          <br>
          <div class='example'>
            <input type='text' name='button_color' id='5' value="<?php echo $button_color?>" />
          </div>
        </div>
        <div class="inn_sec5 hh fleft inner_title_ttl">
          <label>Button Size</label>
          <br>
		  
		  <div class="wrapper-demo">

                                        <div id="dd9" class="wrapper-dropdown-3" tabindex="1">
						<span>Dropdown </span>
						<ul class="dropdown">
							<li><a href="#">Element 1</a></li>
							<li><a href="#">Element 2</a></li>
							<li><a href="#">Element 3</a></li>
						</ul>
					</div>

                                        ​</div>
		  
          <!--input type="number" class="title_size" name="button_size" value="<?php echo $button_size?>"-->
        </div>
        <div class="inn_sec5 fleft inner_title_ttl">
          <label>Button TextColor</label>
          <br>
          <div class='example'>
            <input type='text' name='button_text_color' id='6' value="<?php echo $button_text_color?>" />
          </div>
        </div>
		        <div class="inner_title1 inner_title_ttl hh fleft">
          <label class="sec_head_ques1 "> Upload Video </label>
          <div class="sec_ques_div">
            <input type="text" class="fleft txt-coup">
            <button class="bb_ques fleft txt-coup">Browse..</button>
          </div>
        </div>
      </div>
       <div class="clear"> </div>
 <div class="blank_div">
       </div>
</section>
     
	<!-- section end-->
 <!--section start -->
	<section>
  <div class="wrapper"  style="background-color:<?php echo $pb_col; ?>">
    <div class="container ww">
      <label class="sec_head_ques1 fleft">Looser Page </label>
<br><br>
      <div class="sec_ques_div">
        <label class="sec_head_ques1 fleft">Header image/video </label>
        <label class="sec_head_ques1 fright">(crop to fit 0*0 area)</label>
      </div>
 
      <div class="sec_ques_div">
        <input type="text" class="fleft" >
        <button class="bb_ques fleft">Browse..</button>
        <input type="file" class="browewin" style="display:none;"/>
      </div>
      <div class="outer_title1">
        <div class="inner_title1 fleft">
          <label>Title</label>
          <br>
          <input type="text" class="title_text" name="title_text" value="<?php echo $title?>">
        </div>
        <div class="inner_title1 fleft ">
          <label>Title Size</label>
          <br>
		  
		  <div class="wrapper-demo">

                                        <div id="dd5" class="wrapper-dropdown-3" tabindex="1">
						<span>Dropdown </span>
						<ul class="dropdown">
							<li><a href="#">Element 1</a></li>
							<li><a href="#">Element 2</a></li>
							<li><a href="#">Element 3</a></li>
						</ul>
					</div>

                                        ​</div>
		  
          <!--input type="number" class="title_size" name="title_size" value="<?php echo $title_size?>"-->
        </div>
        <div class="inner_title1 fleft">
          <label>Title Font</label>
          <br>
		  
		  <div class="wrapper-demo">

                                        <div id="dd6" class="wrapper-dropdown-3" tabindex="1">
						<span>Dropdown </span>
						<ul class="dropdown">
							<li><a href="#">Element 1</a></li>
							<li><a href="#">Element 2</a></li>
							<li><a href="#">Element 3</a></li>
						</ul>
					</div>

                                        ​</div>
		  
          <!--input type="number" class="title_size title_size_font" name="title_font" value="<?php echo $title_font?>"-->
        </div>
        <div class="inner_title1 fleft">
          <label>Title Color</label>
          <br>
          <div class='example'>
            <input type='text' name='title_color' id='31' value="<?php echo $title_color?>" />
          </div>
        </div>
      </div>
      <div class="clear"> </div>
      <div class="outer_title1">
        <div class="inner_title1 fleft">
          <label>Text</label>
          <br>
          <textarea rows="5" cols="25" name="text" class="txt-coup"><?php echo $text?></textarea>
        </div>
        <div class="inner_title1 fleft ">
          <label>Text Size</label>
          <br>
		  
		  <div class="wrapper-demo">

                                        <div id="dd7" class="wrapper-dropdown-3" tabindex="1">
						<span>Dropdown </span>
						<ul class="dropdown">
							<li><a href="#">Element 1</a></li>
							<li><a href="#">Element 2</a></li>
							<li><a href="#">Element 3</a></li>
						</ul>
					</div>

                                        ​</div>
		  
          <!--input type="number" class="title_size" name="text_size" value="<?php echo $text_size?>"-->
        </div>
        <div class="inner_title1 fleft">
          <label>Text Font</label>
          <br>
		  
		  <div class="wrapper-demo">

                                        <div id="dd8" class="wrapper-dropdown-3" tabindex="1">
						<span>Dropdown </span>
						<ul class="dropdown">
							<li><a href="#">Element 1</a></li>
							<li><a href="#">Element 2</a></li>
							<li><a href="#">Element 3</a></li>
						</ul>
					</div>

                                        ​</div>
		  
          <!--input type="number" class="title_size title_size_font" name="text_font" value="<?php echo $text_font?>"-->
        </div>
        <div class="inner_title1 fleft">
          <label>Text Color</label>
          <br>
          <div class='example'>
            <input type='text' name='text_color' id='32' value="<?php echo $text_color?>"/>
          </div>
        </div>
      </div>
      <div class="clear"> </div>
    </div>
    <!--container closed--> 
  </div>
  <!--wrapper closed--> 
</section>
<section>
  <div class="wrapper"  style="background-color:<?php echo $pb_col; ?>">
    <div class="container ww">
      <div class="outer_title1">
        <div class="inner_title6 inner_title_ttl hh fleft">
          <label class="sec_head_ques1 "> Background-image </label>
          <div class="sec_ques_div">
            <input type="text" class="fleft txt-coup">
            <button class="bb_ques fleft txt-coup">Browse..</button>
          </div>
        </div>
        <div class="inner_title6 inner_title_ttl hh fleft ">
          <label>Background image color overlay</label>
          <br>
          <div class='example'>
            <input type='text' name='background_image_color' id='33' value="<?php echo $background_image_color?>" />
          </div>
        </div>
        <div class="inner_title6 inner_title_ttl hh fleft">
          <label for=fader>Opacity</label>
          <br>
	
          <!--input type=range class="range" name ="range" min=0 max=100 value="<?php echo $range_value?>" id=fader step=1 oninput="outputUpdate(value)">
          <output for=fader id=volume>100%</output-->

<input type=range min=0 max=100 value=50 id=fader step=1 oninput="outputUpdate(value)">

<output for=fader id=volume><?php echo $range_value?></output>

        </div>
      </div>
      <!--outer_title1 closed-->
      <div class="inner_title2 inner_title_ttl  fleft">
        <label>Background Color</label>
        <br>
        <div class='example'>
            <input type='text' name='background_image_color' id='38' value="<?php echo $background_image_color?>" />
          </div>
      </div>
      <div class="clear"> </div>
    </div>
    <!--container closed--> 
  </div>
  <!--wrapper closed--> 
</section>
<section>
  <div class="wrapper"  style="background-color:<?php echo $pb_col; ?>">
  <div class="container ww">
    <div class="outer_sec4">
      <div class="fleft inner_title_ttl txt_coup">
        <label>Button Text</label>
        <br>
        <input type="text" class="bb_text" name="button_text" value="<?php echo $button_name?>">
      </div>
    </div>
	
    <div class="clear"> </div>
    <!--container closed--> 
  </div>
  <!--wrapper closed--> 
</section>
<section>
  <div class="wrapper"  style="background-color:<?php echo $pb_col; ?>">
    <div class="container ww">
      <div class="outer_sec5">
        <div class="inn_sec5 fleft inner_title_ttl">
          <label>Button Color</label>
          <br>
          <div class='example'>
            <input type='text' name='button_color' id='35' value="<?php echo $button_color?>" />
          </div>
        </div>
        <div class="inn_sec5 hh fleft inner_title_ttl">
          <label>Button Size</label>
          <br>
		  
		  <div class="wrapper-demo">

                                        <div id="dd9" class="wrapper-dropdown-3" tabindex="1">
						<span>Dropdown </span>
						<ul class="dropdown">
							<li><a href="#">Element 1</a></li>
							<li><a href="#">Element 2</a></li>
							<li><a href="#">Element 3</a></li>
						</ul>
					</div>

                                        ​</div>
		  
          <!--input type="number" class="title_size" name="button_size" value="<?php echo $button_size?>"-->
        </div>
        <div class="inn_sec5 fleft inner_title_ttl">
          <label>Button TextColor</label>
          <br>
          <div class='example'>
            <input type='text' name='button_text_color' id='36' value="<?php echo $button_text_color?>" />
          </div>
        </div>
		        <div class="inner_title1 inner_title_ttl hh fleft">
          <label class="sec_head_ques1 "> Upload Video </label>
          <div class="sec_ques_div">
            <input type="text" class="fleft txt-coup">
            <button class="bb_ques fleft txt-coup">Browse..</button>
          </div>
        </div>
      </div>
       <div class="clear"> </div>

</section>
     
	<!-- section end-->

       
       
       <div class="lastouter_sec">
	<input type="hidden" name="submitted" value="1" />
        <button class="butt_view bb_sec6" id="saveandnext"> Save&Next </button>
        <button class="butt_view bb_sec6"> Save&Exit </button>
        <button class="butt_view bb_sec6 bb_bg"> Cancel </button>
      </div>
	</form>
    </div>
    <!--container closed--> 
  </div>
  <!--wrapper closed--> 
  
<script type="text/javascript">
    function DropDown(el) {
        this.dd = el;
        this.placeholder = this.dd.children('span');
        this.opts = this.dd.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd = new DropDown($('#dd'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd1 = el;
        this.placeholder = this.dd1.children('span');
        this.opts = this.dd1.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd1.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd1 = new DropDown($('#dd1'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd2 = el;
        this.placeholder = this.dd2.children('span');
        this.opts = this.dd2.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd2.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd2 = new DropDown($('#dd2'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd3 = el;
        this.placeholder = this.dd3.children('span');
        this.opts = this.dd3.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd3.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd3 = new DropDown($('#dd3'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd4 = el;
        this.placeholder = this.dd4.children('span');
        this.opts = this.dd4.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd4.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd4 = new DropDown($('#dd4'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd5 = el;
        this.placeholder = this.dd5.children('span');
        this.opts = this.dd5.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd5.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd5 = new DropDown($('#dd5'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd1 = el;
        this.placeholder = this.dd1.children('span');
        this.opts = this.dd1.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd1.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd1 = new DropDown($('#dd1'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd2 = el;
        this.placeholder = this.dd2.children('span');
        this.opts = this.dd2.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd2.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd2 = new DropDown($('#dd2'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd3 = el;
        this.placeholder = this.dd3.children('span');
        this.opts = this.dd3.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd3.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd3 = new DropDown($('#dd3'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd4 = el;
        this.placeholder = this.dd4.children('span');
        this.opts = this.dd4.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd4.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd4 = new DropDown($('#dd4'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd5 = el;
        this.placeholder = this.dd5.children('span');
        this.opts = this.dd5.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd5.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd5 = new DropDown($('#dd5'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd1 = el;
        this.placeholder = this.dd1.children('span');
        this.opts = this.dd1.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd1.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd1 = new DropDown($('#dd1'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd2 = el;
        this.placeholder = this.dd2.children('span');
        this.opts = this.dd2.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd2.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd2 = new DropDown($('#dd2'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd3 = el;
        this.placeholder = this.dd3.children('span');
        this.opts = this.dd3.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd3.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd3 = new DropDown($('#dd3'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd4 = el;
        this.placeholder = this.dd4.children('span');
        this.opts = this.dd4.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd4.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd4 = new DropDown($('#dd4'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd5 = el;
        this.placeholder = this.dd5.children('span');
        this.opts = this.dd5.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd5.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd5 = new DropDown($('#dd5'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd6 = el;
        this.placeholder = this.dd6.children('span');
        this.opts = this.dd6.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd6.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd6 = new DropDown($('#dd6'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd7 = el;
        this.placeholder = this.dd7.children('span');
        this.opts = this.dd7.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd7.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd7 = new DropDown($('#dd7'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd8 = el;
        this.placeholder = this.dd8.children('span');
        this.opts = this.dd8.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd8.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd8 = new DropDown($('#dd8'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd9 = el;
        this.placeholder = this.dd9.children('span');
        this.opts = this.dd9.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd9.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd9 = new DropDown($('#dd9'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd10 = el;
        this.placeholder = this.dd10.children('span');
        this.opts = this.dd10.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd10.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd10 = new DropDown($('#dd10'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd11 = el;
        this.placeholder = this.dd11.children('span');
        this.opts = this.dd11.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd11.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd11 = new DropDown($('#dd11'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd12 = el;
        this.placeholder = this.dd12.children('span');
        this.opts = this.dd12.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd12.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd12 = new DropDown($('#dd12'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd13 = el;
        this.placeholder = this.dd13.children('span');
        this.opts = this.dd13.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd13.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd13 = new DropDown($('#dd13'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd14 = el;
        this.placeholder = this.dd14.children('span');
        this.opts = this.dd14.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd14.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd14 = new DropDown($('#dd14'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd15 = el;
        this.placeholder = this.dd15.children('span');
        this.opts = this.dd15.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd15.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd15 = new DropDown($('#dd15'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd16 = el;
        this.placeholder = this.dd16.children('span');
        this.opts = this.dd16.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd16.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd16 = new DropDown($('#dd16'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd17 = el;
        this.placeholder = this.dd17.children('span');
        this.opts = this.dd17.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd17.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd17 = new DropDown($('#dd17'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script><script type="text/javascript">
    function DropDown(el) {
        this.dd18 = el;
        this.placeholder = this.dd18.children('span');
        this.opts = this.dd18.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd18.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd18 = new DropDown($('#dd18'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script><script type="text/javascript">
    function DropDown(el) {
        this.dd19 = el;
        this.placeholder = this.dd19.children('span');
        this.opts = this.dd19.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }

    DropDown.prototype = {
        initEvents: function() {
            var obj = this;
            obj.dd19.on('click', function(event) {
                $(this).toggleClass('active');
                return false;
            });

            obj.opts.on('click', function() {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });

        },
        getValue: function() {

            return this.val;

        },
        getIndex: function() {

            return this.index;

        }

    }

    $(function() {
        var dd19 = new DropDown($('#dd19'));
        $(document).click(function() {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
</body>
</html>
