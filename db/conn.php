<?php
    
    // Development Environment - Localhost MySQL Database Connection Configuration with XAMPP Server

    // $host = 'localhost';
    // $db ='attendance_db';
    // $user ='root';
    // $pass ='Romi.5351';
    // $charset ='utf8mb4';  
    
    // Production Environment - AWS RDS Remote MySQL Database Connection Configuration

    // $host = 'mysql.cdm08uoa8kk2.us-east-1.rds.amazonaws.com';
    // $db ='attendance_db';
    // $user ='admin';
    // $pass ='Romi.5351';
    // $charset ='utf8mb4';
    
// Production Environment - aiven.io MySQL Database Connection Configuration

    $host = 'attendancedb-californiadiscover528-2d63.b.aivencloud.com';
    $db ='attendance_db';
    $user ='avnadmin';
    $pass ='AVNS_AKA5iS8yMds7eau5mx3';
    $charset ='utf8mb4';

    $dsn ="mysql:host=$host;dbname=$db;charset=$charset";
    

    try{
        $pdo = new PDO ($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        throw new PDOException($e->getMessage());

    }

    require_once 'crud.php';
    require_once 'user.php';
    $crud = new crud($pdo);
    $user = new user($pdo);

    $user->insertUser("admin","password");  // Inserting admin username early stage and conn.php loaded in every page this will also loaded so if anyone try to - 
                                            // add username as "Admin" it wont insert because inside crud there's pre validation of username. it will return false
?>