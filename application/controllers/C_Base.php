<?phpinclude_once('application/controllers/Controller.php');include_once('application/models/M_Users.php');	//Базовий контролерabstract class C_Base extends Controller{	protected $title;				// заголовок сторінки	protected $content;			// вміст сторінки	protected $user;        // авторизація користувача	protected $needLogin;	protected $ctrl;	//	// Конструктор	//	function __construct() {				$this->needLogin = false;				$this->user = null;	}		protected function OnInput() { 				if (isset($_SESSION['user']))			$this->user['login'] = $_SESSION['user'];					$mUsers = M_Users::Instance();			$this->user = $mUsers->Get();			if ($this->needLogin == true) {				// Очистка старих сесій				$mUsers->ClearSessions();				// Поточний користувач				$this->user = $mUsers->Get();						if ($this->user == null) {				header('Location: /');				die();						}		}		$this->title = 'Територіальний орган ДФС';		$this->desc = 'Територіальний орган ДФС';		$this->style = '';		$this->scripts = '';		$this->content = '';		}			//Генератор HTML		protected function OnOutput() {		$this->user['login'] = ucfirst($this->user['login']);		$vars = array(			'lan' => $this->lan, 			'title' => $this->title, 			'desc' => $this->desc,			'style' => $this->style,			'scripts' => $this->scripts,			'content' => $this->content, 			'user' => $this->user,			'ctrl' => $this->ctrl,			);			$page = $this->View('templates/theme/v_layout.php', $vars);						echo $page;			}	}