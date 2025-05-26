<?php
require_once '../database/db.php';
$sql = 'select * from judge';
$judge_no = $conn->query($sql);
$response = null;
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["name"])) {
    $sql = "insert into judge (name,email,password,judge_no) values('" . $_POST["name"] . "','" . $_POST["email"] . "','" . $_POST["password"] . "','j#0" . $judge_no->num_rows + 1 . "')";
    $response = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>New Judge</title>
</head>

<body>
    <header>
        <h1 class="text-xl text-center">NEW JUDGE</h1>
    </header>
    <main>
        <div style="width: 70%;" class="m-auto">
            <form action="new_judge.php" method="post" style="width: fit-content;" class="m-auto">
                <div class="m-auto">
                    <label for="name" class="label">Name</label>
                    <input type="text" class="input" style="outline: 0px;" name="name" required>
                </div>
                <div style="margin-top: 10px;">
                    <label for="name" class="label">Email</label>
                    <input type="email" class="input" required name="email">
                </div>
                <div style="margin-top: 10px;">
                    <label for="name">Password</label>
                    <input type="text" class="input" name="password">
                </div>
                <div class="flex justify-center" style="margin-top: 10px;">
                    <Button class="button" type="submit">SUBMIT</Button>
                </div>
                <?php
                if ($response == 1) {
                    echo ("\n Successfully added a new Judge");
                    header("Location: http://localhost/talanta/admin/judges.php");
                } else  {
                    echo ("Please retry the operation!!");
                }
                ?>
            </form>
        </div>
    </main>
</body>

</html>