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

    public function createQuestionnaire($name, $user_id) {

        $query = "INSERT INTO `ques_user_xref`(`ques_name`, `user_id`) VALUES (:ques_name,:user_id)";

        $bindParams = array("ques_name" => $name, "user_id" => $user_id);

        $id = $this->con->insertQuery($query, $bindParams);
        return $id;
    }

    public function updateQuestionnaire($name, $ques_id) {

        $query = "UPDATE `ques_user_xref` SET `ques_name`= :ques_name WHERE `ques_id` = :ques_id";

        $bindParams = array("ques_name" => $name, "ques_id" => $ques_id);

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

    public function insertQuesSetting($ques_id, $setting_id, $active = 1) {

        $query = "INSERT INTO `ques_settings`(`ques_id`, `setting_id`, `active`) VALUES (:ques_id,:setting_id,:active)";

        $bindParams = array("ques_id" => $ques_id, "setting_id" => $setting_id, "active" => $active);

        $id = $this->con->insertQuery($query, $bindParams);
        return $id;
    }

    public function deleteQuesSetting($ques_id) {

        $query = "DELETE FROM `ques_settings` WHERE `ques_id` = :ques_id AND `setting_id` IN (1,2) ";

        $bindParams = array("ques_id" => $ques_id);

        $id = $this->con->insertQuery($query, $bindParams);
        return $id;
    }

    public function updateQuesSetting($ques_id, $setting_id, $active = 1) {

        $query = "UPDATE `ques_settings` SET `active`= :active WHERE `ques_id`= :ques_id AND `setting_id`= :setting_id";

        $bindParams = array("ques_id" => $ques_id, "setting_id" => $setting_id, "active" => $active);

        $id = $this->con->insertQuery($query, $bindParams);
        return $id;
    }

    public function checkQuesSetting($ques_id, $setting_id) {
        $query = "SELECT COUNT(*) as count FROM `ques_settings` WHERE `ques_id` = :ques_id AND `setting_id` = :setting_id";

        $bindParams = array("ques_id" => $ques_id, "setting_id" => $setting_id);

        $qh = $this->con->getQueryHandler($query, $bindParams);

        $res = $qh->fetch(PDO::FETCH_ASSOC);

        $bool = ($res["count"] > 0) ? false : true;

        return $bool;
    }

    public function insertQuesDate($ques_id, $start_date, $end_date) {

        $query = "INSERT INTO `ques_datetime`(`ques_id`, `start_date`, `end_date`) VALUES (:ques_id,:start_date,:end_date)";

        $bindParams = array("ques_id" => $ques_id, "start_date" => $start_date, "end_date" => $end_date);

        $id = $this->con->insertQuery($query, $bindParams);
        return $id;
    }

    public function deleteQuesDate($ques_id) {

        $query = "DELETE FROM `ques_datetime` WHERE `ques_id` = :ques_id";

        $bindParams = array("ques_id" => $ques_id);

        $id = $this->con->insertQuery($query, $bindParams);
        return $id;
    }

    public function insertQuesElement($ques_id, $setting_id, $element_type, $element_name, $element_color, $element_size, $element_font, $element_attachment, $active) {
        $query = "INSERT INTO `ques_settings_element`(`ques_id`, `setting_id`, `element_type`, `element_name`, `element_color`, `element_size`,"
                . " `element_font`, `element_attachment`, `active`) "
                . "VALUES (:ques_id,:setting_id,:element_type,:element_name,:element_color,:element_size,:element_font,:element_attachment,:active)";

        $bindParams = array("ques_id" => $ques_id, "setting_id" => $setting_id, "element_type" => $element_type, "element_name" => $element_name,
            "element_color" => $element_color, "element_size" => $element_size,
            "element_font" => $element_font,
            "element_attachment" => $element_attachment, "active" => $active);

        $id = $this->con->insertQuery($query, $bindParams);
        return $id;
    }

    public function updateQuesElement($ques_id, $setting_id, $element_type, $element_name, $element_color, $element_size, $element_font, $element_attachment, $active) {
        if(trim($element_attachment) == "") {
            $query = "UPDATE `ques_settings_element` SET `element_name`= :element_name,`element_color`= :element_color,`element_size`= :element_size,"
                    . "`element_font`= :element_font,`active`= :active "
                    . "WHERE "
                    . "`ques_id`= :ques_id AND `setting_id`= :setting_id AND `element_type`= :element_type";

            $bindParams = array("ques_id" => $ques_id, "setting_id" => $setting_id, "element_type" => $element_type, "element_name" => $element_name,
                "element_color" => $element_color, "element_size" => $element_size,
                "element_font" => $element_font, "active" => $active);
        } else {
            $query = "UPDATE `ques_settings_element` SET `element_name`= :element_name,`element_color`= :element_color,`element_size`= :element_size,"
                    . "`element_font`= :element_font,`element_attachment`= :element_attachment,`active`= :active "
                    . "WHERE "
                    . "`ques_id`= :ques_id AND `setting_id`= :setting_id AND `element_type`= :element_type";

            $bindParams = array("ques_id" => $ques_id, "setting_id" => $setting_id, "element_type" => $element_type, "element_name" => $element_name,
                "element_color" => $element_color, "element_size" => $element_size,
                "element_font" => $element_font,
                "element_attachment" => $element_attachment, "active" => $active);
        }
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

        $filename = substr($access_token, 5, 10) . "-" . time() . session_id() . ".jpg";

        while (file_exists("images/" . $filename)) {

            $filename = substr($access_token, 5, 10) . time() . session_id() . ".jpg";
        }

        if (move_uploaded_file($file["tmp_name"], "images/" . $filename)) {

            return $filename;
        } else {

            return "-1";
        }
    }

    public function checkQuesSettingElement($ques_id, $setting_id) {
        $query = "SELECT COUNT(*) AS count FROM `ques_settings_element` WHERE `ques_id` = :ques_id AND `setting_id` = :setting_id";

        $bindParams = array("ques_id" => $ques_id, "setting_id" => $setting_id);

        $qh = $this->con->getQueryHandler($query, $bindParams);

        $res = $qh->fetch(PDO::FETCH_ASSOC);

        $bool = ($res["count"] > 0) ? false : true;

        return $bool;
    }

    public function insertQnsrQuestions($ques_id, $ques_type_id, $ques_title, $ques_options, $ques_attachment, $required, $active, $ques_order) {
        $query = "INSERT INTO `ques_questions`(`ques_id`, `ques_type_id`, `ques_title`, `ques_options`,`ques_attachment`, `required`, `active`, `ques_order`) "
                . "VALUES "
                . "(:ques_id,:ques_type_id,:ques_title,:question_options,:ques_attachment,:required,:active,:ques_order)";

        $bindParams = array("ques_id" => $ques_id, "ques_type_id" => $ques_type_id, "ques_title" => $ques_title, "question_options" => $ques_options,
            "ques_attachment" => $ques_attachment,
            "active" => $active, "required" => $required, "ques_order" => $ques_order);

        $id = $this->con->insertQuery($query, $bindParams);
        return $id;
    }
    
    public function deleteQnsrQuestions($ques_id) {
        $query = "DELETE FROM `ques_questions` WHERE `ques_id` = :ques_id";

        $bindParams = array("ques_id" => $ques_id);

        $id = $this->con->insertQuery($query, $bindParams);
        return $id;
    }

    public function getQuesList($status) {
        $query = "SELECT `ques_id`, `ques_name`,  DATE(`updated_datetime`) as updated_datetime, `status` FROM `ques_user_xref` WHERE `status` = :status";

        $bindParams = array("status" => $status);

        $qh = $this->con->getQueryHandler($query, $bindParams);
        $output = array();
        while ($res = $qh->fetch(PDO::FETCH_ASSOC)) {
            $output[] = $res;
        }

        return $output;
    }
    
    public function updateQuesStatus($ques_id,$status) {
        $query = "UPDATE `ques_user_xref` SET `status` = :status , `updated_datetime` = NOW() WHERE `ques_id`= :ques_id";

        $bindParams = array("ques_id" => $ques_id, "status" => $status);

        $id = $this->con->insertQuery($query, $bindParams);
        return $id;
    }
    
    public function deleteQues($ques_id) {
        $query = "DELETE FROM `ques_user_xref` WHERE `ques_id`= :ques_id";

        $bindParams = array("ques_id" => $ques_id);

        $id = $this->con->insertQuery($query, $bindParams);
        return $id;
    }


     public function getQuesQuestionnaire($ques_id) {
        $query = "SELECT `ques_type_id`, `ques_title`, `ques_options`, `ques_attachment`, `required`, `active`, `ques_order` FROM `ques_questions` "
                . "WHERE `ques_id` = :ques_id "
                . "ORDER BY `ques_order`";

        $bindParams = array("ques_id" => $ques_id);

        $qh = $this->con->getQueryHandler($query, $bindParams);
        $output = array();
        while ($res = $qh->fetch(PDO::FETCH_ASSOC)) {
            $output[] = $res;
        }

        return $output;
    }
    
    public function getQuesNameFromID($ques_id) {
        $query = "SELECT  `ques_name`, `user_id` FROM `ques_user_xref` WHERE `ques_id` = :ques_id";

        $bindParams = array("ques_id" => $ques_id);

        $qh = $this->con->getQueryHandler($query, $bindParams);

        $res = $qh->fetch(PDO::FETCH_ASSOC);

        return $res;
    }

    public function getQuesDateFromID($ques_id) {
        $query = "SELECT DATE_FORMAT(`start_date`,'%Y/%m/%d %h:%i') as start_date, DATE_FORMAT(`end_date`,'%Y/%m/%d %h:%i') as end_date FROM `ques_datetime` WHERE `ques_id` = :ques_id";

        $bindParams = array("ques_id" => $ques_id);

        $qh = $this->con->getQueryHandler($query, $bindParams);

        $output = array();

        while ($res = $qh->fetch(PDO::FETCH_ASSOC)) {
            $output[] = $res;
        }

        return $output;
    }

    public function getQuesClientFromID($user_id) {
        $query = "SELECT  `username`,`password` FROM `user_login` WHERE `id` = :user_id";

        $bindParams = array("user_id" => $user_id);

        $qh = $this->con->getQueryHandler($query, $bindParams);

        $res = $qh->fetch(PDO::FETCH_ASSOC);

        return $res;
    }

    public function getQuesSettingFromID($ques_id) {
        $query = "SELECT `setting_id`, `active` FROM `ques_settings` WHERE `ques_id` = :ques_id AND `setting_id` IN ('1','2')";

        $bindParams = array("ques_id" => $ques_id);

        $qh = $this->con->getQueryHandler($query, $bindParams);

        while ($res = $qh->fetch(PDO::FETCH_ASSOC)) {
            if ($res['setting_id'] == "1") {
                $allow_export = ($res['active'] == "1") ? true : false;
            } else {
                $allow_preview = ($res['active'] == "1") ? true : false;
            }
        }

        return array("is_export" => $allow_export, "is_preview" => $allow_preview);
    }

    public function isWelcome($ques_id) {
        $query = "SELECT `setting_id`, `active` FROM `ques_settings` WHERE `ques_id` = :ques_id AND `setting_id` IN ('3')";

        $bindParams = array("ques_id" => $ques_id);

        $qh = $this->con->getQueryHandler($query, $bindParams);

        $res = $qh->fetch(PDO::FETCH_ASSOC);
        $is_welcome = ($res['active'] == "1") ? true : false;

        return $is_welcome;
    }

    public function getQuesSettingElement($ques_id, $setting_id) {
        $setting_id_join = join(",", $setting_id);
        $query = "SELECT `setting_id`,`element_id`, `element_type`, `element_name`, `element_color`, `element_size`, `element_font`, `element_attachment`, `active` "
                . "FROM "
                . "`ques_settings_element` "
                . "WHERE `ques_id` = :ques_id AND `setting_id` IN ($setting_id_join)";

        $bindParams = array("ques_id" => $ques_id);

        $qh = $this->con->getQueryHandler($query, $bindParams);
        $output = array();
        while ($res = $qh->fetch(PDO::FETCH_ASSOC)) {
            $output[] = $res;
        }

        return $output;
    }
    
    public function deleteQnsrSettings($ques_id,$setting_ids) {
        $setting_id_join = join(",", $setting_ids);
        $query = "DELETE FROM `ques_settings_element` WHERE `ques_id` = :ques_id AND `setting_id` IN ($setting_id_join)";

        $bindParams = array("ques_id" => $ques_id);

        $id = $this->con->insertQuery($query, $bindParams);
        return $id;
    }

}
