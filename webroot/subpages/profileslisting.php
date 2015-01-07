<?php $users = $this->requestAction('/profiles/getallusers');?>
<div class="form-group">


		<select class="form-control input-medium select2me" data-placeholder="Select...">
			<option value=""></option>
			<?php foreach($users as $u){?>
            <option value="<?php echo $u->username;?>"><?php echo $u->username;?></option>
			<?php
            }?>
		</select>

</div>
