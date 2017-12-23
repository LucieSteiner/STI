# Projet 2 

Yosra Harbaoui & Luana Martelli

## Rapport d'étude de menaces

### Introduction

Dans le premier projet, il a été question de déveloper une application de messagerie. Le cahier des charges consistait à mettre en place une interface web permettant à un client (utilisateur ou administrateur) qui pouvait se connecter à sa messagerie. Il pouvait envoyer des messages, respectivement en recevoir, et éditer son profil. Si le client était administrateur, alors il pouvait aussi avoir accès à la liste des utilisateurs. 

Dans le cadre de ce deuxième projet, nous devons sécuriser cette application. L'aspect sécuritaire a été volontairement mise de côté lors de l'implémentation du programme. Ici, il s'agit d'ifentifier les menaces, de décrire des scénarios et finalement d'implémenter des contre-mesures, afin de rendre notre application utilisable et sécurisée.


### Description du système

#### DFD

TODO

#### Identification des biens

- application
- serveur ? 
- informations des utilisateurs 
- messages 

#### Définition du permiètre de sécurisation

Mots de passe faible
Afin de contrer les mots de passe du style "1234" ou "admin", une possibilité est de forcer l'utilisateur à entrer des mots de passe sûrs (un nombre minimal de caractères, des chiffres et des lettres ainsi que des caractères spéciaux). Cependant, ce genre de pratique pousse (trop) souvent l'utilisateur à ne pas retenir ce mot de passe et à le noter sous le clavier. Nous avons donc choisi de ne pas implémenter ce genre de fonctionnalités. Les mots de passe sont protégés dans la base de données avec une fonction de hachage, mais rien de plus. Si un compte est hacké à cause d'un mot de passe trop faible, seul l'utilisateur est responsable. 

(Mettre un easter egg si l'utilisateur entre un mot de passe un peu nul en mode : c'est pas bien)

### Identification des sources de menaces

- un pirate 
	La première source de menace est représentée ici par un pirate informatique. Le but de sa manoeuvre serait simplement de détruire l'application, par challenge ou parce que la source numéro 2 l'aurait payé pour. Il peut aussi vouloir récupérer les informations contenues dans la base de données, par exemple les mots de passe, car la plus part des utilisateurs utilisent le même mot de passe pour plusieurs applications. Il lui serait donc possible d'aller hacker des comptes Facebook. 

- un utilisateur frustré ou malveillant 
	Source de menace numéro 2. Si l'utilisateur est suffisamment qualifié pour hacker l'application lui-même, il ne va pas avoir recours aux services d'un pirate. Ses motivations sont diverses : son compte a été désactivé et il souhaite le récupérer, il tente d'élever ses privilèges pour devenir administrateur. Finalement, il peut aussi vouloir lire des messages qui ne lui étaient pas destinés.

- un programme malveillant 
	La différence entre le pirate et le programme est que, afin d'empêcher le pirate d'agir, on va essayer de le forcer à s'authentifier, afin de restreindre ses droits en conséquences. Ainsi, il ne sera pas en muse d'accéder à l'application. Le programme lui, ne passe pas par la case authentification. Il s'agit donc ici de contrôler les injections de code, ou les requêtes suspicieuses et de bloquer les programmes non-reconnus par l'application. 

- menace physique 
	Sous-entendu, une catastrophe naturelle, un sinistre, comme un incendie ou une innondation qui endommagerait le matériel qui contient l'application. À noter que ce type de menaces n'est pas pris en compte dans le présent rapport. Nous avons effectuer des sauvegardes régulières de l'application, s'il devait se produire une catastrophe et que l'application n'est plus accessible, merci de nous contacter afin que nous vous fournissions les codes sources. 


### Identification des scénarios d'attaques

#### Eléments du système attaqué
#### Motivation(s)


#### Scénario(s) d’attaque

Pour les scéanrios qui suivent, nous imaginerons que Jean-Kévin est un administrateur de notre application. Il est plutôt sympathique, mais un poil candide. Il pense vivre dans un monde sûr où tout est bien contrôlé. Tous ces scénarios d'attaques sont aussi valables pour un utilisateur lambda, cependant, il est toujours plus intéressant de viser la session d'un admin, visant ainsi plus de privilèges. 

- injections SQL afin de récupérer les mdp / role etc...
- injections XSS afin de modifier le code 
- brute force d'un compte



Fonction logout 
Jean-Kévin aime bien lire ses mails dans un cybercafé avant de partir au travail. Son café terminé, il se déconnecte de sa session et part, en pensant que son compte est désormais inaccessible. Erreur ! Un pirate prend alors sa place devant l'ordinateur. Il appuie sur le bouton "retour arrière" du navigateur web. Horreur ! Il a désormais accès aux mails de Jean-Kévin ! (SIE)
-> fonction déjà implémentée, à justifier ! 

#### STRIDE

### Identification des contre-mesures
#### En fonction des scénarios d’attaques

### Conclusion