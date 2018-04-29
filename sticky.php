<?php
class Sticky
{
    private $messages = array();
    private $name = '';
    private $email = '';

    public function __construct()
    {

    }

    public function __destruct()
    {

    }

    public function user_input_ok()
    {
        return TRUE;
    }

    public function process_request()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {

        }
    }
}
$stk = new Sticky();
$tk->process_request();
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
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" size="48" maxlength="48">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" size="48" maxlength="48">
        </div>
        <div>
            <input type="submit" id="saveButton" name="saveButton" value="Save">
        </div>
    </form>
</body>
</html>
