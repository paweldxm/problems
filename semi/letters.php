<!-- Write a function solution that, given two integers A and B, returns a string containing exactly A letters 'a' and exactly B letters 'b' with no three consecutive letters being the same (in other words, neither "aaa" nor "bbb" may occur in the returned string).

Examples:

1. Given A = 5 and B = 3, your function may return "aabaabab". Note that "abaabbaa" would also be a correct answer. Your function may return any correct answer.

2. Given A = 3 and B = 3, your function should return "ababab", "aababb", "abaabb" or any of several other strings.

3. Given A = 1 and B = 4, your function should return "bbabb", which is the only correct answer in this case.

Assume that:

A and B are integers within the range [0..100];
at least one solution exists for the given A and B.
In your solution, focus on correctness. The performance of your solution will not be the focus of the assessment. -->

<?php
    $setA = rand(0,100);
    $setB = rand(0,100);
    // $setA = 4;
    // $setB = 4;

    echo 'Random numbers: ('.$setA.' , '.$setB.')<br>';

    echo '<hr>';

    function solution($setA,$setB) {
        $string = '';

        if($setA>=$setB) { $a=$setA;$b=$setB; } else { $a=$setB;$b=$setA; }

        if ($a>=$b && $a<=2*($b+1) || ($b==0 && $a<3)) {
            while ($b>0) {

                if ($b==1 && $a==4) { $string = $string . 'aabaa'; break; }
                if ($b==1 && $a==3) { $string = $string . 'aaba'; break;}
                if ($b==1 && $a==2) { $string = $string . 'aab'; break;}
                if ($b==1 && $a==1) { $string = $string . 'ab'; break;}
                if ($b==1 && $a==0) { $string = $string . 'b'; break;}

                if (($a/2==$b) || ($a>$b)) {
                    $string = $string . 'aab';
                    $a=$a-2;
                    $b--;
                }
                if ($a==$b) {
                    for ($k=1;$k=$a;$k++) {
                        $string = $string . 'ab';
                        $a--;
                        $b--;
                    }
                    break;
                }
            }
            $string = str_replace('b','<b>b</b>', $string);
            return $string;
        }
        else return $string =  'Impossible to create an inscription.';
    }

    echo solution($setA,$setB);
    echo '<hr>';
?>
 <!-- SEMI -->

 <?php

// declare(strict_types=1);


function renderAB(int $a, int $b): string
{
	$string = $string ?? '';
	
		if ($b === 0 && $a === 0){
		
			return $string;
		
		} else {
		
			if ($a > $b) {
		
				for ($i = 2; $i > 0; $i--) {
			
					if ($a > 0){
						$string .= 'a';
						$a--;
					}
				}
				for ($i = 2; $i > 0; $i--) {
			
					if ($b > 0){
						$string .= 'b';
						$b--;
					}
				}
			} else {
				
				for ($i = 2; $i > 0; $i--) {
			
					if ($b > 0){
						$string .= 'b';
						$b--;
					}
				}
				for ($i = 2; $i > 0; $i--) {
			
					if ($a >0){
						$string .= 'a';
						$a--;
					}
				}
				
			}
			
			$string .= renderAB($a, $b);
		}
		

	
	return $string;
}

echo renderAB($setA, $setB);