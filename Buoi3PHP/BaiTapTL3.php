<!DOCTYPE html>
<html>
    <head>
    <style>
        .error {color: #FF0000;}
    </style>
    <script>
        function validateForm() {
            let isValid = true;

            // Lấy giá trị các trường từ form
            let ts = document.forms["registrationForm"]["ts"].value;
            let tg = document.forms["registrationForm"]["tg"].value;
            let xb = document.forms["registrationForm"]["xb"].value;
            let nxb = document.forms["registrationForm"]["nxb"].value;

            // Reset lỗi
            document.getElementById("tsErr").innerHTML = "";
            document.getElementById("tgErr").innerHTML = "";
            document.getElementById("xbErr").innerHTML = "";
            document.getElementById("nxbErr").innerHTML = "";

            // Kiểm tra Tên sách
            if (ts == "") {
                document.getElementById("tsErr").innerHTML = "Tên sách không được để trống";
                isValid = false;
            } else if (!/^[a-zA-Z-' ]*$/.test(ts)) {
                document.getElementById("tsErr").innerHTML = "Tên sách chỉ bao gồm chữ cái và dấu cách";
                isValid = false;
            }

            // Kiểm tra Tên tác giả
            if (tg == "") {
                document.getElementById("tgErr").innerHTML = "Tên tác giả không được để trống";
                isValid = false;
            } else if (!/^[a-zA-Z-' ]*$/.test(tg)) {
                document.getElementById("tgErr").innerHTML = "Tên tác giả chỉ bao gồm chữ cái và dấu cách";
                isValid = false;
            }

            // Kiểm tra Nhà xuất bản
            if (xb == "") {
                document.getElementById("xbErr").innerHTML = "Nhà xuất bản không được để trống";
                isValid = false;
            } else if (!/^[a-zA-Z-' ]*$/.test(xb)) {
                document.getElementById("xbErr").innerHTML = "Tên nhà xuất bản chỉ bao gồm chữ cái và dấu cách";
                isValid = false;
            }

            // Kiểm tra Năm xuất bản
            if (nxb == "") {
                document.getElementById("nxbErr").innerHTML = "Năm xuất bản không được để trống";
                isValid = false;
            } else if (!/^\d{4}$/.test(nxb)) {
                document.getElementById("nxbErr").innerHTML = "Năm xuất bản phải là số có 4 chữ số";
                isValid = false;
            }
            return isValid;
        }
    </script>
    </head>
    <body>
    <?php
        $tsErr = $tgErr = $xbErr = $nxbErr = "";
        $ts = $tg = $xb = $nxb = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["ts"])) {
                $tsErr = "Ten sach khong duoc de trong";
            } else {
                $ts = test_input($_POST["ts"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z-' ]*$/",$ts)) {
                    $tsErr = "Ten sach chi bao gom chu cai va dau cach";
                }
            }

            if (empty($_POST["tg"])) {
                $tgErr = "Ten tac gia khong duoc de trong";
            } else {
                $tg = test_input($_POST["tg"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z-' ]*$/",$tg)) {
                    $tgErr = "Ten tac gia chi bao gom chu cai va dau cach";
                }
            }

            if (empty($_POST["xb"])) {
                $xbErr = "Nha xuat ban khong duoc de trong";
            } else {
                $xb = test_input($_POST["xb"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z-' ]*$/",$xb)) {
                    $xbErr = "Ten nha xuat ban chi bao gom chu cai va dau cach";
                }
            }

            if (empty($_POST["nxb"])) {
                $nxbErr = "Nam xuat ban khong duoc de trong";
            } else {
                $nxb = test_input($_POST["nxb"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^\d{4,}$/",$nxb)) {
                    $xbErr = "Nam xuat ban phai co it nhat 4 chu so";
                }
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
        <h2>Form Dang Ky Thong Tin</h2>
        <p><span class="error">* bat buoc</span></p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        Ten sach: <input type="text" name="ts" value="<?php echo $ts;?>">
        <span class="error">* <?php echo $tsErr;?></span>
        <br><br>
        Tac gia: <input type="text" name="tg" value="<?php echo $tg;?>">
        <span class="error">* <?php echo $tgErr;?></span>
        <br><br>
        Nha xuat ban: <input type="text" name="xb" value="<?php echo $xb;?>">
        <span class="error">* <?php echo $xbErr;?></span>
        <br><br>
        Nam xuat ban: <input type="text" name="nxb" value="<?php echo $nxb;?>">
        <span class="error">* <?php echo $nxbErr;?></span>
        <br><br>
        <input type="submit">
        </form>
    </body>
</html>