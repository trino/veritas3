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
                 $query->select(['layout','body']);
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
                ->set(['body' => $class])
                ->where(['id' => 1])
                ->execute();
         
         die();
    }
    
    
 }