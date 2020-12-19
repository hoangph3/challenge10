<!DOCTYPE html>
<html>
<head>
    <title>File directory</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="Page/bootstrap.min.css" type = "text/css"/>
</head>
<body>
<br/>
<div class="container">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2 well">
            <form action="Page/upload.php" method="post" enctype="multipart/form-data">
                <legend>Select File to Upload:</legend>
                <div class="form-group">
                    <input type="file" name="file1" />
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Upload" class="btn btn-info"/>
                </div>
                <?php 
                if(isset($_GET['st'])) { 
                    if ($_GET['st'] == 'success')
                        echo "<div class='alert alert-success text-center'>File uploaded successfully!</div>";                     
                    else
                        echo "<div class='alert alert-danger text-center'>File exists or invalid extension!</div>";  
                } ?>
            </form>
            <a href="./Page/about.php">About me?</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>File Name</th>
                        <th>View</th>
                        <th>Download</th>
                        <th>Parse</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $dir = "./uploads/";
                $all_files = scandir($dir);
                $files = array_diff($all_files, array('.', '..')); 
                $i=1;
                foreach($files as $file) { ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $file ?></td>
                    <td><a href="uploads/<?php echo $file; ?>" target="_self">View</a></td>
                    <td><a href="uploads/<?php echo $file; ?>" download>Download</td>
                    <td><a href="parser.php?file=<?php echo $file; ?>" target="_self">Parse</td>
                    <td><a href="parser_fixed.php?file=<?php echo $file; ?>" target="_self">Parse fixed</td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>