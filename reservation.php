<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation List</title>
</head>
<body>
    <?php 
    // Include the database connection file
    require_once "connection.php";

    // Prepare the SQL query
    $sql = "
        SELECT 
            r.id_reserve, 
            h.titre, 
            c.nom, 
            c.cin, 
            r.date_debut_sejour, 
            r.date_fin_sejour 
        FROM reservation r
        INNER JOIN hotelf h ON r.id_hotel = h.id_hotel
        INNER JOIN client c ON r.id_client = c.id
    ";

    // Execute the query and fetch all results
    try {
        $stmt = $conn->query($sql);
        $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        die();
    }

    // Check if there are any results
    if (empty($reservations)) {
        echo "<p>No reservations found.</p>";
    } else {
        echo "<br>";
    ?>
        <table border="1">
            <tr>
                <th>#</th>
                <th>Hotel Title</th>
                <th>Client Name</th>
                <th>CIN</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
            <?php 
            // Loop through each reservation and display its data in the table
            foreach ($reservations as $reservation) {
                ?>
                <tr>
                    <td><?= htmlspecialchars($reservation['id_reserve']) ?></td>
                    <td><?= htmlspecialchars($reservation['titre']) ?></td>
                    <td><?= htmlspecialchars($reservation['nom']) ?></td>
                    <td><?= htmlspecialchars($reservation['cin']) ?></td>
                    <td><?= htmlspecialchars($reservation['date_debut_sejour']) ?></td>
                    <td><?= htmlspecialchars($reservation['date_fin_sejour']) ?></td>
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
