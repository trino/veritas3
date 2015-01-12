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
        $this->loadComponent('Settings');
        if(!$this->request->session()->read('Profile.id'))
        {
            $this->redirect('/login');
        }
        
    }
    function upload_img($id)
    {
        if(isset($_FILES['myfile']['name']) && $_FILES['myfile']['name'])
        {
            $arr = explode('.',$_FILES['myfile']['name']);
            $ext = end($arr);
            $rand = rand(100000,999999).'_'.rand(100000,999999).'.'.$ext;
            $allowed = array('jpg','jpeg','png','bmp','gif');
            $check = strtolower($ext);
            if(in_array($check,$allowed)){
                move_uploaded_file($_FILES['myfile']['tmp_name'],APP.'../webroot/img/profile/'.$rand);
                
                unset($_POST);
                $_POST['image'] = $rand;
                $img = TableRegistry::get('profiles');
                
                //echo $s;die();
                $query = $img->query();
                        $query->update()
                        ->set($_POST)
                        ->where(['id' => $id])
                        ->execute();
                        echo $rand;
                 
            }
            else
            {
                echo "error";
            }
        }
        die();
    }
	public function index() {
	   
        $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
        $u = $this->request->session()->read('Profile.id');
        $super = $this->request->session()->read('Profile.super');
        $cond = $this->Settings->getprofilebyclient($u,$super);
        if($setting->profile_list==0)
        {
            $this->Flash->error('Sorry, you don\'t have the required permissions.');
            	return $this->redirect("/");
            
        }
        //var_dump($cond);
        $query = $this->Profiles->find()->where(['OR'=>$cond]);
        //debug($query);
		$this->set('profiles', $this->paginate($query)); 
	}



	public function view($id = null) {
	   
       
        $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
        
        if($setting->profile_list==0)
        {
            $this->Flash->error('Sorry, you don\'t have the required permissions.');
            	return $this->redirect("/");
            
        }
	    $this->loadModel('Logos');
	    
        $this->set('logos', $this->paginate($this->Logos->find()->where(['secondary'=>'0'])));
        $this->set('logos1', $this->paginate($this->Logos->find()->where(['secondary'=>'1'])));
		$profile = $this->Profiles->get($id, [ 'contain' => []]);
		$this->set('profile', $profile);
        $this->set('disabled', 1);
        $this->set('id',$id);
        $this->render("edit");
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
	   
        $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
        
        if($setting->profile_create==0)
        {
            $this->Flash->error('Sorry, you don\'t have the required permissions.');
            	return $this->redirect("/");
            
        }
	    $this->loadModel('Logos');
	    
        $this->set('logos', $this->paginate($this->Logos->find()->where(['secondary'=>'0'])));
        $this->set('logos1', $this->paginate($this->Logos->find()->where(['secondary'=>'1'])));
		$profiles = TableRegistry::get('Profiles');
        if(isset($_POST['profile_type']) && $_POST['profile_type']==1)
            $_POST['admin']=1;
        $profile = $profiles->newEntity( $_POST);
        //var_dump($profile);die();
		if ($this->request->is('post')) {

            if ($profiles->save($profile)) {
			     $blocks = TableRegistry::get('Blocks');
			     $query2 = $blocks->query();
                        $query2->insert(['user_id'])
                        ->values(['user_id'=>$profile->id])
                        ->execute(); 
                $side = TableRegistry::get('Sidebar');
			     $query2 = $side->query();
                        $query2->insert(['user_id'])
                        ->values(['user_id'=>$profile->id])
                        ->execute(); 
				$this->Flash->success('User saved successfully.');
				return $this->redirect(['action' => 'edit',$profile->id]);
			} else {
                //var_dump($profiles->errors()); die();
			     //var_dump($profile);die();
				$this->Flash->error('The user could not be saved. Please try again.');
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
	   
        $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
        
        if($setting->profile_edit==0 && $id != $this->request->session()->read('Profile.id'))
        {
            $this->Flash->error('Sorry, you don\'t have the required permissions.');
            	return $this->redirect("/");
            
        }
        else
        {
            $this->set('myuser','1');
        }
        $this->loadModel('Logos');
	    
        $this->set('logos', $this->paginate($this->Logos->find()->where(['secondary'=>'0'])));
        $this->set('logos1', $this->paginate($this->Logos->find()->where(['secondary'=>'1'])));
		$profile = $this->Profiles->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
		  if(isset($_POST['profile_type']) && $_POST['profile_type']==1)
           $this->request->data['admin']=1;
         else
           $this->request->data['admin']=0;
            
            //var_dump($this->request->data); die();//echo $_POST['admin'];die();
			$profile = $this->Profiles->patchEntity($profile, $this->request->data);
			if ($this->Profiles->save($profile)) {
				$this->Flash->success('User saved successfully.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The user could not be saved. Please try again.');
			}
		}
		$this->set(compact('profile'));
        $this->set('id',$id);
	}
    
    function changePass($id)
    {
            $profile = $this->Profiles->get($id, [
			'contain' => []
		]);
        	if ($this->request->is(['patch', 'post', 'put'])) {
			$profiles = $this->Profiles->patchEntity($profile, $this->request->data);
			if ($this->Profiles->save($profiles)) {
				
				echo "1";
			} else {
				echo "0";
			}
		}
        die();
    }

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
	   
        $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
        
        if($setting->profile_delete==0)
        {
            $this->Flash->error('Sorry, you don\'t have the required permissions.');
            	return $this->redirect("/");
            
        }
		$profile = $this->Profiles->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->Profiles->delete($profile)) {
			$this->Flash->success('The user has been deleted.');
		} else {
			$this->Flash->error('User could not be deleted. Please try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
    
    function logout()
    {
        //$this->request->session()->delete('Profile.id');
       $this->request->session()->destroy();
	   if($_SERVER['SERVER_NAME'] == 'localhost'){
        $this->redirect('/login');
		}else{
		        $this->redirect('http://isbmee.com');

		}
    }
    
    function todo()
    {
        
    }
    function todos(){
        $this->layout= 'blank';
    }
    
    function blocks()
    {
        
        
            $user_id = $_POST['form'];
            if($user_id!= 0)
            {
                $block['user_id'] = $_POST['block']['user_id'];
                $side['user_id'] = $_POST['side']['user_id'];
            }
            foreach($_POST['block'] as $k=>$v)
            {
                
                $block[$k] = $v;
            }
           
            foreach($_POST['side'] as $k=>$v)
            {
                //echo $k."=>".$v."<br/>";
                $side[$k] = $v;
            }
             //die();
            
            $sides = array('profile_list','profile_create','client_list','client_create','document_list','document_create','profile_edit','profile_delete','client_edit','client_delete','document_edit','document_delete','document_others','orders_list','orders_create','orders_delete','orders_edit','orders_others');
            foreach($sides as $s)
            {
                if(!isset($_POST['side'][$s]))
                $side[$s] = 0;
            }
            
            $blocks = TableRegistry::get('blocks');
            $s = $blocks->find()->where(['user_id'=>$user_id])->count();
            //echo $s;die();
            if($user_id != 0  && $s!=0)
            {
                
                $query = $blocks->query();
                    $query->update()
                    ->set($block)
                    ->where(['user_id' => $user_id])
                    ->execute();
             }
             else
             {
                $article = $blocks->newEntity($_POST['block']);
                $blocks->save($article);
             }
            $sidebar = TableRegistry::get('sidebar');
             $s1 = $sidebar->find()->where(['user_id'=>$user_id])->count();
            if($user_id != 0 && $s1!=0)
            {
             $query1 = $sidebar->query();
                    $query1->update()
                    ->set($side)
                    ->where(['user_id' => $user_id])
                   ->execute();
             }
              else
             {
                $article = $sidebar->newEntity($_POST['side']);
                $sidebar->save($article);
             }       
             die();
             //$this->redirect(['controller'=>'profiles','action'=>'add']);
        
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
    
    
    
    function getRecruiter()
    {
        $rec = TableRegistry::get('Profiles');
        $query = $rec->find()->where(['profile_type'=>2]);
        //$q = $query->select();
        
        $this->response->body($query);
        return $this->response;
        
        die();   
    }
    
    function getProfile()
    {
        $rec = TableRegistry::get('Profiles');
        $query = $rec->find();
        $u = $this->request->session()->read('Profile.id');
        $super = $this->request->session()->read('Profile.super');
        $cond = $this->Settings->getprofilebyclient($u,$super);
        //$query = $query->select()->where(['super'=>0]);
        $query = $query->select()->where(['profile_type NOT IN'=>'(6)','OR'=>$cond])
            ->andWhere(['super'=>0]);
        $this->response->body($query);
        return $this->response;
        die();   
    }
    
    function getContact()
    {
        $con = TableRegistry::get('Profiles');
        $query = $con->find()->where(['profile_type'=>6]);
        $this->response->body($query);
        return $this->response;
        die();
    }
    
    function filterBy()
    {
        $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
        
        if($setting->profile_list==0)
        {
            $this->Flash->error('Sorry, you don\'t have the required permissions.');
            	return $this->redirect("/");
            
        }
		
        
        $profile_type = $_GET['filter_profile_type'];
        $querys = TableRegistry::get('Profiles');
        $query = $querys->find()->where(['profile_type'=>$profile_type]);
        $this->set('profiles', $this->paginate($this->Profiles)); 
        $this->set('profiles',$query);
        $this->set('return_profile_type',$profile_type);
        $this->render('index');
    }
    
    function search()
    {
        $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
        
        if($setting->profile_list==0)
        {
            $this->Flash->error('Sorry, you don\'t have the required permissions.');
            	return $this->redirect("/");
            
        }
        
        $cond = '';
        if(isset($_GET['searchprofile']))
        {
            $search = $_GET['searchprofile'];
            $searchs = strtolower($search);
        }
        
        if(isset($_GET['filter_profile_type']))
        {
           $profile_type = $_GET['filter_profile_type']; 
        }
        if(isset($_GET['filter_by_client']))
        {
           $client = $_GET['filter_by_client']; 
        }
		$querys = TableRegistry::get('Profiles');
        
        if(isset($_GET['searchprofile']) && $_GET['searchprofile'])
        {
            if($cond == '')
                $cond = $cond.' (LOWER(title) LIKE "%'.$searchs.'%" OR LOWER(fname) LIKE "%'.$searchs.'%" OR LOWER(lname) LIKE "%'.$searchs.'%" OR LOWER(username) LIKE "%'.$searchs.'%" OR LOWER(address) LIKE "%'.$searchs.'%")';
            else
                $cond = $cond.' AND (LOWER(title) LIKE "%'.$searchs.'%" OR LOWER(fname) LIKE "%'.$searchs.'%" OR LOWER(lname) LIKE "%'.$searchs.'%" OR LOWER(username) LIKE "%'.$searchs.'%" OR LOWER(address) LIKE "%'.$searchs.'%")';
        }
        
        if(isset($_GET['filter_profile_type']) && $_GET['filter_profile_type'])
        {
            if($cond == '')
                $cond = $cond.' (profile_type = "'.$profile_type.'" OR admin = "'.$profile_type.'")';
                
            else
                $cond = $cond.' AND (profile_type = "'.$profile_type.'" OR admin = "'.$profile_type.'")';
        }
        
        if(isset($_GET['filter_by_client']) && $_GET['filter_by_client'])
        {
            
        $sub = TableRegistry::get('Clients');
        $que = $sub->find();
        $que->select()->where(['id'=>$_GET['filter_by_client']]);
        $q = $que->first();
        $profile_ids = $q->profile_id;
        if(!$profile_ids)
        {
            $profile_ids = '99999999999';
        }
            if($cond == '')
                $cond = $cond.' (id IN ('.$profile_ids.'))';
            else
                $cond = $cond.' AND (id IN ('.$profile_ids.'))';
        }
        
        /*=================================================================================================== */
       if($cond)
        {
            $query = $querys->find();
            $query = $query->where([$cond]);
        }
        $this->set('profiles', $this->paginate($this->Profiles)); 
        $this->set('profiles',$query);
        if(isset($search))
        {
            $this->set('search_text',$search);
        }
        if(isset($profile_type))
        {
            $this->set('return_profile_type',$profile_type);
        }
        if(isset($client))
        {
            $this->set('return_client',$client);
        }        
        $this->render('index');
    }
    
    function getuser()
    {
        $id = $this->request->session()->read('Profile.id');
        $profile = TableRegistry::get('profiles');
        $query = $profile->find()->where(['id'=>$id]);
                 
        $l = $query->first();
        $this->response->body($l);
        return $this->response;
        //return $l;
        
         die();
        
        
    }
   function getallusers($profile_type ="")
   {
        $u = $this->request->session()->read('Profile.id');
        $super = $this->request->session()->read('Profile.super');
        $cond = $this->Settings->getprofilebyclient($u,$super);
        $profile = TableRegistry::get('profiles');
        if($profile_type!="")
            $query = $profile->find()->where(['super'=>0,'profile_type'=>$profile_type, 'OR'=>$cond]);
        else
            $query = $profile->find()->where(['super'=>0,'OR'=>$cond]);
                 
        $l = $query->all();
        $this->response->body($l);
        return $this->response;
        
   }
   function getusers()
   {
        $title = $_POST['v'];
        
        if($title !=""){
            $u = $this->request->session()->read('Profile.id');
            $super = $this->request->session()->read('Profile.super');
            $cond = $this->Settings->getprofilebyclient($u,$super);
          
            //var_dump($cond);
            $profile = TableRegistry::get('profiles');
            $query = $profile->find()->where(['username LIKE'=>'%'.$title."%",'OR'=>$cond]);
                     
            $l = $query->all();
            //debug($l);
            if(count($l)>0)
            {
                /*echo "<select onchange='$(\".madmin\").val(this.value); $(\".loadusers\").hide()' class='form-control'>";
                echo "<option> Select User</option>";*/
                //echo "<ul>";
                foreach($l as $user)
                {
                    //echo "<option value='".$user->username."'>".$user->username."</option>";
                    echo "<a style='display:block; padding:5px 0; text-decoration:none;' onclick='$(\".madmin\").val(\"$user->username\"); $(\".loadusers\").hide()'>".$user->username."</a>";
                }
                //"</ul>";
                //echo "<select/>";
            }
            else
            {
                echo "1";
            }
        }
        else
            echo "0";
        //return $l;
        
         die();
        
        
   }
   function getOrder($id)
   {
        $con = TableRegistry::get('Documents');
        $query = $con->find()->where(['uploaded_for'=>$id,'document_type'=>'order']);
        $this->response->body($query);
        return $this->response;
        die();
   }
   
   function getClient()
   {
        $query = TableRegistry::get('Clients');
        $q = $query->find();
        $que = $q->select();
        $this->response->body($que);
        return $this->response;
        die();
   }
   
   function getProfileType($id = null)
   {
        $q = TableRegistry::get('Profiles');
        $que = $q->find();
        $que->select(['profile_type'])->where(['id'=>$id]);
        $query = $que->first();
        $this->response->body($query);
        return $this->response;
        die();
   }
  
}
?>
