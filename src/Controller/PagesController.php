<?php

namespace App\Controller;
use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\Utility\Inflector;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;


class PagesController extends AppController {

     public function initialize() {
        parent::initialize();
        if(!$this->request->session()->read('Profile.id'))
        {
            $this->redirect('/login');
        }
        
    }
	public function index() {
		
	}
    
    function test()
    {
        $this->layout = 'blank';
    }
    
    function edit($slug)
    {
        $con['title'] = $_POST['title'];
        echo $con['`desc`'] = $_POST['editor1'];//die();
        $pages = TableRegistry::get("contents");
        $query = $pages->query();
                    $query->update()
                    ->set($con)
                    ->where(['slug'=>$slug])
                    ->execute();
        $this->redirect(['controller'=>'profiles','action'=>'add']);
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
}
