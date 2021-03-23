<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name',
        'category_slug',
        'parent',
        'seo_title',
        'seo_meta_description'
    ];
	
	public function buildTree(Array $data, $parent = 0) {
    $tree = array();
		foreach ($data as $d) {
			if ($d['parent'] == $parent) {
				$children = Self::buildTree($data, $d['id']);
				// set a trivial key
				if (!empty($children)) {
					$d['_children'] = $children;
				}
				$tree[] = $d;
			}
		}
		return $tree;
	} 

	public static function printTree($tree, $r = 0, $p = null, $select = null) {
		foreach ($tree as $i => $t) {
			$dash = ($t['parent'] == 0) ? '' : str_repeat('-', $r) .' ';
			$selected = ($t['id'] == $select) ? 'selected' : ' ';
			printf("\t<option value='%d' %s>%s%s</option>\n", $t['id'],$selected, $dash, $t['name']);
			if ($t['parent'] == $p) {
				// reset $r
				$r = 0;
			}
			if (isset($t['_children'])) {
				Self::printTree($t['_children'], ++$r, $t['parent'], $select);
			}
		}
	}
}
