<?php 
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;


class ProfilesController extends AppController {

    public $paginate = [
            'limit' => 20,
            
        ];
     public function initialize() {
        parent::initialize();
        if(!$this->request->session()->read('Profile.id'))
        {
            $this->redirect('/login');
        }
        
    }
    
	public function index() {
	   
		$this->set('profiles', $this->paginate($this->Profiles));
	}



	public function view($id = null) {
	    $this->loadModel('Logos');
	    
        $this->set('logos', $this->paginate($this->Logos->find()->where(['secondary'=>'0'])));
        $this->set('logos1', $this->paginate($this->Logos->find()->where(['secondary'=>'1'])));
		$profile = $this->Profiles->get($id, [ 'contain' => []]);
		$this->set('profile', $profile);
        $this->set('disabled', 1);
        $this->render("edit");
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
	    $this->loadModel('Logos');
	    
        $this->set('logos', $this->paginate($this->Logos->find()->where(['secondary'=>'0'])));
        $this->set('logos1', $this->paginate($this->Logos->find()->where(['secondary'=>'1'])));
		$profile = $this->Profiles->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Profiles->save($profile)) {
				$this->Flash->success('The user has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The user could not be saved. Please, try again.');
			}
		}
		$this->set(compact('profile'));
        $this->render("edit");
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
        $this->loadModel('Logos');
	    
        $this->set('logos', $this->paginate($this->Logos->find()->where(['secondary'=>'0'])));
        $this->set('logos1', $this->paginate($this->Logos->find()->where(['secondary'=>'1'])));
		$profile = $this->Profiles->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$profile = $this->Profiles->patchEntity($profile, $this->request->data);
			if ($this->Profiles->save($profile)) {
				$this->Flash->success('The user has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The user could not be saved. Please, try again.');
			}
		}
		$this->set(compact('profile'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$profile = $this->Profiles->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->Profiles->delete($profile)) {
			$this->Flash->success('The user has been deleted.');
		} else {
			$this->Flash->error('The user could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
    
    function logout()
    {
        $this->request->session()->delete('Profile.id');
        $this->redirect('/login');
    }
    
    function todo()
    {
        
    }
    function todos(){
        $this->layout= 'blank';
    }
    
    function blocks()
    {
        if(isset($_POST['submit'])){
            foreach($_POST['block'] as $k=>$v)
            {
                $block[$k] = $v;
            }
            foreach($_POST['side'] as $k=>$v)
            {
                $side[$k] = $v;
            }
            
            $blocks = TableRegistry::get('blocks');
             $query = $blocks->query();
                    $query->update()
                    ->set($block)
                    ->where(['id' => 1])
                    ->execute();
            $sidebar = TableRegistry::get('sidebar');
             $query1 = $sidebar->query();
                    $query1->update()
                    ->set($side)
                    ->where(['id' => 1])
                    ->execute();
             $this->redirect(['controller'=>'profiles','action'=>'add']);
        }
    }
    
   
    
    

}
