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
	
	public static function return_comment_html($objects){
		$comments = static::find_comments($objects[0]);	
		$html = Comment::return_table_column_name_html('Comment');
		$x = Comment::return_table_attributes_html($comments);
		if($x != ''){ $html.=$x;}else{$html='';}	
		return $html;		
	
	}
		
		

	
	protected static function get_extra_attributes($object){
		parent::get_extra_attributes($object);
		$object->location = self::find_location($object);
	}



}

?>
