<form id="form_tab1">

<input type="hidden" class="document_type" name="document_type" value="Pre-Screening"/>
<input type="hidden" name="sub_doc_id" value="1" class="sub_docs_id" id="af" />
<div class="clearfix"></div>
<hr/>
							<div class="form-group col-md-12">
								<h4 class="col-md-12">Driver Pre-Screen Questions</h4>
							</div>
								<div class="form-body">

									<div class="form-group col-md-6">
										<label class="col-md-6 control-label">Recruiter's Name : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="recruiter_name" value="<?php if(!$did)echo $this->request->session()->read('Profile.fname').' '.$this->request->session()->read('Profile.lname');?>" />
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="col-md-6 control-label">Applicant's Phone Number : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="applicant_phone_number"/>
										</div>
									</div>
                                    <div class="form-group col-md-6">
										<label class="col-md-6 control-label">Applicant's Name : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="aplicant_name">
										</div>
									</div>
                                    <div class="form-group col-md-6">
										<label class="col-md-6 control-label">Applicant's Email : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="applicant_email">
										</div>
									</div>
                                    <div class="form-group col-md-6">
										<label class="col-md-6 control-label">Date : </label>
										<div class="col-md-6">
											<input type="text" class="form-control date-picker" placeholder="(YYYY-MM-DD)" name="pre_screen_date">
										</div>
									</div>
                                    <div class="form-group col-md-6">
										<label class="col-md-6 control-label">Position : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" placeholder="S,T" name="position">
										</div>
									</div>
                                    <div class="clearfix"></div>
								</div>
                    <div class="clearfix"></div>
                    <hr />
									<div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <h4 class="center" style="width: 50%;">Screen Questions</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="center" style="width: 50%;">Answers</h4>
                                        </div>
                                    </div>
                                    
                                    <hr />
                                    <div class="clearfix"></div>
                                    
                                    <div class="form-group col-md-12">
                                            <h4 class="center">Intro</h4>
                                    </div>
                                    <hr />
                                    <div class="clearfix"></div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">What made you decide to call Challenger today?</label>
                                        </div>
                                        <div class="col-md-6">
                                        <textarea class="form-control" name="call_challenger"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">What type of job are you interested in?</label>
                                        </div>
                                        <div class="col-md-6">
                                        <textarea class="form-control" name="type_job_intereseted"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">How did you hear about this opportunity?(make sure we confirm which site on the internet they saw our posting)</label>
                                        </div>
                                        <div class="col-md-6">
                                        <textarea class="form-control" name="hear_about_oppurtunity"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                            <h4 class="center">Basic Requirements</h4>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">Are you legally eligible to work in Canada?</label>
                                        </div>
                                        <div class="col-md-6">
                                        <input type="radio" id="legal_eligible_work_cananda_1" name="legal_eligible_work_cananda" value="1"/>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="legal_eligible_work_cananda_0" name="legal_eligible_work_cananda" value="0"/>&nbsp;&nbsp;&nbsp;&nbsp;No
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">Do you currently hold a valid Canadian passport?</label>
                                        </div>
                                        <div class="col-md-6">
                                        <input type="radio" id="hold_current_canadian_pp_1" name="hold_current_canadian_pp" value="1"/>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="hold_current_canadian_pp_0" name="hold_current_canadian_pp" value="0"/>&nbsp;&nbsp;No
                                        </div>
                                    </div>
                                    
                                     <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">(If they do not have a valid Canadian passport)Do you have a Permanent Residency card and US Visa?</label>
                                        </div>
                                        <div class="col-md-6">
                                        <input type="radio" name="have_pr_us_visa" value="1"/>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="have_pr_us_visa_0" name="have_pr_us_visa" value="0"/>&nbsp;&nbsp;No
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">Do you have a FAST card?</label>
                                        </div>
                                        <div class="col-md-6">
                                        <input type="radio" id="fast_card_1" name="fast_card" value="1"/>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="fast_card_0" name="fast_card" value="0"/>&nbsp;&nbsp;No 
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">Have you ever been convicted of a criminal offence for which a pardon has not been granted or, which could cause you to not cross the border?</label>
                                        </div>
                                        <div class="col-md-6">
                                        <input type="radio" id="criminal_offence_pardon_not_granted_1" name="criminal_offence_pardon_not_granted" value="1"/>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="criminal_offence_pardon_not_granted_0" name="criminal_offence_pardon_not_granted" value="0"/>&nbsp;&nbsp;No 
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">Where do you live?</label>
                                        </div>
                                        <div class="col-md-6">
                                        <textarea class="form-control" name="where_live"></textarea> 
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">How do you feel about running team? (Do they have a partner?)</label>
                                        </div>
                                        <div class="col-md-6">
                                        <textarea class="form-control" name="feel_running_team"></textarea> 
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <h4 class="center">Discovery</h4>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">When did you get your AZ License and have you been commercially driving consistently since you got your license?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control date-picker" placeholder="YYYY-MM-DD" name="discover_az_license_date" /> 
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">Are you currently driving for another carrier?If yes, who and for how long?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="discover_current_driving_another_carrier"></textarea> 
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                            <h4 class="center">Tell me about the work you are doing?</h4>
                                    </div>
                                    
                                    
                                    
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-3"> Miles </label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="current_miles" />
                                            </div>
                                            <label class="control-label col-md-3"> Time out/home </label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="current_time_out_home" />
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-3"> Locations </label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="current_location" />
                                            </div>
                                            <label class="control-label col-md-3"> Border Cross </label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="current_border_cross" />
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-3"> Type of equipment </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="current_type_equipmenet" />
                                            </div>
                                        </div>
                                        
                                    <div class="form-group col-md-12">
                                    <div class="col-md-6">
                                        <label class="control-label">What did you like most about the job?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="like_most_abt_job"></textarea> 
                                    </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">What did you like least about the job?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="least_like_abt_job"></textarea> 
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">What is your reason for leaving?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="reason_leave"></textarea> 
                                        </div>
                                    </div>
                                     
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">What other tractor trailer experience do you have?  How recent is this experience?For BC: Any mountain experience?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="tractor_trailer_experience"></textarea> 
                                        </div>
                                    </div>
                                     
                                     <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">What type of equipment have you Operated? (Standard or automatic).</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="type_of_equipment_operated"></textarea> 
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">Reefer:  Y or N   How many loads</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" id="reefer_load_1" name="reefer_load" value="1"/>&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="reefer_load_0" name="reefer_load" value="0"/>&nbsp;&nbsp;No  
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">Do you have a clean driving abstract? (and for ON drivers, their CVOR?)</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="clean_driving_abstract"></textarea>  
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">Do you have any violations in the USA against your CSA?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="violations_against_csa"></textarea>  
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">Do you have any demerit points? If any points for what?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="demerit_points"></textarea>  
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">As part of our screening process we check previous employment references. Have you had any incidents that may not be on your CVOR, but that your previous employer has recorded?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="screening_incidents"></textarea>  
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">Driving at night is a requirement for the job. Do you see any reason why you would not be able to drive at night?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="driving_at_night_reason"></textarea>  
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">Company policy is that tractors are to be parked at the driver's home terminal. Do you have access to get to the terminal?(tell them where the terminal is)</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="access_tractor_park_driver_home"></textarea>  
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                            <h4 class="center">Expectations</h4>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">As we are a long haul company, driving to the USA is a requirement for most runs. Are you willing cross the border? Have you ever crossed the border with a load?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control date-picker" placeholder="YYYY-MM-DD" name="willing_cross_border" />  
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">Tell me what kind of time out and time home you are looking for?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="time_out_home_out"></textarea>  
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">How many miles are you hoping to run in a week?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="miles_hopping_run_week"></textarea>  
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">Explain the areas they will be running. Discuss/document suitable runs available, giving details.  Are they willing to drive in these areas?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="willing_drive_areas"></textarea>  
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">What is your current salary? Gross or net?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="current_salary_gross_net"></textarea>  
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">What are you looking for in your next employer?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="look_next_employer"></textarea>  
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">What's important to you in your next opportunity?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="important_next_opportunity"></textarea>  
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">What is the reason you have applied/contacted Challenger?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="reason_applied_challenger"></textarea>  
                                        </div>
                                    </div>
                                      
                                    
                                    <div class="form-group col-md-12">
                                        <h4 class="center" colspan="2">Closing</h4>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">If you were to accept a position with Challenger, how soon could you start working?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="accept_position_challenger"></textarea>  
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">Are you interviewing with other companies?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="interview_other_companies"></textarea>  
                                        </div>
                                    </div>
                                    
                                    
                                     <div class="form-group col-md-12">
                                     <h4 class="center">Explain the next steps:</h4>
                                    </div>
                                        <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label"> Request the completed application </label>
                                        </div>
                                            <div class="col-md-6">
                                                <textarea class="form-control" name="request_completed_application"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">Schedule for a road test</label>
                                        </div>
                                            <div class="col-md-6">
                                                <textarea class="form-control" name="schedule_road_test"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">Criminal Search</label>
                                        </div>
                                            <div class="col-md-6">
                                                <textarea class="form-control" name="criminal_search"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-md-12">
                                        <div class="col-md-6">
                                            <label class="control-label">Med/Drug screen</label>
                                        </div>
                                            <div class="col-md-6">
                                                <textarea class="form-control" name="med_drug_search"></textarea>
                                            </div>
                                        </div>
                                    
                                        <div class="form-group col-md-12">
                                            <h4 class="center">Questions for Trainees</h4>
                                        </div>
                                        
                                        <div class="form-group col-md-12">
                                            <div class="col-md-6">
                                                <label class="control-label">What school did you attend?</label>
                                            </div>
                                            <div class="col-md-6">
                                                <textarea class="form-control" name="school_attend"></textarea>
                                            </div>
                                        </div> 
                                        
                                        <div class="form-group col-md-12">
                                            <div class="col-md-6">
                                                <label class="control-label">How many total hours was your program?</label>
                                            </div>
                                            <div class="col-md-6">
                                                <textarea class="form-control" name="total_hours_program"></textarea>
                                            </div>
                                        </div> 
                                        
                                    <div class="form-group col-md-12">
                                            <div class="col-md-6">
                                                <label class="control-label">What did you learn in class?
                                        <br/>Answers you are looking for<br />
                                        <ul class="no-bullet">
                                            <li>Hours of service</li>
                                            <li>Transportation of dangerous goods</li>
                                            <li>Trip planning</li>
                                            <li>Logs</li>
                                            <li>Weight & dimensions</li>
                                            <li>Load Securement</li>
                                        </ul></label>
                                            </div>
                                            <div class="col-md-6">
                                                <textarea class="form-control" name="learn_in_class"></textarea>
                                            </div>
                                        </div> 
                                        
                                        <div class="form-group col-md-12">
                                            <div class="col-md-6">
                                                <label class="control-label">When did you take your MTO road test?</label>
                                            </div>
                                            <div class="col-md-6">
                                                <textarea class="form-control" name="take_mto_road_test"></textarea>
                                            </div>
                                        </div> 
                                        
                                        <div class="form-group col-md-12">
                                            <div class="col-md-6">
                                                <label class="control-label">Did you get your license on the 1st try:If no, how many attempts?</label>
                                            </div>
                                            <div class="col-md-6">
                                                <textarea class="form-control" name="license_on_1_try"></textarea>
                                            </div>
                                        </div> 
                                    
                                        <div class="form-group col-md-12">
                                        <h4 class="center">Have you driven since getting your AZ?  If so, please provide details:</h4>
                                        </div>
                                        
                                    
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-3"> Miles </label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="driven_az_miles" />
                                            </div>
                                            <label class="control-label col-md-3"> Time out/home </label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="driven_az_time_out_home" />
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-3"> Locations </label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="driven_az_location" />
                                            </div>
                                            <label class="control-label col-md-3"> Border Cross </label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="driven_az_border_cross" />
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-3"> Type of equipment </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="driven_az_type_equipment" />
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group col-md-12">
                                            <div class="col-md-6">
                                                <label class="control-label">Recruiters comments and recommendations (note what day they are booked to come in for a road test and interview):</label>
                                            </div>
                                            <div class="col-md-6">
                                                <textarea class="form-control" name="recruiter_comment_recommendation"></textarea>
                                            </div>
                                        </div> 
                                    
                                            <div class="form-group col-md-12">
                                            <label class="control-label col-md-4">How did you hear about us?</label>
                                            <div class="col-md-4">
                                            <select name="hear_about_us" class="form-control select_media">
                                                <option value="">Select</option>
                                                <option value="internet">Internet</option>
                                                <option value="jobfair">Job Fair / Trade Show</option>
                                                <option value="magazine">Magazine</option>
                                                <option value="newspaper">Newspaper</option>
                                                <option value="poster">Poster</option>
                                                <option value="radio">Radio</option>
                                                <option value="other">Other</option>
                                            </select>
                                            </div>
                                            <div class="col-md-4">
                                                <textarea class="form-control other_div" name="hear_about_us_other" style="display: none;"></textarea>
                                            </div>
                                            </div>              
                                    
                                        <?php
                                         if(!isset($pre_at['attach_doc']))
                                         {
                                            ?>
                                            
                                        <div class="form-group col-md-12">
                                        <label class="control-label col-md-3">Attach Document : </label>
                                        <div class="col-md-9">
                                        <input type="hidden" class="fileUpload1" name="attach_doc[]" />
                                        <a href="#" id="fileUpload1" class="btn btn-primary">Browse</a> <span class="uploaded"></span>
                                        </div>
                                       </div>
                                      <?php
                                         }
                                        ?>
                                      <div class="form-group col-md-12">
                                        <div class="attach_more" data-count='<?php if(isset($pre_at['attach_doc']))echo count($pre_at['attach_doc']);else echo '1';?>'>
                                        <?php
                                        if(isset($pre_at['attach_doc']))
                                        {
                                            $at=0;
                                            foreach($pre_at['attach_doc'] as $pa)
                                            {
                                                $at++;
                                                ?>
                                                <div class="pad_bot" id="del_pre"> <label class="control-label col-md-3">Attach Document : </label> <div class="col-md-6 pad_bot"><input type="hidden" class="fileUpload<?php echo $at;?>" name="attach_doc[]" value="<?php echo $pa->attach_doc;?><" /><a href="#" id="fileUpload<?php echo $at;?>"  class="btn btn-primary">Browse</a> <?php if($at>1){?><a  href="javascript:void(0);" class="btn btn-danger delete_attach">Delete</a><?php }?> <span class="uploaded"><?php echo $pa->attach_doc;?></span></div></div><div class="clearfix"></div>
                                                <script>
                                                $(function(){
                                                    fileUpload('fileUpload<?php echo $at;?>');
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
                                            <a href="javascript:void(0);" class="add_attach btn btn-success">Add More</a>
                                        </div>
                                      </div>
                            <div class="clearfix"></div>
                            <?php //include('canvas/example.php');?>
                            <?php //include('canvas/example2.php');?>
                            <div class="clearfix"></div>
            

</form>
<script>
    $(function(){
        $('#addfiles').click(function(){
            //alert("ssss");
           $('#doc').append('<div style="padding-top:10px;"><a href="#" class="btn btn-success">Browse</a> <a href="javascript:void(0);" class="btn btn-danger" onclick="$(this).parent().remove();">Delete</a><br/></div>');
        });
        <?php
        if($this->request->params['action']=='addorder')
        {
            ?>
            fileUpload('fileUpload1');
            <?php
        }
        ?>
         
        $('.add_attach').click(function(){
            var count = $('.attach_more').data('count');
            $('.attach_more').data('count',parseInt(count)+1);
           $('.attach_more').append('<div class="pad_bot" id="del_pre"> <label class="control-label col-md-3">Attach Document : </label> <div class="col-md-6 pad_bot"><input type="hidden" class="fileUpload'+$('.attach_more').data('count')+'" name="attach_doc[]" /><a href="#" id="fileUpload'+$('.attach_more').data('count')+'"  class="btn btn-primary">Browse</a> <a  href="javascript:void(0);" class="btn btn-danger delete_attach">Delete</a> <span class="uploaded"></span></div></div></div><div class="clearfix"></div>');
            fileUpload('fileUpload'+$('.attach_more').data('count'));
           
        });
        
        $('.delete_attach').live('click',function(){
            var count = $('.attach_more').data('count');
            $('.attach_more').data('count',parseInt(count)-1);
            $(this).closest('#del_pre').remove();
            
        });
        //$("#test1").jqScribble();
        //$("#test2").jqScribble();
        
        $('.select_media').change(function(){
           if ($(this).attr("value") == 'other')
            {
                 $('.other_div').show();
            }
            else $('.other_div').hide(); 
        });
    });

       
		function save(numb)
		{
		  //alert('rest');return;
			$("#test"+numb).data("jqScribble").save(function(imageData)
			{
				$.post('image_save.php', {imagedata: imageData}, function(response)
					{
						
                        $.ajax({
                            url:'<?php echo $this->request->webroot;?>document/image_sess/'+numb+'/'+response
                        });
					});	
				
			});
		}
		function addImage()
		{
			var img = prompt("Enter the URL of the image.");
			if(img !== '')$("#test").data("jqScribble").update({backgroundImage: img});
		}
		
		</script>