<?php
include_once('application/controllers/Controller.php');
include_once('application/models/M_Orders.php');
include_once('application/controllers/C_Base.php');

//Контролер для онлайн заповнення звіту

class C_Order_Add extends C_Base
{
    public $orders;

    // Конструктор
    function __construct() {
        $this->orders = array();
    }
    // Обробник запиту
    protected function OnInput()
    {
        parent::OnInput();

        $mOrder = M_Orders::Instance();
        $orders = $mOrder->GetTemplatesById((int)$_GET['id']);
        foreach ($orders as $order){
            $this->orders[$order['group']][] = $order;
        }
    }

    protected function OnOutput() {
        $vars = array('orders' => $this->orders);
        $this->content = $this->View('templates/theme/v_order_add.php', $vars);
        $this->title = 'Звітність';
        parent::OnOutput();
    }
}