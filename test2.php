<body style="margin:20px 50px 0 50px;">
    <?php
    include("db.php");
    $date = $_GET["date"];
    $month = $_GET["month"];
    $year = $_GET["year"];
    $day = $_GET["day"];
    $id = 1;
    ?>

    <section id="week">
        <?php echo "<h3><span id='date'>$date</span>&nbsp;<span id='month'>$month</span>&nbsp;<span id='year'>$year</span><span id='day' style='display:none'>$day</span></h3>"; ?>
        <b style="font-size:20px">PENGGAL </b><input id="penggal" style="width:50px; height:25px" type="text"
            name="penggal" required>
        <b style="font-size:20px">MINGGU </b> <input id="minggu" style="width:50px; height:25px" type="text"
            name="minggu" required>
    </section>

    <?php

    $sql = "SELECT * FROM `period`
    WHERE userId = '$id' AND `day` = '$day' ORDER BY std";
    $result = $conn->query($sql);
    // echo ($sql);
    // echo "<br>";
    // echo ($result->num_rows);
    if ($result->num_rows == 0) {
        echo '<script>alert("Please set the period for this day")</script>';
        echo '<script>window.location.href="process.php"</script>';
    } elseif ($result->num_rows > 0) {

        for ($i = 0; $i < $result->num_rows; $i++) {
            $row = $result->fetch_assoc();
            // echo $row["sub"];
    ?>

            <div class="container pt-5 pb-3">
                <div class="row">
                    <table class="table" id="pmain">
                        <span id="pid<?php echo $i ?>" style="display: none;"><?php echo $row["no"] ?></span>


                        <tr>
                            <td class="col-4">
                                <label for="sub"><b>科目/MATA PELAJARAN:</b></label>
                            </td>
                            <td>
                                <b id="<?php echo $row["sub"] ?>"><?php echo $row["sub"] ?></b>
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
                                <span class="input<?php echo $i ?>" id="tema"></span>
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
                                <span class="input<?php echo $i ?>" id="tajuk"></span>
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
                                <span class="input<?php echo $i ?>" id="kdg"></span>
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
                                <span class="input<?php echo $i ?>" id="cstd"></span>
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
                                <span class="input<?php echo $i ?>" id="op"></span>
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
                                <span class="input<?php echo $i ?>" id="kk"></span>
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
                                <span class="input<?php echo $i ?>" id="apm"></span>
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
                                <span class="input<?php echo $i ?>" id="au"></span>
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
                                <span class="input<?php echo $i ?>" id="apn"></span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="emk"><b>跨课程元素/EMK:</b></label>
                            </td>
                            <td>
                                <select style="width:600px; height:35px" class="input<?php echo $i ?>" name="emk"
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
                                <select style="width:600px; height:35px" class="input<?php echo $i ?>" name="nilai"
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
                                <select style="width:600px; height:35px" class="input<?php echo $i ?>" name="abm"
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
                                <select style="width:600px; height:35px" class="input<?php echo $i ?>" name="kb"
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
                                <select style="width:600px; height:35px" class="input<?php echo $i ?>" name="peta"
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
                                <input class="input<?php echo $i ?> txt" type="text" name="tsm">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="tahap"><b>表现标准/Tahap PBS:</b></label>
                            </td>
                            <td>
                                <select style="width:600px; height:35px" class="input<?php echo $i ?>" name="tahap"
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
                                <select style="width:600px; height:35px" class="input<?php echo $i ?>" name="akt21"
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
                                <select style="width:600px; height:35px" class="input<?php echo $i ?>" name="p21"
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
                                <select style="width:600px; height:35px" class="input<?php echo $i ?>" name="praujian"
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
                                <select style="width:600px; height:35px" class="input<?php echo $i ?>" name="pascaujian"
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
                                <select style="width:600px; height:35px" class="input<?php echo $i ?>" name="6k"
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
                                <select style="width:600px; height:35px" class="input<?php echo $i ?>" name="aspirasi"
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
                                <span class="input<?php echo $i ?>" id="refleksi"></span><br>
                                <span class="input<?php echo $i ?>" id="inputRefleksi"></span>
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
                                <input class="input<?php echo $i ?> txt" type="text" name="tsm">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

    <?php

        }
    }

    ?>
    <button type="submit" class="me-5 px-5 py-2 btn btn-primary" name="submit" id='submit'>SUBMIT</button>
    <br>

</body> kiểm tra xem khi click vào submit thì dữ nó đi đâu để xử lý