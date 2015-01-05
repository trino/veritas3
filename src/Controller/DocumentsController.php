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
        $cn = $this->getUserDocumentcount();
        if($setting->document_list==0 || count($doc)==0 || $cn==0)
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
            if($cond == '')
            $cond = $cond.' (title LIKE "%'.$_GET['searchdoc'].'%" OR document_type LIKE "%'.$_GET['searchdoc'].'%" OR description LIKE "%'.$_GET['searchdoc'].'%")';
            else
            $cond = $cond.' AND (title LIKE "%'.$_GET['searchdoc'].'%" OR document_type LIKE "%'.$_GET['searchdoc'].'%" OR description LIKE "%'.$_GET['searchdoc'].'%")';
        }
        if(!$this->request->session()->read('Profile.admin') && $setting->document_others == 0)
        {
           if($cond == '')
                $cond = $cond.' user_id = '.$this->request->session()->read('Profile.id');
            else
                $cond = $cond.' AND user_id = '.$this->request->session()->read('Profile.id');
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
        $cn = $this->getUserDocumentcount();
        if($setting->document_list==0 || count($doc)==0 || $cn ==0)
        {
            $this->Flash->error('Sorry, You dont have the permissions.');
            	return $this->redirect("/");
            
        }
		/*$profile = $this->Clients->get($id);
		$this->set('profile', $profile);*/
        $this->set('disabled', 1);
        $this->render('add');
	}
    
    public function vieworder($cid = null,$did = null) {
	   $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
        $doc = $this->getDocumentcount();
        $cn = $this->getUserDocumentcount();
        if($setting->orders_list==0 || count($doc)==0 || $cn ==0)
        {
            $this->Flash->error('Sorry, You dont have the permissions.');
            	return $this->redirect("/");
            
        }
        $orders = TableRegistry::get('orders');
        if($did)
        $order_id = $orders->find()->where(['id'=>$did])->first();
        //$did= $order_id->id;
        if(isset($order_id))
        $this->set('modal',$order_id);
        $this->set('cid',$cid);
        $this->set('did',$did);
		/*$profile = $this->Clients->get($id);
		$this->set('profile', $profile);*/
        $this->set('disabled', 1);
        $this->render('addorder');
	}


/**
 * Add method
 *
 * @return void
 */
	public function addorder($cid=0,$did=0) {
	   $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
         $doc = $this->getDocumentcount();
         $cn = $this->getUserDocumentcount();
         
        //die(count($doc));
        if($setting->orders_create==0 || count($doc)==0 || $cn==0 )
        {
            $this->Flash->error('Sorry, You dont have the permissions.');
            	return $this->redirect("/");
            
        }
        $orders = TableRegistry::get('orders');
        if($did)
        $order_id = $orders->find()->where(['id'=>$did])->first();
        //$did= $order_id->id;
        if(isset($order_id))
        $this->set('modal',$order_id);
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

        // checking db if order id exits in this table
        // first delete
        // $del_prescreen = $prescreen->get(['order_id'=>$_POST['order_id']]);        
        $del = $prescreen->query();
        $del->delete()->where(['order_id'=>$_POST['order_id']])->execute();        


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
    public function savedDriverApp($order_id = NULL , $cid = NULL){
        // echo "<pre>";print_r($_POST);die;
       
        
        $arr['order_id'] = $order_id;
        $arr['client_id'] = $cid;
        $arr['user_id'] = $this->request->session()->read('Profile.id');

        //$input_var = rtrim($_POST['inputs'],',');
        $driverApps = TableRegistry::get('driver_application');
        
       /* $delete_id=$driverApps->find()->where(['order_id'=>$_POST['order_id']]);
        $del_id = $delete_id->id;*/

        $del = $driverApps->query();
        $del->delete()->where(['order_id'=>$order_id])->execute();

        $driverAcc = array('date_of_accident',
                             'nature_of_accident',
                             'fatalities',
                             'injuries',
                             'driver_license',
                             'province',
                             'license_number',
                             'class',
                             'expiration_date'
                        );
        $total_acc_record=0;
        $accident = array();
        foreach($_POST as $data =>$val){
            
            if($data=="document_type"){
                continue;
            } else if($data =="count_acc_record"){
                $total_acc_record = $val;
            } else if( in_array($data, $driverAcc) ) {
                continue;
            } else {
                // if(isset($_POST[$data]) ) {
                    $arr[$data] = $val;
                // }
            }
        }
        $save = $driverApps->newEntity($arr);
        if($driverApps->save($save))
        {
            $id = $save->id;
            $driverAppAcc = TableRegistry::get('driver_application_accident');
            // $del = $driverAppAcc->query();
            // $del->delete()->where(['driver_application_id'=>$id])->execute();
            for($i=0;$i < $total_acc_record; $i++){
                $acc['driver_application_id'] = $id;
                $acc['date_of_accident'] = $_POST['date_of_accident'][$i];
                $acc['nature_of_accident'] = $_POST['nature_of_accident'][$i];
                $acc['fatalities'] = $_POST['fatalities'][$i];
                $acc['injuries'] = $_POST['injuries'][$i];
                $saveAcc = $driverAppAcc->newEntity($acc);
                $driverAppAcc->save($saveAcc);
            }

               $driverAppLic = TableRegistry::get('driver_application_licenses');
               // $del = $driverAppLic->query();
                 // $del->delete()->where(['driver_application_id'=>$id])->execute();
              for($i=0;$i < 2; $i++){
                $lic['driver_application_id'] = $id;
                $lic['driver_license'] = $_POST['driver_license'][$i];
                $lic['province'] = $_POST['province'][$i];
                $lic['license_number'] = $_POST['license_number'][$i];
                $lic['class'] = $_POST['class'][$i];
                $lic['expiration_date'] = $_POST['expiration_date'][$i];
                $saveLic = $driverAppLic->newEntity($lic);
                $driverAppLic->save($saveLic);
                }

        }
       
       

        die;
    }
    /**
     * saving driver application data
     */
    public function savedDriverEvaluation($order_id = NULL , $cid = NULL){
        // echo "<pre>";print_r($_POST);die; 
        

        $roadTest = TableRegistry::get('road_test');
        $arr['order_id'] = $order_id;
        $arr['client_id'] = $cid;
        $arr['user_id'] = $this->request->session()->read('Profile.id');
        $del = $roadTest->query();
        $del->delete()->where(['order_id'=>$order_id])->execute();

        foreach($_POST as $data=>$val){
          
            if( $data=="document_type" ){
                continue;
            } else {
                if(isset($_POST[$data])){
                    $arr[$data]=$val;
                }
            }

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
    public function savedMeeOrder($order_id = NULL , $cid = NULL){
       //consent form
       // echo "<pre>";print_r($_POST);die;
        $consentForm = TableRegistry::get('consent_form');
        $arr['order_id'] =  $order_id;
        $arr['client_id'] = $cid;
        $arr['user_id'] = $this->request->session()->read('Profile.id');

        $del = $consentForm->query();
        $del->delete()->where(['order_id'=>$order_id])->execute();
        
        foreach($_POST as $data => $val){

            if( $data =='offence' || $data =='date_of_sentence' || $data =='location' ){
                continue;
            }
            //echo $data." ".$val."<br />";
            $arr[$data] = $val;
            
        }

// echo "<pre>";print_r($arr);die;
        $save = $consentForm->newEntity($arr);
        if($consentForm->save($save)) {
            $id  = $save->id;
            $consentFormCri = TableRegistry::get('consent_form_criminal');
              
            // $del = $consentFormCri->query();
            // $del->delete()->where(['consent_form_id'=>$id])->execute();

            for($i=0;$i<8;$i++){
                $crm['consent_form_id'] = $id;
                $crm['offence'] = $_POST['offence'][$i];
                $crm['date_of_sentence'] = $_POST['date_of_sentence'][$i];
                $crm['location'] = $_POST['location'][$i];
                $saveCrm = $consentForm->newEntity($crm);
                $consentFormCri->save($saveCrm);
            }
        }
        
        die;
    }

    function saveEmployment($order_id = NULL , $cid = NULL){
        // echo "<pre>";print_r($_POST);die;
        //employement 
        $employment = TableRegistry::get('employment_verification');
        
        $del = $employment->query();
        $del->delete()->where(['order_id'=>$order_id])->execute();

        for($i=0;$i < $_POST['count_past_emp'];$i++){
            $arr2['order_id'] = $order_id;
            $arr2['client_id'] = $cid;
            $arr2['user_id'] = $this->request->session()->read('Profile.id');

            if( isset($_POST['company_name'][$i]) ){
                $arr2['company_name'] = $_POST['company_name'][$i];
            }

            if( isset($_POST['address'][$i]) ){
                $arr2['address'] = $_POST['address'][$i];
            }

            if( isset($_POST['city'][$i]) ){
                $arr2['city'] = $_POST['city'][$i];
            }

            if( isset($_POST['state_province'][$i]) ){
                $arr2['state_province'] = $_POST['state_province'][$i];
            }

            if( isset($_POST['country'][$i]) ){
                $arr2['country'] = $_POST['country'][$i];
            }

            if( isset($_POST['supervisor_name'][$i]) ){
                $arr2['supervisor_name'] = $_POST['supervisor_name'][$i];
            }

            if( isset($_POST['supervisor_phone'][$i]) ){
                $arr2['supervisor_phone'] = $_POST['supervisor_phone'][$i];
            }

            if( isset($_POST['supervisor_email'][$i]) ){
                $arr2['supervisor_email'] = $_POST['supervisor_email'][$i];
            }

            if( isset($_POST['supervisor_secondary_email'][$i]) ){
                $arr2['supervisor_secondary_email'] = $_POST['supervisor_secondary_email'][$i];
            }

            if( isset($_POST['employment_start_date'][$i]) ){
                $arr2['employment_start_date'] = $_POST['employment_start_date'][$i];
            }

            if( isset($_POST['employment_end_date'][$i]) ){
                $arr2['employment_end_date'] = $_POST['employment_end_date'][$i];
            }
            if( isset($_POST['claims_recovery_date'][$i]) ){
                $arr2['claims_recovery_date'] = $_POST['claims_recovery_date'][$i];
            }
            if( isset($_POST['emploment_history_confirm_verify_use'][$i]) ){
                $arr2['emploment_history_confirm_verify_use'] = $_POST['emploment_history_confirm_verify_use'][$i];
            }
            if( isset($_POST['us_dotsignature'][$i]) ){
                $arr2['us_dotsignature'] = $_POST['us_dotsignature'][$i];
            }
            if( isset($_POST['signature'][$i]) ){
                $arr2['signature'] = $_POST['signature'][$i];
            }
            if( isset($_POST['signature_datetime'][$i]) ){
                $arr2['signature_datetime'] = $_POST['signature_datetime'][$i];
            }

            if( isset($_POST['equipment_vans'][$i]) ){
                $arr2['equipment_vans'] = $_POST['equipment_vans'][$i];
            }
            if( isset($_POST['equipment_reefer'][$i]) ){
                $arr2['equipment_reefer'] = $_POST['equipment_reefer'][$i];
            }
            if( isset($_POST['equipment_decks'][$i]) ){
                $arr2['equipment_decks'] = $_POST['equipment_decks'][$i];
            }
            if( isset($_POST['equipment_super'][$i]) ){
                $arr2['equipment_super'] = $_POST['equipment_super'][$i];
            }
            if( isset($_POST['equipment_straight_truck'][$i]) ){
                $arr2['equipment_straight_truck'] = $_POST['equipment_straight_truck'][$i];
            }
            if( isset($_POST['equipment_others'][$i]) ){
                $arr2['equipment_others'] = $_POST['equipment_others'][$i];
            }
            

            //driving
            if( isset($_POST['driving_experince_local'][$i]) ){
                $arr2['driving_experince_local'] = $_POST['driving_experince_local'][$i];
            }
            if( isset($_POST['driving_experince_canada'][$i]) ){
                $arr2['driving_experince_canada'] = $_POST['driving_experince_canada'][$i];
            }
            if( isset($_POST['driving_experince_canada_rocky_mountains'][$i]) ){
                $arr2['driving_experince_canada_rocky_mountains'] = $_POST['driving_experince_canada_rocky_mountains'][$i];
            }
            if( isset($_POST['driving_experince_usa'][$i]) ){
                $arr2['driving_experince_usa'] = $_POST['driving_experince_usa'][$i];
            }
            

            if( isset($_POST['claims_with_employer'][$i]) ){
                $arr2['claims_with_employer'] = $_POST['claims_with_employer'][$i];
            }

            $save2 = $employment->newEntity($arr2);
            $employment->save($save2);
        }
       
        die;
    }


    function saveEducation($order_id = NULL,$cid = NULL){        
        // echo $_POST['college_school_name'][0]
        //education
        $education = TableRegistry::get('education_verification');
        
        $del = $education->query();
        $del->delete()->where(['order_id'=>$order_id])->execute();
        
        $edu = array();
        $edu['order_id'] = $order_id;
        $edu['client_id'] = $cid;
        $edu['user_id'] = $this->request->session()->read('Profile.id');
        $onlyEducation = array(
            'edu_name',
            'edu_id',
            'edu_date_of_birth',
            'edu_total_claim_past3',
            'edu_current',
            'highest_grade_completed',
            'high_school',
            'college',
            'last_school_attended'
        );
        foreach($_POST as $data=>$val){
            if($data=="document_type" || $data == "count_more_edu" || $data == "count_more_edu_doc"){
                continue;
            } else if ( in_array($data,$onlyEducation) ){
                $edu[$data] = $val;
            } 
        }
        $save3 = $education->newEntity($edu);
        if($education->save($save3))
        {
            $edu_id = $save3->id;

            $education_pass = TableRegistry::get('education_verification_pass_education');

           for($i=1;$i<=$_POST['count_more_edu'];$i++){
                $eduPass=array();
                $eduPass['education_verification_id'] = $edu_id;
                $eduPass['college_school_name'] = $_POST['college_school_name'][$i-1];
                $eduPass['supervisior_name'] = $_POST['supervisior_name'][$i-1];
                $eduPass['supervisior_phone'] = $_POST['supervisior_phone'][$i-1];
                $eduPass['supervisior_email'] = $_POST['supervisior_email'][$i-1];
                $eduPass['supervisior_secondary_email'] = $_POST['supervisior_secondary_email'][$i-1];
                $eduPass['education_start_date'] = $_POST['education_start_date'][$i-1];
                $eduPass['education_end_date'] = $_POST['education_end_date'][$i-1];
                if(isset( $_POST['claim_tutor'][$i-1])){
                    $eduPass['claim_tutor'] = $_POST['claim_tutor'][$i-1];
                }

                $eduPass['date_claims_occur'] = $_POST['date_claims_occur'][$i-1];
                $eduPass['education_history_confirmed_by'] = $_POST['education_history_confirmed_by'][$i-1];
                $eduPass['signature'] = $_POST['signature'][$i-1];
                $eduPass['date_time'] = $_POST['date_time'][$i-1];
                // echo "<pre>";print_r($eduPass);continue;
                $save_edu_pass3 = $education_pass->newEntity($eduPass);
                $education_pass->save($save_edu_pass3);
           }

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
        $cn = $this->getUserDocumentcount();
        if($setting->orders_edit==0 || count($doc)==0 || $cn ==0)
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
    
    function add($cid=0,$did=0,$type=NULL)
    {
         $this->set('client_id',$cid);
         $this->set('doc_id',$did);
         $doc = $this->getDocumentcount();
         $cn = $this->getUserDocumentcount();
         $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
        if(is_null($type)) {
            // docu
                
                if($did!=0)
                {

                    $doc = TableRegistry::get('Documents');
                    $query = $doc->find()->where(['id' => $did])->first();
                    $this->set('document',$query);
                    if($setting->document_edit==0 || count($doc)==0 || $cn ==0) {
                        $this->Flash->error('Sorry, You dont have the permissions.');
                        	return $this->redirect("/");
                        
                    }
                    
                } else {
                    if($setting->document_create==0 || count($doc)==0 || $cn == 0) {
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
        		
                    } else {
                            $query2 = $docs->query();
                                $query2->update()
                                ->set($arr)
                                ->where(['id' => $did])
                                ->execute();
                                $this->Flash->success('The document has been saved.');
                        	$this->redirect('/documents');
                    }
        		}
        } else {
                   

                    if($did!=0)
                    {

                        $doc = TableRegistry::get('orders');
                        $query = $doc->find()->where(['id' => $did])->first();
                        $this->set('document',$query);
                        if($setting->document_edit==0 || count($doc)==0 || $cn ==0) {
                            $this->Flash->error('Sorry, You dont have the permissions.');
                                return $this->redirect("/");
                            
                        }
                        
                    } else {
                        if($setting->document_create==0 || count($doc)==0 || $cn ==0) {
                            $this->Flash->error('Sorry, You dont have the permissions.');
                                return $this->redirect("/");
                            
                        }
                    }
                    if(isset($_POST['uploaded_for'])){
                        $docs = TableRegistry::get('orders');
                         
                        $arr['uploaded_for'] = $_POST['uploaded_for'];
                        $arr['client_id'] = $cid;
                        if(isset($_POST['order_type']))
                            $arr['order_type'] = $_POST['order_type'];
                            $arr['created'] = date('Y-m-d H:i:s');
                        
                        if(!$did || $did=='0'){
                           $arr['user_id'] = $this->request->session()->read('Profile.id');
                           $doc = $docs->newEntity($arr);
                            if ($docs->save($doc)) {
                                $this->Flash->success('The document has been saved.');
                                    $this->redirect('/orderslist');
                            } else {
                                 //$this->Flash->error('The client could not be saved. Please, try again.');
                                //echo "e";
                            }
                    
                        } else {
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

    }


    function edit()
    {
        $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
        $doc = $this->getDocumentcount();
        $cn = $this->getUserDocumentcount();
        if($setting->document_edit==0 || count($doc)==0 | $cn ==0)
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
        $query->where(['display' => 1]);
        return $query->all();
    }
    
    function getUserDocumentcount()
    {
        $doc = TableRegistry::get('Subdocuments');
        $query = $doc->find();
        $query->where(['display' => 1])->all();
        $cnt=0;
        foreach($query as $q)
        {
            $subdoc = TableRegistry::get('profilessubdocument');
            if($query1 = $subdoc->find()->where(['profile_id'=>$this->request->session()->read('Profile.id'),'subdoc_id'=>$q->id,'display <>'=>0])->first())
                $cnt ++;
        }
        return $cnt;
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
        $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
        $doc = $this->getDocumentcount();
        $cn = $this->getUserDocumentcount();

        if($setting->orders_list==0 || count($doc)==0 || $cn ==0)
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

    public function getOrderData($cid = NULL,$order_id = NULL){
        // print_r($_GET);die;
        if($_GET['form_type']=="company_pre_screen_question.php"){    
            $preScreen = TableRegistry::get('pre_screening');
            $prescreenDetail = $preScreen->find()->where(['client_id'=>$cid,'order_id'=>$order_id])->first();
        // die('asd');
        unset($prescreenDetail->id);
        unset($prescreenDetail->document_id);
        unset($prescreenDetail->order_id);
        unset($prescreenDetail->client_id);
        unset($prescreenDetail->user_id);
        echo json_encode($prescreenDetail);

        } else if($_GET['form_type']=="driver_application.php"){
            
            // $this->getDriverAppData($cid,$order_id);
            $driveApp = TableRegistry::get('driver_application');
            $driveAppDetail = $driveApp->find()->where(['client_id'=>$cid,'order_id'=>$order_id])->first();
            //$driveAppID = $driveAppDetail->id;
            unset($driveAppDetail->id);
            unset($driveAppDetail->document_id);
            unset($driveAppDetail->order_id);
            unset($driveAppDetail->client_id);
            unset($driveAppDetail->user_id);
            echo json_encode($driveAppDetail);

            // $driveAppAcc = TableRegistry::get('driver_application_accident');
            // $driveAppDetail = $driveAppAcc->find()->where(['id'=>$driveAppID,'client_id'=>$cid,'order_id'=>$order_id]);


        } else if($_GET['form_type']=="driver_evaluation_form.php"){
            
            // $this->getRoadTestData($cid,$order_id);
            $roadTest = TableRegistry::get('road_test');
            $roadTestDetail = $roadTest->find()->where(['client_id'=>$cid,'order_id'=>$order_id])->first();
            // $prescreenID = $prescreenDetail->id;
            echo json_encode($roadTestDetail);


        } else if($_GET['form_type']=="document_tab_3.php"){
            
            $consentForm = TableRegistry::get('consent_form');
            $consentFormDetail = $consentForm->find()->where(['client_id'=>$cid,'order_id'=>$order_id])->first();
            $consentFormID = $consentFormDetail->id;

            $consentFormCriminal = TableRegistry::get('consent_form_criminal');
            $consentFormCrmDetail = $consentFormCriminal->find()->where(['id'=>$consentFormID,'client_id'=>$cid,'order_id'=>$order_id])->first();
            echo json_encode($consentFormDetail);


            $employment = TableRegistry::get('employment_verification');
            $employmentDetail = $employment->find()->where(['client_id'=>$cid,'order_id'=>$order_id])->first();
            // echo json_encode($employmentDetail);

            $education = TableRegistry::get('education_verification');
            $educationDetail = $education->find()->where(['client_id'=>$cid,'order_id'=>$order_id])->first();
            $edu_id = $educationDetail->id;            
            // echo json_encode($educationDetail);

            $educationPass = TableRegistry::get('education_verification_pass_education');
            $educationPassDetail = $educationPass->find()->where(['id'=>$id,'client_id'=>$cid,'order_id'=>$order_id])->first();
            $edu_id = $educationPassDetail->id;            
            // echo json_encode($educationPassDetail);          

        }
        die;

    }

   
    
}
