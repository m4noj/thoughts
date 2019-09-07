<?php
namespace Framework;
use \PDO;

class db {
	private $db_host;
	private $db_user;
	private $db_pass;
	private $db_name;
	private $pdo;
	private $table;
	private $pk;

	public function __construct(string $table,string $pk){
		$this->db_host = "localhost";
		$this->db_user = "root";
		$this->db_pass = "";
		$this->db_name = "thoughts";
		$this->table = $table;
		$this->pk = $pk;
		try {
			$this->pdo = new \PDO("mysql:host=$this->db_host;dbname=$this->db_name",$this->db_user,$this->db_pass);			
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			return $this->pdo;
		} catch (\PDOException $e){
			echo "<b>[Error] Unable to connect to the database server : </b><br>". $e->getMessage().' <b>in</b> '.$e->getFile().' <b>: '.$e->getLine().'</b>';
			die();
		}
	}
	private function query(string $sql,array $args=[]){
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($args);
		return $stmt;
	}
	public function countAll(){
	$stmt = $this->query('SELECT COUNT(*) FROM `'.$this->table.'` ');
	$row = $stmt->fetch();
	return $row[0];
	}
	public function getThoughts(){
		$stmt = $this->query('SELECT thoughts.id,text,thoughts.date,authorid,authors.name,authors.email FROM thoughts INNER JOIN authors ON authorid = authors.id order by id desc');
		return $stmt->fetchAll();
	}
	public function update(array $fields,int $id){
		$q = "UPDATE `".$this->table."` SET ";
		$params = [];
		foreach($fields as $k => $v){
			$q .= " `".$k."` = ? , ";
			array_push($params,$fields[$k]);
		}
		$q = rtrim($q, ' , ');
		$q .= " WHERE `".$this->pk."` = ? ";
			array_push($params,$id);
			$this->query($q,$params);
		echo "success";
	}
	public function insert(array $fields){
		$q = 'insert into `'.$this->table.'` SET ';
		$params = [];
		foreach($fields as $k => $v){
			$q .= " `".$k."` = ? , ";
			array_push($params,$fields[$k]);
		}
		$q .= ' date = ? ';
		$date = new \DateTime();
		$date = $date->format('Y-m-d');
		array_push($params,$date);
		$this->query($q,$params);
	}
	public function findAll(){
		$result = $this->query('select * from `'.$this->table.'` ');
		return $result->fetchAll();
	}
	public function find(string $col,string $val){
		$result = $this->query("select * from `".$this->table."` where `".$col."` = '".$val."' ");
		return $result->fetchAll();
	}
	public function getRecord(int $id){
		$result = $this->query('select * from `'.$this->table.'` where `'.$this->pk.'` = '.$id.' ');
		return $result->fetch();
	}
	public function delete(int $id){
		$this->query('delete from `'.$this->table.'` where `'.$this->pk.'` = '.$id.' ');
	}
// end of db 
}