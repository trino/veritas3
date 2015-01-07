<form id="form_employment">
    <div class="portlet box blue ">
		<div class="portlet-title">
			<div class="caption">
				Employment History
			</div>
		</div>
        <div class="portlet-body form">
        	<div class="form-body">
                <h4><strong>Employer Information for Last 3 Years</strong></h4>
                <?php
                $counter=0;
                if(isset($sub3['emp']) && $sub3['emp'])
                {
                    foreach($sub3['emp'] as $emp)
                    {
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
                                        <div class="table-scrollable">
                                            <table class="table table-striped">
                                                <tr><th colspan="2">Past Employer</th></tr>
                                                <tr><td colspan="2">Company Name<input type="text" class="form-control" name="company_name[]" value="<?php echo $emp->company_name;?>" /></td></tr>
                                
                                                <tr><td>Address<input type="text" class="form-control" name="address[]" value="<?php echo $emp->address;?>" /></td>
                                                    <td>City<input type="text" class="form-control" name="city[]" value="<?php echo $emp->city;?>" /></td></tr>
                                                <tr><td>State/Province<input type="text" class="form-control" name="state_province[]" value="<?php echo $emp->state_province;?>" /></td>
                                                    <td>Country<input type="text" class="form-control" name="country[]" value="<?php echo $emp->country;?>" /></td></tr>
                                
                                                <tr><td>Supervisor's Name:<input type="text" class="form-control" name="supervisor_name[]" value="<?php echo $emp->supervisor_name;?>"/></td>
                                                    <td>Phone #:<input type="text" class="form-control" name="supervisor_phone[]" value="<?php echo $emp->supervisor_phone;?>"/></td></tr>
                                                <tr><td>Supervisor's Email:<input type="text" class="form-control" name="supervisor_email[]" value="<?php echo $emp->supervisor_email;?>"/></td>
                                                    <td>Secondary Email:<input type="text" class="form-control" name="supervisor_secondary_email[]" value="<?php echo $emp->supervisor_secondary_email;?>"/></td></tr>
                                                <tr><td>Employment Start Date:<input type="text" class="form-control date-picker" name="employment_start_date[]" value="<?php echo $emp->employment_start_date;?>"/></td>
                                                    <td>Employment End Date:<input type="text" class="form-control date-picker" name="employment_end_date[]" value="<?php echo $emp->employment_end_date;?>"/></td></tr>
                                                <tr><td>Claims with this Employer:&nbsp;&nbsp;<input type="radio" name="claims_with_employer[]" value="1" <?php if($emp->claims_with_employer == 1){?>checked="checked"<?php }?>/>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="radio" name="claims_with_employer[]" value="0" <?php if($emp->claims_with_employer == 0){?>checked="checked"<?php }?>/>&nbsp;&nbsp;&nbsp;&nbsp;No</td>
                                                    <td>Date Claims Occured:<input type="text" class="form-control" value="<?php echo $emp->claims_recovery_date;?>" name="claims_recovery_date[]"/></td></tr>
                                                <tr><td colspan="2">Employment history confirmed by (Verifier Use Only):<input type="text" class="form-control" value="<?php echo $emp->emploment_history_confirm_verify_use;?>" name="emploment_history_confirm_verify_use[]"/></td></tr>
                                                <tr><td colspan="2">US DOT MC/MX#:<input name="us_dot[]" type="text" class="form-control" value="<?php echo $emp->us_dot;?>" name="us_dot[]" /></td></tr>
                                                <tr><td>Signature:<input type="text" class="form-control" name="signature[]"/></td><td>
                                                Date/Time:<input type="text" class="form-control" value="<?php echo $emp->signature_datetime;?>" name="signature_datetime[]"/>
                                                </td></tr>
                                                <tr><td colspan="2" >
                                
                                                            <label class="control-label col-md-3">Equipment Operated : </label>
                                                                <input type="checkbox" <?php if($emp->equipment_vans == 1){?>checked="checked"<?php }?> name="equipment_vans[]" value="1"/>&nbsp;Vans&nbsp;
                                                                <input type="checkbox" <?php if($emp->equipment_reefer == 1){?>checked="checked"<?php }?> name="equipment_reefer[]" value="1"/>&nbsp;Reefers&nbsp;
                                                                <input type="checkbox" <?php if($emp->equipment_decks == 1){?>checked="checked"<?php }?> name="equipment_decks[]" value="1"/>&nbsp;Decks&nbsp;
                                                                <input type="checkbox" <?php if($emp->equipment_super == 1){?>checked="checked"<?php }?> name="equipment_super[]" value="1"/>&nbsp;Super B's&nbsp;
                                                                <input type="checkbox" <?php if($emp->equipment_straight_truck == 1){?>checked="checked"<?php }?> name="equipment_straight_truck[]" value="1"/>&nbsp;Straight Truck&nbsp;
                                                                <input type="checkbox" <?php if($emp->equipment_others == 1){?>checked="checked"<?php }?> name="equipment_others[]" value="1"/>&nbsp;Others:
                                
                                
                                
                                
                                
                                                 </td></tr>
                                                 <tr><td colspan="2">
                                                    <label class="control-label col-md-3">Driving Experience : </label>
                                                    <input type="checkbox" <?php if($emp->driving_experince_local == 1){?>checked="checked"<?php }?> name="driving_experince_local[]" value="1"/>&nbsp;Local&nbsp;
                                                    <input type="checkbox" <?php if($emp->driving_experince_canada == 1){?>checked="checked"<?php }?> name="driving_experince_canada[]" value="1"/>&nbsp;Canada&nbsp;
                                                    <input type="checkbox" <?php if($emp->driving_experince_canada_rocky_mountains == 1){?>checked="checked"<?php }?> name="driving_experince_canada_rocky_mountains[]" value="1"/>&nbsp;Canada : Rocky Mountains&nbsp;
                                                    <input type="checkbox" <?php if($emp->driving_experince_usa == 1){?>checked="checked"<?php }?> name="driving_experince_usa[]" value="1"/>&nbsp;USA&nbsp;
                                        
                                                  </td></tr>
                                        
                                        
                                        
                                        </table>
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
                <div class="table-scrollable">
                
                    <table class="table table-striped">
                                <tr><th colspan="2">Past Employer</th></tr>
                                <tr><td colspan="2">Company Name<input type="text" class="form-control" name="company_name[]" /></td></tr>
                
                                <tr><td>Address<input type="text" class="form-control" name="address[]" /></td>
                                    <td>City<input type="text" class="form-control" name="city[]" /></td></tr>
                                <tr><td>State/Province<input type="text" class="form-control" name="state_province[]" /></td>
                                    <td>Country<input type="text" class="form-control" name="country[]" /></td></tr>
                
                                <tr><td>Supervisor's Name:<input type="text" class="form-control" name="supervisor_name[]"/></td>
                                    <td>Phone #:<input type="text" class="form-control" name="supervisor_phone[]"/></td></tr>
                                <tr><td>Supervisor's Email:<input type="text" class="form-control" name="supervisor_email[]"/></td>
                                    <td>Secondary Email:<input type="text" class="form-control" name="supervisor_secondary_email[]"/></td></tr>
                                <tr><td>Employment Start Date:<input type="text" class="form-control date-picker" name="employment_start_date[]"/></td>
                                    <td>Employment End Date:<input type="text" class="form-control date-picker" name="employment_end_date[]"/></td></tr>
                                <tr><td>Claims with this Employer:&nbsp;&nbsp;<input type="radio" name="claims_with_employer[]" value="1"/>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="claims_with_employer[]" value="0"/>&nbsp;&nbsp;&nbsp;&nbsp;No</td>
                                    <td>Date Claims Occured:<input type="text" class="form-control" name="claims_recovery_date[]"/></td></tr>
                                <tr><td colspan="2">Employment history confirmed by (Verifier Use Only):<input type="text" class="form-control" name="emploment_history_confirm_verify_use[]"/></td></tr>
                                <tr><td colspan="2">US DOT MC/MX#:<input name="us_dot[]" type="text" class="form-control" name="us_dot[]" /></td></tr>
                
                
                        <tr><td>
                                        Signature:<input type="text" class="form-control" name="signature[]"/>
                
                                    </td><td>
                
                                        Date/Time:<input type="text" class="form-control" name="signature_datetime[]"/>
                
                
                                    </td></tr>
                                <tr><td colspan="2" >
                
                                            <label class="control-label col-md-3">Equipment Operated : </label>
                                                <input type="checkbox" name="equipment_vans[]" value="1"/>&nbsp;Vans&nbsp;
                                                <input type="checkbox" name="equipment_reefer[]" value="1"/>&nbsp;Reefers&nbsp;
                                                <input type="checkbox" name="equipment_decks[]" value="1"/>&nbsp;Decks&nbsp;
                                                <input type="checkbox" name="equipment_super[]" value="1"/>&nbsp;Super B's&nbsp;
                                                <input type="checkbox" name="equipment_straight_truck[]" value="1"/>&nbsp;Straight Truck&nbsp;
                                                <input type="checkbox" name="equipment_others[]" value="1"/>&nbsp;Others:
                
                
                
                
                
                                    </td></tr>
                
                
                
                        <tr><td colspan="2">
                
                
                
                
                                <label class="control-label col-md-3">Driving Experience : </label>
                                    <input type="checkbox" name="driving_experince_local[]" value="1"/>&nbsp;Local&nbsp;
                                    <input type="checkbox" name="driving_experince_canada[]" value="1"/>&nbsp;Canada&nbsp;
                                    <input type="checkbox" name="driving_experince_canada_rocky_mountains[]" value="1"/>&nbsp;Canada : Rocky Mountains&nbsp;
                                    <input type="checkbox" name="driving_experince_usa[]" value="1"/>&nbsp;USA&nbsp;
                
                            </td></tr>
                
                
                
                    </table>
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
        
        <div class="form-group col-md-12">
            <label class="control-label col-md-3">Attach Document : </label>
            <div class="col-md-9">
            <a href="javascript:void(0);" class="btn btn-primary">Browse</a>
            </div>
           </div>
           
          <div class="form-group col-md-12">
            <div id="more_employ_doc">
            </div>
          </div>
          
          <div class="form-group col-md-12">
            <div class="col-md-3">
            </div>
            <div class="col-md-9">
                <a href="javascript:void(0);" class="btn btn-success" id="add_more_employ_doc">Add More</a>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        </div>
    </div>
</form>
<script>
$(function(){
  $("#add_more").click(function(){
    $.ajax({
       url:"<?php echo $this->request->webroot;?>subpages/documents/past_employer.php",
       success:function(res){
        $("#more_div").append(res);
        var c = $('#count_past_emp').val();
        var counter = parseInt(c)+1;
        $('#count_past_emp').attr('value',counter);
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
        $('#more_employ_doc').append('<div class="del_append_employ"><label class="control-label col-md-3">Attach Document : </label><div class="col-md-6 pad_bot"><a href="javascript:void(0);" class="btn btn-primary">Browse</a><a  href="javascript:void(0);" class="btn btn-danger" id="delete_employ_doc">Delete</a></div></div><div class="clearfix"></div>')
       }); 
       
       $('#delete_employ_doc').live('click',function(){
            $(this).closest('.del_append_employ').remove();
       });
 }); 
</script>