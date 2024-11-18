<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include("db.php") ?>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" type="text/css">
        <title>Document</title>
        <style>
            *{
                padding: 0px;
                /* margin: 0px; */
            }
            .outerbox{
                width: 100%;
                height: 100%;
                position: relative;
            }
            .calendar{
                /* width:450px;
                height:350px; */
                width: 100%;
                height: 100%;
                background:#f1f1f1;
                /* box-shadow:0px 1px 1px rgba(0,0,0,0.1); */
            }
            .title{
                box-shadow:0px 1px 1px rgba(0,0,0,0.1);
                height: 70px;
                padding-bottom: 10px;
            }
            #monthnYear{
                text-align: center;
                width: calc(100% - 60px);
                margin-top: 20px;
            }
            .body-list ul{
                width:100%;
                font-family:arial;
                font-weight:bold;
                /* font-size:14px; */
                font-size: 20px;
            }
            .body-list ul li{
                width:14.28%;
                /* height:36px; */
                height: 52px;
                line-height:36px;
                list-style:none;
                /* display:block; */
                box-sizing:border-box;
                float:left;
                text-align:center;
            }
            #next,#prev{
                margin-top: 30px;
                width: 17px;
                /* width: 100%; */
                /* aspect-ratio: 1 / 1; */
                height: 17px;
                transform: rotate(45deg);
            }
            #prev{
                border-bottom: 3px solid grey;
                border-left: 3px solid grey;
                margin-left: 20px;
            }
            #next{
                border-right: 3px solid grey;
                border-top: 3px solid grey;
                margin-left: -20px;    
            }
            .title .float{
                float: left;
            }
            #window{
                position:absolute;
                width: 60%;
                height: 45%;
                margin-top: 40px;
                margin-left: 20%;
                background-color: #f1f1f1;
                border: 1.5px solid black;
                text-align: center;
                font-size: 25px;
                display: none;
            }
            #window_button{
                width: 80%;
                height: 70px;
                /* background-color: red; */
                margin: auto;
                margin-top: 40px;

            }
            .confirm_button{
                width: 40%;
                height: 30px;
                padding: 5px;
                background-color: #555555;
                float: left;
                margin-top: 15px;
                font-size: 18px;
                color: white;
                cursor: default;
            }
            .confirm{
                float: right;
                background-color: #0076ff;
            }
        </style>
    </head>
    <body>
        <div class="outerbox">
            <div id="window">
                <br>
                <p>DO YOU WANT TO USE 1 CREDIT</p>
                <p id="window_Date">on xxx</p>
                <div id="window_button">
                    <div class="confirm_button confirm" id="confirm">CONFIRM</div>
                    <div class="confirm_button cancel" id="cancel">CANCEL</div>
                </div>
            </div>
            <div class="calendar">
                <div class="title">
                    <!-- <h1 id="monthnYear">Month Year</h1> -->
                    <!-- <a href="" id="prev">Prev Month</a>
                    <a href="" id="next">Next Month</a> -->
                    <p id="prev" class="float"><div class="Prevbox button"></div></p>
                    <h1 id="monthnYear" class="float">Month Year</h1>
                    <p id="next" class="float"><div class="Nextbox button"></div></p>
                </div>
                <br>
                <div class="body">
                    <div class="body-list">
                        <ul>
                            <li>SUN</li>
                            <li>MON</li>
                            <li>TUE</li>
                            <li>WED</li>
                            <li>THU</li>
                            <li>FRI</li>
                            <li>SAT</li>
                        </ul>
                    </div>
                    <div class="body-list">
                        <ul id="days">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php
        $id = $_COOKIE["id"];
        $sql = "SELECT * FROM `calendar` WHERE `userId` = '$id' ";
        $result = $conn->query($sql);
        $results = $conn->query($sql);
        // echo $sql;
    ?>
    
    <script>
        let daybox = document.getElementById('days');
        let monthtitle = document.getElementById('monthnYear')
        let rnian = [31,29,31,30,31,30,31,31,30,31,30,31];
        let frnian = [31,28,31,30,31,30,31,31,30,31,30,31];
        let monthName = ["JANUARY","FEBRUARY","MARCH","APRIL","MAY","JUNE","JULY","AUGUST","SEPTEMBER","OCTOBER","NOVEMBER","DECEMBER"];
        let currentMonth = new Date().getMonth();
        let currentYear = new Date().getFullYear();
        let currentDate = new Date().getDate();
        let currentday = new Date().getDay();
        function buildDate(){
            let firstday =  new Date(currentYear, currentMonth, 1).getDay();
            let totalday = currentYear%4==0?rnian[currentMonth]:frnian[currentMonth];

            let dayinner = "";
            // alert(firstday);
            for(let i = 1;i<=firstday;i++){
                dayinner+="<li></li>"
            }
            for(let i=1;i<=totalday;i++){
                dayinner+="<li class='dateButton'>"+i+"</li>"
            }
            daybox.innerHTML = dayinner;
            monthtitle.innerHTML = monthName[currentMonth] +' '+ currentYear;
           
            let window = document.getElementById('window');
            let window_Date = document.getElementById('window_Date');
            let datebutton = g=document.getElementsByClassName('dateButton');
            let this_date;
            let this_day;
            
            for(let i = 0; i<datebutton.length;i++){
                <?php
                for($i = 0; $i<$results->num_rows; $i++){
                    $rows = $results->fetch_assoc();?>
                    if(<?php echo $rows["date"] ?> == datebutton[i].innerHTML && '<?php echo $rows["month"] ?>' == monthName[currentMonth] 
                        && <?php echo $rows["year"] ?> == currentYear){
                            datebutton[i].style.color = 'blue';
                        }
                <?php } ?>
                datebutton[i].onclick = function(){
                    let check = false;
                    <?php 
                    for($i = 0; $i<$result->num_rows; $i++){
                        $row = $result->fetch_assoc();?>
                        
                        if(<?php echo $row["date"] ?> == datebutton[i].innerHTML && '<?php echo $row["month"] ?>' == monthName[currentMonth] 
                        && <?php echo $row["year"] ?> == currentYear){
                            check = true;
                        }
                    <?php } ?>
                    if(check){
                        location.href = "edit.php?&year="+currentYear+"&month="+monthName[currentMonth]
                        +"&date="+datebutton[i].innerHTML+"&day="+new Date(currentYear,currentMonth,datebutton[i].innerHTML).getDay();
                    }else{
                        window.style.display = 'block';
                        window_Date.innerText = ' ON ' + datebutton[i].innerHTML +' '+ monthName[currentMonth] +' '+ currentYear;
                        this_date = datebutton[i].innerHTML;
                        this_day = new Date(currentYear,currentMonth,datebutton[i].innerHTML).getDay();
                    }
                    <?php //$row = $result->fetch_assoc(); ?>
                    
                    
                }
            }

            let confirm = document.getElementById('confirm');
            let cancel = document.getElementById('cancel');
            confirm.onclick = function(){
                location.href = "pmain.php?year="+currentYear+"&month="+monthName[currentMonth]+"&date="+this_date+"&day="+this_day;       
            }
            cancel.onclick = function(){
                window.style.display = 'none';
            }
        }
        buildDate();

        let prev = document.getElementById('prev');
        let next = document.getElementById('next');
        prev.onclick = function(){
            // event.preventDefault()
            currentMonth--;
            if(currentMonth<0){
                currentMonth = 11;
                currentYear--;
            }
            buildDate();
        }
        next.onclick = function(){
            // event.preventDefault()
            currentMonth++;
            if(currentMonth>11){
                currentMonth = 0;
                currentYear++;
            }
            buildDate();
        }

    </script>
</html>