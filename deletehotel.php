<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حذف حجز</title>
</head>
<body>
    <form method="get" action="">
        <label for="titre">رقم الحجز:</label>
        <input type="text" id="titre" name="id" required><br>
        <button type="submit" name="ajouter">حذف الحجز</button>
    </form>

    <?php
    if (isset($_GET['id'])) {
        require_once 'connection.php'; // تأكد من أن ملف الاتصال موجود ويتم تضمينه بشكل صحيح

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        if ($id) {
            $state = $conn->prepare("DELETE FROM hotelf WHERE id_hotel= ?");
            $delete = $state->execute([$id]);
                header('Location: hotel.php');
                exit();
        }
    }
    ?>
</body>
</html>

</body>
</html>