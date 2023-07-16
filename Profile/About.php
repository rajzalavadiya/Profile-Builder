<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1200px, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/about.css">
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
                    $sql = "SELECT * FROM `career_objective` WHERE p_id=$abc";
                    $result = mysqli_query($conn, $sql);
                    if ($result->num_rows > 0) {
                    ?>
                        <div class="career_object">
                            <div class="first">
                                <center>
                                    <h1>CAREER OBJECTIVE</h1>
                                    <hr id="hr7">
                                </center>
                            </div>
                            <div class="object">

                                <div class='line'>
                                    <div class='box'>
                                        <?php while ($line = mysqli_fetch_assoc($result)) { ?>
                                            <p><?php echo $line['value']; ?></p><br>
                                        <?php } ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php } ?>
                    <div class="achievements">
                        <?php
                        include 'connect.php';
                        $sql = "SELECT * FROM `achievement` WHERE p_id=$abc ORDER BY achievement_id DESC";
                        $result = mysqli_query($conn, $sql);
                        if ($result->num_rows > 0) {
                        ?>
                            <div>
                                <center>
                                    <h1>ACHIEVEMENTS</h1>
                                    <hr id="hr8">
                                </center>
                            </div>
                            <div>
                                <div class='line4'>
                                    <?php while ($line = mysqli_fetch_assoc($result)) { ?>
                                        <div class='box4'>
                                            <label><?php echo $line['name']; ?></label><br>
                                            <span>Level :- </span><?php echo $line['level'] ?>
                                            <span>&nbsp&nbsp&nbsp&nbsp&nbsp Time :- </span> <?php echo $line['time']; ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="extra">
                        <?php
                        include 'connect.php';
                        $sql = "SELECT * FROM `extra_curricular` WHERE p_id=$abc ORDER BY ec_id DESC";
                        $result = mysqli_query($conn, $sql);
                        if ($result->num_rows > 0) {
                        ?>
                            <div>
                                <center>
                                    <h1>EXTRA- CURRICULAR</h1>
                                    <hr id="hr9">
                                </center>
                            </div>
                            <div>
                                <div class='line4'>
                                    <?php while ($line = mysqli_fetch_assoc($result)) {  ?>

                                        <div class='box4'>
                                            <label><?php echo  $line['name']; ?> </label><br>
                                            <span>Level :- </span><?php echo $line['level'] ?>
                                            <span>&nbsp&nbsp&nbsp&nbsp&nbspTime :- </span><?php echo $line['time']; ?>

                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div>
                        <?php
                        include 'connect.php';
                        $sql = "SELECT * FROM `education` WHERE p_id=$abc ORDER BY education_id DESC";
                        $result = mysqli_query($conn, $sql);
                        if ($result->num_rows > 0) {
                        ?>
                            <div>
                                <center>
                                    <h1>Education</h1>
                                    <hr id="hr10">
                                </center>
                            </div>
                            <div>
                                <div class="line1">
                                    <?php while ($line = mysqli_fetch_assoc($result)) { ?>
                                        <div class='box1'>
                                            <p>
                                            <h2><?php echo $line['examination']; ?></h2>
                                            </p>
                                            <p> <span>Institute :- </span><?php echo $line['institute']; ?><br> </p>
                                            <p><span>Board/University :- </span> <?php echo $line['board/university']; ?> <br> </p>
                                            <p><span>Year :- </span><?php echo $line['year']; ?> <br> </p>

                                            <p><span>CGPA :- </span><?php echo "CGPA:- " . $line['CGPA/rank']; ?> <br> </p>
                                        </div>
                                    <?php  } ?>
                                </div>
                            <?php } ?>
                            </div>
                    </div>
                    <div>
                        <?php
                        include 'connect.php';
                        $sql = "SELECT * FROM `technology` WHERE type='L' AND p_id=$abc ORDER BY technology_id DESC LIMIT 5";
                        $result = mysqli_query($conn, $sql);
                        if ($result->num_rows > 0) {
                        ?>
                            <div>
                                <center>
                                    <h1>TECHNOLOGY LEARNT</h1>
                                    <hr id="hr11">
                                </center>
                            </div>
                            <div>
                                <div class="line2">
                                    <div class='learnt'>
                                        <div class="box2">
                                            <div class='language'>
                                                <center>
                                                    <h2> Languages</h2>
                                                </center>
                                                <?php while ($line = mysqli_fetch_assoc($result)) { ?>
                                                    <div class='progress'>
                                                        <span><?php echo $line['name']; ?></span>
                                                        <label><?php echo $line['percentage']; ?>%</label>
                                                        <progress value='<?php echo $line['percentage']; ?>' max='100'>

                                                    </div>
                                                <?php    } ?>
                                            </div>
                                            <span class="morebtn"><button id="btn" onclick="popup1()">Read more</button></span>
                                        </div>
                                        <?php
                                        $sql = "SELECT * FROM `technology` WHERE type='T' AND p_id=$abc ORDER BY technology_id DESC LIMIT 5";
                                        $result = mysqli_query($conn, $sql);
                                        ?>
                                        <div class="box2">
                                            <div class='tools'>
                                                <center>
                                                    <h2> Tools</h2>
                                                </center>
                                                <?php while ($line = mysqli_fetch_assoc($result)) { ?>
                                                    <div class='progress'>
                                                        <span><?php echo $line['name']; ?></span>
                                                        <label><?php echo $line['percentage']; ?>%</label>
                                                        <progress value='<?php echo $line['percentage']; ?>' max='100'>
                                                    </div>
                                                <?php  }  ?>
                                            </div>
                                            <span class="morebtn"><button id="btn" onclick="popup2()">Read more</button></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="popup1">
                    <?php
                    include 'connect.php';
                    $sql = "SELECT * FROM `technology` WHERE type='L' AND p_id=$abc ORDER BY technology_id DESC";
                    $result = mysqli_query($conn, $sql);
                    $line = mysqli_fetch_assoc($result)
                    ?>
                    <div class='language'>
                        <div style="display: flex;">
                            <div>
                                <center>
                                    <h2> Languages</h2>
                                </center>
                            </div>
                            <div class="cross">
                                <button onclick="close1()">X</button>
                            </div>
                        </div>
                        <?php while ($line = mysqli_fetch_assoc($result)) { ?>
                            <div class='progress'>
                                <span><?php echo $line['name']; ?></span>
                                <label><?php echo $line['percentage']; ?>%</label>
                                <progress value='<?php echo $line['percentage']; ?>' max='100'>

                            </div>
                        <?php } ?>
                    </div>
                    <div>
                        <center>
                            <button onclick="close1()">Close</button>
                        </center>
                    </div>
                </div>

                <div class="popup2">
                    <?php
                    include 'connect.php';
                    $sql = "SELECT * FROM `technology` WHERE type='T' AND p_id=$abc ORDER BY technology_id DESC";
                    $result = mysqli_query($conn, $sql);
                    $line = mysqli_fetch_assoc($result)
                    ?>

                    <div class='tools'>
                        <div style="display: flex;">
                            <div>
                                <center>
                                    <h2> Tools</h2>
                                </center>
                            </div>
                            <div class="cross">
                                <button onclick="close1()">X</button>
                            </div>
                        </div>
                        <?php while ($line = mysqli_fetch_assoc($result)) { ?>
                            <div class='progress'>
                                <span><?php echo $line['name']; ?></span>
                                <label><?php echo $line['percentage']; ?>%</label>
                                <progress value='<?php echo $line['percentage']; ?>' max='100'>

                            </div>
                        <?php    } ?>
                    </div>
                    <div onclick="close1()">
                        <center>
                            <button>Close</button>
                        </center>
                    </div>
                </div>
        <?php }
        } ?>
    </div>

    <script>
        function popup1() {
            document.querySelector(".popup1").style.visibility = "visible";
        }

        function popup2() {
            document.querySelector(".popup2").style.visibility = "visible";
        }

        function close1() {
            document.querySelector(".popup1").style.visibility = "hidden";
            document.querySelector(".popup2").style.visibility = "hidden";
        }
    </script>

</body>

</html>