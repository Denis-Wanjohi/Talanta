<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>ScoreBoard</title>
    <style>
        .text-center {
            text-align: center;
        }
    </style>
</head>
<?php
require_once '../database/db.php';

$sql = 'select * from participants';
$results = $conn->query($sql);
$sql = 'select * from score';
$ps = $conn->query($sql);
$all_particiants = [];
if ($results->num_rows > 0) {
    while ($res = $results->fetch_assoc()) {
        $data = [
            'participant_no' => $res['participant_no'],
            'name' => $res['name'],
            'judge_1' =>  scores($res['participant_no'], $ps, 'j#01'),
            'judge_2' =>  scores($res['participant_no'], $ps, 'j#02'),
            'judge_3' =>  scores($res['participant_no'], $ps, 'j#03'),
            'total' => scores($res['participant_no'], $ps, 'j#01') +
                scores($res['participant_no'], $ps, 'j#02') +
                scores($res['participant_no'], $ps, 'j#03')
        ];
        array_push($all_particiants, $data);
    }
}
usort($all_particiants, function ($a, $b) {
    return $b['total'] - $a['total'];
});


function scores($participant, $ps, $judge)
{
    if ($ps->num_rows > 0) {
        while ($p = $ps->fetch_assoc()) {
            if ($p['participant_no'] == $participant && $p['judge_no'] == $judge) {
                $ps->data_seek(0);
                return $p['score'];
            }
        }
        $ps->data_seek(0);
        return '00';
    } else {

        $ps->data_seek(0);
        return 00;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = 'select * from participants';
    $results = $conn->query($sql);
    $sql = 'select * from score';
    $ps = $conn->query($sql);
}
?>

<tbody id="dataTable">
    <?php
    for ($i = 0; $i < count($all_particiants); $i++) {
        echo (
            '
            <tr>
                <td class="text-center top">' . $all_particiants[$i]['participant_no'] . '</td>
                <td class="text-center top">' . $all_particiants[$i]['name'] . '</td>
                <td style="text-align: center;" class="top">' . $all_particiants[$i]['judge_1'] . '</td>
                <td class="text-center">' . $all_particiants[$i]['judge_2'] . '</td>
                <td class="text-center">' . $all_particiants[$i]['judge_3'] . '</td>
                <td class="text-center">' . $all_particiants[$i]['total'] . '</td>
            </tr>
            '
        );
    }
    ?>
</tbody>
<form action="index.php" method="POST">
    <input type="hidden">
    <button type="submit" style="visibility: hidden;" id="submit"></button>
</form>
<script>
    let dt = document.getElementById("dataTable")
    let bt = document.getElementById("submit")

    // bt.addEventListener('click',)
    // dt.style.visibility =  "hidden"
    function submitForm() {
        fetch('board.php', {
            method: 'post'
        })
        console.log('oss')
    }
    let x = true
    setInterval(() => {
        // submitForm()
        bt.click()
    }, 5000);
</script>

</html>