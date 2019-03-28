<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="$ContentLocale" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="$ContentLocale" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="$ContentLocale" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="$ContentLocale" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="$ContentLocale" class="no-js"> <!--<![endif]-->
	<head>
        <% base_tag %>

		<title>$SiteConfig.Title &raquo; <% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %><% if $Action = 'SearchForm' && $Query %> for &quot;{$Query}&quot;<% end_if %></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		$MetaTags(false)

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,700,900" rel="stylesheet" />

		<!-- Favicon -->
		<link rel="shortcut icon" href="$ThemeDir/images/favicon.ico?v=3" />

		<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/detectizr/2.2.0/detectizr.min.js"></script>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<script type="text/javascript">
			var appCfg = {
				'site_url': '{$BaseHref}'
			};
		</script>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-89270755-1', 'auto');
		  ga('send', 'pageview');

		</script>
		<!-- start Mixpanel -->
		<% require javascript("themes/megatheme/javascripts/mixpanel.js") %>
		<!-- end Mixpanel -->

		<style>
            html.touch .workbox-default .detail{
                background-color: rgba(233, 79, 53, 0.8) !important;
			}
		</style>
	</head>

	<body class="{$bodyClasses}" data-spy="scroll" data-target=".navbar-scrollspy">
        <div id="page" class="hfeed site">
            <a class="skip-link sr-only sr-only-focusable" href="#content">Skip to content</a>

			<header id="primary-header">$HeaderLayout</header>

			$Layout

			$FooterLayout
		</div>

		<% if $ClassName = 'Retailer' %>
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58a4c2f0da018b53"></script>
		<% end_if %>

		<script type="text/javascript">
		function googleTranslateElementInit() {
			new google.translate.TranslateElement({
				pageLanguage: 'en',
				layout: google.translate.TranslateElement.InlineLayout.SIMPLE
			}, 'google_translate_element');
		}
		</script>
		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	</body>
</html>
