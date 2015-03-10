<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class TrainingController extends AppController {
    public function index() {
        if (isset($_GET["action"])){
            if($this->canedit()) {
                switch ($_GET["action"]) {
                    case "delete":
                        $this->deletequiz($_GET["quizid"]);
                        break;
                }
            } else {
                $this->Flash->error('You can not edit quizzes.');
            }
        }
        $table = TableRegistry::get('training_list')->find('all');
        $this->set('quizes',$table );
        $this->set('canedit', $this->canedit());
    }

    public function edit(){
        if (isset($_GET["action"])){
            if($this->canedit()) {
                switch ($_GET["action"]) {
                    case "delete":
                        $this->deletequestion($_GET["QID"]);
                        break;
                    case "save":

                        break;
                }
            } else {
                $this->Flash->error('You can not edit quizzes.');
            }
        }

        if (isset($_GET["quizid"]) && $this->canedit()) {
            $table = TableRegistry::get('training_list');
            $quiz =  $table->find()->where(['ID'=>$_GET["quizid"]])->first();
            $this->set('quiz',$quiz );
            $this->quiz();
        }
        $this->set('canedit', $this->canedit());
    }

    public function quiz(){
        $table = TableRegistry::get('training_quiz');
        //$answers =  $table->find()->where(['QuizID'=>$_GET["quizid"]]);
        $answers =  $table->find('all', array('QuizID' => $_GET["quizid"], 'order' => array('QuestionID ASC') ));
        $this->set('questions',$answers);
        $this->set('canedit', $this->canedit());
    }
    public function video(){}

    public function canedit(){
        return  $this->request->session()->read('Profile.super');
    }
    public function deletequiz($quizID){
        $table = TableRegistry::get('training_list');
        $table->deleteAll(array('ID' => $quizID), false);
        $table = TableRegistry::get('training_quiz');
        $table->deleteAll(array('QuizID' => $quizID), false);
        $this->Flash->success('The quiz was deleted.');
    }
    public function deletequestion($QID){
        $table = TableRegistry::get('training_quiz');
        $table->deleteAll(array('ID' => $QID), false);
        $this->Flash->success('The question was deleted.');
    }
    public function savequiz($post){//ID Name Description Attachments image
        if (isset($post["ID"])){
            $table = TableRegistry::get('training_list');
            $table->query()->update()->set(['Name' => $post["Name"], 'Description' =>  $post["Description"], 'Attachments' => $post['Attachments']])
                ->where(['ID' => $post["ID"]])
                ->execute();
            $this->Flash->success('The quiz was edited');
        } else { //new

        }
    }
}