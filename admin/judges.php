<?php
require_once '../database/db.php';
$sql =  'select * from participants';
$participants = $conn->query($sql);
$sql =  'select * from judge';
$judges = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../style.css" />
  <title>Admin</title>
</head>

<body>
  <header>
    <h1 class="text-center">A D M I N</h1>
  </header>
  <main>
    <div>
      <div class="flex justify-around">
        <div class="card" onclick="window.location.href = 'index.php'">
          <p class="font-bold text-lg">Participants</p>

          <p class="text-xl text-center font-bold">
            <?php echo ($participants->num_rows) ?>
          </p>
        </div>
        <div class="card" onclick="window.location.href = 'judges.php'">
          <p class="font-bold text-lg">Judges</p>

          <p class="text-xl text-center font-bold">
            <?php echo ($judges->num_rows) ?>
          </p>
        </div>
      </div>
    </div>
    <div style="width: 70%; margin: auto;">
      <div   onclick="newJudge()" style="text-align: end;" class="button">New Judge</div>
      <div style="margin: auto">
        <table style="width: 70%; background-color: whitesmoke; margin: auto">
          <thead style="border-bottom: 1px solid green; font-size: larger">
            <tr>
              <th>Judge No.</th>
              <th>NAME</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($judge = $judges->fetch_assoc()) {
              echo '<tr class="row">
                <td class="text-center">' . $judge['judge_no'] . '</td>
                <td class="text-center">' . $judge['name'] . '</td>
              </tr>';
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>
  <script>
    function newJudge(){
    
      window.location.href = 'new_judge.php'
    }
  </script>
</body>

</html>