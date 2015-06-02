<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/applogo.css">
<script src="jquery/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/spectrum.css">
<script type="text/javascript" src="jquery/jquery-1.9.1.js"></script>
<script type="text/javascript" src="jquery/spectrum.js"></script>
<script type='text/javascript' src="jquery/docs.js"></script>
<script src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="http://www.amcharts.com/lib/3/pie.js"></script>
<!--script src="http://www.amcharts.com/lib/3/themes/light.js"--></script>
<script>
$(document).ready(function(){
	$("minus_img img").click(function(){
		$("#op").append("<div class='wheel_tabs'><label class='fleft wh_tab_mm'>Panel Color</label><div class='example'><input type='text' name='preferredRgb'id='24' value='orangered' /></div>");	
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
function myFunction() {
    window.open("http://localhost/promoapps/questionnaire_question.php");
}
function outputUpdate1(vol) {

document.querySelector('#1').value = vol;

}

function outputUpdate3(vol) {

document.querySelector('#2').value = vol;

}

function outputUpdate3(vol) {

document.querySelector('#3').value = vol;

}


</script>

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
  <div class="wrapper">
    <div class="container ww">
      <h2 class="sec_head_ques1">Would You Like a...</h2>
      <div class="prize"> <img src="images/radio.jpg"><span class="pr_span bg_random">Prize Wheel</span> <span class="or_span">OR</span>
        <input type="radio">
        <span class="pr_span">Coupon Code</span> </div>
      <div class="blank_div"> </div>
    </div>
  </div>
</section>
<secton>
<div class="wrapper">
  <div class="container ww">
    <div class="wheel_app">
      <h2 class="sec_head_ques1">Prize Wheel Appearance</h2>
      <div class="fleft wheel_inn"> 
     <div id="chartdiv"></div>	
     <input type="button" class="pre_bb" value="Preview Button" onclick="myFunction()" />
      
      
       </div>
      <!---wheel_inn closed----->
      <div class="fright wheel_inn">
        <div class="wheel_tabs">
          <label class="fleft wh_tab_mm">Page Background Color</label>
          <div class='example'>
            <input type='text' name='preferredRgb' id='18' value='orangered' />
          </div>
        </div>
        <div class="clear"></div>
        <br>
        <div class="wheel_tabs">
          <label class="fleft wh_tab_mm ">Spin Arrow Color</label>
          <div class='example spin_mm'>
            <input type='text' name='preferredRgb' id='19' value='orangered' />
          </div>
        </div>
        <div class="clear"></div>
        <br>
        <div class="wheel_tabs">
          <label class="fleft wh_tab_mm ouline_mm">Wheel Outline Color</label>
          <div class='example outline_mm'>
            <input type='text' name='preferredRgb' id='20' value='orangered' />
          </div>
        </div>
        <div class="clear"></div>
        <br>
        <div class="wheel_tabs">
        <form id="numpie" method="POST" name="col" onSubmit="myFunction()" >
          <label class="fleft wh_tab_mm">How Many Wheel Panels?</label>
          <div class="panel_mm fleft">
            <input type="number" name="enter" class="title_size title_size_font" value="" id="text"/>
           
            
           
          
            </form>
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
        <div class="clear"></div>
        <br>
        <div class="inner_drag minus_img3"><img src="images/lgt_p.png" style="margin-left:100px;">Add another color</div>
        <div id="op"></div>
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
  <div class="wrapper">
    <div class="container ww">
      <h2 class="sec_head_ques1">Winner Options</h2>
      <div class="random_outer">
        <div class="random fleft"> <img src="images/radio.jpg"><span class="pr_span bg_random">Random</span> </div>
        <div class="random_center fleft">
          <input type="radio">
          <span class="pr_span">Timed</span> <br>
          <span class="pr_span">Every 2 Hours</span>
          <input type=range class="range_wheel" min=0 max=100 value=50 oninput="outputUpdate1(value)">
          <output for=fader id="1">100%</output>
        </div>
        <div class="random_corner fright">
          <input type="radio">
          <span class="pr_span">Every X Person</span> <br>
          <span class="pr_span">60</span> <br>
          <input type=range class="range_wheel" min=0 max=100 value=50 oninput="outputUpdate2(value)">
          <output for=fader id="2">100%</output>
        </div>
      </div>
      <div class="clear"></div>
      <h2 class="sec_head_ques1">Number Of Winners</h2>
      <div class="winnr_div1 fleft"> <span class="pr_span">Grand Prize</span> <br>
        <span class="pr_span spn_positn">60</span> <br>
        <input type=range class="range_wheel1" min=0 max=100 value=50  oninput="outputUpdate3(value)">
        <output for=fader id="3">100%</output>
      </div>
      <div class="winnr_div1 fleft"> <span class="pr_span">Runner Up</span>
        <div class="run_bb">
          <div class="onoffswitch1 fright">
            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab12" checked>
            <label class="onoffswitch-label" for="tab12"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
            <div class="font_bb fright"> Yes </div>
          </div>
        </div>
        <span class="pr_span spn_positn">60</span> <br>
        <input type=range class="range_wheel1" min=0 max=100 value=50 id=fader step=1 oninput="outputUpdate(value)">
        <output for=fader id=volume>100%</output>
      </div>
      <div class="clear"></div>
      <div class="blank_div"> </div>
    </div>
    <!---container closed-----> 
  </div>
  <!---wrapper closed-----> 
</section>
<section>
  <div class="wrapper">
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
          <input type="text" class="title_text">
        </div>
        <div class="inner_title1 fleft ">
          <label>Title Size</label>
          <br>
          <input type="number" class="title_size">
        </div>
        <div class="inner_title1 fleft">
          <label>Title Font</label>
          <br>
          <input type="number" class="title_size title_size_font">
        </div>
        <div class="inner_title1 fleft">
          <label>Title Color</label>
          <br>
          <div class='example'>
            <input type='text' name='preferredRgb' id='25' value='orangered' />
          </div>
        </div>
      </div>
      <div class="clear"> </div>
      <div class="outer_title1">
        <div class="inner_title1 fleft">
          <label>Text</label>
          <br>
          <textarea rows="5" cols="25"></textarea>
        </div>
        <div class="inner_title1 fleft ">
          <label>Text Size</label>
          <br>
          <input type="number" class="title_size">
        </div>
        <div class="inner_title1 fleft">
          <label>Text Font</label>
          <br>
          <input type="number" class="title_size title_size_font">
        </div>
        <div class="inner_title1 fleft">
          <label>Text Color</label>
          <br>
          <div class='example'>
            <input type='text' name='preferredRgb' id='26' value='orangered' />
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
  <div class="wrapper">
    <div class="container ww">
      <div class="outer_title1">
        <div class="inner_title3 inner_title_ttl hh fleft">
          <label class="sec_head_ques1 "> Background-image </label>
          <div class="sec_ques_div">
            <input type="text" class="fleft" >
            <button class="bb_ques fleft">Browse..</button>
          </div>
        </div>
        <div class="inner_title3 inner_title_ttl hh fleft ">
          <label>Background image color overlay</label>
          <br>
          <div class='example'>
            <input type='text' name='preferredRgb' id='3' value='orangered' />
          </div>
        </div>
        <div class="inner_title3 inner_title_ttl hh fleft">
          <label>Opacity</label>
          <br>
          <input type=range class="range" min=0 max=100 value=50 id=fader step=1 oninput="outputUpdate(value)">
          <output for=fader id=volume>100%</output>
        </div>
      </div>
      <!--outer_title1 closed-->
      <div class="inner_title2 inner_title_ttl  fleft">
        <label>Background Color</label>
        <br>
        <div class='example1'>
          <input type='text' name='preferredRgb' id='4' value='orangered' />
        </div>
      </div>
      <div class="clear"> </div>
    </div>
    <!--container closed--> 
  </div>
  <!--wrapper closed--> 
</section>
<section>
  <div class="wrapper">
  <div class="container ww">
    <div class="outer_sec4">
      <div class="fleft inner_title_ttl">
        <label>Button Text</label>
        <br>
        <input type="text" class="bb_text">
      </div>
    </div>
    <div class="clear"> </div>
    <!--container closed--> 
  </div>
  <!--wrapper closed--> 
</section>
<section>
  <div class="wrapper">
    <div class="container ww">
      <div class="outer_sec5">
        <div class="inn_sec5 fleft inner_title_ttl">
          <label>Button Color</label>
          <br>
          <div class='example'>
            <input type='text' name='preferredRgb' id='8' value='orangered' />
          </div>
        </div>
        <div class="inn_sec5 hh fleft inner_title_ttl">
          <label>Button Size</label>
          <br>
          <input type="number" class="title_size">
        </div>
        <div class="inn_sec5 fleft inner_title_ttl">
          <label>Button TextColor</label>
          <br>
          <div class='example'>
            <input type='text' name='preferredRgb' id='9' value='orangered' />
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
        <button class="butt_view bb_sec6" onclick="myFunction()"> Save&Next </button>
        <button class="butt_view bb_sec6"> Save&Exit </button>
        <button class="butt_view bb_sec6 bb_bg"> Cancel </button>
      </div>
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

<script>
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
	
	
</script>







<!--
<script>
	var lol_1 = i = 0;
	var lol = document.getElementById('lolz');
	function kk() {
	var lol_1  = lol.value;
	
	}

var chart = AmCharts.makeChart( "chartdiv", {
  "type": "pie",
  "dataProvider": [


  {
    "country": i,
    "litres": 301.9
	  
  },
  
  {
    "country": "1",
    "litres": 301.9
  }
  ],
  "valueField": "litres",
  "titleField": "country",
  "export": {
    "enabled": true
  }
  
} 

);
	</script>
    
    -->
</body>
</html>