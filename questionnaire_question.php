<?php 
session_start();
include_once 'check_session.php';
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
    $first_name = '
            <div class="inner_drag">
          <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
              <label class="label_ff" id="ques_title">First Name</label>
          </div>
          <div class="inner_title1  inner_drag_hh fleft">
            <input type="text" class="title_text title_text2">
          </div>
          <div class="inner_title1 inner_drag_hh fleft">
              <input type="checkbox" name="ques_check">
            <span>Required </span> </div>
          <div class="clear"> </div>
        </div>';
    
    $last_name = '
            <div class="inner_drag">
            <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
              <label class="label_ff" id="ques_title">Last Name</label>
            </div>
            <div class="inner_title1 inner_drag_hh fleft">
              <input type="text" class="title_text title_text2">
            </div>
            <div class="inner_title1 inner_drag_hh fleft">
              <input type="checkbox"  name="ques_check">
              <span>Required </span> </div>
            <div class="clear"> </div>
          </div>';
    
   $title = '<div class="inner_drag">
          <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
            <label class="label_ff" id="ques_title">Title</label>
          </div>
          <div class="inner_title1 inner_drag_hh fleft">
            <select class="date_ff title_text"><option>Mr.</option><option>Ms.</option><option>Mrs</option></select>
          </div>
          <div class="inner_title1  inner_drag_hh fleft">
            <input type="checkbox" name="ques_check">
            <span>Required </span>
            <div class="onoffswitch1 fright">
              <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab5" checked>
              <label class="onoffswitch-label" for="tab5"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
              <div class="font_bb fright"> Show </div>
            </div>
          </div>
          <div class="clear"> </div>
        </div>';
                
        
     $email = '<div class="inner_drag">
          <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
            <label  class="label_ff" id="ques_title">Email</label>
          </div>
          <div class="inner_title1 inner_drag_hh fleft">
            <input type="text" class="title_text title_text2">
          </div>
          <div class="inner_title1  inner_drag_hh fleft">
            <input type="checkbox"  name="ques_check">
            <span>Required </span>
            <div class="onoffswitch1 fright">
              <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab6" checked>
              <label class="onoffswitch-label" for="tab6"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
              <div class="font_bb fright"> Show </div>
            </div>
          </div>
          <div class="clear"> </div>
        </div>';
                
        $telephone = '<div class="inner_drag">
          <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
            <label  class="label_ff" id="ques_title">Telephone</label>
          </div>
          <div class="inner_title1 inner_drag_hh fleft">
              <input type="text" placeholder="Mobile" id="tele_val" value="Mobile" class="title_text title_text2">
          </div>
          <div class="inner_title1  inner_drag_hh fleft">
            <input type="checkbox"  name="ques_check">
            <span>Required </span>
            <div class="onoffswitch1 fright">
              <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab7" checked>
              <label class="onoffswitch-label" for="tab7"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
              <div class="font_bb fright"> Show </div>
            </div>
          </div>
          <div class="clear"> </div>
          <div class="inner_title1 inner_drag_hh fleft"> </div>
          <div class="inner_title1 inner_drag_hh fleft">
              <input type="text" id="tele_val" placeholder="Home" value="Home" class="title_text title_text2">
          </div>

          <div class="inner_title1  inner_drag_hh fleft">
            <input type="checkbox"  name="ques_check">
            <span>Required </span>
            <div class="onoffswitch1 fright">
              <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab8" checked>
              <label class="onoffswitch-label" for="tab8"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
              <div class="font_bb fright"> Show </div>
            </div>
          </div>
          <div class="clear"> </div>
           <div class="inner_title1 inner_drag_hh fleft"> </div>
          <div class="inner_title1 inner_drag_hh fleft">
            <input type="text" placeholder="Work" id="tele_val" value="Work" class="title_text title_text2">
          </div>
          <div class="inner_title1  inner_drag_hh fleft">
            <input type="checkbox"  name="ques_check">
            <span>Required </span>
            <div class="onoffswitch1 fright">
              <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab9" checked>
              <label class="onoffswitch-label" for="tab9"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
              <div class="font_bb fright"> Show </div>
            </div>
          </div>
          <div class="clear"> </div>
        </div>';              
        
        
        $dob = '<div class="inner_drag">
          <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
            <label  class="label_ff" id="ques_title">Date of birth</label>
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
              <option>Date</option>';
        
              for($day = 1; $day <= 31 ; $day++ ) {              
              $days_arr[] = "<option value='$day'>$day</option>"; 
              }
              $days = join(" ", $days_arr);
              
        $dob = $dob.$days;

        $dob = $dob.'</select>
        <select name="DOBYear"  class="date_ff">
        <option> Year </option>';
              
              $current_year = date("Y"); 
              for($year = $current_year; $year < ($current_year+10) ; $year++ ) {
                $year_arr[] = "<option value='$year'>$year</option>";
              }
              $years = join(" ",$year_arr);
              
        $dob = $dob.$years;
        $dob = $dob.'</select>
        <input type="radio" name="dformat" value="DDMMYY" checked="checked">
        <span>DDMMYY</span>
        <input type="radio" name="dformat" value="MMDDYY">
        <span>MMDDYY</span> </div>
        <div class="inner_title1  inner_drag_hh fleft">
        <input type="checkbox" name="ques_check">
        <span>Required </span>
        <div class="onoffswitch1 fright">
        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab10" checked>
        <label class="onoffswitch-label" for="tab10"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
        <div class="font_bb fright"> Show </div>
        </div>
        </div>
        <div class="clear"> </div>
        </div>';
                
       $address =  '<div class="inner_drag">
          <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
            <label class="label_ff" id="ques_title">Street Address</label>
          </div>
          <div class="inner_title1 inner_drag_hh fleft">
            <input type="text" class="title_text title_text2">
          </div>
          <div class="inner_title1  inner_drag_hh fleft">
            <input type="checkbox" name="ques_check">
            <span>Required </span>
            <div class="onoffswitch1 fright">
              <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab11" checked>
              <label class="onoffswitch-label" for="tab11"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
              <div class="font_bb fright"> Show </div>
            </div>
          </div>
          <div class="clear"> </div>
        </div>';
                
        $post_code = '<div class="inner_drag">
          <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
            <label class="label_ff" id="ques_title">Post Code</label>
          </div>
          <div class="inner_title1 inner_drag_hh fleft">
            <input type="text" class="title_text title_text2">
          </div>
          <div class="inner_title1  inner_drag_hh fleft">
            <input type="checkbox" name="ques_check">
            <span>Required </span>
            <div class="onoffswitch1 fright">
              <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab12" checked>
              <label class="onoffswitch-label" for="tab12"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
              <div class="font_bb fright"> Show </div>
            </div>
          </div>
          <div class="clear"> </div>
        </div>';
                
        $country = '<div class="inner_drag">
          <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
            <label class="label_ff" id="ques_title">Country</label>
          </div>
          <div class="inner_title1 inner_drag_hh fleft">
            <select class="date_ff title_text"><option>Select Country</option></select>
          </div>
          <div class="inner_title1  inner_drag_hh fleft">
            <input type="checkbox" name="ques_check">
            <span>Required </span>
            <div class="onoffswitch1 fright">
              <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab13" checked>
              <label class="onoffswitch-label" for="tab13"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
              <div class="font_bb fright"> Show </div>
            </div>
          </div>
          <div class="clear"> </div>
        </div>';
        $button_text = "";
    
        $order_ques = array($first_name,$last_name,$title,$email,$telephone,$dob,$address,$post_code,$country);
        
    if(isset($_POST['submit_btn_text'])) {        
        $count = count($_POST['ques_type_id']);                
        $file_index = 0;
        $access_token = $_SESSION['access_token'];
        $questObj->deleteQnsrQuestions($ques_id);
        for($i=0; $i<$count; $i++)
        {
            if($_POST['ques_type_id'][$i] == "6") {
                $photo_file["name"] = $_FILES["photo_ques"]["name"][$file_index];
                $photo_file["type"] = $_FILES["photo_ques"]["type"][$file_index];
                $photo_file["tmp_name"] = $_FILES["photo_ques"]["tmp_name"][$file_index];
                $photo_file["error"] = $_FILES["photo_ques"]["error"][$file_index];
                $photo_file["size"] = $_FILES["photo_ques"]["size"][$file_index];
                $file_index++;
                $ques_attachment = $questObj->uploadFile($photo_file, $access_token);
            } else {
                $ques_attachment = "";
            }
            $questObj->insertQnsrQuestions($ques_id, $_POST['ques_type_id'][$i], $_POST['ques_title'][$i], $_POST['ques_options'][$i],$ques_attachment, $_POST['ques_required'][$i], $_POST['ques_active'][$i], $_POST['ques_order'][$i]);
        }
        $submit_btn_text = $_POST['submit_btn_text'];
        $questObj->insertQnsrQuestions($ques_id, "8", $submit_btn_text, "","", "1", "1", 999);
       // header("Location: questionnaire_appearance.php?ques_id="+$ques_id);
        echo "<script>location.href = 'questionnaire_appearance.php?ques_id=$ques_id';</script>";
        exit();
    } else {
        $temp_order = $questObj->getQuesQuestionnaire($ques_id);
        $order_ques_dyn = array();
        if(!empty($temp_order)) {
            $order_ques = array();
            foreach($temp_order as $temp) {
                if($temp['ques_title'] == "First Name") {
                    $required = ($temp['required'] == "1")?"checked":"";
                    $first_name = '
                        <div class="inner_drag">
                      <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
                          <label class="label_ff" id="ques_title">First Name</label>
                      </div>
                      <div class="inner_title1  inner_drag_hh fleft">
                        <input type="text" class="title_text title_text2">
                      </div>
                      <div class="inner_title1 inner_drag_hh fleft">
                          <input type="checkbox" name="ques_check" '.$required.'>
                        <span>Required </span> </div>
                      <div class="clear"> </div>
                    </div>';
                    $element = $first_name;
                } else if($temp['ques_title'] == "Last Name") {
                    $required = ($temp['required'] == "1")?"checked":"";
                    $last_name = '
                    <div class="inner_drag">
                    <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
                      <label class="label_ff" id="ques_title">Last Name</label>
                    </div>
                    <div class="inner_title1 inner_drag_hh fleft">
                      <input type="text" class="title_text title_text2">
                    </div>
                    <div class="inner_title1 inner_drag_hh fleft">
                      <input type="checkbox"  name="ques_check" '.$required.'>
                      <span>Required </span> </div>
                    <div class="clear"> </div>
                  </div>';
                    $element = $last_name;
                } else if($temp['ques_title'] == "Title") {
                    $required = ($temp['required'] == "1")?"checked":"";
                    $active = ($temp['active'] == "1")?"checked":"";
                    $title = '<div class="inner_drag">
                      <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
                        <label class="label_ff" id="ques_title">Title</label>
                      </div>
                      <div class="inner_title1 inner_drag_hh fleft">
                        <select class="date_ff title_text"><option>Mr.</option><option>Ms.</option><option>Mrs</option></select>
                      </div>
                      <div class="inner_title1  inner_drag_hh fleft">
                        <input type="checkbox" name="ques_check" '.$required.'>
                        <span>Required </span>
                        <div class="onoffswitch1 fright">
                          <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab5" '.$active.'>
                          <label class="onoffswitch-label" for="tab5"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
                          <div class="font_bb fright"> Show </div>
                        </div>
                      </div>
                      <div class="clear"> </div>
                    </div>';
                    $element = $title;
                } else if($temp['ques_title'] == "Email") {
                    $required = ($temp['required'] == "1")?"checked":"";
                    $active = ($temp['active'] == "1")?"checked":"";
                    $email = '<div class="inner_drag">
                    <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
                    <label  class="label_ff" id="ques_title">Email</label>
                    </div>
                    <div class="inner_title1 inner_drag_hh fleft">
                    <input type="text" class="title_text title_text2">
                    </div>
                    <div class="inner_title1  inner_drag_hh fleft">
                    <input type="checkbox"  name="ques_check" '.$required.'>
                    <span>Required </span>
                    <div class="onoffswitch1 fright">
                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab6" '.$active.'>
                    <label class="onoffswitch-label" for="tab6"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
                    <div class="font_bb fright"> Show </div>
                    </div>
                    </div>
                    <div class="clear"> </div>
                    </div>';
                    $element = $email;
                } else if($temp['ques_title'] == "Telephone") {
                    $required_arr = explode(",", $temp['required']);
                    $active_arr = explode(",", $temp['active']);

                    $mobile_req = ($required_arr[0] == "1")?"checked":"";
                    $home_req = ($required_arr[1] == "1")?"checked":"";
                    $work_req = ($required_arr[2] == "1")?"checked":"";

                    $mobile_active = ($active_arr[0] == "1")?"checked":"";
                    $home_active = ($active_arr[1] == "1")?"checked":"";
                    $work_active = ($active_arr[2] == "1")?"checked":"";

                    $telephone = '<div class="inner_drag">
                    <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
                    <label  class="label_ff" id="ques_title">Telephone</label>
                    </div>
                    <div class="inner_title1 inner_drag_hh fleft">
                    <input type="text" placeholder="Mobile" id="tele_val" value="Mobile" class="title_text title_text2">
                    </div>
                    <div class="inner_title1  inner_drag_hh fleft">
                    <input type="checkbox"  name="ques_check" '.$mobile_req.'>
                    <span>Required </span>
                    <div class="onoffswitch1 fright">
                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab7" '.$mobile_active.'>
                    <label class="onoffswitch-label" for="tab7"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
                    <div class="font_bb fright"> Show </div>
                    </div>
                    </div>
                    <div class="clear"> </div>
                    <div class="inner_title1 inner_drag_hh fleft"> </div>
                    <div class="inner_title1 inner_drag_hh fleft">
                    <input type="text" id="tele_val" placeholder="Home" value="Home" class="title_text title_text2">
                    </div>

                    <div class="inner_title1  inner_drag_hh fleft">
                    <input type="checkbox"  name="ques_check" '.$home_req.'>
                    <span>Required </span>
                    <div class="onoffswitch1 fright">
                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab8" '.$home_active.'>
                    <label class="onoffswitch-label" for="tab8"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
                    <div class="font_bb fright"> Show </div>
                    </div>
                    </div>
                    <div class="clear"> </div>
                    <div class="inner_title1 inner_drag_hh fleft"> </div>
                    <div class="inner_title1 inner_drag_hh fleft">
                    <input type="text" placeholder="Work" id="tele_val" value="Work" class="title_text title_text2">
                    </div>
                    <div class="inner_title1  inner_drag_hh fleft">
                    <input type="checkbox"  name="ques_check" '.$work_req.'>
                    <span>Required </span>
                    <div class="onoffswitch1 fright">
                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab9" '.$work_active.'>
                    <label class="onoffswitch-label" for="tab9"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
                    <div class="font_bb fright"> Show </div>
                    </div>
                    </div>
                    <div class="clear"> </div>
                    </div>';
                    $element = $telephone;
                } else if($temp['ques_title'] == "Date of birth") {
                    $dob_type1 = ($temp['ques_options'] == "DDMMYY")?"checked":"";
                    $dob_type2 = ($temp['ques_options'] == "MMDDYY")?"checked":"";
                    $required = ($temp['required'] == "1")?"checked":"";
                    $active = ($temp['active'] == "1")?"checked":"";
                    $dob = '<div class="inner_drag">
                    <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
                      <label  class="label_ff" id="ques_title">Date of birth</label>
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
                        <option>Date</option>';

                        for($day = 1; $day <= 31 ; $day++ ) {              
                        $days_arr[] = "<option value='$day'>$day</option>"; 
                        }
                        $days = join(" ", $days_arr);

                    $dob = $dob.$days;

                    $dob = $dob.'</select>
                    <select name="DOBYear"  class="date_ff">
                    <option> Year </option>';

                        $current_year = date("Y"); 
                        for($year = $current_year; $year < ($current_year+10) ; $year++ ) {
                          $year_arr[] = "<option value='$year'>$year</option>";
                        }
                        $years = join(" ",$year_arr);

                    $dob = $dob.$years;
                    $dob = $dob.'</select>
                    <input type="radio" name="dformat" value="DDMMYY" '.$dob_type1.'>
                    <span>DDMMYY</span>
                    <input type="radio" name="dformat" value="MMDDYY" '.$dob_type2.'>
                    <span>MMDDYY</span> </div>
                    <div class="inner_title1  inner_drag_hh fleft">
                    <input type="checkbox" name="ques_check" '.$required.'>
                    <span>Required </span>
                    <div class="onoffswitch1 fright">
                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab10" '.$active.'>
                    <label class="onoffswitch-label" for="tab10"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
                    <div class="font_bb fright"> Show </div>
                    </div>
                    </div>
                    <div class="clear"> </div>
                    </div>';
                    $element = $dob;
                } else if($temp['ques_title'] == "Street Address") {
                    $required = ($temp['required'] == "1")?"checked":"";
                    $active = ($temp['active'] == "1")?"checked":"";
                    $address =  '<div class="inner_drag">
                    <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
                    <label class="label_ff" id="ques_title">Street Address</label>
                    </div>
                    <div class="inner_title1 inner_drag_hh fleft">
                    <input type="text" class="title_text title_text2">
                    </div>
                    <div class="inner_title1  inner_drag_hh fleft">
                    <input type="checkbox" name="ques_check" '.$required.'>
                    <span>Required </span>
                    <div class="onoffswitch1 fright">
                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab11" '.$active.'>
                    <label class="onoffswitch-label" for="tab11"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
                    <div class="font_bb fright"> Show </div>
                    </div>
                    </div>
                    <div class="clear"> </div>
                    </div>';
                    
                    $element = $address;
                } else if($temp['ques_title'] == "Post Code") {
                    $required = ($temp['required'] == "1")?"checked":"";
                    $active = ($temp['active'] == "1")?"checked":"";
                    $post_code = '<div class="inner_drag">
                    <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
                    <label class="label_ff" id="ques_title">Post Code</label>
                    </div>
                    <div class="inner_title1 inner_drag_hh fleft">
                    <input type="text" class="title_text title_text2">
                    </div>
                    <div class="inner_title1  inner_drag_hh fleft">
                    <input type="checkbox" name="ques_check" '.$required.'>
                    <span>Required </span>
                    <div class="onoffswitch1 fright">
                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab12" '.$active.'>
                    <label class="onoffswitch-label" for="tab12"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
                    <div class="font_bb fright"> Show </div>
                    </div>
                    </div>
                    <div class="clear"> </div>
                    </div>';
                    $element = $post_code;
                } else if($temp['ques_title'] == "Country") {
                    $required = ($temp['required'] == "1")?"checked":"";
                    $active = ($temp['active'] == "1")?"checked":"";
                    $country = '<div class="inner_drag">
                    <div class="inner_title1 inner_drag_hh fleft"> <img src="images/drag.png" alt="move" width="16" height="11" class="handle" />
                    <label class="label_ff" id="ques_title">Country</label>
                    </div>
                    <div class="inner_title1 inner_drag_hh fleft">
                    <select class="date_ff title_text"><option>Select Country</option></select>
                    </div>
                    <div class="inner_title1  inner_drag_hh fleft">
                    <input type="checkbox" name="ques_check" '.$required.'>
                    <span>Required </span>
                    <div class="onoffswitch1 fright">
                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab13" '.$active.'>
                    <label class="onoffswitch-label" for="tab13"> <span class="onoffswitch-inner onoffswitch-inner1"></span> <span class="onoffswitch-switch onoffswitch-switch1"></span> </label>
                    <div class="font_bb fright"> Show </div>
                    </div>
                    </div>
                    <div class="clear"> </div>
                    </div>';
                    $element = $country;
                } else {
                    if($temp['ques_type_id'] == "1") {
                        $order_ques_dyn[] = 'btn_num++; '.
                        '$("#outer_drag1").append("<div id=\'drag_"+btn_num+"\' class=\'inner_drag\'><div class=\'inner_title2  inner_drag_hh fleft\'><img src=\'images/drag.png\' alt=\'move\' width=\'16\' height=\'11\' class=\'handle\' /><label id=\'ques_type\'>Text Line</label><input type=\'checkbox\' name=\'ques_check\'><span> Required </span> </div><div class=\'clear\'> </div><div class=\'inner_title2  inner_drag_hh fleft\'><label> Question Title</label><input type=\'text\' id=\'ques_title\' class=\'title_text title_text2 input_text\'><div class=\'img_m\' id=\'img_1\'><img src=\'images/minus.png\' id=\'img_1\'onclick=\'showpop(\"drag_"+btn_num+"\")\'></div></div></div><div class=\"clear\"></div></div>");';
                    } else if($temp['ques_type_id'] == "2") {
                        $order_ques_dyn[] = "btn_num_area++;".
                        "$(\"#outer_drag1\").append(\"<div id='drag_\"+btn_num_area+\"' class='inner_drag'><div class='inner_title2  inner_drag_hh fleft'><img src='images/drag.png' alt='move' width='16' height='11' class='handle' /><label id='ques_type'>Text Area</label><input type='checkbox' name=ques_check><span> Required </span> </div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft'><label> Question Title</label><input type='text' id='ques_title' class='title_text title_text2 input_text'><div class='img_m'><img src='images/minus.png' onClick='showpop(\\\"drag_\"+btn_num_area+\"\\\")'></div></div></div>\");";
                    } else if($temp['ques_type_id'] == "3") {
                       $order_ques_dyn[] = "btn_num_check++;".
                        "$(\"#outer_drag1\").append(\"<div id='drag_check\"+btn_num_check+\"' class='inner_drag'><div class='inner_drag'><div class='inner_title2  inner_drag_hh fleft'> <img src='images/drag.png' alt='move' width='16' height='11' class='handle' /><label id='ques_type'>Check Boxes</label><input type='checkbox' name=ques_check><span> Required </span> </div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft'><label> Question Title</label><input type='text' id='ques_title' class='title_text title_text2 input_text' value='' id='minus_id_check'><div class='img_m r_check fright' id='img_13'><img src='images/minus.png' onclick='showpop(\\\"drag_check\"+btn_num_check+\"\\\")'></div></div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft' id='drag_\"+btn_num_check+\"_0'><label> Options</label><input type='checkbox'><input type='text' name='options_temp' class='title_text title_text2 input_text txt'><div class='img_m1'><img src='images/minus.png' onclick='showpop(\\\"drag_\"+btn_num_check+\"_0\\\")'></div></div><div class='clear'><div id='adding_new_option_checkbox_\"+btn_num_check+\"' class='inner_drag minus_img3'> <img src='images/lgt_p.png' style='margin-left:100px' onclick='add(\\\"\"+btn_num_check+\"\\\", \\\"1\\\");'> </div> </div></div></div>\");";

                    } else if($temp['ques_type_id'] == "4") {
                         $order_ques_dyn[] = "btn_num_radio++;".
                        "$(\"#outer_drag1\").append(\"<div id='drag_radio\"+btn_num_radio+\"' class='inner_drag'><div class='inner_title2  inner_drag_hh fleft'> <img src='images/drag.png' alt='move' width='16' height='11' class='handle' /><label id='ques_type'>Radio Button</label><input type='checkbox' name=ques_check><span> Required </span> </div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft'><label> Question Title</label><input type='text' id='ques_title' class='title_text title_text2 input_text' value='' id='minus_id_check'><div class='img_m r_check fright' id='img_13'><img src='images/minus.png' onclick='showpop(\\\"drag_radio\"+btn_num_radio+\"\\\")'></div></div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft'  id='drag_\"+btn_num_radio+\"_0'><label> Options</label><input type='radio'><input type='text' name='options_temp' class='title_text title_text2 input_text txt'><div class='img_m1'><img src='images/minus.png' onclick='showpop(\\\"drag_\"+btn_num_radio+\"_0\\\")'></'></div></div><div class='clear'> </div><div id='adding_new_option_radio_\"+btn_num_radio+\"' class='inner_drag minus_img1'> <img src='images/lgt_p.png' style='margin-left:100px' onclick='add_radio(\\\"\"+btn_num_radio+\"\\\", \\\"1\\\");';> </div></div>\");";
                    } else if($temp['ques_type_id'] == "5") {
                        $order_ques_dyn[] = "btn_num_dropdown++;".
                        "$(\"#outer_drag1\").append(\"<div id='drag_dropdown\"+btn_num_dropdown+\"' class='inner_drag'><div class='inner_title2  inner_drag_hh fleft'> <img src='images/drag.png' alt='move' width='16' height='11' class='handle' /><label id='ques_type'>Drop Down</label><input type='checkbox' name=ques_check><span> Required </span> </div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft'><label> Question Title</label><input type='text' id='ques_title' class='title_text title_text2 input_text' value='' id='minus_id_check'><div class='img_m r_check fright' id='img_13'><img src='images/minus.png' onclick='showpop(\\\"drag_dropdown\"+btn_num_dropdown+\"\\\")'></div></div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft'  id='drag_\"+btn_num_dropdown+\"_0'><label> Options</label><input type='checkbox'><input type='text' name='options_temp' class='title_text title_text2 input_text txt'><div class='img_m1'><img src='images/minus.png' onclick='showpop(\\\"drag_\"+btn_num_dropdown+\"_0\\\")'></div></div><div class='clear'> </div><div id='adding_new_option_dropdown_\"+btn_num_dropdown+\"' class='inner_drag minus_img2'> <img src='images/lgt_p.png' style='margin-left:100px' onclick='add_dropdown(\\\"\"+btn_num_dropdown+\"\\\", \\\"1\\\");';> </div></div>\");";                            
                    } else if($temp['ques_type_id'] == "6") {
                         $order_ques_dyn[] = "btn_num_photo++;".
                        "$(\"#outer_drag1\").append(\"<div id='drag_photo\"+btn_num_photo+\"' class='inner_drag'><div class='inner_title2  inner_drag_hh fleft'> <img src='images/drag.png' alt='move' width='16' height='11' class='handle' /><label id='ques_type'>Photo Question</label><input type='checkbox' name=ques_check><span> Required </span></div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft'><label> Question Title</label><input type='text' id='ques_title' class='title_text title_text2 input_text'><div class='img_m'><img src='images/minus.png' onclick='showpop(\\\"drag_photo\"+btn_num_photo+\"\\\")'></div></div><div class='clear'></div><div class='sec_ques_div'><input type='text' class='fleft' ><button class='bb_ques fleft'>Browse..</button><input type='file' name='photo_ques[]' class='browewin' style='display:none;'/></div><div class='clear'></div><div class='inner_title2  inner_drag_hh fleft'> <label> Answer Type:</label><input type='number' class='drag_num'></div></div><div class='clear'> </div>\");";
                    } else if($temp['ques_type_id'] == "7") {
                          $order_ques_dyn[] = "btn_num_answer++;".
                        "$(\"#outer_drag1\").append(\"<div id='drag_answer\"+btn_num_answer+\"' class='inner_drag'><label id='ques_type'>Rating Scale</label><input type='checkbox' name=ques_check><span> Required </span><br><br><div class='clear'> </div><div class='inner_title2  inner_drag_hh'><label>Question Title</label><input type='text' id='ques_title' class='title_text title_text2 input_text '><div class='img_m'><img src='images/minus.png' onclick='showpop(\\\"drag_\"+btn_num_answer+\"\\\")'></div></div><div class='inner_title2  inner_drag_hh'><label>Left Value</label><input type='text' name='options_temp' class='title_text title_text2 input_text mm'></div><div class='inner_title2 inner_drag_hh'><label> Right Value</label><input type='text' name='options_temp' class='title_text title_text2 input_text mm1'></div><div class='clear'> </div><input type='range' class='range1'></div>\");";
                    } else if($temp['ques_type_id'] == "8") {
                        $button_text = $temp['ques_title'];
                    }
                    continue;
                }
                $order_ques[] = $element;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/applogo.css">
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
    }   
}

function add(id, num) {
		//num_new = num + 1;
         $("#adding_new_option_checkbox_"+id).before("<div class='inner_title2  inner_drag_hh fleft' id='drag_"+id+"_"+num+"'><label> Options</label><input type='checkbox'><input type='text' class='title_text title_text2 input_text txt' name='options_temp'><div class='img_m1'><img src='images/minus.png' onclick='showpop(\"drag_"+id+"_"+num+"\")'></div></div>");
		 num++;
		 $("#adding_new_option_checkbox_"+id).html("<img src='images/lgt_p.png' style='margin-left:100px' onclick='add(\""+id+"\", \""+num+"\");'>");		 
}

function add_radio(id, num) {
        $("#adding_new_option_radio_"+id).before("<div class='inner_title2  inner_drag_hh fleft' id='drag_"+id+"_"+num+"'><label> Options</label><input type='radio'><input type='text' class='title_text title_text2 input_text txt'><div class='img_m1'><img src='images/minus.png' onclick='showpop(\"drag_"+id+"_"+num+"\")'></div></div>");
	 num++;
	 $("#adding_new_option_radio_"+id).html("<img src='images/lgt_p.png' style='margin-left:100px' onclick='add_radio(\""+id+"\", \""+num+"\");'>");
}

function add_dropdown(id, num) {
        $("#adding_new_option_dropdown_"+id).before("<div class='inner_title2  inner_drag_hh fleft' id='drag_"+id+"_"+num+"'><label> Options</label><input type='checkbox'><input type='text' class='title_text title_text2 input_text txt'><div class='img_m1'><img src='images/minus.png' onclick='showpop(\"drag_"+id+"_"+num+"\")'></div></div>");
        num++;
        $("#adding_new_option_dropdown_"+id).html("<img src='images/lgt_p.png' style='margin-left:100px' onclick='add_dropdown(\""+id+"\", \""+num+"\");'>");
}

$(document).ready(function(){
	var  btn_num = 0;
        var  btn_num_area = 0;
	var  btn_num_check =0;
	var  btn_num_radio =0;
	var  btn_num_dropdown =0;
	var  btn_num_photo =0;
	var  btn_num_answer =0;
        
        <?php
        foreach($order_ques_dyn as $order_dyn) {
            echo $order_dyn;
        }
        ?>
        
        $(".btn1").click(function(){
            btn_num++;
            $("#outer_drag1").append("<div id='drag_"+btn_num+"' class='inner_drag'><div class='inner_title2  inner_drag_hh fleft'><img src='images/drag.png' alt='move' width='16' height='11' class='handle' /><label id='ques_type'>Text Line</label><input type='checkbox' name='ques_check'><span> Required </span> </div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft'><label> Question Title</label><input type='text' id='ques_title' class='title_text title_text2 input_text'><div class='img_m' id='img_1'><img src='images/minus.png' id='img_1'onclick='showpop(\"drag_"+btn_num+"\")'></div></div></div><div class=\"clear\"></div></div>");
       });
        $(".btn2").click(function(){
             btn_num_area++;
            $("#outer_drag1").append("<div id='drag_"+btn_num_area+"' class='inner_drag'><div class='inner_title2  inner_drag_hh fleft'><img src='images/drag.png' alt='move' width='16' height='11' class='handle' /><label id='ques_type'>Text Area</label><input type='checkbox' name=ques_check><span> Required </span> </div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft'><label> Question Title</label><input type='text' id='ques_title' class='title_text title_text2 input_text'><div class='img_m'><img src='images/minus.png' onClick='showpop(\"drag_"+btn_num_area+"\")'></div></div></div>");
       });
	$(".btn3").click(function(){
		btn_num_check++;
            $("#outer_drag1").append("<div id='drag_check"+btn_num_check+"' class='inner_drag'><div class='inner_drag'><div class='inner_title2  inner_drag_hh fleft'> <img src='images/drag.png' alt='move' width='16' height='11' class='handle' /><label id='ques_type'>Check Boxes</label><input type='checkbox' name=ques_check><span> Required </span> </div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft'><label> Question Title</label><input type='text' id='ques_title' class='title_text title_text2 input_text' value='' id='minus_id_check'><div class='img_m r_check fright' id='img_13'><img src='images/minus.png' onclick='showpop(\"drag_check"+btn_num_check+"\")'></div></div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft' id='drag_"+btn_num_check+"_0'><label> Options</label><input type='checkbox'><input type='text' name='options_temp' class='title_text title_text2 input_text txt'><div class='img_m1'><img src='images/minus.png' onclick='showpop(\"drag_"+btn_num_check+"_0\")'></div></div><div class='clear'><div id='adding_new_option_checkbox_"+btn_num_check+"' class='inner_drag minus_img3'> <img src='images/lgt_p.png' style='margin-left:100px' onclick='add(\""+btn_num_check+"\", \"1\");'> </div> </div></div></div>");
        });
	$(".btn4").click(function(){
            btn_num_radio++;
            $("#outer_drag1").append("<div id='drag_radio"+btn_num_radio+"' class='inner_drag'><div class='inner_title2  inner_drag_hh fleft'> <img src='images/drag.png' alt='move' width='16' height='11' class='handle' /><label id='ques_type'>Radio Button</label><input type='checkbox' name=ques_check><span> Required </span> </div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft'><label> Question Title</label><input type='text' id='ques_title' class='title_text title_text2 input_text' value='' id='minus_id_check'><div class='img_m r_check fright' id='img_13'><img src='images/minus.png' onclick='showpop(\"drag_radio"+btn_num_radio+"\")'></div></div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft'  id='drag_"+btn_num_radio+"_0'><label> Options</label><input type='radio'><input type='text' name='options_temp' class='title_text title_text2 input_text txt'><div class='img_m1'><img src='images/minus.png' onclick='showpop(\"drag_"+btn_num_radio+"_0\")'></'></div></div><div class='clear'> </div><div id='adding_new_option_radio_"+btn_num_radio+"' class='inner_drag minus_img1'> <img src='images/lgt_p.png' style='margin-left:100px' onclick='add_radio(\""+btn_num_radio+"\", \"1\");';> </div></div>");
        });
	$(".btn5").click(function(){
            btn_num_dropdown++;
            $("#outer_drag1").append("<div id='drag_dropdown"+btn_num_dropdown+"' class='inner_drag'><div class='inner_title2  inner_drag_hh fleft'> <img src='images/drag.png' alt='move' width='16' height='11' class='handle' /><label id='ques_type'>Drop Down</label><input type='checkbox' name=ques_check><span> Required </span> </div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft'><label> Question Title</label><input type='text' id='ques_title' class='title_text title_text2 input_text' value='' id='minus_id_check'><div class='img_m r_check fright' id='img_13'><img src='images/minus.png' onclick='showpop(\"drag_dropdown"+btn_num_dropdown+"\")'></div></div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft'  id='drag_"+btn_num_dropdown+"_0'><label> Options</label><input type='checkbox'><input type='text' name='options_temp' class='title_text title_text2 input_text txt'><div class='img_m1'><img src='images/minus.png' onclick='showpop(\"drag_"+btn_num_dropdown+"_0\")'></div></div><div class='clear'> </div><div id='adding_new_option_dropdown_"+btn_num_dropdown+"' class='inner_drag minus_img2'> <img src='images/lgt_p.png' style='margin-left:100px' onclick='add_dropdown(\""+btn_num_dropdown+"\", \"1\");';> </div></div>");
        });
	$(".btn6").click(function(){
            btn_num_photo++;
            $("#outer_drag1").append("<div id='drag_photo"+btn_num_photo+"' class='inner_drag'><div class='inner_title2  inner_drag_hh fleft'> <img src='images/drag.png' alt='move' width='16' height='11' class='handle' /><label id='ques_type'>Photo Question</label><input type='checkbox' name=ques_check><span> Required </span></div><div class='clear'> </div><div class='inner_title2  inner_drag_hh fleft'><label> Question Title</label><input type='text' id='ques_title' class='title_text title_text2 input_text'><div class='img_m'><img src='images/minus.png' onclick='showpop(\"drag_photo"+btn_num_photo+"\")'></div></div><div class='clear'></div><div class='sec_ques_div'><input type='text' class='fleft' ><button class='bb_ques fleft'>Browse..</button><input type='file' name='photo_ques[]' class='browewin' style='display:none;'/></div><div class='clear'></div><div class='inner_title2  inner_drag_hh fleft'> <label> Answer Type:</label><input type='number' class='drag_num'></div></div><div class='clear'> </div>");
        });
	$(".btn7").click(function(){
            btn_num_answer++;
            $("#outer_drag1").append("<div id='drag_answer"+btn_num_answer+"' class='inner_drag'><label id='ques_type'>Rating Scale</label><input type='checkbox' name=ques_check><span> Required </span><br><br><div class='clear'> </div><div class='inner_title2  inner_drag_hh'><label>Question Title</label><input type='text' id='ques_title' class='title_text title_text2 input_text '><div class='img_m'><img src='images/minus.png' onclick='showpop(\"drag_"+btn_num_answer+"\")'></div></div><div class='inner_title2  inner_drag_hh'><label>Left Value</label><input type='text' name='options_temp' class='title_text title_text2 input_text mm'></div><div class='inner_title2 inner_drag_hh'><label> Right Value</label><input type='text' name='options_temp' class='title_text title_text2 input_text mm1'></div><div class='clear'> </div><input type='range' class='range1'></div>");
        });
    
        $("#outer_drag").sortable({
          // handle : '.handle',
           start: function(event, ui) {
                var start_pos = ui.item.index();
                ui.item.data('start_pos', start_pos);
            },
          stop: function (event, ui) {
                var start_pos = ui.item.data('start_pos');
                var end_pos = ui.item.index();
            }
       });      
       
       $("#outer_drag1").sortable({
           handle : '.handle',
           update : function () {
               var order = $('#outer_drag1').sortable('serialize');                
           }
       });
       
       $(".bb_ques").live("click",function(event){
		$(this).closest("div").find(".browewin").click();	
                event.preventDefault();
	});
        
        $(".bb_img").click(function(event){
            $(".htab_o1").toggle();
            event.preventDefault();
        });
        
        $("#saveandnext").click(function(event){
            event.preventDefault();
            // Getting values from the default questions
            $('#outer_drag').children('.inner_drag').each(function(index){
                title_temp = $(this).find("#ques_title").html();
                var required_arr = new Array();
                var active_arr = new Array();
                if(title_temp === "Telephone") {
                    $(this).find("input[name=ques_check]").each(function(){
                       temp_required = $(this).is(":checked"); 
                       if(temp_required) {
                           required_arr.push("1"); 
                       } else {
                           required_arr.push("0"); 
                       }
                    });
                    required = required_arr.join(",");
                    
                    $(this).find("input[name=onoffswitch]").each(function(){
                       temp_active = $(this).is(":checked"); 
                       if(temp_active) {
                           active_arr.push("1"); 
                       } else {
                           active_arr.push("0"); 
                       }
                    });
                    active = active_arr.join(",");
                } else {
                    is_required = $(this).find("input[name=ques_check]").is(":checked");
                    if(is_required) {
                        required = "1";
                    } else {
                        required = "0";
                    }
                    
                    is_active = $(this).find("input[name=onoffswitch]").is(":checked");
                    if(is_active == null || title_temp === "First Name" || title_temp === "Last Name") {
                        active = "1";
                    } else {
                        if(is_active) {
                            active = "1";
                        } else {
                            active = "0";
                        }
                    }
                    
                }
                                
                order = index+1;
                if(title_temp === "Date of birth" || title_temp === "Country") {
                    type_id = 5;
                } else {
                    type_id = 1;
                }
                //ques_options
                
                if(title_temp === "Date of birth") {
                    ques_options = $("input[name='dformat']:checked").val();
                } else if(title_temp === "Telephone") {
                    var ques_options_arr = new Array();
                    $(this).find("#tele_val").each(function(){
                       ques_options_arr.push($(this).val());                        
                    });
                    ques_options = ques_options_arr.join(",");
                } else {
                    ques_options = "";   
                }
                var ques_type_id = $("<input>").attr("type", "hidden").attr("name", "ques_type_id[]").val(type_id);
                var ques_title = $("<input>").attr("type", "hidden").attr("name", "ques_title[]").val(title_temp);
                var ques_order = $("<input>").attr("type", "hidden").attr("name", "ques_order[]").val(order);
                var ques_options = $("<input>").attr("type", "hidden").attr("name", "ques_options[]").val(ques_options);
                var ques_required = $("<input>").attr("type", "hidden").attr("name", "ques_required[]").val(required);
                var ques_active = $("<input>").attr("type", "hidden").attr("name", "ques_active[]").val(active);
                $("#ques_form").append($(ques_type_id));
                $("#ques_form").append($(ques_title));
                $("#ques_form").append($(ques_order));
                $("#ques_form").append($(ques_required));
                $("#ques_form").append($(ques_active));
                $("#ques_form").append($(ques_options));
            });
            
             $('#outer_drag1').children('.inner_drag').each(function(index){
               
               //Question type ID
               ques_type = $(this).find("#ques_type").html();
               if(ques_type === "Text Line") {
                   type_id = 1;
               } else if(ques_type === "Text Area") {
                   type_id = 2;
               } else if(ques_type === "Check Boxes") {
                   type_id = 3;
               } else if(ques_type === "Radio Button") {
                   type_id = 4;
               } else if(ques_type === "Drop Down") {
                   type_id = 5;
               } else if(ques_type === "Photo Question") {
                   type_id = 6;
               } else if(ques_type === "Rating Scale") {
                   type_id = 7;
               } 
               //Question title
                title_temp = $(this).find("#ques_title").val();
                
                //Question Order
                order = index+10;
                
                //Question Required
                is_required = $(this).find("input[name=ques_check]").is(":checked");
                if(is_required) {
                    required = "1";
                } else {
                    required = "0";
                }
                
                //Question Active - In the additional questions, all the selected questions will be active.
                active = "1";
                
                //Question options
                var ques_options_arr = new Array();
                if(ques_type === "Text Line" || ques_type === "Text Area") {
                    ques_options = "";
                } else if(ques_type === "Check Boxes" || ques_type === "Radio Button" || ques_type === "Drop Down" || ques_type === "Rating Scale") {
                    $(this).find("input[name=options_temp]").each(function(){
                       ques_options_arr.push($(this).val());
                    });
                    ques_options = ques_options_arr.join(",");
                } else if(ques_type === "Photo Question") {
                   ques_options = "";
                }

                
                //Creating hidden elements to pass the values
                var ques_type_id = $("<input>").attr("type", "hidden").attr("name", "ques_type_id[]").val(type_id);
                var ques_title = $("<input>").attr("type", "hidden").attr("name", "ques_title[]").val(title_temp);
                var ques_order = $("<input>").attr("type", "hidden").attr("name", "ques_order[]").val(order);
                var ques_required = $("<input>").attr("type", "hidden").attr("name", "ques_required[]").val(required);
                var ques_active = $("<input>").attr("type", "hidden").attr("name", "ques_active[]").val(active);
                var ques_options = $("<input>").attr("type", "hidden").attr("name", "ques_options[]").val(ques_options);

                //Appending the hidden elements to the form
                $("#ques_form").append($(ques_type_id));
                $("#ques_form").append($(ques_title));
                $("#ques_form").append($(ques_order));
                $("#ques_form").append($(ques_required));
                $("#ques_form").append($(ques_active));
                $("#ques_form").append($(ques_options));
             });
        
            $( '#ques_form' ).submit();
        });
        
       
});
</script>
</head>
<body>
<header>
  <div class="wrapper">
    <div class="logo"> <img src="images/logo.jpg" alt="logo"> 
 
    <div class="ryt_admin">

        <div class="inner_admin">

          <div class="droper">

            <div class="dropper_inner">
            <?php if(isset($_SESSION['access_token'])) {
             ?>
                <div class="user_name"> Admin <img src="images/arrow.jpg" alt="arrow" id="show" style="width: auto!important"> </div>

             
                    <div class="htab_o">

                      <div class="htab hr_l"> Change Password </div>

                      <div class="htab" id="log"> Logout </div>

                    </div>
              <?php } ?>
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
      <form action="#" id="ques_form" method="post" enctype="multipart/form-data" >
    <div class="container ww">
      <h2 class="sec_head_ques1">Questionnaire Questions</h2>
      <h4>Default</h4>
      <div id="outer_drag">
        <?php 

        foreach($order_ques as $order) {
            echo $order;
        }
        ?>

        
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
      </div>
      <div class="clear"> </div>
      <!---outer_drag1 closed-->
      <div class="blank_div"> </div>
      <div class="last_input col-4 fleft">
        <label class="submit_text"> Submit Button Text</label>
        <input type="text" name="submit_btn_text" class="submit_input" value="<?php echo $button_text; ?>">
      </div>
      <!---input_add closed-->
      <div class="clear"> </div>
      <div class="lastouter_sec">
        <button class="butt_view bb_sec6" id="saveandnext"> Save&Next </button>
        <button class="butt_view bb_sec6"> Save&Exit </button>
        <button class="butt_view bb_sec6 bb_bg"> Cancel </button>
      </div>
    </div>
    <!---container closed--> 
    </form>
  </div>
  <!---wrapper closed--> 
  
</section> 
</body>
</html>