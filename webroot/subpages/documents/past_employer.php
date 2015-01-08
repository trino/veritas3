<div id="toremove"><div class="table-scrollable">
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
                    <td>Date Claims Occured:<input type="text" class="form-control date-picker" name="claims_recovery_date[]"/></td></tr>
                <tr><td colspan="2">Employment history confirmed by (Verifier Use Only):<input type="text" class="form-control" name="emploment_history_confirm_verify_use[]"/></td></tr>
                <tr><td colspan="2">US DOT MC/MX#:<input name="us_dot[]" type="text" class="form-control" name="us_dot[]" /></td></tr>


        <tr><td>
                        Signature:<input type="text" class="form-control" name="signature[]"/>

                    </td><td>

                        Date:<input type="text" class="form-control date-picker" name="signature_datetime[]"/>


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
<div class="delete">
    <a href="javascript:void(0);" class="btn red" id="delete">Delete</a>
</div>
  </div>  

 