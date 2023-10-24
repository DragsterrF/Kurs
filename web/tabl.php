<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blogtest";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Проверка соединения
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Массив с SQL-запросами для создания таблиц
$sqlQueries = [
    "CREATE TABLE article (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        content TEXT NOT NULL,
        date DATE NOT NULL,
        image VARCHAR(255) NOT NULL,
        viewed INT(11) NOT NULL,
        user_id INT(11) NOT NULL,
        status INT(11) NOT NULL,
        category_id INT(11) NOT NULL
    )",
    "CREATE TABLE article_tag (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        article_tag INT(11) NOT NULL,
        tag_id INT(11) NOT NULL
    )",
    "CREATE TABLE category (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL
    )",
    "CREATE TABLE comment (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        text VARCHAR(255) NOT NULL,
        user_id INT(11) NOT NULL,
        article_id INT(11) NOT NULL,
        status INT(11) NOT NULL,
        date DATE NOT NULL
    )",
    "CREATE TABLE migration (
        version VARCHAR(180) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        apply_time INT(11) NOT NULL
    )",
    "CREATE TABLE tag (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL
    )",
    "CREATE TABLE user (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        isAdmin INT(11) NOT NULL,
        photo VARCHAR(255) NOT NULL
    )",
];

// Создание таблиц
$success = true;
foreach ($sqlQueries as $query) {
    if (!mysqli_query($conn, $query)) {
        $success = false;
        echo "Ошибка при создании таблиц: " . mysqli_error($conn);
        break;
    }
}

// Вывод сообщения об успешном создании таблиц
if ($success) {
    echo "Таблицы созданы успешно";
}

// Закрытие соединения
mysqli_close($conn);
?>