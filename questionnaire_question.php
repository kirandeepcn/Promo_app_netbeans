
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
<script>
$(document).ready(function(){
	$(".bb_ques").click(function(){
		$(".browewin").click();	
	});
    
});
</script>
<script type="text/javascript">
		  function oncl() {
		  document.getElementById("minus_id").value = "";}</script>
 <script type="text/javascript">
		  function oncli() {
		  document.getElementById("minus_id_area").value = "";}</script>
 <script type="text/javascript">
		  function onclic() {
		  document.getElementById("minus_id_check").value = "";}</script>
</head>
<body>

<header>
  <div class="wrapper">
    <div class="outer_header">
      <div class="logo head"> <img src="images/logo.jpg" alt="logo"> </div>
      <div class="ryt_admin">
        <div class="inner_admin">
          <div class="droper">
            <div class="dropper_inner">
              <div class="user_name"> Admin <img src="images/arrow.jpg" alt="arrow" id="show"> </div>
              <div class="htab_o">
                <div class="htab hr_l"> Change Password </div>
                <div class="htab"> Logout </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
              <div class="font_bb fright">
              Show
              </div>
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
              <div class="font_bb fright">
              Show
              </div>
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
              <div class="font_bb fright">
              Show
              </div>
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
              <div class="font_bb fright">
              Show
              </div>
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
              <label class="onoffswitch-label" for="tab9">
              <span class="onoffswitch-inner onoffswitch-inner1"></span>
              <span class="onoffswitch-switch onoffswitch-switch1"></span>
              </label>
              <div class="font_bb fright">
              Show
              </div>
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
              <option value="1972">1972</option>
              <option value="1971">1971</option>
              <option value="1970">1970</option>
              <option value="1969">1969</option>
              <option value="1968">1968</option>
              <option value="1967">1967</option>
              <option value="1966">1966</option>
              <option value="1965">1965</option>
              <option value="1964">1964</option>
              <option value="1963">1963</option>
              <option value="1962">1962</option>
              <option value="1961">1961</option>
              <option value="1960">1960</option>
              <option value="1959">1959</option>
              <option value="1958">1958</option>
              <option value="1957">1957</option>
              <option value="1956">1956</option>
              <option value="1955">1955</option>
              <option value="1954">1954</option>
              <option value="1953">1953</option>
              <option value="1952">1952</option>
              <option value="1951">1951</option>
              <option value="1950">1950</option>
              <option value="1949">1949</option>
              <option value="1948">1948</option>
              <option value="1947">1947</option>
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
              <div class="font_bb fright">
              Show
              </div>
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
              <div class="font_bb fright">
              Show
              </div>
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
              <div class="font_bb fright">
              Show
              </div>
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
              <div class="font_bb fright">
              Show
              </div>
            </div>
          </div>
          <div class="clear"> </div>
        </div>
        <br>
        <br>
        <div class="blank_div"> </div>
        <!---inner_drag closed-->
        
        <h4>Add Questions</h4>
        <div class="droper1">
            <div class="dropper_inner">
              <button class="bb_img"><img src="images/plus.png" class="fleft"></button>
              <div class="htab_o1">
                <div class="htab1" id="text1">Text Align </div>
                <div class="htab1" id="text2">Text Area  </div>
                <div class="htab1" id="text3">Check Boxes  </div>
                <div class="htab1" id="text4">Radio Button </div>
                <div class="htab1" id="text5">Drop Down</div>
                <div class="htab1" id="text6">Photo Question </div>
                <div class="htab1" id="text7">Rating Scale </div>
              </div>
            </div>
          </div>
        
        <div class="left_fields_outer">
        <div class="left_fields fleft">
        <div class="inner_drag" id="drag1" style="display:none;">
          <div class="inner_title2  inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
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
          
           <div class="clear"> </div>
        
        </div>
        <!---inner_drag closed--> 
        <div class="inner_drag" id="drag2" style="display:none;">
          <div class="inner_title2 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
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
          <div class="clear"> </div>
        </div>
        <!---inner_drag closed--> 
        
        <div class="inner_drag" id="drag3" style="display:none;">
          <div class="inner_title2  inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
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
          <button class="minus_bb" onclick="onclic()">Yes</button>
         
          <button class="minus_bb1">No</button>
          </div>
          <div class="clear"> </div>
       
        <div class="inner_drag"> <img src="images/lgt_p.png" style="margin-left:100px";> </div>
         </div>
        <!---inner_drag closed--> 
        
        <div class="inner_drag" id="drag4" style="display:none;">
          <div class="inner_title2  inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
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
            <div class="img_m2"><img src="images/lgt_m.png"></div> </div>
          <div class="clear"> </div>
       <div class="inner_drag"> <img src="images/lgt_p.png" style="margin-left:100px";> </div>
         </div>
        <!---inner_drag closed--> 
        
        <div class="inner_drag" id="drag5" style="display:none;">
          <div class="inner_title2  inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
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
            <input type="checkbox">
            <input type="text" class="title_text title_text2 input_text txt">
            <div class="img_m3"><img src="images/lgt_m.png"></div> </div>
          <div class="clear"> </div>
       
       
        <div class="inner_drag"> <img src="images/lgt_p.png" style="margin-left:100px";> </div>
         </div>
        <!---inner_drag closed--> 
        
        <div class="inner_drag" id="drag6" style="display:none;">
          <div class="inner_title2  inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
            <label> PhotoQuestion</label>
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
      
        <div class="sec_ques_div">
          <input type="text" class="fleft" >
          <button class="bb_ques fleft">Browse..</button>
          <input type="file" class="browewin" style="display:none;"/>
        </div>
        </div>   <!---inner_drag closed-->
        
        
        
        <div class="inner_drag" id="drag7" style="display:none;">
          <div class="inner_title2  inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
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
       <input type="range" class="range1">
       </div> <!---inner_drag closed-->
       
       </div><!---left_fields closed--> 
       <!--div class="right_fields  fright">
       <div class="box_head">
       <div class="img_right fleft">
       <img src="images/aa.png">
       </div>
       <h4> Add A Question</h4>
       </div><!---box_head closed-->
      <!--ul class="box_ul">
       <li class="box_li"> Text Align</li>
       <li class="box_li"> Text Area</li>
       <li class="box_li"> Check Boxes</li>
       <li class="box_li"> Radio Button</li>
       <li class="box_li"> Photo Question</li>
       <li class="box_li"> Rating Scale</li>
       </ul>
       </div--><!---right_fields col-6 frightclosed-->
       </div><!---left_fields outer closed-->
        
              <div class="clear"> </div>
      </div><!---outer_drag closed--> 
      <div class="blank_div">
      </div>
       <div class="last_input col-4 fleft">
       <label class="submit_text"> Submit The Text</label>
       <input type="text" class="fright submit_input">
       </div> <!---input_add closed-->
         <div class="clear"> </div>
          <div class="lastouter_sec">
        <button class="butt_view bb_sec6"> Save&Next </button>
        <button class="butt_view bb_sec6"> Save&Exit </button>
        <button class="butt_view bb_sec6 bb_bg"> Cancel </button>
      </div>
    </div><!---container closed--> 
    
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
    $(".img_11").click(function(){
        $(".minus_pop1").show();
    });
});
</script>
<script>
$(document).ready(function(){
    $(".minus_bb1").click(function(){
        $(".minus_pop1").hide();
    });
});
</script>
<script>
$(document).ready(function(){
    $(".minus_bb").click(function(){
        $(".minus_pop1").hide();
    });
});
</script>
<script>
$(document).ready(function(){
    $(".img_12").click(function(){
        $(".minus_pop2").show();
    });
});
</script>
<script>
$(document).ready(function(){
    $(".minus_bb").click(function(){
        $(".minus_pop2").hide();
    });
});
</script>
<script>
$(document).ready(function(){
    $(".minus_bb1").click(function(){
        $(".minus_pop2").hide();
    });
});
</script>
<script>
$(document).ready(function(){
    $(".img_13").click(function(){
        $(".minus_pop3").show();
    });
});
</script>
<script>
$(document).ready(function(){
    $(".minus_bb").click(function(){
        $(".minus_pop3").hide();
    });
});
</script>
<script>
$(document).ready(function(){
    $(".minus_bb1").click(function(){
        $(".minus_pop3").hide();
    });
});
</script>
</body>
</html>