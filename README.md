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

1. Fichier de configuration 

```bash
sudo mv conf/httpd.conf /etc/httpd/conf/httpd.conf
```

2. Script SSL
```bash
sudo bash /conf/ssl/enable-https.sh 
```

Note : lors de la première connexion sur localhost, il faut reconnaître le certificat auto-signé comme valide.