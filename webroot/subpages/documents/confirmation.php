
<input type="hidden" id="confirmation" value="1" />
<div class="form-group col-md-12">
    <h4 class="block col-md-12">Confirmation</h4>
    
    				<label class="control-label col-md-12">Recruiter Name : </label>
    				<div class="col-md-6">
    					<input type="text" class="form-control" name="conf_recruiter_name" id="conf_recruiter_name" value="<?php if(isset($modal->conf_recruiter_name))echo $modal->conf_recruiter_name;else echo $this->request->session()->read('Profile.fname').' '.$this->request->session()->read('Profile.lname');?>" />
    				</div>
                    <label class="control-label col-md-12">Driver Name : </label>
    				<div class="col-md-6">
    					<input type="text" class="form-control" name="conf_driver_name" id="conf_driver_name" value="<?php if(isset($modal->conf_driver_name))echo $modal->conf_driver_name;?>" />
    				</div>
                    <label class="control-label col-md-12">Date : </label>
    				<div class="col-md-6">
    					<input type="text" class="form-control date-picker" name="conf_date" id="conf_date" value="<?php if(isset($modal->conf_date))echo $modal->conf_date;else{echo date('Y-m-d');}?>"/>
    				</div>
    </div>
    <div class="form-group col-md-12">
    <label class="control-label col-md-12">Please sign below to confirm your submission. </label>
    <input type="hidden" name="recruiter_signature" id="recruiter_signature" value="<?php if(isset($modal->recruiter_signature) && $modal->recruiter_signature)echo $modal->recruiter_signature;?>" />
    
    <?php 

    include('canvas/confirmation_signature.php');
    ?>
    </div>
    <div class="clearfix"></div>

<script>
$(function(){
    <?php if($this->request->params['action'] != 'vieworder'  && $this->request->params['action']!= 'view'){?>
   $("#test1").jqScribble(); 
   <?php }?>
});

		function addImage()
		{
			var img = prompt("Enter the URL of the image.");
			if(img !== '')$("#test").data("jqScribble").update({backgroundImage: img});
		}
</script>