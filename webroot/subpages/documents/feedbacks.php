<?php
if(isset($disabled))
{
$is_disabled = 'disabled="disabled"';
}
else
{
$is_disabled = '';
if(isset($feeds))
$feed = $feeds;
}
?>


<form role="form" action="" method="post" id="form_tab6">
    
    <input type="hidden" class="document_type" name="document_type" value="Feedbacks"/>
    <input type="hidden" name="sub_doc_id" value="6" class="sub_docs_id" id="af" />
    <div class="form-group">
            <label class="control-label col-md-6">Title</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="title" value="<?php if(isset($feed->title)){echo $feed->title;} ?>" />
            </div>
            <div class="clearfix"></div>
    </div>
    <div class="form-group">
            <label class="control-label col-md-6">Description</label>
            <div class="col-md-6">
                <textarea class="form-control" name="description" ><?php if(isset($feed->description)) echo $feed->description; ?></textarea>
            </div>
            <div class="clearfix"></div>
    </div>
    <div class="form-group">
        <div class=" col-md-12">
                <label class="control-label">If you had a colleague who required our services, would you recommend ISB Canada ?(Scale 1-10) </label>
        </div>
        <div class="col-md-12">
            <input type="radio" class="form-control" name="scale" value="1" <?php if(isset($feed->scale)&& $feed->scale = 1){?> selected="selected" <?php } ?> />&nbsp;&nbsp;1&nbsp;&nbsp;
            <input type="radio" class="form-control" name="scale" value="2" <?php if(isset($feed->scale)&& $feed->scale = 2){?> selected="selected" <?php } ?> />&nbsp;&nbsp;2&nbsp;&nbsp;
            <input type="radio" class="form-control" name="scale" value="3" <?php if(isset($feed->scale)&& $feed->scale = 3){?> selected="selected" <?php } ?> />&nbsp;&nbsp;3&nbsp;&nbsp;
            <input type="radio" class="form-control" name="scale" value="4" <?php if(isset($feed->scale)&& $feed->scale = 4){?> selected="selected" <?php } ?> />&nbsp;&nbsp;4&nbsp;&nbsp;
            <input type="radio" class="form-control" name="scale" value="5" <?php if(isset($feed->scale)&& $feed->scale = 5){?> selected="selected" <?php } ?> />&nbsp;&nbsp;5&nbsp;&nbsp;
            <input type="radio" class="form-control" name="scale" value="6" <?php if(isset($feed->scale)&& $feed->scale = 6){?> selected="selected" <?php } ?> />&nbsp;&nbsp;6&nbsp;&nbsp;
            <input type="radio" class="form-control" name="scale" value="7" <?php if(isset($feed->scale)&& $feed->scale = 7){?> selected="selected" <?php } ?> />&nbsp;&nbsp;7&nbsp;&nbsp;
            <input type="radio" class="form-control" name="scale" value="8" <?php if(isset($feed->scale)&& $feed->scale = 8){?> selected="selected" <?php } ?> />&nbsp;&nbsp;8&nbsp;&nbsp;
            <input type="radio" class="form-control" name="scale" value="9" <?php if(isset($feed->scale)&& $feed->scale = 9){?> selected="selected" <?php } ?> />&nbsp;&nbsp;9&nbsp;&nbsp;
            <input type="radio" class="form-control" name="scale" value="10" <?php if(isset($feed->scale)&& $feed->scale = 10){?> selected="selected" <?php } ?> />&nbsp;&nbsp;10&nbsp;&nbsp;
        </div>
        <div class="clearfix"></div>
</div>
<div class="form-group">
        <label class="control-label col-md-6">What is the reason for your score in question #1?</label>
        <div class="col-md-6">
            <textarea class="form-control" name="reason" ><?php if(isset($feed->reason)) echo $feed->reason; ?></textarea>
        </div>
        <div class="clearfix"></div>
</div>
<div class="form-group">
        <label class="control-label col-md-6">What could we do to improve the score you gave in question #1? </label>
        <div class="col-md-6">
            <textarea class="form-control" name="suggestion" ><?php if(isset($feed->suggestion)) echo $feed->suggestion; ?></textarea>
        </div>
        <div class="clearfix"></div>
</div>
<div class="clearfix"></div>


 </form>
