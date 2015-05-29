<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Quest {

    protected $con;

    function __construct() {

        $this->con = new Connection();
    }

    public function createQuestionnaire($name,$user_id) {

        $query = "INSERT INTO `ques_user_xref`(`ques_name`, `user_id`) VALUES (:ques_name,:user_id)";

        $bindParams = array("ques_name" => $name, "user_id" => $user_id);

        $id = $this->con->insertQuery($query, $bindParams);
        return $id;
    }
    
    public function checkQuestionnaire($name) {

        $query = "SELECT COUNT(*) as count FROM `ques_user_xref` WHERE `ques_name` = :ques_name";

        $bindParams = array("ques_name" => $name);

        $qh = $this->con->getQueryHandler($query, $bindParams);

        $res = $qh->fetch(PDO::FETCH_ASSOC);

        $bool = ($res["count"] > 0) ? false : true;

        return $bool;
    }
    
     public function insertQuesSetting($ques_id,$setting_id,$active = 1) {

        $query = "INSERT INTO `ques_settings`(`ques_id`, `setting_id`, `active`) VALUES (:ques_id,:setting_id,:active)";

        $bindParams = array("ques_id" => $ques_id, "setting_id" => $setting_id, "active"=>$active);

        $id = $this->con->insertQuery($query, $bindParams);
        return $id;
     }
     
     public function updateQuesSetting($ques_id,$setting_id,$active = 1) {

        $query = "UPDATE `ques_settings` SET `active`= :active WHERE `ques_id`= :ques_id AND `setting_id`= :setting_id";

        $bindParams = array("ques_id" => $ques_id, "setting_id" => $setting_id, "active"=>$active);

        $id = $this->con->insertQuery($query, $bindParams);
        return $id;
     }
    
      public function checkQuesSetting($ques_id,$setting_id) {
        $query = "SELECT COUNT(*) as count FROM `ques_settings` WHERE `ques_id` = :ques_id AND `setting_id` = :setting_id";

        $bindParams = array("ques_id" => $ques_id, "setting_id"=>$setting_id);

        $qh = $this->con->getQueryHandler($query, $bindParams);

        $res = $qh->fetch(PDO::FETCH_ASSOC);

        $bool = ($res["count"] > 0) ? false : true;

        return $bool;
    }

    
    public function insertQuesDate($ques_id,$start_date,$end_date) {

        $query = "INSERT INTO `ques_datetime`(`ques_id`, `start_date`, `end_date`) VALUES (:ques_id,:start_date,:end_date)";

        $bindParams = array("ques_id" => $ques_id, "start_date" => $start_date, "end_date"=>$end_date);

        $id = $this->con->insertQuery($query, $bindParams);
        return $id;
    }
    
    public function insertQuesElement($ques_id, $setting_id, $element_type, $element_name, $element_color, $element_size, $element_font, $element_attachment, $active) {
        $query = "INSERT INTO `ques_settings_element`(`ques_id`, `setting_id`, `element_type`, `element_name`, `element_color`, `element_size`,"
                . " `element_font`, `element_attachment`, `active`) "
                . "VALUES (:ques_id,:setting_id,:element_type,:element_name,:element_color,:element_size,:element_font,:element_attachment,:active)";

        $bindParams = array("ques_id"=> $ques_id ,"setting_id"=>$setting_id,"element_type"=>$element_type,"element_name"=>$element_name,
            "element_color"=>$element_color,"element_size"=>$element_size,
            "element_font"=>$element_font,
            "element_attachment"=>$element_attachment,"active"=>$active);

        $id = $this->con->insertQuery($query, $bindParams);
        return $id;
    }
    
    public function updateQuesElement($ques_id, $setting_id, $element_type, $element_name, $element_color, $element_size, $element_font, $element_attachment, $active) {
        $query = "UPDATE `ques_settings_element` SET `element_name`= :element_name,`element_color`= :element_color,`element_size`= :element_size,"
                . "`element_font`= :element_font,`element_attachment`= :element_attachment,`active`= :active "
                . "WHERE "
                . "`ques_id`= :ques_id AND `setting_id`= :setting_id AND `element_type`= :element_type";

        $bindParams = array("ques_id"=> $ques_id ,"setting_id"=>$setting_id,"element_type"=>$element_type,"element_name"=>$element_name,
            "element_color"=>$element_color,"element_size"=>$element_size,
            "element_font"=>$element_font,
            "element_attachment"=>$element_attachment,"active"=>$active);

        $id = $this->con->insertQuery($query, $bindParams);
        return $id;
    }
    
    public function isValidQuesID($ques_id) {
        $query = "SELECT COUNT(*) as count FROM `ques_user_xref` WHERE `ques_id` = :ques_id";

        $bindParams = array("ques_id" => $ques_id);

        $qh = $this->con->getQueryHandler($query, $bindParams);

        $res = $qh->fetch(PDO::FETCH_ASSOC);

        $bool = ($res["count"] > 0) ? false : true;

        return $bool;
    }
    
    public function uploadFile($file, $access_token) {
        

        if ($file["error"] > 0) {

            //echo json_encode(array("error" => "Error: " . $file["error"], "code" => "0"));

            //exit();
            return "";
        }

        $filename = substr($access_token, 5, 10) . "-" . time() . session_id(). ".jpg";

        while (file_exists("images/" . $filename)) {

            $filename = substr($access_token, 5, 10) . time() . session_id(). ".jpg";
        }

        if (move_uploaded_file($file["tmp_name"], "images/" . $filename)) {

            return $filename;
        } else {

            return "-1";
        }
    }
    
     public function checkQuesSettingElement($ques_id,$setting_id) {
        $query = "SELECT COUNT(*) AS count FROM `ques_settings_element` WHERE `ques_id` = :ques_id AND `setting_id` = :setting_id";

        $bindParams = array("ques_id" => $ques_id, "setting_id"=>$setting_id);

        $qh = $this->con->getQueryHandler($query, $bindParams);

        $res = $qh->fetch(PDO::FETCH_ASSOC);

        $bool = ($res["count"] > 0) ? false : true;

        return $bool;
    }

}
