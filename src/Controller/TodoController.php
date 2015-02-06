<?php 
namespace App\Controller;


use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;




class TodoController extends AppController {

    
     public function initialize() {
        parent::initialize();
        if(!$this->request->session()->read('Profile.id'))
        {
            $this->redirect('/login');
        }
        
    }
    
	public function index() {
	   
		
	}



	public function view($id = null) {
	    
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
	   if(isset($_POST['submit']))
       {
       
            foreach($_POST as $k=>$v)
            {
                if($k == 'date')
                    $arr[$k] = date('Y-m-d H:i:s',strtotime(trim(str_replace("-","",$v)).":00"));
                else
                    $arr[$k]= $v;
            }
            $events = TableRegistry::get('Events');
    	    $arr['user_id'] = $this->request->session()->read('Profile.id');
            $event = $events->newEntity($arr);
    
            if ($events->save($event)) {
                $this->Flash->success('Events added successfully.');
                
            } 
            else 
            {
                $this->Flash->error('Events could not be added. Please try again.');
                
            }
            return $this->redirect(['action' => 'calender']);
            
        }
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
	    $events = TableRegistry::get('Events');
        $event = $events->find()->where(['id'=>$id])->first();
        $this->set('event',$event);
        if(isset($_POST['submit']))
       {
       
            foreach($_POST as $k=>$v)
            {
                if($k!='submit')
                if($k == 'date')
                    $arr[$k] = date('Y-m-d H:i:s',strtotime(trim(str_replace("-","",$v)).":00"));
                else
                    $arr[$k]= $v;
            }
            $events = TableRegistry::get('Events');
            
            $query2 = $events->query();
            $query2->update()
                ->set($arr)
                ->where(['id' => $id])
                ->execute();
    	        $this->Flash->success('Events edited successfully.');
                
            
            return $this->redirect(['action' => 'calender']);
            
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
		$profile = $this->Profiles->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->Profiles->delete($profile)) {
			$this->Flash->success('The todo has been deleted.');
		} else {
			$this->Flash->error('Todo could not be deleted. Please try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
    
    function logout()
    {
        $this->request->session()->delete('Profile.id');
        $this->redirect('/login');
    }
    
    function todo()
    {
        
    }
    function picker(){
        $this->layout= 'blank';
    }
    function calender1(){
        $this->layout= 'blank';
    }
    
    function date($date)
    {
        
    }
    function calender()
    {
        $events = TableRegistry::get('Events');
        $event = $events->find()->where(['user_id'=>$this->request->session()->read('Profile.id')])->order(['date'=>'DESC'])->all();
        //debug($event);
        $this->set('events', $event);
    }
   
   
    
    

}
