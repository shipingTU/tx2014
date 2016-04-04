<!DOCTYPE html>
<?php
include '../connection.php';
$j = 0;

$requete = "SELECT id_Question, niv_dif_Question, mode_Question, descrip_Question, Contenu, val_exact_Question, borne_inf_Question, borne_max_Question, mode_Chargement FROM question";
$result = $mysqlConn->query($requete);
while($row = $result->fetch_assoc()) {
	$id_question[$j] = $row['id_Question'];
	$niv_dif_question[$j] = $row['niv_dif_Question'];
	$type[$j] = $row['mode_Question'];
	$texte[$j] = $row['descrip_Question'];
	$contenu[$j] = $row['Contenu'];
	$reponse[$j] = $row['val_exact_Question'];
	$borne_inf[$j] = $row['borne_inf_Question'];
	$borne_max[$j] = $row['borne_max_Question'];
	$mode_chargement[$j] = $row['mode_Chargement'];
	$j++;
}

$mysqlConn->close();
?>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title>Administration</title>
    <link rel="stylesheet" href="../css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="../css/bootswatch.min.css">
	<link rel="stylesheet" href="../css/myStyle.css">
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script LANGUAGE="JavaScript"> 
	
	var record = 5;
	var count =  <?php echo $j;?>;
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
        theFirstPage.innerHTML="<span style='color:grey;'>PREMIER PAGE<span>"; 
        thePrePage.innerHTML="<span style='color:grey;'>PAGE PRECEDENT<span>"; 
    }else{ 
        theFirstPage.innerHTML="<a href=\"javascript:firstPage()\">PREMIER PAGE</a>"; 
        thePrePage.innerHTML="<a href=\"javascript:prePage()\">PAGE PRECEDENT</a>"; 
    } 
    if(pagenum>=pageTotal){ 
        theNextPage.innerHTML="<span style='color:grey;'>PAGE SUIVANT<span>"; 
        theLastPage.innerHTML="<span style='color:grey;'>DERNIER PAGE<span>"; 
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

function addNew(){

	window.location.replace('ajout_quest.php');
	}

</script>
	
	
  </head>
<body onload="showhiddenRecord(pagenum)">
        <div class="row">
		    <div class="page-header">
              <h1 id="tables" style="color:DimGray ;text-align:center;">Administration</h1>
            </div>
			
			<div class="container">
				<h2 id="tables" style="color:SteelBlue ;text-align:center;">QUESTIONS</h2>
				<center> 
					<span style="vertical-align:sub">
					<input class="buttonAdmin blueAdmin" type="button" value="Ajouter" onclick="addNew();">
					TOTAL <b><?php $pageTotal=(int)($j/5)+1; echo $pageTotal;?></b> PAGES <span style="margin-left:26px;"></span>PAGE COURANT <b><span id="number">1</span></b>
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
				</span>
				  <table id="mytable" class="table table-striped table-hover ">
					<tbody>
					  <tr class="info">
						<td style="color:DarkGray; font-weight:bold ;"></td>
						<td style="color:DarkGray; font-weight:bold ;"></td>
						<td style="color:DarkGray; font-weight:bold ;">Id</td>
						<td style="color:DarkGray ;font-weight:bold ;">Niveau</td>
						<td style="color:DarkGray ;font-weight:bold ;">Type</td>
						<td style="color:DarkGray ;font-weight:bold ;">Texte</td>
						<td style="color:DarkGray ;font-weight:bold ;">Contenu</td>
						<td style="color:DarkGray ;font-weight:bold ;">Réponse</td>
						<td style="color:DarkGray ;font-weight:bold ;">Borne-</td>
						<td style="color:DarkGray ;font-weight:bold ;">Borne+</td>
						<td style="color:DarkGray ;font-weight:bold ;">Mode chargement</td>
					  </tr>
						<?php
							for($i = 0; $i < sizeof($id_question);$i++)
							{
								if((($i)%2) == 0){
									echo "<tr class='danger'>" ;
								}
								echo "<td><form action='modif_quest.php' method='post'><input class='buttonAdmin blueAdmin' type='submit' value='Modifier'></td>" ;
								echo "<td><input type='hidden' name='id' value='$id_question[$i]'></td></form>";
								echo "<td>".$id_question[$i]."</td>";
								echo "<td>".$niv_dif_question[$i]."</td>";
								echo "<td>".$type[$i]."</td>";
								echo "<td>".utf8_encode($texte[$i])."</td>";
								echo "<td>".$contenu[$i]."</td>";
								echo "<td>".$reponse[$i]."</td>";
								echo "<td>".$borne_inf[$i]."</td>";
								echo "<td>".$borne_max[$i]."</td>";
								echo "<td>".$mode_chargement[$i]."</td>";
								echo "</tr>";
							}
						?>
					</tbody>
				  </table>
				<span style="float:left;"><a href="administration_joueur.php">JOUEURS<span style="vertical-align:text-bottom"><img src="../images/gauche.jpg" height="40" width="50"></span></a></span>
				<span style="float:right;"><a href="admin_menu.php"><span style="vertical-align:text-bottom"><img src="../images/droit.jpg" height="40" width="50">RETOUR</span></a></span>
			</div>
		</div>
</body>
</html>
