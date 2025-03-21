# VROOOOOOOOOOOM - Location de Voitures de Luxe

VROOOOOOOOOOOM est une application web de location de voitures de luxe développée avec Symfony 6.

## Prérequis

- PHP 8.1 ou supérieur
- Composer
- MySQL 8.0 ou supérieur
- Node.js et npm
- Symfony CLI

## Installation

1. Cloner le projet
```bash
git clone https://github.com/votre-username/VROOOOOOOOOOOM.git
cd VROOOOOOOOOOOM
```

2. Installer les dépendances PHP
```bash
composer install
```

3. Installer les dépendances JavaScript
```bash
npm install
npm run build
```

4. Configurer la base de données
- Copier le fichier `.env` en `.env.local`
- Modifier les paramètres de connexion à la base de données dans `.env.local`
```
DATABASE_URL="mysql://username:password@127.0.0.1:3306/vrooooooooooom?serverVersion=8.0"
```

5. Créer et initialiser la base de données
```bash
mysql -u root -p < data/database.sql
php bin/console app:import-cars
```

6. Démarrer le serveur Symfony
```bash
symfony serve -d
```

## Accès à l'application

- URL: `http://localhost:8000`
- Admin:
  - Email: admin@vrooooooooooom.fr
  - Mot de passe: admin

## Fonctionnalités

- Recherche de véhicules avec filtres (marque, type, prix, etc.)
- Système de réservation
- Gestion des véhicules (CRUD)
- Interface d'administration
- Authentification et gestion des utilisateurs

## Structure du projet

- `src/` : Code source PHP
- `templates/` : Templates Twig
- `public/` : Fichiers publics (images, CSS, JS)
- `data/` : Scripts SQL et données
- `config/` : Configuration Symfony

## Contribution

1. Fork le projet
2. Créer une branche pour votre fonctionnalité (`git checkout -b feature/ma-fonctionnalite`)
3. Commit vos changements (`git commit -m 'Ajout de ma fonctionnalité'`)
4. Push vers la branche (`git push origin feature/ma-fonctionnalite`)
5. Créer une Pull Request

## Licence

Ce projet est sous licence MIT. Voir le fichier `LICENSE` pour plus de détails. 