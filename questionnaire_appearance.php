<?php 
include "header.php";

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
    $re_header_image = "";
    
    $re_title_color = 'orangered';
    $re_title_font = "Select Font";
    $re_title_name = "";
    $re_title_size = "Select Size";
    
    $re_text_color = 'orangered';
    $re_text_font = "Select Font";
    $re_text_name = "";
    $re_text_size = "Select Size";
    
    $re_bg_image = "";
    $re_bg_color = "orangered";
    $re_bg_re_color = "orangered";

    $re_ques_size = "Select Size";
    $re_ques_font = "Select Font";
    $re_ques_color = "orangered";
    
    $re_ans_size = "Select Size";
    $re_ans_font = "Select Font";
    $re_ans_color = "orangered";
    
    $re_btn_color = "";
    $re_btn_size = "Select Size";
    $re_btn_text_color = "orangered";
    
    $re_checkbox_color = "orangered";
    
    $re_radio_color = "orangered";
    
    $re_footer_image = "";
    
    $re_footer_text_name = "";
    $re_footer_text_size = "Select Size";
    $re_footer_text_font = "Select Font";
    $re_footer_text_color = "orangered";

    
    if(isset($_POST['saveandnext'])) {
        /** Questionnaire header **/
        //$setting_id[] = 4;
        // Header image
        $header_image = $_FILES['header_image'];
        
        // Header title
        $header_title_name = $_POST['title_name'];
        $header_title_size = $_POST['title_size'];
        $header_title_font = $_POST['title_font'];
        $header_title_color = $_POST['title_color'];
        
        // Header text
        $header_text_name = $_POST['text_name'];
        $header_text_size = $_POST['text_size'];
        $header_text_font = $_POST['text_font'];
        $header_text_color = $_POST['text_color'];
        
        
        /** Questionnaire appearance **/
        //$setting_id[] = 5;
        //Background image
        $bg_image = $_FILES['appearance_image'];
        $bg_image_color = $_POST['appearance_image_overlay'];
        $bg_image_opacity = $_POST['appearance_opacity'];
        
        //Background color
        $bg_color = $_POST['appearance_color'];
        
        //Question text
        $ques_text_size = $_POST['ques_text_size'];
        $ques_text_font = $_POST['ques_font'];
        $ques_text_color = $_POST['ques_color'];
        
        //Answer text        
        $answer_text_size = $_POST['answer_size'];
        $answer_text_font = $_POST['answer_font'];
        $answer_text_color = $_POST['answer_color'];
        
        //Button
        $btn_name = $_POST['btn_text_color'];
        $btn_size = $_POST['btn_size'];        
        $btn_color = $_POST['btn_color'];
        
        //Checkbox    
        $checkbox_color = $_POST['checkbox_color'];
        
        //Radio box
        $radio_color = $_POST['radio_color'];
        
        /** Questionnaire footer **/
        //$setting_id[] = 6;
        // Footer image
        $footer_image = $_FILES['footer_image'];
               
        // Footer text
        $footer_text_name = $_POST['footer_text'];
        $footer_text_size = $_POST['footer_text_size'];
        $footer_text_font = $_POST['footer_text_font'];
        $footer_text_color = $_POST['footer_text_color'];
        
        $setting_id = array();
        $setting_id[] = 4;
        $setting_id[] = 4;
        $setting_id[] = 4;
        
        $setting_id[] = 5;
        $setting_id[] = 5;
        $setting_id[] = 5;
        $setting_id[] = 5;
        $setting_id[] = 5;
        $setting_id[] = 5;
        $setting_id[] = 5;
        
        $setting_id[] = 6;
        $setting_id[] = 6;
        
        $element_type = array();
        $element_type[] = 'Header Image';
        $element_type[] = 'Header Title';
        $element_type[] = 'Header Text';
        
        $element_type[] = 'Background Image';
        $element_type[] = 'Background color';
        $element_type[] = 'Question text';
        $element_type[] = 'Answer text';
        $element_type[] = 'Button';
        $element_type[] = 'Checkbox';
        $element_type[] = 'Radio box';
        
        $element_type[] = 'Footer Image';
        $element_type[] = 'Footer Text';
        

        $element_name = array();        
        $element_name[] = '';
        $element_name[] = $header_title_name;
        $element_name[] = $header_text_name;
        $element_name[] = '';
        $element_name[] = '';
        $element_name[] = '';
        $element_name[] = '';
        $element_name[] = $btn_name;
        $element_name[] = '';
        $element_name[] = '';
        $element_name[] = '';
        $element_name[] = $footer_text_name;

        $element_size = array();
        $element_size[] = '';
        $element_size[] = $header_title_size;
        $element_size[] = $header_text_size;
        $element_size[] = '';
        $element_size[] = '';
        $element_size[] = $ques_text_size;
        $element_size[] = $answer_text_size;
        $element_size[] = $btn_size;
        $element_size[] = '';
        $element_size[] = '';
        $element_size[] = '';
        $element_size[] = $footer_text_size;

        $element_font = array();
        $element_font[] = '';
        $element_font[] = $header_title_font;
        $element_font[] = $header_text_font;
        $element_font[] = '';
        $element_font[] = '';
        $element_font[] = $ques_text_font;
        $element_font[] = $answer_text_font;
        $element_font[] = '';
        $element_font[] = '';
        $element_font[] = '';
        $element_font[] = '';
        $element_font[] = $footer_text_font;

        $element_color = array();
        $element_color[] = '';
        $element_color[] = $header_title_color;
        $element_color[] = $header_text_color;
        $element_color[] = $bg_image_color;
        $element_color[] = $bg_color;
        $element_color[] = $ques_text_color;
        $element_color[] = $answer_text_color;
        $element_color[] = $btn_color;
        $element_color[] = $checkbox_color;
        $element_color[] = $radio_color;
        $element_color[] = '';
        $element_color[] = $footer_text_color;

        $element_attachment = array();
        $element_attachment[] = $header_image;
        $element_attachment[] = '';
        $element_attachment[] = '';
        $element_attachment[] = $bg_image;
        $element_attachment[] = '';
        $element_attachment[] = '';
        $element_attachment[] = '';
        $element_attachment[] = '';
        $element_attachment[] = '';
        $element_attachment[] = '';
        $element_attachment[] = $footer_image;
        $element_attachment[] = '';

        $active = array();
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
        $active[] = '1';
        $active[] = '1';


        $count = count($element_type);
        $access_token = $_SESSION['access_token'];  
        $questObj->deleteQnsrSettings($ques_id, array(4,5,6));
        for($i=0;$i<$count;$i++) {
            if($element_attachment[$i] != '') {
                $file_name = $questObj->uploadFile($element_attachment[$i], $access_token);
            } else {
                $file_name = '';
            }
            $questObj->insertQuesElement($ques_id, $setting_id[$i], $element_type[$i], $element_name[$i], $element_color[$i], $element_size[$i], $element_font[$i], $file_name, $active[$i]);
        }
        echo "<script>location.href = 'thankyou_page.php?ques_id=$ques_id';</script>";
    } else {
        $quest_app_arr = $questObj->getQuesSettingElement($ques_id, array(4,5,6));
        foreach($quest_app_arr as $quest_app) {
            if($quest_app['setting_id'] == "4") {
                if($quest_app['element_type'] == "Header Image") {
                    $re_header_image = ($quest_app['element_attachment'] == "")?"":"images/".$quest_app['element_attachment'];
                } else if($quest_app['element_type'] == "Header Title") {
                    $re_title_name = $quest_app['element_name'];
                    $re_title_size = $quest_app['element_size'];
                    $re_title_font = $quest_app['element_font'];
                    $re_title_color = $quest_app['element_color'];
                } else if($quest_app['element_type'] == "Header Text") {
                    $re_text_name = $quest_app['element_name'];
                    $re_text_size = $quest_app['element_size'];
                    $re_text_font = $quest_app['element_font'];
                    $re_text_color = $quest_app['element_color'];
                }
            } else if($quest_app['setting_id'] == "5") {
                if($quest_app['element_type'] == "Background Image") {
                    $re_bg_image = ($quest_app['element_attachment'] == "")?"":"images/".$quest_app['element_attachment'];
                    $re_bg_color = $quest_app['element_color'];
                } else if($quest_app['element_type'] == "Background color") {
                    $re_bg_re_color = $quest_app['element_color'];
                } else if($quest_app['element_type'] == "Question text") {
                    $re_ques_size = $quest_app['element_size'];
                    $re_ques_font = $quest_app['element_font'];
                    $re_ques_color = $quest_app['element_color'];
                } else if($quest_app['element_type'] == "Answer text") {                    
                    $re_ans_size = $quest_app['element_size'];
                    $re_ans_font = $quest_app['element_font'];
                    $re_ans_color = $quest_app['element_color'];
                } else if($quest_app['element_type'] == "Button") {
                    $re_btn_color = $quest_app['element_name'];
                    $re_btn_size = $quest_app['element_size'];                    
                    $re_btn_text_color = $quest_app['element_color'];
                } else if($quest_app['element_type'] == "Checkbox") {                   
                    $re_checkbox_color = $quest_app['element_color'];
                } else if($quest_app['element_type'] == "Radio box") {
                    $re_radio_color = $quest_app['element_color'];
                }
            } else if($quest_app['setting_id'] == "6") {
                 if($quest_app['element_type'] == "Footer Image") {
                    $re_footer_image = ($quest_app['element_attachment'] == "")?"":"images/".$quest_app['element_attachment'];
                } else if($quest_app['element_type'] == "Footer Text") {
                    $re_footer_text_name = $quest_app['element_name'];
                    $re_footer_text_size = $quest_app['element_size'];
                    $re_footer_text_font = $quest_app['element_font'];
                    $re_footer_text_color = $quest_app['element_color'];
                }
            }
        }
    }
}
$font_array = ["Helvetica-Oblique",
                    "Helvetica-Light",
                    "Helvetica-Bold",
                    "Helvetica",
                    "Helvetica-BoldOblique",
                    "Helvetica-LightOblique"]; 
?>
<script>
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $(input).closest("div").find('#dispimg').attr('src', e.target.result);
            $(input).closest("div").find('#dispimg').show();
        };

        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function(){
	$(".bb_ques").click(function(event){
            event.preventDefault();
		$(this).closest("div").find(".browewin").click();	
	});
        
        $("#header_image").change(function() {
            readURL(this);
        });
        
        $("#appearance_image").change(function() {
            readURL(this);
        });

        $("#footer_image").change(function() {
            readURL(this);
        });
    
});

function outputUpdate(vol) {

document.querySelector('#volume').value = vol;

}

</script>
<form action="#" method="post" enctype="multipart/form-data" >
<div class="sec_create">
  <h2 class="sec_head_ques"> Create a Questionnaire</h2>
</div>
<section>
  <div class="wrapper">

    <div class="container ww">
      <h2 class="sec_head_ques1">Questionnaire Header</h2>
      <div class="sec_ques_div">
        <label class="sec_head_ques1 fleft">Header image </label>
        <label class="sec_head_ques1 fright">(crop to fit 0*0 area)</label>
      </div>
      <div class="sec_ques_div">
        <button class="bb_ques fleft">Browse..</button>
        <input type="file" name="header_image" id="header_image" class="browewin" style="display:none;"/>
        <img id="dispimg" alt="Header Image" style="max-width: 200px; margin-top: 10px;"/>
      </div>
      <div class="outer_title1">
        <div class="inner_title1 fleft">
          <label>Title</label>
          <br>
          <input type="text" name="title_name" class="title_text" value="<?php echo $re_title_name ?>">
        </div>
        <div class="inner_title1 fleft ">
          <label>Title Size</label>
          <br>
		  <div class="wrapper-demo">

                                        <div id="dd" class="wrapper-dropdown-3" tabindex="1"> <span id="title_size"><?php echo $re_title_size; ?></span>
                                            <input type="hidden" name="title_size_hidden" id="title_size_hidden" />
                                            <ul class="dropdown">
                                                <?php for ($size = 13; $size <= 20; $size++) { ?>
                                                    <li><a href="#"><?php echo $size; ?></a></li>
                                                <?php } ?>                

                                            </ul>

                                        </div>

                                        ​</div>
        </div>
        <div class="inner_title1 fleft">
          <label>Title Font</label>
          <br>
		   <div class="wrapper-demo">

                                        <div id="dd1" class="wrapper-dropdown-3" tabindex="1"> <span id="title_font"><?php echo $re_title_font; ?></span>
                                            <input type="hidden" name="title_font_hidden" id="title_font_hidden" />
                                            <ul class="dropdown">
                                                <?php
                                                foreach ($font_array as $font) {
                                                    ?>
                                                    <li><a href="#"><?php echo $font; ?></a></li>
                                                    <?php
                                                }
                                                ?>

                                            </ul>

                                        </div>

                                        ​</div>

        </div>
        <div class="inner_title3 fleft">
          <label>Title Color</label>
          <br>
          <div class='example'>
            <input type='text' id='27' name="title_color" value="<?php echo $re_title_color ?>" />
          </div>
        </div>
      </div>
      <div class="clear"> </div>
      <div class="outer_title1">
        <div class="inner_title1 fleft">
          <label>Text</label>
          <br>
          <textarea class="txt_area" rows="5" cols="25" name="text_name" ><?php echo $re_text_name ?></textarea>
        </div>
        <div class="inner_title1 fleft ">
          <label>Text Size</label>
          <br>
		  
		  <div class="wrapper-demo">

                                        <div id="dd2" class="wrapper-dropdown-3" tabindex="1"> <span id="title_size"><?php echo $re_text_size; ?></span>
                                            <input type="hidden" name="text_size_hidden" id="text_size_hidden" />
                                            <ul class="dropdown">
                                                <?php for ($size = 13; $size <= 20; $size++) { ?>
                                                    <li><a href="#"><?php echo $size; ?></a></li>
                                                <?php } ?>                

                                            </ul>

                                        </div>

                                        ​</div>
        </div>
        <div class="inner_title1 fleft">
          <label>Text Font</label>
          <br>
		  
		   <div class="wrapper-demo">

                                        <div id="dd3" class="wrapper-dropdown-3" tabindex="1"> <span id="title_font"><?php echo $re_text_font; ?></span>
                                            <input type="hidden" name="text_font_hidden" id="text_font_hidden" />
                                            <ul class="dropdown">
                                                <?php
                                                foreach ($font_array as $font) {
                                                    ?>
                                                    <li><a href="#"><?php echo $font; ?></a></li>
                                                    <?php
                                                }
                                                ?>

                                            </ul>

                                        </div>

                                        ​</div>

        </div>
        <div class="inner_title3 fleft">
          <label>Text Color</label>
          <br>
          <div class='example'>
            <input type='text' name="text_color"  id='28' value="<?php echo $re_text_color ?>" />
          </div>
        </div>
      </div>
      <div class="clear"> </div>
      <div class="blank_div"> </div>
    </div>
  
    <!--container closed--> 
  </div>
  <!--wrapper closed--> 
</section>
<section>
  <div class="wrapper">
    <div class="container ww">
      <h2 class="sec_head_ques1">Questionnaire Appearance</h2>
      <div class="outer_title1">
        <div class="inner_title3 inner_title_ttl hh fleft">
          <label class="sec_head_ques1 "> Background-image </label>
          <div class="sec_ques_div">
            <button class="bb_ques fleft browse_bb">Browse..</button>
            <input type="file" name="appearance_image" id="appearance_image" class="browewin" style="display:none;"/>
            <img id="dispimg" alt="Header Image" style="max-width: 200px; margin-top: 10px;"/>
          </div>
        </div>
        <div class="inner_title3 inner_title_ttl hh fleft ">
          <label>Background image color overlay</label>
          <br>
          <div class='example'>
            <input type='text' name='appearance_image_overlay' id='29' value="<?php echo $re_bg_color; ?>" />
          </div>
        </div>
        <div class="inner_title3 inner_title_ttl hh fleft">
          <label>Opacity</label>
          <br>
          <input type=range name="appearance_opacity" class="range" min=0 max=100 value=50 id=fader step=1 oninput="outputUpdate(value)">
          <output for=fader id=volume>100%</output>
        </div>
      </div>
      <!--outer_title1 closed-->
      <div class="inner_title2 inner_title_ttl  fleft">
        <label>Background color</label>
        <br>
        <div class='example'>

                                    <input type='text' name='bgcolor' id='30' value='<?php echo $re_bg_color; ?>' />



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
      <h3>Question-Text</h3>
      <div class="outer_sec3">
        <div class="inner_title1 inner_title_ttl hh fleft ">
          <label>Size</label>
          <br>
		  <div class="wrapper-demo">

                                        <div id="dd4" class="wrapper-dropdown-3" tabindex="1"> <span id="title_size"><?php echo $re_ques_size; ?></span>
                                            <input type="hidden" name="ques_size_hidden" id="ques_size_hidden" />
                                            <ul class="dropdown">
                                                <?php for ($size = 13; $size <= 20; $size++) { ?>
                                                    <li><a href="#"><?php echo $size; ?></a></li>
                                                <?php } ?>                

                                            </ul>

                                        </div>

                                        ​</div>
        </div>
        <div class="inner_title1 inner_title_ttl hh fleft">
          <label> Font</label>
          <br>
		  
		   <div class="wrapper-demo">

                                        <div id="dd5" class="wrapper-dropdown-3" tabindex="1"> <span id="title_font"><?php echo $re_ques_font; ?></span>
                                            <input type="hidden" name="ques_font_hidden" id="ques_font_hidden" />
                                            <ul class="dropdown">
                                                <?php
                                                foreach ($font_array as $font) {
                                                    ?>
                                                    <li><a href="#"><?php echo $font; ?></a></li>
                                                    <?php
                                                }
                                                ?>

                                            </ul>

                                        </div>

                                        ​</div>

        </div>
        <div class="inner_title3 inner_title_ttl fleft">
          <label> Color</label>
          <br>
          <div class='example'>
            <input type='text' name="ques_color" id='31' value="<?php echo $re_ques_color?>" />
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
    <div class="outer_sec4">
      <h3>Answer-Text</h3>
      <div class="inn_sec4 fleft inner_title_ttl">
        <label>Box Background color</label>
        <br>
        <div class='example'>
          <input type='text' name='box_bg_color' id='32' value="<?php echo $re_ans_color?>" />
        </div>
      </div>
      <div class="inn_sec4 fleft inner_title_ttl">
        <label>Size</label>
        <br>
		
		<div class="wrapper-demo">

                                        <div id="dd6" class="wrapper-dropdown-3" tabindex="1"> <span id="title_size"><?php echo $re_ans_size; ?></span>
                                            <input type="hidden" name="ans_size_hidden" id="ans_size_hidden" />
                                            <ul class="dropdown">
                                                <?php for ($size = 13; $size <= 20; $size++) { ?>
                                                    <li><a href="#"><?php echo $size; ?></a></li>
                                                <?php } ?>                

                                            </ul>

                                        </div>

                                        ​</div>
        <!--input type="number" name="answer_size" class="title_size title_text" value="<?php echo $re_ans_size?>"-->
      </div>
      <div class="inn_sec4 fleft inner_title_ttl">
        <label>Font</label>
        <br>
		
		 <div class="wrapper-demo">

                                        <div id="dd7" class="wrapper-dropdown-3" tabindex="1"> <span id="title_font"><?php echo $re_ans_font; ?></span>
                                            <input type="hidden" name="ans_font_hidden" id="ans_font_hidden" />
                                            <ul class="dropdown">
                                                <?php
                                                foreach ($font_array as $font) {
                                                    ?>
                                                    <li><a href="#"><?php echo $font; ?></a></li>
                                                    <?php
                                                }
                                                ?>

                                            </ul>

                                        </div>

                                        ​</div>

      </div>
      <div class="inn_sec4 fleft inner_title_ttl txt_col">
        <label>Color</label>
        <br>
        <div class='example'>
          <input type='text' name="answer_color" id='33' value='orangered' />
        </div>
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
        <h3>Elements</h3>
        <div class="inn_sec5 fleft inner_title_ttl">
          <label>Button Color</label>
          <br>
          <div class='example'>

                                    <input type='text' name='bgcolor' id='34' value='<?php echo $re_bg_color; ?>' />



                                </div>
        </div>
        <div class="inn_sec5 hh fleft inner_title_ttl">
          <label>Button Size</label>
          <br>
		  <div class="wrapper-demo">

                                        <div id="dd8" class="wrapper-dropdown-3" tabindex="1"> <span id="title_size"><?php echo $re_btn_size; ?></span>
                                            <input type="hidden" name="btn_size_hidden" id="btn_size_hidden" />
                                            <ul class="dropdown">
                                                <?php for ($size = 13; $size <= 20; $size++) { ?>
                                                    <li><a href="#"><?php echo $size; ?></a></li>
                                                <?php } ?>                

                                            </ul>

                                        </div>

                                        ​</div>
        </div>
        <div class="inn_sec5 fleft inner_title_ttl txt_col">
          <label>Button Text Color</label>
          <br>
          <div class='example'>
            <input type='text' name='btn_text_color' id='35' value="<?php echo $re_btn_text_color?>" />
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
      <div class="outer_sec6">
        <div class="inn_sec6 fleft inner_title_ttl">
          <label>Check Box Color</label>
          <br>
          <div class='example'>
            <input type='text' name='checkbox_color' id='36' value="<?php echo $re_checkbox_color?>" />
          </div>
        </div>
        <div class="inn_sec6 fleft inner_title_ttl txt_col">
          <label>Radio Button Color</label>
          <br>
          <div class='example'>
            <input type='text' name='radio_color' id='37' value="<?php echo $re_radio_color?>" />
          </div>
        </div>
      </div>
      <div class="clear"> </div>
      <div class="blank_div"> </div>
    </div>
    <!--container closed--> 
  </div>
  <!--wrapper closed--> 
</section>
<section>
  <div class="wrapper">
    <div class="container ww">
      <h2 class="sec_head_ques1">Questionnaire Footer</h2>
      <div class="sec_ques_div">
        <label class="sec_head_ques1 fleft">Footer image</label>
        <label class="sec_head_ques1 fright">(crop to fit 0*0 area)</label>
      </div>
      <div class="sec_ques_div">
        <button class="bb_ques fleft">Browse..</button>
        <input type="file" name="footer_image" id="footer_image" class="browewin" style="display:none;"/>
        <img id="dispimg" alt="Header Image" style="max-width: 200px; margin-top: 10px;"/>
      </div>
      <div class="outer_title1">
        <div class="inner_title1 fleft">
          <label>Text</label>
          <br>
          <textarea name="footer_text" rows="5" cols="25" class="textarea_mm"><?php echo $re_footer_text_name?></textarea>
        </div>
        <div class="inner_title1 fleft ">
          <label>Text Size</label>
          <br>
		  <div class="wrapper-demo">

                                        <div id="dd9" class="wrapper-dropdown-3" tabindex="1"> <span id="title_size"><?php echo $re_footer_text_size; ?></span>
                                            <input type="hidden" name="footer_text_size_hidden" id="footer_text_size_hidden" />
                                            <ul class="dropdown">
                                                <?php for ($size = 13; $size <= 20; $size++) { ?>
                                                    <li><a href="#"><?php echo $size; ?></a></li>
                                                <?php } ?>                

                                            </ul>

                                        </div>

                                        ​</div>
        </div>
        <div class="inner_title1 fleft">
          <label>Text Font</label>
          <br>
		   <div class="wrapper-demo">

                                        <div id="dd10" class="wrapper-dropdown-3" tabindex="1"> <span id="title_font"><?php echo $re_footer_text_font; ?></span>
                                            <input type="hidden" name="footer_text_font_hidden" id="footer_text_font_hidden" />
                                            <ul class="dropdown">
                                                <?php
                                                foreach ($font_array as $font) {
                                                    ?>
                                                    <li><a href="#"><?php echo $font; ?></a></li>
                                                    <?php
                                                }
                                                ?>

                                            </ul>

                                        </div>

                                        ​</div>
         
        </div>
        <div class="inner_title3 fleft txt_col">
          <label>Text Color</label>
          <br>
          <div class='example'>
            <input type='text' name='footer_text_color' id='38' value="<?php echo $re_footer_text_color?>" />
          </div>
        </div>
      </div>
      <div class="clear"> </div>
      <div class="lastouter_sec">
          <button class="butt_view bb_sec6" name="saveandnext"> Save&Next </button>
        <button class="butt_view bb_sec6"> Save&Exit </button>
        <button class="butt_view bb_sec6 bb_bg"> Cancel </button>
      </div>
    </div>
  </div>
  <!--container closed-->
  </div>
  <!--wrapper closed--> 
</section>
</form>
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
				initEvents : function() {
					var obj = this;

					obj.dd5.on('click', function(event){
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

				var dd5 = new DropDown( $('#dd5') );

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
				initEvents : function() {
					var obj = this;

					obj.dd6.on('click', function(event){
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

				var dd6 = new DropDown( $('#dd6') );

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
 <!--     <script type="text/javascript" src="jquery/jquery-1.9.1.js"></script>-->

<script type="text/javascript" src="jquery/spectrum.js"></script>

<script type='text/javascript' src="jquery/docs.js"></script>
</body>
</html>