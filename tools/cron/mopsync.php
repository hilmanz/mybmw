<?phpinclude_once "db.php";include_once "curl_class.php";class mopsync extends db{	function __construct(){			$this->curl = new curl_class;		$this->baseurlservice = "http://beat-stg.ba-space.com/service/";		// $this->baseurlservice = "http://localhost/marlboro-hunt-2013/trunk/marlboro_hunt/service/";	}	function runservice(){			$run = $this->baseurlservice."login/account/inong/Kana9i8u!";			print_r($this->curl->get($run));						$run = $this->baseurlservice."mop/login";			print_r($this->curl->get($run));						$run = $this->baseurlservice."entourage/synchenturage";			print_r($this->curl->get($run));							}		}$class = new mopsync;$class->runservice(); die();?>