<% if LevelOneSiteMapPages.count %>
<ul id="SiteMap">
<% loop LevelOneSiteMapPages %>
	<li class="$FirstLast<% if SiteMapPages.count %><% else %> noChildrenLI<% end_if %>">
		<% if SiteMapPages.count %><a href="#" class="siteMapPageExpander SiteMapNodeImploded SiteMapLevel1" rel="$ID">+</a> <% end_if %>
		<a href="$Link" class="pageTitle SiteMapLevel1">$Title</a>
		<% if SiteMapPages.count %>
		<ul id="sublist{$ID}" class="SubListLevel2"><% loop SiteMapPages %>
			<li class="$FirstLast<% if SiteMapPages.count %><% else %> noChildrenLI<% end_if %>">
				<% if SiteMapPages.count %><a href="#" class="siteMapPageExpander SiteMapNodeImploded SiteMapLevel2" rel="$ID">+</a> <% end_if %>
				<a href="$Link" class="pageTitle SiteMapLevel2">$Title</a>
				<% if SiteMapPages.count %>
				<ul id="sublist{$ID}" class="SubListLevel3"><% loop SiteMapPages %>
					<li class="$FirstLast<% if SiteMapPages.count %><% else %> noChildrenLI<% end_if %>">
						<% if SiteMapPages.count %><a href="#" class="siteMapPageExpander SiteMapNodeImploded SiteMapLevel3" rel="$ID">+</a> <% end_if %>
						<a href="$Link" class="pageTitle SiteMapLevel3">$Title</a>
						<% if SiteMapPages.count %>
						<ul id="sublist{$ID}" class="SubListLevel4"><% loop SiteMapPages %>
							<li class="$FirstLast<% if SiteMapPages.count %><% else %> noChildrenLI<% end_if %>">
								<% if SiteMapPages.count %><a href="#" class="siteMapPageExpander SiteMapNodeImploded SiteMapLevel4" rel="$ID">+</a> <% end_if %>
								<a href="$Link" class="pageTitle SiteMapLevel4">$Title</a>
								<% if SiteMapPages.count %><% loop SiteMapPages %>
								<ul id="sublist{$ID}" class="SubListLevel5"><li class="$FirstLast noChildrenLI"><a href="$Link" class="pageTitle SiteMapLevel5">$Title <% if SiteMapPages.count %> ... there are more pages in this section <% end_if %></a></li></ul>
								<% end_loop %><% end_if %>
							</li><% end_loop %>
						</ul><% end_if %>
					</li><% end_loop %>
				</ul><% end_if %>
			</li><% end_loop %>
		</ul><% end_if %>
	</li>
<% end_loop %>
</ul>
<% end_if %>
