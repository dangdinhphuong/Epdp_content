<?php
session_start();
include('../../db.php');
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User</title>
    <style>
        * {
            box-sizing: border-box;
        }

        .container {
            font-family: 'Roboto';
            width: 900px;
            margin: 150px auto 0;
            display: block;
            background: #ededed;
            padding: 10px 50px 20px 50px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        /* form starting stylings ------------------------------- */
        .group {
            display: block;
            /* float: left; */
            margin-left: 80px;
            position: relative;
            margin-bottom: 10px;
        }

        .btn {
            margin-left: 380px;
            padding: 10px 20px 10px 20px;
            background: #009dff;
            color: white;
            border: none;
        }

        /* .btn:hover {
            background: rgb(137, 207, 240);
            background: linear-gradient(0deg, rgba(137, 207, 240, 1) 0%, rgba(0, 150, 255, 1) 100%);
        } */
        input, select {
            margin-left: 150px;
            font-size: 15px;
            padding: 5px;
            display: block;
            width: 300px;
            /* border:none; */
            /* border-bottom:1px solid #757575; */
        }

        .errorWrap {
            padding: 10px;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        .succWrap {
            padding: 10px;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

    </style>
</head>
<body>
<div class="container">

    <h1>EDIT SUBJECT</h1>
    <?php
    $id = $_GET["id"];
    $sql = "SELECT * FROM subjects where id ='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows <= 0) {
        header('Location:user.php');
    }
    $row = $result->fetch_assoc();

    if (isset($_POST["edit"])) {
        $name = $_POST["name"];
        $status = $_POST["status"];
        if (checkSubject($conn, $name, $id) > 0) {
            echo '<script>alert("This subject is already registered !!");</script>';
        }else{
            $sql = "UPDATE `subjects` 
        SET `name`='$name',`status`='$status'
        WHERE id ='$id'";

            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("Updated successfully!")</script>';
                header('Refresh:0;URL=list.php');
            } else {
                //print_r($sql);
                echo '<script>alert("Failed to update!")</script>';
            }
        }
    }
    ?>

    <form action="" method="POST" style="margin-top:30px">
        <table>
            <tr>
                <td>
                    <div class="group">
                        <h3>Name:</h3>
                    </div>
                </td>

                <td>
                    <input type="text" id="name" name="name" value="<?php echo $row["name"] ?>" required><br>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="group">
                        <h3 style="margin-top:8px">STATUS:</h3>
                    </div>
                </td>

                <td>
                    <select style="width:300px; height:28px" name="status">
                        <option value='1' <?php echo $row["status"] == "1" ? "selected" : ""; ?>>ACTIVE</option>
                        <option value='2' <?php echo $row["status"] == "2" ? "selected" : ""; ?>>INACTIVE</option>
                    </select><br>
                </td>
            </tr>


        </table>

        <div>
            <button type="submit" class="btn" name="edit">EDIT</button>
        </div>

    </form>

</div>
</body>
</html>