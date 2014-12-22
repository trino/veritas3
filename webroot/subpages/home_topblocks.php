<?php $block = $this->requestAction("settings/get_blocks/".$this->Session->read('Profile.id')); ?>

<div class="tiles">
    <?php
	if ($block->addadriver == 1) { ?>
    <a href="<?php echo $this->request->webroot; ?>profiles/add">
        <div class="tile bg-red-sunglo">

            <div class="tile-body">
                <i class="fa fa-user"></i>
            </div>
            
            
            <div class="tile-object">
                
                   <div class="name"> Add a <?=$settings->profile;?></div>
                
                <div class="number">

                </div>
            </div>
            

        </div>
        </a>
    <?php } ?>
    <?php if ($block->searchdriver == 1) { ?>
    <a href="<?php echo $this->request->webroot; ?>profiles">
        <div class="tile selected bg-yellow-saffron">
            <div class="corner">
            </div>
            <div class="tile-body">
                <i class="fa fa-search"></i>
            </div>
            <div class="tile-object">
                <div class="name">
                    Search <?=$settings->profile;?>
                </div>
                <div class="number">

                </div>
            </div>
        </div>
        </a>
    <?php } ?>

    <?php if ($block->submitorder == 1) { ?>
    <a href="<?php echo $this->request->webroot; ?>documents/add">
        <div class="tile bg-purple-studio">
            <div class="tile-body">
                <i class="fa fa-clipboard"></i>
            </div>
            <div class="tile-object">
                <div class="name">
                    Submit <?=$settings->document;?>
                </div>
                <div class="number">

                </div>
            </div>
        </div>
        </a>
    <?php } ?>







    <?php if ($block->orderhistory == 1) { ?>
        <div class="tile bg-green-meadow">
            <div class="tile-body">
                <i class="fa fa-history"></i>
            </div>
            <div class="tile-object">
                <div class="name">
                    Order History
                </div>
                <div class="number">
                    93
                </div>
            </div>
        </div>

    <?php } ?>



    <?php if ($block->schedule == 1) { ?>
    <!--<div class="input-group input-medium date date-picker" data-date-start-date="+0d" data-date-format="dd-mm-yyyy">-->
        <a href="javascript:;" class=" input-group input-medium date date-picker1 tile" data-date-format="dd-mm-yyyy" >
        <div class="tile  bg-grey-cascade "  >
        
            <div class="tile-body">
                <i class="fa fa-calendar"></i>
            </div>
        
            <div class="tile-object">
                <div class="name">
                    Schedule
                </div>
                <div class="number">
                    14
                </div>
            </div>
            
        </div>
        </a>
    <?php } ?>



    <?php if ($block->tasks == 1) { ?>
        <a href="<?php echo $this->request->webroot;?>todo">
        <div class="tile bg-blue-steel">
            <div class="tile-body">
                <i class="fa fa-tasks"></i>
            </div>
            <div class="tile-object">
                <div class="name">
                    Tasks
                </div>
                <div class="number">
                    34
                </div>
            </div>
        </div>
        </a>

    <?php } ?>



    <?php if ($block->feedback == 1) { ?>
        <div class="tile bg-green-meadow">
            <div class="tile-body">
                <i class="fa fa-comments"></i>
            </div>
            <div class="tile-object">
                <div class="name">
                    Feedback
                </div>
                <div class="number">
                    34
                </div>
            </div>
        </div>

    <?php } ?>

    <?php if ($block->analytics == 1) { ?>
        <div class="tile bg-green">
            <div class="tile-body">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="tile-object">
                <div class="name">
                    Analytics
                </div>
                <div class="number">
                </div>
            </div>
        </div>
    <?php } ?>



    <?php if ($block->masterjob == 1) { ?>
        <div class="tile bg-red-intense">
            <div class="tile-body">
                <i class="fa fa-globe"></i>
            </div>
            <div class="tile-object">
                <div class="name">
                    Master <?php echo ucfirst($settings->client); ?>
                </div>
                <div class="number">

                </div>
            </div>
        </div>

    <?php } ?>



</div>
<script>
$(function(){
    
    $('.date-picker1').datepicker({
        format: "yyyy-mm-dd",
    })
    //Listen for the change even on the input
    .change(dateChanged)
    .on('changeDate', dateChanged);
});

function dateChanged(ev) {
    alert(ev);
    $(this).datepicker('hide');
    alert($(this).datepicker('value'));
    if ($('#startdate').val() != '' && $('#enddate').val() != '') {
        $('#period').text(diffInDays() + ' d.');
    } else {
        $('#period').text("-");
    }
}
</script>
