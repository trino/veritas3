<?php
    namespace App\Controller;

    use App\Controller\AppController;
    use Cake\Event\Event;
    use Cake\Controller\Controller;
    use Cake\ORM\TableRegistry;
    use Cake\Network\Email\Email;
    use Cake\Controller\Component\CookieComponent;


    class ProfilesController extends AppController
    {

        public $paginate = [
            'limit' => 20,
            'order' => ['id' => 'DESC'],

        ];

        public function initialize()
        {

            parent::initialize();
            $this->loadComponent('Settings');
            $this->loadComponent('Mailer');
            $this->loadComponent('Document');
            if (!$this->request->session()->read('Profile.id')) {
                $this->redirect('/login');
            }

        }

        function upload_img($id)
        {
            if (isset($_FILES['myfile']['name']) && $_FILES['myfile']['name']) {
                $arr = explode('.', $_FILES['myfile']['name']);
                $ext = end($arr);
                $rand = rand(100000, 999999) . '_' . rand(100000, 999999) . '.' . $ext;
                $allowed = array('jpg', 'jpeg', 'png', 'bmp', 'gif');
                $check = strtolower($ext);
                if (in_array($check, $allowed)) {
                    move_uploaded_file($_FILES['myfile']['tmp_name'], APP . '../webroot/img/profile/' . $rand);

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

                } else {
                    echo "error";
                }
            }
            die();
        }

        public function training()
        {
        }

        public function quiz()
        {
        }

        public function video()
        {
        }

        public function settings()
        {
            $this->loadModel('Logos');

            $this->set('logos', $this->paginate($this->Logos->find()->where(['secondary' => '0'])));
            $this->set('logos1', $this->paginate($this->Logos->find()->where(['secondary' => '1'])));
            $this->set('logos2', $this->paginate($this->Logos->find()->where(['secondary' => '2'])));
        }

        public function index()
        {

            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
            $u = $this->request->session()->read('Profile.id');
            $this->set('ProClients', $this->Settings);
            $super = $this->request->session()->read('Profile.super');
            $condition = $this->Settings->getprofilebyclient($u, $super);
            if ($setting->profile_list == 0) {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/");

            }
            if (isset($_GET['draft']))
                $draft = 1;
            else
                $draft = 0;
            $cond = 'drafts = ' . $draft;
            if (isset($_GET['searchprofile'])) {
                $search = $_GET['searchprofile'];
                $searchs = strtolower($search);
            }

            if (isset($_GET['filter_profile_type'])) {
                $profile_type = $_GET['filter_profile_type'];
            }
            if (isset($_GET['filter_by_client'])) {
                $client = $_GET['filter_by_client'];
            }
            $querys = TableRegistry::get('Profiles');

            if (isset($_GET['searchprofile']) && $_GET['searchprofile']) {
                if ($cond == '')
                    $cond = $cond . ' (LOWER(title) LIKE "%' . $searchs . '%" OR LOWER(fname) LIKE "%' . $searchs . '%" OR LOWER(lname) LIKE "%' . $searchs . '%" OR LOWER(username) LIKE "%' . $searchs . '%" OR LOWER(address) LIKE "%' . $searchs . '%")';
                else
                    $cond = $cond . ' AND (LOWER(title) LIKE "%' . $searchs . '%" OR LOWER(fname) LIKE "%' . $searchs . '%" OR LOWER(lname) LIKE "%' . $searchs . '%" OR LOWER(username) LIKE "%' . $searchs . '%" OR LOWER(address) LIKE "%' . $searchs . '%")';
            }

            if (isset($_GET['filter_profile_type']) && $_GET['filter_profile_type']) {
                if ($cond == '')
                    $cond = $cond . ' (profile_type = "' . $profile_type . '" OR admin = "' . $profile_type . '")';

                else
                    $cond = $cond . ' AND (profile_type = "' . $profile_type . '" OR admin = "' . $profile_type . '")';
            }

            if (isset($_GET['filter_by_client']) && $_GET['filter_by_client']) {

                $sub = TableRegistry::get('Clients');
                $que = $sub->find();
                $que->select()->where(['id' => $_GET['filter_by_client']]);
                $q = $que->first();
                $profile_ids = $q->profile_id;
                if (!$profile_ids) {
                    $profile_ids = '99999999999';
                }
                if ($cond == '')
                    $cond = $cond . ' (id IN (' . $profile_ids . '))';
                else
                    $cond = $cond . ' AND (id IN (' . $profile_ids . '))';
            }
            if ($this->request->session()->read('Profile.profile_type') == '2') {
                if ($cond) {
                    $cond = $cond . ' AND (created_by = ' . $this->request->session()->read('Profile.id') . ')';
                } else {
                    $condition['created_by'] = $this->request->session()->read('Profile.id');
                }

            }
            /*=================================================================================================== */
            if ($cond) {
                //echo $cond;die();
                $query = $querys->find();
                $query = $query->where([$cond]);
            } else {
                $query = $this->Profiles->find()->where(['OR' => $condition,'AND' => 'super = 0']);
            }
            //$this->set('profiles', $this->paginate($this->Profiles));
            //$this->set('profiles',$query);
            if (isset($search)) {
                $this->set('search_text', $search);
            }
            if (isset($profile_type)) {
                $this->set('return_profile_type', $profile_type);
            }
            if (isset($client)) {
                $this->set('return_client', $client);
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

        public function view($id = null)
        {
            $this->set('uid', $id);
            $this->set('doc_comp', $this->Document);
            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));

            if ($setting->profile_list == 0) {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/");

            }
            $this->loadModel('Logos');

            $this->set('logos', $this->paginate($this->Logos->find()->where(['secondary' => '0'])));
            $this->set('logos1', $this->paginate($this->Logos->find()->where(['secondary' => '1'])));
            $profile = $this->Profiles->get($id, ['contain' => []]);
            $this->set('doc_comp', $this->Document);
            $orders = TableRegistry::get('orders');
            $order = $orders
                ->find()
                ->where(['orders.uploaded_for' => $id,'orders.draft'=>0])->order('orders.id DESC')->contain(['Profiles', 'Clients', 'RoadTest']);

            $this->set('orders', $order);
            $this->set('profile', $profile);
            $this->set('disabled', 1);
            $this->set('id', $id);
            $this->render("edit");
        }

        public function viewReport($profile, $profile_edit_view = 0)
        {
            $this->set('doc_comp', $this->Document);
            $orders = TableRegistry::get('orders');
            $order = $orders
                ->find()
                ->where(['orders.uploaded_for' => $profile])->contain(['Profiles', 'Clients', 'RoadTest']);

            if (isset($profile_edit_view) && $profile_edit_view == 1) {
                $this->response->body(($order));
                return $this->response;
                die();
                //$this->set('profile_edit_view', $profile_edit_view);
            } else $this->set('orders', $order);
            //  debug($order);
        }

        /**
         * Add method
         * Gets the current user profile for editnote.ctp
         * Used to get the user type (ie: admin) for editing permissions
         * @return void
         */

        /**
         * function changenote($noteid, $text){
         * //$setting = $this->Settings->get_permission($userid);
         *
         * $q = TableRegistry::get('recruiter_notes');
         * $note = $q->find()->where(['id'=>$noteid])->first();
         * if (strlen($text) == 0) {//Delete note
         * $query2 = $q->query();
         * $query2->delete($noteid)->first();
         * } else { //edit note text
         * $arr = array("description" => $text);
         * $query2 = $q->query();
         * $query2->update()->set($arr)->where(['id' => $noteid])->execute();
         * }
         * }
         */
        //debug($profile);

        public function editnote()
        {
            $userid = $this->request->session()->read('Profile.id');
            $profile = $this->Profiles->get($userid);
            $this->set('profile', $profile);
        }

        /**
         * public function changenote(){
         * $noteid = $_GET["id"];
         * $text = $_GET["text"];
         *
         * $userid=$this->request->session()->read('Profile.id');
         * $setting = $this->Settings->get_permission($userid);
         *
         * echo 'Note: ' . $noteid . '<BR>Text: ' & $text;
         * return;
         * $q = TableRegistry::get('recruiter_notes');
         * $note = $q->find()->where(['id'=>$noteid])->first();
         * if (strlen($text) == 0) {//Delete note
         * if($note->profile_delete==0){
         * $this->Flash->error('Sorry, you don\'t have the required permissions.');
         * return $this->redirect("/");
         * }
         * //if ($this->Profiles->delete($profile)) {
         * $q->delete($noteid);
         * } else { //edit note text
         * $arr = array("description" => $text);
         * $query2 = $q->query();
         * $query2->update()->set($arr)->where(['id' => $noteid])->execute();
         * }
         * }
         */

        /**
         * Add method
         *
         * @return void
         */
        public function add()
        {
            $this->set('uid', '0');
            $this->set('id', '0');
            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
            // Only super admin and recruiter are allowed to create profiles as discussed on feb 19
            if (!$this->request->session()->read('Profile.super')) {
                if ($this->request->session()->read('Profile.profile_type') != '2') {
                    $this->Flash->error('Sorry, you don\'t have the required permissions.');
                    return $this->redirect("/profiles");
                }
            }

            if ($setting->profile_create == 0 && !$this->request->session()->read('Profile.super')) {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/");

            }
            $this->loadModel('Logos');

            $this->set('logos', $this->paginate($this->Logos->find()->where(['secondary' => '0'])));
            $this->set('logos1', $this->paginate($this->Logos->find()->where(['secondary' => '1'])));
            $this->set('logos2', $this->paginate($this->Logos->find()->where(['secondary' => '2'])));
            $profiles = TableRegistry::get('Profiles');

            $_POST['created'] = date('Y-m-d');
            //var_dump($profile);die();
            if (isset($_POST['password']) && $_POST['password'] == '') {
                unset($_POST['password']);
            }
            if ($this->request->is('post')) {

                if (isset($_POST['profile_type']) && $_POST['profile_type'] == 1)
                    $_POST['admin'] = 1;

                $_POST['dob'] = $_POST['doby'] . "-" . $_POST['dobm'] . "-" . $_POST['dobd'];
                //debug($_POST);die();
                $profile = $profiles->newEntity($_POST);
                if ($profiles->save($profile)) {

                    if ($_POST['client_ids'] != "") {
                        $client_id = explode(",", $_POST['client_ids']);
                        foreach ($client_id as $cid) {
                            $query = TableRegistry::get('clients');
                            $q = $query->find()->where(['id' => $cid])->first();
                            $profile_id = $q->profile_id;
                            $pros = explode(",", $profile_id);

                            $p_ids = "";

                            array_push($pros, $profile->id);
                            $pro_id = array_unique($pros);

                            foreach ($pro_id as $k => $p) {
                                if (count($pro_id) == $k + 1)
                                    $p_ids .= $p;
                                else
                                    $p_ids .= $p . ",";
                            }

                            $query->query()->update()->set(['profile_id' => $p_ids])
                                ->where(['id' => $cid])
                                ->execute();
                        }
                    }
                    //die();
                    $blocks = TableRegistry::get('Blocks');
                    $query2 = $blocks->query();
                    $query2->insert(['user_id'])
                        ->values(['user_id' => $profile->id])
                        ->execute();
                    $side = TableRegistry::get('Sidebar');
                    $query2 = $side->query();
                    $query2->insert(['user_id'])
                        ->values(['user_id' => $profile->id])
                        ->execute();
                    if (isset($_POST['email']) && $_POST['email']) {

                        //    $from = 'info@isbmee.com';
                        //  $to = $_POST['email'];
                        //     $sub = 'Profile created successfully';
                        //    $msg = 'Hi,<br />An account has been created for you in https://isbmeereports.com<br /> Your login details are:<br /> Username: ' . $_POST['username'] . '<br /> Password: ';
                        //      if (isset($_POST['password'])) echo $_POST['password']; else echo 'Password not entered <br /> Please <a href="' . LOGIN . '">click here</a> to login.<br /> Regards,<br />The ISB Team';
                        //     $this->sendEmail($from, $to, $sub, $msg);
                    }
                    $this->Flash->success('Profile created successfully.');
                    return $this->redirect(['action' => 'edit', $profile->id]);
                } else {
                    $this->Flash->error('The user could not be saved. Please try again.');
                }
            }
            $this->set(compact('profile'));

            $this->render("edit");
        }

        function saveprofile($add = "")
        {
            $settings = $this->Settings->get_settings();
            $profiles = TableRegistry::get('Profiles');

            if ($add == '0') {
                $profile_type = $this->request->session()->read('Profile.profile_type');

                $_POST['created'] = date('Y-m-d');

                if (isset($_POST['password']) && $_POST['password'] == '') {
                    $password = '';
                    unset($_POST['password']);
                } else {
                    $password = $_POST['password'];
                    $_POST['password'] = md5($_POST['password']);
                }
                if ($this->request->is('post')) {

                    if (isset($_POST['profile_type']) && $_POST['profile_type'] == 1)
                        $_POST['admin'] = 1;

                    $_POST['dob'] = $_POST['doby'] . "-" . $_POST['dobm'] . "-" . $_POST['dobd'];

                    $profile = $profiles->newEntity($_POST);
                    if ($profiles->save($profile)) {

                        if (isset($_POST['profile_type']) && $_POST['profile_type'] == 5) {
                            $username = 'driver_' . $profile->id;
                            $queries = TableRegistry::get('Profiles');
                            $queries->query()->update()->set(['username' => $username])
                                ->where(['id' => $profile->id])
                                ->execute();
                        } else { /*do nth */
                        }
                        if ($profile_type == 2) {
                            //save profiles to clients if recruiter
                            $clients_id = $this->Settings->getAllClientsId($this->request->session()->read('Profile.id'));

                            if ($clients_id != "") {
                                $client_id = explode(",", $clients_id);
                                foreach ($client_id as $cid) {
                                    $query = TableRegistry::get('clients');
                                    $q = $query->find()->where(['id' => $cid])->first();
                                    $profile_id = $q->profile_id;
                                    $pros = explode(",", $profile_id);

                                    $p_ids = "";

                                    array_push($pros, $profile->id);
                                    $pro_id = array_unique($pros);

                                    foreach ($pro_id as $k => $p) {
                                        if (count($pro_id) == $k + 1)
                                            $p_ids .= $p;
                                        else
                                            $p_ids .= $p . ",";
                                    }

                                    $query->query()->update()->set(['profile_id' => $p_ids])
                                        ->where(['id' => $cid])
                                        ->execute();
                                }
                            }
                        }
                        if ($_POST['client_ids'] != "") {
                            $client_id = explode(",", $_POST['client_ids']);
                            foreach ($client_id as $cid) {
                                $query = TableRegistry::get('clients');
                                $q = $query->find()->where(['id' => $cid])->first();
                                $profile_id = $q->profile_id;
                                $pros = explode(",", $profile_id);

                                $p_ids = "";

                                array_push($pros, $profile->id);
                                $pro_id = array_unique($pros);

                                foreach ($pro_id as $k => $p) {
                                    if (count($pro_id) == $k + 1)
                                        $p_ids .= $p;
                                    else
                                        $p_ids .= $p . ",";
                                }

                                $query->query()->update()->set(['profile_id' => $p_ids])
                                    ->where(['id' => $cid])
                                    ->execute();
                            }
                        }

                        $blocks = TableRegistry::get('Blocks');
                        $query2 = $blocks->query();
                        $query2->insert(['user_id'])
                            ->values(['user_id' => $profile->id])
                            ->execute();
                        $side = TableRegistry::get('Sidebar');
                        $query2 = $side->query();
                        $query2->insert(['user_id'])
                            ->values(['user_id' => $profile->id])
                            ->execute();
                        if (isset($_POST['email']) && $_POST['email']) {

                            //     $com = "ISBMEE";
                            //     $from = 'info@isbmee.com';

                            //     $to = $_POST['email'];

                            //      $sub = 'Profile created successfully';
                            //      $msg = 'Hi,<br />An account has been created for you in https://isbmeereports.com<br /> Your login details are:<br /> Username: ' . $_POST['username'] . '<br /> Password: ';
                            //     if (isset($_POST['password'])) echo $_POST['password']; else echo 'Password not specified';

                            //        echo '<br /> Please <a href = "'.LOGIN.'" > click here </a > to login .<br /> Regards,<br />The ISB Team';

                            //          $this->sendEmail($from,$to,$sub,$msg);
                        }
                        if (isset($_POST['drafts']) && ($_POST['drafts'] == '1')) {
                            $this->Flash->success('Profile Saved as draft Successfully . ');
                        } else {
                            $this->Flash->success('Profile saved Successfully . ');
                        }
                        echo $profile->id;

                    } else
                        echo "0";
                }
            } else {
                $profile = $this->Profiles->get($add, [
                    'contain' => []
                ]);
                if ($this->request->is(['patch', 'post', 'put'])) {
                    if (isset($_POST['password']) && $_POST['password'] == '') {
                        //die('here');
                        $this->request->data['password'] = $profile->password;
                    } else {
                        $this->request->data['password'] = md5($_POST['password']);
                    }
                    if (isset($_POST['profile_type']) && $_POST['profile_type'] == 1)
                        $this->request->data['admin'] = 1;
                    else
                        $this->request->data['admin'] = 0;
                    $this->request->data['dob'] = $_POST['doby'] . "-" . $_POST['dobm'] . "-" . $_POST['dobd'];
                    if (isset($this->request->data['username']) && $this->request->data['username'] == 5) {
                        unset($this->request->data['username']);
                    }
                    //var_dump($this->request->data); die();//echo $_POST['admin'];die();
                    $profile = $this->Profiles->patchEntity($profile, $this->request->data);
                    if ($this->Profiles->save($profile)) {
                        echo $profile->id;
                        if (isset($_POST['drafts']) && ($_POST['drafts'] == '1')) {
                            $this->Flash->success('Profile Saved as draft . ');
                        } else {
                            $this->Flash->success('Profile saved Successfully . ');
                        }
                    } else {
                        echo "0";
                    }
                }

            }
            die();
        }

        public function saveDriver()
        {
            //echo $client_id = $_POST['cid'];die() ; 
            $arr_post = explode('&', $_POST['inputs']);
            //var_dump($arr_post);die();
            foreach ($arr_post as $ap) {
                $arr_ap = explode('=', $ap);
                if (isset($arr_ap[1])) {
                    $post[$arr_ap[0]] = urldecode($arr_ap[1]);
                    $post[$arr_ap[0]] = str_replace('Select Gender', '', urldecode($arr_ap[1]));
                }
            }
            //var_dump($post);die();
            $que = $this->Profiles->find()->where(['email' => $post['email'], 'id <> ' => $post['id']])->first();

            if ($que) {
                //echo count($que);
                echo 'exist';
                die();
            }
            //$post = $_POST['inputs'];
            // var_dump($post);die();
            $profiles = TableRegistry::get('Profiles');

            if ($this->request->is('post')) {

                //var_dump($_POST['inputs']);die();
                $post['dob'] = $post['doby'] . "-" . $post['dobm'] . "-" . $post['dobd'];
                //debug($_POST);die();
                if ($post['id'] == 0 || $post['id'] == '0') {
                    $post['created'] = date('Y - m - d');
                    unset($post['id']);
                    $profile = $profiles->newEntity($post);
                    if ($profiles->save($profile)) {
                        $username = 'driver_' . $profile->id;
                        $queries = TableRegistry::get('Profiles');
                        $queries->query()->update()->set(['username' => $username])
                            ->where(['id' => $profile->id])
                            ->execute();
                        if ($post['client_ids'] != "") {
                            $client_id = explode(",", $post['client_ids']);
                            foreach ($client_id as $cid) {
                                $query = TableRegistry::get('clients');
                                $q = $query->find()->where(['id' => $cid])->first();
                                $profile_id = $q->profile_id;
                                $pros = explode(",", $profile_id);

                                $p_ids = "";

                                array_push($pros, $profile->id);
                                $pro_id = array_unique($pros);

                                foreach ($pro_id as $k => $p) {
                                    if (count($pro_id) == $k + 1)
                                        $p_ids .= $p;
                                    else
                                        $p_ids .= $p . ",";
                                }

                                $query->query()->update()->set(['profile_id' => $p_ids])
                                    ->where(['id' => $cid])
                                    ->execute();
                            }
                        }
                        echo $profile->id;
                        die();

                    }
                } else {

                    //var_dump($post);
                    $id = $post['id'];
                    unset($post['id']);
                    unset($post['profile_type']);

                    $pro = $this->Profiles->get($id, [
                        'contain' => []
                    ]);
                    $pros = $this->Profiles->patchEntity($pro, $post);
                    $this->Profiles->save($pros);

                    echo $id;
                    $username = 'driver_' . $id;
                    $queries = TableRegistry::get('Profiles');
                    $queries->query()->update()->set(['username' => $username])
                        ->where(['id' => $id])
                        ->execute();
                    die();

                }
            }
            die();
        }

        /**
         * Edit method
         *
         * @param string $id
         * @return void
         * @throws \Cake\Network\Exception\NotFoundException
         */
        public function edit($id = null)
        {

            $this->set('doc_comp', $this->Document);
            $check_pro_id = $this->Settings->check_pro_id($id);
            if ($check_pro_id == 1) {
                $this->Flash->error('The record does not exist . ');
                return $this->redirect("/profiles/index");
                //die();
            }

            $clientcount = $this->Settings->getClientCountByProfile($id);
            $this->set('Clientcount', $clientcount);
            if (isset($_GET['clientflash']) || $clientcount == 0) {
                $this->Flash->success('Profile created successfully! Please assign profile to at least one client to start placing orders.');
            }

            $checker = $this->Settings->check_edit_permission($this->request->session()->read('Profile.id'), $id);
            if ($checker == 0) {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/profiles/index");

            }

            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
            if ($setting->profile_edit == 0 && $id != $this->request->session()->read('Profile.id')) {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/");

            } else {
                $this->set('myuser', '1');
            }
            $this->loadModel('Logos');

            $this->set('logos', $this->paginate($this->Logos->find()->where(['secondary' => '0'])));
            $this->set('logos1', $this->paginate($this->Logos->find()->where(['secondary' => '1'])));
            $this->set('logos2', $this->paginate($this->Logos->find()->where(['secondary' => '2'])));
            $profile = $this->Profiles->get($id, [
                'contain' => []
            ]);
            //echo $profile->password;die();

            if ($this->request->is(['patch', 'post', 'put'])) {
                if (isset($_POST['password']) && $_POST['password'] == '') {
                    //die('here');
                    $this->request->data['password'] = $profile->password;
                }
                if (isset($_POST['profile_type']) && $_POST['profile_type'] == 1)
                    $this->request->data['admin'] = 1;
                else
                    $this->request->data['admin'] = 0;
                $this->request->data['dob'] = $_POST['doby'] . "-" . $_POST['dobm'] . "-" . $_POST['dobd'];
                //var_dump($this->request->data); die();//echo $_POST['admin'];die();
                $profile = $this->Profiles->patchEntity($profile, $this->request->data);
                if ($this->Profiles->save($profile)) {
                    $this->Flash->success('User saved successfully.');
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error('The user could not be saved. Please try again.');
                }
            }

            $this->set('doc_comp', $this->Document);
            $orders = TableRegistry::get('orders');
            $order = $orders
                ->find()
                ->where(['orders.uploaded_for' => $id])->contain(['Profiles', 'Clients', 'RoadTest']);

            $this->set('orders', $order);
            $this->set(compact('profile'));
            $this->set('id', $id);
            $this->set('uid', $id);
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
        public
        function delete($id = null)
        {
            $check_pro_id = $this->Settings->check_pro_id($id);
            if ($check_pro_id == 1) {
                $this->Flash->error('Sorry, the record does not exist.');
                return $this->redirect("/profiles/index");
                die();
            }

            $checker = $this->Settings->check_permission($this->request->session()->read('Profile.id'), $id);
            if ($checker == 0) {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/profiles/index");
                die();
            }

            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));

            if ($setting->profile_delete == 0) {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/");

            }
            if (isset($_GET['draft']))
                $draft = "?draft";
            else
                $draft = "";
            $profile = $this->Profiles->get($id);
            // $this->request->allowMethod(['post', 'delete']);
            if ($this->Profiles->delete($profile)) {
                $this->Flash->success('The user has been deleted.');
            } else {
                $this->Flash->error('User could not be deleted. Please try again.');
            }
            return $this->redirect(['action' => 'index' . $draft]);
        }

        function logout()
        {
            $this->loadComponent('Cookie');
            $this->Cookie->delete('Profile.username');
            $this->Cookie->delete('Profile.password');
            $this->Cookie->delete('bar');
            $this->request->session()->destroy();

            if ($_SERVER['SERVER_NAME'] == 'localhost') {
                $this->redirect('/login');
            } else if ($_SERVER['SERVER_NAME'] == 'isbmeereports.com') {
                $this->redirect('http://isbmee.com');
            } else {
                $this->redirect('/login');

            }
        }


    function todo()
    {

    }

    function todos()
    {
        $this->layout = 'blank';
    }

    function blocks($client = "")
    {

        $user_id = $_POST['form'];
        if ($user_id != 0) {
            //$block['user_id'] = $_POST['block']['user_id'];
            $side['user_id'] = $_POST['side']['user_id'];
        }

        foreach ($_POST['side'] as $k => $v) {
            //echo $k."=>".$v."<br/>";
            $side[$k] = $v;
        }
        //die();
        if ($client == "") {
            $sides = array('profile_list', 'profile_create', 'client_list', 'client_create', 'document_list', 'document_create', 'profile_edit', 'profile_delete', 'client_edit', 'client_delete', 'document_edit', 'document_delete', 'document_others', 'document_requalify', 'orders_list', 'orders_create', 'orders_delete', 'orders_requalify', 'orders_edit', 'orders_others','order_requalify','orders_mee','orders_products');
            foreach ($sides as $s) {
                if (!isset($_POST['side'][$s]))
                    $side[$s] = 0;
            }
        }

        $sidebar = TableRegistry::get('sidebar');
        $s1 = $sidebar->find()->where(['user_id' => $user_id])->count();
        if ($user_id != 0 && $s1 != 0) {
            $query1 = $sidebar->query();
            $query1->update()
                ->set($side)
                ->where(['user_id' => $user_id])
                ->execute();
        } else {
            $article = $sidebar->newEntity($_POST['side']);
            $sidebar->save($article);
        }
        die();
        //$this->redirect(['controller'=>'profiles','action'=>'add']);

    }

    function homeblocks()
    {
        $user_id = $_POST['form'];
        if ($user_id != 0) {
            $block['user_id'] = $_POST['block']['user_id'];
            //$side['user_id'] = $_POST['side']['user_id'];
        }
        foreach ($_POST['block'] as $k => $v) {

            $block[$k] = $v;
        }
        $blocks = TableRegistry::get('blocks');
        $s = $blocks->find()->where(['user_id' => $user_id])->count();
        //echo $s;die();
        if ($user_id != 0 && $s != 0) {

            $query = $blocks->query();
            $query->update()
                ->set($block)
                ->where(['user_id' => $user_id])
                ->execute();
        } else {
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

    function getProSubDoc($pro_id, $doc_id)
    {
        $sub = TableRegistry::get('Profilessubdocument');
        $query = $sub->find();
        $query->select()->where(['profile_id' => $pro_id, 'subdoc_id' => $doc_id]);
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
        $this->Profilessubdocument->deleteAll(['profile_id' => $id]);
        foreach ($_POST['profile'] as $k2 => $v) {
            $subp = TableRegistry::get('Profilessubdocument');
            $query2 = $subp->query();
            $query2->insert(['profile_id', 'subdoc_id', 'display'])
                ->values(['profile_id' => $id, 'subdoc_id' => $k2, 'display' => $_POST['profile'][$k2]])
                ->execute();
            unset($subp);
        }
        foreach ($_POST as $k => $v) {
            if ($k != 'profile') {

                $subd = TableRegistry::get('Subdocuments');
                $query3 = $subd->query();
                $query3->update()
                    ->set(['display' => $v])
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

    {
        $rec = TableRegistry::get('Profiles');
        $query = $rec->find()->where(['profile_type'=>2]);
        //$q = $query->select();

        $this->response->body($query);
        return $this->response;

        die();
    }



    //var_dump($str);
    die('here');
}*/

    function getRecruiter()
    {
        $rec = TableRegistry::get('Profiles');
        $query = $rec->find()->where(['profile_type' => 2]);
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

        if ($super) {
            $query = $rec->find()->where(['super <>' => 1, 'drafts' => 0])->order('fname');
        } else {
            $query = $rec->find()->where(['super <>' => 1, 'drafts' => 0, 'created_by' => $u])->order('fname');
        }

        /*$cond = $this->Settings->getprofilebyclient($u,$super);

       //$query = $query->select()->where(['super'=>0]);
       $query = $query->select()->where(['profile_type NOT IN (6,5)','OR'=>$cond])
           ->andWhere(['super'=>0]);
       if(!$super)
         $query = $query->orWhere(['created_by'=>$u]);
       */
        $this->response->body($query);
        return $this->response;
        die();
    }

    function getAjaxProfile($id = 0)
    {
        $this->layout = 'blank';
        if ($id) {
            $this->loadModel('Clients');
            $profile = $this->Clients->get($id, [
                'contain' => []
            ]);
            $arr = explode(',', $profile->profile_id);
            $this->set('profile', $arr);
        } else {
            $this->set('profile', array());
        }
        $key = $_GET['key'];
        $rec = TableRegistry::get('Profiles');
        $query = $rec->find();
        $u = $this->request->session()->read('Profile.id');
        $super = $this->request->session()->read('Profile.admin');
        $cond = $this->Settings->getprofilebyclient($u, $super);

        if ($super) {
            $query = $rec->find()->where(['super <>' => 1, 'drafts' => 0, '(fname LIKE "%' . $key . '%" OR lname LIKE "%' . $key . '%" OR username LIKE "%' . $key . '%")'])->order('fname');
        } else {
            $query = $rec->find()->where(['super <>' => 1, 'drafts' => 0, 'created_by' => $u, '(fname LIKE "%' . $key . '%" OR lname LIKE "%' . $key . '%" OR username LIKE "%' . $key . '%")'])->order('fname');
        }

        //$query = $query->select()->where(['super'=>0]);

        /*$query = $query->select()->where(['profile_type NOT IN'=>'(5,6)','OR'=>$cond])
            ->andWhere(['super'=>0,'(fname LIKE "%'.$key.'%" OR lname LIKE "%'.$key.'%" OR username LIKE "%'.$key.'%")']);
         if(!$super)
          $query = $query->orWhere(['created_by'=>$u]);*/
        $this->set('profiles', $query);
        $this->set('cid', $id);

    }

    function getAjaxContact($id = 0)
    {
        $this->layout = 'blank';
        if ($id) {
            $this->loadModel('Clients');
            $profile = $this->Clients->get($id, [
                'contain' => []
            ]);
            $arr = explode(',', $profile->contact_id);
            $this->set('contact', $arr);
        } else {
            $this->set('contact', array());
        }
        $key = $_GET['key'];
        $rec = TableRegistry::get('Profiles');
        $query = $rec->find();
        $u = $this->request->session()->read('Profile.id');
        $super = $this->request->session()->read('Profile.super');
        $cond = $this->Settings->getprofilebyclient($u, $super);
        //$query = $query->select()->where(['super'=>0]);
        $query = $query->select()->where(['profile_type NOT IN' => '(6)', 'OR' => $cond])
            ->andWhere(['super' => 0, 'profile_type' => 6, '(fname LIKE "%' . $key . '%" OR lname LIKE "%' . $key . '%" OR username LIKE "%' . $key . '%")']);
        $this->set('contacts', $query);
        $this->set('cid', $id);
    }

    function getContact()
    {
        $con = TableRegistry::get('Profiles');
        $query = $con->find()->where(['profile_type' => 6]);
        $this->response->body($query);
        return $this->response;
        die();
    }

    function filterBy()
    {
        $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));

        if ($setting->profile_list == 0) {
            $this->Flash->error('Sorry, you don\'t have the required permissions.');
            return $this->redirect("/");

        }

        $profile_type = $_GET['filter_profile_type'];
        $querys = TableRegistry::get('Profiles');
        $query = $querys->find()->where(['profile_type' => $profile_type]);
        $this->set('profiles', $this->paginate($this->Profiles));
        $this->set('profiles', $query);
        $this->set('return_profile_type', $profile_type);
        $this->render('index');
    }

    function getuser()
    {
        if ($id = $this->request->session()->read('Profile.id')) {
            $profile = TableRegistry::get('profiles');
            $query = $profile->find()->where(['id' => $id]);

            $l = $query->first();
            $this->response->body($l);
            return $this->response;
            //return $l;

        } else return $this->response->body(null);
        die();

    }

    function getallusers($profile_type = "", $client_id = "")
    {
        $u = $this->request->session()->read('Profile.id');
        $super = $this->request->session()->read('Profile.super');
        $cond = $this->Settings->getprofilebyclient($u, $super, $client_id);
        $profile = TableRegistry::get('profiles');
        if ($profile_type != "")
            $query = $profile->find()->where(['super' => 0, 'profile_type' => $profile_type, 'OR' => $cond]);
        else
            $query = $profile->find()->where(['super' => 0, 'OR' => $cond]);
        //debug($query);
        $l = $query->all();
        $this->response->body($l);
        return $this->response;

    }

    function getusers()
    {
        $title = $_POST['v'];

        if ($title != "") {
            $u = $this->request->session()->read('Profile.id');
            $super = $this->request->session()->read('Profile.super');
            $cond = $this->Settings->getprofilebyclient($u, $super);

            //var_dump($cond);
            $profile = TableRegistry::get('profiles');
            $query = $profile->find()->where(['username LIKE' => '%' . $title . "%", 'OR' => $cond]);

            $l = $query->all();
            //debug($l);
            if (count($l) > 0) {
                /*echo "<select onchange='$(\".madmin\").val(this.value); $(\".loadusers\").hide()' class='form-control'>";
                echo "<option> Select User</option>";*/
                //echo "<ul>";
                foreach ($l as $user) {
                    //echo "<option value='".$user->username."'>".$user->username."</option>";
                    echo "<a style='display:block; padding:5px 0; text-decoration:none;' onclick='$(\".madmin\").val(\"$user->username\"); $(\".loadusers\").hide()'>" . $user->username . "</a>";
                }
                //"</ul>";
                //echo "<select/>";
            } else {
                echo "1";
            }
        } else
            echo "0";
        //return $l;

        die();

    }

    function getOrder($id)
    {
        $con = TableRegistry::get('Documents');
        $query = $con->find()->where(['uploaded_for' => $id, 'document_type' => 'order']);
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
        $que->select(['profile_type'])->where(['id' => $id]);
        $query = $que->first();
        $this->response->body($query);
        return $this->response;
        die();
    }

    function getProfileById($id, $sub)
    {
        $q = TableRegistry::get('Profiles');
        $query = $q->find();
        $que = $query->select()->where(['id' => $id])->first();

        if ($sub == 1) {
            $arr['applicant_phone_number'] = $que->phone;
            $arr['aplicant_name'] = $que->fname . ' ' . $que->lname;
            $arr['applicant_email'] = $que->email;
        }
        if ($sub == 2) {
            $arr['street_address'] = $que->street;
            $arr['city'] = $que->city;
            $arr['state_province'] = $que->province;
            $arr['postal_code'] = $que->postal;
            $arr['last_name'] = $que->lname;
            $arr['first_name'] = $que->fname;
            $arr['phone'] = $que->phone;
            $arr['email'] = $que->email;
        }
        if ($sub == 3) {
            $arr['driver_name'] = $que->fname . ' ' . $que->lname;
            $arr['d_l'] = $que->driver_license_no;
        }
        if ($sub == 4) {
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

    public
    function getNotes($driver_id)
    {
        $q = TableRegistry::get('recruiter_notes');
        $que = $q->find();
        $query = $que->select()->where(['driver_id' => $driver_id])->order(['id' => 'desc']);
        //$query = $que->first();
        $this->response->body($query);
        return $this->response;
        die();
    }

    public
    function getRecruiterById($id)
    {
        $q = TableRegistry::get('Profiles');
        $que = $q->find();
        $query = $que->select()->where(['id' => $id])->first();
        //$query = $que->first();
        $this->response->body($query);
        return $this->response;
        die();
    }

    public
    function deleteNote($id)
    {
        $this->loadModel('recruiter_notes');
        $note = $this->recruiter_notes->get($id);
        $this->recruiter_notes->delete($note);
        die();
    }

    public
    function saveNote($id, $rid)
    {
        $note = TableRegistry::get('recruiter_notes');
        $_POST['driver_id'] = $id;
        if (!$rid) {
            $_POST['recruiter_id'] = $this->request->session()->read('Profile.id');

            $_POST['created'] = date('Y-m-d');
        }
        if (!$rid) {
            $save = $note->newEntity($_POST);

            if ($note->save($save))
                echo '<div class="item">
            <div class="item-head">
                <div class="item-details">
                    <a href="" class="item-name primary-link">' . $this->request->session()->read('Profile.fname') . ' ' . $this->request->session()->read('Profile.mname') . ' ' . $this->request->session()->read('Profile.lname') . '</a>
                    <span class="item-label">' . date('m') . '/' . date('d') . '/' . (date('Y') - 2000) . '</span>
                </div>
                
            </div>
            <div class="item-body">
                <span id="desc' . $save->id . '">' . $_POST['description'] . '</span><br/><a href="javascript:void(0);" class="btn btn-small btn-primary editnote" style="padding: 0 8px;" id="note_' . $save->id . '">Edit</a> <a href="javascript:void(0);" class="btn btn-small btn-danger deletenote" style="padding: 0 8px;" id="dnote_' . $save->id . '" onclick="return confirm(\'Are you sure you want to delete &quot;' . $_POST['description'] . '&quot; ?\');">Delete</a><br/><br/>
            </div>
        </div>';
            else
                echo 'error';
            die();
        } else {
            $note->query()->update()
                ->set($_POST)
                ->where(['id' => $rid])
                ->execute();
            //$q = TableRegistry::get('Profiles');
            $que = $note->find();
            $query = $que->select()->where(['id' => $id])->first();
            $arr_cr = explode(',', $query->created);

            $q = TableRegistry::get('Profiles');
            $query2 = $q->find();
            $que2 = $query->select()->where(['id' => $query->recruiter_id])->first();
            echo '<div class="item">
            <div class="item-head">
                <div class="item-details">
                    <a href="" class="item-name primary-link">' . $que2->fname . ' ' . $que2->mname . ' ' . $que2->lname . '</a>
                    <span class="item-label">' . $arr_cr[0] . '</span>
                </div>
                
            </div>
            <div class="item-body">
                <span id="desc' . $rid . '">' . $_POST['description'] . '</span><br/><a href="javascript:void(0);" class="btn btn-small btn-primary editnote" style="padding: 0 8px;" id="note_' . $rid . '">Edit</a> <a href="javascript:void(0);" class="btn btn-small btn-danger deletenote" style="padding: 0 8px;" id="dnote_' . $rid . '" onclick="return confirm(\'Are you sure you want to delete &quot;' . $_POST['description'] . '&quot; ?\');">Delete</a><br/><br/>
            </div>
        </div>';
        }
    }

    public
    function check_user($uid = '')
    {
        if (isset($_POST['username']) && $_POST['username'])
            $user = $_POST['username'];
        $q = TableRegistry::get('profiles');
        $que = $q->find();
        if ($uid != "")
            $query = $que->select()->where(['id !=' => $uid, 'username' => $user])->first();
        else
            $query = $que->select()->where(['username' => $user])->first();
        //var_dump($query);
        //$query = $que->first();
        if ($query)
            echo '1';
        else
            echo '0';
        die();
    }

    public
    function check_email($uid = '')
    {

        $email = $_POST['email'];
        $q = TableRegistry::get('profiles');
        $que = $q->find();
        if ($uid != "")
            $query = $que->select()->where(['id !=' => $uid, 'email' => $email])->first();
        else $query = $que->select()->where(['email' => $email])->first();
        //var_dump($query);
        //$query = $que->first();
        if ($query)
            echo '1';
        else
            echo '0';
        die();
    }

    function sendEmail($from, $to, $subject, $message)
    {
        //from can be array with this structure array('email_address'=>'Sender name'));
        $email = new Email('default');

        $email->from($from)
            ->emailFormat('html')
            ->to($to)
            ->subject($subject)
            ->send($message);
    }

    function cron()
    {
        //die('HERE');
        $date = date('Y-m-d');
        $time = date('H');

        $m = date('i');
        $remainder = $m % 5;
        $m = $m - $remainder;
        if ($m < 10)
            $m = '0' . $m;
        $m2 = $m + 5;
        if ($m2 < 10)
            $m2 = '0' . $m2;
        $date2 = $date . ' ' . $time . ':' . $m2;
        $date = $date . ' ' . $time . ':' . $m;
        //echo $date2;

        $q = TableRegistry::get('events');
        $que = $q->find();
        $query = $que->select()->where(['(date LIKE "%' . $date . '%" OR date LIKE "%' . $date2 . '%")', 'sent' => 0])->limit(200);
        foreach ($query as $todo) {
            //echo $todo->id;
            $q2 = TableRegistry::get('profiles');
            $que2 = $q2->find();
            $query2 = $que2->select()->where(['id' => $todo->user_id])->first();
            $email = $query2->email;
            if ($email) {
                $from = 'info@isbmee.com';
                $to = $email;
                $sub = 'ISBMEE (Schedule) - Reminder';
                $msg = 'Hi,<br />You have following task due by today:<br/><br/><strong>Title : </strong>' . $todo->title . '<br /><strong>Description : </strong>' . $todo->description . '<br /><strong>Due By : </strong>' . $todo->date . '<br /><br /> Regards';
             //   $this->Mailer->sendEmail($from, $to, $sub, $msg);
            }
            //echo $s;die();
            $send = $q->query();
            $send->update()
                ->set(['sent' => 1])
                ->where(['id' => $todo->id])
                ->execute();
        }
        die();
    }

    function getDriverById($id)
    {
        $q2 = TableRegistry::get('profiles');
        $que2 = $q2->find();
        $query2 = $que2->select()->where(['id' => $id])->first();
        $this->response->body($query2);
        return $this->response;
    }

    function getOrders($id)
    {
        $order = TableRegistry::get('orders');
        $order = $order->find()->where(['uploaded_for' => $id]);
        $this->response->body($order);
        return $this->response;
    }

    function forgetpassword()
    {
        $email = $_POST['email'];
        $profiles = TableRegistry::get('profiles');
        if ($profile = $profiles->find()->where(['email' => $email])->first()) {
            //debug($profile);
            $new_pwd = $this->generateRandomString(6);
            $p = TableRegistry::get('profiles');
            if ($p->query()->update()->set(['password' => md5($new_pwd)])->where(['id' => $profile->id])->execute()) {
                $from = 'info@isbmee.com';
                $to = $profile->email;
                $sub = 'New Password created successfully';
                $msg = 'Hi,<br />Your  new password has been created.<br /> Your login details are:<br /> Username: ' . $profile->username . '<br /> Password: ' . $new_pwd . '<br /> Please <a href="' . LOGIN . '">click here</a> to login.<br /> Regards';
                $this->sendEmail($from, $to, $sub, $msg);
                echo "Password has been reset succesfully. Please Check your email for the new password.";
            }
        } else {
            echo "Sorry the email dosenot exists.";
        }

        die();

    }

    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    }
?>
