<?php

class UserController extends \Phalcon\Mvc\Controller{
    public function indexAction(){
        $this->view->setVars([
            'single' => User::findFirstById(1),
            'all' => 2,
        ]);
    }

    public function createAction(){
        
        $user = new User();
        $user->email = "test@test.com";
        $user->password = "test";
        $user->created_at = date("Y-m-d");
        $result = $user-> save();
        if(!$result){
            print_r($user->getMessages());
        }
    }

    public function updateAction(){
        $user = User::findFirstById(1);
        if(!$user){
            echo "User does not exist";
            die;
        }
        $user->email = "updated@test.com";
        $result = $user->save();
        if(!$result){
            print_r($user->getMessages());
        }
    }
}


?>