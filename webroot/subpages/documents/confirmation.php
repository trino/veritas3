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



<!-- DONT REMOVE / USED FOR WEBSERVICE .... DO NOT CHANGE THE STRUCTURE OF DIV INSIDE NOT EVEN AN ENTER-->
<div class="attachments_all" style="display: none;">
    <div class="pre"><?php
    if(isset($pre_at['attach_doc'])){
        $c1 = 0;
    foreach($pre_at['attach_doc'] as $pat)
    {
        $c1++;
        if($c1==1)
        echo $pat->attachment;
        else
        echo ','.$pat->attachment;
    }
    
    }
    ?></div>
    
    <div class="da"><?php
    if(isset($sub['da_at'])){
        $c1 = 0;
    foreach($sub['da_at'] as $pat)
    {
        $c1++;
        if($c1==1)
        echo $pat->attachment;
        else
        echo ','.$pat->attachment;
    }
    
    }
    ?></div>
    
    <div class="de"><?php
    if(isset($sub['de_at'])){
        $c1 = 0;
    foreach($sub['de_at'] as $pat)
    {
        $c1++;
        if($c1==1)
        echo $pat->attachment;
        else
        echo ','.$pat->attachment;
    }
    
    }
    ?></div>
    
    
    <div class="con"><?php
    if(isset($sub2['con_at'])){
        $c1 = 0;
    foreach($sub2['con_at'] as $pat)
    {
        $c1++;
        if($c1==1)
        echo $pat->attachment;
        else
        echo ','.$pat->attachment;
    }
    
    }
    ?></div>
    
    
    <div class="emp"><?php
    if(isset($sub3['att'])){
        $c1 = 0;
    foreach($sub3['att'] as $pat)
    {
        $c1++;
        if($c1==1)
        echo $pat->attachment;
        else
        echo ','.$pat->attachment;
    }
    
    }
    ?></div>
    
    
    <div class="edu"><?php
    if(isset($sub4['att'])){
        $c1 = 0;
    foreach($sub4['att'] as $pat)
    {
        $c1++;
        if($c1==1)
        echo $pat->attachment;
        else
        echo ','.$pat->attachment;
    }
    
    }
    ?></div>
    
    
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