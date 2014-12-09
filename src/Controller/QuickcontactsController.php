<?php 
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Controller\Controller;


class QuickcontactsController extends AppController {


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
	   $this->loadModel('Jobs');
		$this->set('job', $this->paginate($this->Jobs));
	}



	public function view($id = null) {
		$user = $this->Jobs->get($id);
		$this->set('user', $user);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
	   $this->loadModel('Jobs');
		$user = $this->Jobs->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Jobs->save($user)) {
				$this->Flash->success('The user has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The user could not be saved. Please, try again.');
			}
		}
		$this->set(compact('user'));
        $this->render('quickcontact');
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$user = $this->Jobs->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$user = $this->Jobs->patchEntity($user, $this->request->data);
			if ($this->Jobs->save($user)) {
				$this->Flash->success('The user has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The user could not be saved. Please, try again.');
			}
		}
		$this->set(compact('user'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$user = $this->Jobs->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->Jobs->delete($user)) {
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
