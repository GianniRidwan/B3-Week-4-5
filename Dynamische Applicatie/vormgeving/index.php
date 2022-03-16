<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Characters</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet"/>
</head>
<body>
    <?php 
        include 'connect.php';
        echo '<header><h1>Alle [X] characters uit de database</h1></header>'; 
    ?>

<?php
    $stmt = $conn->prepare ("SELECT name, health, attack, defense FROM characters ORDER BY name ASC");
    $stmt->execute();
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    foreach ($result as $row){
        // echo $row['name'] . $row['health'] . $row['attack'] . $row['defense'] . '<br/>';
   
    echo '<div id="container">';
        echo '<a class="item" href="character.php">';
            echo '<div class="left">';
                echo '<img class="avatar" src="resources/images/bowser.jpg">';
            echo '</div>';
        echo '<div class="right">';
            echo '<h2>' . $row['name'] . '</h2>';
                echo '<div class="stats">';
                    echo '<ul class="fa-ul">';
                        echo '<li><span class="fa-li"><i class="fas fa-heart"></i></span>' . $row["health"] . '</li>';
                        echo '<li><span class="fa-li"><i class="fas fa-fist-raised"></i></span>' . $row['attack'] . '</li>';
                        echo '<li><span class="fa-li"><i class="fas fa-shield-alt"></i></span>' . $row['defense'] . '</li>';
                    echo '</ul>';
                echo '</div>';
            echo '</div>';
        echo '<div class="detailButton"><i class="fas fa-search"></i> bekijk</div>';
        echo '</a>';
    echo '</div>';
    }
?>

<footer>&copy; Gianni 2022</footer>
</body>
</html>