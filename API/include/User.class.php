<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User {

    protected $con;

    function __construct() {

        $this->con = new Connection();
    }

    public function getUserDetails($userID) {

        $query = "SELECT ul.accessToken,uf.userID,uf.firstName,uf.lastName,uf.profilePic,ul.userType FROM `User_Profile` uf, `User_Login` ul  WHERE ul.userID = :userID and ul.userid = uf.userid LIMIT 1";

        $qh = $this->con->getQueryHandler($query, array("userID" => $userID));

        return $qh->fetch(PDO::FETCH_ASSOC);
    }

    public function authenticateUser($username, $password, $accountType) {

        $hashPass = substr(hash('sha512', $password), 0, 20);

        if ($accountType == "-1") {

            $query = "SELECT userID FROM `User_Login` WHERE accessToken = :accessToken AND password = :password AND role = :role LIMIT 1";

            $bindParams = array("accessToken" => $username, "password" => $hashPass, "role" => "1");
        } else {

            $query = "SELECT `id`, `access_token` FROM `user_login` WHERE `username`=:username AND `password` = :password AND role = :role LIMIT 1";

            $bindParams = array("username" => $username, "password" => $hashPass, "role" => "1");
        }



        $qh = $this->con->getQueryHandler($query, $bindParams);

        $res = $qh->fetch(PDO::FETCH_ASSOC);

        if (isset($res["access_token"]) && $res["access_token"] != "") {

            return $res["access_token"];
        }

        return -1;
    }

    public function insertUser($username, $password, $role) {

        $accessToken = sha1(substr(md5($username), 0, 15));
       

        $hashPass = substr(hash('sha512', $password), 0, 20);

        $query = "INSERT INTO `user_login`(`access_token`, `username`, `password`, `role`, `active`) VALUES (:access_token,:username,:password,:role,1)";

        $bindParams = array("access_token" => $accessToken,"username"=>$username, "password" => $hashPass, "role" => $role);

        $id = $this->con->insertQuery($query, $bindParams);

        return $id;
    }
    
     public function deleteUser($userID) {
     
        $query = "DELETE FROM `user_login` WHERE `id` = :user_id";

        $bindParams = array("user_id"=>$userID);

        $id = $this->con->insertQuery($query, $bindParams);

        return $id;
    }

    public function checkUser($username) {

        $query = "SELECT COUNT(*) as count FROM `user_login` WHERE `username` = :username";

        $bindParams = array("username" => $username);

        $qh = $this->con->getQueryHandler($query, $bindParams);

        $res = $qh->fetch(PDO::FETCH_ASSOC);

        $bool = ($res["count"] > 0) ? false : true;

        return $bool;
    }

    public function checkAccountID($accountID, $accountType) {

        $query = "SELECT userID FROM `User_Login` WHERE `accountID` = :accountID and `accountType` = :accountType";

        $bindParams = array("accountID" => $accountID, "accountType" => $accountType);

        $qh = $this->con->getQueryHandler($query, $bindParams);

        $res = $qh->fetch(PDO::FETCH_ASSOC);

        $userID = (!isset($res["userID"]) || $res["userID"] == "" || $res["userID"] == 0) ? -1 : $res["userID"];

        return $userID;
    }

    public function insertUserProfile($userID, $firstname, $lastname, $email, $gender, $country, $state, $city, $phone = "", $skypeID = "", $bio = "", $pic = "") {

        $query = "INSERT INTO `User_Profile`(`userID`, `firstName`, `lastName`, `profilePic`, `phone`, `email`, `skypeID`, `bio`, `resume`,`gender`,`country`,`state`,`city`) VALUES (:userID,:firstName,:lastName,:profilePic,:phone,:email,:skypeID,:bio,:resume,:gender,:country,:state,:city)";

        $bindParams = array("userID" => $userID, "firstName" => $firstname, "lastName" => $lastname, "profilePic" => $pic, "phone" => $phone, "email" => $email, "skypeID" => $skypeID, "bio" => $bio, "resume" => "", "gender" => $gender, "country"=>$country,"state"=>$state, "city"=>$city);

        $id = $this->con->insertQuery($query, $bindParams);

        return $id;
    }

    public function getUserIDFromAccToken($accessToken) {

        $query = "SELECT `userID` FROM `User_Login` WHERE `accessToken` = :accessToken";

        $bindParams = array("accessToken" => $accessToken);

        $qh = $this->con->getQueryHandler($query, $bindParams);

        $res = $qh->fetch(PDO::FETCH_ASSOC);

        $userID = isset($res["userID"]) ? $res["userID"] : "-1";

        return $userID;
    }
  
    public function updatePassword($accessToken, $password) {

        $hashPass = substr(hash('sha512', $password), 0, 20);

        $query = "UPDATE `User_Login` SET `password` = :password WHERE `accessToken` = :accessToken";

        $bindParams = array("password" => $hashPass, "accessToken" => $accessToken);

        $id = $this->con->insertQuery($query, $bindParams);

        return $id;
    }
    
    public function getUserType($userID)
    {
        $query = "SELECT `userType` FROM `User_Login` WHERE `userID` = :userID LIMIT 1";

        $qh = $this->con->getQueryHandler($query, array("userID" => $userID));

        $userType = $qh->fetch(PDO::FETCH_ASSOC);
        
        return $userType['userType'];
    }
    
    
    public function resetPassword($userID, $password) {

        $hashPass = substr(hash('sha512', $password), 0, 20);

        $query = "UPDATE `User_Login` SET `password` = :password WHERE `userID` = :userID";

        $bindParams = array("password" => $hashPass, "userID" => $userID);

        $id = $this->con->insertQuery($query, $bindParams);

        return $id;
    }

}
