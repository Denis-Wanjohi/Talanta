<?php
require_once '../database/db.php';
session_start();
if(!$_SESSION['judge_no']){
    
    header("Location: http://localhost/talanta/auth/judges.php", true, 301);
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $url = $_SERVER['REQUEST_URI'];
    $id = $url[strpos($url, "=") + (strlen($url) - strpos($url, "=")) - 1];
    $sql = 'select * from participants where id = ' . $id;
    $name;
    $participant_number;
    $response  = $conn->query($sql);
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $url = $_SERVER['REQUEST_URI'];
    $id = $url[strpos($url, "=") + (strlen($url) - strpos($url, "=")) - 1];
    $sql = 'select * from participants where id = ' . $id;
    $response  = $conn->query($sql);
    $participant_number = null;
    if ($response->num_rows > 0) {
        while ($res = $response->fetch_assoc()) {
            $participant_number = $res['participant_no'];
        }
    }


    $sql = 'select * from score where participant_no = "' . $participant_number . '" and judge_no = "' . $_SESSION['judge_no'] . '"';
    $response = $conn->query($sql);

    if ($response->num_rows > 0) {
        echo ("Votes already casted ");
        header("Location: http://localhost/talanta/judges/index.php", true, 301);
        exit();
    } else {

        $sql = "insert into score (participant_no,judge_no,score,time) values('" . $participant_number . "','" . $_SESSION['judge_no'] . "'," . $_POST['results_input'] . ",'" . date("Y-m-d h:i:sa") . "')";
        $response = $conn->query($sql);
        if ($response == 1) {
            echo ("success");
        } else {
            echo ("failure");
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
    <title>Points</title>
</head>

<body>
    <header>
        <h1 class="text-center">Add Points</h1>
    </header>
    <main>
        <div style="width: 70%;" class="m-auto">
            <div class="text-center">

                <?php
                if ($response->num_rows > 0) {
                    while ($res = $response->fetch_assoc()) {

                        echo "<p>Name: <span class='font-bold'>" . $res['name'] . "</span></p>
                <p>Participation No. :  <span class='font-bold'>" . $res['participant_no'] . "</span></p>";
                    }
                }

                ?>
            </div>
            <?php
            echo '<form action="add_points.php?id=' . $id . '" method="post" class="text-center">'
            ?>
            <p style="font-size: 50px;" id="results" name="results"></p>
            <input type='hidden' id="results_input" name="results_input">
            <dic style="width: fit-content;" class="m-auto grid grid-cols-3">
                <p onclick="clicked(1)">1</p>
                <p onclick="clicked(2)">2</p>
                <p onclick="clicked(3)">3</p>
                <p onclick="clicked(4)">4</p>
                <p onclick="clicked(5)">5</p>
                <p onclick="clicked(6)">6</p>
                <p onclick="clicked(7)">7</p>
                <p onclick="clicked(8)">8</p>
                <p onclick="clicked(9)">9</p>
                <p style="background-color: red;" onclick="clearBoard()">Delete</p>
                <p onclick="clicked(0)">0</p>
                <button type="submit" style="background-color: blue;">Submit</button>
        </div>
        </form>
        </div>
    </main>
    <script>
        let total = 0

        function clicked(value) {
            if (value > 1) {
                total = value
            } else {
                if (value == 1 && total == 0) {
                    total = 1
                } else if (total == 1 && value == 0) {
                    total = 10
                } else {
                    total = 0
                }
            }

            document.getElementById('results').textContent = total
            document.getElementById('results_input').value = total

        }

        function clearBoard() {
            total = 0
            document.getElementById('results').innerHTML = ''
        }
    </script>
</body>

</html>