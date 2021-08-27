<?php
include_once('application/controllers/Controller.php');
include_once('application/models/M_Orders.php');
include_once('application/controllers/C_Base.php');

    //Контролер запитів
 
class C_Zapiti extends C_Base
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
        $this->orders = $mOrder->GetAllZapiti();
    }

    protected function OnOutput() {
        $vars = array('orders' => $this->orders);
        $this->content = $this->View('templates/theme/v_zapiti.php', $vars);
        $this->title = 'Бланки запитів';
        parent::OnOutput();
    }
}
