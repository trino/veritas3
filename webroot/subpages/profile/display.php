<form action="<?php echo $this->request->webroot; ?>settings/change_text"
                                          role="form" method="post">
                                        <div class="form-group" id="notli">

                                            <label class="control-label">Choose what to display</label>

                                            <div class="clearfix"></div>
                                            <div class="form-group">
                                                <label class="control-label">Client</label>
                                                <input type="text" name="client" class="form-control"
                                                       value="<?php echo $settings->client; ?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Document</label>
                                                <input type="text" name="document" class="form-control"
                                                       value="<?php echo $settings->document; ?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Profile</label>
                                                <input type="text" name="profile" class="form-control"
                                                       value="<?php echo $settings->profile; ?>"/>
                                            </div>
                                            <!--<select class="form-control" onchange="change_text(this.value)">
                                                <option value="">Select User/Profile</option>
                                                <option value="1">Profile/Client</option>
                                                <option value="2">User/Job</option>
                                            </select>-->

                                        </div>
                                        <div class="margin-top-10">
                                            <input type="submit" class="btn btn-primary" value="Submit"/>
                                            <a href="#" class="btn default">
                                                Cancel </a>
                                        </div>
                                    </form>

                                    
                                    <p>&nbsp;</p>
                                                <h4> Enable <?php echo ucfirst($settings->document);?>?</h4>

                                                <form action="#" method="post" id="displayform">
                                                    <table class="table table-light table-hover">
                                                        <tr><th></th><th class="center">System</th><th class="center" width="40%"><?php echo ucfirst($settings->profile);?></th></tr>
                                                        <?php
                                                        $subdoc = $this->requestAction('/profiles/getSub');
                                                        
                                                        foreach($subdoc as $sub)
                                                        {
                                                            ?>
                                                            <tr>
                                                            <td>
                                                                
                                                               <?php echo ucfirst($sub['title']);?>
                                                            </td>
                                                            <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="<?php echo $sub->id;?>" value="1" <?php if($sub['display']==1) {?>checked="checked" <?php }?> />
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="<?php echo $sub->id;?>" value="0" <?php if($sub['display']==0) {?>checked="checked" <?php }?> />
                                                                    No </label>
                                                            </td>
                                                            <?php
                                                                 $prosubdoc = $this->requestAction('/profiles/getProSubDoc/'.$id.'/'.$sub->id);
                                                            ?>
                                                            <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="profileP[<?php echo $sub->id;?>]" value="" onclick="$(this).closest('tr').next('tr').show();" <?php if($prosubdoc['display'] != 0) {?> checked="checked" <?php } ?> />
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="profileP[<?php echo $sub->id;?>]" value="0" onclick="$(this).closest('tr').next('tr').hide();" <?php if($prosubdoc['display'] == 0) {?> checked="checked" <?php } ?> />
                                                                    No </label>
                                                            </td>
                                                            
                                                        </tr>
                                                        <tr <?php if($prosubdoc['display'] == 0) {?>style="display:none;" <?php } ?> >
                                                            <td colspan="2"></td>
                                                            <td  class="center">
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
                                                        
                                                        
                                                        
                                                        <!--
                                                        <tr>
                                                            <td>
                                                                Strike
                                                            </td>
                                                            <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios4" value="option1"/>
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios4" value="option2" checked/>
                                                                    No </label>
                                                            </td>
                                                        <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions3" value="option1" onclick="$(this).closest('tr').next('tr').show();"  />
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions3" value="option2" onclick="$(this).closest('tr').next('tr').hide();" checked />
                                                                    No </label>
                                                            </td>
                                                            
                                                        </tr>
                                                        <tr style="display:none;">
                                                            <td></td>
                                                            <td colspan="2">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr3" value="option1"/>
                                                                    View Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr3" value="option2" />
                                                                    Upload Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr3" value="option3" checked/>
                                                                    Both </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Orders
                                                            </td>
                                                            <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios5" value="option1"/>
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios5" value="option2" checked/>
                                                                    No </label>
                                                            </td>
                                                        <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions4" value="option1" onclick="$(this).closest('tr').next('tr').show();"  />
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions4" value="option2" onclick="$(this).closest('tr').next('tr').hide();" checked />
                                                                    No </label>
                                                            </td>
                                                            
                                                        </tr>
                                                        <tr style="display:none;">
                                                            <td></td>
                                                            <td colspan="2" class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr4" value="option1"/>
                                                                    View Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr4" value="option2" />
                                                                    Upload Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr4" value="option3" checked/>
                                                                    Both </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Other Document Type
                                                            </td>
                                                            <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios6" value="option1"/>
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios6" value="option2" checked/>
                                                                    No </label>
                                                            </td>
                                                        <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions5" value="option1" onclick="$(this).closest('tr').next('tr').show();"  />
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions5" value="option2" onclick="$(this).closest('tr').next('tr').hide();" checked />
                                                                    No </label>
                                                            </td>
                                                            
                                                        </tr>
                                                        <tr style="display:none;">
                                                            <td></td>
                                                            <td colspan="2" class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr5" value="option1"/>
                                                                    View Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr5" value="option2" />
                                                                    Upload Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr5" value="option3" checked/>
                                                                    Both </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Other <?php echo ucfirst($settings->document);?> Type
                                                            </td>
                                                            <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios7" value="option1"/>
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios7" value="option2" checked/>
                                                                    No </label>
                                                            </td>
                                                        <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions6" value="option1" onclick="$(this).closest('tr').next('tr').show();"  />
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions6" value="option2" onclick="$(this).closest('tr').next('tr').hide();" checked />
                                                                    No </label>
                                                            </td>
                                                            
                                                        </tr>
                                                        <tr style="display:none;">
                                                            <td></td>
                                                            <td colspan="2" class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr6" value="option1"/>
                                                                    View Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr6" value="option2" />
                                                                    Upload Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr6" value="option3" checked/>
                                                                    Both </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Other <?php echo ucfirst($settings->document);?> Type
                                                            </td>
                                                            <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios8" value="option1"/>
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios8" value="option2" checked/>
                                                                    No </label>
                                                            </td>
                                                        <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions7" value="option1" onclick="$(this).closest('tr').next('tr').show();"  />
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions7" value="option2" onclick="$(this).closest('tr').next('tr').hide();" checked />
                                                                    No </label>
                                                            </td>
                                                            
                                                        </tr>
                                                        <tr style="display:none;">
                                                            <td></td>
                                                            <td colspan="2" class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr7" value="option1"/>
                                                                    View Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr7" value="option2" />
                                                                    Upload Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr7" value="option3" checked/>
                                                                    Both </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Other <?php echo ucfirst($settings->document);?> Type
                                                            </td>
                                                            <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios9" value="option1"/>
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios9" value="option2" checked/>
                                                                    No </label>
                                                            </td>
                                                        <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions8" value="option1" onclick="$(this).closest('tr').next('tr').show();"  />
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions8" value="option2" onclick="$(this).closest('tr').next('tr').hide();" checked />
                                                                    No </label>
                                                            </td>
                                                            
                                                        </tr>
                                                        <tr style="display:none;">
                                                            <td></td>
                                                            <td colspan="2" class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr8" value="option1"/>
                                                                    View Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr8" value="option2" />
                                                                    Upload Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr8" value="option3" checked/>
                                                                    Both </label>
                                                            </td>
                                                        </tr>-->
                                                    </table>
                                                    <!--end profile-settings-->
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
                                    
                                    <script>
                                    $(function(){
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
                                                $('#save_display').text(' Save Changes ');
                                               } 
                                            })
                                       }); 
                                    });
                                    </script>