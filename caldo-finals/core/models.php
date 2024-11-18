<?php

function getAllUsers($pdo) {
    $sql = "SELECT * FROM search_users_data ORDER BY first_name ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getUserByID($pdo, $id) {
    $sql = "SELECT * FROM search_users_data WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function searchForAUser($pdo, $searchInput) {
    $query = "SELECT * FROM search_users_data WHERE first_name LIKE :searchInput OR last_name LIKE :searchInput";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['searchInput' => '%' . $searchInput . '%']);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insertNewUser($pdo, $firstName, $lastName, $birthDate, $gender, $email, $phoneNumber, $appliedPosition, $startDate, $address, $nationality) {
    try {
        $sql = "INSERT INTO search_users_data (first_name, last_name, birth_date, gender, email_address, phone_number, applied_position, start_date, address, nationality) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$firstName, $lastName, $birthDate, $gender, $email, $phoneNumber, $appliedPosition, $startDate, $address, $nationality]);
        
        return [
            'message' => 'User inserted successfully!',
            'statusCode' => 200
        ];
    } catch (PDOException $e) {
        return [
            'message' => 'Error occurred: ' . $e->getMessage(),
            'statusCode' => 400
        ];
    }
}

function editUser($pdo, $firstName, $lastName, $birthDate, $gender, $email, $phoneNumber, $appliedPosition, $startDate, $address, $nationality, $id) {
    $sql = "UPDATE search_users_data
            SET first_name = ?, last_name = ?, birth_date = ?, gender = ?, email_address = ?, phone_number = ?, applied_position = ?, start_date = ?, address = ?, nationality = ?
            WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$firstName, $lastName, $birthDate, $gender, $email, $phoneNumber, $appliedPosition, $startDate, $address, $nationality, $id]);
    
    return true;
}

function deleteUser($pdo, $id) {
    $sql = "DELETE FROM search_users_data WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    
    return true;
}
?>