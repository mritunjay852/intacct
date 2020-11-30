<?php
class Product extends Model
{
    private $db;
    public function __construct(){
        $this->db = static::getDatabaseConnection();
    }
    public function addProduct($data){
        $time = time();
        $this->db->query("insert into products(product_name,qty,price,createtime,updatetime) 
        values ('". $data['product_name'] ."', '". $data['qty'] ."', ". $data['price']. ", ". $time. ", ". $time .")");
        if( $this->db->error ){
            throw new Exception($this->db->error);
        }
        return $this->db->insert_id;
    }
    public function fetchProducts($id=""){
        if($id > 0){
            $result = $this->db->query("select * from products where product_id=".$id);
        }else{
            $result = $this->db->query("select * from products");
        }
        if( $this->db->error ){
            throw new Exception($this->db->error);
        }
        $data=[];
        while($row=$result->fetch_assoc()){
            $data[] = array(
                'product_id' => $row['product_id'],
                'product_name' => $row['product_name'],
                'qty' => $row['qty'],
                'price' => $row['price']
            );
        }
        return $data;
    }
    public function updateProduct($data){
        $time = time();
        $sql = "update products set product_name='". $data['product_name']."', qty='". $data['qty']."', price='". $data['price']."', updatetime=$time where product_id=".$data['product_id'];
        $this->db->query($sql);
        if( $this->db->error ){
            throw new Exception($this->db->error);
        }
        return $this->db->affected_rows;
    }
    public function getQty($product_id){
        $result = $this->db->query("select qty from products where product_id=".$product_id);
        while($row=$result->fetch_assoc()){
            return $row['qty'];
        }
    }
}