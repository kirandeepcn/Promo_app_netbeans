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
    $re_title_font = "";
    $re_title_name = "";
    $re_title_size = "";
    
    $re_text_color = 'orangered';
    $re_text_font = "";
    $re_text_name = "";
    $re_text_size = "";
    
    $re_bg_image = "";
    $re_bg_color = "orangered";
    $re_bg_re_color = "orangered";

    $re_ques_size = "";
    $re_ques_font = "";
    $re_ques_color = "orangered";
    
    $re_ans_size = "";
    $re_ans_font = "";
    $re_ans_color = "orangered";
    
    $re_btn_color = "";
    $re_btn_size = "";
    $re_btn_text_color = "orangered";
    
    $re_checkbox_color = "orangered";
    
    $re_radio_color = "orangered";
    
    $re_footer_image = "";
    
    $re_footer_text_name = "";
    $re_footer_text_size = "";
    $re_footer_text_font = "";
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

?>
<script type="text/javascript" src="jquery/spectrum.js"></script>
<script type='text/javascript' src="jquery/docs.js"></script>
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
          <input type="number" name="title_size" value="<?php echo $re_title_size ?>" class="title_size title_text">
        </div>
        <div class="inner_title1 fleft">
          <label>Title Font</label>
          <br>
          <input type="text" name="title_font" class="title_text" value="<?php echo $re_title_font ?>">
        </div>
        <div class="inner_title1 fleft">
          <label>Title Color</label>
          <br>
          <div class='example'>
            <input type='text' name="title_color" id='1' value="<?php echo $re_title_color ?>" />
          </div>
        </div>
      </div>
      <div class="clear"> </div>
      <div class="outer_title1">
        <div class="inner_title1 fleft">
          <label>Text</label>
          <br>
          <textarea rows="5" cols="25" name="text_name" ><?php echo $re_text_name ?></textarea>
        </div>
        <div class="inner_title1 fleft ">
          <label>Text Size</label>
          <br>
          <input type="number" name="text_size" value="<?php echo $re_text_size ?>" class="title_size title_text">
        </div>
        <div class="inner_title1 fleft">
          <label>Text Font</label>
          <br>
          <input type="text" name="text_font" class="title_text" value="<?php echo $re_text_font ?>">
        </div>
        <div class="inner_title1 fleft">
          <label>Text Color</label>
          <br>
          <div class='example'>
            <input type='text' name="text_color"  id='2' value="<?php echo $re_text_color ?>" />
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
            <button class="bb_ques fleft">Browse..</button>
            <input type="file" name="appearance_image" id="appearance_image" class="browewin" style="display:none;"/>
          </div>
        </div>
        <div class="inner_title3 inner_title_ttl hh fleft ">
          <label>Background image color overlay</label>
          <br>
          <div class='example'>
            <input type='text' name='appearance_image_overlay' id='3' value="<?php echo $re_bg_color; ?>" />
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
        <div class='example1'>
          <input type='text' name='appearance_color' id='4' value="<?php echo $re_bg_re_color?>" />
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
          <input type="number" name="ques_text_size" class="title_size title_text" value="<?php echo $re_ques_size?>">
        </div>
        <div class="inner_title1 inner_title_ttl hh fleft">
          <label> Font</label>
          <br>
          <input type="text" name="ques_font" class="title_text" value="<?php echo $re_ques_font?>">
        </div>
        <div class="inner_title1 inner_title_ttl fleft">
          <label> Color</label>
          <br>
          <div class='example'>
            <input type='text' name="ques_color" id='5' value="<?php echo $re_ques_color?>" />
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
          <input type='text' name='box_bg_color' id='6' value="<?php echo $re_ans_color?>" />
        </div>
      </div>
      <div class="inn_sec4 fleft inner_title_ttl">
        <label>Size</label>
        <br>
        <input type="number" name="answer_size" class="title_size title_text" value="<?php echo $re_ans_size?>">
      </div>
      <div class="inn_sec4 fleft inner_title_ttl">
        <label>Font</label>
        <br>
        <input type="text" name="answer_font" class="title_size_font title_text" value="<?php echo $re_ans_font?>">
      </div>
      <div class="inn_sec4 fleft inner_title_ttl">
        <label>Color</label>
        <br>
        <div class='example'>
          <input type='text' name="answer_color" id='7' value='orangered' />
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
            <input type='text' name='btn_color' id='8' value="<?php echo $re_btn_color?>"  />
          </div>
        </div>
        <div class="inn_sec5 hh fleft inner_title_ttl">
          <label>Button Size</label>
          <br>
          <input type="number" name="btn_size" class="title_size title_text" value="<?php echo $re_btn_size?>">
        </div>
        <div class="inn_sec5 fleft inner_title_ttl">
          <label>Button Text Color</label>
          <br>
          <div class='example'>
            <input type='text' name='btn_text_color' id='9' value="<?php echo $re_btn_text_color?>" />
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
            <input type='text' name='checkbox_color' id='10' value="<?php echo $re_checkbox_color?>" />
          </div>
        </div>
        <div class="inn_sec6 fleft inner_title_ttl">
          <label>Radio Button Color</label>
          <br>
          <div class='example'>
            <input type='text' name='radio_color' id='11' value="<?php echo $re_radio_color?>" />
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
      </div>
      <div class="outer_title1">
        <div class="inner_title1 fleft">
          <label>Text</label>
          <br>
          <textarea name="footer_text" rows="5" cols="25"><?php echo $re_footer_text_name?></textarea>
        </div>
        <div class="inner_title1 fleft ">
          <label>Text Size</label>
          <br>
          <input type="number" name="footer_text_size" class="title_size title_text" value="<?php echo $re_footer_text_size?>">
        </div>
        <div class="inner_title1 fleft">
          <label>Text Font</label>
          <br>
          <input type="text" name="footer_text_font" class="title_text" value="<?php echo $re_footer_text_font?>">
        </div>
        <div class="inner_title1 fleft">
          <label>Text Color</label>
          <br>
          <div class='example'>
            <input type='text' name='footer_text_color' id='12' value="<?php echo $re_footer_text_color?>" />
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
</body>
</html>