<h4><strong>Employment History</strong></h4>
<h4><strong>Employer Information for Last 3 Years</strong></h4>

<div class="table-scrollable">
    <table class="table table-striped">
                
                <tr><td colspan="2">Name<input type="text" class="form-control" /></td></tr>
                <tr><td>Driver's License #:<input type="text" class="form-control"/></td><td>Date of Birth:<input type="text" class="form-control" placeholder="MM/DD/YYYY"/></td></tr>
                <tr><td>Total Claims in Past 3 Years:<input type="text" class="form-control"/></td><td>Current Employer:<input type="text" class="form-control"/></td></tr>
     </table>
</div>

<div class="table-scrollable">
    <table class="table table-striped">
                <tr><th>Past Employer</th></tr>
                <tr><td colspan="2">Company Name<input type="text" class="form-control" /></td></tr>
                <tr><td colspan="2">Address<input type="text" class="form-control" /></td></tr>
                <tr><td>Supervisor's Name:<input type="text" class="form-control"/></td><td>Phone #:<input type="text" class="form-control"/></td></tr>
                <tr><td>Supervisor's Email:<input type="text" class="form-control"/></td><td>Secondary Email:<input type="text" class="form-control"/></td></tr>
                <tr><td>Employment Start Date:<input type="text" class="form-control"/></td><td>Employment End Date:<input type="text" class="form-control"/></td></tr>
                <tr><td>Claims with this Employer:&nbsp;&nbsp;<input type="radio"/>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"/>&nbsp;&nbsp;&nbsp;&nbsp;No</td><td>Date Claims Occured:<input type="text" class="form-control"/></td></tr>
                <tr><td colspan="2">Employment history confirmed by (Verifier Use Only):<input type="text" class="form-control"/></td></tr>
                <tr><td>Signature:<input type="text" class="form-control"/></td><td>Date/Time:<input type="text" class="form-control" /></td></tr>
                
    </table>
</div>
<div id="more"></div>
<div id="add_more">
    <a href="javascript:void(0);" class="btn green add_more">Add More</a>
</div>

<script>
$(function(){
  $(".add_more").click(function(){
    $.ajax({
       url:"<?php echo WEB_ROOT;?>subpages/past_employer.php",
       success:function(res){
        $("#more").append(res);
       }
    });
  });
  $("#delete").live("click",function(){
    $(this).parent().parent().remove(); 
  }); 
  
 }); 
</script>