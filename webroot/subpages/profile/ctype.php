<div class="portlet box green-haze">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-briefcase"></i>Client Types
        </div>
    </div>
    <div class="portlet-body">
    
        <div class="table-scrollable">
        
            <table
                class="table table-condensed  table-striped table-bordered table-hover dataTable no-footer">
                <thead>
                <tr >
                    <th>Id</th>
                    <th>Title</th>
                    <th>Enable</th>
                   

                </tr>
                </thead>
                <tbody class="allct">
                <form action="" class="ctypeform">
                <?php
                foreach($client_types as $product)
                {?>
                    <tr>
                        <td><?php echo $product->id;?></td>
                        <td class="titlectype_<?php echo $product->id;?>"><?php echo $product->title;?></td>
                        <td><input type="checkbox" <?php if($product->enable=='1'){echo "checked='checked'";}?> class="cenable" id="cchk_<?php echo $product->id;?>" /></td>
                        
                    </tr>        
                <?php
                }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><a href="javascript:;" class="btn btn-primary" id="savectype" >Submit</a></td>
                </tr>
                </form>
        </tbody>
        </table>
        
    </div>
    </div>
</div>
<script>

$(function(){
    $('#savectype').live('click',function(){
        var ids =$('.ctypeform input').serialize();
        var id = '<?php echo $this->request->session()->read('Profile.id');?>';
        $.ajax({
            url:"<?php echo $this->request->webroot;?>profiles/ctypesenable/"+id,
            type:"post",
            dataType:"HTML",
            data: "ids="+ids,
            success:function(msg)
            {
                if(id!=0)
                    $('.titlectype_'+id).html(msg);
                else
                {
                    $('.allct').prepend(msg);
                    $('.addctype').hide();
                    $('.act').show();
                    $('#titctype_0').val("");
                    
                }
            }
        })
    });
    
});
</script>