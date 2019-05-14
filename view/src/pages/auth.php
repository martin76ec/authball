<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
    include('model/mailModel.php');

    $balls = array('purple', 'pink', 'red', 'orange', 'yellow');
    $goals = array('A', 'B', 'C');

    $correct_ball = $balls[array_rand($balls)];
    $correct_goal = $goals[array_rand($goals)];

    sendMail($_SESSION['user_name'], $_SESSION['user_email'], $correct_ball, $correct_goal);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('view/src/modules/head.php'); ?>
</head>

<body class="gameBody">
    <header class="gameBody">
        <?php include('view/src/modules/authnavbar.php'); ?>
        <div id="gameCanvas"></div>
    </header>
    <!--matterJs-->
    <script src="view/libraries/matterjs/matter.js"></script>
    <!--matterCollision-->
    <script src="view/libraries/matterjs/matter-collision-events.js"></script>
    <!--Authball-->
    <script src="view/javascripts/authball.js"></script>
    <script>
        function colliding(pair) {
            if (pair.bodyA.name === 'A' || pair.bodyA.name === 'B' || pair.bodyA.name === 'C') {
                engine.timing.timeScale = 0.02;
                window.location = ('model/authModel.php?correct_ball=<?php echo $correct_ball; ?>&correct_goal=<?php echo $correct_goal; ?>&choosed_ball=' + pair.bodyB.name + '&choosed_goal=' + pair.bodyA.name);
            }
        }
    </script>
</body>

</html>