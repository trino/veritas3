<div class="form-group col-md-12" style="position: relative;">
	<label class="control-label">Main Admin</label>
	<input type="text" class="form-control madmin" name="site" <?php if(isset($c->site)){?> value="<?php echo $c->site; ?>" <?php } ?> onkeyup="loadusers(this.value);"/>

<div class="loadusers form-group " style=" display:none;top: 60px; z-index:999; padding: 5px 0 5px 5px; width:100%; background: #fff; border:1px solid #e5e5e5;">
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