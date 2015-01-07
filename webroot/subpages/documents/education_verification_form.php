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

<!--div class="table-scrollable">
    <table class="table table-striped">
                
                <tr><td colspan="2">Name<input type="text" class="form-control" name="edu_name" /></td></tr>
                <tr><td>ID #:<input type="text" class="form-control" name="edu_id"/></td>
                    <td>Date of Birth:<input type="text" class="form-control" placeholder="MM/DD/YYYY" name="edu_date_of_birth"/></td></tr>
                <tr><td>Total Claims in Past 3 Years:<input type="text" class="form-control" name="edu_total_claim_past3"/></td>
                    <td>Current Education:<input type="text" class="form-control" name="edu_current"/></td></tr>
     </table>
</div-->

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
                    <td>Date Claims Occured:<input type="text" class="form-control" name="date_claims_occur[]"/></td></tr>
                <tr><td colspan="2">Education history confirmed by (Verifier Use Only):
                <input type="text" class="form-control" name="education_history_confirmed_by[]"/></td></tr>
                <tr><td colspan="2">


                        <div class="form-group col-md-12">

                            <label class="col-md-6 control-label">Highest grade completed : </label>
                            <div class="col-md-6">
                                <input type="radio" name="highest_grade_completed" value="1"/>&nbsp;&nbsp;1&nbsp;&nbsp;
                                <input type="radio" name="highest_grade_completed" value="2"/>&nbsp;&nbsp;2&nbsp;&nbsp;
                                <input type="radio" name="highest_grade_completed" value="3"/>&nbsp;&nbsp;3&nbsp;&nbsp;
                                <input type="radio" name="highest_grade_completed" value="4"/>&nbsp;&nbsp;4&nbsp;&nbsp;
                                <input type="radio" name="highest_grade_completed" value="5"/>&nbsp;&nbsp;5&nbsp;&nbsp;
                                <input type="radio" name="highest_grade_completed" value="6"/>&nbsp;&nbsp;6&nbsp;&nbsp;
                                <input type="radio" name="highest_grade_completed" value="7"/>&nbsp;&nbsp;7&nbsp;&nbsp;
                                <input type="radio" name="highest_grade_completed" value="8"/>&nbsp;&nbsp;8&nbsp;&nbsp;
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-6 control-label">High School : </label>
                            <div class="col-md-6">
                                <input type="radio" name="high_school" value="1"/>&nbsp;&nbsp;1&nbsp;&nbsp;
                                <input type="radio" name="high_school" value="2"/>&nbsp;&nbsp;2&nbsp;&nbsp;
                                <input type="radio" name="high_school" value="3"/>&nbsp;&nbsp;3&nbsp;&nbsp;
                                <input type="radio" name="high_school" value="4"/>&nbsp;&nbsp;4&nbsp;&nbsp;
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-6 control-label">College : </label>
                            <div class="col-md-6">
                                <input type="radio" name="college" value="1"/>&nbsp;&nbsp;1&nbsp;&nbsp;
                                <input type="radio" name="college" value="2"/>&nbsp;&nbsp;2&nbsp;&nbsp;
                                <input type="radio" name="college" value="3"/>&nbsp;&nbsp;3&nbsp;&nbsp;
                                <input type="radio" name="college" value="4"/>&nbsp;&nbsp;4&nbsp;&nbsp;
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-6 control-label">Last School attended : </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="last_school_attended" />
                            </div>
                        </div>




                    </td></tr>
                <tr><td>Signature:<input type="text" class="form-control" name="signature[]"/></td>
                    <td>Date/Time:<input type="text" class="form-control" name="date_time[]" /></td></tr>
                
    </table>
</div>
<div id="more_edu"></div>
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
       url:"<?php echo $this->request->webroot;?>subpages/past_education.php",
       success:function(res){
        $("#more_edu").append(res);
        var current = $('#count_more_edu').val();
        $('#count_more_edu').val(parseInt(current)+1);
       }
    });
  });
  $("#delete").live("click",function(){
    $(this).parent().parent().remove(); 
     var current = $('#count_more_edu').val();
        $('#count_more_edu').val(parseInt(current)-1);
  }); 
  
  $('#add_more_edu_doc').click(function(){
        $('#more_edu_doc').append('<div class="del_append_edu"><label class="control-label col-md-3">Attach Document : </label><div class="col-md-6 pad_bot"><a href="javascript:void(0);" class="btn btn-primary">Browse</a><a  href="javascript:void(0);" class="btn btn-danger" id="delete_edu_doc">Delete</a></div></div><div class="clearfix"></div>')
       }); 
       
       $('#delete_edu_doc').live('click',function(){
            $(this).closest('.del_append_edu').remove();
       });
  
 }); 
</script>