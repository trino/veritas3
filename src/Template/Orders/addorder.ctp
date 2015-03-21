<script src="<?php echo $this->request->webroot; ?>js/jquery.easyui.min.js" type="text/javascript"></script>
<script src="<?php echo $this->request->webroot; ?>js/ajaxupload.js" type="text/javascript"></script>
<?php
$param = $this->request->params['action'];
$action = ucfirst($param);
if ($action == "Vieworder") { $action = "View";}
if ($action == "Addorder") {
    $action = "Create" ;
    if ($did>0){ $action = "Edit";}
}

    $doc_ext = array('pdf', 'doc', 'docx', 'txt', 'csv', 'xls', 'xlsx');
    $img_ext = array('jpg', 'jpeg', 'png', 'bmp', 'gif');

function provinces($name){
    echo '<SELECT class="form-control" name="' . $name . '">';
    echo '<OPTION>Province</OPTION>';
    echo '<OPTION value="AB">Alberta</OPTION>';
    echo '<OPTION value="BC">British Columbia</OPTION>';
    echo '<OPTION value="MB">Manitoba</OPTION>';
    echo '<OPTION value="NB">New Brunswick</OPTION>';
    echo '<OPTION value="NL">Newfoundland and Labrador</OPTION>';
    echo '<OPTION value="NT">Northwest Territories</OPTION>';
    echo '<OPTION value="NS">Nova Scotia</OPTION>';
    echo '<OPTION value="NU">Nunavut</OPTION>';
    echo '<OPTION value="ON">Ontario</OPTION>';
    echo '<OPTION value="PE">Prince Edward Island</OPTION>';
    echo '<OPTION value="QC">Quebec</OPTION>';
    echo '<OPTION value="SK">Saskatchewan</OPTION>';
    echo '<OPTION value="YT">Yukon</OPTION>';
    echo '</SELECT>';
}
?>
<input type="hidden" id="tablename" value="<?php echo $table; ?>"/>
<?php
    if (isset($disabled))
        $is_disabled = 'disabled="disabled"';
    else
        $is_disabled = '';
?>
<?php $settings = $this->requestAction('settings/get_settings'); ?>
<h3 class="page-title">
    <?php echo $action;?> Order
</h3>
<input type="hidden" id="dr" value="<?php if (isset($dr)) echo $dr; ?>"/>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?php echo $this->request->webroot; ?>">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="">
                <?php echo $action;?>  Order
            </a>
        </li>
    </ul>
    <?php
        
        $forms=array();
        if (isset($_GET["forms"])){
            $forms = explode(",", $_GET["forms"]);
        }
        else
        $forms = array(1,2,3,4,5,6,7);

        //returns: boolean, if this form should be displayed
        //parameters:
        //  $forms  -   pass in the $forms variable since globals don't seem to work
        //  $id     -   the ID/index number of the form to check
        function isallone($forms){
            
            if(count($forms)<7)
            {
                return false;
            }
            else
            if(count($forms)=='7' && urldecode($_GET['order_type'])!='Order MEE')
            return false;
            else
            return true;
        }
        $_this = $this;        
        function displayform($forms, $name,$_this){
            if(isset($_GET['order_type']) && urldecode($_GET['order_type'])=='Order MEE')
            return true;
            //pre-screening, driver application, consent form, road test
            //if ($id == 0 || $id == 5) {return true;} //create driver and confirmation must always show
            $name=trim(strtolower($name));
            
            
            
            
            
            if(in_array('2',$forms) && isset($_GET['driver']) && $name=='consent form')
            {
                
                $c2 = $_this->requestAction('/orders/check_driver_abstract2/'.$_GET['driver']);
                //die($c2->driver_province);
                if(in_array($c2->driver_province,array('BC','MB','NU','NT','QC','SK','YT')))
                return true;
                else
                if(in_array('3',$forms) && isset($_GET['driver']) && $name=='consent form')
                {
                    $c3 = $_this->requestAction('/orders/check_cvor2/'.$_GET['driver']);
                    if(in_array($c3->driver_province,array('BC','SK','MB')))
                    return true;
                    else
                    return false;
                    
                }
                else
                return false;
                
            }
            else
            if(in_array('3',$forms) && isset($_GET['driver']) && $name=='consent form')
                {
                    $c3 = $_this->requestAction('/orders/check_cvor2/'.$_GET['driver']);
                    if(in_array($c3->driver_province,array('BC','SK','MB')))
                    return true;
                    else
                    return false;
                    
                }
                else
                if($name=='consent form')
                return false;
                
                
                
            
            //return true if all boxes were checked
            if (isallone($forms)) {return true; }
            if ($name == "consent form") { return true; } //mandatory in all sections now
            if(count($forms)>0){
                if ($name == "consent form") { return true; }//$forms[1] == 1 || $forms[2] == 1 ; // if CVOR or MVR are checked, then show consent form
                return false; //no other form needs to show
            }
            return true; //returns true if $forms is empty or smaller than the ID number (ie: MEE order)
        }

        if (isset($disabled)) { ?>
            <a href="javascript:window.print();" class="floatright btn btn-primary">Print</a>

            <!--a href="" class="floatright btn btn-success">Re-Qualify</a>
            <a href="" class="floatright btn btn-info">Add to Task List</a-->
        <?php } ?>

</div>



<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue" id="form_wizard_1">
            <div class="portlet-title">
                <?php
                    $param = $this->request->params['action'];
                    if(strtolower($param) == 'vieworder')
                    {
                        ?>
                        <input type="hidden" id="viewingorder" value="1" />
                        <?php
                    }
                    else
                    {
                        ?>
                        <input type="hidden" id="viewingorder" value="0" />
                        <?php
                    }
                    $tab = 'nodisplay';
                ?>
                <div class="caption">
                    <i class="fa fa-clipboard"></i>Order Forms
                </div>

            </div>
            <div class="portlet-body form">
                <!--<form action="#" class="form-horizontal" id="submit_form" method="POST"> -->
                <div class="form-wizard">
                    <div class="form-body" style="position: relative;">
                        <?php
                            
                            if ($param != 'view') {
                                $tab = 'tab-pane';
                                ?>

                                <ul class="nav nav-pills nav-justified steps">
                                    <li>
                                        <a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1</span><br/>
												<span class="desc">
												<i class="fa fa-check"  align="center"></i> Create driver </span>
                                        </a>
                                    </li>
                                     <!--<li>
                                        <a href="#tab2" data-toggle="tab" class="step">
												<span class="number">
												2</span><br/>
												<span class="desc">
												<i class="fa fa-check"></i> Products </span>
                                        </a>
                                    </li>-->
                                    <?php
                                        $doc = $doc_comp->getDocument('orders');
                                        $subdoccli = $this->requestAction('/clients/getSubCli2/'.$cid);

                                        $subdoccli2 = $subdoccli;
                                        $doc2 = $doc;
                                        $i = 2;
                                        $end = 0;
                                        $k_c=0;
                                        $index=0;
                                        foreach ($subdoccli as $sd) {
                                         
                                            $index+=1;


                                            $d = $this->requestAction('/clients/getFirstSub/'.$sd->sub_id);

                                            //debug($d);

                                            if (displayform($forms, $d->title,$_this)){
                                                $index+=1;
                                            $act = 0;
                                            if ($d->table_name == $table) {
                                                $act = 1;
                                                $end = 1;
                                            }

                                            $prosubdoc = $this->requestAction('/settings/all_settings/0/0/profile/' . $this->Session->read('Profile.id') . '/' . $d->id);

                                             if (true){ //($prosubdoc['display'] != 0 && $d->display == 1) {
                                                
                                                $k_c++;
                                                $j = $d->id;
                                                $j = $j + 1;
                                                if($k_c==1) {
                                                    $k_cou = $j;
                                                }
                                                else
                                                if($k_cou<$j) {
                                                    $k_cou=$j;
                                                }
                                                ?>
                                                <li <?php if ($table && $end == 0) echo "class = 'done'";
                                                    if ($act == 1) {
                                                        echo 'class="active"';
                                                    } ?>>
                                                    <a href="#tab<?php echo $j; ?>" data-toggle="tab" class="step">
    												<span class="number">
    												<?php echo $i; ?> </span><br/>
    												<span class="desc">
    												<i class="fa fa-check"></i> <?php echo ucfirst($d->title); ?> </span>
                                                    </a>
                                                </li>
                                                <?php

                                                $i++;
                                            }}
                                        }
                                        if(!isset($k_cou))
                                        $k_cou = 1;
                                    ?>

                                    <li>
                                        <a href="#tab<?php echo ++$k_cou; ?>" data-toggle="tab" class="step confirmations">
												<span class="number">
												<?php echo $i++;?></span><br/>
												<span class="desc">
												<i class="fa fa-check"></i> Confirmation </span>
                                        </a>
                                    </li>
                                    <li style="display: none;">
                                        <a href="#tab<?php echo ++$k_cou; ?>" data-toggle="tab" class="step">
												<span class="number">
												<?php echo $i++;?></span><br/>
												<span class="desc">
												<i class="fa fa-check"></i> Success </span>
                                        </a>
                                    </li>

                                </ul>
                                <div id="bar" class="progress progress-striped" role="progressbar">
                                    <div class="progress-bar progress-bar-info">
                                    </div>
                                </div>
                                <div
                                    style="
  opacity:0.5;
    background-color:#dadada;
                                    position:fixed;
    width:100%;
    height:100%;
    top:0px;
    left:0px;
    z-index:1000;
    display:none;"
                                    id="loading5">
                                    <center><br/>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <strong style="color: #111;font-size: 36px;">Please wait...</strong>
                                        <br/><br/>

                                        <img
                                            src="<?php echo $this->request->webroot;?>assets/admin/layout/img/ajax-loading.gif"/>
                                    </center>
                                </div>
                            <?php
                            }
                        ?>
                        <div class="form-actions <?php if ($tab == 'nodisplay') echo $tab; ?>">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <a href="javascript:;" class="btn default button-previous"
                                       onclick="$('#skip').val('0');">
                                        <i class="m-icon-swapleft"></i> Back </a>

                                    <a href="javascript:;" class="btn red button-next skip"
                                       onclick="$('#skip').val('1');">
                                        Skip <i class="m-icon-swapdown m-icon-white"></i>
                                    </a>
                                    <input type="hidden" id="skip" value="0"/>
                                    <a href="javascript:;" class="btn blue button-next cont"
                                       onclick="$('#skip').val('0');">
                                        Save & Continue <i class="m-icon-swapright m-icon-white"></i>
                                    </a>


                                    <a href="javascript:window.print();" class="btn btn-info button-submit"
                                       onclick="$('#skip').val('0');">Print</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content mar">

                            <div class="alert alert-danger display-none">
                                <button class="close" data-dismiss="alert"></button>
                                You have some form errors. Please check below.
                            </div>
                            <div class="alert alert-success display-none">
                                <button class="close" data-dismiss="alert"></button>
                                Your form validation is successful!
                            </div>

                            <div class="form-group col-md-12 uploaded_for">
                                <input type="hidden" name="client_id" value="<?php echo $cid; ?>" id="client_id"/>
                                <input type="hidden" name="did" value="<?php echo $did; ?>" id="did"/>
                                <input type="hidden" name="uploaded_for" id="uploaded_for"
                                       value="<?php if (isset($modal) && $modal) echo $modal->uploaded_for;else{if(isset($_GET['driver']) && is_numeric($_GET['driver']))echo $_GET['driver'];} ?>"/>
                                       <input type="hidden" id="division" value="<?php if(isset($_GET['division']))echo $_GET['division'];?>" />
                                <?php
                                    if (!$did) {
                                        ?>
                                        <input type="hidden" name="user_id"
                                               value="<?php $this->request->session()->read('Profile.id');?>"
                                               id="user_id"/>

                                    <?php
                                    } else {
                                        ?>
                                        <input type="hidden" name="user_id"
                                               value="<?php if (isset($modal) && $modal) echo $modal->user_id;?>"
                                               id="user_id"/>
                                    <?php
                                    }
                                ?>

                            </div>
                            <?php $division = $this->requestAction("clients/getdivision/" . $cid);
                                if (count($division) > 0){

                            ?>
                            <input type="hidden" id="check_div" value="1"/>

                    <?php
                        }
                        else {
                            ?>
                            <input type="hidden" id="check_div" value="0"/>
                        <?php
                        }
                    ?>
                        <div class="clearfix"></div>
                        <div class="tabber <?php echo $tab; ?> <?php if (!($table)) {
                            if ($tab == 'tab-pane') { ?>active<?php }
                        } else {
                            if ($table == $d->table_name) { ?>active changeactive<?php }
                        } ?>" id="tab1">
                            <?php

                                include('subpages/profile/info_order.php');
                            ?>
                        </div>
                        
                        <!--<div class="tabber <?php echo $tab; ?>"  id="tab2">
                            <?php //include('subpages/documents/products.php'); ?>
                        </div>-->
                        
                        <?php
                        $k_c = 0;
                        if(!isset($show_all2))
                                                {
                                                    $show_all2='all';
                                                }
                        foreach ($subdoccli2 as $sd) {
                            $d = $this->requestAction('/clients/getFirstSub/'.$sd->sub_id);

                           // debug($d);
                            if (displayform($forms, $d->title,$_this)){


                            $prosubdoc = $this->requestAction('/settings/all_settings/0/0/profile/' . $this->Session->read('Profile.id') . '/' . $d->id);
                            if (true){ //($prosubdoc['display'] != 0 && $d->display == 1) {
                            $k_c++;
                            
                            $tab_count = $d->id;
                            
                            $tab_count = $tab_count + 1;
                            if($k_c==1) {
                                $k_co = $tab_count;
                            } else {
                                if($k_co<$tab_count)
                                $k_co = $tab_count;
                            }
                            ?>
                            <div class="tabber <?php echo $tab; ?>" id="tab<?php echo $tab_count; ?>">
                                <?php include('subpages/documents/' . $d->form); ?>
                            </div>
                        <?php }}}
                        if(!isset($k_co)) {$k_co=1;} ?>

                        <div class="tabber <?php echo $tab; ?> confirmations2" id="tab<?php echo ++$k_co; ?>">
                            <?php include('subpages/documents/confirmation.php'); ?>
                        </div>
                        <div class="tabber <?php echo $tab; ?>" id="tab<?php echo ++$k_co; ?>">
                            <?php include('subpages/documents/success.php'); //include('subpages/documents/forview.php'); ?>
                        </div>
                        <?php if ($tab == 'nodisplay') { // For view action only ?>

                            <div class="forview <?php if ($tab == 'tab-pane') echo 'nodisplay';?>">
                                <?php include('subpages/documents/forview.php');?>
                            </div>

                        <?php } ?>

                    </div>
                </div>
                <div class="form-actions <?php if ($tab == 'nodisplay') echo $tab; ?>" id="bottomact">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <a href="javascript:;" class="btn default button-previous" onclick="$('#skip').val('0');">
                                <i class="m-icon-swapleft"></i> Back </a>

                            <a href="javascript:;" class="btn red button-next skip" onclick="$('#skip').val('1');">
                                Skip <i class="m-icon-swapdown m-icon-white"></i>
                            </a>

                            <a href="javascript:;" class="btn blue button-next cont" onclick="$('#skip').val('0');">
                                Save & Continue <i class="m-icon-swapright m-icon-white"></i>
                            </a>


                            <a href="javascript:window.print();" class="btn btn-info button-submit">Print</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--</form> -->
        </div>
    </div>
</div>
</div>
<script>


    client_id = '<?=$cid?>',
        doc_id = '<?=$did?>';
    if (doc_id)
        doc_id = parseInt(doc_id);
    if (!doc_id) {
        $('#uploaded_for').change(function () {
            if ($(this).val())
                $('.select2-choice').removeAttr('style');
            showforms('company_pre_screen_question.php');
            showforms('driver_application.php');
            showforms('driver_evaluation_form.php');
            showforms('document_tab_3.php');
        });
    }
    <?php
    if($did)
    {
        ?>
    showforms('company_pre_screen_question.php');
    showforms('driver_application.php');
    showforms('driver_evaluation_form.php');
    showforms('document_tab_3.php');
    <?php
}
?>
    //showforms(doc_type);
    function showforms(form_type) {
        //alert(form_type);
        if (form_type != "") {
            $('.subform').load('<?php echo $this->request->webroot;?>documents/subpages/' + form_type);
            // loading data from db
            // debugger;
            var url = '<?php echo $this->request->webroot;?>orders/getOrderData/' + client_id + '/' + doc_id,
                param = {form_type: form_type};
            $.getJSON(url, param, function (res) {
                if (form_type == "company_pre_screen_question.php") {

                    if (res) {
                        $('#form_tab1').form('load', res);


                        if (res.legal_eligible_work_cananda == 1) {
                            // debugger;
                            jQuery('#legal_eligible_work_cananda_1').closest('span').addClass('checked');
                            // document.getElementById("legal_eligible_work_cananda_1").checked = true;
                        } else if (res.legal_eligible_work_cananda == 0) {
                            $('#form_tab1').find('#legal_eligible_work_cananda_0').closest('span').addClass('checked')
                        }

                        if (res.hold_current_canadian_pp == 1) {
                            $('#form_tab1').find('#hold_current_canadian_pp_1').closest('span').addClass('checked')
                        } else if (res.hold_current_canadian_pp == 0) {
                            $('#form_tab1').find('#hold_current_canadian_pp_0').closest('span').addClass('checked')

                        }

                        if (res.have_pr_us_visa == 1) {
                            $('#form_tab1').find('#have_pr_us_visa_1').closest('span').addClass('checked')
                        } else if (res.have_pr_us_visa == 0) {
                            $('#form_tab1').find('#have_pr_us_visa_0').closest('span').addClass('checked')

                        }

                        if (res.fast_card == 1) {
                            $('#form_tab1').find('#fast_card_1').closest('span').addClass('checked')
                        } else if (res.fast_card == 0) {
                            $('#form_tab1').find('#fast_card_0').closest('span').addClass('checked')

                        }

                        if (res.criminal_offence_pardon_not_granted == 1) {
                            $('#form_tab1').find('#criminal_offence_pardon_not_granted_1').closest('span').addClass('checked')
                        } else if (res.criminal_offence_pardon_not_granted == 0) {
                            $('#form_tab1').find('#criminal_offence_pardon_not_granted_0').closest('span').addClass('checked')

                        }

                        if (res.reefer_load == 1) {
                            $('#form_tab1').find('#reefer_load_1').closest('span').addClass('checked')
                        } else if (res.reefer_load == 0) {
                            $('#form_tab1').find('#reefer_load_0').closest('span').addClass('checked')

                        }
                    }

                    // attach documents
                    /*var url = '
                    <?php echo $this->request->webroot;?>documents/getAttachedDoc/'+client_id+'/'+doc_id,
                     param={form_type:form_type};
                     $.getJSON(url,param,function(res){
                     if(res.length > 0){
                     var text='';
                     for(var i=0;i<res.length;i++){
                     //  text += '<img src="
                    <?php echo $this->request->webroot;?>img/order/'+res[i].+'"/>';
                     }
                     $('.attach_more').html();
                     }

                     });*/
                    var prof_id = $('#uploaded_for').val();
                    if (prof_id) {
                        $.ajax({
                            url: '<?php echo $this->request->webroot;?>profiles/getProfileById/' + prof_id + '/1',
                            success: function (res2) {
                                var response = JSON.parse(res2);
                                //alert(res2);
                                
                                var app_name = res2.replace('{"applicant_phone_number":"','');
                                var app_name = app_name.replace('","aplicant_name":"',',');
                                var app_name = app_name.replace('","applicant_email":"',',');
                                var app_name = app_name.replace('"}','');
                                var app_name_arr = app_name.split(',');
                                app_name = app_name_arr[1];
                                //app_name = app_name.replace('","applicant_email":"ttt@ttt.com"}','');
                                $('#conf_driver_name').val(app_name);
                                $('#conf_driver_name').attr('disabled', 'disabled');
                                $('#form_tab1').find(':input').each(function () {
                                    var name_attr = $(this).attr('name');

                                    //alert(name_attr);
                                    if (response[name_attr]) {

                                        $(this).val(response[name_attr]);

                                        $(this).attr('disabled', 'disabled');

                                    }
                                });
                                

                            }
                        });
                    }


                    //$('input[type="radio"]').buttonset("refresh");
                    // end pre screening
                } else if (form_type == "driver_application.php") {

                    if (res) {
                        $('#form_tab2').form('load', res);

                        if (res.worked_for_client == 1) {
                            jQuery('#form_tab2').find('#worked_for_client_1').closest('span').addClass('checked')
                        } else if (res.worked_for_client == 0) {
                            $('#form_tab2').find('#worked_for_client_0').closest('span').addClass('checked')
                        }

                        if (res.confirm_check == 1) {
                            jQuery('#form_tab2').find('#confirm_check').closest('span').addClass('checked')
                        }

                        if (res.is_employed == 1) {
                            jQuery('#form_tab2').find('#is_employed_1').closest('span').addClass('checked')
                        } else if (res.is_employed == 0) {
                            $('#form_tab2').find('#is_employed_0').closest('span').addClass('checked')
                        }

                        if (res.age_21 == 1) {
                            $('#form_tab2').find('#age_21_1').closest('span').addClass('checked')
                        } else if (res.age_21 == 0) {
                            $('#form_tab2').find('#age_21_0').closest('span').addClass('checked')

                        }

                        if (res.proof_of_age == 1) {
                            $('#form_tab2').find('#proof_of_age_1').closest('span').addClass('checked')
                        } else if (res.proof_of_age == 0) {
                            $('#form_tab2').find('#proof_of_age_0').closest('span').addClass('checked')

                        }

                        if (res.proof_of_age == 1) {
                            $('#form_tab2').find('#proof_of_age_1').closest('span').addClass('checked')
                        } else if (res.proof_of_age == 0) {
                            $('#form_tab2').find('#proof_of_age_0').closest('span').addClass('checked')

                        }

                        if (res.convicted_criminal == 1) {
                            $('#form_tab2').find('#convicted_criminal_1').closest('span').addClass('checked')
                        } else if (res.convicted_criminal == 0) {
                            $('#form_tab2').find('#convicted_criminal_0').closest('span').addClass('checked')

                        }

                        if (res.denied_entry_us == 1) {
                            $('#form_tab2').find('#denied_entry_us_1').closest('span').addClass('checked')
                        } else if (res.denied_entry_us == 0) {
                            $('#form_tab2').find('#denied_entry_us_0').closest('span').addClass('checked')

                        }

                        if (res.denied_entry_us == 1) {
                            $('#form_tab2').find('#denied_entry_us_1').closest('span').addClass('checked')
                        } else if (res.denied_entry_us == 0) {
                            $('#form_tab2').find('#denied_entry_us_0').closest('span').addClass('checked')

                        }

                        if (res.positive_controlled_substance == 1) {
                            $('#form_tab2').find('#positive_controlled_substance_1').closest('span').addClass('checked')
                        } else if (res.positive_controlled_substance == 0) {
                            $('#form_tab2').find('#positive_controlled_substance_0').closest('span').addClass('checked')

                        }

                        if (res.refuse_drug_test == 1) {
                            $('#form_tab2').find('#refuse_drug_test_1').closest('span').addClass('checked')
                        } else if (res.refuse_drug_test == 0) {
                            $('#form_tab2').find('#refuse_drug_test_0').closest('span').addClass('checked')

                        }

                        if (res.breath_alcohol == 1) {
                            $('#form_tab2').find('#breath_alcohol_1').closest('span').addClass('checked')
                        } else if (res.breath_alcohol == 0) {
                            $('#form_tab2').find('#breath_alcohol_0').closest('span').addClass('checked')

                        }

                        if (res.fast_card == 1) {
                            $('#form_tab2').find('#fast_card_1').closest('span').addClass('checked')
                        } else if (res.fast_card == 0) {
                            $('#form_tab2').find('#fast_card_0').closest('span').addClass('checked')

                        }

                        if (res.not_able_perform_function_position == 1) {
                            $('#form_tab2').find('#not_able_perform_function_position_1').closest('span').addClass('checked')
                        } else if (res.not_able_perform_function_position == 0) {
                            $('#form_tab2').find('#not_able_perform_function_position_0').closest('span').addClass('checked')

                        }

                        if (res.physical_capable_heavy_manual_work == 1) {
                            $('#form_tab2').find('#physical_capable_heavy_manual_work_1').closest('span').addClass('checked')
                        } else if (res.physical_capable_heavy_manual_work == 0) {
                            $('#form_tab2').find('#physical_capable_heavy_manual_work_0').closest('span').addClass('checked')

                        }

                        if (res.injured_on_job == 1) {
                            $('#form_tab2').find('#injured_on_job_1').closest('span').addClass('checked')
                        } else if (res.injured_on_job == 0) {
                            $('#form_tab2').find('#injured_on_job_0').closest('span').addClass('checked')

                        }

                        if (res.willing_physical_examination == 1) {
                            $('#form_tab2').find('#willing_physical_examination_1').closest('span').addClass('checked')
                        } else if (res.willing_physical_examination == 0) {
                            $('#form_tab2').find('#willing_physical_examination_0').closest('span').addClass('checked')

                        }
                        if (res.ever_been_denied == 1) {
                            $('#form_tab2').find('#ever_been_denied_1').closest('span').addClass('checked')
                        } else if (res.ever_been_denied == 0) {
                            $('#form_tab2').find('#ever_been_denied_0').closest('span').addClass('checked')

                        }
                        if (res.suspend_any_license == 1) {
                            $('#form_tab2').find('#suspend_any_license_1').closest('span').addClass('checked')
                        } else if (res.suspend_any_license == 0) {
                            $('#form_tab2').find('#suspend_any_license_0').closest('span').addClass('checked')

                        }
                    }
                    /*var url = '
                    <?php echo $this->request->webroot;?>documents/getAttachedDoc/'+client_id+'/'+doc_id,
                     param={form_type:form_type};
                     $.getJSON(url,param,function(res){
                     if(res.length > 0){

                     }

                     });*/
                    var prof_id = $('#uploaded_for').val();
                    if (prof_id) {
                        $.ajax({
                            url: '<?php echo $this->request->webroot;?>profiles/getProfileById/' + prof_id + '/2',
                            success: function (res2) {
                                var response = JSON.parse(res2);
                                
                                $('#form_tab2').find(':input').each(function () {
                                    var name_attr = $(this).attr('name');

                                    //alert(name_attr);
                                    if (response[name_attr]) {

                                        $(this).val(response[name_attr]);

                                        $(this).attr('disabled', 'disabled');
                                    }
                                    
                                });
                            }
                        });
                    }


                    // driver applicaton ends
                } else if (form_type == "driver_evaluation_form.php") {
                    if (res) {
                        $('#form_tab3').form('load', res);


                        if (res.transmission_manual_shift == 1) {
                            $('#form_tab3').find('#transmission_manual_shift_1').closest('span').addClass('checked')
                        }
                        if (res.transmission_auto_shift == 2) {
                            $('#form_tab3').find('#transmission_auto_shift_2').closest('span').addClass('checked')
                        }

                        if (res.pre_hire == 1) {
                            $('#form_tab3').find('input[name="pre_hire"]').closest('span').addClass('checked')
                        }
                        if (res.post_accident == 2) {
                            $('#form_tab3').find('input[name="post_accident"]').closest('span').addClass('checked')
                        }
                        if (res.post_injury == 1) {
                            $('#form_tab3').find('input[name="post_injury"]').closest('span').addClass('checked')
                        }
                        if (res.post_training == 2) {
                            $('#form_tab3').find('input[name="post_training"]').closest('span').addClass('checked')
                        }
                        if (res.annual == 1) {
                            $('#form_tab3').find('input[name="annual"]').closest('span').addClass('checked')
                        }
                        if (res.skill_verification == 2) {
                            $('#form_tab3').find('input[name="skill_verification"]').closest('span').addClass('checked')
                        }

                        if (res.fuel_tank == 1) {
                            $('#form_tab3').find('input[name="fuel_tank"]').closest('span').addClass('checked')
                        }
                        if (res.all_gauges == 1) {
                            $('#form_tab3').find('input[name="all_gauges"]').closest('span').addClass('checked')
                        }
                        if (res.audible_air == 1) {
                            $('#form_tab3').find('input[name="audible_air"]').closest('span').addClass('checked')
                        }
                        if (res.wheels_tires == 1) {
                            $('#form_tab3').find('input[name="wheels_tires"]').closest('span').addClass('checked')
                        }
                        if (res.trailer_brakes == 1) {
                            $('#form_tab3').find('input[name="trailer_brakes"]').closest('span').addClass('checked')
                        }
                        if (res.trailer_airlines == 1) {
                            $('#form_tab3').find('input[name="trailer_airlines"]').closest('span').addClass('checked')
                        }
                        if (res.inspect_5th_wheel == 1) {
                            $('#form_tab3').find('input[name="inspect_5th_wheel"]').closest('span').addClass('checked')
                        }
                        if (res.cold_check == 1) {
                            $('#form_tab3').find('input[name="cold_check"]').closest('span').addClass('checked')
                        }
                        if (res.seat_mirror == 1) {
                            $('#form_tab3').find('input[name="seat_mirror"]').closest('span').addClass('checked')
                        }
                        if (res.coupling == 1) {
                            $('#form_tab3').find('input[name="coupling"]').closest('span').addClass('checked')
                        }
                        if (res.paperwork == 1) {
                            $('#form_tab3').find('input[name="paperwork"]').closest('span').addClass('checked')
                        }
                        if (res.lights_abs_lamps == 1) {
                            $('#form_tab3').find('input[name="lights_abs_lamps"]').closest('span').addClass('checked')
                        }
                        if (res.annual_inspection_strickers == 1) {
                            $('#form_tab3').find('input[name="annual_inspection_strickers"]').closest('span').addClass('checked')
                        }
                        if (res.cab_air_brake_checked == 1) {
                            $('#form_tab3').find('input[name="cab_air_brake_checked"]').closest('span').addClass('checked')
                        }
                        if (res.landing_gear == 1) {
                            $('#form_tab3').find('input[name="landing_gear"]').closest('span').addClass('checked')
                        }
                        if (res.emergency_exit == 1) {
                            $('#form_tab3').find('input[name="emergency_exit"]').closest('span').addClass('checked')
                        }

                        if (res.driving_follows_too_closely == 1) {
                            $('#form_tab3').find('#driving_follows_too_closely_1').closest('span').addClass('checked')
                        } else if (res.driving_follows_too_closely == 2) {
                            $('#form_tab3').find('#driving_follows_too_closely_2').closest('span').addClass('checked')
                        } else if (res.driving_follows_too_closely == 3) {
                            $('#form_tab3').find('#driving_follows_too_closely_3').closest('span').addClass('checked')
                        } else if (res.driving_follows_too_closely == 4) {
                            $('#form_tab3').find('#driving_follows_too_closely_4').closest('span').addClass('checked')
                        }


                        if (res.driving_improper_choice_lane == 1) {
                            $('#form_tab3').find('#driving_improper_choice_lane_1').closest('span').addClass('checked')
                        } else if (res.driving_improper_choice_lane == 2) {
                            $('#form_tab3').find('#driving_improper_choice_lane_2').closest('span').addClass('checked')
                        } else if (res.driving_improper_choice_lane == 3) {
                            $('#form_tab3').find('#driving_improper_choice_lane_3').closest('span').addClass('checked')
                        } else if (res.driving_improper_choice_lane == 4) {
                            $('#form_tab3').find('#driving_improper_choice_lane_4').closest('span').addClass('checked')
                        }


                        if (res.driving_fails_use_mirror_properly == 1) {
                            $('#form_tab3').find('#driving_fails_use_mirror_properly_1').closest('span').addClass('checked')
                        } else if (res.driving_fails_use_mirror_properly == 2) {
                            $('#form_tab3').find('#driving_fails_use_mirror_properly_2').closest('span').addClass('checked')
                        } else if (res.driving_fails_use_mirror_properly == 3) {
                            $('#form_tab3').find('#driving_fails_use_mirror_properly_3').closest('span').addClass('checked')
                        } else if (res.driving_fails_use_mirror_properly == 4) {
                            $('#form_tab3').find('#driving_fails_use_mirror_properly_4').closest('span').addClass('checked')
                        }

                        if (res.driving_signal == 1) {
                            $('#form_tab3').find('#driving_signal_1').closest('span').addClass('checked')
                        } else if (res.driving_signal == 2) {
                            $('#form_tab3').find('#driving_signal_2').closest('span').addClass('checked')
                        } else if (res.driving_signal == 3) {
                            $('#form_tab3').find('#driving_signal_3').closest('span').addClass('checked')
                        } else if (res.driving_signal == 4) {
                            $('#form_tab3').find('#driving_signal_4').closest('span').addClass('checked')
                        }

                        if (res.driving_fail_use_caution_rr == 1) {
                            $('#form_tab3').find('#driving_fail_use_caution_rr_1').closest('span').addClass('checked')
                        } else if (res.driving_fail_use_caution_rr == 2) {
                            $('#form_tab3').find('#driving_fail_use_caution_rr_2').closest('span').addClass('checked')
                        } else if (res.driving_fail_use_caution_rr == 3) {
                            $('#form_tab3').find('#driving_fail_use_caution_rr_3').closest('span').addClass('checked')
                        } else if (res.driving_fail_use_caution_rr == 4) {
                            $('#form_tab3').find('#driving_fail_use_caution_rr_4').closest('span').addClass('checked')
                        }

                        if (res.driving_speed == 1) {
                            $('#form_tab3').find('#driving_speed_1').closest('span').addClass('checked')
                        } else if (res.driving_speed == 2) {
                            $('#form_tab3').find('#driving_speed_2').closest('span').addClass('checked')
                        } else if (res.driving_speed == 3) {
                            $('#form_tab3').find('#driving_speed_3').closest('span').addClass('checked')
                        } else if (res.driving_speed == 4) {
                            $('#form_tab3').find('#driving_speed_4').closest('span').addClass('checked')
                        }

                        if (res.driving_incorrect_use_clutch_brake == 1) {
                            $('#form_tab3').find('#driving_incorrect_use_clutch_brake_1').closest('span').addClass('checked')
                        } else if (res.driving_incorrect_use_clutch_brake == 2) {
                            $('#form_tab3').find('#driving_incorrect_use_clutch_brake_2').closest('span').addClass('checked')
                        } else if (res.driving_incorrect_use_clutch_brake == 3) {
                            $('#form_tab3').find('#driving_incorrect_use_clutch_brake_3').closest('span').addClass('checked')
                        } else if (res.driving_incorrect_use_clutch_brake == 4) {
                            $('#form_tab3').find('#driving_incorrect_use_clutch_brake_4').closest('span').addClass('checked')
                        }

                        if (res.driving_accelerator_gear_steer == 1) {
                            $('#form_tab3').find('#driving_accelerator_gear_steer_1').closest('span').addClass('checked')
                        } else if (res.driving_accelerator_gear_steer == 2) {
                            $('#form_tab3').find('#driving_accelerator_gear_steer_2').closest('span').addClass('checked')
                        } else if (res.driving_accelerator_gear_steer == 3) {
                            $('#form_tab3').find('#driving_accelerator_gear_steer_3').closest('span').addClass('checked')
                        } else if (res.driving_accelerator_gear_steer == 4) {
                            $('#form_tab3').find('#driving_accelerator_gear_steer_4').closest('span').addClass('checked')
                        }

                        if (res.driving_incorrect_observation_skills == 1) {
                            $('#form_tab3').find('#driving_incorrect_observation_skills_1').closest('span').addClass('checked')
                        } else if (res.driving_incorrect_observation_skills == 2) {
                            $('#form_tab3').find('#driving_incorrect_observation_skills_2').closest('span').addClass('checked')
                        } else if (res.driving_incorrect_observation_skills == 3) {
                            $('#form_tab3').find('#driving_incorrect_observation_skills_3').closest('span').addClass('checked')
                        } else if (res.driving_incorrect_observation_skills == 4) {
                            $('#form_tab3').find('#driving_incorrect_observation_skills_4').closest('span').addClass('checked')
                        }

                        if (res.driving_respond_instruction == 1) {
                            $('#form_tab3').find('#driving_respond_instruction_1').closest('span').addClass('checked')
                        } else if (res.driving_respond_instruction == 2) {
                            $('#form_tab3').find('#driving_respond_instruction_2').closest('span').addClass('checked')
                        } else if (res.driving_respond_instruction == 3) {
                            $('#form_tab3').find('#driving_respond_instruction_3').closest('span').addClass('checked')
                        } else if (res.driving_respond_instruction == 4) {
                            $('#form_tab3').find('#driving_respond_instruction_4').closest('span').addClass('checked')
                        }

                        if (res.cornering_signaling == 1) {
                            $('#form_tab3').find('#cornering_signaling_1').closest('span').addClass('checked')
                        } else if (res.cornering_signaling == 2) {
                            $('#form_tab3').find('#cornering_signaling_2').closest('span').addClass('checked')
                        } else if (res.cornering_signaling == 3) {
                            $('#form_tab3').find('#cornering_signaling_3').closest('span').addClass('checked')
                        } else if (res.cornering_signaling == 4) {
                            $('#form_tab3').find('#cornering_signaling_4').closest('span').addClass('checked')
                        }

                        if (res.cornering_speed == 1) {
                            $('#form_tab3').find('#cornering_speed_1').closest('span').addClass('checked')
                        } else if (res.cornering_speed == 2) {
                            $('#form_tab3').find('#cornering_speed_2').closest('span').addClass('checked')
                        } else if (res.cornering_speed == 3) {
                            $('#form_tab3').find('#cornering_speed_3').closest('span').addClass('checked')
                        } else if (res.cornering_speed == 4) {
                            $('#form_tab3').find('#cornering_speed_4').closest('span').addClass('checked')
                        }

                        if (res.cornering_fails == 1) {
                            $('#form_tab3').find('#cornering_fails_1').closest('span').addClass('checked')
                        } else if (res.cornering_fails == 2) {
                            $('#form_tab3').find('#cornering_fails_2').closest('span').addClass('checked')
                        } else if (res.cornering_fails == 3) {
                            $('#form_tab3').find('#cornering_fails_3').closest('span').addClass('checked')
                        } else if (res.cornering_fails == 4) {
                            $('#form_tab3').find('#cornering_fails_4').closest('span').addClass('checked')
                        }

                        if (res.cornering_proper_set_up_turn == 1) {
                            $('#form_tab3').find('#cornering_proper_set_up_turn_1').closest('span').addClass('checked')
                        } else if (res.cornering_proper_set_up_turn == 2) {
                            $('#form_tab3').find('#cornering_proper_set_up_turn_2').closest('span').addClass('checked')
                        } else if (res.cornering_proper_set_up_turn == 3) {
                            $('#form_tab3').find('#cornering_proper_set_up_turn_3').closest('span').addClass('checked')
                        } else if (res.cornering_proper_set_up_turn == 4) {
                            $('#form_tab3').find('#cornering_proper_set_up_turn_4').closest('span').addClass('checked')
                        }

                        if (res.cornering_turns == 1) {
                            $('#form_tab3').find('#cornering_turns_1').closest('span').addClass('checked')
                        } else if (res.cornering_turns == 2) {
                            $('#form_tab3').find('#cornering_turns_2').closest('span').addClass('checked')
                        } else if (res.cornering_turns == 3) {
                            $('#form_tab3').find('#cornering_turns_3').closest('span').addClass('checked')
                        } else if (res.cornering_turns == 4) {
                            $('#form_tab3').find('#cornering_turns_4').closest('span').addClass('checked')
                        }


                        if (res.cornering_wrong_lane_impede == 1) {
                            $('#form_tab3').find('#cornering_wrong_lane_impede_1').closest('span').addClass('checked')
                        } else if (res.cornering_wrong_lane_impede == 2) {
                            $('#form_tab3').find('#cornering_wrong_lane_impede_2').closest('span').addClass('checked')
                        } else if (res.cornering_wrong_lane_impede == 3) {
                            $('#form_tab3').find('#cornering_wrong_lane_impede_3').closest('span').addClass('checked')
                        } else if (res.cornering_wrong_lane_impede == 4) {
                            $('#form_tab3').find('#cornering_wrong_lane_impede_4').closest('span').addClass('checked')
                        }

                        if (res.shifting_smooth_take_off == 1) {
                            $('#form_tab3').find('#shifting_smooth_take_off_1').closest('span').addClass('checked')
                        } else if (res.shifting_smooth_take_off == 2) {
                            $('#form_tab3').find('#shifting_smooth_take_off_2').closest('span').addClass('checked')
                        } else if (res.shifting_smooth_take_off == 3) {
                            $('#form_tab3').find('#shifting_smooth_take_off_3').closest('span').addClass('checked')
                        } else if (res.shifting_smooth_take_off == 4) {
                            $('#form_tab3').find('#shifting_smooth_take_off_4').closest('span').addClass('checked')
                        }

                        if (res.shifting_proper_gear_selection == 1) {
                            $('#form_tab3').find('#shifting_proper_gear_selection_1').closest('span').addClass('checked')
                        } else if (res.shifting_proper_gear_selection == 2) {
                            $('#form_tab3').find('#shifting_proper_gear_selection_2').closest('span').addClass('checked')
                        } else if (res.shifting_proper_gear_selection == 3) {
                            $('#form_tab3').find('#shifting_proper_gear_selection_3').closest('span').addClass('checked')
                        } else if (res.shifting_proper_gear_selection == 4) {
                            $('#form_tab3').find('#shifting_proper_gear_selection_4').closest('span').addClass('checked')
                        }

                        if (res.shifting_proper_clutching == 1) {
                            $('#form_tab3').find('#shifting_proper_clutching_1').closest('span').addClass('checked')
                        } else if (res.shifting_proper_clutching == 2) {
                            $('#form_tab3').find('#shifting_proper_clutching_2').closest('span').addClass('checked')
                        } else if (res.shifting_proper_clutching == 3) {
                            $('#form_tab3').find('#shifting_proper_clutching_3').closest('span').addClass('checked')
                        } else if (res.shifting_proper_clutching == 4) {
                            $('#form_tab3').find('#shifting_proper_clutching_4').closest('span').addClass('checked')
                        }

                        if (res.shifting_gear_recovery == 1) {
                            $('#form_tab3').find('#shifting_gear_recovery_1').closest('span').addClass('checked')
                        } else if (res.shifting_gear_recovery == 2) {
                            $('#form_tab3').find('#shifting_gear_recovery_2').closest('span').addClass('checked')
                        } else if (res.shifting_gear_recovery == 3) {
                            $('#form_tab3').find('#shifting_gear_recovery_3').closest('span').addClass('checked')
                        } else if (res.shifting_gear_recovery == 4) {
                            $('#form_tab3').find('#shifting_gear_recovery_4').closest('span').addClass('checked')
                        }

                        if (res.shifting_up_down == 1) {
                            $('#form_tab3').find('#shifting_up_down_1').closest('span').addClass('checked')
                        } else if (res.shifting_up_down == 2) {
                            $('#form_tab3').find('#shifting_up_down_2').closest('span').addClass('checked')
                        } else if (res.shifting_up_down == 3) {
                            $('#form_tab3').find('#shifting_up_down_3').closest('span').addClass('checked')
                        } else if (res.shifting_up_down == 4) {
                            $('#form_tab3').find('#shifting_up_down_4').closest('span').addClass('checked')
                        }

                        if (res.backing_uses_proper_set_up == 1) {
                            $('#form_tab3').find('#backing_uses_proper_set_up_1').closest('span').addClass('checked')
                        }

                        if (res.backing_path_before_while_driving == 1) {
                            $('#form_tab3').find('#backing_path_before_while_driving_1').closest('span').addClass('checked')
                        } else if (res.backing_path_before_while_driving == 2) {
                            $('#form_tab3').find('#backing_path_before_while_driving_2').closest('span').addClass('checked')
                        }

                        if (res.backing_use_4way_flashers_city_horn == 1) {
                            $('#form_tab3').find('#backing_use_4way_flashers_city_horn_1').closest('span').addClass('checked')
                        } else if (res.backing_use_4way_flashers_city_horn == 2) {
                            $('#form_tab3').find('#backing_use_4way_flashers_city_horn_2').closest('span').addClass('checked')
                        }

                        if (res.backing_show_certainty_while_steering == 1) {
                            $('#form_tab3').find('#backing_show_certainty_while_steering_1').closest('span').addClass('checked')
                        } else if (res.backing_show_certainty_while_steering == 2) {
                            $('#form_tab3').find('#backing_show_certainty_while_steering_2').closest('span').addClass('checked')
                        }

                        if (res.backing_continually_uses_mirror == 1) {
                            $('#form_tab3').find('#backing_continually_uses_mirror_1').closest('span').addClass('checked')
                        } else if (res.backing_continually_uses_mirror == 2) {
                            $('#form_tab3').find('#backing_continually_uses_mirror_2').closest('span').addClass('checked')
                        }

                        if (res.backing_maintain_proper_seed == 1) {
                            $('#form_tab3').find('#backing_maintain_proper_seed_1').closest('span').addClass('checked')
                        }

                        if (res.backing_complete_reasonable_time_fashion == 1) {
                            $('#form_tab3').find('#backing_complete_reasonable_time_fashion_1').closest('span').addClass('checked')
                        }

                        if (res.recommended_for_hire == 1) {
                            $('#form_tab3').find('#recommended_for_hire_1').closest('span').addClass('checked')
                        } else if (res.recommended_for_hire == 2) {
                            $('#form_tab3').find('#recommended_for_hire_2').closest('span').addClass('checked')
                        }

                        if (res.recommended_full_trainee == 1) {
                            $('#form_tab3').find('#recommended_full_trainee_1').closest('span').addClass('checked')
                        } else if (res.recommended_full_trainee == 2) {
                            $('#form_tab3').find('#recommended_full_trainee_0').closest('span').addClass('checked')

                        }
                        if (res.recommended_fire_hire_trainee == 1) {
                            $('#form_tab3').find('#recommended_fire_hire_trainee_1').closest('span').addClass('checked')
                        } else if (res.recommended_fire_hire_trainee == 2) {
                            $('#form_tab3').find('#recommended_fire_hire_trainee_0').closest('span').addClass('checked')
                        }
                    }

                    var prof_id = $('#uploaded_for').val();
                    if (prof_id) {
                        $.ajax({
                            url: '<?php echo $this->request->webroot;?>profiles/getProfileById/' + prof_id + '/3',
                            success: function (res2) {
                                var response = JSON.parse(res2);
                                $('#form_tab3').find(':input').each(function () {
                                    var name_attr = $(this).attr('name');

                                    //alert(name_attr);
                                    if (response[name_attr]) {

                                        $(this).val(response[name_attr]);
                                        $(this).attr('disabled', 'disabled');


                                    }
                                    
                                });
                            }
                        });
                    }


                    // end road test
                } else if (form_type == "document_tab_3.php") {


                    if (res) {
                        $('#form_consent').find(':input').each(function () {
                            var $name = $(this).attr('name');

                            if ($name != 'offence[]' && $name != 'date_of_sentence[]' && $name != 'location[]' && $name != 'attach_doc[]') {
                                if (doc_id)
                                    $(this).val(res[$name]);


                            }
                        });
                    }
                    var prof_id = $('#uploaded_for').val();
                    if (prof_id) {
                        $.ajax({
                            url: '<?php echo $this->request->webroot;?>profiles/getProfileById/' + prof_id + '/4',
                            success: function (res2) {
                                var response = JSON.parse(res2);
                                $('#form_consent').find(':input').each(function () {
                                    var name_attr = $(this).attr('name');

                                    //alert(name_attr);
                                    if (response[name_attr]) {

                                        $(this).val(response[name_attr]);
                                        $(this).attr('disabled', 'disabled');

                                    }
                                    
                                });

                            }
                        });
                    }


                    // assignValue('form_tab4',res);
                    // mee order ends
                }
            });
        }
        else
            $('.subform').html("");
    }


    function assignValue(formID, obj) {
        // debugger;
        $('#' + formID).form('load', obj);
        // $('#'+formID).find(':input').each(function(){
        //      var $name = $(this).attr('name');
        //      $(this).val(obj[$name]);

        // });
        /*
         $.each(obj,function(index,value){
         // debugger;
         $('#'+formID).find('input[name="'+index+'"]').val(value);
         });*/
    }

    ///////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////


    function subform(form_type) {
        var filename = form_type.replace(/\W/g, '_');
        var filename = filename.toLowerCase();
        $('.subform').show();
        $('.subform').load('<?php echo $this->request->webroot;?>documents/subpages/' + filename);
    }
    jQuery(document).ready(function () {
        if($('.tabber.active').attr('id')=='tab1')
        {
            $('.skip').hide();
        }
        
        <?php if(isset($_GET['driver']) && is_numeric($_GET['driver'])){?>
            
            showforms('company_pre_screen_question.php');
            showforms('driver_application.php');
            showforms('driver_evaluation_form.php');
            showforms('document_tab_3.php');
            <?php }?>

        $('.button-next').click(function () {
            $('.cont').removeAttr('disabled');
            //$('.tab-pane.active').find('input[type="email"]').val('');
        });
        $('.button-previous').click(function () {
            $('.cont').removeAttr('disabled');
            //$('.tab-pane.active input[type="email"]').val('');
        });
        $('.email1').live('keyup', function () {
            //alert($('.email1').val());
            if ($(this).val() != '' && ($(this).val().replace('@', '') == $(this).val() || $(this).val().replace('.', '') == $(this).val() || $(this).val().length < 5)) {
                $(this).attr('style', 'border-color:red');
                $('.cont').attr('disabled', '');
            }
            else {
                // alert($('.email1').val());
                $('.cont').removeAttr('disabled');
                $(this).removeAttr('style');
            }

        });
        $('.email1').live('blur', function () {
            //alert($('.email1').val());
            if ($(this).val() != '' && ($(this).val().replace('@', '') == $(this).val() || $(this).val().replace('.', '') == $(this).val() || $(this).val().length < 5)) {
                $(this).val('');
                $('.cont').removeAttr('disabled');
                $(this).removeAttr('style');
            }


        });
        $('.required').live('keyup', function () {
            //alert('test');
            //alert($('.email1').val());
            if ($(this).val().length > 0) {
                $(this).removeAttr('style');
                //$('.cont').attr('disabled','');
            }


        });
        $('#driverEm').live('keyup', function () {
            //alert('test');
            //alert($('.email1').val());
            if ($(this).val().length > 0) {
                $(this).removeAttr('style');
                //$('.cont').attr('disabled','');
            }


        });
        $('.required').live('change', function () {
            //alert('test');
            //alert($('.email1').val());
            if ($(this).val().length > 0) {
                $(this).removeAttr('style');
                //$('.cont').attr('disabled','');
            }


        });
        $('.required').live('blur', function () {
            //alert($('.email1').val());
            if ($(this).val().length == 0) {
                $(this).val('');
                //$('.cont').removeAttr('disabled');
                $(this).attr('style', 'border-color:red');
            }


        });


        <?php
        if($this->request['action']=='vieworder')
        {
            ?>
        $('.tab-content input').attr('disabled', 'disabled');
        $('.tab-content select').attr('disabled', 'disabled');
        $('.tab-content textarea').attr('disabled', 'disabled');
        $('.tab-content button').hide();
        $('.tab-content a').hide();
        $('.nav a').show();
        $('.cont').html('Next <i class="m-icon-swapright m-icon-white"></i>');
        $('.cont').parent().find('.red').remove();
        $('.cont').each(function () {
            $(this).attr('id', 'nextview');
            $(this).addClass('nextview');
        })
        $('.cont').removeClass('cont');
        $('.uploaded a').show();

        <?php
    }

    ?>


        

        $(document.body).on('click', '.consents a', function () {
            //alert($(this).attr('href').replace('#',''));
            //$('#'+$(this).attr('href').replace('#','')).show();
            var ba = $('#' + $(this).attr('href').replace('#', '') + ' .moremore').offset();
            // alert(ba.top);
            //alert(ba.top);
            $('input[type="file"]').each(function () {
                $(this).parent().attr('style', 'display: block; position: absolute; overflow: hidden; margin: 0px; padding: 0px; opacity: 0; direction: ltr; z-index: 2147483583; left: 551.5px; top: ' + ba.top + 'px; width: 77px; height: 34px; visibility: hidden;');
                //  css = css.
            });
        });

        $(document.body).on('click', '.button-next', function () {

            var ba = $('#bottomact').offset();
            //alert(ba.top);
            $('input[type="file"]').each(function () {
                $(this).parent().attr('style', 'display: block; position: absolute; overflow: hidden; margin: 0px; padding: 0px; opacity: 0; direction: ltr; z-index: 2147483583; left: 551.5px; top: ' + ba.top + 'px; width: 77px; height: 34px; visibility: hidden;');
                //  css = css.
            });
        });

        $(document.body).on('click', '.button-previous', function () {
            var ba = $('#bottomact').offset();
            //alert(ba.top);
            $('input[type="file"]').each(function () {
                $(this).parent().attr('style', 'display: block; position: absolute; overflow: hidden; margin: 0px; padding: 0px; opacity: 0; direction: ltr; z-index: 2147483583; left: 551.5px; top: ' + ba.top + 'px; width: 77px; height: 34px; visibility: hidden;');
                //  css = css.
            });
        });
        
        var draft = 0;
        $(document.body).on('click', '.cont', function () {

            if ($(this).attr('id') == 'draft') {
                draft = 1;
            }
            else
                draft = 0;
            if(draft==1)
            {
                $('.blockmsg').html('<h4 class="block">Your Order Has Been Saved As Draft!</h4>'+
    '<p>You can edit your order anytime.</p>')
            }
            else
            {
                $('.blockmsg').html('<h4 class="block">Your Order Has Been Submitted!</h4>'+
    '<p>You will be notified once it\'s processed.</p>')
            }

            var type = $(".tabber.active").prev('.tabber').find("input[name='document_type']").val();
            if (type == 'add_driver') {
                saveDriver('<?php echo $cid;?>');
            }
            else {
                var confirmation = $(".tabber.active").prev('.tabber').find("#confirmation").val();
                var data = {
                    uploaded_for: $('#uploaded_for').val(),
                    type: type,
                    division: $('#division').val(),
                    conf_recruiter_name: $('#conf_recruiter_name').val(),
                    conf_driver_name: $('#conf_driver_name').val(),
                    conf_date: $('#conf_date').val(),
                    recruiter_signature: $('#recruiter_signature').val()
                };

                $.ajax({
                    data: data,
                    type: 'post',
                    beforeSend: saveSignature,
                    url: '<?php echo $this->request->webroot;?>orders/savedoc/<?php echo $cid;?>/' + $('#did').val() + '?draft=' + draft+'&order_type=<?php if(isset($_GET['order_type']))echo $_GET['order_type'];?>&forms=<?php if(isset($_GET['forms']))echo $_GET['forms'];?>',
                    success: function (res) {

                        $('#did').val(res);
                        $.ajax({
                            url: '<?php echo $this->request->webroot;?>orders/savedoc/<?php echo $cid;?>/' + $('#did').val() + '?draft=' + draft+'&order_type=<?php if(isset($_GET['order_type']))echo $_GET['order_type'];?>&forms=<?php if(isset($_GET['forms']))echo $_GET['forms'];?>',
                            type: 'post',
                            data: {
                                uploaded_for: $('#uploaded_for').val(),
                                type: type,
                                division: $('#division').val(),
                                conf_recruiter_name: $('#conf_recruiter_name').val(),
                                conf_driver_name: $('#conf_driver_name').val(),
                                conf_date: $('#conf_date').val(),
                                recruiter_signature: $('#recruiter_signature').val()
                            }
                        });
                        // saving data
                        doc_id = res;
                        if (type == "Pre-Screening") {
                            var forms = $(".tabber.active").prev('.tabber').find(':input'),
                                url = '<?php echo $this->request->webroot;?>documents/savePrescreening',
                                order_id = $('#did').val(),
                                cid = '<?php echo $cid;?>';

                            savePrescreen(url, order_id, cid, forms);


                        } else if (type == "Driver Application") {
                            if ($('#confirm_check').is(':checked')) {
                                var order_id = $('#did').val(),
                                    cid = '<?php echo $cid;?>',
                                    url = '<?php echo $this->request->webroot;?>documents/savedDriverApp/' + order_id + '/' + cid;
                                savedDriverApp(url, order_id, cid);
                            }


                        } else if (type == "Road test") {
                            var order_id = $('#did').val(),
                                cid = '<?php echo $cid;?>',
                                url = '<?php echo $this->request->webroot;?>documents/savedDriverEvaluation/' + order_id + '/' + cid;
                            savedDriverEvaluation(url, order_id, cid);
                        } else if (type == "Consent Form") {
                            
                            //alert(type);
                            var order_id = $('#did').val(),
                                cid = '<?php echo $cid;?>',
                                url = '<?php echo $this->request->webroot;?>documents/savedMeeOrder/' + order_id + '/' + cid;
                            savedMeeOrder(url, order_id, cid);
                        }
                        else if (type == "Employment Verification") {
                            
                            //alert(type);
                            var order_id = $('#did').val(),
                                cid = '<?php echo $cid;?>',
                                url = '<?php echo $this->request->webroot;?>documents/saveEmployment/' + order_id + '/' + cid;
                            saveEmployment(url, order_id, cid);
                        }
                        else if (type == "Education Verification") {
                            
                            //alert(type);
                            var order_id = $('#did').val(),
                                cid = '<?php echo $cid;?>',
                                url = '<?php echo $this->request->webroot;?>documents/saveEducation/' + order_id + '/' + cid;
                            saveEducation(url, order_id, cid);
                        }
                        else if (type == "Feedbacks") {
                        var order_id = $('#did').val(),
                            cid = '<?php echo $cid;?>',
                            url = '<?php echo $this->request->webroot;?>feedbacks/add/' + order_id + '/' + cid;
                        var param = $('#form_tab6').serialize();
                        $.ajax({
                            url: url,
                            data: param,
                            type: 'POST'
                        });

                    }
                    else if (type == "Survey") {
                        var order_id = $('#did').val(),
                            cid = '<?php echo $cid;?>',
                            url = '<?php echo $this->request->webroot;?>feedbacks/addsurvey/' + order_id + '/' + cid;
                        var param = $('#form_tab5').serialize();
                        $.ajax({
                            url: url,
                            data: param,
                            type: 'POST'
                        });

                    }
                    else if (type == "Attachment") {
                        
                        var order_id = $('#did').val(),
                            cid = '<?php echo $cid;?>',
                            url = '<?php echo $this->request->webroot;?>documents/addattachment/' + cid + '/' + order_id+ '?draft=' + draft;
                        var param = $('#form_tab7').serialize();
                        $.ajax({
                            url: url,
                            data: param,
                            type: 'POST'
                        });


                    }
                    else if (type == "Audits") {
                         var order_id = $('#did').val(),
                            cid = '<?php echo $cid;?>',
                            url = '<?php echo $this->request->webroot;?>documents/audits/' + cid + '/' + order_id+ '?draft=' + draft;
                        var param = $('#form_tab8').serialize();
                        $.ajax({
                            url: url,
                            data: param,
                            type: 'POST'
                        });

                    }


                    }
                });
            }
        });




        $('#submit_ord').live('click', function () {

            $.ajax({
                url: '<?php echo $this->request->webroot;?>orders/webservice/<?php echo $_GET['order_type'];?>/<?php if(isset($_GET['forms'])){ echo $_GET['forms'];}else{echo 0;} ?>/' + $('#did').val() + '/' + $('#uploaded_for').val(),
                success:function(){
             //       window.location = '<?php echo $this->request->webroot;?>profiles/view/'+$('#uploaded_for').val()+'?getprofilescore=1&success';
                },
                error:function(){
             //       window.location = '<?php echo $this->request->webroot;?>profiles/view/'+$('#uploaded_for').val()+'?getprofilescore=1&success';
                }
            })
        });
        
        $('#submit_dra').live('click', function () {
            //alert($(this).text());
            
            
                $('.blockmsg').html('<h4 class="block">Your Order Has Been Saved As Draft!</h4>'+
    '<p>You can edit your order anytime.</p>')
            
            var type = $(".tab-pane.active").prev('.tab-pane').find("input[name='document_type']").val();
            var tabid = $(".tab-pane.active").prev('.tab-pane').find("#confirmation").val();
            if (tabid == '1') {
                var confirmation = $(".tab-pane.active").prev('.tab-pane').find("#confirmation").val();
                var data = {
                    uploaded_for: $('#uploaded_for').val(),
                    type: type,
                    division: $('#division').val(),
                    conf_recruiter_name: $('#conf_recruiter_name').val(),
                    conf_driver_name: $('#conf_driver_name').val(),
                    conf_date: $('#conf_date').val(),
                    recruiter_signature: $('#recruiter_signature').val()
                };
                $.ajax({
                    //data:'uploaded_for='+$('#uploaded_for').val(),
                    data: data,
                    type: 'post',
                    beforeSend: saveSignature,
                    url: '<?php echo $this->request->webroot;?>orders/savedoc/<?php echo $cid;?>/' + $('#did').val() + '?draft=1&order_type=<?php if(isset($_GET['order_type']))echo $_GET['order_type'];?>&forms=<?php if(isset($_GET['forms']))echo $_GET['forms'];?>',
                    success: function (res) {
                        $('#did').val(res);
                        var draftmode = '<h4 class="block">Your order has been saved as draft.</h4><p> You can edit the order by visiting the orders section inside draft. </p>'
                        $('#tab6 .note').html(draftmode);
                        $.ajax({
                            url: '<?php echo $this->request->webroot;?>orders/savedoc/<?php echo $cid;?>/' + $('#did').val() + '?draft=1&order_type=<?php if(isset($_GET['order_type']))echo $_GET['order_type'];?>&forms=<?php if(isset($_GET['forms']))echo $_GET['forms'];?>',
                            type: 'post',
                            data: {
                                uploaded_for: $('#uploaded_for').val(),
                                type: type,
                                division: $('#division').val(),
                                conf_recruiter_name: $('#conf_recruiter_name').val(),
                                conf_driver_name: $('#conf_driver_name').val(),
                                conf_date: $('#conf_date').val(),
                                recruiter_signature: $('#recruiter_signature').val()
                            },
                            success:function(){
                                window.location = base_url+'orders/orderslist?draft&flash';
                            },
                            error:function(){
                                window.location = base_url+'orders/orderslist?draft&flash';
                            }
                        });
                    }
                });
            }

            
        });

    });
    function saveSignature() {
        if ($(".tabber.active").prev('.tabber').find("input[name='document_type']").val() == 'Consent Form') {
            save_signature('3');
            save_signature('4');
            save_signature('5');
            save_signature('6');
            save_signature('6');
        }
        /*if($(".tab-pane.active").prev('.tab-pane').find("input[name='document_type']").val()=='Driver Application')
         {    if(!$('#confirm_check').is(':checked'))
         {
         alert('Please Confirm that you have read the conditoins');
         $('#confirm_check').focus();

         }
         }*/
    }

    function save_signature(numb) {
        //alert('rest');return;
        //alert(numb);
        $("#test" + numb).data("jqScribble").save(function (imageData) {
            if ((numb == '1' && $('#recruiter_signature').parent().find('.touched').val() == 1) || (numb == '3' && $('#criminal_signature_applicant').parent().find('.touched').val() == 1) || (numb == '4' && $('#signature_company_witness').parent().find('.touched').val() == 1) || (numb == '5' && $('#signature_company_witness2').parent().find('.touched').val() == 1) || (numb == '6' && $('#signature_company_witness2').parent().find('.touched').val() == 1)) {
                $.post('<?php echo $this->request->webroot; ?>canvas/image_save.php', {imagedata: imageData}, function (response) {
                    if (numb == '1') {

                        $('#recruiter_signature').val(response);
                    }
                    if (numb == '3') {
                        $('#criminal_signature_applicant').val(response);
                    }
                    if (numb == '4') {
                        $('#signature_company_witness').val(response);
                    }
                    if (numb == '5') {
                        $('#criminal_signature_applicant2').val(response);
                    }
                    if (numb == '6') {
                        $('#signature_company_witness2').val(response);
                    }
                });
            }
        });
    }
    function saveDriver(cid) {
        var fields = $('#createDriver').serialize();
        fields = fields + '&profile_type=' + $('.member_type').val();
        

        var param = {
            cid: cid,
            inputs: fields
        };
        $.ajax({
            url: '<?php echo $this->request->webroot;?>profiles/saveDriver/',
            data: param,
            type: 'POST',
            success: function (res) {
                if (res != 'exist') {
                    $('#uploaded_for').val(res);
                    $('.driver_id').val(res);
                    showforms('company_pre_screen_question.php');
                    showforms('driver_application.php');
                    showforms('driver_evaluation_form.php');
                    showforms('document_tab_3.php');
                }
                else {
                    alert('Email Already Exist.');
                    $('#driverEm').focus();
                    $('#driverEm').attr('style', 'border-color:red');
                    $('.button-previous').click();
                    $('html,body').animate({
                            scrollTop: $('.active').offset().top
                        },
                        'slow');
                }
            }
        });
    }
    function savePrescreen(url, order_id, cid) {
        var fields = $('#form_tab1').serialize();
        $(':disabled[name]', '#form_tab1').each(function () {
            fields = fields + '&' + $(this).attr('name') + '=' + $(this).val();
        });
        var param = {
            order_id: order_id,
            cid: cid,

            inputs: fields
        };
        $.ajax({
            url: url,
            data: param,
            type: 'POST',
            success: function (res) {

            }
        });
    }

    function savedDriverApp(url, order_id, cid) {
        var fields = $('#form_tab2').serialize();
        $(':disabled[name]', '#form_tab2').each(function () {
            fields = fields + '&' + $(this).attr('name') + '=' + $(this).val();
        });
        var param = fields
        $.ajax({
            url: url,
            data: param,
            type: 'POST',
            success: function (res) {

            }
        });
    }
    function savedDriverEvaluation(url, order_id, cid) {
        var fields = $('#form_tab3').serialize();
        $(':disabled[name]', '#form_tab3').each(function () {
            fields = fields + '&' + $(this).attr('name') + '=' + $(this).val();
        });
        var param = fields

        $.ajax({
            url: url,
            data: param,
            type: 'POST',
            success: function (res) {

            }
        });
    }

    function savedMeeOrder(url, order_id, cid) {
        $('#loading5').show();
        var fields = $('#form_consent').serialize();
        $(':disabled[name]', '#form_consent').each(function () {
            fields = fields + '&' + $(this).attr('name') + '=' + $(this).val();
        });
        var param = fields
        $.ajax({
            url: url,
            data: param,
            type: 'POST',
            success: function (res) {
                $.ajax({
                    url: '<?php echo $this->request->webroot;?>orders/createPdf/' + $('#did').val(),
                    success:function()
                    {
                        $('#loading5').hide();
                    }
                });


                //employment
                /*var url = '<?php echo $this->request->webroot;?>documents/saveEmployment/' + order_id + '/' + cid;
                var fields = $('#form_employment').serialize();
                $(':disabled[name]', '#form_employment').each(function () {
                    fields = fields + '&' + $(this).attr('name') + '=' + $(this).val();
                });
                var employment = fields
                saveEmployment(url, employment);

                //education
                url = '<?php echo $this->request->webroot;?>documents/saveEducation/' + order_id + '/' + cid;
                var fields = $('#form_education').serialize();
                $(':disabled[name]', '#form_education').each(function () {
                    fields = fields + '&' + $(this).attr('name') + '=' + $(this).val();
                });
                var education = fields
                saveEducation(url, education);*/
            }
        });
    }

    function saveEmployment(url, order_id, cid) {
        $('#loading5').show();
        var fields = $('#form_employment').serialize();
                $(':disabled[name]', '#form_employment').each(function () {
                    fields = fields + '&' + $(this).attr('name') + '=' + $(this).val();
                });
                var param = fields
        $.ajax({
            url: url,
            data: param,
            type: 'POST',
            success: function (rea) {

                $.ajax({
                    url: '<?php echo $this->request->webroot;?>orders/createPdfEmployment/' + $('#did').val(),
                    success: function () {
                        $('#loading5').hide();
                    }
                });
            }
        });
    }

    function saveEducation(url, order_id, cid) {
        $('#loading5').show();
        var fields = $('#form_education').serialize();
                $(':disabled[name]', '#form_education').each(function () {
                    fields = fields + '&' + $(this).attr('name') + '=' + $(this).val();
                });
                var param = fields
        $.ajax({
            url: url,
            data: param,
            type: 'POST',
            success: function (res) {
                $.ajax({
                    url: '<?php echo $this->request->webroot;?>orders/createPdfEducation/' + $('#did').val(),
                    success: function () {
                        $('#loading5').hide();
                    }
                });
            }
        });
    }


</script>

<style>
    @media print {
        .page-header {
            display: none;
        }

        .page-footer, .nav-tabs, .page-title, .page-bar, .theme-panel, .page-sidebar-wrapper, .form-actions, .steps, .caption {
            display: none !important;
        }

        .portlet-body, .portlet-title {
            border-top: 1px solid #578EBE;
        }

        .tabbable-line {
            border: none !important;
        }

    }
</style>

<script type="text/javascript">


    function fileUpload(ID) {
        // e.preventDefault();

        var $type = $(".tabber.active").find("input[name='document_type']").val(),
            param = {
                type: 'order',
                doc_type: $type,
                order_id: $('#did').val(),
                cid: '<?php echo $cid;?>'
            };
        if ($type == "Consent Form") {
            //get sub content tab active
            var subContent = $(".tab-pane.active #form_tab4").find('.tab-content .tab-pane.active form').attr('id');
            // debugger;
            if (subContent == "form_consent") {
                param.subtype = 'Consent Form';
            } else if (subContent == "form_employment") {
                param.subtype = 'Employment';
            } else if (subContent == "form_education") {
                param.subtype = 'Education';
            }
        }
        var upload = new AjaxUpload("#" + ID, {
            action: "<?php echo $this->request->webroot;?>documents/fileUpload",
            enctype: 'multipart/form-data',
            data: param,
            name: 'myfile',
            onSubmit: function (file, ext) {
                /*if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
                 // extension is not allowed
                 mestatus.text('Only JPG, PNG or GIF files are allowed');
                 return false;
                 }
                 $("#picture_button").text("Uploading");
                 this.disable();*/
            },
            onComplete: function (file, response) {
                if (response != 'error') {
                    $('#' + ID).parent().find('.uploaded').text(response);
                    $('.' + ID).val(response);
                }
                else {
                    alert('Invalid file type.');
                }

                /* $("#picture").text("Select");
                 this.enable();*/
            }

        });
        /* image upload ends */
    }


</script>
