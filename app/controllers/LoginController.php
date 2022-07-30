<?php

class LoginController extends \Phalcon\Mvc\Controller{

    public function initialize(){
        $this->view->setTemplateAfter('login');
        //echo "Login";
    }
    
    public function indexAction(){
        echo "Login";
    }

    //login/process/<jessie>/<12>
    public function processAction($username = false, $age = 12){
        
        $this->view->setVar('username', $username);
        $this->view->setVar('age', $age);
        }

    public function testAction(){
        echo "--TEST ACTION --";
    }
}


?>