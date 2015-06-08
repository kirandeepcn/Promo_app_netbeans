<?php
 session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

header('Access-Control-Allow-Origin: *');

function __autoload($classname) {
    include "include/" . $classname . ".class.php";
}

$type = $_POST["type"];
switch ($type) {
    case "login": 
            $userObj = new User();
            if(isset($_POST['username']) && isset($_POST['password']) ) {
            $username = isset($_POST['username']) ? $_POST['username'] : "";
            $password = isset($_POST['password']) ? $_POST['password'] : "";
            $accountType = isset($_POST['account_type']) ? $_POST['account_type'] : "2";
            $access_token = $userObj->authenticateUser($username, $password, $accountType);            
            $check = ($access_token != -1) ? true : false;  
            if($check) {
                $_SESSION['access_token'] = $access_token;
                echo str_replace("\/", "/", json_encode(array("access_token" => $access_token ,"code" => "1")));
            } else {
                echo str_replace("\/", "/", json_encode(array("message"=>"Invalid Username or Password" ,"code" => "0")));
            }
         
        } else {
            echo json_encode(array("error" => "Fields missing", "code" => "0"));
        } 
        
        break;
        
    case "access_token":
            $accessToken = isset($_POST['accessToken']) ? $_POST['accessToken'] : "";
            if ($accessToken == "") {
                echo json_encode(array("error" => "Access Token is empty", "code" => "-1"));
                exit();
            } $userObj = new User();
            $userID = $userObj->getUserIDFromAccToken($accessToken);
            if ($userID != -1) {
                $userType = $userObj->getUserType($userID);
                $jobObj = new Job();
                if($userType == 2)
                {
                    $jobIds = $jobObj->getCastingDirectorJobIds($userID);
                    $castingJobDetails = array();
                    $recentApplicants = array();
                    if(!empty($jobIds)) {
                        $castingJobDetails = $jobObj->getCastingJobDetails($jobIds);
                        $recentApplicants = $jobObj->getRecentApplicants($jobIds,2);
                    }
                } else {
                    $jobAllJobCount = $jobObj->getAllJobCount("");
                    $jobDetails = $jobObj->getJobDetails(0, 10);
                    $applied_job_ids = $jobObj->getAppliedJobIds($userID);
                    for ($i = 0; $i < count($jobDetails); $i++) {
                        if (array_search($jobDetails[$i]["job_id"], $applied_job_ids) === FALSE) {
                            $jobDetails[$i]["applied"] = "0";
                        } else {
                            $jobDetails[$i]["applied"] = "1";
                        }
                    } 
                }
                $userDetails = $userObj->getUserDetails($userID);
                $userDetails["profilePic"] = ($userDetails["profilePic"] == "") ? "$WEB_URL/casting_mobile/images/default.jpg" : str_replace("WEB_URL", "$WEB_URL/casting_mobile", $userDetails["profilePic"]);
                $picsArray = $userObj->getUserPics($userID);
                $messageObj = new Message();
                $unreadCount = $messageObj->getUnreadCount($userID);
                if($userType == 2) {
                    echo str_replace("\/", "/", json_encode(array("user" => $userDetails, "job" => $castingJobDetails,"recentApplicants"=> $recentApplicants,"code" => "1")));
                } else {
                    echo str_replace("\/", "/", json_encode(array("user" => $userDetails, "job" => $jobDetails, "pics" => $picsArray, "code" => "1","unreadCount"=>$unreadCount,"count"=>$jobAllJobCount)));
                }
            } else {
                echo json_encode(array("error" => "Invalid Access Token", "code" => "0"));
            } 
        
        break;
        
     case "create_account":
            $username = isset($_POST['username']) ? $_POST['username'] : "";
            $password = isset($_POST['password']) ? $_POST['password'] : "";

            if ($username == "" || $password == "") {
                echo json_encode(array("code" => "-1", "log" => "Some fields are missing"));
                exit();
            } $userObj = new User();
            if ($userObj->checkUser($username)) {
                $role = 1;
                $userID = $userObj->insertUser($username, $password,$role);
                 echo json_encode(array("code" => "0", "log" => "User created"));
            } else {
                echo json_encode(array("code" => "-1", "log" => "User exists"));
            }
        break;
        
     case "create_quest":
            $question = isset($_POST['ques']) ? $_POST['ques'] : "";
            $username = isset($_POST['clientname']) ? $_POST['clientname'] : "";
            $password = isset($_POST['password']) ? $_POST['password'] : "";
            $allowexport = isset($_POST['allowexport']) ? $_POST['allowexport'] : "";
            $allowimport = isset($_POST['allowimport']) ? $_POST['allowimport'] : "";
            $start_date = isset($_POST['startdate']) ? $_POST['startdate'] : array();
            $end_date = isset($_POST['enddate']) ? $_POST['enddate'] : array();
            $setting_ids = array();
            if ($question == "" || $username == "" || $password == "") {
                echo json_encode(array("code" => "-1", "log" => "Some fields are missing"));
                exit();
            } 
            $setting_ids[] = 1;
            if($allowexport != "") {
               $active[] = 1;
            } else {
               $active[] = 0;
            }
            
            $setting_ids[] = 2;
            if($allowimport != "") {
               $active[] = 1;
            } else {
               $active[] = 0;
            }
            $userObj = new User();
            if ($userObj->checkUser($username)) {
                $role = 2;
                $userID = $userObj->insertUser($username, $password,$role);
                $questObj = new Quest();
                if($questObj->checkQuestionnaire($question)) {
                    $ques_id = $questObj->createQuestionnaire($question, $userID) ;
                    for($i=0; $i<count($setting_ids); $i++) {
                        $questObj->insertQuesSetting($ques_id, $setting_ids[$i],$active[$i]);
                    }
                    for($i=0; $i<count($start_date); $i++)
                    {
                        $questObj->insertQuesDate($ques_id, $start_date[$i], $end_date[$i]);
                    }
                    echo json_encode(array("code" => "0", "log" => "Questionnaire created", "ques_id" => $ques_id));
                } else {
                    $userObj->deleteUser($userID);
                    echo json_encode(array("code" => "-1", "log" => "Questionnaire already present"));
                }            
            } else {
                echo json_encode(array("code" => "-1", "log" => "User exists"));
            }
        break;
        
       case "update_quest":
            $ques_id = isset($_POST['ques_id']) ? $_POST['ques_id'] : "";
            $question = isset($_POST['ques']) ? $_POST['ques'] : "";
            $username = isset($_POST['clientname']) ? $_POST['clientname'] : "";
            $password = isset($_POST['password']) ? $_POST['password'] : "";
            $allowexport = isset($_POST['allowexport']) ? $_POST['allowexport'] : "";
            $allowimport = isset($_POST['allowimport']) ? $_POST['allowimport'] : "";
            $start_date = isset($_POST['startdate']) ? $_POST['startdate'] : array();
            $end_date = isset($_POST['enddate']) ? $_POST['enddate'] : array();
            $setting_ids = array();
            if ($question == "" || $username == "" || $password == "") {
                echo json_encode(array("code" => "-1", "log" => "Some fields are missing"));
                exit();
            } 
            $setting_ids[] = 1;
            if($allowexport != "") {
               $active[] = 1;
            } else {
               $active[] = 0;
            }
            
            $setting_ids[] = 2;
            if($allowimport != "") {
               $active[] = 1;
            } else {
               $active[] = 0;
            }

            $questObj = new Quest();
            $client_id_arr = $questObj->getQuesNameFromID($ques_id);
            $ques_name_old = $client_id_arr['ques_name'];
            $client_id = $client_id_arr['user_id'];
            $userObj = new User();

            $userID = $userObj->updateUser($client_id, $username, $password, "2");
            if($ques_name_old != $question) {
               if($questObj->checkQuestionnaire($question)) {
                   $flag = true;
               } else {
                   $flag = false;
               }
            } else {
                $flag = true;
            }
            if($flag) {
                $questObj->updateQuestionnaire($question, $ques_id);
                $questObj->deleteQuesSetting($ques_id);
                for($i=0; $i<count($setting_ids); $i++) {
                    $questObj->insertQuesSetting($ques_id, $setting_ids[$i],$active[$i]);
                }
                $questObj->deleteQuesDate($ques_id);
                for($i=0; $i<count($start_date); $i++)
                {
                    $questObj->insertQuesDate($ques_id, $start_date[$i], $end_date[$i]);
                }
                echo json_encode(array("code" => "0", "log" => "Questionnaire created", "ques_id" => $ques_id));
            } else {
                $userObj->deleteUser($userID);
                echo json_encode(array("code" => "-1", "log" => "Questionnaire already present"));
            }            
        break;
    case "ques_element":
        $is_welcome = isset($_POST['is_welcome'])?$_POST['is_welcome']:"";
        $ques_id = isset($_POST['ques_id'])?$_POST['ques_id']:"";
        $setting_id = 3;
        $questObj = new Quest();
        
        if($is_welcome == 1) {
            $questObj->insertQuesSetting($ques_id, $setting_id, 1);
            $element_type = isset($_POST['element_type'])?$_POST['element_type']:"";
            $element_name = isset($_POST['element_name'])?$_POST['element_name']:"";
            $element_color = isset($_POST['element_color'])?$_POST['element_color']:"";
            $element_size = isset($_POST['element_size'])?$_POST['element_size']:"";
            $element_font = isset($_POST['element_font'])?$_POST['element_font']:"";
            $element_attachment =isset($_POST['element_attachment'])?$_POST['element_attachment']:"";
            $active = isset($_POST['active'])?$_POST['active']:"";            
            $questObj->inserQuesElement($ques_id, $setting_id, $element_type, $element_name, $element_color, $element_size, $element_font, $element_attachment, $active);
        }
    case "logout":
        session_start();
        session_destroy();
        break;
        
    default: 
        echo "Default";
        break;
}
