<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['user']) || empty($_COOKIE['username']) || $_SESSION['user']['role'] != 1) {
    header("Location: login.php");
}
$user = $_SESSION['user'];

include 'db.php';

$startDate = isset($_GET['printStartDate']) ? $_GET['printStartDate'] : date('Y-m-d'); // Nếu không có 'printStartDate', lấy ngày hiện tại
$endDate = isset($_GET['printToDate']) ? $_GET['printToDate'] : null; // Nếu không có 'printToDate', giá trị sẽ là null


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

// Gán tham số cho câu truy vấn
$stmt->bind_param("issss", $user['id'], $startDate, $startDate, $endDate, $endDate);

// Thực thi câu lệnh
$stmt->execute();

// Lấy kết quả
$result = $stmt->get_result();

// Lấy dữ liệu dạng mảng
$results = $result->fetch_all(MYSQLI_ASSOC);
function getColspan($col, $totalCol = 6)
{
    // Đảm bảo rằng cột và tổng số cột hợp lệ
    if ($col < 1 || $col > $totalCol) {
        return 1; // Mặc định là 1 nếu cột không hợp lệ
    }

    // Tính toán colspan dựa trên tỷ lệ
    $colspan = ceil($totalCol / $col);

    return $colspan;
}

$chunkedResults = array_chunk($results, 4);
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

    <style>
        .bg-warning-bland {
            background-color: #fef2ce !important;
            /* Nhạt hơn mặc định */
        }

        .bg-warning {
            background-color: #fdda70 !important;
            /* Nhạt hơn mặc định */
        }

        #data-container table {
            border: 2px solid black;
            /* Viền bên ngoài bảng */
            border-collapse: collapse;
            /* Gộp viền giữa các ô */
        }

        #data-container table th,
        #data-container table td {
            border: 2px solid black; /* Viền cho các ô */
            /*font-weight: bold; !* Làm chữ đậm *!*/
            padding: 8px; /* Tăng khoảng cách giữa nội dung và viền */
            font-size: 24px; /* Tăng kích thước chữ */
            letter-spacing: 2px; /* Tăng khoảng cách giữa các chữ */
            line-height: 1.5; /* Tăng khoảng cách giữa các dòng */
        }

        .x2 {
            left: 486.000000px;
        }

        .h2 {
            height: 40.084821px;
        }

        .y2 {
            bottom: 1554.100000px;
        }

        .fs0 {
            font-size: 48.000000px;
        }

        .fc0 {
            color: rgb(0, 0, 0);
        }

        .ws0 {
            word-spacing: 0.000000px;
            font-family: "Noto Serif SC", serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
        }

        .x1 {
            left: 529.918000px;
        }

        .y1 {
            bottom: 1587.700000px;
        }

        .fc0 {
            color: rgb(0, 0, 0);
        }

    </style>


    <style>
        /* Lớp nền mờ */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Nền màu đen mờ */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999; /* Đảm bảo lớp nền mờ hiển thị trên cùng */
            overflow: hidden; /* Không cho cuộn */
        }

        /* Ngừng cuộn toàn bộ trang */
        body {
            /*overflow: hidden;*/
        }

        /* Loader */
        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid blue;
            border-bottom: 16px solid blue;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 1s linear infinite; /* Tăng tốc độ quay */
            animation: spin 1s linear infinite; /* Tăng tốc độ quay */
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>

    <title>MyPDP</title>

</head>
<body>
<!--<div class="overlay">-->
<!--    <div class="loader"></div>-->
<!--</div>-->
<div id="data-container" class="ml-5 mr-5 mt-5 p-5">

    <?php foreach ($chunkedResults as $chunkedResult): ?>
        <div class="tableData">
            <div class="header headerPdf mb-5 d-flex justify-content-between pl-5 pr-5">
                <div class="title text-center col-12">
                    <div class="t m0 x1 h2 y1 ff1 fs0 fc0 sc0 ls0 ws0">RANCANGAN PELAJARAN HARIAN 每日教学计划</div>
                </div>

            </div>
            <?php foreach ($chunkedResult as $result): ?>
                <table class="table table-bordered mt-5">
                    <tbody>
                    <!-- Header Row -->
                    <!-- Data Rows -->
                        <tr>
                            <th colspan="6">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <div>
                                        <!--                                    <span>NAMA: ONG SEE LING (019)</span><br>-->
                                        <span>学期 / Penggal: <?php echo $result['penggal']; ?></span>
                                    </div>
                                    <div>
                                        <span>周次 / Minggu: <?php echo $result['minggu']; ?></span>
                                    </div>
                                    <div>
                                        <span>日期 / Tarikh: <?php echo $result['date']; ?></span>
                                    </div>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">
                                <span>班级: <b><?php echo $result['class']; ?></b></span><br>
                                <span>时间: <b><?php echo $result['start']; ?> - <?php echo $result['end']; ?></b></span><br>
                                <span>科目: <b><?php echo $result['sub']; ?></b></span><br>
                                <span>学生人数: <b><?php echo $result['noStu']; ?></b></span>
                            </td>
                            <td colspan="4">
                                <div class="info">
                                    <div class="d-flex justify-content-start">
                                        <span class="col-2">单元:</span>
                                        <span class="col-10 d-flex justify-content-start">
                                        <b><?php echo nl2br(htmlspecialchars($result['tajuk'])); ?></b>
                                    </span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <span class="col-2">内容标准:</span>
                                        <span class="col-10 d-flex justify-content-start">
                                        <b><?php echo nl2br(htmlspecialchars($result['kdg'])); ?></b>
                                    </span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <span class="col-2">学习标准:</span>
                                        <span class="col-10 d-flex justify-content-start">
                                        <b><?php echo nl2br(htmlspecialchars($result['cstd'])); ?></b>
                                    </span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <span class="col-2">学习目标:</span>
                                        <span class="col-10 d-flex justify-content-start">
                                        <b>
                                            <?php echo nl2br(htmlspecialchars($result['op'])); ?>
                                        </b>
                                    </span>
                                    </div>
                                    <!--                                <div class="d-flex justify-content-start">-->
                                    <!--                                    <span class="col-2">教学步骤:</span>-->
                                    <!--                                    <span class="col-10 d-flex justify-content-start">-->
                                    <!--                                        <b>-->
                                    <!---->
                                    <!--                                        </b>-->
                                    <!--                                    </span>-->
                                    <!--                                </div>-->
                                    <div class="d-flex justify-content-start">
                                        <span class="col-2">跨课程元素: </span>
                                        <span class="col-10 d-flex justify-content-start">
                                        <b><?php echo nl2br(htmlspecialchars($result['emk'])); ?></b>
                                    </span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <span class="col-2">教学评估:</span>
                                        <span class="col-10 d-flex justify-content-start">

                                              <b><?php echo nl2br(htmlspecialchars($result['pbd'])); ?></b>

                                    </span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <span class="col-2">Impak/反思:</span>
                                        <span class="col-10 d-flex justify-content-start">
                                        <b><?php echo nl2br(htmlspecialchars($result["refleksi"])); ?></b>
                                    </span>
                                    </div>
                                </div>
                            </td>
                            <td style="width: 10%;"></td>
                        </tr>
                    </tbody>
                </table>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>
<br>
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

    window.addEventListener("load", async () => {
        const {jsPDF} = window.jspdf;
        const pdf = new jsPDF({
            orientation: "portrait", // Hướng trang: "portrait" hoặc "landscape"
            unit: "mm", // Đơn vị: "mm", "cm", "in", hoặc "pt"
            format: "a4" // Kích thước giấy: "a4", "letter", "legal", hoặc mảng [chiều rộng, chiều cao]
        });
        const container = document.getElementById("data-container");

        if (!container) {
            console.error("Không tìm thấy phần tử container");
            return;
        }

        // Lấy tất cả các bảng trong container
        const tables = container.querySelectorAll('.tableData');
        const margin = 2; // Lề cho PDF
        const pageWidth = pdf.internal.pageSize.getWidth(); // Chiều rộng trang PDF
        const pageHeight = (pdf.internal.pageSize.getHeight()); // Chiều cao trang PDF
        const imgWidth = (pageWidth - 2 * margin); // Chiều rộng của ảnh (sau khi trừ margin)

        // Duyệt qua tất cả các bảng và chuyển từng bảng thành ảnh
        for (let i = 0; i < tables.length; i++) {
            const table = tables[i];

            // Dùng html2canvas để chuyển từng bảng thành canvas
            const canvas = await html2canvas(table, {
                scale: 2, // Tăng tỷ lệ để cải thiện chất lượng hình ảnh
                useCORS: true, // Cho phép tải các hình ảnh từ domain khác (nếu có)
                logging: true, // Bật logging để kiểm tra quá trình xử lý (dành cho debug)
                backgroundColor: null // Không có nền màu (giúp ảnh trong suốt nếu không muốn nền màu)
            });

            if (canvas instanceof HTMLCanvasElement) {
                const imgData = canvas.toDataURL("image/png");
                const imgHeight = (canvas.height * imgWidth) / canvas.width; // Tính chiều cao ảnh theo tỷ lệ

                let heightLeft = imgHeight; // Chiều cao còn lại cần vẽ
                let position = margin; // Vị trí bắt đầu vẽ trên trục y (mặt đứng của PDF)

                // Nếu không phải bảng đầu tiên, thêm trang mới
                if (i > 0) {
                    pdf.addPage();
                }

                // Vẽ ảnh vào PDF, nếu chiều cao ảnh còn lớn hơn trang, thêm trang mới
                while (heightLeft > 0) {
                    pdf.addImage(imgData, "PNG", margin, position, imgWidth, Math.min(heightLeft, pageHeight - 2 * margin));
                    heightLeft -= (pageHeight - 2 * margin);
                    if (heightLeft > 0) {
                        pdf.addPage(); // Thêm trang mới nếu cần
                        position = margin; // Reset vị trí vẽ cho trang mới
                    }
                }
            } else {
                console.error("html2canvas không tạo ra đối tượng canvas hợp lệ");
            }
        }

        // Lưu file PDF sau khi tất cả các bảng đã được in ra
           pdf.save("data.pdf");

        // Quay lại trang hiện tại sau khi tải xong PDF
           window.history.back();  // Quay lại trang trước đó
    });
</script>
</body>
</html>