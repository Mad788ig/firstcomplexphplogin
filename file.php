<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="learn.php" method="post">
        <label>username:</label>
        <input type="text" name="username"><br>
        <label>age:</label>
        <input type="text" name="age"><br>
        <label>email:</label>
        <input type="text" name="email">
        <input type="submit" name="login" value="login">
    </form>
</body>
</html>
<?php
// $sanatize_type == تایپ اینپوت فیلتر شده مون
// $name_in_html == اسم ورودی ای که توی اچ تی ام ال داریم 
function input_sanatize($sanatize_type,$name_in_html){
    switch($sanatize_type){
        case($sanatize_type == "int"):
            return filter_input(INPUT_POST,$name_in_html,FILTER_SANITIZE_NUMBER_INT);
            break;
        case($sanatize_type == "str"):
            return filter_input(INPUT_POST,$name_in_html,FILTER_SANITIZE_SPECIAL_CHARS);
            break;
        case($sanatize_type == "email"):
            return filter_input(INPUT_POST,$name_in_html,FILTER_SANITIZE_EMAIL);
            break;
        default:
            return "ERROR F_INPUT_SANATIZE<br>";
    }
}
function what_value($usertypeofinput,$uservalue){
    switch($usertypeofinput){
        case($usertypeofinput == "email"):
            return "your email is {$uservalue}<br>";
            break;
        case($usertypeofinput == "age"):
            return "You are {$uservalue} years old<br>";
            break;
        case($usertypeofinput == "username"):
            return "Your username is : {$uservalue}<br>";
            break;
        default:
            echo "ERROR F_WHAT VALUE";
    }
    
}
function error($typeoferror){
    echo "error, {$typeoferror} cannot be empty<br>";
}

    if(isset($_POST["login"])){
        if(!empty(input_sanatize("str","username"))){
            $usernameinput=input_sanatize("str","username");
            echo what_value("username",$usernameinput);
        }
        else{
            error("Username");
        }
        $age_input = input_sanatize("str","age");
        if(!empty($age_input)){
            if(!is_numeric($age_input)){
                echo "For age only int is allowed<br>";
            }
            else{
                $usernameinput=$age_input;
                echo what_value("age",$usernameinput);
            }
        }
        else{
            error("age");
        }
        if(!empty(input_sanatize("email","email"))){
            $usernameinput=input_sanatize("email","email");
            echo what_value("email",$usernameinput);
        }
        else{
            error("email");
        }
    }
    
?>

