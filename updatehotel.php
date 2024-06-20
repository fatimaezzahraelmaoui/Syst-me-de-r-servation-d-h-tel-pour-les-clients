<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Hotel</title>
</head>
<body>
    <form method="post" action="">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br>

        <button type="submit" name="fetch">Fetch Hotel Details</button>
    </form>

    <?php
    require_once 'connection.php';

    if (isset($_POST['fetch'])) {
        $id = htmlspecialchars($_POST['id']);
        $sql = $conn->prepare("SELECT * FROM hotelf WHERE id_hotel = ?");
        $sql->execute([$id]);
        $hotel = $sql->fetch(PDO::FETCH_ASSOC);

        if ($hotel) {
            $titre = $hotel['titre'];
            $adresse = $hotel['adresse'];
            $prix = $hotel['prix_par_nuit'];
            $id_type = $hotel['id_type'];
            $nombre = $hotel['nombre_de_places'];
        } else {
            echo '<div class="alert alert-danger" role="alert">Hotel not found.</div>';
        }
    }

    if (isset($_POST['modifier'])) {
        $id = htmlspecialchars($_POST['id']);
        $titre = htmlspecialchars($_POST['titre']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $prix = htmlspecialchars($_POST['prix']);
        $id_type = htmlspecialchars($_POST['id_type']);
        $nombre = htmlspecialchars($_POST['nombre']);

        // Check if all required fields are filled
        if (!empty($adresse) && !empty($titre) && !empty($prix) && !empty($id_type) && !empty($nombre)) {
            // Prepare the SQL statement
            $sql = $conn->prepare("UPDATE hotelf SET titre = ?, adresse = ?, prix_par_nuit = ?, id_type = ?, nombre_de_places = ? WHERE id_hotel = ?");
            
            if ($sql->execute([$titre, $adresse, $prix, $id_type, $nombre, $id])) {
                echo '<div class="alert alert-success" role="alert">Hotel updated successfully.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error updating hotel.</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">All fields are required.</div>';
        }
    }
    ?>

    <?php if (isset($hotel)): ?>
    <form method="post" action="">
        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">

        <label for="titre">Title:</label>
        <input type="text" id="titre" name="titre" value="<?php echo $titre; ?>" required><br>

        <label for="adresse">Address:</label>
        <input type="text" id="adresse" name="adresse" value="<?php echo $adresse; ?>" required><br>

        <label for="prix">Price per Night:</label>
        <input type="number" id="prix" name="prix" value="<?php echo $prix; ?>" required><br>

        <label for="id_type">Type ID:</label>
        <input type="number" id="id_type" name="id_type" value="<?php echo $id_type; ?>" required><br>

        <label for="nombre">Number of Places:</label>
        <input type="number" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required><br>

        <button type="submit" name="modifier">Update Hotel</button>
    </form>
    <?php endif; ?>
</body>
</html>
