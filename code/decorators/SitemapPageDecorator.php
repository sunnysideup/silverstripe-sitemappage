<?php

class SitemapPageDecorator extends SiteTreeExtension {

	protected static $sitemap_classes_to_exclude = array("ErrorPage");
		static function set_sitemap_classes_to_exclude($v) {self::$sitemap_classes_to_exclude = $v;}
		static function get_sitemap_classes_to_exclude() {return self::$sitemap_classes_to_exclude;}

	protected static $sitemap_classes_to_include = array();
		static function set_sitemap_classes_to_include($v) {self::$sitemap_classes_to_include = $v;}
		static function get_sitemap_classes_to_include() {return self::$sitemap_classes_to_include;}

	function SiteMapPages() {
		return SiteTree::get()->where(" \"ParentID\" = {$this->owner->ID} AND ".$this->getWhereStatementForSiteMapPages());
	}


	function getWhereStatementForSiteMapPages(){
		$where = '1 = 1';
		$inc = SitemapPageDecorator::get_sitemap_classes_to_include();
		$exc = SitemapPageDecorator::get_sitemap_classes_to_exclude();
		if(is_array($inc) && count($inc)) {
			$where = "\"ClassName\" IN ('".implode("','", $inc)."')";
		}
		elseif(is_array($exc) && count($exc)) {
			$where = "\"ClassName\" NOT IN ('".implode("','", $exc)."')";
		}
		$where .= " AND \"ShowInMenus\" = 1 AND \"ShowInSearch\" = 1 AND \"ClassName\" <> 'SiteMapPage'  ";
		return $where;
	}


}
