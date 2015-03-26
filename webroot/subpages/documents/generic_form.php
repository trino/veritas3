<?php
 if($_SERVER['SERVER_NAME'] =='localhost'){ echo "<span style ='color:red;'>subpages/documents/generic_form.php #INC165</span>"; }
 ?>
<form  enctype="multipart/form-data" action="<?php echo $this->request->webroot;?>documents/basic/<?php echo $cid .'/' .$did;?>" method="post" id="form_tab11">';

 <div class="form-group col-md-12">
    <label class="control-label col-md-6">How did you hear about the oppourtunity? </label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no1" />
    </div>
 </div>
 <div class="form-group col-md-12">
    <label class="control-label col-md-6">Are you legally eligible to work in Canada? </label>
    <div class="col-md-6">
        Yes <input type="radio" name="no2" value="1" />   
        No <input type="radio" name="no2"  value="0"/>   
    </div>
 </div>
 <div class="form-group col-md-12">
    <label class="control-label col-md-6">Do you hold a valid Canadian passport? </label>
    <div class="col-md-6">
    Yes <input type="radio" name="no3" value="1" />   
        No <input type="radio" name="no3" value="0" />   
    </div>
 </div>
 
 <div class="form-group col-md-12">
    <label class="control-label col-md-6">(If they do not have a valid Canadian passport) Do you have a Permanent Residency card and US Visa?</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no4" />
    </div>
 </div>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">Have you ever been convicted of a criminal offence for which a pardon has not been granted or, which could cause you to not cross the border?</label>
    <div class="col-md-6">
    Yes <input type="radio" name="no5" value="1" />   
        No <input type="radio" name="no5" value="0" />   
    </div>
 </div>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">How do you feel about running team? Do you have a partner?</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no6" />
    </div>
 </div>
 <h2>Discovery</h2>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">When did you get your AZ License and have you been commercially driving consistently since you got your license?</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no7" />
    </div>
 </div>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">Are you currently driving for another carrier? If yes, for whom and for how long?</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no8" />
    </div>
 </div>
 <h2>Tell me about the work you have been doing?</h2>
  <!--div class="form-group col-md-12">
    <label class="control-label col-md-6"></label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no9" />
    </div>
 </div-->
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">Miles</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no10" />
    </div>
 </div>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">Time out/home</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no11" />
    </div>
 </div>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">Locations</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no12" />
    </div>
 </div>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">Border Cross</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no13" />
    </div>
 </div>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">What type of equipment did you use?</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no14" />
    </div>
 </div>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">Was your equipment standard or automatic?</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no15" />
    </div>
 </div>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">Reefer Y or No How many loads?</label>
    <div class="col-md-6">
    Yes <input type="radio" name="no16" value="1" />   
        No <input type="radio" name="no16" value="0" />   
    </div>
 </div>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">As part of our screening process we check precious employment references. Have you had any incidents that may not be on your CVOR, but that your previous employer has recorded?</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no17" />
    </div>
 </div>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">Driving at night is a requirement for the job. Do you see any reason why you would not be able to drive at night?</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no18" />
    </div>
 </div>
 <h2>Expectations</h2>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">How many Miles are you hoping to run in a week?</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no19" />
    </div>
 </div>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">What is your current salary? Gross or net?</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no20" />
    </div>
 </div>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">What are you looking for in your next employer?</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no21" />
    </div>
 </div>
 <h2>Closing</h2>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">How soon could you start working?</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no22" />
    </div>
 </div>
 <h2>Questions for Trainees</h2>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">What school did you attend?</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no23" />
    </div>
 </div>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">How many hours was your program?</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no24" />
    </div>
 </div>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">When did you take your MTO or equivalent road test?</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no25" />
    </div>
 </div>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">Did you get your license on the 1st try? If no, how many attempts?</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no26" />
    </div>
 </div>
 <h2>Have you driven since getting your AZ? If so, please provide details</h2>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">Miles</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no27" />
    </div>
 </div>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">Time out/home</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no28" />
    </div>
 </div>
 
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">Locations</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no29" />
    </div>
 </div>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">Border Cross</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no30" />
    </div>
 </div>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">Type of equipment</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no31" />
    </div>
 </div>
  <div class="form-group col-md-12">
    <label class="control-label col-md-6">Comments</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="no32" />
    </div>
 </div>
 <div class="clearfix"></div>
 </form>