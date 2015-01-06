<div id="fourth">
<input class="document_type" type="hidden" name="document_type" value="Place MEE Order" />
<input type="hidden" name="sub_doc_id" value="<?php if(isset($_GET['doc_id']))echo $_GET['doc_id']; else echo $d->id ?>"  />
<div>
                                                <ul class="nav nav-tabs">


                                                    <li class="active">
        												<a href="#subtab_2_1" data-toggle="tab">Consent Form</a>
        											</li>
                                                    <li class="">
                                                        <a href="#subtab_2_2" data-toggle="tab">Employment Verification</a>
                                                    </li>
                                                    <li>
                                                        <a href="#subtab_2_3" data-toggle="tab">Education Verification</a>
                                                    </li>
        											


        										</ul>
                                                </div>
                                                <div class="tab-content">
                                                <div class="tab-pane active" id="subtab_2_1">
                                                    <div class="">
                                						
                                							
                                								<h1>Consent Form</h1>
                                							

                                						
                                							<!-- BEGIN FORM-->
                                							<?php include('consent_form.php');?>
                                							<!-- END FORM-->
                                						
                                					</div>

                                                </div>
                                                <div class="tab-pane" id="subtab_2_2">
                                                    
                                                    <div class="">
                                						<h1>Employment Verification</h1>
                                                        <?php include('employment_verification_form.php');?>
                                					</div>
                                                                
                                						
                                                </div>

                                                <div class="tab-pane" id="subtab_2_3">
                                                    <div class="">
                                						<h1>Education Verification</h1>
                                                        <?php include('education_verification_form.php');?>
                                					</div>

                                                </div>


											</div>
</div>