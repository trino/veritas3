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
            $id = $docx->id;
                    
            $updates = $docs->query();
               $update = $updates->update()
                ->set($feedback)
                ->where(['id' => $id])
                ->execute();
            	
        }
        else
        {
            $doc = $docs->newEntity($_POST);
    		if ($this->request->is('post')) {
    		  
    			if ($docs->save($doc)) {
    				$this->Flash->success('The feedback has been sent.');
                    	//return $this->redirect('/documents/index');
    			} else {
    				$this->Flash->error('Feedback not sent. Please try again.');
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