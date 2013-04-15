<?php


/**
 * @author Nicolaas [at] sunnysideup.co.nz
 *
 *
 **/


class SiteMapPage extends Page {

	static $db = array(
		"ShowAllPages" => "Boolean"
	);

	static $description = "Sitemap Page: shows all the pages on a site in a tree format";

	static $add_action = 'Site Map Page';

	static $icon = 'sitemappage/images/treeicons/SiteMapPage';

	function canCreate($member = null) {
		return ! DataObject::get_one('SiteMapPage');
	}

	function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->addFieldToTab("Root.Display", new CheckboxField("ShowAllPages", "Show all pages from the start"));
		return $fields;
	}

}

class SiteMapPage_Controller extends Page_Controller {

	function init() {
		parent::init();
		if(!$this->ShowAllPages) {
			Requirements::javascript(THIRDPARTY_DIR . '/jquery/jquery.js');
			Requirements::javascript('sitemappage/javascript/SiteMapPage.js');
			Requirements::themedCSS('SiteMapPage');
		}
		else {
			Requirements::themedCSS('SiteMapPageOpen');
		}
	}

	function LevelOneSiteMapPages() {
		return DataObject::get("SiteTree", " \"ParentID\" = 0 AND ".$this->getWhereStatementForSiteMapPages());
	}


}



