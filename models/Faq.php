<?php

namespace faq;

class Faq extends \Model {
	public $table = '#prefix#faq';
	
	public static function next_num () {
		$res = \DB::shift ('select sort + 1 from #prefix#faq order by sort desc limit 1');
		if (! $res) {
			return 1;
		}
		return $res;
	}
	
	public static function yes_no () {
		return array (
			(object) array ('key' => 'no', 'value' => __ ('No')),
			(object) array ('key' => 'yes', 'value' => __ ('Yes')),
		);
	}
	
	public static function all () {
		$categories = Category::query ()
			->order ('name', 'asc')
			->fetch_orig ();

		$out = array (
			0 => (object) array (
				'id' => 0,
				'name' => '',
				'items' => array ()
			)
		);
		
		foreach ($categories as $category) {
			$category->items = array ();
			$out[$category->id] = $category;
		}

		$questions = self::query ()
			->order ('sort', 'asc')
			->fetch_orig ();

		foreach ($questions as $question) {
			if (! isset ($out[$question->category])) {
				$question->category = 0;
			}

			$out[$question->category]->items[] = $question;
		}
		
		return $out;
	}
	
	public static function by_category ($category) {
		
	}
}

?>