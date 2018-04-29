<?php
class Sticky
{
    private $messages = array();
    private $name = '';
    private $email = '';
    private $output = '';

    public function __construct()
    {

    }

    public function __destruct()
    {

    }

    public function user_input_ok()
    {
        $error_count = 0;
        $is_ok = TRUE;

        if(isset($_POST['name']))
        {
            $this->name = trim($_POST['name']);
            if(empty($this->name))
            {
                $error_count++;
                $errors[] = 'Please enter your name';
            }
            else
            {

            }
        }
        else
        {
            $error_count++;
            $errors[] = 'Name field not found';
        }

        if(isset($_POST['email']))
        {
            $this->name = trim($_POST['email']);
            if(empty($this->email))
            {
                $error_count++;
                $errors[] = 'Please enter your email address';
            }
            else
            {

            }
        }
        else
        {
            $error_count++;
            $errors[] = 'Email field not found';
        }
        
        if($error_count > 0)
        {
            $is_ok = FALSE;
        }
        return $is_ok;
    }

    public function process_request()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            if($this->user_input_ok())
            {

            }
        }
    }
}
$stk = new Sticky();
$stk->process_request();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Making sticky forms</title>
</head>
<body>
    <h1>Making sticky forms</h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" id="stickForm" name="stickForm">
        <p>
            <label for="name">Name</label>
            <input type="text" 
                id="name" 
                name="name" 
                size="48" 
                maxlength="48" 
                value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>">
        </p>
        <p>
            <label for="email">Email</label>
            <input type="text" 
                id="email" 
                name="email" 
                size="48" 
                maxlength="48"
                value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
        </p>
        <p>
            <input type="submit" id="saveButton" name="saveButton" value="Save">
        </p>
    </form>
</body>
</html>
