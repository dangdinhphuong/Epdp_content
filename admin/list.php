<?php 
    // session_start();
    if(!empty($_FILES)){
        $file = $_FILES["file"]["name"];
        $test = readcsv('file/'.$file.'');
        // var_dump($test);
        $_SESSION["test"] = $test;
        $uploadOk = $_SESSION["uploadOk"];
        // echo $test[0][1];
        // for($i=1; $i<count($test); $i++){
        //     for($j=0; $j<5; $j++){
        //         echo $test[$i][$j];                
        //     }
        // }
        if($uploadOk == 1){
            // echo $_SESSION["uploadOk"];
            // echo $uploadOk;
        
    ?>
    <table style="margin-left:20%">
    <?php
        $count = 1;
        while($count<count($test)){
        for($i=1; $i<count($test); $i++){
    ?>
    <tr>
        <td>
            <?php echo $count++; ?>
        </td>
        <td style="width:70%">
            <?php
                $email = $test[$i][0];
                $username = $test[$i][1];
                $hp = $test[$i][2];
                $credit = $test[$i][3];
                $status = $test[$i][4];

                if(checkEmail($conn, $email)>0){
                    echo "<span style='color:red'>This email already register</span>";
                }else{
                    if($email!=NULL && $username!=NULL && $hp!=NULL && $credit!=NULL && $status!=NULL){
                        echo "OK";
                    }else{
                        // var_dump($email);
                        echo "NOT OK";
                    }
                }
            }
            }
            ?>
        </td>
    </tr>
    </table>
        <?php
        }else{
            echo '<script>alert("Sorry, your file was not uploaded.")</script>';
            error_reporting(0);
        }
    }
        ?>