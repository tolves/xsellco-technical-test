<?php
require_once('DBconnection.php');
require_once('user_interface.php');
require_once('user.php');
require_once('user_admin.php');
require_once('user_agent.php');

//Parent class Account

abstract class Account
{
    public $id;
    public $db;

    public function __construct()
    {
        $DB = DatabaseSingleton::getInstance();
        $this->db = $DB;
    }

    abstract public function intro(): string;

    abstract public function fetch($argument, $value);
}