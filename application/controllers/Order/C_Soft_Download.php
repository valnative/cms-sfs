<?php
include_once('application/controllers/Controller.php');
include_once('application/models/M_Orders.php');
include_once('application/controllers/C_Base.php');

    //Контролер завантаження програмного забезпечення

class C_Soft_Download extends C_Base
{
    public $orders;

    // Конструктор
    function __construct() {

        $this->soft = array();
    }

    // Обробник запиту
    protected function OnInput()
    {
        parent::OnInput();

        $mOrder = M_Orders::Instance();
        $this->soft = $mOrder->GetSoftById((int)$_GET['id']);
        if (file_exists($file = __DIR__."../../../../blanks/".$this->soft['file'])) {
            $size = filesize($file);
            //заголовки запита на сервер
            header('Pragma', 'public');
            header('Expires', '0');
            header('Cache-Control', 'must-revalidate, post-check=0, pre-check=0');
            header('Content-Disposition: attachment; filename="'.$this->soft['file'].'"');
            header('Content-Transfer-Encoding', 'binary');
            header('Content-Length', $size);
            readfile($file);
        }
    }

    protected function OnOutput() {
    }
}
