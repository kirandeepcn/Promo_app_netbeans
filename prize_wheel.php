<!DOCTYPE html>
<html>
<head>
<?php
include "./header.php";
include "./check_session.php";

$title = $title_size = $title_font = $text = $text_size = $text_font = $button_name = $button_size = $button_text_color = "";
$range_value = 50;
$title_color = "orangered";
$text_color = "orangered";
$button_color = "orangered";
$button_text_color = "orangered";
$background_color = "orangered";
$background_image_color = "orangered";
$hour_chg = 2;
$xperson = 60;
$grand_prize = 60;
$runner = 60;
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

	if(isset($_POST['submitted'])) {        
        $setting_id = 9;
        
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


        $element_type = array();
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

        $element_size = array();
        $element_size[] = '';
        $element_size[] = $title_size;
        $element_size[] = $text_size;
        $element_size[] = $background_range;
        $element_size[] = $button_size;

        $element_font = array();
        $element_font[] = '';
        $element_font[] = $title_font;
        $element_font[] = $text_font;
        $element_font[] = $background_image_color;
        $element_font[] = '';

        $element_color = array();
        $element_color[] = '';
        $element_color[] = $title_color;
        $element_color[] = $text_color;
        $element_color[] = $background_color;
        $element_color[] = $button_color;

        $element_attachment = array();
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
        $active[] = $button_switch;

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
            $questObj->insertQuesElement($ques_id, $setting_id, $element_type[$i], $element_name[$i], $element_color[$i], $element_size[$i], $element_font[$i], $file_name, $active[$i]);            
        }
        echo "<script>location.href = 'thankyou_page.php?ques_id=$ques_id'; </script>";
        exit();
}

else
{
	$quest_app_arr = $questObj->getQuesSettingElement($ques_id, array(9));
	
	foreach($quest_app_arr as $quest_app) {
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
		$("#op").append("<div id='drag_"+box_col+"'class='wheel_tabs'><div class='example'><input type='text' name='preferredRgb' id='num' value='orangered'  /><div><img src='images/minus.png' onclick='showpop(\"drag_"+box_col+"\")'></div></div>");	
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
<header>
  <div class="wrapper">
    <div class="logo"> <img src="images/logo.jpg" alt="logo"> </div>
  </div>
</header>
<div class="sec_create">
  <h2 class="sec_head_ques"> Create a Questionnaire</h2>
</div>
<section>
  <div class="wrapper" style="background-color:<?php echo $pb_col ?>">
    <div class="container ww">
      <h2 class="sec_head_ques1">Would You Like a...</h2>
      <div class="prize"> <img src="images/radio.jpg"><span class="pr_span bg_random">Prize Wheel</span> <span class="or_span">OR</span>
        <input type="radio">
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
k = <?php echo $_POST['tval'] ?>;	
	if(k != "")
	{
		i = k;
	}
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
            <input type='text' name='preferredRgb' id='21' value='orangered' />
          </div>
        </div>
        <div class="clear"></div>
        <br>
        <div class="wheel_tabs">
          <label class="fleft wh_tab_mm">Runner Up Winner Color</label>
          <div class='example runner_mm'>
            <input type='text' name='preferredRgb' id='22' value='orangered' />
          </div>
        </div>
        <div class="clear"></div>
        <br>
        <div class="wheel_tabs">
          <label class="fleft wh_tab_mm">Loser Color</label>
          <div class='example'>
            <input type='text' name='preferredRgb' id='23' value='orangered' />
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

		 <input type="submit" id="hmws_bt" style="display:none;"  />
		       
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
      <h2 class="sec_head_ques1">Winner Options</h2>
      <div class="random_outer">
        <div class="random fleft"> <img src="images/radio.jpg"><span class="pr_span bg_random">Random</span> </div>
        <div class="random_center fleft">
          <input type="radio">
          <span class="pr_span">Timed</span> <br>
          <!--span class="pr_span">Every 2 Hours</span-->
		<label for ="fader_1" class="pr_span" id="pr_span">Every <?php echo $hour_chg?> Hours</label>


	<input type=range class="range_wheel" name ="range" min=0 max=100 value=50 id=fader_1 step=1 oninput="outputUpdate_1(value)">

	<output for=fader_1 id=volume_1>60</output>

        </div>
        <div class="random_corner fright">
          <input type="radio">
         
	<label for = "fader_2">Every X Person</label><br>
          <span class="pr_span" id="pr_span_1"><?php echo $xperson?></span> <br>
          <input type=range class="range_wheel" name ="range" min=0 max=100 value=50 id=fader_2 step=1 oninput="outputUpdate_2(value)">

	<output for=fader_2 id=volume_2>60</output>
        </div>
      </div>

      <div class="clear"></div>
      <h2 class="sec_head_ques1">Number Of Winners</h2>
      <div class="winnr_div1 fleft"> 
	<label for="fader_3"><span class="pr_span">Grand Prize</span></label> <br>
        <span class="pr_span spn_positn" id="pr_span_2"><?php echo $grand_prize?></span> <br>
	<input type=range class="range_wheel" name ="range" min=0 max=100 value=50 id=fader_3 step=1 oninput="outputUpdate_3(value)">

	<output for=fader_3 id=volume_3>60</output>
        
      </div>
      <div class="winnr_div1 fleft"> <label for="fader_4"><span class="pr_span">Runner Up</label></span>
        <div class="run_bb">
          <div class="onoffswitch1 fright">
            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab12" checked>
            <label class="onoffswitch-label" for="tab12"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
            <div class="font_bb fright"> Yes </div>
          </div>
        </div>
        <span class="pr_span spn_positn"id = "pr_span_3"><?php echo $runner?></span> <br>
        <input type=range class="range_wheel" name ="range" min=0 max=100 value=50 id=fader_4 step=1 oninput="outputUpdate_4(value)">

	<output for=fader_4 id=volume_4>60</output>
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
 <form action="#" id="form" method="post" enctype="multipart/form-data">
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
          <input type="number" class="title_size" name="title_size" value="<?php echo $title_size?>">
        </div>
        <div class="inner_title1 fleft">
          <label>Title Font</label>
          <br>
          <input type="number" class="title_size title_size_font" name="title_font" value="<?php echo $title_font?>">
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
          <textarea rows="5" cols="25" name="text" ><?php echo $text?></textarea>
        </div>
        <div class="inner_title1 fleft ">
          <label>Text Size</label>
          <br>
          <input type="number" class="title_size" name="text_size" value="<?php echo $text_size?>">
        </div>
        <div class="inner_title1 fleft">
          <label>Text Font</label>
          <br>
          <input type="number" class="title_size title_size_font" name="text_font" value="<?php echo $text_font?>">
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
        <div class="inner_title3 inner_title_ttl hh fleft">
          <label class="sec_head_ques1 "> Background-image </label>
          <div class="sec_ques_div">
            <input type="text" class="fleft">
            <button class="bb_ques fleft">Browse..</button>
          </div>
        </div>
        <div class="inner_title3 inner_title_ttl hh fleft ">
          <label>Background image color overlay</label>
          <br>
          <div class='example'>
            <input type='text' name='background_image_color' id='20' value="<?php echo $background_image_color?>" />
          </div>
        </div>
        <div class="inner_title3 inner_title_ttl hh fleft">
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
        <div class='example1'>
          <input type='text' name="background_color" id='4' value="<?php echo $background_color?>" />
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
      <div class="fleft inner_title_ttl">
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
          <input type="number" class="title_size" name="button_size" value="<?php echo $button_size?>">
        </div>
        <div class="inn_sec5 fleft inner_title_ttl">
          <label>Button TextColor</label>
          <br>
          <div class='example'>
            <input type='text' name='button_text_color' id='9' value="<?php echo $button_text_color?>" />
          </div>
        </div>
      </div>
       <div class="clear"> </div>
       <div class="blank_div">
       </div>
       <label class="sec_head_ques1 fleft">Runner Up Winner Page </label>
       <br><br>
       <h6 class="fleft">(same spaces as winner page above)</h6>
       <div class="clear"> </div>
       <div class="blank_div">
       
       <label class="sec_head_ques1 fleft">Loaser Page </label>
       <br><br>
       <h6 class="fleft">(same spaces as winner page above)</h6>
       </div><br><br><br>
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
  <!--
<form>
   
    <input type="button" value="click" OnClick="kk()"/>
    <script type="text/javascript">
       var lol = document.getElementById('lolz');
       function kk() {
           alert(lol.value);
       }
    </script>
</form>
-->
</section>

<!--script>
var data;
var i = 0;
function myFunction() {
    data = document.getElementById("text").value ;
	var dataprovider = [];
	
	
	for(var km = 0; km < data; km++){
		dataprovider[km] = [];		
		dataprovider[km]["country"] = km;
		dataprovider[km]["litres"] = "301.58";
		
	}	
	var chart = AmCharts.makeChart( "chartdiv", {
  "type": "pie",
  "dataProvider": dataprovider,
  "valueField": "litres",
  "titleField": "country",
  "export": {
    "enabled": true
  }
  
} 

);
	}
		
var chart = AmCharts.makeChart( "chartdiv", {
  "type": "pie",
  "dataProvider": [
  {
    "country": "",
    "litres": 1	  
  },  
  {
    "country": "",
    "litres": 1
  }
  ],
  "valueField": "litres",
  "titleField": "country",
  "export": {
    "enabled": true
  }
  
} 

);
	
	
</script-->
</body>
</html>
