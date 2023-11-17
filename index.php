<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "This is title"; echo "hello" ?></title>
</head>
<body>
    <?php
        $name = "Suraj";
        echo "Hello world! $name";

        $x=true ;
        echo $x; // output 1
        echo var_dump($x); //output : true
        echo "<br>";
        $friends = array("1", "2", "3", 4);
        echo $friends[0];
        echo var_dump($friends);


        // . operator  is used to join the string
        $str = "Suraj";
        echo " Hello wroled" . "hello" . strlen($str);
        echo str_word_count($str);
        echo strrev($str);

        $name = "Suraj is good boy";
        echo strpos($name, "is");
        echo "<br>";
        echo str_replace("Suraj", "Om", $name);

        echo str_repeat($name, 10);

        echo "<pre>";
        echo  rtrim("    this is   ");
        echo "</pre>";

        // to print as it is we use pre tag 

        // Not equal to operator <>
        echo var_dump(5 <> 6);
    ?>

    <?php
        $age=10;
        switch($age) {
            case 1: echo "you are 12";
            break;

            default : echo "This is default";

        }   
        
        // functions same as cpp, but no return type

        function myFun($var) {
            return $var;
        }
        $arr = [1,2,3,4,5];


        $d = date("d l");
        echo "<br>" . $d;

        // Associative arrays
        $n = array("Suraj" => "red", "Raut" => "green", 8=>"this");
        echo $n["Suraj"];

        foreach($n as $key => $value){
            echo "Fav color $key and $value";
        }
    ?>
</body>
</html>