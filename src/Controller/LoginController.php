<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Controller;
use Cake\Event\Event;
class LoginController extends AppController{
    public function initialize() {
        parent::initialize();
        if($this->request->session()->read('User.id'))
        {
            $this->redirect('/pages');
        }
        
    }
    function index()
    {
        
        $this->layout = 'login';
        if(isset($_POST['username'])){
        $this->loadModel('Users');
        unset($_POST['submit']);
        $q = $this->Users->find()->where($_POST)->first();
        
        if($q)
        {
            //die('here');
            $this->request->session()->write('User.id',$q->id);
            
        }
        $this->redirect('/pages');
        }
    }
} 