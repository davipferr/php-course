<?php 
$f_name = "Derek";
$l_name = "Banas";
$age = 44;
$height = 1.87;
$can_vote = true;
$adress = array('street'=> '123 main St','city'=> 'Puittburgh');
$state = NULL;
define('PI', 3.1415);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tutorial</title>
</head>
<body>
    <p> Name:<?php echo $f_name .' '. $l_name; ?></p>
    <form action="tut1.php" method="get">
        <label>Your State : </label>
        <input type="text" name="state"><br>
        <label>Number 1 : </label>
        <input type="text" name="num-1"><br>
        <label>Number 2 : </label>
        <input type="text" name="num-2"><br>
        <input type="submit" value="Submit"/>
    </form>

    
    <?php 
    if(isset($_GET) && array_key_exists('state', $_GET)){
        $state = $_GET['state'];
        if(isset($state) && !empty($state)){
            echo 'You live in ' . $state . '<br>';
            echo "$f_name lives in $state<br>";
        }
        if(count($_GET) >= 3){
            $num_1 = $_GET['num-1'];
            $num_2 = $_GET['num-2'];
            echo "$num_1 + $num_2 = ". ($num_1 + $num_2) ."<br>";
            echo "$num_1 - $num_2 = ". ($num_1 - $num_2) ."<br>";
            echo "$num_1 * $num_2 = ". ($num_1 * $num_2) ."<br>";
            echo "$num_1 / $num_2 = ". ($num_1 / $num_2) ."<br>";
            echo "$num_1 % $num_2 = ". ($num_1 % $num_2) ."<br>";
            echo "$num_1 / $num_2 = ". (intdiv($num_1, $num_2)) ."<br>";

            echo "Increment $num_1 =" . ($num_1++) . "<br>";
            echo "Decrement $num_1 =" . ($num_1--) . "<br>";
        }
    }
    ?><br>


    <?php
    function addNumbers($num_1=0, $num_2=0){
        return $num_1 + $num_2;
    }
    printf("5 + 4 = %d<br>", addNumbers(5,4));

    function changeMe(&$change){
        $change = 10;
        echo "Not changed: $change<br>";
    }
    $change = 5;
    changeMe($change);
    echo "Changed: $change<br>";
    ?><br>


    <?php
    function getSum(...$nums){
        $sum = 0;
        foreach($nums as $num){
            $sum += $num;
        }
        return $sum;
    }
    printf("Sum = %d<br>", getSum(1,2,3,4));
    function doMath($x, $y){
        return array(
            $x + $y,
            $x - $y
        );
    }
    list($sum, $difference) = doMath(5,4);
    echo "Sum = $sum<br>";
    echo "Difference = $difference<br>";
    ?><br>


    <?php
    function mult($x, $y){
        $x *= $y;
        return $x;
    }
    $list = [1,2,3,4];
    $prod = array_reduce($list, 'mult', 1);
    print_r($prod);
    ?><br>
    <?php
    include 'sayhello.php'
    ?><br>


    <?php
    function badDivide($num){
        if($num == 0){
            throw new Exception("You can't divide by zero");
        }
        return $calc = 100 / $num;
    }
    try{
        badDivide(0);
    }catch(Exception $e){
        echo "Exception :" . $e->getMessage();
    }
    
    ?>
</body>
</html>