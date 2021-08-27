<?php
include_once('application/models/M_News.php');
include_once('application/controllers/C_Base.php');

//Контролер редагування новини

class C_News_Edit extends C_Base
{
    private $err;
    private $news;
    
    // Конструктор
    
    function __construct() {
        $this->err = array();
        $this->news = array();

    }

    // Обробник запиту
    protected function OnInput()
    {
        parent::OnInput();

        $mNews = M_News::Instance();
        $this->news = $mNews->GetNewsById((int)$_GET['id']);
        $this->title = 'Редагування новини';

        // Обробка відправки форми
        if(!empty($_POST)) {

            // Якщо помилок немає, то додаєм в БД нового користувача
            if(count($this->err) == 0)
            {
                $mNews->Edit($_GET['id'],  $_POST['title'], $_POST['desc']);
                header("Location: /news"); die();
            }
        }
    }
    // Генератор HTML
    protected function OnOutput()
    {
        $vars = array('news' => $this->news, 'errs' => $this->err);
        $this->content = $this->View('templates/theme/v_edit.php', $vars);
        parent::OnOutput();
    }
}