<?php if(!defined("__XE__"))exit;
echo '<?xml version="1.0" encoding="UTF-8" ?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"<?php if($__Context->config->sitemap_extension > 0){ ?> xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"<?php };
if($__Context->config->sitemap_extension > 1){ ?> xmlns:video="http://www.google.com/schemas/sitemap-video/1.1"<?php } ?>>
	<?php if($__Context->oDocuments&&count($__Context->oDocuments))foreach($__Context->oDocuments as $__Context->oDocument){ ?><url>
		<?php if($__Context->config->use_mid_exception == 'Y'){ ?>
		<loc><?php echo $__Context->oDocument->getPermanentUrl() ?></loc>
		<?php }else{ ?>
		<loc><?php echo getFullUrl('','mid',$__Context->oDocument->getDocumentMid(),'document_srl',$__Context->oDocument->get('document_srl')) ?></loc>
		<?php } ?>
		<?php if($__Context->config->use_lastmod == 'Y'){ ?>
		<lastmod><?php echo $__Context->oDocument->getUpdateDT() ?></lastmod>
		<?php } ?>
		<?php if($__Context->oDocument->get('uploaded_count')){ ?>
			<?php if($__Context->oDocument->getUploadedFiles()&&count($__Context->oDocument->getUploadedFiles()))foreach($__Context->oDocument->getUploadedFiles() as $__Context->file){ ?>
			<?php if($__Context->file->direct_download == 'Y'){ ?>
			<?php if(preg_match('/\.(jpg|jpeg|gif|png)$/i',$__Context->file->uploaded_filename) && $__Context->config->sitemap_extension > 0){ ?>
			<image:image>
				<image:loc><?php echo getFullUrl('');
echo str_replace('./', '', $__Context->file->uploaded_filename) ?></image:loc>
			</image:image>
			<?php } ?>
			<?php if(preg_match('/\.(swf|flv|wmv|avi|mpg|mpeg|asx|asf)$/i',$__Context->file->uploaded_filename) && $__Context->config->sitemap_extension > 1){ ?>
			<video:video>
				<video:content_loc><?php echo getFullUrl('');
echo str_replace('./', '', $__Context->file->uploaded_filename) ?></video:content_loc>
				<?php if($__Context->oDocument->thumbnailExists()){ ?>
				<video:thumbnail_loc><?php echo $__Context->oDocument->getThumbnail() ?></video:thumbnail_loc>
				<?php } ?>
				<video:title><?php echo $__Context->oDocument->getTitleText() ?></video:title>
				<video:description><?php echo str_replace('&nbsp;', ' ', $__Context->oDocument->getContentText(200)) ?></video:description>
			</video:video>
			<?php } ?>
			<?php } ?>
			<?php } ?>
		<?php } ?>
	</url><?php } ?>
</urlset>
