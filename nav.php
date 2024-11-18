<?php
    session_start();
?>
<b style="float:left; font-size:35px">MyPDP</b>

<p style="float:right">

<span class="nav"><a href="print.php">PRINT</a></span> 
<span class="nav"><a href="process.php">PROCESS</a></span> 
<span class="nav"><a href="period.php">SETTING</a></span> 
<span class="nav"><?php echo $_SESSION["username"]?></span>
<span class="nav"><a href="logout.php">LOGOUT</a></span> 


</p>
<style>
    .nav{
        font-size: 18px;
        margin-right: 30px;
        text-transform: uppercase;
    }
</style>