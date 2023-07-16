<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1200px, initial-scale=1.0">
    <title>Projects</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/projects.css">
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
                    <div>
                        <center>
                            <h1 class="title">PROJECTS</h1>
                            <hr id="hr4">
                        </center>
                    </div>
                    <div class="table">
                        <?php
                        require_once('connect.php');
                        $sql = "SELECT * FROM `project` WHERE p_id=$abc ORDER BY project_id DESC";
                        $result = mysqli_query($conn, $sql);
                        ?>

                        <div class="container">

                            <table id="example" style="border-bottom: none;">
                                <thead>
                                    <th style=" border-bottom: none;">Name</th>
                                    <th style=" border-bottom: none;">Technology</th>
                                    <th style=" border-bottom: none;">Duration</th>
                                    <th style=" border-bottom: none; padding-left:100px;">Details</th>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($line = mysqli_fetch_assoc($result)) { ?>
                                        <tr id="tr">
                                            <td style="background:#e8eeff; padding-left: 50px;"><?php echo $line['project_name']; ?></td>
                                            <td style="background: #e8eeff; padding-left: 50px;"><?php echo $line['technology']; ?></td>
                                            <td style="background: #e8eeff; padding-left: 50px;"><?php echo $line['duration']; ?></td>
                                            <td style="width: 50%;background: #e8eeff; padding-left: 50px;">
                                                <?php
                                                $rrr = explode('|', (string) $line['details']);
                                                $i = 0;
                                                while ($i < count($rrr)) {
                                                    echo "<P>" . $rrr[$i] . "</P> <br>";
                                                    $i += 1;
                                                } ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>


</html>