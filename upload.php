<?php


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Upload files</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h1>Upload files</h1>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" 
        method="POST" 
        enctype="multipart/formdata">
        <div>
            <input type="file" id="uploadForm" name="uploadForm">
        </div>
    </form>
    <div id="user-info">
        <?php echo $user_info; ?>
    </div>
</body>
</html>