
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScoreBoard</title>
    <style>
        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <header class="text-center">
        <h1>S C O R E B O A R D</h1>
    </header>
    <main style="margin:auto">
        <table style="width: 70%; background-color: whitesmoke;margin: auto;">
            <thead style="border-bottom: 1px solid green; font-size: larger;">
                <tr>
                    <th>Participant No.</th>
                    <th>NAME</th>
                    <th>Judge 1</th>
                    <th>Judge 2</th>
                    <th>Judge 3</th>
                    <th>Total</th>
                </tr>
            </thead>
            <?php
                require './board.php'
            ?>
        </table>
        
    </main>
    
</body>

</html>