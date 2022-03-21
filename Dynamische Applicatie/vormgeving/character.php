<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Character - Bowser</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet"/>
</head>
<body>
<?php 
    include 'connect.php';

    $stmt = $conn->prepare ("SELECT * FROM characters ORDER BY name ASC");
    $stmt->execute();
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    $id = $_GET['id'];
?>

<header><h1><?php echo $result[$id]['name']; ?></h1>
    <a class="backbutton" href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Terug</a></header>
<div id="container">
    <div class="detail">
        <div class="left">
            <img class="avatar" src="resources/images/<?php echo $result[$id]['avatar']; ?>">
            <div class="stats" style="background-color: <?php echo $result[$id]['color']; ?>">
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-heart"></i></span><?php echo $result[$id]['health']; ?></li>
                    <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span><?php echo $result[$id]['attack']; ?></li>
                    <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span><?php echo $result[$id]['defense']; ?></li>
                </ul>
                <ul class="gear">
                    <li><b><?php if ($result[$id]['weapon'] == NULL){
                        echo "";
                    } else {
                        echo "Weapon:";
                    }; ?>
                    </b> <?php echo $result[$id]['weapon']; ?></li>
                    <li><b><?php if ($result[$id]['armor'] == NULL){
                        echo "";
                    } else {
                        echo "Armor:";
                    }; ?></b> <?php echo $result[$id]['armor']; ?></li>
                </ul>
            </div>
        </div>
        <div class="right">
            <p>
            <?php echo $result[$id]['bio']; ?>
            </p>
        </div>
        <div style="clear: both"></div>
    </div>
</div>
<footer>&copy; Gianni 2022</footer>
</body>
</html>