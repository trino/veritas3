<?php 

    $uid = ($this->request['action']=='add')? "0" : $this->request['pass'][0];
    $sidebar = $this->requestAction("settings/all_settings/".$uid."/sidebar"); ?>
    <?php $block = $this->requestAction("settings/all_settings/".$uid."/blocks"); ?>
                                <ul class="nav nav-tabs">
                                
                                
                                    <li class="active">
                                		<a href="#subtab_2_1" data-toggle="tab">Modules</a>
                                	</li>
                                    <li class="">
                                        <a href="#subtab_2_2" data-toggle="tab"><?php echo ucfirst($settings->document); ?></a>
                                    </li>




                                </ul>
                                    <div class="tab-content">
                                                <div class="tab-pane active" id="subtab_2_1">
                                                    <div class="">
                                					   <!--h1>Modules</h1-->
                                					   <form action="#" method="post" id="blockform">
                                        <input type="hidden" name="form" value="<?php echo $uid;?>" />
                                        <input type="hidden" name="side[user_id]" value="<?php echo $uid;?>" />

                                                           <div class="row">


                                                               <div class="col-md-6">
                                                                   <div class="form-group">
                                                                       <h3 class="block">Sidebar</h3>                            </div>
                                                               </div>
                                                           </div>

                                                           <table class=" ">
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







                                                           <div class="row">


                                                               <div class="col-md-6">
                                                                   <div class="form-group">
                                                                       <h3 class="block">Homepage Top Block</h3>                            </div>
                                                               </div>
                                                           </div>


                                        <input type="hidden" name="block[user_id]" value="<?php echo $uid;?>" />
                                        <table class="">
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
                                            </tr>
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
                                            <div class="margin-top-10">
                                                <input type="button" name="submit" class="btn btn-primary" id="save_blocks"
                                                       value="Save Changes"/>

                                            </div>
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
                                                    <table class="">
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
                                                        <div class="margin-top-10">
                                                            <a href="javascript:void(0)" id="save_display" class="btn btn-primary">
                                                                Save Changes </a>

                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                    </form>
                                					</div>
                                                                
                                						
                                    </div>
                            </div>
                                    
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