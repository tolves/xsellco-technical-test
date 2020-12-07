<?php

class User extends Account implements user_interface
{
    public $name;
    public $email;
    public $created_at;

    public function fetch($argument, $value)
    {
        $result = $this->db->query("select * from users where $argument = '$value'");
        if(!$result) {
            echo "An error occured.\n";
            exit;
        }
        while ($row = $this->db->fetch_assoc($result)) {
            $this->setId($row['id']);
            $this->setEmail($row['email']);
            $this->setName($row['name']);
            $this->setCreatedAt($row['created_at']);
        }
        return $this->db->fetch_all($result);
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
        return "I'm an normal user";
    }
}