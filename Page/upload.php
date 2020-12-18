<?php 
//check if form is submitted
if (isset($_POST['submit']))
{
    $filename = $_FILES['file1']['name'];
    
    //upload file
    if($filename != '')
    {
        $ext = pathinfo($filename)['extension'];
        $allowed = array('xml', 'txt');
        
        //check if file type is valid
        if ((in_array($ext, $allowed)))
        {
            $newname =  '../uploads/' . $filename;
            $created = @date('Y-m-d H:i:s');

            if (!file_exists($newname)) 
            {
                if ((move_uploaded_file($_FILES['file1']['tmp_name'], $newname))) 
                {
                    header("Location: ../index.php?st=success");
                }
                else 
                    header("Location: ../index.php?st=error");
            }
            else 
                header("Location: ../index.php?st=error");
        }
        else
            header("Location: ../index.php?st=error");
    }
    else
        header("Location: ../index.php");
}
?>