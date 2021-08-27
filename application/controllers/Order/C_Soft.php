<?php
include_once('application/controllers/Controller.php');
include_once('application/models/M_Orders.php');
include_once('application/controllers/C_Base.php');

 //Контролер програмного забезпечення

class C_Soft extends C_Base
{
    public $soft;

    // Конструктор

    function __construct() {

        $this->soft = array();
    }

    //
    // Обробник запиту
    //
    protected function OnInput()
    {
        parent::OnInput();

        $mOrder = M_Orders::Instance();
        $this->soft = $mOrder->GetAllSoft();
    }

    protected function OnOutput() {
        $vars = array('soft' => $this->soft);
        $this->content = $this->View('templates/theme/v_soft.php', $vars);
        $this->title = 'Програмне забезпечення для створення та підписання звітів';
        parent::OnOutput();
    }
}
