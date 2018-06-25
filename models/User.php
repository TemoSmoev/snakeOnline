<?php
/**
 * Created by PhpStorm.
 * User: Temo Smoev
 * Date: 6/23/2018
 * Time: 11:29 PM
 */

class User
{
    //მონაცემებს ვაინსერთებთ ბაზაში
    public static function register($username,$password){
        $db=Db::getConnection();

        $sql='INSERT INTO user (username,password) VALUES(:username, :password);';

        $result=$db->prepare($sql);
        $result->bindParam(':username',$username,PDO::PARAM_STR);
        $result->bindParam(':password',$password,PDO::PARAM_STR);

        $result->execute();

    }
    // username-ის ვალიდაცია
    public static function checkName($username){
        if(strlen($username)<3){
            return false;
        }
        return true;
    }
    //password-ის ვალიდაცია
    public static function checkPassword($password){
        if(strlen($password)<6){
            return false;
        }
        return true;
    }
    //username-ისა და password-ის მეშვეობით ვიგებთ ID-ის
    public static function checkUserData($username,$password){
        $db=Db::getConnection();
        $sql='SELECT id FROM user WHERE username=:username and password=:password;';
        $result=$db->prepare($sql);
        $result->bindParam(':username',$username,PDO::PARAM_STR);
        $result->bindParam(':password',$password,PDO::PARAM_STR);

        $result->execute();

        $user=$result->fetch();
        if($user){
            return $user['id'];
        }
        return false;
    }
    // ვქმნით სესიას
    public static function auth($userId){
        $_SESSION['user']=$userId;
    }
    //ვამოწმებთ დალოგინებულია თუ არა მომხმარებელი
    public static function checkLogged(){
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
    }
    //ვამოწმებთ არსებობს თუ არა ასეთი მომხმარებელი(ვიყენებთ რეგისტრაციის დროს)
    public static function checkLogin($username){
        $db=Db::getConnection();
        $sql='SELECT 1 FROM user WHERE username=:username';
        $result=$db->prepare($sql);
        $result->bindParam(':username',$username,PDO::PARAM_STR);
        $result->execute();
        $user=$result->fetch();
        if($user){
            return true;
        }
        return false;
    }
    //მონაცემების წაკითხვა ბაზიდან აიდის დახმარებით
    public static function getUserDataFromId($id){
        $db=Db::getConnection();
        $sql='SELECT * FROM user WHERE id=:id;';
        $result=$db->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_STR);

        $result->execute();

        $user=$result->fetch();
        if($user){
            return $user;
        }
        return false;
    }
    //მომხმარებლის საუკეთესო ქულის დამახსოვრება ბაზაში
    public static function updateScore($score){
        $db=Db::getConnection();
        $userId=$_SESSION['user'];
        $sql='UPDATE user SET score=:score WHERE id=:userId and :score>score;';
        $result=$db->prepare($sql);
        $result->bindParam(':score',$score,PDO::PARAM_STR);
        $result->bindParam(':userId',$userId,PDO::PARAM_STR);

        $result->execute();

    }
}