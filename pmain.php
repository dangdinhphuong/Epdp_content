<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['user']) || empty($_COOKIE['username']) || $_SESSION['user']['role'] != 1) {
    header("Location: login.php");
}
include("db.php");
$date = $_GET["date"];
$month = $_GET["month"];
$year = $_GET["year"];
$day = $_GET["day"];
$id = (int)$_COOKIE["id"] ?? 1;

$sql = "SELECT * FROM `period`
            WHERE userId = '$id' AND `day` = '$day' AND `status` = 0 ORDER BY std";

$result = $conn->query($sql);
$periodData = $result->fetch_all(MYSQLI_ASSOC);

if (count($periodData) <= 0) {
    echo '<script>alert("Please set the period for this day")</script>';
    echo '<script>window.location.href="process.php"</script>';
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="nav.css" type="text/css">
    <link rel="stylesheet" href="pmain.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <title>MyPDP</title>
</head>
<style>
    body {
        font-family: 'Times New Roman', serif;
    }

    a {
        color: #0000FF;
        text-decoration: none;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<body style="margin:20px 50px 0 50px;">
<nav class="mb-5">
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn" id="hamburger" onclick='a()'>
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
<br>
<hr>
<h2>PROCESS</h2>

<section id="week">
    <?php echo "<h3><span id='date'>$date</span>&nbsp;<span id='month'>$month</span>&nbsp;<span id='year'>$year</span><span id='day' style='display:none'>$day</span></h3>"; ?>
    <b style="font-size:20px">PENGGAL </b><input id="penggal" style="width:50px; height:25px" type="text"
                                                 name="penggal" required>
    <b style="font-size:20px">MINGGU </b> <input id="minggu" style="width:50px; height:25px" type="text"
                                                 name="minggu" required>
</section>
<div class=" mt-4">

    <?php foreach ($periodData as $i => $row) { ?>

        <div class="row mb-3">
            <div class="col-md-3">
                <div class="border p-3">
                    <p><strong>Subject:</strong> <?= $row["sub"] ?></p>
                    <p><strong>Class:</strong> <?= $row["class"] ?></p>
                    <p><strong>Time:</strong> <?= $row["start"] ?> - <?= $row["end"] ?></p>
                    <p><strong>Student No:</strong> <?= $row["noStu"] ?></p>
                </div>
            </div>
            <div class="col-md-9 mb-5">
                <table class="table table-bordered" id="pmain-<?= $i ?>">
                    <span id="pid<?php echo $i ?>" style="display: none;"><?php echo $row["no"] ?></span>


                    <tr>
                        <td class="col-4">
                            <label for="sub"><b>科目/MATA PELAJARAN:</b></label>
                        </td>
                        <td>
                            <b id="<?php echo $row["sub"] ?>"><?php echo $row["sub"] ?></b>
                            <span class="input-text-<?php echo $i ?> " style="display: none"
                                  id="sub"><?php echo $row["sub"] ?></span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="tema"><b>主题/TEMA:</b></label>
                        </td>
                        <td>
                            <button style="width:50px; height:25px; border-radius: 10px"
                                    id="<?php echo $row["sub"] ?>" class="tema">
                                <i class="fas fa-angle-right fa-lg"></i>
                            </button>
                            <br>
                            <span class="input<?php echo $i ?>  input-text-<?php echo $i ?>" id="tema"></span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="tajuk"><b>单元/TAJUK:</b></label>
                        </td>
                        <td>
                            <button style="width:50px; height:25px; border-radius: 10px" class="tajuk"><i
                                        class="fas fa-angle-right fa-lg"></i></button>
                            <br>
                            <span class="input<?php echo $i ?>  input-text-<?php echo $i ?>" id="tajuk"></span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="kdg"><b>内容标准/STANDARD KANDUNGAN:</b></label>
                        </td>
                        <td>
                            <button style="width:50px; height:25px; border-radius: 10px" class="kdg"><i
                                        class="fas fa-angle-right fa-lg"></i></button>
                            <br>
                            <span class="input<?php echo $i ?>  input-text-<?php echo $i ?>" id="kdg"></span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="cstd"><b>学习标准/STANDARD PEMBELAJARAN:</b></label>
                        </td>
                        <td>
                            <button style="width:50px; height:25px; border-radius: 10px" class="cstd"><i
                                        class="fas fa-angle-right fa-lg"></i></button>
                            <br>
                            <span class="input<?php echo $i ?>  input-text-<?php echo $i ?>" id="cstd"></span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="op"><b>学习目标/OBJEKTIF PEMBELAJARAN (OP):</b></label>
                        </td>
                        <td>
                            <button style="width:50px; height:25px; border-radius: 10px" class="op"><i
                                        class="fas fa-angle-right fa-lg"></i></button>
                            <br>
                            <span class="input<?php echo $i ?>  input-text-<?php echo $i ?>" id="op"></span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="kk"><b>达标准则/KRITERIA KEJAYAAN (KK):</b></label>
                        </td>
                        <td>
                            <button style="width:50px; height:25px; border-radius: 10px" class="kk"><i
                                        class="fas fa-angle-right fa-lg"></i></button>
                            <br>
                            <span class="input<?php echo $i ?>  input-text-<?php echo $i ?>" id="kk"></span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="apm"><b>导入(引起动机)/AKTIVITI PERMULAAN:</b></label>
                        </td>
                        <td>
                            <button style="width:50px; height:25px; border-radius: 10px" class="apm"><i
                                        class="fas fa-angle-right fa-lg"></i></button>
                            <br>
                            <span class="input<?php echo $i ?>  input-text-<?php echo $i ?>" id="apm"></span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="au"><b>教学活动/AKTIVITI UTAMA:</b></label>
                        </td>
                        <td>
                            <button style="width:50px; height:25px; border-radius: 10px" class="au"><i
                                        class="fas fa-angle-right fa-lg"></i></button>
                            <br>
                            <span class="input<?php echo $i ?>  input-text-<?php echo $i ?>" id="au"></span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="apn"><b>结束/AKTIVITI PENUTUP:</b></label>
                        </td>
                        <td>
                            <button style="width:50px; height:25px; border-radius: 10px" class="apn"><i
                                        class="fas fa-angle-right fa-lg"></i></button>
                            <br>
                            <span class="input<?php echo $i ?>  input-text-<?php echo $i ?>" id="apn"></span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="emk"><b>跨课程元素/EMK:</b></label>
                        </td>
                        <td>
                            <select style="width:600px; height:35px"
                                    class="input<?php echo $i ?>   input-txt-<?php echo $i ?>" name="emk"
                                    id="emk">
                                <option value=""></option>
                                <?php
                                $sql3 = "SELECT * FROM emk";
                                $result3 = $conn->query($sql3);
                                for ($a = 0; $a < $result3->num_rows; $a++) {
                                    $row3 = $result3->fetch_assoc();
                                    echo "<option value='" . $row3['emk'] . "'>" . $row3['emk'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="nilai"><b>道德价值/NILAI:</b></label>
                        </td>
                        <td>
                            <select style="width:600px; height:35px"
                                    class="input<?php echo $i ?>  input-txt-<?php echo $i ?>" name="nilai"
                                    id="nilai">
                                <option value=""></option>
                                <?php
                                $sql4 = "SELECT * FROM nilai";
                                $result4 = $conn->query($sql4);
                                for ($a = 0; $a < $result4->num_rows; $a++) {
                                    $row4 = $result4->fetch_assoc();
                                    echo "<option value='" . $row4['nilai'] . "'>" . $row4['nilai'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="abm"><b>教具/ABM/BBM:</b></label>
                        </td>
                        <td>
                            <select style="width:600px; height:35px"
                                    class="input<?php echo $i ?>  input-txt-<?php echo $i ?>" name="abm"
                                    id="abm">
                                <option value=""></option>
                                <?php
                                $sql5 = "SELECT * FROM bbm";
                                $result5 = $conn->query($sql5);
                                for ($a = 0; $a < $result5->num_rows; $a++) {
                                    $row5 = $result5->fetch_assoc();
                                    echo "<option value='" . $row5['bbm'] . "'>" . $row5['bbm'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="kb"><b>思维技能/KEMAHIRAN BERFIKIR:</b></label>
                        </td>
                        <td>
                            <select style="width:600px; height:35px"
                                    class="input<?php echo $i ?>  input-txt-<?php echo $i ?>" name="kb"
                                    id="kb">
                                <option value=""></option>
                                <?php
                                $sql6 = "SELECT * FROM `pemikiran`";
                                $result6 = $conn->query($sql6);
                                for ($a = 0; $a < $result6->num_rows; $a++) {
                                    $row6 = $result6->fetch_assoc();
                                    echo "<option value='" . $row6['pemikiran'] . "'>" . $row6['pemikiran'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="peta"><b>思路图/PETA i-THINK:</b></label>
                        </td>
                        <td>
                            <select style="width:600px; height:35px"
                                    class="input<?php echo $i ?>  input-txt-<?php echo $i ?>" name="peta"
                                    id="peta">
                                <option value=""></option>
                                <?php
                                $sql8 = "SELECT * FROM `peta`";
                                $result8 = $conn->query($sql8);
                                for ($a = 0; $a < $result8->num_rows; $a++) {
                                    $row8 = $result8->fetch_assoc();
                                    echo "<option value='" . $row8['peta'] . "'>" . $row8['peta'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="tahap"><b>课堂评估/PBD:</b></label>
                        </td>
                        <td>
                            <input class="input<?php echo $i ?> txt input-txt-<?php echo $i ?>" type="text" name="pbd">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="tahap"><b>表现标准/Tahap PBS:</b></label>
                        </td>
                        <td>
                            <select style="width:600px; height:35px"
                                    class="input<?php echo $i ?>   input-txt-<?php echo $i ?>" name="tahap"
                                    id="tahap">
                                <option value=""></option>
                                <?php
                                $sql9 = "SELECT * FROM `tahap`";
                                $result9 = $conn->query($sql9);
                                for ($a = 0; $a < $result9->num_rows; $a++) {
                                    $row9 = $result9->fetch_assoc();
                                    echo "<option value='" . $row9['tahap'] . "'>" . $row9['tahap'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="akt21"><b>21世纪教学法/AKTIVITI PAK 21:</b></label>
                        </td>
                        <td>
                            <select style="width:600px; height:35px"
                                    class="input<?php echo $i ?>   input-txt-<?php echo $i ?>" name="akt21"
                                    id="akt21">
                                <option value=""></option>
                                <?php
                                $sql7 = "SELECT * FROM `akt21`";
                                $result7 = $conn->query($sql7);
                                for ($a = 0; $a < $result7->num_rows; $a++) {
                                    $row7 = $result7->fetch_assoc();
                                    echo "<option value='" . $row7['aktiviti'] . "'>" . $row7['aktiviti'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="p21"><b>21世纪学习法/PAK-21:</b></label>
                        </td>
                        <td>
                            <select style="width:600px; height:35px"
                                    class="input<?php echo $i ?>   input-txt-<?php echo $i ?>" name="p21"
                                    id="p21">
                                <option value=""></option>
                                <?php
                                $sql14 = "SELECT * FROM `p21`";
                                $result14 = $conn->query($sql14);
                                for ($a = 0; $a < $result14->num_rows; $a++) {
                                    $row14 = $result14->fetch_assoc();
                                    echo "<option value='" . $row14['p21'] . "'>" . $row14['p21'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="praujian"><b>前测/Praujian:</b></label>
                        </td>
                        <td>
                            <select style="width:600px; height:35px"
                                    class="input<?php echo $i ?>   input-txt-<?php echo $i ?>"
                                    name="praujian"
                                    id="praujian">
                                <option value=""></option>
                                <?php
                                $sql15 = "SELECT * FROM `ujian`";
                                $result15 = $conn->query($sql15);
                                for ($a = 0; $a < $result15->num_rows; $a++) {
                                    $row15 = $result15->fetch_assoc();
                                    echo "<option value='" . $row15['type'] . "'>" . $row15['type'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="pascaujian"><b>后测/Pascaujian:</b></label>
                        </td>
                        <td>
                            <select style="width:600px; height:35px"
                                    class="input<?php echo $i ?>   input-txt-<?php echo $i ?>"
                                    name="pascaujian"
                                    id="pascaujian">
                                <option value=""></option>
                                <?php
                                $sql16 = "SELECT * FROM `ujian`";
                                $result16 = $conn->query($sql16);
                                for ($a = 0; $a < $result16->num_rows; $a++) {
                                    $row16 = $result16->fetch_assoc();
                                    echo "<option value='" . $row16['type'] . "'>" . $row16['type'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="6k"><b>6 种'K'元素/Kemahiran 6K:</b></label>
                        </td>
                        <td>
                            <select style="width:600px; height:35px"
                                    class="input<?php echo $i ?>   input-txt-<?php echo $i ?>" name="6k"
                                    id="6k">
                                <option value=""></option>
                                <?php
                                $sql17 = "SELECT * FROM `kemahiran`";
                                $result17 = $conn->query($sql17);
                                for ($a = 0; $a < $result17->num_rows; $a++) {
                                    $row17 = $result17->fetch_assoc();
                                    echo "<option value='" . $row17['kemahiran'] . "'>" . $row17['kemahiran'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="aspirasi"><b>学生愿景/Aspirasi Murid:</b></label>
                        </td>
                        <td>
                            <select style="width:600px; height:35px"
                                    class="input<?php echo $i ?>   input-txt-<?php echo $i ?>"
                                    name="aspirasi"
                                    id="aspirasi">
                                <option value=""></option>
                                <?php
                                $sql18 = "SELECT * FROM `aspirasi`";
                                $result18 = $conn->query($sql18);
                                for ($a = 0; $a < $result18->num_rows; $a++) {
                                    $row18 = $result18->fetch_assoc();
                                    echo "<option value='" . $row18['aspirasi'] . "'>" . $row18['aspirasi'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <!--Nút-->
                    <tr>
                        <td>
                            <label for="refleksi"><b>反思/REFLEKSI:</b></label>
                        </td>
                        <td>
                            <button style="width:50px; height:25px; border-radius: 10px" class="refleksi"><i
                                        class="fas fa-angle-right fa-lg"></i></button>
                            <br>
                            <span class="input<?php echo $i ?> input-text-<?php echo $i ?>" id="refleksi"
                                  name="refleksi"></span><br>
                            <span class="input<?php echo $i ?> input-txt-<?php echo $i ?>" id="inputRefleksi"
                                  name="inputRefleksi"></span>
                        </td>
                    </tr>

                    <tr style="display: none" id="moral" class="krmj<?php echo $i ?>">
                        <td class="col-4">
                            <label for="krmj"><b>S3.3 Krmj (Johor sahaja):</b></label>
                        </td>
                        <td class="col-8">
                            <span class="input<?php echo $i ?> word" id="krmj">3.3.5.5-Mengamalkan Seni Budaya Johor (Gaya kepimpinan Johor ditampil dan ditonjolkan melalui aktiviti murid.)</span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="tsm"><b>后续作业/TUGASAN SUSULAN MURID:</b></label>
                        </td>
                        <td>
                            <input class="input<?php echo $i ?> txt input-txt-<?php echo $i ?>" type="text" name="tsm">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    <?php } ?>

</div>
<button type="submit" class="me-5 px-5 py-2 btn btn-primary" name="submit" id='submit'>SUBMIT</button>
<br>

<?php
$email = $_SESSION['user']['email'];
$sql = "SELECT token FROM user WHERE email = '$email'";
$tokenUser = $conn->query($sql)->fetch_assoc();
?>
</body>
<script>
    let tokenUser = <?php echo $tokenUser['token'] ?? 0; ?>;
    let t = document.getElementsByClassName('tema');
    let tajuk = document.getElementsByClassName('tajuk');

    var getnum;
    var result;

    function get(num) {
        return num;
    }

    function pass(i) {
        return i;
    }

    for (let i = 0; i < t.length; i++) {

        t[i].onclick = function () {
            getnum = get(i);
            result = pass(getnum);
            // alert(t[i].id)

            let sub = document.getElementById(t[i].id);
            let tema = window.open('tema.php?sub=' + sub.innerHTML, '', ' width=400,height=500')

            // Wait for the popup to finish loading
            tema.onload = function () {

                // Attach a function to the popup's form submit event
                tema.document.getElementById("tema").addEventListener("submit", function (event) {
                    // Prevent the form from submitting normally
                    event.preventDefault();

                    // Get the form data
                    var formData = new FormData(event.target);

                    // Pass the form data to the main window
                    window.tema(formData);

                    // Close the popup window
                    tema.close();
                });
            };
        }
    }

    function tema(formData) {
        // Do something with the form data
        let a = (formData.get("tema"));

        let tema = document.querySelector('#tema.input' + result);
        tema.innerHTML = a;
        setTimeout(() => {
            suggest(formData, false);
        }, 0); // Chạy sau vòng lặp hiện tại;
    }

    for (let i = 0; i < tajuk.length; i++) {
        tajuk[i].onclick = function () {
            getnum = get(i);
            result = pass(getnum);

            let tema = document.querySelector('#tema.input' + result);
            // alert(tema.innerText)
            if (tema.innerText.trim() == "" || tema.innerText == null) {
                alert("Please select the 'tema' ")
            } else {
                let tjk = window.open('tajuk.php?tema=' + tema.innerText, '', ' width=400,height=500')

                tjk.onload = function () {

                    tjk.document.getElementById("tajuk").addEventListener("submit", function (event) {
                        event.preventDefault();
                        var formData = new FormData(event.target);
                        window.tjk(formData);
                        tjk.close();
                    });
                };
            }

        }
    }

    function tjk(formData) {
        // Do something with the form data
        let a = (formData.get("tajuk"));
        let taj = document.querySelector('#tajuk.input' + result);

        taj.innerHTML = a;
        setTimeout(() => {
            suggest(formData, false);
        }, 0); // Chạy sau vòng lặp hiện tại;
    }

    function suggest(formData, show = true) {
        let fields = ['tajuk', 'tema', 'kdg', 'cstd', 'op', 'kk', 'apm', 'au', 'apn'];
        let data = {};

        // Lấy dữ liệu từ các phần tử DOM
        fields.forEach(field => {

            let content = $(`#${field}.input${result}`).html(); // Sử dụng let thay cho const

            // if (content === null || content === undefined || content =='') {
            //     content = $(`#${field}-sp${result}`).html();
            // }
            data[field] = content ? content.replace(/<br\s*\/?>/gi, '/n') : ''; // Đảm bảo content không null trước khi replace
        });


        $.ajax({
            type: "POST",
            url: 'getPresetData.php',
            data: data,
            success: function (response) {
                response = JSON.parse(response);

                if (show) {
                    // Xóa các thẻ <span> đã tạo trước đó
                    fields.forEach(field => {
                        let element = document.querySelector(`#${field}.input${result}`);
                        if (element) {
                            element.querySelectorAll(`span[id^="${field}-sp"]`).forEach(span => span.remove());
                        }
                    });
                    if (response.length >= 1) {
                        // Nếu có dữ liệu trả về, hiển thị nội dung mới vào <span> nếu chưa có dữ liệu
                        response.forEach(record => {
                            fields.forEach(field => {
                                if (record[field]) {
                                    $(`#${field}-sp${result}`).remove();
                                    let element = document.querySelector(`#${field}.input${result}`);

                                    if (element && data[field] == '') {

                                        // Format nội dung
                                        let formattedText = record[field].replace(/\r\n/g, '<br>');

                                        // Kiểm tra xem nội dung đã tồn tại chưa
                                        let existingSpans = Array.from(element.parentNode.querySelectorAll(`span[id^="${field}-sp"]`));
                                        let contentExists = existingSpans.some(span => span.innerHTML === formattedText);

                                        if (!contentExists) {
                                            // Tạo một thẻ <span> mới nếu nội dung chưa tồn tại
                                            let span = document.createElement('span');
                                            span.id = `${field}-sp${result}`;
                                            formattedText = formattedText.replace(/\/n/g, '<br>'); // Thay thế tất cả "/n" bằng "\n"
                                            console.log('field',`${field}-sp${result}`, formattedText)
                                            span.innerHTML = formattedText;

                                            // Gắn <span> cùng cấp với element
                                            element.parentNode.insertBefore(span, element.nextSibling);
                                        }
                                    }
                                    else if (data[field] != '') {
                                        console.log('field2',`${field}-sp${result}`)
                                        let existingSpans = Array.from(element.parentNode.querySelectorAll(`span[id^="${field}-sp${result}"]`));
                                        existingSpans.forEach(span => span.remove());
                                    }
                                }
                            });
                        });
                    } else {
                        // Nếu không có dữ liệu trả về, xóa các thẻ <span> đã tạo trước đó
                        fields.forEach(field => {

                            $(`#${field}-sp${result}`).remove();
                        });
                    }
                }
            }
        });
    }


    let table = document.getElementsByClassName('table');
    let kdgbtn = document.getElementsByClassName('kdg');
    let cstdbtn = document.getElementsByClassName('cstd');
    let opbtn = document.getElementsByClassName('op');
    let kkbtn = document.getElementsByClassName('kk');
    let apmbtn = document.getElementsByClassName('apm');
    let aubtn = document.getElementsByClassName('au');
    let apnbtn = document.getElementsByClassName('apn');
    let refleksibtn = document.getElementsByClassName('refleksi');

    for (let i = 0; i < kdgbtn.length; i++) {
        kdgbtn[i].onclick = function () {
            getnum = get(i);
            result = pass(getnum);

            let sub = document.getElementById(t[i].id);
            let tema = document.querySelector('#tema.input' + result);
            let tajuk = document.querySelector('#tajuk.input' + result);
            if (tajuk.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'tajuk' ")
            } else if (tema.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'tema' ")
            } else {
                let kdg = document.querySelector('#kdg.input' + result);
                let kdgpage = window.open('kdg.php?kdg=' + kdg.innerHTML + '&sub=' + sub.innerHTML, '', ' width=400,height=500')

                kdgpage.onload = function () {
                    kdgpage.document.getElementById("kdg").addEventListener("submit", function (event) {
                        event.preventDefault();
                        var formData = new FormData(event.target);
                        window.kdgpage(formData);
                        kdgpage.close();
                    });
                };
            }
        }
    }

    function kdgpage(formData) {
        // Do something with the form data
        let a = (formData.getAll("kdg"));

        let kdg = document.querySelector('#kdg.input' + result);
        let separator = "<br>";
        let kandungan = a.join(separator);

        kdg.innerHTML = kandungan;
        setTimeout(() => {
            suggest(formData, false);
        }, 0); // Chạy sau vòng lặp hiện tại
    }


    for (let i = 0; i < cstdbtn.length; i++) {
        cstdbtn[i].onclick = function () {
            getnum = get(i);
            result = pass(getnum);

            let sub = document.getElementById(t[i].id);
            let tema = document.querySelector('#tema.input' + result);
            let tajuk = document.querySelector('#tajuk.input' + result);
            let kdg = document.querySelector('#kdg.input' + result);
            // alert(cstd.innerHTML)
            // alert(sub.innerHTML)
            if (tajuk.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'tajuk' ")
            } else if (tema.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'tema' ")
            } else if (kdg.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'kdg' ")
            } else {
                let cstd = document.querySelector('#cstd.input' + result);
                let url = `cstd.php?cstd=${encodeURIComponent(cstd.innerHTML)}&sub=${encodeURIComponent(sub.innerHTML)}`;
                let cstdpage = window.open(url, '', 'width=400,height=500');

                cstdpage.onload = function () {
                    cstdpage.document.getElementById("cstd").addEventListener("submit", function (event) {
                        event.preventDefault();
                        var formData = new FormData(event.target);
                        window.cstdpage(formData);
                        cstdpage.close();
                    });
                };
            }
        }
    }

    function cstdpage(formData) {
        // Do something with the form data
        let a = (formData.getAll("cstd"));

        let cstd = document.querySelector('#cstd.input' + result);
        let separator = "<br>";
        let standard = a.join(separator);

        cstd.innerHTML = standard;
        setTimeout(() => {
            suggest(formData);
        }, 0); // Chạy sau vòng lặp hiện tại
    }


    for (let i = 0; i < opbtn.length; i++) {
        opbtn[i].onclick = function () {
            getnum = get(i);
            result = pass(getnum);

            let sub = document.getElementById(t[i].id);
            let tema = document.querySelector('#tema.input' + result);
            let tajuk = document.querySelector('#tajuk.input' + result);
            let kdg = document.querySelector('#kdg.input' + result);
            let cstd = document.querySelector('#cstd.input' + result);
            // alert(cstd.innerHTML)
            // alert(sub.innerHTML)
            if (tajuk.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'tajuk' ")
            } else if (tema.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'tema' ")
            } else if (kdg.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'kdg' ")
            } else if (cstd.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'cstd' ")
            } else {
                let op = document.querySelector('#op.input' + result);

                let url = `op.php?op=${encodeURIComponent(op.innerHTML)}&sub=${encodeURIComponent(sub.innerHTML)}`;
                let oppage = window.open(url, '', ' width=400,height=500')

                oppage.onload = function () {
                    oppage.document.getElementById("op").addEventListener("submit", function (event) {
                        event.preventDefault();
                        var formData = new FormData(event.target);
                        window.oppage(formData);
                        oppage.close();
                    });
                };
            }
        }
    }

    function oppage(formData) {
        // Do something with the form data
        let a = (formData.getAll("op"));

        let op = document.querySelector('#op.input' + result);

        let separator = "<br>";
        let obj = a.join(separator);

        op.innerHTML = obj;
        $('#op-sp' + result).text('');
        setTimeout(() => {
            $('#op-sp' + result).text('');
            suggest(formData);
        }, 0); // Chạy sau vòng lặp hiện tại
    }


    for (let i = 0; i < kkbtn.length; i++) {
        kkbtn[i].onclick = function () {
            getnum = get(i);
            result = pass(getnum);

            let sub = document.getElementById(t[i].id);
            let tema = document.querySelector('#tema.input' + result);
            let tajuk = document.querySelector('#tajuk.input' + result);
            let kdg = document.querySelector('#kdg.input' + result);
            let cstd = document.querySelector('#cstd.input' + result);
            // alert(cstd.innerHTML)
            // alert(sub.innerHTML)
            if (tajuk.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'tajuk' ")
            } else if (tema.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'tema' ")
            } else if (kdg.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'kdg' ")
            } else if (cstd.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'cstd' ")
            } else {
                let kk = document.querySelector('#kk.input' + result);
                let url = `kk.php?kk=${encodeURIComponent(kk.innerHTML)}&sub=${encodeURIComponent(sub.innerHTML)}`;
                let kkpage = window.open(url, '', ' width=400,height=500')

                kkpage.onload = function () {
                    kkpage.document.getElementById("kk").addEventListener("submit", function (event) {
                        event.preventDefault();
                        var formData = new FormData(event.target);
                        window.kkpage(formData);
                        kkpage.close();
                    });
                };
            }
        }
    }

    function kkpage(formData) {
        // Do something with the form data
        let a = (formData.getAll("kk"));
        let kk = document.querySelector('#kk.input' + result);
        let separator = "<br>";
        let kriteria = a.join(separator);
;
        kk.innerHTML = kriteria;
        setTimeout(() => {
            suggest(formData);
        }, 0); // Chạy sau vòng lặp hiện tại
    }


    for (let i = 0; i < apmbtn.length; i++) {
        apmbtn[i].onclick = function () {
            getnum = get(i);
            result = pass(getnum);

            let sub = document.getElementById(t[i].id);
            let tema = document.querySelector('#tema.input' + result);
            let tajuk = document.querySelector('#tajuk.input' + result);
            let kdg = document.querySelector('#kdg.input' + result);
            let cstd = document.querySelector('#cstd.input' + result);
            let op = document.querySelector('#op.input' + result);
            let kk = document.querySelector('#kk.input' + result);

            // alert(cstd.innerHTML)
            // alert(sub.innerHTML)
            if (tajuk.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'tajuk' ")
            } else if (tema.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'tema' ")
            } else if (kdg.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'kdg' ")
            } else if (cstd.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'cstd' ")
            } else if (op.innerText.trim() == "" || op.innerText == null) {
                alert("Please select the 'op' ")
            } else if (kk.innerText.trim() == "" || kk.innerText == null) {
                alert("Please select the 'kk' ")
            } else {
                let apm = document.querySelector('#apm.input' + result);
                let url = `apm.php?apm=${encodeURIComponent(apm.innerHTML)}&sub=${encodeURIComponent(sub.innerHTML)}`;
                let apmpage = window.open(url, '', ' width=400,height=500')

                apmpage.onload = function () {
                    apmpage.document.getElementById("apm").addEventListener("submit", function (event) {
                        event.preventDefault();
                        var formData = new FormData(event.target);
                        window.apmpage(formData);
                        apmpage.close();
                    });
                };
            }
        }
    }

    function apmpage(formData) {
        // Do something with the form data
        let a = (formData.getAll("apm"));
        let apm = document.querySelector('#apm.input' + result);
        let separator = "<br>";
        let mula = a.join(separator);
        apm.innerHTML = mula;
        setTimeout(() => {
            suggest(formData);
        }, 0); // Chạy sau vòng lặp hiện tại
    }


    for (let i = 0; i < aubtn.length; i++) {
        aubtn[i].onclick = function () {
            getnum = get(i);
            result = pass(getnum);

            let sub = document.getElementById(t[i].id);
            let tema = document.querySelector('#tema.input' + result);
            let tajuk = document.querySelector('#tajuk.input' + result);
            let kdg = document.querySelector('#kdg.input' + result);
            let cstd = document.querySelector('#cstd.input' + result);
            let op = document.querySelector('#op.input' + result);
            let kk = document.querySelector('#kk.input' + result);
            let apm = document.querySelector('#apm.input' + result);

            // alert(cstd.innerHTML)
            // alert(sub.innerHTML)
            if (tajuk.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'tajuk' ")
            } else if (tema.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'tema' ")
            } else if (kdg.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'kdg' ")
            } else if (cstd.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'cstd' ")
            } else if (op.innerText.trim() == "" || op.innerText == null) {
                alert("Please select the 'op' ")
            } else if (apm.innerText.trim() == "" || apm.innerText == null) {
                alert("Please select the 'apm' ")
            } else {
                let au = document.querySelector('#au.input' + result);
                let url = `au.php?au=${encodeURIComponent(au.innerHTML)}&sub=${encodeURIComponent(sub.innerHTML)}`;
                let aupage = window.open(url, '', ' width=400,height=500')

                aupage.onload = function () {
                    aupage.document.getElementById("au").addEventListener("submit", function (event) {
                        event.preventDefault();
                        var formData = new FormData(event.target);
                        window.aupage(formData);
                        aupage.close();
                    });
                };
            }
        }
    }

    function aupage(formData) {
        // Do something with the form data
        let a = (formData.getAll("au"));
        let au = document.querySelector('#au.input' + result);
        let separator = "<br>";
        let utama = a.join(separator);

        au.innerHTML = utama;
        setTimeout(() => {
            suggest(formData);
        }, 0); // Chạy sau vòng lặp hiện tại
    }


    for (let i = 0; i < apnbtn.length; i++) {
        apnbtn[i].onclick = function () {
            getnum = get(i);
            result = pass(getnum);

            let sub = document.getElementById(t[i].id);
            let tema = document.querySelector('#tema.input' + result);
            let tajuk = document.querySelector('#tajuk.input' + result);
            let kdg = document.querySelector('#kdg.input' + result);
            let cstd = document.querySelector('#cstd.input' + result);
            let op = document.querySelector('#op.input' + result);
            let kk = document.querySelector('#kk.input' + result);
            let au = document.querySelector('#au.input' + result);
            // alert(cstd.innerHTML)
            // alert(sub.innerHTML)
            if (tajuk.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'tajuk' ")
            } else if (tema.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'tema' ")
            } else if (kdg.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'kdg' ")
            } else if (cstd.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'cstd' ")
            } else if (op.innerText.trim() == "" || op.innerText == null) {
                alert("Please select the 'op' ")
            } else if (kk.innerText.trim() == "" || kk.innerText == null) {
                alert("Please select the 'kk' ")
            } else if (au.innerText.trim() == "" || au.innerText == null) {
                alert("Please select the 'au' ")
            } else {
                let apn = document.querySelector('#apn.input' + result);
                let url = `apn.php?apn=${encodeURIComponent(apn.innerHTML)}&sub=${encodeURIComponent(sub.innerHTML)}`;
                let apnpage = window.open(url, '', ' width=400,height=500')

                apnpage.onload = function () {
                    apnpage.document.getElementById("apn").addEventListener("submit", function (event) {
                        event.preventDefault();
                        var formData = new FormData(event.target);
                        window.apnpage(formData);
                        apnpage.close();
                    });
                };
            }
        }
    }

    function apnpage(formData) {
        // Do something with the form data
        let a = (formData.getAll("apn"));
        let apn = document.querySelector('#apn.input' + result);
        let separator = "<br>";
        let tutup = a.join(separator);

        apn.innerHTML = tutup;
        setTimeout(() => {
            suggest(formData);
        }, 0); // Chạy sau vòng lặp hiện tại
    }


    for (let i = 0; i < refleksibtn.length; i++) {
        refleksibtn[i].onclick = function () {
            getnum = get(i);
            result = pass(getnum);

            let sub = document.getElementById(t[i].id);
            let tema = document.querySelector('#tema.input' + result);
            let tajuk = document.querySelector('#tajuk.input' + result);
            let kdg = document.querySelector('#kdg.input' + result);
            let cstd = document.querySelector('#cstd.input' + result);
            let op = document.querySelector('#op.input' + result);
            let kk = document.querySelector('#kk.input' + result);
            let apm = document.querySelector('#apm.input' + result);
            let au = document.querySelector('#au.input' + result);

            // alert(cstd.innerHTML)
            // alert(sub.innerHTML)
            if (tajuk.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'tajuk' ")
            } else if (tema.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'tema' ")
            } else if (kdg.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'kdg' ")
            } else if (cstd.innerText.trim() == "" || tajuk.innerText == null) {
                alert("Please select the 'cstd' ")
            } else if (kk.innerText.trim() == "" || kk.innerText == null) {
                alert("Please select the 'kk' ")
            } else if (op.innerText.trim() == "" || op.innerText == null) {
                alert("Please select the 'op' ")
            } else if (apm.innerText.trim() == "" || apm.innerText == null) {
                alert("Please select the 'apm' ")
            } else if (au.innerText.trim() == "" || au.innerText == null) {
                alert("Please select the 'apm' ")
            }
            // alert(refleksi.innerHTML)
            // alert(sub.innerHTML)
            // if(tajuk.innerText.trim() == "" || tajuk.innerText == null){
            //     alert("Please select the 'tajuk' ")
            // }else{
            let refleksi = document.querySelector('#refleksi.input' + result);
            let url = `refleksi.php?refleksi=${encodeURIComponent(refleksi.innerHTML)}&sub=${encodeURIComponent(sub.innerHTML)}`;
            let refleksipage = window.open(url, '', ' width=400,height=500')

            refleksipage.onload = function () {
                refleksipage.document.getElementById("refleksi").addEventListener("submit", function (event) {
                    event.preventDefault();
                    var formData = new FormData(event.target);
                    window.refleksipage(formData);
                    refleksipage.close();
                });
            };
            // }
        }
    }

    let int = "";
    let input = "";
    let inputArray = [];
    let cntInput = [];
    let array = [];
    let lsb = "[";
    let rsb = "]";
    let iArray = [];
    let userInputArray = [];
    let uniqueArrays = [];

    function refleksipage(formData) {
        // Do something with the form data
        let a = formData.getAll("refleksi");


        let refleksi = document.querySelector('#refleksi.input' + result);

        let separator = "<br>";
        let impak = a.join(separator);
        input = impak.slice(0, 1);
        input = parseInt(input);


        refleksi.innerHTML = impak.slice(1);

        while (inputRef.firstChild) {
            inputRef.removeChild(inputRef.firstChild);
        }

        array = []; // Reset array to empty before adding new values

        for (let i = 0; i < input; i++) {
            let newInput = document.createElement('input');
            newInput.id = `int${i}`;
            newInput.style.margin = '8px';
            newInput.style.width = '50px';
            newInput.style.height = '30px';
            newInput.type = 'number';
            newInput.min = '1';
            newInput.required = true;

            // Append the input element to the container (inputRef)
            inputRef.appendChild(newInput);

            newInput.addEventListener("input", function (event) {
                let userInput = event.target.value;
                if (userInput < 1) {
                    event.target.setCustomValidity('Please enter a positive number.'); // Show a validation message
                } else {
                    event.target.setCustomValidity(''); // Clear the validation message
                    array[i] = userInput;

                    inputArray = array.filter(Boolean); // Filter out empty or undefined values
                    userInputArray[result] = inputArray;
                }
            });
        }


        iArray = inputArray.slice();

        uniqueArrays = inputArray.reduce((accumulator, currentValue) => {
            if (!accumulator.includes(currentValue)) {
                accumulator.push(currentValue);
            }
            return accumulator;
        }, []);

    }

    let submit = document.getElementById('submit');
    let penggal = document.getElementById('penggal');
    let minggu = document.getElementById('minggu');
    let date = document.getElementById('date');
    let month = document.getElementById('month');
    let year = document.getElementById('year');
    let day = document.getElementById('day');
    let ans = [];
    let inputRefArray = [];
    let cntArray = [];
    // let fieldData = ['tajuk', 'tema', 'kdg', 'cstd', 'op', 'kk', 'apm', 'au', 'apn',"emk","nilai","abm","kbpeta","tahap","akt21","p21","praujian","pascaujian","6k","aspirasi","refleksi","tsm"];

    for (let i = 0; i < table.length; i++) {
        getnum = get(i);
        result = pass(getnum);
        let sub = document.getElementById(t[i].id);
        let krmj = document.querySelector('#krmj.input' + result);
        let moral = document.querySelector('#moral.krmj' + result);

        if (sub.innerHTML == "MORAL") {
            moral.style.display = "";
        }
    }

    $(document).ready(function () {
        $("#submit").click(function () {
            if (tokenUser <= 0) {
                alert("You have run out of tokens");
                return false;
            }
            ans = [];
            let uniqueArray = [];
            uniqueArray.push(uniqueArrays);
            uniqueArray.push(array);

            if (penggal.value !== '' || minggu.value !== '') {
                alert("Please fill in the penggal and minggu");
                window.location.replace('#week');
            } else {

                for (let i = 0; i < table.length; i++) {
                    let input = document.getElementsByClassName('input-txt-' + i);
                    let inputText = document.getElementsByClassName('input-text-' + i);

                    let sub = [];
                    let pid = document.getElementById('pid' + i).innerText;

                    for (let j = 0; j < inputText.length; j++) {
                        var nameKey = inputText[j].name ?? inputText[j].id;
                        var value = inputText[j].innerText ? inputText[j].innerText : $('#' + nameKey + '-sp' + i).text();
                        if (!value || value.trim() === "") {
                            alert("'" + nameKey + "' cannot be left blank!");
                            return false; // Dừng thực hiện các đoạn code tiếp theo
                        }
                        let result = {[nameKey]: value};
                        sub.push(result);
                    }

                    for (let j = 0; j < input.length; j++) {
                        var nameKey = input[j].name ?? input[j].id;
                        result = {[nameKey]: input[j].value};
                        if (nameKey == "inputRefleksi") {
                            result = {[nameKey]: userInputArray[i]};
                        }

                        sub.push(result);
                    }
                    inputRefArray.push(inputArray.filter(Boolean));
                    cntArray.push(cntInput);

                    ans.push({[pid]: sub});
                }
                save(JSON.stringify(ans))
            }


        });

        function save(data) {
            $.ajax({
                url: 'saveProcess.php',
                type: 'POST',
                data: data,
                success: function (response) {
                    try {
                        // Chuyển đổi chuỗi JSON thành đối tượng
                        const responseData = JSON.parse(response);

                        if (responseData.status === 'success') {
                            // Gọi lệnh cập nhật vào cơ sở dữ liệu sau khi API thành công
                            updateStatus(day);
                            updateToken();
                            alert(responseData.message);
                        } else {
                            // Hiển thị thông báo lỗi
                            alert(responseData.message);
                        }
                    } catch (e) {
                        // Nếu có lỗi khi parse JSON, hiển thị lỗi
                        alert('Error parsing response: ' + e.message);
                    }
                },
                error: function (xhr, status, error) {
                    // Hiển thị lỗi nếu yêu cầu AJAX không thành công
                    alert('Error: ' + error);
                }
            });
        }

        function getUrlParameter(name) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(name);
        }

        const day = getUrlParameter('day');
        const year = getUrlParameter('year');
        const month = getUrlParameter('month');
        const date = getUrlParameter('date');

        function updateStatus(responseData) {
            // Dữ liệu để gửi cập nhật vào cơ sở dữ liệu (có thể bao gồm ID, userId, ngày, etc.)
            const updateData = {day: responseData};

            // Thực hiện yêu cầu AJAX để cập nhật bản ghi
            $.ajax({
                url: 'updateStatus.php', // Đường dẫn đến file xử lý cập nhật
                type: 'POST',
                data: updateData,
                success: function (updateResponse) {
                },
                error: function (xhr, status, error) {
                    alert('Error updating status: ' + error);
                }
            });
        }

        function updateToken() {
            $.ajax({
                url: 'setToken.php',
                type: 'POST',
                data: {},
                success: function (response) {
                    try {
                        window.location.href = "process.php"
                    } catch (e) {
                        // Nếu có lỗi khi parse JSON, hiển thị lỗi
                        alert('Error parsing response: ' + e.message);
                    }
                },
                error: function (xhr, status, error) {
                    // Hiển thị lỗi nếu yêu cầu AJAX không thành công
                    alert('Error: ' + error);
                }
            });
        }


    })
    ;
</script>
</html>
