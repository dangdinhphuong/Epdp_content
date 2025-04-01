<?php

// Kích hoạt hiển thị lỗi để dễ dàng debug
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Kiểm tra nếu session chưa được khởi tạo
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra nếu session user không tồn tại hoặc cookie username không có hoặc quyền user không phải là admin (role = 1)
if (empty($_SESSION['user']) || empty($_COOKIE['username']) || $_SESSION['user']['role'] != 1) {
    header("Location: login.php");
    exit();
}

// Lấy thông tin user từ session
$user = $_SESSION['user'];

// Kết nối cơ sở dữ liệu
include 'db.php';

// Lấy ngày bắt đầu và kết thúc từ URL (nếu có), nếu không lấy ngày hiện tại
$startDate = isset($_GET['printStartDate']) ? $_GET['printStartDate'] : date('Y-m-d');
$endDate = isset($_GET['printToDate']) ? $_GET['printToDate'] : null;

// Lấy query string từ URL
$queryString = $_SERVER['QUERY_STRING'];

// Mảng dữ liệu mẫu
$data = ['dr', 'dfd', 'djd', 'gfhgc', 'ghjfgjh', 'fgj', 'cgfj', 'gfjc'];

// Chuẩn bị câu truy vấn SQL
$sql = "SELECT *
        FROM `process`
        LEFT JOIN `period` ON `process`.`period_id` = `period`.`no`
        WHERE `period`.`userId` = ? 
          AND `period`.`status` = 1 
          AND (? IS NULL OR `period`.`date` >= ?) 
          AND (? IS NULL OR `period`.`date` <= ?)";

// Chuẩn bị câu lệnh với mysqli
$stmt = $conn->prepare($sql);

// Kiểm tra nếu câu lệnh chuẩn bị không thành công
if (!$stmt) {
    die('Prepare failed: ' . $conn->error);
}

// Gán tham số cho câu truy vấn
$stmt->bind_param("issss", $user['id'], $startDate, $startDate, $endDate, $endDate);

// Thực thi câu lệnh
if (!$stmt->execute()) {
    die('Execute failed: ' . $stmt->error);
}

// Lấy kết quả
$result = $stmt->get_result();

// Lấy dữ liệu dạng mảng
$results = $result->fetch_all(MYSQLI_ASSOC);

// Hàm tính toán colspan
function getColspan($col, $totalCol = 6) {
    // Đảm bảo rằng cột và tổng số cột hợp lệ
    if ($col < 1 || $col > $totalCol) {
        return 1; // Mặc định là 1 nếu cột không hợp lệ
    }

    // Tính toán colspan dựa trên tỷ lệ
    $colspan = ceil($totalCol / $col);

    return $colspan;
}

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="nav.css" type="text/css">
    <link rel="stylesheet" href="table.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@200..900&display=swap" rel="stylesheet">
    <title>MyPDP</title>

</head>
<body>

<?php //include ("nav.php");?>

<div style="margin:20px 50px 0 50px;">
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn" id="hamburger">
            &#9776;
        </label>
        <label class="logo">MyPDP</label>
        <ul class="ul">
            <li><?php echo $_COOKIE["username"]; ?></li>
            <li><a href="period.php">SETTING</a></li>
            <li><a href="process.php">PROCESS</a></li>
            <li><a href="print.php">PRINT</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
        </ul>
    </nav>
    <br><br><br>
    <hr>
    <br>
    <h2>LIST PRINT</h2>
    <form id="dateForm" action="" method="GET" onsubmit="submitForm(event)">
        <div class="form-row align-items-center">
            <div class="col-sm-3 my-1">
                <label class="mr-sm-2" for="printStartDate">PRINT START DATE</label>
                <input type="date" class="form-control" id="printStartDate" name="printStartDate" placeholder="PRINT START DATE" value="<?php echo $startDate; ?>" required>
            </div>
            <div class="col-sm-3 my-1">
                <label class="mr-sm-2" for="printToDate">PRINT END DATE</label>
                <input type="date" class="form-control" id="printToDate" name="printToDate" placeholder="PRINT TO DATE" value="<?php echo $endDate; ?>" required>
            </div>
            <div class="col-auto my-1" style="padding-top: 32px;">
                <button type="submit" class="btn btn-primary">Submit</button>
                <?php if(count($results) >= 1) :?>
                    <a href="./printPDF.php?<?= $queryString ?>" class="btn btn-outline-warning">Upload GC/ Print</a>
                    <a href="./printPDF2.php?<?= $queryString ?>" class="btn btn-outline-success">Upload GC</a>
                <?php endif ?>
            </div>
        </div>
    </form>
    <div class="table-content" style="overflow-x: auto; width: 100%; display: none">
        <table id="collapsetable" class="collapsetable" border="1">
            <thead>
            <tr class="table-header">
                <th colspan="2">Id</th>
                <th colspan="2">Date</th>
                <th>Sub</th>
                <th>Tema</th>
                <th>Tajuk</th>
                <th>KDG</th>
                <th>CSTD</th>
                <th>OP</th>
                <th>KK</th>
                <th>APM</th>
                <th>AU</th>
                <th>APN</th>
                <th>Refleksi</th>
                <th>EMK</th>
                <th>Nilai</th>
                <th>ABM</th>
                <th>KB</th>
                <th>Peta</th>
                <th>TSM</th>
                <th>Tahap</th>
                <th>Akt21</th>
                <th>P21</th>
                <th>Praujian</th>
                <th>Pascaujian</th>
                <th>6K</th>
                <th>Aspirasi</th>
                <th>InputRefleksi</th>
                <th>PBD</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $result): ?>
                <tr>
                    <td colspan="2"><?php echo nl2br(htmlspecialchars($result['no'])); ?></td>
                    <td colspan="2"><?php echo nl2br(htmlspecialchars($result['date'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($result['sub'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($result['tema'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($result['tajuk'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($result['kdg'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($result['cstd'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($result['op'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($result['kk'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($result['apm'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($result['au'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($result['apn'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($result['refleksi'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($result['emk'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($result['nilai'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($result['abm'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($result['kb'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($result['peta'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($result['tsm'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($result['tahap'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($result['akt21'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($result['p21'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($result['praujian'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($result['pascaujian'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($result['6k'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($result['aspirasi'])); ?></td>
                    <td>
                        <?php
                        // Giải mã chuỗi JSON thành mảng
                        $inputRefleksiArray = json_decode($result['inputRefleksi']);

                        // Kiểm tra nếu chuỗi có thể giải mã được và nếu đúng kiểu mảng
                        if (is_array($inputRefleksiArray)) {
                            // Nối các phần tử mảng thành chuỗi với dấu phẩy, không có xuống dòng
                            echo htmlspecialchars(implode(', ', $inputRefleksiArray));
                        } else {
                            // Nếu không phải mảng, hiển thị chuỗi gốc
                            echo htmlspecialchars($result['inputRefleksi']);
                        }
                        ?>
                    </td>
                    <td><?php echo nl2br(htmlspecialchars($result["pbd"])); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br><br><br>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
    function submitForm(event) {
        event.preventDefault();  // Ngăn form gửi theo cách thông thường và reload trang

        // Lấy giá trị từ các input
        var startDate = document.getElementById('printStartDate').value;
        var toDate = document.getElementById('printToDate').value;

        // Kiểm tra nếu các trường ngày không trống
        if (!startDate || !toDate) {
            alert("Both Start Date and End Date are required.");
            return;  // Dừng thực hiện nếu không có giá trị
        }

        // Kiểm tra startDate phải nhỏ hơn toDate
        if (new Date(startDate) >= new Date(toDate)) {
            alert("Start Date must be earlier than End Date.");
            return;  // Dừng thực hiện nếu startDate không nhỏ hơn toDate
        }

        // Tạo URL với query string
        var url = window.location.href.split('?')[0]; // Lấy URL hiện tại mà không có query string
        var newUrl = url + '?printStartDate=' + encodeURIComponent(startDate) + '&printToDate=' + encodeURIComponent(toDate);

        // Thực hiện GET request (reload trang với query mới)
        window.location.href = newUrl;  // Sử dụng URL mới đã được gắn query string
    }

    $(document).ready(function () {
        // Lấy ngày hiện tại dưới định dạng YYYY-MM-DD
        var today = new Date().toISOString().split('T')[0];

        // Đặt giá trị ngày hôm nay cho các input
        $('#printStartDate').val(today);
        // $('#printToDate').val(today);

        $('#dateForm').on('submit', function (e) {
            e.preventDefault(); // Ngừng gửi form để xử lý

            var startDate = $('#printStartDate').val();
            var endDate = $('#printToDate').val();

            // Chuyển đổi định dạng từ 'YYYY-MM-DD' sang 'Ymd' (Không có dấu gạch ngang)
            if (startDate) {
                startDate = startDate.replace(/-/g, '');
            }

            if (endDate) {
                endDate = endDate.replace(/-/g, '');
            }

            // Hiển thị kết quả sau khi chuyển đổi (có thể thay thế bằng việc gửi dữ liệu hoặc xử lý khác)
            console.log('Start Date:', startDate);
            console.log('End Date:', endDate);

            // Gửi form nếu cần
            // $(this).submit(); // Uncomment để thực sự gửi form nếu cần
        });
    });
</script>
</body>
</html>