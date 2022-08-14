<?php

function categoryData()
{

    $cat_sql = "select * from tbl_categories order by categories_id desc ";
    $cat_data = sql::Query_select($cat_sql);


    return $cat_data;
}


function getAllMemberShips()
{
    $mem_data = sql::Query_select("SELECT * FROM tbl_membership 	WHERE mem_status='Enabled'");
    return $mem_data;
}

function getshippingvalue($pid, $qid, $shipping_method)
{
    $shipping = sql::Select_single("SELECT * FROM ak_shipping	WHERE products_id='$pid' AND qty_id='$qid' AND shipping_method='$shipping_method'");
    return $shipping['amount'];
}


function getTypes($tmpl)
{
    switch ($tmpl) {
        case 'sales':
            $type = 'Sales Pages';
            break;

        case 'optin':
            $type = 'Optin Pages';
            break;

        case 'swipe':
            $type = 'Swipe Files';
            break;

        case 'copy':
            $type = 'Copywriting Tutorials';
            break;
        default:
            $type = 'Sales Page';
    }

    return $type;
}


?>