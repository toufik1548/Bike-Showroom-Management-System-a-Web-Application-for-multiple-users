
<?php
//mobile number validation
function mobile_validation($mobile_number) {
    $mobile_number = str_replace('+88', '', $mobile_number);
    $mobile_number = preg_replace('/^\+?0088|\|1|\D/', '', $mobile_number);
    $mobile_number = preg_replace('/[^0-9]/', '', $mobile_number);
    
    return $mobile_number;

}

function dv_slug($string) {
	$string = str_replace('&','and',$string); // Replace & to and
	$string = str_replace('+','plus',$string); //Replace + to plus
	$string = str_replace('.', '-', $string); // Replaces all spaces with hyphens.
	$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	$string=preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
	$string=strtolower($string);
	return $string;
}

/************* SLUG *******************/
function slug($string)
{
	$string = str_replace('&','and',$string); // Replace & to and
	$string = str_replace('+','plus',$string); //Replace + to plus
	$string = str_replace('.', '-', $string); // Replaces all spaces with hyphens.
	$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	$string=preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
	$string=strtolower($string);
	return $string;
}



// function get_info($table,$info,$condition) {
// 		global $con;

// 		$q	=	mysqli_query($con,"SELECT $info FROM $table $condition");
// 		$r	=	mysqli_fetch_array($q);
// 		$result = stripslashes($r[0]);
// 		return $result;
// 	}



function get_info($table,$info,$condition) {
		global $con;

		$q		=	mysqli_query($con,"SELECT $info FROM $table $condition");
		$r		=	mysqli_fetch_array($q);
		$result = 	isset($r[0]) ? stripslashes($r[0]) : null;
		return $result;
	}


function get_number($number){
$target 		= 	array (",", " ");
$replace_by 	= 	array ("","");
$new_number		=	str_replace($target, $replace_by, $number);
return $new_number;
}
	

function get_photo($photo_path,$photo_name,$max_width,$max_height){

$source_photo	=	$photo_path."/".$photo_name;

//checking photo availability
	if(is_file("$source_photo")){$photo = $source_photo;}
	else { $photo = $photo_path."/noimage.png";}


//resize photo
	$max_width_big = $max_width;
	$max_height_big = $max_height;

list($width,$height)=getimagesize($source_photo);
	$x_ratio = $max_width_big / $width;
	$y_ratio = $max_height_big / $height;

	if( ($width <= $max_width_big) && ($height <= $max_height_big) ){
		$tn_width_big = $width;
		$tn_height_big = $height;
		}elseif (($x_ratio * $height) < $max_height_big){
			$tn_height_big = ceil($x_ratio * $height);
			$tn_width_big = $max_width_big;
		}else{
			$tn_width_big = ceil($y_ratio * $width);
			$tn_height_big = $max_height_big;
	}

$photo	=	"src='".$photo."' width=".$tn_width_big." height=".$tn_height_big;
return $photo;
}//end function get_photo()
	
	
	
	
	
	
	
function get_used_bike_status($id){
/*
0 =	Inactive
1 =	Active
2 =	Sold
3 =	Deleted
*/
if($id==0){$status="Inactive";}
elseif($id==1){$status="Active";}
elseif($id==2){$status="Sold";}
elseif($id==3){$status="Deleted";}

return $status;
}

function get_total($table, $field,$condition){
global $con;

$q	=	mysqli_query($con,"SELECT $field FROM $table $condition");
$n	=	mysqli_num_rows($q);
return $n;
}

function get_sum($table, $field,$condition){
global $con;

$q	=	mysqli_query($con,"SELECT sum($field) AS total FROM $table $condition");
$r	=	mysqli_fetch_array($q);
$total=$r['total'];
return $total;
}

function get_admin_user_info($info,$user_id)
	{
	global $con;

	$q	=	mysqli_query($con,"SELECT $info FROM admin_users WHERE user_id=$user_id");
	$r	=	mysqli_fetch_array($q);
	$result	=	$r[0];
	return $result;
	}



function get_adminuser_type($info,$type_id)
	{
		global $con;

	$q	=	mysqli_query($con,"SELECT $info FROM admin_users_type WHERE type_id=$type_id");
	$r	=	mysqli_fetch_array($q);
	$result	=	$r[0];
	return $result;
	}

function get_adminusertype_lists($type_id)
	{
		global $con;

	echo "<select name='type_id'>";
	echo "<option value=0>Select Type</option>";
	$q		=	mysqli_query($con,"SELECT type_id,type_title FROM admin_users_type");
	while($r=mysqli_fetch_array($q))
		{

		echo "<option value='".$r['type_id']."'";
		if($type_id==$r['type_id']){echo "selected";}
		echo ">";
		echo $r['type_title'];
		echo "</option>";
		}
	echo "</select>";
	}


/*---------------------------------------------*/
/************************************************	
/*			   User Related					/***
/************************************************			
/*---------------------------------------------*/

function get_user_info($info,$id)
	{
		global $con;

		$q			=	mysqli_query($con,"SELECT $info FROM cms_users WHERE user_id = $id") or die("<div class=err_msg>Error: 101</div>");
		$r			=	mysqli_fetch_array($q);
		$result		=	$r[0];
		return $result;
	}

/*---------------------------------------------*/
/************************************************	
/*			   Bike Related					/***
/************************************************			
/*---------------------------------------------*/	
function get_brand_info($info,$brand)
	{
		global $con;

		$q			=	mysqli_query($con,"SELECT $info FROM bike_brand WHERE brand_id = $brand") or die("<div class=err_msg>Error: 101</div>");
		$r			=	mysqli_fetch_array($q);
		$result		=	$r[0];
		return $result;
	}
function get_category_info($info,$category)
	{
		global $con;

		$q			=	mysqli_query($con,"SELECT $info FROM bike_category WHERE category_id = $category") or die("<div class=err_msg>Error: 101</div>");
		$r			=	mysqli_fetch_array($q);
		$result		=	$r[0];
		return $result;
	}
	
function get_bike_info($info,$bike)
	{
		global $con;

		$q			=	mysqli_query($con,"SELECT $info FROM bike_info WHERE bike_id = $bike") or die("<div class=err_msg>Error: 101</div>");
		$r			=	mysqli_fetch_array($q);
		$result		=	$r[0];
		return $result;
	}

function get_bike_info_used($info,$bike)
	{
		global $con;

		$q			=	mysqli_query($con,"SELECT $info FROM bike_info_used WHERE bike_id = $bike") or die("<div class=err_msg>Error: 101</div>");
		$r			=	mysqli_fetch_array($q);
		$result		=	$r[0];
		return $result;
	}
	
function get_bike_photo($id)
	{
		global $con;

		$q			=	mysqli_query($con,"SELECT photo_name FROM bike_photo WHERE bike_id  = $id ORDER BY photo_id ASC LIMIT 0,1");
		$r			=	mysqli_fetch_array($q);
		$result		=	$r[0];
		return $result;
	}

function get_bike_photo_used($id)
	{
		global $con;

		$q			=	mysqli_query($con,"SELECT photo_name FROM bike_photo_used WHERE bike_id  = $id ORDER BY photo_id DESC LIMIT 0,1") or die("<div class=err_msg>Error: 101</div>");
		$r			=	mysqli_fetch_array($q);
		$result		=	$r[0];
		return $result;
	}
	
function bike_last_photo($id)
	{
		global $con;

		$q			=	mysqli_query($con,"SELECT photo_name FROM bike_photo WHERE bike_id  = $id ORDER BY photo_id DESC LIMIT 0,1") or die("<div class=err_msg>Error: 101</div>");
		$r			=	mysqli_fetch_array($q);
		$result		=	$r[0];
		return $result;
	}

function bike_last_photo_used($id)
	{
		global $con;

		$q			=	mysqli_query($con,"SELECT photo_name FROM bike_photo_used WHERE bike_id  = $id ORDER BY photo_id DESC LIMIT 0,1") or die("<div class=err_msg>Error: 101</div>");
		$r			=	mysqli_fetch_array($q);
		$result		=	$r[0];
		return $result;
	}
	
function bike_photo($id)
	{
		global $con;

		$q			=	mysqli_query($con,"SELECT photo_name FROM bike_photo WHERE photo_id  = $id ORDER BY photo_id DESC LIMIT 0,1") or die("<div class=err_msg>Error: 101</div>");
		$r			=	mysqli_fetch_array($q);
		$result		=	$r[0];
		return $result;
	}

function bike_photo_used($id)
	{
		global $con;

		$q			=	mysqli_query($con,"SELECT photo_name FROM bike_photo_used WHERE photo_id  = $id ORDER BY photo_id DESC LIMIT 0,1") or die("<div class=err_msg>Error: 101</div>");
		$r			=	mysqli_fetch_array($q);
		$result		=	$r[0];
		return $result;
	}	
	
function select_location($location_id){
	global $con;

echo "<select name='location_id'>";
echo "<option value=0>Select Location</option>";
$q=mysqli_query($con,"SELECT * FROM bike_location WHERE status=1 ORDER BY location_name ASC");
while($r=mysqli_fetch_array($q)){
echo "<option value=".$r['location_id'];
if($r['location_id']==$location_id){echo " selected";}
echo ">".$r['location_name']."</option>";
}
echo "</select>";
}
	

function select_brand($brand_id){
	global $con;

echo "<select name='brand_id'>";
echo "<option value=0>Select Brand/Manufacturer</option>";
$q=mysqli_query($con,"SELECT * FROM bike_brand WHERE status=1 ORDER BY brand_name ASC");
while($r=mysqli_fetch_array($q)){
echo "<option value=".$r['brand_id'];
if($r['brand_id']==$brand_id){echo " selected";}
echo ">".$r['brand_name']."</option>";
}
echo "</select>";
}



	
	
	
/*---------------------------------------------*/
/************************************************	
/*	   Bangladeshi Time From Servar			 /***
/************************************************			
/*---------------------------------------------*/
	
function get_usa2bd_date($server_date)
		{
		//First : Convert the server date to time
			$my_time 	= 	strtotime($server_date);
		//USA-BD Time Diff=12 Hours (12*60*60) Sec
			$diff_time	=	11*60*60;
			$bd_time	=	$my_time+$diff_time;
			$bd_date	=	date("Y-m-d H:i:s",$bd_time);
		return $bd_date;
		}
/*---------------------------------------------*/
/************************************************	
/*	 		English Date With Time		     /***
/************************************************			
/*---------------------------------------------*/		
function en_datetime($date_server)
	{
		$date	=	get_usa2bd_date($date_server);
		$year=substr($date,0,4);
		$month=substr($date,5,2);
		$day=substr($date,8,2);
		$time_hour=substr($date,10,3);
		$time_min=substr($date,14,2);
		$time_sec=substr($date,16,2);

	
		if($time_hour >= 00 && $time_hour<=05 )
				{
				$time = "Midnight";
				}
			elseif($time_hour >= 05 && $time_hour<=11)
				{
				$time = "Morning";
				}
			elseif($time_hour >= 12 && $time_hour <= 15)
				{
				$time = "Afternoon";
				}
			elseif($time_hour >= 15 && $time_hour <= 17)
				{
				$time = "Afternoon";
				}
			elseif($time_hour >= 17 && $time_hour <= 19)
				{
				$time = "Evening";
				}
		   elseif($time_hour >= 19 && $time_hour <= 23)
				{
				$time = "Night";
				}		
			if($time_hour==00)
				{
				$time_hour=12;
				}	
	
			$braces = 	array ("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
			$reps 	= 	array("0","1","2","3","4","5","6","7","8","9");
			$braces2 = 	array ("13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23");
			$reps2 	= 	array("1","2","3","4","5","6","7","8","9","10","11");
			$braces1 = 	array ( "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
			$reps1 	= 	array("January","February","March","April","May","June","July","August","September","October","November","December");

			$bangla_year			=	str_replace($braces, $reps, $year);
			$bangla_month			=	str_replace($braces1, $reps1, $month);
			$bangla_day				=	str_replace($braces, $reps, $day);
			$t_hour					=	str_replace($braces2, $reps2, $time_hour);
			$bangla_time_hour		=	str_replace($braces, $reps, $t_hour);
			$bangla_time_min		=	str_replace($braces, $reps, $time_min);
			$bangla_time_sec		=	str_replace($braces, $reps, $time_sec);
	
			$en_date=$bangla_day." ".$bangla_month." ".$bangla_year.",   ".$time." ".$bangla_time_hour.":".$bangla_time_min;
	return $en_date;
	}
function en_date($date_server)
	{
		$date	=	get_usa2bd_date($date_server);
		$year=substr($date,0,4);
		$month=substr($date,5,2);
		$day=substr($date,8,2);
		$time_hour=substr($date,10,3);
		$time_min=substr($date,14,2);
		$time_sec=substr($date,16,2);

	
		if($time_hour >= 00 && $time_hour<=05 )
				{
				$time = "Midnight";
				}
			elseif($time_hour >= 05 && $time_hour<=11)
				{
				$time = "Morning";
				}
			elseif($time_hour >= 12 && $time_hour <= 15)
				{
				$time = "Afternoon";
				}
			elseif($time_hour >= 15 && $time_hour <= 17)
				{
				$time = "Afternoon";
				}
			elseif($time_hour >= 17 && $time_hour <= 19)
				{
				$time = "Evening";
				}
		   elseif($time_hour >= 19 && $time_hour <= 23)
				{
				$time = "Night";
				}		
			if($time_hour==00)
				{
				$time_hour=12;
				}	
	
			$braces = 	array ("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
			$reps 	= 	array("0","1","2","3","4","5","6","7","8","9");
			$braces2 = 	array ("13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23");
			$reps2 	= 	array("1","2","3","4","5","6","7","8","9","10","11");
			$braces1 = 	array ( "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
			$reps1 	= 	array("January","February","March","April","May","June","July","August","September","October","November","December");

			$bangla_year			=	str_replace($braces, $reps, $year);
			$bangla_month			=	str_replace($braces1, $reps1, $month);
			$bangla_day				=	str_replace($braces, $reps, $day);
			$t_hour					=	str_replace($braces2, $reps2, $time_hour);
			$bangla_time_hour		=	str_replace($braces, $reps, $t_hour);
			$bangla_time_min		=	str_replace($braces, $reps, $time_min);
			$bangla_time_sec		=	str_replace($braces, $reps, $time_sec);
	
			$en_date=$bangla_day." ".$bangla_month." ".$bangla_year;
	return $en_date;
	}


/*---------------------------------------------*/
/************************************************	
/*				English2Bangla				/***
/************************************************			
/*---------------------------------------------*/
function changeToBanglaNumber($string)
	{
		$a = array('&#2534;','&#2535;','&#2536;','&#2537;','&#2538;','&#2539;','&#2540;','&#2541;','&#2542;','&#2543;');
		for($i = 0; $i < strlen($string); $i++)
		{
			 $get_num = $a[substr($string,$i,1)];
		}
	return $get_num;
	}

/*---------------------------------------------*/
/************************************************	
/*				Bangla Date 				/***
/************************************************			
/*---------------------------------------------*/

/*
function bangla_date($date)
	{
		$year=substr($date,0,4);
		$month=substr($date,5,2);
		$day=substr($date,8,2);
		$braces = 	array ("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
		$reps 	= 	array("০","১","২","৩","৪","৫","৬","৭","৮","৯");
		$bangla_year	=	str_replace($braces, $reps, $year);
		$bangla_month	=	str_replace($braces, $reps, $month);
		$bangla_day		=	str_replace($braces, $reps, $day);
		$bangla_date=$bangla_day."-".$bangla_month."-".$bangla_year;
	return $bangla_date;
	}
*/	
function bangla_number($number)
	{
		$braces = 	array ("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
		$reps 	= 	array("০","১","২","৩","৪","৫","৬","৭","৮","৯");
		$bangla_number	=	str_replace($braces, $reps, $number);
		return $bangla_number;
	}
/*---------------------------------------------*/
/************************************************	
/*				Bangla Day  				/***
/************************************************			
/*---------------------------------------------*/
	
function bangladay($number)
	{
		$braces = 	array ("Sat", "Sun", "Mon", "Tue", "Wed", "Thu", "Fri");
		$reps 	= 	array("শনিবার","রবিবার","সোমবার","মঙ্গলবার","বুধবার","বৃহসপতিবার","শুক্রবার");
		$bangla_number	=	str_replace($braces, $reps, $number);
	return $bangla_number;
	}

/*---------------------------------------------*/
/************************************************	
/*				Bangla Month				/***
/************************************************			
/*---------------------------------------------*/	
function banglamonth($number)
	{
		$braces = 	array ("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov","Dec");
		$reps 	= 	array("জানুয়ারী","ফেব্রুয়ারি","মার্চ","এপ্রিল","মে","জুন","জুলাই","আগস্ট","সেপ্টেম্বর","অক্টোবর","নভেম্বর","ডিসেম্বর");
		$banglamonth	=	str_replace($braces, $reps, $number);
	return $banglamonth;
	}
	
			
	
/*---------------------------------------------*/
/************************************************	
/*			Bangla Date With Time		     /***
/************************************************			
/*---------------------------------------------*/		
function bd_datetime($date_server)
	{
		$date	=	get_usa2bd_date($date_server);
		$year=substr($date,0,4);
		$month=substr($date,5,2);
		$day=substr($date,8,2);
		$time_hour=substr($date,10,3);
		$time_min=substr($date,14,2);
		$time_sec=substr($date,16,2);

	
		if($time_hour >= 00 && $time_hour<=05 )
				{
				$time = "মধ্যরাত";
				}
			elseif($time_hour >= 05 && $time_hour<=11)
				{
				$time = "সকাল";
				}
			elseif($time_hour >= 12 && $time_hour <= 15)
				{
				$time = "দুপুর";
				}
			elseif($time_hour >= 15 && $time_hour <= 17)
				{
				$time = "বিকেল";
				}
			elseif($time_hour >= 17 && $time_hour <= 19)
				{
				$time = "সন্ধ্যা";
				}
		   elseif($time_hour >= 19 && $time_hour <= 23)
				{
				$time = "রাত";
				}		
			if($time_hour==00)
				{
				$time_hour=12;
				}	
	
			$braces = 	array ("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
			$reps 	= 	array("০","১","২","৩","৪","৫","৬","৭","৮","৯");
			$braces2 = 	array ("13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23");
			$reps2 	= 	array("১","২","৩","৪","৫","৬","৭","৮","৯","১০","১১");
			$braces1 = 	array ( "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
			$reps1 	= 	array("জানুয়ারী","ফেব্রুয়ারি","মার্চ","এপ্রিল","মে","জুন","জুলাই","আগস্ট","সেপ্টেম্বর","অক্টোবর","নভেম্বর","ডিসেম্বর");

			$bangla_year			=	str_replace($braces, $reps, $year);
			$bangla_month			=	str_replace($braces1, $reps1, $month);
			$bangla_day				=	str_replace($braces, $reps, $day);
			$t_hour					=	str_replace($braces2, $reps2, $time_hour);
			$bangla_time_hour		=	str_replace($braces, $reps, $t_hour);
			$bangla_time_min		=	str_replace($braces, $reps, $time_min);
			$bangla_time_sec		=	str_replace($braces, $reps, $time_sec);
	
			$bangla_date=$bangla_day." ".$bangla_month." ".$bangla_year."   ".$time." ".$bangla_time_hour.":".$bangla_time_min;
	return $bangla_date;
	}
/*---------------------------------------------*/
/************************************************	
/*		   BanglaDeshi Bangla Date		     /***
/************************************************			
/*---------------------------------------------*/		
function bd_date()
	{
		include('bangladate.php');
		$bn = new BanglaDate(time());
		$bn->set_time(time(), 0);
		print_r($bn->get_date());
	}


	
/*---------------------------------------------*/
/************************************************	
/*			  Site Information       		/***
/************************************************			
/*---------------------------------------------*/
function site_info($info)
	{
		global $con;

		$q			=	mysqli_query($con,"SELECT $info FROM cms_settings");
		$r			=	mysqli_fetch_array($q);
		$result		=	$r[0];
		return $result;
	}


// Bike user ratings
function get_bike_user_ratings($bike_id,$rating_type){

	$total_ratings = get_total("bike_reviews","review_id","WHERE bike_id=$bike_id AND $rating_type>0");
	$total_overall = get_sum("bike_reviews",$rating_type,"WHERE bike_id=$bike_id AND $rating_type>0");
	$rating = number_format(($total_overall/$total_ratings),1);
	return $rating;
}
?>