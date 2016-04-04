<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<title>Inscription</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/bootswatch.min.css">
	<script src="../js/inscription.js"></script>
<style>
		.center
		{
			position:relative;
			top:40px;
			margin:auto;
			width:50%;
		}
		.error {color: #FF0000;}
		.reussie {color: #228B22; 
				  font-style:italic;
				  font-weight: bold;
				 }
</style>
</head>
<body>   

<SPAN style="position: absolute; top: 30px; right: 80px;">
			<image src="../images/accueil.png" align="right" style="width:200px;height:150px">
</SPAN>
<h1 style="color:FireBrick;text-align:center; position: relative; top:20px;">Fiche d'inscription</h1>   
		<div class="center">
            <div class="well bs-component">
              <form name="myForm" class="form-horizontal" action="login.php" onsubmit="return checkForm()" method="post">
				  <legend>Veuillez remplir les champs suivants</legend>
				  <div class="form-group">
					<label for="inputNom" class="col-lg-2 control-label">Nom</label>
					<div class="col-lg-10">
					  <input type="text" name="nom" class="form-control" id="inputNom" placeholder="Nom"><span id="mes_err_nom" class="error"></span>
					</div>
				  </div>
				  <div class="form-group">
					<label for="inputPrenom" class="col-lg-2 control-label">Prénom</label>
					<div class="col-lg-10">
					  <input type="text" name="prenom" class="form-control" id="inputPrenom" placeholder="Prénom"><span id="mes_err_prenom" class="error"></span>
					</div>
				  </div>
				   <div class="form-group">
					<label for="inputNickname" class="col-lg-2 control-label">Nickname</label>
					<div class="col-lg-10">
					  <input type="text" name="nickname" class="form-control" id="inputNickname" placeholder="Nickname"><span id="mes_err_nickname" name="mes_nickname" class="error"></span>
					</div>
				  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Login</label>
                    <div class="col-lg-10">
                      <input type="text" name="login" class="form-control" id="inputEmail" placeholder="Entrer un e-mail"><span id="mes_err_login" class="error"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                      <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password"><span id="mes_err_password" class="error"></span>
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="confirmPassword" class="col-lg-2 control-label">Confirmez Password</label>
                    <div class="col-lg-10">
                      <input type="password" name="confirmpassword" class="form-control" id="confirmPassword" placeholder="Retaper votre Password"><span id="mes_err_confirmpassword" class="error"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
					  <a href="../login/login.php" class="btn btn-primary">Annuler</a>
                      <span style="margin-left:30px;"><input type="submit" value="Valider" class="btn btn-primary"></span>
                    </div>
                  </div>
				  <span id="mes_reussie_inscrit" class="reussie"></span><span style="margin-left:20px;" id="timer" class="reussie"></span>
              </form>
            </div>
		</div>
</body>
</html>