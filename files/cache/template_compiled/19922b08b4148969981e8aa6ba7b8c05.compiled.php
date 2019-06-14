<?php if(!defined("__XE__"))exit;
echo '<?xml version="1.0" encoding="UTF-8" ?>' ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<?php for($__Context->i = 1; $__Context->i <= $__Context->result->total_page; $__Context->i++){ ?>
	<sitemap>
		<loc><?php echo getFullUrl('') ?>sitemap<?php echo $__Context->i ?>.xml</loc>
	</sitemap>
	<?php } ?>
</sitemapindex>
