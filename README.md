# STI Projet 1 #
### Yosra Harbaoui et Lucie Steiner, 24.10.2017 ###

## Lancement de l'application ## 

1. Placer les fichiers

- Copier le contenu du dossier html dans /var/www/html
- Copier le contenu du dossier database dans /var/www/databases

2. Créer la base de données

- Effectuer la commande: php /var/www/html/create_db.php 
- La base de données est initialisée avec un utilisateur administrateur (login: admin, password: admin)

3. Lancer le service httpd

- Effectuer la commande: sudo systemctl start httpd

4. Accéder à l'application

- Accéder à http://localhost dans un navigateur


# STI Projet 2 #
### Yosra Harbaoui et Luana Martelli, 11.01.2018 ###

## Aspects sécuritaires ##

Depuis le dossier STI/

Lancer le script project-2-install.sh.

Ce script contient toutes les commandes d'installation pour la partie sécurité.

Il faut accepter le téléchargement des packages. 

Lancer la commande 

`sudo systemctl start httpd`

Ensuite, se rendre sur localhost.

Note : lors de la première connexion sur localhost, il faut reconnaître le certificat auto-signé comme valide.