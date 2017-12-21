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

#### Définition du permiètre de sécurisation

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



#### STRIDE

### Identification des contre-mesures
#### En fonction des scénarios d’attaques

### Conclusion