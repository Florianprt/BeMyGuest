$(document).ready(function() {

    $('.connexion').magnificPopup({
      items: {
      src: '<div class="white-popup">'+
            '<div class="headerpopup bg-yellow">'+
              '<h3 class="popup-title">Sign up</h3>'+
            '</div>'+
              '<div class="content-popup t-center p-40">'+
                '<button id="boutonfacebook" onclick="fbAuthUser()">Sign up with a Facebook account</button>'+
                '<h3 class="section-title">Or</h3>'+
                  '<form id="connectionformulaire" class="t-center">'+
                  '<input type="text" class="form-control form-popup placeholder" placeholder="Email adress">'+
                  '<input type="text" class="form-control form-popup placeholder" placeholder="Password">'+
                  '<button id="btnconnexion" type="button" class="btnconnexion btn btn-orange  btn-transparent">Se connecter</button>'+
                  '</form>'+
              '</div></div>',
      type: 'inline'
    },
    closeBtnInside: true
    });

    $('.inscription').magnificPopup({
      items: {
      src: '<div class="white-popup">'+
              '<div class="headerpopup bg-purple">'+
                '<h3 class="popup-title">Sign up</h3>'+
              '</div>'+
              '<div class="content-popup t-center p-40">'+
              '<button id="boutonfacebook" onclick="fbAuthUser()">Sign up with Facebook</button>'+
              '<h3 class="section-title titlesupr">Or</h3>'+
                '<form id="inscriptionformulaire">'+
                  '<input style="display: none" name="quelformulaire" value="inscription">'+
                  '<input id="nom_insert" type="text" class="inputinsciption form-control form-popup placeholder" placeholder="Last name" name="nom">'+
                  '<input id="prenom_insert" type="text" class="inputinsciption form-control form-popup placeholder" placeholder="First name" name="prenom">'+
                  '<input id="email_insert" type="text" class="inputinsciption form-control form-popup placeholder" placeholder="Email adress" name="email">'+
                  '<input id="password1_insert" type="password" class="inputinsciption form-control form-popup placeholder" placeholder="Password" name="password1">'+
                  '<input id="password2_insert" type="password" class="inputinsciption form-control form-popup placeholder" placeholder="Confirm password" name="password2">'+
                  '<p class="passwordlengh errorinscription">Votre mot de passe doit contenir au minimum 6 caractéres !</p><p class="passwordsimilar errorinscription"> Vos deux mots de passe ne sont pas similaires </p><p class="pbserveur errorinscription"> Il y a un probléme avec le serveur, veuillez réessayer ! </p><p class="pbexistedeja errorinscription"> Vous avez déja un compte, connecter vous !</p>'+
                  '<button id="btninscription" type="button"  class="btnconnexion btn btn-purple btn-transparent" onclick="myFunction()">Sign up with email</button>'+
                '</form>'+
            '</div></div>',
      type: 'inline'
    },

    closeBtnInside: true
    });

});

////////////////////////////////////////////// FORMULAIRE D INSCRIPTION ///////////////////////////////////////////////

      //inscription avec adresse emmail show hide
      function myFunction() {
        //console.log('formuchangejsut mail');
        $( ".inputinsciption" ).show();
        $( "#boutonfacebook" ).hide();
        $( ".titlesupr" ).hide();
        $("#btninscription").text("Sign up");
        $("#btninscription").attr('onclick','FunctionPostInsertUser()');
      };


      //on POST les données du formulaire inscription
      function FunctionPostInsertUser(e) {
        var error=false;
        var regmail = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
        var regpassword = new RegExp('^.{6,}$');
        var nom=$("#nom_insert").val();
        var prenom=$("#prenom_insert").val();
        var email=$("#email_insert").val();
        var password1=$("#password1_insert").val();
        var password2=$("#password2_insert").val();
        var alert="id-form-alert-";

        if(nom.length==0){var error=true;$("#nom_insert").addClass('error');$("#nom_insert").attr("placeholder", "Veuillez entrer votre nom !");}else $("#nom_insert").removeClass('error');

        if(prenom.length==0){var error=true;$("#prenom_insert").addClass('error');$("#prenom_insert").attr("placeholder", "Veuillez entrer votre prenom !");}else $("#prenom_insert").removeClass('error');

        if((email.length==0)||(!regmail.test(email))){var error=true;$("#email_insert").addClass('error');$("#email_insert").attr("placeholder", "Veuillez entrer une addresse email valide !");}else $("#email_insert").removeClass('error');

        if((!regpassword.test(password1))){var error=true;$(".passwordlengh").show();}else $(".passwordlengh").hide();

        if(password1!=password2){var error=true;$(".passwordsimilar").show();}else $(".passwordsimilar").hide();

        if(error==false){$("#btninscription").attr({"disabled":"true","value":"Envoi..."});
        $.post("ajax.php",$("#inscriptionformulaire").serialize(),
          function(result){
            console.log(result);
            if (result=="bueno"){
              $( ".mfp-close" ).trigger( "click" );
              $( ".inscription" ).fadeOut( "slow" );
              $( ".connexion" ).fadeOut( "slow" );
              $( ".deconnexion" ).fadeIn( "slow" );
            }
            else if(result=="existe"){
              $(".pbexistedeja").show();
              $('#btninscription').removeAttr("disabled");
            }
          }
        )}
      };

/////////////////////////////////////////  FORMULAIRE DE CONNEXION////////////////////////////////////////////




////FACEBOOK/////
  function fonctionconnectfb() {
    $( ".mfp-close" ).trigger( "click" );
    $( "#logfb" ).trigger( "click" );
  }


////// QQ DIFFERENTES FONCTION SUR L'AFICHAGE  ////////
  // CONNEXION 
  function beginconnexion() {
    //DECONNEXION
    $(".inscription a" ).text("Log out");
    $( ".inscription" ).addClass("deconnexion");
    $( ".deconnexion" ).removeClass("inscription");

    //ACCOUNT
    $( ".connexion a" ).text("Account");

    //setcookie
    setcookielog("idconnexiondutype");
  }

  // DECONNEXION
  function finishconnexion() {
    deletecookie("log");
    Logout();
    location.reload();
  }


//////       LES COOKIES    MMMMMM ////////
  //cookies
  function getcookie( name ) {
    if ( ! document.cookie ) return null ;
    var start = document.cookie.indexOf( name + "=" ) ;
    var len = start + name.length + 1 ;
    if ( ( !start ) && ( name != document.cookie.substring( 0, name.length ) ) ) return null ;
    if ( start == -1 ) return null ;
    var end = document.cookie.indexOf( ";", len ) ;
    if ( end == -1 ) end = document.cookie.length ;
    return unescape( document.cookie.substring( len, end ) ) ;
  }

  function setcookielog(value) { // expires: days ;
    var today = new Date();
    today.setTime( today.getTime() );
        var expires = 365 * 1000 * 60 * 60 * 24;
        var expires_date = new Date( today.getTime() + (expires) );
    document.cookie = "log=" +escape( value ) + ";path=/" + ( ( expires ) ? ";expires=" + expires_date.toGMTString() : "" );
  }

  function deletecookie( name ) {
    if ( getcookie( name ) ) document.cookie = name + "=" + ";expires=Thu, 01-Jan-1970 00:00:01 GMT" + ";path=/" ;
  }


////// DECONNEXION ///////////
//$( ".deconnexion" ).click( finishconnexion() );