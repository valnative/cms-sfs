<?php
include_once('application/models/M_News.php');
include_once('application/controllers/C_Base.php');

//Контролер додавання новин
 
class C_News_Add extends C_Base
{
    private $err;
    private $news;
    
    // Конструктор.
    function __construct() {
        $this->err = array();
        $this->news = array();
    }

    // Обробник запиту
    protected function OnInput()
    {
        parent::OnInput();
        
        $mNews = M_News::Instance();
        $this->title = 'Додавання новини';

        // Обробка відправки форми
        if(!empty($_POST)) {

            // Якщо немає помилок, то додає в БД новину
            if(count($this->err) == 0)
            {
                $mNews->Add($_POST['title'], $_POST['desc']);
                header("Location: /news"); die();
            }
        }
    }

    // Генератор HTML.
    protected function OnOutput()
    {
        $vars = array('news' => $this->news, 'errs' => $this->err);
        $this->content = $this->View('templates/theme/v_news_add.php', $vars);
        parent::OnOutput();
    }
}