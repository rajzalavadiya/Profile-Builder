<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gautam</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
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

                <!-------------------------------------------- left side ----------------------------------------------->

                <div class="div">

                    <div class="left_side">
                        <?php
                        include 'connect.php';
                        $sql = "SELECT * FROM `profile` WHERE p_id= $abc ";
                        $result = mysqli_query($conn, $sql);
                        $line = mysqli_fetch_assoc($result);
                        if ($result->num_rows > 0) {


                            if ($line["photo"] != null || $line["name"] != null) {
                        ?>
                                <div class="profile">

                                    <?php if ($line["photo"] != null) {
                                    ?>
                                        <div class="img">
                                            <?php 
                                            echo ' <img src="data:image/jpeg;base64,' . base64_encode($line['photo']) . '" alt="photo"/>'; ?>
                                        </div>
                                    <?php } ?>
                                    <h2><?php echo $line["name"]; ?> </h2>
                                </div>
                            <?php } ?>

                            <div class="content">
                                <?php
                                if ($line["phone"] != null || $line["email"] != null || $line["linkedin"] != null || $line["github"] != null || $line["twitter"] != null) {
                                ?>
                                    <div>
                                        <center>
                                            <h2 class="info">Contact Info</h2>
                                        </center>
                                    </div>
                                <?php } ?>
                                <div>
                                    <ul>
                                        <?php if ($line["phone"] != null) { ?>
                                            <li>
                                                <span class="icon"><i class="fa fa-phone" aria-hidden="true"></i> </span>
                                                <span class="text"> +91 <?php echo $line["phone"]; ?></span>
                                            </li>
                                        <?php } ?>
                                        <?php if ($line["email"] != null) { ?>
                                            <li>
                                                <span class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i> </span>
                                                <span class="text"><?php echo $line["email"]; ?> </span>
                                            </li>
                                        <?php } ?>
                                        <?php if ($line["linkedin"] != null) { ?>
                                            <li>
                                                <span class="icon"><i class="fa fa-linkedin-square" aria-hidden="true" style="width: 30px;"></i> </span>
                                                <span class="text"> <?php echo $line["linkedin"]; ?></span>
                                            </li>
                                        <?php } ?>
                                        <?php if ($line["github"] != null) { ?>
                                            <li>
                                                <span class="icon"><i class="fa fa-github" aria-hidden="true"></i> </span>
                                                <span class="text"> <?php echo $line["github"]; ?></span>
                                            </li>
                                        <?php } ?>
                                        <?php if ($line["twitter"] != null) { ?>
                                            <li>
                                                <span class="icon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                                                <span class="text"> <?php echo $line["twitter"]; ?></span>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>

                        <?php } ?>

                        <?php
                        
                        include 'connect.php';
                        $sql = "SELECT * FROM `education` WHERE p_id=$abc ORDER BY education_id DESC";
                        $result = mysqli_query($conn, $sql);
                        if ($result->num_rows > 0) {
                        ?>
                            <div class="education">
                                <div>
                                    <center>
                                        <h2 class="info1"> EDUCATION </h2>
                                    </center>
                                </div>
                                <div>
                                    <?php while ($line = mysqli_fetch_assoc($result)) { ?>
                                        <p><span> examination </span><span class="text1"><?php echo $line["examination"]; ?></span> </p>
                                        <p><span> institute </span><span class="text1"><?php echo $line["institute"]; ?></span> </p>
                                        <p><span> year </span><span class="text1"><?php echo $line["year"]; ?></span> </p>
                                        <p><span> CGPA </span><span class="text1"><?php echo $line["CGPA/rank"]; ?> </span></p><br>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="learnt">
                            <div>
                                <?php
                                include 'connect.php';
                                $sql = "SELECT * FROM `technology` WHERE type='L'  AND p_id=$abc ";
                                $result = mysqli_query($conn, $sql);
                                if ($result->num_rows > 0) {
                                ?>
                                    <div class='language'>
                                        <div>
                                            <center>
                                                <h2> Languages</h2>
                                            </center>
                                        </div>
                                        <div>
                                            <?php

                                            include 'connect.php';
                                            $sql = "SELECT * FROM `technology` WHERE type='L' AND p_id=$abc ORDER BY technology_id DESC LIMIT 5";
                                            $result = mysqli_query($conn, $sql);
                                            while ($line = mysqli_fetch_assoc($result)) { ?>
                                                <div class='progress'>
                                                    <span><?php echo $line['name']; ?></span>
                                                    <label><?php echo $line['percentage']; ?>%</label>
                                                    <progress value='<?php echo $line['percentage']; ?>' max='100'>
                                                </div>
                                            <?php    } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div>
                                <?php
                                include 'connect.php';
                                $sql = "SELECT * FROM `technology` WHERE type='T' AND p_id=$abc ORDER BY technology_id DESC LIMIT 5";
                                $result = mysqli_query($conn, $sql);
                                if ($result->num_rows > 0) {
                                ?>
                                    <div class='tools'>
                                        <div>
                                            <center>
                                                <h2> Tools</h2>
                                            </center>
                                        </div>
                                        <div>
                                            <?php
                                            $sql = "SELECT * FROM `technology` WHERE type='T' AND p_id=$abc ORDER BY technology_id DESC LIMIT 5";
                                            $result = mysqli_query($conn, $sql);
                                            while ($line = mysqli_fetch_assoc($result)) { ?>
                                                <div class='progress'>
                                                    <span><?php echo $line['name']; ?></span>
                                                    <label><?php echo $line['percentage']; ?>%</label>
                                                    <progress value='<?php echo $line['percentage']; ?>' max='100'>
                                                </div>
                                            <?php  }  ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>


                    <!---------------------------------------------- right side ---------------------------------------------->



                    <div class="right_side">
                        <?php
                        include 'connect.php';
                        $sql = "SELECT * FROM `career_objective` WHERE p_id=$abc ";
                        $result = mysqli_query($conn, $sql);
                        if ($result->num_rows > 0) {
                        ?>

                            <div class="about">
                                <div>
                                    <h1>CARRER OBJECTIVE</h1>
                                    <hr id="hr12">
                                </div>
                                <div>
                                    <?php
                                    include 'connect.php';
                                    $sql = "SELECT * FROM `career_objective` WHERE p_id=$abc ";
                                    $result = mysqli_query($conn, $sql);
                                    while ($line = mysqli_fetch_assoc($result)) {
                                        echo '<p>' . $line["value"] . '</p>';
                                    }
                                    ?>
                                </div>

                            </div>
                        <?php }  ?>
                        <br>

                        <div class="about1">
                            <?php
                            include 'connect.php';
                            $sql = "SELECT * FROM `experience` WHERE p_id=$abc  ORDER BY experience_id DESC LIMIT 5";
                            $result = mysqli_query($conn, $sql);
                            if ($result->num_rows > 0) {
                            ?>
                                <div>
                                    <div>
                                        <h1>Experience</h1>
                                        <hr id="hr12">
                                    </div>
                                    <div class="experience">
                                        <?php while ($line = mysqli_fetch_assoc($result)) { ?>
                                            <div>
                                                <h3 style="padding-bottom: 5px;"><?php echo $line["duration"]; ?> </h3>
                                                <h3><?php echo $line["company_name"]; ?> </h3>
                                            </div>
                                            <div>
                                                <h4><?php echo $line["position"]; ?></h4>
                                                <p>
                                                    <?php $rrr = explode('|', (string) $line['details']);
                                                    $i = 0;
                                                    while ($i < count($rrr)) {
                                                        echo  $rrr[$i] . "<br>";
                                                        $i += 1;
                                                    } ?>
                                                    <br>
                                                </p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="readmore"><a href="exprience.php?id=<?php echo $abc ?>"><button>Read more</button></a> </div>
                            <?php } ?>
                            <br><br>
                            <?php
                            include 'connect.php';
                            $sql = "SELECT * FROM `publication` WHERE p_id=$abc  ORDER BY publication_id DESC LIMIT 5";
                            $result = mysqli_query($conn, $sql);
                            if ($result->num_rows > 0) {
                            ?>
                                <div>
                                    <div>
                                        <h1>Publication</h1>
                                        <hr id="hr12">
                                    </div>
                                    <div class="publication">
                                        <?php while ($line = mysqli_fetch_assoc($result)) { ?>
                                            <div>
                                                <h3 style="padding-bottom: 5px;"><?php echo $line["duration"]; ?></h3>
                                                <h3><?php echo $line["published_on"]; ?></h3>
                                            </div>
                                            <div>
                                                <h4><?php echo  $line["name"]; ?> </h4>
                                                <p>
                                                    <?php
                                                    $rrr = explode('|', (string) $line['details']);
                                                    $i = 0;
                                                    while ($i < count($rrr)) {
                                                        echo $rrr[$i] . "<br>";
                                                        $i += 1;
                                                    } ?>
                                                    <br><br>
                                                </p>
                                            </div>
                                        <?php  } ?>
                                    </div>

                                    <div class="readmore">
                                        <a href="Publication.php?id=<?php echo $abc ?>">
                                            <button>Read more </button>
                                        </a>
                                    </div>

                                </div>
                            <?php } ?>
                            <br>
                            <?php
                            require_once('connect.php');
                            $sql = "SELECT * FROM `project` WHERE p_id=$abc ORDER BY project_id DESC";
                            $result = mysqli_query($conn, $sql);
                            if ($result->num_rows > 0) {
                            ?>
                                <div>
                                    <div>
                                        <h1>projects</h1>
                                        <hr id="hr12">
                                    </div>
                                    <div class="table">
                                        <div class="container">
                                            <table id="example" style="border-bottom: none;">
                                                <thead style="background: #000a;color:#fffe;">
                                                    <th style=" border-bottom: none; text-align:center;">Name</th>
                                                    <th style=" border-bottom: none; text-align:center;">Technology</th>
                                                    <th style=" border-bottom: none; text-align:center;">Duration</th>
                                                    <th style=" border-bottom: none; text-align:center;">More</th>
                                                </thead>
                                                <tbody>
                                                    <?php while ($line = mysqli_fetch_assoc($result)) { ?>
                                                        <tr id="tr">
                                                            <td style="background:white; padding: 5px 20px 5px 20px;"><?php echo $line['project_name']; ?></td>
                                                            <td style="background: white; padding: 5px 20px 5px 20px;"><?php echo $line['technology']; ?></td>
                                                            <td style="background: white; padding: 5px 20px 5px 20px;"><?php echo $line['duration']; ?></td>
                                                            <td style="width: 15%;background: white; padding: 5px 20px 5px 20px;">
                                                                <a href="Projects.php?id=<?php echo $abc ?>">View more</a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <br>
                            <?php
                            include 'connect.php';
                            $sql = "SELECT * FROM `certification` WHERE p_id=$abc ORDER BY certification_id DESC";
                            $result = mysqli_query($conn, $sql);
                            if ($result->num_rows > 0) {
                            ?>
                                <div class="certification">
                                    <div>
                                        <h1>CERTIFICATIONS</h1>
                                        <hr id="hr12">
                                    </div>
                                    <div>
                                        <div class="line">
                                            <?php while ($line = mysqli_fetch_assoc($result)) { ?>
                                                <div class='box'>
                                                    <div class='intership'>
                                                        <h3><?php echo $line['name']; ?></h3>
                                                        <label><span> Issued by :- </span><?php echo $line['issed_by']; ?></label><br>
                                                        <label><span> area :- </span><?php echo $line['area']; ?></label><br>
                                                        <label><span> date :- </span><?php echo $line['issued_on']; ?></label><br><br>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <a href="certifition.php?id=<?php echo $abc ?>">
                                                <div class='box'>
                                                    <center>
                                                        <h2 style="padding-top: 80px;">
                                                            Read more
                                                        </h2>
                                                    </center>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </div>

    <script>
        var abc = document.querySelector(".left_side").offsetHeight;
        abc = abc - 80
        document.querySelector(".right_side").style.height = abc + "px";
    </script>

</body>

</html>