<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1200px, initial-scale=1.0">
    <title>Exprince</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/experience.css">
    <script src="jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="mobile">
        <center>
            Open in Desktop
        </center>
    </div>

    <div class="desktop">
        <?php
        include 'nav.php';
        include 'connect.php';
        $sql = "SELECT * FROM `profile` WHERE p_id= $abc ";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows  > 0) {
            if ($abc != 0) {
        ?>

                <div class="contact">
                    <?php
                    include 'connect.php';
                    $sql = "SELECT * FROM `experience` WHERE type='J' AND p_id=$abc ORDER BY experience_id DESC";
                    $result = mysqli_query($conn, $sql);
                    if ($result->num_rows > 0) {
                    ?>
                        <div class="job">
                            <div>
                                <center>
                                    <h1 class="title">JOBS</h1>
                                    <hr id="hr1">
                                </center>
                            </div>
                            <div>
                                <div class="line">
                                    <?php while ($line = mysqli_fetch_assoc($result)) { ?>
                                        <div class='box'>
                                            <div class='jobs'>
                                                <h2><?php echo $line['position']; ?></h2>
                                                <span> Company Name :- </span><?php echo $line['company_name']; ?><br>
                                                <span> Duration :- </span><?php echo $line['duration']; ?><br>
                                                <span> Project Name :- </span><?php echo $line['project_name']; ?><br>
                                                <span> Technology :- </span><?php echo $line['technology']; ?><br>
                                                <span> Details :- </span>
                                                <?php
                                                $rrr = explode('|', (string) $line['details']);
                                                $i = 0;
                                                $num = 1;
                                                while ($i < count($rrr)) {
                                                    echo $rrr[$i] . "<br>";
                                                    $i += 1;
                                                } ?>
                                                <br>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    include 'connect.php';
                    $sql = "SELECT * FROM `experience` WHERE type='E' AND p_id=$abc ORDER BY experience_id DESC";
                    $result = mysqli_query($conn, $sql);
                    if ($result->num_rows > 0) {
                    ?>
                        <div class="internships">
                            <div>
                                <center>
                                    <h1 class="title">INTERNSHIPS</h1>
                                    <hr id="hr2">
                                </center>
                            </div>
                            <div>
                                <div class="line">

                                    <?php while ($line = mysqli_fetch_assoc($result)) { ?>
                                        <div class='box'>
                                            <div class='jobs'>
                                                <h2><?php echo $line['position']; ?></h2>
                                                <span> Company Name :- </span><?php echo $line['company_name']; ?><br>
                                                <span> Duration :- </span><?php echo $line['duration']; ?><br>
                                                <span> Project Name :- </span><?php echo $line['project_name']; ?><br>
                                                <span> Technology :- </span><?php echo $line['technology']; ?><br>
                                                <span> Details :- </span>

                                                <?php
                                                $rrr = explode('|', (string) $line['details']);
                                                $i = 0;
                                                while ($i < count($rrr)) {
                                                    echo $rrr[$i] . "<br>";
                                                    $i += 1;
                                                } ?>
                                                <br>
                                            </div>
                                        </div>

                                    <?php    } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
        <?php }
        } ?>
    </div>

</body>

</html>