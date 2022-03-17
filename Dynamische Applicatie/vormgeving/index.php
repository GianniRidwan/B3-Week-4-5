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
    $stmt = $conn->prepare ("SELECT name, avatar, health, attack, defense FROM characters ORDER BY name ASC");
    $stmt->execute();
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    foreach ($result as $row){
        // echo $row['name'] . $row['health'] . $row['attack'] . $row['defense'] . '<br/>';
   
    echo '<div id="container">' . 
            '<a class="item" href="character.php">' . 
                '<div class="left">' . 
                    '<img class="avatar" src="resources/images/' . $row['avatar'] . '">' . 
                '</div>' . 
                '<div class="right">' . 
                    '<h2>' . $row['name'] . '</h2>' . 
                    '<div class="stats">' . 
                        '<ul class="fa-ul">' . 
                            '<li><span class="fa-li"><i class="fas fa-heart"></i></span>' . $row["health"] . '</li>' . 
                            '<li><span class="fa-li"><i class="fas fa-fist-raised"></i></span>' . $row['attack'] . '</li>' . 
                            '<li><span class="fa-li"><i class="fas fa-shield-alt"></i></span>' . $row['defense'] . '</li>' . 
                        '</ul>' . 
                    '</div>' . 
                '</div>' . 
            '<div class="detailButton"><i class="fas fa-search"></i> bekijk</div>' . 
            '</a>' . 
    '</div>';
    }
?>

<footer>&copy; Gianni 2022</footer>
</body>
</html>