	<!DOCTYPE html>
	<?php
	include '../connection.php';
	$i = 0;
	$id_joueur = NULL;
	$nom_joueur = NULL;
	$prenom_joueur = NULL;
	$login_joueur = NULL;
	$nickname = NULL;
	$defi_joueur = NULL;
	$etat_joueur = NULL;


	$requete = "SELECT id_Joueur, nom_Joueur, prenom_Joueur, login_joueur, nickname, defi_joueur, etat_joueur FROM joueur";
	$result = $mysqlConn->query($requete);
	while($row = $result->fetch_assoc()) {
		$id_joueur[$i] = $row['id_Joueur'];
		$nom_joueur[$i] = $row['nom_Joueur'];
		$prenom_joueur[$i] = $row['prenom_Joueur'];
		$login_joueur[$i] = $row['login_joueur'];
		$nickname[$i] = $row['nickname'];
		$defi_joueur[$i] = $row['defi_joueur'];
		$etat_joueur[$i] = $row['etat_joueur'];
		$i++;
	}

	$mysqlConn->close();
	?>

	<html lang="fr">
	  <head>
		<meta charset="UTF-8">
		<title>Administration</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/bootstrap.css" media="screen">
		<link rel="stylesheet" href="../css/bootswatch.min.css">
		<link rel="stylesheet" href="../css/myStyle.css">
		<script src="../js/jquery-1.11.1.min.js"></script>
		
		<script LANGUAGE="JavaScript"> 	
		var record = 5;
		var count =  <?php echo $i;?>;
		var pageTotal = ((count+record-1)/record)|0;
		var pagenum = 1;

	Cookie = { 
	 Set : function (){ 
	  var name = arguments[0], value = escape(arguments[1]), days = 365, path = "/"; 
	  if(arguments.length > 2) days = arguments[2]; 
	  if(arguments.length > 3) path = arguments[3]; 
	  with(new Date()){ 
	   setDate(getDate()+days); 
	   days=toUTCString(); 
	  } 
	  document.cookie = "{0}={1};expires={2};path={3}".format(name, value, days, path); 
	 }, 
	 Get : function (){ 
	  var returnValue=document.cookie.match(new RegExp("[\b\^;]?" + arguments[0] + "=([^;]*)(?=;|\b|$)","i")); 
	  return returnValue?unescape(returnValue[1]):returnValue; 
	 } 
	} 
	String.prototype.format = function(){ 
		var tmpStr = this; 
		var iLen = arguments.length; 
		for(var i=0;i<iLen;i++){ 
			tmpStr = tmpStr.replace(new RegExp("\\{" + i + "\\}", "g"), arguments[i]); 
		} 
		return tmpStr; 
	} 
	function setPagenum(){
		pagenum = Cookie.Get("pagenum"); 
		if(pagenum=="" || pagenum<1){ 
			pagenum=1; 
		} 
	} 

	setPagenum(); 

	coordinatePagenum(pagenum); 

	var pageBegin = (record*(pagenum-1)+1)|0; 

	var pageEnd = record*pagenum; 

	function showhiddenRecord(pagenum){ 
		number.innerHTML=pagenum; 
		if(pagenum<=1){ 
			theFirstPage.innerHTML="<span style='color:grey;'>PREMIER PAGE</span>"; 
			thePrePage.innerHTML="<span style='color:grey;'>PAGE PRECEDENT</span>"; 
		}else{ 
			theFirstPage.innerHTML="<a href=\"javascript:firstPage()\">PREMIER PAGE</a>"; 
			thePrePage.innerHTML="<a href=\"javascript:prePage()\">PAGE PRECEDENT</a>"; 
		} 
		if(pagenum>=pageTotal){ 
			theNextPage.innerHTML="<span style='color:grey;'>PAGE SUIVANT</span>"; 
			theLastPage.innerHTML="<span style='color:grey;'>DERNIER PAGE</span>"; 
		}else{ 
			theNextPage.innerHTML="<a href=\"javascript:nextPage()\">PAGE SUIVANT</a>"; 
			theLastPage.innerHTML="<a href=\"javascript:lastPage()\">DERNIER PAGE</a>"; 
		} 
		document.getElementById('goto').value=pagenum; 

		pageBegin = (record*(pagenum-1)+1)|0; 

		pageEnd = record*pagenum; 
		for(var i=1;i<=count;i++){ 
			if(i>=pageBegin && i<=pageEnd){ 
				mytable.rows[i].style.display=""; 
			}else{ 
				mytable.rows[i].style.display="none"; 
			} 
		} 
		Cookie.Set("pagenum", pagenum); 
	} 

	function firstPage(){ 
		pagenum=1; 
		showhiddenRecord(pagenum); 
	} 

	function lastPage(){ 
		showhiddenRecord(pageTotal); 
	} 

	function coordinatePagenum(num){ 
		if(num<1){ 
			num="1"; 
		}else if(num>pageTotal){ 
			num=pageTotal; 
		} 
	} 

	function prePage(){ 
		pagenum--; 
		coordinatePagenum(pagenum); 
		showhiddenRecord(pagenum); 
	} 

	function nextPage(){ 
		pagenum++; 
		coordinatePagenum(pagenum); 
		showhiddenRecord(pagenum); 
	} 

	function gotoPage(num){ 
		coordinatePagenum(pagenum); 
		showhiddenRecord(num); 
	} 
		</SCRIPT> 
		
	<script>

	function desactiver(object) {
				var id_joueur_des = $(object).parent().next().text();
				var buttonval = object.value;
				if (buttonval == 'Désactiver'){
					object.value = 'Activer';
				}else{
					object.value = 'Désactiver';
				}
				$.post("admin_desactiver_joueur.php",
		{
		  idJoueurDes:id_joueur_des,
		  Adesactiver: buttonval
		},
		function(){
		  window.location.reload();
		});
	}
	</script>

	  </head>
	<body onLoad="showhiddenRecord(pagenum);">
			<div class="row">
				<div class="page-header">
				  <h1 id="tables" style="color:DimGray ;text-align:center;">Administration</h1>
				</div>
				
				<div class="container">
					<h2 id="tables" style="color:SteelBlue ;text-align:center;">JOUEURS</h2>
					
					<center> 
						TOTAL <b><?php $pageTotal=(int)($i/5)+1; echo $pageTotal;?></b> PAGES <span style="margin-left:26px;"></span>PAGE COURANT <b><span id="number">1</span></b>
						<span style="margin-left:26px;"></span><span id="theFirstPage"><a href="javascript:firstPage()">PREMIER PAGE</a></span> 
						<span style="margin-left:26px;"></span><span id="thePrePage"><a href="javascript:prePage()">PAGE PRECEDENT</a></span> 
						<span style="margin-left:26px;"></span><span id="theNextPage"><a href="javascript:nextPage()">PAGE SUIVANT</a></span>
						<span style="margin-left:26px;"></span><span id="theLastPage"><a href="javascript:lastPage()">DERNIER PAGE</a></span> 
						<span style="margin-left:26px;"></span>GO TO<span style="margin-left:5px;"></span><select onChange="gotoPage(this.value)" id="goto">
						<?php
							for($cpt = 1; $cpt <= $pageTotal; $cpt++)
								{
									echo "<option value=".$cpt.">".$cpt."</option>";
								}
						?>
						</select><span style="margin-left:5px;"></span>PAGE 
					</center> 
					  <table id="mytable" class="table table-striped table-hover ">
						<tbody>
						  <tr class="info">
							<td style="color:DarkGray ; font-weight:bold ;"></td>
							<td style="color:DarkGray ; font-weight:bold ;">Id</td>
							<td style="color:DarkGray ;font-weight:bold ;">Nom</td>
							<td style="color:DarkGray ;font-weight:bold ;">Prénom</td>
							<td style="color:DarkGray ;font-weight:bold ;">Login</td>
							<td style="color:DarkGray ;font-weight:bold ;">Nickname</td>
							<td style="color:DarkGray ;font-weight:bold ;">Défiabilité</td>
						  </tr>
							<?php
								for($i = 0; $i < sizeof($id_joueur);$i++)
								{
									$cpt=$i+1;
									if((($i)%2) == 0){
										echo "<tr class='danger'>" ;
									}
									if ($etat_joueur[$i] == '1'){
										echo "<td><input class='buttonAdmin blueAdmin' type='button' value='Désactiver' onclick='desactiver(this);'></td>" ;
									}else{
										echo "<td><input class='buttonAdmin blueAdmin' type='button' value='Activer' onclick='desactiver(this);'></td>" ;
									}
									echo "<td>".$id_joueur[$i]."</td>";
									echo "<td>".$nom_joueur[$i]."</td>";
									echo "<td>".$prenom_joueur[$i]."</td>";
									echo "<td>".$login_joueur[$i]."</td>";
									echo "<td>".$nickname[$i]."</td>";
									echo "<td>".$defi_joueur[$i]."</td>";
									
									echo "</tr>";
								}
							?>
						</tbody>
					  </table> 
					<span style="float:left;"><a href="admin_menu.php">RETOUR<span style="vertical-align:text-bottom"><img src="../images/gauche.jpg" height="40" width="50"></span></a></span>
					<span style="float:right;"><a href="administration_questions.php"><img src="../images/droit.jpg" height="40" width="50">QUESTIONS</a></span>
				</div>
			</div>
	</body>
	</html>
