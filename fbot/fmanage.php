<?php

 // * Created by PhpStorm.
 // * User: wsupajirakit
 // * Date: 10/12/2017 AD
 // * Time: 22:25

$vid = $_GET['var'];
$username = $_GET['var2'];
$balance = $_GET['var3'];


 ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SeedSoft</title>

    <link href="https://fonts.googleapis.com/css?family=Kanit:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <style>

        body {
            font-family: 'Prompt', sans-serif;
            /*font-family: 'Roboto', sans-serif;*/
            /*font-weight:100;*/
            background: #212529 !important;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Prompt', sans-serif;
        }
        .hide {
          display: none;
        }


        .navbar-default{
            width: 100%;
            background: -webkit-linear-gradient(left, #22d686, #2dbbd3, #22d686, #2dbbd3);
            background: linear-gradient(to right, #22d686, #2dbbd3, #22d686, #2dbbd3);
            background-size: 600% 100%;
            -webkit-animation: HeroBG 20s ease infinite;
            animation: HeroBG 20s ease infinite;
        }

        @-webkit-keyframes HeroBG {
            0% {
                background-position: 0 0;
            }
            50% {
                background-position: 100% 0;
            }
            100% {
                background-position: 0 0;
            }
        }

        @keyframes HeroBG {
            0% {
                background-position: 0 0;
            }
            50% {
                background-position: 100% 0;
            }
            100% {
                background-position: 0 0;
            }
        }

        .navbar-default .navbar-brand {
            color: #fffff9;
        }
        .btn-outline-secondary {
            color: #fffff9;
        }
    </style>

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-toggleable-md navbar-default bg-faded">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">แก้ไขข้อมูลสมาชิก</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <button onclick="goBack();" class="btn btn btn-outline-secondary my-2 my-sm-0" type="button">ย้อนกลับ</button>
            </form>
        </div>
    </nav>


<?php
error_reporting(0);
//echo $xrole;

?>


    <br> <br> <br> <br>


        <div class="container">
            <form name="user_update" role="form" method="post" action="" style="margin-left: 30%;">
                <div class="form-group row">
                    <label for="fname" class="col-3 col-form-label"><font color="white">id</label>
                    <div class="col-6">
                        <input type="text"
                               readonly
                               oninvalid="this.setCustomValidity('โปรดกรอกชื่อจริง')"
                               value="<?php echo $vid;?>" class="form-control" id="fname" name="fname" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-3 col-form-label">ชื่อ</label>
                    <div class="col-6">
                        <input type="text"
                               readonly
                               oninvalid="this.setCustomValidity('โปรดกรอกนามสกุล')"
                               value="<?php echo $username;?>" class="form-control" id="lname" name="lname" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-3 col-form-label">ยอดเงินคงเหลือ</label>
                    <div class="col-6">
                        <input type="text"
                               readonly
                               oninvalid="this.setCustomValidity('โปรดกรอกนามสกุล')"
                               value="<?php echo $balance;?>" class="form-control" id="lname" name="lname" placeholder="">
                    </div>
                </div>

                <div class="radio">
                <label><input type="radio" name="optradio1" onclick="show1();">&nbsp;&nbsp;เพิ่มยอดเงิน</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="optradio1" onclick="show2();">&nbsp;&nbsp;ลดยอดเงิน</label>
                </div>

            </form>
            <div id="div1" class="hide">
              <form name="user_update" role="form" method="post" action="ibalance.php">
                <div class="form-group row">
                    <label for="lname" class="col-3 col-form-label">จำนวนเงินที่ต้องการเพิ่ม</label>
                    <div class="col-6">
                        <input type="number" min="0"
                               class="form-control" id="abalance" name="inewbalance" id="inewbalance" placeholder="จำนวนเงินที่ต้องการเพิ่ม">
                               <input type="text"
                                      readonly
                                      hidden
                                      value="<?php echo $vid;?>" class="form-control" id="iid" name="iid" placeholder="">

                                      <input type="text"
                                             readonly
                                             hidden
                                             value="<?php echo $balance;?>" class="form-control" id="ibalance" name="ibalance" placeholder="">
                                             <input type="text"
                                                    readonly
                                                    hidden
                                                    oninvalid="this.setCustomValidity('โปรดกรอกนามสกุล')"
                                                    value="<?php echo $username;?>" class="form-control" id="iname" name="iname" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-3 col-6">
                        <button type="submit" class="btn btn-outline-success"> &nbsp;&nbsp; &nbsp;บันทึก &nbsp;&nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" onclick="clicked();" class="btn btn-outline-warning"> &nbsp;&nbsp;Reset&nbsp;&nbsp;</button>
                    </div>
                </div>
                </form>
            </div>


            <div id="div2" class="hide">
              <form name="user_update" role="form" method="post" action="dbalance.php">
                <div class="form-group row">
                    <label for="lname" class="col-3 col-form-label">จำนวนเงินที่ต้องการลด</label>
                    <div class="col-6">
                        <input type="number" min="0" max="<?php echo $balance;?>"
                            oninvalid="this.setCustomValidity('สูงสุดคือได้แค่ <?php echo $balance;?>')"
                               class="form-control" id="dnewbalance" name="dnewbalance" placeholder="จำนวนเงินที่ต้องการลด">
                               <input type="text"
                                      readonly
                                      hidden
                                      value="<?php echo $vid;?>" class="form-control" id="did" name="did" placeholder="">

                                      <input type="text"
                                             readonly
                                             hidden
                                             value="<?php echo $balance;?>" class="form-control" id="dbalance" name="dbalance" placeholder="">

                                             <input type="text"
                                                    readonly
                                                    hidden
                                                    oninvalid="this.setCustomValidity('โปรดกรอกนามสกุล')"
                                                    value="<?php echo $username;?>" class="form-control" id="dname" name="dname" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-3 col-6">
                        <button type="submit" class="btn btn-outline-success"> &nbsp;&nbsp; &nbsp;บันทึก &nbsp;&nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" onclick="clicked();" class="btn btn-outline-warning"> &nbsp;&nbsp;Reset&nbsp;&nbsp;</button>
                    </div>
                </div>
                </form>
            </div>
        </div>


</body>
</html>

<?php
?>

<script type="text/javascript">

    function validateForm() {
        var fname = document.forms["user_update"]["fname"].value;
        var lname = document.forms["user_update"]["lname"].value;
        var companyname = document.forms["user_update"]["companyname"].value;
        var branch = document.forms["user_update"]["branch"].value;
        var address1 = document.forms["user_update"]["address1"].value;
        var address2 = document.forms["user_update"]["address2"].value;
        var phone = document.forms["user_update"]["phone"].value;
        var i = 0;
        if (fname == "") {
            alert("โปรดกรอกชื่อจริง");

            return false;
        }
        if (lname == "") {
            alert("โปรดกรอกนามสกุล");

            return false;
        }
        if (companyname == "") {
            alert("โปรดกรอกชื่อบริษัท");

            return false;
        }
        if (branch == "") {
            alert("โปรดกรอกสาขา");

            return false;
        }
        if (address1 == "") {
            alert("โปรดกรอกที่อยู่ปัจจุบัน");

            return false;
        }
        if (address2 == "") {
            alert("โปรดกรอกที่อยู่ตามทะเบียนบ้าน");

            return false;
        }
        if (address2 == "") {
            alert("โปรอดกรอกเบอร์โทรศัพท์");

            return false;
        }
        if (!phone.match(/^[0-9]*$/)) {
            alert("เบอร์โทรศัพท์ไม่ถูกต้อง");
            return false;
        }
    }



    function clicked() {
        if (confirm('คุณต้องการ Reset ข้อมูลกลับไปยังค่าเริ่มต้น ?')) {
            location.reload();
        } else {
            return false;
        }
    }

    function goBack() {
        if (confirm('คุณต้องการกลับไปยังเมนูหลัก ?')) {
            window.history.back();
        } else {
            return false;
        }
    }
    function show2(){
      document.getElementById('div1').style.display = 'none';
      document.getElementById('div2').style.display = 'block';
    }
    function show1(){
      document.getElementById('div1').style.display = 'block';
      document.getElementById('div2').style.display = 'none';
    }

    </script>
