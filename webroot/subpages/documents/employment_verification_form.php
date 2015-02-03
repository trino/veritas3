<form id="form_employment">
        	<div class="form-body">
                <?php
                $counter=0;
                if(isset($sub3['emp']) && count($sub3['emp']))
                {
                    //echo count($sub3['emp']);
                    
                    foreach($sub3['emp'] as $emp)
                    {
                        //die('here');
                        $counter++;
                        if($counter!=1)
                        {
                            if($counter==2)
                            {
                                ?>
                                <div id="more_div">
                                <?php
                            }
                            ?>
                                    <div id="toremove">
                            <?php
                        }
                        ?>
                        
                        <div class="form-group col-md-12">
                
                                <h4 class="control-label col-md-12">Past Employer</h4>
                        </div>
                
                               <div class="form-group col-md-12">
                                <label class="control-label col-md-3">Company Name : </label>
                                <div class=" col-md-9">
                                <input type="text" class="form-control" name="company_name[]" value="<?php echo $emp->company_name;?>"  />
                                </div>
                                </div>
                                <div class="form-group col-md-12">
                                <label class="control-label col-md-3">Address : </label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="address[]" value="<?php echo $emp->address;?>" />
                                </div>
                                <label class="control-label col-md-3">City : </label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="city[]" value="<?php echo $emp->city;?>" />
                                </div>
                                </div>
                                <div class="form-group col-md-12">
                                <label class="control-label col-md-3">State/Province : </label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="state_province[]" value="<?php echo $emp->state_province;?>" />
                                </div>
                                <label class="control-label col-md-3">Country : </label>
                                <div class="col-md-3">
                                <input type="text" class="form-control" name="country[]" value="<?php echo $emp->country;?>" />
                                </div>
                                </div>
                                <div class="form-group col-md-12">
                                <label class="control-label col-md-3">Supervisor's Name : </label>
                                <div class="col-md-3">
                                <input type="text" class="form-control" name="supervisor_name[]" value="<?php echo $emp->address;?>" value="<?php echo $emp->supervisor_name;?>"/>
                                </div>
                               <label class="control-label col-md-3">Phone # : </label>
                               <div class="col-md-3">
                               <input type="text" class="form-control" name="supervisor_phone[]" value="<?php echo $emp->supervisor_phone;?>"/>
                               </div>
                               </div>
                               
                               <div class="form-group col-md-12">
                               <label class="control-label col-md-3">Supervisor's Email : </label>
                               <div class="col-md-3">
                               <input type="text" class="form-control email1" name="supervisor_email[]" value="<?php echo $emp->supervisor_email;?>"/>
                               </div>
                               <label class="control-label col-md-3">Secondary Email : </label>
                               <div class="col-md-3">
                               <input type="text" class="form-control email1" name="supervisor_secondary_email[]" value="<?php echo $emp->supervisor_secondary_email;?>"/>
                               </div>
                               </div>
                               
                               <div class="form-group col-md-12">
                                <label class="control-label col-md-3">Employment Start Date : </label>
                                <div class="col-md-3">
                                <input type="text" class="form-control date-picker" name="employment_start_date[]" value="<?php echo $emp->employment_start_date;?>"/>
                                </div>
                                <label class="control-label col-md-3">Employment End Date : </label>
                                <div class="col-md-3">
                                <input type="text" class="form-control date-picker" name="employment_end_date[]" value="<?php echo $emp->employment_end_date;?>"/>
                                </div>
                                </div>
                                <div class="form-group col-md-12">
                                <label class="control-label col-md-3">Claims with this Employer : </label>
                                <div class="col-md-3">
                                &nbsp;&nbsp;<input type="radio" name="claims_with_employer_<?php $rand = rand(0,100); echo $rand; ?>[]" value="1" <?php if($emp->claims_with_employer == 1){?>checked="checked"<?php }?>/>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="claims_with_employer_<?php echo $rand;?>[]"  value="0" <?php if($emp->claims_with_employer == 0){?>checked="checked"<?php }?>/>&nbsp;&nbsp;&nbsp;&nbsp;No
                                </div>
                                 <label class="control-label col-md-3">Date Claims Occurred : </label>
                                 <div class="col-md-3">
                                 <input type="text" class="form-control date-picker" name="claims_recovery_date[]" value="<?php echo $emp->claims_recovery_date;?>"/>
                                 </div>
                                 </div>
                                 
                                 <div class="form-group col-md-12">
                                <label class="control-label col-md-3">Employment history confirmed by (Verifier Use Only) : </label>
                                <div class="col-md-9">
                                <input type="text" class="form-control" name="emploment_history_confirm_verify_use[]" value="<?php echo $emp->emploment_history_confirm_verify_use;?>"/>
                                </div>
                                </div>
                                
                                <div class="form-group col-md-12">
                                <label class="control-label col-md-3">US DOT MC/MX# : </label>
                                <div class="col-md-3">
                                <input name="us_dot[]" type="text" class="form-control" name="us_dot[]" value="<?php echo $emp->us_dot;?>" />
                                </div>
                                <label class="control-label col-md-3" style="display: none;">Signature : </label>
                                <div class="col-md-3">
                                <input type="text" class="form-control" style="display: none;" name="signature[]" value="<?php echo $emp->signature;?>" />
                                </div>
                                </div>
                                
                                <div class="form-group col-md-12">
                                <label class="control-label col-md-3">Date : </label>
                                <div class="col-md-9">
                                <input type="text" class="form-control date-picker" name="signature_datetime[]" value="<?php echo $emp->signature_datetime;?>"/>
                                </div>
                                </div>
                                <div class="form-group col-md-12">
                                            <label class="control-label col-md-3">Equipment Operated : </label>
                                            <div class="col-md-9">
                                                <input type="checkbox" <?php if($emp->equipment_vans == 1){?>checked="checked"<?php }?> name="equipment_vans[]" value="1"/>&nbsp;Vans&nbsp;
                                                                <input type="checkbox" <?php if($emp->equipment_reefer == 1){?>checked="checked"<?php }?> name="equipment_reefer[]" value="1"/>&nbsp;Reefers&nbsp;
                                                                <input type="checkbox" <?php if($emp->equipment_decks == 1){?>checked="checked"<?php }?> name="equipment_decks[]" value="1"/>&nbsp;Decks&nbsp;
                                                                <input type="checkbox" <?php if($emp->equipment_super == 1){?>checked="checked"<?php }?> name="equipment_super[]" value="1"/>&nbsp;Super B's&nbsp;
                                                                <input type="checkbox" <?php if($emp->equipment_straight_truck == 1){?>checked="checked"<?php }?> name="equipment_straight_truck[]" value="1"/>&nbsp;Straight Truck&nbsp;
                                                                <input type="checkbox" <?php if($emp->equipment_others == 1){?>checked="checked"<?php }?> name="equipment_others[]" value="1"/>&nbsp;Others:
                                </div>
                                </div>
                                <div class="form-group col-md-12">
                                <label class="control-label col-md-3">Driving Experience : </label>
                                <div class="col-md-9">
                                    <input type="checkbox" <?php if($emp->driving_experince_local == 1){?>checked="checked"<?php }?> name="driving_experince_local[]" value="1"/>&nbsp;Local&nbsp;
                                                    <input type="checkbox" <?php if($emp->driving_experince_canada == 1){?>checked="checked"<?php }?> name="driving_experince_canada[]" value="1"/>&nbsp;Canada&nbsp;
                                                    <input type="checkbox" <?php if($emp->driving_experince_canada_rocky_mountains == 1){?>checked="checked"<?php }?> name="driving_experince_canada_rocky_mountains[]" value="1"/>&nbsp;Canada : Rocky Mountains&nbsp;
                                                    <input type="checkbox" <?php if($emp->driving_experince_usa == 1){?>checked="checked"<?php }?> name="driving_experince_usa[]" value="1"/>&nbsp;USA&nbsp;
                                </div>
                
                </div>
                
                        
                        <?php
                        if($counter!=1)
                        {
                            ?>
                                <div class="delete">
                                    <a href="javascript:void(0);" class="btn red" id="delete">Delete</a>
                                </div>
                            </div>
                            
                            <?php
                            if($counter==2)
                            {
                                ?>
                        </div>
                                <?php
                            }
                        }
                    }
                    if($counter==1)
                    {
                        ?>
                        <div id="more_div"></div>
                        <?php
                    }
                }
                else
                {
                   ?>
                <div class="form-group col-md-12">
                
                                <h4 class="control-label col-md-12">Past Employer</h4>
                </div>
                
                               <div class="form-group col-md-12">
                                <label class="control-label col-md-3">Company Name</label>
                                <div class=" col-md-9">
                                <input type="text" class="form-control" name="company_name[]" />
                                </div>
                                </div>
                                <div class="form-group col-md-12">
                                <label class="control-label col-md-3">Address</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="address[]" />
                                </div>
                                <label class="control-label col-md-3">City</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="city[]" />
                                </div>
                                </div>
                                <div class="form-group col-md-12">
                                <label class="control-label col-md-3">State/Province</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="state_province[]" />
                                </div>
                                <label class="control-label col-md-3">Country</label>
                                <div class="col-md-3">
                                <input type="text" class="form-control" name="country[]" />
                                </div>
                                </div>
                                <div class="form-group col-md-12">
                                <label class="control-label col-md-3">Supervisor's Name:</label>
                                <div class="col-md-3">
                                <input type="text" class="form-control" name="supervisor_name[]"/>
                                </div>
                               <label class="control-label col-md-3">Phone #:</label>
                               <div class="col-md-3">
                               <input type="text" class="form-control" name="supervisor_phone[]"/>
                               </div>
                               </div>
                               
                               <div class="form-group col-md-12">
                               <label class="control-label col-md-3">Supervisor's Email:</label>
                               <div class="col-md-3">
                               <input type="text" class="form-control email1" name="supervisor_email[]"/>
                               </div>
                               <label class="control-label col-md-3">Secondary Email:</label>
                               <div class="col-md-3">
                               <input type="text" class="form-control email1" name="supervisor_secondary_email[]"/>
                               </div>
                               </div>
                               
                               <div class="form-group col-md-12">
                                <label class="control-label col-md-3">Employment Start Date:</label>
                                <div class="col-md-3">
                                <input type="text" class="form-control date-picker" name="employment_start_date[]"/>
                                </div>
                                <label class="control-label col-md-3">Employment End Date:</label>
                                <div class="col-md-3">
                                <input type="text" class="form-control date-picker" name="employment_end_date[]"/>
                                </div>
                                </div>
                                <div class="form-group col-md-12">
                                <label class="control-label col-md-3">Claims with this Employer:</label>
                               <div class="col-md-3">
                                &nbsp;&nbsp;<input type="radio" name="claims_with_employer_<?php $rand = rand(10000,99999); echo $rand; ?>[]" value="1"/>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="claims_with_employer_<?php echo $rand;?>[]"  value="0"/>&nbsp;&nbsp;&nbsp;&nbsp;No
                                </div>
                                 <label class="control-label col-md-3">Date Claims Occured:</label>
                                 <div class="col-md-3">
                                 <input type="text" class="form-control date-picker" name="claims_recovery_date[]"/>
                                 </div>
                                 </div>
                                 
                                 <div class="form-group col-md-12">
                                    <label class="control-label col-md-3">Employment history confirmed by (Verifier Use Only):</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="emploment_history_confirm_verify_use[]"/>
                                    </div>

                                <label class="control-label col-md-3">US DOT MC/MX#:</label>
                                <div class="col-md-3">
                                <input name="us_dot[]" type="text" class="form-control" name="us_dot[]" />
                                </div>
                                <label class="control-label col-md-3" style="display: none;">Signature:</label>
                                <div class="col-md-3">
                                <input type="text" class="form-control" style="display: none;" name="signature[]"/>
                                </div>
                                </div>

                                <div class="form-group col-md-12">
                                <label class="control-label col-md-3">Date:</label>
                                <div class="col-md-3">
                                <input type="text" class="form-control date-picker" name="signature_datetime[]"/>
                                </div>
                                </div>
                                <div class="form-group col-md-12">
                                            <label class="control-label col-md-3">Equipment Operated : </label>
                                            <div class="col-md-9">
                                                <input type="checkbox" name="equipment_vans[]" value="1"/>&nbsp;Vans&nbsp;
                                                <input type="checkbox" name="equipment_reefer[]" value="1"/>&nbsp;Reefers&nbsp;
                                                <input type="checkbox" name="equipment_decks[]" value="1"/>&nbsp;Decks&nbsp;
                                                <input type="checkbox" name="equipment_super[]" value="1"/>&nbsp;Super B's&nbsp;
                                                <input type="checkbox" name="equipment_straight_truck[]" value="1"/>&nbsp;Straight Truck&nbsp;
                                                <input type="checkbox" name="equipment_others[]" value="1"/>&nbsp;Others:
                                </div>
                                </div>
                                <div class="form-group col-md-12">
                                <label class="control-label col-md-3">Driving Experience : </label>
                                <div class="col-md-9">
                                    <input type="checkbox" name="driving_experince_local[]" value="1"/>&nbsp;Local&nbsp;
                                    <input type="checkbox" name="driving_experince_canada[]" value="1"/>&nbsp;Canada&nbsp;
                                    <input type="checkbox" name="driving_experince_canada_rocky_mountains[]" value="1"/>&nbsp;Canada : Rocky Mountains&nbsp;
                                    <input type="checkbox" name="driving_experince_usa[]" value="1"/>&nbsp;USA&nbsp;
                                </div>
                
                </div>
                <div id="more_div"></div>
                   <?php 
                }
                ?>
        
        <div id="add_more_div">
            <p>&nbsp;</p>
            <input type="hidden" name="count_past_emp" id="count_past_emp" value="<?php if(isset($sub3['emp'])){echo count($sub3['emp']);}else{?>1<?php }?>">
            <a href="javascript:void(0);" class="btn green" id="add_more">Add More</a>
        </div>
         <?php
         
         if(!isset($sub3['att']))
         $sub3['att'] = array();
                                                        if(!count($sub3['att']))
                                                        {?>
        <div class="form-group col-md-12">
            <label class="control-label col-md-3">Attach Document : </label>
            <div class="col-md-9">
            <input type="hidden" name="attach_doc[]" class="emp1" />
            <a href="javascript:void(0);" id="emp1" class="btn btn-primary">Browse</a> <span class="uploaded"></span>
            </div>
           </div>
           <?php }
           
           
           
           ?>
          <div class="form-group col-md-12">
            <div id="more_employ_doc" data-emp="<?php if(count($sub3['att']))echo count($sub3['att']);else echo '1';?>">
            <?php
                                                        if($sub3['att'])
                                                        {
                                                            $at=0;
                                                            foreach($sub3['att'] as $pa)
                                                            {
                                                                $at++;
                                                                ?>
                                                                <div class="del_append_employ"><label class="control-label col-md-3">Attach Document : </label><div class="col-md-6 pad_bot"><input type="hidden" class="emp<?php echo $at;?>" name="attach_doc[]" value="<?php echo $pa->attach_doc;?>" /><a href="#" id="emp<?php echo $at;?>" class="btn btn-primary">Browse</a> <?php if($at>1){?><a  href="javascript:void(0);" class="btn btn-danger" id="delete_employ_doc">Delete</a><?php }?> <span class="uploaded"><?php echo $pa->attach_doc;?>  <?php if($pa->attach_doc){$ext_arr = explode('.',$pa->attach_doc);$ext = end($ext_arr);$ext = strtolower($ext);if(!in_array($ext,$doc_ext)){?><img src="<?php echo $this->request->webroot;?>attachments/<?php echo $pa->attach_doc;?>" style="max-width:120px;" /><?php }else{ ?><a href="<?php echo $this->request->webroot;?>attachments/<?php echo $pa->attach_doc;?>">Download</a><?php } }?></span></div></div><div class="clearfix"></div>
                                                                <script>
                                                                $(function(){
                                                                    fileUpload('emp<?php echo $at;?>');
                                                                });
                                                                </script>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
            </div>
          </div>
          
          <div class="form-group col-md-12">
            <div class="col-md-3">
            </div>
            <div class="col-md-9">
                <a href="javascript:void(0);" class="btn btn-success moremore" id="add_more_employ_doc">Add More</a>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
</form>
<script>
$(function(){
    <?php
        if($this->request->params['action']=='addorder' || $this->request->params['action']=='add')
        {
            ?>
            fileUpload('emp1');
            <?php
        }
        ?>
   // 
  $("#add_more").click(function(){
    $.ajax({
       url:"<?php echo $this->request->webroot;?>subpages/documents/past_employer.php",
       success:function(res){
        $("#more_div").append(res);
        var c = $('#count_past_emp').val();
        var counter = parseInt(c)+1;
        $('#count_past_emp').attr('value',counter);
        $('.date-picker').datepicker({
                rtl: Metronic.isRTL(),
                orientation: "left",
                autoclose: true,
                format: 'yyyy-mm-dd'
            });
       }
    });
  });
  $("#delete").live("click",function(){
    $(this).parent().parent().remove(); 
    var c = $('#count_past_emp').val();
    var counter = parseInt(c)-1;
        $('#count_past_emp').attr('value',counter);
  }); 
  
  
  $('#add_more_employ_doc').click(function(){
    var count = $('#more_employ_doc').data('emp');
    $('#more_employ_doc').data('emp',parseInt(count)+1);
        $('#more_employ_doc').append('<div class="del_append_employ"><label class="control-label col-md-3">Attach Document : </label><div class="col-md-6 pad_bot"><input type="hidden" name="attach_doc[]" class="emp'+$('#more_employ_doc').data('emp')+'" /><a href="javascript:void(0);" id="emp'+$('#more_employ_doc').data('emp')+'" class="btn btn-primary">Browse</a> <a  href="javascript:void(0);" class="btn btn-danger" id="delete_employ_doc">Delete</a> <span class="uploaded"></span></div></div><div class="clearfix"></div>');
        fileUpload('emp'+$('#more_employ_doc').data('emp'));
       }); 
       
       $('#delete_employ_doc').live('click',function(){
        var count = $('#more_employ_doc').data('emp');
    $('#more_employ_doc').data('emp',parseInt(count)-1);
            $(this).closest('.del_append_employ').remove();
       });
 }); 
</script>