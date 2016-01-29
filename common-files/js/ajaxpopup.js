$(document).ready(function() {
    $('.connexion').magnificPopup({
      items: {
      src: '<div class="white-popup">'+
            '<div class="headerpopup bg-yellow">'+
              '<h3 class="popup-title">Sign up</h3>'+
            '</div>'+
              '<div class="content-popup t-center p-40">'+
                '<p class="nofacebookaccount errorinscription"> You haven\'t a facebook account, use the form !</p>'+
                '<button id="boutonfacebook" onclick="fbauth()">Sign up with a Facebook account</button>'+
                '<h3 class="section-title">Or</h3>'+
                  '<form id="connectionformulaire" class="t-center">'+
                  '<input id="email_adresse_connect" name="email_adresse_connect" type="text" class="form-control form-popup placeholder" placeholder="Email adress">'+
                  '<input id="password_connect" name="password_connect" type="password" class="form-control form-popup placeholder" placeholder="Password">'+
                  '<p class="pbexistedeja errorinscription"> Vous n\'avez pas de compte, inscrivez vous !</p>'+
                  '<p class="pbfalsepassword errorinscription"> Wrong login !</p>'+
                  '<button id="btnconnexion" type="button" class="btnconnexion btn btn-orange  btn-transparent"  onclick="FunctionConnect()">Se connecter</button>'+
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
                '<h3 class="popup-title">Sign in</h3>'+
              '</div>'+
              '<div class="content-popup t-center p-40">'+
              '<p class="nofacebookaccount errorinscription"> You haven\'t a facebook account, use the form !</p>'+
              '<button id="boutonfacebook" onclick="fbauth()">Sign up with Facebook</button>'+
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

    $('.help').magnificPopup({
      items: {
      src: '<div class="white-popup">'+
            '<div class="headerpopup bg-yellow">'+
              '<h3 class="popup-title">You need some help?</h3>'+
            '</div>'+
              '<div class="content-popup row t-center p-40">'+
                '<div class="col-md-12">'+
                '<a href="" class="btn btn-orange  btn-transparent allwidth">Who are we?</button>'+
                '<a href="" class="btn btn-orange  btn-transparent allwidth">How can we use our service?</button>'+
                '<a href="" class="btn btn-orange  btn-transparent allwidth">Our legal informations</button>'+
                '<a href="" class="btn btn-orange  btn-transparent allwidth">Contact us</button>'+
                '</div>'+
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
        
          $.post("ajax.php",$("#inscriptionformulaire").serialize(), function(result){
            console.log(result);
            if (result!="bueno"){
              $( ".mfp-close" ).trigger( "click" );
              $( "#headernoconnect" ).hide();
              $( "#headerajaxconnect").fadeIn( "slow" );
              $( "#changeusername").text( "Hi "+ nom+" "+prenom);

              //SpaceCakeBaking
              SpaceCakeBaking(result , "log");

            }
            else if(result=="existe"){
              $(".pbexistedeja").show();
              $('#btninscription').removeAttr("disabled");
            }
          })
        }

      };

/////////////////////////////////////////  FORMULAIRE DE CONNEXION////////////////////////////////////////////////

      //on POST les données du formulaire inscription
      function FunctionConnect(e) {
        var error=false;
        var regmail = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
        var regpassword = new RegExp('^.{6,}$');
        var email=$("#email_adresse_connect").val();
        var password=$("#password_connect").val();
        var alert="id-form-alert-";

        if((email.length==0)||(!regmail.test(email))){var error=true;$("#email_adresse_connect").addClass('error');$("#email_adresse_connect").attr("placeholder", "Veuillez entrer une addresse email valide !");}else $("#email_adresse_connect").removeClass('error');

        if((!regpassword.test(password))){var error=true;$("#password_connect").addClass('error');$("#password_connect").attr("placeholder", "Veuillez entrer un mot de passe valide !");}else $("#password_connect").removeClass('error');

        if(error==false){$("#btnconnexion").attr({"disabled":"true","value":"Envoi..."});

          $.post("ajax.php",$("#connectionformulaire").serialize(), function(result){
            console.log(result);
            if ((result!="noexiste")&&(result!="falsepassword")){
              $( ".mfp-close" ).trigger( "click" );
              $( "#headernoconnect" ).hide();
              $( "#headerajaxconnect" ).fadeIn( "slow" );

              //SpaceCakeBaking
              SpaceCakeBaking(result , "log");
              location.reload();

            }
            else if(result=="noexiste"){
              $(".pbexistedeja").show();
              $('#btninscription').removeAttr("disabled");
            }
            else if (result=="falsepassword") {
              $(".pbfalsepassword").show();
              $('#btnconnexion').removeAttr("disabled");
            }
          })
        }
      };






////FACEBOOK/////
  function nofacebookaccount(data) {
    $(".nofacebookaccount").show();
  }

  function fonctionconnectfb() {
    $( ".mfp-close" ).trigger( "click" );
    $( "#logfb" ).trigger( "click" );
  }


////// QQ DIFFERENTES FONCTION SUR L'AFICHAGE  ////////
  // CONNEXION 
  function beginconnexion(msg , data) {
    $( ".mfp-close" ).trigger( "click" );
    $( "#headernoconnect" ).hide();
    $( "#headerajaxconnect" ).fadeIn( "slow" );
    //SpaceCakeBaking
    SpaceCakeBaking(msg, "log");
    if (data=="fb") {
       location.reload();
    }
  }

  // DECONNEXION
  function finishconnexion(section) {
    console.log('re');
    DeleteSpaceCake("log");
    //Logout();
    if (section=='user') {
      window.location.href = "";
    }else{
      location.reload();
    }
  }


//////       SpaceCake    MMMMMM ////////
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

  function SpaceCakeBaking(value , name) { // expires: days ;
    var today = new Date();
    today.setTime( today.getTime() );
        var expires = 365 * 1000 * 60 * 60 * 24;
        var expires_date = new Date( today.getTime() + (expires) );
    document.cookie = name+"=" +escape( value ) + ";path=/" + ( ( expires ) ? ";expires=" + expires_date.toGMTString() : "" );
  }

  function DeleteSpaceCake( name ) {
    if ( getcookie( name ) ) document.cookie = name + "=" + ";expires=Thu, 01-Jan-1970 00:00:01 GMT" + ";path=/" ;
  }


////// NEWSLETTER ///////////
$(document).ready(function(){
    $("#envoinewsletter").click(function(e){e.preventDefault();var error=false;
    var regmail = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
    var email=$("#emailnews").val();
    var alert="form-alert-";
    if((email.length==0)||(!regmail.test(email))){var error=true;$("#emailnews").addClass('error');$("#emailnews").attr("placeholder", "Please, enter a valid email adress !");}else $("#emailnews").removeClass('error');
    if(error==false){$("#envoinewsletter").attr({"disabled":"true","value":"Envoi..."});
    $.post("ajax.php",$("#newsletter").serialize(),function(result){
      console.log(result);
      if (result=="nopb"){
        $("#partnewsletter").hide();
        $("#partnewslettergood").fadeIn();
      }
      else if(result!="nopb"){
        $('#envoinewsletter').removeAttr("disabled");
        $(".pbnewsall").show();
      }
    })
  }})
});


