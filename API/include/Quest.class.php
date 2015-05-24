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

    public function createQuestionnaire($name,$user_id,$start_date,$end_date) {

        $query = "INSERT INTO `ques_user_xref`(`ques_name`, `user_id`, `start_date`, `end_date`) VALUES (:ques_name,:user_id,SYSDATE(),SYSDATE())";

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
    
     public function insertQuesSetting($ques_id,$setting_id) {

        $query = "INSERT INTO `ques_settings`(`ques_id`, `setting_id`, `active`) VALUES (:ques_id,:setting_id,1)";

        $bindParams = array("ques_id" => $ques_id, "setting_id" => $setting_id);

        $id = $this->con->insertQuery($query, $bindParams);
        return $id;
    }

}
