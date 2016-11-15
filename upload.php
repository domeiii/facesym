<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>wtf</title>
</head>
<?php
?>
<body>
<br><br>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = '';
    $dbname = "images";
    $conn = mysqli_connect($servername, $username,$password, $dbname);
    if (!$conn) {
        die("Connection failes: " .mysqli_connect_error());
    }
    if(isset($_POST['image'])){//button for Upload
        $total = count($_FILES['uploaded']['tmp_name']);
        for($i=0; $i<$total; $i++) {
            $target = "Images/"; //folder where to save the uploaded file/video
            $target = $target . basename($_FILES['uploaded']['name'][$i]); //gets the name of the upload file
            $ok = 1;

            $re = '/(AM)|(BM)|(LM)|(WM)/';
            $gender = "f";
            if (preg_match($re, $target)) {
                $gender = "m";
            }


            if (move_uploaded_file($_FILES['uploaded']['tmp_name'][$i], $target)) {
                $query = "INSERT INTO images(id, name, gender) VALUES ('' , '$target', '$gender')";//insertion to database
                mysqli_query($conn, $query);
            } else {
                echo "Sorry, there was a problem uploading your file.";
            }
        }
    }
    mysqli_close($conn);
    ?>


    <form enctype="multipart/form-data" method="POST">
        Please choose a file: <input name="uploaded[]" type="file" multiple/><br />
        <input type="submit" value="Upload" name="image" />
    </form>

    <br><br>
    <br>

</body>
</html>