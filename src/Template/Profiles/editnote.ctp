<div class=" light recruiter_notes">
<?php

$desirednote = -1;
if (isset($_GET["id"]) and isset($_GET["pid"])) {
$pid = $_GET["pid"];
$desirednote = $_GET["id"];
}

$notes = $this->requestAction('profiles/getNotes/' . $pid);

debug($notes);
?>



        <div class="notes" style="">
            <?php
            if ($notes) {
                foreach ($notes as $n) {
                    if ($desirednote==-1 or $desirednote = $n->id){
                    ?>
                    <div class="item">
                        <div class="item-head">
                            <div class="item-details">
                                <a href="../editnote?id=<?php echo $n->id . "&pid=" . $pid; ?>">
                                    <span class="item-name primary-link">
                                        <?php
                                        $r_info = $this->requestAction('profiles/getRecruiterById/' . $n->recruiter_id);
                                        echo $r_info->fname . ' ' . $r_info->mname . ' ' . $r_info->lname ?>
                                    </span>
                                    <span class="item-label"><?php $arr_cr = explode(',', $n->created); echo $arr_cr[0]; ?></span>
                                </a>
                            </div>

                        </div>
                        <div class="item-body">
                            <?php echo $n->description; ?><br><br>
                        </div>

                    </div>
                <?php
                }}
            }
            ?>


        </div>
    </div>
