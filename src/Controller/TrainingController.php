<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class TrainingController extends AppController {
    public function index() {
        $table = TableRegistry::get('training_list')->find('all');
        $this->set('quizes',$table );
    }

    public function quiz(){}
    public function video(){}
}