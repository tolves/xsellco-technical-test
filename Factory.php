<?php
require_once('DBconnection.php');
require_once('models/account_abstract.php');

class Factory
{
    public static function build($model)
    {
        try {
            $obj = new $model;
            return $obj;
        } catch (Throwable $e) {
            echo "Captured Throwable: " . $e->getMessage() . PHP_EOL;
        }
        return 0;
    }

    public static function fetch($model, $argument, $value)
    {
        $obj = self::build($model);
        $obj->fetch($argument, $value);
        return $obj;
    }
}
$obj = Factory::fetch('user_admin', "id", "1");
echo '<br/>';
var_dump($obj);
echo '<br/>';
var_dump($obj->user);
echo '<br/>';
echo '<br/>';
echo '<br/>';
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