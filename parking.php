<!-- You parked your car in a parking lot and want to compute the total cost of the ticket. The billing rules are as follows:

The entrance fee of the car parking lot is 2;
The first full or partial hour costs 3;
Each successive full or partial hour (after the first) costs 4.
You entered the car parking lot at time E and left at time L. In this task, times are represented as strings in the format "HH:MM" (where "HH" is a two-digit number between 0 and 23, which stands for hours, and "MM" is a two-digit number between 0 and 59, which stands for minutes).

Write a function:

function solution($E, $L);

that, given strings E and L specifying points in time in the format "HH:MM", returns the total cost of the parking bill from your entry at time E to your exit at time L. You can assume that E describes a time before L on the same day.

For example, given "10:00" and "13:21" your function should return 17, because the entrance fee equals 2, the first hour costs 3 and there are two more full hours and part of a further hour, so the total cost is 2 + 3 + (3 * 4) = 17. Given "09:42" and "11:42" your function should return 9, because the entrance fee equals 2, the first hour costs 3 and the second hour costs 4, so the total cost is 2 + 3 + 4 = 9.

Assume that:

strings E and L follow the format "HH:MM" strictly;
string E describes a time before L on the same day.
In your solution, focus on correctness. The performance of your solution will not be the focus of the assessment. -->
<html>
<?php
    $e = "00:34";
    $l = "11:41";
    
    echo '<span id="start">' . $e .'</span><br>';
    echo '<span id="end">' . $l .'</span>';

    $start = array();
    $end = array();
    
    for ($i=0;$i<5;$i++) {
        if(is_numeric($e[$i])) $start[] = $e[$i];
        if(is_numeric($l[$i])) $end[] = $l[$i];
    }

    if (count($start) != 4 || count($end) != 4)  { echo 'wrong data' ; die; }
    else {
        for ($i=0;$i<4;$i++) {
            $in[]=intval($start[$i]);
            $out[]=intval($end[$i]);
        }
        if (($in[0]*10 + $in[1])>23 || ($out[0]*10 + $out[1])>23|| $in[2]>5 || $out[2]>5) { echo 'wrong data' ; die ; }

        $minutesIn = $in[3]+$in[2]*10+$in[1]*60+$in[0]*600;
        $minutesOut = $out[3]+$out[2]*10+$out[1]*60+$out[0]*600;
        $total = $minutesOut - $minutesIn;
    }

    $hours = ceil($total / 60);
    echo '<br>Parking time full hours: ' . $hours;
    
    if($hours<2) $payout=2+3;
    else $payout = 2 + 3 + 4*($hours - 1);
    echo '<br>Bill to be paid: ' . $payout . '$';

?>

<script>
    let e = '00:33';
    let l = '11:41';
    // var e = document.getElementById("start");
    // var l = document.getElementById("end");

    console.log(e);

    let hoursIn = e[0]*10 + 1*e[1] ;
    let hoursOut = l[0]*10 + 1*l[1] ;

    let minIn = e[3]*10 + 1*e[4] ;
    let minOut = l[3]*10 + 1*l[4] ;

    console.log(hoursIn);
    console.log(hoursOut);

    console.log(minIn);
    console.log(minOut);

    let total;
    total = Math.ceil(((60*hoursOut + minOut)-(60*hoursIn + minIn))/60);
    if(total<2) { console.log(total=5); }
    else console.log(4*(total-1)+5);

</script>
</html>