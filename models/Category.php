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
}

?>