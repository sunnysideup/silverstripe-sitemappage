<?php

class SitemapPageDecorator extends SiteTreeExtension {

	/**
	 * Note, you have to list each class explicitely
	 * That is, descendants need to be listed as well
	 * as their parents, to exclude them both.
	 *
	 * Includes override excludes.  If you list includes,
	 * then only those pages will be shown.
	 * If you dont list includes, then the exclude list will be
	 * used and if this is empty all page types will be included.
	 *
	 * @var Array
	 */
	private static $sitemap_classes_to_exclude = array("ErrorPage");

	/**
	 * Note, you have to list each class explicitely
	 * That is, descendants need to be listed as well
	 * as their parents, to exclude them both.
	 *
	 * Includes override excludes.  If you list includes,
	 * then only those pages will be shown.
	 * If you dont list includes, then the exclude list will be
	 * used and if this is empty all page types will be included.
	 *
	 * @var Array
	 */
	private static $sitemap_classes_to_include = array();

	/**
	 * @return DataList
	 */
	function SiteMapPages() {
		return SiteTree::get()->where(" \"ParentID\" = {$this->owner->ID} AND ".$this->getWhereStatementForSiteMapPages());
	}


	/**
	 *
	 * @return String
	 */
	protected function getWhereStatementForSiteMapPages(){
		$where = '1 = 1';
		$inc = Config::inst()->get("SitemapPageDecorator", "sitemap_classes_to_include");
		$exc = Config::inst()->get("SitemapPageDecorator", "sitemap_classes_to_exclude");
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
