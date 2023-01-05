# Projet-4 Group 2 : 

### Installation : 


1. Dans votre fichier php.ini dans le répertoire php, cherchez la ligne ___;extension=gd___  et décommentez-la.

```sh

> cd API
> composer update
> composer require maatwebsite/excel
> composer require mcamara/laravel-localization

```

2. Créer un autre fichier .env : 

```sh
(en utilisant la ligne de commande dans le répertoire API)

> copy .example.env .env
```

3. Modifiez le fichier .env en ajoutant l'adresse de la base de données (ip ou domaine), le nom d'utilisateur et le mot de passe.

4. Migrer la base de données :

```sh
> php artisan migrate
```

4. Déployer l'application :

```sh
> php artisan serve
```

5. installation  projet React dans Laravel :

```sh

> cd React 

> npm Install 

> npm install react-bootstrap bootstrap

> npm run dev
```