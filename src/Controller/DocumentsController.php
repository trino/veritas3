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
        $this->loadComponent('Settings');
        if(!$this->request->session()->read('Profile.id'))
        {
            $this->redirect('/login');
        }
        
    }
    
	public function index() {
	   
       
       $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
        $doc = $this->getDocumentcount();
        if($setting->document_list==0 || count($doc)==0)
        {
            $this->Flash->error('Sorry, You dont have the permissions.');
            	return $this->redirect("/");
            
        }
        $docs = TableRegistry::get('Documents');
        $doc = $docs->find();
        $doc=$doc->select();
        
        $cond='';
        if(isset($_GET['searchdoc']) && $_GET['searchdoc'])
        {
            $cond = $cond.' (title LIKE "%'.$_GET['searchdoc'].'%" OR document_type LIKE "%'.$_GET['searchdoc'].'%" OR description LIKE "%'.$_GET['searchdoc'].'%")';
        }
        if(isset($_GET['submitted_by_id']) && $_GET['submitted_by_id'])
        {
            if($cond == '')
            $cond = $cond.' user_id = '.$_GET['submitted_by_id'];
            else
            $cond = $cond.' AND user_id = '.$_GET['submitted_by_id'];
        }
        if(isset($_GET['client_id']) && $_GET['client_id'])
        {
            if($cond == '')
            $cond = $cond.' client_id = '.$_GET['client_id'];
            else
            $cond = $cond.' AND client_id = '.$_GET['client_id'];
        }
        if(isset($_GET['type']) && $_GET['type'])
        {
            if($cond == '')
            $cond = $cond.' document_type = "'.$_GET['type'].'"';
            else
            $cond = $cond.' AND document_type = "'.$_GET['type'].'"';
        }
        if($cond)
        {
            $doc = $doc->where([$cond]);
        }
        if(isset($_GET['searchdoc']))
        {
            $this->set('search_text',$_GET['searchdoc']);
        }
        if(isset($_GET['submitted_by_id']))
        {
            $this->set('return_user_id',$_GET['submitted_by_id']);
        }
        if(isset($_GET['client_id']))
        {
            $this->set('return_client_id',$_GET['client_id']);
        }
        if(isset($_GET['type']))
        {
            $this->set('return_type',$_GET['type']);
        }
        $this->set('documents', $doc);
	}
    
    /*
    
    
    
    function submittedBy()
    {
       $setting = $this->get_permission($this->request->session()->read('Profile.id'));
        
        if($setting->profile_list==0)
        {
            $this->Flash->error('Sorry, You dont have the permissions.');
            	return $this->redirect("/");
            
        }
		
        $id = $_GET['submitted_by_id'];
        $querys = TableRegistry::get('Documents');
        $query = $querys->find()->where(['user_id'=>$id]);
        $this->set('documents', $this->paginate($this->Documents)); 
        $this->set('documents',$query);
        $this->set('return_user_id',$id);
        $this->render('index'); 
    }
    
    function filterByClient()
    {
       $setting = $this->get_permission($this->request->session()->read('Profile.id'));
        
        if($setting->profile_list==0)
        {
            $this->Flash->error('Sorry, You dont have the permissions.');
            	return $this->redirect("/");
            
        }
		
        $id = $_GET['client_id'];
        $querys = TableRegistry::get('Documents');
        $query = $querys->find()->where(['client_id'=>$id]);
        $this->set('documents', $this->paginate($this->Documents)); 
        $this->set('documents',$query);
        $this->set('return_client_id',$id);
        $this->render('index'); 
    }
    
    function filterByType()
    {
         $setting = $this->get_permission($this->request->session()->read('Profile.id'));
        
        if($setting->profile_list==0)
        {
            $this->Flash->error('Sorry, You dont have the permissions.');
            	return $this->redirect("/");
            
        }
		
        $type = $_GET['type'];
        $querys = TableRegistry::get('Documents');
        $query = $querys->find()->where(['document_type'=>$type]);
        $this->set('documents', $this->paginate($this->Documents)); 
        $this->set('documents',$query);
        $this->set('return_type',$type);
        $this->render('index'); 
    }*/
    
    

	public function view($id = null) {
	   $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
        $doc = $this->getDocumentcount();
        if($setting->document_list==0 || count($doc)==0)
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
	public function addorder($cid=0,$did=0) {
	   $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
         $doc = $this->getDocumentcount();
         
        if($setting->document_create==0 || count($doc)==0)
        {
            $this->Flash->error('Sorry, You dont have the permissions.');
            	return $this->redirect("/");
            
        }
        $this->set('cid',$cid);
        $this->set('did',$did);
	}


    
    public function savedoc($cid=0,$did=0)
    {
//         echo "<pre>";print_r($_POST);
        if( isset($_POST['type'])) {
            // saving in order table
            $orders = TableRegistry::get('orders');
            $arr['title'] = 'order_'.$_POST['uploaded_for'].'_'.date('Y-m-d H:i:s');
            $arr['uploaded_for'] = $_POST['uploaded_for'];


            $arr['client_id'] = $cid;
            $arr['order_type'] = $_POST['type'];
            $arr['created'] = date('Y-m-d H:i:s');
            if(!$did || $did=='0'){
                $arr['user_id'] = $this->request->session()->read('Profile.id');
                $order = $orders->newEntity($arr);

                    if ($orders->save($order)) {
                        //$this->Flash->success('The client has been saved.');
                        echo $order->id;
                    } else {
                        //$this->Flash->error('The client could not be saved. Please, try again.');
                        //echo "e";
                    }
            }
            else
            {
                $query2 = $orders->query();
                $query2->update()
                    ->set($arr)
                    ->where(['id' => $did])
                    ->execute();
                //$this->Flash->success('The client has been saved.');
                echo $did;
            }

        } else {
            $docs = TableRegistry::get('Documents');

            $arr['uploaded_for'] = $_POST['uploaded_for'];
            $arr['client_id'] = $cid;
            $arr['document_type'] = 'order';
            $arr['created'] = date('Y-m-d H:i:s');
            if(!$did || $did=='0'){
                $arr['user_id'] = $this->request->session()->read('Profile.id');
                $doc = $docs->newEntity($arr);


                    if ($docs->save($doc)) {
                        //$this->Flash->success('The client has been saved.');
                            echo $doc->id;
                    } else {
                         //$this->Flash->error('The client could not be saved. Please, try again.');
                        //echo "e";
                    }

            }
            else
            {
                    $query2 = $docs->query();
                                $query2->update()
                                ->set($arr)
                                ->where(['id' => $did])
                                ->execute();
                                //$this->Flash->success('The client has been saved.');
                            echo $did;
            }
        }
		die();
    }
/**
 * saving pre-screening data
 */
    public function savePrescreening(){
        $prescreen = TableRegistry::get('pre_screening');
        $arr['order_id'] = $_POST['order_id'];
        $arr['client_id'] = $_POST['cid'];
        $arr['user_id'] = $this->request->session()->read('Profile.id');

        $input_var = rtrim($_POST['inputs'],',');

        foreach(explode("&",$_POST['inputs']) as $data){
            $input = explode("=",$data);
            if($input[0]=="document_type"){
                continue;
            }
          if($input[1]!='' ) {

              $arr[$input[0]]=$input[1];
          }
            //echo $data."<br/>";
        }


        $save = $prescreen->newEntity($arr);
        $prescreen->save($save);
        die;
    }

    /**
     * saving driver application data
     */
    public function savedDriverApp(){
       
        $driverApps = TableRegistry::get('driver_application');
        $arr['order_id'] = $_POST['order_id'];
        $arr['client_id'] = $_POST['cid'];
        $arr['user_id'] = $this->request->session()->read('Profile.id');

        //$input_var = rtrim($_POST['inputs'],',');
        
        $driverAcc = array('date_of_accident[]','nature_of_accident[]','fatalities[]','injuries[]');
        $total_acc_record=0;
        $accident = array();
        foreach($_POST['inputs'] as $data){
            
            if($data['name']=="document_type"){
                
                continue;
            } else if($data['name']=="count_acc_record"){
                $total_acc_record = $data['value'];
            }else if( in_array($data['name'], $driverAcc) ) {
               
                continue;
            } else {
                if($data['value']!='' ) {
                    $arr[$data['name']]=$data['value'];
                }
            }
            //echo $data."<br/>";
        }
       
        /*for($i=1;$i<=$total_acc_record; $i++){
            foreach($_POST['inputs'] as $data){
                // if($data['name']== 'date_of_accident[]')
                // $accident[] = 
            }
        }*/


        $save = $driverApps->newEntity($arr);
        if($driverApps->save($save))
        {
            //echo $save->id;
        }
        die;
    }
    /**
     * saving driver application data
     */
    public function savedDriverEvaluation(){
        $roadTest = TableRegistry::get('road_test');
        $arr['order_id'] = $_POST['order_id'];
        $arr['client_id'] = $_POST['cid'];
        $arr['user_id'] = $this->request->session()->read('Profile.id');

        $input_var = rtrim($_POST['inputs'],',');

        foreach(explode("&",$_POST['inputs']) as $data){
            $input = explode("=",$data);
            if($input[0]=="document_type" ){
                continue;
            }
            if($input[1]!='' ) {

                $arr[$input[0]]=$input[1];
            }
            //echo $data."<br/>";
        }


        $save = $roadTest->newEntity($arr);
        if($roadTest->save($save))
        {
            //echo $save->id;
        }
        die;
    }

    /**
     * saving driver application data
     */
    public function savedMeeOrder(){

        $consentForm = TableRegistry::get('consent_form');
        $arr['order_id'] = $arr2['order_id'] = $arr3['order_id'] = $_POST['order_id'];
        $arr['client_id'] = $arr2['client_id'] = $arr3['client_id'] =$_POST['cid'];
        $arr['user_id'] = $arr2['user_id'] = $arr3['user_id'] =$this->request->session()->read('Profile.id');

        //$input_var = rtrim($_POST['consent'],',');
        //consent
        foreach(explode("&",$_POST['consent']) as $data){
            $input = explode("=",$data);
            if($input[0]=="document_type" ){
                continue;
            } else if( $input[0]=="offence" ||  $input[0]=="date_of_sentence"  ||  $input[0]=="location") {
                continue;
            }
            if($input[1]!='' ) {

                $arr[$input[0]]=$input[1];
            }
            //echo $data."<br/>";
        }

        $save = $consentForm->newEntity($arr);
        if($consentForm->save($save))
        {
            //echo $save->id;
        }

        //employement
        $employment = TableRegistry::get('employment_verification');
        foreach(explode("&",$_POST['employment']) as $data){
            $input = explode("=",$data);
            if($input[0]=="document_type" ){
                continue;
            }
            if($input[1]!='' ) {

                $arr2[$input[0]]=$input[1];
            }
            //echo $data."<br/>";
        }
        $save2 = $employment->newEntity($arr2);
        if($employment->save($save2))
        {
            //echo $save->id;
        }


        //education
        $education = TableRegistry::get('education_verification');
        $edu = array();
        $edu['order_id'] =  $_POST['order_id'];
        $edu['client_id'] = $_POST['cid'];
        $edu['user_id'] = $this->request->session()->read('Profile.id');
        $onlyEducation = array(
            'edu_name',
            'edu_id',
            'edu_date_of_birth',
            'edu_total_claim_past3',
            'edu_current'
        );
        // print_r($_POST);die;
        foreach(explode("&",$_POST['education']) as $data){
            $input = explode("=",$data);

            if($input[0]=="document_type" || $input[0] == "count_more_edu" ){
                continue;
            } else if ( in_array($input[0],$onlyEducation) ){
                $edu[$input[0]]=$$input[1];
            } else{
                if($input[1]!='' ) {
                    $arr3[$input[0]]=$input[1];
                }
            }
            //echo $data."<br/>";
        }
        $save3 = $education->newEntity($edu);
        if($education->save($save3))
        {
            $edu_id = $save->id;
            $education_pass = TableRegistry::get('education_verification_pass_education');
            // foreach()

            $edu_pass3 = $education_pass->newEntity($arr3);
            $education_pass->save($edu_pas3);
        }


        die;
    }

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function editorder($cid=0,$did=0) {
	   $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
        $doc = $this->getDocumentcount();
        if($setting->document_edit==0 || count($doc)==0)
        {
            $this->Flash->error('Sorry, You dont have the permissions.');
            	return $this->redirect("/");
            
        }
        $docs = TableRegistry::get('documents');
            $document = $docs->find()->where(['id' => $did])->first();
            $this->set('document',$document);
        $this->set('cid',$cid);
        $this->set('did',$did);
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
        $this->render('addorder');
	}
    
    function add($cid=0,$did=0)
    {
         $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
         $doc = $this->getDocumentcount();
        if($did!=0)
        {
            $doc = TableRegistry::get('Documents');
            $query = $doc->find()->where(['id' => $did])->first();
            $this->set('document',$query);
            if($setting->document_edit==0 || count($doc)==0)
            {
                $this->Flash->error('Sorry, You dont have the permissions.');
                	return $this->redirect("/");
                
            }
            
        }
        else
        { 
            if($setting->document_create==0 || count($doc)==0)
            {
                $this->Flash->error('Sorry, You dont have the permissions.');
                	return $this->redirect("/");
                
            }
        }
        if(isset($_POST['uploaded_for'])){
        $docs = TableRegistry::get('Documents');
         
        $arr['uploaded_for'] = $_POST['uploaded_for'];
        $arr['client_id'] = $cid;
        if(isset($_POST['document_type']))
        $arr['document_type'] = $_POST['document_type'];
        $arr['created'] = date('Y-m-d H:i:s');
        if(!$did || $did=='0'){
	   $arr['user_id'] = $this->request->session()->read('Profile.id');
        $doc = $docs->newEntity($arr);
		
		  
			if ($docs->save($doc)) {
				$this->Flash->success('The document has been saved.');
                	$this->redirect('/documents');
			} else {
			     //$this->Flash->error('The client could not be saved. Please, try again.');
				//echo "e";
			}
		
        }
        else
        {
            $query2 = $docs->query();
                        $query2->update()
                        ->set($arr)
                        ->where(['id' => $did])
                        ->execute();
                        $this->Flash->success('The document has been saved.');
                	$this->redirect('/documents');
        }
		}
    }
    
    function edit()
    {
        $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
        $doc = $this->getDocumentcount();
        if($setting->document_edit==0 || count($doc)==0)
        {
            $this->Flash->error('Sorry, You dont have the permissions.');
            	return $this->redirect("/");
            
        }
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
	   $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
        
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
    
    function getDocumentcount()
    {
        $doc = TableRegistry::get('Subdocuments');
        $query = $doc->find();
        $query->select()->where(['display' => 1]);
        return $query->all();
    }
    
    
    function analytics1()
    {
        $this->layout = "blank";
    }
    
    function analytics()
    {
        
    }
    
    function getUser($user_id)
    {
        $query = TableRegistry::get('Profiles');
        $query = $query->find()->where(['id'=>$user_id]);
        $q = $query->first();
        $this->response->body($q);
        return $this->response;
        die();
    }   
    
    function getAllUser()
    {
        $query = TableRegistry::get('Profiles');
        $query = $query->find();
        $q = $query->select();
        $this->response->body($q);
        return $this->response;
        die();
    } 
    
    function getAllClient()
    {
        $query = TableRegistry::get('Clients');
        $query = $query->find();
        $q = $query->select();
        $this->response->body($q);
        return $this->response;
        die();
    }
    
    function getDocType()
    {
        $query = TableRegistry::get('Subdocuments');
        $query = $query->find();
        $q = $query->select()->where(['display'=>'1']);
        $this->response->body($q);
        return $this->response;
        die();
    }

    public function orderslist(){
        $setting = $this->get_permission($this->request->session()->read('Profile.id'));
        $doc = $this->getDocumentcount();

        if($setting->document_list==0 || count($doc)==0)
        {
            $this->Flash->error('Sorry, You dont have the permissions.');
            return $this->redirect("/");

        }
        $orders = TableRegistry::get('orders');
        $order = $orders->find();
        $order=$order->select();

        $cond='';

        if(isset($_GET['searchdoc']) && $_GET['searchdoc'])
        {
            $cond = $cond.' (title LIKE "%'.$_GET['searchdoc'].'%" OR document_type LIKE "%'.$_GET['searchdoc'].'%" OR description LIKE "%'.$_GET['searchdoc'].'%")';
        }
        if(isset($_GET['submitted_by_id']) && $_GET['submitted_by_id'])
        {
            if($cond == '')
                $cond = $cond.' user_id = '.$_GET['submitted_by_id'];
            else
                $cond = $cond.' AND user_id = '.$_GET['submitted_by_id'];
        }
        if(isset($_GET['client_id']) && $_GET['client_id'])
        {
            if($cond == '')
                $cond = $cond.' client_id = '.$_GET['client_id'];
            else
                $cond = $cond.' AND client_id = '.$_GET['client_id'];
        }
        if(isset($_GET['type']) && $_GET['type'])
        {
            if($cond == '')
                $cond = $cond.' order_type = "'.$_GET['type'].'"';
            else
                $cond = $cond.' AND order_type = "'.$_GET['type'].'"';
        }
        if($cond)
        {
            $order = $order->where([$cond]);
        }
        if(isset($_GET['searchdoc']))
        {
            $this->set('search_text',$_GET['searchdoc']);
        }
        if(isset($_GET['submitted_by_id']))
        {
            $this->set('return_user_id',$_GET['submitted_by_id']);
        }
        if(isset($_GET['client_id']))
        {
            $this->set('return_client_id',$_GET['client_id']);
        }
        if(isset($_GET['type']))
        {
            $this->set('return_type',$_GET['type']);
        }
        $this->set('orders', $order);


    }
    
}
