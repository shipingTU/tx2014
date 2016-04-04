<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/bootswatch.min.css">
	<script src="../js/login.js"></script>
<style>
		.center
		{
			position:relative;
			top:100px;
			margin:auto;
			width:50%;
		}
		.error {color: #FF0000;}
		.reussie {color: red; 
				  font-style:italic;
				  font-weight: bold;
				 }
</style>
</head>
<body>   

<SPAN style="position: absolute; top: 30px; right: 80px;">
			<image src="../images/accueil.png" align="right" style="width:200px;height:150px">
</SPAN>
<h1 style="color:FireBrick;text-align:center; position: relative; top:80px;">Bienvenue</h1>   
		<div class="center">
            <div class="well bs-component">
              <form name="myForm" class="form-horizontal" action="../menuPrincipal.php" onsubmit="return checkForm();" method="post">
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
					  <br>
					  Voulez-vous être mis au défi?<span style="margin-left:10px;"><input type="checkbox" name="defi" onclick="turn_to_defi()"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <a href="../inscription/inscription.php">S'inscrire</a>
                      <span style="margin-left:30px;"><input type="submit" value="Se connecter" class="btn btn-primary"></span>
                    </div>
                  </div>
				  <span id="mes_login" class="reussie"></span><span style="margin-left:13px;" id="timer" class="reussie"></span>
              </form>
            </div>
		</div>
</body>
</html>