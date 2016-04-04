$(document).ready(function(){
	$("#boutonClas").click(function(){
		var myRadio = $('input[name=nivDif]');
		var checkedValue = myRadio.filter(':checked').val();
		if ( jQuery.type(checkedValue) === "string") {
			$('#myForm').attr('action', "newQuestionnaire/newQuestionnaire.php").submit();
		} else {
			alert("Vous n'avez pas choisir le niveau de difféculté !");
		}
	});
	
	$("#boutonHis").click(function(){
		var myRadio = $('input[name=nivDif]');
		var checkedValue = myRadio.filter(':checked').val();
		if ( jQuery.type(checkedValue) === "string") {
			var idQuest;
			//prendre un questionnaire aleatoirement
			$.ajax({
				type: 'POST',
				async: false,
				url: "savedQuestionnaire/getRandomQuestionnaire.php",
				data: {nivDif:checkedValue}
			})
			.done(function(data){
				idQuest = parseInt(data);	
			});	
			
			if (!idQuest){
				alert("Pas de questionnaires enregistrés !");
			} else {
				$('#myForm').attr('action', "savedQuestionnaire/savedQuestionnaire.php").submit();
			}
		} else {
			alert("Vous n'avez pas choisir le niveau de difféculté !");
		}
	});
});