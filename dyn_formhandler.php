<?php

$auth = $_GET['auth'];
(int)$action = $_GET['action'];

function lg($input)
{
    $output = '<pre>'.$input.'</pre>';
    echo $output;
}

function UTGS_token()
{
    $token = substr(sha1(mt_rand()),17,20);
    return $token;
}

function form_input($type, $id)
{
    if ($type == 01)
    {
        echo
        '
        <label for="'.$id.'">Name:</label>
        <input type="text" name="'.$id.'">
        ';
    }
    
    if ($type == 02)
    {
        echo
        '
        <label for="'.$id.'">Phone Number:</label>
        <input type="tel" name="'.$id.'">
        ';
    }
}

if (strlen($auth) == 0)
{
    echo 
    '
    <body onload="document.auth_action.submit()">
        <form action="dyn_formhandler.php" method="GET" name="auth_action">
            <input type="hidden" name="auth" value="' . UTGS_token() . '">
        </form>
    </body>
    ';
}

if (strlen($auth) != 20)
{
    lg('Illegal Auth');
}

if (strlen($auth) == 20)
{
    lg('Action Authenticated');
    
    if ($action == 'ANSWER')
    {
        lg('Answers Recieved');
    }
    else
    {
    echo
    '
    <form action="dyn_formhandler.php" method="GET" name="auth_action">
        <input type="hidden" name="auth" value="' . $auth . '">
        <input type="hidden" name="action" value="ANSWER">
        ';
        for ($i=0; $i<strlen((string)$action); $i++)
        {
           form_input($action[$i], $i); 
        }
    
    echo    
    '
        <input type="submit">
    </form>    
    ';
    }

    
    //01: Name
    //02: Phone Number
    
}

?>