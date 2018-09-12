<?
if(!empty($post)){
	$pathLoadPag = "/frameload/{$post['editar_pagina']}";
}
?>
<iframe src="<?=$pathLoadPag;?>" style="display: block; width: 100vw; height: 100vh; margin: 0px; padding: 0px; border: none; overflow: hidden;"></iframe> 