# Groupe de edjamt_k 882506

## Installation du projet 

Il faut commencer par installer Docker en tapant ``./install_docker.sh``

## Les containers

Une fois Docker installer, on peut voir qu'il y a trois dossier qui corresponde à trois containers front, back et db.

### container:db

Il y a un Dockerfile qui utilise une image mysql avec le FROM mysql:8.0, ajoute le fichier de configuration sql ADD db.sql /docker-entrypoint-initdb.d/script.sql pour configurer la base de donnée MySQL et ENV MYSQL_ROOT_PASSWORD root pour définir un mot de passe à la base de donnée.

### container:back

C'est un Dockerfile qui utilise une image php avec FROM php:7.4-cli.\
Ce container servira à récupérer les informations du container:db avec le fichier server.php.\
Avant on va installer pdo avec "RUN docker-php-ext-install mysqli pdo pdo_mysql" qui server à effectuer la connection à la base de donnée.\
Puis on va COPY ./server.php ./" pour y avoir accès depuis le container et pour lancer le server en même temps que le container  "CMD php -S 0.0.0.0:7777" et le "EXPOSE 7777" pour définir un port.

### container:front

Ce container va afficher les données récuperer par le container back.\
Dans le dockerfile le fichier index.php va être déplacer dans le dossier /var/www/html/ "COPY ./index.php /var/www/html/"\
Pour lancer le server en même temps que le container  "CMD php -S 0.0.0.0:8080" et le "EXPOSE 8080" pour définir un port.

## docker compose

On utilise la version 3.2 du docker-compose.yml\
On va commencer par définir les services il y a trois services qui correspond au trois dossiers qui font build chaque un dossier database:build:./db, back:build:./back, front:
    build: ./front\
pour le servise database on va déifinir un volume pour la persistance des données et ils sont tous relié par un networks qui les mettent sur le même réseaux.

## Lancement 

Pour lancer tous les containers en même temps on utilise ``docker-compose up --build`` qui utilisera le docker-compose pour build les containers.\
"http://0.0.0.0:8080" pour voir le front et "http://0.0.0.0:7777" pour le back.\
Une fois le docker-compose stopper vous pouvez faire un ``docker system prune`` pour supprimer les containers non utiliser.
