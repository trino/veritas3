<?php if(isset($cid))$jid = $cid; else $jid = "";?>
<?php $users = $this->requestAction('/profiles/getallusers/5/'.$jid);?>
<div class="form-group">

	<label class="control-label col-md-3"><?php if($this->request['controller']=='Clients')echo "Client Admin"; elseif($this->request['action']=='add') echo "Documents created for"; else echo "Orders created for"?></label>
    <div class="col-md-4">
		<select class="form-control input-xlarge select2me" data-placeholder="Select..." name="uploaded_for" id="uploaded_for">
			<option value=""></option>
			<?php foreach($users as $u){?>
                <option value="<?php echo $u->id;?>" <?php if(isset($modal) && $modal->uploaded_for==$u->id){?> selected="selected"<?php } ?>><?php echo $u->username;?></option>
			<?php
            }?>
		</select>
	</div>
</div>

<script>

    function loadusers(v)
    {
        $.ajax({
            method:"post",
            url: "<?php echo $this->request->webroot;?>profiles/getusers",
            data:"v="+v,
            success:function(msg)
            {
                $('.loadusers').show();
                if(msg =='1')
                {
                    $('.loadusers').html("<b style='color:red'>Sorry no results found.</b>");
                    $('.loadusers').fadeOut(1000);   
                }
                else
                if(msg == 0)
                    $('.loadusers').hide();
                else
                    $('.loadusers').html(msg); 
            }
        })
    }

</script>