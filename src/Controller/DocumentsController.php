<?php
    namespace App\Controller;

    use App\Controller\AppController;
    use Cake\Event\Event;
    use Cake\Controller\Controller;
    use Cake\ORM\TableRegistry;

    class DocumentsController extends AppController
    {

        public $paginate = [
            'limit' => 10,

        ];

        public function initialize()
        {
            parent::initialize();
            $this->loadComponent('Settings');
            if (!$this->request->session()->read('Profile.id')) {
                $this->redirect('/login');
            }

        }

        public function index()
        {

            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
            $doc = $this->getDocumentcount();
            $cn = $this->getUserDocumentcount();
            if ($setting->document_list == 0 || count($doc) == 0 || $cn == 0) {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/");

            }

            $docs = TableRegistry::get('Documents');
            $doc = $docs->find();
            if (!isset($_GET['draft']))
                $doc = $doc->select()->where(['draft' => 0]);
            else
                $doc = $doc->select()->where(['draft' => 1]);

            $cond = '';

            if (isset($_GET['searchdoc']) && $_GET['searchdoc']) {
                $cond = $cond . ' (title LIKE "%' . $_GET['searchdoc'] . '%" OR document_type LIKE "%' . $_GET['searchdoc'] . '%" OR description LIKE "%' . $_GET['searchdoc'] . '%")';
            }
            if (!$this->request->session()->read('Profile.admin') && $setting->document_others == 0) {
                if ($cond == '')
                    $cond = $cond . ' user_id = ' . $this->request->session()->read('Profile.id');
                else
                    $cond = $cond . ' AND user_id = ' . $this->request->session()->read('Profile.id');
            }
            if (isset($_GET['submitted_by_id']) && $_GET['submitted_by_id']) {
                if ($cond == '')
                    $cond = $cond . ' user_id = ' . $_GET['submitted_by_id'];
                else
                    $cond = $cond . ' AND user_id = ' . $_GET['submitted_by_id'];
            }
            if (isset($_GET['client_id']) && $_GET['client_id']) {
                if ($cond == '')
                    $cond = $cond . ' client_id = ' . $_GET['client_id'];
                else
                    $cond = $cond . ' AND client_id = ' . $_GET['client_id'];
            }
            if (isset($_GET['type']) && $_GET['type']) {
                if ($cond == '')
                    $cond = $cond . ' document_type = "' . $_GET['type'] . '"';
                else
                    $cond = $cond . ' AND document_type = "' . $_GET['type'] . '"';
            }

            if (isset($_GET['from']) && isset($_GET['to'])) {

                $f = date('Y-m-d h:i:s', strtotime($_GET['from']));
                $t = date('Y-m-d h:i:s', strtotime($_GET['to']));
                if ($cond == '')
                    $cond = $cond . ' (created >="' . $f . '" AND created <= "' . $t . '")';
                else
                    $cond = $cond . ' AND (created >="' . $f . '" AND created <= "' . $t . '")';
                // $this->set('start',$cond);

            }

            if ($cond) {
                $doc = $doc->where([$cond]);
            }

            if (isset($_GET['searchdoc'])) {
                $this->set('search_text', $_GET['searchdoc']);
            }
            if (isset($_GET['submitted_by_id'])) {
                $this->set('return_user_id', $_GET['submitted_by_id']);
            }
            if (isset($_GET['client_id'])) {
                $this->set('return_client_id', $_GET['client_id']);
            }
            if (isset($_GET['type'])) {
                $this->set('return_type', $_GET['type']);
            }
            $this->set('documents', $doc);
        }

        /*



        function submittedBy()
        {
           $setting = $this->get_permission($this->request->session()->read('Profile.id'));

            if($setting->profile_list==0)
            {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                    return $this->redirect("/");

            }

            $id = $_GET['submitted_by_id'];
            $querys = TableRegistry::get('Documents');
            $query = $querys->find()->where(['user_id'=>$id]);
            $this->set('documents', $this->paginate($this->Documents));
            $this->set('documents',$query);
            $this->set('return_user_id',$id);
            $this->render('index');
        }

        function filterByClient()
        {
           $setting = $this->get_permission($this->request->session()->read('Profile.id'));

            if($setting->profile_list==0)
            {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                    return $this->redirect("/");

            }

            $id = $_GET['client_id'];
            $querys = TableRegistry::get('Documents');
            $query = $querys->find()->where(['client_id'=>$id]);
            $this->set('documents', $this->paginate($this->Documents));
            $this->set('documents',$query);
            $this->set('return_client_id',$id);
            $this->render('index');
        }

        function filterByType()
        {
             $setting = $this->get_permission($this->request->session()->read('Profile.id'));

            if($setting->profile_list==0)
            {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                    return $this->redirect("/");

            }

            $type = $_GET['type'];
            $querys = TableRegistry::get('Documents');
            $query = $querys->find()->where(['document_type'=>$type]);
            $this->set('documents', $this->paginate($this->Documents));
            $this->set('documents',$query);
            $this->set('return_type',$type);
            $this->render('index');
        }*/

        public function view($cid = 0, $did = 0)
        {
            $this->set('cid', $cid);
            $this->set('did', $did);
            $this->set('sid', '');
            if ($did) {
                $docs = TableRegistry::get('documents');
                $document = $docs->find()->where(['id' => $did])->first();
                $this->set('mod', $document);
            }
            $doc = $this->getDocumentcount();
            $cn = $this->getUserDocumentcount();
            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
            $doc = $this->getDocumentcount();
            $cn = $this->getUserDocumentcount();
            if ($setting->document_list == 0 || count($doc) == 0 || $cn == 0) {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/");

            }
            /*$profile = $this->Clients->get($id);
            $this->set('profile', $profile);*/
            $this->set('disabled', 1);
            //$did=$id;
            if ($did) {
                $da = TableRegistry::get('driver_application');
                $da_detail = $da->find()->where(['document_id' => $did])->first();
                if ($da_detail) {
                    $da_ac = TableRegistry::get('driver_application_accident');
                    $sub['da_ac_detail'] = $da_ac->find()->where(['driver_application_id' => $da_detail->id])->all();

                    $da_li = TableRegistry::get('driver_application_licenses');
                    $sub['da_li_detail'] = $da_li->find()->where(['driver_application_id' => $da_detail->id])->all();

                    $da_at = TableRegistry::get('driver_application_attachments');
                    $sub['da_at_detail'] = $da_at->find()->where(['driver_application_id' => $da_detail->id])->all();

                    $this->set('sub', $sub);
                }

                $con = TableRegistry::get('consent_form');
                $con_detail = $con->find()->where(['document_id' => $did])->first();
                //echo $con_detail->id;die();
                if ($con_detail) {
                    $con_cri = TableRegistry::get('consent_form_criminal');
                    $sub2['con_cri'] = $con_cri->find()->where(['consent_form_id' => $con_detail->id])->all();
                    $this->set('sub2', $sub2);
                }

                $emp = TableRegistry::get('employment_verification');
                $sub3['emp'] = $emp->find()->where(['document_id' => $did])->all();
                //echo $con_detail->id;die();
                if ($sub3['emp']) {
                    $emp_att = TableRegistry::get('employment_verification_attachments');
                    $sub3['att'] = $emp_att->find()->where(['document_id' => $did])->all();
                    $this->set('sub3', $sub3);
                }

                $edu = TableRegistry::get('education_verification');
                $sub4['edu'] = $edu->find()->where(['document_id' => $did])->all();
                //echo $con_detail->id;die();
                if ($sub4['edu']) {
                    $edu_att = TableRegistry::get('education_verification_attachments');
                    $sub4['att'] = $edu_att->find()->where(['document_id' => $did])->all();
                    $this->set('sub4', $sub4);
                }
            }
            $this->render('add');
        }

        public function vieworder($cid = null, $did = null)
        {
            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
            $doc = $this->getDocumentcount();
            $cn = $this->getUserDocumentcount();
            if ($setting->orders_list == 0 || count($doc) == 0 || $cn == 0) {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/");

            }
            $orders = TableRegistry::get('orders');
            if ($did)
                $order_id = $orders->find()->where(['id' => $did])->first();
            //$did= $document_id->id;
            if (isset($order_id))
                $this->set('modal', $order_id);
            $this->set('cid', $cid);
            $this->set('did', $did);
            /*$profile = $this->Clients->get($id);
            $this->set('profile', $profile);*/
            $this->set('disabled', 1);
            if ($did) {
                $da = TableRegistry::get('driver_application');
                $da_detail = $da->find()->where(['order_id' => $did])->first();
                if ($da_detail) {
                    $da_ac = TableRegistry::get('driver_application_accident');
                    $sub['da_ac_detail'] = $da_ac->find()->where(['driver_application_id' => $da_detail->id])->all();

                    $da_li = TableRegistry::get('driver_application_licenses');
                    $sub['da_li_detail'] = $da_li->find()->where(['driver_application_id' => $da_detail->id])->all();

                    $da_at = TableRegistry::get('driver_application_attachments');
                    $sub['da_at_detail'] = $da_at->find()->where(['driver_application_id' => $da_detail->id])->all();

                    $this->set('sub', $sub);
                }
                $con = TableRegistry::get('consent_form');
                $con_detail = $con->find()->where(['order_id' => $did])->first();
                if ($con_detail) {
                    //echo $con_detail->id;die();
                    $con_cri = TableRegistry::get('consent_form_criminal');
                    $sub2['con_cri'] = $con_cri->find()->where(['consent_form_id' => $con_detail->id])->all();
                    $this->set('sub2', $sub2);

                }
                $emp = TableRegistry::get('employment_verification');
                $sub3['emp'] = $emp->find()->where(['order_id' => $did])->all();

                //echo $con_detail->id;die();
                $emp_att = TableRegistry::get('employment_verification_attachments');
                $sub3['att'] = $emp_att->find()->where(['order_id' => $did])->all();

                $this->set('sub3', $sub3);

                $edu = TableRegistry::get('education_verification');
                $sub4['edu'] = $edu->find()->where(['order_id' => $did])->all();
                //echo $con_detail->id;die();
                $edu_att = TableRegistry::get('education_verification_attachments');
                $sub4['att'] = $edu_att->find()->where(['order_id' => $did])->all();
                $this->set('sub4', $sub4);
            }
            $this->render('addorder');

        }

        /**
         * Add method
         *
         * @return void
         */
        public function addorder($cid = 0, $did = 0)
        {
            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
            $doc = $this->getDocumentcount();
            $cn = $this->getUserDocumentcount();

            //die(count($doc));
            if ($setting->orders_create == 0 || count($doc) == 0 || $cn == 0) {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/");

            }
            $orders = TableRegistry::get('orders');
            if ($did)
                $order_id = $orders->find()->where(['id' => $did])->first();
            //$did= $document_id->id;
            if (isset($order_id))
                $this->set('modal', $order_id);
            $this->set('cid', $cid);
            $this->set('did', $did);
            if ($did) {
                $pre = TableRegistry::get('pre_screening_attachments');
                //$pre_at = TableRegistry::get('driver_application_accident');
                $pre_at['attach_doc'] = $pre->find()->where(['order_id' => $did])->all();
                $this->set('pre_at', $pre_at);

                $da = TableRegistry::get('driver_application');
                $da_detail = $da->find()->where(['order_id' => $did])->first();
                if ($da_detail) {
                    $da_ac = TableRegistry::get('driver_application_accident');
                    $sub['da_ac_detail'] = $da_ac->find()->where(['driver_application_id' => $da_detail->id])->all();

                    $da_li = TableRegistry::get('driver_application_licenses');
                    $sub['da_li_detail'] = $da_li->find()->where(['driver_application_id' => $da_detail->id])->all();

                    $da_at = TableRegistry::get('driver_application_attachments');
                    $sub['da_at'] = $da_at->find()->where(['order_id' => $did])->all();

                    $de_at = TableRegistry::get('road_test_attachments');
                    $sub['de_at'] = $de_at->find()->where(['order_id' => $did])->all();

                    $this->set('sub', $sub);
                }
                $con = TableRegistry::get('consent_form');
                $con_detail = $con->find()->where(['order_id' => $did])->first();
                if ($con_detail) {
                    //echo $con_detail->id;die();
                    $con_cri = TableRegistry::get('consent_form_criminal');
                    $sub2['con_cri'] = $con_cri->find()->where(['consent_form_id' => $con_detail->id])->all();

                    $con_at = TableRegistry::get('consent_form_attachments');
                    $sub2['con_at'] = $con_at->find()->where(['order_id' => $did])->all();
                    $this->set('sub2', $sub2);

                }
                $emp = TableRegistry::get('employment_verification');
                $sub3['emp'] = $emp->find()->where(['order_id' => $did])->all();

                //echo $con_detail->id;die();
                $emp_att = TableRegistry::get('employment_verification_attachments');
                $sub3['att'] = $emp_att->find()->where(['order_id' => $did])->all();

                $this->set('sub3', $sub3);

                $edu = TableRegistry::get('education_verification');
                $sub4['edu'] = $edu->find()->where(['order_id' => $did])->all();
                //echo $con_detail->id;die();
                $edu_att = TableRegistry::get('education_verification_attachments');
                $sub4['att'] = $edu_att->find()->where(['order_id' => $did])->all();
                $this->set('sub4', $sub4);
            }

        }

        public function savedoc($cid = 0, $did = 0)
        {
//         echo "<pre>";print_r($_POST);
            if (!isset($_GET['document'])) {
                // saving in order table
                $orders = TableRegistry::get('orders');
                $arr['title'] = 'order_' . $_POST['uploaded_for'] . '_' . date('Y-m-d H:i:s');
                $arr['uploaded_for'] = $_POST['uploaded_for'];
                if (isset($_GET['draft']) && $_GET['draft'])
                    $arr['draft'] = 1;
                else
                    $arr['draft'] = 0;
                $arr['client_id'] = $cid;
                $arr['conf_recruiter_name'] = $_POST['conf_recruiter_name'];
                $arr['conf_driver_name'] = $_POST['conf_driver_name'];
                $arr['conf_date'] = $_POST['conf_date'];
                //$arr['order_type'] = $_POST['sub_doc_id'];
                $arr['created'] = date('Y-m-d H:i:s');
                if (!$did || $did == '0') {
                    $arr['user_id'] = $this->request->session()->read('Profile.id');
                    $order = $orders->newEntity($arr);

                    if ($orders->save($order)) {
                        //$this->Flash->success('Client saved successfully.');
                        echo $order->id;

                    } else {
                        //$this->Flash->error('Client could not be saved. Please try again.');
                        //echo "e";
                    }
                } else {
                    $query2 = $orders->query();
                    $query2->update()
                        ->set($arr)
                        ->where(['id' => $did])
                        ->execute();
                    //$this->Flash->success('Client saved successfully.');
                    echo $did;
                }

            } else {
                $docs = TableRegistry::get('Documents');
                if (isset($_GET['draft']) && $_GET['draft'])
                    $arr['draft'] = 1;
                else
                    $arr['draft'] = 0;
                $arr['sub_doc_id'] = $_POST['sub_doc_id'];
                $arr['uploaded_for'] = $_POST['uploaded_for'];
                $arr['client_id'] = $cid;
                $arr['document_type'] = $_GET['document'];
                $arr['created'] = date('Y-m-d H:i:s');
                //$arr['conf_recruiter_name'] = $_POST['conf_recruiter_name'];
                //$arr['conf_driver_name'] = $_POST['conf_driver_name'];
                //$arr['conf_date'] = $_POST['conf_date'];
                if (!$did || $did == '0') {
                    $arr['user_id'] = $this->request->session()->read('Profile.id');
                    $doc = $docs->newEntity($arr);

                    if ($docs->save($doc)) {
                        //$this->Flash->success('Client saved successfully.');
                        echo $doc->id;
                    } else {
                        //$this->Flash->error('Client could not be saved. Please try again.');
                        //echo "e";
                    }

                } else {
                    $query2 = $docs->query();
                    $query2->update()
                        ->set($arr)
                        ->where(['id' => $did])
                        ->execute();
                    //$this->Flash->success('Client saved successfully.');
                    echo $did;
                }
            }
            die();
        }

        /**
         * saving pre-screening data
         */

        public function savePrescreening()
        {
            $prescreen = TableRegistry::get('pre_screening');
            if (!isset($_GET['document'])) {
                $arr['order_id'] = $_POST['order_id'];
                $arr['document_id'] = 0;
            } else {
                $arr['document_id'] = $_POST['order_id'];
                $arr['order_id'] = 0;
            }
            $arr['client_id'] = $_POST['cid'];
            $arr['user_id'] = $this->request->session()->read('Profile.id');

            // checking db if order id exits in this table
            // first delete
            // $del_prescreen = $prescreen->get(['document_id'=>$_POST['document_id']]);
            $del = $prescreen->query();
            if (!isset($_GET['document']))
                $del->delete()->where(['order_id' => $_POST['order_id']])->execute();
            else
                $del->delete()->where(['document_id' => $_POST['order_id']])->execute();

            foreach (explode("&", $_POST['inputs']) as $data) {
                $input = explode("=", $data);
                $input[0];
                if ($input[0] == "document_type" || $input[0] == 'attach_doc[]' || $input[0] == 'attach_doc%5B%5D') {
                    if ($input[0] == 'attach_doc[]' || $input[0] == 'attach_doc%5B%5D')
                        $att[] = $input[1];
                    continue;
                }
                if ($input[1] != '') {

                    $arr[$input[0]] = $input[1];
                }

                //echo $data."<br/>";
            }
            if (!isset($att))
                $att = null;
            //var_dump($att);
            if (isset($att)) {
                $count = 0;
                foreach ($att as $at) {
                    $count++;
                    if (!isset($_GET['document'])) {
                        $saveData['order_id'] = $_POST['order_id'];
                        $saveData['doc_id'] = 0;
                    } else {
                        $saveData['doc_id'] = $_POST['order_id'];
                        $saveData['order_id'] = 0;
                    }
                    $saveData['attach_doc'] = $at;
                    $this->saveAttachmentsPrescreen($saveData, $count);
                }
            }
            //var_dump($saveData);

            $save = $prescreen->newEntity($arr);
            $prescreen->save($save);
            die;
        }

        /**
         * saving driver application data
         */
        public function savedDriverApp($document_id = 0, $cid = 0)
        {
            // echo "<pre>";print_r($_POST);die;

            if (!isset($_GET['document'])) {
                $arr['order_id'] = $document_id;
                $arr['document_id'] = 0;
            } else {
                $arr['document_id'] = $document_id;
                $arr['order_id'] = 0;
            }
            $arr['client_id'] = $cid;
            $arr['user_id'] = $this->request->session()->read('Profile.id');

            //$input_var = rtrim($_POST['inputs'],',');
            $driverApps = TableRegistry::get('driver_application');

            /* $delete_id=$driverApps->find()->where(['document_id'=>$_POST['document_id']]);
             $del_id = $delete_id->id;*/

            $del = $driverApps->query();
            if (!isset($_GET['document']))
                $del->delete()->where(['order_id' => $document_id])->execute();
            else
                $del->delete()->where(['document_id' => $document_id])->execute();

            $driverAcc = array('date_of_accident',
                'nature_of_accident',
                'fatalities',
                'injuries',
                'driver_license',
                'province',
                'license_number',
                'class',
                'expiration_date',
                'attach_doc'
            );
            $total_acc_record = 0;
            $accident = array();
            foreach ($_POST as $data => $val) {

                if ($data == "document_type") {
                    continue;
                } else if ($data == "count_acc_record") {
                    $total_acc_record = $val;
                } else if (in_array($data, $driverAcc)) {
                    continue;
                } else {
                    // if(isset($_POST[$data]) ) {
                    $arr[$data] = $val;
                    // }
                }
            }
            $save = $driverApps->newEntity($arr);
            if ($driverApps->save($save)) {
                $id = $save->id;
                $driverAppAcc = TableRegistry::get('driver_application_accident');
                // $del = $driverAppAcc->query();
                // $del->delete()->where(['driver_application_id'=>$id])->execute();
                for ($i = 0; $i < $total_acc_record; $i++) {
                    $acc['driver_application_id'] = $id;
                    $acc['date_of_accident'] = $_POST['date_of_accident'][$i];
                    $acc['nature_of_accident'] = $_POST['nature_of_accident'][$i];
                    $acc['fatalities'] = $_POST['fatalities'][$i];
                    $acc['injuries'] = $_POST['injuries'][$i];
                    $saveAcc = $driverAppAcc->newEntity($acc);
                    $driverAppAcc->save($saveAcc);
                    $att = array();

                }
                if (isset($_POST['attach_doc'])) {
                    $count = 0;
                    foreach ($_POST['attach_doc'] as $v) {
                        $count++;
                        if (!isset($_GET['document'])) {
                            $att['order_id'] = $document_id;
                            $att['doc_id'] = 0;
                        } else {
                            $att['doc_id'] = $document_id;
                            $att['order_id'] = 0;
                        }
                        $att['attached_doc_path'] = $v;
                        $this->saveAttachmentsDriverApp($att, $count);

                    }

                }

                $driverAppLic = TableRegistry::get('driver_application_licenses');
                // $del = $driverAppLic->query();
                // $del->delete()->where(['driver_application_id'=>$id])->execute();
                for ($i = 0; $i < 2; $i++) {
                    $lic['driver_application_id'] = $id;
                    $lic['driver_license'] = $_POST['driver_license'][$i];
                    $lic['province'] = $_POST['province'][$i];
                    $lic['license_number'] = $_POST['license_number'][$i];
                    $lic['class'] = $_POST['class'][$i];
                    $lic['expiration_date'] = $_POST['expiration_date'][$i];
                    $saveLic = $driverAppLic->newEntity($lic);
                    $driverAppLic->save($saveLic);
                }

            }

            die;
        }

        /**
         * saving driver application data
         */
        public function savedDriverEvaluation($document_id = 0, $cid = 0)
        {
            // echo "<pre>";print_r($_POST);die;

            $roadTest = TableRegistry::get('road_test');
            if (!isset($_GET['document'])) {
                $arr['order_id'] = $document_id;
                $arr['document_id'] = 0;
            } else {
                $arr['document_id'] = $document_id;
                $arr['order_id'] = 0;
            }
            $arr['client_id'] = $cid;
            $arr['user_id'] = $this->request->session()->read('Profile.id');
            $del = $roadTest->query();
            if (!isset($_GET['document']))
                $del->delete()->where(['order_id' => $document_id])->execute();
            else
                $del->delete()->where(['document_id' => $document_id])->execute();

            if (isset($_POST['attach_doc'])) {
                $count = 0;
                foreach ($_POST['attach_doc'] as $v) {
                    $count++;
                    if (!isset($_GET['document'])) {
                        $att['order_id'] = $document_id;
                        $att['doc_id'] = 0;
                    } else {
                        $att['doc_id'] = $document_id;
                        $att['order_id'] = 0;
                    }
                    $att['attached_document'] = $v;
                    $this->saveAttachmentsRoadTest($att, $count);

                }
            }
            foreach ($_POST as $data => $val) {

                if ($data == "document_type" || $data == 'attach_doc') {

                    continue;
                } else {
                    if (isset($_POST[$data])) {
                        $arr[$data] = $val;
                    }
                }

            }

            $save = $roadTest->newEntity($arr);
            if ($roadTest->save($save)) {
                //echo $save->id;
            }
            die;
        }

        /**
         * saving driver application data
         */
        public function savedMeeOrder($document_id = 0, $cid = 0)
        {
            //consent form
            // echo "<pre>";print_r($_POST);die;
            $consentForm = TableRegistry::get('consent_form');
            if (!isset($_GET['document'])) {
                $arr['order_id'] = $document_id;
                $arr['document_id'] = 0;
            } else {
                $arr['document_id'] = $document_id;
                $arr['order_id'] = 0;
            }
            $arr['client_id'] = $cid;
            $arr['user_id'] = $this->request->session()->read('Profile.id');

            $del = $consentForm->query();
            if (!isset($_GET['document']))
                $del->delete()->where(['order_id' => $document_id])->execute();
            else
                $del->delete()->where(['document_id' => $document_id])->execute();

            $post = $_POST;
            if (isset($_POST['attach_doc'])) {
                $count = 0;
                foreach ($_POST['attach_doc'] as $v) {
                    $count++;
                    if (!isset($_GET['document'])) {
                        $att['order_id'] = $document_id;
                        $att['doc_id'] = 0;
                    } else {
                        $att['doc_id'] = $document_id;
                        $att['order_id'] = 0;
                    }
                    $att['attach_doc'] = $v;
                    $this->saveAttachmentsConsentForm($att, $count);

                }
            }
            foreach ($_POST as $data => $val) {

                if ($data == 'offence' || $data == 'date_of_sentence' || $data == 'location' || $data == 'attach_doc') {

                }
                //echo $data." ".$val."<br />";
                $arr[$data] = $val;

            }

// echo "<pre>";print_r($arr);die;
            $save = $consentForm->newEntity($arr);
            if ($consentForm->save($save)) {
                $id = $save->id;
                $consentFormCri = TableRegistry::get('consent_form_criminal');

                // $del = $consentFormCri->query();
                // $del->delete()->where(['consent_form_id'=>$id])->execute();

                for ($i = 0; $i < 8; $i++) {
                    $crm['consent_form_id'] = $id;
                    $crm['offence'] = $post['offence'][$i];
                    $crm['date_of_sentence'] = $post['date_of_sentence'][$i];
                    $crm['location'] = $post['location'][$i];
                    $saveCrm = $consentForm->newEntity($crm);
                    $consentFormCri->save($saveCrm);
                }
            }

            die;
        }

        function saveEmployment($document_id = 0, $cid = 0)
        {
            // echo "<pre>";print_r($_POST);die;
            //employement
            $employment = TableRegistry::get('employment_verification');

            $del = $employment->query();
            if (!isset($_GET['document']))
                $del->delete()->where(['order_id' => $document_id])->execute();
            else
                $del->delete()->where(['document_id' => $document_id])->execute();

            if (isset($_POST['attach_doc'])) {
                $count = 0;
                foreach ($_POST['attach_doc'] as $v) {
                    $count++;
                    if (!isset($_GET['document'])) {
                        $att['order_id'] = $document_id;
                        $att['document_id'] = 0;
                    } else {
                        $att['document_id'] = $document_id;
                        $att['order_id'] = 0;
                    }
                    $att['attach_doc'] = $v;
                    $this->saveAttachmentsEmployment($att, $count);

                }
            }
            for ($i = 0; $i < $_POST['count_past_emp']; $i++) {
                if (!isset($_GET['document'])) {
                    $arr2['order_id'] = $document_id;
                    $arr2['document_id'] = 0;
                } else {
                    $arr2['document_id'] = $document_id;
                    $arr2['order_id'] = 0;
                }
                $arr2['client_id'] = $cid;
                $arr2['user_id'] = $this->request->session()->read('Profile.id');

                if (isset($_POST['company_name'][$i])) {
                    $arr2['company_name'] = $_POST['company_name'][$i];
                }

                if (isset($_POST['address'][$i])) {
                    $arr2['address'] = $_POST['address'][$i];
                }

                if (isset($_POST['city'][$i])) {
                    $arr2['city'] = $_POST['city'][$i];
                }

                if (isset($_POST['state_province'][$i])) {
                    $arr2['state_province'] = $_POST['state_province'][$i];
                }

                if (isset($_POST['country'][$i])) {
                    $arr2['country'] = $_POST['country'][$i];
                }

                if (isset($_POST['supervisor_name'][$i])) {
                    $arr2['supervisor_name'] = $_POST['supervisor_name'][$i];
                }

                if (isset($_POST['supervisor_phone'][$i])) {
                    $arr2['supervisor_phone'] = $_POST['supervisor_phone'][$i];
                }

                if (isset($_POST['supervisor_email'][$i])) {
                    $arr2['supervisor_email'] = $_POST['supervisor_email'][$i];
                }

                if (isset($_POST['supervisor_secondary_email'][$i])) {
                    $arr2['supervisor_secondary_email'] = $_POST['supervisor_secondary_email'][$i];
                }

                if (isset($_POST['employment_start_date'][$i])) {
                    $arr2['employment_start_date'] = $_POST['employment_start_date'][$i];
                }

                if (isset($_POST['employment_end_date'][$i])) {
                    $arr2['employment_end_date'] = $_POST['employment_end_date'][$i];
                }
                if (isset($_POST['claims_recovery_date'][$i])) {
                    $arr2['claims_recovery_date'] = $_POST['claims_recovery_date'][$i];
                }
                if (isset($_POST['emploment_history_confirm_verify_use'][$i])) {
                    $arr2['emploment_history_confirm_verify_use'] = $_POST['emploment_history_confirm_verify_use'][$i];
                }
                if (isset($_POST['us_dotsignature'][$i])) {
                    $arr2['us_dotsignature'] = $_POST['us_dotsignature'][$i];
                }
                if (isset($_POST['signature'][$i])) {
                    $arr2['signature'] = $_POST['signature'][$i];
                }
                if (isset($_POST['signature_datetime'][$i])) {
                    $arr2['signature_datetime'] = $_POST['signature_datetime'][$i];
                }

                if (isset($_POST['equipment_vans'][$i])) {
                    $arr2['equipment_vans'] = $_POST['equipment_vans'][$i];
                }
                if (isset($_POST['equipment_reefer'][$i])) {
                    $arr2['equipment_reefer'] = $_POST['equipment_reefer'][$i];
                }
                if (isset($_POST['equipment_decks'][$i])) {
                    $arr2['equipment_decks'] = $_POST['equipment_decks'][$i];
                }
                if (isset($_POST['equipment_super'][$i])) {
                    $arr2['equipment_super'] = $_POST['equipment_super'][$i];
                }
                if (isset($_POST['equipment_straight_truck'][$i])) {
                    $arr2['equipment_straight_truck'] = $_POST['equipment_straight_truck'][$i];
                }
                if (isset($_POST['equipment_others'][$i])) {
                    $arr2['equipment_others'] = $_POST['equipment_others'][$i];
                }

                //driving
                if (isset($_POST['driving_experince_local'][$i])) {
                    $arr2['driving_experince_local'] = $_POST['driving_experince_local'][$i];
                }
                if (isset($_POST['driving_experince_canada'][$i])) {
                    $arr2['driving_experince_canada'] = $_POST['driving_experince_canada'][$i];
                }
                if (isset($_POST['driving_experince_canada_rocky_mountains'][$i])) {
                    $arr2['driving_experince_canada_rocky_mountains'] = $_POST['driving_experince_canada_rocky_mountains'][$i];
                }
                if (isset($_POST['driving_experince_usa'][$i])) {
                    $arr2['driving_experince_usa'] = $_POST['driving_experince_usa'][$i];
                }

                if (isset($_POST['claims_with_employer'][$i])) {
                    $arr2['claims_with_employer'] = $_POST['claims_with_employer'][$i];
                }

                $save2 = $employment->newEntity($arr2);
                $employment->save($save2);
            }

            die;
        }

        function saveEducation($document_id = NULL, $cid = NULL)
        {
            // echo $_POST['college_school_name'][0]
            //education
            $education = TableRegistry::get('education_verification');

            $del = $education->query();
            if (!isset($_GET['document']))
                $del->delete()->where(['order_id' => $document_id])->execute();
            else
                $del->delete()->where(['document_id' => $document_id])->execute();
            if (isset($_POST['attach_doc'])) {
                $count = 0;
                foreach ($_POST['attach_doc'] as $v) {
                    $count++;
                    if (!isset($_GET['document'])) {
                        $att['order_id'] = $document_id;
                        $att['document_id'] = 0;
                    } else {
                        $att['document_id'] = $document_id;
                        $att['order_id'] = 0;
                    }
                    $att['attach_doc'] = $v;
                    $this->saveAttachmentsEducation($att, $count);

                }
            }
            for ($i = 0; $i < $_POST['count_more_edu']; $i++) {
                if (!isset($_GET['document'])) {
                    $arr2['order_id'] = $document_id;
                    $arr2['document_id'] = 0;
                } else {
                    $arr2['document_id'] = $document_id;
                    $arr2['order_id'] = 0;
                }
                $arr2['client_id'] = $cid;
                $arr2['user_id'] = $this->request->session()->read('Profile.id');

                if (isset($_POST['college_school_name'][$i])) {
                    $arr2['college_school_name'] = $_POST['college_school_name'][$i];
                }

                if (isset($_POST['address'][$i])) {
                    $arr2['address'] = $_POST['address'][$i];
                }

                if (isset($_POST['supervisior_name'][$i])) {
                    $arr2['supervisior_name'] = $_POST['supervisior_name'][$i];
                }

                if (isset($_POST['supervisior_phone'][$i])) {
                    $arr2['supervisior_phone'] = $_POST['supervisior_phone'][$i];
                }

                if (isset($_POST['supervisior_email'][$i])) {
                    $arr2['supervisior_email'] = $_POST['supervisior_email'][$i];
                }

                if (isset($_POST['	supervisior_secondary_email'][$i])) {
                    $arr2['	supervisior_secondary_email'] = $_POST['	supervisior_secondary_email'][$i];
                }

                if (isset($_POST['education_start_date'][$i])) {
                    $arr2['education_start_date'] = $_POST['education_start_date'][$i];
                }

                if (isset($_POST['education_end_date'][$i])) {
                    $arr2['education_end_date'] = $_POST['education_end_date'][$i];
                }

                if (isset($_POST['claim_tutor'][$i])) {
                    $arr2['claim_tutor'] = $_POST['claim_tutor'][$i];
                }

                if (isset($_POST['date_claims_occur'][$i])) {
                    $arr2['date_claims_occur'] = $_POST['date_claims_occur'][$i];
                }

                if (isset($_POST['education_history_confirmed_by'][$i])) {
                    $arr2['education_history_confirmed_by'] = $_POST['education_history_confirmed_by'][$i];
                }
                if (isset($_POST['highest_grade_completed'][$i])) {
                    $arr2['highest_grade_completed'] = $_POST['highest_grade_completed'][$i];
                }
                if (isset($_POST['high_school'][$i])) {
                    $arr2['high_school'] = $_POST['high_school'][$i];
                }
                if (isset($_POST['college'][$i])) {
                    $arr2['college'] = $_POST['college'][$i];
                }
                if (isset($_POST['last_school_attended'][$i])) {
                    $arr2['last_school_attended'] = $_POST['last_school_attended'][$i];
                }
                if (isset($_POST['signature'][$i])) {
                    $arr2['signature'] = $_POST['signature'][$i];
                }

                if (isset($_POST['date_time'][$i])) {
                    $arr2['date_time'] = $_POST['date_time'][$i];
                }

                $save2 = $education->newEntity($arr2);
                $education->save($save2);
            }

            die;
        }

        /**
         * Edit method
         *
         * @param string $id
         * @return void
         * @throws \Cake\Network\Exception\NotFoundException
         */
        public function editorder($cid = 0, $did = 0)
        {
            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
            $doc = $this->getDocumentcount();
            $cn = $this->getUserDocumentcount();
            if ($setting->orders_edit == 0 || count($doc) == 0 || $cn == 0) {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/");

            }
            $docs = TableRegistry::get('documents');
            $document = $docs->find()->where(['id' => $did])->first();
            $this->set('document', $document);
            $this->set('cid', $cid);
            $this->set('did', $did);
            /*$profile = $this->Clients->get($id, [
                'contain' => []
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $profile = $this->Clients->patchEntity($profile, $this->request->data);
                if ($this->Clients->save($profile)) {
                    $this->Flash->success('User saved successfully.');
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error('The user could not be saved. Please try again.');
                }
            }
            $this->set(compact('profile'));*/
            $this->render('addorder');
        }

        public function deleteOrder($id)
        {
            $this->loadModel('Orders');
            $this->Orders->deleteAll(array('id' => $id));
            $this->Flash->success('The order has been deleted.');
            $this->redirect('/documents/orderslist');
        }

        function add($cid = 0, $did = 0, $type = NULL)
        {
            $this->set('cid', $cid);
            $this->set('did', $did);
            $this->set('sid', '');
            if ($did) {
                $docs = TableRegistry::get('documents');
                $document = $docs->find()->where(['id' => $did])->first();
                $this->set('mod', $document);
            }
            $doc = $this->getDocumentcount();
            $cn = $this->getUserDocumentcount();
            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
            //var_dump($_POST);die();
            if (is_null($type)) {
                // docu

                if ($did != 0) {

                    $doc = TableRegistry::get('Documents');
                    $query = $doc->find()->where(['id' => $did])->first();
                    $this->set('document', $query);
                    if ($setting->document_edit == 0 || count($doc) == 0 || $cn == 0) {
                        $this->Flash->error('Sorry, you don\'t have the required permissions.');
                        return $this->redirect("/");

                    }

                } else {
                    if ($setting->document_create == 0 || count($doc) == 0 || $cn == 0) {
                        $this->Flash->error('Sorry, you don\'t have the required permissions.');
                        return $this->redirect("/");

                    }
                }
                if (isset($_POST['uploaded_for'])) {
                    $docs = TableRegistry::get('Documents');

                    $arr['uploaded_for'] = $_POST['uploaded_for'];
                    $arr['client_id'] = $cid;
                    if (isset($_POST['document_type']))
                        $arr['document_type'] = $_POST['document_type'];
                    $arr['created'] = date('Y-m-d H:i:s');

                    if (!$did || $did == '0') {
                        $arr['user_id'] = $this->request->session()->read('Profile.id');
                        $doc = $docs->newEntity($arr);
                        if ($docs->save($doc)) {
                            $this->Flash->success('The document has been saved.');
                            $this->redirect('/documents');
                        } else {
                            //$this->Flash->error('Client could not be saved. Please try again.');
                            //echo "e";
                        }

                    } else {
                        $query2 = $docs->query();
                        $query2->update()
                            ->set($arr)
                            ->where(['id' => $did])
                            ->execute();
                        $this->Flash->success('The document has been saved.');
                        $this->redirect('/documents');
                    }
                }
            } else {

                if ($did != 0) {

                    $doc = TableRegistry::get('orders');
                    $query = $doc->find()->where(['id' => $did])->first();
                    $this->set('document', $query);
                    if ($setting->document_edit == 0 || count($doc) == 0 || $cn == 0) {
                        $this->Flash->error('Sorry, you don\'t have the required permissions.');
                        return $this->redirect("/");

                    }

                } else {
                    if ($setting->document_create == 0 || count($doc) == 0 || $cn == 0) {
                        $this->Flash->error('Sorry, you don\'t have the required permissions.');
                        return $this->redirect("/");

                    }
                }
                if (isset($_POST['uploaded_for'])) {
                    $docs = TableRegistry::get('orders');

                    $arr['uploaded_for'] = $_POST['uploaded_for'];
                    $arr['client_id'] = $cid;
                    if (isset($_POST['order_type']))
                        $arr['order_type'] = $_POST['order_type'];
                    $arr['created'] = date('Y-m-d H:i:s');

                    if (!$did || $did == '0') {
                        $arr['user_id'] = $this->request->session()->read('Profile.id');
                        $doc = $docs->newEntity($arr);
                        if ($docs->save($doc)) {
                            $this->Flash->success('The document has been saved.');
                            $this->redirect('/orderslist');
                        } else {
                            //$this->Flash->error('Client could not be saved. Please try again.');
                            //echo "e";
                        }

                    } else {
                        $query2 = $docs->query();
                        $query2->update()
                            ->set($arr)
                            ->where(['id' => $did])
                            ->execute();
                        $this->Flash->success('The document has been saved.');
                        $this->redirect('/documents');
                    }
                }
            }

            if ($did) {
                $da = TableRegistry::get('driver_application');
                $da_detail = $da->find()->where(['document_id' => $did])->first();
                if ($da_detail) {
                    $da_ac = TableRegistry::get('driver_application_accident');
                    $sub['da_ac_detail'] = $da_ac->find()->where(['driver_application_id' => $da_detail->id])->all();

                    $da_li = TableRegistry::get('driver_application_licenses');
                    $sub['da_li_detail'] = $da_li->find()->where(['driver_application_id' => $da_detail->id])->all();

                    $da_at = TableRegistry::get('driver_application_attachments');
                    $sub['da_at_detail'] = $da_at->find()->where(['driver_application_id' => $da_detail->id])->all();

                    $this->set('sub', $sub);
                }

                $con = TableRegistry::get('consent_form');
                $con_detail = $con->find()->where(['document_id' => $did])->first();
                //echo $con_detail->id;die();
                if ($con_detail) {
                    $con_cri = TableRegistry::get('consent_form_criminal');
                    $sub2['con_cri'] = $con_cri->find()->where(['consent_form_id' => $con_detail->id])->all();
                    $this->set('sub2', $sub2);
                }

                $emp = TableRegistry::get('employment_verification');
                $sub3['emp'] = $emp->find()->where(['document_id' => $did])->all();
                //echo $con_detail->id;die();
                if ($sub3['emp']) {
                    $emp_att = TableRegistry::get('employment_verification_attachments');
                    $sub3['att'] = $emp_att->find()->where(['document_id' => $did])->all();
                    $this->set('sub3', $sub3);
                }

                $edu = TableRegistry::get('education_verification');
                $sub4['edu'] = $edu->find()->where(['document_id' => $did])->all();
                //echo $con_detail->id;die();
                if ($sub4['edu']) {
                    $edu_att = TableRegistry::get('education_verification_attachments');
                    $sub4['att'] = $edu_att->find()->where(['document_id' => $did])->all();
                    $this->set('sub4', $sub4);
                }
            }

        }

        function edit()
        {
            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
            $doc = $this->getDocumentcount();
            $cn = $this->getUserDocumentcount();
            if ($setting->document_edit == 0 || count($doc) == 0 | $cn == 0) {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/");

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
        public function delete($id = null)
        {
            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));

            if ($setting->document_delete == 0) {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/");

            }
            /*$profile = $this->Clients->get($id);
            $this->request->allowMethod(['post', 'delete']);
            if ($this->Clients->delete($profile)) {
                $this->Flash->success('The user has been deleted.');
            } else {
                $this->Flash->error('User could not be deleted. Please try again.');
            }
            return $this->redirect(['action' => 'index']);*/
        }

        public function subpages($filename)
        {
            $this->layout = "blank";
            $this->set("filename", $filename);
        }

        public function stats()
        {

        }

        public function drafts()
        {

        }

        public function getDocument()
        {
            $doc = TableRegistry::get('Subdocuments');
            $query = $doc->find();
            $query->select()->where(['display' => 1])->order('id');
            $this->response->body($query);
            return $this->response;
        }

        function getDocumentcount()
        {
            $doc = TableRegistry::get('Subdocuments');
            $query = $doc->find();
            $query->where(['display' => 1]);
            return $query->all();
        }

        function getUserDocumentcount()
        {
            $doc = TableRegistry::get('Subdocuments');
            $query = $doc->find();
            $query->where(['display' => 1])->all();
            $cnt = 0;
            foreach ($query as $q) {
                $subdoc = TableRegistry::get('profilessubdocument');
                if ($query1 = $subdoc->find()->where(['profile_id' => $this->request->session()->read('Profile.id'), 'subdoc_id' => $q->id, 'display <>' => 0])->first())
                    $cnt++;
            }
            return $cnt;
        }

        function analytics1()
        {
            $this->layout = "blank";
        }

        function analytics()
        {

        }

        function getUser($user_id)
        {
            $query = TableRegistry::get('Profiles');
            $query = $query->find()->where(['id' => $user_id]);
            $q = $query->first();
            $this->response->body($q);
            return $this->response;
            die();
        }

        function getAllUser()
        {
            $query = TableRegistry::get('Profiles');
            $query = $query->find();
            $q = $query->select();
            $this->response->body($q);
            return $this->response;
            die();
        }

        function getAllClient()
        {
            $query = TableRegistry::get('Clients');
            $query = $query->find();
            $q = $query->select();
            $this->response->body($q);
            return $this->response;
            die();
        }

        function getDocType()
        {
            $query = TableRegistry::get('Subdocuments');
            $query = $query->find();
            $q = $query->select()->where(['display' => '1']);
            $this->response->body($q);
            return $this->response;
            die();
        }

        public function orderslist()
        {
            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
            $doc = $this->getDocumentcount();
            $cn = $this->getUserDocumentcount();

            if ($setting->orders_list == 0 || count($doc) == 0 || $cn == 0) {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/");

            }
            $orders = TableRegistry::get('orders');
            $order = $orders->find();
            $order = $order->select();

            $cond = '';

            if (isset($_GET['searchdoc']) && $_GET['searchdoc']) {
                $cond = $cond . ' (title LIKE "%' . $_GET['searchdoc'] . '%" OR document_type LIKE "%' . $_GET['searchdoc'] . '%" OR description LIKE "%' . $_GET['searchdoc'] . '%")';
            }

            if (!$this->request->session()->read('Profile.admin') && $setting->orders_others == 0) {
                if ($cond == '')
                    $cond = $cond . ' user_id = ' . $this->request->session()->read('Profile.id');
                else
                    $cond = $cond . ' AND user_id = ' . $this->request->session()->read('Profile.id');
            }
            if (isset($_GET['submitted_by_id']) && $_GET['submitted_by_id']) {
                if ($cond == '')
                    $cond = $cond . ' user_id = ' . $_GET['submitted_by_id'];
                else
                    $cond = $cond . ' AND user_id = ' . $_GET['submitted_by_id'];
            }
            if (isset($_GET['client_id']) && $_GET['client_id']) {
                if ($cond == '')
                    $cond = $cond . ' client_id = ' . $_GET['client_id'];
                else
                    $cond = $cond . ' AND client_id = ' . $_GET['client_id'];
            }
            if (isset($_GET['type']) && $_GET['type']) {
                if ($cond == '')
                    $cond = $cond . ' order_type = "' . $_GET['type'] . '"';
                else
                    $cond = $cond . ' AND order_type = "' . $_GET['type'] . '"';
            }
            if (isset($_GET['draft'])) {
                if ($cond == '')
                    $cond = $cond . ' draft = 1';
                else
                    $cond = $cond . ' AND draft = 1';
            } else {
                if ($cond == '')
                    $cond = $cond . ' draft = 0';
                else
                    $cond = $cond . ' AND draft = 0';
            }
            if ($cond) {
                $order = $order->where([$cond]);
            }
            if (isset($_GET['searchdoc'])) {
                $this->set('search_text', $_GET['searchdoc']);
            }
            if (isset($_GET['submitted_by_id'])) {
                $this->set('return_user_id', $_GET['submitted_by_id']);
            }
            if (isset($_GET['client_id'])) {
                $this->set('return_client_id', $_GET['client_id']);
            }
            if (isset($_GET['type'])) {
                $this->set('return_type', $_GET['type']);
            }
            $this->set('orders', $order);

        }

        public function getSpecificData($cid = 0, $order_id = 0)
        {

            $modal = TableRegistry::get($_GET['form_type']);
            if (!isset($_GET['document']))
                $detail = $modal->find()->where(['client_id' => $cid, 'order_id' => $order_id, 'document_id' => 0]);
            else
                $detail = $modal->find()->where(['client_id' => $cid, 'document_id' => $order_id, 'order_id' => 0]);

            // die('asd');

            echo json_encode($detail);

            die;
        }

        public function getOrderData($cid = 0, $order_id = 0)
        {
            if (!$order_id) {
                echo null;
                die();
            }
            // print_r($_GET);die;
            if ($_GET['form_type'] == "company_pre_screen_question.php") {
                $preScreen = TableRegistry::get('pre_screening');
                if (!isset($_GET['document']))
                    $prescreenDetail = $preScreen->find()->where(['client_id' => $cid, 'order_id' => $order_id, 'document_id' => 0])->first();
                else
                    $prescreenDetail = $preScreen->find()->where(['client_id' => $cid, 'document_id' => $order_id, 'order_id' => 0])->first();
                // die('asd');
                unset($prescreenDetail->id);
                unset($prescreenDetail->document_id);
                unset($prescreenDetail->order_id);
                unset($prescreenDetail->client_id);
                unset($prescreenDetail->user_id);
                $prescreenDetail->sub_doc_id = 1;
                $prescreenDetail->document_type = 'Pre-Screening';

                echo json_encode($prescreenDetail);

            } else if ($_GET['form_type'] == "driver_application.php") {

                // $this->getDriverAppData($cid,$order_id);
                $driveApp = TableRegistry::get('driver_application');
                if (!isset($_GET['document']))
                    $driveAppDetail = $driveApp->find()->where(['client_id' => $cid, 'order_id' => $order_id, 'document_id' => 0])->first();
                else
                    $driveAppDetail = $driveApp->find()->where(['client_id' => $cid, 'document_id' => $order_id, 'order_id' => 0])->first();

                //$driveAppID = $driveAppDetail->id;
                unset($driveAppDetail->id);
                unset($driveAppDetail->document_id);
                unset($driveAppDetail->order_id);
                unset($driveAppDetail->client_id);
                unset($driveAppDetail->user_id);
                $driveAppDetail->sub_doc_id = 2;
                $driveAppDetail->document_type = 'Driver Application';
                echo json_encode($driveAppDetail);

                // $driveAppAcc = TableRegistry::get('driver_application_accident');
                // $driveAppDetail = $driveAppAcc->find()->where(['id'=>$driveAppID,'client_id'=>$cid,'order_id'=>$order_id]);

            } else if ($_GET['form_type'] == "driver_evaluation_form.php") {

                // $this->getRoadTestData($cid,$order_id);
                $roadTest = TableRegistry::get('road_test');
                if (!isset($_GET['document']))
                    $roadTestDetail = $roadTest->find()->where(['client_id' => $cid, 'order_id' => $order_id, 'document_id' => 0])->first();
                else
                    $roadTestDetail = $roadTest->find()->where(['client_id' => $cid, 'document_id' => $order_id, 'order_id' => 0])->first();

                // $prescreenID = $prescreenDetail->id;
                if ($roadTestDetail) {
                    $roadTestDetail->sub_doc_id = 3;
                    $roadTestDetail->document_type = 'Road test';
                }
                echo json_encode($roadTestDetail);

            } else if ($_GET['form_type'] == "document_tab_3.php") {

                $consentForm = TableRegistry::get('consent_form');
                if (!isset($_GET['document']))
                    $consentFormDetail = $consentForm->find()->where(['client_id' => $cid, 'order_id' => $order_id, 'document_id' => 0])->first();
                else
                    $consentFormDetail = $consentForm->find()->where(['client_id' => $cid, 'document_id' => $order_id, 'order_id' => 0])->first();

                $consentFormID = $consentFormDetail->id;

                $consentFormCriminal = TableRegistry::get('consent_form_criminal');
                if (!isset($_GET['document']))
                    $consentFormCrmDetail = $consentFormCriminal->find()->where(['consent_form_id' => $consentFormID])->first();
                else
                    $consentFormCrmDetail = $consentFormCriminal->find()->where(['consent_form_id' => $consentFormID])->first();

                echo json_encode($consentFormDetail);

                /*$employment = TableRegistry::get('employment_verification');
                if(!isset($_GET['document']))
                $employmentDetail = $employment->find()->where(['client_id'=>$cid,'order_id'=>$order_id,'document_id'=>0])->first();
                else
                $employmentDetail = $employment->find()->where(['client_id'=>$cid,'document_id'=>$order_id,'order_id'=>0])->first();

                // echo json_encode($employmentDetail);

                $education = TableRegistry::get('education_verification');
                if(!isset($_GET['document']))
                $educationDetail = $education->find()->where(['client_id'=>$cid,'order_id'=>$order_id,'document_id'=>0])->first();
                else
                $educationDetail = $education->find()->where(['client_id'=>$cid,'document_id'=>$order_id,'order_id'=>0])->first();
                if($educationDetail)
                $edu_id = $educationDetail->id;
                // echo json_encode($educationDetail);

                $educationPass = TableRegistry::get('education_verification_pass_education');
                if(!isset($_GET['document']))
                $educationPassDetail = $educationPass->find()->where(['education_verification_id'=>$edu_id])->first();
                else
                $educationPassDetail = $educationPass->find()->where(['education_verification_id'=>$edu_id])->first();
                if($educationPassDetail)
                $edu_id = $educationPassDetail->id;
                // echo json_encode($educationPassDetail);      */

            }
            die;

        }

        function get_documentcount($type, $c_id = "")
        {
            //$cond = $this->Settings->getprofilebyclient($this->request->session()->read('Profile.id'),0);
            //var_dump($cond);die();
            $u = $this->request->session()->read('Profile.id');

            if (!$this->request->session()->read('Profile.super')) {
                $setting = $this->Settings->get_permission($u);
                if ($setting->documents_others == 0) {
                    $u_cond = "user_id=$u";
                }

            } else
                $u_cond = "";

            $model = TableRegistry::get($type);
            if ($c_id != "") {
                $cnt = $model->find()->where(['order_id' => 0, $u_cond, 'client_id' => $c_id])->count();
            } else {
                $cond = $this->Settings->getclientids($u, $this->request->session()->read('Profile.super'));
                $cnt = $model->find()->where(['order_id' => 0, $u_cond, 'OR' => $cond])->count();
            }
            //debug($cnt); die();
            $this->response->body(($cnt));
            return $this->response;
        }

        function fileUpload()
        {
            // print_r($_POST);die;
            if (isset($_FILES['myfile']['name']) && $_FILES['myfile']['name']) {
                $arr = explode('.', $_FILES['myfile']['name']);
                $ext = end($arr);
                $rand = rand(100000, 999999) . '_' . rand(100000, 999999) . '.' . $ext;
                $allowed = array(
                    'doc',
                    'docx',
                    'pdf',
                    'jpg',
                    'jpeg',
                    'png',
                    'bmp',
                    'gif'
                );
                $check = strtolower($ext);
                if (in_array($check, $allowed)) {

                    $doc_type = $_POST['type'];
                    $destination = APP . '../webroot/attachments';

                    $source = $_FILES['myfile']['tmp_name'];
                    move_uploaded_file($source, $destination . '/' . $rand);
                    $saveData = array();
                    $saveData['order_id'] = $_POST['order_id'];
                    $saveData['path'] = $rand;

                    //saving in db
                    /* if($_POST['doc_type'] == "Pre-Screening"){
                         $this->saveAttachmentsPrescreen($saveData);
                     } else if($_POST['doc_type'] == "Driver Application"){
                         $this->saveAttachmentsDriverApp($saveData);
                     }else if($_POST['doc_type'] == "Road test"){
                         $this->saveAttachmentsRoadTest($saveData);
                     } else if($_POST['doc_type'] == "Place MEE Order"){

                             if($_POST['subtype'] == "Consent Form"){
                                 $this->saveAttachmentsConsentForm($saveData);
                             }else if($_POST['subtype'] == "Employment"){
                                 $this->saveAttachmentsEmployment($saveData);
                             }else if($_POST['subtype'] == "Education"){
                                 $this->saveAttachmentsEducation($saveData);
                             }
                     }*/

                    echo $rand;
                } else {
                    echo 'error';
                }
            }
            die();
        }

        private function saveAttachmentsPrescreen($data = NULL, $count = 0)
        {//count is to delete all while first insertion and no delete for following insertion

            $prescreen = TableRegistry::get('pre_screening_attachments');
            $del = $prescreen->query();
            if ($count == 1) {
                if (!isset($_GET['document']))
                    $del->delete()->where(['order_id' => $data['order_id']])->execute();
                else
                    $del->delete()->where(['doc_id' => $data['doc_id']])->execute();
            }
            $save = $prescreen->newEntity($data);
            $prescreen->save($save);
        }

        private function saveAttachmentsDriverApp($data = NULL, $count = 0)
        {
            $driverApp = TableRegistry::get('driver_application_attachments');
            $del = $driverApp->query();
            if ($count == 1) {
                if (!isset($_GET['document']))
                    $del->delete()->where(['order_id' => $data['order_id']])->execute();
                else
                    $del->delete()->where(['doc_id' => $data['doc_id']])->execute();
            }
            $save = $driverApp->newEntity($data);
            $driverApp->save($save);
        }

        private function saveAttachmentsRoadTest($data = NULL, $count = 0)
        {
            $roadTest = TableRegistry::get('road_test_attachments');
            $del = $roadTest->query();
            if ($count == 1) {
                if (!isset($_GET['document']))
                    $del->delete()->where(['order_id' => $data['order_id']])->execute();
                else
                    $del->delete()->where(['doc_id' => $data['doc_id']])->execute();
            }
            $save = $roadTest->newEntity($data);
            $roadTest->save($save);
        }

        private function saveAttachmentsConsentForm($data = NULL, $count = 0)
        {
            $consentForm = TableRegistry::get('consent_form_attachments');
            if ($count == 1) {
                $del = $consentForm->query();
                if (!isset($_GET['document']))
                    $del->delete()->where(['order_id' => $data['order_id']])->execute();
                else
                    $del->delete()->where(['doc_id' => $data['doc_id']])->execute();
            }
            $save = $consentForm->newEntity($data);
            $consentForm->save($save);
        }

        private function saveAttachmentsEmployment($data = NULL, $count = 0)
        {
            $employment = TableRegistry::get('employment_verification_attachments');
            if ($count == 1) {
                $del = $employment->query();
                if (!isset($_GET['document']))
                    $del->delete()->where(['order_id' => $data['order_id']])->execute();
                else
                    $del->delete()->where(['document_id' => $data['document_id']])->execute();
            }
            $save = $employment->newEntity($data);
            $employment->save($save);
        }

        private function saveAttachmentsEducation($data = NULL, $count = 0)
        {
            $education = TableRegistry::get('education_verification_attachments');
            if ($count == 1) {
                $del = $education->query();
                if (!isset($_GET['document']))
                    $del->delete()->where(['order_id' => $data['order_id']])->execute();
                else
                    $del->delete()->where(['document_id' => $data['document_id']])->execute();
            }
            $save = $education->newEntity($data);
            $education->save($save);
        }

        public function getAttachedDoc($cid = 0, $order_id = 0)
        {
            // $id = $_GET['id'];
            if ($_GET['form_type'] == "company_pre_screen_question.php") {
                $prescreen = TableRegistry::get('pre_screening_attachments');
                $prescreenAttach = $prescreen
                    ->find()
                    ->where(['order_id' => $order_id]);
                echo json_encode($prescreenAttach);

            } else if ($_GET['form_type'] == "driver_application.php") {
                $driverApp = TableRegistry::get('driver_application_attachments');
                $driverAppAttach = $driverApp
                    ->find()
                    ->where(['order_id' => $order_id]);
                echo json_encode($driverAppAttach);

            } else if ($_GET['form_type'] == "driver_evaluation_form.php") {
                $roadTest = TableRegistry::get('road_test_attachments');
                $roadTestAttach = $roadTest
                    ->find()
                    ->where(['order_id' => $order_id]);
                echo json_encode($roadTestAttach);

            } else if ($_GET['form_type'] == "document_tab_3.php") {
                if ($_GET['sub_type'] == "Consent Form") {
                    $consentForm = TableRegistry::get('consent_form_attachments');
                    $consentFormAttach = $consentForm
                        ->find()
                        ->where(['order_id' => $order_id]);
                    echo json_encode($consentFormAttach);
                } else if ($_GET['sub_type'] == "Employment") {
                    $employment = TableRegistry::get('employment_verification_attachments');
                    $employmentAttach = $employment
                        ->find()
                        ->where(['order_id' => $order_id]);
                    echo json_encode($employmentAttach);
                } else if ($_GET['sub_type'] == "Education") {
                    $education = TableRegistry::get('education_verification_attachments');

                    $educationAttach = $education
                        ->find()
                        ->where(['order_id' => $order_id]);
                    echo json_encode($educationAttach);
                }

            }

        }

        public function webservice($callfunction = null, $body = null, $orderid = null, $driverid = null)
        {
            $uid = "";
            $pdi = "";
            $tp = "";
            $filedata = "";
            $filename = "";
            $fileType = "";

            $firstname = "";
            $middlename = "";
            $lastname = "";
            $referencenumbe = "";  //# (Unique ID)
            $dateofloss = ""; // (Current Date)
            $dob = "";
            $email = "";
            $gender = "";
        }
    }
