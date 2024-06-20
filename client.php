<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    require_once "connection.php";
    $client = $conn->query("select id , cin , nom ,prenom from client ");
    $cl = $client->fetchAll(PDO::FETCH_ASSOC);
    echo "<br>";
   // print_r($cl);
    echo"<br>";
    ?>
    <table border="1">
        <tr>
            <th>#</th>
            <th>cin</th>
            <th>nom</th>
            <th>prenom</th>
        </tr>
        <?php 
        foreach($cl as $cle){
            ?>
            <tr>
                <td><?= $cle['id'] ?></td>
                <td><?= $cle['cin'] ?></td>
                <td><?= $cle['nom'] ?></td>
                <td><?= $cle['prenom'] ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>