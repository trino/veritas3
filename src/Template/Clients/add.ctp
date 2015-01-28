<?php
    if (isset($disabled))
        $is_disabled = 'disabled="disabled"';
    else
        $is_disabled = '';

    if (isset($client))
        $c = $client;
?>
<?php $settings = $this->requestAction('settings/get_settings'); ?>
<?php $sidebar = $this->requestAction("settings/all_settings/".$this->request->session()->read('Profile.id')."/sidebar"); 
        
?>

<h3 class="page-title">
    Create <?php echo ucfirst($settings->client); ?>
</h3>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?php echo $this->request->webroot; ?>">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="">Create <?php echo ucfirst($settings->client); ?></a>
        </li>
    </ul>
    <?php
        if (isset($disabled)) { ?>
            <a href="javascript:window.print();" class="floatright btn btn-info">Print</a>
        <?php } ?>
</div>

<div class="row ">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM PORTLET-->

                    <div class="row profile-account">
                        <div class="col-md-3">
                            <?php
                                if (isset($c->image) && $c->image) {
                                    ?>
                                    <img class="img-responsive" id="clientpic" alt=""
                                         src="<?php echo $this->request->webroot; ?>img/jobs/<?php echo $c->image; ?>"/>
                                <?php
                                } else {
                                    ?>
                                    <img class="img-responsive" id="clientpic" alt=""
                                         src="<?php echo $this->request->webroot; ?>img/logos/MEELogo.png"/>
                                <?php
                                }
                            ?>

                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail22">Add/Edit Image</label>

                                <div class="input-icon">
                                    <a class="btn btn-xs btn-success" href="javascript:void(0)" id="clientimg">
                                        <i class="fa fa-image"></i>
                                        Add/Edit Image
                                    </a>

                                </div>
                            </div>

                            <?php
                                if ($this->request->params['action'] == 'edit')
                                    include('subpages/clients/recruiter_contact_table.php');
                            ?>

                        </div>
                        <div class="col-md-9">
                        <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold" style="font-size:15px ;"><?php echo ucfirst($settings->client); ?> Manager</span>
                        </div>
                        <hr />
                        <div class="clearfix"></div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab">Info</a>
                                </li>
                                <?php if ($this->request['action'] != "add") {
                                    ?>

                                    <li>
                                        <a href="#tab_1_2" data-toggle="tab">Display</a>
                                    </li>
                                <?php

                                } ?>

                            </ul>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1_1">
                                        <div id="tab_1-1" class="tab-pane active">
                                            <form role="form" action="" method="post">

                                                <div class="row">
                                                    <input type="hidden" name="image" id="client_img"/>
                                                    <?php if($sidebar->client_option==0){?>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">Customer Type</label>
                                                        <select class="form-control" name="customer_type"
                                                                id="customer_type">
                                                            <option value="">Select</option>
                                                            <option value="1"
                                                                    <?php if (isset($c->customer_type) && $c->customer_type == 1) { ?>selected="selected"<?php } ?>>
                                                                Insurance
                                                            </option>
                                                            <option value="2"
                                                                    <?php if (isset($c->customer_type) && $c->customer_type == 2) { ?>selected="selected"<?php } ?>>
                                                                Fleet
                                                            </option>
                                                            <option value="3"
                                                                    <?php if (isset($c->customer_type) && $c->customer_type == 3) { ?>selected="selected"<?php } ?>>
                                                                Non Fleet
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <?php }?>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">Company Name</label>
                                                        <input type="text" class="form-control"
                                                               name="company_name" <?php if (isset($c->company_name)) { ?> value="<?php echo $c->company_name; ?>" <?php } ?> />
                                                    </div>


                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">Address</label>
                                                        <input type="text" class="form-control"
                                                               name="company_address" <?php if (isset($c->billing_address)) { ?> value="<?php echo $c->billing_address; ?>" <?php } ?>/>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">City</label>
                                                        <input type="text" class="form-control"
                                                               name="city" <?php if (isset($c->city)) { ?> value="<?php echo $c->city; ?>" <?php } ?>/>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">Province</label>
                                                        <?php
                                                            function printoption($option, $selected)
                                                            {
                                                                $tempstr = "";
                                                                if ($option == $selected) {
                                                                    $tempstr = " selected";
                                                                }
                                                                echo '<OPTION' . $tempstr . ">" . $option . "</OPTION>";
                                                            }

                                                            function printoptions($name, $array, $selected)
                                                            {
                                                                echo '<SELECT name="' . $name . '" class="form-control member_type" >';
                                                                for ($temp = 0; $temp < count($array); $temp += 1) {
                                                                    printoption($array[$temp], $selected);
                                                                }
                                                                echo '</SELECT>';
                                                            }

                                                            printoptions("province", array("AB", "BC", "MB", "NB", "NL", "NT", "NS", "NU", "ON", "PE", "QC", "SK", "YT"), $c->province);
                                                        ?>

                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">Postal Code</label>
                                                        <input type="text" class="form-control"
                                                               name="postal" <?php if (isset($c->postal)) { ?> value="<?php echo $c->postal; ?>" <?php } ?>/>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">Company's Phone Number</label>
                                                        <input type="text" class="form-control"
                                                               name="company_phone"
                                                            <?php if (isset($c->company_phone)) { ?> value="<?php echo $c->company_phone; ?>" <?php } ?>
                                                            />
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">Website</label>
                                                        <input type="text" class="form-control"
                                                               name="site" <?php if (isset($c->site)) { ?> value="<?php echo $c->site; ?>" <?php } ?>/>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">Divisions </label>
                                                        <textarea name="division" id="division" placeholder="One division per line"
                                                                  class="form-control"><?php if (isset($c->division)) echo $c->division; ?></textarea>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">Signatory's First Name</label>
                                                        <input type="text" class="form-control"
                                                               name="sig_fname" <?php if (isset($c->sig_fname)) { ?> value="<?php echo $c->sig_fname; ?>" <?php } ?>/>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">Signatory's Last Name</label>
                                                        <input type="text" class="form-control"
                                                               name="sig_lname" <?php if (isset($c->sig_lname)) { ?> value="<?php echo $c->sig_lname; ?>" <?php } ?>/>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">Signatory's Email Address</label>
                                                        <input type="email" id="sig_email" class="form-control"
                                                               name="sig_email" <?php if (isset($c->sig_email)) { ?> value="<?php echo $c->sig_email; ?>" <?php } ?>/>
                                                    </div>




                                                    <?php /*  <div class="form-group col-md-6">
<label class="control-label">Administrator's First Name</label>
<input type="text" class="form-control" name="admin_fname" <?php if(isset($c->admin_fname)){?> value="<?php echo $c->admin_fname; ?>" <?php } ?>/>
</div>
<div class="form-group col-md-6">
<label class="control-label">Administrator's Last Name</label>
<input type="text" class="form-control" name="admin_lname" <?php if(isset($c->admin_lname)){?> value="<?php echo $c->admin_lname; ?>" <?php } ?>/>
</div>
<div class="form-group col-md-6">
<label class="control-label">Administrator's Email Address</label>
<input type="email" id="u_email" class="form-control" name="admin_email" <?php if(isset($c->admin_email)){?> value="<?php echo $c->admin_email; ?>" <?php } ?>/>
</div>
<div class="form-group col-md-6">
<label class="control-label">Administrator's Phone Number</label>
<input type="text" class="form-control" name="admin_phone" <?php if(isset($c->admin_phone)){?> value="<?php echo $c->admin_phone; ?>" <?php } ?>/>
</div>
*/ ?>

                                                    <!--?php include('subpages/adminlisting.php');?-->

                                                    <?php
                                                        if ($c->date_start) {
                                                            foreach ($c->date_start as $k => $d) {
                                                                if ($k == 'date')
                                                                    $start_date = $d;
                                                            }
                                                        } else
                                                            $start_date = '';

                                                        if ($c->date_end) {
                                                            foreach ($c->date_end as $k => $d) {
                                                                if ($k == 'date')
                                                                    $end_date = $d;
                                                            }
                                                        } else
                                                            $end_date = '';
                                                    ?>

                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">Contract Start Date</label>
                                                        <input type="text" class="form-control date-picker"
                                                               name="date_start" <?php if (isset($start_date)) { ?> value="<?php echo $start_date; ?>" <?php } ?>/>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">Contract End Date</label>
                                                        <input type="text" class="form-control date-picker"
                                                               name="date_end" <?php if (isset($end_date)) { ?> value="<?php echo $end_date; ?>" <?php } ?>/>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">Referred By</label>
                                                        <select class="form-control" name="referred_by"
                                                                id="referred_by">
                                                            <option value="">Select</option>
                                                            <option
                                                                value="Transrep" <?php if (isset($c->referred_by) && $c->referred_by == "Transrep") { ?> selected="selected" <?php } ?> >
                                                                Transrep
                                                            </option>
                                                            <option
                                                                value="ISB" <?php if (isset($c->referred_by) && $c->referred_by == "ISB") { ?> selected="selected" <?php } ?> >
                                                                ISB
                                                            </option>
                                                            <option
                                                                value="AFIMAC" <?php if (isset($c->referred_by) && $c->referred_by == "AFIMAC") { ?> selected="selected" <?php } ?>>
                                                                AFIMAC
                                                            </option>
                                                            <option
                                                                value="Broker" <?php if (isset($c->referred_by) && $c->referred_by == "Broker") { ?> selected="selected" <?php } ?>>
                                                                Broker
                                                            </option>
                                                            <option
                                                                value="Online" <?php if (isset($c->referred_by) && $c->referred_by == "Online") { ?> selected="selected" <?php } ?>>
                                                                Online
                                                            </option>
                                                            <option
                                                                value="Tradeshow" <?php if (isset($c->referred_by) && $c->referred_by == "Tradeshow") { ?> selected="selected" <?php } ?>>
                                                                Tradeshow
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <?php if($sidebar->client_option==0){?>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">ARIS Agreement #</label>
                                                        <input type="text" class="form-control"
                                                               name="agreement_number" <?php if (isset($c->agreement_number)) { ?> value="<?php echo $c->agreement_number; ?>" <?php } ?>/>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">ARIS Re-verification</label>
                                                        <input type="text"
                                                               class="form-control form-control-inline date-picker"
                                                               name="reverification" <?php if (isset($end_date)) { ?> value="<?php echo $end_date; ?>" <?php } ?>/>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">SACC Number</label>
                                                        <input type="text" class="form-control"
                                                               name="sacc_number" <?php if (isset($c->sacc_number)) { ?> value="<?php echo $c->sacc_number; ?>" <?php } ?>/>
                                                    </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <h3 class="block">Billing</h3>
                                                            </div>
                                                        </div>


                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">Billing Contact</label>
                                                        <input type="text" class="form-control"
                                                               name="billing_contact" <?php if (isset($c->billing_contact)) { ?> value="<?php echo $c->billing_contact; ?>" <?php } ?>/>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">Billing Address</label>
                                                        <input type="text" class="form-control"
                                                               name="billing_address" <?php if (isset($c->billing_address)) { ?> value="<?php echo $c->billing_address; ?>" <?php } ?>/>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">Billing City</label>
                                                        <input type="text" class="form-control" name="billing_city"
                                                               value="<?php echo isset($c->billing_city) ? $c->billing_city : '' ?>"/>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">Billing Province</label>
                                                        <?php printoptions("billing_province", array("AB", "BC", "MB", "NB", "NL", "NT", "NS", "NU", "ON", "PE", "QC", "SK", "YT"), $c->billing_province); ?>


                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">Billing Postal Code</label>
                                                        <input type="text" class="form-control"
                                                               name="billing_postal_code"
                                                               value="<?php echo isset($c->billing_postal_code) ? $c->billing_postal_code : '' ?>"/>
                                                    </div>


                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">Invoice Terms</label>
                                                        <select class="form-control" name="invoice_terms"
                                                                id="invoice_terms">
                                                            <option value="">Select</option>
                                                            <option
                                                                value="weekly" <?php if (isset($c->invoice_terms) && $c->invoice_terms == 'weekly') { ?> selected="selected" <?php } ?>>
                                                                Weekly
                                                            </option>
                                                            <option
                                                                value="biweekly" <?php if (isset($c->invoice_terms) && $c->invoice_terms == 'biweekly') { ?> selected="selected" <?php } ?>>
                                                                Bi-weekly
                                                            </option>
                                                            <option
                                                                value="monthly" <?php if (isset($c->invoice_terms) && $c->invoice_terms == 'monthly') { ?> selected="selected" <?php } ?>>
                                                                Monthly
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label">Billing Instructions</label>
                                                        <input type="radio"
                                                               name="billing_instructions" <?php if (isset($c->billing_instructions) && $c->billing_instructions == "individual") { ?> checked="checked" <?php } ?>
                                                               value="individual"/> Individual&nbsp;&nbsp;
                                                        <input type="radio"
                                                               name="billing_instructions" <?php if (isset($c->billing_instructions) && $c->billing_instructions == "centralized") { ?> checked="checked" <?php } ?>
                                                               value="centralized"/> Centralized&nbsp;&nbsp;
                                                    </div>
                                                    <div class="form-group col-md-8">
                                                        <label class="control-label">Description</label>
                                                        <textarea id="description" name="description"
                                                                  class="form-control"><?php if (isset($c->description)) {
                                                                echo $c->description;
                                                            } ?></textarea>

                                                    </div>

                                                    <?php }?>

                                                    <div class="form-group col-md-12">
                                                        <label class="control-label">Attach Documents</label>

                                                        <div>
                                                            <!-- <a href="#" class="btn btn-primary">Browse</a> -->
                                                            <?php
                                                                if (isset($client_docs) && count($client_docs) > 0) {
                                                                    $allowed = array('jpg', 'jpeg', 'png', 'bmp', 'gif');
                                                                    foreach ($client_docs as $k => $cd):

                                                                        ?>
                                                                        <div style="margin-bottom:5px;">
                                                                            <?php
                                                                                $e = explode(".", $cd->file);
                                                                                $ext = end($e);
                                                                                if (in_array($ext, $allowed)) {
                                                                                    ?>
                                                                                    <img
                                                                                        src="<?php echo $this->request->webroot; ?>img/jobs/<?php echo $cd->file; ?>"
                                                                                        style="max-width: 200px;"/>

                                                                                <?php
                                                                                } else
                                                                                    echo "<a href='".$this->request->webroot."img/jobs/".$cd->file."' target='_blank'>".$cd->file."</a>";
                                                                            ?>
                                                                            <a href="javascript:void(0);"
                                                                               onclick="$(this).parent().remove()"
                                                                               class="btn btn-danger">Delete</a>
                                                                            <input type="hidden" name="client_doc[]"
                                                                                   value="<?php echo $cd->file;?>"
                                                                                   class="moredocs"/>
                                                                        </div>
                                                                    <?php
                                                                    endforeach;
                                                                } ?>
                                                            <div class="docMore" data-count="1">
                                                                <div style="display:block;">
                                                                    <a href="javascript:void(0)" id="addMore1"
                                                                       class="btn btn-primary margin-bottom-5">Browse</a>
                                                                       <span></span>
                                                                    <input type="hidden" name="client_doc[]" value=""
                                                                           class="addMore1_doc moredocs"/>
                                                                </div>
                                                            </div>

                                                            <a href="javascript:void(0)" class="btn btn-info"
                                                               id="addMoredoc" onclick="addMore(event,this)">Add More
                                                            </a>


                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-12">

                                                    <div class="margin-top-10 alert alert-success display-hide flash1"
                                                         style="display: none;">
                                                        <button class="close" data-close="alert"></button>
                                                        Data saved successfully
                                                    </div>


                                                    <div class="margin-top-10">
                                                        <a href="javascript:void(0)" class="btn btn-primary"
                                                           id="save_client_p1">Save</a>
                                                        <a href="" class="btn default">
                                                            Cancel </a>
                                                    </div>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_1_2">


                                    <h4> Enable <?php echo ucfirst($settings->document); ?>s?</h4>

                                    <form action="" id="displayform1" method="post">
                                        <table class="table table-light table-hover">
                                            <tr>
                                                <th></th>
                                                <th class="">System</th>
                                                <th class=""><?php echo ucfirst($settings->client); ?> </th>
                                            </tr>
                                            <?php
                                                $subdoc = $this->requestAction('/clients/getSub');

                                                foreach ($subdoc as $sub) {
                                                    ?>
                                                    <tr>
                                                        <td>

                                                            <?php echo ucfirst($sub['title']); ?>
                                                        </td>
                                                        <td class="">
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="radio"
                                                                                                  name="<?php echo $sub->id; ?>"
                                                                                                  value="1"
                                                                                                  <?php if ($sub['display'] == 1) { ?>checked="checked" <?php } ?>
                                                                                                  disabled="disabled"/>
                                                                Yes </label>
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="radio"
                                                                                                  name="<?php echo $sub->id; ?>"
                                                                                                  value="0"
                                                                                                  <?php if ($sub['display'] == 0) { ?>checked="checked" <?php } ?>
                                                                                                  disabled="disabled"/>
                                                                No </label>
                                                        </td>
                                                        <?php
                                                            $csubdoc = $this->requestAction('/settings/all_settings/0/0/client/' . $id . '/' . $sub->id);
                                                        ?>
                                                        <td class="">
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="radio"
                                                                                                  name="clientC[<?php echo $sub->id; ?>]"
                                                                                                  value="1"  <?php if ($csubdoc['display'] == 1) { ?> checked="checked" <?php } ?> />
                                                                Yes </label>
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="radio"
                                                                                                  name="clientC[<?php echo $sub->id; ?>]"
                                                                                                  value="0"  <?php if ($csubdoc['display'] == 0) { ?> checked="checked" <?php } ?> />
                                                                No </label>
                                                        </td>

                                                    </tr>
                                                    <!--<tr <?php if ($csubdoc['display'] == 0) { ?>style="display:none;" <?php } ?> >
<td  colspan="2"></td>
<td class="">
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="client[<?php echo $sub->id; ?>]" value="1" <?php if ($csubdoc['display'] == 1) { ?> checked="checked" <?php } ?> />
View Only </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="client[<?php echo $sub->id; ?>]" value="2" <?php if ($csubdoc['display'] == 2) { ?> checked="checked" <?php } ?> />
Upload Only </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio"  name="client[<?php echo $sub->id; ?>]" value="3" <?php if ($csubdoc['display'] == 3) { ?> checked="checked" <?php } ?>/>
Both </label>
</td>
</tr>-->
                                                <?php
                                                }
                                            ?>

                                            <!--
<tr>
<td>
Strike
</td>
<td class="center">
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="optionsRadios4" value="option1"/>
Yes </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="optionsRadios4" value="option2" checked/>
No </label>
</td>
<td class="center">
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="usroptions3" value="option1" onclick="$(this).closest('tr').next('tr').show();"  />
Yes </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="usroptions3" value="option2" onclick="$(this).closest('tr').next('tr').hide();" checked />
No </label>
</td>

</tr>
<tr style="display:none;">
<td></td>
<td colspan="2">
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="Usr3" value="option1"/>
View Only </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="Usr3" value="option2" />
Upload Only </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="Usr3" value="option3" checked/>
Both </label>
</td>
</tr>
<tr>
<td>
Orders
</td>
<td class="center">
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="optionsRadios5" value="option1"/>
Yes </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="optionsRadios5" value="option2" checked/>
No </label>
</td>
<td class="center">
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="usroptions4" value="option1" onclick="$(this).closest('tr').next('tr').show();"  />
Yes </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="usroptions4" value="option2" onclick="$(this).closest('tr').next('tr').hide();" checked />
No </label>
</td>

</tr>
<tr style="display:none;">
<td></td>
<td colspan="2" class="center">
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="Usr4" value="option1"/>
View Only </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="Usr4" value="option2" />
Upload Only </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="Usr4" value="option3" checked/>
Both </label>
</td>
</tr>
<tr>
<td>
Other Document Type
</td>
<td class="center">
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="optionsRadios6" value="option1"/>
Yes </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="optionsRadios6" value="option2" checked/>
No </label>
</td>
<td class="center">
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="usroptions5" value="option1" onclick="$(this).closest('tr').next('tr').show();"  />
Yes </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="usroptions5" value="option2" onclick="$(this).closest('tr').next('tr').hide();" checked />
No </label>
</td>

</tr>
<tr style="display:none;">
<td></td>
<td colspan="2" class="center">
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="Usr5" value="option1"/>
View Only </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="Usr5" value="option2" />
Upload Only </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="Usr5" value="option3" checked/>
Both </label>
</td>
</tr>
<tr>
<td>
Other <?php echo ucfirst($settings->document); ?> Type
</td>
<td class="center">
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="optionsRadios7" value="option1"/>
Yes </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="optionsRadios7" value="option2" checked/>
No </label>
</td>
<td class="center">
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="usroptions6" value="option1" onclick="$(this).closest('tr').next('tr').show();"  />
Yes </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="usroptions6" value="option2" onclick="$(this).closest('tr').next('tr').hide();" checked />
No </label>
</td>

</tr>
<tr style="display:none;">
<td></td>
<td colspan="2" class="center">
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="Usr6" value="option1"/>
View Only </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="Usr6" value="option2" />
Upload Only </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="Usr6" value="option3" checked/>
Both </label>
</td>
</tr>
<tr>
<td>
Other <?php echo ucfirst($settings->document); ?> Type
</td>
<td class="center">
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="optionsRadios8" value="option1"/>
Yes </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="optionsRadios8" value="option2" checked/>
No </label>
</td>
<td class="center">
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="usroptions7" value="option1" onclick="$(this).closest('tr').next('tr').show();"  />
Yes </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="usroptions7" value="option2" onclick="$(this).closest('tr').next('tr').hide();" checked />
No </label>
</td>

</tr>
<tr style="display:none;">
<td></td>
<td colspan="2" class="center">
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="Usr7" value="option1"/>
View Only </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="Usr7" value="option2" />
Upload Only </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="Usr7" value="option3" checked/>
Both </label>
</td>
</tr>
<tr>
<td>
Other <?php echo ucfirst($settings->document); ?> Type
</td>
<td class="center">
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="optionsRadios9" value="option1"/>
Yes </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="optionsRadios9" value="option2" checked/>
No </label>
</td>
<td class="center">
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="usroptions8" value="option1" onclick="$(this).closest('tr').next('tr').show();"  />
Yes </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="usroptions8" value="option2" onclick="$(this).closest('tr').next('tr').hide();" checked />
No </label>
</td>

</tr>
<tr style="display:none;">
<td></td>
<td colspan="2" class="center">
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="Usr8" value="option1"/>
View Only </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="Usr8" value="option2" />
Upload Only </label>
<label class="uniform-inline">
<input <?php echo $is_disabled ?> type="radio" name="Usr8" value="option3" checked/>
Both </label>
</td>
</tr>-->
                                        </table>

                                        <!--end profile-settings-->

                                        <?php
                                            if (!isset($disabled)) {
                                                ?>

                                                <div class="margin-top-10 alert alert-success display-hide flash"
                                                     style="display: none;">
                                                    <button class="close" data-close="alert"></button>
                                                    Data saved successfully
                                                </div>
                                                <div class="margin-top-10">
                                                    <a href="javascript:void(0)" id="save_display1"
                                                       class="btn btn-primary"> Save Changes </a>


                                                </div>
                                            <?php
                                            }
                                        ?>

                                    </form>
                                </div>

                    <!-- END SAMPLE FORM PORTLET-->

                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    $(function () {
        $('input [type="email"]').keyup(function(){
            $(this).removeAttr('style');
        });
        initiate_ajax_upload('clientimg', 'asdas');
        initiate_ajax_upload('addMore1', 'doc');
        <?php
        if(isset($id))
        {
        ?>

        $('#save_display1').click(function () {
            $('#save_display1').text('Saving..');
            var str = $('#displayform1 input').serialize();
            $.ajax({
                url: '<?php echo $this->request->webroot;?>clients/displaySubdocs/<?php echo $id;?>',
                data: str,
                type: 'post',
                success: function (res) {
                    $('.flash').show();
                    $('#save_display1').text(' Save Changes ');
                }
            })
        });
        <?php
        }
        ?>
        $('#save_client_p1').click(function () {

            $('#save_client_p1').text('Saving..');
            var str = '';
            $('.recruiters input').each(function () {
                if ($(this).is(':checked')) {
                    if (str == '')
                        str = 'profile_id[]=' + $(this).val();
                    else
                        str = str + '&profile_id[]=' + $(this).val();
                }
            });
            $('.contacts input').each(function () {
                if ($(this).is(':checked')) {
                    if (str == '')
                        str = 'contact_id[]=' + $(this).val();
                    else
                        str = str + '&contact_id[]=' + $(this).val();
                }
            });
            $('.moredocs').each(function () {
                if ($(this).val() != "") {
                    if (str == '')
                        str = 'client_doc[]=' + $(this).val();
                    else
                        str = str + '&client_doc[]=' + $(this).val();
                }

            });
            if (str == '') {
                str = $('#tab_1_1 input').serialize();
            }
            else {
                str = str + '&' + $('#tab_1_1 input').serialize();
            }
            if (str == '') {
                str = $('#tab_1_1 select').serialize();
            }
            else {
                str = str + '&' + $('#tab_1_1 select').serialize();
            }
            str = str + '&customer_type=' + $('#customer_type').val();
            str = str + '&division=' + $('#division').val();
            str = str + '&referred_by=' + $('#referred_by').val();
            str = str + '&invoice_terms=' + $('#invoice_terms').val();
            str = str + '&description=' + $('#description').val();


            $.ajax({
                url: '<?php echo $this->request->webroot;?>clients/saveClients/<?php echo $id?>',
                data: str,
                type: 'post',
                success: function (res) {

                    if (res != 'e' && res != 'email' && res!='Invalid Email') {
                        window.location = '<?php echo $this->request->webroot;?>clients/edit/' + res;
                    }
                    else if (res == 'email') {
                        alert('Email Already Used.');
                    }
                    else
                    if(res == 'Invalid Email')
                    {
                        $('#tab_1_1 input[type="email"]').focus();
                        $('#tab_1_1 input[type="email"]').attr('style','border-color:red');
                        $('html,body').animate({
                                scrollTop: $('#tab_1_1').offset().top},
                            'slow');
                    }

                    else {
                        alert('Couldn\'t save your data');
                    }
                    $('#save_client_p1').text(' Save ');
                }
            })
        });
    });


    var removeLink = 0;// this variable is for showing and removing links in a add document
    function addMore(e, obj) {
        e.preventDefault();

        var total_count = $('.docMore').data('count');
        $('.docMore').data('count', parseInt(total_count) + 1);
        total_count = $('.docMore').data('count');
        var input_field = '<div style="display:block;margin:5px;"><a href="javascript;void(0);" id="addMore' + total_count + '" class="btn btn-primary">Browse</a><span></span><input type="hidden" name="client_doc[]" value="" class="addMore' + total_count + '_doc moredocs" /></div>';
        $('.docMore').append(input_field);
        if (parseInt(total_count) > 1 && removeLink == 0) {
            removeLink = 1;
            $('#addMoredoc').after('<a href="#" id="removeMore" class="btn btn-danger" onclick="removeMore(event,this)">Remove last</a>');
            initiate_ajax_upload('addMore' + total_count, 'doc');
        }
    }

    function removeMore(e, obj) {
        e.preventDefault();
        var total_count = $('.docMore').data('count');
//$('.docMore input[type="file"]:last').remove();
        $('.docMore div:last-child').remove();
        $('.docMore').data('count', parseInt(total_count) - 1);
        total_count = $('.docMore').data('count');
        if (parseInt(total_count) == 1) {
            $('#removeMore').remove();
            removeLink = 0;
        }
    }
</script>


<script>

    function initiate_ajax_upload(button_id, doc) {
        var button = $('#' + button_id), interval;
        if(doc =='doc')
            var act = "<?php echo $this->request->webroot;?>clients/upload_all/<?php if(isset($id))echo $id;?>";
        else
            var act = "<?php echo $this->request->webroot;?>clients/upload_img/<?php if(isset($id))echo $id;?>";
        new AjaxUpload(button, {
            action: act,
            name: 'myfile',
            onSubmit: function (file, ext) {
                button.text('Uploading');
                this.disable();
                interval = window.setInterval(function () {
                    var text = button.text();
                    if (text.length < 13) {
                        button.text(text + '.');
                    } else {
                        button.text('Uploading');
                    }
                }, 200);
            },
            onComplete: function (file, response) {
                if (doc == "doc")
                    button.html('Browse');
                else
                    button.html('<i class="fa fa-image"></i> Add/Edit Image');

                window.clearInterval(interval);
                this.enable();
                if (doc == "doc") {
                    $('#' + button_id).parent().find('span').text(" " + response);
                    $('.' + button_id + "_doc").val(response);
                }
                else {
                    $("#clientpic").attr("src", '<?php echo $this->request->webroot;?>img/jobs/' + response);
                    $('#client_img').val(response);
                }
//$('.flashimg').show();
            }
        });
    }
</script>


