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

    $stmt = $conn->prepare ("SELECT * FROM characters ORDER BY name ASC");
    $stmt->execute();
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    $order = 0;
    echo '<header><h1>Alle ' . count($result) . ' characters uit de database</h1></header>'; 

    foreach ($result as $row){ ?>
        <div id="container">
            <a class="item" href="character.php?id=<?php echo $order ?>"> 
                <div class="left"> 
                    <img class="avatar" src="resources/images/<?php echo $row['avatar'] ?>"> 
                </div> 
                <div class="right"> 
                    <h2> <?php echo $row['name'] ?> </h2> 
                    <div class="stats">
                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fas fa-heart"></i></span> <?php echo $row["health"] ?> </li> 
                            <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span> <?php echo $row['attack'] ?> </li> 
                            <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span> <?php echo $row['defense'] ?> </li> 
                        </ul> 
                    </div> 
                </div> 
            <div class="detailButton"><i class="fas fa-search"></i> bekijk</div> 
            </a> 
        </div>
<?php
    $order++;
}
?>

<footer>&copy; Gianni 2022</footer>
</body>
</html>