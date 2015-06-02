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
        for($i=0;$i<$count;$i++) {
            if($element_attachment[$i] != '') {
                $file_name = $questObj->uploadFile($element_attachment[$i], $access_token);
            } else {
                $file_name = '';
            }
            $insertElementBool = $questObj->checkQuesSettingElement($ques_id, $setting_id[$i]);
            if($insertElementBool) {
                $questObj->insertQuesElement($ques_id, $setting_id[$i], $element_type[$i], $element_name[$i], $element_color[$i], $element_size[$i], $element_font[$i], $file_name, $active[$i]);
            } else {
                $questObj->updateQuesElement($ques_id, $setting_id[$i], $element_type[$i], $element_name[$i], $element_color[$i], $element_size[$i], $element_font[$i], $file_name, $active[$i]);
            }
        }        
    }
}

?>
<script type="text/javascript" src="jquery/spectrum.js"></script>
<script type='text/javascript' src="jquery/docs.js"></script>
<script>
$(document).ready(function(){
	$(".bb_ques").click(function(event){
            event.preventDefault();
		$(this).closest("div").find(".browewin").click();	
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
        <label class="sec_head_ques1 fleft">Header image/video </label>
        <label class="sec_head_ques1 fright">(crop to fit 0*0 area)</label>
      </div>
      <div class="sec_ques_div">
        <input type="text" class="fleft" >
        <button class="bb_ques fleft">Browse..</button>
        <input type="file" name="header_image" class="browewin" style="display:none;"/>
      </div>
      <div class="outer_title1">
        <div class="inner_title1 fleft">
          <label>Title</label>
          <br>
          <input type="text" name="title_name" class="title_text">
        </div>
        <div class="inner_title1 fleft ">
          <label>Title Size</label>
          <br>
          <input type="number" name="title_size" class="title_size title_text">
        </div>
        <div class="inner_title1 fleft">
          <label>Title Font</label>
          <br>
          <input type="text" name="title_font" class="title_text">
        </div>
        <div class="inner_title1 fleft">
          <label>Title Color</label>
          <br>
          <div class='example'>
            <input type='text' name="title_color" id='1' value='orangered' />
          </div>
        </div>
      </div>
      <div class="clear"> </div>
      <div class="outer_title1">
        <div class="inner_title1 fleft">
          <label>Text</label>
          <br>
          <textarea rows="5" cols="25" name="text_name"></textarea>
        </div>
        <div class="inner_title1 fleft ">
          <label>Text Size</label>
          <br>
          <input type="number" name="text_size" class="title_size title_text">
        </div>
        <div class="inner_title1 fleft">
          <label>Text Font</label>
          <br>
          <input type="text" name="text_font" class="title_text">
        </div>
        <div class="inner_title1 fleft">
          <label>Text Color</label>
          <br>
          <div class='example'>
            <input type='text' name="text_color"  id='2' value='orangered' />
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
            <input type="text" class="fleft" >
            <button class="bb_ques fleft">Browse..</button>
            <input type="file" name="appearance_image" class="browewin" style="display:none;"/>
          </div>
        </div>
        <div class="inner_title3 inner_title_ttl hh fleft ">
          <label>Background image color overlay</label>
          <br>
          <div class='example'>
            <input type='text' name='appearance_image_overlay' id='3' value='orangered' />
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
          <input type='text' name='appearance_color' id='4' value='orangered' />
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
          <input type="number" name="ques_text_size" class="title_size title_text">
        </div>
        <div class="inner_title1 inner_title_ttl hh fleft">
          <label> Font</label>
          <br>
          <input type="text" name="ques_font" class="title_text">
        </div>
        <div class="inner_title1 inner_title_ttl fleft">
          <label> Color</label>
          <br>
          <div class='example'>
            <input type='text' name="ques_color" id='5' value='orangered' />
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
          <input type='text' name='box_bg_color' id='6' value='orangered' />
        </div>
      </div>
      <div class="inn_sec4 fleft inner_title_ttl">
        <label>Size</label>
        <br>
        <input type="number" name="answer_size" class="title_size title_text">
      </div>
      <div class="inn_sec4 fleft inner_title_ttl">
        <label>Font</label>
        <br>
        <input type="number" name="answer_font" class="title_size_font title_text">
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
            <input type='text' name='btn_color' id='8' value='orangered' />
          </div>
        </div>
        <div class="inn_sec5 hh fleft inner_title_ttl">
          <label>Button Size</label>
          <br>
          <input type="number" name="btn_size" class="title_size title_text">
        </div>
        <div class="inn_sec5 fleft inner_title_ttl">
          <label>Button TextColor</label>
          <br>
          <div class='example'>
            <input type='text' name='btn_text_color' id='9' value='orangered' />
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
            <input type='text' name='checkbox_color' id='10' value='orangered' />
          </div>
        </div>
        <div class="inn_sec6 fleft inner_title_ttl">
          <label>Radio Button Color</label>
          <br>
          <div class='example'>
            <input type='text' name='radio_color' id='11' value='orangered' />
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
        <label class="sec_head_ques1 fleft">Header image/video </label>
        <label class="sec_head_ques1 fright">(crop to fit 0*0 area)</label>
      </div>
      <div class="sec_ques_div">
        <input type="text" class="fleft" >
        <button class="bb_ques fleft">Browse..</button>
        <input type="file" name="footer_image" class="browewin" style="display:none;"/>
      </div>
      <div class="outer_title1">
        <div class="inner_title1 fleft">
          <label>Text</label>
          <br>
          <textarea name="footer_text" rows="5" cols="25"></textarea>
        </div>
        <div class="inner_title1 fleft ">
          <label>Text Size</label>
          <br>
          <input type="number" name="footer_text_size" class="title_size title_text">
        </div>
        <div class="inner_title1 fleft">
          <label>Text Font</label>
          <br>
          <input type="text" name="footer_text_font" class="title_text">
        </div>
        <div class="inner_title1 fleft">
          <label>Text Color</label>
          <br>
          <div class='example'>
            <input type='text' name='footer_text_color' id='12' value='orangered' />
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