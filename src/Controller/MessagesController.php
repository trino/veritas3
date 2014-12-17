<?php 
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Controller\Controller;


class MessagesController extends AppController {
    public function index() {
	   
		
	}
    public function inbox()
    {
        $this->layout = 'blank';
    }
    public function view()
    {
        $this->layout = 'blank';
    }
    
    }