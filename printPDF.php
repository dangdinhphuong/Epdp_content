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
            font-weight: bold; /* Làm chữ đậm */
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
            font-size: 45px;
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

<div class="overlay">
    <div class="loader"></div>
</div>

<div id="data-container" class="ml-5 mr-5 mt-5 p-5">
    <br><br><br>
    <?php foreach ($results as $index => $result): ?>
        <?php
        $data = json_decode($result['inputRefleksi']);
        $text = nl2br(htmlspecialchars($result["refleksi"]));

        foreach ($data as $value) {
            $text = preg_replace('/__/', ' ' . $value . ' ', $text, 1);
        }
        ?>
        <div class="tableData">
            <?php if ($index == 0): ?>
                <div class="header headerPdf mb-5 d-flex justify-content-between ">
                    <div class="logo-left col-4"><img src="./logoPDF1.png" alt="" style="width: 100%;"></div>
                    <div class="title text-center col-6">
                        <div class="t m0 x1 h2 y1 ff1 fs0 fc0 sc0 ls0 ws0">每日教学计划</div>
                        <div class="t m0 x2 h2 y2 ff1 fs0 fc0 sc0 ls0 ws0">
                            RANCAN<span class="_ _0"></span>GAN PENG<span class="_ _0"></span>AJARAN H<span
                                    class="_ _0"></span>ARIAN
                        </div>
                    </div>
                    <div class="logo-right col-2" style="text-align: right;">
                        <img src="././logoPDF2.png" alt="" style="width: 50%;">
                    </div>
                </div>
            <?php endif; ?>
            <table class="tableTitle table table-bordered bg-warning">
                <tr>
                    <td class="d-print-inline-block , text-center">学年/SESI : <?php
                        $result['date'] = "2025-01-19";
                        $year = substr($result['date'], 0, 4);
                        echo $year; // Kết quả: 2025
                        ?></td>
                    <td class="d-print-inline-block , text-center">学期/PENGGAL: <?php echo $result['penggal']; ?></td>
                    <td class="d-print-inline-block , text-center">周次/MINGGU: <?php echo $result['minggu']; ?></td>
                    <td class="d-print-inline-block , text-center">日期/TARIKH: <?php echo $result['date']; ?> <br>
                        ( ISNIN )
                    </td>
                </tr>
            </table>
            <table class="table table-bordered mt-5">
                <tr>
                    <td class="d-print-inline-block" colspan="1">科目/MATA PELAJARAN : <?php echo $result['sub']; ?></td>
                    <td class="d-print-inline-block" colspan="<?= getColspan(4) ?>">
                        班级/KELAS: <?php echo $result['class']; ?></td>
                    <td class="d-print-inline-bloc" colspan="<?= getColspan(4) ?>">
                        时间/MASA: <?php echo $result['start']; ?>
                        - <?php echo $result['end']; ?></td>
                    <td class="d-print-inline-block , text-center" colspan="<?= getColspan(4) ?>">出席人数/KEHADIRAN
                        MURID:<?php echo $result['noStu']; ?></td>
                </tr>
                <tr>
                    <td class="d-print-inline-block bg-warning-bland">单元/TAJUK:</td>
                    <td class="d-print-inline-block"
                        colspan="6"><?php echo nl2br(htmlspecialchars($result['tajuk'])); ?></td>
                </tr>
                <tr>
                    <td class="d-print-inline-block bg-warning-bland">内容标准 <br> STANDAR KANDUNGAN :</td>
                    <td class="d-print-inline-block"
                        colspan="6"><?php echo nl2br(htmlspecialchars($result['kdg'])); ?></td>
                </tr>
                <tr>
                    <td class="d-print-inline-block bg-warning-bland">学习标准<br>STANDARD<br>PEMBELAJARAN:</td>
                    <td class="d-print-inline-block"
                        colspan="6"><?php echo nl2br(htmlspecialchars($result['cstd'])); ?></td>
                </tr>
                <tr>
                    <td class="d-print-inline-block bg-warning-bland">学习目标 <br> OBJEKTIF <br> PEMBELAJARAN(OP):</td>
                    <td class="d-print-inline-block"
                        colspan="6"><?php echo nl2br(htmlspecialchars($result['op'])); ?></td>
                </tr>
                <tr>
                    <td class="d-print-inline-block bg-warning-bland">达标准则 <br> KRITERIA KEJAYAAN(KK):</td>
                    <td class="d-print-inline-block"
                        colspan="6"><?php echo nl2br(htmlspecialchars($result['kk'])); ?></td>
                </tr>
                <tr>
                    <td class="d-print-inline-block bg-warning-bland">导入(引起动机)<br>AKTIVITI PERMULAAN:</td>
                    <td class="d-print-inline-block"
                        colspan="6"><?php echo nl2br(htmlspecialchars($result['apm'])); ?></td>
                </tr>
                <tr>
                    <td class="d-print-inline-block bg-warning-bland">教学活动<br>AKTIVITI UTAMA:</td>
                    <td class="d-print-inline-block"
                        colspan="6"><?php echo nl2br(htmlspecialchars($result['au'])); ?></td>
                </tr>
                <tr>
                    <td class="d-print-inline-block bg-warning-bland">结束/<br>AKTIVITI PENUTUP:</td>
                    <td class="d-print-inline-block"
                        colspan="6"><?php echo nl2br(htmlspecialchars($result['apn'])); ?></td>
                </tr>
                <tr>
                    <td class="d-print-inline-block bg-warning-bland">跨课程元素/EMK:</td>
                    <td class="d-print-inline-block"
                        colspan="6"><?php echo nl2br(htmlspecialchars($result['emk'])); ?></td>
                </tr>
                <tr>
                    <td class="d-print-inline-block bg-warning-bland">道德价值/NILAI:</td>
                    <td class="d-print-inline-block"
                        colspan="6"><?php echo nl2br(htmlspecialchars($result['nilai'])); ?></td>
                </tr>
                <tr>
                    <td class="d-print-inline-block bg-warning-bland">教具/ABM/BBM：</td>
                    <td class="d-print-inline-block"
                        colspan="6"><?php echo nl2br(htmlspecialchars($result['abm'])); ?></td>
                </tr>
                <tr>
                    <td class="d-print-inline-block bg-warning-bland">思维技能 Kemahiran Berfikir:</td>
                    <td class="d-print-inline-block"
                        colspan="6"><?php echo nl2br(htmlspecialchars($result['kb'])); ?></td>
                </tr>
                <tr>
                    <td class="d-print-inline-block bg-warning-bland">21 世纪教学法/AKTIVITI PAK:</td>
                    <td class="d-print-inline-block"
                        colspan="6"><?php echo nl2br(htmlspecialchars($result['akt21'])); ?></td>
                </tr>
                <tr>
                    <td class="d-print-inline-block bg-warning-bland">思路图/ PETA i-THINK:</td>
                    <td class="d-print-inline-block"
                        colspan="6"><?php echo nl2br(htmlspecialchars($result['peta'])); ?></td>
                </tr>
                <tr>
                    <td class="d-print-inline-block bg-warning-bland">课堂评估/PBD：</td>

                    <td class="d-print-inline-block"
                        colspan="6"><?php echo nl2br(htmlspecialchars($result["pbd"])); ?></td>
                </tr>
                <tr>
                    <td class="d-print-inline-block bg-warning-bland">反思/REFLEKSI:</td>
                    <td class="d-print-inline-block" colspan="6"><?php echo nl2br(htmlspecialchars($text)); ?></td>
                </tr>
                <tr>
                    <td class="d-print-inline-block bg-warning-bland" rowspan="2">后续作业 TUGASAN SUSULAN MURID :</td>
                    <td class="d-print-inline-block"
                        colspan="<?= getColspan(count(json_decode($result['tsm']))) ?>"> 辅导/PEMULIHAN
                    </td>

                    <td class="d-print-inline-block"
                        colspan="<?= getColspan(count(json_decode($result['tsm']))) ?>"> 巩固/PEMULIHAN
                    </td>

                    <td class="d-print-inline-block"
                        colspan="<?= getColspan(count(json_decode($result['tsm']))) ?>"> 增广/PEMULIHAN
                    </td>

                </tr>
                <tr>
                    <?php foreach (json_decode($result["tsm"]) as $tsm): ?>
                        <td class="d-print-inline-block" style=""
                            colspan="<?= getColspan(count(json_decode($result["tsm"]))) ?>">
                            <?= $tsm; ?></td>
                    <?php endforeach; ?>
                </tr>

            </table>
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

        //  Lưu file PDF sau khi tất cả các bảng đã được in ra
        pdf.save("data.pdf");

        // Quay lại trang hiện tại sau khi tải xong PDF
        window.history.back();  // Quay lại trang trước đó
    });
</script>
</body>
</html>