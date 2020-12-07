<?php

class User_admin extends Account implements user_interface
{
    public $user_id;
    public $is_super_admin;
    public $has_payment_access;
    public $created_at;

//    static $belongs_to = array(array('user', 'primary_key' => 'user_id'));

    public function fetch($argument, $value)
    {
        $result = $this->db->query("select * from users_admin where $argument = '$value'");
        if (!$result) {
            echo "An error occured.\n";
            exit;
        }
        while ($row = $this->db->fetch_assoc($result)) {
            $this->setId($row['id']);
            $this->setUserId($row['user_id']);
            $this->setIsSuperAdmin($row['is_super_admin']);
            $this->setHasPaymentAccess($row['has_payment_access']);
            $this->setCreatedAt($row['created_at']);
        }
        return $result;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getIsSuperAdmin()
    {
        return $this->is_super_admin;
    }

    /**
     * @param mixed $is_super_admin
     */
    public function setIsSuperAdmin($is_super_admin)
    {
        $this->is_super_admin = $is_super_admin;
    }

    /**
     * @return mixed
     */
    public function getHasPaymentAccess()
    {
        return $this->has_payment_access;
    }

    /**
     * @param mixed $has_payment_access
     */
    public function setHasPaymentAccess($has_payment_access)
    {
        $this->has_payment_access = $has_payment_access;
    }

    public function intro(): string
    {
        return "I'm an admin";
    }
}