<?php
    $profiles = $this->requestAction('Profiles/getProfile');
    $contact = $this->requestAction('Profiles/getContact');
    //include("subpages/profileslisting.php");
?>
<div class="scrolldiv" style="margin-bottom: 15px;">
    <input type="text" id="searchProfile" onkeyup="searchProfile()" class="form-control" placeholder="Search Profiles"/>
    <table class="table table-striped table-bordered table-advance table-hover recruiters">
        <thead>
        <tr>
            <th colspan="2">Add Profiles</th>
        </tr>
        </thead>
        <tbody id="profileTable">
        <?php
            $i = 0;
            foreach ($profiles as $r) {
                //echo $r->username;continue;
                //if ($i % 2 == 0) {
                    ?>
                    <tr>
                <?php
                //}
                ?>

                <td>
                    <span><input class="profile_client" type="checkbox"
                                 <?php if (in_array($r->id, $profile)){ ?>checked="checked"<?php }?>
                                 value="<?php echo $r->id; ?>"/></span>
                    <span> <?php echo $r->username; ?> </span>
                </td>
                <?php

               // if (($i + 1) % 2 == 0) {
                    ?>
                    </tr>
                <?php
                //}

                $i++;
            }
            //if (($i + 1) % 2 != 0) {
                //echo "</td></tr>";
            //}
        ?>
        </tbody>
    </table>
</div>
<!--p>&nbsp;</p>
<input type="text" id="searchContact" onkeyup="searchContact()" class="form-control" placeholder="Search Contact"/>
<table class="table table-striped table-bordered table-advance table-hover contacts">
    <thead>
    <tr>
        <th colspan="2">Add Contacts</th>
    </tr>
    </thead>
    <tbody id="contactTable">
    <?php
        $i = 0;
        foreach ($contact as $r) {
            //if ($i % 2 == 0) {
                ?>
                <tr>
            <?php
            //}
            ?>
            <td>
                <span><input class="contact_client" type="checkbox"
                             <?php if (in_array($r->id, $contacts)){ ?>checked="checked"<?php }?>
                             value="<?php echo $r->id; ?>"/></span>
                <span> <?php echo $r->username; ?> </span>
            </td>

            <?php

            //if (($i + 1) % 2 == 0) {
                ?>
                </tr>
            <?php
            //}

            $i++;
        }
        /**
 * if (($i + 1) % 2 != 0) {
 *             echo "</td></tr>";
 *         }
 */
    ?>
    </tbody>

</table-->
<script>
    function searchProfile() {
        var key = $('#searchProfile').val();
        $('#profileTable').html('<tbody><tr><td><img src="<?php echo $this->request->webroot;?>assets/admin/layout/img/ajax-loading.gif"/></td></tr></tbody>');
        $.ajax({
            url: '<?php echo $this->request->webroot;?>profiles/getAjaxProfile/<?php if(isset($id) && $id)echo $id;else echo '0'?>',
            data: 'key=' + key,
            type: 'get',
            success: function (res) {
                $('#profileTable').html(res);
            }
        });
    }
    function searchContact() {
        var key = $('#searchContact').val();
        $('#contactTable').html('<tbody><tr><td><img src="<?php echo $this->request->webroot;?>assets/admin/layout/img/ajax-loading.gif"/></td></tr></tbody>');
        $.ajax({
            url: '<?php echo $this->request->webroot;?>profiles/getAjaxContact/<?php if(isset($id) && $id)echo $id;else echo '0'?>',
            data: 'key=' + key,
            type: 'get',
            success: function (res) {
                $('#contactTable').html(res);
            }
        });
    }
    $(function () {
        $('.contact_client').change(function () {
            if ($(this).is(':checked')) {
                var url = '<?php echo $this->request->webroot;?>clients/assignContact/' + $(this).val() + '/<?php if(isset($id) && $id)echo $id;else echo '0'?>/yes';
            }
            else {
                var url = '<?php echo $this->request->webroot;?>clients/assignContact/' + $(this).val() + '/<?php if(isset($id) && $id)echo $id;else echo '0'?>/no';
            }
            $.ajax({url: url});
        });
        $('.profile_client').change(function () {
            if ($(this).is(':checked')) {
                var url = '<?php echo $this->request->webroot;?>clients/assignProfile/' + $(this).val() + '/<?php if(isset($id) && $id)echo $id;else echo '0'?>/yes';
            }
            else {
                var url = '<?php echo $this->request->webroot;?>clients/assignProfile/' + $(this).val() + '/<?php if(isset($id) && $id)echo $id;else echo '0'?>/no';
            }
            $.ajax({url: url});
        });
        $('.scrolldiv').slimScroll({
            height: '250px'
        });
    });
</script>
