<?php
require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['insertUserBtn'])) {
    $insertUser = insertNewUser($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['birth_date'], $_POST['gender'], $_POST['email_address'], $_POST['phone_number'], $_POST['applied_position'], $_POST['start_date'], $_POST['address'], $_POST['nationality']);
    if ($insertUser['statusCode'] == 200) {
        $_SESSION['message'] = "Successfully inserted!";
        header("Location: ../index.php");
    }
}

if (isset($_POST['editUserBtn'])) {
    $editUser = editUser($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['birth_date'], $_POST['gender'], $_POST['email_address'], $_POST['phone_number'], $_POST['applied_position'], $_POST['start_date'], $_POST['address'], $_POST['nationality'], $_GET['id']);
    if ($editUser) {
        $_SESSION['message'] = "Successfully edited!";
        header("Location: ../index.php");
    }
}

if (isset($_POST['deleteUserBtn'])) {
    $deleteUser = deleteUser($pdo, $_GET['id']);
    if ($deleteUser) {
        $_SESSION['message'] = "Successfully deleted!";
        header("Location: ../index.php");
    }
}

if (isset($_GET['searchBtn'])) {
    $searchInput = $_GET['searchInput'];

    $sql = "SELECT * FROM search_users_data WHERE first_name LIKE :searchInput OR last_name LIKE :searchInput";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['searchInput' => '%' . $searchInput . '%']);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    var_dump($results);

    if ($results) {
        foreach ($results as $row) {
            echo "<tr> 
                    <td>{$row['id']}</td>
                    <td>{$row['first_name']}</td>
                    <td>{$row['last_name']}</td>
                    <td>{$row['email_address']}</td>
                    <td>{$row['gender']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['applied_position']}</td>
                    <td>{$row['nationality']}</td>
                  </tr>";
        }
    } else {
        echo "No results found.";
    }
}
?>