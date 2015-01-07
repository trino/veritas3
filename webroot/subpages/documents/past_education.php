<div id="toremove">
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
                    <td>Date/Time:<input type="text" class="form-control" name="date_time[]" /></td></tr>
                
    </table>
</div>
<div class="delete">
    <a href="javascript:void(0);" class="btn red" id="delete">Delete</a>
</div>
  </div>  

 