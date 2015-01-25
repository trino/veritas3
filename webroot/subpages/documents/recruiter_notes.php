<?php if($this->request->params['action'] != 'viewReport'){?><p>&nbsp;</p><?php }?>
<div class="portlet light recruiter_notes">
    <div class="portlet-title">
        <div class="caption caption-md">
            <i class="icon-bar-chart theme-font hide"></i>
            <span class="caption-subject font-blue-madison bold uppercase">Recruiter Notes</span>
            <span class="caption-helper"></span>
        </div>
        <div class="inputs">
            <div class="portlet-input input-inline input-small ">

            </div>
        </div>
    </div>
    <div class="portlet-body">
<?php
if($this->request->params['action'] == 'viewReport')
    $pid = $order->profile->id;
else
    $pid = $p->id;
$notes = $this->requestAction('profiles/getNotes/'.$pid);
?>
<div class="notes" style="padding-right: 10px;">
<?php
if($notes)
{
    foreach($notes as $n)
    {
        ?>
        <div class="item">
            <div class="item-head">
                <div class="item-details">
                    <a href="" class="item-name primary-link"><?php $r_info = $this->requestAction('profiles/getRecruiterById/'.$n->recruiter_id);echo $r_info->fname.' '.$r_info->mname.' '.$r_info->lname?></a>
                    <span class="item-label"><?php $arr_cr = explode(',',$n->created); echo $arr_cr[0];?></span>
                </div>

            </div>
            <div class="item-body">
                <?php echo $n->description;?>
            </div>
        </div>
        <?php
    }
}
?>
        <br><br>
        <textarea id="recruiter_notes" placeholder="Add Recruiter Notes" class="form-control"></textarea><br/>
        <a href="javascript:void(0);" class="btn btn-success" id="add_recruiter">Submit</a>
</div>
</div>
</div>

<script>
    $(function(){
        $('.recruiter_notes').slimScroll({
            height: '300px'
        });
       $('#add_recruiter').click(function(){
           if($('#recruiter_notes').val()=='')
           {
               alert('You can\'t submit blank note');
               $('#recruiter_notes').focus();
           }
           else
           {
               $.ajax({
                  url:'<?php echo $this->request->webroot;?>profiles/saveNote/<?php echo $pid;?>',
                   data:'description='+$('#recruiter_notes').val(),
                   type:'post',
                   success:function(response){
                       if(response!='error')
                       {

                          $('.notes').prepend(response);
                           window.location = "";
                       }
                   }
               });
           }
       })
    });
</script>