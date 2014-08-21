<?php

namespace faq;

class Category extends \Model {
	public $table = '#prefix#faq_category';
	
	public static $categories = null;
	
	public static function filter_name ($id) {
		if (self::$categories === null) {
			self::$categories = self::query ()
				->order ('name', 'asc')
				->fetch_assoc ('id', 'name');
		}
		
		return isset (self::$categories[$id]) ? self::$categories[$id] : false;
	}
	
	public static function list_for_embed () {
		return array_merge (
			array (
				(object) array (
					'key' => '',
					'value' => __ ('Show all')
				)
			),
			self::query ('id as ' . self::backticks ('key') . ', name as ' . self::backticks ('value'))
				->order ('value', 'asc')
				->fetch_orig ()
		);
	}
}

?>