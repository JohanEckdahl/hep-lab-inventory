<?php
require_once ("initialize.php");

class DatabaseObject {

//.......SECTION I......................
/* 	Attributes
	All Children have an ID and table_name
	Make sure database column name attributes are written
	as they appear in the database
*/

	public $id;
	protected static $table_name;

//..........END I.........................


//.......SECTION II.....................
/*
	The following functions are public and allow for the
	finding and instantiaion of objects. They are inhereted by
	children who have the static attribute '$table_name'.
	Note that 'find_by_sql' & 'find_by_attribute' call the instantiate method.
*/
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

//.......END II...........................


//.......SECTION III....................

	//These functions instantiate the object
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

	//Virtual Method
	protected static function get_extra_attributes($object){
	}

//.......END III............................	




//.......SECTION IV....................
	
	// The following functions are for displaying
	// object attributes in a table


	public static function print_table_header($objects){
		$html = "<font size='6'>".get_class($objects[0])."</font>&emsp;";
		if(count($objects)==1){	
			$html .= static::return_image_link($objects[0]);
		}else{
			$html.= "<br><br>".static::return_form_links(get_class($objects[0]));
		}
		$html.= "<div align=right>".@$_GET['item']."=".@$_GET['value']."&emsp;";
		$html.= count($objects)." result(s)</div>";
		$html.="<hr>";
		echo $html;
	}

	
	public static function print_table_column_names($object_name){
		$html = "<table><tr>";
		foreach ($object_name::$table_header as $word){
			$html.= "<th>{$word}</th>";
		}
		$html.='</tr>';
		echo $html;	
	}

	public static function print_table_attributes($objects){		
		$html = '';		
		foreach ($objects as $object){
                $html .= "<tr>";
                foreach (get_class($object)::$table_attributes as $att){
						$html .= "<td><a href='./table";
						$html .=".php?name=".get_class($object); 
						$html .="&item=".$att;
                        $html .= "&value=".$object->$att;
                        $html .= "'>".$object->$att."</a></td>";
                }
				$html .="</tr>";	
		}
		echo $html;
	}

	public static function return_image_link($object){
		$dir  = SITE_ROOT.'/public/inventory/images/';
		$dir .= get_class($object)::$table_name.'/'.$object->id;
		if (file_exists($dir)){
			$link = './images/index.php?object='.get_class($object)::$table_name;
			$link .= '&id='.$object->id;
			$html = "<a href=".$link;
			$html .= ">Images</a>";
		}else{ 
			$html = '';
		}
		return $html;
	}

	public static function return_form_links($class_name){
		global $session;
		if($session->is_logged_in()){
			$html = "<form action='../form/form.php' method='get'>";
			$html.= "<input type='radio' name='action' value='insert'>Insert Number: ";
			$html.= "<input type='text' name='number' size='1'>      |";
			$html.= "<input type='radio' name='action' value='update'>Update ID: ";
			$html.= "<input type='text' name='id' size='1'>   ";
			$html.= "<input type='submit' value='Go'>";
			$html.= "<input type='hidden' name='name' value='{$class_name}'>";
		}else{
			$html ='';
		}			
		return $html;
	}

	public static function print_extra_info($object){
	}

//.......END IV............................



//..........Section V......................
/*	
	This section covers methods for creation of objects and 
	insertion into the database
*/

		public static function insert_form_generator($id, $number){
			$array = static::$form;
			$html = "<table><tr>";		
			foreach($array as $key=>$value){
				$html.= "<th>{$key}</th>";
			}
			$html.= "</tr>";
			$html.="<form action='./process.php?action=insert&name=".static::$table_name."' method='post'>";
			for ($x = 0; $x<$number; $x++){
				$html.="<tr>";				
				foreach($array as $key=>$value){
					$html.="<td><input name='{$x}[{$key}]' value='{$value}' size='3'></td>";
				}
				$html.="</tr>";
			}
			$html.= "</table>";
			$html.= "<br><br><input type='submit' value='Submit'></form>";
			echo $html; 
		}

		public static function update_form_generator($id, $number){
			$object = static::find_by_id($id);
			$array = static::$form;
			$html = "<table><tr>";		
			foreach($array as $key=>$value){
				$html.= "<th>{$key}</th>";
			}
			$html.= "</tr>";
			$html.="<form action='./process.php?action=update&name=".static::$table_name."' method='post'>";
			for ($x = 0; $x<$number; $x++){
				$html.="<tr>";				
				foreach($array as $key=>$value){
					$html.="<td><input name='{$x}[{$key}]' value='{$object->$key}' size='3'></td>";
				}
				$html.="</tr>";
			}
			$html.= "</table>";
			$html.= "<br><br><input type='submit' value='Submit'></form>";
			echo $html; 
		}


		public static function insert($items) {
			global $database;
			foreach($items as $key => $value){
				$escaped[$key] = $database->escape_value($value);
			}
			$sql  = "INSERT INTO ".static::$table_name." (";
			$sql .= join(", ", array_keys($escaped));
			$sql .= ") VALUES ('";
			$sql .= join("', '", array_values($escaped));
			$sql .= "')";
			$sql  = str_replace("'null'","null", $sql);
			$sql  = str_replace("''","null", $sql);
			echo $sql;
			$database->query($sql);
		}


		public function update($items) {
			global $database;
			foreach($items as $key => $value){
				$escaped[$key] = $database->escape_value($value);
			}
			$subsql='';
			foreach($escaped as $key => $value){
				$subsql.= $key." = '". $value."', ";
			}
			$subsql = substr($subsql, 0, -2);	
			$sql = "UPDATE ".static::$table_name." SET ";
			$sql .= $subsql;
			$sql .= " WHERE id=". $escaped['id'];
			$sql  = str_replace("'null'","null", $sql);
			$sql  = str_replace("''","null", $sql);		
			echo $sql;	  		
			$database->query($sql);
			echo $sql;
	  		return ($database->affected_rows() == 1) ? true : false;
		}
//........END V.....................

}//End Class

?>

