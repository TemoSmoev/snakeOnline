<?php
/**
 * Created by PhpStorm.
 * User: Temo Smoev
 * Date: 6/23/2018
 * Time: 12:39 PM
 */

class UserController
{
    public function actionRegister(){
        $username='';
        $password1='';
        $password2='';
        $result=false;

        if(isset($_POST['submit'])){
            $username=$_POST['username'];
            $password1=$_POST['password1'];
            $password2=$_POST['password2'];

            $errors=false;

            //მარტივი ვალიდაცია
            if(!User::checkName($username)){
                $errors[]='username should contain more than 2 symbols';
            }
            if(!User::checkPassword($password1) || !User::checkPassword($password2)){
                $errors[]='password should contain more than 5 symbols';
            }
            if ($password1!=$password2){
                $errors[]="the passwords don't match";
            }
            if(User::checkLogin($username)){
                $errors[]='this username already exists, try another one';
            }
            // თუ მომხმარებელმა ვალიდაცია წარმატებით გაიარა, ვარეგისტრირებთ მომხმარებელს ბაზაში და ვქმნით მისთვის სესიას
            if($errors==false){
                $result=User::register($username, $password1);
                $userId=User::checkUserData($username,$password1);  // name-ისა და password-ის მიხედვით გავიგებ ID-ის, რომელსაც სესიაში ჩავწერ
                User::auth($userId);
                header("Location: /snake/congrats");

            }
        }
        require_once (ROOT.'/views/register.php');
    }


    public function actionLogin(){
        //მომხმარებელი თუ არის უკვე შესული აქაუნთში გადავამისამართოთ პირდაპირ თამაშზე
        if(isset($_SESSION['user'])){
            header("Location: /snake/game");
        }

        $username = false;
        $password = false;

        // ფორმის ვალიდაცია
        if (isset($_POST['submit'])) {
            // თუ ფორმა გაგზავნილია ვამუშავებთ მონაცემებს
            $username = $_POST['username'];
            $password = $_POST['password'];

            $errors = false;
            //username-ის ვალიდაცია(ვამოწმებთ არსებობს თუ არა username ბაზაში)
            if (!User::checkLogin($username)) {
                $errors[] = "sorry but we couldn't find such a user";
            }
            //password-ის ვალიდაცია
            if (!User::checkPassword($password)) {
                $errors[] = 'password';
            }

            // ვამოწმებთ არსებობს თუ არა მომხმარებელი
            $userId = User::checkUserData($username, $password);

            if ($userId == false) {
                // თუ მონაცემები არასწორია ვავსებთ მასივს შეტყობინებებით.
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // თუ სწორია ვქმნით სესიას
                User::auth($userId);

                //გადავამისამართოთ მომხმარებელი თამაშზე
                header('Location:/snake/');
            }
        }

        require_once (ROOT.'/views/login.php');
        return true;
    }

    public function actionCongrats(){
        require_once (ROOT.'/views/congrats.php');
    }
    public function actionLogout(){
        unset($_SESSION['user']);
        header('Location:/snake/');
    }
    public function actionScore($score){

        echo User::updateScore($score);

    }
}