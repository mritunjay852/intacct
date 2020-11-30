<?php
class Order extends Model
{
    private $db;
    public function __construct(){
        $this->db = static::getDatabaseConnection();
    }
    public function create($data){
        $date = date('Y-m-d');
        $total_price = $data['total_price'];
        $total_qty = $data['qty'];
        $this->db->begin_transaction();
        $this->db->query("insert into orders(product_id,user_id,unit_qty,box_qty,total_price,discount,createtime) 
        values ('". $data['product_id'] ."', '". $data['user_id'] ."', ". $data['unit_qty']. ", ". $data['box_qty']. ", ". $data['total_price']. ", ". $data['discount']. ", '". $date. "')");
        $this->db->query("update products set qty=qty-$total_qty where product_id=".$data['product_id']);
        $this->db->query("update users set coins=coins-$total_price where id=".$data['user_id']);
        $this->db->commit();
        if( $this->db->error ){
            throw new Exception($this->db->error);
        }
        return true;
    }
    public function fetchOrderReport($data){
        $createtime = (!empty($data['createtime'])) ? date("Y-m-d", strtotime($data['createtime'])) : date('Y-m-d');
        $sql = "select * from orders inner join products 
        ON orders.product_id=products.product_id inner join users 
        ON orders.user_id=users.id where orders.createtime='".$createtime."'";
        $result = $this->db->query($sql);
        if( $this->db->error ){
            throw new Exception($this->db->error);
        }
        $data=[];
        while($row=$result->fetch_assoc()){
            $data[] = array(
                'email' => $row['email'],
                'product_name' => $row['product_name'],
                'unit_qty' => $row['unit_qty'],
                'box_qty' => $row['box_qty'],
                'total_price' => $row['total_price']
            );
        }
        return $data;
    }
}