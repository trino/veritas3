<div class="form-group col-md-12">
	<label class="control-label">Main Admin</label>
	<input type="text" class="form-control madmin" name="site" <?php if(isset($c->site)){?> value="<?php echo $c->site; ?>" <?php } ?> onkeyup="loadusers(this.value);"/>
</div>
<div class="loadusers form-group col-md-12">
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
               $('.loadusers').html(msg); 
            }
        })
    }

</script>