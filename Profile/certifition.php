<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1200px, initial-scale=1.0">
    <title>Certifition</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/certifition.css">
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

                <div>
                    <?php
                    include 'connect.php';
                    $sql = "SELECT * FROM `certification` WHERE p_id=$abc ORDER BY certification_id DESC";
                    $result = mysqli_query($conn, $sql);
                    if ($result->num_rows > 0) {
                    ?>
                        <div>
                            <center>
                                <h1>CERTIFICATIONS</h1>
                                <hr id="hr5">
                            </center>
                        </div>
                        <div>
                            <div class="line">

                                <?php while ($line = mysqli_fetch_assoc($result)) { ?>
                                    <div class='box'>
                                        <div class='intership'>
                                            <h2><?php echo $line['name']; ?></h2>
                                            <label><span> Issued by :- </span><?php echo $line['issed_by']; ?></label><br>
                                            <label><span> Area :- </span><?php echo $line['area']; ?></label><br>
                                            <label><span> Date :- </span><?php echo $line['issued_on']; ?></label><br><br>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div>
                    <?php
                    require_once('connect.php');
                    $sql = "SELECT * FROM `workshop` WHERE p_id=$abc ORDER BY workshop_id DESC";
                    $result = mysqli_query($conn, $sql);
                    if ($result->num_rows > 0) {
                    ?>
                        <div>
                            <center>
                                <h1>WORKSHOP</h1>
                                <hr id="hr6">
                            </center>
                        </div>
                        <div class="table">
                            <div class="container">
                                <table id="example" style="border-bottom: none;">
                                    <thead>
                                        <th style="width: 50%;border-bottom: none;">Name</th>
                                        <th style=" border-bottom: none;">Sponcerd By</th>
                                        <th style=" border-bottom: none;">Area</th>
                                        <th style=" border-bottom: none;">Time</th>
                                    </thead>
                                    <tbody>
                                        <?php while ($user = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                                <td style="background:#e8eeff; padding: 10px 0px 10px 30px ;"><?php echo $user['name']; ?></td>
                                                <td style="background:#e8eeff; padding: 10px 0px 10px 30px ;"><?php echo $user['sponcerd_by']; ?></td>
                                                <td style="background:#e8eeff; padding: 10px 0px 10px 30px ;"><?php echo $user['area']; ?></td>
                                                <td style="background:#e8eeff; padding: 10px 0px 10px 30px ;"><?php echo $user['time']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php } ?>
                </div>
        <?php }
        } ?>

        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>

</body>

</html>