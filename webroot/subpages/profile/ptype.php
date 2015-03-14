<div class="portlet box green-haze">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-briefcase"></i>Profile Types
        </div>
    </div>
    <div class="portlet-body">
    <div style="float: right; margin-bottom: 5px;" class="col-md-6">
        
        <a href="javascript:;" class="btn btn-primary apt" style="float: right;" onclick="$(this).hide();$('.addptype').show();">Add Profile Type</a>
        <div class="addptype" style="display: none;">
            <span class="col-md-9"><input type="text" class="form-control"  placeholder="Title" id="titptype_0"/></span>
            <span class="col-md-3"><a href="javascript:;" id="0" class="btn btn-primary saveptypes">Add</a></span>
        </div>
    </div>
        <div class="table-scrollable">
        
            <table
                class="table table-condensed  table-striped table-bordered table-hover dataTable no-footer">
                <thead>
                <tr >
                    <th>Id</th>
                    <th>Title</th>
                    <th>Enable</th>
                    <!--<th>Actions</th>-->

                </tr>
                </thead>
                <tbody class="allpt">
                <?php
                foreach($ptypes as $product)
                {?>
                    <tr>
                        <td><?php echo $product->id;?></td>
                        <td class="titleptype_<?php echo $product->id;?>"><?php echo $product->title;?></td>
                        <td><input type="checkbox" <?php if($product->enable=='1'){echo "checked='checked'";}?> class="penable" id="pchk_<?php echo $product->id;?>" /><span class="span_<?php echo $product->id;?>"></span></td>
                        <td><a href="javascript:;" class="btn btn-info editptype" id="editptype_<?php echo $product->id;?>">Edit</a></td>
                    </tr>        
                <?php
                }
                ?>
        </tbody>
        </table>
        
    </div>
    </div>
</div>
<script>

$(function(){
    $('#saveptype').live('click',function(){
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