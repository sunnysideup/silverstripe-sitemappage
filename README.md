Site Map Page
================================================================================

Adds a basic sitemap page to your site with plenty
of customistation options (themed CSS).


Developer
-----------------------------------------------
Nicolaas Francken [at] sunnysideup.co.nz


Requirements
-----------------------------------------------
see composer.json



Documentation
-----------------------------------------------
Please contact author for more details.

Any bug reports and/or feature requests will be
looked at in detail

We are also very happy to provide personalised support
for this module in exchange for a small donation.


Installation Instructions
-----------------------------------------------
1. Find out how to add modules to SS and add module as per usual.

2. Review configs and add entries to mysite/_config/config.yml
(or similar) as necessary.
In the _config/ folder of this module
you can usually find some examples of config options (if any).

3. IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT
add the following code to your Page.php Page Class (NOT CONTROLLER CLASS):

	function SiteMapPages() {
		return DataObject::get("SiteTree", "ParentID = ".$this->ID." AND ShowInMenus = 1 AND ClassName <> 'SiteMapPage'");
	}


you can edit this function as you see fit!
