<?php 
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;


class DocumentsController extends AppController {


    public $paginate = [
            'limit' => 10,
            
        ];
     public function initialize() {
        parent::initialize();
        if(!$this->request->session()->read('Profile.id'))
        {
            $this->redirect('/login');
        }
        
    }
    
	public function index() {
	   
       $setting = $this->get_permission($this->request->session()->read('Profile.id'));
        
        if($setting->document_list==0)
        {
            $this->Flash->error('Sorry, You dont have the permissions.');
            	return $this->redirect("/");
            
        }
		//$this->set('client', $this->paginate($this->Jobs));
	}



	public function view($id = null) {
	   $setting = $this->get_permission($this->request->session()->read('Profile.id'));
        
        if($setting->document_list==0)
        {
            $this->Flash->error('Sorry, You dont have the permissions.');
            	return $this->redirect("/");
            
        }
		/*$profile = $this->Clients->get($id);
		$this->set('profile', $profile);*/
        $this->set('disabled', 1);
        $this->render('add');
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
	   $setting = $this->get_permission($this->request->session()->read('Profile.id'));
        
        if($setting->document_create==0)
        {
            $this->Flash->error('Sorry, You dont have the permissions.');
            	return $this->redirect("/");
            
        }
		/*$profile = $this->Clients->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Clients->save($profile)) {
				$this->Flash->success('The user has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The user could not be saved. Please, try again.');
			}
		}
		$this->set(compact('profile'));*/
        
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
	   $setting = $this->get_permission($this->request->session()->read('Profile.id'));
        
        if($setting->document_edit==0)
        {
            $this->Flash->error('Sorry, You dont have the permissions.');
            	return $this->redirect("/");
            
        }
		/*$profile = $this->Clients->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$profile = $this->Clients->patchEntity($profile, $this->request->data);
			if ($this->Clients->save($profile)) {
				$this->Flash->success('The user has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The user could not be saved. Please, try again.');
			}
		}
		$this->set(compact('profile'));*/
        $this->render('add');
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
	   $setting = $this->get_permission($this->request->session()->read('Profile.id'));
        
        if($setting->document_delete==0)
        {
            $this->Flash->error('Sorry, You dont have the permissions.');
            	return $this->redirect("/");
            
        }
		/*$profile = $this->Clients->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->Clients->delete($profile)) {
			$this->Flash->success('The user has been deleted.');
		} else {
			$this->Flash->error('The user could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);*/
	} 
    
    public function subpages($filename)
    {
        $this->layout="blank";
        $this->set("filename",$filename);
    }
    
    public function stats()
    {
        
    }
     public function drafts()
    {
        
    }
    
    public function getDocument()
    {
        $doc = TableRegistry::get('Subdocuments');
        $query = $doc->find();
        $query->select()->where(['display' => 1])->order('id');
        $this->response->body($query);
        return $this->response;
    }
    function get_permission($uid)
    {
        $setting = TableRegistry::get('sidebar');
         $query = $setting->find()->where(['user_id'=>$uid]); 
                 
         $l = $query->first();
         return $l;
         //$this->response->body(($l));
           // return $this->response;
         die();
    }
    
    function analytics1()
    {
        $this->layout = "blank";
    }
    
    function analytics()
    {
        
    }
    
    
}
