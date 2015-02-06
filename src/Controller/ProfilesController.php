<?php
    namespace App\Controller;

    use App\Controller\AppController;
    use Cake\Event\Event;
    use Cake\Controller\Controller;
    use Cake\ORM\TableRegistry;


    class ProfilesController extends AppController {

        public $paginate = [
            'limit' => 20,
            'order'=>['id'=>'DESC'],

        ];
        public function initialize() {

            parent::initialize();
            $this->loadComponent('Settings');
            if(!$this->request->session()->read('Profile.id'))
            {
                $this->redirect('/login');
            }

        }
        function upload_img($id)
        {
            if(isset($_FILES['myfile']['name']) && $_FILES['myfile']['name'])
            {
                $arr = explode('.',$_FILES['myfile']['name']);
                $ext = end($arr);
                $rand = rand(100000,999999).'_'.rand(100000,999999).'.'.$ext;
                $allowed = array('jpg','jpeg','png','bmp','gif');
                $check = strtolower($ext);
                if(in_array($check,$allowed)){
                    move_uploaded_file($_FILES['myfile']['tmp_name'],APP.'../webroot/img/profile/'.$rand);

                    unset($_POST);
                    $_POST['image'] = $rand;
                    $img = TableRegistry::get('profiles');

                    //echo $s;die();
                    $query = $img->query();
                    $query->update()
                        ->set($_POST)
                        ->where(['id' => $id])
                        ->execute();
                    echo $rand;

                }
                else
                {
                    echo "error";
                }
            }
            die();
        }
public function training(){}
public function quiz(){}

    public function index() {
            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
            $u = $this->request->session()->read('Profile.id');
            $super = $this->request->session()->read('Profile.super');
            $condition = $this->Settings->getprofilebyclient($u,$super);
            if($setting->profile_list==0)
            {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/");

            }

            $cond = '';
            if(isset($_GET['searchprofile']))
            {
                $search = $_GET['searchprofile'];
                $searchs = strtolower($search);
            }

            if(isset($_GET['filter_profile_type']))
            {
                $profile_type = $_GET['filter_profile_type'];
            }
            if(isset($_GET['filter_by_client']))
            {
                $client = $_GET['filter_by_client'];
            }
            $querys = TableRegistry::get('Profiles');

            if(isset($_GET['searchprofile']) && $_GET['searchprofile'])
            {
                if($cond == '')
                    $cond = $cond.' (LOWER(title) LIKE "%'.$searchs.'%" OR LOWER(fname) LIKE "%'.$searchs.'%" OR LOWER(lname) LIKE "%'.$searchs.'%" OR LOWER(username) LIKE "%'.$searchs.'%" OR LOWER(address) LIKE "%'.$searchs.'%")';
                else
                    $cond = $cond.' AND (LOWER(title) LIKE "%'.$searchs.'%" OR LOWER(fname) LIKE "%'.$searchs.'%" OR LOWER(lname) LIKE "%'.$searchs.'%" OR LOWER(username) LIKE "%'.$searchs.'%" OR LOWER(address) LIKE "%'.$searchs.'%")';
            }

            if(isset($_GET['filter_profile_type']) && $_GET['filter_profile_type'])
            {
                if($cond == '')
                    $cond = $cond.' (profile_type = "'.$profile_type.'" OR admin = "'.$profile_type.'")';

                else
                    $cond = $cond.' AND (profile_type = "'.$profile_type.'" OR admin = "'.$profile_type.'")';
            }

            if(isset($_GET['filter_by_client']) && $_GET['filter_by_client'])
            {

                $sub = TableRegistry::get('Clients');
                $que = $sub->find();
                $que->select()->where(['id'=>$_GET['filter_by_client']]);
                $q = $que->first();
                $profile_ids = $q->profile_id;
                if(!$profile_ids)
                {
                    $profile_ids = '99999999999';
                }
                if($cond == '')
                    $cond = $cond.' (id IN ('.$profile_ids.'))';
                else
                    $cond = $cond.' AND (id IN ('.$profile_ids.'))';
            }
            if($this->request->session()->read('Profile.profile_type') == '2'){
            if($cond)
            {
                $cond = $cond.' OR (created_by = '.$this->request->session()->read('Profile.id').')';
            }
            else
            {
               $condition['created_by'] = $this->request->session()->read('Profile.id'); 
            }

            }
            /*=================================================================================================== */
            if($cond)
            {
                $query = $querys->find();
                $query = $query->where([$cond]);
            }
            else
            {
                $query = $this->Profiles->find()->where(['OR'=>$condition]);
            }
            //$this->set('profiles', $this->paginate($this->Profiles));
            //$this->set('profiles',$query);
            if(isset($search))
            {
                $this->set('search_text',$search);
            }
            if(isset($profile_type))
            {
                $this->set('return_profile_type',$profile_type);
            }
            if(isset($client))
            {
                $this->set('return_client',$client);
            }
            //$this->render('index');

            /*old code*/

            //debug($query);
            $this->set('profiles', $this->paginate($query));
        }

        /*

        function search()
        {
            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));

            if($setting->profile_list==0)
            {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                    return $this->redirect("/");

            }

            $cond = '';
            if(isset($_GET['searchprofile']))
            {
                $search = $_GET['searchprofile'];
                $searchs = strtolower($search);
            }

            if(isset($_GET['filter_profile_type']))
            {
               $profile_type = $_GET['filter_profile_type'];
            }
            if(isset($_GET['filter_by_client']))
            {
               $client = $_GET['filter_by_client'];
            }
            $querys = TableRegistry::get('Profiles');

            if(isset($_GET['searchprofile']) && $_GET['searchprofile'])
            {
                if($cond == '')
                    $cond = $cond.' (LOWER(title) LIKE "%'.$searchs.'%" OR LOWER(fname) LIKE "%'.$searchs.'%" OR LOWER(lname) LIKE "%'.$searchs.'%" OR LOWER(username) LIKE "%'.$searchs.'%" OR LOWER(address) LIKE "%'.$searchs.'%")';
                else
                    $cond = $cond.' AND (LOWER(title) LIKE "%'.$searchs.'%" OR LOWER(fname) LIKE "%'.$searchs.'%" OR LOWER(lname) LIKE "%'.$searchs.'%" OR LOWER(username) LIKE "%'.$searchs.'%" OR LOWER(address) LIKE "%'.$searchs.'%")';
            }

            if(isset($_GET['filter_profile_type']) && $_GET['filter_profile_type'])
            {
                if($cond == '')
                    $cond = $cond.' (profile_type = "'.$profile_type.'" OR admin = "'.$profile_type.'")';

                else
                    $cond = $cond.' AND (profile_type = "'.$profile_type.'" OR admin = "'.$profile_type.'")';
            }

            if(isset($_GET['filter_by_client']) && $_GET['filter_by_client'])
            {

            $sub = TableRegistry::get('Clients');
            $que = $sub->find();
            $que->select()->where(['id'=>$_GET['filter_by_client']]);
            $q = $que->first();
            $profile_ids = $q->profile_id;
            if(!$profile_ids)
            {
                $profile_ids = '99999999999';
            }
                if($cond == '')
                    $cond = $cond.' (id IN ('.$profile_ids.'))';
                else
                    $cond = $cond.' AND (id IN ('.$profile_ids.'))';
            }

            /*===================================================================================================
           if($cond)
            {
                $query = $querys->find();
                $query = $query->where([$cond]);
            }
            $this->set('profiles', $this->paginate($this->Profiles));
            $this->set('profiles',$query);
            if(isset($search))
            {
                $this->set('search_text',$search);
            }
            if(isset($profile_type))
            {
                $this->set('return_profile_type',$profile_type);
            }
            if(isset($client))
            {
                $this->set('return_client',$client);
            }
            $this->render('index');
        }

        */



        public function view($id = null) {


            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));

            if($setting->profile_list==0)
            {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/");

            }
            $this->loadModel('Logos');

            $this->set('logos', $this->paginate($this->Logos->find()->where(['secondary'=>'0'])));
            $this->set('logos1', $this->paginate($this->Logos->find()->where(['secondary'=>'1'])));
            $profile = $this->Profiles->get($id, [ 'contain' => []]);
            $this->set('profile', $profile);
            $this->set('disabled', 1);
            $this->set('id',$id);
            $this->render("edit");
        }

        /**
         * Add method
         *
         * @return void
         */
        public function add() {
            $this->set('uid','');    
            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));

            if($setting->profile_create==0)
            {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/");

            }
            $this->loadModel('Logos');

            $this->set('logos', $this->paginate($this->Logos->find()->where(['secondary'=>'0'])));
            $this->set('logos1', $this->paginate($this->Logos->find()->where(['secondary'=>'1'])));
            $this->set('logos2', $this->paginate($this->Logos->find()->where(['secondary'=>'2'])));
            $profiles = TableRegistry::get('Profiles');
            
            //var_dump($profile);die();
            if(isset($_POST['password']) && $_POST['password']=='')
                    {
                       unset($_POST['password']);
                    }
            if ($this->request->is('post')) {
                 
                if(isset($_POST['profile_type']) && $_POST['profile_type']==1)
                $_POST['admin']=1;
            
                $_POST['dob'] = $_POST['doby']."-".$_POST['dobm']."-".$_POST['dobd'];
                //debug($_POST);die();
                $profile = $profiles->newEntity( $_POST);
                if ($profiles->save($profile)) {
                    
                     if($_POST['client_ids']!= "")
                     {
                        $client_id = explode(",",$_POST['client_ids']);
                        foreach($client_id as $cid)
                        {
                            $query = TableRegistry::get('clients');
                            $q = $query->find()->where(['id'=>$cid])->first();
                            $profile_id = $q->profile_id;
                            $pros = explode(",",$profile_id);
                    
                            $p_ids ="";
                            
                            array_push($pros,$profile->id);
                            $pro_id = array_unique($pros);
                    
                    
                            foreach($pro_id as $k=>$p)
                            {
                                if(count($pro_id)==$k+1)
                                    $p_ids .= $p;
                                else
                                    $p_ids .= $p.",";
                            }
                    
                            $query->query()->update()->set(['profile_id' => $p_ids])
                            ->where(['id' =>$cid ])
                            ->execute();
                        }
                     }
                     //die();
                    $blocks = TableRegistry::get('Blocks');
                    $query2 = $blocks->query();
                    $query2->insert(['user_id'])
                        ->values(['user_id'=>$profile->id])
                        ->execute();
                    $side = TableRegistry::get('Sidebar');
                    $query2 = $side->query();
                    $query2->insert(['user_id'])
                        ->values(['user_id'=>$profile->id])
                        ->execute();
                    $this->Flash->success('Profile created successfully.');
                    return $this->redirect(['action' => 'edit',$profile->id]);
                } else {
                    //var_dump($profiles->errors()); die();
                    //var_dump($profile);die();
                    $this->Flash->error('The user could not be saved. Please try again.');
                }
            }
            $this->set(compact('profile'));

            $this->render("edit");
        }
        
        public function saveDriver() {
            //echo $client_id = $_POST['cid'];die() ; 
            $arr_post = explode('&',$_POST['inputs']);
            foreach($arr_post as $ap)
            {
                $arr_ap = explode('=',$ap);
                $post[$arr_ap[0]] = urldecode($arr_ap[1]);
                $post[$arr_ap[0]] = str_replace('Select Gender','',$post[$arr_ap[0]]);
            }
            $que = $this->Profiles->find()->where(['email'=>$post['email'],'id <>'=>$post['id']])->first();
            
            if($que)
            {
                //echo count($que);
                echo 'exist';die();
            }    
           //$post = $_POST['inputs'];
          // var_dump($post);die();
            $profiles = TableRegistry::get('Profiles');
  
            if ($this->request->is('post')) {
                 //var_dump($_POST['inputs']);die();
                $post['dob'] = $post['doby']."-".$post['dobm']."-".$post['dobd'];
                //debug($_POST);die();
                if($post['id'] == 0 || $post['id'] == '0'){
                    unset($post['id']);
                $profile = $profiles->newEntity($post);
                if ($profiles->save($profile)) {
                    
                     if($post['client_ids']!= "")
                     {
                        $client_id = explode(",",$post['client_ids']);
                        foreach($client_id as $cid)
                        {
                            $query = TableRegistry::get('clients');
                            $q = $query->find()->where(['id'=>$cid])->first();
                            $profile_id = $q->profile_id;
                            $pros = explode(",",$profile_id);
                    
                            $p_ids ="";
                            
                            array_push($pros,$profile->id);
                            $pro_id = array_unique($pros);
                    
                    
                            foreach($pro_id as $k=>$p)
                            {
                                if(count($pro_id)==$k+1)
                                    $p_ids .= $p;
                                else
                                    $p_ids .= $p.",";
                            }
                    
                            $query->query()->update()->set(['profile_id' => $p_ids])
                            ->where(['id' =>$cid ])
                            ->execute();
                        }
                     }
                     echo $profile->id;
                     die();
                    
        }
        }
        else
        {
            $id = $post['id'];
            unset($post['id']);
            unset($post['doby']);
            unset($post['dobm']);
            unset($post['dobd']);
            unset($post['client_ids']);
           $query = $profiles->query();
            $query->update()
                ->set($post)
                ->where(['id' => $id])
                ->execute(); 
                echo $id;die();
        }
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

            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));

            if($setting->profile_edit==0 && $id != $this->request->session()->read('Profile.id'))
            {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/");

            }
            else
            {
                $this->set('myuser','1');
            }
            $this->loadModel('Logos');

            $this->set('logos', $this->paginate($this->Logos->find()->where(['secondary'=>'0'])));
            $this->set('logos1', $this->paginate($this->Logos->find()->where(['secondary'=>'1'])));
            $this->set('logos2', $this->paginate($this->Logos->find()->where(['secondary'=>'2'])));
            $profile = $this->Profiles->get($id, [
                'contain' => []
            ]);
            //echo $profile->password;die();
            
            if ($this->request->is(['patch', 'post', 'put'])) {
                if(isset($_POST['password']) && $_POST['password']=='')
                    {
                        //die('here');
                       $this->request->data['password'] = $profile->password;
                    }
                if(isset($_POST['profile_type']) && $_POST['profile_type']==1)
                    $this->request->data['admin']=1;
                else
                    $this->request->data['admin']=0;
                 $this->request->data['dob'] = $_POST['doby']."-".$_POST['dobm']."-".$_POST['dobd'];
                //var_dump($this->request->data); die();//echo $_POST['admin'];die();
                $profile = $this->Profiles->patchEntity($profile, $this->request->data);
                if ($this->Profiles->save($profile)) {
                    $this->Flash->success('User saved successfully.');
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error('The user could not be saved. Please try again.');
                }
            }
            $this->set(compact('profile'));
            $this->set('id',$id);
            $this->set('uid',$id); 
        }

        function changePass($id)
        {
            $profile = $this->Profiles->get($id, [
                'contain' => []
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $profiles = $this->Profiles->patchEntity($profile, $this->request->data);
                if ($this->Profiles->save($profiles)) {

                    echo "1";
                } else {
                    echo "0";
                }
            }
            die();
        }

        /**
         * Delete method
         *
         * @param string $id
         * @return void
         * @throws \Cake\Network\Exception\NotFoundException
         */
        public function delete($id = null) {

            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));

            if($setting->profile_delete==0)
            {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/");

            }
            $profile = $this->Profiles->get($id);
           // $this->request->allowMethod(['post', 'delete']);
            if ($this->Profiles->delete($profile)) {
                $this->Flash->success('The user has been deleted.');
            } else {
                $this->Flash->error('User could not be deleted. Please try again.');
            }
            return $this->redirect(['action' => 'index']);
        }

        function logout()
        {
            //$this->request->session()->delete('Profile.id');
            $this->request->session()->destroy();
            if($_SERVER['SERVER_NAME'] == 'isbmeereports.com'){
                $this->redirect('http://isbmee.com');

            }else{
                $this->redirect('/login');

                //$initials = $this->requestAction('/pages/getBase');
                //$this->redirect($initials);

            }
        }

        function todo()
        {

        }
        function todos(){
            $this->layout= 'blank';
        }

        function blocks($client="")
        {


            $user_id = $_POST['form'];
            if($user_id!= 0)
            {
                //$block['user_id'] = $_POST['block']['user_id'];
                $side['user_id'] = $_POST['side']['user_id'];
            }
           

            foreach($_POST['side'] as $k=>$v)
            {
                //echo $k."=>".$v."<br/>";
                $side[$k] = $v;
            }
            //die();
            if($client=="")
            {
                $sides = array('profile_list','profile_create','client_list','client_create','document_list','document_create','profile_edit','profile_delete','client_edit','client_delete','document_edit','document_delete','document_others','document_requalify','orders_list','orders_create','orders_delete','orders_requalify','orders_edit','orders_others');
                foreach($sides as $s)
                {
                    if(!isset($_POST['side'][$s]))
                        $side[$s] = 0;
                }
            }
            
            
            $sidebar = TableRegistry::get('sidebar');
            $s1 = $sidebar->find()->where(['user_id'=>$user_id])->count();
            if($user_id != 0 && $s1!=0)
            {
                $query1 = $sidebar->query();
                $query1->update()
                    ->set($side)
                    ->where(['user_id' => $user_id])
                    ->execute();
            }
            else
            {
                $article = $sidebar->newEntity($_POST['side']);
                $sidebar->save($article);
            }
            die();
            //$this->redirect(['controller'=>'profiles','action'=>'add']);

        }
        function homeblocks()
        {
            $user_id = $_POST['form'];
            if($user_id!= 0)
            {
                $block['user_id'] = $_POST['block']['user_id'];
                //$side['user_id'] = $_POST['side']['user_id'];
            }
            foreach($_POST['block'] as $k=>$v)
            {

                $block[$k] = $v;
            }
            $blocks = TableRegistry::get('blocks');
            $s = $blocks->find()->where(['user_id'=>$user_id])->count();
            //echo $s;die();
            if($user_id != 0  && $s!=0)
            {

                $query = $blocks->query();
                $query->update()
                    ->set($block)
                    ->where(['user_id' => $user_id])
                    ->execute();
            }
            else
            {
                $article = $blocks->newEntity($_POST['block']);
                $blocks->save($article);
            }
            die();
        }

        function getSub()
        {
            $sub = TableRegistry::get('Subdocuments');
            $query = $sub->find();
            $q = $query->select();


            $this->response->body($q);
            return $this->response;

        
       
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
    
    function displaySubdocs($id)
    {
        //var_dump($_POST);die();
        $user['profile_id'] = $id;
        $display = $_POST; //defining new variable for system base below upcoming foreach
        
        //for user base
         $this->loadModel('Profilessubdocument');
        $this->Profilessubdocument->deleteAll(['profile_id'=>$id]);
        foreach($_POST['profile'] as $k2 =>$v)
        {
            $subp = TableRegistry::get('Profilessubdocument');
                    $query2 = $subp->query();
                        $query2->insert(['profile_id','subdoc_id', 'display'])
                        ->values(['profile_id' => $id,'subdoc_id' => $k2,'display'=>$_POST['profile'][$k2]])
                        ->execute(); 
            unset($subp);
        }
        foreach($_POST as $k=>$v)
        {
            if($k!='profile')
            {
                
                $subd = TableRegistry::get('Subdocuments'); 
                $query3 = $subd->query(); 
                $query3->update()
                            ->set(['display'=>$v])
                            ->where(['id' => $k])
                            ->execute();          
            }
               
                }
                die();
    }

        /*}
        unset($display['profileP']);
        unset($display['profile']);
        
        //For System base
        foreach($display as $k=>$v)
=======
            unset($display['profileP']);
            unset($display['profile']);

            //For System base
            foreach($display as $k=>$v)
            {
                $subd = TableRegistry::get('Subdocuments');
                $query3 = $subd->query();
                $query3->update()
                    ->set(['display'=>$v])
                    ->where(['id' => $k])
                    ->execute();
            }


            //var_dump($str);
            die('here');
        }



        function getRecruiter()
>>>>>>> 6ea6af59029bd947919024e111f3a305881191a7
        {
            $rec = TableRegistry::get('Profiles');
            $query = $rec->find()->where(['profile_type'=>2]);
            //$q = $query->select();

            $this->response->body($query);
            return $this->response;

            die();
        }
<<<<<<< HEAD
        
        
        //var_dump($str);
        die('here');
    }*/
    
    
    
    function getRecruiter()
    {
        $rec = TableRegistry::get('Profiles');
        $query = $rec->find()->where(['profile_type'=>2]);
        //$q = $query->select();
        
        $this->response->body($query);
        return $this->response;
        
        die();   
    }
    


        function getProfile()

        {
            $rec = TableRegistry::get('Profiles');
            $query = $rec->find();
            $u = $this->request->session()->read('Profile.id');
            $super = $this->request->session()->read('Profile.super');
            $cond = $this->Settings->getprofilebyclient($u,$super);
            //$query = $query->select()->where(['super'=>0]);
            $query = $query->select()->where(['profile_type NOT IN'=>'(6)','OR'=>$cond])
                ->andWhere(['super'=>0]);
            $this->response->body($query);
            return $this->response;
            die();
        }
        function getAjaxProfile($id=0)
        {
            $this->layout = 'blank';
            if($id)
            {
                $this->loadModel('Clients');
                $profile = $this->Clients->get($id, [
                    'contain' => []
                ]);
                $arr = explode(',',$profile->profile_id);
                $this->set('profile',$arr);
            }
            else
            {
                $this->set('profile',array());
            }
            $key = $_GET['key'];
            $rec = TableRegistry::get('Profiles');
            $query = $rec->find();
            $u = $this->request->session()->read('Profile.id');
            $super = $this->request->session()->read('Profile.super');
            $cond = $this->Settings->getprofilebyclient($u,$super);
            //$query = $query->select()->where(['super'=>0]);
            $query = $query->select()->where(['profile_type NOT IN'=>'(6)','OR'=>$cond])
                ->andWhere(['super'=>0,'(fname LIKE "%'.$key.'%" OR lname LIKE "%'.$key.'%" OR username LIKE "%'.$key.'%")']);
            $this->set('profiles',$query);
            $this->set('cid',$id);
        }
        function getAjaxContact($id=0)
        {
            $this->layout = 'blank';
            if($id)
            {
                $this->loadModel('Clients');
                $profile = $this->Clients->get($id, [
                    'contain' => []
                ]);
                $arr = explode(',',$profile->contact_id);
                $this->set('contact',$arr);
            }
            else
            {
                $this->set('contact',array());
            }
            $key = $_GET['key'];
            $rec = TableRegistry::get('Profiles');
            $query = $rec->find();
            $u = $this->request->session()->read('Profile.id');
            $super = $this->request->session()->read('Profile.super');
            $cond = $this->Settings->getprofilebyclient($u,$super);
            //$query = $query->select()->where(['super'=>0]);
            $query = $query->select()->where(['profile_type NOT IN'=>'(6)','OR'=>$cond])
                ->andWhere(['super'=>0,'profile_type'=>6,'(fname LIKE "%'.$key.'%" OR lname LIKE "%'.$key.'%" OR username LIKE "%'.$key.'%")']);
            $this->set('contacts',$query);
            $this->set('cid',$id);
        }

        function getContact()
        {
            $con = TableRegistry::get('Profiles');
            $query = $con->find()->where(['profile_type'=>6]);
            $this->response->body($query);
            return $this->response;
            die();
        }

        function filterBy()
        {
            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));

            if($setting->profile_list==0)
            {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/");

            }


            $profile_type = $_GET['filter_profile_type'];
            $querys = TableRegistry::get('Profiles');
            $query = $querys->find()->where(['profile_type'=>$profile_type]);
            $this->set('profiles', $this->paginate($this->Profiles));
            $this->set('profiles',$query);
            $this->set('return_profile_type',$profile_type);
            $this->render('index');
        }



        function getuser()
        {
            if($id = $this->request->session()->read('Profile.id'))
            {
                $profile = TableRegistry::get('profiles');
                $query = $profile->find()->where(['id'=>$id]);

                $l = $query->first();
                $this->response->body($l);
                return $this->response;
                //return $l;

            }

            else return $this->response->body(null);
            die();


        }
        function getallusers($profile_type ="",$client_id="")
        {
            $u = $this->request->session()->read('Profile.id');
            $super = $this->request->session()->read('Profile.super');
            $cond = $this->Settings->getprofilebyclient($u,$super,$client_id);
            $profile = TableRegistry::get('profiles');
            if($profile_type!="")
                $query = $profile->find()->where(['super'=>0,'profile_type'=>$profile_type, 'OR'=>$cond]);
            else
                $query = $profile->find()->where(['super'=>0,'OR'=>$cond]);
            //debug($query);
            $l = $query->all();
            $this->response->body($l);
            return $this->response;

        }
        function getusers()
        {
            $title = $_POST['v'];

            if($title !=""){
                $u = $this->request->session()->read('Profile.id');
                $super = $this->request->session()->read('Profile.super');
                $cond = $this->Settings->getprofilebyclient($u,$super);

                //var_dump($cond);
                $profile = TableRegistry::get('profiles');
                $query = $profile->find()->where(['username LIKE'=>'%'.$title."%",'OR'=>$cond]);

                $l = $query->all();
                //debug($l);
                if(count($l)>0)
                {
                    /*echo "<select onchange='$(\".madmin\").val(this.value); $(\".loadusers\").hide()' class='form-control'>";
                    echo "<option> Select User</option>";*/
                    //echo "<ul>";
                    foreach($l as $user)
                    {
                        //echo "<option value='".$user->username."'>".$user->username."</option>";
                        echo "<a style='display:block; padding:5px 0; text-decoration:none;' onclick='$(\".madmin\").val(\"$user->username\"); $(\".loadusers\").hide()'>".$user->username."</a>";
                    }
                    //"</ul>";
                    //echo "<select/>";
                }
                else
                {
                    echo "1";
                }
            }
            else
                echo "0";
            //return $l;

            die();


        }
        function getOrder($id)
        {
            $con = TableRegistry::get('Documents');
            $query = $con->find()->where(['uploaded_for'=>$id,'document_type'=>'order']);
            $this->response->body($query);
            return $this->response;
            die();
        }

        function getClient()
        {
            $query = TableRegistry::get('Clients');
            $q = $query->find();
            $que = $q->select();
            $this->response->body($que);
            return $this->response;
            die();
        }

        function getProfileType($id = null)
        {
            $q = TableRegistry::get('Profiles');
            $que = $q->find();
            $que->select(['profile_type'])->where(['id'=>$id]);
            $query = $que->first();
            $this->response->body($query);
            return $this->response;
            die();
        }

        function getProfileById($id,$sub)
        {
            $q = TableRegistry::get('Profiles');
            $query = $q->find();
            $que = $query->select()->where(['id'=>$id])->first();

            if($sub==1)
            {
                $arr['applicant_phone_number'] = $que->phone;
                $arr['aplicant_name'] = $que->fname.' '.$que->lname;
                $arr['applicant_email'] = $que->email;
            }
            if($sub==2)
            {
                $arr['street_address'] = $que->street;
                $arr['city'] = $que->city;
                $arr['state_province'] = $que->province;
                $arr['postal_code'] = $que->postal;
                $arr['last_name'] = $que->lname;
                $arr['first_name'] = $que->fname;
                $arr['phone'] = $que->phone;
                $arr['email'] = $que->email;
            }
            if($sub==3)
            {
                $arr['driver_name'] = $que->fname.' '.$que->lname;
                $arr['d_l'] = $que->driver_license_no;
            }
            if($sub==4)
            {
                $arr['last_name'] = $que->lname;
                $arr['first_name'] = $que->fname;
                $arr['mid_name'] = $que->mname;
                $arr['sex'] = $que->gender;
                $arr['birth_date'] = $que->dob;
                $arr['phone'] = $que->phone;
                $arr['current_city'] = $que->city;
                $arr['current_province'] = $que->province;
                $arr['current_postal_code'] = $que->postal;
                $arr['driver_license_number'] = $que->driver_license_no;
                $arr['driver_license_issued'] = $que->driver_province;
                $arr['current_street_address'] = $que->street;
                $arr['applicants_email'] = $que->email;
            }


            echo json_encode($arr);
            die;
        }
        public function getNotes($driver_id)
        {
            $q = TableRegistry::get('recruiter_notes');
            $que = $q->find();
            $query = $que->select()->where(['driver_id'=>$driver_id])->order(['id'=>'desc']);
            //$query = $que->first();
            $this->response->body($query);
            return $this->response;
            die();
        }
    public function getRecruiterById($id)
    {
        $q = TableRegistry::get('Profiles');
        $que = $q->find();
        $query = $que->select()->where(['id'=>$id])->first();
        //$query = $que->first();
        $this->response->body($query);
        return $this->response;
        die();
    }
        public function saveNote($id)
        {
            $note = TableRegistry::get('recruiter_notes');
            $_POST['driver_id'] = $id;
            $_POST['recruiter_id'] = $this->request->session()->read('Profile.id');
            $_POST['created'] = date('Y-m-d');
            $save = $note->newEntity($_POST);

            if($note->save($save))
            echo '<div class="item">
            <div class="item-head">
                <div class="item-details">
                    <a href="" class="item-name primary-link">'.$this->request->session()->read('Profile.fname').' '.$this->request->session()->read('Profile.mname').' '.$this->request->session()->read('Profile.lname').'</a>
                    <span class="item-label">'.$_POST['created'].'</span>
                </div>
                
            </div>
            <div class="item-body">
                '.$_POST['description'].'
            </div>
        </div>';
            else
                echo 'error';
            die();
        }
        public function check_user($uid='')
        {
            if(isset($_POST['username']) && $_POST['username'])
            $user = $_POST['username'];
            $q = TableRegistry::get('profiles');
            $que = $q->find();
            if($uid)
            $query = $que->select()->where(['id !='=>$uid,'username'=>$user])->first();
            else $query = $que->select()->where(['username'=>$user])->first();
            //var_dump($query);
            //$query = $que->first();
            if($query)
            echo '1';
            else
            echo '0';
            die();
        }
        
        public function check_email($uid='')
        {
            
            $email = $_POST['email'];
            $q = TableRegistry::get('profiles');
            $que = $q->find();
            if($uid)
            $query = $que->select()->where(['id !='=>$uid,'email'=>$email])->first();
            else $query = $que->select()->where(['email'=>$email])->first();
            //var_dump($query);
            //$query = $que->first();
            if($query)
            echo '1';
            else
            echo '0';
            die();
        }
    }
?>
