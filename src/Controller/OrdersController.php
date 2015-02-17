<?php
    namespace App\Controller;

    use App\Controller\AppController;
    use Cake\Event\Event;
    use Cake\Controller\Controller;
    use Cake\ORM\TableRegistry;

    include(APP . '../webroot/subpages/soap/nusoap.php');

    class DocumentsController extends AppController
    {

        public $paginate = [
            'limit' => 10,
            'order' => ['id' => 'DESC'],

        ];
        public function productSelection()
        {
            
        }
        public function initialize()
        {
            parent::initialize();
            $this->loadComponent('Settings');
            if (!$this->request->session()->read('Profile.id')) {
                $this->redirect('/login');
            }

        }
        
        public function vieworder($cid = null, $did = null, $table = null)
        {
            $this->set('table', $table);
            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
            $doc = $this->getDocumentcount();
            $cn = $this->getUserDocumentcount();
            if ($setting->orders_list == 0 || count($doc) == 0 || $cn == 0) {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/");

            }
            $orders = TableRegistry::get('orders');
            if ($did){
                $order_id = $orders->find()->where(['id' => $did])->first();
                $this->loadModel('Profiles');
                $profiles = $this->Profiles->find()->where(['id'=>$order_id->uploaded_for])->first();
                $this->set('p',$profiles);
                }
            //$did= $document_id->id;
            if (isset($order_id))
                $this->set('modal', $order_id);
            $this->set('cid', $cid);
            $this->set('did', $did);
            /*$profile = $this->Clients->get($id);
            $this->set('profile', $profile);*/
            $this->set('disabled', 1);
            if ($did) {
                
                $pre = TableRegistry::get('doc_attachments');
                //$pre_at = TableRegistry::get('driver_application_accident');
                $pre_at['attach_doc'] = $pre->find()->where(['order_id' => $did,'sub_id'=>1])->all();
                $this->set('pre_at', $pre_at);

                $da = TableRegistry::get('driver_application');
                $da_detail = $da->find()->where(['order_id' => $did])->first();
                if ($da_detail) {
                    $da_ac = TableRegistry::get('driver_application_accident');
                    $sub['da_ac_detail'] = $da_ac->find()->where(['driver_application_id' => $da_detail->id])->all();

                    $da_li = TableRegistry::get('driver_application_licenses');
                    $sub['da_li_detail'] = $da_li->find()->where(['driver_application_id' => $da_detail->id])->all();

                    $da_at = TableRegistry::get('doc_attachments');
                    $sub['da_at'] = $da_at->find()->where(['order_id' => $did,'sub_id'=>2])->all();

                    $de_at = TableRegistry::get('doc_attachments');
                    $sub['de_at'] = $de_at->find()->where(['order_id' => $did,'sub_id'=>3])->all();

                    $this->set('sub', $sub);
                }
                $con = TableRegistry::get('consent_form');
                $con_detail = $con->find()->where(['order_id' => $did])->first();
                if ($con_detail) {
                    //echo $con_detail->id;die();
                    $con_cri = TableRegistry::get('consent_form_criminal');
                    $sub2['con_cri'] = $con_cri->find()->where(['consent_form_id' => $con_detail->id])->all();

                    $con_at = TableRegistry::get('doc_attachments');
                    $sub2['con_at'] = $con_at->find()->where(['order_id' => $did,'sub_id'=>4])->all();
                    $this->set('sub2', $sub2);
                    $this->set('consent_detail', $con_detail);

                }
                $emp = TableRegistry::get('employment_verification');
                $sub3['emp'] = $emp->find()->where(['order_id' => $did])->all();

                //echo $con_detail->id;die();
                $emp_att = TableRegistry::get('doc_attachments');
                $sub3['att'] = $emp_att->find()->where(['order_id' => $did,'sub_id'=>41])->all();

                $this->set('sub3', $sub3);

                $edu = TableRegistry::get('education_verification');
                $sub4['edu'] = $edu->find()->where(['order_id' => $did])->all();
                //echo $con_detail->id;die();
                $edu_att = TableRegistry::get('doc_attachments');
                $sub4['att'] = $edu_att->find()->where(['order_id' => $did,'sub_id'=>42])->all();
                $this->set('sub4', $sub4);
            }
            $this->render('addorder');

        }
        
        public function addorder($cid = 0, $did = 0, $table = null)
        {
            $this->set('uid','');
            $this->set('table', $table);
            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
            $doc = $this->getDocumentcount();
            $cn = $this->getUserDocumentcount();

            //die(count($doc));
            if ($setting->orders_create == 0 || count($doc) == 0 || $cn == 0) {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/");

            }
            $orders = TableRegistry::get('orders');
            if ($did){
                $order_id = $orders->find()->where(['id' => $did])->first();
                $this->loadModel('Profiles');
                $profiles = $this->Profiles->find()->where(['id'=>$order_id->uploaded_for])->first();
                $this->set('p',$profiles);
                }
                else
                {
                    if(isset($_GET['driver']) && is_numeric($_GET['driver']) && $_GET['driver'])
                    {
                        $this->loadModel('Profiles');
                        $profiles = $this->Profiles->find()->where(['id'=>$_GET['driver']])->first();
                        $this->set('p',$profiles);
                    }
                }
                
            if($did)
                {
                    $o_model = TableRegistry::get('Orders');
                    $orde = $o_model->find()->where(['id' => $did])->first();
                    if($orde)
                    {
                        $dr = $orde->draft;
                        if($dr=='0' || !$dr){
                        $dr = 0;
                        $this->Flash->success('Your order has been submitted');
                        }
                        else
                        $dr =1;
                    }
                    else
                    $dr = 1;
                }
                else
                $dr = 1;
                $this->set('dr',$dr);    
            //$did= $document_id->id;
            if (isset($order_id))
                $this->set('modal', $order_id);
            $this->set('cid', $cid);
            $this->set('did', $did);
            if ($did) {
                $pre = TableRegistry::get('doc_attachments');
                //$pre_at = TableRegistry::get('driver_application_accident');
                $pre_at['attach_doc'] = $pre->find()->where(['order_id' => $did,'sub_id'=>1])->all();
                $this->set('pre_at', $pre_at);

                $da = TableRegistry::get('driver_application');
                $da_detail = $da->find()->where(['order_id' => $did])->first();
                if ($da_detail) {
                    $da_ac = TableRegistry::get('driver_application_accident');
                    $sub['da_ac_detail'] = $da_ac->find()->where(['driver_application_id' => $da_detail->id])->all();

                    $da_li = TableRegistry::get('driver_application_licenses');
                    $sub['da_li_detail'] = $da_li->find()->where(['driver_application_id' => $da_detail->id])->all();

                    $da_at = TableRegistry::get('doc_attachments');
                    $sub['da_at'] = $da_at->find()->where(['order_id' => $did,'sub_id'=>2])->all();

                    $de_at = TableRegistry::get('doc_attachments');
                    $sub['de_at'] = $de_at->find()->where(['order_id' => $did,'sub_id'=>3])->all();

                    $this->set('sub', $sub);
                }
                $con = TableRegistry::get('consent_form');
                $con_detail = $con->find()->where(['order_id' => $did])->first();
                if ($con_detail) {
                    //echo $con_detail->id;die();
                    $con_cri = TableRegistry::get('consent_form_criminal');
                    $sub2['con_cri'] = $con_cri->find()->where(['consent_form_id' => $con_detail->id])->all();

                    $con_at = TableRegistry::get('doc_attachments');
                    $sub2['con_at'] = $con_at->find()->where(['order_id' => $did,'sub_id'=>4])->all();
                    $this->set('sub2', $sub2);
                    $this->set('consent_detail', $con_detail);

                }
                $emp = TableRegistry::get('employment_verification');
                $sub3['emp'] = $emp->find()->where(['order_id' => $did])->all();

                //echo $con_detail->id;die();
                $emp_att = TableRegistry::get('doc_attachments');
                $sub3['att'] = $emp_att->find()->where(['order_id' => $did,'sub_id'=>41])->all();

                $this->set('sub3', $sub3);

                $edu = TableRegistry::get('education_verification');
                $sub4['edu'] = $edu->find()->where(['order_id' => $did])->all();
                //echo $con_detail->id;die();
                $edu_att = TableRegistry::get('doc_attachments');
                $sub4['att'] = $edu_att->find()->where(['order_id' => $did,'sub_id'=>42])->all();
                $this->set('sub4', $sub4);
            }

        }
        
        public function savedoc($cid = 0, $did = 0)
        {
//         echo "<pre>";print_r($_POST);
            if (!isset($_GET['document'])) {
                // saving in order table
                $orders = TableRegistry::get('orders');
                if(!$did || $did == '0')
                $arr['title'] = 'order_' . $_POST['uploaded_for'] . '_' . date('Y-m-d H:i:s');
                $arr['uploaded_for'] = $_POST['uploaded_for'];
                $sig = explode('/',$_POST['recruiter_signature']);
                $arr['recruiter_signature'] = end($sig);
                if($did)
                {
                    $o_model = TableRegistry::get('Orders');
                    $orde = $o_model->find()->where(['id' => $did])->first();
                    if($orde)
                    {
                        $dr = $orde->draft;
                        if($dr=='0' || !$dr)
                        $dr = 0;
                        else
                        $dr =1;
                    }
                    else
                    $dr = 1;
                }
                else
                $dr = 1;
                $this->set('dr',$dr);
                if (isset($_GET['draft']) && $_GET['draft']){
                    if($dr)
                    $arr['draft'] = 1;                    
                    else
                    $arr['draft'] = 0;
                    }
                else{
                    //if(!$dr)
                    $arr['draft'] = 0;
                    }
                $arr['client_id'] = $cid;
                if (isset($_POST['division']))
                    $arr['division'] = urldecode($_POST['division']);
                $arr['conf_recruiter_name'] = urldecode($_POST['conf_recruiter_name']);
                $arr['conf_driver_name'] = urldecode($_POST['conf_driver_name']);
                $arr['conf_date'] = urldecode($_POST['conf_date']);
                //$arr['order_type'] = $_POST['sub_doc_id'];
                if(!$did || $did == '0')
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
                if (isset($_POST['uploaded_for']))
                    $arr['uploaded_for'] = $_POST['uploaded_for'];

                $arr['client_id'] = $cid;
                $arr['document_type'] = urldecode($_GET['document']);
                if ((!$did || $did == '0'))
                $arr['created'] = date('Y-m-d H:i:s');
                //$arr['conf_recruiter_name'] = $_POST['conf_recruiter_name'];
                //$arr['conf_driver_name'] = $_POST['conf_driver_name'];
                //$arr['conf_date'] = $_POST['conf_date'];
                if ((!$did || $did == '0') && $arr['sub_doc_id'] != 7&& $arr['sub_doc_id'] != 8) {
                    $arr['user_id'] = $this->request->session()->read('Profile.id');
                    $doc = $docs->newEntity($arr);

                    if ($docs->save($doc)) {
                        //$this->Flash->success('Client saved successfully.');
                        echo $doc->id;
                    } else {
                        //$this->Flash->error('Client could not be saved. Please try again.');
                        //echo "e";
                    }

                } elseif ($arr['sub_doc_id'] != 7) {
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
                    if ($input[0] == 'attach_doc[]' || $input[0] == 'attach_doc%5B%5D'){
                        $atta = urldecode($input[1]);
                        $att[] = trim($atta);
                        
                        }
                    continue;
                }
                if ($input[1] != '') {

                    $arr[$input[0]] = urldecode($input[1]);
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
                        $saveData['document_id'] = 0;
                    } else {
                        $saveData['document_id'] = $_POST['order_id'];
                        $saveData['order_id'] = 0;
                    }
                    $saveData['attachment'] = str_replace('<<','',$at);
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
                    $arr[$data] = urldecode($val);
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
                    $acc['date_of_accident'] = urldecode($_POST['date_of_accident'][$i]);
                    $acc['nature_of_accident'] = urldecode($_POST['nature_of_accident'][$i]);
                    $acc['fatalities'] = urldecode($_POST['fatalities'][$i]);
                    $acc['injuries'] = urldecode($_POST['injuries'][$i]);
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
                            $att['document_id'] = 0;
                        } else {
                            $att['document_id'] = $document_id;
                            $att['order_id'] = 0;
                        }
                        $att['attachment'] = $v;
                        $this->saveAttachmentsDriverApp($att, $count);

                    }

                }

                $driverAppLic = TableRegistry::get('driver_application_licenses');
                // $del = $driverAppLic->query();
                // $del->delete()->where(['driver_application_id'=>$id])->execute();
                for ($i = 0; $i <= 2; $i++) {
                    $lic['driver_application_id'] = $id;
                    $lic['driver_license'] = urldecode($_POST['driver_license'][$i]);
                    $lic['province'] = urldecode($_POST['province'][$i]);
                    $lic['license_number'] = urldecode($_POST['license_number'][$i]);
                    $lic['class'] = $_POST['class'][$i];
                    $lic['expiration_date'] = urldecode($_POST['expiration_date'][$i]);
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
                        $att['document_id'] = 0;
                    } else {
                        $att['document_id'] = $document_id;
                        $att['order_id'] = 0;
                    }
                    $att['attachment'] = $v;
                    $this->saveAttachmentsRoadTest($att, $count);

                }
            }
            foreach ($_POST as $data => $val) {

                if ($data == "document_type" || $data == 'attach_doc') {

                    continue;
                } else {
                    if (isset($_POST[$data])) {
                        $arr[$data] = urldecode($val);
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
                        $att['document_id'] = 0;
                    } else {
                        $att['document_id'] = $document_id;
                        $att['order_id'] = 0;
                    }
                    $att['attachment'] = $v;
                    $this->saveAttachmentsConsentForm($att, $count);

                }
            }
            foreach ($_POST as $data => $val) {

                if ($data == 'offence' || $data == 'date_of_sentence' || $data == 'location' || $data == 'attach_doc') {
                    continue;
                }
                //echo $data." ".$val."<br />";
                $arr[$data] = urldecode($val);

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
                    $crm['offence'] = urldecode($post['offence'][$i]);
                    $crm['date_of_sentence'] = urldecode($post['date_of_sentence'][$i]);
                    $crm['location'] = urldecode($post['location'][$i]);
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
                    $att['attachment'] = $v;
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
                    $arr2['company_name'] = urldecode($_POST['company_name'][$i]);
                }

                if (isset($_POST['address'][$i])) {
                    $arr2['address'] = urldecode($_POST['address'][$i]);
                }

                if (isset($_POST['city'][$i])) {
                    $arr2['city'] = urldecode($_POST['city'][$i]);
                }

                if (isset($_POST['state_province'][$i])) {
                    $arr2['state_province'] = urldecode($_POST['state_province'][$i]);
                }

                if (isset($_POST['country'][$i])) {
                    $arr2['country'] = urldecode($_POST['country'][$i]);
                }

                if (isset($_POST['supervisor_name'][$i])) {
                    $arr2['supervisor_name'] = urldecode($_POST['supervisor_name'][$i]);
                }

                if (isset($_POST['supervisor_phone'][$i])) {
                    $arr2['supervisor_phone'] = urldecode($_POST['supervisor_phone'][$i]);
                }

                if (isset($_POST['supervisor_email'][$i])) {
                    $arr2['supervisor_email'] = urldecode($_POST['supervisor_email'][$i]);
                }

                if (isset($_POST['supervisor_secondary_email'][$i])) {
                    $arr2['supervisor_secondary_email'] = urldecode($_POST['supervisor_secondary_email'][$i]);
                }

                if (isset($_POST['employment_start_date'][$i])) {
                    $arr2['employment_start_date'] = urldecode($_POST['employment_start_date'][$i]);
                }

                if (isset($_POST['employment_end_date'][$i])) {
                    $arr2['employment_end_date'] = urldecode($_POST['employment_end_date'][$i]);
                }
                if (isset($_POST['claims_recovery_date'][$i])) {
                    $arr2['claims_recovery_date'] = urldecode($_POST['claims_recovery_date'][$i]);
                }
                if (isset($_POST['emploment_history_confirm_verify_use'][$i])) {
                    $arr2['emploment_history_confirm_verify_use'] = urldecode($_POST['emploment_history_confirm_verify_use'][$i]);
                }
                if (isset($_POST['us_dot'][$i])) {
                    $arr2['us_dot'] = urldecode($_POST['us_dot'][$i]);
                }
                if (isset($_POST['us_dotsignature'][$i])) {
                    $arr2['us_dotsignature'] = urldecode($_POST['us_dotsignature'][$i]);
                }
                if (isset($_POST['signature'][$i])) {
                    $arr2['signature'] = urldecode($_POST['signature'][$i]);
                }
                if (isset($_POST['signature_datetime'][$i])) {
                    $arr2['signature_datetime'] = urldecode($_POST['signature_datetime'][$i]);
                }

                if (isset($_POST['equipment_vans'][$i])) {
                    $arr2['equipment_vans'] = urldecode($_POST['equipment_vans'][$i]);
                }
                if (isset($_POST['equipment_reefer'][$i])) {
                    $arr2['equipment_reefer'] = urldecode($_POST['equipment_reefer'][$i]);
                }
                if (isset($_POST['equipment_decks'][$i])) {
                    $arr2['equipment_decks'] = urldecode($_POST['equipment_decks'][$i]);
                }
                if (isset($_POST['equipment_super'][$i])) {
                    $arr2['equipment_super'] = urldecode($_POST['equipment_super'][$i]);
                }
                if (isset($_POST['equipment_straight_truck'][$i])) {
                    $arr2['equipment_straight_truck'] = urldecode($_POST['equipment_straight_truck'][$i]);
                }
                if (isset($_POST['equipment_others'][$i])) {
                    $arr2['equipment_others'] = urldecode($_POST['equipment_others'][$i]);
                }

                //driving
                if (isset($_POST['driving_experince_local'][$i])) {
                    $arr2['driving_experince_local'] = urldecode($_POST['driving_experince_local'][$i]);
                }
                if (isset($_POST['driving_experince_canada'][$i])) {
                    $arr2['driving_experince_canada'] = urldecode($_POST['driving_experince_canada'][$i]);
                }
                if (isset($_POST['driving_experince_canada_rocky_mountains'][$i])) {
                    $arr2['driving_experince_canada_rocky_mountains'] = urldecode($_POST['driving_experince_canada_rocky_mountains'][$i]);
                }
                if (isset($_POST['driving_experince_usa'][$i])) {
                    $arr2['driving_experince_usa'] = urldecode($_POST['driving_experince_usa'][$i]);
                }
                for ($l = 0; $l <= 100; $l++) {
                    if (isset($_POST['claims_with_employer_' . $l][$i])) {
                        $arr2['claims_with_employer'] = urldecode($_POST['claims_with_employer_' . $l][$i]);
                        break;
                    }
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
                    $att['attachment'] = $v;
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
                    $arr2['college_school_name'] = urldecode($_POST['college_school_name'][$i]);
                }

                if (isset($_POST['address'][$i])) {
                    $arr2['address'] = urldecode($_POST['address'][$i]);
                }

                if (isset($_POST['supervisior_name'][$i])) {
                    $arr2['supervisior_name'] = urldecode($_POST['supervisior_name'][$i]);
                }

                if (isset($_POST['supervisior_phone'][$i])) {
                    $arr2['supervisior_phone'] = urldecode($_POST['supervisior_phone'][$i]);
                }

                if (isset($_POST['supervisior_email'][$i])) {
                    $arr2['supervisior_email'] = urldecode($_POST['supervisior_email'][$i]);
                }

                if (isset($_POST['supervisior_secondary_email'][$i])) {
                    $arr2['supervisior_secondary_email'] = urldecode($_POST['supervisior_secondary_email'][$i]);
                }

                if (isset($_POST['education_start_date'][$i])) {
                    $arr2['education_start_date'] = urldecode($_POST['education_start_date'][$i]);
                }

                if (isset($_POST['education_end_date'][$i])) {
                    $arr2['education_end_date'] = urldecode($_POST['education_end_date'][$i]);
                }

                if (isset($_POST['claim_tutor'][$i])) {
                    $arr2['claim_tutor'] = urldecode($_POST['claim_tutor'][$i]);
                }

                if (isset($_POST['date_claims_occur'][$i])) {
                    $arr2['date_claims_occur'] = urldecode($_POST['date_claims_occur'][$i]);
                }

                if (isset($_POST['education_history_confirmed_by'][$i])) {
                    $arr2['education_history_confirmed_by'] = urldecode($_POST['education_history_confirmed_by'][$i]);
                }
                if (isset($_POST['highest_grade_completed'][$i])) {
                    $arr2['highest_grade_completed'] = urldecode($_POST['highest_grade_completed'][$i]);
                }
                if (isset($_POST['high_school'][$i])) {
                    $arr2['high_school'] = urldecode($_POST['high_school'][$i]);
                }
                if (isset($_POST['college'][$i])) {
                    $arr2['college'] = urldecode($_POST['college'][$i]);
                }
                if (isset($_POST['last_school_attended'][$i])) {
                    $arr2['last_school_attended'] = urldecode($_POST['last_school_attended'][$i]);
                }
                if (isset($_POST['signature'][$i])) {
                    $arr2['signature'] = urldecode($_POST['signature'][$i]);
                }

                if (isset($_POST['date_time'][$i])) {
                    $arr2['date_time'] = urldecode($_POST['date_time'][$i]);
                }

                $save2 = $education->newEntity($arr2);
                $education->save($save2);
            }

            die;
        }
        
        public function deleteOrder($id,$draft='')
        {
            if(isset($_GET['draft']))
            $draft=1;
           
           $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));

        if($setting->orders_delete==0)
        {
            $this->Flash->error('Sorry, you don\'t have the required permissions.');
            	return $this->redirect("/");

        } 
            $this->loadModel('Orders');
            $this->Orders->deleteAll(array('id' => $id));
            $this->Flash->success('The order has been deleted.');
            if($draft)
            $this->redirect('/documents/orderslist?draft');
            else
            $this->redirect('/documents/orderslist');
        }
        public function getDocument($type = "")
        {
            $doc = TableRegistry::get('Subdocuments');
            $query = $doc->find();
            if ($type == 'orders') {
                $query->select()->where(['display' => 1, 'orders' => 1])->order('id');
            } else
                $query->select()->where(['display' => 1])->order('id');
            //debug($query);
            $this->response->body($query);
            return $this->response;
        }
        function getDivById($id)
        {
            //echo $id;die();
            if($id){
            $doc = TableRegistry::get('client_divison');
            $query = $doc->find();
            $q = $query->select()->where(['id' => $id])->first();
            
            $this->response->body($q);
            return $this->response;
            die();
            }
            else
            die();
        }
    }
    