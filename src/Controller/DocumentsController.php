<?php 
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Controller\Controller;


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
	   
		//$this->set('client', $this->paginate($this->Jobs));
	}



	public function view($id = null) {
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
}
