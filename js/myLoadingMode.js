function defineChargementMode(chargement, questionType, timer){
	if ( chargement == 'apres'){
		$("#part22").hide();
		if ( questionType == "image" ){
			$("#part221").text("Une image va s'afficher pendant 5 secondes une seule fois, cliquez sur le bouton 'Image' pour conmmencer.");
			$("#part221").show();
			$("#contenu").unbind('click');
			$("#contenu").text('Image');
			$("#contenu").click(function() {
				$("#mediaQ").modal('show');
				$("#monImage").show();
				timeout = setTimeout(function() {
					$("#mediaQ").modal('hide');
					$("#part221").hide();
					$("#part22").show();
					$('#contenu').prop('disabled', true);
					$("#sect1").slider("enable");
					$("#lambda2").slider("enable");
					$('#contenu').hide();
				}, timer);								
			});
		}
		else {
			$("#part221").text("Cliquez sur le bouton 'Musique' pour écouter d'une musique une seule fois.");
			$("#part221").show();
			$("#contenu").unbind('click');
			$("#contenu").text('Musique');
			$("#contenu").click(function() {								
				document.getElementById('maMusique').play();
				$("#monImage").hide();								
			});
				$("#maMusique").on("ended", function() {
					$("#part221").hide();
					$("#part22").show();	
					$("#mediaQ").modal('hide');
					$('#contenu').prop('disabled', true);
					$("#sect1").slider("enable");
					$("#lambda2").slider("enable");
					$('#contenu').hide();
				});
		}
	} else if ( chargement == 'avant'){
		if ( questionType == "image" ){
			$("#part221").text("Une image va s'afficher pendant 5 secondes une seule fois, cliquez sur le bouton 'Image' pour conmmencer.");
			$("#part221").show();
			$("#part22").show();
			$("#contenu").unbind('click');
			$("#contenu").text('Image');
			$("#contenu").click(function() {
				$("#mediaQ").modal('show');
				$("#monImage").show();
				timeout = setTimeout(function() {
					$("#mediaQ").modal('hide');
					$("#part221").hide();
					$('#contenu').prop('disabled', true);
					$("#sect1").slider("enable");
					$("#lambda2").slider("enable");
					$('#contenu').hide();
				}, timer);
			});
		}
		else {
			$("#part221").text("Cliquez sur le bouton 'Musique' pour écouter d'une musique une seule fois.");
			$("#part221").show();
			$("#part22").show();
			$("#contenu").unbind('click');
			$("#contenu").text('Musique');
			$("#contenu").click(function() {							
				document.getElementById('maMusique').play();
				$("#monImage").hide();							
			});
			$("#maMusique").on("ended", function() {
				$("#mediaQ").modal('hide');
				$("#part221").hide();
				$('#contenu').prop('disabled', true);
				$("#sect1").slider("enable");
				$("#lambda2").slider("enable");
				$('#contenu').hide();
			});
		}
	} else if ( chargement == 'toujours'){
		if ( questionType == "image" ){
			$("#part221").text("Cliquez sur le bouton 'Image' pour voir l'image.");
			$("#part221").show();
			$("#part22").show();
			$("#contenu").unbind('click');
			$("#contenu").text('Image');
			$("#contenu").click(function() {
				$("#mediaQ").modal('show');
				$("#monImage").show();
				timeout = setTimeout(function() {
					$("#mediaQ").modal('hide');
					$('#contenu').prop('disabled', false);
					$("#sect1").slider("enable");
					$("#lambda2").slider("enable");
				}, timer);							
			});
			
		}
		else {
			$("#part221").text("Cliquez sur le bouton 'Musique' pour écouter d'une musique.");
			$("#part221").show();
			$("#part22").show();
			$("#contenu").unbind('click');
			$("#contenu").text('Musique');
			$("#contenu").click(function() {
				document.getElementById('maMusique').play();
				$("#monImage").hide();
			});
			$('#maMusique').on('ended', function() {
				$("#mediaQ").modal('hide');
				$("#sect1").slider("enable");
				$("#lambda2").slider("enable");
			});
		}
	}	
}