<?php
/*
include_once ('/subpages/api.php');
btnclass("VIEW")
btnclass("EDIT")
btnclass("DELETE")

green
green-meadow
green-seagreen
green-turquoise
green-haze
green-jungle
green-sharp
green-soft

blue
blue-madison
blue-chambray
blue-ebonyclay
blue-hoki
blue-steel
blue-soft
blue-dark
blue-sharp

grey
grey-steel
grey-cararra
grey-gallery
grey-cascade
grey-silver
grey-salsa
grey-salt
grey-mint

red
red-pink
red-sunglo
red-intense
red-thunderbird
red-flamingo
red-soft

yellow
yellow-gold
yellow-casablanca
yellow-crusta
yellow-lemon
yellow-saffron

purple
purple-plum
purple-medium
purple-studio
purple-wisteria
purple-seance
purple-intense
purple-sharp
purple-soft
 */
function btnclass($xscolor, $stripecolor = ""){
    $size = "btn-xs";
    $mode = true;//true = regular button, false = striped
    switch ($xscolor){
        case "VIEW":
            $xscolor = "btn-info";//light blue
            $stripecolor = "blue-chambray";
            break;
        case "EDIT":
            $xscolor = "btn-primary";
            $stripecolor = "blue";
            break;
        case "DELETE":
            $xscolor = "btn-danger";
            $stripecolor = "red";
    }

    if ($mode ){
        if (strlen($stripecolor)==0){$stripecolor = $xscolor;}
        return "btn default " . $size . " " . $stripecolor . "-stripe";
    } else {
        return "btn " . $size . " " . $xscolor;
    }
}
?>