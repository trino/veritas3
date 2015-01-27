<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/**
 * Logos Controller
 *
 * @property App\Model\Table\LogosTable $Logos
 */
class LogosController extends AppController {
/**
 * Index method
 *
 * @return void
 */
 
 public function intialize()
    {
        parent::intialize();
        $this->loadComponent('Settings');
        if(!$this->request->session()->read('Profile.id'))
        {
            redirect('/login');
        }
    }
	public function index() {
		$lg = $this->paginate($this->Logos->find()->where(['secondary'=>'0']));
        $this->set('logos', $this->paginate($this->Logos->find()->where(['secondary'=>'0'])));
         if ($this->request->is(['post', 'put'])){
            //var_dump($lg);die();
            foreach($lg as  $l)
            {

                $log = TableRegistry::get('Logos');
                $query = $log->query();
                $query->update()
                ->set(['active' => 0])
                ->where(['id' => $l->id])
                ->execute();
                
                
            }
            $id = $_POST['logo'];
            $logo = TableRegistry::get('Logos');
                $query1 = $logo->query();
                if($query1->update()->set(['active' => 1])->where(['id' => $id])->execute())
            {
                $this->Flash->success(__('Your Logo has been updated.'));
                return $this->redirect(['controller'=>'profiles','action' => 'add']);
            }
            $this->Flash->error(__('Unable to update logo.'));
         }
        
	}
    function ajaxlogo()
    {
        $lg = $this->Logos->find()->where(['secondary'=>'0']);
        foreach($lg as  $l)
        {

            $log = TableRegistry::get('Logos');
            $query = $log->query();
            $query->update()
            ->set(['active' => 0])
            ->where(['id' => $l->id])
            ->execute();
            
            
        }
        $id = $_POST['logo'];
        $logo = TableRegistry::get('Logos');
            $query1 = $logo->query();
            $query1->update()->set(['active' => 1])->where(['id' => $id])->execute();
       die();
    }
    function ajaxlogo1()
    {
        $lg = $this->Logos->find()->where(['secondary'=>'1']);
        foreach($lg as  $l)
        {

            $log = TableRegistry::get('Logos');
            $query = $log->query();
            $query->update()
            ->set(['active' => 0])
            ->where(['id' => $l->id])
            ->execute();
            
            
        }
        $id = $_POST['logo'];
        $logo = TableRegistry::get('Logos');
            $query1 = $logo->query();
        $query1->update()->set(['active' => 1])->where(['id' => $id])->execute();
        
           die();
    }
    function ajaxlogo2()
    {
        $lg = $this->Logos->find()->where(['secondary'=>'2']);
        foreach($lg as  $l)
        {

            $log = TableRegistry::get('Logos');
            $query = $log->query();
            $query->update()
            ->set(['active' => 0])
            ->where(['id' => $l->id])
            ->execute();
            
            
        }
        $id = $_POST['logo'];
        $logo = TableRegistry::get('Logos');
            $query1 = $logo->query();
        $query1->update()->set(['active' => 1])->where(['id' => $id])->execute();
        
           die();
    }
    public function secondary() {
		$lg = $this->paginate($this->Logos->find()->where(['secondary'=>'1']));
        $this->set('logos', $this->paginate($this->Logos->find()->where(['secondary'=>'1'])));
         if ($this->request->is(['post', 'put'])){
            //var_dump($lg);die();
            foreach($lg as  $l)
            {

                $log = TableRegistry::get('Logos');
                $query = $log->query();
                $query->update()
                ->set(['active' => 0])
                ->where(['id' => $l->id])
                ->execute();
                
                
            }
            $id = $_POST['logo'];
            $logo = TableRegistry::get('Logos');
                $query1 = $logo->query();
                if($query1->update()->set(['active' => 1])->where(['id' => $id])->execute())
            {
                $this->Flash->success(__('Your Logo has been updated.'));
                return $this->redirect(['controller'=>'profiles','action' => 'add']);
            }
            $this->Flash->error(__('Unable to update logo.'));
         }
        
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$logo = $this->Logos->get($id, [
			'contain' => []
		]);
		$this->set('logo', $logo);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$logo = $this->Logos->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Logos->save($logo)) {
				$this->Flash->success('The logo has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The logo could not be saved. Please try again.');
			}
		}
		$this->set(compact('logo'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$logo = $this->Logos->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$logo = $this->Logos->patchEntity($logo, $this->request->data);
			if ($this->Logos->save($logo)) {
				$this->Flash->success('The logo has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The logo could not be saved. Please try again.');
			}
		}
		$this->set(compact('logo'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$logo = $this->Logos->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->Logos->delete($logo)) {
			$this->Flash->success('The logo has been deleted.');
		} else {
			$this->Flash->error('The logo could not be deleted. Please try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
    
    function getlogo($type)
    {
        
        $logo = TableRegistry::get('Logos');
        $query = $logo->find();
        $query->select(['logo'])->where(['active' => 1, 'secondary'=>$type]);
        $lg = $query->first();
        //var_dump($lg);die();
        $log = $lg['logo']; 
        /*foreach($query as $q)
        {
           $log = $q->logo; 
        }*/
        //if (!$this->request->is('requested')) {
            $this->response->body(($log));
            return $this->response;
        //}
        //$this->set('logo', $log);
        //return $log;
        die();
        
    }
    
    function change_layout()
    {
         $layout = $_POST['layout'];
         $setting = TableRegistry::get('Settings');
         $query = $setting->query();
                $query->update()
                ->set(['layout' => $layout])
                ->where(['id' => 1])
                ->execute();
         
         die();
    }
    function get_layout()
    {
         
         $setting = TableRegistry::get('Settings');
         $query = $setting->find();
                 $query->select(['layout']);
         $l = $query->first();
         $layout = $l->layout;        
         $this->response->body(($layout));
            return $this->response;
         die();
    }

}
