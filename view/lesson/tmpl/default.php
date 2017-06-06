<?php if ( !defined('CMS_EXEC') ) { exit; } ?>

<?php if ( $this->_['title'] ): ?>

	<h1><?php echo $this->_['title']; ?></h1>
	<p><?php echo $this->_['content']; ?></p>
	
<?php else: ?>

	No Entry!
	
<? endif; ?>