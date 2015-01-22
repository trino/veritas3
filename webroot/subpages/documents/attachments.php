<?php
if(isset($disabled))
{
$is_disabled = 'disabled="disabled"';
}
else
{
$is_disabled = '';
}
if(isset($feeds))
$feed = $feeds;

?>


<form role="form" enctype="multipart/form-data" action="<?php echo $this->request->webroot;?>documents/addattachment/<?php echo $cid;?>/<?php echo $did;?>" method="post" id="form_tab7">
    
    <input type="hidden" class="document_type" name="document_type" value="Attachment"/>
    <input type="hidden" name="sub_doc_id" value="7" class="sub_docs_id" id="af" />
    <div class="form-group col-md-12">
            <label class="control-label col-md-3">Title</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="title" <?php echo $is_disabled;?> value="<?php if(isset($mod->title)){echo $mod->title;} ?>" />
            </div>
            <!--<div class="clearfix"></div>-->
           
    </div>
     <?php 
    if(isset($attachments) && count($attachments)>0){
        $allowed = array('jpg','jpeg','png','bmp','gif');
        ?>
       
        <?php
        foreach($attachments as $k=>$cd):
           
        ?>
         <div class="form-group col-md-12">
        <label class="control-label col-md-3">&nbsp;</label>
            <div class="col-md-6">
        <?php  
                $e = explode(".",$cd->file);
                $ext = end($e);
                if(in_array($ext, $allowed))
                {?>
                <img src="<?php echo $this->request->webroot;?>attachments/<?php echo $cd->file;?>" style="max-width: 200px;" />
                    
        <?php
                }
                else
                    echo $cd->file;
        ?>
        <a href="javascript:void(0);" onclick="$(this).parent().remove()" class="btn btn-danger">Delete</a>
        <input type="hidden" name="client_doc[]" value="<?php echo $cd->file;?>" class="moredocs"/>
        </div>
        </div>   
    <?php
        endforeach;
  }?>
     
  <div class="form-group col-md-12 docMore"  data-count="1">
    <label class="control-label col-md-3">Attachments</label>
            <div class="col-md-6">
                <!--<input type="file" name="file"  />-->
                <?php if(isset($mod)){echo $mod->file;}?>
         <a href="javascript:void(0)" id="addMore1"  class="btn btn-primary">Browse</a>
          <input type="hidden" name="client_doc[]" value="" class="addMore1_doc moredocs"/>
          </div>
   </div>
    <div class="form-group col-md-12"  >
    <label class="control-label col-md-3">&nbsp;</label>
    <div class="col-md-6">
        <a href="javascript:void(0)" class="btn btn-info" id="addMoredoc" onclick="addMore(event,this)">Add More Document</a>
    </div>
    </div>
    
 </form>
<script>
$(function()
{
    initiate_ajax_upload('addMore1','doc');
    $('#addMoredoc').click(function(){
         var total_count = $('.docMore').data('count');
        $('.docMore').data('count',parseInt(total_count)+1);
        total_count = $('.docMore').data('count');
         var input_field = '<div  class="form-group col-md-12"><label class="control-label col-md-3">&nbsp;</label><div class="col-md-6"><a href="javascript:void(0);" id="addMore'+total_count+'" class="btn btn-primary">Browse</a><input type="hidden" name="client_doc[]" value="" class="addMore'+total_count+'_doc moredocs" /><a href="javascript:void(0);" onclick="$(this).parent().parent().remove();" class = "btn btn-danger">Delete</a></div></div>';
    $('.docMore').append(input_field);
    initiate_ajax_upload('addMore'+total_count,'doc');
        
    })
 });
/*()var removeLink = 0;// this variable is for showing and removing links in a add document

function addMore(e,obj){
e.preventDefault();
    
    var total_count = $('.docMore').data('count');
    $('.docMore').data('count',parseInt(total_count)+1);
    total_count = $('.docMore').data('count');
    var input_field = '<div  class="form-group col-md-12"><label class="control-label col-md-3">&nbsp;</label><div class="col-md-6"><a href="javascript:void(0);" id="addMore'+total_count+'" class="btn btn-primary">Browse</a><input type="hidden" name="client_doc[]" value="" class="addMore'+total_count+'_doc moredocs" /></div></div>';
    $('.docMore').append(input_field);
    if( parseInt(total_count) > 1 && removeLink == 0 ){
    removeLink = 1;
     $('#addMoredoc').after('<a href="#" id="removeMore" class="btn btn-danger" onclick="removeMore(event,this)">Remove last</a>');
        initiate_ajax_upload('addMore'+total_count,'doc');
    }
}

function removeMore(e,obj) {
e.preventDefault();
var total_count = $('.docMore').data('count');
 //$('.docMore input[type="file"]:last').remove();
 $('.docMore div:last-child').remove();
 $('.docMore').data('count',parseInt(total_count)-1);
 total_count = $('.docMore').data('count');
  if( parseInt(total_count) == 1 ){
       $('#removeMore').remove();
       removeLink = 0;
 }
}
   */                     
                function initiate_ajax_upload(button_id, doc){
                var button = $('#'+button_id), interval;
                new AjaxUpload(button,{
                    action: base_url+"documents/fileUpload/<?php if(isset($id))echo $id;?>",                      
                    name: 'myfile',
                    onSubmit : function(file, ext){
                        button.text('Uploading');
                        this.disable();
                        interval = window.setInterval(function(){
                            var text = button.text();
                            if (text.length < 13){
                                button.text(text + '.');					
                            } else {
                                button.text('Uploading');				
                            }
                        }, 200);
                    },
                    onComplete: function(file, response){
                        if(doc=="doc")
                            button.html('Browse');
                        else
                            button.html('<i class="fa fa-image"></i> Add/Edit Image');
                            
                            window.clearInterval(interval);
                            this.enable();
                            if(doc=="doc"){
                                $('#'+button_id).parent().append(" "+response);
                                $('.'+button_id+"_doc").val(response);
                            }
                            else
                            {
                                $("#clientpic").attr("src",'<?php echo $this->request->webroot;?>img/jobs/'+response);
                                $('#client_img').val(response);
                            }
                            //$('.flashimg').show();
                            }                        		
                    });                
            }
</script>


