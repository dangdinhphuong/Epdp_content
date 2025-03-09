<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['user']) || $_SESSION['user']['role'] != 2) {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$domain = $protocol . "://" . $_SERVER['HTTP_HOST'];
$newPath = strstr($_SERVER['SCRIPT_NAME'], '/admin', true); // Cắt chuỗi từ đầu đến trước "admin"
// Chuyển hướng đến login.php
header("Location: $domain$newPath/login.php");
}
include '../../db.php';
if (isset($_POST["add"])) {
    $name = $_POST["name"];
    $status = $_POST["status"];

    if ($status == 0) {
        echo '<script>alert("Please select the status !!");</script>';
    } else {
        if (checkSubject($conn, $name) > 0) {
            echo '<script>alert("This subject is already registered !!");</script>';
        } else {
            $sql = "INSERT INTO `subjects`( `name`, `status`) 
                    VALUES ('$name','$status')";

            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("Added subject successfully !!");</script>';
                header('Refresh:2;URL=list.php');
            } else {
                // echo $sql;
                echo '<script>alert("Something went wrong")</script>';
            }
        }
    }
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- <link rel="stylesheet" href="style.css" type="text/css"> -->
    <title>MyPDP</title>
    <style>
        .table-content {
            width: 1000px;
            text-align: center;
        }

        .table-header {
            text-align: center;
            font-weight: bold;
            background-color: white;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }

        td {
            width: 80px;
            height: 40px;
        }

        .center {
            text-align: center;
        }

        .collapsetable {
            border-collapse: collapse;
            border: 3px solid black;
            text-align: center;
            /* margin-left: 30px; */
            width: 140%;
        }

        .btn {
            padding: 10px 20px 10px 20px;
            background: #009dff;
            color: white;
            border: none;
            margin-top: 10px;
            margin-right: 55px;
            cursor: default;
            text-align: center;
        }

        /* .btn:hover {
            background: rgb(137, 207, 240);
            background: linear-gradient(0deg, rgba(137, 207, 240, 1) 0%, rgba(0, 150, 255, 1) 100%);
        } */
        a {
            text-decoration: none;
        }

        #window_add {
            padding: 16px;
            background-color: #ededed;
            width: 800px;
            margin-top: -7%;
            margin-left: 20%;
            font-size: 15px;
            display: none;
            position: absolute;
            /* text-align: center; */
        }

        #window_bulk {
            padding: 16px;
            width: 40%;
            height: 60%;
            background-color: #ededed;
            position: absolute;
            margin-top: -5%;
            margin-left: 25%;
            text-align: center;
            display: none;
        }

        .show {
            width: 60%;
            height: 50%;
            border: 1.5px solid black;
            margin: auto;
            margin-top: 15px;
        }

        .close {
            width: 30px;
            height: 23px;
            /* background-color: red; */
            float: right;
            cursor: default;
        }

        .input, select {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px -100px;
            display: inline-block;
            border: none;
            background: #f1f1f1;
            float: right;
        }

        .input:focus {
            background-color: #ddd;
            outline: none;
        }
    </style>
</head>

<body style="margin:50px 50px 0 50px;">

<?php include '../layout/menu.php'; ?>
<form action="" method="POST">
    <div style="margin: 0px 80px 0 0; float:right">
        <input style="width:250px; height:30px; border-radius: 10px" type="text" name="search">
        <button style="width:65px; height:30px; border-radius: 10px" name="searchbtn"><i
                    class="fa-solid fa-magnifying-glass fa-lg"></i></button>
        <br>
    </div>
</form>
<br><br>
<div>
    <h2 style="float: left; margin-left:5px">SUBJECT</h2>
    <div class="btn" style="float: right" id="add"><span>ADD NEW SUBJECT</span></a>
    </div>

    <br>
    <div id="window_add">
        <div class="close" id="out">&nbsp; &#10006;</div>
        <form action="" method="POST">
            <h1 style="text-align:center">ADD NEW SUBJECTADD</h1>
            <hr>
            <table style="width:100%; margin: 0 10px;">
                <tr>
                    <td>
                        <label for="name"><b>NAME</b></label>
                    </td>
                    <td>
                        <input class="input" type="text" placeholder="Enter subject name" name="name" id="name"
                               required><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="status"><b>STATUS</b></label><br>
                    </td>
                    <td>
                        <select style="" name="status">
                            <option value=0>-- SELECT STATUS --</option>
                            <option value=1>ACTIVE</option>
                            <option value=2>INACTIVE</option>
                        </select><br>
                    </td>
                </tr>
            </table>
            <button style="margin: 0 345px" type="submit" class="btn" name="add">SUBMIT</button>

        </form>

    </div>

    <br>

    <div class="table-content">
        <table class="collapsetable" border="1">
            <thead>
            <tr class="table-header">
                <td>NO</td>
                <td>NAME</td>
                <td>STATUS</td>
                <td>ACTION</td>
            </tr>
            </thead>
            <?php
            $count = 1;
            $sql = "SELECT * FROM `subjects`";

            if (isset($_POST["searchbtn"])) {
                $search = $_POST["search"];
                // $id = $_SESSION["id"];
                $sql = "SELECT * FROM `subjects` WHERE `name` LIKE '%$search%'";
                $result = $conn->query($sql);
                if ($result->num_rows == 0) {
                    echo "<script>alert('The subjects does not exist.')</script>";
                }
            }

            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()){

            ?>
            <tr class="center">
                <?php //print_r($result)
                ?>
                <!-- <td><?php //echo $row["date"]."-".$row["month"]."-".date('Y');
                ?></td> -->
                <td><?php echo $count++; ?></td>
                <td style="text-transform:uppercase"><?php echo $row["name"]; ?></td>
                <td>
                    <?php
                    if ($row["status"] == 1) {
                        echo "ACTIVE";
                    } else {
                        echo "INACTIVE";
                    }
                    ?>
                </td>
                <td><a href="edit.php?id=<?php echo $row["id"]; ?>">EDIT</a> ||

                    <a href="del.php?id=<?php echo $row["id"]; ?>"
                       onclick="return confirm('Are you sure to delete the subject?')">DELETE</a>
                </td>

                <?php
                }
                ?>
                <tbody>

                </tbody>
        </table>
    </div>
    <br>


</body>
<script>
    let add = document.getElementById('add');
    let window_add = document.getElementById('window_add');
    add.onclick = function () {
        window_add.style.display = 'block';
    }
    let out = document.getElementById('out');
    out.onclick = function () {
        window_add.style.display = 'none';
    }
    let bulk = document.getElementById('bulk');
    let window_bulk = document.getElementById('window_bulk');
    bulk.onclick = function () {
        window_bulk.style.display = 'block';
    }
    let close = document.getElementById('close');
    close.onclick = function () {
        window_bulk.style.display = 'none';
    }


</script>
</html>