<?php
class User extends Model
{
    private $db;
    public function __construct(){
        $this->db = static::getDatabaseConnection();
    }
    public function addUser($data){
        $time = time();
        $this->db->query("insert into users(name,email,coins,createtime,updatetime) 
        values ('". $data['name'] ."', '". $data['email'] ."', ". $data['coins']. ", ". $time. ", ". $time .")");
        if( $this->db->error ){
            throw new Exception($this->db->error);
        }
        return $this->db->insert_id;
    }
    public function validate($email){
        $result = $this->db->query("select email from users where email='". $email ."'");
        return $result->num_rows;
    }
    public function getCoins($user_id){
        $result = $this->db->query("select coins from users where id='". $user_id ."'");
        while($row=$result->fetch_assoc()){
            return $row['coins'];
        }
    }
    public function fetchUsers($id=""){
        if($id > 0){
            $result = $this->db->query("select * from users where id=".$id);
        }else{
            $result = $this->db->query("select * from users");
        }
        if( $this->db->error ){
            throw new Exception($this->db->error);
        }
        while($row=$result->fetch_assoc()){
            $data[] = array(
                'user_id' => $row['id'],
                'name' => $row['name'],
                'email' => $row['email'],
                'coins' => $row['coins']
            );
        }
        return $data;
    }
    public function updateUser($data){
        $time = time();
        $sql = "update users set coins=coins+". $data['coins'].", updatetime=$time where id=".$data['id'];
        $this->db->query($sql);
        if( $this->db->error ){
            throw new Exception($this->db->error);
        }
        return $this->db->affected_rows;
    }
}