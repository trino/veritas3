<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;


class FeedbacksController extends AppController{
    
    public function intialize()
    {
        parent::intialize();
        if(!$this->request->session()->read('Profile.id'))
        {
            redirect('/login');
        }
    }
    
    public function index()
    {
        
    }
    
    public function add()
    {
        //$this->set('disabled',1);
        
        $docs = TableRegistry::get('Documents');
        $doc = $docs->newEntity($_POST);
		if ($this->request->is('post')) {
		  
			if ($docs->save($doc)) {
				$this->Flash->success('The feedback has been sent.');
                	return $this->redirect('/documents/index');
			} else {
				$this->Flash->error('The feedback could not be sent. Please, try again.');
                return $this->redirect('/feedbacks/add');
			}
		}
		//$this->set(compact('client'));
        $this->render('add');
    }
}

?>