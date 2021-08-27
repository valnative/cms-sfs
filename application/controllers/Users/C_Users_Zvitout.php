<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once('application/models/M_Users.php');
include_once('application/controllers/C_Base.php');
include_once(__DIR__ . "/../../../vendor/PHPMailer/src/PHPMailer.php");
include_once(__DIR__ . "/../../../vendor/PHPMailer/src/Exception.php");

// Контролер відправки звіту

class C_Users_Zvitout extends C_Base
{

    // Конструктор
    function __construct()
    {
        $this->needLogin = true;
    }

    // Обробник запиту
    protected function OnInput()
    {
        parent::OnInput();

        $mUsers = M_Users::Instance();
        $this->title = 'Надіслати звіт' . ' - ' . $this->user['login'];

        if (!empty($_FILES)) {
            $uploaddir = __DIR__ . "/../../../upload/";
            $uploadfile = $uploaddir . basename($_FILES['file']['name']);

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $mFile = M_Orders::Instance();
                $mFile->InsertToUpload(basename($_FILES['file']['name']), $this->user['id_user']);
                $email = new PHPMailer();
                $email->From = $this->user['email'];
                $email->FromName = $this->user['login'];
                $email->Subject = '';
                $email->Body = '';
                $email->AddAddress('rodnyk@outlook.com');
                $email->AddAttachment($uploaddir, basename($_FILES['file']['name']));
                $email->Send();
            } else {
                echo "Файл не завантажено. Зверніться до адміністратора!\n";
            }
        }
    }

    // Генератор HTML
    protected function OnOutput()
    {
        $vars = array('user' => $this->user);
        $this->content = $this->View('templates/theme/v_zvitout.php', $vars);
        parent::OnOutput();
    }
}