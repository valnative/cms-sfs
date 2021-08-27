<?php
include_once('application/models/M_Users.php');
include_once('application/controllers/C_Base.php');

//Контролер зворотнього зв'язку

class C_Feedback extends C_Base
{
    private $err;
    private $newMessage;

    // Конструктор
    function __construct() {
        $this->err = array();
        $this->newMessage = array();
    }

    // Обробник запиту
    protected function OnInput()
    {
        parent::OnInput();

        $this->title = "Зворотній зв'язок";

        // Обробка відправки форми
        if(!empty($_POST)) {
            $this->err = array();
            $this->newMessage['name'] = trim($_POST['name']);


            if(count($this->err) == 0)
            {
                $mail = "Добрий день, ...  ".$_POST['name'];
              mail('rodnyk83@gmail.com', 'Нове повідомлення', $mail);
              header("Location: /"); die();
            }
        }
    }

    //
    // Виртуальный генератор HTML.
    //
    protected function OnOutput()
    {
        $vars = array('user' => $this->newMessage, 'errs' => $this->err);
        $this->content = $this->View('templates/theme/v_feedback.php', $vars);
        parent::OnOutput();
    }
}