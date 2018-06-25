<?php
class gameController{
    public function actionGame(){
        if(isset($_SESSION['user'])){
            $userData=User::getUserDataFromId($_SESSION['user']);
            require_once (ROOT.'/views/game/game.php');
        }
        else{
            header('Location:/snake/');
        }
    }
}