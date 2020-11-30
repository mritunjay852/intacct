<?php
class ReportController extends Controller
{
    public function fetchReport(){
        try{
            $order = new Order();
            $result = $order->fetchOrderReport($_GET);
            
            View::make('Report', $result);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function fetchReportByDate(){
        $createtime = date("Y-m-d", strtotime("11/12/10"));
        try{
            $order = new Order();
            $result = $order->fetchOrderReport($_POST);
            
            View::make('Report', $result);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}