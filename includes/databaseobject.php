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

	






}//Close Class Brace

?>

