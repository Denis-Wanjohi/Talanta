<?php
require_once '../database/db.php';
$sql =  'select * from participants';
$participants = $conn->query($sql);
$sql =  'select * from judge';
$judge = $conn->query($sql);
// if($result->num_rows > 0){
//   while($row  = $result->fetch_assoc()){
//     // echo "id:".$row['id']."name:".$row['name'];
//   }
// }else{
//   echo "0 results";
// }
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
        <div onclick="window.location.href = 'index.php'" class="card">
          <p class="font-bold text-lg">Participants</p>

          <p class="text-xl text-center font-bold">
            <?php echo ($participants->num_rows) ?>
          </p>
        </div>
        <div onclick="window.location.href = 'judges.php'" class="card">
          <p class="font-bold text-lg">Judges</p>

          <p class="text-xl text-center font-bold">
            <?php echo ($judge->num_rows) ?>
          </p>
        </div>
      </div>
    </div>
    <div>
      <div style="margin: auto">
        <table style="width: 70%; background-color: whitesmoke; margin: auto">
          <thead style="border-bottom: 1px solid green; font-size: larger">
            <tr>
              <th>Participant No.</th>
              <th>NAME</th>
              <th>POINTS</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($participant = $participants->fetch_assoc()) {
              echo '<tr class="row">
                <td class="text-center">' . $participant['participant_no'] . '</td>
                <td class="text-center">' . $participant['name'] . 'use</td>
                <td class="text-center">21</td>
              </tr>';
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</body>

</html>