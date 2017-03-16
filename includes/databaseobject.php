<?php
require_once ("initialize.php");

class DatabaseObject {

	// Attributes
	//All Children have an ID, table_name
	//Make sure database column name attributes are written
	//as they appear in the database
	public $id;
	protected static $table_name;


	// The following four functions are public and allow for the
	// finding and instantiaion of objects. They are inhereted by
	// children who have the static attribute '$table_name'.
	// Note that 'find_by_sql' & 'find_by_attribute' calls the instantiate method.

	public static function find_by_id($id=0) {
		$result_array = static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE id={$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	public static function find_all(){
		return static::find_by_sql("SELECT * FROM ".static::$table_name." ORDER BY id DESC");
	}

	public static function find_by_sql($sql=""){
		global $database;
		$result = $database->query($sql);
		$object_array = array();
		while($row = $database->fetch_array($result)) {
			$object_array[] = static::instantiate($row);
		}
		return $object_array;
	}

	protected static function find_assoc($sql){
		global $database;
		$query_array= array();
		$result = $database->query($sql);
		while($row = $database->fetch_assoc($result)){
			$query_array[] =$row;
		}
		return $query_array;
	}

	public static function find_by_attribute($attribute, $value){
                global $database;
                $sql = "SELECT * FROM ".static::$table_name;
                $sql .= " ORDER BY id DESC";
                $result = $database->query($sql);
                $object_array = array();
                while($row = $database->fetch_array($result)) {
                        $object = static::instantiate($row);
                        if ($object->$attribute == $value){
                                $object_array[] = $object;
                        }else{
                                unset($object);
                        }
                }
                return $object_array;
        }




	//The next two functions istantiate the object
	//and assign the specific MySQL table values
	//to the object's attributes.
	//The third function is overridden by children
	//and it assigns values to non MySQL table values.


	
	//Does attribute Exist?
	private function has_attribute($attribute) {
		$object_vars = get_object_vars($this);
		return array_key_exists($attribute, $object_vars);
	}

	
	// Instantiate Object and Give Attributes Values
	private static function instantiate($record){		
		$class_name = get_called_class();		
		$object = new $class_name;		
		foreach($record as $attribute=>$value){
			if($object->has_attribute($attribute)) {
				$object->$attribute = $value;
			}
		}
		
		static::get_extra_attributes($object);
		return $object;
	}

	//To be Overriden	
	protected static function get_extra_attributes($object){}

	
	
	// The following functions are for displaying
	// object attributes in a table


	
	public static function print_large_header($object_name){
		echo "<font size='6'>".ucfirst($object_name)."</font>&emsp;";
		$o=$object_name;		
		if ($o == 'sensor' || $o== 'pcb' || $o=='plate'|| $o=='module'){
			echo "<a href='../../images/{$object_name}'> images </a>";
			echo " | <a href='../../data/{$object_name}'> data </a>";
		}
		echo "<hr><br>";
	}



	public static function print_table_headers($object_name){
		echo "<table><tr>";
                foreach ($object_name::$table_header as $word)
                {
                echo "<th>{$word}</th>";
                }
                echo '</tr>';
	}

	public static function print_table_attributes($objects){
		foreach ($objects as $object){
                echo "<tr>";
                foreach (get_class($object)::$table_attributes as $att){
						$att == "id" ? $page = 'main' : $page = 'table';
						$html = "<td><a href='./".$page;
						$html .=".php?name=".get_class($object); 
						$html .="&item=".$att;
                        $html .= "&value=".$object->$att;
                        $html .= "'>".$object->$att."</a></td>";
                        echo $html;
			}
		}
	}






}//Close Class Brace

?>

