<?php
use App\Models\GenericModel;

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


?>