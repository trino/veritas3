<?php 
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;


class ClientsController extends AppController {


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
        
        if($setting->client_list==0)
        {
            $this->Flash->error('Sorry, You dont have the permissions.');
            	return $this->redirect("/");
            
        }
		$this->set('client', $this->paginate($this->Clients));
	}
    
    function search()
    {
        $setting = $this->get_permission($this->request->session()->read('Profile.id'));
        
        if($setting->client_list==0)
        {
            $this->Flash->error('Sorry, You dont have the permissions.');
            	return $this->redirect("/");
            
        }
		
        
        $search = $_GET['search'];
        $searchs = strtolower($search);
        $querys = TableRegistry::get('Clients');
        $query = $querys->find()->where(['LOWER(title) LIKE' => '%'.$searchs.'%']);
        $this->set('client', $this->paginate($this->Clients)); 
        $this->set('client',$query);
        $this->set('search_text',$search);
        $this->render('index');
    }



	public function view($id = null) {
	   $setting = $this->get_permission($this->request->session()->read('Profile.id'));
        
        if($setting->client_list==0)
        {
            $this->Flash->error('Sorry, You dont have the permissions.');
            	return $this->redirect("/");
            
        }
		//$this->set('disabled',1);
        //$this->render('add');
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
	   $setting = $this->get_permission($this->request->session()->read('Profile.id'));
        
        if($setting->client_create==0)
        {
            $this->Flash->error('Sorry, You dont have the permissions.');
            	return $this->redirect("/");
            
        }
        $rec='';
        $con='';
        $count=1;
        if(isset($_POST['recruiter_id'])){
        foreach($_POST['recruiter_id'] as $ri)
        {
        	if($count==1)	
        	$rec = $ri;
        	else
        	$rec = $rec.','.$ri;
            $count++;
        
        }
        }
        unset($_POST['recruiter_id']);
        $_POST['recruiter_id'] = $rec;
        
        if(isset($_POST['contact_id'])){
        foreach($_POST['contact_id'] as $ri)
        {
        	if($count==1)	
        	$rec = $ri;
        	else
        	$rec = $rec.','.$ri;
            $count++;
        
        }
        }
        unset($_POST['contact_id']);
        $_POST['contact_id'] = $rec;
	   $clients = TableRegistry::get('Clients');
        $client = $clients->newEntity($_POST);
		if ($this->request->is('post')) {
		  
			if ($clients->save($client)) {
				$this->Flash->success('The user has been saved.');
                	return $this->redirect(['action' => 'edit',$client->id]);
			} else {
				$this->Flash->error('The user could not be saved. Please, try again.');
			}
		}
		$this->set(compact('client'));
        $this->set('recruiters',array());
        $this->set('contacts',array());
        $this->render('add');
	}
    
    public function saveClients() {
	   
        $rec='';
        $con='';
        $count=1;
        if(isset($_POST['recruiter_id'])){
        foreach($_POST['recruiter_id'] as $ri)
        {
        	if($count==1)	
        	$rec = $ri;
        	else
        	$rec = $rec.','.$ri;
            $count++;
        
        }
        }
        unset($_POST['recruiter_id']);
        $_POST['recruiter_id'] = $rec;
        
        if(isset($_POST['contact_id'])){
        foreach($_POST['contact_id'] as $ri)
        {
        	if($count==1)	
        	$rec = $ri;
        	else
        	$rec = $rec.','.$ri;
            $count++;
        
        }
        }
        unset($_POST['contact_id']);
        $_POST['contact_id'] = $rec;
	   $clients = TableRegistry::get('Clients');
        $client = $clients->newEntity($_POST);
		if ($this->request->is('post')) {
		  
			if ($clients->save($client)) {
				$this->Flash->success('The client has been saved.');
                	echo $client->id;
			} else {
			     $this->Flash->error('The client could not be saved. Please, try again.');
				echo "e";
			}
		}
		die();
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
        
        if($setting->client_edit==0)
        {
            $this->Flash->error('Sorry, You dont have the permissions.');
            	return $this->redirect("/");
            
        }
		$client = $this->Clients->get($id, [
			'contain' => []
		]);
        $arr = explode(',',$client->recruiter_id);
        $arr2 = explode(',',$client->contact_id);

		if ($this->request->is(['patch', 'post', 'put'])) {
			$clients = $this->Clients->patchEntity($client, $this->request->data);
			if ($this->Clients->save($clients)) {
				$this->Flash->success('The user has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The user could not be saved. Please, try again.');
			}
		}
		$this->set(compact('client'));
        $this->set('id',$id);
        $this->set('recruiters',$arr);
        $this->set('contacts',$arr2);
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
        
        if($setting->client_delete==0)
        {
            $this->Flash->error('Sorry, You dont have the permissions.');
            	return $this->redirect("/");
            
        }
		$profile = $this->Clients->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->Clients->delete($profile)) {
			$this->Flash->success('The user has been deleted.');
		} else {
			$this->Flash->error('The user could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
    
    function quickcontact()
    {
        
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
    
    function getCSubDoc($c_id,$doc_id)
    {
        $sub = TableRegistry::get('clientssubdocument');
        $query = $sub->find();
        $query->select()->where(['client_id'=>$c_id, 'subdoc_id'=>$doc_id]);
        $q = $query->first();
        $this->response->body($q);
        return $this->response;
    }
    
    function displaySubdocs($id)
    {
        //var_dump($_POST);die();
        $user['client_id'] = $id;
        $display = $_POST; //defining new variable for system base below upcoming foreach
        
        //for user base
        foreach($_POST as $k=>$v)
        {
            if($k=='clientC')
            {
                foreach($_POST[$k] as $k2=>$v2)
                {
                    $subp = TableRegistry::get('clientssubdocument');
                    $query = $subp->find();
                    $query->select()
                    ->where(['client_id' => $id,'subdoc_id' => $k2]);
                    $check=$query->first();
                    
                    if($v2 == ''){

                    if($check)
                    {
                        $query2 = $subp->query();
                        $query2->update()
                        ->set(['display'=>$_POST['client'][$k2]])
                        ->where(['client_id' => $id,'subdoc_id' => $k2])
                        ->execute();
                    }
                    else
                    {
                        
                       $query2 = $subp->query();
                        $query2->insert(['client_id','subdoc_id', 'display'])
                        ->values(['client_id' => $id,'subdoc_id' => $k2,'display'=>$_POST['client'][$k2]])
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
                            ->where(['subdoc_id' => $k2,'client_id' => $id])
                            ->execute();
                        }
                        else
                        {
                           $query2 = $subp->query();
                            $query2->insert(['client_id','subdoc_id', 'display'])
                            ->values(['client_id'=>$id,'subdoc_id' => $k2,'display'=>0])
                            ->execute(); 
                        }  
                    }
                    
                }
            }
        }
        unset($display['clientC']);
        unset($display['client']);
        
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
    
}
?>