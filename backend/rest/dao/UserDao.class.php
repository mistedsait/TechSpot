<?php

require_once __DIR__ . "/BaseDao.class.php";

class UserDao extends BaseDao 
{

    public function __construct()
    {
       parent::__construct('users');
    }
   public function add_user($users){
        //TODO IMPLEMENT ADD LOGIC
        $query= "INSERT INTO users(first_name,last_name, email,password)
                VALUES(:firstname, :lastname,:email, :password)";
        $statement=$this->connection->prepare($query);
        $statement->execute($users);
        $users['id']=$this->connection->lastInsertId();
        return $users;
    }
}
