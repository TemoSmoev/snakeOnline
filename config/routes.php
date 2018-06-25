<?php
return array(
    '^/*$'=>'user/login',
    'register'=>'user/register',
    'congrats'=>'user/congrats',
    'logout'=>'user/logout',
    'game'=>'game/game',
    'score/([0-9]+)'=>'user/score/$1'
);