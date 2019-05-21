$(document).ready(function(){
  /*
      LOGOUT 
  */
  //Evenement clique sur le bouton déconexion
  $("#logoutIcon").click(function(event){
    var request;
    request = $.ajax({
      type: "post",
      data:{
           logout : "1",
          }
    });
  // Callback handler that will be called on success
      request.done(function (response, textStatus, jqXHR){
        console.log(response+" ici reponse logout");
        window.location.href="index.php";
    });
  
      // Callback handler that will be called on failure
      request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: logout "+
            textStatus, errorThrown
        );
    });
  });
/*
        Archivage
*/
//Archivage des messages 
  $("#archiveIcon").click(function(){
    var request;
    request = $.ajax({
      type: "post",
      data:{
         archiveMessage : "1",
      }
    });
    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
      console.log(response+" ici reponse archiveMessage");
      $("#id_chat_discussions").html("<b>La discusion a été archivé avec succés!</b>");
    });
    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: archiveMessage "+
            textStatus, errorThrown
        );
    });
  });
  /**

      Envoie de message 
  */
  $("#sendMessage").click(function(){
   var contentMessage= $("#message").val()
   var request;
   request = $.ajax({
       type: "post",
       data:{
          sendMessage : "1",
           message : contentMessage
        }
      });
    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
      if($.trim(contentMessage) !=""){
         $("#id_chat_discussions").append( "\n Vous :"+contentMessage);
         $("#message").val('');
         $("#id_chat_discussions").scrollTop($("#id_chat_discussions")[0].scrollHeight);
      }
    });
    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
          // Log the error to the console
      console.error(
              "The following error occurred: "+
              textStatus, errorThrown
          );
     });
  });
  /*
      LOAD MESSAGE 
  
  */
  var loadMessageChatroom = function() {
    var chatRoom = $("#contentSChatroom");
    var request;
    request = $.ajax({
        type: "post",
         data:{
          loadMessage: "1",
        }
    });
    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
      JSON.stringify(response);
      if(response !=""){
         obj = JSON.parse(response);
         var keyCount  = Object.keys(obj).length;
         var discusion=" Bienvenue! \n";
         for (var i = 0; i < Object.keys(obj).length; i++) { 
          discusion += "<br>"+obj[i].mail+" dit:("+obj[i].dateCreation +") "+obj[i].content+"\n";
        }
        $("#id_chat_discussions").html(discusion);
       }  
    });
    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });
  };
  loadMessageChatroom();
  setInterval(loadMessageChatroom, 10000);//600000 is miliseconds

  /*
    AJAX LOAD USERS ONLINE
   */
  var loadUsers = function() {
    var usersOnline = $("#usersOnline");
    var request;
    request = $.ajax({
        type: "post",
         data:{
          usersOnline: "1",
        }
    });
    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
      if(response !=""){
        JSON.stringify(response);
        obj = JSON.parse(response);
        var usersList="<h3>Utilisateurs en ligne</h3><ul>";
        for (var i = 0; i < Object.keys(obj).length; i++) {
              usersList += "<li>"+obj[i].mail+"</li>";
        }
        usersList += "</ul>";
        $("#usersOnline").html(usersList);
      }
    });
    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
    // Log the error to the console
    console.error(
                "The following error occurred  LIST USERS : "+
                textStatus, errorThrown
            );
    });
  };
  loadUsers();
  setInterval(loadUsers, 10000);
});
