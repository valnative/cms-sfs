<?phpinclude_once('application/controllers/Controller.php');include_once('application/models/M_News.php');include_once('application/controllers/C_Base.php');	//Контролер статейclass C_Article extends C_Base{	public $news;			//Конструктор	function __construct() {				$this->news = array();	}		// Обробник запиту	protected function OnInput()	{		parent::OnInput();		$mNews = M_News::Instance();		$this->news = $mNews->GetNewsById($_GET["id"]);		//var_dump($this->news);	}		protected function OnOutput() {      $vars = array('news' => $this->news);      $this->content = $this->View('templates/theme/v_article.php', $vars);      $this->title = 'Новини';      parent::OnOutput();	}	}