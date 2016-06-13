<?php

/*

* Author: Debabrata Mondal

* Date: 08/05/12

*/

class functns {

   

   var $image;

   var $image_type;



 //Image Resize

   function load($filename) {

      $image_info = @getimagesize($filename);

      $this->image_type = $image_info[2];

      if( $this->image_type == IMAGETYPE_JPEG ) {

         $this->image = imagecreatefromjpeg($filename);

      } elseif( $this->image_type == IMAGETYPE_GIF ) {

         $this->image = imagecreatefromgif($filename);

      } elseif( $this->image_type == IMAGETYPE_PNG ) {

         $this->image = imagecreatefrompng($filename);

      }

   }

   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {

      if( $image_type == IMAGETYPE_JPEG ) {

         imagejpeg($this->image,$filename,$compression);

      } elseif( $image_type == IMAGETYPE_GIF ) {

         imagegif($this->image,$filename);         

      } elseif( $image_type == IMAGETYPE_PNG ) {

         imagepng($this->image,$filename);

      }   

      if( $permissions != null) {

         chmod($filename,$permissions);

      }

   }

/*   function output($image_type=IMAGETYPE_JPEG) {

      if( $image_type == IMAGETYPE_JPEG ) {

         imagejpeg($this->image);

      } elseif( $image_type == IMAGETYPE_GIF ) {

         imagegif($this->image);         

      } elseif( $image_type == IMAGETYPE_PNG ) {

         imagepng($this->image);

      }   

   }*/

   

   function getWidth() {

      return imagesx($this->image);

   }

   function getHeight() {

      return imagesy($this->image);

   }

 /*  function resizeToHeight($height) {

      $ratio = $height / $this->getHeight();

      $width = $this->getWidth() * $ratio;

      $this->resize($width,$height);

   }*/

   function resizeToWidth($width) {

      $ratio = $width / $this->getWidth();

      $height = $this->getheight() * $ratio;

      $this->resize($width,$height);

   }

  /* function scale($scale) {

      $width = $this->getWidth() * $scale/100;

      $height = $this->getheight() * $scale/100; 

      $this->resize($width,$height);

   }*/

   function resize($width,$height) {

      $new_image = imagecreatetruecolor($width, $height);

      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());

      $this->image = $new_image;   

   }  

   

   //End Of Image Resize Function

   function getExtension($str) {

         $i = strrpos($str,".");

         if (!$i) { return ""; }

         $l = strlen($str) - $i;

         $ext = substr($str,$i+1,$l);

         return $ext;

}



function pictureupload($fileName,$oldfileName,$fileSize,$fileTempName,$folderPath,$maxSize=52428800){

	if($fileName!=''){

$imginfo = pathinfo($fileName);

	$fileExt=$this->getExtension($fileName);

	$fileExt=strtolower($fileExt);



			if($fileExt=='JPEG' ||$fileExt=='jpeg' || $fileExt=='jpg' || $fileExt=='png'|| $fileExt=='gif' || $fileExt=='pdf' || $fileExt=='doc' || $fileExt=='txt' || $fileExt=='ppt' || $fileExt=='zip' || $fileExt=='rar'){

				$filename_upld=date("ymdhis").$fileName;

				if($fileSize<$maxSize){

					$newFilePath =  $folderPath."/".$filename_upld;

					

					if(move_uploaded_file($fileTempName, $newFilePath)){

						$msg="";

					}

				}else{

					$msg="Maximum File File Size 5 MB";

				}

			}else{

				$msg="Please Upload xls or psd or pdf or doc or gif or txt or ppt or zip or rar format of the File";

			}

	}else{

		if($oldfileName!=''){

			$filename_upld=$oldfileName;

		}else{

			$filename_upld='noimage.jpg';

		}

	}

	$result=array($msg,$filename_upld);

return $result;}

function picture($img,$pat)



			        {
			        $fil=$img;
					$oldfileName=str_replace(" ","_",$fil['name']);
					$fileSize="5000";
					$filename=str_replace(" ","_",$fil['name']);
					$fileTempName=$fil["tmp_name"];
					$folderPath="images/temp/";
					$this->pictureupload($filename,$oldfileName,$fileSize,$fileTempName,$folderPath);
					$uploadImg=date("ymdhis").$filename;
					move_uploaded_file($fil['tmp_name'],"images/temp/".str_replace(" ","_",$fil['name']));
					$this->load("images/temp/".$uploadImg);
					//$temp="admin/images/temp/";
					$this->resize(124,125);
					$this->save($pat.$uploadImg);
                   unlink("images/temp/".$uploadImg);
					return  $uploadImg;
	}

	function sharepicture($img,$pat)
			        {
						//echo $pat;die;
			        $fil=$img;
					$oldfileName=str_replace(" ","_",$fil['name']);
					$fileSize="5000";
					$filename=str_replace(" ","_",$fil['name']);
					$fileTempName=$fil["tmp_name"];
					$folderPath="images/temp/";
					$this->pictureupload($filename,$oldfileName,$fileSize,$fileTempName,$folderPath);
					$uploadImg=date("ymdhis").$filename;
					move_uploaded_file($fil['tmp_name'],"images/temp/".str_replace(" ","_",$fil['name']));
					$this->load("images/temp/".$uploadImg);
					//$temp="admin/images/temp/";
					$this->resizeToWidth(800);
					$this->save($pat.$uploadImg);
                   unlink("images/temp/".$uploadImg);
					return  $uploadImg;
	}			

   function review($nocount)

{

	  switch($nocount)

		{

		case "0":$rating="nostar";break;

		case "1":$rating="onestar";break;

		case "2":$rating="twostar";break;

		case "3":$rating="threestar";break;

		case "4":$rating="fourstar";break;

		case "5":$rating="fivestar";break;

		}

		return $rating;

}



	////////////////////Login////////////////////////

	function adminlogin($uname,$upass)

		{
		$uname=str_replace("'","",$uname);

		$upass=str_replace("'","",$upass);

		$pass=$this->makePassword($upass,"ENC");

		$sql="select * from tbl_adminlogin where uname='".$uname."' and pwd='".$pass."'";
		//echo $sql;die;
		$res=mysql_query($sql);

		$num=mysql_num_rows($res);

		$row=mysql_fetch_array($res);


		if($num>0)

			{

			$_SESSION['admin']=$row['uname'];

			$_SESSION['pwd']=$row['pwd'];
			
			return "yes";
			
			}

			else 

			{

			return "not";

			}
		}

	function checklogin()
	{
		if($_SESSION['admin']=='')
		{
			header("location:./");
		}
	}	
	function loginvalidate()
	{
		if($_SESSION['admin']!='')
		{
			header("location:dashboard.php");
		}
	}

	
/////////////////////////////logout//////////////////////////	

/////////////////////////////logout//////////////////////////		

		function logOut()

			{

			unset($_SESSION['admin']);

			unset($_SESSION['pwd']);

			//$this->location("index.php");
			return true;
			}

/////////////////////////end logout//////////////////////////

/*////////////////////Last Login//////////////////////////*/

function last_login()

    {

			$current_time = date("g:i A");

            $current_date = date("l, F jS, Y");

	        $las_login="UPDATE tbl_adminlogin 

  SET last_login_time = '$current_time', last_login_date = '$current_date' WHERE uname='".$_SESSION['admin']."' AND pwd='".$_SESSION['pwd']."'";

 // echo $las_login;die;

     $qry= mysql_query($las_login);

	 return $qry;

	}

/*///////////////////End Last Login/////////////////////*/

///////////////////Change Password/////////////////////////		

			function changePass ($newpass,$table)

				{

				$newpass=str_replace("'","",$newpass);

				$pass1=$this->makePassword($newpass,"ENC");

				$query="update ".$table." set pwd='".$pass1."' where uname='".$_SESSION['admin']."'";

		//echo $query;die;

		if(mysql_query($query))

			{

			$_SESSION['pwd']=$newpass;

			return $query;

			}

				

				}

		function isLogin($getSessionName,$getBackPage) {

			//echo $_SESSION['uname'];

			if(!isset($_SESSION[$getSessionName])) {

				

				echo "<script language=\"javascript\" type=\"text/javascript\">\n";

				echo "window.top.location.href=\"".$getBackPage."\";\n";

				echo "</script>";

				exit();

			}

		}

 function location($path) {

			$scr = "<script language=\"javascript\" type=\"text/javascript\">\n";

			$scr.= "window.location.href=\"".$path."\";\n";

			$scr.= "</script>\n";

			echo $scr;

		}

		function makePassword($pwd,$type) {

			$pass = $pwd;

			if($type == "ENC") {

				$pass = base64_encode(strrev($pass));

			} else {

				$pass = base64_decode(strrev($pass));

			}

			return $pass;

		}

///////////////////////////////////////////////

	function getDate()

			{

					$date=getdate();

					$day=$date['mday'];

					$month=$date['mon'];

					$year=$date['year'];

					$dt=$year."-".$month."-".$day;

					return $dt;

			}

		function getTime()

			{

					$date=getdate();

					$hr=$date['hours'];

					$min=$date['minutes'];

					$sec=$date['seconds'];

					$tm=$hr.":".$min.":".$sec;

					return $tm;

			}

         function revDate($dt)	

		{

				/*$day=substr($dt,8,2);

				$mon=substr($dt,5,2);

				$yr=substr($dt,0,4);

				return $day."-".$mon."-".$yr;*/

				$newdt=explode("-",$dt);

				return $newdt[2]."-".$newdt[1]."-".$newdt[0];

		}

   /*-----------Insert  table  list-----------*/



		function dataInsert($table,$dataArray)

			{

				 $fldArray=$dataArray;

					$i=0;

					$j=0;

					$sql="insert into `".$table."` (";

					while (list($key1, $value1) = each ($fldArray)) {

						$sql.="`".$key1."`";

						$j++;

						if($j!=count($fldArray)){

						$sql.=",";

						}

						if($j==count($fldArray)){

						$sql.=") VALUES (";

						}

					}

					

						while (list($key1, $value1) = each ($dataArray)) {

						$sql.="'".$value1."'";

						$i++;

						if($i!=count($dataArray)){

							$sql.=",";

						}

						if($i==count($dataArray)){

						$sql.=")";

						}

					}

				//echo $sql;exit;

				mysql_query($sql) or die(CHECK_QUERY.$sql);

				$id=mysql_insert_id();

				return $id;

		}

	

	/* End of Insert table  list*/

	////////////////////////////////Select table  list////////////////////////////////////////////////



	function dataSelect($table,$dataArray,$extra,$orderArray,$orderType,$limit,$offset)

	{

	$i=0;

	$j=0;

	$k=0;

	$sql.="select ";

	while (list($key1, $value1) = each ($dataArray)){

		$sql.="".$key1."";

		$i++;

		if($i!=count($dataArray)){

			$sql.=" , ";

		}

	}

	$sql.=" from ".$table."";



	if(count($fldArray)>0){

		$sql.=" where ";

	

	while (list($key2, $value2) = each ($fldArray)){

		$sql.="".$key2."='".$value2."' ";

		$j++;

		if($j!=count($fldArray)){

		$sql.=" and ";

		}

	}

	}

		$sql.=$extra;

	if(count($orderArray)>0){

	$sql.=" order by ";

	while (list($key3, $value3) = each ($orderArray)){

		$sql.="".$key3."";

		$k++;

		if($k!=count($orderArray)){

		$sql.=" , ";

		}

	}

	}

	if($orderType=='desc' || $orderType=='asc'){

	$sql.=" ".$orderType."";

	}

	//echo "<br />".$sql;

	

 $res=mysql_query($sql) or die(CHECK_QUERY.$sql);

	$numrows=mysql_num_rows($res);

	if($numrows > 0){

		if(empty($offset))

		$offset=0;

		if(empty($limit))

		$limit=1000000000;

		$sql.=" limit $offset,$limit";

		$res=mysql_query($sql);								

	}	

	while($row1=mysql_fetch_array($res)){

	$row[]=$row1;

	}

	$result=array($row,$numrows,$offset,$limit);



	//echo "<br />".$sql;



 return $result;

 }

/////////////////////////////////////// End of table  list///////////////////////////////////



//////////////////////////////////////Select table  list/////////////////////////////////////



	function dataSelect1($table,$dataArray,$fldArray)

	{

	$i=0;

	$j=0;

	$k=0;

	$sql.="select ";

	while (list($key1, $value1) = each ($dataArray)){

		$sql.="".$key1."";

		$i++;

		if($i!=count($dataArray)){

			$sql.=" , ";

		}

	}

	$sql.=" from ".$table."";



	if(count($fldArray)>0){

		$sql.=" where ";

	

	while (list($key2, $value2) = each ($fldArray)){

		$sql.="".$key2."='".$value2."' ";

		$j++;

	}

	}



 $res=mysql_query($sql) or die(CHECK_QUERY.$sql);

 //echo $sql;die;

	$numrows=mysql_num_rows($res);

	if($numrows > 0){

		if(empty($offset))

		$offset=0;

		if(empty($limit))

		$limit=1000000000;

		$sql.=" limit $offset,$limit";

		$res=mysql_query($sql);								

	}	

	while($row1=mysql_fetch_array($res)){

	$row[]=$row1;

	}

	$result=array($row,$numrows,$offset,$limit);



//print_r($result);exit;

 return $result;

 }

///////////////////////////////////////// End of table  list/////////////////////////////////////////

//////////////////////////////////////Select table  list/////////////////////////////////////



	function dataSelect2($table,$dataArray)

	{

	$i=0;

	$j=0;

	$k=0;

	$sql.="select ";

	while (list($key1, $value1) = each ($dataArray)){

		$sql.="".$key1."";

		$i++;

		if($i!=count($dataArray)){

			$sql.=" , ";

		}

	}

	$sql.=" from ".$table."";



	if(count($fldArray)>0){

		$sql.=" where ";

	

	while (list($key2, $value2) = each ($fldArray)){

		$sql.="".$key2."='".$value2."' ";

		$j++;

	}

	}



 $res=mysql_query($sql) or die(CHECK_QUERY.$sql);

	$numrows=mysql_num_rows($res);

	if($numrows > 0){

		if(empty($offset))

		$offset=0;

		if(empty($limit))

		$limit=1000000000;

		$sql.=" limit $offset,$limit";

		$res=mysql_query($sql);								

	}	

	while($row1=mysql_fetch_array($res)){

	$row[]=$row1;

	}

	$result=array($row,$numrows,$offset,$limit);





 return $result;

 }

///////////////////////////////////////// End of table  list/////////////////////////////////////////



///////////////////////////////////////// Update  table  list ///////////////////////////////////////



	function dataUpdate($table,$dataArray,$fldArray){

	$i=0;

	$j=0;

	$sql.="update ".$table." set ";

	

	while (list($key1, $value1) = each ($dataArray)) {

		$sql.="".$key1."='".$value1."'";

		$i++;

		if($i!=count($dataArray)){

			$sql.=" , ";

		}

		if($i==count($dataArray)){

		$sql.=" where ";

		}

	}

	while (list($key2, $value2) = each ($fldArray)) {

		$sql.="".$key2."='".$value2."' ";

		$j++;

		/*if($j!=count($fldArray)){

		$sql.="  ";*/

		//}

	}

	//echo $sql;die;

	return mysql_query($sql) or die(CHECK_QUERY.$sql);

}



///////////////////////////////////// End of table  list//////////////////////////////////////////////////



//////////////////// //////////////// Delete  table  list ////////////////////////////////////////////////



		function datadelete($table,$fldArray)

		{

			$i=0;

			$j=0;

			$sql.="delete from ".$table;

			$sql.=" where ";

			while (list($key2, $value2) = each ($fldArray)) {

			$sql.="".$key2."='".$value2."' ";

			$j++;

			if($j!=count($fldArray)){

			$sql.="  ";

			}

			}

			$res=mysql_query($sql) or die(CHECK_QUERY.$sql);

			return $res;

	   }



//////////////////////////////////////End of table  Delete/////////////////////////////////////////////////////

	/*///////////////////price list////////////////////////*/

      function price($price)

    {

		$arr = array();



for($i=0;$i<strlen($price);$i++)

         {

    		$arr[$i] = substr($price,$i,1);

		 }

		$price=strlen($price);

	if($price<=3)

    	{

		echo $arr[0];

		echo $arr[1];

		echo $arr[2];

		}

		elseif($price<=4)

		{

		echo $arr[0].",";

		echo $arr[1];

		echo $arr[2];

		echo $arr[3];

		}

		elseif($price<=5)

		{

		echo $arr[0];

		echo $arr[1].",";

		echo $arr[2];

		echo $arr[3];

		echo $arr[4];

		}

		elseif($price<=6)

		{

		echo $arr[0].",";

		echo $arr[1];

		echo $arr[2].",";

		echo $arr[3];

		echo $arr[4];

		echo $arr[5];

		}

		

		echo ".00";

//return $arr();

}

function price_mail($price)

{

         $arr = array();

	 for($i=0;$i<strlen($total);$i++)

         {

    		$arr[$i] = substr($total,$i,1);

		 }

		$price=strlen($total);

		if($total<=3)

		{

		$total1=$arr[0].$arr[1].$arr[2].".00";

		}

		elseif($total<=4)

		{

		$total1=$arr[0].",".$arr[1].$arr[2].$arr[3].".00";

		}

		else

		{

		$total1=$arr[0].$arr[1].",".$arr[2].$arr[3].$arr[4].".00";

		}

		return $total1;

}

function getRandomFileName($filename) {

    		$file_array = explode(".",$filename);

			$file_ext = $file_array[count($file_array)-1];

			$new_file_name = @uniqid().date('m').date('d').date('Y').date('G').date('i').date('s').".".$file_ext;

			return $new_file_name;

		}

function imageUpload($name,$type,$FILEREPOSITORY,$tmpname)

		{

				

				

				if ($type =="image/jpeg" || $type =="image/png" || $type =="image/gif" || $type =="image/jpg" || $type =="image/pjpeg" || $type=="application/pdf")

	   								

					{

						$newName =$this->getRandomFileName($name);

						$result = move_uploaded_file($tmpname, $FILEREPOSITORY."/$newName");

						if($result==1)

						{

							return $newName;

						}

						else 

						{

							return "File size is more than 2Mb";

						}	

					}

					

					

				else 

				{

					return "Files must be uploaded in jpg,jpeg,gif,png format";

				}	

		}

/*///////////////////price list////////////////////////*/

	

	//Function For Pagination

		function pagination($query, $per_page = 10,$page = 1, $url = '?')

			{        

				$query = "SELECT COUNT(*) as `num` FROM {$query}";

				$row = mysql_fetch_array(mysql_query($query));

				$total = $row['num'];

				$adjacents = "2"; 

		

				$page = ($page == 0 ? 1 : $page);  

				$start = ($page - 1) * $per_page;								

				

				$prev = $page - 1;							

				$next = $page + 1;

				$lastpage = ceil($total/$per_page);

				$lpm1 = $lastpage - 1;

				

				$pagination = "";

				if($lastpage > 1)

				{	

					$pagination .= "<ul class='pagination'>";

							$pagination .= "<li class='details'>Page $page of $lastpage</li>";

					if ($lastpage < 7 + ($adjacents * 2))

					{	

						for ($counter = 1; $counter <= $lastpage; $counter++)

						{

							if ($counter == $page)

								$pagination.= "<li><a class='current'>$counter</a></li>";

							else

								$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					

						}

					}

					elseif($lastpage > 5 + ($adjacents * 2))

					{

						if($page < 1 + ($adjacents * 2))		

						{

							for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)

							{

								if ($counter == $page)

									$pagination.= "<li><a class='current'>$counter</a></li>";

								else

									$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					

							}

							$pagination.= "<li class='dot'>...</li>";

							$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";

							$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";		

						}

						elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))

						{

							$pagination.= "<li><a href='{$url}page=1'>1</a></li>";

							$pagination.= "<li><a href='{$url}page=2'>2</a></li>";

							$pagination.= "<li class='dot'>...</li>";

							for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)

							{

								if ($counter == $page)

									$pagination.= "<li><a class='current'>$counter</a></li>";

								else

									$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					

							}

							$pagination.= "<li class='dot'>..</li>";

							$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";

							$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";		

						}

						else

						{

							$pagination.= "<li><a href='{$url}page=1'>1</a></li>";

							$pagination.= "<li><a href='{$url}page=2'>2</a></li>";

							$pagination.= "<li class='dot'>..</li>";

							for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)

							{

								if ($counter == $page)

									$pagination.= "<li><a class='current'>$counter</a></li>";

								else

									$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					

							}

						}

					}

					

					if ($page < $counter - 1){ 

						$pagination.= "<li><a href='{$url}page=$next'>Next</a></li>";

						$pagination.= "<li><a href='{$url}page=$lastpage'>Last</a></li>";

					}else{

						$pagination.= "<li><a class='current'>Next</a></li>";

						$pagination.= "<li><a class='current'>Last</a></li>";

					}

					$pagination.= "</ul>\n";		

				}

			

			

				return $pagination;

    		}

                  

			

function pagination_front($query, $status , $per_page = 2,$page = 1, $url = '?')

			{        

				$query = "SELECT COUNT(*) as `num` FROM {$query} where $status=1";

				//echo $query;die;

				

				$row = mysql_fetch_array(mysql_query($query));

				$total = $row['num'];

				$adjacents = "1"; 

		

				$page = ($page == 0 ? 1 : $page);  

				$start = ($page - 1) * $per_page;								

				

				$prev = $page - 1;							

				$next = $page + 1;

				$lastpage = ceil($total/$per_page);

				$lpm1 = $lastpage - 1;

				

				$pagination = "";

				if($lastpage > 1)

				{	

					$pagination .= "<ul>";

							//$pagination .= "<li class='details'>Page $page of $lastpage</li>";

					if ($lastpage < 3 + ($adjacents * 2))

					{	

						for ($counter = 1; $counter <= $lastpage; $counter++)

						{

							if ($counter == $page)

								$pagination.= "<li><a class='current'>$counter</a></li>";

							else

							{}

								//$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					

						}

					}

					elseif($lastpage > 2 + ($adjacents * 2))

					{

						if($page < 1 + ($adjacents * 2))		

						{

							for ($counter = 1; $counter <3 + ($adjacents * 2); $counter++)

							{

								if ($counter == $page)

									$pagination.= "<li><a class='current'>$counter</a></li>";

								else

									$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					

							}

							if($page<=6)

							{

							}

							else

							{

							$pagination.= "<li class='dot'>..</li>";

							}

							//$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";

							$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";		

						}

						elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))

						{

							if($page==5)

							{}else{

							$pagination.= "<li><a href='{$url}page=1'>1</a></li>";}

							//$pagination.= "<li><a href='{$url}page=2'>2</a></li>";

							if($page>=3)

							{

							}

							else

							{

							$pagination.= "<li class='dot'>...</li>";

							}

							for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)

							{

								if ($counter == $page)

									$pagination.= "<li><a class='current'>$counter</a></li>";

								else

								$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					

							}

								if($page<=6)

							{

							}

							else

							{

							$pagination.= "<li class='dot'>..</li>";

							}

							$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";

							$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";		

						}

						else

						{

							$pagination.= "<li><a href='{$url}page=1'>1</a></li>";

							//$pagination.= "<li><a href='{$url}page=2'>2</a></li>";

							if($page<=6)

							{

							}

							else

							{

							$pagination.= "<li class='dot'>..</li>";

							}

							for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)

							{

								if ($counter == $page)

									$pagination.= "<li><a class='current'>$counter</a></li>";

								else

									$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					

							}

						}

					}

					

					if ($page < $counter - 1){ 

						if($page==1)

						{

							$pagination.= "<li class='next'><a href='{$url}page=$next'>Next</a></li>";

							$pagination.= "<li class='next'><a href='{$url}page=$lastpage'>Last</a></li>";

						}

						else

						{

						$pagination.= "<li class='next'><a href='{$url}page=$prev'>Prev</a></li>";

						$pagination.= "<li class='next'><a href='{$url}page=$next'>Next</a></li>";

						}

						//$pagination.= "<li class='next'><a href='{$url}page=$prev'>Prev</a></li>";

						//$pagination.= "<li class='next'><a href='{$url}page=$next'>Next</a></li>";

						//$pagination.= "<li class='next'><a href='{$url}page=$lastpage'>Last</a></li>";

					}else{

						$pagination.= "<li class='next'><a href='{$url}page=$prev'>Prev</a></li>";

						//$pagination.= "<li><a class='current_next'>Next</a></li>";

						//$pagination.= "<li><a class='current_next'>Next</a></li>";

						//$pagination.= "<li><a class='current_next'>Last</a></li>";

					}

					$pagination.= "</ul>\n";		

				}

			

			

				return $pagination;

    		}

			

			function profilepicture($uid)

			{

			$getimg=mysql_fetch_array(mysql_query("select prof_pic,sex from tbl_user where id=".$uid));

			$profileimg=$getimg['prof_pic']	;

			

			 if($profileimg=="" && $getimg['sex']=="male")

			 {

				 

				echo "<img src=\"images/male.jpg\" style=\"width: 50px; height: 50px;\/>"; 

				//echo $prof_img;die;

			 }

			 elseif($profileimg=="" && $getimg['sex']=="female")

			 {

				 echo "<img src=\"images/female.jpg\" style=\"width: 50px; height: 50px;\/>";

			 }

			 else

			 {

			 echo "<img src=\"images/user/$profileimg\" style=\"height:50px; width:50px;\" />";

			 }

			// return $prof_img;

			}

			

						function getaddress($evntid)

			{

	$a=mysql_fetch_assoc(mysql_query("select addr,city,region,country from tbl_event where event_id=$evntid"));

	$address=sprintf('%s, %s, %s, %s', $a['addr'], $a['city'], $a['region'], $a['country']);

	$prepAddr = str_replace(' ','+',$address);

	//echo $address;die;

	return $prepAddr;

		}

		function updateaddress($evntid,$lang,$lat)

		{

		 $updateaddr=mysql_query("update tbl_event set `lang`='".$lang."',`lat`='".$lat."' where event_id=".$evntid);

		 return  $updateaddr;	

		}



 function insert_geo_location($evntId)

  {

       $adr=$this->getaddress($evntId);

        $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$adr.'&sensor=false');



			$output= json_decode($geocode);

			

			$lat = $output->results[0]->geometry->location->lat;

			$long = $output->results[0]->geometry->location->lng;

			$this->updateaddress($evntId,$long,$lat);

		 

    }

	

	

	

	function paging($table,$status,$limit,$page){

            $query = "SELECT COUNT(*) as `num` FROM {$table} where $status=1";

				$row = mysql_fetch_array(mysql_query($query));

				$numRows=$row['num'];

                $allPages = ceil($numRows / $limit);

				$page=$_GET['page'];

				$next=$page+1;

				$prev=$page-1;

	/*			if($_GET['page']!=1 || isset($_GET['page']) || $_GET['page']!=$allPages)

				{

					$page=$_GET['page'];

					$next="?page=".($page+1);

			   		$prev="?page=".($page-1);

				}

				if($_GET['page']!=1 && !isset($_GET['page']))

				{

					$page=$_GET['page'];

					$next="?page=".($page+2);

			   		$prev="";

				}

				elseif($_GET['page']==1 ){

					$page="";

					$prev="";

					$next="?page=".($page+1);

					}

					elseif($_GET['page']==$allPages)

					{

						$page=$_GET['page'];

						$next="";

						$prev="?page=".($page-1);

					} */

 if($allPages>1)

 {  

 echo "<ul>";

 

     if($page==1)

	 {

		  echo "<li><a class='current'>".$page."</a></li>";

		  echo "<li><a href='?page=".$next."'>".($page+1)."</a></li>";

		  if($allPages>=3)

		  {

		  echo "<li><a href='?page=".($next+1)."'>".($page+2)."</a></li>";

		  }

		  echo "<li class='next'><a href='?page=".$next."'>Next</a></li>";

		   echo "<li class='next'><a href='?page=".$allPages."'>Last</a></li>";

	 }

	 elseif(!isset($page))

	 {

	 echo "<li><a class='current'>1</a></li>";

	 echo "<li><a href='?page=2'>2</a></li>";

	 if($allPages>=3)

		 {	

	  echo "<li><a href='?page=3'>3</a></li>";

		 }

 	 echo "<li class='next'><a href='?page=2'>Next</a></li>";

	  echo "<li class='next'><a href='?page=".$allPages."'>Last</a></li>";

	 }

	 elseif($page==$allPages)

	 {   

	 	 echo "<li class='next'><a href='?page=1'>First</a></li>";

		 if($allPages>=3)

		 {

		 echo "<li><a href='?page=".($prev-1)."'>".($page-2)."</a></li>";

		 }

	     echo "<li><a href='?page=".$prev."'>".($page-1)."</a></li>"; 

		 echo "<li><a class='current'>".$page."</a></li>"; 

		 echo "<li class='next'><a href='?page=".$prev."'>Prev</a></li>"; 

		 

	 }

	 elseif($allPages>=3)

	 {

		 echo "<li><a href='?page=".$prev."'>".($page-1)."</a></li>"; 

		 echo "<li><a class='current'>".$page."</a></li>"; 

		 echo "<li><a href='?page=".$next."'>".($page+1)."</a></li>"; 

		 echo "<li class='next'><a href='?page=".$prev."'>Prev</a></li>"; 

		 echo "<li class='next'><a href='?page=".$next."'>Next</a></li>";

		 echo "<li class='next'><a href='?page=".$allPages."'>Last</a></li>";

	 }
echo "</ul>";

 }

 }

}

?>

