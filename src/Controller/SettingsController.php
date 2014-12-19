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
         $setting = TableRegistry::get('Settings');
         $query = $setting->query();
                $query->update()
                ->set(['body' => $class,'sidebar'=>$_POST['side']])
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
                ->set(['client'=>$_POST['client'],'document'=>$_POST['document'],'profile'=>$_POST['profile']])
                ->where(['id' => 1])
                ->execute();
        $this->redirect(['controller'=>'profiles','action'=>'add']);
    }
    
    
    
    
 }