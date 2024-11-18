<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php  
    require_once 'core/dbConfig.php';  
    require_once 'core/models.php';     

    if (isset($_GET['id'])) {
        $id = $_GET['id'];  

        $deleteUser = deleteUser($pdo, $id);

        if ($deleteUser) {
            $_SESSION['message'] = "User has been successfully deleted!";
            $_SESSION['statusCode'] = 200;
        } else {
            $_SESSION['message'] = "Error occurred. Unable to delete the user.";
            $_SESSION['statusCode'] = 400;
        }

        header("Location: index.php");
        exit();
    }
    ?>
</body>
</html>