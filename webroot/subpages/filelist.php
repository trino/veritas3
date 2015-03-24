  <?php
 if($_SERVER['SERVER_NAME'] =='localhost')
        echo "<span style ='color:red;'>filelist.php #INC158</span>";
 ?>

 <?php 
	$GLOBALS['webroot'] = $webroot= $this->request->webroot;
    function getextension($path){
        return strtolower(pathinfo($path, PATHINFO_EXTENSION));
    }
        
  function listfiles($client_docs, $dir, $field_name='client_doc',$delete, $method=1){
	$webroot=$GLOBALS['webroot'] ;
      if($method==2) {
          echo  '<div class="portlet box grey-salsa"><div class="portlet-title"><div class="caption"><i class="fa fa-briefcase"></i>Attachments</div>';
          echo '</div><div class="portlet-body form"><table>';
          $count = 0;
          foreach ($client_docs as $k => $cd){//$webroot . $dir . $cd->file;    id, client_id
              $count += 1;
              //switch (getextension())
              echo "<TR><TD>" . $cd .

              echo "</TD></TR>";

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
