<?php
use App\Models\GenericModel;
use App\Models\Follower;
use App\Models\Block;
use Illuminate\Support\Facades\Http;

if (! function_exists('getName'))
{
    function getName()
    {
    	echo "Waleed";
    }	
}

function shortNumber($num) 
{
    $units = ['', 'K', 'M', 'B', 'T'];
    for ($i = 0; $num >= 1000; $i++) {
        $num /= 1000;
    }
    return round($num, 1) . $units[$i];
}

function checkLoginFollows($user_id,$login_id)
{
	$checkFollow = Follower::where('user_id', $user_id)->where('follower_id', $login_id)->first();
	return !empty($checkFollow) ? 'Following' : 'Follow';
}

function checkUserBloked($user_id)
{
  $check = Block::where('user_id', $user_id)->first();
  return !empty($check) ? 'checked' : '';
}

function getUsercountry(){

    $ip = $_SERVER['REMOTE_ADDR'];
    // $ip = "39.46.43.153";
    $apidata =  Http::get('https://ipinfo.io/'.$ip.'?token=f51a846eaaa5a7');
    $json     = json_decode($apidata, true);

    return $json;

}

function checkAge($bd)
{
    //date in mm/dd/yyyy format; or it can be in other formats as well
  $birthDate = $bd;//"12/17/1983";
  //explode the date to get month, day and year
  $birthDate = explode("/", $birthDate);
  //get age from date or birthdate
  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2]));
  return $age;
}


?>