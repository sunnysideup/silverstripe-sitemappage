<?php


/**
 * @author Nicolaas [at] sunnysideup.co.nz
 *
 *
 **/


class SiteMapPage extends Page {

	private static $db = array(
		"ShowAllPages" => "Boolean"
	);

	private static $description = "Sitemap Page: shows all the pages of a site in a tree format";

	private static $add_action = 'Site Map Page';

	private static $icon = 'sitemappage/images/treeicons/SiteMapPage';

	public function canCreate($member = null) {
		return ! SiteMapPage::get()->count();
	}

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->addFieldToTab("Root.Display", new CheckboxField("ShowAllPages", "Show all pages from the start"));
		return $fields;
	}

}

class SiteMapPage_Controller extends Page_Controller {

	public function init() {
		parent::init();
		if(!$this->ShowAllPages) {
			Requirements::javascript(THIRDPARTY_DIR . '/jquery/jquery.js');
			Requirements::javascript('sitemappage/javascript/SiteMapPage.js');
			Requirements::themedCSS('SiteMapPage', "sitemappage");
		}
		else {
			Requirements::themedCSS('SiteMapPageOpen', "sitemappage");
		}
	}

	public function LevelOneSiteMapPages() {
		$homePage = SiteTree::get()->filter(array("ParentID" => 0))->first();
		return $homePage->SiteMapPages($noParent = true);
	}


}



