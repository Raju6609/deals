<?php
if($_SERVER['HTTP_HOST']=="localhost")
{
	define ("DBHOST","localhost");
	define ("DBUSER","root");
	define ("DBPASS","");
	define ("DBNAME","hotdeals");
}
else
{
	define ("DBHOST","localhost");
	define ("DBUSER","desideal_deal");
	define ("DBPASS","LR!MxC..[XCf");
	define ("DBNAME","desideal_deals");
}
	
?>