<?php
if(isset($_GET['forms']))
$forms = $_GET['forms'];
else
$forms = '';
          if(!$forms)
          {
            $forms_arr[0] = 1;
            $forms_arr[1] = 1;
            $forms_arr[2] = 1;
            $forms_arr[3] = 1;
            $forms_arr[4] = 1;
            $forms_arr[5] = 1;
            $forms_arr[6] = 1;
            $forms_arr[7] = 1;
          }
          else
          {
            $forms_arr = explode(',',$forms);
            
          } 
          $p = $forms_arr;
?>
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
<p>&nbsp;</p>
<div class="col-md-12"><label>Products selected</label></div>
<div class="clearfix"></div>
<ul class="pricing-red-content list-unstyled">

                        <li>
                            <div class="col-md-10"><i class="fa fa-file-text-o"></i> Premium National Criminal Record Check</div>
                            <div class="col-md-2"><input <?php if($p[0]){?>checked<?php }?> disabled="disabled" type="checkbox" name="prem_nat" value=""/></div>
                            <div class="clearfix"></div>
                        </li>

                        <li>
                            <div class="col-md-10"><i class="fa fa-file-text-o"></i> Driver's Record Abstract (MVR)</div>
                            <div class="col-md-2"><input <?php if($p[1]){?>checked<?php }?> disabled="disabled" type="checkbox" name="dri_abs" value=""></div>
                            
                            <div class="clearfix"></div>
                        </li>

                        <li>
                            <div class="col-md-10"><i class="fa fa-file-text-o"></i> CVOR</div>
                            <div class="col-md-2"><input <?php if($p[2]){?>checked<?php }?> disabled="disabled" type="checkbox" name="CVOR" value=""></div>
                            <div class="clearfix"></div>
                            
                        </li>

                        <li>
                        
                            <div class="col-md-10"><i class="fa fa-file-text-o"></i> Pre-employment Screening Program Report</div>
                            <div class="col-md-2"><input <?php if($p[3]){?>checked<?php }?> disabled="disabled" type="checkbox" name="prem_nat" value=""></div>
                            <div class="clearfix"></div>
                            
                            
                        </li>
                        

                        <li>
                            <div class="col-md-10"><i class="fa fa-file-text-o"></i> Transclick</div>
                            <div class="col-md-2"><input <?php if($p[4]){?>checked<?php }?> disabled="disabled" type="checkbox" name="prem_nat" value=""></div>
                            <div class="clearfix"></div>
                            
                            
                        </li>

                        <li>
                            <div class="col-md-10"><i class="fa fa-file-text-o"></i> Certifications</div>
                            <div class="col-md-2"><input <?php if($p[5]){?>checked<?php }?> disabled="disabled" type="checkbox" name="prem_nat" value=""></div>
                            <div class="clearfix"></div>
                            
                            
                        </li>

                        <li>
                            <div class="col-md-10"><i class="fa fa-file-text-o"></i> Letter of Experience</div>
                            <div class="col-md-2"><input <?php if($p[6]){?>checked<?php }?> disabled="disabled" type="checkbox" name="prem_nat" value=""></div>
                            <div class="clearfix"></div>                           
                            
                        </li>

                        <li>
                            <div class="col-md-10"><i class="fa fa-file-text-o"></i> Check DL</div>
                            <div class="col-md-2"><input <?php if($p[7]){?>checked<?php }?> disabled="disabled" type="checkbox" name="check_dl" value=""></div>
                            <div class="clearfix"></div>
                            
                            
                        </li>
                    </ul>

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