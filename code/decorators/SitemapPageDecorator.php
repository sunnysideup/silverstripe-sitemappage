<?php

class SitemapPageDecorator extends SiteTreeExtension {

	private static $sitemap_classes_to_exclude = array("ErrorPage");

	private static $sitemap_classes_to_include = array();

	function SiteMapPages() {
		return SiteTree::get()->where(" \"ParentID\" = {$this->owner->ID} AND ".$this->getWhereStatementForSiteMapPages());
	}


	function getWhereStatementForSiteMapPages(){
		$where = '1 = 1';
		$inc = $this->owner->Config()->get("sitemap_classes_to_include");
		$exc = $this->owner->Config()->("sitemap_classes_to_exclude");
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
