<form id="form_education">
    <div class="portlet box blue ">
		<div class="portlet-title">
			<div class="caption">
				Education History
			</div>
		</div>
        <div class="portlet-body form">
			<div class="form-body">
            <h4><strong>Education Information for Last 3 Years</strong></h4>
    <?php
    $counter=0;
    if(isset($sub4['edu']) && $sub4['edu'])
    {
        foreach($sub4['edu'] as $emp)
        {
            $counter++;
            if($counter!=1)
            {
                if($counter==2)
                {
                    ?>
                <div id="more_edu">
                    <?php
                }
                ?>
                    <div id="toremove">
                <?php
            }
            ?>
                        <div class="table-scrollable">
                            <table class="table table-striped">
                                <tr><th colspan="2">Past Education</th></tr>
                                <tr><td colspan="2">School/College Name<input type="text" class="form-control" value="<?php echo $emp->college_school_name;?>" name="college_school_name[]" /></td></tr>
                                <tr><td colspan="2">Address<input type="text" class="form-control" name="address[]" value="<?php echo $emp->address;?>" /></td></tr>
                                <tr><td>Supervisor's Name:<input type="text" class="form-control" name="supervisior_name[]" value="<?php echo $emp->supervisior_name;?>"/></td>
                                    <td>Phone #:<input type="text" class="form-control" name="supervisior_phone[]" value="<?php echo $emp->supervisior_phone;?>/></td></tr>
                                <tr><td>Supervisor's Email:<input type="text" class="form-control" name="supervisior_email[]" value="<?php echo $emp->supervisior_email;?>"/></td>
                                    <td>Secondary Email:<input type="text" class="form-control" name="supervisior_secondary_email[]" value="<?php echo $emp->supervisior_secondary_email;?>"/></td></tr>
                                <tr><td>Education Start Date:<input type="text" class="form-control date-picker" name="education_start_date[]" value="<?php echo $emp->education_start_date;?>"/></td>
                                    <td>Education End Date:<input type="text" class="form-control date-picker" name="education_end_date[]" value="<?php echo $emp->education_end_date;?>"/></td></tr>
                                <tr><td>Claims with this Tutor:&nbsp;&nbsp;<input type="radio" name="claim_tutor[]" <?php if($emp->claim_tutor == '1'){?>checked="checked"<?php }?> value="1"/>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="claim_tutor[]" <?php if($emp->claim_tutor == '0'){?>checked="checked"<?php }?> value="0"/>&nbsp;&nbsp;&nbsp;&nbsp;No</td>
                                    <td>Date Claims Occured:<input type="text" class="form-control date-picker" name="date_claims_occur[]"/></td></tr>
                                <tr><td colspan="2">Education history confirmed by (Verifier Use Only):
                                <input type="text" class="form-control" name="education_history_confirmed_by[]"/></td></tr>
                                <tr><td colspan="2">
                
                
                                        <div class="form-group col-md-12">
                
                                            <label class="col-md-6 control-label">Highest grade completed : </label>
                                            <div class="col-md-6">
                                            <select name="highest_grade_completed[]" class="form-control">
                                            <?php
                                            for($i=1;$i<=8;$i++)
                                            {
                                                ?>
                                                <option <?php if($emp->highest_grade_completed == $i){?>selected="selected"<?php }?> value="<?php echo $i;?>"><?php echo $i;?></option>
                                                <?php
                                            }
                                            ?>
                                            </select>
                                            </div>
                                        </div>
                
                                        <div class="form-group col-md-12">
                                            <label class="col-md-6 control-label">High School : </label>
                                            <div class="col-md-6">
                                                <select name="high_school[]" class="form-control">
                                                <?php
                                                for($i=1;$i<=4;$i++)
                                                {
                                                    ?>
                                                    <option <?php if($emp->high_school == $i){?>selected="selected"<?php }?> value="<?php echo $i?>"><?php echo $i;?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            </div>
                                        </div>
                
                                        <div class="form-group col-md-12">
                                            <label class="col-md-6 control-label">College : </label>
                                            <div class="col-md-6">
                                                <select name="college[]" class="form-control">
                                                <?php
                                                for($i=1;$i<=4;$i++)
                                                {
                                                    ?>
                                                    <option <?php if($emp->college == $i){?>selected="selected"<?php }?> value="<?php echo $i?>"><?php echo $i;?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            </div>
                                        </div>
                
                                        <div class="form-group col-md-12">
                                            <label class="col-md-6 control-label">Last School attended : </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" value="<?php echo $emp->last_school_attended;?>" name="last_school_attended[]" />
                                            </div>
                                        </div>
                
                
                
                
                                    </td></tr>
                                <tr><td>Signature:<input type="text" class="form-control" value="<?php echo $emp->signature;?>" name="signature[]"/></td>
                                    <td>Date:<input type="text" class="form-control date-picker" value="<?php echo $emp->date_time;?>" name="date_time[]" /></td></tr>
                                
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
            <div id="more_edu"></div>
            <?php
        }
    }
    else
    {
       ?>
    <div class="table-scrollable">
        <table class="table table-striped">
                    <tr><th colspan="2">Past Education</th></tr>
                    <tr><td colspan="2">School/College Name<input type="text" class="form-control" name="college_school_name[]" /></td></tr>
                    <tr><td colspan="2">Address<input type="text" class="form-control" name="address[]" /></td></tr>
                    <tr><td>Supervisor's Name:<input type="text" class="form-control" name="supervisior_name[]"/></td>
                        <td>Phone #:<input type="text" class="form-control" name="supervisior_phone[]"/></td></tr>
                    <tr><td>Supervisor's Email:<input type="text" class="form-control" name="supervisior_email[]"/></td>
                        <td>Secondary Email:<input type="text" class="form-control" name="supervisior_secondary_email[]"/></td></tr>
                    <tr><td>Education Start Date:<input type="text" class="form-control date-picker" name="education_start_date[]"/></td>
                        <td>Education End Date:<input type="text" class="form-control date-picker" name="education_end_date[]"/></td></tr>
                    <tr><td>Claims with this Tutor:&nbsp;&nbsp;<input type="radio" name="claim_tutor[]" value="1"/>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="claim_tutor[]" value="0"/>&nbsp;&nbsp;&nbsp;&nbsp;No</td>
                        <td>Date Claims Occured:<input type="text" class="form-control date-picker" name="date_claims_occur[]"/></td></tr>
                    <tr><td colspan="2">Education history confirmed by (Verifier Use Only):
                    <input type="text" class="form-control" name="education_history_confirmed_by[]"/></td></tr>
                    <tr><td colspan="2">
    
    
                            <div class="form-group col-md-12">
    
                                <label class="col-md-6 control-label">Highest grade completed : </label>
                                <div class="col-md-6">
                                <select name="highest_grade_completed[]" class="form-control">
                                <?php
                                for($i=1;$i<=8;$i++)
                                {
                                    ?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php
                                }
                                ?>
                                </select>
                                </div>
                            </div>
    
                            <div class="form-group col-md-12">
                                <label class="col-md-6 control-label">High School : </label>
                                <div class="col-md-6">
                                    <select name="high_school[]" class="form-control">
                                    <?php
                                    for($i=1;$i<=4;$i++)
                                    {
                                        ?>
                                        <option value="<?php echo $i?>"><?php echo $i;?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                </div>
                            </div>
    
                            <div class="form-group col-md-12">
                                <label class="col-md-6 control-label">College : </label>
                                <div class="col-md-6">
                                    <select name="college[]" class="form-control">
                                    <?php
                                    for($i=1;$i<=4;$i++)
                                    {
                                        ?>
                                        <option value="<?php echo $i?>"><?php echo $i;?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                </div>
                            </div>
    
                            <div class="form-group col-md-12">
                                <label class="col-md-6 control-label">Last School attended : </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="last_school_attended[]" />
                                </div>
                            </div>
    
    
    
    
                        </td></tr>
                    <tr><td>Signature:<input type="text" class="form-control" name="signature[]"/></td>
                        <td>Date:<input type="text" class="form-control date-picker" name="date_time[]" /></td></tr>
                    
        </table>
    </div>
    <div id="more_edu"></div>
    <?php }?>
    <div id="add_more_edu">
        <p>&nbsp;</p>
        <input type="hidden" name="count_more_edu" id="count_more_edu" value="1" >    
        <a href="javascript:void(0);" class="btn green add_more_edu">Add More</a>
    </div>
    <div class="form-group col-md-12">
        <label class="control-label col-md-3">Attach Document : </label>
        <div class="col-md-9">
        <a href="javascript:void(0);" class="btn btn-primary">Browse</a>
        </div>
        </div>
        
        <div class="form-group col-md-12">
        <div id="more_edu_doc">
        </div>
        </div>
        
        <div class="form-group col-md-12">
        <div class="col-md-3">
        </div>
        <div class="col-md-9">
        <input type="hidden" name="count_more_edu_doc" id="count_more_edu_doc" value="1" >
            <a href="javascript:void(0);" class="btn btn-success" id="add_more_edu_doc">Add More</a>
        </div>
        </div>
        
        <div class="clearfix"></div>
    </div>
    </div>
    </div>
</form>
<script>
$(function(){
  $(".add_more_edu").click(function(){
    $.ajax({
       url:"<?php echo $this->request->webroot;?>subpages/documents/past_education.php",
       success:function(res){
        $("#more_edu").append(res);
        var current = $('#count_more_edu').val();
        var counter = parseInt(current)+1;
        
        $('#count_more_edu').attr('value',counter);
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
     var current = $('#count_more_edu').val();
     var counter = parseInt(current)-1;
        $('#count_more_edu').attr('value',counter);
  }); 
  
  $('#add_more_edu_doc').click(function(){
        $('#more_edu_doc').append('<div class="del_append_edu"><label class="control-label col-md-3">Attach Document : </label><div class="col-md-6 pad_bot"><a href="javascript:void(0);" class="btn btn-primary">Browse</a><a  href="javascript:void(0);" class="btn btn-danger" id="delete_edu_doc">Delete</a></div></div><div class="clearfix"></div>')
       }); 
       
       $('#delete_edu_doc').live('click',function(){
            $(this).closest('.del_append_edu').remove();
       });
  
 }); 
</script>