<?php
require_once '../database/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $sql = 'select * from judge where email = "' . $_POST['email'] . '"';
        $results = $conn->query($sql);
        if ($results->num_rows > 0) {
            while ($res = $results->fetch_assoc()) {
                if ($res['password'] == $_POST['password']) {

                    session_start();
                    $_SESSION['name'] = $res['name'];
                    $_SESSION['email'] = $res['email'];
                    $_SESSION['judge_no'] = $res['judge_no'];
                    header("Location: http://localhost/talanta/judges/index.php", true, 301);
                    exit();
                } else {
                    echo "Credentials dont match our records";

                }
            }
        } else {
            echo "Email dont match our records";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Judge - Login</title>
</head>

<body>
    <header>
        <h1 class="text-xl text-center">L O G I N</h1>
    </header>
    <main>
        <div style="width: 70%;" class="m-auto">
            <form action="judges.php" method="post" style="width: fit-content;" class="m-auto">

                <div style="margin-top: 10px;">
                    <label for="name" class="label">Email</label>
                    <input type="email" class="input" required name="email">
                </div>
                <div style="margin-top: 10px;">
                    <label for="name">Password</label>
                    <input type="password" class="input" name="password">
                </div>
                <div class="flex justify-center" style="margin-top: 10px;">
                    <Button class="button" type="submit">SUBMIT</Button>
                </div>
                
            </form>
        </div>
    </main>
</body>

</html>