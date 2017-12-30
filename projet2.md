# Projet 2 

Yosra Harbaoui & Luana Martelli

## Rapport d'étude de menaces

### Introduction

Dans le premier projet, il a été question de développer une application de messagerie. Le cahier des charges consistait à mettre en place une interface web permettant à un client (utilisateur ou administrateur) qui pouvait se connecter à sa messagerie. Il pouvait envoyer des messages, respectivement en recevoir, et éditer son profil. Si le client était administrateur, alors il pouvait aussi avoir accès à la liste des utilisateurs. 

Dans le cadre de ce deuxième projet, nous devons sécuriser cette application. L'aspect sécuritaire a été volontairement mise de côté lors de l'implémentation du programme. Ici, il s'agit d'identifier les menaces, de décrire des scénarios et finalement d'implémenter des contre-mesures, afin de rendre notre application utilisable et sécurisée.


### Description du système

#### DFD

TODO

#### Identification des biens

- application
- serveur ? 
- informations des utilisateurs 
- messages 

#### Définition du périmètre de sécurisation

Mots de passe faible
Afin de contrer les mots de passe du style "1234" ou "admin", une possibilité est de forcer l'utilisateur à entrer des mots de passe sûrs (un nombre minimal de caractères, des chiffres et des lettres ainsi que des caractères spéciaux). Cependant, ce genre de pratique pousse (trop) souvent l'utilisateur à ne pas retenir ce mot de passe et à le noter sous le clavier. Nous avons donc choisi de ne pas implémenter ce genre de fonctionnalités. Les mots de passe sont protégés dans la base de données avec une fonction de hachage, mais rien de plus. Si un compte est hacké à cause d'un mot de passe trop faible, seul l'utilisateur est responsable. 

(Mettre un easter egg si l'utilisateur entre un mot de passe un peu nul en mode : ce n’est pas bien)

### Identification des sources de menaces

- un pirate 
  La première source de menace est représentée ici par un pirate informatique. Le but de sa manœuvre serait simplement de détruire l'application, par challenge ou parce que la source numéro 2 l'aurait payé pour. Il peut aussi vouloir récupérer les informations contenues dans la base de données, par exemple les mots de passe, car la plupart des utilisateurs utilisent le même mot de passe pour plusieurs applications. Il lui serait donc possible d'aller hacker des comptes Facebook. 

- un utilisateur frustré ou malveillant 
  Source de menace numéro 2. Si l'utilisateur est suffisamment qualifié pour hacker l'application lui-même, il ne va pas avoir recours aux services d'un pirate. Ses motivations sont diverses : son compte a été désactivé et il souhaite le récupérer, il tente d'élever ses privilèges pour devenir administrateur. Finalement, il peut aussi vouloir lire des messages qui ne lui étaient pas destinés.

- un programme malveillant 
  La différence entre le pirate et le programme est que, afin d'empêcher le pirate d'agir, on va essayer de le forcer à s'authentifier, afin de restreindre ses droits en conséquence. Ainsi, il ne sera pas en muse d'accéder à l'application. Le programme lui, ne passe pas par la case authentification. Il s'agit donc ici de contrôler les injections de code, ou les requêtes suspicieuses et de bloquer les programmes non-reconnus par l'application. 

- menace physique 
  Sous-entendu, une catastrophe naturelle, un sinistre, comme un incendie ou une inondation qui endommagerait le matériel qui contient l'application. À noter que ce type de menaces n'est pas pris en compte dans le présent rapport. Nous avons effectué des sauvegardes régulières de l'application, s'il devait se produire une catastrophe et que l'application n'est plus accessible, merci de nous contacter afin que nous vous fournissions les codes sources. 


### Identification des scénarios d'attaques

#### Eléments du système attaqué
#### Motivation(s)


#### Scénario(s) d’attaque

Pour les scénarios qui suivent, nous imaginerons que Jean-Kévin est un administrateur de notre application. Il est plutôt sympathique, mais un poil candide. Il pense vivre dans un monde sûr où tout est bien contrôlé. Tous ces scénarios d'attaques sont aussi valables pour un utilisateur lambda, cependant, il est toujours plus intéressant de viser la session d'un admin, visant ainsi plus de privilèges. 

Hachage de mots de passe
Jean-Kévin le sait, un mot de passe, c'est important. Surtout si un utilisateur l'utilise pour plusieurs application. C'est pourquoi Jean-Kévin a stocké le mot de passe haché dans la base de donnée. Ainsi, si la base de donnée est volée, les mots de passe ne sont pas dévoilés.
-> ajouter un sel ??



Ajout d'un fichier index.php dans chaque dossier pour éviter de révéler l'arboresence de l'application
Modification du fichier httpd.conf
```
ErrorDocument 404 http://localhost
```
Afin de ne pas divulguer d'informations sur l'arboresence des fichiers de l'applicationw



Information sur le serveur 
Jean-Kévin, effectuant quelques tests sur son application, se rend compte que - horreur ! - la version du serveur qu'il utilise est visible en clair par tous. Cette information étant compromettante, il décide de remédier à ça. En effet, il suffit d'entrer la version du serveur sur l'Internet mondial pour y trouver toutes les failles répértoriées. (STRIDE, selon la faille trouvée)
-> modification du fichier de configuration `/etc/httpd/conf/httpd.conf`, ajout des deux lignes
```bash
ServerTokens Prod
ServerSignature Off
```
Afin de cacher les informations sur le seveur. 

Déni de service ?? 

Utilisation de HTTPS
Jean Kévin se réveille un matin avec la sensation que quelque chose ne va pas : TOUTES les informations concernant son application de messagerie passent en clair sur le réseau ! Ne pouvant plus ignorer ce fait, Jean-Kévin s'empresse d'installer un certificat, afin que des attaquants potentiels se trouvant dans le même réseau que lui ne puisse pas lui voler son mot de passe. À noter que Jean-Kévin, ne faisant confiance à personne, à signer son certificat lui-même. C'est ainsi que lors de la première connexion au site, il faut accepter ce certificat auto-signé.
Afin de pouvoir installer son certificat, il faut lancer le script enable-https.sh qui se trouve dans le dossier conf/ssl/.


Injections SQL 
Christophe-Jean a pris quelques cours de base de données pendant les vacances. Il a notamment appris qu’un site ayant une base de données et n'étant pas protégé est vulnérables à des attaques de type injections SQL. Voulant absolument connaître l'email de la copine de Jean-Kévin, il décide donc de passer à l'action... Dans la page de login, il entre donc les informations
```
' OR 1=1 //
```
Afin de récupérer les mdp / rôle etc... (SIE)
-> contrôle que les 2 champs ne soient pas vides
-> utilisation de authentify_user() dans user avec les fonctions prepare() et execute() qui permettent de parser les strings et de rendre impraticable les injections SQL. Toute information entrée par l'utilisateur est alors traitée comme une string et il est donc impossible pour Christophe-Jean de pratiquer une injection SQL.

non répudiation des messages ? 
possible de faire une signature pour chaque user? ?


Transmission d'information
Rien dans les URL -> comment ? 
Tout est set dans un cookie -> comment ? 


URL
Les url existantes mais qui ne doivent pas être accessibles renvoient un 200 alors que celles qui n'existent pas renvoie un 404. TODO

Brute force d'un compte
Christophe-Jean, ayant suivi les informations de ces derniers jours, a appris qu'une base de données contant 9GB de mots de passe était disponible sur l'Internet mondial. Bien décidé à avoir l'email de la copine de Jean-Kévin, il décide de tester tous les mots de passe de la base de données sur le compte de Jean-Kévin. 
-> mettre en place un système de blocage ? 


Vol de session
Jean-Kévin, à la suite d'une rupture difficile, ère sur l'Internet mondial en recherche de réconfort. Christophe-Jean qui souhaite connaître les détails de la rupture, mais qui n'ose pas aller lui parler directement, envoie à Jean-Kévin un lien par mail qui lui promet qu'il va retrouver l'amour dans les deux minutes. Jean-Kévin, convaincu d'un signe du destin, clique sur le lien. Horreur ! Il s'agissait en fait d'une tentative de vol de session ! En effet, en cliquant sur le lien, Jean-Kévin a lancé un script qui récupère le cookie de session (SIE)
-> ajout dans le fichier check_session des deux lignes 
```php
/* Prevents attacks in order to steal the session ID */
ini_set('session.cookie_httponly', 1);
/* Session ID cannot be passed through URLs */
ini_set('session.use_only_cookies', 1);
/* Unauthorize sesssion without id */
ini_set('session.use_strict_mode', 1);
```
aller plus loin : localhost en https ? 
​	
Fonction logout 
Jean-Kévin aime bien lire ses mails dans un cybercafé avant de partir au travail. Son café terminé, il se déconnecte de sa session et part, en pensant que son compte est désormais inaccessible. Erreur ! Un pirate prend alors sa place devant l'ordinateur. Il appuie sur le bouton "retour arrière" du navigateur web. Horreur ! Il a désormais accès aux mails de Jean-Kévin ! (SIE)
-> utilisation de session_unset() qui libère toutes les variables de session, session_destroy() qui détruit toutes les variables. Finalement, afin de pouvoir réutiliser à nouveau ses variables de sessions, on appelle la fonction session_start().

#### STRIDE

### Identification des contre-mesures
#### En fonction des scénarios d’attaques

### Conclusion

En effectuant des recherches afin de sécuriser notre application, nous avons remarqué que certaines manipulations avaient déjà été effectuées. Cela est dû au fait 
