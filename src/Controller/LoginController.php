<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\View\Helper\FlashHelper;
use Cake\Controller\Component\FlashComponent;
class LoginController extends AppController{
    public function initialize() {
        parent::initialize();
        $this->loadComponent('Settings');
        if($this->request->session()->read('Profile.id'))
        {
            $this->redirect('/pages');
        }
        
    }
    function index()
    {
        
        $this->layout = 'login';
        if(isset($_POST['name'])){
        $this->loadModel('Profiles');
        unset($_POST['submit']);
        $_POST['username'] = $_POST['name'];
        unset($_POST['name']);
        $q = $this->Profiles->find()->where($_POST)->first();
        
        if($q)
        {
            //die('here');
            $this->request->session()->write('Profile.id',$q->id);
            $this->request->session()->write('Profile.username',$q->username);
            $this->request->session()->write('Profile.fname',$q->fname);
            $this->request->session()->write('Profile.lname',$q->lname);
            $this->request->session()->write('Profile.isb_id',$q->isb_id);
            $this->request->session()->write('Profile.mname',$q->mname);
            $this->request->session()->write('Profile.profile_type',$q->profile_type);
            if(($q->admin ==1) || ($q->super==1))
            {
                $this->request->session()->write('Profile.admin',1);
                if($q->super == 1)
                $this->request->session()->write('Profile.super',1);
            }
            
        }
        else{
            $this->Flash->error('Invalid username or password');
        }
        $this->redirect('/pages');
        }else
        {
           // die();
        }
    }
} 