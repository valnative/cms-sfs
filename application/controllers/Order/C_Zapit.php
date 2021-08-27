<?php
include_once('application/controllers/Controller.php');
include_once('application/models/M_Orders.php');
include_once('application/controllers/C_Base.php');

    //Контролер завантаження запитів

class C_Zapit extends C_Base
{
    public $orders;

    // Конструктор
    function __construct() {

        $this->orders = array();
    }

    // Віртуальний обробник запиту
    protected function OnInput()
    {
        parent::OnInput();

        $mOrder = M_Orders::Instance();
        $this->orders = $mOrder->GetOrderById((int)$_GET['id']);
        if (file_exists($file = __DIR__."../../../../blanks/".$this->orders['file'])) {
            $size = filesize($file);
            header('Pragma', 'public');
            header('Expires', '0');
            header('Cache-Control', 'must-revalidate, post-check=0, pre-check=0');
            header('Content-Disposition: attachment; filename="'.$this->orders['file'].'"');
            header('Content-Transfer-Encoding', 'binary');
            header('Content-Length', $size);
            readfile($file);
        }
    }

    protected function OnOutput() {
    }
}
