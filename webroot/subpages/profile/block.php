<?php 

    $uid = ($this->request['action']=='add')? "0" : $this->request['pass'][0];
    $sidebar = $this->requestAction("settings/get_side/".$uid); ?>
                                    <?php $block = $this->requestAction("settings/get_blocks/".$uid); ?>
                                    <h4> Modules </h4>

                                    <form action="#" method="post" id="blockform">
                                        <input type="hidden" name="form" value="<?php echo $uid;?>" />
                                        <input type="hidden" name="side[user_id]" value="<?php echo $uid;?>" />
                                        <table class="table table-light table-hover">
                                            <tr>
                                                <td class="vtop">
                                                    <?php echo ucfirst($settings->profile); ?>
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[profile]"
                                                                                          value="1" onclick="$(this).closest('td').find('.yesno').show();" <?php if (isset($sidebar) && $sidebar->profile == 1) echo "checked"; ?> />
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[profile]"
                                                                                          value="0" onclick="$(this).closest('td').find('.yesno').hide(); $(this).closest('td').find('.yesno span').each(function(){$(this).removeClass('checked')});" <?php if (isset($sidebar) && $sidebar->profile == 0) echo "checked"; ?>/>
                                                        No </label>
                                                        <div class="clearfix"></div>
                                                        <div class="col-md-12 nopad martop yesno" <?php if(isset($sidebar) && $sidebar->profile == 0){?>style="display:none;"<?php }?>>
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
                                                                                          onclick="$(this).closest('td').find('.yesno').show();"
                                                                                          value="1" <?php if (isset($sidebar) && $sidebar->client == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[client]"
                                                                                          onclick="$(this).closest('td').find('.yesno').hide();"
                                                                                          value="0" <?php if (isset($sidebar) && $sidebar->client == 0) echo "checked"; ?>/>
                                                        No </label>
                                                        <div class="clearfix"></div>
                                                        <div class="col-md-12 nopad martop yesno" <?php if(isset($sidebar) && $sidebar->client == 0){?>style="display:none;"<?php }?>>
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
                                                                                          onclick="$(this).closest('td').find('.yesno').show();"
                                                                                          value="1" <?php if (isset($sidebar) && $sidebar->document == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[document]"
                                                                                          onclick="$(this).closest('td').find('.yesno').hide();"
                                                                                          value="0" <?php if (isset($sidebar) && $sidebar->document == 0) echo "checked"; ?>/>
                                                        No </label>
                                                        <div class="clearfix"></div>
                                                        <div class="col-md-12 nopad martop yesno" <?php if(isset($sidebar) && $sidebar->document == 0){?>style="display:none;"<?php }?>>
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
                                                            
                                                            
                                                        </div>
                                                        <div class="clearfix"></div>
                                                </td>
                                            </tr>
                                            
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
                                        </table>
                                        <!--end profile-settings-->










                                        <h4> Homepage Top Block</h4>

                                        <input type="hidden" name="block[user_id]" value="<?php echo $uid;?>" />
                                        <table class="table table-light table-hover">
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


                                            <tr>
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
                                            </tr>








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
                                                $('.res').text(res);
                                                $('.flash').show();
                                                $('#save_display').text(' Save Changes ');
                                               } 
                                            })
                                       }); 
                                    });
                                    </script>