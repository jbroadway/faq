<?php

namespace faq;

class Options {
	public static function yes_no () {
		return array (
			(object) array ('key' => 'no', 'value' => __ ('No')),
			(object) array ('key' => 'yes', 'value' => __ ('Yes')),
		);
	}
	
	public static function link_types () {
		return array (
			(object) array ('key' => 'default', 'value' => __ ('Full links (/faq#question)')),
			(object) array ('key' => 'anchors', 'value' => __ ('Anchor links (#question)')),
		);
	}
}
