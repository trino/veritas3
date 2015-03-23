<div>
    <?php
        if ($_SERVER['SERVER_NAME'] == 'localhost')
            echo "<span style ='color:red;'>attach_doc.php #INC132</span>";
    ?>
    <?php
        if (isset($disabled)) {
            $delete = true;
        } else {
            $delete = false;
        }

        if (isset($attachments)) {
            include 'subpages/filelist.php';
            listfiles($attachments, "attachments/", 'attach_doc', $delete);
        } ?>
    <?php
        if (!isset($disabled)) {

            $upload_max_size = ini_get('upload_max_filesize');
            echo "The largest file you can upload is " . $upload_max_size;
            ?>
            <div class="form-group col-md-12">

                <div class="docMore" data-count="1">
                    <div class="col-md-12">
                        <div style="display:block; padding:15px 0;">
                            <a href="javascript:void(0)" id="addMore1" class="btn btn-primary">Browse</a>
                            <input type="hidden" name="attach_doc[]" value="" class="addMore1_doc moredocs"/>
                            <a href="javascript:void(0);" class="btn btn-danger img_delete" id="delete_addMore1"
                               title="" style="display: none;">Delete</a>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-12">
                    <a href="javascript:void(0)" class="btn btn-info" id="addMoredoc">
                        Add More
                    </a>
                </div>
            </div>
        <?php } ?>

</div>