<form method="post" action="" role="form" id="pass_form" >
        <div class="form-group">
            <label class="control-label">Current Password</label>
            <input type="password" class="form-control" <?php if(isset($p->password)){?>value="<?php echo $p->password; ?>" disabled="disabled" <?php } ?> />
        </div>
        <div class="form-group">
            <label class="control-label">New Password</label>
            <input type="password" class="form-control" name="password" id="password"/>
        </div>
        <div class="form-group">
            <label class="control-label">Re-type New Password</label>
            <input type="password" class="form-control" name="retype_password" id="retype_password"/>
        </div>
        <?php
        if (!isset($disabled)) {
            ?>
            <div class="margiv-top-10">
                <button type="submit" class="btn btn-primary">
                    Change Password </button>
            </div>
        <?php } ?>
</form>