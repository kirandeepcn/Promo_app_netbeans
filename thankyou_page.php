<?php
include "./header.php";
include "./check_session.php";

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
    
    if(isset($_POST['submitted'])) {        
        $setting_id = 7;
        
        $insertSettingBool = $questObj->checkQuesSetting($ques_id, $setting_id);
        if($insertSettingBool) {
            $questObj->insertQuesSetting($ques_id, $setting_id, 1);
        } else {
            $questObj->updateQuesSetting($ques_id, $setting_id, 1);
        }
        
        $header_image = isset($_FILES['headerimage'])?$_FILES['headerimage']:array();

        $ques_title = isset($_POST['ques_title'])?$_POST['ques_title']:"";
        $title_size = isset($_POST['title_size_hidden'])?$_POST['title_size_hidden']:"";
        $title_font = isset($_POST['title_font_hidden'])?$_POST['title_font_hidden']:"";        
        $title_color = isset($_POST['title_color'])?$_POST['title_color']:"";

        $ques_text = isset($_POST['ques_text'])?$_POST['ques_text']:"";
        $text_size = isset($_POST['text_size'])?$_POST['text_size']:"";
        $text_font = isset($_POST['text_font'])?$_POST['text_font']:"";        
        $text_color = isset($_POST['text_color'])?$_POST['text_color']:"";

        $background_image = isset($_FILES['bgimage'])?$_FILES['bgimage']:array();
        $bg_color = isset($_POST['bgcolor'])?$_POST['bgcolor']:"";

        $btn_text = isset($_POST['btn_text'])?$_POST['btn_text']:"";
        $btn_size = isset($_POST['btn_size'])?$_POST['btn_size']:"";        
        $btn_color = isset($_POST['btn_color'])?$_POST['btn_color']:"";
        $btn_switch = isset($_POST['btn_switch'])?"1":"0";

        $tap_switch = isset($_POST['tap_switch'])?"1":"0";

        $element_type = array();
        $element_type[] = 'Header Image';
        $element_type[] = 'Title';
        $element_type[] = 'Text';
        $element_type[] = 'Background Image';
        $element_type[] = 'Button';
        $element_type[] = 'Tap';

        $element_name = array();        
        $element_name[] = '';
        $element_name[] = $ques_title;
        $element_name[] = $ques_text;
        $element_name[] = '';
        $element_name[] = $btn_text;
        $element_name[] = '';

        $element_size = array();
        $element_size[] = '';
        $element_size[] = $title_size;
        $element_size[] = $text_size;
        $element_size[] = '';
        $element_size[] = $btn_size;
        $element_size[] = '';

        $element_font = array();
        $element_font[] = '';
        $element_font[] = $title_font;
        $element_font[] = $text_font;
        $element_font[] = '';
        $element_font[] = '';
        $element_font[] = '';

        $element_color = array();
        $element_color[] = '';
        $element_color[] = $title_color;
        $element_color[] = $text_color;
        $element_color[] = $bg_color;
        $element_color[] = $btn_color;
        $element_color[] = '';

        $element_attachment = array();
        $element_attachment[] = $header_image;
        $element_attachment[] = '';
        $element_attachment[] = '';
        $element_attachment[] = $background_image;
        $element_attachment[] = '';
        $element_attachment[] = '';

        $active = array();
        $active[] = '1';
        $active[] = '1';
        $active[] = '1';
        $active[] = '1';
        $active[] = $btn_switch;
        $active[] = $tap_switch;

        $count = count($element_type);
        $access_token = $_SESSION['access_token'];
        $insertElementBool = $questObj->checkQuesSettingElement($ques_id, $setting_id);
        for($i=0;$i<$count;$i++) {
            if($element_attachment[$i] != '') {
                $file_name = $questObj->uploadFile($element_attachment[$i], $access_token);
            } else {
                $file_name = '';
            }
            if($insertElementBool) {
                $questObj->insertQuesElement($ques_id, $setting_id, $element_type[$i], $element_name[$i], $element_color[$i], $element_size[$i], $element_font[$i], $file_name, $active[$i]);
            } else {
                $questObj->updateQuesElement($ques_id, $setting_id, $element_type[$i], $element_name[$i], $element_color[$i], $element_size[$i], $element_font[$i], $file_name, $active[$i]);
            }
        }
        echo "<script>location.href = 'prize_wheel.php?ques_id=$ques_id'; </script>";
        exit();
    }
    
}
?>


<script>
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#dispimg').attr('src', e.target.result);
            $('#dispimg').show();
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function save()
    {
        var title_size = $('#title_size').html();
        $('#title_size_hidden').val(title_size);
        var title_font = $("#title_font").html();
        $('#title_font_hidden').val(title_font);  
    }

$(document).ready(function(){
    $("#headerbutt").click(function(){
        $("#headerimage").click();	
        event.preventDefault();
    });
    $("#bgimagebutt").click(function(){
        $("#bgimage").click();
        event.preventDefault();
    });
    $("#headerimage").change(function(){
        readURL(this);
    });
    
     $('#saveandnext').click(function(event){
            event.preventDefault();
            save();
            $("#form").submit();
        });
            
});

</script>

<div class="sec_create">
    <h2 class="sec_head_ques"> Create a Questionnaire</h2>
  </div>
<section>
    <div class="wrapper">
        <form action="#" id="form" method="post" enctype="multipart/form-data">
    <div class="container ww">
    <div class="thank_head fleft";>
        <h2 class="sec_head_ques1">Thank you/Submission page</h2></div>
        <div class="thank_chk">
        <input type="checkbox" class="fright";>
        <h6>Copy Customization from welcome page?</h6>
        </div>
         <div class="clear"> </div>
        <div class="sec_ques_div">
        <label class="sec_head_ques1 fleft">Header image/video </label>
        <label class="sec_head_ques1 fright">(crop to fit 0*0 area)</label>
      </div>
         <div class="sec_ques_div" style="height: auto!important; min-height: 50px;">
             <button class="bb_ques fleft" id="headerbutt">Browse..</button> <br/>
             <input type="file" id="headerimage" name="headerimage" class="browewin" style="display:none;"/>
        <img id="dispimg" src="#" alt="Header Image" style="display:none; max-height: 200px; max-width: 200px; margin-top: 10px;"/>
      </div>
        <div class="outer_title1">
        <div class="inner_title1 fleft">
            <label>Title</label>
            <br>
            <input type="text" name="ques_title" class="title_text title_text1">
          </div>
        <div class="inner_title1 fleft ">
            <label>Title Size</label>
            <br>
            <div class="wrapper-demo">
            <div id="dd" class="wrapper-dropdown-3" tabindex="1"> <span id="title_size">Dropdown </span>
                <input type="hidden" name="title_size_hidden" id="title_size_hidden">
                <ul class="dropdown">
                <li><a href="#">Element 1</a></li>
                <li><a href="#">Element 2</a></li>
                <li><a href="#">Element 3</a></li>
              </ul>
              </div>
            ​</div>
          </div>
        <div class="inner_title1 fleft">
            <label>Title Font</label>
            <br>
            <div class="wrapper-demo">
            <div id="dd1" class="wrapper-dropdown-3" tabindex="1"> <span id="title_font">Dropdown </span>
                <input type="hidden" name="title_font_hidden" id="title_font_hidden">
                <ul class="dropdown">
                <li><a href="#">Element 1</a></li>
                <li><a href="#">Element 2</a></li>
                <li><a href="#">Element 3</a></li>
              </ul>
              </div>
            ​</div>
          </div>
        <div class="inner_title1 fleft">
            <label>Title Color</label>
            <br>
            <div class='example'>
            <input type='text' id='13' name="title_color" value='orangered' />
          </div>
          </div>
      </div>
        <div class="clear"> </div>
        <div class="outer_title1">
        <div class="inner_title1 fleft">
            <label>Text</label>
            <br>
            <textarea rows="5" cols="25" id="ques_text" name="ques_text"></textarea>
          </div>
        <div class="inner_title1 fleft ">
            <label>Title Size</label>
            <br>
            <input type="number" id="text_size" name="text_size" class="title_size title_size1">
          </div>
        <div class="inner_title1 fleft">
            <label>Title Font</label>
            <br>
            <input type="number" id="text_font" name="text_font" class="title_size title_size_font title_size1">
          </div>
        <div class="inner_title1 fleft">
            <label>Title Color</label>
            <br>
            <div class='example'>
            <input type='text' name="text_color" id='14' value='orangered' />
          </div>
          </div>
      </div>
        <div class="clear"> </div>
      
    <div class="outer_title1">
        <div class="inner_title3 inner_title_ttl  fleft">
        <label class="sec_head_ques1 "> Background-image </label>
        <div class="sec_ques_div">
            <input type="file" name="bgimage" id="bgimage" class="browewin fleft br_text" style="display: none" >
            <button class="bb_ques fleft" id="bgimagebutt">Browse..</button>
          </div>
      </div>
        <div class="inner_title3 inner_title_ttl fleft ">
        <label>Background-color</label>
        <br>
        <div class='example'>
            <input type='text' name="bgcolor" id='15' value='orangered' />
          </div>
      </div>
      </div>
      
       <div class="clear"> </div>
        <div class="outer_title1">
        <div class="inner_title1 fleft">
            <label> Button Text</label>
            <br>
            <input type="text" name="btn_text" class="la_text" style="width: 210px;">
        </div>
              
        <div class="inner_title1 fleft ">
             <label>Button Color</label>
            <br>
            <div class='example'>
                  <input type='text' name="btn_color" id='16' value='orangered' />
                    
              </div>
          </div>
        <div class="inner_title1 fleft">
            <label>Button Size</label>
            <br>
            <input type="number" name="btn_size" class="title_size title_size1">
        </div>        
        <div class="fleft">
            <label>Show/Hide Button</label>
            <br>
            <div class="onoffswitch1">
            <input type="checkbox" name="btn_switch" class="onoffswitch-checkbox" id="tab2" checked>
            <label class="onoffswitch-label" for="tab2"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span></label>
          </div>
            <!--label class=" fright"> Show</label--> 
          </div>
     </div>
   
          
        <div class="clear"> </div>
      

    <div class="wel_lastpara"> <span class="wel_lastpara_span">Tap anywhere on screen to enter questionnaire?</span>
        <div class="fright">
        <div class="onoffswitch1">
            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab3" checked>
            <label class="onoffswitch-label" for="tab3"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
          </div>
      </div>
      </div>
    <div class="lastouter_sec1">
        <input type="hidden" name="submitted" value="1" />
        <button class="butt_view bb_sec6" id="saveandnext"> Save&Next </button>
        <button class="butt_view bb_sec6" id="saveandexit"> Save&Exit </button>
        <button class="butt_view bb_sec6 bb_bg"> Cancel </button>
      </div>
    <div class="clear"> </div>
  </div>
    <!--container-->
        </form>
    </div>
    <!--wrapper--> 
    
  </section>

<!-- jQuery if needed --> 
<script>
function myFunction() {
    window.open("http://localhost/promoapps/create_questinnare.php");
}
</script> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> 
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
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						return false;
					});

					obj.opts.on('click',function(){
						var opt = $(this);
						obj.val = opt.text();
						obj.index = opt.index();
						obj.placeholder.text(obj.val);
					});
				},
				getValue : function() {
					return this.val;
				},
				getIndex : function() {
					return this.index;
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

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
				initEvents : function() {
					var obj = this;

					obj.dd1.on('click', function(event){
						$(this).toggleClass('active');
						return false;
					});

					obj.opts.on('click',function(){
						var opt = $(this);
						obj.val = opt.text();
						obj.index = opt.index();
						obj.placeholder.text(obj.val);
					});
				},
				getValue : function() {
					return this.val;
				},
				getIndex : function() {
					return this.index;
				}
			}

			$(function() {

				var dd1 = new DropDown( $('#dd1') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-3').removeClass('active');
				});

			});

		</script> 
<script type="text/javascript" src="jquery/jquery-1.9.1.js"></script> 
<script type="text/javascript" src="jquery/spectrum.js"></script> 
<script type='text/javascript' src="jquery/docs.js"></script>
</body>
</html>