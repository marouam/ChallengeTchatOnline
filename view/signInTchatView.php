<?php  $title ="IAD-FRANCE-SIGN UP";?>
<?php  ob_start(); ?>
 
 <!--  content Sign In -->
        <div class="top-content" id="contentSignIn">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Déjà inscrit! Connectez-vous pour accéder à votre plateforme de Tchat !</h3>
                            		<p>Saisissez votre login et mot de passe:</p>
                            		<p><b>Nouveau!</b> <a href="#"  id="signUpLink" class="signUpLink">Cliquez sur ce lien pour créer un compte!</a></p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" id="form_sign_in"  name='form_sign_in'  action="index.php"  method="POST" class="login-form">

			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Email</label>
			                        	<input type="email" name="form-username" placeholder="Email@mail.com" class="form-username form-control" id="form-username" required="true">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Mot de passe</label>
			                        	<input type="password" name="form-password" placeholder="Mot de passe..." class="form-password form-control" id="form-password" minlength="6" maxlength="8"  required="true">
			                        </div>
			                        <button type="submit" class="btn" id="signin" name="signin">Connexion</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

<!-- Top content SIGN UP -->
        <div class="top-content" id="contentSignUp" hidden="true">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Bienvenue!</h3>
                            		<p> Pour vous inscrire, saisissez votre login et mot de passe:</p>
                            		<p><b>Déjà inscrit!</b> <a href="#"  id="signInLink" class="signInLink">Cliquez sur ce lien pour vous connecter!</a></p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" id="form_sign_up"  name='form_sign_up'  action="index.php"  method="POST" class="login-form">

			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-login">Email</label>
			                        	<input type="email" name="form-login" placeholder="Email@mail.com..." class="form-username form-control" id="form-login" required="true">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-pwd">Mot de passe</label>
			                        	<input type="password" minlength="6" maxlength="8" name="form-pwd" placeholder="Mot de passe..." class="form-password form-control" id="form-pwd" required="true">
			                        </div>
			                        <button type="submit" class="btn" id="signup" name="signup">Inscription</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>



<?php  $content = ob_get_clean(); ?>

<?php  require('template.php');  ?>
