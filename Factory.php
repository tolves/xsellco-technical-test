<?php
require_once('DBconnection.php');
require_once('models/account_abstract.php');

class Factory
{
    public static function build($table)
    {
        try {
            $obj = new $table;
            return $obj;
        } catch (Throwable $e) {
            echo "Captured Throwable: " . $e->getMessage() . PHP_EOL;
        }
        return 0;
    }

    public static function fetch($table, $argument, $value)
    {
        $obj = self::build($table);
        $obj->fetch($argument, $value);
        return $obj;
    }
}

$obj = Factory::build('users_admin');
echo '<br/>';

$obj = Factory::fetch('users', "name", "test");
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