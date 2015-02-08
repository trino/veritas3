








<div class=" light recruiter_notes">
    <div class="">

        <textarea id="recruiter_notes" placeholder="Add driver notes here..." rows="2" class="form-control"></textarea>
        <a href="javascript:void(0);" class="btn btn-success" id="add_recruiter" style="float:right;margin:5px 0;">Submit</a>

    </div>
    <div class="">
        <?php
            if ($this->request->params['action'] == 'viewReport')
                $pid = $order->profile->id;
            else
                $pid = $p->id;
            $notes = $this->requestAction('profiles/getNotes/' . $pid);
        ?>
        <div class="notes" style="">
            <?php
                if ($notes) {
                    foreach ($notes as $n) {
                        ?>
                        <div class="item">
                            <div class="item-head">
                                <div class="item-details">
                                    <span
                                        class="item-name primary-link"><?php $r_info = $this->requestAction('profiles/getRecruiterById/' . $n->recruiter_id);
                                            echo $r_info->fname . ' ' . $r_info->mname . ' ' . $r_info->lname ?></span>
                                    <span class="item-label"><?php $arr_cr = explode(',', $n->created);
                                            echo $arr_cr[0]; ?></span>
                                </div>

                            </div>
                            <div class="item-body">
                                <?php echo $n->description; ?><br><br>
                            </div>
                        </div>
                    <?php
                    }
                }
            ?>


        </div>
    </div>
</div>

<script>
    $(function () {
        $('.recruiter_notes').slimScroll({
            height: '200px'
        });
        $('#add_recruiter').click(function () {
            if ($('#recruiter_notes').val() == '') {
                alert('You can\'t submit blank note');
                $('#recruiter_notes').focus();
            }
            else {
                $.ajax({
                    url: '<?php echo $this->request->webroot;?>profiles/saveNote/<?php echo $pid;?>',
                    data: 'description=' + $('#recruiter_notes').val(),
                    type: 'post',
                    success: function (response) {
                        if (response != 'error') {

                            $('.notes').prepend(response);
                            $('#recruiter_notes').val('')
                            //window.location = "";
                        }
                    }
                });
            }
        })
    });
</script>