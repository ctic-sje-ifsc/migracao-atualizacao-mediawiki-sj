<?php
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}
$wgSitename = "IFSC Sao Jose";
$wgMetaNamespace = "MediaWiki_do_Campus_Sao_Jose";

$wgScriptPath = "";

$wgResourceBasePath = $wgScriptPath;

$wgLogo = "$wgResourceBasePath/images/Logoifsc.png";
$wgFavicon = "$wgResourceBasePath/images/favicon.ico";

$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = "coinf.sj@ifsc.edu.br";
$wgPasswordSender = "coinf.sj@ifsc.edu.br";

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;

$wgDBtype = "mysql";
$wgDBserver = "mediawikiatt-mariadb";
$wgDBname = "bitnami_mediawiki";
$wgDBuser = "***********";
$wgDBpassword = "*******";
$wgDBprefix = "";
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";
$wgDBmysql5 = false;
$wgMainCacheType = CACHE_NONE;
$wgMemCachedServers = [];
$wgEnableUploads = true;
$wgUseInstantCommons = false;
$wgPingback = false;
$wgShellLocale = "pt_BR.utf8";
$wgLanguageCode = "pt-br";
$wgSecretKey = "*******************************";
$wgAuthenticationTokenVersion = "1";
$wgUpgradeKey = "*************";
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";
$wgDiff3 = "/usr/bin/diff3";
$wgDefaultSkin = "vector";
wfLoadSkin( 'CologneBlue' );
wfLoadSkin( 'Modern' );
wfLoadSkin( 'MonoBook' );
wfLoadSkin( 'Vector' );

$wgSMTP = array(
        'host' => 'smtp.ifsc.edu.br',
        'IDHost' => 'smtp.ifsc.edu.br',
        'port' => 465,
        'username' => '***',
        'password' => '*********',
        'auth' => true
);

# 20180521 layzacs: reutilizado da wiki antiga
# 20101026 Ederson Torresini: aproveitamento de configuracao do Odilson
# Odilson em 25/04/2007 para prevenir acessos indesejados
# (http://www.mediawiki.org/wiki/Manual:Preventing_access)
$wgNamespaceProtection[NS_PROJECT] =
$wgNamespaceProtection[NS_MAIN] =
$wgNamespaceProtection[NS_USER] =
$wgNamespaceProtection[NS_PROJECT] =
$wgNamespaceProtection[NS_IMAGE] =
$wgNamespaceProtection[NS_TEMPLATE] =
$wgNamespaceProtection[NS_HELP]  =
$wgNamespaceProtection[NS_CATEGORY] = array('autoconfirmed');
#$wgNamespaceProtection[NS_POLICY] = array('editpolicy');
$wgGroupPermissions['*']['createaccount'] = false;
$wgGroupPermissions['*']['autocreateaccount'] = true;
$wgGroupPermissions['*']['createpage'] = false;
$wgGroupPermissions['*']['createtalk'] = false;
$wgGroupPermissions['*']['writeapi'] = true;
$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['*']['read'] = true;
$wgGroupPermissions['user']['edit'] = true;
$wgGroupPermissions['user']['createpage'] = true;
$wgGroupPermissions['user']['createtalk'] = true;
$wgGroupPermissions['user']['upload'] = true;
$wgGroupPermissions['user']['reupload'] = false;
$wgGroupPermissions['user']['writeapi'] = false;
$wgGroupPermissions['sysop']['editpolicy'] = true;
$wgAutoConfirmAge = 86400 * 1; # One day time 86400 seconds/day

# Relogio
$wgLocaltimezone = "America/Sao_Paulo";
$oldtz = getenv("TZ");
putenv("TZ=$wgLocaltimezone");

# Tamanho dos arquivos
$wgUploadSizeWarning = 1024 * 1024 * 10; # 10 MB
$wgMaxUploadSize = 1024*1024*100; # 100MB

# 20090407 Ederson Torresini: adicionado SIP como URI aceita
# 20091118 Ederson Torresini: adicionado XMPP como URI aceita
# 20091216 Ederson Torresini: adicionados SIPS e TEL como URI aceita
# Configuracao vista em: http://meta.wikimedia.org/wiki/URI_schemes
#$wgUrlProtocols = 'http:\/\/|https:\/\/|ftp:\/\/|irc:\/\/|gopher:\/\/|news:|mailto:';

# 20110325 Ederson Torresini: adicionando a namespace Engenharia
define("NS_ENGENHARIA", 102);
define("NS_ENGENHARIA_TALK", 103);
$wgExtraNamespaces[NS_ENGENHARIA] = "Engenharia";
$wgExtraNamespaces[NS_ENGENHARIA_TALK] = "Engenharia Talk";
$wgNamespacePermissionLockdown[NS_ENGENHARIA]['*'] = array('Engenharia');
$wgNamespacePermissionLockdown[NS_ENGENHARIA_TALK]['*'] = array('Engenharia');
$wgGroupPermissions['Engenharia']['read'] = true;
$wgGroupPermissions['Engenharia']['createpage'] = true;
$wgGroupPermissions['Engenharia']['edit'] = true;
$wgGroupPermissions['Engenharia']['createtalk'] = true;
$wgGroupPermissions['Engenharia']['minoredit'] = true;
$wgGroupPermissions['Engenharia']['move-subpages'] = true;
$wgGroupPermissions['Engenharia']['move'] = true;
$wgGroupPermissions['Engenharia']['movefile'] = true;
$wgGroupPermissions['Engenharia']['reupload-shared'] = true;
$wgGroupPermissions['Engenharia']['reupload'] = true;
$wgGroupPermissions['Engenharia']['sendemail'] = true;
$wgGroupPermissions['Engenharia']['upload'] = true;
$wgGroupPermissions['Engenharia']['writeapi'] = true;
$wgGroupPermissions['Engenharia']['delete'] = false;
$wgGroupPermissions['Engenharia']['undelete'] = false;

# 20171116 layzacs: reutilizado da wiki antiga
# 20101118 Ederson Torresini: adicionando a namespace TI
# 20111116 Ederson Torresini: fechando o acesso para usuários do grupo 'Ctic'
define("NS_CTIC", 100);
define("NS_CTIC_TALK", 101);
$wgExtraNamespaces[NS_CTIC] = "CTIC";
$wgExtraNamespaces[NS_CTIC_TALK] = "CTIC Talk";
$wgNamespacePermissionLockdown[NS_CTIC]['*'] = array('Ctic');
# 20120720 Ederson Torresini: todos podem ler
$wgNamespacePermissionLockdown[NS_CTIC]['read'] = array('*');
$wgNamespacePermissionLockdown[NS_CTIC_TALK]['*'] = array('Ctic');
#$wgGroupPermissions['Ctic']['read'] = true;
$wgGroupPermissions['Ctic']['createpage'] = true;
$wgGroupPermissions['Ctic']['edit'] = true;
$wgGroupPermissions['Ctic']['createtalk'] = true;
$wgGroupPermissions['Ctic']['minoredit'] = true;
$wgGroupPermissions['Ctic']['move-subpages'] = true;
$wgGroupPermissions['Ctic']['move'] = true;
$wgGroupPermissions['Ctic']['movefile'] = true;
$wgGroupPermissions['Ctic']['reupload-shared'] = true;
$wgGroupPermissions['Ctic']['reupload'] = true;
$wgGroupPermissions['Ctic']['sendemail'] = true;
$wgGroupPermissions['Ctic']['upload'] = true;
$wgGroupPermissions['Ctic']['writeapi'] = true;
$wgGroupPermissions['Ctic']['delete'] = false;
$wgGroupPermissions['Ctic']['undelete'] = false;

# 20111215 Ederson Torresini: adicionando a namespace Professores
# 20111215 Ederson Torresini: fechando o acesso para usuários do grupo professores

define("NS_PROFESSORES", 104);
define("NS_PROFESSORES_TALK", 105);
$wgExtraNamespaces[NS_PROFESSORES] = "Professores";
$wgExtraNamespaces[NS_PROFESSORES_TALK] = "Professores Talk";
$wgNamespacePermissionLockdown[NS_PROFESSORES]['*'] = array('Professores');
$wgNamespacePermissionLockdown[NS_PROFESSORES_TALK]['*'] = array('Professores');
$wgGroupPermissions['Professores']['read'] = true;
$wgGroupPermissions['Professores']['createpage'] = true;
$wgGroupPermissions['Professores']['edit'] = true;
$wgGroupPermissions['Professores']['createtalk'] = true;
$wgGroupPermissions['Professores']['minoredit'] = true;
$wgGroupPermissions['Professores']['move-subpages'] = true;
$wgGroupPermissions['Professores']['move'] = true;
$wgGroupPermissions['Professores']['movefile'] = true;
$wgGroupPermissions['Professores']['reupload-shared'] = true;
$wgGroupPermissions['Professores']['reupload'] = true;
$wgGroupPermissions['Professores']['sendemail'] = true;
$wgGroupPermissions['Professores']['upload'] = true;
$wgGroupPermissions['Professores']['writeapi'] = true;
$wgGroupPermissions['Professores']['delete'] = false;
$wgGroupPermissions['Professores']['undelete'] = false;

# 20130926 Ederson Torresini: grupos a pedido do Moecke

define("NS_COTEL", 106);
define("NS_COTEL_TALK", 107);
$wgExtraNamespaces[NS_COTEL] = "Cotel";
$wgExtraNamespaces[NS_COTEL_TALK] = "Cotel Talk";
$wgNamespacePermissionLockdown[NS_COTEL]['*'] = array('Cotel');
$wgNamespacePermissionLockdown[NS_COTEL_TALK]['*'] = array('Cotel');
$wgGroupPermissions['Cotel']['read'] = true;
$wgGroupPermissions['Cotel']['createpage'] = true;
$wgGroupPermissions['Cotel']['edit'] = true;
$wgGroupPermissions['Cotel']['createtalk'] = true;
$wgGroupPermissions['Cotel']['minoredit'] = true;
$wgGroupPermissions['Cotel']['move-subpages'] = true;
$wgGroupPermissions['Cotel']['move'] = true;
$wgGroupPermissions['Cotel']['movefile'] = true;
$wgGroupPermissions['Cotel']['reupload-shared'] = true;
$wgGroupPermissions['Cotel']['reupload'] = true;
$wgGroupPermissions['Cotel']['sendemail'] = true;
$wgGroupPermissions['Cotel']['upload'] = true;
$wgGroupPermissions['Cotel']['writeapi'] = true;
$wgGroupPermissions['Cotel']['delete'] = false;
$wgGroupPermissions['Cotel']['undelete'] = false;


define("NS_GT1", 108);
define("NS_GT1_TALK", 109);
$wgExtraNamespaces[NS_GT1] = "Gt1";
$wgExtraNamespaces[NS_GT1_TALK] = "Gt1 Talk";
$wgNamespacePermissionLockdown[NS_GT1]['*'] = array('Gt1');
$wgNamespacePermissionLockdown[NS_GT1_TALK]['*'] = array('Gt1');
$wgGroupPermissions['Gt1']['read'] = true;
$wgGroupPermissions['Gt1']['createpage'] = true;
$wgGroupPermissions['Gt1']['edit'] = true;
$wgGroupPermissions['Gt1']['createtalk'] = true;
$wgGroupPermissions['Gt1']['minoredit'] = true;
$wgGroupPermissions['Gt1']['move-subpages'] = true;
$wgGroupPermissions['Gt1']['move'] = true;
$wgGroupPermissions['Gt1']['movefile'] = true;
$wgGroupPermissions['Gt1']['reupload-shared'] = true;
$wgGroupPermissions['Gt1']['reupload'] = true;
$wgGroupPermissions['Gt1']['sendemail'] = true;
$wgGroupPermissions['Gt1']['upload'] = true;
$wgGroupPermissions['Gt1']['writeapi'] = true;
$wgGroupPermissions['Gt1']['delete'] = false;
$wgGroupPermissions['Gt1']['undelete'] = false;

define("NS_GT2", 110);
define("NS_GT2_TALK", 111);
$wgExtraNamespaces[NS_GT2] = "Gt2";
$wgExtraNamespaces[NS_GT2_TALK] = "Gt2 Talk";
$wgNamespacePermissionLockdown[NS_GT2]['*'] = array('Gt2');
$wgNamespacePermissionLockdown[NS_GT2_TALK]['*'] = array('Gt2');
$wgGroupPermissions['Gt2']['read'] = true;
$wgGroupPermissions['Gt2']['createpage'] = true;
$wgGroupPermissions['Gt2']['edit'] = true;
$wgGroupPermissions['Gt2']['createtalk'] = true;
$wgGroupPermissions['Gt2']['minoredit'] = true;
$wgGroupPermissions['Gt2']['move-subpages'] = true;
$wgGroupPermissions['Gt2']['move'] = true;
$wgGroupPermissions['Gt2']['movefile'] = true;
$wgGroupPermissions['Gt2']['reupload-shared'] = true;
$wgGroupPermissions['Gt2']['reupload'] = true;
$wgGroupPermissions['Gt2']['sendemail'] = true;
$wgGroupPermissions['Gt2']['upload'] = true;
$wgGroupPermissions['Gt2']['writeapi'] = true;
$wgGroupPermissions['Gt2']['delete'] = false;
$wgGroupPermissions['Gt2']['undelete'] = false;

define("NS_GT3", 112);
define("NS_GT3_TALK", 113);
$wgExtraNamespaces[NS_GT3] = "Gt3";
$wgExtraNamespaces[NS_GT3_TALK] = "Gt3 Talk";
$wgNamespacePermissionLockdown[NS_GT3]['*'] = array('Gt3');
$wgNamespacePermissionLockdown[NS_GT3_TALK]['*'] = array('Gt3');
$wgGroupPermissions['Gt3']['read'] = true;
$wgGroupPermissions['Gt3']['createpage'] = true;
$wgGroupPermissions['Gt3']['edit'] = true;
$wgGroupPermissions['Gt3']['createtalk'] = true;
$wgGroupPermissions['Gt3']['minoredit'] = true;
$wgGroupPermissions['Gt3']['move-subpages'] = true;
$wgGroupPermissions['Gt3']['move'] = true;
$wgGroupPermissions['Gt3']['movefile'] = true;
$wgGroupPermissions['Gt3']['reupload-shared'] = true;
$wgGroupPermissions['Gt3']['reupload'] = true;
$wgGroupPermissions['Gt3']['sendemail'] = true;
$wgGroupPermissions['Gt3']['upload'] = true;
$wgGroupPermissions['Gt3']['writeapi'] = true;
$wgGroupPermissions['Gt3']['delete'] = false;
$wgGroupPermissions['Gt3']['undelete'] = false;

# 20140615 Ederson Torresini: a pedido do Diego/Moecke, novos grupos para espaços (namespaces) fechados.

define("NS_TAEs", 114);
define("NS_TAEs_TALK", 115);
$wgExtraNamespaces[NS_TAEs] = "TAEs";
$wgExtraNamespaces[NS_TAEs_TALK] = "TAEs Talk";
$wgNamespacePermissionLockdown[NS_TAEs]['*'] = array('TAEs');
$wgNamespacePermissionLockdown[NS_TAEs_TALK]['*'] = array('TAEs');
$wgGroupPermissions['TAEs']['read'] = true;
$wgGroupPermissions['TAEs']['createpage'] = true;
$wgGroupPermissions['TAEs']['edit'] = true;
$wgGroupPermissions['TAEs']['createtalk'] = true;
$wgGroupPermissions['TAEs']['minoredit'] = true;
$wgGroupPermissions['TAEs']['move-subpages'] = true;
$wgGroupPermissions['TAEs']['move'] = true;
$wgGroupPermissions['TAEs']['movefile'] = true;
$wgGroupPermissions['TAEs']['reupload-shared'] = true;
$wgGroupPermissions['TAEs']['reupload'] = true;
$wgGroupPermissions['TAEs']['sendemail'] = true;
$wgGroupPermissions['TAEs']['upload'] = true;
$wgGroupPermissions['TAEs']['writeapi'] = true;
$wgGroupPermissions['TAEs']['delete'] = false;
$wgGroupPermissions['TAEs']['undelete'] = false;

define("NS_Alunos", 116);
define("NS_Alunos_TALK", 117);
$wgExtraNamespaces[NS_Alunos] = "Alunos";
$wgExtraNamespaces[NS_Alunos_TALK] = "Alunos Talk";
$wgNamespacePermissionLockdown[NS_Alunos]['*'] = array('Alunos');
$wgNamespacePermissionLockdown[NS_Alunos_TALK]['*'] = array('Alunos');
$wgGroupPermissions['Alunos']['read'] = true;
$wgGroupPermissions['Alunos']['createpage'] = true;
$wgGroupPermissions['Alunos']['edit'] = true;
$wgGroupPermissions['Alunos']['createtalk'] = true;
$wgGroupPermissions['Alunos']['minoredit'] = true;
$wgGroupPermissions['Alunos']['move-subpages'] = true;
$wgGroupPermissions['Alunos']['move'] = true;
$wgGroupPermissions['Alunos']['movefile'] = true;
$wgGroupPermissions['Alunos']['reupload-shared'] = true;
$wgGroupPermissions['Alunos']['reupload'] = true;
$wgGroupPermissions['Alunos']['sendemail'] = true;
$wgGroupPermissions['Alunos']['upload'] = true;
$wgGroupPermissions['Alunos']['writeapi'] = true;
$wgGroupPermissions['Alunos']['delete'] = false;
$wgGroupPermissions['Alunos']['undelete'] = false;

define("NS_CST", 118);
define("NS_CST_TALK", 119);
$wgExtraNamespaces[NS_CST] = "CST";
$wgExtraNamespaces[NS_CST_TALK] = "CST Talk";
$wgNamespacePermissionLockdown[NS_CST]['*'] = array('CST');
$wgNamespacePermissionLockdown[NS_CST_TALK]['*'] = array('CST');
$wgGroupPermissions['CST']['read'] = true;
$wgGroupPermissions['CST']['createpage'] = true;
$wgGroupPermissions['CST']['edit'] = true;
$wgGroupPermissions['CST']['createtalk'] = true;
$wgGroupPermissions['CST']['minoredit'] = true;
$wgGroupPermissions['CST']['move-subpages'] = true;
$wgGroupPermissions['CST']['move'] = true;
$wgGroupPermissions['CST']['movefile'] = true;
$wgGroupPermissions['CST']['reupload-shared'] = true;
$wgGroupPermissions['CST']['reupload'] = true;
$wgGroupPermissions['CST']['sendemail'] = true;
$wgGroupPermissions['CST']['upload'] = true;
$wgGroupPermissions['CST']['writeapi'] = true;
$wgGroupPermissions['CST']['delete'] = false;
$wgGroupPermissions['CST']['undelete'] = false;

define("NS_TecnicoTele", 120);
define("NS_TecnicoTele_TALK", 121);
$wgExtraNamespaces[NS_TecnicoTele] = "TecnicoTele";
$wgExtraNamespaces[NS_TecnicoTele_TALK] = "TecnicoTele Talk";
$wgNamespacePermissionLockdown[NS_TecnicoTele]['*'] = array('TecnicoTele');
$wgNamespacePermissionLockdown[NS_TecnicoTele_TALK]['*'] =
array('TecnicoTele');
$wgGroupPermissions['TecnicoTele']['read'] = true;
$wgGroupPermissions['TecnicoTele']['createpage'] = true;
$wgGroupPermissions['TecnicoTele']['edit'] = true;
$wgGroupPermissions['TecnicoTele']['createtalk'] = true;
$wgGroupPermissions['TecnicoTele']['minoredit'] = true;
$wgGroupPermissions['TecnicoTele']['move-subpages'] = true;
$wgGroupPermissions['TecnicoTele']['move'] = true;
$wgGroupPermissions['TecnicoTele']['movefile'] = true;
$wgGroupPermissions['TecnicoTele']['reupload-shared'] = true;
$wgGroupPermissions['TecnicoTele']['reupload'] = true;
$wgGroupPermissions['TecnicoTele']['sendemail'] = true;
$wgGroupPermissions['TecnicoTele']['upload'] = true;
$wgGroupPermissions['TecnicoTele']['writeapi'] = true;
$wgGroupPermissions['TecnicoTele']['delete'] = false;
$wgGroupPermissions['TecnicoTele']['undelete'] = false;

define("NS_G1", 122);
define("NS_G1_TALK", 123);
$wgExtraNamespaces[NS_G1] = "G1";
$wgExtraNamespaces[NS_G1_TALK] = "G1 Talk";
$wgNamespacePermissionLockdown[NS_G1]['*'] = array('G1');
$wgNamespacePermissionLockdown[NS_G1_TALK]['*'] = array('G1');
$wgGroupPermissions['G1']['read'] = true;
$wgGroupPermissions['G1']['createpage'] = true;
$wgGroupPermissions['G1']['edit'] = true;
$wgGroupPermissions['G1']['createtalk'] = true;
$wgGroupPermissions['G1']['minoredit'] = true;
$wgGroupPermissions['G1']['move-subpages'] = true;
$wgGroupPermissions['G1']['move'] = true;
$wgGroupPermissions['G1']['movefile'] = true;
$wgGroupPermissions['G1']['reupload-shared'] = true;
$wgGroupPermissions['G1']['reupload'] = true;
$wgGroupPermissions['G1']['sendemail'] = true;
$wgGroupPermissions['G1']['upload'] = true;
$wgGroupPermissions['G1']['writeapi'] = true;
$wgGroupPermissions['G1']['delete'] = false;
$wgGroupPermissions['G1']['undelete'] = false;

define("NS_G2", 124);
define("NS_G2_TALK", 125);
$wgExtraNamespaces[NS_G2] = "G2";
$wgExtraNamespaces[NS_G2_TALK] = "G2 Talk";
$wgNamespacePermissionLockdown[NS_G2]['*'] = array('G2');
$wgNamespacePermissionLockdown[NS_G2_TALK]['*'] = array('G2');
$wgGroupPermissions['G2']['read'] = true;
$wgGroupPermissions['G2']['createpage'] = true;
$wgGroupPermissions['G2']['edit'] = true;
$wgGroupPermissions['G2']['createtalk'] = true;
$wgGroupPermissions['G2']['minoredit'] = true;
$wgGroupPermissions['G2']['move-subpages'] = true;
$wgGroupPermissions['G2']['move'] = true;
$wgGroupPermissions['G2']['movefile'] = true;
$wgGroupPermissions['G2']['reupload-shared'] = true;
$wgGroupPermissions['G2']['reupload'] = true;
$wgGroupPermissions['G2']['sendemail'] = true;
$wgGroupPermissions['G2']['upload'] = true;
$wgGroupPermissions['G2']['writeapi'] = true;
$wgGroupPermissions['G2']['delete'] = false;
$wgGroupPermissions['G2']['undelete'] = false;

define("NS_G3", 126);
define("NS_G3_TALK", 127);
$wgExtraNamespaces[NS_G3] = "G3";
$wgExtraNamespaces[NS_G3_TALK] = "G3 Talk";
$wgNamespacePermissionLockdown[NS_G3]['*'] = array('G3');
$wgNamespacePermissionLockdown[NS_G3_TALK]['*'] = array('G3');
$wgGroupPermissions['G3']['read'] = true;
$wgGroupPermissions['G3']['createpage'] = true;
$wgGroupPermissions['G3']['edit'] = true;
$wgGroupPermissions['G3']['createtalk'] = true;
$wgGroupPermissions['G3']['minoredit'] = true;
$wgGroupPermissions['G3']['move-subpages'] = true;
$wgGroupPermissions['G3']['move'] = true;
$wgGroupPermissions['G3']['movefile'] = true;
$wgGroupPermissions['G3']['reupload-shared'] = true;
$wgGroupPermissions['G3']['reupload'] = true;
$wgGroupPermissions['G3']['sendemail'] = true;
$wgGroupPermissions['G3']['upload'] = true;
$wgGroupPermissions['G3']['writeapi'] = true;
$wgGroupPermissions['G3']['delete'] = false;
$wgGroupPermissions['G3']['undelete'] = false;

define("NS_G4", 128);
define("NS_G4_TALK", 129);
$wgExtraNamespaces[NS_G4] = "G4";
$wgExtraNamespaces[NS_G4_TALK] = "G4 Talk";
$wgNamespacePermissionLockdown[NS_G4]['*'] = array('G4');
$wgNamespacePermissionLockdown[NS_G4_TALK]['*'] = array('G4');
$wgGroupPermissions['G4']['read'] = true;
$wgGroupPermissions['G4']['createpage'] = true;
$wgGroupPermissions['G4']['edit'] = true;
$wgGroupPermissions['G4']['createtalk'] = true;
$wgGroupPermissions['G4']['minoredit'] = true;
$wgGroupPermissions['G4']['move-subpages'] = true;
$wgGroupPermissions['G4']['move'] = true;
$wgGroupPermissions['G4']['movefile'] = true;
$wgGroupPermissions['G4']['reupload-shared'] = true;
$wgGroupPermissions['G4']['reupload'] = true;
$wgGroupPermissions['G4']['sendemail'] = true;
$wgGroupPermissions['G4']['upload'] = true;
$wgGroupPermissions['G4']['writeapi'] = true;
$wgGroupPermissions['G4']['delete'] = false;
$wgGroupPermissions['G4']['undelete'] = false;

define("NS_G5", 130);
define("NS_G5_TALK", 131);
$wgExtraNamespaces[NS_G5] = "G5";
$wgExtraNamespaces[NS_G5_TALK] = "G5 Talk";
$wgNamespacePermissionLockdown[NS_G5]['*'] = array('G5');
$wgNamespacePermissionLockdown[NS_G5_TALK]['*'] = array('G5');
$wgGroupPermissions['G5']['read'] = true;
$wgGroupPermissions['G5']['createpage'] = true;
$wgGroupPermissions['G5']['edit'] = true;
$wgGroupPermissions['G5']['createtalk'] = true;
$wgGroupPermissions['G5']['minoredit'] = true;
$wgGroupPermissions['G5']['move-subpages'] = true;
$wgGroupPermissions['G5']['move'] = true;
$wgGroupPermissions['G5']['movefile'] = true;
$wgGroupPermissions['G5']['reupload-shared'] = true;
$wgGroupPermissions['G5']['reupload'] = true;
$wgGroupPermissions['G5']['sendemail'] = true;
$wgGroupPermissions['G5']['upload'] = true;
$wgGroupPermissions['G5']['writeapi'] = true;
$wgGroupPermissions['G5']['delete'] = false;
$wgGroupPermissions['G5']['undelete'] = false;

define("NS_G6", 132);
define("NS_G6_TALK", 133);
$wgExtraNamespaces[NS_G6] = "G6";
$wgExtraNamespaces[NS_G6_TALK] = "G6 Talk";
$wgNamespacePermissionLockdown[NS_G6]['*'] = array('G6');
$wgNamespacePermissionLockdown[NS_G6_TALK]['*'] = array('G6');
$wgGroupPermissions['G6']['read'] = true;
$wgGroupPermissions['G6']['createpage'] = true;
$wgGroupPermissions['G6']['edit'] = true;
$wgGroupPermissions['G6']['createtalk'] = true;
$wgGroupPermissions['G6']['minoredit'] = true;
$wgGroupPermissions['G6']['move-subpages'] = true;
$wgGroupPermissions['G6']['move'] = true;
$wgGroupPermissions['G6']['movefile'] = true;
$wgGroupPermissions['G6']['reupload-shared'] = true;
$wgGroupPermissions['G6']['reupload'] = true;
$wgGroupPermissions['G6']['sendemail'] = true;
$wgGroupPermissions['G6']['upload'] = true;
$wgGroupPermissions['G6']['writeapi'] = true;
$wgGroupPermissions['G6']['delete'] = false;
$wgGroupPermissions['G6']['undelete'] = false;

define("NS_G7", 134);
define("NS_G7_TALK", 135);
$wgExtraNamespaces[NS_G7] = "G7";
$wgExtraNamespaces[NS_G7_TALK] = "G7 Talk";
$wgNamespacePermissionLockdown[NS_G7]['*'] = array('G7');
$wgNamespacePermissionLockdown[NS_G7_TALK]['*'] = array('G7');
$wgGroupPermissions['G7']['read'] = true;
$wgGroupPermissions['G7']['createpage'] = true;
$wgGroupPermissions['G7']['edit'] = true;
$wgGroupPermissions['G7']['createtalk'] = true;
$wgGroupPermissions['G7']['minoredit'] = true;
$wgGroupPermissions['G7']['move-subpages'] = true;
$wgGroupPermissions['G7']['move'] = true;
$wgGroupPermissions['G7']['movefile'] = true;
$wgGroupPermissions['G7']['reupload-shared'] = true;
$wgGroupPermissions['G7']['reupload'] = true;
$wgGroupPermissions['G7']['sendemail'] = true;
$wgGroupPermissions['G7']['upload'] = true;
$wgGroupPermissions['G7']['writeapi'] = true;
$wgGroupPermissions['G7']['delete'] = false;
$wgGroupPermissions['G7']['undelete'] = false;

define("NS_G8", 136);
define("NS_G8_TALK", 137);
$wgExtraNamespaces[NS_G8] = "G8";
$wgExtraNamespaces[NS_G8_TALK] = "G8 Talk";
$wgNamespacePermissionLockdown[NS_G8]['*'] = array('G8');
$wgNamespacePermissionLockdown[NS_G8_TALK]['*'] = array('G8');
$wgGroupPermissions['G8']['read'] = true;
$wgGroupPermissions['G8']['createpage'] = true;
$wgGroupPermissions['G8']['edit'] = true;
$wgGroupPermissions['G8']['createtalk'] = true;
$wgGroupPermissions['G8']['minoredit'] = true;
$wgGroupPermissions['G8']['move-subpages'] = true;
$wgGroupPermissions['G8']['move'] = true;
$wgGroupPermissions['G8']['movefile'] = true;
$wgGroupPermissions['G8']['reupload-shared'] = true;
$wgGroupPermissions['G8']['reupload'] = true;
$wgGroupPermissions['G8']['sendemail'] = true;
$wgGroupPermissions['G8']['upload'] = true;
$wgGroupPermissions['G8']['writeapi'] = true;
$wgGroupPermissions['G8']['delete'] = false;
$wgGroupPermissions['G8']['undelete'] = false;

define("NS_G9", 138);
define("NS_G9_TALK", 139);
$wgExtraNamespaces[NS_G9] = "G9";
$wgExtraNamespaces[NS_G9_TALK] = "G9 Talk";
$wgNamespacePermissionLockdown[NS_G9]['*'] = array('G9');
$wgNamespacePermissionLockdown[NS_G9_TALK]['*'] = array('G9');
$wgGroupPermissions['G9']['read'] = true;
$wgGroupPermissions['G9']['createpage'] = true;
$wgGroupPermissions['G9']['edit'] = true;
$wgGroupPermissions['G9']['createtalk'] = true;
$wgGroupPermissions['G9']['minoredit'] = true;
$wgGroupPermissions['G9']['move-subpages'] = true;
$wgGroupPermissions['G9']['move'] = true;
$wgGroupPermissions['G9']['movefile'] = true;
$wgGroupPermissions['G9']['reupload-shared'] = true;
$wgGroupPermissions['G9']['reupload'] = true;
$wgGroupPermissions['G9']['sendemail'] = true;
$wgGroupPermissions['G9']['upload'] = true;
$wgGroupPermissions['G9']['writeapi'] = true;
$wgGroupPermissions['G9']['delete'] = false;
$wgGroupPermissions['G9']['undelete'] = false;

define("NS_G10", 140);
define("NS_G10_TALK", 141);
$wgExtraNamespaces[NS_G10] = "G10";
$wgExtraNamespaces[NS_G10_TALK] = "G10 Talk";
$wgNamespacePermissionLockdown[NS_G10]['*'] = array('G10');
$wgNamespacePermissionLockdown[NS_G10_TALK]['*'] = array('G10');
$wgGroupPermissions['G10']['read'] = true;
$wgGroupPermissions['G10']['createpage'] = true;
$wgGroupPermissions['G10']['edit'] = true;
$wgGroupPermissions['G10']['createtalk'] = true;
$wgGroupPermissions['G10']['minoredit'] = true;
$wgGroupPermissions['G10']['move-subpages'] = true;
$wgGroupPermissions['G10']['move'] = true;
$wgGroupPermissions['G10']['movefile'] = true;
$wgGroupPermissions['G10']['reupload-shared'] = true;
$wgGroupPermissions['G10']['reupload'] = true;
$wgGroupPermissions['G10']['sendemail'] = true;
$wgGroupPermissions['G10']['upload'] = true;
$wgGroupPermissions['G10']['writeapi'] = true;
$wgGroupPermissions['G10']['delete'] = false;
$wgGroupPermissions['G10']['undelete'] = false;

# 20181521 layzacs extensoes

# EmbedVideo
wfLoadExtension( 'EmbedVideo' );

# Cite
wfLoadExtension( 'Cite' );

# ParserFunctions
wfLoadExtension( 'ParserFunctions' );

# Quiz
wfLoadExtension( 'Quiz' );

# Math
wfLoadExtension( 'Math' );
$wgMathFullRestbaseURL= 'https://en.wikipedia.org/api/rest_';
$wgDefaultUserOptions['math'] = 'mathml';

# SyntaxHighlighter
require_once "$IP/extensions/SyntaxHighlighter/SyntaxHighlighter.php";

# TinyMCE
wfLoadExtension( 'TinyMCE' );

# widgets
require_once "$IP/extensions/Widgets/Widgets.php";

# Lockdown
require_once "$IP/extensions/Lockdown/Lockdown.php";

# GoogleDocTag
require_once "$IP/extensions/GoogleDocTag/GoogleDocTag.php";

# Validator
require_once "$IP/extensions/Validator/Validator.php";

# ParamProcessor
require_once "$IP/extensions/ParamProcessor/src/Processor.php";

# SemanticMediaWiki
require_once "$IP/extensions/SemanticMediaWiki/SemanticMediaWiki.php";
enableSemantics( 'cicd.sj.ifsc.edu.br/' );

# LDAP
require_once "$IP/extensions/LdapAuthentication/LdapAuthentication.php";
$wgAuth = new LdapAuthenticationPlugin();
$wgLDAPUseLocal = true;
# 20101110 Ederson Torresini: habilitando autenticação por LD
$wgLDAPDomainNames = array( "IFSC", "IFSC_Alunos", "IFSC_Reitoria", "IFSC_Itajai" );
$wgLDAPServerNames = array(
        "IFSC"=>"vm-bd1.sj.ifsc.edu.br",
        "IFSC_Alunos"=>"vm-bd1.sj.ifsc.edu.br",
        "IFSC_Reitoria"=>"vm-bd1.sj.ifsc.edu.br",
        "IFSC_Itajai"=>"vm-bd1.sj.ifsc.edu.br"
);
$wgLDAPEncryptionType = array(
        "IFSC"=>"clear",
        "IFSC_Alunos"=>"clear",
        "IFSC_Reitoria"=>"clear",
        "IFSC_Itajai"=>"clear"
);
$wgLDAPSearchStrings = array(
        "IFSC"=>"uid=USER-NAME,ou=SaoJose,ou=Usuarios,dc=cefetsc,dc=edu,dc=br",
        "IFSC_Alunos"=>"uid=USER-NAME,ou=Alunos,dc=cefetsc,dc=edu,dc=br",

"IFSC_Reitoria"=>"uid=USER-NAME,ou=Reitoria,ou=Usuarios,dc=cefetsc,dc=edu,dc=br",
        "IFSC_Itajai"=>"uid=USER-NAME,ou=Itajai,ou=Usuarios,dc=cefetsc,dc=edu,dc=br"
);

$wgLDAPSearchAttributes = array(
        "IFSC"=>"uid",
        "IFSC_Alunos"=>"uid",
        "IFSC_Reitoria"=>"uid",
        "IFSC_Itajai"=>"uid"
);
$wgLDAPBaseDNs = array(
        "IFSC"=>"dc=cefetsc,dc=edu,dc=br",
        "IFSC_Alunos"=>"dc=cefetsc,dc=edu,dc=br",
        "IFSC_Reitoria"=>"dc=cefetsc,dc=edu,dc=br",
        "IFSC_Itajai"=>"dc=cefetsc,dc=edu,dc=br"
);
$wgLDAPGroupBaseDNs = array(
        "IFSC"=>"ou=Grupos,dc=cefetsc,dc=edu,dc=br"
);
$wgLDAPUserBaseDNs = array(
        "IFSC"=>"ou=SaoJose,ou=Usuarios,dc=cefetsc,dc=edu,dc=br",
        "IFSC_Alunos"=>"ou=Alunos,dc=cefetsc,dc=edu,dc=br",
        "IFSC_Reitoria"=>"ou=Reitoria,ou=Usuarios,dc=cefetsc,dc=edu,dc=br",
        "IFSC_Itajai"=>"ou=Itajai,ou=Usuarios,dc=cefetsc,dc=edu,dc=br"
);
$wgLDAPGroupUseFullDN = array(
        "IFSC"=>false,
        "IFSC_Alunos"=>false,
        "IFSC_Reitoria"=>false,
        "IFSC_Itajai"=>false
);
$wgLDAPGroupAttribute = array(
        "IFSC"=>'memberUid',
        "IFSC_Alunos"=>'memberUid',
        "IFSC_Reitoria"=>'memberUid',
        "IFSC_Itajai"=>'memberUid'
);


# 20180621 layzacs allow debug options
#$wgShowExceptionDetails = true;
#$wgDevelopmentWarnings = true;
#error_reporting( -1 );
#ini_set( 'display_startup_errors', 1 );
#ini_set( 'display_errors', 1 );
#$wgDebugLogFile = "/var/lib/mediawiki/images/debug.log";
