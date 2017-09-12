<?php

/*$datetime1 = date("Y-m-d H:i:00", time());
echo $datetime1;
*/



$date1 = new DateTime("2017-08-17 21:51:00");
$date2 = new DateTime("now");
$diff  = $date1->diff($date2);
// 38 minutes to go [number is variable]
echo (($diff->days * 24) * 60) + ($diff->i) . ' minutes';
// passed means if its negative and to go means if its positive
echo ($diff->invert == 1) ? ' passed ' : ' to go ';