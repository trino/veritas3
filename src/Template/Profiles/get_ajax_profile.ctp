<?php
$i=0;
foreach($profiles as $r)
{
//echo $r->username;continue;
//if($i%2==0)
//                                                    {
?>
<tr>
<?php
//}
?>

<td>
<span><input class="profile_client" onchange="if($(this).is(':checked')){assignProfile($(this).val(),'<?php echo $cid;?>','yes');}else{assignProfile($(this).val(),'<?php echo $cid;?>','no');}" type="checkbox" <?php if(in_array($r->id,$profile)){?>checked="checked"<?php }?> value="<?php echo $r->id; ?>"/></span>
<span> <?php echo $r->username; ?> </span>
</td>
<?php

//if(($i+1)%2==0)
//                                                {
?>
</tr>
<?php
// }

$i++;
}
//if(($i+1)%2!=0)
//                                                {
//                                                    echo "</td></tr>";
//                                                }
?>
<script>


function assignProfile(profile,client,status)
{
if(status=='yes')
{
var url= '<?php echo $this->request->webroot;?>clients/assignProfile/'+profile+'/'+client+'/yes';
}
else
{
var url= '<?php echo $this->request->webroot;?>clients/assignProfile/'+profile+'/'+client+'/no';
}
$.ajax({url:url});
}
function assignClient(profile,client,status)
{
if(status=='yes')
{
var url= '<?php echo $this->request->webroot;?>clients/assignClient/'+profile+'/'+client+'/yes';
}
else
{
var url= '<?php echo $this->request->webroot;?>clients/assignClient/'+profile+'/'+client+'/no';
}
$.ajax({url:url});
}


</script>