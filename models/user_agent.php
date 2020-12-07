<?php
require_once('account_abstract.php');

class User_agent extends Account implements user_interface
{
    public $user_id;
    public $has_chat;
    public $has_ticket_access;
    public $created_at;
//    static $belongs_to = array(array('user', 'primary_key' => 'user_id'));


    public function fetch($argument, $value)
    {
        $result = $this->db->query("select * from users_agent where $argument = '$value'");
        if(!$result) {
            echo "An error occured.\n";
            exit;
        }
        while ($row = $this->db->fetch_assoc($result)) {
            $this->setId($row['id']);
            $this->setUserId($row['user_id']);
            $this->setHasChat($row['has_chat']);
            $this->setHasTicketAccess($row['has_ticket_access']);
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
    public function getHasChat()
    {
        return $this->has_chat;
    }

    /**
     * @param mixed $has_chat
     */
    public function setHasChat($has_chat)
    {
        $this->has_chat = $has_chat;
    }

    /**
     * @return mixed
     */
    public function getHasTicketAccess()
    {
        return $this->has_ticket_access;
    }

    /**
     * @param mixed $has_ticket_access
     */
    public function setHasTicketAccess($has_ticket_access)
    {
        $this->has_ticket_access = $has_ticket_access;
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

    public function intro(): string
    {
        return "I'm an agent";
    }
}