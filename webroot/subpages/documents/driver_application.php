<form id="form_tab2">
<input type="hidden" class="document_type" name="document_type" value="Driver Application" id="af" />
<input type="hidden" name="sub_doc_id" value="<?php if(isset($_GET['doc_id']))echo $_GET['doc_id']; else echo $d->id ?>" id="af" />
<div class="clearfix"></div>
<hr />
<p>Welcome Prospective Drivers of Challenger. </p>
<p>Thank you for your interest in Challenger Motor Freight. In order to process your application in a timely manner, please complete all information requested including dates and contact information for your employment history. Please provide the following additional information.</p>
<!--p>We also require:</p>
<div class="table-scrollable">
    <table class="table table-striped">
        <tr><td>Original CVOR abstract (30 days old or less) for Ontario applicants.</td><td><a class="btn blue">Browse</a></td></tr>
        <tr><td>Original Drivers Abstract (30 days old or less)</td><td><a class="btn blue">Browse</a></td></tr>
        <tr><td>Copy of Drivers License</td><td><a class="btn blue">Browse</a></td></tr>
        <tr><td>Copy of your FAST card</td><td><a class="btn blue">Browse</a></td></tr>
        <tr><td>Original Criminal Record Search (within 90 days)</td><td><a class="btn blue">Browse</a></td></tr>
        <tr><td>Proof of Citizenship (birth certificate, passport or Canadian citizenship/US Visa)</td><td><a class="btn blue">Browse</a></td></tr>
        <tr><td>Completion of an on road evaluation</td><td><a class="btn blue">Browse</a></td></tr>
        </table>
        </div>
<p>Please return you application and above information to the Challenger Recruiting Department.</p-->

<div class="portlet box blue ">
	<div class="portlet-title">
		<div class="caption">
			Driver Application for Employment
		</div>
	</div>
	<div class="portlet-body form">
			<div class="form-body">
            <p>(Answer all questions)</p>
            <p>In compliance with Federal and Provincial equal employment opportunity laws, qualified applicants are considered for all positions without regard to race, colour, religion, sex, national origin, age, marital status, or the presence of a non-job related medical condition or handicap.</p>
            <div class="form-group col-md-12">
				<label class="control-label col-md-3">Name : </label>
				<div class="col-md-3">
					<input type="text" class="form-control" placeholder="Last" name="last_name"/>
				</div>
                <div class="col-md-3">
					<input type="text" class="form-control" placeholder="First" name="first_name"/>
				</div>
                <div class="col-md-3">
					<input type="text" class="form-control" placeholder="Middle" name="last_name"/>
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-3">Social Insurance No. : </label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="social_insurance_number"/>
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-3">Address : </label>
				<div class="col-md-3">
					<input type="text" class="form-control" placeholder="Street" name="street_address"/>
				</div>
                <div class="col-md-2">
					<input type="text" class="form-control" placeholder="City" name="city"/>
				</div>
                <div class="col-md-2">
					<input type="text" class="form-control" placeholder="Province" name="state_province"/>
				</div>
                <div class="col-md-2">
					<input type="text" class="form-control" placeholder="Postal Code" name="postal_code"/>
				</div>
			</div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-3">Address for past 3 years : </label>
            
            </div>
            
            <div class="form-group col-md-12">
                <div class="col-md-3">
    					<input type="text" class="form-control" placeholder="City" name="past3_city1"/>
    			</div>
                
                <div class="col-md-3">
					<input type="text" class="form-control" placeholder="Province" name="past3_state_provinve1"/>
				</div>
                <div class="col-md-3">
					<input type="text" class="form-control" placeholder="Postal Code" name="past3_postal_code1"/>
				</div>
                <div class="col-md-3">
					<input type="text" class="form-control" placeholder="Duration" name="past3_duration1"/>
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <div class="col-md-3">
    					<input type="text" class="form-control" placeholder="City" name="past3_city2"/>
    			</div>
                
                <div class="col-md-3">
					<input type="text" class="form-control" placeholder="Province" name="past3_state_province2"/>
				</div>
                <div class="col-md-3">
					<input type="text" class="form-control" placeholder="Postal Code" name="past3_postal_code2"/>
				</div>
                <div class="col-md-3">
					<input type="text" class="form-control" placeholder="Duration" name="past3_duration2"/>
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-2">Telephone : </label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="phone"/>
				</div>
                
                <label class="control-label col-md-2">Cell Phone : </label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="mobile"/>
				</div>
                
                <label class="control-label col-md-2">Email Address : </label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="email"/>
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-3">In case of emergency notify : </label>
				<div class="col-md-3">
					<input type="text" class="form-control" placeholder="Name" name="emergency_notify_name"/>
				</div>
                
                <div class="col-md-3">
					<input type="text" class="form-control" placeholder="Relationship" name="emergency_notify_relation"/>
				</div>
                <div class="col-md-3">
					<input type="text" class="form-control" placeholder="Phone" name="emergency_notify_phone"/>
				</div>
            </div>
            <div class="clearfix"></div>
            <hr/>
            
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-4">Have you worked for this company before? : </label>
				<div class="col-md-2">
					<input type="radio" id="worked_for_client_1" name="worked_for_client" value="1" />&nbsp;&nbsp;Yes&nbsp;&nbsp;
                    <input type="radio" id="worked_for_client_0" name="worked_for_client" value="0"/>&nbsp;&nbsp;No
				</div>
                <label class="control-label col-md-2">Where? : </label>
				<div class="col-md-4">
					<input type="text" class="form-control" name="worked_where"/>
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-2">Dates : From </label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="worked_start_date"/>
				</div>
                <label class="control-label col-md-1">To </label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="worked_end_date"/>
				</div>
                <label class="control-label col-md-2">Position </label>
				<div class="col-md-3">
					<input type="text" class="form-control" name="worked_position"/>
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-3">Reason for leaving </label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="reason_to_leave"/>
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-3">Are you now employed?: </label>
				<div class="col-md-2">
					<input type="radio" id="is_employed_1" name="is_employed" value="1"/>&nbsp;&nbsp;Yes&nbsp;&nbsp;
                    <input type="radio" id="is_employed_0" name="is_employed" value="0" />&nbsp;&nbsp;No
				</div>
                <label class="control-label col-md-5">If not, how long since leaving last employment? : </label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="unemployed_total_time"/>
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-3">Who referred you?: </label>
				<div class="col-md-3">
					<input type="text" class="form-control" name="referrer_name"/>
				</div>
                <label class="control-label col-md-3">Rate of pay expected : </label>
				<div class="col-md-3">
					<input type="text" class="form-control" name="rate_of_pay_excepted"/>
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-3">Date of Application : </label>
				<div class="col-md-3">
					<input type="text" class="form-control" name="date_of_application"/>
				</div>
                <label class="control-label col-md-3">Position(s) Applied for : </label>
				<div class="col-md-3">
					<input type="text" class="form-control" name="position_apply_for"/>
				</div>
            </div>
            
            <div class="clearfix"></div>
            <hr />
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-6">Are you 21 years of age or more? </label>
                <div class="col-md-6">
					<input type="radio" id="age_21_1" name="age_21" value="1" />&nbsp;&nbsp;Yes&nbsp;&nbsp;
                    <input type="radio" id="age_21_0" name="age_21" value="0"  />&nbsp;&nbsp;No
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-6">Can you provide proof of age?  </label>
                <div class="col-md-6">
					<input type="radio" id="proof_of_age_1" name="proof_of_age" value="1" />&nbsp;&nbsp;Yes&nbsp;&nbsp;
                    <input type="radio" id="proof_of_age_0" name="proof_of_age" value="0"  />&nbsp;&nbsp;No&nbsp;&nbsp;
                    (Required for Truck Drivers)
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-6">Have you ever been convicted of a criminal offence for which a pardon has not been granted?  </label>
                <div class="col-md-6">
					<input type="radio" id="convicted_criminal_1" name="convicted_criminal" value="1" />&nbsp;&nbsp;Yes&nbsp;&nbsp;
                    <input type="radio" id="convicted_criminal_0" name="convicted_criminal" value="0" />&nbsp;&nbsp;No
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-6">Have you ever been denied entry into the U.S? </label>
                <div class="col-md-6">
					<input type="radio" id="denied_entry_us_1" name="denied_entry_us" value="1" />&nbsp;&nbsp;Yes&nbsp;&nbsp;
                    <input type="radio" id="denied_entry_us_0" name="denied_entry_us" value="0"  />&nbsp;&nbsp;No
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-6">Have you ever tested positive for a controlled substance?  </label>
                <div class="col-md-6">
					<input type="radio" id="positive_controlled_substance_1" name="positive_controlled_substance" value="1" />&nbsp;&nbsp;Yes&nbsp;&nbsp;
                    <input type="radio" id="positive_controlled_substance_0" name="positive_controlled_substance" value="0"/>&nbsp;&nbsp;No
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-6">Have you ever refused a drug test? </label>
                <div class="col-md-6">
					<input type="radio" id="refuse_drug_test_1" name="refuse_drug_test" value="1"/>&nbsp;&nbsp;Yes&nbsp;&nbsp;
                    <input type="radio" id="refuse_drug_test_0" name="refuse_drug_test" value="0" />&nbsp;&nbsp;No
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-6">Had a breath alcohol test greater than 0.04? </label>
                <div class="col-md-6">
					<input type="radio" id="breath_alcohol_1" name="breath_alcohol" value="1" />&nbsp;&nbsp;Yes&nbsp;&nbsp;
                    <input type="radio" id="breath_alcohol_0" name="breath_alcohol" value="0" />&nbsp;&nbsp;No&nbsp;&nbsp;
                    (For a company to which you applied but did not work for)
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-3">Do you have a FAST card? </label>
                <div class="col-md-1">
					<input type="radio" id="fast_card_1" name="fast_card" value="1" />&nbsp;&nbsp;Yes&nbsp;&nbsp;
                    <input type="radio" id="fast_card_0" name="fast_card" value="0" />&nbsp;&nbsp;No
				</div>
                <label class="control-label col-md-2">Card Number </label>
                <div class="col-md-2">
					<input type="text" class="form-control" name="card_nmber"/>
                </div>
                
                <label class="control-label col-md-2">Expiry Date</label>
                <div class="col-md-2">
					<input type="text" class="form-control" name="card_expiry_date"/>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr />
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-10">Are there any reasons you may not be able to perform the functions of the position for which you have applied? : </label>
				<div class="col-md-2">
					<input type="radio" id="not_able_perform_function_position_1" name="not_able_perform_function_position" value="1"/>&nbsp;&nbsp;Yes&nbsp;&nbsp;
                    <input type="radio" id="not_able_perform_function_position_0" name="not_able_perform_function_position" value="0"/>&nbsp;&nbsp;No
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-3">If yes, please provide details </label>
                <div class="col-md-9">
                <textarea class="form-control" name="reason_not_perform_function_of_position"></textarea>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label class="control-label col-md-5">Are you physically capable of heavy manual work? : </label>
				<div class="col-md-2">
					<input type="radio" id="physical_capable_heavy_manual_work_1" name="physical_capable_heavy_manual_work" value="1" />&nbsp;&nbsp;Yes&nbsp;&nbsp;
                    <input type="radio" id="physical_capable_heavy_manual_work_0" name="physical_capable_heavy_manual_work" value="0" />&nbsp;&nbsp;No
				</div>
                <label class="control-label col-md-3">Ever injured on the job? : </label>
				<div class="col-md-2">
					<input type="radio" id="injured_on_job_1" name="injured_on_job" value="1" />&nbsp;&nbsp;Yes&nbsp;&nbsp;
                    <input type="radio" id="injured_on_job_0" name="injured_on_job" value="0"/>&nbsp;&nbsp;No
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-6">Give nature and degree of such injuries </label>
                <div class="col-md-6">
					<textarea class="form-control" name="give_nature_degree_of_injury"></textarea>
                </div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-6">How much time lost from work in the past three years for illness?  </label>
                <div class="col-md-6">
					<textarea class="form-control" name="total_time_loss_due_injury_past3"></textarea>
                </div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-6">Would you be willing to take a physical examination? : </label>
				<div class="col-md-6">
					<input type="radio" id="willing_physical_examination_1" name="willing_physical_examination" value="1"/>&nbsp;&nbsp;Yes&nbsp;&nbsp;
                    <input type="radio" id="willing_physical_examination_0" name="willing_physical_examination" value="0" />&nbsp;&nbsp;No
				</div>
            </div>
            <div class="clearfix"></div>
            <hr />
   </div>
 </div>
 </div>
   <div class="clearfix"></div>
   
<!--div class="portlet box blue ">
	<div class="portlet-title">
		<div class="caption">
			Employment History
		</div>
	</div>
	<div class="portlet-body form">
			<div class="form-body">
            <p>As per FMCSA regulations;please provide a complete work history for the past five (5) years, and include all commercial vehicle driving for the past ten (10) years. Please list employers in reverse order starting with the most recent, even if you were unemployed.</p>
            <div class="clearfix"></div>
            <hr />
            <div class="form-group col-md-12">
                <label class="control-label col-md-5">Current Period Of Unemployment(if any) From:</label>
                <div class="col-md-3">
					<input type="text" class="form-control"/>
                </div>
                <label class="control-label col-md-1">To:</label>
                <div class="col-md-3">
					<input type="text" class="form-control"/>
                </div>
            </div>
            
            <div class="form-group col-md-12">
				<label class="control-label col-md-3">Employer : </label>
				<div class="col-md-9">
					<input type="text" class="form-control"/>
				</div>
            </div>
            
            
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-3">Address : </label>
                <div class="col-md-3">
					<input type="text" class="form-control" placeholder="City"/>
				</div>
                <div class="col-md-3">
					<input type="text" class="form-control" placeholder="Province"/>
				</div>
                <div class="col-md-3">
					<input type="text" class="form-control" placeholder="Postal Code"/>
				</div>
			</div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-3">Dates : From </label>
				<div class="col-md-3">
					<input type="text" class="form-control" placeholder="MM/YYYY"/>
				</div>
                <label class="control-label col-md-3">To </label>
				<div class="col-md-3">
					<input type="text" class="form-control" placeholder="MM/YYYY"/>
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-3">Phone Number : </label>
                <div class="col-md-3">
					<input type="text" class="form-control"/>
				</div>
                <label class="control-label col-md-3">Position Held : </label>
                <div class="col-md-3">
					<input type="text" class="form-control"/>
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-3">Reason for Leaving : </label>
                <div class="col-md-9">
					<textarea class="form-control"></textarea>
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-3">Equipment Operated : </label>
                <div class="col-md-6">
					<input type="checkbox"/>&nbsp;Vans&nbsp;
                    <input type="checkbox"/>&nbsp;Reefers&nbsp;
                    <input type="checkbox"/>&nbsp;Decks&nbsp;
                    <input type="checkbox"/>&nbsp;Super B's&nbsp;
                    <input type="checkbox"/>&nbsp;Straight Truck&nbsp;
                    <input type="checkbox"/>&nbsp;Others:
                    </div>
                    <div class="col-md-3"><input type="text" class="form-control" />
                    </div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-3">Driving Experience : </label>
                <div class="col-md-6">
					<input type="checkbox"/>&nbsp;Local&nbsp;
                    <input type="checkbox"/>&nbsp;Canada&nbsp;
                    <input type="checkbox"/>&nbsp;Canada : Rocky Mountains&nbsp;
                    <input type="checkbox"/>&nbsp;USA&nbsp;
                    </div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-10">Was your job designated as a safety-sensitive function in any DOT-regulated mode subject to drug and alcohol testing requirements of 49 CFR Part 40?</label>
                <div class="col-md-2">
					<input type="radio"/>&nbsp;Yes&nbsp;
                    <input type="radio"/>&nbsp;No&nbsp;
                </div>
            </div>
            
            <div class="clearfix"></div>
            <hr/>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-5">Period Of Unemployment(if any) From:</label>
                <div class="col-md-3">
					<input type="text" class="form-control"/>
                </div>
                <label class="control-label col-md-1">To:</label>
                <div class="col-md-3">
					<input type="text" class="form-control"/>
                </div>
            </div>
            
            <div class="form-group col-md-12">
				<label class="control-label col-md-3">Employer : </label>
				<div class="col-md-9">
					<input type="text" class="form-control"/>
				</div>
            </div>
            
            
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-3">Address : </label>
                <div class="col-md-3">
					<input type="text" class="form-control" placeholder="City"/>
				</div>
                <div class="col-md-3">
					<input type="text" class="form-control" placeholder="Province"/>
				</div>
                <div class="col-md-3">
					<input type="text" class="form-control" placeholder="Postal Code"/>
				</div>
			</div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-3">Dates : From </label>
				<div class="col-md-3">
					<input type="text" class="form-control" placeholder="MM/YYYY"/>
				</div>
                <label class="control-label col-md-3">To </label>
				<div class="col-md-3">
					<input type="text" class="form-control" placeholder="MM/YYYY"/>
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-3">Phone Number : </label>
                <div class="col-md-3">
					<input type="text" class="form-control"/>
				</div>
                <label class="control-label col-md-3">Position Held : </label>
                <div class="col-md-3">
					<input type="text" class="form-control"/>
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-3">Reason for Leaving : </label>
                <div class="col-md-9">
					<textarea class="form-control"></textarea>
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-3">Equipment Operated : </label>
                <div class="col-md-6">
					<input type="checkbox"/>&nbsp;Vans&nbsp;
                    <input type="checkbox"/>&nbsp;Reefers&nbsp;
                    <input type="checkbox"/>&nbsp;Decks&nbsp;
                    <input type="checkbox"/>&nbsp;Super B's&nbsp;
                    <input type="checkbox"/>&nbsp;Straight Truck&nbsp;
                    <input type="checkbox"/>&nbsp;Others:
                    </div>
                    <div class="col-md-3"><input type="text" class="form-control" />
                    </div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-3">Driving Experience : </label>
                <div class="col-md-6">
					<input type="checkbox"/>&nbsp;Local&nbsp;
                    <input type="checkbox"/>&nbsp;Canada&nbsp;
                    <input type="checkbox"/>&nbsp;Canada : Rocky Mountains&nbsp;
                    <input type="checkbox"/>&nbsp;USA&nbsp;
                    </div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-10">Was your job designated as a safety-sensitive function in any DOT-regulated mode subject to drug and alcohol testing requirements of 49 CFR Part 40?</label>
                <div class="col-md-2">
					<input type="radio"/>&nbsp;Yes&nbsp;
                    <input type="radio"/>&nbsp;No&nbsp;
                </div>
            </div>
            
            <div class="clearfix"></div>
            <hr/>
            <div class="more_form"></div>
            <a href="javascript:void(0);" class="btn green" id="add_more_form">Add More</a>
             <div class="clearfix"></div>
            </div>
    </div>
   
</div>
 <div class="clearfix"></div-->
 
 <div class="portlet box blue ">
	<div class="portlet-title">
		<div class="caption">
			Accident Record For Past 5 Years or More
		</div>
	</div>
	<div class="portlet-body form">
        <div class="form-body">
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-6">Date : </label>
                <div class="col-md-6">
					<input type="text" class="form-control" name="date_of_accident[]"/>
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-6">Nature of Accident(Head-On, Rear-End, Upset, etc.) : </label>
                <div class="col-md-6">
					<textarea class="form-control" name="nature_of_accident[]"></textarea>
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-6">Fatalities : </label>
                <div class="col-md-6">
					<textarea class="form-control" name="fatalities[]"></textarea>
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-6">Injuries : </label>
                <div class="col-md-6">
					<textarea class="form-control" name="injuries[]"></textarea>
				</div>
            </div>
            
            <div class="clearfix"></div>
            <hr />
            
            <h4>Last Accident</h4>
            <div class="form-group col-md-12">
                <label class="control-label col-md-6">Date : </label>
                <div class="col-md-6">
					<input type="text" class="form-control" name="date_of_accident[]"/>
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-6">Nature of Accident(Head-On, Rear-End, Upset, etc.) : </label>
                <div class="col-md-6">
					<textarea class="form-control" name="nature_of_accident[]"></textarea>
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-6">Fatalities : </label>
                <div class="col-md-6">
					<textarea class="form-control" name="fatalities[]"></textarea>
				</div>
            </div>
            
            <div class="form-group col-md-12">
                <label class="control-label col-md-6">Injuries : </label>
                <div class="col-md-6">
					<textarea class="form-control" name="injuries[]"></textarea>
				</div>
            </div>
            
            <div class="clearfix"></div>
            <hr />
            <div class="more_acc_record"></div>
            <input type="hidden" id="count_acc_record" name="count_acc_record" value="2">
            <a href="javascript:void(0);" class="add_more_acc_record btn green">Add More</a>
            
            <div class="clearfix"></div>
            <hr />
            
        </div>
    </div>
</div>
<div class="clearfix"></div>


            <div class="clearfix"></div>
            <div class="table-scrollable">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="center"  style="width: 20%;">Driver Licenses</th>
                        <th class="center"  style="width: 20%;">Province</th>
                        <th class="center"  style="width: 20%;">License Number</th>
                        <th class="center"  style="width: 20%;">Class</th>
                        <th class="center"  style="width: 20%;">Expiration Date</th>
                    </tr>
                </thead>
                <tr>
                <?php 
                    $i=0;
                    if(isset($sub['da_li_detail']) && $sub['da_li_detail']){
                    foreach($sub['da_li_detail'] as $da_li){
                        $dl[$i] = $da_li->driver_license;
                        $dp[$i] = $da_li->province;
                        $dln[$i] = $da_li->license_number;
                        $dc[$i] = $da_li->class;
                        $de[$i] = $da_li->expiration_date;
                        $i++;
                    }
                    }
                    if($i<=2)
                    {
                        for($j=$i;$j<=2;$j++)
                        {
                            $dl[$j] = '';
                        $dp[$j] = '';
                        $dln[$j] = '';
                        $dc[$j] = '';
                        $de[$j] = '';
                        }
                    }
                    ?>
                    <td>
                    
                    
                    <input type="text" class="form-control" name="driver_license[]" value="<?php echo $dl[0]?>" /></td>
                    <td><input type="text" class="form-control" name="province[]" value="<?php echo $dp[0]?>"/></td>
                    <td><input type="text" class="form-control" name="license_number[]" value="<?php echo $dln[0]?>"/></td>
                    <td><input type="text" class="form-control" name="class[]" value="<?php echo $dc[0]?>"/></td>
                    <td><input type="text" class="form-control" name="expiration_date[]" value="<?php echo $de[0]?>"/></td>
                </tr>
                <tr>
                    <td>
                    
                    
                    <input type="text" class="form-control" name="driver_license[]" value="<?php echo $dl[1]?>" /></td>
                    <td><input type="text" class="form-control" name="province[]" value="<?php echo $dp[1]?>"/></td>
                    <td><input type="text" class="form-control" name="license_number[]" value="<?php echo $dln[1]?>"/></td>
                    <td><input type="text" class="form-control" name="class[]" value="<?php echo $dc[1]?>"/></td>
                    <td><input type="text" class="form-control" name="expiration_date[]" value="<?php echo $de[1]?>"/></td>
                </tr>
                <tr>
                    <td>
                    
                    
                    <input type="text" class="form-control" name="driver_license[]" value="<?php echo $dl[2]?>" /></td>
                    <td><input type="text" class="form-control" name="province[]" value="<?php echo $dp[2]?>"/></td>
                    <td><input type="text" class="form-control" name="license_number[]" value="<?php echo $dln[2]?>"/></td>
                    <td><input type="text" class="form-control" name="class[]" value="<?php echo $dc[2]?>"/></td>
                    <td><input type="text" class="form-control" name="expiration_date[]" value="<?php echo $de[2]?>"/></td>
                </tr>
            </table>
            </div>
            
            <div class="form-group col-md-12">
										<label class="col-md-9 control-label">A) Have you ever been denied a license, permit or privilege to operate a motor vehicle? </label>
										<div class="col-md-3">
                                            <input type="radio" id="ever_been_denied_1" name="ever_been_denied" value="1" />&nbsp;&nbsp;Yes&nbsp;&nbsp;
                                            <input type="radio" id="ever_been_denied_0" name="ever_been_denied" value="0" />&nbsp;&nbsp;No&nbsp;&nbsp;
                                        </div>
            </div>
            
            <div class="form-group col-md-12">
										<label class="col-md-9 control-label">B) Has any license, permit or privilege ever been suspended or revoked?</label>
										<div class="col-md-3">
                                            <input type="radio" id="suspend_any_license_1" name="suspend_any_license" value="1" />&nbsp;&nbsp;Yes&nbsp;&nbsp;
                                            <input type="radio" id="suspend_any_license_0" name="suspend_any_license" value="0" />&nbsp;&nbsp;No&nbsp;&nbsp;
                                        </div>
            </div>
            <label class="col-md-9 control-label">If the answer to either A or B is Yes, attach statement giving details.</label>
            <div class="clearfix"></div>
            <hr />
            
            <div class="table-scrollable">
            <table class="table table-striped">
            
                    <tr>
                        <th class="center"  style="width: 25%;">Class of equipment</th>
                        <th class="center"  style="width: 25%;">Type of equipment<br />(Van,Tank,Flat,etc)</th>
                        <th class="center"  style="width: 25%;" colspan="2">Dates<br />From&nbsp;&nbsp;&nbsp;&nbsp;To</th>
                        <th class="center"  style="width: 25%;">Approx. No. of miles<br />(Total)</th>
                    </tr>
                    <tr><td class="center">Straight Truck</td>
                        <td><input type="text" class="form-control" name="straight_truck_type" /></td>
                        <td><input type="text" class="form-control" name="straight_truck_start_date" /></td>
                        <td><input type="text" class="form-control" name="straight_truck_end_date" /></td>
                        <td><input type="text" class="form-control" name="straight_truck_miles" /></td>
                    </tr>
                    <tr><td class="center">Tractor and Semi-Trailer</td>
                        <td><input type="text" class="form-control" name="tractor_semi_types" /></td>
                        <td><input type="text" class="form-control" name="tractor_semi_start_date" /></td>
                        <td><input type="text" class="form-control" name="tractor_semi_end_date" /></td>
                        <td><input type="text" class="form-control" name="tractor_miles" /></td
                            ></tr>
                    <tr><td class="center">Tractor-Two Trailers</td>
                        <td><input type="text" class="form-control" name="tractor_two_types" /></td>
                        <td><input type="text" class="form-control" name="tractor_two_start_date" /></td>
                        <td><input type="text" class="form-control" name="tractor_two_end_date" /></td>
                        <td><input type="text" class="form-control" name="tractor_two_miles" /></td>
                    </tr>
                    <tr><td class="center">Other</td>
                        <td><input type="text" class="form-control" name="other_types" /></td>
                        <td><input type="text" class="form-control" name="other_start_date" /></td>
                        <td><input type="text" class="form-control" name="other_end_date" /></td>
                        <td><input type="text" class="form-control" name="other_miles" /></td>
                    </tr>
            </table>
            </div>
            
            <div class="form-group col-md-12">
										<label class="col-md-6 control-label">List states operated for in five years : </label>
										<div class="col-md-6">
                                            <textarea class="form-control" name="list_states_operated_5year"></textarea>
                                        </div>
            </div>
            
             <div class="form-group col-md-12">
										<label class="col-md-6 control-label">Which safe driving awards do you hold and for whom? </label>
										<div class="col-md-6">
                                            <textarea class="form-control" name="safe_driving_award_hold_whom"></textarea>
                                        </div>
            </div>
            
        <div class="clearfix"></div>
            
            <div class="portlet box blue ">
            	<div class="portlet-title">
            		<div class="caption">
            			Medical Declaration
            		</div>
            	</div>
            	<div class="portlet-body form">
                    <div class="form-body">
            <p>
            On March 30, 1999, Transport Canada and U.S. Federal Highway Administration (FHWA) entered into a reciprocal agreement regarding the physical requirements for a Canadian driver of a commercial vehicle in the U.S., as currently contained in the Federal Motor Carrier Safety Regulations, Part 391.41 et seq, and vice-versa. The reciprocal agreement removes the requirement for a Canadian driver to carry a copy of a medical examiner's certificate indicating that the driver is physically qualified. (In effect, the existence of valid driver's license issued by a province in Canada is deemed to be proof that a driver is physically qualified to drive in the U.S.) However, FHWA will not recognize a Provincial license if the driver has certain medical conditions and those conditions would prohibit him from driving in the U.S.
            </p>
            <div class="col-md-12">
            <div class="col-md-1">
                I, 
            </div>
                <div class="col-md-4 ">
                    <input type="text" class="form-control" name="medical_certify_name" />
                </div>
                <div class="col-md-7">
                certify that I am qualified to operate a commercial motor vehicle in the United States.
                 </div>
                 </div>
            <p>I further certify that:</p>
            <ol>
                <li>I have no clinical diagnosis of diabetes currently requiring insulin for control.</li>
                <li>I have no established medical history or clinical diagnosis of epilepsy.</li>
                <li>I do not have impaired hearing. (A driver must be able to first perceive a forced whispered voice in the better ear at not less than 5 feet with or without the use of a hearing aid, or does not have an average hearing loss in the better ear greater than 40 decibels at 500Hz, 1000Hz, or 2000Hz with or without a hearing aid when tested by an audiometric device calibrated to American National Standard Z24.5-1951.)</li>
                <li>I have not been issued a waiver by any Canadian Province allowing me to operate a commercial motor vehicle pursuant to Section 20 or 21 of Ontario Regulation 340\94.</li>
            </ol>
            <p>I further agree to inform Challenger Motor Freight Inc. should my medical status change, or if I can no longer certify conditions A to D, described above.</p>
            
             <div class="form-group col-md-12">
                                    <div class="col-md-6">
										<input type="text" class="form-control" placeholder="Date" name="medical_certify_date"/>
                                        </div>
                                        <div class="col-md-6">
			                             <input type="text" class="form-control" placeholder="Signature" name="medical_certify_signature"/>
                                         </div>
            </div>
            
            <div class="clearfix"></div>
            <hr />
            
                    </div>
                </div>
                
            </div>
            


            <div class="portlet box blue ">
            	<div class="portlet-title">
            		<div class="caption">
            			To be read and signed by applicant
            		</div>
            	</div>
            	<div class="portlet-body form">
                    <div class="form-body">
                    <p>THIS CERTIFIES THAT THIS APPLICATION WAS COMPLETED BY ME, AND THAT ALL ENTRIES ON IT AND INFORMATION IN IT ARE TRUE AND COMPLETE TO THE BEST OF MY KNOWLEDGE. I AUTHORIZE YOU TO MAKE SUCH INVESTIGATIONS AND INQUIRIES OF MY PERSONAL, EMPLOYMENT, FINANCIAL OR MEDICAL HISTORY AND OTHER RELATED MATTERS AS MAY BE NECESSARY IN ARRIVING AT AN EMPLOYMENT DECISION. I HEREBY RELEASE EMPLOYERS, SCHOOLS OR PERSONS FROM ALL LIABILITY IN RESPONDING TO INQUIRIES IN CONNECTION WITH MY APPLICATION.IN THE EVENT OF EMPLOYMENT, I UNDERSTAND THAT FALSE OR MISLEADING INFORMATION GIVEN IN MY APPLICATION OR INTERVIEW(S) MAY RESULT IN DISCHARGE. I UNDERSTAND, ALSO, THAT I AM REQUIRED TO ABIDE BY ALL RULES AND REGULATIONS OF THE COMPANY, AS PERMITTED BY LAW.I UNDERSTAND THAT I HAVE THE RIGHT TO REVIEW INFORMATION PROVIDED BY PREVIOUS EMPLOYERS, HAVE ERRORS CORRECTED BY PREVIOUS EMPLOYER AND RESUBMITTED TO CHALLENGER MOTOR FREIGHT INC AND /OR HAVE A REBUTTAL STATEMENT ATTACHED TO ERRONEOUS INFORMATION IF MY PREVIOUS EMPLOYER AND I CANNOT AGREE ON THE ACCURACY OF THE INFORMATION. I UNDERSTAND THAT I MUST REQUEST PAST EMPLOYER INFORMATION OBTAINED BY CHALLENGER MOTOR FREIGHT INC IN WRITING WITHIN 30-DAYS OF EMPLOYMENT OR DENIAL OF EMPLOYMENT.</p>
                    <div class="form-group col-md-12">
                                    <div class="col-md-6">
										<input type="text" class="form-control" placeholder="Date" name="read_sign_date"/>
                                        </div>
                                        <div class="col-md-6">
			                             <input type="text" class="form-control" placeholder="Signature" name="read_signature"/>
                                         </div>
                       </div>
                       <div class="clearfix"></div>
                    </div>
                </div>
             </div>

             <div class="portlet box blue ">
            	<div class="portlet-title">
            		<div class="caption">
            			Certification of compliance with driver license requirements
            		</div>
            	</div>
            	<div class="portlet-body form">
                    <div class="form-body">
                    <p>MOTOR CARRIER INSTRUCTIONS: The requirements in Part 383 apply to every driver who operates in intrastate, interstate, or foreign commerce and operates a vehicle weighing 26,001 pounds or more, can transport more than 15 people, or transports hazardous materials that require placarding.</p>
                    <p>The requirements in Part 391 apply to every driver who operates in interstate commerce and operates a vehicle weighing 10,001 pounds or more, can transport more than 15 people, or transports hazardous materials that require placarding.</p>
                    <p>DRIVER REQUIREMENTS: Parts 383 and 391 of the Federal Motor Carrier Safety Regulations contain some requirements that you as a driver must comply with. These requirements are in effect as of July 1, 1987. They are as follows:</p>
                    <p>A) You, as a commercial vehicle driver, may not possess more than one license. The only exception is if a state requires you to have more than one license. This exception is allowed until January 1, 1990.</p>
                    <p>If you currently have more than one license, you should keep the license from your state of residence and return the additional licenses to the states that issued them. DESTROYING a license does not close the record in the state that issued it; you must notify the state. If a multiple license has been lost, stolen, or destroyed, you should close your record by notifying the state of issuance that you no longer want to be licensed by that state.</p>
                    <p>B) Part 392.42 and Part 383.33 of the Federal Motor Carrier Safety Regulations require that you notify your employer the NEXT BUSINESS DAY of any revocation or suspension of your driver's license. In addition, Part 383.31 requires that any time you violate a state or local traffic law (other than parking), you must report it to your employing motor carrier and the state that issued your license within 30 days.</p>
                    <p>DRIVER CERTIFICATION: I certify that I have read and understand the above requirements.</p>
                    <p>The following license is the only one I will possess:</p>
                    <div class="form-group col-md-12">
                            <div class="col-md-3"> 
                                <label class="control-label">Driver's License No.</label>
                            </div>
                            <div class="col-md-3">
    							<input type="text" class="form-control" name="posses_driver_license_no"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Province</label>
                            </div>
                            <div class="col-md-3">
                                 <input type="text" class="form-control" name="posses_province"/>
                            </div>
                       </div>
                       <div class="form-group col-md-12">
                            <div class="col-md-3"> 
                                <label class="control-label">Exp. Date</label>
                            </div>
                            <div class="col-md-3">
    							<input type="text" class="form-control" name="posses_expiry_date"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Driver's Signature </label>
                            </div>
                            <div class="col-md-3">
                                 <input type="text" class="form-control" name="posses_driver_signature"/>
                            </div>
                       </div>
                       <div class="form-group col-md-12">
                            <div class="col-md-3"> 
                                <label class="control-label">Notes </label>
                            </div>
                            <div class="col-md-9">
    							<textarea class="form-control" name="posses_notes"></textarea>
                            </div>
                       </div>
                       
                <div class="clearfix"></div>
                    </div>
                </div>
                </div>

                <!--div class="portlet box blue ">
            	<div class="portlet-title">
            		<div class="caption">
            			Request and consent for information from previous employer
            		</div>
            	</div>
            	<div class="portlet-body form">
                    <div class="form-body">
                    
                    <p>
                    <div class="form-group col-md-12">
                        <div class="col-md-2"><label class="control-label">I,</label></div> 
                            <div class="col-md-6">
                                <input type="text" class="form-control" />
                            </div>
                            <div class="col-md-4">
                            <label class="control-label">
                            , hereby authorize that:
                            </label>
                            </div>
                    </div>
                    </p>
                    <div class="form-group col-md-12">
                        <div class="col-md-2"><label class="control-label">Previous Employer:</label></div>
                        <div class="col-md-5">
                        <input type="text" class="form-control" />
                    </div> 
                    <div class="col-md-2"><label class="control-label">Telephone:</label></div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" />
                    </div>
                    </div>
                    <div class="col-md-12 form-group">
                    <p>May release and forward information requested by section 2 (page 2) of this document concerning my past employment record and Alcohol/Controlled Substances testing records to:  </p>
                    </div>
                    
                    <div class="form-group col-md-12">
                    
                        <label class="control-label col-md-3">Prospective Employer : </label>
                        <div class="col-md-3">
        					<input type="text" class="form-control"/>
        				</div>
                        
                        <label class="control-label col-md-3">Telephone : </label>
                        <div class="col-md-3">
        					<input type="text" class="form-control"/>
        				</div>
                        
                    </div>
            
                    <div class="form-group col-md-12">
                        <label class="control-label col-md-3">Attention : </label>
                        <div class="col-md-3">
        					<input type="text" class="form-control"/>
        				</div>
                        
                        <label class="control-label col-md-3">Fax No : </label>
                        <div class="col-md-3">
        					<input type="text" class="form-control"/>
        				</div>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <label class="control-label col-md-3">Address : </label>
                        <div class="col-md-9">
        					<input type="text" class="form-control"/>
        				</div>
                    </div>
                    
                    <div class="col-md-12">
                    <p>I hereby authorize you or your agents, as my previous employer or company, to release all information concerning dates of employment, oral or written assessments of my job performance, over all work performance including safety records, reason for leaving and eligibility for rehire to Challenger Motor Freight Inc. for the purpose of investigations as required by Section 391.23 of the Federal Motor Carrier Safety Regulations.</p>
                    <p>I also hereby authorize you or your agents, as my previous employer or company to release the information concerning my Alcohol and Controlled Substances Testing during the past three years; (1) alcohol tests with a result of 0.04 or higher alcohol concentration; (2) verified positive controlled substances test results; (3) refusals to be tested (including verified adulterated or substituted drug test results; (4) other violations of the DOT agency drug and alcohol testing regulations; (5) with respect to any employee who violated a DOT drug and alcohol regulation, documentation of the employees successful or failure to completion of DOT return to duty requirements (including follow up tests) and the name and phone number of any substance abuse professional who evaluated me over the past three years</p>
                    <p>You are released from any liability, which may result from giving such information; I understand that the information in this form will be used and that prior employers will be contacted for purposes of investigation as required by 391.23 of the Motor Carrier Safety Regulation. For the purpose of facilitating this verification request I consent to providing my Social Insurance Number <div class="col-md-3 form-group"><input type="text" class="form-control" /></div>.</p>
                    </div>
                    <div class="col-md-12">
                    <p>I understand that I have the right to review information provided by previous employers, have errors corrected by previous employer and resubmitted to Challenger Motor Freight Inc and /or have a rebuttal statement attached to erroneous information if my previous employer and I cannot agree on the accuracy of the information. I understand that I must request past employer information obtained by Challenger Motor Freight Inc in writing within 30-days of employment or denial or employment.</p>
                    <p>This request is in compliance with 49 CFR Part 40, 49 CFR 391.23, 382.413 and 382.405</p>
                    </div>
                    
                    <div class="form-group col-md-12">
                                    <div class="col-md-6">
										<input type="text" class="form-control" placeholder="Date"/>
                                        </div>
                                        <div class="col-md-6">
			                             <input type="text" class="form-control" placeholder="Applicant's Signature"/>
                                         </div>
                       </div>
                    <div class="clearfix"></div>
                    </div>
                </div>
                </div>

                <div class="portlet box blue ">
            	<div class="portlet-title">
            		<div class="caption">
            			IMPORTANT NOTICE
            		</div>
            	</div>
            	<div class="portlet-body form">
                    <div class="form-body">
                    <strong>Regarding background reports from THEPSP Online Service</strong>       
                        <p>In connection with your application for employment with Challenger ("Prospective Employer"), it may obtain one or more reports regarding your driving, and safety inspection history from the Federal Motor Carrier Safety Administration (FMCSA). If the Prospective Employer uses any information it obtains from FMCSA in a decision to not hire you or to make any other adverse employment decision regarding you, the Prospective Employer will provide you with a copy of the report upon which its decision was based and a written summary of your rights under the Fair Credit Reporting Act before taking any final adverse action. If any final adverse action is taken against you based upon your driving history or safety report, the Prospective Employer will notify you that the action has been taken and that the action was based in part or in whole on this report. If you agree that the Prospective Employer may obtain such background reports, please read the following and sign below:</p>
                        <p>I authorize Challenger ("Prospective Employer") to access the FMCSA Pre-Employment Screening Program (PSP) system to seek information regarding my commercial driving safety record and information regarding my safety inspection history. I understand that I am consenting to the release of safety performance information including crash data from the previous five (5) years and inspection history from the previous three (3) years. I understand and acknowledge that this release of information may assist the Prospective Employer to make a determination regarding my suitability as an employee.</p>
                        <p>I further understand that neither the Prospective Employer nor the FMCSA contractor supplying the crash and safety information has the capability to correct any safety data that appears to be incorrect. I understand I may challenge the accuracy of the data by submitting a request to http://dataqs.fmcsa.dot.gov. If I am challenging crash or inspection information reported by a State, FMCSA cannot change or correct this data. I understand my request will be forwarded by the DataQs system to the appropriate State for adjudication.</p>
                        <div class="clearfix"></div>
                        <hr />
                        <p>I have read the above Notice Regarding Background Reports provided to me by Prospective Employer and I understand that if I sign this consent form, Prospective Employer may obtain a report of my crash and inspection history. I hereby authorize Prospective Employer and its employees, authorized agents, and/or affiliates to obtain the information authorized above.</p>
                        <div class="form-group col-md-12">
                                        <label class="control-label col-md-6">Date : </label>
                                        <div class="col-md-6">
										<input type="text" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label col-md-6">Signature : </label>
                                        <div class="col-md-6">
										<input type="text" class="form-control"/>
                                        </div>
                       </div>
                       
                       <div class="form-group col-md-12">
                                        <label class="control-label col-md-6">Name (Please print) : </label>
                                        <div class="col-md-6">
										<input type="text" class="form-control"/>
                                        </div>
                       </div>
                       
                       <p>NOTICE: This form is made available to monthly account holders by NICT solely for use as an example of template content. NICT assumes no legal liability or responsibility for the accuracy, completeness or currency of the information disclosed in this example. The intent of the template example is to illustrate for a monthly account holder an example of a driver consent form related to PSP, but all monthly account holders and third party information providers should consult their own legal counsel with respect to the proper format and content of this notice.</p>
                        
                    <div class="clearfix"></div>
                    </div>
                </div>
                </div-->

                
                <div class="portlet box blue ">
            	<div class="portlet-title">
            		<div class="caption">
            			Challenger Driver New Hire Application Process 
            		</div>
            	</div>
            	<div class="portlet-body form">
                    <div class="form-body">
                    <p>Thank-you for applying for a driving position with Challenger Motor Freight Inc. Please take a few minutes to review what the companies requirements are to be considered for a driving position with the company.</p>
                    <p>The following requirements need to be completed and/or provided prior to an offer of employment being given to the potential applicant:</p>
                    <ol>   
                        <li>A road test evaluation is to be completed with an assigned Challenger Driver Trainer</li>
                        <li>A drug test and health assessment will be conducted with the company's Occupational and Health Care Provider.</li>
                        <li>A valid AZ/Class 1 driver's license.</li> 
                        <li>A valid Canadian passport or proof of permanent residence status in Canada.</li>
                        <li>A criminal record search conducted.</li>  
                        <li>Provide a driver's abstract (all applicants), and CVOR (Ontario applicants only).</li>
                        <li>Provide relevant reference contacts for the past ten years of work experience.</li>
                        <li>Satisfactory completion of the Training (Orientation) Program.</li>
                    </ol>
                    
                    <p>I understand that I may receive an offer of employment once this process has been completed by Challenger based on successful results of the above. I also understand that I will not receive and am not entitled to any payment for participating in the Training (Orientation) Program.</p>
                    <p>I confirm that I have read and understand the above conditions as part of the application process. I have been given an opportunity to ask questions regarding the same.</p>
                     <div class="form-group col-md-12">
                                        <label class="control-label col-md-6">Dated at on the day of : </label>
                                        <div class="col-md-6">
										<input type="text" class="form-control" name="dated_day"/>
                                        </div>
                       </div>
                       
                       <div class="form-group col-md-12">
                                        <div class="col-md-6">
										<input type="text" class="form-control" placeholder="Witness(Print Name)" name="witness_name"/>
                                        </div>
                                        
                                        <div class="col-md-6">
										<input type="text" class="form-control" placeholder="Applicant(Print Name)" name="applicant_name"/>
                                        </div>
                       </div>
                       
                       <div class="form-group col-md-12">
                                        <div class="col-md-6">
										<input type="text" class="form-control" placeholder="Witness Signature" name="witness_signature"/>
                                        </div>
                                        
                                        <div class="col-md-6">
										<input type="text" class="form-control" placeholder="Applicant Signature" name="applicant_signature"/>
                                        </div>
                       </div>
                       
                       <div class="form-group col-md-12">
                                        <label class="control-label col-md-3">Attach Document : </label>
                                        <div class="col-md-9">
                                        <a href="javascript:void(0);" class="btn btn-primary">Browse</a>
                                        </div>
                       </div>
                       
                      <div class="form-group col-md-12">
                        <div id="more_doc">
                        </div>
                      </div>
                      
                      <div class="form-group col-md-12">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-9">
                            <a href="javascript:void(0);" class="btn btn-success" id="add_more_doc">Add More</a>
                        </div>
                      </div>
                      <div class="form-group col-md-12">
                            <label class="control-label col-md-3">Signature : </label>
                            <?php include('canvas/example2.php');?>
                            <div class="clearfix"></div>                                        
                      </div>
                       
                      
                       
                    
                    <div class="clearfix"></div>
                    </div>
                </div>
                </div>
</form>
            
        <div class="clearfix"></div>
 <script>
 $(function(){
   $("#test2").jqScribble(); 
});
 jQuery(function(){
    $('#add_more_form').click(function(){
      $.ajax({
        url:" <?php echo $this->request->webroot;?>subpages/period_of_unemployment.php",
        success:function(res){
           $('.more_form').append(res);
        }
      });     
    });
    
    $('.delete_form').live('click',function(){
        $(this).parent().remove();
       });
       
    $('#add_more_doc').click(function(){
        $('#more_doc').append('<div class="del_append"><label class="control-label col-md-3">Attach Document : </label><div class="col-md-6 pad_bot"><a href="javascript:void(0);" class="btn btn-primary">Browse</a><a  href="javascript:void(0);" class="btn btn-danger" id="delete_doc">Delete</a></div></div><div class="clearfix"></div>')
    }) ;
    
    $('#delete_doc').live('click',function(){
       $(this).closest('.del_append').remove(); 
    });
 });
 
 $('.add_more_acc_record').click(function(){
    $.ajax({
       url:"<?php echo $this->request->webroot; ?>subpages/accident_record.php",
       success:function(res){
        $('.more_acc_record').append(res);
        var c = $('#count_acc_record').val();
        $('#count_acc_record').val(parseInt(c)+1);
       } 
    });
    
    $('.delete_acc_record').live('click',function(){
       $(this).parent().remove(); 
        var c = $('#count_acc_record').val();
        $('#count_acc_record').val(parseInt(c)-1);
    });
 });
 </script>