
<div class="form-group col-md-12">
    <h4 class="block col-md-12">Confirmation</h4>
    
    				<label class="control-label col-md-12">Recruiter Name : </label>
    				<div class="col-md-6">
    					<input type="text" class="form-control" name="conf_recruiter_name" id="conf_recruiter_name" value="<?php if(isset($modal->conf_recruiter_name))echo $modal->conf_recruiter_name;?>" />
    				</div>
                    <label class="control-label col-md-12">Driver Name : </label>
    				<div class="col-md-6">
    					<input type="text" class="form-control" name="conf_driver_name" id="conf_driver_name" value="<?php if(isset($modal->conf_driver_name))echo $modal->conf_driver_name;?>" />
    				</div>
                    <label class="control-label col-md-12">Date : </label>
    				<div class="col-md-6">
    					<input type="text" class="form-control date-picker" name="conf_date" id="conf_date" value="<?php if(isset($modal->conf_date))echo $modal->conf_date;?>"/>
    				</div>
    </div>
    <div class="form-group col-md-12">
    <label class="control-label col-md-12">Please sign below to confirm your submission. </label>
    <?php include('canvas/example.php');?>
    </div>
    <div class="clearfix"></div>

<script>
$(function(){
   $("#test1").jqScribble(); 
});
function save(numb)
		{
		  alert('rest');return;
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