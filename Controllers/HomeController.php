<?php
class HomeController extends Controller
{
    public function index(){
        try{
            $product = new Product();
            $result['products'] = $product->fetchProducts();
            $user = new User();
            $result['users'] = $user->fetchUsers();
            View::make('Home', $result);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}