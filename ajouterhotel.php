<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Hotel</title>
</head>
<body>
<form method="post" action="">
        <label for="titre">Title:</label>
        <input type="text" id="titre" name="titre" required><br>
        
        <label for="adresse">Address:</label>
        <input type="text" id="adresse" name="adresse" required><br>
        
        <label for="prix">Price per Night:</label>
        <input type="number" id="prix" name="prix" required><br>
        
        <label for="id_type">Type ID:</label>
        <input type="number" id="id_type" name="id_type" required><br>
        
        <label for="nombre">Number of Places:</label>
        <input type="number" id="nombre" name="nombre" required><br>
        
        <button type="submit" name="ajouter">Add Hotel</button>
    </form>
    
    

    <?php
    require_once 'connection.php';

    if(isset($_POST['ajouter'])) {
        $titre = htmlspecialchars($_POST['titre']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $prix = htmlspecialchars($_POST['prix']);
        $id_type = htmlspecialchars($_POST['id_type']);
        $nombre = htmlspecialchars($_POST['nombre']);

        // Check if all required fields are filled
        if(!empty($adresse) && !empty($titre) && !empty($prix) && !empty($id_type) && !empty($nombre)) {
            // Prepare the SQL statement
            $sql = $conn->prepare("INSERT INTO hotelf (titre, adresse, prix_par_nuit, id_type, nombre_de_places) 
            VALUES (?, ?, ?, ?, ?)");
            
            // Execute the statement with the provided values
            if($sql->execute([$titre, $adresse, $prix, $id_type, $nombre])) {
                echo '<div class="alert alert-success" role="alert">Hotel added successfully.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error adding hotel.</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">All fields are required.</div>';
        }
    }
    ?>
</body>
</html>
