<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';

    $F_name = $_POST['fname'];
    $L_name = $_POST['lname'];
    $Mobile_no = $_POST['number'];
    $Email = $_POST['email'];
    $massage = $_POST['massage'];

    $sql = "INSERT INTO `data` (`F_name`, `L_name`, `Mobile _no`, `Email`, `massage`) VALUES ('$F_name', '$L_name', '$Mobile_no', '$Email', '$massage');";
    mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1200px, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/Contact.css">
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
                <div>
                    <section>
                        <div class="contact">
                            <div class="info">
                                <?php
                                require_once 'connect.php';
                                $sql = "SELECT * FROM `profile`  WHERE p_id=$abc ";
                                $result = mysqli_query($conn, $sql);
                                $line = mysqli_fetch_assoc($result);
                                ?>
                                <center>
                                    <h1>Contact Info</h1>
                                </center>
                                <br>
                                <?php if ($result->num_rows > 0) { ?>
                                    <ul class="info1">
                                        <?php if ($line["email"] != null) { ?>
                                            <li>
                                                <span class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                                <span><?php echo $line["email"]; ?></span><br>
                                            </li>
                                        <?php } ?>
                                        <?php if ($line["phone"] != null) { ?>
                                            <li>
                                                <span class="icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                                <span><?php echo $line["phone"];   ?></span>
                                            </li>
                                        <?php } ?>

                                        <?php if ($line["linkedin"] != null) { ?>
                                            <li>
                                                <span class="icon"><i class="fa fa-linkedin" aria-hidden="true" style="width: 30px;"></i></span>
                                                <span><?php echo $line["linkedin"];  ?></span>
                                            </li>
                                        <?php } ?>
                                        <?php if ($line["github"] != null) { ?>
                                            <li>
                                                <span class="icon"><i class="fa fa-github-alt" aria-hidden="true"></i></span>
                                                <span><?php echo $line["github"];  ?></span>
                                            </li>
                                        <?php } ?>
                                        <?php if ($line["twitter"] != null) { ?>
                                            <li>
                                                <span class="icon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                                                <span><?php echo $line["twitter"];    ?></span>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } else {
                                    echo "<center><h2> No Information </h2></center>";
                                }
                                ?>

                            </div>

                            <div class="form">
                                <h1>Send a Massage</h1>
                                <form action="Contact.php?id=<?php echo $abc ?>" method="post">
                                    <div class="form1">

                                        <div class="form2">
                                            <input type="text" name="fname" placeholder="First Name" required>
                                        </div>

                                        <div class="form2" style="padding-left: 30px;">
                                            <input type="text" name="lname" placeholder="Last Name" required>
                                        </div>

                                        <div class="form2">
                                            <input type="text" name="number" placeholder="mobile number" required>
                                        </div>

                                        <div class="form2" style="padding-left: 30px;">
                                            <input type="email" name="email" placeholder="Email address" required>
                                        </div>

                                        <div class="form3">
                                            <textarea name="massage" cols="30" rows="7" placeholder="Type your massage" required></textarea>
                                        </div><br>

                                        <button type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
        <?php }
        } ?>
    </div>
</body>

</html>