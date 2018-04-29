<?php
class Upload
{
    private $messages = [];
    private $name = '';
    private $temp = '';
    private $size = 0;
    private $ext = 0;
    private $error_count = 0;
    private $output = '';

    public function __construct()
    {

    }

    public function __destruct()
    {

    }

    public function get_output()
    {
        return $this->output;
    }

    public function process_request()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $this->name = $_FILES['uploadControl']['name'];
            $this->temp = $_FILES['uploadControl']['tmp_name'];
            $this->size = $_FILES['uploadControl']['size'];
            $this->ext = pathinfo($this->name, PATHINFO_EXTENSION);
            $this->ext = strtolower($this->ext);
            $error_count = 0;
            if($this->ext !== 'pdf' && $this->ext !== 'png' && $this->ext !== 'jpg' && $this->ext !== 'gif')
            {
                $error_count++;
                $this->messages[] = 'Image format must be .pdf, .png, .jpg or .gif';
            }
            if($this->size > 512000)
            {
                $error_count++;
                $this->messages[] = 'File size must not exceed 500 MiB';
            }
            if(file_exists($this->name))
            {
                $error_count++;
                $this->messages[] = 'File ' . $this->name . ' already uploaded';
            }
            if($error_count === 0)
            {
                $this->output = '<a href="#nogo">Uploaded file. . .</a>';
            }
            else
            {
                $this->output = '<ul>';
                foreach($this->messages as $message)
                {
                    $this->output .= "<li>$message</li>";
                }
                $this->output .= '</ul>';
            }
        }
    }
}
$upl = new Upload();
$upl->process_request();
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
        id="uploadForm"
        name="uploadForm"
        method="POST" 
        enctype="multipart/form-data">
        <div>
            <input type="file" id="uploadControl" name="uploadControl">
            <input type="submit" id="uploadButton" name="uploadButton" value="Upload">
        </div>
    </form>
    <div id="user-info">
        <?php echo $upl->get_output(); ?>
    </div>
</body>
</html>