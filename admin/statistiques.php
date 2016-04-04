<!DOCTYPE html>
<?php
	include '../connection.php';
	$i = 0;
	$id_joueur = NULL;
	$nickname = NULL;
	
	$requete = "SELECT DISTINCT JjQ_id_Joueur FROM joueur_joue_questionnaire";
	$result = $mysqlConn->query($requete);
	while($row = $result->fetch_assoc()) {
		$id_joueur[$i] = $row['JjQ_id_Joueur'];
		$i++;
	}
	$mysqlConn->close();
	//
	$mysqlConn = new mysqli($servername, $username, $password, $dbname);
	if ($mysqlConn->connect_error) {
		die("Connection failed: " . $mysqlConn->connect_error);
	}
	for($j = 0; $j < sizeof($id_joueur);$j++)
	{
	$requete = "SELECT nickname FROM joueur WHERE id_Joueur='$id_joueur[$j]'";
	$result = $mysqlConn->query($requete);
	$row = $result->fetch_assoc();
	$nickname[$j] = $row['nickname'];
	}
	$mysqlConn->close();
	//

	?>
	
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Statistiques</title>
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
<style>
#customers
{
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
width:100%;
border-collapse:collapse;
}
#customers td, #customers th 
{
text-align:center;
font-size:1em;
border:1px solid DodgerBlue ;
padding:3px 7px 2px 7px;
}
#customers th 
{
font-size:1.1em;
text-align:center;
padding-top:5px;
padding-bottom:4px;
background-color:DodgerBlue ;
color:#ffffff;
}
#customers tr.alt td 
{
text-align:center;
color:#000000;
background-color:#EAF2D3;
}
#customers hr
{
border-style:solid;
border-width:thin;
border-color:lightBlue ;
}
</style>
</head>

<body onLoad="showhiddenRecord(pagenum);">
<div class="row">
				<div class="page-header">
				  <h1 id="tables" style="color:DimGray ;text-align:center;">Administration</h1>
				</div>
				
				<div class="container">
					<h2 id="tables" style="color:SteelBlue ;text-align:center;">Statistiques</h2>
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
<table id="customers">
<tr>
  <th>Joueurs</th>
  <th>Questionnaires</th>
  <th>Questions</th>
  <th>Scores moyens</th>
</tr>

<?php
								for($i = 0; $i < sizeof($id_joueur);$i++)
								{
									if((($i)%2) == 0){
										echo "<tr class='alt'>" ;
									}
									echo "<td>".$nickname[$i]."(".$id_joueur[$i].")"."</td>";
									echo "<td>";
										include '../connection.php';
										$k = 0;
										$requete = "SELECT JjQ_id_Questionnaire,score_moy FROM joueur_joue_questionnaire WHERE JjQ_id_Joueur='$id_joueur[$i]'";
										$result = $mysqlConn->query($requete);
											while($row = $result->fetch_assoc()) {
											$id_questionnaire[$k] = $row['JjQ_id_Questionnaire'];
											$score[$k] = $row['score_moy'];
											$k++;
										}
										
										for($l = 0; $l < sizeof($id_questionnaire);$l++)
										{
											
											echo $id_questionnaire[$l];
											if($l != (sizeof($id_questionnaire)-1)){
											echo "<hr>";
											}
										}
										$mysqlConn->close();
									echo "</td>";
									///////////////////////////////////////////////////////////
									echo "<td>";
										include '../connection.php';
										$m = 0;
										for($cpt = 0; $cpt < sizeof($id_questionnaire);$cpt++)
										{
										$m = 0;
										$requete = "SELECT QRhQ_id_Question FROM questionnaire_has_question WHERE QRhQ_id_Questionnaire='$id_questionnaire[$cpt]'";
										$result = $mysqlConn->query($requete);
											while($row = $result->fetch_assoc()) {
											$id_question[$m] = $row['QRhQ_id_Question'];
											$m++;
										}
										for($n = 0; $n < sizeof($id_question);$n++)
										{
											if($n ==0){
											echo $id_question[$n];
											}else{
											echo ",".$id_question[$n];
											}
										}
										if($cpt != (sizeof($id_questionnaire)-1)){
											echo "<hr>";
										}
										
										}
										$mysqlConn->close();
									echo "</td>";
									///////////////////////////////////////////////////////////
									echo "<td>";
										for($o = 0; $o < sizeof($score);$o++)
										{
											
											echo $score[$o];
											if($o != (sizeof($score)-1)){
											echo "<hr>";
											}
										}
									echo "</td>";
									$score = NULL;
									$id_questionnaire = NULL;
									echo "</tr>";
								}
							?>
							
</table>
					<span style="float:left;"><a href="admin_menu.php">RETOUR<span style="vertical-align:text-bottom"><img src="../images/gauche.jpg" height="40" width="50"></span></a></span>
				</div>
			</div>
</body>
</html>