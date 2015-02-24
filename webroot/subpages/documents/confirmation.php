<h3 class="block col-md-12">Order Confirmation</h3>



<input type="hidden" id="confirmation" value="1"/>




<div class="row col-md-5">

<div class="form-group">





    <label class="control-label col-md-12">Recruiter Name : </label>
    <div class="col-md-12">
        <input disabled="disabled" type="text" class="form-control" name="conf_recruiter_name" id="conf_recruiter_name"
               value="<?php if (isset($modal->conf_recruiter_name)) echo $modal->conf_recruiter_name; else echo $this->request->session()->read('Profile.fname') . ' ' . $this->request->session()->read('Profile.lname'); ?>"/>
    </div>



    <label class="control-label col-md-12">Driver Name : </label>
    <div class="col-md-12">
        <input type="text" class="form-control" name="conf_driver_name" id="conf_driver_name"
               value="<?php if (isset($modal->conf_driver_name)) echo $modal->conf_driver_name; ?>"/>
    </div>



    <label class="control-label col-md-12">Date : </label>
    <div class="col-md-12">
        <input disabled="disabled"  type="text" class="form-control date-picker" name="conf_date" id="conf_date"
               value="<?php if (isset($modal->conf_date)) echo $modal->conf_date; else {
                   echo date('Y-m-d');
               } ?>"/>
    </div>
</div>
</div>



<div class="row col-md-7">


<div class="form-group">

    <label class="control-label col-md-12">Please sign here to confirm your submission.</label>
    <input type="hidden" name="recruiter_signature" id="recruiter_signature"
           value="<?php if (isset($modal->recruiter_signature) && $modal->recruiter_signature) echo $modal->recruiter_signature; ?>"/>


    <?php
        include('canvas/confirmation_signature.php');
    ?>


</div>
</div>


<div class="clearfix"></div>

<div class="attachments_all">
    
    <?php
    if(isset($pre_at['attach_doc'])){
        ?>
        <strong>Prescreening</strong>
        <?php
    foreach($pre_at['attach_doc'] as $pat)
    {
        echo $pat->attachment.', ';
    }
    echo "<br/>";
    }
    ?>
    
    <?php
    if(isset($sub['da_at'])){
        ?>
        <strong>Driver Application</strong>
        <?php
    foreach($sub['da_at'] as $pat)
    {
        echo $pat->attachment.', ';
    }
    echo "<br/>";
    }
    ?>
    
    <?php
    if(isset($sub['de_at'])){
        ?>
        <strong>Road test</strong>
        <?php
    foreach($sub['de_at'] as $pat)
    {
        echo $pat->attachment.', ';
    }
    echo "<br/>";
    }
    ?>
    
    <?php
    if(isset($sub2['con_at'])){
        ?>
        <strong>Consent form</strong>
        <?php
    foreach($sub2['con_at'] as $pat)
    {
        echo $pat->attachment.', ';
    }
    echo "<br/>";
    }
    ?>
    
    
    <?php
    if(isset($sub3['att'])){
        ?>
        <strong>Employment</strong>
        <?php
    foreach($sub3['att'] as $pat)
    {
        echo $pat->attachment.', ';
    }
    echo "<br/>";
    }
    ?>
    
    
    <?php
    if(isset($sub4['att'])){
        ?>
        <strong>Education</strong>
        <?php
    foreach($sub4['att'] as $pat)
    {
        echo $pat->attachment.', ';
    }
    echo "<br/>";
    }
    ?>
</div>


<script>
    $(function () {
        <?php if($this->request->params['action'] != 'vieworder'  && $this->request->params['action']!= 'view'){?>
        $("#test1").jqScribble();
        <?php }?>
    });

    function addImage() {
        var img = prompt("Enter the URL of the image.");
        if (img !== '')$("#test").data("jqScribble").update({backgroundImage: img});
    }
</script>