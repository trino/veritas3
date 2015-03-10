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
                        $this->savequiz($_POST);
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
    public function video(){}//just a simple video player

    public function editquestion(){
        if ($this->canedit()){
            switch($_GET["action"]){
                case "save":
                    $this->savequestion($_POST);
                    break;
                case "delete":
                    $this->Flash->success('The question was deleted.');
                    break;
            }
            if (isset($_GET["QID"])) {
                $table = TableRegistry::get('training_quiz');
                $quiz =  $table->find()->where(['QuizID'=>$_GET["quizid"], 'ID'=> $_GET["QID"]])->first();
                $this->set('question',$quiz );
            }
        } else {
            $this->Flash->error('You can not edit quizzes.');
        }
        $this->set('canedit', $this->canedit());
    }








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
    public function deletequestion2($QuizID, $QuestionID){
        $table = TableRegistry::get('training_quiz');
        $table->deleteAll(array('QuizID' => $QuizID, 'QuestionID' => $QuestionID), false);
        $this->Flash->success('The question was deleted.');
    }
    public function savequiz($post){//ID Name Description Attachments image
        $table = TableRegistry::get('training_list');
        if (isset($post["ID"])){
            $table->query()->update()->set(['Name' => $post["Name"], 'Description' =>  $post["Description"], 'Attachments' => $post['Attachments'], 'image' => $post['image']])
                ->where(['ID' => $post["ID"]])
                ->execute();
            $this->Flash->success('The quiz was edited');
        } else { //new
            $table->query()->insert(['Name', 'Description', 'Attaschments', 'image'])
                ->values(['Name' => $post["Name"], 'Description' => $post["Description"], 'Attachments' => $post['Attachments'], 'image' => $post['image']])
                ->execute();

            $this->Flash->success('The quiz was created');
        }
    }
    public function savequestion($post){
        $table = TableRegistry::get('training_quiz');
        if($post['new'] == "true") {
            $table->query()->insert(['Question', 'QuizID', 'QuestionID', 'Answer', 'Choice0', 'Choice1', 'Choice2', 'Choice3', 'Picture'])
                ->values(['Question' => $post["Question"], 'QuizID' => $post["QuizID"], 'QuestionID' => $post['QuestionID'], 'Answer' => $post['Answer'], 'Answer' => $post['answer'], 'Choice0' => $post['Choice0'], 'Choice1' => $post['Choice1'], 'Choice2' => $post['Choice2'], 'Choice3' => $post['Choice3'], 'Picture' => $post['Picture']])
                ->execute();
            $this->Flash->success('The question was created');
        }else{
            $table->query()->update()->set(['Question' => $post["Question"], 'Answer' => $post['Answer'], 'Answer' => $post['answer'], 'Choice0' => $post['Choice0'], 'Choice1' => $post['Choice1'], 'Choice2' => $post['Choice2'], 'Choice3' => $post['Choice3'], 'Picture' => $post['Picture']])
                ->where(['ID' => $post["QID"]])
                ->execute();
            $this->Flash->success('The question was saved');
        }

    }
}