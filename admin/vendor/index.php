<?php
$conn = mysqli_connect("localhost","root","","learning07");
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');

if (isset($_POST["import"]))
{


  $allowedFileType = ['text/x-comma-separated-values', 
  'text/comma-separated-values', 
  'text/x-csv', 
  'text/csv', 
  'text/plain',
  'application/octet-stream', 
  'application/vnd.ms-excel', 
  'application/x-csv', 
  'application/csv', 
  'application/excel', 
  'application/vnd.msexcel', 
  'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

    $targetPath = 'uploads/'.$_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

    $Reader = new SpreadsheetReader($targetPath);

    $sheetCount = count($Reader->sheets());
    for($i=0;$i<$sheetCount;$i++)
    {

        $Reader->ChangeSheet($i);

        foreach ($Reader as $Row)
        {

            $Username = "";
            if(isset($Row[0])) {
                $Username = mysqli_real_escape_string($conn,$Row[0]);
            }

            $Password = "";
            if(isset($Row[1])) {
                $Password = mysqli_real_escape_string($conn,$Row[1]);
            }

            $Firstname = "";
            if(isset($Row[2])) {
                $Firstname = mysqli_real_escape_string($conn,$Row[2]);
            }

            $Lastname = "";
            if(isset($Row[3])) {
                $Lastname = mysqli_real_escape_string($conn,$Row[3]);
            }

            $email = "";
            if(isset($Row[4])) {
                $email = mysqli_real_escape_string($conn,$Row[4]);
            }

            $phone = "";
            if(isset($Row[5])) {
                $phone = mysqli_real_escape_string($conn,$Row[5]);
            }

            $group_id = "";
            if(isset($Row[6])) {
                $group_id = mysqli_real_escape_string($conn,$Row[6]);
            }

            $Userlevel = "M";

            $user_date = "2022-02-26";

            $session_id = "addbyadmin";

            $Status = "Y";



            if (!empty($Username) || !empty($Password) || !empty($Firstname) || !empty($Lastname) || !empty($email) || !empty($phone) || !empty($Userlevel) || !empty($user_date) || !empty($session_id) || !empty($group_id)) {
                $query = "insert into user(Username,Password,Firstname,Lastname,email,phone,Userlevel,user_date,session_id,group_id,Status) 
                values('".$Username."','".$Password."','".$Firstname."','".$Lastname."','".$email."','".$phone."','".$Userlevel."','".$user_date."','".$session_id."','".$group_id."','".$Status."')";
                $result = mysqli_query($conn, $query);
                
                if (! empty($result)) {
                    $type = "success";
                    $message = "Excel Data Imported into the Database";
                } else {
                    $type = "error";
                    $message = "Problem in Importing Excel Data";
                }
            }
        }
        
    }
}
else
{ 
    $type = "error";
    $message = "Invalid File Type. Upload Excel File.";
}
}
?>

<!DOCTYPE html>
<html>    
<head>
    <style>    
        body {
         font-family: Arial;
         width: 550px;
     }

     .outer-container {
         background: #F0F0F0;
         border: #e0dfdf 1px solid;
         padding: 40px 20px;
         border-radius: 2px;
     }

     .btn-submit {
         background: #333;
         border: #1d1d1d 1px solid;
         border-radius: 2px;
         color: #f0f0f0;
         cursor: pointer;
         padding: 5px 20px;
         font-size:0.9em;
     }

     .tutorial-table {
        margin-top: 40px;
        font-size: 0.8em;
        border-collapse: collapse;
        width: 100%;
    }

    .tutorial-table th {
        background: #f0f0f0;
        border-bottom: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
    }

    .tutorial-table td {
        background: #FFF;
        border-bottom: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
    }

    #response {
        padding: 10px;
        margin-top: 10px;
        border-radius: 2px;
        display:none;
    }

    .success {
        background: #c7efd9;
        border: #bbe2cd 1px solid;
    }

    .error {
        background: #fbcfcf;
        border: #f3c6c7 1px solid;
    }

    div#response.display-block {
        display: block;
    }
</style>
</head>

<body>
    <h2>Import Excel File into MySQL Database using PHP</h2>
    
    <div class="outer-container">
        <form action="" method="post"
        name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
        <div>
            <label>Choose Excel
            File</label> <input type="file" name="file"
            id="file" accept=".xls,.xlsx">
            <button type="submit" id="submit" name="import"
            class="btn-submit">Import</button>

        </div>
        
    </form>

</div>
<div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>


<?php
$sqlSelect = "SELECT * FROM user";
$result = mysqli_query($conn, $sqlSelect);

if (mysqli_num_rows($result) > 0)
{
    ?>

    <table class='tutorial-table'>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Name</th>
                <th>Description</th>

                <th>Name</th>
                <th>Description</th>
                <th>Name</th>


            </tr>
        </thead>
        <?php
        while ($row = mysqli_fetch_array($result)) {
            ?>                  
            <tbody>
                <tr>
                    <td><?php  echo $row['Username']; ?></td>
                    <td><?php  echo $row['Password']; ?></td>
                    <td><?php  echo $row['Firstname']; ?></td>
                    <td><?php  echo $row['Lastname']; ?></td>
                    <td><?php  echo $row['email']; ?></td>
                    <td><?php  echo $row['phone']; ?></td>
                    <td><?php  echo $row['Userlevel']; ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php 
} 
?>

</body>
</html>