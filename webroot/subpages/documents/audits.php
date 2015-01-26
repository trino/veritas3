<div class="portlet-body form">
<!-- BEGIN FORM-->
<form action="<?php echo $this->request->webroot;?>documents/audits/<?php echo $cid;?>/<?php echo $did;?>" class="form-horizontal">
<input type="hidden" class="document_type" name="document_type" value="Audits"/>
    <input type="hidden" name="sub_doc_id" value="7" class="sub_docs_id" id="af" />
<div class="form-body">
                                                
                                                <div class="form-group">
<label class="col-md-3 control-label">Company / Division</label>
<div class="col-md-4">
<input type="text" name="company" class="form-control " placeholder="Enter text">
</div>
</div>
                                                
<div class="form-group">
<label class="col-md-3 control-label">Conference Name</label>
<div class="col-md-4">
<input type="text" name="conference_name"  class="form-control " placeholder="Enter text" />
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label">Related Association</label>
<div class="col-md-4">
<input type="text" name="association" class="form-control " placeholder="Enter text"
/>	</div>
</div>
                                                                                                
<div class="form-group">
<label class="col-md-3 control-label">Date </label>
                                                      <div class="col-md-3">
                                                      <select class="form-control member_type" name="year" >
                                                        <option value=""> Month </option>
                                                        <option value="1">January</option>
                                                        <option value="2">February</option>
                                                        <option value="1">March</option>
                                                        <option value="2">April</option>
                                                        <option value="1">May</option>
                                                        <option value="2">June</option>
                                                        <option value="1">July</option>
                                                        <option value="2">August</option>
                                                        <option value="1">September</option>
                                                        <option value="2">October</option>
                                                        <option value="1">November</option>
                                                        <option value="2">December</option>
                                                    </select>             
                                                      </div>
                                                      <div class="col-md-3">
                                                        <select class=" form-control member_type" name="month" >
                                                        <option value=""> Year </option>
                                                        <option value="2015"> 2015 </option>
                                                        <option value="2016"> 2016 </option>
                                                        <option value="2017"> 2017 </option>
                                                        <option value="2018"> 2018 </option>
                                                        <option value="2019"> 2019 </option>
                                                        <option value="2020"> 2020 </option>
                                                        
                                                    </select>
                             	  </div>
</div>   
                                                
                                                                                            
                                                <div class="form-group">
<label class="col-md-3 control-label">Location</label>

<div class="col-md-3">
<input type="text" name="city"  class="form-control req_driver" placeholder="City">
</div>                                                    

</div>
 
 
                                                <div class="form-group">                                                  
                                                    <label class="col-md-3 control-label"> &nbsp; &nbsp; </label>
                                                    <div class="col-md-3">
                                                         <div class="form-group">
                                                            <select name="province" class="form-control member_type">
                                                                <option value="AB">AB</option>
                                                                <option value="BC">BC</option>
                                                                <option value="MB">MB</option>
                                                                <option value="NB">NB</option>
                                                                <option value="NL">NL</option>
                                                                <option value="NT">NT</option>
                                                                <option value="NS">NS</option>
                                                                <option value="NU">NU</option>
                                                                <option value="ON">ON</option>
                                                                <option value="PE">PE</option>
                                                                <option value="QC">QC</option>
                                                                <option value="SK">SK</option>
                                                                <option value="YT">YT</option>
                                                            </select>
                                   	</div>
                                </div>
                                                    <div class="col-md-3">
<input type="text" name="country" class="form-control req_driver" value="Canada">
</div>

</div>
 
 
                                                <div class="form-group">
<label class="col-md-3 control-label">Estimated Total Cost 
                                                    <small class=" control-label">Booth/Travel/Hotels/Meals</small>
                                                    </label>
                                                    
<div class="col-md-4">
<input type="text" name="total_cost" class="form-control " placeholder="Enter text">
</div>
</div>                                                

 	<div class="form-group">
<label class="col-md-3 control-label">Rating Total 
                                                    <small class=" control-label">[Out of 40]</small>
                                                    </label>
                                                    
<div class="col-md-3">
                                                         <div class="form-group">
                                                            <select name="total_rating" class="form-control member_type">
                                                              <?php for($i=1; $i<=40; $i++):?>
                                                              <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                              <?php endfor;?>
                                                            </select>
                                   	</div>
                                </div>
</div>
                                                
                                       	<h2> Objectives </h2>         

<div class="form-group">
<label class="col-md-3 control-label">
                                                    What were the primary objectives at the show?
                                                    </label>
<div class="col-md-8">
<textarea class="form-control" name="primary_objectives" id="primary_objectives" rows="3"></textarea>
</div>
                                                    
                                                    
</div>                                                

<div class="form-group">
<label class="col-md-3 control-label">
                                                    Do you feel the objectives were achieved? Provide a grade rating of 1 to 10 (10 is best) and provide details.
                                                    </label>
<div class="col-md-8">
<textarea class="form-control" name="objectives" id="primary_objectives" rows="3"></textarea>
</div>
</div>   

<div class="form-group">
<label class="col-md-3 control-label">
                                                    Please provide suggestions for improvement.
                                                    </label>
<div class="col-md-8">
<textarea class="form-control" name="improvement" id="primary_objectives" rows="3"></textarea>
</div>
</div> 
                                                <h2> Leads </h2>
                                                <div class="form-group">
<label class="col-md-3 control-label">
                                                    Was the lead-collecting process in the booth effective (e.g. badge scanner, business card collecting)?
                                                    </label>
<div class="col-md-8">
<textarea class="form-control" name="lead_effective" id="primary_objectives" rows="3"></textarea>
</div>
</div>
 
                                                 <div class="form-group">
<label class="col-md-3 control-label">
How many leads were generated?                                                    </label>
<div class="col-md-8">
<textarea class="form-control" name="leads" id="primary_objectives" rows="3"></textarea>
</div>
</div> 
 
                                                 <div class="form-group">
<label class="col-md-3 control-label">
Rate the leads - how many do you feel are “quality"? 
                                                        Provide a grade rating of 1 to 10 (10 is best) and provide details.                                                   </label>
<div class="col-md-8">
<textarea class="form-control" name="leads_rate" id="primary_objectives" rows="3"></textarea>
</div>
</div>

 
                                                 <div class="form-group">
<label class="col-md-3 control-label">
Please provide suggestions for improvement of the lead collection and handling process.                                                   </label>
<div class="col-md-8">
<textarea class="form-control" name="handling" id="primary_objectives" rows="3"></textarea>
</div>
</div>
                                                
                                                <h2> Audience </h2>
   
                                                 <div class="form-group">
<label class="col-md-3 control-label">
Rate the type of attendees at the show 
                                                        (e.g. decision makers, decision influencers, general staff)?
                                                        Provide a grade rating of 1 to 10 (10 is best) and provide details.                                                   </label>
<div class="col-md-8">
<textarea class="form-control" name="attendees_rate" id="" rows="3"></textarea>
</div>
</div> 
                                                                                             
                                                <h2> Booth </h2>
   
                                                 <div class="form-group">
<label class="col-md-3 control-label">
Which of our services/products we provide was of most interest?
                    </label>
<div class="col-md-8">
<textarea class="form-control" name="interest" id="primary_objectives" rows="3"></textarea>
</div>
</div>                                                   
 
                                                  <div class="form-group">
<label class="col-md-3 control-label">
How was the booth location? Provide details.
                    </label>
<div class="col-md-8">
<textarea class="form-control" name="booth_location" id="primary_objectives" rows="3"></textarea>
</div>
</div> 
 
                                                   <div class="form-group">
<label class="col-md-3 control-label">
Rate the volume of booth traffic. 
                                                        Provide a grade rating of 1 to 10 (10 is best) and provide details.
                    </label>
<div class="col-md-8">
<textarea class="form-control" name="rating" id="primary_objectives" rows="3"></textarea>
</div>
</div> 
 
                                                    <div class="form-group">
<label class="col-md-3 control-label">
Please provide suggestions for improvement of the booth's appearance, 
                                                        messaging, display, location, etc.
                    </label>
<div class="col-md-8">
<textarea class="form-control" name="suggestions" id="primary_objectives" rows="3"></textarea>
</div>
</div> 
 	
                                            <h2> Promotion </h2>
                                            
                                                <div class="form-group">
<label class="col-md-3 control-label">
How was the promotional giveaway received (if applicable)? Provide details.
                    </label>
<div class="col-md-8">
<textarea class="form-control" name="promotional" id="primary_objectives" rows="3"></textarea>
</div>
</div>                                            
 
                                             <h2> Staffing </h2>
                                            
                                                <div class="form-group">
<label class="col-md-3 control-label">
Approximately how many attendees did you engage in conversation?
                    </label>
<div class="col-md-8">
<textarea class="form-control" name="attendees" id="primary_objectives" rows="3"></textarea>
</div>
</div> 

                                                <div class="form-group">
<label class="col-md-3 control-label">
Do you feel there was enough booth staff?
                    </label>
<div class="col-md-8">
<textarea class="form-control" name="booth_staff" id="primary_objectives" rows="3"></textarea>
</div>
</div> 
 
</div>
<!--<div class="form-actions">
<div class="row">
<div class="col-md-offset-3 col-md-9">
<button type="submit" class="btn btn-circle blue">Submit</button>
<button type="button" class="btn btn-circle default">Cancel</button>
</div>
</div>
</div>-->
</form>
<!-- END FORM-->
</div>