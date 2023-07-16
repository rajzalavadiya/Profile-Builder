<?php
$abc = 0;
if (isset($_GET['id'])) {
    $abc = $_GET['id'];
}else{
    $abc = "1";
}
include 'connect.php';
$sql = "SELECT * FROM `profile` WHERE p_id= $abc ";
$result = mysqli_query($conn, $sql);
if ($result->num_rows  > 0) {
    if ($abc != 0) {
?>

        <div class="nav1">
            <nav>
                <h1 id="logo"><a href="index.php?id=<?php echo $abc ?> ">Profile</a></h1>
                <div class="navbar">
                    <a href="index.php?id=<?php echo $abc ?> " id="home">Home</a>
                    <?php
                    include 'connect.php';
                    $sql = "SELECT * FROM `experience` WHERE p_id=$abc";
                    $result = mysqli_query($conn, $sql);
                    if ($result->num_rows > 0) { ?>
                        <a href="exprience.php?id=<?php echo $abc ?>  " id="exprience">Exprience</a>
                    <?php } ?>
                    <?php
                    $sql = "SELECT * FROM `publication` WHERE p_id=$abc";
                    $result = mysqli_query($conn, $sql);
                    if ($result->num_rows > 0) {
                    ?>
                        <a href="Publication.php?id=<?php echo $abc ?>  " id="publication">Publication</a>
                    <?php } ?>
                    <?php
                    $sql = "SELECT * FROM `project` WHERE p_id=$abc";
                    $result = mysqli_query($conn, $sql);
                    if ($result->num_rows > 0) {
                    ?>
                        <a href="Projects.php?id=<?php echo $abc ?>  " id="projects">Projects</a>
                    <?php } ?>
                    <?php
                    $sql = "SELECT * FROM `certification` WHERE p_id=$abc";
                    $result = mysqli_query($conn, $sql);
                    $sql1 = "SELECT * FROM `workshop` WHERE p_id=$abc";
                    $result1 = mysqli_query($conn, $sql1);
                    if ($result->num_rows > 0 || $result1->num_rows > 0) {
                    ?>
                        <a href="certifition.php?id=<?php echo $abc ?> " id="certifition">Certifition</a>
                    <?php } ?>
                    <?php
                    $sql = "SELECT * FROM `career_objective` WHERE p_id=$abc";
                    $result = mysqli_query($conn, $sql);
                    $sql1 = "SELECT * FROM `achievement` WHERE p_id=$abc";
                    $result1 = mysqli_query($conn, $sql1);
                    $sql2 = "SELECT * FROM `extra_curricular` WHERE p_id=$abc";
                    $result2 = mysqli_query($conn, $sql2);
                    $sql3 = "SELECT * FROM `education` WHERE p_id=$abc";
                    $result3 = mysqli_query($conn, $sql3);
                    $sql4 = "SELECT * FROM `technology` WHERE p_id=$abc";
                    $result4 = mysqli_query($conn, $sql4);
                    if ($result->num_rows > 0 || $result1->num_rows > 0 || $result2->num_rows > 0 || $result3->num_rows > 0 || $result4->num_rows > 0) {
                    ?>
                        <a href="About.php?id=<?php echo $abc ?>  " id="about">About</a>
                    <?php } ?>
                    <a href="Contact.php?id=<?php echo $abc ?>  " id="contact">Contact</a>
                </div>
            </nav>
        </div>
<?php }
} ?>