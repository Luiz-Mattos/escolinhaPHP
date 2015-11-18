<?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";
$nameErr = $emailErr = $genderErr = $websiteErr = "";

//echo $_SERVER["REQUEST_METHOD"] . "<br>";
{
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Apenas letras e espaços em brancos são permitidos";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//limpeza dos dados de entrada
if ($_SERVER["REQUEST_METHOD"] == "GET")
    
    ?>

<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            .err{
                outline: 1px dashed red;
                background-color: rgba(255,255,0,0,0.2)
            }
        </style>
    </head>
    <body>
        <h1>Manuseio de formulário com PHP</h1>
        <h2>Referências:</h2>
        <ul>
            <li><a href="http://www.w3schools.com">W3Schools</a></li>
            <li><a href="http://www.php.net">Manual do PHP</a></li>
        </ul>

        <form method="post" action="<?php echo ($_SERVER["PHP_SELF"]); ?>">
            Name: <input type="text" name="name" class="<?= strlen($nameErr) != 0 ? "err" : ""; ?>">
            <span class="error">* <?php echo $nameErr; ?></span>
            <br><br>
            E-mail:
            <input type="text" name="email" class="<?= strlen($emailErr) != 0 ? "err" : ""; ?>">
            <span class="error">* <?php echo $emailErr; ?></span>
            <br><br>
            Website:
            <input type="text" name="website">
            <span class="error"><?php echo @$websiteErr; ?></span>
            <br><br>
            Comment: <textarea name="comment" rows="5" cols="40"></textarea>
            <br><br>
            Gender:
            <input type="radio" name="gender" value="female">Female
            <input type="radio" name="gender" value="male">Male
            <span class="error">* <?php echo @$genderErr; ?></span>
            <br><br>
            <input type="submit" name="submit" value="Submit"> 
        </form>
    </body>
</html>
