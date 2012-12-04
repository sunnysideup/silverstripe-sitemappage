<% if LevelOneSiteMapPages %>
<ul id="SiteMap">
<% control LevelOneSiteMapPages %>
	<li class="$FirstLast<% if SiteMapPages %><% else %> noChildrenLI<% end_if %>">
		<% if SiteMapPages %><a href="#" class="siteMapPageExpander SiteMapNodeImploded SiteMapLevel1" rel="$ID">+</a> <% end_if %>
		<a href="$Link" class="pageTitle SiteMapLevel1">$Title</a>
		<% if SiteMapPages %>
		<ul id="sublist{$ID}" class="SubListLevel2"><% control SiteMapPages %>
			<li class="$FirstLast<% if SiteMapPages %><% else %> noChildrenLI<% end_if %>">
				<% if SiteMapPages %><a href="#" class="siteMapPageExpander SiteMapNodeImploded SiteMapLevel2" rel="$ID">+</a> <% end_if %>
				<a href="$Link" class="pageTitle SiteMapLevel2">$Title</a>
				<% if SiteMapPages %>
				<ul id="sublist{$ID}" class="SubListLevel3"><% control SiteMapPages %>
					<li class="$FirstLast<% if SiteMapPages %><% else %> noChildrenLI<% end_if %>">
						<% if SiteMapPages %><a href="#" class="siteMapPageExpander SiteMapNodeImploded SiteMapLevel3" rel="$ID">+</a> <% end_if %>
						<a href="$Link" class="pageTitle SiteMapLevel3">$Title</a>
						<% if SiteMapPages %>
						<ul id="sublist{$ID}" class="SubListLevel4"><% control SiteMapPages %>
							<li class="$FirstLast<% if SiteMapPages %><% else %> noChildrenLI<% end_if %>">
								<% if SiteMapPages %><a href="#" class="siteMapPageExpander SiteMapNodeImploded SiteMapLevel4" rel="$ID">+</a> <% end_if %>
								<a href="$Link" class="pageTitle SiteMapLevel4">$Title</a>
								<% if SiteMapPages %><% control SiteMapPages %>
								<ul id="sublist{$ID}" class="SubListLevel5"><li class="$FirstLast noChildrenLI"><a href="$Link" class="pageTitle SiteMapLevel5">$Title <% if SiteMapPages %> ... there are more pages in this section <% end_if %></a></li></ul>
								<% end_control %><% end_if %>
							</li><% end_control %>
						</ul><% end_if %>
					</li><% end_control %>
				</ul><% end_if %>
			</li><% end_control %>
		</ul><% end_if %>
	</li>
<% end_control %>
</ul>
<% end_if %>
