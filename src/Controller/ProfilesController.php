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
        $this->set('id',$id);
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
        //$this->request->session()->delete('Profile.id');
       $this->request->session()->destroy();
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
            //var_dump($_POST)
            $sides = array('profile_list','profile_create','client_list','client_create','document_list','document_create');
            foreach($sides as $s)
            {
                if(!isset($_POST['side'][$s]))
                $side[$s] = 0;
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
    
    function getSub()
    {
        $sub = TableRegistry::get('Subdocuments');
        $query = $sub->find();
        $q = $query->select();
        
        
            $this->response->body($q);
            return $this->response;
        
        die();
    }
    
    function getProSubDoc($pro_id,$doc_id)
    {
        $sub = TableRegistry::get('Profilessubdocument');
        $query = $sub->find();
        $query->select()->where(['profile_id'=>$pro_id, 'subdoc_id'=>$doc_id]);
        $q = $query->first();
        $this->response->body($q);
        return $this->response;
    }
    
    function displaySubdocs($id)
    {
        //var_dump($_POST);die();
        $user['profile_id'] = $id;
        $display = $_POST; //defining new variable for system base below upcoming foreach
        
        //for user base
        foreach($_POST as $k=>$v)
        {
            if($k=='profileP')
            {
                foreach($_POST[$k] as $k2=>$v2)
                {
                    $subp = TableRegistry::get('Profilessubdocument');
                    $query = $subp->find();
                    $query->select()
                    ->where(['profile_id' => $id,'subdoc_id' => $k2]);
                    $check=$query->first();
                    
                    if($v2 == ''){

                    if($check)
                    {
                        $query2 = $subp->query();
                        $query2->update()
                        ->set(['display'=>$_POST['profile'][$k2]])
                        ->where(['profile_id' => $id,'subdoc_id' => $k2])
                        ->execute();
                    }
                    else
                    {
                        
                       $query2 = $subp->query();
                        $query2->insert(['profile_id','subdoc_id', 'display'])
                        ->values(['profile_id' => $id,'subdoc_id' => $k2,'display'=>$_POST['profile'][$k2]])
                        ->execute(); 
                    }
                    }
                    else
                    {
                      if($check)
                        {
                            $query2 = $subp->query();
                            $query2->update()
                            ->set(['display'=>0])
                            ->where(['subdoc_id' => $k2,'profile_id' => $id])
                            ->execute();
                        }
                        else
                        {
                           $query2 = $subp->query();
                            $query2->insert(['profile_id','subdoc_id', 'display'])
                            ->values(['profile_id'=>$id,'subdoc_id' => $k2,'display'=>0])
                            ->execute(); 
                        }  
                    }
                    
                }
            }
        }
        unset($display['profileP']);
        unset($display['profile']);
        
        //For System base
        foreach($display as $k=>$v)
        {
            $subd = TableRegistry::get('Subdocuments'); 
            $query3 = $subd->query(); 
            $query3->update()
                        ->set(['display'=>$v])
                        ->where(['id' => $k])
                        ->execute();      
        }
        
        
        //var_dump($str);
        die('here');
    }
    
   
    
    

}
