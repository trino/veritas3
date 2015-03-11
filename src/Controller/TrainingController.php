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
                        $this->deletequestion2($_GET["quizid"], $_GET["QuestionID"]);
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
        $answers =  $table->find('all', array('conditions' => array('QuizID' => $_GET["quizid"]), 'order' => array('QuestionID ASC') ));
        //$this->set('quizid',$_GET["quizid"]);
        $this->set('questions',$answers);
        if (count($_POST)>0){
            $this->saveanswers($this->getuserid(), $answers, $_POST);
        }
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
                    $this->deletequestion2($_GET["quizid"], $_GET["QuestionID"]);
                    break;
            }
            if (isset($_GET["QuestionID"])) {
                echo "quizID= " . $_GET["quizid"] . " questionid=" . $_GET["QuestionID"];
                $table = TableRegistry::get('training_quiz');
                $quiz =  $table->find()->where(['QuizID'=>$_GET["quizid"], 'QuestionID'=> $_GET["QuestionID"]])->first();
                $this->set('question',$quiz );
            }
        } else {
            $this->Flash->error('You can not edit quizzes.');
        }
        $this->set('canedit', $this->canedit());
    }






    public function i2($post){
        foreach($post as $key => $value){//($temp=0; $temp<count($post); $temp+=1){
            //if (!is_numeric($post[$temp])) { $post2[$temp] = $this->clean($post[$temp]);  }
            if (!is_numeric($value) || $value == true) { $post2[$key] = $this->clean($value);  } else {$post2[$key] = $value;}
        }
        return $post2;
    }
    public function clean($text){
        return '"' . mysql_real_escape_string(trim($text)) . '"';
    }
    public function canedit(){
        return  $this->request->session()->read('Profile.super');
    }
    public function getuserid(){
        return $this->request->session()->read('Profile.id');
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
        $post=$this->i2($post);
        if (isset($post["ID"])){
            $table->query()->update()->set(['Name' => $post["Name"], 'Description' =>  $post["Description"], 'Attachments' => $post['Attachments'], 'image' => $post['image']])
                ->where(['ID' => $post["ID"]])
                ->execute();
            $this->Flash->success('The quiz was edited');
        } else { //new
            $table->query()->insert(['Name', 'Description', 'Attachments', 'image'])
             ->values(['Name' => $post["Name"], 'Description' => $post["Description"], 'Attachments' => $post['Attachments'], 'image' => $post['image']])->execute();
            $this->Flash->success('The quiz was created');
        }
    }
    public function savequestion($post){
        //$post=$this->i2($post);
        $table = TableRegistry::get('training_quiz');
        if($post['new'] == "true") {
            $table->query()->insert(['Question', 'QuizID', 'QuestionID', 'Answer', 'Choice0', 'Choice1', 'Choice2', 'Choice3', 'Picture'])
                ->values(['Question' => $post["Question"], 'QuizID' => $post["QuizID"], 'QuestionID' => $post['QuestionID'], 'Answer' => $post['Answer'], 'Choice0' => $post['Choice0'], 'Choice1' => $post['Choice1'], 'Choice2' => $post['Choice2'], 'Choice3' => $post['Choice3'], 'Picture' => $post['Picture']])
                ->execute();
            $this->Flash->success('The question was created');
        }else{
            print_r($post);
            $table->query()->update()->set(['Question' => $post["Question"], 'Answer' => $post['answer'], 'Choice0' => $post['Choice0'], 'Choice1' => $post['Choice1'], 'Choice2' => $post['Choice2'], 'Choice3' => $post['Choice3'], 'Picture' => $post['Picture']])
                ->where(['QuizID' => $post['QuizID'], 'QuestionID' => $post['QuestionID']])->execute();
            $this->Flash->success('The question was saved');
        }
    }

    public function saveanswers($UserID, $Quiz, $Post){
        //debug($Quiz);
        $answers=0;
        foreach($Quiz as $question){//QuizID QuestionID
            $QuestionName = $question->QuizID . ":" . $question->QuestionID;
            $Answer = $Post[$QuestionName . "_answer"];
            $Flagged = false;
            if (isset($Post[$QuestionName . "_flaggedcheckbox"])){ $Flagged = $Post[$QuestionName . "_flaggedcheckbox"] == 1;}

            //echo "<P></P><BR>UserID: " . $UserID;
            //echo "<BR>Quiz ID: " . $question->QuizID;
            //echo "<BR>Question ID: " . $question->QuestionID;
            //echo "<BR>Answer: " . $Answer;
            //echo "<BR>Flagged: " . $Flagged ;

            $this->saveanswer($UserID, $question->QuizID, $question->QuestionID, $Answer, $Flagged);
            $answers+=1;
        }
        $this->Flash->success($answers . ' answers were saved');
    }
    public function saveanswer($UserID, $QuizID, $QuestionID, $Answer, $Flagged){
        $table = TableRegistry::get("training_answers");
        $results = $table->find('all', array('conditions' => array('UserID'=>$UserID, 'QuizID'=>$QuizID, 'QuestionID'=> $QuestionID)))->first();
        if(!$results) {
            $table->query()->insert(['UserID', 'QuizID', 'QuestionID', 'Answer', 'flagged'])
                ->values(['UserID' => $UserID, 'QuizID' => $QuizID, 'QuestionID' => $QuestionID, 'Answer' => $Answer, 'flagged' => $Flagged])->execute();
        }else{
            $table->query()->update()->set(['UserID' => $UserID, 'QuizID' => $QuizID, 'QuestionID' => $QuestionID, 'Answer' => $Answer, 'flagged' => $Flagged])
                ->where(['UserID'=>$UserID, 'QuizID'=>$QuizID, 'QuestionID'=> $QuestionID])->execute();
        }
    }
}