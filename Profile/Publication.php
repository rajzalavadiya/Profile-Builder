<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1200px, initial-scale=1.0">

    <title>Publication</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/publication.css">
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
                    $sql = "SELECT * FROM `publication` WHERE p_id=$abc ORDER BY publication_id DESC";
                    $result = mysqli_query($conn, $sql);
                    if ($result->num_rows > 0) {
                    ?>
                        <div class="publication">
                            <div>
                                <center>
                                    <h1 class="title">PUBLICATION</h1>
                                    <hr id="hr3">
                                </center>
                            </div>

                            <div class="all">
                                <div class="left">
                                    <?php
                                    include 'connect.php';
                                    $sql = "SELECT * FROM `publication` WHERE MOD(publication_id,2)=0 AND p_id=$abc ORDER BY publication_id DESC";
                                    $result = mysqli_query($conn, $sql);
                                    echo "<div class='space'> </div>";
                                    while ($line = mysqli_fetch_assoc($result)) { ?>

                                        <div class='projects'>

                                            <div class='info'>
                                                <h3><?php echo $line['duration']; ?></h3>
                                                <h2><?php echo  $line['name']; ?></h2>
                                                <p><span>Published on : - </span> <?php echo  $line['published_on']; ?></p>
                                                <p><span>Link : - </span><a href="<?php echo $line['link']; ?>" target="_blank"><?php echo  $line['link']; ?></a> </p>
                                                <?php
                                                $rrr = explode('|', (string) $line['details']);
                                                $i = 0;
                                                while ($i < count($rrr)) {
                                                    echo "<p>" . $rrr[$i] . "</p>";
                                                    $i += 1;
                                                } ?>
                                                <br>
                                            </div>

                                        </div>
                                    <?php } ?>

                                </div>
                                <?php
                                include 'connect.php';
                                $sql = "SELECT * FROM `publication` WHERE p_id=$abc";
                                $result = mysqli_query($conn, $sql);
                                $height = 21 * $result->num_rows;
                                ?>
                                <div class="center" style="height: <?php echo $height . "vh"; ?>;">
                                    <?php

                                    $a = mysqli_num_rows($result);

                                    for ($i = 0; $i < $a; $i++) {
                                        echo '<div class="dote"></div>';
                                    }
                                    ?>
                                </div>

                                <div class="right">
                                    <?php
                                    include 'connect.php';
                                    $sql = "SELECT * FROM `publication` WHERE MOD(publication_id,2)!=0 AND p_id=$abc ORDER BY publication_id DESC";
                                    $result = mysqli_query($conn, $sql);
                                    while ($line = mysqli_fetch_assoc($result)) { ?>
                                        <div class='project'>
                                            <ul>
                                                <li>
                                                    <div class='info'>
                                                        <h3><?php echo $line['duration']; ?></h3>
                                                        <h2><?php echo $line['name']; ?></h2>
                                                        <p><span>Published on : - </span> <?php echo  $line['published_on']; ?></p>
                                                        <p><span>Link : - </span><a href="<?php echo $line['link']; ?>" target="_blank"><?php echo  $line['link']; ?></a> </p>
                                                        <?php
                                                        $rrr = explode('|', (string) $line['details']);
                                                        $i = 0;
                                                        while ($i < count($rrr)) {
                                                            echo "<p>" . $rrr[$i] . "</p>";
                                                            $i += 1;
                                                        } ?>
                                                        <br>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
        <?php }
        } ?>

</body>

</html>