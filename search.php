<?php
include("server.php");

// Initialize $result variable
$result = null;

// Initialize the SQL query
$sql = "SELECT * FROM project LEFT JOIN project_document ON project.pro_ID = project_document.pdc_ID WHERE 1=1";

// Append to the SQL query if form fields are set and not empty
if (!empty($_POST['pro_NameTH'])) {
    $pro_NameTH = $_POST['pro_NameTH'];
    $sql .= " AND project.pro_NameTH LIKE '%" . $pro_NameTH . "%'";
}

if (!empty($_POST['pro_Year'])) {
    $pro_Year = $_POST['pro_Year'];
    $sql .= " AND project.pro_Year LIKE '%" . $pro_Year . "%'";
}

// Append to the SQL query for the selected pro_Major
if (!empty($_POST['pro_Major'])) {
    $pro_Major = $_POST['pro_Major'];
    $sql .= " AND project.pro_Major = '" . $pro_Major . "'";
}


// Execute the query
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="tis-620">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ค้นหาโปรเจ็ค</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-b/UdI7L+rqNpVb+BCL5u3UwSyRJFyjEzj5eGa5ckfJ3mAWUdx/UJWqCFzqI2f9C" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <link rel="shortcut icon" href="./assets/img/logo (3).svg">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/feather.css">
    <link rel="stylesheet" href="./css/flags.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link rel="stylesheet" href="./assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script>
    $(document).ready(function() {
        $("#advisor_name").autocomplete({
            source: "search-advisors.php", // Server-side script to return JSON data
            minLength: 2 // Trigger autocomplete after 2 characters
        });
    });
    $("#advisor_name").autocomplete({
        source: "search-advisors.php", // Server-side script to return JSON data
        minLength: 2, // Trigger autocomplete after 2 characters
        select: function(event, ui) {
            // Set the value and submit the form
            $("#advisor_name").val(ui.item.value);
            $("#searchForm").submit();
        }
    });
    </script>

</head>

<body>
    <form class="row g-3" id="searchForm" action="search.php" method="post">
        <div class="col-md-6">
            <label for="pro_NameTH" class="col-sm-2 col-form-label">ชื่อโครงงาน</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pro_NameTH" name="pro_NameTH"
                    value="<?php echo isset($_POST['pro_NameTH']) ? $_POST['pro_NameTH'] : ''; ?>">
            </div>
        </div>
        <!-- <div class="col-md-6">
            <label for="pro_NameTH" class="col-sm-2 col-form-label">ชื่อนักศึกษา</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pro_NameTH" name="pro_NameTH">
            </div>
        </div> -->
        <div class="col-md-6">
            <label for="pro_Year" class="col-sm-2 col-form-label">ปีการศึกษา</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pro_Year" name="pro_Year"
                    value="<?php echo isset($_POST['pro_Year']) ? $_POST['pro_Year'] : ''; ?>">
            </div>
        </div>
        <div class="form-check">
            <label class="form-check-label" for="pro_Major">ภาควิชา</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="pro_Major" value="CSC" id="majorCSC"
                    <?php echo (isset($_POST['pro_Major']) && $_POST['pro_Major'] == 'CSC') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="majorCSC">วิทยาการคอมพิวเตอร์</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="pro_Major" value="ICT" id="majorICT"
                    <?php echo (isset($_POST['pro_Major']) && $_POST['pro_Major'] == 'ICT') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="majorICT">เทคโนโลยีสารสนเทศ</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="pro_Major" value="GIS" id="majorGIS"
                    <?php echo (isset($_POST['pro_Major']) && $_POST['pro_Major'] == 'GIS') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="majorGIS">ภูมิศาสตร์สารสนเทศ</label>
            </div>
        </div>


        <!-- <div class="col-md-6">
            <label for="pro_Year" class="col-sm-3 col-form-label">ชื่ออาจารย์ที่ปรึกษา</label>
            <div class="col-sm-10">
                <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <label for="pro_Year" class="col-sm-3 col-form-label">คำสำคัญ(Key word)
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pro_Year" name="pro_Year">
            </div>
        </div> -->
        <div class="col-12">
            <button type="submit" class="btn btn-primary">ค้นหา</button>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ชื่อโครงงาน</th>
                <th scope="col">ปี</th>
                <th scope="col">ชื่อนักศึกษา</th>
                <th scope="col">อาจารย์ที่ปรึกษา</th>
                <th scope="col">ไฟล์</th>
            </tr>
        </thead>
        <tbody>
            <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['pro_NameTH'] . "</td>";
                echo "<td>" . $row['pro_Year'] . "</td>";
                echo "<td>" . $row['pro_Year'] . "</td>";
                echo "<td>" . $row['pro_Year'] . "</td>";
                echo "<td>";
    // Check if the file paths are not empty and echo download links
    if (!empty($row['pdc_Path'])) {
        echo "<a href='" . $row['pdc_Path'] . "' target='_blank'><i class='fas fa-file-pdf'></i> ไฟล์ 1</a><br>";
    }
    if (!empty($row['pdc_Path2'])) {
        echo "<a href='" . $row['pdc_Path2'] . "' target='_blank'><i class='fas fa-file-pdf'></i> ไฟล์ 2</a><br>";
    }
    if (!empty($row['pdc_Path3'])) {
        echo "<a href='" . $row['pdc_Path3'] . "' target='_blank'><i class='fas fa-file-pdf'></i> ไฟล์ 3</a>";
    }



                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo "<td colspan='5'>ไม่พบข้อมูล</td></tr>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Students</h6>
                                        <h3>50055</h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="./assets/img/icons/dash-icon-01.svg" alt="Dashboard Icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Awards</h6>
                                        <h3>50+</h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="./assets/img/icons/dash-icon-02.svg" alt="Dashboard Icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Department</h6>
                                        <h3>30+</h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="./assets/img/icons/dash-icon-03.svg" alt="Dashboard Icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Revenue</h6>
                                        <h3>$505</h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="./assets/img/icons/dash-icon-04.svg" alt="Dashboard Icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-6">

                        <div class="card card-chart">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="card-title">Publications</h5>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="apexcharts-area"></div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12 col-lg-6">

                        <div class="card card-chart">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="card-title">Number of Students</h5>
                                    </div>
                                    <div class="col-6">
                                        <ul class="chart-list-out">
                                            <li><span class="circle-blue"></span>Girls</li>
                                            <li><span class="circle-green"></span>Boys</li>
                                            <li class="star-menus"><a href="javascript:;"><i
                                                        class="fas fa-ellipsis-v"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="bar"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./assets/js/jquery-3.6.0.min.js"></script>
    <script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/feather.min.js"></script>
    <script src="./assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="./assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="./assets/plugins/apexchart/chart-data.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>