<?php
include_once('application/models/M_News.php');
include_once('application/controllers/C_Base.php');

//Контролер видалення новини

class C_News_Delete extends C_Base
{
    private $news;

    // обробник запиту
    protected function OnInput()
    {
        parent::OnInput();

        $mNews = M_News::Instance();

        // Умова для видалення новини.
        if ($this->user && $this->user['id_role'] == 3 && (int)$_GET['id']) {

            $this->news = $mNews->Del((int)$_GET['id']);
            header("Location: /news");
            die();

        }
    }

    // Генератор HTML.
    protected function OnOutput()
    {
        $vars = array('news' => $this->news, 'errs' => $this->err);
        $this->content = $this->View('templates/theme/v_edit.php', $vars);
        parent::OnOutput();
    }
}