<?php

namespace App\Controller;
use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\Utility\Inflector;
use Cake\View\Exception\MissingTemplateException;


class PagesController extends AppController {

     public function initialize() {
        parent::initialize();
        if(!$this->request->session()->read('User.id'))
        {
            $this->redirect('/login');
        }
        
    }
	public function index() {
		
	}
}
