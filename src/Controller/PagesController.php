<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;



use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\Utility\Inflector;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Network\Email\Email;

class PagesController extends AppController {
    public $paginate = [
            'limit' => 10,
            
        ];
     public function initialize() {
        parent::initialize();
        $this->loadComponent('Settings');
        if(!$this->request->session()->read('Profile.id'))
        {
            $this->redirect('/login');
        }
        
    }
	public function index() {
	   $this->loadModel('Clients');

		$setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
        

        if($setting->client_list==0)
        {
            $this->set('hideclient',1);
            
        }
        else
        $this->set('hideclient',0);
		$this->set('client', $this->paginate($this->Clients));
	}
   
    
    function test()
    {
        $this->layout = 'blank';
    }
    
    function edit($slug)
    {
        $con['title'] = $_POST['title'];
        $con['`desc`'] = $_POST['editor1'];//die();
        $pages = TableRegistry::get("contents");
        $query = $pages->query();
                    $query->update()
                    ->set($con)
                    ->where(['slug'=>$slug])
                    ->execute();
        $this->redirect(['controller'=>'profiles','action'=>'index']);
    }
    function get_content($slug)
    {
        $content = TableRegistry::get("contents");
        //$query = $content->query();
          $l =  $content->find()->where(['slug'=>$slug])->first(); 
         $this->response->body(($l));
            return $this->response;
         die();
        
    }
    function cms($slug)
    {
        
    }
    function view($slug)
    {
        $content = TableRegistry::get("contents");
        //$query = $content->query();
          $l =  $content->find()->where(['slug'=>$slug])->first();
          $this->set('content',$l);
    }
    function recent_more()
    {
        $this->layout = 'blank';
    }
    
    function sendEmail($from,$to,$subject,$message)
    {
        //from can be array with this structure array('email_address'=>'Sender name'));
        $email = new Email('default');
        
        $email->from($from)
        ->emailFormat('html')
    ->to($to)
    ->subject($subject)
    ->send($message);
    }
    function test_email()
    {
        $this->sendEmail(array('justdoit2045@gmail.com'=>'Email tester'),array('reshma.alee@gmail.com','justdoit_2045@hotmail.com'),'Test email','<b>This is test emaikl</b>');
        die('here');
    }
}
