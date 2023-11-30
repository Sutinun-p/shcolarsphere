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
<style>
    body{
        margin: 0 5em;
    }
</style>
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
                <!-- <th scope="col">ชื่อนักศึกษา</th>
                <th scope="col">อาจารย์ที่ปรึกษา</th> -->
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
                // echo "<td>" . $row['pro_Year'] . "</td>";
                // echo "<td>" . $row['pro_Year'] . "</td>";
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

</body>

</html>