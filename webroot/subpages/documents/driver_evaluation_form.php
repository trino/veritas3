<form id="form_tab3">
<input type="hidden" name="document_type" value="Road test" />
<input type="hidden" name="sub_doc_id" value="<?php if(isset($_GET['doc_id']))echo $_GET['doc_id']; else echo $d->id ?>" id="af" />
                                                <div class="form-group">
													<label class="control-label col-md-3">Driver name <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="driver_name"/>
														
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">D/L# <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" placeholder="" class="form-control" name="d_l"/>
														
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Date <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" placeholder="" class="form-control" name="issued_date"/>
														
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Transmission <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<div class="checkbox-list">
															<label>
															<input type="checkbox" name="transmission_manual_shift" value="1"/> Manual Shift </label>
															<label>
															<input type="checkbox" name="transmission_auto_shift" value="2"/> Auto Shift </label>
														</div>
														<div id="form_payment_error">
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">Name of evaluator <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" placeholder="" class="form-control" name="name_evaluator"/>
													</div>
												</div>
                                                
                                                <div class="form-group">
													<label class="control-label col-md-3">Select <span class="required">
													* </span>
													</label>
													<div class="col-md-9">
														<div class="checkbox-list col-md-4 nopad">
															<label>
															<input type="checkbox" name="pre_hire" value="1"/> Pre Hire </label>
															<label>
															<input type="checkbox" name="post_accident" value="2"/> Post Accident </label>
														</div>
														<div class="checkbox-list col-md-4 nopad">
															<label>
															<input type="checkbox" name="post_injury" value="1"/> Post Injury </label>
															<label>
															<input type="checkbox" name="post_training" value="2"/> Post Training </label>
														</div>
                                                        <div class="checkbox-list col-md-4 nopad">
															<label>
															<input type="checkbox" name="annual" value="1"/> Annual </label>
															<label>
															<input type="checkbox" name="skill_verification" value="2"/> Skill Verification </label>
														</div>
													</div>
												</div>
                                                <hr />
                                                
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="portlet box blue">
                                                            <div class="portlet-title">
                                                                <div class="caption"><strong>Pre-trip Inspection:</strong> Fails to check the following</div>
                                                            </div>
                                                            
                                                            <div class="portlet-body">
                                                                <div class="col-md-6 checkbox-list">
                                                                    <label>
        															<input type="checkbox" name="fuel_tank"/> Fuel tank </label>
        															<label>
        															<input type="checkbox" name="all_gauges"/> All Gauges </label>
                                                                    <label>
        															<input type="checkbox" name="audible_air"/> Audible Air Leaks </label>
        															<label>
        															<input type="checkbox" name="wheels_tires"/> Wheels Tires </label>
                                                                    <label>
        															<input type="checkbox" name="trailer_brakes"/> Trailer Brakes </label>
                                                                    <label>
        															<input type="checkbox" name="trailer_airlines"/> Trailer Airlines </label>
                                                                    <label>
        															<input type="checkbox" name="inspect_5th_wheel"/> Inspect 5th Wheel </label>
                                                                    <label>
        															<input type="checkbox" name="cold_check"/> Cold Check </label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>
        															<input type="checkbox" name="seat_mirror"/> Seat and Mirror set up </label>
        															<label>
        															<input type="checkbox" name="coupling"/> Coupling&nbsp; &nbsp; &nbsp; &nbsp;</label>
                                                                    <label>
        															<input type="checkbox" name="paperwork"/> Paperwork </label>
        															<label>
        															<input type="checkbox" name="lights_abs_lamps"/> Lights/ABS Lamps </label>
                                                                    <label>
        															<input type="checkbox" name="annual_inspection_strickers"/> Annual Inspection Stickers </label>
                                                                    <label>
        															<input type="checkbox" name="cab_air_brake_checked"/> In cab air brake checks </label>
                                                                    <label>
        															<input type="checkbox" name="landing_gear"/> Landing Gear </label>
                                                                    <label>
        															<input type="checkbox" name="emergency_exit"/> Emergency exit </label>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="portlet box blue">
                                                            <div class="portlet-title">
                                                                <div class="caption"><strong>Driving:</strong></div>
                                                            </div>
                                                            
                                                            <div class="portlet-body">
                                                                <div>
                                                                    <div class="col-md-8">
            															Follows too closely 
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="driving_follows_too_closely" value="1"/>
                                                                        <input type="radio" name="driving_follows_too_closely" value="2"/>
                                                                        <input type="radio" name="driving_follows_too_closely" value="3"/>
                                                                        <input type="radio" name="driving_follows_too_closely" value="4"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div> 
                                                                
                                                                <div>
                                                                    <div class="col-md-8">
            															Improper choice of Lane 
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="driving_improper_choice_lane" value="1"/>
                                                                        <input type="radio" name="driving_improper_choice_lane" value="2"/>
                                                                        <input type="radio" name="driving_improper_choice_lane" value="3"/>
                                                                        <input type="radio" name="driving_improper_choice_lane" value="4"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div>
                                                                
                                                                <div>
                                                                    <div class="col-md-8">
            															Fails to use mirrors properly 
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="driving_fails_use_mirror_properly" value="1"/>
                                                                        <input type="radio" name="driving_fails_use_mirror_properly" value="2"/>
                                                                        <input type="radio" name="driving_fails_use_mirror_properly" value="3"/>
                                                                        <input type="radio" name="driving_fails_use_mirror_properly" value="4"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div>  
                                                                
                                                                <div>
                                                                    <div class="col-md-8">
            															Signal: wrong / late / not used / not cancelled
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="driving_signal" value="1"/>
                                                                        <input type="radio" name="driving_signal" value="2"/>
                                                                        <input type="radio" name="driving_signal" value="3"/>
                                                                        <input type="radio" name="driving_signal" value="4"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div>  
                                                                
                                                                <div>
                                                                    <div class="col-md-8">
            															Fails to use caution at R.R. Xing	
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="driving_fail_use_caution_rr" value="1"/>
                                                                        <input type="radio" name="driving_fail_use_caution_rr" value="2"/>
                                                                        <input type="radio" name="driving_fail_use_caution_rr" value="3"/>
                                                                        <input type="radio" name="driving_fail_use_caution_rr" value="4"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div>
                                                                
                                                                 <div>
                                                                    <div class="col-md-8">
            															Speed: too fast / too slow  	
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="driving_speed" value="1"/>
                                                                        <input type="radio" name="driving_speed" value="2"/>
                                                                        <input type="radio" name="driving_speed" value="3"/>
                                                                        <input type="radio" name="driving_speed" value="4"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div> 
                                                                
                                                                <div>
                                                                    <div class="col-md-8">
            															Incorrect use of: clutch / brakes		
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="driving_incorrect_use_clutch_brake" value="1"/>
                                                                        <input type="radio" name="driving_incorrect_use_clutch_brake" value="2"/>
                                                                        <input type="radio" name="driving_incorrect_use_clutch_brake" value="3"/>
                                                                        <input type="radio" name="driving_incorrect_use_clutch_brake" value="4"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div>
                                                                
                                                                <div>
                                                                    <div class="col-md-8">
            															Accelerator / gears / steering		
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="driving_accelerator_gear_steer" value="1"/>
                                                                        <input type="radio" name="driving_accelerator_gear_steer" value="2"/>
                                                                        <input type="radio" name="driving_accelerator_gear_steer" value="3"/>
                                                                        <input type="radio" name="driving_accelerator_gear_steer" value="4"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div>
                                                                
                                                                <div>
                                                                    <div class="col-md-8">
            															Incorrect observation skills	
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="driving_incorrect_observation_skills" value="1"/>
                                                                        <input type="radio" name="driving_incorrect_observation_skills" value="2"/>
                                                                        <input type="radio" name="driving_incorrect_observation_skills" value="3"/>
                                                                        <input type="radio" name="driving_incorrect_observation_skills" value="4"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div>
                                                                
                                                                <div>
                                                                    <div class="col-md-8">
            															Doesn't respond to instruction	
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="driving_respond_instruction" value="1"/>
                                                                        <input type="radio" name="driving_respond_instruction" value="2"/>
                                                                        <input type="radio" name="driving_respond_instruction" value="3"/>
                                                                        <input type="radio" name="driving_respond_instruction" value="4"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="portlet box blue">
                                                            <div class="portlet-title">
                                                                <div class="caption"><strong>Cornering:</strong></div>
                                                            </div>
                                                            
                                                            <div class="portlet-body">
                                                                <div>
                                                                    <div class="col-md-8">
            															Signaling: not used / late / not cancelled             
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="cornering_signaling" value="1"/>
                                                                        <input type="radio" name="cornering_signaling" value="2"/>
                                                                        <input type="radio" name="cornering_signaling" value="3"/>
                                                                        <input type="radio" name="cornering_signaling" value="4"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div> 
                                                                
                                                                <div>
                                                                    <div class="col-md-8">
            															  Speed:  too fast / too slow/momentum 
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="cornering_speed" value="1"/>
                                                                        <input type="radio" name="cornering_speed" value="2"/>
                                                                        <input type="radio" name="cornering_speed" value="3"/>
                                                                        <input type="radio" name="cornering_speed" value="4"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div>
                                                                
                                                                <div>
                                                                    <div class="col-md-8">
            															Fails to get into proper:   lane / late / position
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="cornering_fails" value="1"/>
                                                                        <input type="radio" name="cornering_fails" value="2"/>
                                                                        <input type="radio" name="cornering_fails" value="3"/>
                                                                        <input type="radio" name="cornering_fails" value="4"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div>  
                                                                
                                                                <div>
                                                                    <div class="col-md-8">
            															Proper set up for turn  
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="cornering_proper_set_up_turn" value="1"/>
                                                                        <input type="radio" name="cornering_proper_set_up_turn" value="2"/>
                                                                        <input type="radio" name="cornering_proper_set_up_turn" value="3"/>
                                                                        <input type="radio" name="cornering_proper_set_up_turn" value="4"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div>  
                                                                
                                                                <div>
                                                                    <div class="col-md-8">
            															Turns too: wide / cuts corner / jumps curb          	
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="cornering_turns" value="1"/>
                                                                        <input type="radio" name="cornering_turns" value="2"/>
                                                                        <input type="radio" name="cornering_turns" value="3"/>
                                                                        <input type="radio" name="cornering_turns" value="4"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div>
                                                                
                                                                 <div>
                                                                    <div class="col-md-8">
            															Use of wrong lane / impede traffic 	
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="cornering_wrong_lane_impede" value="1"/>
                                                                        <input type="radio" name="cornering_wrong_lane_impede" value="2"/>
                                                                        <input type="radio" name="cornering_wrong_lane_impede" value="3"/>
                                                                        <input type="radio" name="cornering_wrong_lane_impede" value="4"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div> 
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="portlet box blue">
                                                            <div class="portlet-title">
                                                                <div class="caption"><strong>Shifting:</strong> Fails to perform the following</div>
                                                            </div>
                                                            
                                                            <div class="portlet-body">
                                                                <div>
                                                                    <div class="col-md-8">
            															Smooth take off's           
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="shifting_smooth_take_off" value="1"/>
                                                                        <input type="radio" name="shifting_smooth_take_off" value="2"/>
                                                                        <input type="radio" name="shifting_smooth_take_off" value="3"/>
                                                                        <input type="radio" name="shifting_smooth_take_off" value="4"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div> 
                                                                
                                                                <div>
                                                                    <div class="col-md-8">
            															  Proper gear selection
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="shifting_proper_gear_selection" value="1"/>
                                                                        <input type="radio" name="shifting_proper_gear_selection" value="2"/>
                                                                        <input type="radio" name="shifting_proper_gear_selection" value="3"/>
                                                                        <input type="radio" name="shifting_proper_gear_selection" value="4"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div>
                                                                
                                                                <div>
                                                                    <div class="col-md-8">
            															Proper clutching
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="shifting_proper_clutching" value="1"/>
                                                                        <input type="radio" name="shifting_proper_clutching" value="2"/>
                                                                        <input type="radio" name="shifting_proper_clutching" value="3"/>
                                                                        <input type="radio" name="shifting_proper_clutching" value="4"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div>  
                                                                
                                                                <div>
                                                                    <div class="col-md-8">
            															Gear recovery
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="shifting_gear_recovery" value="1"/>
                                                                        <input type="radio" name="shifting_gear_recovery" value="2"/>
                                                                        <input type="radio" name="shifting_gear_recovery" value="3"/>
                                                                        <input type="radio" name="shifting_gear_recovery" value="4"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div>  
                                                                
                                                                <div>
                                                                    <div class="col-md-8">
            															Up/down shifting         	
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="shifting_up_down" value="1"/>
                                                                        <input type="radio" name="shifting_up_down" value="2"/>
                                                                        <input type="radio" name="shifting_up_down" value="3"/>
                                                                        <input type="radio" name="shifting_up_down" value="4"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div>
                                                                
                                                                 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="portlet box blue">
                                                            <div class="portlet-title">
                                                                <div class="caption"><strong>Backing:</strong> sight side / blind side | <em>Fails to</em></div>
                                                            </div>
                                                            
                                                            <div class="portlet-body">
                                                                <div>
                                                                    <div class="col-md-8">
            															Uses proper set up          
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="backing_uses_proper_set_up" value="1"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div> 
                                                                
                                                                <div>
                                                                    <div class="col-md-8">
            															  Check vehicle path before / while backing           
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="backing_path_before_while_driving" value="1"/>
                                                                        <input type="radio" name="backing_path_before_while_driving" value="2"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div>
                                                                
                                                                <div>
                                                                    <div class="col-md-8">
            															Use of 4 way flashers / city horn
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="backing_use_4way_flashers_city_horn" value="1"/>
                                                                        <input type="radio" name="backing_use_4way_flashers_city_horn" value="2"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div>  
                                                                
                                                                <div>
                                                                    <div class="col-md-8">
            															Shows certainty while steering
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="backing_show_certainty_while_steering" value="1"/>
                                                                        <input type="radio" name="backing_show_certainty_while_steering" value="2"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div>  
                                                                
                                                                <div>
                                                                    <div class="col-md-8">
            															Continually uses mirrors        	
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="backing_continually_uses_mirror" value="1"/>
                                                                        <input type="radio" name="backing_continually_uses_mirror" value="2"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div>
                                                                    <div class="col-md-8">
            															Maintain proper speed	       	
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="backing_maintain_proper_seed" value="1"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div>
                                                                    <div class="col-md-8">
            															Complete in a reasonable time and fashion	       	
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" name="backing_complete_reasonable_time_fashion" value="1"/>
                                                                    </div>
    							                                    <div class="clearfix"></div>
                                                                </div>
                                                                
                                                                 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <hr />
                                                <div class="form-group">
													<label class="control-label col-md-3">Total score<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="total_score" disabled="" value="24"/>
														
													</div>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">Auto shift<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="auto_shift"/>
														
													</div>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">Manual<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="manual"/>
														
													</div>
												</div>
                                                <hr />
                                                <div class="form-group">
													<p class="center col-md-12 fontRed">The total score must be less than 20 to pass for Autoshift and 24 for Manual. Pass for a full trainee is less than 30</p>
												</div>
                                                <hr />
                                                <div class="form-group">
                                                    <p class="control-label col-md-3"><strong>Summary</strong></p>
                                                </div>
                                                <div class="form-group">
													<label class="control-label col-md-3">Recommended for hire <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<div class="checkbox-list">
															<label>
															<input type="radio" name="recommended_for_hire" value="1"/> Yes </label>
															<label>
															<input type="radio" name="recommended_for_hire" value="0"/> No </label>
														</div>
														<div id="form_payment_error">
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">Recommended as Full trainee <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<div class="checkbox-list">
															<label>
															<input type="radio" name="recommended_full_trainee" value="1"/> Yes </label>
															<label>
															<input type="radio" name="recommended_full_trainee" value="0"/> No </label>
														</div>
														<div id="form_payment_error">
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">Recommended fire hire with trainee <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<div class="checkbox-list">
															<label>
															<input type="radio" name=recommended_fire_hire_trainee" value="1"/> Yes </label>
															<label>
															<input type="radio" name="recommended_fire_hire_trainee" value="0"/> No </label>
														</div>
														<div id="form_payment_error">
														</div>
													</div>
												</div>
                                                
                                                <div class="form-group">
													<label class="control-label col-md-3">Comments <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<textarea  placeholder="" class="form-control" name="comments"></textarea>
														
													</div>
												</div>
                                                <div class="clearfix"></div>
                                                
                                                <div class="form-group col-md-12">
                                                    <label class="control-label col-md-6">Attach Document : </label>
                                                    <div class="col-md-6">
                                                    <a href="javascript:void(0);" class="btn btn-primary">Browse</a>
                                                    </div>
                                                   </div>
                                                   
                                                  <div class="form-group col-md-12">
                                                    <div id="more_driver_doc">
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>
                                                  </div>
                                                  
                                                  <div class="form-group col-md-12">
                                                    <div class="col-md-6">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a href="javascript:void(0);" class="btn btn-success" id="add_more_driver_doc">Add More</a>
                                                    </div>
                                                  </div>

</form>
                                                    
                                                    <div class="clearfix"></div>
 <script>
    $(function(){
       $('#add_more_driver_doc').click(function(){
        $('#more_driver_doc').append('<div class="del_append_driver"><label class="control-label col-md-6">Attach Document : </label><div class="col-md-6 pad_bot"><a href="javascript:void(0);" class="btn btn-primary">Browse</a><a  href="javascript:void(0);" class="btn btn-danger" id="delete_driver_doc">Delete</a></div></div>')
       }); 
       
       $('#delete_driver_doc').live('click',function(){
            $(this).closest('.del_append_driver').remove();
       });
       
        //$("#test2").jqScribble();
    });
    	
</script>                                               