<?php
include_once('application/controllers/Controller.php');
include_once('application/models/M_News.php');
include_once('application/controllers/C_Base.php');

    //Контролер FAQ
class C_Faq extends C_Base
{
    public $news;

    // Конструктор

    function __construct() {

        $this->news = array();
    }

    // Обробник запиту
    protected function OnInput()
    {
        parent::OnInput();

        $mNews = M_News::Instance();
        $this->news = $mNews->GetAllFaq();
    }

    protected function OnOutput() {
        $vars = array('news' => $this->news);
        $this->content = $this->View('templates/theme/v_faq.php', $vars);
        $this->title = 'Актуальні питання';
        parent::OnOutput();
    }
}
