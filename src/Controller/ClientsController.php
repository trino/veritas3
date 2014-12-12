<?php 
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Controller\Controller;


class ClientsController extends AppController {


    public $paginate = [
            'limit' => 10,
            
        ];
     public function initialize() {
        parent::initialize();
        if(!$this->request->session()->read('User.id'))
        {
            $this->redirect('/login');
        }
        
    }
    
	public function index() {
	   
		$this->set('client', $this->paginate($this->Clients));
	}



	public function view($id = null) {
		$this->set('disabled',1);
        $this->render('add');
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$user = $this->Clients->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Clients->save($user)) {
				$this->Flash->success('The user has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The user could not be saved. Please, try again.');
			}
		}
		$this->set(compact('user'));
        //$this->render('edit');
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$user = $this->Clients->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$user = $this->Clients->patchEntity($user, $this->request->data);
			if ($this->Clients->save($user)) {
				$this->Flash->success('The user has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The user could not be saved. Please, try again.');
			}
		}
		$this->set(compact('user'));
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
		$user = $this->Clients->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->Clients->delete($user)) {
			$this->Flash->success('The user has been deleted.');
		} else {
			$this->Flash->error('The user could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
    
    function quickcontact()
    {
        
    }
    
}
