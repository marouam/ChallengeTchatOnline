<?php  $title ="IAD-FRANCE-TCHAT WINDOW";?>
<?php  ob_start(); ?>
 <!--  content la fenêtre du tchat -->
        <div class="top-content" id="contentSChatroom">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 form-box">
                             <!--  Télécharger les discussions archivées -->
                        	<p>
                                <b>
                                    <a href="?export=1" id="exportArchivedMessage" name="exportArchivedMessage"> Télécharger les discussions archivées
                                    </a>
                                </b>
                            </p>
                             <!--  Icone pour archiver -->
                        	<div class="form-top">
                        		<div class="form-top-left" style="" id="archiveZone">
                        			<i class="fa fa-archive" aria-hidden="true" title=" Archiver la disccussion!" id="archiveIcon"></i>
                        		</div>
                        		<div class="form-top-right" style="" id="UsersZone">
                        			<i class=" fa fa-sign-out" aria-hidden="true" title="Déconnexion" id="logoutIcon"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" id="form_send_message" name="form_send_message"   method="POST">
			                    	<div id="id_chat_discussions" class="chat_discussions col-sm-8 col-md-8"> </div>
                                    <div  id="usersOnline" class="chat_discussions col-sm-4 col-md-4"></div>
			                        <div>
                                        <textarea class="" id="message" rows="3" style="width: 79%;" placeholder="Votre message...." name="message"></textarea>
			                             <button type="button" class="btn" id="sendMessage" name="sendMessage">
                                         Envoyer
                                        </button>
                                    </div>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!--  JS for TchatWindowView AJAX -->
    <script src="public/js/jquery-1.11.1.min.js"></script>
    <script src="public/js/main.js"></script>
 <?php  $content = ob_get_clean(); ?>
<?php  require('template.php');  ?>


