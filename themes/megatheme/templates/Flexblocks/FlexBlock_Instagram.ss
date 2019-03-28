<script src="mysite/insta.js"></script>

<script>
var feed = new Instafeed({
	get: 'user',
	userId: '5532771504',
	clientId: 'b2006731cf604615b710778b58421318',
	accessToken: '5532771504.b200673.06079b954d714fba8ad1a184cd93420b',
	limit: 4,
	resolution: 'low_resolution',
	after: function() {
		$('#instafeed').removeClass('loading')
	},
	template: '<div class="insta-photo"><a href="{{link}}"><img src="{{image}}" alt="Instagram Photo" /></a></div>'
});

feed.run();
</script>

<div class="block block-{$ClassName} block-tpl-<% if $Template %>{$Template}<% else %>default<% end_if %> {$HTMLClasses} instagram-default" id="block-{$ID}">
    <div class="container">
		<h2 class="h3">Instagram <a href="https://www.instagram.com/$InstagramUsername">@$InstagramUsername</a></h2>

		<div id="instafeed" class="loading">

		</div>
    </div>
</div>
