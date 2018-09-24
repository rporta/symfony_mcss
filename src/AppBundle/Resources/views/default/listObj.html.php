<?
$pag['backgroundColor'] = "grey,0";
$pag = new AppBundle\Utility\Obj\pag($pag);
if(!empty($editar)){
	$pag->js = 
	"$(document).click(function(e){

		$.ajax({
			method: 'POST',
			url: 'some.php',
			data: e
		})
		.done(function( msg ) {
			
		});
	});";
}
$pag->render();