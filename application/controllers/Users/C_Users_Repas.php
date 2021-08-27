<?phpinclude_once('application/models/M_Users.php');include_once('application/controllers/C_Base.php'); 		//Контролер сторінки нагадування паролюclass C_Users_Repas extends C_Base{		private $err;	private $info;	private $newUser;	// Конструктор	function __construct()	{		$this->err = null;		$this->info = null;		$this->newUser = array();	}		//Обробник запиту	protected function OnInput()	{		parent::OnInput();				$mUsers = M_Users::Instance();		$mUsers->Logout();							$this->user = null;		$this->ctrl = 'repas';		$this->title = 'Відновлення паролю';		// Обробка відправки форми		if(!empty($_POST))		{			$this->err = array();					// Перевіряєм чи є користувач з такою електронною скринькою			$this->newUser['email'] = trim($_POST['email']);			$userByMail = $mUsers->GetByMail($this->newUser['email']);			if(!isset($userByMail['id']))			{				$this->err[] =				"Користувач з таким електронной скринькой не зареєстрований";			}						// Якщо немає помилок, надсилаєм новий пароль			if(count($this->err) == 0)			{				//Генеруєм новий пароль				$pass = $mUsers->GenerateStr(6);							// Прибираєм зайві пробіли та робим подвійне шифрування				$password = md5(md5(trim($pass)));  				$mUsers->Repass($userByMail['id'], $password);								$mail =				"Шановний користувач, \n\nМи отримали запит на відновлення вашого пароля. Будь ласка, перейдіть \nпо засланні в панель користувача під тимчасовим паролем і виберіть новий \nпароль. \n\n  Ім'я користувача:". $UserByMail['login']. "\nТимчасовий пароль:". $pass. "\n\nЗ допомогою цього тимчасового пароля ви зможете змінити чинний пароль; \nколи ви зайдете в панель користувача, рекомендуємо замінити його на \nінший, більш зручний для запам'ятовування. \n\nЯкщо Ви не надсилали запит на зміну пароля \nможете не брати до уваги це повідомлення. \n\nС найкращими побажаннями, \n\nАдміністратор територіального органу ДФС";          $headers = 'From: rodnyk83@gmail.com \r\n'              ."X-Mailer: PHP/" . phpversion();          $headers .= "Content-type:text/html;";				mail($this->newUser['email'], 'Зміна пароля для доступу до сайту територіального органу ДФС України', $mail,				$headers);								$this->info = 'На вказаний поштову скриньку відправлені подальші інструкції з відновлення пароля';			}		}		else		{			$this->newUser['email'] = " ";		}	}		// Генератор HTML	protected function OnOutput()	{		$vars = array('user' => $this->newUser, 'errs' => $this->err, 'info' => $this->info, 'lan' => $this->lan);		$this->content = $this->View('templates/theme/v_repas.php', $vars);		parent::OnOutput();	}		}