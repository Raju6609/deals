<?php

/*

* Author: Debabrata Mondal

* Date: 18/01/14

*/

class sql_connect{



	



	function getconnect()



	{



		$conn=@mysql_pconnect(DBHOST,DBUSER,DBPASS) or die("Connection Error");



		@mysql_select_db(DBNAME,$conn) or die("Database Error");	



	}



}



class custom_query

{

//////INSEWRT INTO DATABASE

	function insert($table,$data)

	{

		if(trim($table)!='')

		{

			if(!empty($data))

			{

			$i=0;

			$sql="insert into ".$table ." set ";

			foreach($data as $key=>$val)

				{

					$sql.="`".$key."`='".$val."'";

					//$sql.="'".$val."'";

					$i++;

					if($i!=count($data)){

					$sql.=",";

					}

				}

				//$sql.=")";

			}

		}

		//echo $sql;die;

			return mysql_query($sql) or die($sql);

	}///end of function

	

	function select($table,$data)

	{

		if(trim($table)!='')

		{

			if(!empty($data))

			{

				if(trim($data['select'])!='')

				{

				$sql="select ".$data['select'];

				}

				else

				{

				$sql="select *";

				}

					

				$sql.=" from ".$table;

				if(isset($data['where']) && $data['where']!='')

				{

				$sql.=" where ".$data['where'];

				}

				if(isset($data['where_value']) && $data['where_value']!='')

				{

					$whr=preg_split('/[\s,]+/', $data['where_value'], 3);

					if($whr[0]=='>=' || $whr[0]=='<=' || $whr[0]=='>' || $whr[0]=='<')

					{

						$sql.=$data['where_value']; 	

					}

					else

					{

				 $sql.="='".$data['where_value']."'"; 

					}

				}

				if(isset($data['and']) && $data['and']!='')

				{

				$sql.=" and ".$data['and'];

				}

				if(isset($data['and_value']) && $data['and_value']!='')

				{

				 $sql.="='".$data['and_value']."'"; 	

				}

				if(isset($data['orderby']) && $data['orderby']!='')

				{

				$sql.=" order by ".$data['orderby'];

				}

				if(isset($data['order']) && $data['order']!='')

				{

				$sql.=" ".$data['order'];	

				}

				if(isset($data['start_limit']) && $data['start_limit']!=''){

				$sql.=" limit ".$data['start_limit'];

				}

				if(isset($data['end_limit']) && $data['end_limit']!='')

				{

				$sql.=",".$data['end_limit'];	

				}

				else

				{

				$sql.=" limit 0,20";	

				}

				//echo $sql;

				//die;

				

			}

		$qry=mysql_query($sql) or die ("Query Error!!! ".$sql);

		$mdarray = array();

		 while($row1=mysql_fetch_array($qry))

		 {

			 array_push($mdarray, $row1);

		 }

		

	

		}

		 	return $mdarray;

	}///end of function

	

	

	function num_row($table,$data)

	{

		$sql="select * from ".$table;

		if(isset($data['where']) && $data['where']!='')

		{

		$sql.=" where ".$data['where'];

		}

		if(isset($data['where_value']) && $data['where_value']!='')

		{

		 $sql.="='".$data['where_value']."'"; 	

		}

		if(isset($data['and']) && $data['and']!='')

		{

		$sql.=" and ".$data['and'];

		}

		if(isset($data['and_value']) && $data['and_value']!='')

		{

		 $sql.="='".$data['and_value']."'"; 	

		}

		//echo $sql;die;

		$qry=mysql_query($sql);

		$num=mysql_num_rows($qry);

		return $num;

	}

////////update query

	function update($table,$data,$field)

	{

		if(trim($table)!='')

		{

			if(!empty($data))

			{

				if(!empty($field))

				{

				$i=0;

				$sql="update ".$table ." set";

				foreach($data as $key=>$val)

					{

						$sql.="`".$key."`='".$val."'";

						$i++;

						if($i!=count($data)){

						$sql.=",";

						}

					}

					$sql.=" where ";

					foreach($field as $k=>$v)

					{

						$sql.="`".$k."`='".$v."'";

					}

				}

			}

		}

		//echo $sql;die;

			return mysql_query($sql) or die(error.' '.$sql);

	}///end of function

/////data delete

	function delete($table,$data)

	{

		if(trim($table)!='')

		{

			if(!empty($data))

			{

				$sql="delete from ".$table;

				if($data['where']!='')

				{

				$sql.=" where ".$data['where'];

				}

				if($data['where_value']!='')

				{

				 $sql.="='".$data['where_value']."'"; 	

				}

				if($data['and']!='')

				{

				$sql.=" and ".$data['and'];

				}

				if($data['and_value']!='')

				{

				 $sql.="='".$data['and_value']."'"; 	

				}

			}

		}

		return mysql_query($sql) or die("Mysql Error!!! ".$sql);

	}

}////end of class



////////my custom function

class myfunction extends custom_query

{

	public function  inc($page){

		 include $page.".php";

		}

	///////login

		function userlogin($user,$pass)

	{

		$sql="select * from ".USERS." where user_name='".mysql_real_escape_string($user)."' or email='".mysql_real_escape_string($user)."' and pass='".mysql_real_escape_string($pass)."' and status=1";

		//echo $sql;die;

		$query=mysql_query($sql);

		$num=mysql_num_rows($query);

		$row=mysql_fetch_assoc($query);

		  if($num>0)

		  {

			  $SessionArray=array();

			  foreach($row as $k=>$v)

			  {

				 $SessionArray[$k]=$v; 

			  }

			  $_SESSION['user']=$SessionArray;

			 // echo '<pre>';

			 // print_r($_SESSION['user']);

			  header("location:".$_SERVER['HTTP_REFERER']);

		  }

		  else

		  {

			  $_SESSION['error']="Invalid Login";

		  }

		 

	}

	/*function get_profile_picture($key)

	{

		return $_SESSION['user'][$key]; 

	}

	*/

	function loginauthentication()

	{

		if(isset($_SESSION['user']['user_id']))

		{

			header("location:./");

		}

	}

	

	function loginverification($page)

	{

		if(!isset($_SESSION['user']['user_id']))

		{

			header("location:".$page);

		}

	}

	

	function logout()

	{

		session_start();

		unset($_SESSION['user']);

		header("location:".$_SERVER['HTTP_REFERER']);

	}

////////breadcrumb

	function breadcrumb($page)

	{

		echo basename($page,'.php');	

	}

////////////status

   function status($status)

   {

	    if($status==1)

		 {

		 echo 'icon-check font-green';

		 }

		 elseif($status==0)

		 {

		 echo 'icon-exclamation font-red'; 

		 }

		 /*else

		 {

		 echo '<span class="label label-important">In active</span>';

		 }*/

   }

   function userstatus($status)

   {

	 	if($status==1)

		 {

		 echo '<div class="label bg-green">Active</div>';

		 }

		 elseif($status==0)

		 {

		 echo '<div class="label bg-red">Inactive</div>'; 

		 }  

   }

////////function http replace

	function urlreplace($url)

	{

		 $str = $url;

		 $str = preg_replace('#^https?://#', '', $str);

		 return $str;

	}

	function getTitle($Url){

    $str = file_get_contents($Url);

    if(strlen($str)>0){

        preg_match("/\<title\>(.*)\<\/title\>/",$str,$title);

        return $title[1];

    }

}

	public function template_url($val="")

		{

		 $pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";

		 if ($_SERVER["SERVER_PORT"] != "80")

		 {

		  $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];

		 }

		 else

		 {

			 if($_SERVER['HTTP_HOST']=="localhost")

			 {

				 $pageURL .= $_SERVER["SERVER_NAME"] . '/'.$val; 

			 }

			 else

			 {

				$pageURL .= $_SERVER["SERVER_NAME"] . '/'.$val; 

			 }

		  

		 }

		 return $pageURL;

		} 

		  //Function To Encode	

		function myEncode($val)

			{

				$result = (base64_encode(base64_encode($val)));

				return $result;

			}

	//Function To Decode

		function myDecode($val)

			{

				//$val.="==";

				$result = base64_decode(base64_decode($val));

				return $result;

			}

			

			function get_domain($url)

				{

				  $pieces = parse_url($url);

				  $domain = isset($pieces['host']) ? $pieces['host'] : '';

	 if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {

					return $regs['domain'];

				  }

				  return false;

				}

	/////get page title

	

	function the_title($page,$deal="")

	{

		$p=$t=basename($page);

		$t=ucfirst(basename($_SERVER['PHP_SELF'],".php"));

		$title="Hot Deals-";

		

		if($p=="topic-deal.php")

		{

			echo $title.$this->getpagetitle($deal);

		}

		elseif($p=="index.php")

		{

			echo $title."Home";

		}

		elseif($p=="profile.php")

		{

			echo $_SESSION['user']['name'];

		}

		elseif($p=="setting.php")

		{

			echo $_SESSION['user']['name']."-Setting";

		}

		elseif($p=="change-password.php")

		{

			echo $_SESSION['user']['name']."-Change-Password";

		}

		elseif($p=="private-message.php")

		{

			echo $_SESSION['user']['name']."-Private-Message";

		}

		elseif($p=="deal-details.php")

		{

			

		  $data=array(

		 'select'=>"deal_title",		

		 'where'=>"deal_slug",          

		 'where_value'=>$deal,

		 'start_limit'=>'0',	

		 'end_limit'=>'1'			

		 );

        $resulet= $this->select(DEALS,$data);

		echo  $resulet[0]['deal_title'];

		}

		elseif($p=="search.php")

		{

			echo "Search Results For-".$deal;

		}

		

		else

		{

			echo $title.$t;

		}

		

	}

	function getpagetitle($id)

	{

		  $data=array(

		 'select'=>"topic_name",		

		 'where'=>"topic_id",          

		 'where_value'=>$id,

		 'start_limit'=>'0',	

		 'end_limit'=>'1'			

		 );

        $resulet= $this->select(TOPICS,$data);

		return $resulet[0]['topic_name'];

	}

	

	function page_title()

	{

		/*if($_GET['deal']){$me->the_title($_SERVER['PHP_SELF'],$_GET['deal']);}elseif($_GET['topic']){$me->the_title($_SERVER['PHP_SELF'],$_GET['topic']);}elseif(isset($_POST['s'])){$me->the_title($_SERVER['PHP_SELF'],$_POST['s']);}else{$me->the_title($_SERVER['PHP_SELF']);}*/

		if($_GET['deal']){$this->the_title($_SERVER['PHP_SELF'],$_GET['deal']);}elseif($_GET['topic']){$this->the_title($_SERVER['PHP_SELF'],$_GET['topic']);}elseif(isset($_POST['s'])){$this->the_title($_SERVER['PHP_SELF'],$_POST['s']);}else{$this->the_title($_SERVER['PHP_SELF']);}

	}

	

	function deal_url($slug="")

	{

		return $dealurl=$this->template_url()."deal-details.php?deal=".$slug;

	}

	function deal_posted($id="")

	{

	$data=array(

	'select'=>'*',	

	'where'=>'user_id',          

	'where_value'=>$id,	

	);

	$r=$this->num_row(DEALS,$data);

	return $r;

	}

	function user_comthisnt($id="")

	{

	$data=array(

	'select'=>'*',	

	'where'=>'user_id',          

	'where_value'=>$id,	

	);

	return $this->num_row(COMMENT,$data);

	}

	function last_activity($id="")

	{

	$s=mysql_query("select * from ".ACTIVITY." where user_id='".$id."' order by activity_id desc limit 0,1");

	$r=mysql_fetch_assoc($s);

	//print_r($r);

	return $r['last_visit'];

	

	}

	function post_view($id)

	{

		if($id!="")

		{

			$qry=mysql_query("select count(view_id) as view from ".POSTVIEW." where user_id=".$id);

			$r=mysql_fetch_assoc($qry);

			return $r['view'];

		}

	}

	function user_comment($id="")

	{

	$data=array(

	'select'=>'*',	

	'where'=>'user_id',          

	'where_value'=>$id,	

	);

	return $this->num_row(COMMENT,$data);

	}

	 function pager($table,$limit,$page){

//echo "Here";die;

            $query = "SELECT COUNT(*) as `num` FROM {$table}";



				$row = mysql_fetch_array(mysql_query($query));



				$numRows=$row['num'];



                $allPages = ceil($numRows / $limit);



				$page1=$_GET['page'];



				$next=$page+1;



				$prev=$page-1;



 if($allPages>1)

 {  

 echo "<div class=\"pagination\"><ul class=\"pager\">";

     if($page==1)

	 {

		  echo "<li><a class='selected'>".$page."</a></li>";

		  echo "<li><a href='?page=".$next."'>".($page+1)."</a></li>";

		  if($allPages>=3)

		  {

		  echo "<li><a href='?page=".($next+1)."'>".($page+2)."</a></li>";

		  }

		  echo "<li class='next'><a href='?page=".$next."'>&gt;</a></li>";

		   echo "<li class='next'><a href='?page=".$allPages."'>&gt;&gt;</a></li>";

	 }

	 elseif(!isset($page))

	 {

	 echo "<li><a class='selected'>1</a></li>";

	 echo "<li><a href='?page=2'>2</a></li>";

	 if($allPages>=3)

		 {	

	  echo "<li><a href='?page=3'>3</a></li>";

		 }

 	 echo "<li class='next'><a href='?page=2'>&gt;</a></li>";								

	  echo "<li class='next'><a href='?page=".$allPages."'>&gt;&gt;</a></li>";

	 }

	 elseif($page==$allPages)

	 {   

	 	 echo "<li class='next'><a href='?page=1'>&lt;&lt;</a></li>";

		 echo "<li class='next'><a href='?page=".$prev."'>&lt;</a></li>";

		 if($allPages>=3)

		 {

		 echo "<li><a href='?page=".($prev-1)."'>".($page-2)."</a></li>";

		 }

	     echo "<li><a href='?page=".$prev."'>".($page-1)."</a></li>"; 

		 echo "<li><a class='selected'>".$page."</a></li>"; 

		  

	 }

	 elseif($allPages>=3)

	 {

		 echo "<li class='next'><a href='?page=1'>&lt;&lt;</a></li>";

		 echo "<li class='next'><a href='?page=".$prev."'>&lt;</a></li>"; 

		 echo "<li><a href='?page=".$prev."'>".($page-1)."</a></li>"; 

		 echo "<li><a class='selected'>".$page."</a></li>"; 

		 echo "<li><a href='?page=".$next."'>".($page+1)."</a></li>"; 

		 echo "<li class='next'><a href='?page=".$next."'>&gt;</a></li>";

		 echo "<li class='next'><a href='?page=".$allPages."'>&gt;&gt;</a></li>";

	 }

echo "</ul></div>";



 }



 }

 

 function pager_hot($table,$limit,$page){

//

            $query = "SELECT COUNT(*) as `num` FROM {$table} where deal_hot_count>=1";

//echo $query;die;

				$row = mysql_fetch_array(mysql_query($query));



				$numRows=$row['num'];



                $allPages = ceil($numRows / $limit);



				$page1=$_GET['page'];



				$next=$page+1;



				$prev=$page-1;



 if($allPages>1)

 {  

 echo "<div class=\"pagination\"><ul class=\"pager\">";

     if($page==1)

	 {

		  echo "<li><a class='selected'>".$page."</a></li>";

		  echo "<li><a href='?page=".$next."#tabs-2'>".($page+1)."</a></li>";

		  if($allPages>=3)

		  {

		  echo "<li><a href='?page=".($next+1)."#tabs-2'>".($page+2)."</a></li>";

		  }

		  echo "<li class='next'><a href='?page=".$next."#tabs-2'>&gt;</a></li>";

		   echo "<li class='next'><a href='?page=".$allPages."#tabs-2'>&gt;&gt;</a></li>";

	 }

	 elseif(!isset($page))

	 {

	 echo "<li><a class='selected'>1</a></li>";

	 echo "<li><a href='?page=2#tabs-2'>2</a></li>";

	 if($allPages>=3)

		 {	

	  echo "<li><a href='?page=3#tabs-2'>3</a></li>";

		 }

 	 echo "<li class='next'><a href='?page=2#tabs-2'>&gt;</a></li>";								

	  echo "<li class='next'><a href='?page=".$allPages."#tabs-2'>&gt;&gt;</a></li>";

	 }

	 elseif($page==$allPages)

	 {   

	 	 echo "<li class='next'><a href='?page=1#tabs-2'>&lt;&lt;</a></li>";

		 echo "<li class='next'><a href='?page=".$prev."#tabs-2'>&lt;</a></li>";

		 if($allPages>=3)

		 {

		 echo "<li><a href='?page=".($prev-1)."#tabs-2'>".($page-2)."</a></li>";

		 }

	     echo "<li><a href='?page=".$prev."#tabs-2'>".($page-1)."</a></li>"; 

		 echo "<li><a class='selected'>".$page."</a></li>"; 

		  

	 }

	 elseif($allPages>=3)

	 {

		 echo "<li class='next'><a href='?page=1#tabs-2'>&lt;&lt;</a></li>";

		 echo "<li class='next'><a href='?page=".$prev."#tabs-2'>&lt;</a></li>"; 

		 echo "<li><a href='?page=".$prev."#tabs-2'>".($page-1)."</a></li>"; 

		 echo "<li><a class='selected'>".$page."</a></li>"; 

		 echo "<li><a href='?page=".$next."#tabs-2'>".($page+1)."</a></li>"; 

		 echo "<li class='next'><a href='?page=".$next."#tabs-2'>&gt;</a></li>";

		 echo "<li class='next'><a href='?page=".$allPages."#tabs-2'>&gt;&gt;</a></li>";

	 }

echo "</ul></div>";



 }



 }

 function pager_topic($table,$limit,$page,$topic,$m){

//

            $query = "SELECT COUNT(*) as `num` FROM {$table} where deal_topic=".$topic;

//echo $query;die;

				$row = mysql_fetch_array(mysql_query($query));



				$numRows=$row['num'];



                $allPages = ceil($numRows / $limit);



				$page1=$_GET['page'];



				$next=$page+1;



				$prev=$page-1;



 if($allPages>1)

 {  

 echo "<div class=\"pagination\"><ul class=\"pager\">";

     if($page==1)

	 {

		  echo "<li><a class='selected'>".$page."</a></li>";

		  echo "<li><a href='?page=".$next."&topic=".$topic."&m=".$m."'>".($page+1)."</a></li>";

		  if($allPages>=3)

		  {

		  echo "<li><a href='?page=".($next+1)."&topic=".$topic."&m=".$m."'>".($page+2)."</a></li>";

		  }

		  echo "<li class='next'><a href='?page=".$next."&topic=".$topic."&m=".$m."'>&gt;</a></li>";

		   echo "<li class='next'><a href='?page=".$allPages."&topic=".$topic."&m=".$m."'>&gt;&gt;</a></li>";

	 }

	 elseif(!isset($page))

	 {

	 echo "<li><a class='selected'>1</a></li>";

	 echo "<li><a href='?page=2&topic=".$topic."&m=".$m."'>2</a></li>";

	 if($allPages>=3)

		 {	

	  echo "<li><a href='?page=3&topic=".$topic."&m=".$m."'>3</a></li>";

		 }

 	 echo "<li class='next'><a href='?page=2&topic=".$topic."&m=".$m."'>&gt;</a></li>";								

	  echo "<li class='next'><a href='?page=".$allPages."&topic=".$topic."&m=".$m."'>&gt;&gt;</a></li>";

	 }

	 elseif($page==$allPages)

	 {   

	 	 echo "<li class='next'><a href='?page=1&topic=".$topic."&m=".$m."'>&lt;&lt;</a></li>";

		 echo "<li class='next'><a href='?page=".$prev."&topic=".$topic."&m=".$m."'>&lt;</a></li>";

		 if($allPages>=3)

		 {

		 echo "<li><a href='?page=".($prev-1)."&topic=".$topic."&m=".$m."'>".($page-2)."</a></li>";

		 }

	     echo "<li><a href='?page=".$prev."&topic=".$topic."&m=".$m."'>".($page-1)."</a></li>"; 

		 echo "<li><a class='selected'>".$page."</a></li>"; 

		  

	 }

	 elseif($allPages>=3)

	 {

		 echo "<li class='next'><a href='?page=1&topic=".$topic."&m=".$m."'>&lt;&lt;</a></li>";

		 echo "<li class='next'><a href='?page=".$prev."&topic=".$topic."&m=".$m."'>&lt;</a></li>"; 

		 echo "<li><a href='?page=".$prev."&topic=".$topic."&m=".$m."'>".($page-1)."</a></li>"; 

		 echo "<li><a class='selected'>".$page."</a></li>"; 

		 echo "<li><a href='?page=".$next."&topic=".$topic."&m=".$m."'>".($page+1)."</a></li>"; 

		 echo "<li class='next'><a href='?page=".$next."&topic=".$topic."&m=".$m."'>&gt;</a></li>";

		 echo "<li class='next'><a href='?page=".$allPages."&topic=".$topic."&m=".$m."'>&gt;&gt;</a></li>";

	 }

echo "</ul></div>";



 }



 }

  function pager_topic_hot($table,$limit,$page,$topic,$m){

//

            $query = "SELECT COUNT(*) as `num` FROM {$table} where deal_topic=".$topic." and deal_hot_count>=1";

//echo $query;die;

				$row = mysql_fetch_array(mysql_query($query));



				$numRows=$row['num'];



                $allPages = ceil($numRows / $limit);



				$page1=$_GET['page'];



				$next=$page+1;



				$prev=$page-1;



 if($allPages>1)

 {  

 echo "<div class=\"pagination\"><ul class=\"pager\">";

     if($page==1)

	 {

		  echo "<li><a class='selected'>".$page."</a></li>";

		  echo "<li><a href='?page=".$next."&topic=".$topic."&m=".$m."#tabs-2'>".($page+1)."</a></li>";

		  if($allPages>=3)

		  {

		  echo "<li><a href='?page=".($next+1)."&topic=".$topic."&m=".$m."#tabs-2'>".($page+2)."</a></li>";

		  }

		  echo "<li class='next'><a href='?page=".$next."&topic=".$topic."&m=".$m."#tabs-2'>&gt;</a></li>";

		   echo "<li class='next'><a href='?page=".$allPages."&topic=".$topic."&m=".$m."#tabs-2'>&gt;&gt;</a></li>";

	 }

	 elseif(!isset($page))

	 {

	 echo "<li><a class='selected'>1</a></li>";

	 echo "<li><a href='?page=2&topic=".$topic."&m=".$m."#tabs-2'>2</a></li>";

	 if($allPages>=3)

		 {	

	  echo "<li><a href='?page=3&topic=".$topic."&m=".$m."#tabs-2'>3</a></li>";

		 }

 	 echo "<li class='next'><a href='?page=2&topic=".$topic."&m=".$m."#tabs-2'>&gt;</a></li>";								

	  echo "<li class='next'><a href='?page=".$allPages."&topic=".$topic."&m=".$m."#tabs-2'>&gt;&gt;</a></li>";

	 }

	 elseif($page==$allPages)

	 {   

	 	 echo "<li class='next'><a href='?page=1&topic=".$topic."&m=".$m."#tabs-2'>&lt;&lt;</a></li>";

		 echo "<li class='next'><a href='?page=".$prev."&topic=".$topic."&m=".$m."#tabs-2'>&lt;</a></li>";

		 if($allPages>=3)

		 {

		 echo "<li><a href='?page=".($prev-1)."&topic=".$topic."&m=".$m."#tabs-2'>".($page-2)."</a></li>";

		 }

	     echo "<li><a href='?page=".$prev."&topic=".$topic."&m=".$m."#tabs-2'>".($page-1)."</a></li>"; 

		 echo "<li><a class='selected'>".$page."</a></li>"; 

		  

	 }

	 elseif($allPages>=3)

	 {

		 echo "<li class='next'><a href='?page=1&topic=".$topic."&m=".$m."#tabs-2'>&lt;&lt;</a></li>";

		 echo "<li class='next'><a href='?page=".$prev."&topic=".$topic."&m=".$m."#tabs-2'>&lt;</a></li>"; 

		 echo "<li><a href='?page=".$prev."&topic=".$topic."&m=".$m."#tabs-2'>".($page-1)."</a></li>"; 

		 echo "<li><a class='selected'>".$page."</a></li>"; 

		 echo "<li><a href='?page=".$next."&topic=".$topic."&m=".$m."#tabs-2'>".($page+1)."</a></li>"; 

		 echo "<li class='next'><a href='?page=".$next."&topic=".$topic."&m=".$m."#tabs-2'>&gt;</a></li>";

		 echo "<li class='next'><a href='?page=".$allPages."&topic=".$topic."&m=".$m."#tabs-2'>&gt;&gt;</a></li>";

	 }

echo "</ul></div>";



 }



 }

 

 /////////////////  Mailer

 

 function mailer($to,$from,$subject,$message)

{

	 $headers  = 'MIME-Version: 1.0' . "\r\n";

	 $headers .= 'From: Hot Deals '.$from.'' . "\r\n" ."Content-type: text/html;".

    'Reply-To: '.$from.'"' . "\r\n" .'Return-Path: '.$from.'' . "\r\n" .

    'X-Mailer: PHP/' . phpversion();

	 $headers .= "X-Priority: 2\nX-MSmail-Priority: high";

     $headers .= "From:".$from;



	if(mail($to,$subject,$message,$headers))

	{

		return TRUE;

	}

	else

	{

		return FALSE;

	}

}





function fbooklog(){

	require 'facebook.php';

	$facebook = new Facebook(array(

  'appId'  => '613331932053999',

  'secret' => '67ca1bf4c03ee0481ed13099676141de',

));

$user = $facebook->getUser();

if ($user) {

  try {

    // Proceed knowing you have a logged in user who's authenticated.

    $user_profile = $facebook->api('/me');

	

  } catch (FacebookApiException $e) {

    error_log($e);

    $user = null;

  }

}

$deal_user = $facebook->api('/me');

if ($user) {

	// $logoutUrl;

/*	echo "<pre>";

print_r($deal_user);

echo "</pre>";die;*/

	$here = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

	$next = preg_replace('~#.*$~s', '', $here);

	$next = preg_replace('~\?.*$~s', '', $next);

	$next = preg_replace('~/[^/]*$~s', '/logout.php', $next);

    $logoutUrl = $facebook->getLogoutUrl(array('next' => $next));

    $facebook_user=mysql_query("select * from ".USERS." where user_name='".$deal_user['username']."'");

   // echo $facebook_user;die;

   $location=$deal_user['location']['name'];

   //echo $facebook_user;die;

   $pic_url="https://graph.facebook.com/".$user."/picture?type=large";

   //$n=mysql_num_rows($facebook_user);

  // echo $n;die;

    if(mysql_num_rows($facebook_user)==0)

	{

		

	mysql_query("insert into ".USERS." set name='".$deal_user['name']."',user_name='".$deal_user['username']."',email='".$deal_user['username']."',profile_picture='".$user."',profile_picture_url='".$pic_url."',joindate=NOW()");

	

			$s=mysql_query("select * from ".USERS." where user_id=".mysql_insert_id());

			//echo $s;die;

			$resulet=mysql_fetch_assoc($s);

			//print_r($resulet);

			 $SessionArray=array();

			  foreach($resulet as $k=>$v)

			  {

				 $SessionArray[$k]=$v; 

			  }



			  $_SESSION['user']=$SessionArray;

				header("location:./");

		//$_SESSION['user']['user_id']=



	}

	else

	{

		$u=mysql_query("update ".USERS." set set name='".$deal_user['name']."',user_name='".$deal_user['username']."',profile_picture='".$user."',profile_picture_url='".$pic_url."',joindate=NOW() where email='".$deal_user['username']."'");

		//echo $u;die;

		$resulet=mysql_fetch_assoc(mysql_query("select * from ".USERS." where email='".$deal_user['username']."'"));

		$SessionArray=array();



			  foreach($resulet as $k=>$v)



			  {

				 $SessionArray[$k]=$v; 

			  }



			  $_SESSION['user']=$SessionArray;

			  header("location:./");



	}

	

  

} else {

		$here = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

	$next = preg_replace('~#.*$~s', '', $here);

	$next = preg_replace('~\?.*$~s', '', $next);

	$next = preg_replace('~/[^/]*$~s', '/index.php', $next);

	//global $statusUrl;

	//global $loginUrl;

  $statusUrl = $facebook->getLoginStatusUrl();

  $loginUrl = $facebook->getLoginUrl(array('next' => $next));

}

return $loginUrl;

}



}



class allcontents 

{

		function head(){

		$me= new myfunction;

		 include('head.php');

		}

		function get_header(){

		$me= new myfunction;

		$con=new sql_connect;

		//$con->getconnect();

		//$this->inc('header');

		

		include('header.php');

		

	   

		}

		function get_latest_hot_deals(){

			$me= new myfunction;

			//$me->inc('latest-hot-deals');

			include('latest-hot-deals.php');

		}

		function get_main_content(){

			$me= new myfunction;

			include('content-home.php');

		}

		function sidebar(){

			$me= new myfunction;

			include ('sidebar.php');

		}

		function get_footer(){

			$me= new myfunction;

			include ('footer.php');

		}

		function dealshare(){

			$me= new myfunction;

			include ('content-share-deal.php');

		}

		function dealdetails(){

			$me= new myfunction;

			include ('content-details.php');

		}

		function getlogin(){

			$me= new myfunction;

			include ('content-login.php');

		}

		function topiccontent(){

			$me= new myfunction;

			include('content-topic.php');

		}

		function profilecontent(){

			$me= new myfunction;

			include('content-profile.php');

		}

		function profilesetting(){

			$me= new myfunction;

			include('content-setting.php');

		}

			function profilepassword(){

			$me= new myfunction;

			include('content-password.php');

		}

			function profilemessage(){

			$me= new myfunction;

			include('content-message.php');

		}

			function userleftbar(){

			$me= new myfunction;

			include('userleftbar.php');

		}

			function userdescription(){

			$me= new myfunction;

			include('desc.php');

		}

		function getcontect(){

			$me= new myfunction;

			include('content-contact.php');

		}

			function getabout(){

			$me= new myfunction;

			include('content-about.php');

		}

			function getprivacy(){

			$me= new myfunction;

			include('content-privacy.php');

		}
			function gethelp(){

			$me= new myfunction;

			include('content-help.php');

		}

			function getsearch(){

			$me= new myfunction;

			include('content-search.php');

		}

		

		

		

		

}



	

?>