<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/applogo1.css">
<script type="text/javascript" src="jquery/jscolor.js"></script>
<script src="jquery/jquery-1.11.3.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js">
</script>
<link rel='stylesheet' href='styles.css' type='text/css' media='all' />
<script>
function showpop(id) {
    if (confirm("Would You Like To Delete This Question") == true) {
         $("#"+id).remove();
    } else {
       
    }    
}
</script>
<script>
function add(id, num) {
		//num_new = num + 1;
         $("#adding_new_option_checkbox_"+id).before("<div class='inner_title2  inner_drag_hh fleft' id='drag_"+id+"_"+num+"'><label> Options</label><input type='checkbox'><input type='text' class='title_text title_text2 input_text txt'><div class='img_m1'><img src='images/lgt_m.png' onclick='showpop(\"drag_"+id+"_"+num+"\")'></div></div>");
		 num++;
		 $("#adding_new_option_checkbox_"+id).html("<img src='images/lgt_p.png' style='margin-left:100px' onclick='add(\""+id+"\", \""+num+"\");'>");
		 

}
</script>

<script>
$(document).ready(function(){
	var  btn_num = 0;
    var  btn_num_area = 0;
	var  btn_num_check =0;
	var  btn_num_radio =0;
	var  btn_num_dropdown =0;
	var  btn_num_photo =0;
	var  btn_num_answer =0;
	var  btn_num1 = 0;
	var  btn_num2 = 0;
	var  btn_num3 = 0;
    $(".btn1").click(function(){
		btn_num++;
        $("#outer_drag1").append("<div id='drag_"+btn_num+"'><div class='inner_title2  inner_drag_hh fleft'><img src='images/drag.png' alt='move' width='16' height='11' class='handle' /><label> Text Line</label><input type='checkbox'><span> Required </span> </div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft'><label> Question Title</label><input type='text' class='title_text title_text2 input_text'><div class='img_m' id='img_1'><img src='images/minus.png' id='img_1'onclick='showpop(\"drag_"+btn_num+"\")'></div></div></div></div>");
   });
    $(".btn2").click(function(){
	 btn_num_area++;
        $("#outer_drag1").append("<div id='drag_"+btn_num_area+"'><div class='inner_title2  inner_drag_hh fleft'><img src='images/drag.png' alt='move' width='16' height='11' class='handle' /><label> Text Area</label><input type='checkbox'><span> Required </span> </div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft'><label> Question Title</label><input type='text' class='title_text title_text2 input_text'><div class='img_m'><img src='images/minus.png' onClick='showpop(\"drag_"+btn_num_area+"\")'></div></div></div>");
   });
	$(".btn3").click(function(){
		btn_num_check++;
        $("#outer_drag1").append("<div id='drag_check"+btn_num_check+"'><div class='inner_drag'><div class='inner_title2  inner_drag_hh fleft'> <img src='images/drag.png' alt='move' width='16' height='11' class='handle' /><label> Check Boxes</label><input type='checkbox'><span> Required </span> </div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft'><label> Question Title</label><input type='text' class='title_text title_text2 input_text' value='' id='minus_id_check'><div class='img_m r_check fright' id='img_13'><img src='images/minus.png' onclick='showpop(\"drag_check"+btn_num_check+"\")'></div></div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft' id='drag_"+btn_num_check+"_0'><label> Options</label><input type='checkbox'><input type='text' class='title_text title_text2 input_text txt'><div class='img_m1'><img src='images/lgt_m.png' onclick='showpop(\"drag_"+btn_num_check+"_0\")'></div></div><div class='clear'><div id='adding_new_option_checkbox_"+btn_num_check+"' class='inner_drag minus_img3'> <img src='images/lgt_p.png' style='margin-left:100px' onclick='add(\""+btn_num_check+"\", \"1\");'> </div> </div></div></div>");
    });
	$(".btn4").click(function(){
		btn_num_radio++;
		btn_num2++;
        $("#outer_drag1").append("<div id='drag_radio"+btn_num_radio+"'><div class='inner_title2  inner_drag_hh fleft'> <img src='images/drag.png' alt='move' width='16' height='11' class='handle' /><label> Radio Button</label><input type='checkbox'><span> Required </span> </div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft'><label> Question Title</label><input type='text' class='title_text title_text2 input_text' value='' id='minus_id_check'><div class='img_m r_check fright' id='img_13'><img src='images/minus.png' onclick='showpop(\"drag_"+btn_num_radio+"\")'></div></div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft'  id='drag_1"+btn_num2+"'><label> Options</label><input type='radio'><input type='text' class='title_text title_text2 input_text txt'><div class='img_m1'><img src='images/lgt_m.png' onclick='showpop(\"drag_1"+btn_num2+"\")'></div></div><div class='clear'> </div><div class='inner_drag minus_img1'> <img src='images/lgt_p.png' style='margin-left:100px' onclick='add()';> </div></div>");
    });
	$(".btn5").click(function(){
		btn_num_dropdown++;
		btn_num3++;
        $("#outer_drag1").append("<div id='drag_dropdown"+btn_num_dropdown+"'><div class='inner_title2  inner_drag_hh fleft'> <img src='images/drag.png' alt='move' width='16' height='11' class='handle' /><label>DropDown</label><input type='checkbox'><span> Required </span> </div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft'><label> Question Title</label><input type='text' class='title_text title_text2 input_text' value='' id='minus_id_check'><div class='img_m r_check fright' id='img_13'><img src='images/minus.png' onclick='showpop(\"drag_"+btn_num_dropdown+"\")'></div></div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft'  id='drag_1"+btn_num3+"'><label> Options</label><input type='checkbox'><input type='text' class='title_text title_text2 input_text txt'><div class='img_m1'><img src='images/lgt_m.png' onclick='showpop(\"drag_1"+btn_num3+"\")'></div></div><div class='clear'> </div><div class='inner_drag minus_img2'> <img src='images/lgt_p.png' style='margin-left:100px' onclick='add()';> </div></div>");
    });
	$(".btn6").click(function(){
		btn_num_photo++;
        $("#outer_drag1").append("<div id='drag_photo"+btn_num_photo+"'><div class='inner_title2  inner_drag_hh fleft'> <img src='images/drag.png' alt='move' width='16' height='11' class='handle' /><label> PhotoQuestion</label><input type='checkbox'><span> Required </span></div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft'><label> Question Title</label><input type='text' class='title_text title_text2 input_text'><div class='img_m'><img src='images/minus.png' onclick='showpop(\"drag_"+btn_num_photo+"\")'></div></div><div class='clear'> </div><div class='sec_ques_div'><input type='text' class='fleft' ><button class='bb_ques fleft'>Browse..</button><input type='file' class='browewin' style='display:none;'/></div></div>");
    });
	$(".btn7").click(function(){
		btn_num_answer++;
        $("#outer_drag1").append("<div id='drag_answer"+btn_num_answer+"'><div class='inner_title2  inner_drag_hh fleft'> <img src='images/drag.png' alt='move' width='16' height='11' class='handle' /><label> Answer Type:</label><input type='number' class='drag_num'></div><label> PhotoQuestion</label><input type='checkbox'><span> Required </span><br><br><div class='clear'> </div><div class='inner_title2  inner_drag_hh'><label> Question Title</label><input type='text' class='title_text title_text2 input_text '><div class='img_m'><img src='images/minus.png' onclick='showpop(\"drag_"+btn_num_answer+"\")'></div></div><div class='inner_title2  inner_drag_hh'><label>Left Value</label><input type='text' class='title_text title_text2 input_text mm'></div><div class='inner_title2 inner_drag_hh'><label> Right Value</label><input type='text' class='title_text title_text2 input_text mm1'></div><div class='clear'> </div><input type='range' class='range1'></div>");
    });
});
</script>
<script type="text/javascript">
   // When the document is ready set up our sortable with it's inherant function(s)
   $(document).ready(function() {
       $("#outer_drag").sortable({
           handle : '.handle',
           update : function () {
               var order = $('#outer_drag').sortable('serialize'); 
			     }
       });
   });
</script>
<script type="text/javascript">
   // When the document is ready set up our sortable with it's inherant function(s)
   $(document).ready(function() {
       $("#outer_drag1").sortable({
           handle : '.handle',
           update : function () {
               var order = $('#outer_drag1').sortable('serialize'); 
			     }
       });
   });
</script>
<script>
$(document).ready(function(){
	$(".bb_ques").click(function(){
		$(".browewin").click();	
	});
    
});
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
      <h2 class="sec_head_ques1">Questionnaire Questions</h2>
      <h4>Default</h4>
      <div id="outer_drag">
        <div class="inner_drag">
          <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
            <label class="label_ff"> First Name </label>
          </div>
          <div class="inner_title1  inner_drag_hh fleft">
            <input type="text" class="title_text title_text2">
          </div>
          <div class="inner_title1 inner_drag_hh fleft">
            <input type="checkbox">
            <span>Required </span> </div>
          <div class="clear"> </div>
        </div>
        <!---inner_drag closed-->
        <div class="inner_drag">
          <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
            <label class="label_ff"> Last Name </label>
          </div>
          <div class="inner_title1 inner_drag_hh fleft">
            <input type="text" class="title_text title_text2">
          </div>
          <div class="inner_title1 inner_drag_hh fleft">
            <input type="checkbox">
            <span>Required </span> </div>
          <div class="clear"> </div>
        </div>
        <!---inner_drag closed-->
        <div class="inner_drag">
          <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
            <label class="label_ff"> Title </label>
          </div>
          <div class="inner_title1 inner_drag_hh fleft">
            <input type="number" class="drag_num">
          </div>
          <div class="inner_title1  inner_drag_hh fleft">
            <input type="checkbox">
            <span>Required </span>
            <div class="onoffswitch1 fright">
              <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab5" checked>
              <label class="onoffswitch-label" for="tab5"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
              <div class="font_bb fright"> Show </div>
            </div>
          </div>
          <div class="clear"> </div>
        </div>
        
        <!---inner_drag closed-->
        
        <div class="inner_drag">
          <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
            <label  class="label_ff"> Email </label>
          </div>
          <div class="inner_title1 inner_drag_hh fleft">
            <input type="text" class="title_text title_text2">
          </div>
          <div class="inner_title1  inner_drag_hh fleft">
            <input type="checkbox">
            <span>Required </span>
            <div class="onoffswitch1 fright">
              <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab6" checked>
              <label class="onoffswitch-label" for="tab6"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
              <div class="font_bb fright"> Show </div>
            </div>
          </div>
          <div class="clear"> </div>
        </div>
        
        <!---inner_drag closed-->
        <div class="inner_drag">
          <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
            <label  class="label_ff"> Telephone </label>
          </div>
          <div class="inner_title1 inner_drag_hh fleft">
            <input type="text" class="title_text title_text2">
          </div>
          <div class="inner_title1  inner_drag_hh fleft">
            <input type="checkbox">
            <span>Required </span>
            <div class="onoffswitch1 fright">
              <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab7" checked>
              <label class="onoffswitch-label" for="tab7"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
              <div class="font_bb fright"> Show </div>
            </div>
          </div>
          <div class="clear"> </div>
        </div>
        
        <!---inner_drag closed-->
        
        <div class="inner_drag">
          <div class="inner_title1 inner_drag_hh fleft"> </div>
          <div class="inner_title1 inner_drag_hh fleft">
            <input type="text" class="title_text title_text2">
          </div>
          <div class="inner_title1  inner_drag_hh fleft">
            <input type="checkbox">
            <span>Required </span>
            <div class="onoffswitch1 fright">
              <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab8" checked>
              <label class="onoffswitch-label" for="tab8"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
              <div class="font_bb fright"> Show </div>
            </div>
          </div>
          <div class="clear"> </div>
        </div>
        
        <!---inner_drag closed-->
        
        <div class="inner_drag">
          <div class="inner_title1 inner_drag_hh fleft"> </div>
          <div class="inner_title1 inner_drag_hh fleft">
            <input type="text" class="title_text title_text2">
          </div>
          <div class="inner_title1  inner_drag_hh fleft">
            <input type="checkbox">
            <span>Required </span>
            <div class="onoffswitch1 fright">
              <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab9" checked>
              <label class="onoffswitch-label" for="tab9"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
              <div class="font_bb fright"> Show </div>
            </div>
          </div>
          <div class="clear"> </div>
        </div>
        
        <!---inner_drag closed-->
        
        <div class="inner_drag">
          <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
            <label  class="label_ff"> Date of birth </label>
          </div>
          <div class="inner_title1 inner_drag_hh fleft">
            <select name="DOBMonth" class="date_ff">
              <option> Month </option>
              <option value="January">January</option>
              <option value="Febuary">Febuary</option>
              <option value="March">March</option>
              <option value="April">April</option>
              <option value="May">May</option>
              <option value="June">June</option>
              <option value="July">July</option>
              <option value="August">August</option>
              <option value="September">September</option>
              <option value="October">October</option>
              <option value="November">November</option>
              <option value="December">December</option>
            </select>
            <select name="DOBDay"  class="date_ff">
              <option> date </option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
            </select>
            <select name="DOBYear"  class="date_ff">
              <option> Year </option>
              <option value="1993">1993</option>
              <option value="1992">1992</option>
              <option value="1991">1991</option>
              <option value="1990">1990</option>
              <option value="1989">1989</option>
              <option value="1988">1988</option>
              <option value="1987">1987</option>
              <option value="1986">1986</option>
              <option value="1985">1985</option>
              <option value="1984">1984</option>
              <option value="1983">1983</option>
              <option value="1982">1982</option>
              <option value="1981">1981</option>
              <option value="1980">1980</option>
              <option value="1979">1979</option>
              <option value="1978">1978</option>
              <option value="1977">1977</option>
              <option value="1976">1976</option>
              <option value="1975">1975</option>
              <option value="1974">1974</option>
              <option value="1973">1973</option>
            </select>
            <input type="checkbox">
            <span>DDMMYY</span>
            <input type="checkbox">
            <span>DDMMYY</span> </div>
          <div class="inner_title1  inner_drag_hh fleft">
            <input type="checkbox">
            <span>Required </span>
            <div class="onoffswitch1 fright">
              <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab10" checked>
              <label class="onoffswitch-label" for="tab10"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
              <div class="font_bb fright"> Show </div>
            </div>
          </div>
          <div class="clear"> </div>
        </div>
        
        <!---inner_drag closed-->
        <div class="inner_drag">
          <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
            <label class="label_ff"> Street Adress </label>
          </div>
          <div class="inner_title1 inner_drag_hh fleft">
            <input type="text" class="title_text title_text2">
          </div>
          <div class="inner_title1  inner_drag_hh fleft">
            <input type="checkbox">
            <span>Required </span>
            <div class="onoffswitch1 fright">
              <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab11" checked>
              <label class="onoffswitch-label" for="tab11"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
              <div class="font_bb fright"> Show </div>
            </div>
          </div>
          <div class="clear"> </div>
        </div>
        
        <!---inner_drag closed-->
        <div class="inner_drag">
          <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
            <label class="label_ff"> Post Code </label>
          </div>
          <div class="inner_title1 inner_drag_hh fleft">
            <input type="text" class="title_text title_text2">
          </div>
          <div class="inner_title1  inner_drag_hh fleft">
            <input type="checkbox">
            <span>Required </span>
            <div class="onoffswitch1 fright">
              <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab12" checked>
              <label class="onoffswitch-label" for="tab12"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
              <div class="font_bb fright"> Show </div>
            </div>
          </div>
          <div class="clear"> </div>
        </div>
        
        <!---inner_drag closed-->
        <div class="inner_drag">
          <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
            <label class="label_ff"> Country </label>
          </div>
          <div class="inner_title1 inner_drag_hh fleft">
            <input type="number" class="drag_num">
          </div>
          <div class="inner_title1  inner_drag_hh fleft">
            <input type="checkbox">
            <span>Required </span>
            <div class="onoffswitch1 fright">
              <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab13" checked>
              <label class="onoffswitch-label" for="tab13"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
              <div class="font_bb fright"> Show </div>
            </div>
          </div>
          <div class="clear"> </div>
        </div>
        <br>
        <br>
        <div class="blank_div"> </div>
        <!---inner_drag closed--> 
      </div>
      <!---OUTER_drag closed-->
      
      <h4>Add Questions</h4>
      <div class="droper1">
        <div class="dropper_inner">
          <button class="bb_img"><img src="images/plus.png" class="fleft"></button>
          <div class="htab_o1">
            <div class="htab1 btn1" id="text1">Text Align </div>
            <div class="htab1 btn2" id="text2">Text Area </div>
            <div class="htab1 btn3" id="text3">Check Boxes </div>
            <div class="htab1 btn4" id="text4">Radio Button </div>
            <div class="htab1 btn5" id="text5">Drop Down</div>
            <div class="htab1 btn6" id="text6">Photo Question </div>
            <div class="htab1 btn7" id="text7">Rating Scale </div>
          </div>
        </div>
      </div>
      <div id="outer_drag1"> 
        <!--div class="left_fields fleft"-->

           <div class="inner_drag" id="drag1" style="display:none;">
          <!--div class="inner_title2  inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
            <label> Text Line</label>
            <input type="checkbox">
            <span> Required </span> </div>
          <div class="clear"> </div>
          <div class="inner_title2  inner_drag_hh fleft">
            <label> Question Title</label>
            <input type="text" class="title_text title_text2 input_text" value="" id="minus_id">
            <div class="img_m img_11"><img src="images/minus.png"></div>
          </div>
          
          <div class="minus_pop1">
          <h5>Would You Like To Delete This Question?</h5>
          <button class="minus_bb" onclick="oncl()">Yes</button>
         
          <button class="minus_bb1">No</button>
          </div>
          
           <div class="clear"> </div-->
        
        </div>
        <!---inner_drag closed--> 
        <div class="inner_drag" id="drag2" style="display:none;">
          <!--div class="inner_title2 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
            <label> Text Area</label>
            <input type="checkbox">
            <span> Required </span> </div>
          <div class="clear"> </div>
          <div class="inner_title2  inner_drag_hh fleft">
            <label> Question Title</label>
            <input type="text" class="title_text title_text2 input_text" value="" id="minus_id_area">
           <div class="img_m img_12"><img src="images/minus.png"></div>
          </div>
         <div class="minus_pop2">
          <h5>Would You Like To Delete This Question?</h5>
          <button class="minus_bb" onclick="oncli()">Yes</button>
         
          <button class="minus_bb1">No</button>
          </div>
          <div class="clear"> </div-->
        </div>
        <!---inner_drag closed--> 
      <div class="inner_drag" id="drag3" style="display:none;">
          <!--div class="inner_title2  inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
            <label> Check Boxes</label>
            <input type="checkbox">
            <span> Required </span> 
          </div>
          <div class="clear"> </div>
          <div class="inner_title2  inner_drag_hh fleft">
            <label> Question Title</label>
            <input type="text" class="title_text title_text2 input_text" value="" id="minus_id_check">
            <div class="img_m r_check fright img_13"><img src="images/minus.png"></div>
          </div>
          <div class="clear"> </div>
          <div class="inner_title2  inner_drag_hh fleft">
            <label> Options</label>
            <input type="checkbox">
            <input type="text" class="title_text title_text2 input_text txt">
            <div class="img_m1"><img src="images/lgt_m.png"></div> </div>
            
            <div class="minus_pop3">
          <h5>Would You Like To Delete This Question?</h5>
          <button class="minus_bb">Yes</button>
         
          <button class="minus_bb1">No</button>
          </div>
          <div class="clear"> </div-->
       
        <!--div class="inner_drag minus_img3"> <img src="images/lgt_p.png" style="margin-left:100px;"></div>
       <div id="op"></div-->
        </div>
        <!---inner_drag closed--> 
        
        <div class="inner_drag" id="drag4" style="display:none;">
          <!--div class="inner_title2  inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
            <label> Radio Button</label>
            <input type="checkbox">
            <span> Required </span>
            <div class="img_m  r_field"><img src="images/minus.png"></div>
          </div>
          <div class="clear"> </div>
          <div class="inner_title2  inner_drag_hh fleft">
            <label> Question Title</label>
            <input type="text" class="title_text title_text2 input_text">
          </div>
          <div class="clear"> </div>
          <div class="inner_title2 inner_drag_hh fleft">
            <label> Options</label>
            <input type="radio">
            <input type="text" class="title_text title_text2 input_text txt">
            <div class="img_m2"><img src="images/lgt_m.png"></div>
          </div>
          <div class="minus_pop4">
            <h5>Would You Like To Delete This Question?</h5>
            <button class="minus_yes">Yes</button>
            <button class="minus_no">No</button>
          </div>
          <div class="clear"> </div-->
          <!--div class="inner_drag minus_img1"> <img src="images/lgt_p.png" style="margin-left:100px";> </div-->
          <!--div id="op_rad"></div-->
        </div>
        <!---inner_drag closed-->
        
        <div class="inner_drag" id="drag5" style="display:none;">
          <!--div class="inner_title2  inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
            <label> DropDown</label>
            <input type="checkbox">
            <span> Required </span>
            <div class="img_m  r_field"><img src="images/minus.png"></div>
          </div>
          <div class="clear"> </div>
          <div class="inner_title2  inner_drag_hh fleft">
            <label> Question Title</label>
            <input type="text" class="title_text title_text2 input_text">
          </div>
          <div class="clear"> </div>
          <div class="inner_title2  inner_drag_hh fleft">
            <label> Options</label>
            <input type="text" class="title_text title_text2 input_text txt">
            <div class="img_m3"><img src="images/lgt_m.png"></div>
          </div>
          <div class="minus_pop5">
            <h5>Would You Like To Delete This Question?</h5>
            <button class="minus_yes">Yes</button>
            <button class="minus_no">No</button>
          </div>
          <div class="clear"> </div-->
          <!--div class="inner_drag minus_img2"> <img src="images/lgt_p.png" style="margin-left:100px";> </div-->
          <!--div id="op_drop"></div-->
        </div>
        <!---inner_drag closed-->
        
        <div class="inner_drag" id="drag6" style="display:none;">
          <!--div class="inner_title2  inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
            <label> PhotoQuestion</label>
            <input type="checkbox">
            <span> Required </span>
          </div>
          <div class="clear"> </div>
          <div class="inner_title2  inner_drag_hh fleft">
            <label> Question Title</label>
            <input type="text" class="title_text title_text2 input_text">
            <div class="img_m  r_field"><img src="images/minus.png"></div>
          </div>
          <div class="clear"> </div>
          <div class="sec_ques_div">
            <input type="text" class="fleft" >
            <button class="bb_ques fleft">Browse..</button>
            <input type="file" class="browewin" style="display:none;"/>
          </div-->
        </div>
        <!---inner_drag closed-->
        
        <div class="inner_drag" id="drag7" style="display:none;">
          <!--div class="inner_title2  inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
            <label> Answer Type:</label>
            <input type="number" class="drag_num">
          </div>
          <label> PhotoQuestion</label>
          <input type="checkbox">
          <span> Required </span>
          <div class="img_m  r_field"><img src="images/minus.png"></div>
          <div class="clear"> </div>
          <div class="inner_title2  inner_drag_hh">
            <label> Question Title</label>
            <input type="text" class="title_text title_text2 input_text ">
          </div>
          <div class="inner_title2  inner_drag_hh">
            <label>Left Value</label>
            <input type="text" class="title_text title_text2 input_text mm">
          </div>
          <div class="inner_title2 inner_drag_hh">
            <label> Right Value</label>
            <input type="text" class="title_text title_text2 input_text mm1">
          </div>
          <div class="clear"> </div>
          <input type="range" class="range1"-->
        </div>
        <!---inner_drag closed-->
      
        
      </div>
      <div class="clear"> </div>
      <!---outer_drag1 closed-->
      <div class="blank_div"> </div>
      <div class="last_input col-4 fleft">
        <label class="submit_text"> Submit The Text</label>
        <input type="text" class="submit_input">
      </div>
      <!---input_add closed-->
      <div class="clear"> </div>
      <div class="lastouter_sec">
        <button class="butt_view bb_sec6"> Save&Next </button>
        <button class="butt_view bb_sec6"> Save&Exit </button>
        <button class="butt_view bb_sec6 bb_bg"> Cancel </button>
      </div>
    </div>
    <!---container closed--> 
    
  </div>
  <!---wrapper closed--> 
  
</section>
<script>
$(document).ready(function(){
    $("#text1").click(function(){
        $("#drag1").show();
    });
});
</script> 
<script>
$(document).ready(function(){
    $("#text2").click(function(){
        $("#drag2").show();
    });
});
</script> 
<script>
$(document).ready(function(){
    $("#text3").click(function(){
        $("#drag3").show();
    });
});
</script> 
<script>
$(document).ready(function(){
    $("#text4").click(function(){
        $("#drag4").show();
    });
});
</script> 
<script>
$(document).ready(function(){
    $("#text5").click(function(){
        $("#drag5").show();
    });
});
</script> 
<script>
$(document).ready(function(){
    $("#text6").click(function(){
        $("#drag6").show();
    });
});
</script> 
<script>
$(document).ready(function(){
    $("#text7").click(function(){
        $("#drag7").show();
    });
});
</script> 
<script>
$(document).ready(function(){
    $(".bb_img").click(function(){
        $(".htab_o1").toggle();
    });
});
</script> 
<script>
$(document).ready(function(){
    $(".ok").click(function(){
        $("#drag1").remove();
    });
});
</script> 
</body>
</html>