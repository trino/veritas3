<tbody>
<?php

    
    $count = 0;
    if ($clients)
        foreach ($clients as $o) 
        { 
            $pro_ids = explode(",",$o->profile_id);
            if(!in_array($id,$pro_ids)){
            ?>
                
            <tr>
                <td>
                    <div class="checker">
                        <span >
                        <input type="checkbox" value="<?php echo $o->id; ?>" class="addclientz" <?php if(in_array($id,$pro_ids)){echo "checked";}?> style="opacity: .5!important;" /> 
                        </span>
                    </div>
                    <?php echo $o->company_name; ?>
                </td>
            </tr>

        <?php
            }
        }
?>
</tbody>