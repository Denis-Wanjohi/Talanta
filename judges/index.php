<?php
require_once '../database/db.php';
session_start();
if(!$_SESSION['judge_no']){
    header("Location: http://localhost/talanta/auth/judges.php", true, 301);
    exit();
}
$sql =  'select * from participants';
$participants = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Judges</title>
</head>
<body>
    <header class="flex">
      <h1 class="text-center" style="width: 100%;">J U D G E S</h1>
      <div  onclick="logout()" class="button" style="margin-right: 100px; height:fit-content">Logout</div>
    </header>
    <main>
        <div style="margin: auto">
          <div class="flex m-auto " style="width: 50%;justify-content:space-between;">
            <p> <span style="font-weight: bold;">Name:</span>
            <?php echo $_SESSION['name']?>
          </p>
            <p><span style="font-weight: bold;">Judge No:</span>
            <?php echo $_SESSION['judge_no']?>
          </p>
          </div>
          <p class="text-center">Below is a list of participants</p>
          <table style="width: 70%; background-color: whitesmoke; margin: auto">
            <thead style="border-bottom: 1px solid green; font-size: larger">
              <tr>
                <th>Participant No.</th>
                <th>NAME</th>                
              </tr>
            </thead>
            <tbody>
              <?php
            while ($participant = $participants->fetch_assoc()) {
              echo '<tr class="row" onclick="selected('.$participant['id'].')">
                <td class="text-center">' . $participant['participant_no'] . '</td>
                <td class="text-center">' . $participant['name'] . 'use</td>
              </tr>';
            }
            ?>
            </tbody>
          </table>
        </div>
    </main>
    <script>
      function selected(value){
        window.location.href = 'add_points.php?id='+value
      }
      function logout(){
        
        fetch('../auth/logout.php', {
            method: 'post'
        })
        window.location.href = '/talanta/auth/judges.php'
        
      }
    </script>
</body>
</html>