<form method="post" action="" role="form" id="pass_form" >
        <div class="form-group">
            <label class="control-label">Current Password</label>
            <input type="password" class="form-control input-medium" <?php if(isset($p->password)){?>value="<?php echo $p->password; ?>" disabled="disabled" <?php } ?> />
        </div>
        <div class="form-group">
            <label class="control-label">New Password</label>
            <input type="password" class="form-control input-medium" name="password" id="password" required="required"/>
        </div>
        <div class="form-group">
            <label class="control-label">Re-type New Password</label>
            <input type="password" class="form-control input-medium" id="retype_password" required="required"/>
            <span class="error passerror" style="display: none;">Please enter same password</span>
        </div>
        <?php
        if (!isset($disabled)) {
            ?>
            <div class="margin-top-10 alert alert-success display-hide flashPass" style="display: none;">
                <button class="close" data-close="alert"></button>
                Password saved successfully
            </div>
            <div class="margin-top-10">
                <a href="javascript:void(0)" class="btn btn-primary" id="save_pass">
                    Change Password </a>
            </div>
        <?php } ?>
</form>

<script>
$(function(){
   $('#save_pass').click(function(){
    if($('#retype_password').val() == $('#password').val())
    {
    if($('#retype_password').val()){    
    $('#save_pass').text('Saving..');
        var str = $('#pass_form input').serialize();
        $.ajax({
           url:'<?php echo $this->request->webroot;?>profiles/changePass/<?php echo $id;?>',
           data:str,
           type:'post',
           success:function(res)
           {
            if(res==1)
            $('.flashPass').show();
            else
            alert('Could\'t save password');
            $('#save_pass').text(' Change Password ');
           } 
        });
        }
        else
        {
            $('#pass_form').submit();
        }
    }
    else
    {
        $('#pass_form').submit();
    }
   }); 
});
</script>