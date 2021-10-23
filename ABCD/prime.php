//prime no
<?php
echo "<br>__________________________<br>";
function prime($num){
    if ($num== 1)
    return 0;
    for ($i = 2; $i <= $num/2; $i++){
        if ($num % $i == 0)
            return 0;
    }
    return 1;
}
 
$num = 22;
$flag = prime($num);
if ($flag == 1)
    echo $num. " is a prime number";
else
    echo $num. " is not a prime number";
echo "<br>__________________________<br>";

?>
//Bill
<?php 
echo "<br>__________________________<br>";
$num=33;
if($num>=1 && $num<100)
{
    $price = $num*8;
    echo "price=".$price;
}
else if($num>101 && $num<200)
{
    $price = $num*12;
    echo "price=".$price;
}
else if($num>201 && $num<300)
{
    $price = $num*16;
    echo "price=".$price;
}
else if($num>301 && $num<200)
{
    $price = $num*20;
    echo "price=".$price;
}
echo "<br>__________________________<br>";
echo "<br>__________________________<br>";
?>
//percentage
<?php
echo "<br>__________________________<br>";
$a=70;
$b=75;
$per=($a*100)/$b;
echo "percentage = ".$per;
?>
<?php
echo "<br>________________________<br>";
    $a = 0;
    while($a<=10)
    {
      echo $a."<br>";
      $a++;
      echo "<br>________________________<br>";
    }
  ?>
