<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;



/**
 * Logos Controller
 *
 * @property App\Model\Table\LogosTable $Logos
 */
class SettingsController extends AppController {
/**
 * Index method
 *
 * @return void
 */
 
 public function intialize()
    {
        parent::intialize();
        if(!$this->request->session()->read('Profile.id'))
        {
            redirect('/login');
        }
    }
	public function index() {
        
     
    }
    
   function get_settings()
   {
        $setting = TableRegistry::get('Settings');
         $query = $setting->find();
                 
         $l = $query->first();
         
         $this->response->body(($l));
            return $this->response;
         die();
   }
   
   function get_blocks($uid)
   {
        $setting = TableRegistry::get('blocks');
         $query = $setting->find()->where(['user_id'=>$uid]);
                 
         $l = $query->first();
         
         $this->response->body(($l));
            return $this->response;
         die();
   }
    function get_side($uid)
   {
        $setting = TableRegistry::get('sidebar');
         $query = $setting->find()->where(['user_id'=>$uid]);
                 
         $l = $query->first();
         
         $this->response->body(($l));
            return $this->response;
         die();
   }
    function changebody()
    {
         $class = $_POST['class'];
         if(isset($_POST['box']))
            $box = $_POST['box'];
         else
            $box = 0;
         $setting = TableRegistry::get('Settings');
         $query = $setting->query();
                $query->update()
                ->set(['body' => $class,'sidebar'=>$_POST['side'],'box'=>$box])
                ->where(['id' => 1])
                ->execute();
         
         die();
    }
    
    function display()
    {
         $display = $_POST['display'];
         $setting = TableRegistry::get('Settings');
         $query = $setting->query();
                $query->update()
                ->set(['display'=>$display])
                ->where(['id' => 1])
                ->execute();
         
         die();
    }
    
    function change_text()
    {
        
        $setting = TableRegistry::get('Settings');
         $query = $setting->query();
                $query->update()
                ->set(['client'=>$_POST['client'],'document'=>$_POST['document'],'profile'=>$_POST['profile'],'mee'=>$_POST['mee']])
                ->where(['id' => 1])
                ->execute();
        echo "1";
        die();
        //$this->redirect(['controller'=>'profiles','action'=>'edit',$this->request->session()->read("Profile.id")]);
    }
    function change_clients()
    {
        $setting = TableRegistry::get('Settings');
         $query = $setting->query();
                $query->update()
                ->set(['client_option'=>$_POST['client_option']])
                ->where(['id' => 1])
                ->execute();
        echo "1";
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
    function getCSubDoc($c_id,$doc_id)
    {
        $sub = TableRegistry::get('clientssubdocument');
        $query = $sub->find();
        $query->select()->where(['client_id'=>$c_id, 'subdoc_id'=>$doc_id]);
        $q = $query->first();
        $this->response->body($q);
        return $this->response;
    }
    
    function all_settings($uid="", $type="", $scope="", $scope_id="", $doc_id="")
    {
        
        if($type != "" || $type !="0")
        {
            if($type =='sidebar')
                return $this->get_side($uid);
            elseif($type =='blocks')
                return $this->get_blocks($uid);
        }
        if($scope != "")
        {
            if($scope == 'profile')
                return $this->getProSubDoc($scope_id,$doc_id);
            elseif($scope == 'client')
                return $this->getCSubDoc($scope_id,$doc_id);
            
        }
        die();
            
    }
    
    public function check_client_count(){
        //$this->loadModel('Clients');
        
    }
    function getclienturl($uid,$type)
    {
        $setting = TableRegistry::get('clients');
        $u = $uid;
        $l ="";
        if(!$this->request->session()->read('Profile.super')){
           
            $query = $setting->find()->where(['profile_id LIKE "'.$u.',%" OR profile_id LIKE "%,'.$u.',%" OR profile_id LIKE "%,'.$u.'" OR profile_id ="'.$u.'"'])->count();
            
            if($query>1)
             {
                $l = "clients?flash";
             }
             else
             {
                if($query2 = $setting->find()->where(['profile_id LIKE "'.$u.',%" OR profile_id LIKE "%,'.$u.',%" OR profile_id LIKE "%,'.$u.'" OR profile_id ="'.$u.'"'])->first())
                    $l = "documents/addorder/".$query2->id;
             }
        }
        else
        {
             $q = $setting->find()->all();
             if(count($q)>1)
             {
                $l = "clients?flash";
             }
             else
             {
                $query3 = $setting->find()->first();
                if (!is_null($query3)) {
                    $l = "documents/addorder/" . $query3->id;
                }
             }
        }
         if($type=='order')
         {
            $url = $l;
         }
         else
            $url = str_replace('addorder','add',$l);
         $this->response->body(($url));
            return $this->response;
    }
    
    
    
    
 }