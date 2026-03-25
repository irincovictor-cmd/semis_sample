<?php //opening tag of PHP
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        session_start();
        $num1 = $_POST["una"] ?? 0;
        $num2 = $_POST["kaduha"] ??0;
        $operator = $_POST["operator"] ??"add";

        switch($operator){
            case "add":
                $_SESSION["resulta"] = $num1 + $num2;
                break;
            case "subtract":
                $_SESSION["resulta"] = $num1 - $num2;
                break;
            case "multiply":
                $_SESSION["resulta"] = $num1 * $num2;
                break;
            case "division":
                $_SESSION["resulta"] = $num2 != 0 ? $num1 / $num2 : 0 ;
                break;
            default:
                $_SESSION["resulta"] = 0;
        }
        header("Location: index.php");
        exit();
    }
    $result = $_SESSION["resulta"] ??0;

?>

