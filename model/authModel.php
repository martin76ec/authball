<?php

    session_start();
    include('connection.php');
    include('geolocationModel.php');

    $correct_ball = $_GET['correct_ball'];
    $correct_goal = $_GET['correct_goal'];
    $choosed_ball = $_GET['choosed_ball'];
    $choosed_goal = $_GET['choosed_goal'];
    $geodata = getGeoLocationData();

    if($choosed_ball == $correct_ball && $choosed_goal == $correct_goal){
        $sql = "INSERT INTO log (user_id, date, country, city, latitude, longitude, correct_ball, correct_goal, choosed_ball, choosed_goal, status) 
        VALUES (?, NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $con->prepare($sql)->execute([$_SESSION['user_id'], $geodata[0], $geodata[1], $geodata[2], $geodata[3], $correct_ball, $correct_goal, $choosed_ball, $choosed_goal, 'correcto']);
        $_SESSION['authenticated'] = true;
        print "<script>window.location='../profile';</script>";
    } else {
        $sql = "INSERT INTO log (user_id, date, country, city, latitude, longitude, correct_ball, correct_goal, choosed_ball, choosed_goal, status) 
        VALUES (?, NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $con->prepare($sql)->execute([$_SESSION['user_id'], $geodata[0], $geodata[1], $geodata[2], $geodata[3], $correct_ball, $correct_goal, $choosed_ball, $choosed_goal, 'incorrecto']);
        print "<script>window.location='../signin';</script>";
    }