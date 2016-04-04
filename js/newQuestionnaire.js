function getUrlVars() {
	var vars = {};
	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
		vars[key] = value;
	});
	return vars;
}
$(document).ready(function(){
	$("#contenu").hide();
	$("#part21").hide();
	$("#part22").hide();
	$("#part23").hide();
	$("#part28").hide();
	$("#block2").hide();
	$("#part31").hide();
	$("#part32").hide();
	$("#block3").hide();
	
	var nivDif = getUrlVars()["nivDif"];
	var counter = 0;
	var timer = 5000 ;
	var idQ,idResultat,defiable,timeout,titre2,question,chargement,valExact,questionType,scoreM,positionK,Sa,Sp,supportMin,supportMax;
	var reponseL = [[100,0,0], [100,0,0], [100,0,0], [100,0,0], [100,0,0]];
	var reponseIMin= [[0,0,0], [0,0,0], [0,0,0], [0,0,0], [0,0,0]];
	var	reponseIMax= [[0,0,0], [0,0,0], [0,0,0], [0,0,0], [0,0,0]];
	var score = [0,0,0,0,0];
	var minInt1, maxInt1, minInt2, maxInt2, minInt3, maxInt3, lambdaValue2, lambdaValue3;			
	
	//definition des sliders
	$("#sect1").on("slideStart slide", function(slideEvt) {
		minInt1 = slideEvt.value[0];
		maxInt1 = slideEvt.value[1];
		$("#part25").text("Votre réponse : ["+minInt1+", "+maxInt1+"]");
		$("#intValMin2").text(minInt1);
		$("#intValMax2").text(maxInt1);
		minInt2 = minInt1;
		maxInt2 = maxInt1;
		$("#sect2").slider("enable");
		$("#sect2").slider({step: 1, min: minInt1, max: maxInt1, value: [minInt1,maxInt1]});
		$("#sect2").slider( "refresh" );
	});
		
	$("#sect2").on("slideStart slide", function(slideEvt) {
		minInt2 = slideEvt.value[0];
		maxInt2 = slideEvt.value[1];
		$("#part26").text("Votre réponse : ["+minInt2+", "+maxInt2+"]");
		$("#intValMin3").text(minInt2);
		$("#intValMax3").text(maxInt2);
		minInt3 = minInt2;
		maxInt3 = maxInt2;
		$("#sect3").slider("enable");
		$("#sect3").slider({step: 1, min: minInt2, max: maxInt2, value: [minInt2,maxInt2]});
		$("#sect3").slider( "refresh" );
	});
		
	$("#sect3").on('slideStart slide', function(slideEvt) {
		minInt3 = slideEvt.value[0];
		maxInt3 = slideEvt.value[1];
		$("#part27").text("Votre réponse : ["+minInt3+", "+maxInt3+"]");
	});

	$("#lambda2").on('slideStart slide', function(slideEvt) {
		lambdaValue2 = slideEvt.value;
		lambdaValue3 = 0;
		$("#lambda3").slider("enable");
		$("#lambda3").slider({step: 10, min: 0, max: lambdaValue2, value: 0});
		$("#lambda3").slider( "refresh" );
		$("#textlam2").text("Votre réponse : " + lambdaValue2 + "%");
	});

	$("#lambda3").on('slideStart slide', function(slideEvt) {
		lambdaValue3 = slideEvt.value;
		$("#textlam3").text("Votre réponse : " + lambdaValue3 + "%");            
	});
	
	//si on clique sur la bouton "start"
	$("#part14").click(function() {	
		scroll(0,0);
		if ($("#part13").prop('checked'))
			defiable = 1;
		else
			defiable =0;
		
		//prendre 5 questions aleatoirement
		$.ajax({
			type: 'POST',
			async: false,
			url: "getRandomQuestions.php",
			data: {nivDif:nivDif}
		})
		.fail(function() {
			alert( "error" );
		})
		.done(function(data){
			idQ = $.parseJSON(data);	
		});	
		
		// charger le contenu de chaque question
		$.ajax({
			type: 'POST',
			async: false,
			url: "getQuestionContent.php",
			data: {idQ:idQ[counter]}
		})
		.fail(function() {
			alert( "error" );
		})
		.done(function(data){
			question = $.parseJSON(data);
			valExact = parseInt(question.val_exact_Question);
			supportMin = parseInt(question.borne_inf_Question);
			supportMax = parseInt(question.borne_max_Question);
			questionType = question.mode_Question;
			chargement = question.mode_Chargement;
			
			if ( questionType == "image" ) 
				$('#monImage').attr('src', question.Contenu);
			else if ( questionType == "musique" )
				$('#maMusique').attr('src', question.Contenu);
			//charge toutes les infos de cette question 
			$("#part22").text(question.descrip_Question);
			$("#intValMin1").text(supportMin);
			$("#intValMax1").text(supportMax);
			minInt1=supportMin, maxInt1=supportMax, minInt2=supportMin, maxInt2=supportMax, minInt3=supportMin, maxInt3=supportMax, lambdaValue2=0, lambdaValue3=0;
			$("#sect1").slider({step: 1, min: supportMin, max: supportMax,value: [supportMin,supportMax], enabled:false});
			$("#sect2").slider({step: 1, min: supportMin, max: supportMax,value: [supportMin,supportMax], enabled:false});
			$("#sect3").slider({step: 1, min: supportMin, max: supportMax,value: [supportMin,supportMax], enabled:false});
			$("#lambda2").slider({step: 10, min: 0, max: 100, value: 0, enabled:false});
			$("#lambda3").slider({step: 10, min: 0, max: 100, value: 0, enabled:false});
		});
			
			counter ++;
			$("#contenu").show();
			$("#part11").hide();
			$("#part12").hide();
			$("#part13").hide();
			$("#part14").hide();
			$("#part28").hide();
			$("#mediaQ").modal('hide');
			$("#block1").show();
			$("#part23").show();
			$("#block2").show();
			$("#part31").hide();
			$("#part32").hide();
			$("#block3").hide();
			titre2 = "Question " + counter.toString();
			$("#part21").text(titre2);
			$("#part21").show();
			defineChargementMode(chargement, questionType, timer);
	});
	
	//si on clique sur la bouton "Next"
	$("#part23").click(function() {
		scroll(0,0);
		positionK = 0;
		reponseIMin[counter-1][0] = minInt1;
		reponseIMax[counter-1][0] = maxInt1;
		if ( valExact >= minInt1 && valExact <= maxInt1)
			positionK = 1 ;
			
		if ( lambdaValue3 != 0){
			reponseL[counter-1][2] = lambdaValue3;
			reponseIMin[counter-1][2] = minInt3;
			reponseIMax[counter-1][2] = maxInt3;
			reponseL[counter-1][1] = lambdaValue2;
			reponseIMin[counter-1][1] = minInt2;
			reponseIMax[counter-1][1] = maxInt2;
			if ( valExact >= minInt2 && valExact <= maxInt2)
				positionK = 2;
			if ( valExact >= minInt3 && valExact <= maxInt3)
				positionK = 3;
		} else if ( lambdaValue2 != 0){
			reponseL[counter-1][1] = lambdaValue2;
			reponseIMin[counter-1][1] = minInt2;
			reponseIMax[counter-1][1] = maxInt2;
			if ( valExact >= minInt2 && valExact <= maxInt2)
				positionK = 2;
		}
		if ( positionK == 3)
			Sa = 1;
		else
			Sa = 1 - reponseL[counter-1][positionK]/100;
		
		//formule du calcul
		Sp = 1 - ((reponseL[counter-1][0] - reponseL[counter-1][1])*(reponseIMax[counter-1][0]- reponseIMin[counter-1][0])
			   + (reponseL[counter-1][1] - reponseL[counter-1][2])*(reponseIMax[counter-1][1]- reponseIMin[counter-1][1])
			   + reponseL[counter-1][2] * (reponseIMax[counter-1][2]- reponseIMin[counter-1][2]))
			   / (100*(supportMax - supportMin)) 
		score[counter-1] = parseInt(parseFloat((Sa * Sp).toFixed(2))*100);
		
		$.ajax({
			type: 'POST',
			async: false,
			url: "getQuestionContent.php",
			data: {idQ:idQ[counter]}
		})
		.fail(function() {
			alert( "error" );
		})
		.done(function(data){
			question = '';
			question = $.parseJSON(data);
			valExact = parseInt(question.val_exact_Question);
			questionType = question.mode_Question;
			supportMin = parseInt(question.borne_inf_Question);
			supportMax = parseInt(question.borne_max_Question);
			chargement = question.mode_Chargement;
			
			if ( questionType == 'image') 
				$('#monImage').attr('src', question.Contenu);
			else if ( questionType == 'musique')
				$('#maMusique').attr('src', question.Contenu);
			$("#part22").text(question.descrip_Question);
			$("#intValMin1").text(supportMin);
			$("#intValMax1").text(supportMax);
			minInt1=supportMin, maxInt1=supportMax, minInt2=supportMin, maxInt2=supportMax, minInt3=supportMin, maxInt3=supportMax, lambdaValue2=0, lambdaValue3=0;
			$("#sect1").slider({step: 1, min: supportMin, max: supportMax,value: [supportMin,supportMax], enabled:false});
			$("#sect2").slider({step: 1, min: supportMin, max: supportMax,value: [supportMin,supportMax], enabled:false});
			$("#sect3").slider({step: 1, min: supportMin, max: supportMax,value: [supportMin,supportMax], enabled:false});
			$("#lambda2").slider({step: 10, min: 0, max: 100, value: 0, enabled:false});
			$("#lambda3").slider({step: 10, min: 0, max: 100, value: 0, enabled:false});
			$("#sect1,#sect2,#sect3,#lambda2,#lambda3").slider("refresh");
			$("#part25,#part26,#part27,#textlam2,#textlam3").text('');					
		});
		
		counter ++;
		$('#contenu').prop('disabled', false);
		$("#contenu").show();
		$("#mediaQ").modal('hide');
		$("#part11").hide();
		$("#part12").hide();
		$("#part13").hide();
		$("#part14").hide();
		$("#part28").hide();					
		$("#block1").show();
		$("#block2").show();
		$("#part31").hide();
		$("#part32").hide();
		$("#block3").hide();
		if (counter == 5){
			$("#part28").show();
			$("#part23").hide();
		} else {
			$("#part23").show();
			$("#part28").hide();
		}
		titre2 = "Question " + counter.toString();
		$("#part21").text(titre2);
		$("#part21").show();
		defineChargementMode(chargement, questionType, timer);
	});
	
	//si on clique sur la bouton "Fin"
	$("#part28").click(function() {
			scroll(0,0);
			positionK = 0;
			reponseIMin[counter-1][0] = minInt1;
			reponseIMax[counter-1][0] = maxInt1;
			if ( valExact >= minInt1 && valExact <= maxInt1)
				positionK = 1 ;
				
			if ( lambdaValue3 != 0){
				reponseL[counter-1][2] = lambdaValue3;
				reponseIMin[counter-1][2] = minInt3;
				reponseIMax[counter-1][2] = maxInt3;
				reponseL[counter-1][1] = lambdaValue2;
				reponseIMin[counter-1][1] = minInt2;
				reponseIMax[counter-1][1] = maxInt2;
				if ( valExact >= minInt2 && valExact <= maxInt2)
					positionK = 2;
				if ( valExact >= minInt3 && valExact <= maxInt3)
					positionK = 3;
			} else if ( lambdaValue2 != 0){
				reponseL[counter-1][1] = lambdaValue2;
				reponseIMin[counter-1][1] = minInt2;
				reponseIMax[counter-1][1] = maxInt2;
				if ( valExact >= minInt2 && valExact <= maxInt2)
					positionK = 2;
			}
			if ( positionK == 3)
				Sa = 1;
			else
				Sa = 1 - reponseL[counter-1][positionK]/100;
			
			//formule du calcul
			Sp = 1 - ((reponseL[counter-1][0] - reponseL[counter-1][1])*(reponseIMax[counter-1][0]- reponseIMin[counter-1][0])
				   + (reponseL[counter-1][1] - reponseL[counter-1][2])*(reponseIMax[counter-1][1]- reponseIMin[counter-1][1])
				   + reponseL[counter-1][2] * (reponseIMax[counter-1][2]- reponseIMin[counter-1][2]))
				   / (100*(supportMax - supportMin)) 
			score[counter-1] = parseInt(parseFloat((Sa * Sp).toFixed(2))*100);
			
			scoreM = parseInt((score[0]+score[1]+score[2]+score[3]+score[4])/5);
			
			var L1 = reponseL[0];
			var L2 = reponseL[1];
			var L3 = reponseL[2];
			var L4 = reponseL[3];
			var L5 = reponseL[4];
			
			var min1 = reponseIMin[0];
			var min2 = reponseIMin[1];
			var min3 = reponseIMin[2];
			var min4 = reponseIMin[3];
			var min5 = reponseIMin[4];
			
			var max1 = reponseIMax[0];
			var max2 = reponseIMax[1];
			var max3 = reponseIMax[2];
			var max4 = reponseIMax[3];
			var max5 = reponseIMax[4];
			
			//creer le questionnaire et remplir ce questionnaire
			$.ajax({
				type: 'POST',
				async: false,
				url: "createSavedQuestionnaire.php",
				data: {nivDif:nivDif,defiable:defiable,idQ:idQ}
			})
			.fail(function() {
				alert( "error" );
			})
			.done(function(data){
				idResultat = parseInt(data);
			});
			
			//envoyer les reponses au PHP pour les enregistrer dans la BBD
			$.ajax({
				type: 'POST',
				url: "saveReponse.php",
				data: {idr: idResultat, scr : score, scrm : scoreM, r1 : L1, r2 : L2, r3 : L3, r4 : L4, r5 : L5,
				rmin1: min1, rmin2: min2, rmin3: min3, rmin4: min4, rmin5: min5, rmax1: max1,rmax2: max2,rmax3: max3,
				rmax4: max4,rmax5: max5}
			})
			 .fail(function() {
				alert( "error" );
			});
			
			$('#score1').html(score[0]);
			$('#score2').html(score[1]);
			$('#score3').html(score[2]);
			$('#score4').html(score[3]);
			$('#score5').html(score[4]);
			$('#scoreM').html(scoreM);
			

			$("#mediaQ").modal('hide');
			$("#part11").hide();
			$("#part12").hide();
			$("#part14").hide();
			$("#part21").hide();
			$("#part22").hide();
			$("#part28").hide();
			$("#block1").hide();
			$("#block2").hide();
			$("#part31").show();
			$("#part32").show();
			$("#block3").show();
	
	});
	
	$("#part32").click(function() {
		window.location.replace('../menuPrincipal.php');
	});					
});