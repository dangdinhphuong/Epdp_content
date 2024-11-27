
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
require '../vendor/autoload.php';
include '../db.php';

use Maatwebsite\Excel\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Kiểm tra tham số 'file' trong URL để xử lý tải file
if (isset($_GET['file'])) {
    $file = $_GET['file'];
    $filePath = 'files/' . $file;

    // Kiểm tra nếu file tồn tại
    if (file_exists($filePath)) {
        // Set các header để trình duyệt hiểu đây là file tải xuống
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Content-Length: ' . filesize($filePath));

        // Đọc và gửi file cho trình duyệt
        readfile($filePath);
        exit;
    } else {
        echo 'File not found.';
        exit;
    }
}

// Tạo file Excel mẫu nếu không có yêu cầu tải
if (!isset($_GET['file'])) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Thiết lập các header cho file Excel
    $sheet->setCellValue('A1', 'Email');
    $sheet->setCellValue('B1', 'Username');
    $sheet->setCellValue('C1', 'No tel');
    $sheet->setCellValue('D1', 'Credit');
    $sheet->setCellValue('E1', 'Status');

    // Thêm một số dữ liệu mẫu vào file Excel (có thể bỏ qua nếu chỉ muốn header)
    $sheet->setCellValue('A2', 'example@example.com');
    $sheet->setCellValue('B2', 'user1');
    $sheet->setCellValue('C2', '123456789');
    $sheet->setCellValue('D2', '100');
    $sheet->setCellValue('E2', '1');

    // Tạo file Excel và lưu vào thư mục files/
    $writer = new Xlsx($spreadsheet);
    $filePath = 'files/sample.xlsx'; // Lưu file vào thư mục files/
    // Kiểm tra nếu thư mục 'files' có tồn tại
    if (!is_dir(__DIR__ . '/files/')) {
        mkdir(__DIR__ . '/files/', 0777, true);  // Tạo thư mục nếu không có
    }
    $writer->save($filePath);
}


function importExcelFile($fileData, $conn)
{
    // Kiểm tra file upload
    if (!isset($fileData) || $fileData['error'] !== UPLOAD_ERR_OK) {
        return [
            'status' => false,
            'message' => 'Please select a valid Excel file!',
            'data' => []
        ];
    }

    $fileTmpPath = $fileData['tmp_name'];

    try {
        // Load file Excel
        $spreadsheet = IOFactory::load($fileTmpPath);
        $worksheet = $spreadsheet->getActiveSheet();

        $rows = [];
        $countImport = 0;
        $errors = [];

        // Đọc dữ liệu từ file Excel
        foreach ($worksheet->getRowIterator() as $row) {
            $countImport++;

            // Bỏ qua dòng đầu tiên (header)
            if ($countImport <= 1) continue;

            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            $rowData = [];
            foreach ($cellIterator as $cell) {
                $rowData[] = $cell->getValue();
            }
            // Lấy thông tin từ từng dòng
            $email = trim($rowData[0] ?? '');
            $username = trim($rowData[1] ?? '');
            $hp = filter_var($rowData[2] ?? 0, FILTER_VALIDATE_INT);
            $credit = filter_var($rowData[3] ?? 0, FILTER_VALIDATE_INT);
            $status = filter_var($rowData[4] ?? 0, FILTER_VALIDATE_INT);

            // Validate dữ liệu
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Row" . $countImport . ": Invalid email format.";
                continue;
            }

            if (checkEmail($conn, $email) > 0) {
                $errors[] = "Row" . $countImport . ": Email " . $email . " is already registered.";
                continue;
            }

            if (empty($username)) {
                $errors[] = "Row" . $countImport . ": Username is required.";
                continue;
            }

            if (!in_array($status, [1, 2])) {
                $errors[] = 'Row ".$countImport.": Status must be 1 (active) or 2 (inactive).';
                continue;
            }

            // Thêm dữ liệu vào mảng kết quả
            $rows[] = [
                'email' => $email,
                'username' => $username,
                'hp' => $hp ?? 0,
                'credit' => $credit ?? 0,
                'status' => $status
            ];
        }

        // Nếu có lỗi trong quá trình kiểm tra, trả về thông báo lỗi
        if (!empty($errors)) {
            return [
                'status' => false,
                'message' => implode("\n", $errors),
                'data' => []
            ];
        }

        // Trả về dữ liệu đã được kiểm tra
        return [
            'status' => true,
            'message' => 'Import successful',
            'data' => $rows
        ];

    } catch (Exception $e) {
        return [
            'status' => false,
            'message' => 'Error reading Excel file: ' . $e->getMessage(),
            'data' => []
        ];
    }
}

// Xử lý POST request khi upload file
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_FILES['excelFile'])) {
    $result = importExcelFile($_FILES['excelFile'], $conn);
//var_dump($result['message']);die;
    // Kiểm tra kết quả trả về
    if ($result['status']) {
        $password = password_hash('0000', PASSWORD_BCRYPT);
        $values = [];
        $sql = "INSERT INTO user (email, username, password, hp, credit, status) VALUES ";
        foreach ($result['data'] as $user) {
            $values[] = "(
        '{$user['email']}', 
        '{$user['username']}', 
        '{$password}',
        {$user['hp']}, 
        {$user['credit']}, 
        {$user['status']}
    )";
        }

        $sql .= implode(", ", $values) . ";";
        if ($conn->query($sql) === TRUE) {
            echo '<script> alert(' . json_encode($result['message']) . ');  window.location.href = "user.php"; </script>';
        } else {
            // echo $sql;
            echo '<script>alert("Something went wrong");   window.location.href = "user.php";</script>';
        }

    } else {
        echo '<script>  alert(' . json_encode($result['message']) . ');  window.location.href = "user.php"; </script>';
    }
}

if (!empty($_FILES) && !isset($_FILES['excelFile'])) {
    $file = $_FILES["file"]["name"];

    $target_dir = "file/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    // echo $file;
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    echo '<script>
                let window_bulk_csv = document.getElementById("window_bulk_csv");
                window_bulk_csv.style.display = "block";
                let close = document.getElementById("close");
                close.onclick = function(){
                    window_bulk_csv.style.display = "none";
                }
                let bulk = document.getElementById("bulk");
                bulk.onclick = function(){
                    window_bulk_csv.style.display = "block";
                }
                let submit = document.getElementById("submit");
                submit.onclick = function(){
                    location.href = "submit.php"
                }
            </script>';
}

if (isset($_POST["add"]) && !isset($_FILES['excelFile'])) {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $hp = $_POST["hp"];
    $credit = $_POST["credit"];
    $status = $_POST["status"];

    if ($status == 0) {
        echo '<script>alert("Please select the status !!");</script>';
    } else {

        if (!preg_match("/[[:alnum:]]@(.+\.)+[[:alpha:]]/", $email)) {
            echo '<script>alert("Please enter a valid email address !!");</script>';
        } else {

            if (checkEmail($conn, $email) > 0) {
                echo '<script>alert("This email is already registered !!");</script>';
            } else {
                $password = password_hash('0000', PASSWORD_BCRYPT);
                $sql = "INSERT INTO `user`(`email`, `username`, `password`,`hp`,`credit`,`status`) 
                    VALUES ('$email','$username','$password','$hp','$credit','$status')";

                // echo ($sql);
                // echo $conn->query($sql)
                if ($conn->query($sql) === TRUE) {
                    echo '<script>alert("Added user successfully !!");</script>';
                    header('Refresh:2;URL=user.php');
                } else {
                    // echo $sql;
                    echo '<script>alert("Something went wrong")</script>';
                }
            }
        }
    }
}

$count = 1;
$sql = "SELECT * FROM `user`";

// Kiểm tra khi search
if (isset($_POST["searchbtn"])) {
    $search = $_POST["search"];
    $sql = "SELECT * FROM `user`
                    WHERE `email` LIKE '%$search%' OR `username` LIKE '%$search%' OR `hp` LIKE '%$search%' OR `credit` LIKE '%$search%'";

    // Tìm kiếm theo status
    if (preg_match("/^$search$/i", "active")) {
        $sql = "SELECT * FROM `user` WHERE `status` = '1'";
    } elseif (preg_match("/^$search$/i", "inactive")) {
        $sql = "SELECT * FROM `user` WHERE `status` = '2'";
    }

    if (empty($search)) {
        $sql = "SELECT * FROM `user`";
    }

    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        echo "<script>alert('The user does not exist.')</script>";
    }
}

$result = $conn->query($sql);

// Hiển thị kết quả

function readcsv($file)
{
    $test = file($file);
    if (empty($test)) {
        return;
    }
    $final = [];
    $target_dir = "file/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($imageFileType != "csv") {
        echo '<script>alert("Sorry, only CSV files are allowed.")</script>';
        $uploadOk = 0;
        error_reporting(0);
    }
    $_SESSION["uploadOk"] = $uploadOk;
    // echo $_SESSION["uploadOk"];
    for ($i = 0; $i < count($test); $i++) {
        $str = '';
        $subans = [];
        for ($j = 0; $j < strlen($test[$i]); $j++) {
            if ($test[$i][$j] == ',' || $j == strlen($test[$i]) - 1) {
                array_push($subans, $str);
                $str = '';
                continue;
            }
            $str .= $test[$i][$j];
        }
        array_push($final, $subans);
    }
    return $final;
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css" type="text/css"> -->
    <title>MyPDP</title>
    <style>
        .table-content {
            /*width: 1000px;*/
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
        / / background: #009dff;
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

        #window_bulk_csv {
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

        .show-csv {
            width: 60%;
            height: 50%;
            border: 1.5px solid black;
            margin: auto;
            margin-top: 15px;
        }

        .close {
            /*// width: 30px;*/
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

<b style="font-size:35px">MyPDP</b>
<span style="font-size:20px; float: right; margin-right: 80px"><a href="../logout.php">LOGOUT</a></span>
<span style="font-size:18px; float: right; margin-right: 50px">ADMIN</span>
<br>
<hr>
<br>
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
    <h2 style="float: left; margin-left:5px">USER</h2>
    <div class="btn btn-primary" style="float: right" data-toggle="modal" data-target="#exampleModal"> BULK ADD USERS
    </div>
    <!--    <div class="btn btn-primary" style="float: right" id="bulk"><span>ADD BULK USER</span></div>-->
    <div class="btn btn-primary" style="float: right" id="add"><span>ADD NEW USER</span></a></div>
    <br>
    <div id="window_add">
        <div class="close" id="out">&nbsp; &#10006;</div>
        <form action="" method="POST">
            <h1 style="text-align:center">ADD NEW USER</h1>
            <hr>
            <table style="width:100%; margin: 0 10px;">
                <tr>
                    <td style="width: 15%;">
                        <label for="email"><b>EMAIL</b></label>
                    </td>
                    <td>
                        <input class="input" type="text" placeholder="Enter Email" name="email" id="email" required><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="username"><b>USERNAME</b></label>
                    </td>
                    <td>
                        <input class="input" type="text" placeholder="Enter Username" name="username" id="username"
                               required><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="hp"><b>NO TEL</b></label>
                    </td>
                    <td>
                        <input class="input" type="text" placeholder="Enter No Tel" name="hp" id="hp" required><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="credit"><b>CREDIT</b></label>
                    </td>
                    <td>
                        <input class="input" type="text" placeholder="Enter Credit" name="credit" id="credit"
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
            <button style="margin: 0 345px" type="submit" class="btn btn-primary" name="add">SUBMIT</button>

        </form>

    </div>

    <br>
    <div id="window_bulk_csv">
        <div class="close" id="close"> &#10006;</div>
        <h1>BULK ADD USERS WITH CSV</h1>
        <form enctype="multipart/form-data" action="" method="POST">
            <label for="add_file">Choose File :</label>
            <!-- <input type="file" name="file" id="file" multiple onchange='javascript:this.form.submit()'><br><br> -->
            <span style="color:red"><em>Just Allow CSV File</em></span>
        </form>
        <div class="show-csv" style="overflow-y:auto;">
        </div>
        <br>
        <button type="submit" style="margin-top: 0px;" class="btn btn-primary" name="bulk_submit" id="submit">SUBMIT
        </button>
    </div>
    <div class="table-content mt-4">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
            <tr>
                <th scope="col" style="width: 5%;">#</th>
                <th scope="col">Email</th>
                <th scope="col">Username</th>
                <th scope="col">No Tel</th>
                <th scope="col">Credit</th>
                <th scope="col" style="width: 5%;">Status</th>
                <th scope="col" style="width: 18%;">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <th scope="row"><?php echo $count++; ?></th>
                    <td><?php echo htmlspecialchars($row["email"]); ?></td>
                    <td><?php echo htmlspecialchars($row["username"]); ?></td>
                    <td><?php echo htmlspecialchars($row["hp"]); ?></td>
                    <td><?php echo htmlspecialchars($row["credit"]); ?></td>
                    <td>
                        <?php echo ($row["status"] == 1) ? '<span class="btn badge bg-success">ACTIVE</span>' : '<span class="btn badge bg-secondary">INACTIVE</span>'; ?>
                    </td>
                    <td>
                        <a href="edit.php?id=<?php echo $row["id"]; ?>" class="btn btn-sm btn-primary">Edit</a>
                        <a href="del.php?id=<?php echo $row["id"]; ?>" class="btn btn-sm btn-danger"
                           onclick="return confirm('Are you sure to delete the user?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

    </div>
    <br>
</body>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">BULK ADD USERS WITH EXCEL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form enctype="multipart/form-data" action="" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="excelFile">Upload Excel File:</label>
                        <input type="file" class="form-control-file" id="excelFile" name="excelFile"
                               accept=".xls,.xlsx">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import Excel</button>
                    <div class="btn btn-primary" onclick="window.location.href='?file=sample.xlsx'">Download template</div>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="result" class="mt-3"></div>

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
    // let window_bulk_csv = document.getElementById('window_bulk_csv');
    // bulk.onclick = function () {
    //     window_bulk_csv.style.display = 'block';
    // }
    let close = document.getElementById('close');
    close.onclick = function () {
        window_bulk_csv.style.display = 'none';
    }
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</html>