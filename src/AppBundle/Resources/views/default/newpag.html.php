<?
$pag['backgroundColor'] = "grey,0";
$pag = new AppBundle\Utility\Obj\pag($pag);
if(!empty($editar)){
	$pag->js = "$(document).click(function(e){

	$.ajax({
  url: 'test.html',
  context: document.body
}).done(function() {
  $( this ).addClass( 'done' );
});	
	alert(e.target.nodeName);
	console.log(e);
	console.log(e.target.nodeName);
	});";
}
$pag->render();