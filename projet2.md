# Projet 2 
---

__Yosra Harbaoui & Luana Martelli__

## Rapport d'étude de menaces
---


TODO : - add implémentation fonctionnelle  
       - problèmes rencontrés
       - déjà mis en place : page protégée selon role



## Introduction

Dans le premier projet, il a été question de développer une application de messagerie. Le cahier des charges consistait à mettre en place une interface web permettant à un client (utilisateur ou administrateur) qui pouvait se connecter à sa messagerie. Il pouvait envoyer des messages, respectivement en recevoir, et éditer son profil. Si le client était administrateur, alors il pouvait aussi avoir accès à la liste des utilisateurs. 

Dans le cadre de ce deuxième projet, nous devons sécuriser cette application. L'aspect sécuritaire a été volontairement mise de côté lors de l'implémentation du programme. Ici, il s'agit d'identifier les menaces, de décrire des scénarios et finalement d'implémenter des contre-mesures, afin de rendre notre application utilisable et sécurisée.


## Description du système

Un utilisateur a un rôle défini lors de sa création ; il peut être administrateur ou collaborateur. Tous les deux ont accès à leur boîte mail respectives. Il peut gérer ses messages, c'est-à-dire, les supprimer ou en créer des nouveaux. L'utilisateur a aussi accès à son profil, où il peut changer de mot de passe. Ces fonctionnalités sont celles de bases. Un administrateur peut, en plus, créer, éditer ou supprimer des comptes, changer les rôles des autres utilisateurs, changer leur statuts (actif, inactif) et leur mot de passe.  
Un aspect sécuritaire a été pris en compte durant le développement de la phase une. Afin d'assurer un bon fonctionnement de l'application, les pages qui nécessitent une authentification ne sont accessibles qu'aux personnes authentifiées ; les autres sont redirigés sur la page de login. De plus, un simple utilisateur authentifié n'a pas accès aux pages d'administration. 

### DFD

TODO

## Identification des biens

Dans notre application, les données sensibles qu'il est nécessaire de protéger sont les informations utilisateurs (nom et mot de passe), ainsi que les messages échangés. Un attaquant peut vouloir voler ses informations pour diverses raisons, explicitées plus bas dans ce rapport. L'accès à la base de données doit donc être protégée. Le serveur, qui héberge l'application, est aussi un bien sensible.


## Définition du périmètre de sécurisation

Le scénario le plus plausible dans le cadre de cette application est un attaquant, ayant accès au service de messagerie, tente de trouver des failles afin de faire dysfonctionner le système selon ses désirs. Il s'agit donc avant tout de sécuriser le côté client, notamment de contrôler attentivement les formulaires auxquels un utilisateur a accès. Il s'agit ici d'attaques actives, ou le hacker essaye de prendre le contrôle de l'application.  

On peut aussi imaginer que le hacker effectue des écoutes passives. Il faut donc aussi penser à sécuriser la transmission de données.  

Un des risques encourus par toute application est une attaque de type déni de service. Il est en effet possible pour un attaquant d'inonder le serveur de requêtes afin de le rendre inapte. Il existe diverses possibilités pour s'en prémunir, ou en tout cas dissuader l'attaquant, comme par exemple bloquer les adresses IP qui font trop de requêtes dans un court laps de temps. Cependant, un attaquant peut contourner cette mesure en utilisant des proxys, ou simplement plusieurs machines. La question du déni de service étant vaste et complexe et l'application n'étant pour le moment hébergée que sur un ordinateur en localhost, nous ne l'avons pas pris en compte dans le cadre de ce projet. 


## Identification des sources de menaces

- __un pirate__   
  La première source de menace est représentée ici par un pirate informatique. Le but de sa manœuvre serait simplement de détruire l'application, par challenge ou parce qu'une source externe l'aurait payé pour. Il pourrait aussi vouloir récupérer les informations contenues dans la base de données, par exemple les mots de passe, car la plupart des utilisateurs utilisent le même mot de passe pour plusieurs applications. Il lui serait donc possible d'aller hacker des comptes Facebook. 

- __un utilisateur frustré ou malveillant__  
  Si l'utilisateur est suffisamment qualifié pour hacker l'application lui-même, il ne va pas avoir recours aux services d'un pirate. Ses motivations sont diverses : son compte a été désactivé et il souhaite le récupérer, il tente d'élever ses privilèges pour devenir administrateur. Finalement, il peut aussi vouloir lire des messages qui ne lui étaient pas destinés.

- __un programme malveillant__  
  La différence entre le pirate et le programme est que, afin d'empêcher le pirate d'agir, on va essayer de le forcer à s'authentifier, afin de restreindre ses droits en conséquence. Ainsi, il ne sera pas en muse d'accéder à l'application. Le programme lui, ne passe pas par la case authentification. Il s'agit donc ici de contrôler les injections de code, ou les requêtes suspicieuses et de bloquer les programmes non-reconnus par l'application. 

- __une menace physique__  
  Sous-entendu, une catastrophe naturelle, un sinistre, comme un incendie ou une inondation qui endommagerait le matériel qui contient l'application. À noter que ce type de menaces n'est pas pris en compte dans le présent rapport. Nous avons effectué des sauvegardes régulières de l'application, s'il devait se produire une catastrophe et que l'application n'est plus accessible, merci de nous contacter afin que nous vous fournissions les codes sources. 


## STRIDE

STRIDE est un acronyme pour différents niveaux de menaces. Il s'agit d'un modèle de classification qui permet de se rappeler des différentes menaces que l'on peut rencontrer dans une application. Les catégories sont les suivantes : Spoofing (vol d'identité), Tampering (sabotage), Repudiation (authentification), Information disclosure (leak de données), Denial of service, Elevation of privilege.

## Identification des scénarios d'attaques

## Eléments du système attaqué
### Motivation(s)

la gloire, l'argent, le challenge, le défi, le sentiment de puissance, la volonté de battre Jean-Kévin,

## Scénarios d’attaque et contre-mesures

Pour les scénarios qui suivent, nous imaginerons que Jean-Kévin est un administrateur de notre application. Tous les scénarios d'attaques décrits ci-dessous sont aussi valables pour un utilisateur lambda, cependant, il est toujours plus intéressant de viser la session d'un admin, visant ainsi plus de privilèges. Mallory sera l'attaquant qui souhaite prendre le contrôle de l'application. 


Scénario 1 
---

__Attaque :__ _Mots de passe faible_

Dans ce premier scénario, nous partons du principe que Mallory a réussi à obtenir une liste de noms d'utilisateur de l'application de messagerie. Grâce à cela, elle va pouvoir tenter de brute-forcer les mots de passe des comptes et ainsi pouvoir usurper des informations, ou carrément des identités. Dans l'application de base, il n'y a aucune mesure particulière mise en place pour contrôler la force des mots de passes utiliser. Il y a donc de fortes chances que les utilisateurs aient utilisés des mots de passe dit "faibles". 

__Classification :__ SI(E)

En partant du principe que l'attaque réussit et que Mallory obtient des mots de passes, elle peut non seulement voler des identités (S), mais elle a du coup aussi accès à des informations sensibles (I), comme par exemple les messages. Pire encore, si on part du principe que beaucoup d'utilisateurs utilisent le même mot de passe pour tous leurs comptes, Mallory peut faire beaucoup de dégâts. Finalement, il est possible que Mallory arrive à hacker un compte administrateur, ce qui lui donnerait les pleins pouvoirs (E).

__Contre-mesures__

Afin de contre-carrer les plans de Mallory, Jean-Kévin a décidé d'agir. Tout d'abord, lors d'une connexion qui échoue, l'utilisateur n'a pas d'informations sur le paramètre erroné. Il reçoit simplement :
```
Wrong credentials!
```
Ainsi, Mallory ne peut pas établir une liste d'utilisateurs. 

De plus, l'URL ne divulgue pas d'informations sur un compte. Tout est stocké dans la session. C'est pourquoi, il est impossible de brute-forcer des URL contenant des noms d'utilisateurs.

Finalement, l'entrée d'un nouveau mot de passe par l'utilisateur est problématique. En effet, afin de contrer les mots de passe du style "1234" ou "admin", une possibilité est de forcer l'utilisateur à entrer des mots de passe sûrs (un nombre minimal de caractères, des chiffres et des lettres ainsi que des caractères spéciaux). Cependant, ce genre de pratique pousse (trop) souvent l'utilisateur à ne pas retenir ce mot de passe et à le noter sous le clavier. Dans un cas comme dans l'autre, il y a un risque non-négligeable que le mot de passe soit faible (que ce soit dans sa construction ou dans son maintient). 
Jean-Kévin étant conscient des risques, il a décidé que, dans le cadre de cette application, il est plus probable qu'un hacker obtienne une liste des noms d'utilisateurs et tente de brute-forcer les mots de passe. Il a donc choisi de forcer l'utilisateur à choisir un mot de passe fort. Et en ce qui concerne le risque que l'utilisateur l'écvrie derrière son clavier, il ne rentre pas dans le périmètre de sécurisation du projet.  
Un mot de passe doit contenir au moins huit caractères, dont au moins une majuscule, un chiffre et un caractère spécial.  


Scénario 2
---
 
__Attaque :__ _Hachage de mots de passe_

Jean-Kévin le sait, un mot de passe, c'est important. Surtout si un utilisateur l'utilise pour plusieurs applications. C'est pourquoi Jean-Kévin a stocké le mot de passe haché dans la base de données. Ainsi, si la base de données est volée, les mots de passe ne sont pas dévoilés. Cependant, afin d'éviter une attaque sur les mots de passe à l'aide de rainbow tables, il faut ajouter un sel et le stocker. 
-> ajouter un sel ??

__Classification :__ I

Le mot de passe est une des informations les plus sensibles d'une application. Les voler et les craquer est évidemment une fuite d'informations confidentielles (I).

__Contre-mesures__

La version de PHP utilisée pour ce projet est 5.4. La fonction crypt() utilisée génère des hash MD5 avec un sel choisi selon l'implémentation de la fonction. Il n'est donc pas nécessaire d'en ajouter un. Ce sel est cependant décrit dans la documentation comme faible. Cependant, plutôt que de générer un sel aléatoire et le stocker, il serait plus simple de mettre à jour la version de PHP à au moins 5.5, car cette version contient `password_hash()`, qui génère des hashs et des sels forts.  

(Source : https://secure.php.net/manual/fr/function.crypt.php) 


__Note :__ Le mot de passe de base du premier compte (admin/admin) est très faible et très simple. Il est donc fortement conseillé, une fois la mise en place de l'application et de la base de données, de modifier ce mot de passe.  


Scénario 3
---

__Attaque :__ _Divulgation d'information à travers l'URL_

Dans l'état actuel de l'application, les URL existantes mais qui ne doivent pas être accessibles renvoient un 200 (car la page a été trouvée), mais est complètement blanche, alors que celles qui n'existent pas renvoie un 404. Afin d'obtenir des informations dans le but d'hacker une application, Mallory peut tenter d'accéder à des URL diverses pour découvrir quels sont les liens qui retournent une erreur ou non. 

__Classification :__ I

Comme expliqué dans l'attaque, il est possible d'obtenir des informations sur l'arborescence de l'application (I). Ce genre d'informations peut s'avérer utile dans un cas de reverse engineering de l'application. 

__Contre-mesures__

Jean-Kévin a fait deux changements dans le code : 
- Tout d'abord, il a ajouté un fichier `index.php` dans chaque dossier pour éviter de révéler l'arborescence de l'application. Dans ce fichier, l'utilisateur est automatiquement redirigé sur la page de login.  
- De plus, il a modifié le fichier `httpd.conf` comme suit :
```
ErrorDocument 404 http://localhost
```
Les requêtes retournant un 404 sont donc toutes redirigées sur la page localhost. Ainsi, si un pirate tente d'accéder à des URLS de manière pseudo-aléatoire, il n'obtiendra pas d'informations en plus.


Scénario 4
---

__Attaque :__ _Information sur le serveur_

Jean-Kévin, effectuant quelques tests sur son application, se rend compte que - horreur ! - la version du serveur qu'il utilise est visible en clair par tous. Cette information étant compromettante, il décide de remédier à ça. En effet, il suffit d'entrer la version du serveur sur l'Internet mondial pour y trouver toutes les failles répertoriées. 

__Classification :__ STRIDE

Selon le serveur utilisé et les failles correspondantes trouvées, l'attaque peut menacer toutes les catégories. 

__Contre-mesures__

Jean-Kévin a modifié le fichier de configuration `/etc/httpd/conf/httpd.conf`, en y ajoutant deux lignes
```bash
ServerTokens Prod
ServerSignature Off
```
Afin de cacher les informations sur le serveur.  
ServerToken notifie le niveau d'informations que le server va transmettre dans l'entête HTTP. Dans notre cas, Prod, fournit juste le nom du serveur, qui est l'information minimale. Par défaut, toutes les informations sont affichées.  
ServerSignature, s'il est activé, note une ligne en bas de l'application contenant le serveur et sa version. Par défaut, cette option est désactivée, mais il est plus sage et plus lisible de l'écrire ici. 


Scénario 5
--- 

__Attaque :__ _Injections SQL_

Mallory a appris qu’un site ayant une base de données et n'étant pas protégé est vulnérables à des attaques de type injections SQL. Grâce à cette attque, elle pourrait modifier la base de données à sa guise, supprimer ou ajouter des informations. Elle tente donc d'entrer la commande suivante dans la page de login : 
```
' OR 1=1 //
```
Cette commande ferme le champs de texte (') et le met à `TRUE`. Tout le reste (donc le mot de passe) est commenté. Dans un cas où aucune sécurité n'est mise en place, cette instruction retourne `TRUE` et l'attaquant a donc accès aux informations de la table concernée. Mallory pourrait donc récupérer des données sensibles, comme des mots de passe, des rôles etc..

__Classification :__ SIE

Un accès non sécurisé à une base de données amène les pleins pouvoirs. Un attaquant peut donc modifier des comptes ou des messages (SIE).

__Contre-mesures__

-> contrôle que les 2 champs ne soient pas vides
-> utilisation de authentify_user() dans user avec les fonctions prepare() et execute() qui permettent de parser les strings et de rendre impraticable les injections SQL. Toute information entrée par l'utilisateur est alors traitée comme une string et il est donc impossible pour Christophe-Jean de pratiquer une injection SQL.



non répudiation des messages ? 
possible de faire une signature pour chaque user? ?


Transmission d'information
Rien dans les URL -> comment ? 
Tout est set dans un cookie -> comment ? 

injection xss


Scénario 6
---

__Attaque :__ _Brute force d'un compte_

Mallory a réussi à récupéré le nom du compte de Jean-Kévin. Elle décide donc d'utiliser un outils pour brute-forcer les mots de passe et de tous les tester. Ce scénario diffère du premier car dans le cas précédent, on cherchait un compte avec un mot de passe faible. Dans ce cas, l'attaque est ciblée sur un compte, et on peut donc tester tous les mots de passe possible, y compris des mots de passe fort (même si du coup ça rallonge le temps de recherches). 

__Classification :__ (S)I(E)  

Ici, Mallory cherche à obtenir un maximum d'informations sensibles (I) sur le maximum d'utilisateurs. Dans le cas où il arriverait à ses fins, il peut voler des identités (S) ou alors, s'il s'agit du compte d'un admin, élever ses privilèges (E).


__Contre-mesures__ 

Jean-Kévin a aussi eu vent des plans de Mallory. Il décide alors de protéger un peu mieux la page de login. Au lieu de mettre un time-out au bout d'un certain temps, il a l'idée de mettre en place un captcha. Dès que l'utilisateur veut se connecter, il doit remplir un captcha. Après avoir téléchargé une librairie (source : https://github.com/dapphp/securimage), il ajoute dans la page login les quelques lignes :
Pour la partie html
```html
<div class="form-group">
	<?php
		echo Securimage::getCaptchaHtml();
	?>
</div>
``` 
Et pour la partie php/contrôle 
```php
require_once '../captcha/securimage/securimage.php';

/* code */

$image = new Securimage();
if ($image->check($_POST['captcha_code']) == true)

/* suite du code */
```


Scénario 7A
---

__Attaque :__ _Vol de session Partie 1_

Jean-Kévin, à la suite d'une rupture difficile, ère sur l'Internet mondial en recherche de réconfort. Christophe-Jean qui souhaite connaître les détails de la rupture, mais qui n'ose pas aller lui parler directement, envoie à Jean-Kévin un lien par mail qui lui promet qu'il va retrouver l'amour dans les deux minutes. Jean-Kévin, convaincu d'un signe du destin, clique sur le lien. Horreur ! Il s'agissait en fait d'une tentative de vol de session ! En effet, en cliquant sur le lien, Jean-Kévin a lancé un script qui récupère le cookie de session. 


__Classification :__ SI(E)

Pour ce scénario, le pirate souhaite avant tout endosser l'identité de l'utilisateur courant (S), afin d'accéder à des informations privées (I). Dans le cas où la victime est un administrateur, le pirate peut élever ses privilèges (E).

__Contre-mesures__

Dans le fichier qui vérifie la session courante, on peut ajouter ces quelques lignes, afin de s'assurer, d'une part, que les cookies ne passent que par le protocole HTTP et ne peuvent donc pas être récupéré autrement : 
```php
/* Prevents attacks in order to steal the session ID */
ini_set('session.cookie_httponly', 1);
/* Session ID cannot be passed through URLs */
ini_set('session.use_only_cookies', 1);
/* Unauthorize sesssion without id */
ini_set('session.use_strict_mode', 1);
```



Scénario 7B
---

__Attaque :__ _Vol de session Partie 2_

Jean-Kévin n'est pas satisfait. Bien que les cookies ne transitent plus que par le protocole HTTP, les informations circulent toujours en clair. Pour un attaquant possédant un sniffer de réseau, il est donc très facile d'avoir accès aux informations sensibles. Jean-Kévin décide donc de mettre en place un certificat TLS, afin que toutes son application soit en HTTPS. 


__Classification :__ SI(E)

Les menaces ciblent ici les mêmes classifications que pour le scénario A.


__Contre-mesures__

Afin de passer de http à https, il suit à la lettre un tutoriel qu'il a trouvé en ligne (source : www.digitalocean.com/community/tutorials/how-to-create-an-ssl-certificate-on-apache-for-centos-7). En quelques étapes, Jean-Kévin, crée une paire de clés publique/privée, un certificat qu'il signe lui-même, et met en place une politique de sécurité dans un fichier de configuration. Il écrit aussi un script qui permet à un utilisateur d'installer ce certificat `conf/ssl/enable-https.sh`. Ouf, Jean-Kévin est à présent satisfait.

_Note_ : Le certificat ayant été auto-signé, il est nécessaire de l'autoriser lors de la première connexion au site après l'avoir installé.  



Scénario 8
---

__Attaque :__ _Fonction logout_

Jean-Kévin aime bien lire ses mails dans un cybercafé avant de partir au travail. Son café terminé, il se déconnecte de sa session et part, en pensant que son compte est désormais inaccessible. Erreur ! Jean-Christophe, qui l'espionnait, prend alors sa place devant l'ordinateur. Il appuie sur le bouton "retour arrière" du navigateur web. Horreur ! Il a désormais accès aux mails de Jean-Kévin ! 


__Scénario alternatif__ : Jean-Kévin part sans en oubliant de se déconnecter - Horreur x2 ! -. Jean-Christophe arrive cinq minutes après et a accès à tous ses e-mails !  

__Classification :__ SI(E)

Dans ce cas, le pirate récupère simplement la session du dernier utilisateur, la fonction logout ne faisant rien, si ce n'est revenir à la page principale. Il peut donc se faire passer pour sa victime (S), lire ses e-mails (I) ou modifier des comptes (E), s'il tombe -par malchance- sur le compte d'un admin. 


__Contre-mesures__

Dans la fonction logout, nous avons utilisé les fonctions 
```php
session_start();
session_unset();
session_destroy();
```
Afin de pouvoir réutiliser à nouveau ses variables de sessions, on appelle la fonction session_start(). Ensuite, on utilise la fonction session_unset() qui libère toutes les variables de session et finalement session_destroy() qui détruit toutes les variables. Cela nous permet donc bien de libérer la session et de ne pas pouvoir la récupérer en un simple clic.  
Afin de ne pas se retrouver dans le cas du scénario alternatif, nous avons ajouté dans le fichier `check_session.php` un time-out. Si une session reste inactive plus de cinq minutes, la session est détruite. 
```php
if (isset($_SESSION['LAST_ACTIVITY']))
	if((time() - $_SESSION['LAST_ACTIVITY']) > 60) {
		session_start();
    	session_unset();
    	session_destroy();
    	header('Location: ./index.php'); 
  	}
}
$_SESSION['LAST_ACTIVITY'] = time();
```


## Difficultés rencontrées

Définir le périmètre de sécurité 
choisir quoi faire et comment

## Conclusion

En effectuant des recherches afin de sécuriser notre application, nous avons remarqué que certaines manipulations avaient déjà été effectuées. Cela est dû au fait que lorsque nous avons fait des recherches pour implémenter telle ou telle fonction, le standard utilisé était (souvent) celui qui était le mieux sécurisé. C'est une bonne nouvelle et cela montre que même si on y prête pas trop attention, quelques mesures de sécurités sont mises en place de base.
