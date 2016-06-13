<?php

///////////Current Month//////////////
$sql="SELECT * FROM submit_form WHERE YEAR( added_on ) = YEAR( CURDATE( ) ) AND MONTH( added_on ) = MONTH( CURDATE( ) ) ";
//echo $sql;
///////////Current Year//////////////
$sql1="SELECT * FROM submit_form WHERE YEAR( added_on ) = YEAR( CURDATE( ) )";
//echo $sql1;
//////Previous Month///////////////////////////
$sql2="SELECT * FROM submit_form WHERE YEAR(added_on) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(added_on) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";
//echo $sql2;

///////Previous Year///////////////
$sql3="SELECT * FROM submit_form WHERE YEAR(added_on) = YEAR(CURRENT_DATE - INTERVAL 1 YEAR)";

//echo $sql13;

///////Previous Week///////////////
$sql4="SELECT * FROM submit_form WHERE added_on >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY AND added_on < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY";
//echo $sql4;

$sql5="SELECT * FROM submit_form WHERE WEEK(`added_on`) = WEEK(NOW(), 1)";
//echo $sql5;
/*Assuming your date column is an actual MySQL date column:*/
$t="SELECT * FROM deal WHERE deal_modify_date > DATE_SUB(NOW(), INTERVAL 1 DAY) ORDER BY deal_id DESC";        
$w="SELECT * FROM deal WHERE deal_modify_date > DATE_SUB(NOW(), INTERVAL 1 WEEK) ORDER BY deal_id DESC";
$m="SELECT * FROM deal WHERE deal_modify_date > DATE_SUB(NOW(), INTERVAL 1 MONTH) ORDER BY deal_id DESC";


/*///////////current week*/
$week="SELECT COUNT( * ) AS ROWS FROM deal WHERE YEARWEEK( `deal_modify_date` ) = YEARWEEK(CURRENT_DATE ) ";

/*Current Day*/
$today="SELECT * FROM deal WHERE DATE( `deal_modify_date` ) = CURDATE( ) LIMIT 0 , 30";

/*///////////////////Current Month*/
$month="SELECT * FROM deal WHERE YEAR( `deal_modify_date` ) = YEAR( CURDATE( ) ) AND MONTH( `deal_modify_date` ) = MONTH( CURDATE( ) ) LIMIT 0 , 30";

echo $t."<br>".$w."<br>".$m;
?>