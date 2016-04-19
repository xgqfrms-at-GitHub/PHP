<?php 
//class
class NBAPlayer{
	//public attributes
	public $name;
	public $height;
	public $weight;
	public $team;
	public $player_num;
    //private attributes
    private $blood_group;
    private $hobby;
    private $families;
    //protected attributes
    protected $income;
    protected $health;
    protected $secret;

    //construct method
    function __construct($name,$height,$weight,$team,$player_num){
    	$var = "100 Million";
    	$return = "return";
    	print_r($var, $return);
    	# this 伪变量，对象自身
    	$this->name = $name;
    	$this->height = $height;
    	$this->weight = $weight;
    	$this->team = $team;
    	$this->player_num = $player_num;
    }
    # construct will be auto call when object instance 

    //destruct method
    #Fatal error: Destructor NBAPlayer::__destruct() cannot take arguments
    function __destruct(){
    // function __destruct($name,$height,$weight,$team,$player_num){
    	$var = "100 Million";
    	$return = "return";
    	print_r($var, $return);
    	# this 伪变量，对象自身
    	$this->name = $name;
    	$this->height = $height;
    	$this->weight = $weight;
    	$this->team = $team;
    	$this->player_num = $player_num;
    }
    # destruct will be auto call when object instance execute over ?
    # destruct using to clear the rubbish!

    //public methods
    public function run(){
    	// echo "Running\n"; # \n 仅在cmd中好使！
    	echo "Running<br/>"; # <br/> 在Browser中好使！
    	//echo "Running&lt;br/&gt;"; 
    	# &lt;br/&gt; 在Browser中好使,显示为<br/> ！
    }
    public function jump(){
    	echo "Jumping<br/>";
    }
    public function dribble(){
    	echo "Dribbling<br/>";
    }
    public function slam_dunk(){
    	echo "Slam dunk<br/>";
    }

    //private methods
    private function pwd($new_pwd){
    	$pwd = $new_pwd;
    	echo "pwd:{$pwd}";
    }
}

$jordan = new NBAPlayer("Jordan@2016","1.98m","98kg","Bull","23");
#实例化，构造方法(参数list)！
$jordan->run();
$jordan->jump();
$jordan->dribble();
$jordan->slam_dunk();
#
$var_name = $jordan->name;
echo "name:{$var_name}<br/>";

// 显式： $jordan = null ; # 直接调用 析构函数；
// 隐式： //$jordan = null ; # 在函数执行结束时，自动调用 析构函数；


 ?>