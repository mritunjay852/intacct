<?php
class UserController extends Controller
{
    public function register(){
        //print_r($_GET);exit;
        $user = new User();
        $result = $user->fetchUsers();
        
        View::make('AddUser', $result);
    }
    public function add(){
        try{
            $user = new User();
            if($user->validate($_POST['email'])){
                $_SESSION['error'] = "User is already exist.";
                $this->render('/user/register');
                return;
            }
            if( $user->addUser($_POST) ){
                $_SESSION['success'] = "User has been added successfully!";
            }else{
                $_SESSION['error'] = "Someting went wrong!";
            }
            $this->render('/user/register');
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function edit(){
        try{
            $user = new User();
            $result = $user->fetchUsers($_GET['id']);
            View::make('EditUser', $result);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function editPost(){
        //print_r($_POST);exit;
        try{
            $user = new User();
            if( $user->updateUser($_POST) ){
                $_SESSION['success'] = "User has been updated successfully!";
            }else{
                $_SESSION['error'] = "Someting went wrong!";
            }
            $this->render('/user/register');
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}