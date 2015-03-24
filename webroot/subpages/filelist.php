<?php
    if($_SERVER['SERVER_NAME'] =='localhost')
        echo "<span style ='color:red;'>filelist.php #INC158</span>";
?>

<?php
    $GLOBALS['webroot'] = $webroot= $this->request->webroot;
    //other values PATHINFO_DIRNAME (/mnt/files) | PATHINFO_BASENAME (飛兒樂團光茫.mp3) | PATHINFO_FILENAME (飛兒樂團光茫)
    function getextension($path, $value=PATHINFO_EXTENSION){
        return strtolower(pathinfo($path, $value));
    }

    use Cake\ORM\TableRegistry;
    function loadclient($ClientID, $table="clients"){
        $table = TableRegistry::get($table);
        $results = $table->find('all', array('conditions' => array('id'=>$ClientID)))->first();
        return $results;
    }

    function listfiles($client_docs, $dir, $field_name='client_doc',$delete, $method=1){
        $webroot=$GLOBALS['webroot'] ;
        if($method==2) {
            echo  '<div class="portlet box grey-salsa"><div class="portlet-title"><div class="caption"><i class="fa fa-paperclip"></i>Attachments</div>';
            echo '</div><div class="portlet-body form" align="left"><table class="table-condensed table-striped table-bordered table-hover dataTable no-footer">';
            $count = 0;
            foreach ($client_docs as $k => $cd){//    id, client_id
                $count += 1;
                $path = "/"  . $dir . $cd->file;
                $extension = getextension($cd->file);
                $filename = getextension($cd->file, PATHINFO_FILENAME);
                echo "<TR><TD width='29' align='center'><i class='fa ";
                switch (TRUE){//file-excel-o,,
                    case $extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'bmp' || $extension == 'gif';
                        $type = "Image";
                        echo 'fa-file-image-o';
                        break;
                    case $extension == "pdf";
                        $type = "Portable Document Format";
                        echo 'file-pdf-o';
                        break;
                    case $extension == 'zip' || $extension == 'rar';
                        $type = "File Archive";
                        echo 'file-archive-o';
                        break;
                    case $extension == 'wav' || $extension == 'mp3';
                        $type = "Audio Recording";
                        echo 'file-audio-o';
                        break;
                    case $extension == 'docx' || $extension == 'doc';
                        $type = "Microsoft Word Document";
                        echo 'file-word-o';
                        break;
                    case $extension == 'mp4' || $extension == 'avi';
                        $type = "Video";
                        echo 'file-video-o';
                        break;
                    case $extension == 'php' || $extension == 'js' || $extension == 'ctp';
                        $type = "Code Script";
                        echo 'file-code-o';
                        break;
                    case $extension == 'ppt' || $extension == 'pps';
                        $type = "Powerpoint Presentation";
                        echo 'file-powerpoint-o';
                        break;
                    default:
                        $type = "Unknown";
                        echo  'fa-paperclip';
                }
                echo "' title='" . $type . "'></i></TD><TD title='Uploaded: " . date('Y-m-d H:i:s',  filemtime(getcwd() . $path)) . "&#013;For: " ;

                switch (TRUE){
                    case isset($cd->client_id):
                        echo loadclient($cd->client_id)->company_name;// . " (" .  ucfirst($settings->client) . ")";
                        break;
                    case isset($cd->profile_id):
                        echo loadclient($cd->profile_id, "profiles")->username;// . " (Profile)";
                        break;
                }
                echo "'><A HREF='" . $webroot . $dir . $cd->file . "'>" . $filename . "</A></TD></TR>";
//debug($cd);
            }
            echo '</table></div></div>';
        } else {//old layout ?>


            <div class="form-group col-md-12">
                <label class="control-label" id="attach_label">Attached Files : </label>

                <div class="row">
                    <!-- <a href="#" class="btn btn-primary">Browse</a> -->
                    <?php
                        $count=0;
                        if (isset($client_docs) && count($client_docs) > 0) {
                            $allowed = array('jpg', 'jpeg', 'png', 'bmp', 'gif');
                            foreach ($client_docs as $k => $cd):
                                $count+=1;
                                ?>
                                <div class="col-md-4" align="center">
                                    <?php
                                        $e = explode(".", $cd->file);
                                        $ext = end($e);
                                        if (in_array($ext, $allowed)) {
                                            ?>
                                            <img src="<?php echo $webroot . $dir . $cd->file; ?>" style="max-width: 200px;max-height: 200px;" title="<?php echo $cd->file;?>"/>

                                        <?php
                                        } else
                                            //echo "<a href='" .$webroot . $dir . $cd->file."' target='_blank' class='uploaded'>".$cd->file."</a>";
                                            ?><BR><?php echo $cd->file;?><BR>
                                    <a href="<?php echo $webroot . $dir . $cd->file ?>" download="<?= $cd->file ?>" class="btn btn-info">Download</a>
							<span <?php if(($delete))echo "style='display:none;'";?>>
								<a href="javascript:void(0);" title="<?php echo $cd->file;?>&<?php echo $cd->id;?>" class="btn btn-danger img_delete">Delete</a>
                            </span>
                                    <input type="hidden" name="<?php echo $field_name;?>[]" value="<?php echo $cd->file;?>" class="moredocs"/>
                                </div>
                            <?php
                            endforeach;
                        }
                        if ($count==0){

                            ?>
                            <div class="form-group col-md-12">

                                None
                            </div>

                        <?


                        }?>

                </div>
            </div>


        <?php } } ?>
