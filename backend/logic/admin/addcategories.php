<?php

include('../../utility/db-connect.php');

    if ($_POST['category_name'] == ""){
    header("Location:category.php");
    }

    // function contains_at_least_one_word() {
    //     foreach (explode(' ', $_POST['category_name']) as $word) {
    //       if (!empty($word)) {
    //         return true;
    //       }
    //     }
    //     return false;
    //   }
    else if (isset($_POST['category_name'])){
        $category_name = strtolower($_POST["category_name"]);
        $str = "INSERT INTO categories(category_name) values ('$category_name')"; 
        $result = $conn->query($str);

        if ($result == 1){
            header("Location:category.php?pub=Published");
        }
        else 
             header("Location:category.php?pub=Not Published");
    }

   


?>