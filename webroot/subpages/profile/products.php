<?php
    if ($_SERVER['SERVER_NAME'] == 'localhost') { echo "<span style ='color:red;'>products.php #INC124</span>";}
    $provincelist = array("AB" => "Alberta", "BC" => "British Columbia", "MB" => "Manitoba", "NB" => "New Brunswick", "NFL" => "Newfoundland and Labrador", "NWT" => "Northwest Territories", "NS" => "Nova Scotia", "NUN" => "Nunavut", "ONT" => "Ontario", "PEI" => "Prince Edward Island", "QC" => "Quebec", "SK" => "Saskatchewan", "YT" => "Yukon Territories");

    //just pass $provincelist and $provinces into them
    function PrintProvinces($DocID, $provincelist, $provinces="", $subdocuments = ""){
        if ($DocID==-1) {
            echo "<TH>Provinces</TH><TH>Documents</TH>";
            return;
        }

        echo "<TD>";
        foreach($provincelist as $acronym => $fullname){
            if ($DocID>-1){
                $data = FindIterator($provinces, "ID", $DocID);
                $checked = "";
                if (is_object($data)){
                    if ($data->$acronym == 1) { $checked = " checked"; }
                }
                $name= $DocID . "." .  $acronym;
                echo "<INPUT TITLE='" . $fullname . "' TYPE='CHECKBOX' NAME='" . $name . "' ID='" . $name . "' VALUE='1'". $checked . ' ONCLICK="' .  "saveprovince(" . $DocID . ", '" . $acronym . "');" . '">';
            }
        }
        echo "</TD><TD>";
        foreach($subdocuments as $doctype){
            $checked = "";
            $name = $DocID . "." . $doctype->id;
            if (isset($data->subdocuments[$doctype->id])) { $checked = " checked"; }
            echo "<INPUT ID='" . $name . "' NAME='" . $name . "' TYPE='CHECKBOX' TITLE='" . $doctype->title . "'" . $checked . " ONCLICK='savedocument(" . $DocID . ", " . $doctype->id  .");'>";
        }
        echo "</TD>";
    }

    function FindIterator($ObjectArray, $FieldName, $FieldValue){
        foreach($ObjectArray as $Object){
            if ($Object->$FieldName == $FieldValue){return $Object;}
        }
        return false;
    }

?>


<div class="portlet box green-haze">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-briefcase"></i>Products
        </div>
    </div>
    <div class="portlet-body">
        <div style="float: right; margin-bottom: 5px;" class="col-md-6">

            <a href="javascript:;" class="btn btn-primary ap" style="float: right;"
               onclick="$(this).hide();$('.addproduct').show();">Add Product</a>

            <div class="addproduct" style="display: none;">
                <span class="col-md-9"><input type="text" class="form-control" placeholder="Title" id="tit_0"/></span>
                <span class="col-md-3"><a href="javascript:;" id="0" class="btn btn-primary saveproducts">Add</a></span>
            </div>
        </div>
        <div class="table-scrollable">

            <table
                class="table table-condensed  table-striped table-bordered table-hover dataTable no-footer">
                <thead>
                <tr>
                    <!--th>Id</th-->
                    <th>Title</th>
                    <th>Enable</th>

                    <?php PrintProvinces(-1, $provincelist); ?>

                    <th>Actions</th>

                </tr>
                </thead>
                <tbody class="allp">
                <?php
                    foreach ($products as $product) {
                        ?>
                        <tr>
                            <!--td><?php echo $product->id;?></td-->
                            <td class="title_<?php echo $product->id;?>"><?php echo $product->title;?></td>
                            <td><input type="checkbox" <?php if ($product->enable == '1') {
                                    echo "checked='checked'";
                                }?> class="enable" id="chk_<?php echo $product->id;?>"/></td>
                                <?php
                                    PrintProvinces($product->id, $provincelist, $provinces, $subdocuments);
                                    echo "<td>";
                                    if ($product->id >= 9) { ?>
                                        <a href="javascript:;" class="btn btn-xs btn-info editpro" id="edit_<?php echo $product->id;?>">Edit</a>
                                    <?php } ?>
                            </td>
                        </tr>
                    <?php
                    }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<script>
    function saveprovince(DocID, Province){
        element = document.getElementById(DocID + "." + Province);
        //alert("Document " + DocID + " Province " + Province + " Checked: " + element.checked);
        $.ajax({
            url: "<?php echo $this->request->webroot;?>profiles/province",
            type: "post",
            dataType: "HTML",
            data: "Type=Province&DocID=" + DocID + "&Province=" + Province + "&Value=" + element.checked,
            success: function (msg) {
                //alert(msg);
            }
        })
    }

    function savedocument(DocID, SubDoc){
        element = document.getElementById(DocID + "." + SubDoc);
        //alert("Document " + DocID + " Province " + Province + " Checked: " + element.checked);
        $.ajax({
            url: "<?php echo $this->request->webroot;?>profiles/province",
            type: "post",
            dataType: "HTML",
            data: "Type=Document&DocID=" + DocID + "&SubDoc=" + SubDoc + "&Value=" + element.checked,
            success: function (msg) {
                //alert(msg);
            }
        })
    }
</script>
<script>
    $(function () {
        $('.editpro').live('click', function () {

            var id = $(this).attr('id').replace("edit_", "");
            var va = $('.title_' + id).text();
            $('.title_' + id).html('<input type="text" value="' + va + '" class="form-control" id="tit_' + id + '" /><a class="btn btn-primary saveproducts" id ="' + id + '" >save</a> ');
        });
        $('.saveproducts').live('click', function () {
            var id = $(this).attr('id');
            var title = $('#tit_' + id).val();
            $.ajax({
                url: "<?php echo $this->request->webroot;?>profiles/sproduct/" + id,
                type: "post",
                dataType: "HTML",
                data: "title=" + title,
                success: function (msg) {
                    if (id != 0)
                        $('.title_' + id).html(msg);
                    else {
                        $('.allp').prepend(msg);
                        $('.addproduct').hide();
                        $('.ap').show();
                        $('#tit_0').val("");

                    }
                }
            })
        });
        $('.enable').live('click', function () {
            var enb = "";
            var ids = $(this).attr('id');

            var id = ids.replace("chk_", "");
            //alert(id);
            if ($(this).is(":checked"))
                enb = "1";
            else
                enb = "0";

            $.ajax({
                url: "<?php echo $this->request->webroot;?>profiles/enableproduct/" + id,
                data: "enable=" + enb,
                type: "post",
                success: function (msg) {

                }
            })

        });
    })
</script>