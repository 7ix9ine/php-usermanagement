<DOCTYPE html>
    <html>

    <?php

    session_start();

    require_once __DIR__ . '/src/functions.php';

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        die();
    }


    require_once __DIR__ . '/src/functions.php';

    $db = databaseConnect();

    $id = $_GET['id'];

    $user->delete($db);
    var_dump($user);

    echo "Deleted user with Id: " . $id;
    ?>


    <form action="../user-management.php" method="post">
        <div style="text-align: left"><input name="back_button" type="submit" value="Go Back"/></div>
    </form>

    </html>