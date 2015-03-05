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



    <label class="control-label col-md-12" style="margin-top: 5px;">Driver Name : </label>
    <div class="col-md-12">
        <input type="text" class="form-control" name="conf_driver_name" id="conf_driver_name"
               value="<?php if (isset($modal->conf_driver_name)) echo $modal->conf_driver_name; ?>"/>
    </div>



    <label class="control-label col-md-12" style="margin-top: 5px;">Date : </label>
    <div class="col-md-12">
        <input disabled="disabled"  type="text" class="form-control date-picker" name="conf_date" id="conf_date"
               value="<?php if (isset($modal->conf_date)) echo $modal->conf_date; else {
                   echo date('Y-m-d');
               } ?>"/>
    </div>
</div>
<p>&nbsp;</p>
<div class="col-md-12"><label>Products Selected :</label>
<div class="clearfix"></div>

    <?php
    $lineclass="even";//set to "" for old list, even or odd to table


    if ($lineclass=="") {
        echo '<ul class="pricing-red-content list-unstyled" >';
    } else {
        echo '<table class="table" style="margin-bottom: 0px;"><tbody>';
    }

    function PrintLine($lineclass, $name, $id, $cnt){
        if($cnt){
        $check = "<input ";
        if($cnt){ $check.= 'checked '; }
        $check .= 'disabled="disabled" type="checkbox" name="' . $id . '" value=""/>';

        if ($lineclass == ""){
            echo '<li><div class="col-md-10"><i class="fa fa-file-text-o"></i> ' . $name . '</div><div class="col-md-2">';
            echo $check . '</div><div class="clearfix"></div></li>';
            return "";
        }

        echo '<tr class="' . $lineclass . '" role="row"><td width="45"><i class="fa fa-file-text-o"></i></td>';
        echo '<td>' . $name . '</td><TD>' . $check . '</TD></TR>';
        if ($lineclass == "even") { return "odd";} else { return "even"; }
        }
    }

    $lineclass = PrintLine($lineclass, "Driver's Record Abstract (MVR)", "dri_abs", $p[1]);
    $lineclass = PrintLine($lineclass, "CVOR", "CVOR", $p[2]);
    $lineclass = PrintLine($lineclass, "Pre-employment Screening Program Report", "prem_nat", $p[3]);
    $lineclass = PrintLine($lineclass, "Transclick", "prem_nat", $p[4]);
    $lineclass = PrintLine($lineclass, "Certifications", "prem_nat", $p[5]);
    $lineclass = PrintLine($lineclass, "Letter of Experience", "prem_nat", $p[6]);
    //$lineclass = PrintLine($lineclass, "Check DL", "check_dl", $p[7]);

    if ($lineclass=="") {
        echo '</ul>';
    } else {
        echo '<TR><TD colspan="3"></TD></TR></tbody></table>';
    }
    ?>

</div>
</div>


<div class="row col-md-7">


<div class="form-group">

    <label class="control-label col-md-12">Please sign here to confirm your submission :</label>
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