<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
	<title>Admin Login</title>
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

<h1 style="color:FireBrick;text-align:center; position: relative; top:80px;">Administration</h1>   
		<div class="center">
            <div class="well bs-component">
              <form name="myForm" class="form-horizontal" method="post">
                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Login</label>
                    <div class="col-lg-10">
                      <input type="text" name="login" class="form-control" id="inputEmail" placeholder="Entrer votre identifiant"><span id="mes_err_login" class="error"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                      <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password"><span id="mes_err_password" class="error"></span>
					  <br>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <span style="margin-left:30px;"><input type="button" value="Se connecter" onclick="checkAdmin();" class="btn btn-primary"></span>
                    </div>
                  </div>
				  <span id="mes_login" class="reussie"></span><span style="margin-left:13px;" id="timer" class="reussie"></span>
              </form>
            </div>
		</div>
</body>
</html>