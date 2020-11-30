<?php
class ProductController extends Controller
{
    public function productAdd(){
        $user = new Product();
        $result = $user->fetchProducts();
        
        View::make('ProductAdd', $result);
    }
    public function productPost(){
        try{
            $product = new Product();
            if( $product->addProduct($_POST) ){
                $_SESSION['success'] = "Product has been added successfully!";
            }else{
                $_SESSION['error'] = "Someting went wrong!";
            }
            $this->render('/product/add');
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function edit(){
        try{
            $product = new Product();
            $result = $product->fetchProducts($_GET['product_id']);
            View::make('ProductEdit', $result);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function editPost(){
        //print_r($_POST);exit;
        try{
            $product = new Product();
            if( $product->updateProduct($_POST) ){
                $_SESSION['success'] = "Product has been updated successfully!";
            }else{
                $_SESSION['error'] = "Someting went wrong!";
            }
            $this->render('/product/add');
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function purchase(){
        try{
            $product = new Product();
            $result['product'] = $product->fetchProducts($_GET['product_id']);
            $user = new User();
            $result['users'] = $user->fetchUsers();
            View::make('Purchase', $result);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function buyNow(){
        $path = (!empty($_POST['path'])) ? $_POST['path'] : '/product/add';
        $qty = $_POST['qty'];
        $product = new Product();
        $productQty = $product->getQty($_POST['product_id']);
        if( $productQty < $qty ){
            $_SESSION['error'] = "Only $productQty quantities are available to buy!";
            $this->render($path);
            return;
        }
        $price = $_POST['price'];
        $box_qty = 0;
        if( $qty > 10 ){
            if(($qty % 10 != 0)){
                $unit_qty = $qty % 10;
                $box_qty = floor($qty/10);
            }else{
                $box_qty = $qty/10;
            }
        }else{
            $unit_qty = $qty;
        }
        $total_price = (($box_qty*10*$price)-$box_qty*$price)+($unit_qty*$price);
        $user = new User();
        $coins = $user->getCoins($_POST['user_id']);
        if( $coins < $total_price ){
            $_SESSION['error'] = "Only $coins coins are available to buy!";
            $this->render($path);
            return;
        }
        try{
            $post = array(
                'product_id' => $_POST['product_id'],
                'user_id' => $_POST['user_id'],
                'unit_qty' => $unit_qty,
                'box_qty' => $box_qty,
                'total_price' => $total_price,
                'discount' => $box_qty*$price,
                'qty' => $qty
            );
            $order = new Order();
            if( $order->create($post) ){
                $_SESSION['success'] = "Order has been created successfully!";
            }else{
                $_SESSION['error'] = "Someting went wrong!";
            }
            $this->render($path);
        }catch(Exception $e){
            echo $e->getMessage();
        }

    }
}