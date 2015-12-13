# BeMyGuest
projet 3A




#    FONCTIONNEMENT

Changer vos informations de connexions à la base de données dans le dossier config/config.inc.php

Les classes sont pré-charger: il vous suffit de les mettres dans le fichier modele/classes et il faut les nomées : "NomDao.class.php".

pour appeler une classe il vous suffira décrire :
	
	$nom_variable_souhaite = new NomDao();

Le site est composer de 3 partie :
	Page -> tout ce qui concerne le contenu libre (sans connexion).
	User -> Il faut une connexion de la part de l'internaute.
	Admin -> Partie qui nous permet de tout gérer , tout modifier, ou supprimer ce que l'on souhaite.

#     AJAX

La page ajax.php est le controlleur princilape de l'ajax. Ici il gere la connexion et l'inscription avec Facebook ou par formulaire.

#   InscriptionDao.class.php

Classe d'inscription pour les nouveaux utilisateurs , la fonctions est lancé dans le controlleur de l'ajax par la fonction :

	try {
		$Inscriptiondao = new InscriptionDao($nom , $prenom ,  $adresse_email , $password1 ,  $date_inscription ,$type);
		$fctinscription = $Inscriptiondao->Inscription();
		} catch (Exception $e) {
    		echo $e->getMessage();
		}


# FacebookLogDao.class.php 

Idem que pour l'inscription sauf que la c'est lorsque l'utilisateur s'inscrit avec facebook, ce n'est pas le meme fonctionnement
	
	try {
		$FacebookLogDao = new FacebookLogDao($nom , $prenom ,  $adresse_email , $age ,  $idfacebook ,$image, $date_inscription, $type);
		$fctinscription = $FacebookLogDao->checkifexist();
	} catch (Exception $e) {
    	echo $e->getMessage();
	}

# La session marche avec des COOKIES

Dans le fichier common-files/js/ajaxpopup.js, vous trouverez les popup de connexio + inscriptions ainsi que les fonctions js .

pour initialiser le cookie:

	function setcookielog(value) { // expires: days ;
    var today = new Date();
    today.setTime( today.getTime() );
        var expires = 365 * 1000 * 60 * 60 * 24;
        var expires_date = new Date( today.getTime() + (expires) );
    document.cookie = "log=" +escape( value ) + ";path=/" + ( ( expires ) ? ";expires=" + expires_date.toGMTString() : "" );}

et pour detruire le cookie:

	function deletecookie( name ) {
		if ( getcookie( name ) ) document.cookie = name + "=" + ";expires=Thu, 01-Jan-1970 00:00:01 GMT" + ";path=/" ;
	}


#    HTACCESS

Gére la rewriting d'URL

exemple: 

	RewriteRule ^user/([a-zA-Z0-9]+)$ ?module=user&page=index&id=&1
