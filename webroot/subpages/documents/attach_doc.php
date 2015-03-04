<div class="row">
<?php
if(isset($disabled)) {
    $delete = true;
} else {
    $delete = false;
}

if (isset($attachments)) {
    include 'subpages/filelist.php';
    listfiles($attachments, "attachments/",'attach_doc',$delete);
}?>
<?php
    if (!isset($disabled)) {

    $upload_max_size = ini_get('upload_max_filesize');
    echo "The largest file you can upload is " . $upload_max_size;
?>
<div class="form-group col-md-12"><!--<center>-->

    <div class="docMore" data-count="1">
    <div>
        <div style="display:block;">
            <a href="javascript:void(0)" id="addMore1" class="btn btn-primary" >Browse</a>
             <input type="hidden" name="attach_doc[]" value="" class="addMore1_doc moredocs"/>
             <a href="javascript:void(0);" class ="btn btn-danger img_delete" id="delete_addMore1" title ="" style="display: none;">Delete</a>
             <span></span>
        </div>
    </div>
    </div>
</div>
<div class="form-group col-md-12"><!--<center>-->

    <a href="javascript:void(0)" class="btn btn-info" id="addMoredoc">
        Add More
    </a>
</div>
<?php }?>
</div>
<script>

 $(function () {
    <?php
    if (!isset($disabled)) {
?>
        initiate_ajax_upload1('addMore1', 'doc');
         $('#addMoredoc').click(function () {
        var total_count = $('.docMore').data('count');
        $('.docMore').data('count', parseInt(total_count) + 1);
        total_count = $('.docMore').data('count');
        var input_field = '<div  class="form-group col-md-12"><div class="col-md-12"><a href="javascript:void(0);" id="addMore' + total_count + '" class="btn btn-primary">Browse</a><input type="hidden" name="attach_doc[]" value="" class="addMore' + total_count + '_doc moredocs" /><a href="javascript:void(0);" class = "btn btn-danger img_delete" id="delete_addMore' + total_count + '" title ="">Delete</a><span></span></div></div>';
        $('.docMore').append(input_field);
        initiate_ajax_upload1('addMore' + total_count, 'doc');

    });
    $('.img_delete').live('click', function () {
        var file = $(this).attr('title');
        if (file == file.replace("&", " ")) {
            var id = 0;
        }
        else {
            var f = file.split("&");
            file = f[0];
            var id = f[1];
        }

        var con = confirm('Are you sure you want to delete "' + file + '"?');
        if (con == true) {
            $.ajax({
                type: "post",
                data: 'id=' + id,
                url: "<?php echo $this->request->webroot;?>documents/removefiles/" + file,
                success: function (msg) {

                }
            });
            $(this).parent().parent().remove();

        }
        else
            return false;
    });
});
function initiate_ajax_upload1(button_id, doc) {
        
        var button = $('#' + button_id), interval;
        if (doc == 'doc')
            var act = "<?php echo $this->request->webroot;?>documents/fileUpload/<?php if(isset($id))echo $id;?>";
        else
            var act = "<?php echo $this->request->webroot;?>documents/fileUpload/<?php if(isset($id))echo $id;?>";
        new AjaxUpload(button, {
            action: act,
            name: 'myfile',
            onSubmit: function (file, ext) {
                button.text('Uploading');
                this.disable();
                interval = window.setInterval(function () {
                    var text = button.text();
                    if (text.length < 13) {
                        button.text(text + '.');
                    } else {
                        button.text('Uploading');
                    }
                }, 200);
            },
            onComplete: function (file, response) {
                if (doc == "doc")
                    button.html('Browse');
                else
                    button.html('<i class="fa fa-image"></i> Add/Edit Image');

                window.clearInterval(interval);
                this.enable();
                if (doc == "doc") {
                    $('#' + button_id).parent().find('span').text(" " + response);
                    $('.' + button_id + "_doc").val(response);
                    $('#delete_' + button_id).attr('title', response);
                    if(button_id =='addMore1')
                        $('#delete_'+button_id).show();
                }
                else {
                    $("#clientpic").attr("src", '<?php echo $this->request->webroot;?>img/jobs/' + response);
                    $('#client_img').val(response);
                }
//$('.flashimg').show();
            }
        });
    }
    <?php }?>
</script>
