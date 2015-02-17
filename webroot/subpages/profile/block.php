<?php 

    $uid = ($this->request['action']=='add')? "0" : $this->request['pass'][0];
    $sidebar = $this->requestAction("settings/all_settings/".$uid."/sidebar"); ?>
    <?php $block = $this->requestAction("settings/all_settings/".$uid."/blocks"); ?>

<!-- BEGIN BORDERED TABLE PORTLET--><!--
<div class="portlet box yellow">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-briefcase"></i>Permissions
        </div>
-->
        <ul class="nav nav-tabs nav-justified">
            <li class="active">
                <a href="#subtab_2_1" data-toggle="tab">Sidebar</a>
            </li>
            <li class="">
                <a href="#subtab_2_2" data-toggle="tab"><?php echo ucfirst($settings->document); ?></a>
            </li>
            <li class="">
                <a href="#subtab_2_3" data-toggle="tab">Top blocks</a>
            </li>
            <li class="">
                <a href="#subtab_2_4" data-toggle="tab">Assign to <?php echo ucfirst($settings->client) ?></a>
            </li>
            <!--<li class="">
                <a href="#subtab_2_4" data-toggle="tab">Client Settings</a>
            </li>-->
        </UL>
    <!--</div>-->
    <div class="portlet-body">
                                    <div class="tab-content">
                                                <div class="tab-pane active" id="subtab_2_1">
                                                    <div class="">
                                					   <!--h1>Modules</h1-->
                                                                                                               
                                					   <form action="#" method="post" id="blockform">
                                                            <input type="hidden" name="form" value="<?php echo $uid;?>" />
                                                            <input type="hidden" name="side[user_id]" value="<?php echo $uid;?>" />




                                                                       <table class="table table-bordered table-hover">
                                            <tr>
                                                <td class="vtop">
                                                    <?php echo ucfirst($settings->profile); ?>
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[profile]"
                                                                                          value="1" onclick="$(this).closest('td').find('.yesno span').each(function(){$(this).addClass('checked')});$(this).closest('td').find('.yesno input').each(function(){ this.checked = true;})" <?php if (isset($sidebar) && $sidebar->profile == 1) echo "checked"; ?> />
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[profile]"
                                                                                          value="0" onclick=" $(this).closest('td').find('.yesno span').each(function(){$(this).removeClass('checked')});$(this).closest('td').find('.yesno input').each(function(){ this.checked = false;})" <?php if (isset($sidebar) && $sidebar->profile == 0) echo "checked"; ?>/>
                                                        No </label>
                                                        <div class="clearfix"></div>
                                                        <div class="col-md-12 nopad martop yesno" >
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox"
                                                                                          name="side[profile_list]"
                                                                                          value="1" <?php if (isset($sidebar) && $sidebar->profile_list == 1) echo "checked"; ?> /> List
                                                            </label>
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox"
                                                                                          name="side[profile_create]"
                                                                                          value="1" <?php if (isset($sidebar) && $sidebar->profile_create == 1) echo "checked"; ?> /> Create
                                                            </label>
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox"
                                                                                          name="side[profile_edit]"
                                                                                          value="1" <?php if ($sidebar->profile_edit == 1) echo "checked"; ?> /> Edit
                                                            </label>
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox"
                                                                                          name="side[profile_delete]"
                                                                                          value="1" <?php if ($sidebar->profile_delete == 1) echo "checked"; ?> /> Delete
                                                            </label>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="vtop">
                                                    <?php echo ucfirst($settings->client); ?>
                                                </td>
                                                <td>
                                                
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[client]"
                                                                                          onclick="$(this).closest('td').find('.yesno span').each(function(){$(this).addClass('checked')});$(this).closest('td').find('.yesno input').each(function(){ this.checked = true;})"
                                                                                          value="1" <?php if (isset($sidebar) && $sidebar->client == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[client]"
                                                                                          onclick="$(this).closest('td').find('.yesno span').each(function(){$(this).removeClass('checked')});$(this).closest('td').find('.yesno input').each(function(){ this.checked = false;})"
                                                                                          value="0" <?php if (isset($sidebar) && $sidebar->client == 0) echo "checked"; ?>/>
                                                        No </label>
                                                        <div class="clearfix"></div>
                                                        <div class="col-md-12 nopad martop yesno" >
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox"
                                                                                          name="side[client_list]"
                                                                                          value="1" <?php if (isset($sidebar) && $sidebar->client_list == 1) echo "checked"; ?> /> List
                                                            </label>
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox"
                                                                                          name="side[client_create]"
                                                                                          value="1" <?php if (isset($sidebar) && $sidebar->client_create == 1) echo "checked"; ?> /> Create
                                                            </label>
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox"
                                                                                          name="side[client_edit]"
                                                                                          value="1" <?php if ($sidebar->client_edit == 1) echo "checked"; ?> /> Edit
                                                            </label>
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox"
                                                                                          name="side[client_delete]"
                                                                                          value="1" <?php if ($sidebar->client_delete == 1) echo "checked"; ?> /> Delete
                                                            </label>
                                                           
                                                        </div>
                                                        <div class="clearfix"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="vtop">
                                                    <?php echo ucfirst($settings->document); ?>
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[document]"
                                                                                          onclick="$(this).closest('td').find('.yesno span').each(function(){$(this).addClass('checked')});$(this).closest('td').find('.yesno input').each(function(){ this.checked = true;});"
                                                                                          value="1" <?php if (isset($sidebar) && $sidebar->document == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[document]"
                                                                                          onclick="$(this).closest('td').find('.yesno span').each(function(){$(this).removeClass('checked')});$(this).closest('td').find('.yesno input').each(function(){ this.checked = false;})"
                                                                                          value="0" <?php if (isset($sidebar) && $sidebar->document == 0) echo "checked"; ?>/>
                                                        No </label>
                                                        <div class="clearfix"></div>
                                                        <div class="col-md-12 nopad martop yesno" >
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox"
                                                                                          name="side[document_list]"
                                                                                          value="1" <?php if (isset($sidebar) && $sidebar->document_list == 1) echo "checked"; ?> /> List
                                                            </label>
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox"
                                                                                          name="side[document_create]"
                                                                                          value="1" <?php if (isset($sidebar) && $sidebar->document_create == 1) echo "checked"; ?> /> Create
                                                            </label>
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox"
                                                                                          name="side[document_edit]"
                                                                                          value="1" <?php if ($sidebar->document_edit == 1) echo "checked"; ?> /> Edit
                                                            </label>
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox"
                                                                                          name="side[document_delete]"
                                                                                          value="1" <?php if ($sidebar->document_delete == 1) echo "checked"; ?> /> Delete
                                                            </label>
                                                             <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox"
                                                                                          name="side[document_others]"
                                                                                          value="1" <?php if ($sidebar->document_others == 1) echo "checked"; ?> /> View Others <?php echo ucfirst($settings->document); ?>
                                                            </label>
                                                             <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox"
                                                                                          name="side[document_requalify]"
                                                                                          value="1" <?php if ($sidebar->document_requalify == 1) echo "checked"; ?> /> Requalify
                                                            </label>
                                                            
                                                            
                                                        </div>
                                                        <div class="clearfix"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="vtop">
                                                    Orders
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="side[orders]" onclick="$(this).closest('td').find('.yesno span').each(function(){$(this).addClass('checked')});$(this).closest('td').find('.yesno input').each(function(){ this.checked = true;})" value="1" <?php if (isset($sidebar) && $sidebar->orders == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[orders]"
                                                                                          onclick="$(this).closest('td').find('.yesno span').each(function(){$(this).removeClass('checked')});$(this).closest('td').find('.yesno input').each(function(){$(this).removeAttr('checked');});"
                                                                                          value="0" <?php if (isset($sidebar) && $sidebar->orders == 0) echo "checked"; ?>/>
                                                        No </label>
                                                        <div class="clearfix"></div>
                                                        <div class="col-md-12 nopad martop yesno" >
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox" name="side[orders_list]" value="1" <?php if (isset($sidebar) && $sidebar->orders_list == 1) echo "checked"; ?> /> List
                                                            </label>
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox" name="side[orders_create]" value="1" <?php if (isset($sidebar) && $sidebar->orders_create == 1) echo "checked"; ?> /> Create
                                                            </label>
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox" name="side[orders_edit]" value="1" <?php if ($sidebar->orders_edit == 1) echo "checked"; ?> /> Edit
                                                            </label>
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox" name="side[orders_delete]" value="1" <?php if ($sidebar->orders_delete == 1) echo "checked"; ?> /> Delete
                                                            </label>
                                                             <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox" name="side[orders_others]" value="1" <?php if ($sidebar->orders_others == 1) echo "checked"; ?> /> View Others Orders
                                                            </label>
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox" name="side[orders_requalify]" value="1" <?php if ($sidebar->orders_requalify == 1) echo "checked"; ?> /> Requalify
                                                            </label>
                                                            

                                                        </div>
                                                        <div class="clearfix"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="vtop">
                                                    Email Notifications
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="side[email]" onclick="$(this).closest('td').find('.yesno span').each(function(){$(this).addClass('checked')});$(this).closest('td').find('.yesno input').each(function(){ this.checked = true;})" value="1" <?php if (isset($sidebar) && $sidebar->email == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[email]"
                                                                                          onclick="$(this).closest('td').find('.yesno span').each(function(){$(this).removeClass('checked')});$(this).closest('td').find('.yesno input').each(function(){$(this).removeAttr('checked');});"
                                                                                          value="0" <?php if (isset($sidebar) && $sidebar->email == 0) echo "checked"; ?>/>
                                                        No </label>
                                                        <div class="clearfix"></div>
                                                        <div class="col-md-12 nopad martop yesno" >
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox" name="side[email_todo]" value="1" <?php if (isset($sidebar) && $sidebar->email_todo == 1) echo "checked"; ?> /> Todo
                                                            </label>
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox" name="side[email_document]" value="1" <?php if (isset($sidebar) && $sidebar->email_document == 1) echo "checked"; ?> /> <?php echo ucwords($settings->document);?>
                                                            </label>
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox" name="side[email_orders]" value="1" <?php if ($sidebar->email_orders == 1) echo "checked"; ?> /> Orders
                                                            </label>
                                                            
                                                        </div>
                                                        <div class="clearfix"></div>
                                                </td>
                                            </tr>
                                            <!--<tr>
                                                <td class="vtop">Feedbacks</td>
                                                <td>
                                                        <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[feedback]"
                                                                                          value="1" <?php if (isset($sidebar) && $sidebar->feedback == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                        <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[feedback]"
                                                                                          value="0" <?php if (isset($sidebar) && $sidebar->feedback == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>-->
                                            <tr>
                                                <td class="vtop">Messages</td>
                                                <td>
                                                     <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[messages]"
                                                                                          value="1" <?php if (isset($sidebar) && $sidebar->messages == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                        <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[messages]"
                                                                                          value="0" <?php if (isset($sidebar) && $sidebar->messages == 0) echo "checked"; ?>/>
                                                        No </label>
                                                    </td>
                                                    </tr>    
                                                        <tr>
                                                <td class="vtop">Drafts</td>
                                                <td>
                                                        <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[drafts]"
                                                                                          value="1" <?php if (isset($sidebar) && $sidebar->drafts == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                        <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[drafts]"
                                                                                          value="0" <?php if (isset($sidebar) && $sidebar->drafts == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>
                                              <tr>
                                                <td class="vtop">Recent Activity</td>
                                                <td>
                                                        <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[recent]"
                                                                                          value="1" <?php if (isset($sidebar) && $sidebar->recent == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                        <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[recent]"
                                                                                          value="0" <?php if (isset($sidebar) && $sidebar->recent == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="vtop">Show Logo</td>
                                                <td>
                                                        <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[logo]"
                                                                                          value="1" <?php if (isset($sidebar) && $sidebar->logo == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                        <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[logo]"
                                                                                          value="0" <?php if (isset($sidebar) && $sidebar->logo == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>
                                        </table>
                                        <!--end profile-settings-->







                                                        
                              

                                        <?php
                                        if (!isset($disabled)) {
                                            ?>
                                            <div class="res"></div>
                                            <div class="margin-top-10 alert alert-success display-hide flash" style="display: none;">
                                                            <button class="close" data-close="alert"></button>
                                                            Data saved successfully
                                                        </div>
                                            <div class="margin-top-10"><center>
                                                <input type="button" name="submit" class="btn btn-primary" id="save_blocks"
                                                       value="Save Changes"/>

                                                </center></div>
                                        <?php
                                        }
                                        ?>


                                    </form>
                                						
                                    </div>
                                    </div>
                                    <div class="tab-pane" id="subtab_2_2">


                                                    <div class="">
                                						<!--h1> Enable <?php echo ucfirst($settings->document);?>?</h1-->
                                                        <form action="#" method="post" id="displayform">
                                                            <table class="table table-bordered table-hover">
                                                        <tr><th   width="25%"></th><th class=""  width="25%">System</th><th class=""><?php echo ucfirst($settings->profile);?></th></tr>
                                                        <?php
                                                        $subdoc = $this->requestAction('/profiles/getSub');
                                                        
                                                        foreach($subdoc as $sub)
                                                        {
                                                            ?>
                                                            <tr>
                                                            <td>
                                                                
                                                               <?php echo ucfirst($sub['title']);?>
                                                            </td>
                                                            <td class="">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled1?> type="radio" name="<?php echo $sub->id;?>" value="1" <?php if($sub['display']==1) {?>checked="checked" <?php }?> />
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled1?> type="radio" name="<?php echo $sub->id;?>" value="0" <?php if($sub['display']==0) {?>checked="checked" <?php }?> />
                                                                    No </label>
                                                            </td>
                                                            <?php
                                                                 $prosubdoc = $this->requestAction('/settings/all_settings/0/0/profile/'.$id.'/'.$sub->id);
                                                            ?>
                                                            <td class="">
                                                                <!--<label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="profileP[<?php echo $sub->id;?>]" value="" onclick="$(this).closest('tr').next('tr').show();" <?php if($prosubdoc['display'] != 0) {?> checked="checked" <?php } ?> />
                                                                    Yes </label>-->
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="profile[<?php echo $sub->id;?>]" value="0"  <?php if($prosubdoc['display'] == 0) {?> checked="checked" <?php } ?> />
                                                                    None </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="profile[<?php echo $sub->id;?>]" value="1" <?php if($prosubdoc['display'] == 1) {?> checked="checked" <?php } ?> />
                                                                    View Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="profile[<?php echo $sub->id;?>]" value="2" <?php if($prosubdoc['display'] == 2) {?> checked="checked" <?php } ?> />
                                                                    Upload Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio"  name="profile[<?php echo $sub->id;?>]" value="3" <?php if($prosubdoc['display'] == 3) {?> checked="checked" <?php } ?>/>
                                                                    Both </label>
                                                            </td>
                                                        </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </table>

                                                    <?php
                                                    if(!isset($disabled))
                                                    {
                                                        ?>

                                                        <div class="margin-top-10 alert alert-success display-hide flash" style="display: none;">
                                                            <button class="close" data-close="alert"></button>
                                                            Data saved successfully
                                                        </div>
                                                        <div class="margin-top-10"><center>
                                                            <a href="javascript:void(0)" id="save_display" class="btn btn-primary">
                                                                Save Changes </a></center>

                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                    </form>
                                					</div>
                                                                
                                						
                                    </div>
                                    <div  class="tab-pane" id="subtab_2_3">



                                       
                                    <form id="homeform">
                                     <input type="hidden" name="form" value="<?php echo $uid;?>" />
                                     <input type="hidden" name="block[user_id]" value="<?php echo $uid;?>" />
                                        <table class="table table-bordered table-hover">
                                            <tr>
                                                <td>
                                                    Add a <?=$settings->profile; ?>
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[addadriver]"
                                                                                          value="1" <?php if (isset($block) && $block->addadriver == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[addadriver]"
                                                                                          value="0" <?php if (isset($block) && $block->addadriver == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    List a <?=$settings->profile; ?>
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[list_profile]"
                                                                                          value="1" <?php if (isset($block) && $block->list_profile == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[list_profile]"
                                                                                          value="0" <?php if (isset($block) && $block->list_profile == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Add a <?=$settings->client; ?>
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[add_client]"
                                                                                          value="1" <?php if (isset($block) && $block->add_client == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[add_client]"
                                                                                          value="0" <?php if (isset($block) && $block->add_client == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    List a <?=$settings->client; ?>
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[list_client]"
                                                                                          value="1" <?php if (isset($block) && $block->list_client == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[list_client]"
                                                                                          value="0" <?php if (isset($block) && $block->list_client == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Submit <?=$settings->document; ?>
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[submit_document]"
                                                                                          value="1" <?php if (isset($block) && $block->submit_document == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[submit_document]"
                                                                                          value="0" <?php if (isset($block) && $block->submit_document == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    List <?=$settings->document; ?>
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[list_document]"
                                                                                          value="1" <?php if (isset($block) && $block->list_document == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[list_document]"
                                                                                          value="0" <?php if (isset($block) && $block->list_document == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    Search <?=$settings->profile; ?>
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="block[searchdriver]"
                                                                                          value="1" <?php if (isset($block) && $block->searchdriver == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="block[searchdriver]"
                                                                                          value="0" <?php if (isset($block) && $block->searchdriver == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Submit Order
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[submitorder]"
                                                                                          value="1" <?php if (isset($block) && $block->submitorder == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[submitorder]"
                                                                                          value="0" <?php if (isset($block) && $block->submitorder == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    List Order
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[list_order]"
                                                                                          value="1" <?php if (isset($block) && $block->list_order == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[list_order]"
                                                                                          value="0" <?php if (isset($block) && $block->list_order == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Order History
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[orderhistory]"
                                                                                          value="1" <?php if (isset($block) && $block->orderhistory == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[orderhistory]"
                                                                                          value="0" <?php if (isset($block) && $block->orderhistory == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    Schedule
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[schedule]"
                                                                                          value="1" <?php if (isset($block) && $block->schedule == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[schedule]"
                                                                                          value="0" <?php if (isset($block) && $block->schedule == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>
                                             <tr>
                                                <td>
                                                    Messages
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[message]"
                                                                                          value="1" <?php if (isset($block) && $block->message == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[message]"
                                                                                          value="0" <?php if (isset($block) && $block->message == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>
                                             <tr>
                                                <td>
                                                    Documents Drafts
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[document_draft]"
                                                                                          value="1" <?php if (isset($block) && $block->document_draft == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[document_draft]"
                                                                                          value="0" <?php if (isset($block) && $block->document_draft == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>
                                             <tr>
                                                <td>
                                                    Orders Drafts
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[orders_draft]"
                                                                                          value="1" <?php if (isset($block) && $block->orders_draft == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[orders_draft]"
                                                                                          value="0" <?php if (isset($block) && $block->orders_draft == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>
                                           <!-- <tr>
                                                <td>
                                                    Tasks
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[tasks]"
                                                                                          value="1" <?php if (isset($block) && $block->tasks == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[tasks]"
                                                                                          value="0" <?php if (isset($block) && $block->tasks == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Feedback
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="block[feedback]"
                                                                                          value="1" <?php if (isset($block) && $block->feedback == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="block[feedback]"
                                                                                          value="0" <?php if (isset($block) && $block->feedback == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>-->
                                            <tr>
                                                <td>
                                                    Analytics
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[analytics]"
                                                                                          value="1" <?php if (isset($block) && $block->analytics == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[analytics]"
                                                                                          value="0" <?php if (isset($block) && $block->analytics == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>


                                            <!--tr>
                                                <td>
                                                    Master <?=$settings->client; ?>
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[masterjob]"
                                                                                          value="1" <?php if (isset($block) && $block->analytics == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[masterjob]"
                                                                                          value="0" <?php if (isset($block) && $block->analytics == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr-->
    
                                        </table>
                                          <?php
                                        if (!isset($disabled)) {
                                            ?>
                                            <div class="res"></div>
                                            <div class="margin-top-10 alert alert-success display-hide flash" style="display: none;">
                                                            <button class="close" data-close="alert"></button>
                                                            Data saved successfully
                                                        </div>
                                            <div class="margin-top-10"><center>
                                                <input type="button" name="submit" class="btn btn-primary" id="save_home"
                                                       value="Save Changes"/></center>

                                            </div>
                                        <?php
                                        }
                                        ?>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="subtab_2_4">
                                        
                                        <?php if ($this->request->params['action'] == 'edit' &&($this->request->session()->read("Profile.super") ||($this->request->session()->read("Profile.admin")==1 || $this->request->session()->read("Profile.profile_type")==2 ))) 
                                        {
                                            //&& $this->request->session()->read("Profile.id")==$id
                                            ?>

                                            <!--
                                            <div class="portlet box">
                                                <div class="portlet-title" style="background: #CCC;">
                                                    <div class="caption">Assign to client</div>
                                                </div>
                                                <div class="portlet-body">
                                                -->

                                                    <input type="text" id="searchClient" onkeyup="searchClient()" class="form-control" <?php if($this->request->session()->read('Profile.profile_type') == 2 && $this->request->session()->read('Profile.id') == $id){?>disabled=""<?php }?> />
                                                    <div class="scrolldiv">
                                                    <table class="table" id="clientTable">
                                                        <?php
                            
                                                            $clients = $this->requestAction('/clients/getAllClient/');
                                                            $count = 0;
                                                            if ($clients)
                                                                foreach ($clients as $o)
                                                                {
                                                                    $pro_ids = explode(",",$o->profile_id);
                                                                    //http://localhost/veritas3/img/jobs/115380_540579.jpg
                                                                    //http://localhost/veritas3/profiles/img/jobs/115380_540579.jpg
                                                                    ?>
                            
                                                                    <tr>
                                                                        <td><img height="32" src="../../img/jobs/<?php echo $o->image; ?>"/><input <?php if($this->request->session()->read('Profile.profile_type') == 2 && $this->request->session()->read('Profile.id') == $id){?>disabled=""<?php }?> type="checkbox" value="<?php echo $o->id; ?>" class="addclientz" <?php if(in_array($id,$pro_ids)){echo "checked";}?>  <?php echo $is_disabled ?> /> <?php echo $o->company_name; ?></td>
                                                                    </tr>
                            
                                                                <?php
                                                                }
                                                        ?>
                            
                                                    </table>
                                                    </div>
                                                    <div class="clearfix"></div>
                            
                                               <!-- </div>
                                            </div>-->
                                        <?php }
                                            else
                                            {
                                            ?><!--
                                            <div class="portlet box">
                                                <div class="portlet-title">
                                                    <div class="caption">Assign to client</div>
                                                </div>
                                                <div class="portlet-body">-->
                                                    <input type="text" id="searchClient" onkeyup="searchClient()" class="form-control"  <?php echo $is_disabled ?> />
                                                    <div class="scrolldiv">
                                                    <table class="table scrolldiv" id="clientTable">
                                                        <?php
                            
                                                            $clients = $this->requestAction('/clients/getAllClient/');
                                                            $count = 0;
                                                            if ($clients)
                                                                foreach ($clients as $o)
                                                                {
                                                                    //$pro_ids = explode(",",$o->profile_id);
                                                                    ?>
                            
                                                                    <tr>
                                                                        <td><input  <?php echo $is_disabled ?> type="checkbox" value="<?php echo $o->id; ?>" class="addclientz"  /> <?php echo $o->company_name; ?></td>
                                                                    </tr>
                            
                                                                <?php
                                                                }
                                                        ?>
                            
                                                    </table>
                                                    </div>
                                                    <div class="clearfix"></div>
                            
                                              <!--  </div>
                                            </div>-->
                                        <?php
                                            } ?>
                                            <div class="margin-top-10 alert alert-success display-hide clientadd_flash"
                                                     style="display: none;">
                                                    <button class="close" data-close="alert"></button>
                                                   
                                                </div>
                                            
                                    </div>
                                    </div>
                                    </div>


                                        <!-- put this back when the form is gone   </div>     </div>   -->
                                    
                                    <script>
                                    $(function(){
                                       $('#save_blocks').click(function(){
                                        $('#save_blocks').text('Saving..');
                                            var str = $('#blockform input').serialize();
                                            $.ajax({
                                               url:'<?php echo $this->request->webroot; ?>profiles/blocks',
                                               data:str,
                                               type:'post',
                                               success:function(res)
                                               {
                                                    //alert(res);
                                                    $('.res').text(res);
                                                    $('.flash').show();
                                                    $('.flash').fadeOut(7000);
                                                    $('#save_display').text(' Save Changes ');
                                               } 
                                            })
                                       });
                                      
                                      
                                       $('#save_home').click(function(){
                                        $('#save_home').text('Saving..');
                                            var str = $('#homeform input').serialize();
                                            $.ajax({
                                               url:'<?php echo $this->request->webroot; ?>profiles/homeblocks',
                                               data:str,
                                               type:'post',
                                               success:function(res)
                                               {
                                                    //alert(res);
                                                    $('.res').text(res);
                                                    $('.flash').show();
                                                    $('.flash').fadeOut(7000);
                                                    $('#save_home').text(' Save Changes ');
                                               } 
                                            })
                                       });
                                       $('#save_display').click(function(){
                                        $('#save_display').text('Saving..');
                                            var str = $('#displayform input').serialize();
                                            $.ajax({
                                               url:'<?php echo $this->request->webroot;?>profiles/displaySubdocs/<?php echo $id;?>',
                                               data:str,
                                               type:'post',
                                               success:function(res)
                                               {
                                                $('.flash').show();
                                                $('.flash').fadeOut(7000);
                                                $('#save_display').text(' Save Changes ');
                                               } 
                                            })
                                       }); 
                                    
                                    });
                                    </script>