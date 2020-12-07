<?php
require_once('DBconnection.php');
require_once('models/account_abstract.php');

class Factory
{
    public static function build($table)
    {
        switch ($table) {
            case 'user':
                $obj = new User();
                break;
            case 'user_admin':
                $obj = new User_admin();
                break;
            case 'user_agent':
                $obj = new User_agent();
                break;
        }
        return $obj;
    }

    public static function fetch($table, $argument, $value)
    {
        $obj = self::build($table);
        $obj->fetch($argument, $value);
        return $obj;
    }

}

$obj = Factory::build('user');
$obj->fetch('id', '1');
echo $obj->getId();
echo '<br/>';
echo $obj->getName();
echo '<br/>';
echo $obj->getEmail();
echo '<br/>';
echo $obj->getCreatedAt();
echo '<br/>';
$obj = Factory::fetch('user', "name", "test");
echo '<br/>';
var_dump($obj);
echo '<br/>';
echo $obj->getId();
echo '<br/>';
echo $obj->getName();
echo '<br/>';
echo $obj->getEmail();
echo '<br/>';
echo $obj->getCreatedAt();
echo '<br/>';