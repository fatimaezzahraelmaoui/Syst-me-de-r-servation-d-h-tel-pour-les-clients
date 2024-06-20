<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Listing</title>
</head>
<body>
    <?php 
    // Include the database connection file
    require_once "connection.php";

    // Prepare the SQL query
    $sql = "
        SELECT 
            h.id_hotel, 
            h.titre, 
            h.adresse, 
            h.prix_par_nuit, 
            h.nombre_de_places, 
            t.nombre_etoile 
        FROM hotelf h 
        INNER JOIN typehotel t ON h.id_type = t.id
    ";

    // Execute the query and fetch all results
    try {
        $stmt = $conn->query($sql);
        $hotels = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        die();
    }

    // Check if there are any results
    if (empty($hotels)) {
        echo "<p>No hotels found.</p>";
    } else {
        echo "<br>";
    ?>
        <table border="1">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Address</th>
                <th>Price per Night</th>
                <th>Number of Places</th>
                <th>Star Rating</th>
            </tr>
            <?php 
            // Loop through each hotel and display its data in the table
            foreach ($hotels as $hotel) {
                ?>
                <tr>
                    <td><?= htmlspecialchars($hotel['id_hotel']) ?></td>
                    <td><?= htmlspecialchars($hotel['titre']) ?></td>
                    <td><?= htmlspecialchars($hotel['adresse']) ?></td>
                    <td><?= htmlspecialchars($hotel['prix_par_nuit']) ?></td>
                    <td><?= htmlspecialchars($hotel['nombre_de_places']) ?></td>
                    <td><?= htmlspecialchars($hotel['nombre_etoile']) ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    <?php 
    } 
    ?>
</body>
</html>
