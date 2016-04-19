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
    	print_r(var, return)
    	# this 伪变量，对象自身
    	$this->name = $name;
    	$this->height = $height;
    	$this->weight = $weight;
    	$this->team = $team;
    	$this->player_num = $player_num;
    }
    # construct will be auto call when object instance 

    //public methods
    public function run(){
    	echo "Running\n";
    }
    public function jump(){
    	echo "Jumping\n";
    }
    public function dribble(){
    	echo "Dribbling\n";
    }
    public function slam_dunk(){
    	echo "Slam dunk\n";
    }
}

$jordan = new NBAPlayer("Jordan","1.98m","98kg","Bull","23");
#实例化，构造方法(参数list)！
$jordan->run();
$jordan->jump();
$jordan->dribble();
$jordan->slam_dunk();
#
$var_name = $jordan->name;
echo "name:{$var_name}\n";

 ?>