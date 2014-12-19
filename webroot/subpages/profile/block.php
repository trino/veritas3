<?php $sidebar = $this->requestAction("settings/get_side"); ?>
                                    <?php $block = $this->requestAction("settings/get_blocks"); ?>
                                    <h4> Sidebar Module </h4>

                                    <form action="<?php echo $this->request->webroot; ?>profiles/blocks" method="post">
                                        <table class="table table-light table-hover">
                                            <tr>
                                                <td class="vtop">
                                                    <?php echo ucfirst($settings->profile); ?>
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[profile]"
                                                                                          value="1" onclick="$(this).closest('td').find('.yesno').show();" <?php if ($sidebar->profile == 1) echo "checked"; ?> />
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[profile]"
                                                                                          value="0" onclick="$(this).closest('td').find('.yesno').hide();" <?php if ($sidebar->profile == 0) echo "checked"; ?>/>
                                                        No </label>
                                                        <div class="clearfix"></div>
                                                        <div class="col-md-12 nopad martop yesno" <?php if($sidebar->profile == 0){?>style="display:none;"<?php }?>>
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox"
                                                                                          name="side[profile_list]"
                                                                                          value="1" <?php if ($sidebar->profile_list == 1) echo "checked"; ?> /> List
                                                            </label>
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox"
                                                                                          name="side[profile_create]"
                                                                                          value="1" <?php if ($sidebar->profile_create == 1) echo "checked"; ?> /> Create
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
                                                                                          value="1" <?php if ($sidebar->client == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[client]"
                                                                                          value="0" <?php if ($sidebar->client == 0) echo "checked"; ?>/>
                                                        No </label>
                                                        <div class="clearfix"></div>
                                                        <div class="col-md-12 nopad martop yesno" <?php if($sidebar->client == 0){?>style="display:none;"<?php }?>>
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox"
                                                                                          name="side[client_list]"
                                                                                          value="1" <?php if ($sidebar->client_list == 1) echo "checked"; ?> /> List
                                                            </label>
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox"
                                                                                          name="side[client_create]"
                                                                                          value="1" <?php if ($sidebar->client_create == 1) echo "checked"; ?> /> Create
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
                                                                                          value="1" <?php if ($sidebar->document == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[document]"
                                                                                          value="0" <?php if ($sidebar->document == 0) echo "checked"; ?>/>
                                                        No </label>
                                                        <div class="clearfix"></div>
                                                        <div class="col-md-12 nopad martop yesno" <?php if($sidebar->document == 0){?>style="display:none;"<?php }?>>
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox"
                                                                                          name="side[document_list]"
                                                                                          value="1" <?php if ($sidebar->document_list == 1) echo "checked"; ?> /> List
                                                            </label>
                                                            <label class="uniform-inline">
                                                                <input <?php echo $is_disabled ?> type="checkbox"
                                                                                          name="side[document_create]"
                                                                                          value="1" <?php if ($sidebar->document_create == 1) echo "checked"; ?> /> Create
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
                                                                                          value="1" <?php if ($sidebar->messages == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                        <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[messages]"
                                                                                          value="0" <?php if ($sidebar->messages == 0) echo "checked"; ?>/>
                                                        No </label>
                                                    </td>
                                                    </tr>    
                                                        <tr>
                                                <td class="vtop">Drafts</td>
                                                <td>
                                                        <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[drafts]"
                                                                                          value="1" <?php if ($sidebar->drafts == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                        <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[drafts]"
                                                                                          value="0" <?php if ($sidebar->drafts == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>
                                        </table>
                                        <!--end profile-settings-->










                                        <h4> Homepage Top Block</h4>


                                        <table class="table table-light table-hover">
                                            <tr>
                                                <td>
                                                    Add a <?=$settings->profile; ?>
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[addadriver]"
                                                                                          value="1" <?php if ($block->addadriver == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[addadriver]"
                                                                                          value="0" <?php if ($block->addadriver == 0) echo "checked"; ?>/>
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
                                                                                          value="1" <?php if ($block->searchdriver == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="block[searchdriver]"
                                                                                          value="0" <?php if ($block->searchdriver == 0) echo "checked"; ?>/>
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
                                                                                          value="1" <?php if ($block->submitorder == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[submitorder]"
                                                                                          value="0" <?php if ($block->submitorder == 0) echo "checked"; ?>/>
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
                                                                                          value="1" <?php if ($block->orderhistory == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[orderhistory]"
                                                                                          value="0" <?php if ($block->orderhistory == 0) echo "checked"; ?>/>
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
                                                                                          value="1" <?php if ($block->schedule == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[schedule]"
                                                                                          value="0" <?php if ($block->schedule == 0) echo "checked"; ?>/>
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
                                                                                          value="1" <?php if ($block->tasks == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[tasks]"
                                                                                          value="0" <?php if ($block->tasks == 0) echo "checked"; ?>/>
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
                                                                                          value="1" <?php if ($block->feedback == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="block[feedback]"
                                                                                          value="0" <?php if ($block->feedback == 0) echo "checked"; ?>/>
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
                                                                                          value="1" <?php if ($block->analytics == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[analytics]"
                                                                                          value="0" <?php if ($block->analytics == 0) echo "checked"; ?>/>
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
                                                                                          value="1" <?php if ($block->analytics == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[masterjob]"
                                                                                          value="0" <?php if ($block->analytics == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>








                                        </table>

                                        <?php
                                        if (!isset($disabled)) {
                                            ?>

                                            <div class="margin-top-10">
                                                <input type="submit" name="submit" class="btn btn-primary"
                                                       value="Save Changes"/>

                                            </div>
                                        <?php
                                        }
                                        ?>


                                    </form>