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

<?php /*<div class="table-scrollable">
    <table class="table table-striped">
                
                <tr><td colspan="2">Name<input type="text" class="form-control" /></td></tr>
                <tr><td>Driver's License #:<input type="text" class="form-control"/></td><td>Date of Birth:<input type="text" class="form-control" placeholder="MM/DD/YYYY"/></td></tr>
                <tr><td>Total Claims in Past 3 Years:<input type="text" class="form-control"/></td><td>Current Employer:<input type="text" class="form-control"/></td></tr>
     </table>
</div> */ ?>

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
                <tr><td>Employment Start Date:<input type="text" class="form-control" name="employment_start_date[]"/></td>
                    <td>Employment End Date:<input type="text" class="form-control" name="employment_end_date[]"/></td></tr>
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
<div id="add_more_div">
    <p>&nbsp;</p>
    <input type="hidden" name="count_past_emp" id="count_past_emp" value="1">
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
       url:"<?php echo $this->request->webroot;?>subpages/past_employer.php",
       success:function(res){
        $("#more_div").append(res);
        var c = $('#count_past_emp').val();
        $('#count_past_emp').val(parseInt(c)+1);
       }
    });
  });
  $("#delete").live("click",function(){
    $(this).parent().parent().remove(); 
    var c = $('#count_past_emp').val();
        $('#count_past_emp').val(parseInt(c)-1);
  }); 
  
  
  $('#add_more_employ_doc').click(function(){
        $('#more_employ_doc').append('<div class="del_append_employ"><label class="control-label col-md-3">Attach Document : </label><div class="col-md-6 pad_bot"><a href="javascript:void(0);" class="btn btn-primary">Browse</a><a  href="javascript:void(0);" class="btn btn-danger" id="delete_employ_doc">Delete</a></div></div><div class="clearfix"></div>')
       }); 
       
       $('#delete_employ_doc').live('click',function(){
            $(this).closest('.del_append_employ').remove();
       });
 }); 
</script>