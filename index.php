<?php// Підключення до бази данихinclude_once('application/models/startup.php');// Підключення контролерівinclude_once('application/controllers/C_News.php');include_once('application/controllers/C_Faq.php');include_once('application/controllers/C_Feedback.php');include_once('application/controllers/News/C_News_Edit.php');include_once('application/controllers/News/C_News_Add.php');include_once('application/controllers/News/C_News_Delete.php');include_once('application/controllers/Users/C_Users_Main.php');include_once('application/controllers/Users/C_Users_Reg.php');include_once('application/controllers/Users/C_Users_Zvitout.php');include_once('application/controllers/Users/C_Users_Auth.php');include_once('application/controllers/Users/C_Users_Profile.php');include_once('application/controllers/Users/C_Users_Repas.php');include_once('application/controllers/Order/C_Orders.php');include_once('application/controllers/Order/C_Soft.php');include_once('application/controllers/Order/C_Soft_Download.php');include_once('application/controllers/Order/C_Zapit.php');include_once('application/controllers/Order/C_Zapiti.php');include_once('application/controllers/Order/C_Order_Add.php');include_once('application/controllers/Order/C_Order.php');include_once('application/controllers/C_Article.php');$db = DataBase::instance();$db->startSession();switch ($_GET['c']) {    case 'news':        $controller = new C_News();        break;    case 'add_news':        $controller = new C_News_Add();        break;    case 'delete':        $controller = new C_News_Delete();        break;    case 'faq':        $controller = new C_Faq();        break;    case 'orders':        $controller = new C_Orders();        break;    case 'zapit':        $controller = new C_Zapit();        break;    case 'soft':        $controller = new C_Soft();        break;    case 'download':        $controller = new C_Soft_Download();        break;    case 'zapiti':        $controller = new C_Zapiti();        break;    case 'order_add':        $controller = new C_Order_Add();        break;    case 'order':        $controller = new C_Order();        break;    case 'article':        $controller = new C_Article();        break;    case 'reg':        $controller = new C_Users_Reg();        break;    case 'zvitout':        $controller = new C_Users_Zvitout();        break;    case 'auth':        $controller = new C_Users_Auth();        break;    case 'edit':        $controller = new C_News_Edit();        break;    case 'repas':        $controller = new C_Users_Repas();        break;    case 'users':        $controller = new C_Users_Users();        break;    case 'profile':        $controller = new C_Users_Profile();        break;    case 'feedback':        $controller = new C_Feedback();        break;    default:        $controller = new C_Users_Main();}$controller->Request();