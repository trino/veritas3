<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;
use Cake\Network\Email\Email;


class ClientsController extends AppController {


    public $paginate = [
            'limit' => 10,
            'order' => ['id' => 'desc']

        ];
     public function initialize() {
        parent::initialize();
        $this->loadComponent('Settings');
        $this->loadComponent('Mailer');
        
        if(!$this->request->session()->read('Profile.id'))
        {
            $this->redirect('/login');
        }

    }
    function upload_img($id="")
    {
        if(isset($_FILES['myfile']['name']) && $_FILES['myfile']['name'])
        {
            $arr = explode('.',$_FILES['myfile']['name']);
            $ext = end($arr);
            $rand = rand(100000,999999).'_'.rand(100000,999999).'.'.$ext;
            $allowed = array('jpg','jpeg','png','bmp','gif');
            $check = strtolower($ext);
            if(in_array($check,$allowed)){
                move_uploaded_file($_FILES['myfile']['tmp_name'],APP.'../webroot/img/jobs/'.$rand);
                 unset($_POST);
                 if(isset($id)){
                $_POST['image'] = $rand;
                $img = TableRegistry::get('clients');

                //echo $s;die();
                $query = $img->query();
                        $query->update()
                        ->set($_POST)
                        ->where(['id' => $id])
                        ->execute();
                }
                        echo $rand;


            }
            else
            {
                echo "error";
            }
        }
        die();
    }
    function upload_all($id="")
    {
        if(isset($_FILES['myfile']['name']) && $_FILES['myfile']['name'])
        {
            $arr = explode('.',$_FILES['myfile']['name']);
            $ext = end($arr);
            $rand = rand(100000,999999).'_'.rand(100000,999999).'.'.$ext;
            $allowed = array('jpg','jpeg','png','bmp','gif','pdf','doc', 'docx','csv','xlsx','xls');
            $check = strtolower($ext);
            if(in_array($check,$allowed)){
                move_uploaded_file($_FILES['myfile']['tmp_name'],APP.'../webroot/img/jobs/'.$rand);
                 unset($_POST);
                 if(isset($id)){
                $_POST['image'] = $rand;
                $img = TableRegistry::get('clients');

                //echo $s;die();
                $query = $img->query();
                        $query->update()
                        ->set($_POST)
                        ->where(['id' => $id])
                        ->execute();
                }
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
	   if(isset($_GET['flash']))
       {
                $this->Flash->success('Please select a client to upload.');
       }
	   $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
        if($setting->client_list==0)
        {
            $this->Flash->error('Sorry, you don\'t have the required permissions.');
            	return $this->redirect("/");

        }
		$this->set('client', $this->paginate($this->Clients));
	}

    function search()
    {
        $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));

        if($setting->client_list==0)
        {
            $this->Flash->error('Sorry, you don\'t have the required permissions.');
           	return $this->redirect("/");

        }

        if(isset($_GET['search']))
            $search = $_GET['search'];
        else
            $search = "";
        $searchs = strtolower($search);
        $querys = TableRegistry::get('Clients');
        $query = $querys->find()
        ->where(['LOWER(title) LIKE' => '%'.$searchs.'%'])
        ->orWhere(['LOWER(description) LIKE' => '%'.$searchs.'%'])
        ->orWhere(['LOWER(company_name) LIKE' => '%'.$searchs.'%'])
        ->orWhere(['LOWER(company_address) LIKE' => '%'.$searchs.'%']);
        $this->set('client', $this->paginate($query));
        //$this->set('client',$query);
        $this->set('search_text',$search);
        $this->render('index');
    }



	public function view($id = null) {
	   $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));

        if($setting->client_list==0)
        {
            $this->Flash->error('Sorry, you don\'t have the required permissions.');
            	return $this->redirect("/");

        }

        $querys = TableRegistry::get('Clients');
        $query = $querys->find()->where(['id' => $id]);
       $this->set('client', $query->first());
        $this->set('id',$id);
		//$this->set('disabled',1);
        //$this->render('add');
	}


/**
 * Add method
 *
 * @return void
 */
    public function assignContact($contact,$id,$status)
    {
        $querys = TableRegistry::get('Clients');
        $query = $querys->find()->where(['id' => $id])->first();
        if($status=='yes'){
        if($query->contact_id=='')
        {
            $arr['contact_id'] = $contact;
        }
        else
        $arr['contact_id'] = $query->contact_id.','.$contact;
        }
        else
        {
            $arr['contact_id']='';
            if($query->contact_id=='')
            die();
            else
            {
                $array = explode(',',$query->contact_id);
                if($array){
                foreach($array as $a)
                {
                    if($a==$contact)
                    {
                        continue;
                    }
                    else
                    {
                        if($arr['contact_id']=='')
                        $arr['contact_id'] = $a;
                        else
                        $arr['contact_id'] = $arr['contact_id'].','.$a;
                    }
                }
                }

            }
        }
        $arr['contact_id'] = str_replace(',',' ',$arr['contact_id']);
        $arr['contact_id'] = trim($arr['contact_id']);
        $arr['contact_id'] = str_replace(' ',',',$arr['contact_id']);
        $query2 = $querys->query();
                        $query2->update()
                        ->set($arr)
                        ->where(['id' => $id])
                        ->execute();
                        die();
    }
    public function assignProfile($profile,$id,$status)
    {
        $querys = TableRegistry::get('Clients');
        $query = $querys->find()->where(['id' => $id])->first();

        if($status=='yes'){
        if($query->profile_id=='')
        {
            $arr['profile_id'] = $profile;
        }
        else
        $arr['profile_id'] = $query->profile_id.','.$profile;
        }
        else
        {
            $arr['profile_id']='';
            if($query->profile_id=='')
            die();
            else
            {
                $array = explode(',',$query->profile_id);
                if($array){
                foreach($array as $a)
                {
                    if($a==$profile)
                    {
                        continue;
                    }
                    else
                    {
                        if($arr['profile_id']=='')
                        $arr['profile_id'] = $a;
                        else
                        $arr['profile_id'] = $arr['profile_id'].','.$a;
                    }
                }
                }

            }
        }
        $arr['profile_id'] = str_replace(',',' ',$arr['profile_id']);
        $arr['profile_id'] = trim($arr['profile_id']);
        $arr['profile_id'] = str_replace(' ',',',$arr['profile_id']);
        $query2 = $querys->query();
                        $query2->update()
                        ->set($arr)
                        ->where(['id' => $id])
                        ->execute();
                        die();
    }
	public function add() {
	   $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));


        if($setting->client_create==0)
        {
            $this->Flash->error('Sorry, you don\'t have the required permissions.');
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
			 

             if(isset($_POST['division']))
             {

             }
				$this->Flash->success('User saved successfully.');
                	return $this->redirect(['action' => 'edit',$client->id]);

			} else {
				$this->Flash->error('The user could not be saved. Please try again.');
			}
		}
		$this->set(compact('client'));
        $this->set('profile',array());
        $this->set('contacts',array());
        $this->set('id','');
        $this->render('add');
	}

    public function saveClients($id=0) {
        $rec='';
        $con='';
        $count=1;
        if(isset($_POST['profile_id'])){

        foreach($_POST['profile_id'] as $ri)
        {
        	if($count==1)
        	   $rec = $ri;
        	else
        	   $rec = $rec.','.$ri;
            $count++;

        }
        }
        unset($_POST['profile_id']);
        $_POST['profile_id'] = $rec;
        $rec = "";
        $count=1;
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
        $_POST['created'] = date('Y-m-d');
        $clients = TableRegistry::get('Clients');
        if(!$id)
        {

            $cnt = 0;
    	    if(isset($_POST['sig_email']) && $_POST['sig_email']!="")
                {
                    $cnt = $clients->find()->where(['sig_email'=>$_POST['sig_email']])->count();
                }
            if($cnt>0)
            {
                echo "email";
                die();
            }
            if(isset($_POST['sig_email']) && $_POST['sig_email']!="")
            {
                    $from = 'info@isbmee.com';
                    $to = $_POST['sig_email'];
                    $sub = 'Client created successfully';
                    $msg = 'Hi,<br />Your account has been created for ISBMEE as a client .<br /> Regards';
                    $this->Mailer->sendEmail($from,$to,$sub,$msg);
                    }
            if(isset($_POST['sig_email'])&&((str_replace(array('@','.'),array('',''),$_POST['sig_email'])==$_POST['sig_email'] || strlen($_POST['sig_email'])<5) && $_POST['sig_email']!=''))
                {
                    echo "Invalid Email";
                    die();
                }
            else
            {
                $client = $clients->newEntity($_POST);
        		if ($this->request->is('post')) {
        		 if ($clients->save($client)) {
                	$arr_s['client_id'] = $client->id;
                    for($i=1;$i<9;$i++)
                    {
                        $arr_s['sub_id'] = $i;
                        $sub_c = TableRegistry::get('client_sub_order');
                        $sc = $sub_c->newEntity($arr_s);
                        $sub_c->save($sc);
                    }
                        if($_POST['division']!="")
                        {
                            $division = nl2br($_POST['division']);
                            $division = str_replace(',','<br />',$division);
                            $dd = explode("<br />",$division);
                            $divisions['client_id']= $client->id;

                            foreach($dd as $d)
                            {
                                $divisions['title']=trim($d);
                                $divs = TableRegistry::get('client_divison');
                                 $div = $divs->newEntity($divisions);
                                 $divs->save($div);
                                unset($div);
                            }

                            //die();

                        }
                        $this->loadModel('ClientDocs');
                        $this->ClientDocs->deleteAll(['client_id'=>$client->id]);
                        $client_docs = array_unique($_POST['client_doc']);
                        foreach($client_docs as $d)
                        {
                            if($d != "")
                            {
                                $docs = TableRegistry::get('client_docs');
                                $ds['client_id']= $client->id;
                                $ds['file'] =$d;
                                 $doc = $docs->newEntity($ds);
                                 $docs->save($doc);
                                unset($doc);
                            }
                        }
        				$this->Flash->success('Client saved successfully.');
                        	echo $client->id;
        			} else {
        			     $this->Flash->error('Client could not be saved. Please try again.');
        				echo "e";
        			}
        		}
            }
        }
        else
        {
             $cnt = 0;
    	    if($_POST['sig_email']!="")
            $cnt = $clients->find()->where(['sig_email'=>$_POST['sig_email'],'id<>'.$id])->count();
            if($cnt>0)
            {
                echo "email";
            }
            if((str_replace(array('@','.'),array('',''),$_POST['sig_email'])==$_POST['sig_email'] || strlen($_POST['sig_email'])<5) && $_POST['sig_email']!='')
            {
                echo "Invalid Email";
                die();
            }
            else
            {
                foreach($_POST as $k=>$v)
                {

                    if($k != "client_doc")
                        $edit[$k] =$v;

                }
                //var_dump($edit);
                $query2 = $clients->query();
                        $query2->update()
                        ->set($edit)
                        ->where(['id' => $id])
                        ->execute();
                        $this->Flash->success('Client saved successfully.');
                if($_POST['division']!="")
                {
                    $division = nl2br($_POST['division']);
                    $dd = explode("<br />",$division);
                    $divisions['client_id']= $id;
                    $client_division = TableRegistry::get('client_divison');
                    $client_division->deleteAll(array('client_id'=>$id));
                    foreach($dd as $d)
                    {
                        $divisions['title']=trim($d);
                        $divs = TableRegistry::get('client_divison');
                         $div = $divs->newEntity($divisions);
                         $divs->save($div);
                        unset($div);
                    }

                        //die();

                }
                        $this->loadModel('ClientDocs');
                        $this->ClientDocs->deleteAll(['client_id'=>$id]);
                        $client_docs = array_unique($_POST['client_doc']);
                        //var_dump($_POST['client_doc']);
                        foreach($client_docs as $d)
                        {
                            if($d != "")
                            {
                                $docs = TableRegistry::get('client_docs');
                                $ds['client_id']= $id;
                                $ds['file'] =$d;
                                 $doc = $docs->newEntity($ds);
                                 $docs->save($doc);
                                unset($doc);
                            }
                        }
                    	echo $id;
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
	 function edit($id = null) {
	   $check_pro_id = $this->Settings->check_pro_id($id);
            if($check_pro_id==1)
            {
                $this->Flash->error('Sorry, the record does not exist');
                return $this->redirect("/clients/index");
                //die();
            }
	   $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));

        if($setting->client_edit==0)
        {
            $this->Flash->error('Sorry, you don\'t have the required permissions.');
            	return $this->redirect("/");

        }
        $docs = TableRegistry::get('client_docs');
        $query = $docs->find();
        $client_docs = $query->select()->where(['client_id'=>$id])->all();
        $this->set('client_docs',$client_docs);
		$client = $this->Clients->get($id, [
			'contain' => []
		]);
        $arr = explode(',',$client->profile_id);
        $arr2 = explode(',',$client->contact_id);

		if ($this->request->is(['patch', 'post', 'put'])) {

			$clients = $this->Clients->patchEntity($client, $this->request->data);
			if ($this->Clients->save($clients)) {

				$this->Flash->success('User saved successfully.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The user could not be saved. Please try again.');
			}
		}
        //$client_details = $query->select()->where(['id'=>$id]);
		$this->set(compact('client'));
        //$this->set('client_details',$client_details);
        $this->set('id',$id);
        $this->set('profile',$arr);
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
	function delete($id = null) {
	   $check_pro_id = $this->Settings->check_pro_id($id);
            if($check_pro_id==1)
            {
                $this->Flash->error('Sorry, the record does not exist');
                return $this->redirect("/clients/index");
                //die();
            }
	   $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));

        if($setting->client_delete==0)
        {
            $this->Flash->error('Sorry, you don\'t have the required permissions.');
            	return $this->redirect("/");

        }
		$profile = $this->Clients->get($id);
		//$this->request->allowMethod(['post', 'delete']);
		if ($this->Clients->delete($profile)) {
			$this->Flash->success('The client has been deleted.');
		} else {
			$this->Flash->error('Client  could not be deleted. Please try again.');
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
    function getFirstSub($id)
    {
        $sub = TableRegistry::get('subdocuments');
        $query = $sub->find();
        $q = $query->select()->where(['id'=>$id])->first();
        $this->response->body($q);
            return $this->response;

        die();
    }
    function getSubCli($id)
    {
        $sub = TableRegistry::get('client_sub_order');
        $query = $sub->find();
        $q = $query->select()->where(['client_id'=>$id])->order(['display_order'=>'ASC']);


            $this->response->body($q);
            return $this->response;

        die();
    }
    function getSubCli2($id)
    {
        $sub = TableRegistry::get('client_sub_order');
        $query = $sub->find();
        $q = $query->select()->where(['client_id'=>$id,'sub_id IN (SELECT id FROM subdocuments WHERE display = 1 AND orders = 1)'])->order(['display_order'=>'ASC']);


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

                    if($v2 == '1'){

                    if($check)
                    {
                        $query2 = $subp->query();
                        $query2->update()
                        ->set(['display'=>$v2])
                        ->where(['client_id' => $id,'subdoc_id' => $k2])
                        ->execute();
                    }
                    else
                    {

                       $query2 = $subp->query();
                        $query2->insert(['client_id','subdoc_id', 'display'])
                        ->values(['client_id' => $id,'subdoc_id' => $k2,'display'=>$v2])
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


   function getProfile($id=null)
   {
    $profile = TableRegistry::get('Clients');
    $query = $profile->find()->where(['id'=>$id]);
    $q = $query->first();


       $pro = TableRegistry::get('Profiles');

       if (is_object($q)){
       if($q->profile_id){
           $q->profile_id= ltrim ($q->profile_id, ',');
       }}

       $didit=false;
       if (is_object($q)) {
           if ($q->profile_id) {
               $querys = $pro->find()->where(['id IN (' . $q->profile_id . ')']);
               $didit = true;
           }
       }

        if(!$didit){
            $querys = array();
            $this->response->body(($querys));
            return $this->response;
        }

        }

   function getContact($id=null)
   {
    $contact = TableRegistry::get('Clients');
    $query = $contact->find()->where(['id'=>$id]);
    $q = $query->first();
    //$profile_id= explode(',',$q->profile_id);
//    if(($profile_id))
//    {
        $pro = TableRegistry::get('Profiles');


        if($q->contact_id) {
            $querys = $pro->find()->where(['id IN (' . $q->contact_id . ')']);
        } else {
            $querys = array();
        }
        $this->response->body(($querys));
        return $this->response;

   }


  function getDocCount($id=null)
  {
    $doc = TableRegistry::get('Documents');
    $query = $doc->find();
    $count = $query->select()->where(['client_id'=>$id]);
    $this->response->body(($count));
            return $this->response;
  }

  function getOrderCount($id=null)
  {
    $doc = TableRegistry::get('Orders');
    $query = $doc->find();
    $count = $query->select()->where(['client_id'=>$id]);
    $this->response->body(($count));
            return $this->response;
  }

  function countClientDoc($id=null,$doc_type=null)
  {
    $query = TableRegistry::get('Documents');
    $q = $query->find();
    $q =$q->select()->where(['document_type'=>$doc_type])->andWhere(['client_id'=>$id]);
    $this->response->body($q);
    return $this->response;
  }
   function getClient($id=null)
   { 
    $contact = TableRegistry::get('Clients');
    $query = $contact->find()->where(['id'=>$id]);
    $q = $query->first();
    $this->response->body(($q));
        return $this->response;
    //return $q;

   }
   function getAllClient()
   {
    $query = TableRegistry::get('Clients');
    $q = $query->find();
    $u = $this->request->session()->read('Profile.id');
    if($this->request->session()->read('Profile.super'))
    $q =$q->select();
    else
    {
        $q =$q->select()->where(['profile_id LIKE "'.$u.',%" OR profile_id LIKE "%,'.$u.',%" OR profile_id LIKE "%,'.$u.'" ']);

    }

    $this->response->body($q);
    return $this->response;
   }
   function getAjaxClient($id ="")
   {
        $this->layout = 'blank';
        $key = $_GET['key'];
        $query = TableRegistry::get('Clients');
        $q = $query->find();
        $u = $this->request->session()->read('Profile.id');
        if($this->request->session()->read('Profile.super'))
            $q =$q->select()->where(['company_name LIKE "%'.$key.'%"']);
        else
        {
            $q =$q->select()->where(['(profile_id LIKE "'.$u.',%" OR profile_id LIKE "%,'.$u.',%" OR profile_id LIKE "%,'.$u.'") AND company_name LIKE "%'.$key.'%" ']);

        }
        $this->set('clients',$q);
        $this->set('id',$id);

   }

   function getdivision($cid)
   {
        $query = TableRegistry::get('client_divison');
        $q = $query->find()->where(['client_id'=>$cid])->all();
         $this->response->body($q);
        return $this->response;

   }
   function dropdown()
   {
    $this->layout = 'blank';
   }

   function addprofile()
   {
        $query = TableRegistry::get('clients');
        $q = $query->find()->where(['id'=>$_POST['client_id']])->first();
        $profile_id = $q->profile_id;
        $pros = explode(",",$profile_id);

        $p_ids ="";
        if($_POST['add']=='1')
        {

            array_push($pros,$_POST['user_id']);
            $pro_id = array_unique($pros);

        }
        else
        {
            $pro_id = array_diff($pros, array($_POST['user_id']));
            //array_pop($pros,$_POST['user_id']);

        }

        foreach($pro_id as $k=>$p)
        {
            if(count($pro_id)==$k+1)
                $p_ids .= $p;
            else
                $p_ids .= $p.",";
        }
        $p_ids = str_replace(',',' ',$p_ids);
        $p_ids = trim($p_ids);
        $p_ids = str_replace(' ',',',$p_ids);
        $query->query()->update()->set(['profile_id' => $p_ids])
        ->where(['id' => $_POST['client_id']])
        ->execute();
        //echo $p_ids;
        die();
   }

    
   function getdivisions($did="")
   {
        $cid = $_POST['client_id'];
        $query = TableRegistry::get('client_divison');
        $q = $query->find()->where(['client_id'=>$cid])->all();
        if(count($q)>0){
            ?>
            <select class='form-control' name='division'>
            <option value="">Divisions</option>
            <?php
            foreach($q as $d)
            {
               $sel = ($did==$d->id)?"selected='selected'":'';
                echo "<option value='".$d->id."'".$sel." >".$d->title."</option>";
            }
            echo "</select>";
        }
        die();
        
   }
   
   function charlie()
   {
    $this->layout = 'blank';
   }
   
   function sendCEmail($from,$to,$subject,$message)
    {
        //from can be array with this structure array('email_address'=>'Sender name'));
        $email = new Email('default');
        
        $email->from($from)
        ->emailFormat('html')
    ->to($to)
    ->subject($subject)
    ->send($message);
    }
    function forOrder()
    {
        $query = TableRegistry::get('clients');
        $q = $query->find()->all();
        foreach($q as $c)
        {
            
            $arr_s['client_id'] = $c->id;
            for($i=1;$i<9;$i++)
            {
                $arr_s['sub_id'] = $i;
                $sub_c = TableRegistry::get('client_sub_order');
                $sc = $sub_c->newEntity($arr_s);
                $sub_c->save($sc);
            }
            
             
        }
        die();
    }
    function updateOrder($cid)
    {
        $ids = $_POST['tosend'];
        $arr = explode(',',$ids);
       $arr_s['client_id'] = $cid;
       $sub_c = TableRegistry::get('client_sub_order');
       $del = $sub_c->query();
       $del->delete()->where(['client_id' => $cid])->execute();
            foreach($arr as $k=>$sid)
            {
                $arr_s['sub_id'] = $sid;
                $arr_s['display_order'] = $k+1;
                
                $sc = $sub_c->newEntity($arr_s);
                $sub_c->save($sc);
            } 
            die();
    }


}
?>