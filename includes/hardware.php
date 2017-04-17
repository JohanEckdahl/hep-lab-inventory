<?php
require_once ("initialize.php");

class Hardware extends DatabaseObject {

	public $location;

	protected static function find_location($object){
 		$sql  = "SELECT recipient FROM shipment";
                $sql .= " WHERE id IN";
                $sql .= " (SELECT shipment_id FROM shipped_item";
                $sql .= " WHERE item_table_name= '".get_class($object)::$table_name."'";
                $sql .= " AND item_id = ".$object->id;
                $sql .= " ) ORDER BY date DESC LIMIT 1";
                $array = self::find_assoc($sql);
		$location = array_pop($array)['recipient'];
		if(isset($location)){
			return $location;
		}else{
			return 'UCSB';
		}
	}

	protected static function find_comments($object){
		$sql = "SELECT * FROM comment WHERE ";
		$sql.= "item_table = '".get_class($object)::$table_name."'";
		$sql.= " AND table_key = ".$object->id;
		return Comment::find_by_sql($sql);
	}
	
	protected static function get_extra_attributes($object){
		parent::get_extra_attributes($object);
		$object->location = self::find_location($object);
	}
	

	public static function print_extra_info($object){		
		parent::print_extra_info($object);
		static::print_table_column_names('comment');
		static::print_table_attributes(static::find_comments($object));
	}

	public static function print_table_header($objects){
		$html = "<font size='6'>".get_class($objects[0])."</font>&emsp;";
		if(count($objects)==1){			
			$html .= static::print_image_link($objects[0]);
		}
		$html.= "<p align=right>".@$_GET['item']."=".@$_GET['value']."&emsp;";
		$html.= count($objects)." result(s)</p>";
		echo $html."<hr>";

	}

	public static function print_image_link($object){
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

}

?>
