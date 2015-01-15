<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;
use Cake\Network\Email\Email;


class FeedbacksController extends AppController{
    
    public function intialize()
    {
        parent::intialize();
        $this->loadComponent('Settings');
        if(!$this->request->session()->read('Profile.id'))
        {
            redirect('/login');
        }
    }
    
    public function index()
    {
        
    }
    
    public function add($order_id,$cid)
    {
        if(isset($_GET['document']))
        {
            $_POST['document_id'] = $order_id;
        }
        $_POST['client_id'] = $cid;
        $_POST['user_id'] = $this->request->session()->read('Profile.id');
        
        
        $docs = TableRegistry::get('Feedbacks');
        if($docx = $docs->find()->where(['document_id'=>$order_id])->first())
        {
            
            $feedback['title']= $_POST['title'];
            $feedback['description'] = $_POST['description'];
            $feedback['reason'] = $_POST['reason'];
            $feedback['scale'] = $_POST['scale'];
            $feedback['suggestion'] = $_POST['suggestion'];
            //var_dump($docx);
            // var_dump($feedback);
            //die();
            $id = $docx->id;
                    
            $updates = $docs->query();
               $update = $updates->update()
                ->set($feedback)
                ->where(['id' => $id])
                ->execute();
             if($update)
            	   echo "OK";
            	
        }
        else
        {
            //die('2');
            $doc = $docs->newEntity($_POST);
    		if ($this->request->is('post')) {
    		  
    			if ($docs->save($doc)) {
    			     echo "OK";
    				$this->Flash->success('The feedback has been sent.');
                    	//return $this->redirect('/documents/index');
    			} else {
    			 echo "ss";
    				$this->Flash->error('Feedback not sent. Please try again.');
                    //return $this->redirect('/feedbacks/add');
    			}
    		}
        }
		//$this->set(compact('client'));
        //$this->render('add');
        die();
    }
    public function addsurvey($order_id,$cid)
    {
        if(isset($_GET['document']))
        {
            $_POST['document_id'] = $order_id;
        }
        $_POST['client_id'] = $cid;
        $_POST['user_id'] = $this->request->session()->read('Profile.id');
        
        
        $docs = TableRegistry::get('Survey');
        if($docx = $docs->find()->where(['document_id'=>$order_id])->first())
        {
            $survey['ques1']= $_POST['ques1'];
            $survey['ques2a'] = $_POST['ques2a'];
            $survey['ques2b'] = $_POST['ques2b'];
            $survey['ques2c'] = $_POST['ques2c'];
            $survey['ques4'] = $_POST['ques4'];
            $survey['ans4'] = $_POST['ans4'];
            $id = $docx->id;
                    
            $updates = $docs->query();
               $update = $updates->update()
                ->set($survey)
                ->where(['id' => $id])
                ->execute();
                if($update)
            	   echo "OK";
        }
        else
        {
            $doc = $docs->newEntity($_POST);
    		if ($this->request->is('post')) {
    		  
    			if ($docs->save($doc)) {
    			      echo "OK";
    				$this->Flash->success('The Survey has been sent.');
                    	//return $this->redirect('/documents/index');
    			} else {
    				$this->Flash->error('Survey not sent. Please try again.');
                    //return $this->redirect('/feedbacks/add');
    			}
    		}
        }
		//$this->set(compact('client'));
        $this->render('add');
        die();
    }
    public function edit($id = NULL)
    {
        
        $docs = TableRegistry::get('Documents');
        $query = $docs->find()->where(['id'=>$id]);
        $feeds = $query->first();
        
        $doc = $docs->newEntity($_POST);
		if ($this->request->is('post')) {
		      $updates = $docs->query();
               $update = $updates->update()
                ->set($_POST)
                ->where(['id' => $id])
                ->execute();
			if ($update) {
				$this->Flash->success('The feedback has been sent.');
                	return $this->redirect('/documents/index');
			} else {
				$this->Flash->error('Feedback not sent. Please try again.');
                return $this->redirect('/feedbacks/add');
			}
		}
        $this->set(compact('feeds'));
        $this->render('add');
    }
    
  
}

?>