<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if($_SESSION['access'] != 'admin'){
        header("Location: index.html");
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/gen_rep.css">
    <title>Document</title>
</head>
<body>
    <?php include_once("header.php"); ?>
    <br><br>
    <div class="mc">
        <div class="lc">
            <a href="manage_account.php">Manage Account</a><br><br>
            <a href="manage_reservation.php">Manage Reservation</a><br><br>
            <a href="manage_gallary.php">Manage Gallery</a><br><br>
            <a href="manage_announcement.php">Manage Announcement</a><br><br>
            <a href="generate_report.php">Generate Report</a>
        </div>
        <div class="rc"> 
            <h3>Generate Report Panel</h3>
            <br><br><br>
            <div class="con-gen">
                <h4>Daily Report</h4><br>
                <form action="" method="POST">
                <label for="">Year</label>
                <input type="number" min="1900" max="2099" step="1" value="2021" />
                <label for="">Month</label>
                <select name="" id="">
                    <option value="">January</option>
                    <option value="">February</option>
                    <option value="">March</option>
                    <option value="">April</option>
                    <option value="">May</option>
                    <option value="">June</option>
                    <option value="">Jyly</option>
                    <option value="">August</option>
                    <option value="">Semptember</option>
                    <option value="">October</option>
                    <option value="">November</option>
                    <option value="">December</option>
                </select>
                <label for="">Day</label>
                <input type="number" min="1" max="31" step="1" value="15" />
                <br><br>
                <input type="submit" name="g-d-r" value="Generate report" class="button">
                </form>
            </div>
            <br><br>
            <div class="con-gen">
                <h4>Weekly Report</h4><br>
                <form action="" method="POST">
                <label for="">Year</label>
                <input type="number" min="1900" max="2099" step="1" value="2021" />
                <label for="">Month</label>
                <select name="" id="">
                    <option value="">January</option>
                    <option value="">February</option>
                    <option value="">March</option>
                    <option value="">April</option>
                    <option value="">May</option>
                    <option value="">June</option>
                    <option value="">Jyly</option>
                    <option value="">August</option>
                    <option value="">Semptember</option>
                    <option value="">October</option>
                    <option value="">November</option>
                    <option value="">December</option>
                </select>
                <label for="">Day</label>
                <input type="number" min="1" max="31" step="1" value="15" />
                <br><br>
                <input type="submit" name="g-d-w" value="Generate report" class="button">
                </form>
            </div>
            <br><br>
            <div class="con-gen">
                <h4>Monthly Report</h4>
                <form action="" method="POST">
                <label for="">Year</label>
                <input type="number" min="1900" max="2099" step="1" value="2021" />
                <label for="">Month</label>
                <select name="" id="">
                    <option value="">January</option>
                    <option value="">February</option>
                    <option value="">March</option>
                    <option value="">April</option>
                    <option value="">May</option>
                    <option value="">June</option>
                    <option value="">Jyly</option>
                    <option value="">August</option>
                    <option value="">Semptember</option>
                    <option value="">October</option>
                    <option value="">November</option>
                    <option value="">December</option>
                </select>
                <br><br>
                <input type="submit" name="g-d-m" value="Generate report" class="button">
                </form>
            </div>
        </div>
    </div>
    
    

</body>
</html>