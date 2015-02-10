<?php
function pending($name, $value, $checked = true){
    $value = '<input type="checkbox" name="' . $name . '" value="' . $value . '"'; // checked>';
    if ($checked) {
        return $value . " checked>";
    } else {
        return $value . ">";
    }
}
?>
<form id="form_products">
    <input class="document_type" type="hidden" name="document_type" value="Products" />

    <input type="hidden" class="sub_docs_id" name="sub_doc_id" value="9" id="af" />
    <div class="clearfix"></div>

<div class="portlet box yellow">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-folder-open-o"></i>ISB MEE Results
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-scrollable">
            <table class="table ">
                <tbody>

                    <tr class="even" role="row">
                        <td class="actions">
                            <?php echo pending("prem_nat", "PremiumNational", false); ?>
                            <!--<span class="label label label-info">Pending </span>-->
                        </td>
                        <td><span class="icon-notebook"></span></td>
                        <td>Premium National Criminal Record Check</td>
                    </tr>


                    <tr class="even" role="row">
                        <td class="actions">
                            <?php echo pending("dri_abs", "Driver's Record Abstract", false); ?>
                            <!-- <span class="label label label-info">Pending </span>-->
                        </td>
                        <td><span class="icon-notebook"></span></td>
                        <td>Driver's Record Abstract</td>
                    </tr>

                    <tr class="even" role="row">
                        <td class="actions">
                            <?php echo pending("CVOR", "CVOR", false); ?>
                            <!-- <span class="label label label-info">Pending </span>-->
                        </td>
                        <td><span class="icon-notebook"></span></td>
                        <td>CVOR</td>
                    </tr>


                    <tr class="odd" role="row">
                        <td class="actions">
                            <?php echo pending("prem_nat", "PremiumNational", false); ?>
                            <!-- <span class="label label label-info">Pending </span>-->
                        </td>
                        <td><span class="icon-notebook"></span></td>
                        <td>Pre-employment Screening Program Report</td>
                    </tr>


                    <tr class="even" role="row">
                        <td class="actions">
                            <?php echo pending("prem_nat", "PremiumNational", false); ?>
                            <!--<span class="label label label-info">Pending </span> -->
                        </td>
                        <td><span class="icon-notebook"></span></td>
                        <td>Transclick</td>
                    </tr>


                    <tr class="odd" role="row">
                        <td class="actions">
                            <?php echo pending("prem_nat", "PremiumNational", false); ?>
                            <!--<span class="label label label-info">Pending </span>-->
                        </td>
                        <td><span class="icon-notebook"></span></td>
                        <td>Certifications</td>
                    </tr>

                    <tr class="odd" role="row">
                        <td class="actions">
                            <?php echo pending("prem_nat", "PremiumNational", false); ?>
                            <!--<span class="label label label-info">Pending </span>-->
                        </td>
                        <td><span class="icon-notebook"></span></td>
                        <td>Letter of Experience</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
</Form>