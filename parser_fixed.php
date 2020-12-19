<?php
libxml_disable_entity_loader(true);
if (isset($_GET['file'])) {
    $file = $_GET['file'];
    $xmlDoc = new DOMDocument();
    $xmlDoc->load("uploads/" . $file, LIBXML_NOENT | LIBXML_DTDLOAD);
    $xmlList = simplexml_import_dom($xmlDoc);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>XML Parser</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="Page/bootstrap.min.css" type = "text/css"/>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2 well">
            <legend>Student List</legend>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Year</th>
                    <th>School</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
            foreach($xmlList->student as $student) {
                echo "<tr><td>" . $i++ . "</td>" ;                  
                echo "<td>" . $student->name . "</td> ";
                echo "<td>" . $student->year . "</td> ";
                echo "<td>" . $student->school . "</td></tr> ";
            }
            ?>
            </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>