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
        
        public function initialize()
        {
            parent::initialize();
            $this->loadComponent('Settings');
            $this->loadComponent('Document');
            if (!$this->request->session()->read('Profile.id')) {
                $this->redirect('/login');
            }

        }

        public function index()
        {
            $this->set('doc_comp',$this->Document);
            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
            $doc = $this->Document->getDocumentcount();
            $cn = $this->Document->getUserDocumentcount();
            if ($setting->document_list == 0 || count($doc) == 0 || $cn == 0) {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/");

            }
            if (!$this->request->session()->read('Profile.super')) {
                $u = $this->request->session()->read('Profile.id');
                $setting = $this->Settings->get_permission($u);
                if ($setting && $setting->document_others == 0) {
                    if ($cond == '')
                        $cond = $cond . ' user_id = ' . $u;
                    else
                        $cond = $cond . ' AND user_id = ' . $u;
                    
                }
                

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
                //debug($doc);die();
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
            $this->set('documents', $this->paginate($doc));
            if (isset($_GET['flash'])) {
                $this->Flash->success('Document saved successfully.');
            }
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
            $this->set('doc_comp',$this->Document);
            if (!$this->request->session()->read('Profile.id')) {
                $this->redirect('/login');
            }
            else
            {
            $this->set('cid', $cid);
            $this->set('did', $did);
            $this->set('sid', '');
            if ($did) {
                $docs = TableRegistry::get('documents');
                $document = $docs->find()->where(['id' => $did])->first();
                $this->set('mod', $document);
            }
            $doc = $this->Document->getDocumentcount();

                //debug($doc);
            $cn = $this->Document->getUserDocumentcount();
            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
            $doc = $this->Document->getDocumentcount();
            $cn = $this->Document->getUserDocumentcount();
            if ($setting->document_list == 0 || count($doc) == 0 || $cn == 0) {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/");

            }
            /*$profile = $this->Clients->get($id);
            $this->set('profile', $profile);*/
            $this->set('disabled', 1);
            //$did=$id;
            if ($did) {
                $doc = TableRegistry::get('Documents');
                $query = $doc->find()->where(['id' => $did])->first();
                if ($query->sub_doc_id == '6') {
                    $feeds = TableRegistry::get('feedbacks');
                    //$pre_at = TableRegistry::get('driver_application_accident');
                    $feed = $feeds->find()->where(['document_id' => $did])->first();
                    $this->set('feeds', $feed);
                    $this->set('disabled', '1');
                } elseif ($query->sub_doc_id == '5') {

                    $survey = TableRegistry::get('Survey');
                    //$pre_at = TableRegistry::get('driver_application_accident');
                    $sur = $survey->find()->where(['document_id' => $did])->first();
                    $this->set('survey', $sur);
                    $this->set('disabled', '1');
                }
                elseif ($query->sub_doc_id == '7') {
                    $attachments = TableRegistry::get('attachments');
                    //$pre_at = TableRegistry::get('driver_application_accident');
                    $attachment = $attachments->find()->where(['document_id' => $did])->all();
                    $this->set('attachments', $attachment);
                }
                 elseif ($query->sub_doc_id == '8') {
                    $attachments = TableRegistry::get('audits');
                    //$pre_at = TableRegistry::get('driver_application_accident');
                    $audits = $attachments->find()->where(['document_id' => $did])->first();
                    $this->set('audits', $audits);
                } 
                $pre = TableRegistry::get('doc_attachments');
                //$pre_at = TableRegistry::get('driver_application_accident');
                $pre_at['attach_doc'] = $pre->find()->where(['document_id' => $did])->all();
                $this->set('pre_at', $pre_at);

                $da = TableRegistry::get('driver_application');
                $da_detail = $da->find()->where(['document_id' => $did])->first();
                if ($da_detail) {
                    $da_ac = TableRegistry::get('driver_application_accident');
                    $sub['da_ac_detail'] = $da_ac->find()->where(['driver_application_id' => $da_detail->id])->all();

                    $da_li = TableRegistry::get('driver_application_licenses');
                    $sub['da_li_detail'] = $da_li->find()->where(['driver_application_id' => $da_detail->id])->all();

                    $da_at = TableRegistry::get('doc_attachments');
                    $sub['da_at'] = $da_at->find()->where(['document_id' => $did])->all();

                    $de_at = TableRegistry::get('doc_attachments');
                    $sub['de_at'] = $de_at->find()->where(['document_id' => $did])->all();

                    $this->set('sub', $sub);
                }
                $con = TableRegistry::get('consent_form');
                $con_detail = $con->find()->where(['document_id' => $did])->first();
                if ($con_detail) {
                    //echo $con_detail->id;die();
                    $con_cri = TableRegistry::get('consent_form_criminal');
                    $sub2['con_cri'] = $con_cri->find()->where(['consent_form_id' => $con_detail->id])->all();

                    $con_at = TableRegistry::get('doc_attachments');
                    $sub2['con_at'] = $con_at->find()->where(['document_id' => $did])->all();
                    $this->set('sub2', $sub2);
                    $this->set('consent_detail', $con_detail);

                }
                $emp = TableRegistry::get('employment_verification');
                $sub3['emp'] = $emp->find()->where(['document_id' => $did])->all();

                //echo $con_detail->id;die();
                $emp_att = TableRegistry::get('doc_attachments');
                $sub3['att'] = $emp_att->find()->where(['document_id' => $did])->all();

                $this->set('sub3', $sub3);

                $edu = TableRegistry::get('education_verification');
                $sub4['edu'] = $edu->find()->where(['document_id' => $did])->all();
                //echo $con_detail->id;die();
                $edu_att = TableRegistry::get('doc_attachments');
                $sub4['att'] = $edu_att->find()->where(['document_id' => $did])->all();
                $this->set('sub4', $sub4);
            }
            $this->render('add');
            }
        }
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        public function vieworder($cid = null, $did = null, $table = null)
        {
            $this->set('doc_comp',$this->Document);
            $this->set('table', $table);
            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
            $doc = $this->Document->getDocumentcount();
            $cn = $this->Document->getUserDocumentcount();
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

        /**
         * Add method
         *
         * @return void
         */
         /////////////////////////////////////////////////////////////////////////////////////////////////////
        public function addorder($cid = 0, $did = 0, $table = null)
        {
            $this->set('doc_comp',$this->Document);
            $this->set('uid','');
            $this->set('table', $table);
            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));
            $doc = $this->Document->getDocumentcount();
            $cn = $this->Document->getUserDocumentcount();

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
        /********************************************************************************************************/
        public function savedoc($cid = 0, $did = 0)
        {
            $this->set('doc_comp',$this->Document);
            $this->Document->savedoc($cid,$did);
            die();
        }
        

        public function savePrescreening()
        {
            $this->Document->savePrescreening();
            die;
        }

        /**
         * saving driver application data
         */
        public function savedDriverApp($document_id = 0, $cid = 0)
        {
            $this->Document->savedDriverApp($document_id,$cid);

            die;
        }

        /**
         * saving driver application data
         */
        public function savedDriverEvaluation($document_id = 0, $cid = 0)
        {
           $this->Document->savedDriverEvaluation($document_id,$cid); 
           die();
        }

        /**
         * saving driver application data
         */
        public function savedMeeOrder($document_id = 0, $cid = 0)
        {
            $this->Document->savedMeeOrder($document_id,$cid); 
           die();
        }

        function saveEmployment($document_id = 0, $cid = 0)
        {
            $this->Document->saveEmployment($document_id,$cid); 
           die();
        }

        function saveEducation($document_id = 0, $cid = 0)
        {
            $this->Document->saveEducation($document_id,$cid); 
           die();
        }

        
        //////////////////////////////////////////////////////////////////////////////////////////////////
        

        function add($cid = 0, $did = 0, $type = NULL)
        {
            $this->set('doc_comp',$this->Document);
            $this->set('cid', $cid);
            $this->set('did', $did);
            $this->set('sid', '');
            if ($did) {
                $docs = TableRegistry::get('documents');
                $document = $docs->find()->where(['id' => $did])->first();
                $this->set('mod', $document);
            }
            $doc = $this->Document->getDocumentcount();
            $cn = $this->Document->getUserDocumentcount();
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
                            $this->redirect('orders/orderslist');
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
                $doc = TableRegistry::get('Documents');
                $query = $doc->find()->where(['id' => $did])->first();
                if ($query->sub_doc_id == '6') {
                    $feeds = TableRegistry::get('feedbacks');
                    //$pre_at = TableRegistry::get('driver_application_accident');
                    $feed = $feeds->find()->where(['document_id' => $did])->first();
                    $this->set('feeds', $feed);
                } elseif ($query->sub_doc_id == '5') {

                    $survey = TableRegistry::get('Survey');
                    //$pre_at = TableRegistry::get('driver_application_accident');
                    $sur = $survey->find()->where(['document_id' => $did])->first();
                    $this->set('survey', $sur);
                } elseif ($query->sub_doc_id == '7') {
                    $attachments = TableRegistry::get('attachments');
                    //$pre_at = TableRegistry::get('driver_application_accident');
                    $attachment = $attachments->find()->where(['document_id' => $did])->all();
                    $this->set('attachments', $attachment);
                }
                elseif ($query->sub_doc_id == '8') {
                    $attachments = TableRegistry::get('audits');
                    //$pre_at = TableRegistry::get('driver_application_accident');
                    $audits = $attachments->find()->where(['document_id' => $did])->first();
                    $this->set('audits', $audits);
                }                

                $pre = TableRegistry::get('doc_attachments');
                //$pre_at = TableRegistry::get('driver_application_accident');
                $pre_at['attach_doc'] = $pre->find()->where(['document_id' => $did])->all();
                $this->set('pre_at', $pre_at);

                $da = TableRegistry::get('driver_application');
                $da_detail = $da->find()->where(['document_id' => $did])->first();
                if ($da_detail) {
                    $da_ac = TableRegistry::get('doc_attachments');
                    $sub['da_ac_detail'] = $da_ac->find()->where(['document_id' => $da_detail->id])->all();

                    $da_li = TableRegistry::get('driver_application_licenses');
                    $sub['da_li_detail'] = $da_li->find()->where(['driver_application_id' => $da_detail->id])->all();

                    $da_at = TableRegistry::get('doc_attachments');
                    $sub['da_at'] = $da_at->find()->where(['document_id' => $did])->all();

                    $de_at = TableRegistry::get('doc_attachments');
                    $sub['de_at'] = $de_at->find()->where(['document_id' => $did])->all();

                    $this->set('sub', $sub);
                }
                $con = TableRegistry::get('consent_form');
                $con_detail = $con->find()->where(['document_id' => $did])->first();
                if ($con_detail) {
                    //echo $con_detail->id;die();
                    $con_cri = TableRegistry::get('consent_form_criminal');
                    $sub2['con_cri'] = $con_cri->find()->where(['consent_form_id' => $con_detail->id])->all();

                    $con_at = TableRegistry::get('doc_attachments');
                    $sub2['con_at'] = $con_at->find()->where(['document_id' => $did])->all();
                    $this->set('sub2', $sub2);
                    $this->set('consent_detail', $con_detail);

                }
                $emp = TableRegistry::get('employment_verification');
                $sub3['emp'] = $emp->find()->where(['document_id' => $did])->all();

                //echo $con_detail->id;die();
                $emp_att = TableRegistry::get('doc_attachments');
                $sub3['att'] = $emp_att->find()->where(['document_id' => $did])->all();

                $this->set('sub3', $sub3);

                $edu = TableRegistry::get('education_verification');
                $sub4['edu'] = $edu->find()->where(['document_id' => $did])->all();
                //echo $con_detail->id;die();
                $edu_att = TableRegistry::get('doc_attachments');
                $sub4['att'] = $edu_att->find()->where(['document_id' => $did])->all();
                $this->set('sub4', $sub4);

            }
        }


        public function delete($id = null, $type = ""){
            $settings = $this->Settings->get_settings();
            $setting = $this->Settings->get_permission($this->request->session()->read('Profile.id'));

            if ($setting->document_delete == 0) {
                $this->Flash->error('Sorry, you don\'t have the required permissions.');
                return $this->redirect("/");

            }
            if ($id != "") {
                $doc = TableRegistry::get('Subdocuments');
                $query = $doc->find();
                if ($type == 'orders') {
                    $query->select()->where(['display' => 1, 'orders' => 1])->all();
                } else
                    $query->select()->where(['display' => 1, 'orders' => 0])->all();
                foreach ($query as $q) {
                    //$sub = TableRegistry::get($q->table_name);
                    //$sub->query()->delete()->where(['document_id' => $id])->execute();

                }

                if ($this->Documents->deleteAll(array('id' => $id))) {

                    $this->Flash->success(ucfirst($settings->document) . ' has been deleted.');
                } else {
                    $this->Flash->error(ucfirst($settings->document) . ' could not be deleted. Please try again.');
                }
                if($type=='draft')
                {
                    return $this->redirect('/documents/index?draft');
                }
                else return $this->redirect('/documents/index');

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
            $this->set('doc_comp',$this->Document);
            $this->layout = "blank";
            $this->set("filename", $filename);
        }

        public function stats()
        {

        }

        public function drafts()
        {

        }

        function analytics1()
        {
            $this->layout = "blank";


        }

        function analytics()
        {//Add code here Roy! //
            $this->set('doc_comp',$this->Document);
            $orders = TableRegistry::get('orders');
            $order = $orders->find();
            $order = $order->order(['orders.id' => 'DESC']);
            $order = $order->where(['draft' => 0]);
            $order = $order->select();
            $this->set('orders', $this->paginate($order));

            $docs = TableRegistry::get('documents');
            $doc = $docs->find();
            $doc = $doc->select()->where(['draft' => 0]);
            $this->set('documents', $this->paginate($doc));

            $clients = TableRegistry::get('Clients');
            $cli =  $clients->find();
            $cli = $cli->select();
            $this->set('clients', $this->paginate($cli));

            $profiles = TableRegistry::get('Profiles');
            $pro =  $profiles->find();
            $pro = $pro->select();
            $this->set('profiles', $this->paginate($pro));
    }

        

        function get_documentcount($subdocid, $c_id = "")
        {
            $this->set('doc_comp',$this->Document);
            //$cond = $this->Settings->getprofilebyclient($this->request->session()->read('Profile.id'),0);
            //var_dump($cond);die();
            $u = $this->request->session()->read('Profile.id');

            if (!$this->request->session()->read('Profile.super')) {
                $setting = $this->Settings->get_permission($u);
                if ($setting->document_others == 0) {
                    $u_cond = "user_id=$u";
                }
                else
                    $u_cond = "";

            } else
                    $u_cond = "";

            $model = TableRegistry::get("Documents");
            if ($c_id != "") {
                $cnt = $model->find()->where(["sub_doc_id" => $subdocid, 'draft' => '0', $u_cond, 'client_id' => $c_id])->count();
            } else {
                $cond = $this->Settings->getclientids($u, $this->request->session()->read('Profile.super'));
                $cnt = $model->find()->where(["sub_doc_id" => $subdocid, 'draft' => '0', $u_cond, 'OR' => $cond])->count();
            }
            //debug($cnt); die();
            $this->response->body(($cnt));
            return $this->response;
            die();
        }

        function fileUpload($id = "")
        {
            // print_r($_POST);die;
            if (isset($_FILES['myfile']['name']) && $_FILES['myfile']['name']) {
                $arr = explode('.', $_FILES['myfile']['name']);
                $ext = end($arr);
                $rand = rand(100000, 999999) . '_' . rand(100000, 999999) . '.' . $ext;
                $allowed = array(
                    'jpg',
                    'jpeg',
                    'png',
                    'bmp',
                    'gif',
                    'pdf',
                    'doc',
                    'docx',
                    'txt',
                    'xlsx',
                    'xls',
                    'csv',
                    'mp4'
                );
                $check = strtolower($ext);
                if (in_array($check, $allowed)) {
                    if (isset($_POST['type']))
                        $doc_type = $_POST['type'];
                    $destination = WWW_ROOT . 'attachments';

                    if (!file_exists($destination)){
                        mkdir($destination, 0777, true);
                    }

                    $source = $_FILES['myfile']['tmp_name'];
                    move_uploaded_file($source, $destination . '/' . $rand);
                    $saveData = array();
                    if (isset($_POST['order_id']))
                        $saveData['order_id'] = $_POST['order_id'];
                    $saveData['path'] = $rand;

                    echo $rand;
                } else {
                    echo 'error';
                }
            }
            die();
        }

        

        function survey()
        {
            $this->render('survey');
        }

        

        function addattachment($cid, $did)
        {

            if (isset($_POST) && isset($_GET['draft'])) {

                if (isset($_GET['draft']) && $_GET['draft'])
                    $arr['draft'] = 1;
                else
                    $arr['draft'] = 0;
                $arr['sub_doc_id'] = $_POST['sub_doc_id'];
                $arr['client_id'] = $cid;
                $arr['document_type'] = $_POST['document_type'];
                $arr['title'] = $_POST['title'];
                $arr['created'] = date('Y-m-d H:i:s');

                if (!$did || $did == '0') {

                    $arr['user_id'] = $this->request->session()->read('Profile.id');
                    $docs = TableRegistry::get('Documents');
                    $doc = $docs->newEntity($arr);

                    if ($docs->save($doc)) {

                        $client_docs = array_unique($_POST['client_doc']);
                        foreach ($client_docs as $d) {
                            if ($d != "") {
                                $doczs = TableRegistry::get('attachments');
                                $ds['document_id'] = $doc->id;
                                $ds['file'] = $d;
                                $docz = $doczs->newEntity($ds);
                                $doczs->save($docz);
                                unset($doczs);
                            }
                        }
                        //die('1');
                        $this->Flash->success('Document saved successfully.');
                        $this->redirect(array('action' => 'index'));
                    } else {
                        $this->Flash->error('Document could not be saved. Please try again.');
                        $this->redirect(array('action' => 'index'));
                    }

                } else {
                    $docs = TableRegistry::get('Documents');
                    $query2 = $docs->query();
                    $query2->update()
                        ->set($arr)
                        ->where(['id' => $did])
                        ->execute();
                    $this->loadModel('Attachments');
                    /*$attach = TableRegistry::get('attachments');
                    $at = $attach->find()->where(['document_id'=>$did])->all();
                    foreach($at as $a)
                    {
                         @unlink(WWW_ROOT."attachments/".$a->file);
                    }*/
                    $this->Attachments->deleteAll(['document_id' => $did]);
                    $client_docs = array_unique($_POST['client_doc']);

                    foreach ($client_docs as $d) {
                        if ($d != "") {
                            $doczs = TableRegistry::get('attachments');
                            $ds['document_id'] = $did;
                            $ds['file'] = $d;
                            $docz = $doczs->newEntity($ds);
                            $doczs->save($docz);
                            unset($doczs);
                        }
                    }

                    $this->Flash->success('Document Updated successfully.');
                    $this->redirect(array('action' => 'index'));
                }

            }

        }
        function audits($cid, $did)
        {
            $this->set('doc_comp',$this->Document);

            if (isset($_POST)) {

                if (isset($_GET['draft']) && $_GET['draft'])
                    $arr['draft'] = 1;
                else
                    $arr['draft'] = 0;
                $arr['sub_doc_id'] = $_POST['sub_doc_id'];
                $arr['client_id'] = $cid;
                $arr['document_type'] = $_POST['document_type'];
               
                

                if (!$did || $did == '0') {

                    $arr['user_id'] = $this->request->session()->read('Profile.id');
                    $arr['created'] = date('Y-m-d H:i:s');
                    $docs = TableRegistry::get('Documents');
                    $doc = $docs->newEntity($arr);

                    if ($docs->save($doc)) {

                        $doczs = TableRegistry::get('audits');
                        $ds['document_id'] = $doc->id;
                        $ds['date'] = $_POST['year']."-".$_POST['month'];
                        foreach($_POST as $k=>$v)
                        {
                            $ds[$k]=$v;
                        }
                        $docz = $doczs->newEntity($ds);
                        $doczs->save($docz);
                        unset($doczs);
                        $this->Flash->success('Document saved successfully.');
                        $this->redirect(array('action' => 'index'));
                    } else {
                        $this->Flash->error('Document could not be saved. Please try again.');
                        $this->redirect(array('action' => 'index'));
                    }

                } else {
                    $docs = TableRegistry::get('Documents');
                    $query2 = $docs->query();
                    $query2->update()
                        ->set($arr)
                        ->where(['id' => $did])
                        ->execute();
                    $this->loadModel('Audits');
                    $this->Audits->deleteAll(['document_id' => $did]);
                     $doczs = TableRegistry::get('audits');
                        $ds['document_id'] = $did;
                        $ds['date'] = $_POST['year']."-".$_POST['month'];
                        foreach($_POST as $k=>$v)
                        {
                            $ds[$k]=$v;
                        }
                        $docz = $doczs->newEntity($ds);
                        $doczs->save($docz);
                        unset($doczs);
                    $this->Flash->success('Document Updated successfully.');
                    $this->redirect(array('action' => 'index'));
                }

            }

        }
        
        
        public function saveAttachmentsPrescreen($data = NULL, $count = 0)
        {//count is to delete all while first insertion and no delete for following insertion

            $this->Document->saveAttachmentsPrescreen($data,$count); 
           die();
        }

        public function saveAttachmentsDriverApp($data = NULL, $count = 0)
        {
            $this->Document->saveAttachmentsDriverApp($data,$count); 
           die();
        }

        public function saveAttachmentsRoadTest($data = NULL, $count = 0)
        {
            $this->Document->saveAttachmentsRoadTest($data,$count); 
           die();
        }

        public function saveAttachmentsConsentForm($data = NULL, $count = 0)
        {
            $this->Document->saveAttachmentsConsentForm($data,$count); 
           die();
        }

        public function saveAttachmentsEmployment($data = NULL, $count = 0)
        {
            $this->Document->saveAttachmentsEmployment($data,$count); 
           die();
        }

        public function saveAttachmentsEducation($data = NULL, $count = 0)
        {
            $this->Document->saveAttachmentsEducation($data,$count); 
           die();
        }
        
        
        
        
        function download($file)
        {
            
            $this->response->file(WWW_ROOT.'attachments/'.$file,array('download' => true));
            // Return response object to prevent controller from trying to render
            // a view.
            return $this->response;
        }
        function download_order($oid,$file)
        {
            $folder = 'orders/order_'.$oid.'/'.$file;
            $this->response->file(WWW_ROOT.$folder,array('download' => true));
            // Return response object to prevent controller from trying to render
            // a view.
            return $this->response;
        }
        public function getOrderData($cid = 0, $order_id = 0)
        {
            $this->Document->getOrderData($cid,$order_id);
            die;

        }
        
  
    }