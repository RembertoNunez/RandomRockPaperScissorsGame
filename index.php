<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8 />
        <meta name="description" content="description">
        <title>Rock Paper Scissors</title>
        <link rel="stylesheet" media="screen" href="css/style.css" />
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lekton" rel="stylesheet">
        <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body id="every">
        <h1>Random Rock, Paper, Scissors</h1>
        <h2>
            Enter User Name
        </h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Player One: <input type="text" name="name1"><br><br>
            Player Two: <input type="text" name="name2"><br><br>
            <input type="submit" class="submit" value="ENTER">
        </form>
        <?php 
        $name1 = $name2 = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name1 = test_input($_POST["name1"]);
            $name2 = test_input($_POST["name2"]);
        }
        function test_input($data) {
                $data = htmlspecialchars($data);
                return $data;
            }
            
            $player1 = array(
                'name' => $name1,
                'imgURL' => './userPic/userPic1.png',
                'wins' => 0
                );
                
            $player2 = array(
                'name' => $name2,
                'imgURL' => './userPic/userPic2.png',
                'wins' => 0
                );
                
            $allPlayers = array(
                $player1,
                $player2
                );
        
            function displayHand($randomValue) {
                switch ($randomValue) {
                    case 1: $prize = "paper";
                            break;
                    case 2: $prize = "rock";
                            break;
                    case 3: $prize = "scissor";
                            break;
                }
                echo "<img src= './img/$prize.jpg' id='userpic' alt='$prize' title='".ucfirst($prize)."' height='150' > <br/></p>";
            }
            
        function displayPoints($randomValue1, $randomValue2) {
            echo "<div id='output'>";
            if ($randomValue1 > $randomValue2) {
                switch ($randomValue1) {
                    case 1: $totalPoints = "Paper";
                        break;
                    case 2: $totalPoints = "Rock";
                        break;
                    case 3: $totalPoints = "Scissor";
                        break;
                }
                echo "<h3> $totalPoints Won! </h3>";
            }
            else {
                echo "<h3> Tie! </h3>";
            }
        }
            foreach ($allPlayers as $player) {
                echo "<p>" . "<img src='" . $player['imgURL'] . "' id='hand' />";
                echo  $player['name'];
                for($i=1; $i<2; $i++) {
                    ${"randomValue" . $i } = rand(1,3);
                    displayHand(${"randomValue" . $i});
                }
            }
            displayPoints($randomValue1, $randomValue2);
        ?>
        <section id="right">
            <form>
                <input type="button" class="button" onClick="history.go(0)" value="PLAY!">
            </form>
        </section>
    </body>
    <footer>
        
    </footer>
</html>