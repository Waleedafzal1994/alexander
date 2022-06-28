<?php
use App\Models\GenericModel;
use App\Models\Follower;

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


?>