<script src="<?php echo $this->request->webroot;?>js/jquery.easyui.min.js" type="text/javascript"></script>
<?php
if(isset($disabled))
$is_disabled = 'disabled="disabled"';
else
$is_disabled = '';
?>
<?php $settings = $this->requestAction('settings/get_settings');?>
<h3 class="page-title">
	<?php echo ucfirst($settings->document);?>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo $this->request->webroot;?>">Dashboard</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href=""><?php echo ucfirst($settings->document);?>
                        </a>
					</li>
				</ul>
                <?php
                if(isset($disabled))
                { ?>
					<a href="javascript:window.print();" class="floatright btn btn-primary">Print Report</a>

					<a href="" class="floatright btn btn-success">Re-Qualify</a>
                <a href="" class="floatright btn btn-info">Add to Task List</a>
                <?php } ?>

			</div>
            <div class="row">
				<div class="col-md-12">
					<div class="portlet box blue" id="form_wizard_1">
						<div class="portlet-title">
                        <?php
                            $param = $this->request->params['action'];
                            $tab = 'nodisplay';
                        ?>
							<div class="caption">
								<i class="fa fa-gift"></i> <?php if($param == 'view')?><?php echo ucfirst($settings->document);?> - <span class="step-title">
								View </span>
							</div>

						</div>
						<div class="portlet-body form">
							<!--<form action="#" class="form-horizontal" id="submit_form" method="POST"> -->
								<div class="form-wizard">
									<div class="form-body">
                                        <?php

                                        if($param !='view')
                                        {
                                            $tab = 'tab-pane';
                                            ?>

										<ul class="nav nav-pills nav-justified steps">    
                                            <?php
                                                $doc = $this->requestAction('/documents/getDocument');
                                                
                                                
                                                $doc2 = $doc;
                                                $i = 1;
                                                foreach($doc as $d)
                                                {
                                                    
                                                    $prosubdoc = $this->requestAction('/settings/all_settings/0/0/profile/'.$this->Session->read('Profile.id').'/'.$d->id);
                                                    
                                                ?>
                                                <?php if($prosubdoc['display'] != 0 && $d->display==1){
                                                    $j = $d->id;
                                                    ?>
                                                    <li>
    												<a href="#tab<?php echo $j;?>" data-toggle="tab" class="step">
    												<span class="number">
    												<?php echo $i; ?> </span><br />
    												<span class="desc">
    												<i class="fa fa-check"></i> <?php echo ucfirst($d->title); ?> </span>
    												</a>
    							                     </li>
                                                <?php
                                                
                                                    $i++;
                                                    }
                                                }
                                            ?>
											
                                           <li>
												<a href="#tab<?php echo ++$j; ?>" data-toggle="tab" class="step">
												<span class="number">
												<?php echo $i++;?></span><br />
												<span class="desc">
												<i class="fa fa-check"></i> Confirmation </span>
												</a>
											</li>
                                            <li>
												<a href="#tab<?php echo ++$j; ?>" data-toggle="tab" class="step">
												<span class="number">
												<?php echo $i++;?></span><br />
												<span class="desc">
												<i class="fa fa-check"></i> Report Card </span>
												</a>
											</li>
                                            
										</ul>
										<div id="bar" class="progress progress-striped" role="progressbar">
											<div class="progress-bar progress-bar-info">
											</div>
										</div>
                                        <?php
                                        }
                                        ?>
                                        <div class="form-actions <?php if($tab=='nodisplay')echo $tab;?>">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<a href="javascript:;" class="btn default button-previous">
												<i class="m-icon-swapleft"></i> Back </a>

                                                <a href="javascript:;" class="btn red button-next">
												Skip <i class="m-icon-swapdown m-icon-white"></i>
												</a>

												<a href="javascript:;" class="btn blue button-next cont">
												Save & Continue <i class="m-icon-swapright m-icon-white"></i>
												</a>

												
                                                <a href="javascript:window.print();" class="btn btn-info button-submit">Print</a>
											</div>
										</div>
									</div>
										<div class="tab-content mar">
											<div class="alert alert-danger display-none">
												<button class="close" data-dismiss="alert"></button>
												You have some form errors. Please check below.
											</div>
											<div class="alert alert-success display-none">
												<button class="close" data-dismiss="alert"></button>
												Your form validation is successful!
											</div>
                                            <div class="form-group mar-top-10 col-md-12 uploaded_for">
                                                <?php
                                                        $users = $this->requestAction("documents/getAllUser");
                                                ?>
                                         
                                                <label class="col-md-3 control-label">Select <?php echo ucfirst($settings->profile);?></label>
                                                <div class="col-md-6">
                                            
                                                    <select class="form-control" name="uploaded_for" id="uploaded_for">
            								            <option value="">Select <?php echo ucfirst($settings->profile);?></option>
                                                        <?php 
                                                            foreach($users as $u)
                                                            {
                                                                ?>
                                                                <option value="<?php echo $u->id;?>" <?php if(isset($modal) && $modal->uploaded_for==$u->id){?> selected="selected"<?php } ?> ><?php echo $u->username; ?></option>
                                                                <?php
                                                            }
                                                         ?>
                        							 </select>
                                                     <input type="hidden" name="client_id" value="<?php echo $cid;?>" id="client_id" />
                                                     <input type="hidden" name="did" value="<?php echo $did;?>" id="did" />
                                                     <?php
                                                     if(!$did)
                                                     {
                                                        ?>
                                                        
                                                     <input type="hidden" name="user_id" value="<?php $this->request->session()->read('Profile.id');?>" id="user_id" />
                                                     
                                                     <?php
                                                     }
                                                     else
                                                     {
                                                        ?>
                                                        <input type="hidden" name="user_id" value="<?php echo $modal->user_id;?>" id="user_id" />
                                                        <?php
                                                     }
                                                     ?>
                                                    </div>
                                            </div>
                                            <div class="form-group mar-top-10 col-md-12">
                                            <?php
                                                        $division = $this->requestAction("clients/getdivision/".$cid);
                                                ?>
                                                <label class="col-md-3 control-label">Select Division</label>
                                                <div class="col-md-6">
                                                <select class="form-control" name="division" id="divison">
            								            <option value="">Select Division</option>
                                                        <?php 
                                                            foreach($division as $u)
                                                            {
                                                                ?>
                                                                <option value="<?php echo $u->id;?>" <?php if(isset($modal) && $modal->division==$u->title){?> selected="selected"<?php } ?> ><?php echo $u->title; ?></option>
                                                                <?php
                                                            }
                                                         ?>
                        							 </select>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <?php foreach($doc2 as $d){
                                                $j = $d->id;
                                                ?>
    											<div class="<?php echo $tab;?> <?php if($tab=='tab-pane'){?>active<?php }?>" id="tab<?php echo $d->id; ?>">
    												<?php
                                                    
                                                        include('subpages/documents/'.$d->form);
                                                    ?>
    											</div>
                                            <?php } ?>
											
                                                <div class="<?php echo $tab;?>" id="tab<?php echo ++$j; ?>">
    												<?php
                                                        include('subpages/documents/confirmation.php');
                                                    ?>
    											</div>
                                                <div class="<?php echo $tab;?>" id="tab<?php echo ++$j; ?>">
    												<?php
                                                        include('subpages/documents/forview.php');
                                                    ?>
    											</div>
                                                <?php
                                                // For view action only 
                                                if($tab=='nodisplay')
                                                {
                                                    ?>

                                                <div class="forview <?php if($tab=='tab-pane')echo 'nodisplay';?>">
                                                    <?php include('subpages/documents/forview.php');?>
                                                </div>

                                                <?php
                                                }
                                                ?>
										</div>
									</div>
									<div class="form-actions <?php if($tab=='nodisplay')echo $tab;?>">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<a href="javascript:;" class="btn default button-previous">
												<i class="m-icon-swapleft"></i> Back </a>

                                                <a href="javascript:;" class="btn red button-next">
												Skip <i class="m-icon-swapdown m-icon-white"></i>
												</a>

												<a href="javascript:;" class="btn blue button-next cont">
												Save & Continue <i class="m-icon-swapright m-icon-white"></i>
												</a>

												
                                                <a href="javascript:window.print();" class="btn btn-info button-submit">Print</a>
											</div>
										</div>
									</div>
								</div>
							<!--</form> -->
						</div>
					</div>
				</div>
			</div>
<script>

    
    client_id = '<?=$cid?>',
    doc_id = '<?=$did?>';
    <?php
    if($did)
    {
        ?>
         showforms('company_pre_screen_question.php');
         showforms('driver_application.php');
         showforms('driver_evaluation_form.php');
         showforms('document_tab_3.php');
        <?php
    }
    ?>
        //showforms(doc_type);
function showforms(form_type)
{
    
    if(form_type!= ""){
        $('.subform').load('<?php echo $this->request->webroot;?>documents/subpages/'+form_type);
        // loading data from db
        // debugger;
        var url = '<?php echo $this->request->webroot;?>documents/getOrderData/'+client_id+'/'+doc_id,
            param={form_type:form_type};
        $.getJSON(url,param,function(res){
            if(form_type == "company_pre_screen_question.php"){
                 $('#form_tab1').form('load',res);
                
                if(res.legal_eligible_work_cananda==1){
                    // debugger;
                    jQuery('#legal_eligible_work_cananda_1').closest('span').addClass('checked');
                    // document.getElementById("legal_eligible_work_cananda_1").checked = true;
                } else if(res.legal_eligible_work_cananda==0){
                    $('#form_tab1').find('#legal_eligible_work_cananda_0').closest('span').addClass('checked')
                }

                if(res.hold_current_canadian_pp==1){
                    $('#form_tab1').find('#hold_current_canadian_pp_1').closest('span').addClass('checked')
                } else if(res.hold_current_canadian_pp==0){
                    $('#form_tab1').find('#hold_current_canadian_pp_0').closest('span').addClass('checked')

                }

                if(res.have_pr_us_visa==1){
                    $('#form_tab1').find('#have_pr_us_visa_1').closest('span').addClass('checked')
                } else if(res.have_pr_us_visa==0){
                    $('#form_tab1').find('#have_pr_us_visa_0').closest('span').addClass('checked')

                }

                if(res.fast_card==1){
                    $('#form_tab1').find('#fast_card_1').closest('span').addClass('checked')
                } else if(res.fast_card==0){
                    $('#form_tab1').find('#fast_card_0').closest('span').addClass('checked')

                }

                if(res.criminal_offence_pardon_not_granted==1){
                    $('#form_tab1').find('#criminal_offence_pardon_not_granted_1').closest('span').addClass('checked')
                } else if(res.criminal_offence_pardon_not_granted==0){
                    $('#form_tab1').find('#criminal_offence_pardon_not_granted_0').closest('span').addClass('checked')

                }

                if(res.reefer_load==1){
                    $('#form_tab1').find('#reefer_load_1').closest('span').addClass('checked')
                } else if(res.reefer_load==0){
                    $('#form_tab1').find('#reefer_load_0').closest('span').addClass('checked')

                }
              //$('input[type="radio"]').buttonset("refresh");
                    // end pre screening
            } else if(form_type == "driver_application.php"){
                 $('#form_tab2').form('load',res);
                 if(res.worked_for_client==1){
                     jQuery('#form_tab2').find('#worked_for_client_1').closest('span').addClass('checked')
                 } else if(res.worked_for_client==0){
                     $('#form_tab2').find('#worked_for_client_0').closest('span').addClass('checked')
                 }
                 if(res.is_employed==1){
                     jQuery('#form_tab2').find('#is_employed_1').closest('span').addClass('checked')
                 } else if(res.is_employed==0){
                     $('#form_tab2').find('#is_employed_0').closest('span').addClass('checked')
                 }

                 if(res.age_21==1){
                     $('#form_tab2').find('#age_21_1').closest('span').addClass('checked')
                 } else if(res.age_21==0){
                     $('#form_tab2').find('#age_21_0').closest('span').addClass('checked')

                 }

                 if(res.proof_of_age==1){
                     $('#form_tab2').find('#proof_of_age_1').closest('span').addClass('checked')
                 } else if(res.proof_of_age==0){
                     $('#form_tab2').find('#proof_of_age_0').closest('span').addClass('checked')

                 }

                 if(res.proof_of_age==1){
                     $('#form_tab2').find('#proof_of_age_1').closest('span').addClass('checked')
                 } else if(res.proof_of_age==0){
                     $('#form_tab2').find('#proof_of_age_0').closest('span').addClass('checked')

                 }

                 if(res.convicted_criminal==1){
                     $('#form_tab2').find('#convicted_criminal_1').closest('span').addClass('checked')
                 } else if(res.convicted_criminal==0){
                     $('#form_tab2').find('#convicted_criminal_0').closest('span').addClass('checked')

                 }

                 if(res.denied_entry_us==1){
                     $('#form_tab2').find('#denied_entry_us_1').closest('span').addClass('checked')
                 } else if(res.denied_entry_us==0){
                     $('#form_tab2').find('#denied_entry_us_0').closest('span').addClass('checked')

                 }

                  if(res.denied_entry_us==1){
                     $('#form_tab2').find('#denied_entry_us_1').closest('span').addClass('checked')
                 } else if(res.denied_entry_us==0){
                     $('#form_tab2').find('#denied_entry_us_0').closest('span').addClass('checked')

                 }

                if(res.positive_controlled_substance==1){
                     $('#form_tab2').find('#positive_controlled_substance_1').closest('span').addClass('checked')
                 } else if(res.positive_controlled_substance==0){
                     $('#form_tab2').find('#positive_controlled_substance_0').closest('span').addClass('checked')

                 }

                if(res.refuse_drug_test==1){
                     $('#form_tab2').find('#refuse_drug_test_1').closest('span').addClass('checked')
                 } else if(res.refuse_drug_test==0){
                     $('#form_tab2').find('#refuse_drug_test_0').closest('span').addClass('checked')

                 }

                if(res.breath_alcohol==1){
                     $('#form_tab2').find('#breath_alcohol_1').closest('span').addClass('checked')
                 } else if(res.breath_alcohol==0){
                     $('#form_tab2').find('#breath_alcohol_0').closest('span').addClass('checked')

                 }
                
                if(res.fast_card==1){
                     $('#form_tab2').find('#fast_card_1').closest('span').addClass('checked')
                 } else if(res.fast_card==0){
                     $('#form_tab2').find('#fast_card_0').closest('span').addClass('checked')

                 }
                
                if(res.not_able_perform_function_position==1){
                     $('#form_tab2').find('#not_able_perform_function_position_1').closest('span').addClass('checked')
                 } else if(res.not_able_perform_function_position==0){
                     $('#form_tab2').find('#not_able_perform_function_position_0').closest('span').addClass('checked')

                 }
                
                if(res.physical_capable_heavy_manual_work==1){
                     $('#form_tab2').find('#physical_capable_heavy_manual_work_1').closest('span').addClass('checked')
                 } else if(res.physical_capable_heavy_manual_work==0){
                     $('#form_tab2').find('#physical_capable_heavy_manual_work_0').closest('span').addClass('checked')

                 }
                
                if(res.injured_on_job==1){
                     $('#form_tab2').find('#injured_on_job_1').closest('span').addClass('checked')
                 } else if(res.injured_on_job==0){
                     $('#form_tab2').find('#injured_on_job_0').closest('span').addClass('checked')

                 } 
                 
                 if(res.willing_physical_examination==1){
                     $('#form_tab2').find('#willing_physical_examination_1').closest('span').addClass('checked')
                 } else if(res.willing_physical_examination==0){
                     $('#form_tab2').find('#willing_physical_examination_0').closest('span').addClass('checked')

                 } 
                 if(res.ever_been_denied==1){
                     $('#form_tab2').find('#ever_been_denied_1').closest('span').addClass('checked')
                 } else if(res.ever_been_denied==0){
                     $('#form_tab2').find('#ever_been_denied_0').closest('span').addClass('checked')

                 } 
                 if(res.suspend_any_license==1){
                     $('#form_tab2').find('#suspend_any_license_1').closest('span').addClass('checked')
                 } else if(res.suspend_any_license==0){
                     $('#form_tab2').find('#suspend_any_license_0').closest('span').addClass('checked')

                 }

                 // driver applicaton ends
            }else if(form_type == "driver_evaluation_form.php"){
                $('#form_tab3').form('load',res);

                 if(res.transmission_manual_shift==1){
                     $('#form_tab3').find('#transmission_manual_shift_1').closest('span').addClass('checked')
                 }
                 if(res.transmission_auto_shift==2){
                     $('#form_tab3').find('#transmission_auto_shift_2').closest('span').addClass('checked')
                 }

                if(res.pre_hire==1) {
                    $('#form_tab3').find('input[name="pre_hire"]').closest('span').addClass('checked')
                }
                if(res.post_accident==2) {
                    $('#form_tab3').find('input[name="post_accident"]').closest('span').addClass('checked')
                }
                if(res.post_injury==1) {
                    $('#form_tab3').find('input[name="post_injury"]').closest('span').addClass('checked')
                }
                if(res.post_training==2) {
                    $('#form_tab3').find('input[name="post_training"]').closest('span').addClass('checked')
                }
                if(res.annual==1) {
                    $('#form_tab3').find('input[name="annual"]').closest('span').addClass('checked')
                }
                if(res.skill_verification==2) {
                    $('#form_tab3').find('input[name="skill_verification"]').closest('span').addClass('checked')
                }

                if(res.fuel_tank==1){
                    $('#form_tab3').find('input[name="fuel_tank"]').closest('span').addClass('checked')
                }
                if(res.all_gauges==1){
                    $('#form_tab3').find('input[name="all_gauges"]').closest('span').addClass('checked')
                }
                if(res.audible_air==1){
                    $('#form_tab3').find('input[name="audible_air"]').closest('span').addClass('checked')
                }
                if(res.wheels_tires==1){
                    $('#form_tab3').find('input[name="wheels_tires"]').closest('span').addClass('checked')
                }
                if(res.trailer_brakes==1){
                    $('#form_tab3').find('input[name="trailer_brakes"]').closest('span').addClass('checked')
                }
                if(res.trailer_airlines==1){
                    $('#form_tab3').find('input[name="trailer_airlines"]').closest('span').addClass('checked')
                }
                if(res.inspect_5th_wheel==1){
                    $('#form_tab3').find('input[name="inspect_5th_wheel"]').closest('span').addClass('checked')
                }
                if(res.cold_check==1){
                    $('#form_tab3').find('input[name="cold_check"]').closest('span').addClass('checked')
                }
                if(res.seat_mirror==1){
                    $('#form_tab3').find('input[name="seat_mirror"]').closest('span').addClass('checked')
                }
                if(res.coupling==1){
                    $('#form_tab3').find('input[name="coupling"]').closest('span').addClass('checked')
                }
                if(res.paperwork==1){
                    $('#form_tab3').find('input[name="paperwork"]').closest('span').addClass('checked')
                }
                if(res.lights_abs_lamps==1){
                    $('#form_tab3').find('input[name="lights_abs_lamps"]').closest('span').addClass('checked')
                }
                if(res.annual_inspection_strickers==1){
                    $('#form_tab3').find('input[name="annual_inspection_strickers"]').closest('span').addClass('checked')
                }
                if(res.cab_air_brake_checked==1){
                    $('#form_tab3').find('input[name="cab_air_brake_checked"]').closest('span').addClass('checked')
                }
                if(res.landing_gear==1){
                    $('#form_tab3').find('input[name="landing_gear"]').closest('span').addClass('checked')
                }
                if(res.emergency_exit==1){
                    $('#form_tab3').find('input[name="emergency_exit"]').closest('span').addClass('checked')
                }

                if(res.driving_follows_too_closely==1){
                    $('#form_tab3').find('#driving_follows_too_closely_1').closest('span').addClass('checked')
                } else if(res.driving_follows_too_closely==2){
                    $('#form_tab3').find('#driving_follows_too_closely_2').closest('span').addClass('checked')
                }else if(res.driving_follows_too_closely==3){
                    $('#form_tab3').find('#driving_follows_too_closely_3').closest('span').addClass('checked')
                }else if(res.driving_follows_too_closely==4){
                    $('#form_tab3').find('#driving_follows_too_closely_4').closest('span').addClass('checked')
                }
                

                if(res.driving_improper_choice_lane==1){
                    $('#form_tab3').find('#driving_improper_choice_lane_1').closest('span').addClass('checked')
                } else if(res.driving_improper_choice_lane==2){
                    $('#form_tab3').find('#driving_improper_choice_lane_2').closest('span').addClass('checked')
                }else if(res.driving_improper_choice_lane==3){
                    $('#form_tab3').find('#driving_improper_choice_lane_3').closest('span').addClass('checked')
                }else if(res.driving_improper_choice_lane==4){
                    $('#form_tab3').find('#driving_improper_choice_lane_4').closest('span').addClass('checked')
                }
                

                if(res.driving_fails_use_mirror_properly==1){
                    $('#form_tab3').find('#driving_fails_use_mirror_properly_1').closest('span').addClass('checked')
                } else if(res.driving_fails_use_mirror_properly==2){
                    $('#form_tab3').find('#driving_fails_use_mirror_properly_2').closest('span').addClass('checked')
                }else if(res.driving_fails_use_mirror_properly==3){
                    $('#form_tab3').find('#driving_fails_use_mirror_properly_3').closest('span').addClass('checked')
                }else if(res.driving_fails_use_mirror_properly==4){
                    $('#form_tab3').find('#driving_fails_use_mirror_properly_4').closest('span').addClass('checked')
                }

                if(res.driving_signal==1){
                    $('#form_tab3').find('#driving_signal_1').closest('span').addClass('checked')
                } else if(res.driving_signal==2){
                    $('#form_tab3').find('#driving_signal_2').closest('span').addClass('checked')
                }else if(res.driving_signal==3){
                    $('#form_tab3').find('#driving_signal_3').closest('span').addClass('checked')
                }else if(res.driving_signal==4){
                    $('#form_tab3').find('#driving_signal_4').closest('span').addClass('checked')
                }

                if(res.driving_fail_use_caution_rr==1){
                    $('#form_tab3').find('#driving_fail_use_caution_rr_1').closest('span').addClass('checked')
                } else if(res.driving_fail_use_caution_rr==2){
                    $('#form_tab3').find('#driving_fail_use_caution_rr_2').closest('span').addClass('checked')
                }else if(res.driving_fail_use_caution_rr==3){
                    $('#form_tab3').find('#driving_fail_use_caution_rr_3').closest('span').addClass('checked')
                }else if(res.driving_fail_use_caution_rr==4){
                    $('#form_tab3').find('#driving_fail_use_caution_rr_4').closest('span').addClass('checked')
                }

                if(res.driving_speed==1){
                    $('#form_tab3').find('#driving_speed_1').closest('span').addClass('checked')
                } else if(res.driving_speed==2){
                    $('#form_tab3').find('#driving_speed_2').closest('span').addClass('checked')
                }else if(res.driving_speed==3){
                    $('#form_tab3').find('#driving_speed_3').closest('span').addClass('checked')
                }else if(res.driving_speed==4){
                    $('#form_tab3').find('#driving_speed_4').closest('span').addClass('checked')
                }
                
                if(res.driving_incorrect_use_clutch_brake==1){
                    $('#form_tab3').find('#driving_incorrect_use_clutch_brake_1').closest('span').addClass('checked')
                } else if(res.driving_incorrect_use_clutch_brake==2){
                    $('#form_tab3').find('#driving_incorrect_use_clutch_brake_2').closest('span').addClass('checked')
                }else if(res.driving_incorrect_use_clutch_brake==3){
                    $('#form_tab3').find('#driving_incorrect_use_clutch_brake_3').closest('span').addClass('checked')
                }else if(res.driving_incorrect_use_clutch_brake==4){
                    $('#form_tab3').find('#driving_incorrect_use_clutch_brake_4').closest('span').addClass('checked')
                }

                if(res.driving_accelerator_gear_steer==1){
                    $('#form_tab3').find('#driving_accelerator_gear_steer_1').closest('span').addClass('checked')
                } else if(res.driving_accelerator_gear_steer==2){
                    $('#form_tab3').find('#driving_accelerator_gear_steer_2').closest('span').addClass('checked')
                }else if(res.driving_accelerator_gear_steer==3){
                    $('#form_tab3').find('#driving_accelerator_gear_steer_3').closest('span').addClass('checked')
                }else if(res.driving_accelerator_gear_steer==4){
                    $('#form_tab3').find('#driving_accelerator_gear_steer_4').closest('span').addClass('checked')
                } 

                if(res.driving_incorrect_observation_skills==1){
                    $('#form_tab3').find('#driving_incorrect_observation_skills_1').closest('span').addClass('checked')
                } else if(res.driving_incorrect_observation_skills==2){
                    $('#form_tab3').find('#driving_incorrect_observation_skills_2').closest('span').addClass('checked')
                }else if(res.driving_incorrect_observation_skills==3){
                    $('#form_tab3').find('#driving_incorrect_observation_skills_3').closest('span').addClass('checked')
                }else if(res.driving_incorrect_observation_skills==4){
                    $('#form_tab3').find('#driving_incorrect_observation_skills_4').closest('span').addClass('checked')
                }

                if(res.driving_respond_instruction==1){
                    $('#form_tab3').find('#driving_respond_instruction_1').closest('span').addClass('checked')
                } else if(res.driving_respond_instruction==2){
                    $('#form_tab3').find('#driving_respond_instruction_2').closest('span').addClass('checked')
                }else if(res.driving_respond_instruction==3){
                    $('#form_tab3').find('#driving_respond_instruction_3').closest('span').addClass('checked')
                }else if(res.driving_respond_instruction==4){
                    $('#form_tab3').find('#driving_respond_instruction_4').closest('span').addClass('checked')
                }

                if(res.cornering_signaling==1){
                    $('#form_tab3').find('#cornering_signaling_1').closest('span').addClass('checked')
                } else if(res.cornering_signaling==2){
                    $('#form_tab3').find('#cornering_signaling_2').closest('span').addClass('checked')
                }else if(res.cornering_signaling==3){
                    $('#form_tab3').find('#cornering_signaling_3').closest('span').addClass('checked')
                }else if(res.cornering_signaling==4){
                    $('#form_tab3').find('#cornering_signaling_4').closest('span').addClass('checked')
                }

                if(res.cornering_speed==1){
                    $('#form_tab3').find('#cornering_speed_1').closest('span').addClass('checked')
                } else if(res.cornering_speed==2){
                    $('#form_tab3').find('#cornering_speed_2').closest('span').addClass('checked')
                }else if(res.cornering_speed==3){
                    $('#form_tab3').find('#cornering_speed_3').closest('span').addClass('checked')
                }else if(res.cornering_speed==4){
                    $('#form_tab3').find('#cornering_speed_4').closest('span').addClass('checked')
                }
                
                if(res.cornering_fails==1){
                    $('#form_tab3').find('#cornering_fails_1').closest('span').addClass('checked')
                } else if(res.cornering_fails==2){
                    $('#form_tab3').find('#cornering_fails_2').closest('span').addClass('checked')
                }else if(res.cornering_fails==3){
                    $('#form_tab3').find('#cornering_fails_3').closest('span').addClass('checked')
                }else if(res.cornering_fails==4){
                    $('#form_tab3').find('#cornering_fails_4').closest('span').addClass('checked')
                }

                if(res.cornering_proper_set_up_turn==1){
                    $('#form_tab3').find('#cornering_proper_set_up_turn_1').closest('span').addClass('checked')
                } else if(res.cornering_proper_set_up_turn==2){
                    $('#form_tab3').find('#cornering_proper_set_up_turn_2').closest('span').addClass('checked')
                }else if(res.cornering_proper_set_up_turn==3){
                    $('#form_tab3').find('#cornering_proper_set_up_turn_3').closest('span').addClass('checked')
                }else if(res.cornering_proper_set_up_turn==4){
                    $('#form_tab3').find('#cornering_proper_set_up_turn_4').closest('span').addClass('checked')
                }

                if(res.cornering_turns==1){
                    $('#form_tab3').find('#cornering_turns_1').closest('span').addClass('checked')
                } else if(res.cornering_turns==2){
                    $('#form_tab3').find('#cornering_turns_2').closest('span').addClass('checked')
                }else if(res.cornering_turns==3){
                    $('#form_tab3').find('#cornering_turns_3').closest('span').addClass('checked')
                }else if(res.cornering_turns==4){
                    $('#form_tab3').find('#cornering_turns_4').closest('span').addClass('checked')
                }
                

                if(res.cornering_wrong_lane_impede==1){
                    $('#form_tab3').find('#cornering_wrong_lane_impede_1').closest('span').addClass('checked')
                } else if(res.cornering_wrong_lane_impede==2){
                    $('#form_tab3').find('#cornering_wrong_lane_impede_2').closest('span').addClass('checked')
                }else if(res.cornering_wrong_lane_impede==3){
                    $('#form_tab3').find('#cornering_wrong_lane_impede_3').closest('span').addClass('checked')
                }else if(res.cornering_wrong_lane_impede==4){
                    $('#form_tab3').find('#cornering_wrong_lane_impede_4').closest('span').addClass('checked')
                }
                
                if(res.shifting_smooth_take_off==1){
                    $('#form_tab3').find('#shifting_smooth_take_off_1').closest('span').addClass('checked')
                } else if(res.shifting_smooth_take_off==2){
                    $('#form_tab3').find('#shifting_smooth_take_off_2').closest('span').addClass('checked')
                }else if(res.shifting_smooth_take_off==3){
                    $('#form_tab3').find('#shifting_smooth_take_off_3').closest('span').addClass('checked')
                }else if(res.shifting_smooth_take_off==4){
                    $('#form_tab3').find('#shifting_smooth_take_off_4').closest('span').addClass('checked')
                }

                if(res.shifting_proper_gear_selection==1){
                    $('#form_tab3').find('#shifting_proper_gear_selection_1').closest('span').addClass('checked')
                } else if(res.shifting_proper_gear_selection==2){
                    $('#form_tab3').find('#shifting_proper_gear_selection_2').closest('span').addClass('checked')
                }else if(res.shifting_proper_gear_selection==3){
                    $('#form_tab3').find('#shifting_proper_gear_selection_3').closest('span').addClass('checked')
                }else if(res.shifting_proper_gear_selection==4){
                    $('#form_tab3').find('#shifting_proper_gear_selection_4').closest('span').addClass('checked')
                }

                if(res.shifting_proper_clutching==1){
                    $('#form_tab3').find('#shifting_proper_clutching_1').closest('span').addClass('checked')
                } else if(res.shifting_proper_clutching==2){
                    $('#form_tab3').find('#shifting_proper_clutching_2').closest('span').addClass('checked')
                }else if(res.shifting_proper_clutching==3){
                    $('#form_tab3').find('#shifting_proper_clutching_3').closest('span').addClass('checked')
                }else if(res.shifting_proper_clutching==4){
                    $('#form_tab3').find('#shifting_proper_clutching_4').closest('span').addClass('checked')
                }

                if(res.shifting_gear_recovery==1){
                    $('#form_tab3').find('#shifting_gear_recovery_1').closest('span').addClass('checked')
                } else if(res.shifting_gear_recovery==2){
                    $('#form_tab3').find('#shifting_gear_recovery_2').closest('span').addClass('checked')
                }else if(res.shifting_gear_recovery==3){
                    $('#form_tab3').find('#shifting_gear_recovery_3').closest('span').addClass('checked')
                }else if(res.shifting_gear_recovery==4){
                    $('#form_tab3').find('#shifting_gear_recovery_4').closest('span').addClass('checked')
                }

                if(res.shifting_up_down==1){
                    $('#form_tab3').find('#shifting_up_down_1').closest('span').addClass('checked')
                } else if(res.shifting_up_down==2){
                    $('#form_tab3').find('#shifting_up_down_2').closest('span').addClass('checked')
                }else if(res.shifting_up_down==3){
                    $('#form_tab3').find('#shifting_up_down_3').closest('span').addClass('checked')
                }else if(res.shifting_up_down==4){
                    $('#form_tab3').find('#shifting_up_down_4').closest('span').addClass('checked')
                }
                
                if(res.backing_uses_proper_set_up==1){
                    $('#form_tab3').find('#backing_uses_proper_set_up_1').closest('span').addClass('checked')
                }

                if(res.backing_path_before_while_driving==1){
                    $('#form_tab3').find('#backing_path_before_while_driving_1').closest('span').addClass('checked')
                } else if(res.backing_path_before_while_driving==2){
                    $('#form_tab3').find('#backing_path_before_while_driving_2').closest('span').addClass('checked')
                }

                if(res.backing_use_4way_flashers_city_horn==1){
                    $('#form_tab3').find('#backing_use_4way_flashers_city_horn_1').closest('span').addClass('checked')
                } else if(res.backing_use_4way_flashers_city_horn==2){
                    $('#form_tab3').find('#backing_use_4way_flashers_city_horn_2').closest('span').addClass('checked')
                }

                if(res.backing_show_certainty_while_steering==1){
                    $('#form_tab3').find('#backing_show_certainty_while_steering_1').closest('span').addClass('checked')
                } else if(res.backing_show_certainty_while_steering==2){
                    $('#form_tab3').find('#backing_show_certainty_while_steering_2').closest('span').addClass('checked')
                }

                if(res.backing_continually_uses_mirror==1){
                    $('#form_tab3').find('#backing_continually_uses_mirror_1').closest('span').addClass('checked')
                } else if(res.backing_continually_uses_mirror==2){
                    $('#form_tab3').find('#backing_continually_uses_mirror_2').closest('span').addClass('checked')
                }

                if(res.backing_maintain_proper_seed==1){
                    $('#form_tab3').find('#backing_maintain_proper_seed_1').closest('span').addClass('checked')
                }

                if(res.backing_complete_reasonable_time_fashion==1){
                    $('#form_tab3').find('#backing_complete_reasonable_time_fashion_1').closest('span').addClass('checked')
                }
                
                if(res.recommended_for_hire==1){
                    $('#form_tab3').find('#recommended_for_hire_1').closest('span').addClass('checked')
                } else if(res.recommended_for_hire==2){
                    $('#form_tab3').find('#recommended_for_hire_2').closest('span').addClass('checked')
                }
                
                if(res.recommended_full_trainee==1){
                    $('#form_tab3').find('#recommended_full_trainee_1').closest('span').addClass('checked')
                } else if(res.recommended_full_trainee==2){
                    $('#form_tab3').find('#recommended_full_trainee_0').closest('span').addClass('checked')

                }if(res.recommended_fire_hire_trainee==1){
                    $('#form_tab3').find('#recommended_fire_hire_trainee_1').closest('span').addClass('checked')
                } else if(res.recommended_fire_hire_trainee==2){
                    $('#form_tab3').find('#recommended_fire_hire_trainee_0').closest('span').addClass('checked')
                }


                // end road test
            }else if(form_type == "document_tab_3.php"){
               
                $('#form_consent').find(':input').each(function(){
                 var $name = $(this).attr('name');
                 
               if($name!='offence[]' && $name!='date_of_sentence[]' && $name!= 'location[]')  {
               $(this).val(res[$name]);
               
               }
               });
                
                    
                
                // assignValue('form_tab4',res);
                // mee order ends
            }
        });
    }
    else
        $('.subform').html("");
}


function assignValue(formID,obj){
    debugger;
   $('#'+formID).form('load',obj);  
   // $('#'+formID).find(':input').each(function(){
   //      var $name = $(this).attr('name');
   //      $(this).val(obj[$name]);

   // });
   /*
$.each(obj,function(index,value){
// debugger;
    $('#'+formID).find('input[name="'+index+'"]').val(value);
});*/
}

///////////////////////////////////////////////////////
///////////////////////////////////////////////////////


function subform(form_type)
{
    var filename = form_type.replace(/\W/g, '_');
    var filename = filename.toLowerCase();
    $('.subform').show();   1
    $('.subform').load('<?php echo $this->request->webroot;?>documents/subpages/'+filename);
}
jQuery(document).ready(function() {
    <?php
    if($this->request['action']=='vieworder')
    {
        ?>
        $('.tab-content input').attr('disabled','disabled');
        $('.tab-content select').attr('disabled','disabled');
        $('.tab-content textarea').attr('disabled','disabled');
        $('.cont').html('Next <i class="m-icon-swapright m-icon-white"></i>');
        $('.cont').parent().find('.red').remove();
        $('.cont').removeClass('cont');
        <?php
    }
    ?>
    $(document.body).on('click','.cont',function(){
    var type=$(".tab-pane.active").prev('.tab-pane').find("input[name='document_type']").val();
    var data = {uploaded_for:$('#uploaded_for').val(),type:type};
    $.ajax({
       //data:'uploaded_for='+$('#uploaded_for').val(),
       data : data,
       type:'post',
       url:'<?php echo $this->request->webroot;?>documents/savedoc/<?php echo $cid;?>/'+$('#did').val(), 
       success:function(res) {
        $('#did').val(res);
         // saving data
        doc_id = res;
         if(type == "Pre-Screening"){
         var forms = $(".tab-pane.active").prev('.tab-pane').find(':input'),
             url = '<?php echo $this->request->webroot;?>documents/savePrescreening',
             order_id =$('#did').val(),
             cid = '<?php echo $cid;?>';
            savePrescreen(url,order_id,cid,forms);

         } else if(type=="Driver Application") {
            alert(type);
                var  order_id =$('#did').val(),
                    cid = '<?php echo $cid;?>',
                    url = '<?php echo $this->request->webroot;?>documents/savedDriverApp/'+order_id+'/'+cid;                      
                     savedDriverApp(url,order_id,cid);
         }else if(type=="Road test") {
              var order_id =$('#did').val(),
                    cid = '<?php echo $cid;?>',
                    url = '<?php echo $this->request->webroot;?>documents/savedDriverEvaluation/'+order_id+'/'+cid;
                   savedDriverEvaluation(url,order_id,cid);
        } else if(type=="Place MEE Order") {
             
             var order_id =$('#did').val(),
                cid = '<?php echo $cid;?>',
                url = '<?php echo $this->request->webroot;?>documents/savedMeeOrder/'+order_id+'/'+cid;
              savedMeeOrder(url,order_id,cid);
      }

       }
    });
    });
   $('#addfiles').click(function(){
            //alert("ssss");
           $('#doc').append('<div style="padding-top:10px;"><a href="#" class="btn btn-success">Browse</a> <a href="javascript:void(0);" class="btn btn-danger" onclick="$(this).parent().remove();">Delete</a><br/></div>');
        });
});

function savePrescreen(url,order_id,cid){
    var param = {
        order_id: order_id,
        cid: cid,
        inputs:$('#form_tab1').serialize()
    };
    $.ajax({
    url:url,
    data: param,
    type:'POST',
    success: function(res){

    }
    });
}

function savedDriverApp(url,order_id,cid){
    var param = $('#form_tab2').serialize()
    $.ajax({
    url:url,
    data: param,
    type:'POST',
    success: function(res){

    }
    });
}
function savedDriverEvaluation(url,order_id,cid){
    var param = $('#form_tab3').serialize();

    $.ajax({
    url:url,
    data: param,
    type:'POST',
    success: function(res){

    }
    });
    }

    function savedMeeOrder(url,order_id,cid){
        var param = $('#form_consent').serialize();
        $.ajax({
        url:url,
        data: param,
        type:'POST',
        success: function(res){
            //employment
            var url = '<?php echo $this->request->webroot;?>documents/saveEmployment/'+order_id+'/'+cid,
                employment=$('#form_employment').serialize();
                saveEmployment(url,employment);

            //education
            url = '<?php echo $this->request->webroot;?>documents/saveEducation/'+order_id+'/'+cid,
                education=$('#form_education').serialize();
                saveEducation(url,education);
        }
        });
    }

    function saveEmployment(url,param){
        $.ajax({
            url:url,
            data:param,
            type:'POST',
            success:function(rea){

            }
        });
    }

    function saveEducation(url,param){
        $.ajax({
            url:url,
            data:param,
            type:'POST',
            success:function(res){
                
            }
        });
    }



</script>

<style>
@media print {
    .page-header{display:none;}
    .page-footer,.nav-tabs,.page-title,.page-bar,.theme-panel,.page-sidebar-wrapper,.form-actions,.steps,.caption{display:none!important;}
    .portlet-body,.portlet-title{border-top:1px solid #578EBE;}
    .tabbable-line{border:none!important;}
    
    }
</style>
