<?
if(!empty($post)){
	$pathLoadPag = "/frameload/{$post['editar_pagina']}/{$post['editar_accion']}";
}
?>
<iframe src="<?=$pathLoadPag;?>" style="display: block; width: 100vw; height: 100vh; margin: 0px; padding: 0px; border: none; overflow: hidden;">
	<script type="text/javascript"></script>
</iframe> 