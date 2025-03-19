# VROOM - Location de Véhicules

VROOM est une application web de location de véhicules développée avec Symfony 6.4.

## 🚀 Fonctionnalités

- 🔍 Recherche de véhicules par marque, modèle, type et prix
- 👤 Système d'authentification (inscription/connexion)
- 🚗 Catalogue de véhicules avec filtres
- 📱 Interface responsive
- 🔒 Sécurité renforcée
- 📧 Système de contact
- 👨‍💼 Interface d'administration

## 🛠️ Technologies utilisées

- PHP 8.2
- Symfony 6.4
- MySQL/MariaDB
- Doctrine ORM
- Twig
- Tailwind CSS
- Webpack Encore

## 📋 Prérequis

- PHP 8.2 ou supérieur
- Composer
- Node.js et npm
- MySQL/MariaDB
- Symfony CLI

## 🚀 Installation

1. Cloner le repository :
```bash
git clone https://github.com/sfeirc/VROOOOOOOOOOOOOM.git
cd VROOOOOOOOOOOOOM
```

2. Installer les dépendances PHP :
```bash
composer install
```

3. Installer les dépendances JavaScript :
```bash
npm install
```

4. Créer la base de données :
```bash
php bin/console doctrine:database:create
```

5. Exécuter les migrations :
```bash
php bin/console doctrine:migrations:migrate
```

6. Charger les fixtures :
```bash
php bin/console doctrine:fixtures:load
```

7. Compiler les assets :
```bash
npm run dev
```

8. Configurer le fichier .env :
```env
APP_ENV=dev
APP_SECRET=your_secret_here
DATABASE_URL="mysql://user:password@127.0.0.1:3306/vroom?serverVersion=10.11.6-MariaDB&charset=utf8mb4"
```

## 🎯 Utilisation

1. Lancer le serveur Symfony :
```bash
symfony server:start
```

2. Accéder à l'application :
```
http://localhost:8000
```

## 👥 Comptes par défaut

### Administrateur
- Email: admin@vroom.com
- Mot de passe: admin123

### Utilisateur test
- Email: user@vroom.com
- Mot de passe: user123

## 📝 Structure du projet

```
VROOOOOOOOOOOOOM/
├── assets/              # Assets JavaScript et CSS
├── config/             # Configuration de l'application
├── migrations/         # Migrations de la base de données
├── public/            # Fichiers publics
├── src/               # Code source
│   ├── Controller/    # Contrôleurs
│   ├── Entity/        # Entités
│   ├── Repository/    # Repositories
│   └── DataFixtures/  # Données de test
├── templates/         # Templates Twig
└── vendor/           # Dépendances PHP
```

## 🔒 Sécurité

- Authentification sécurisée
- Protection CSRF
- Validation des données
- Hachage des mots de passe
- Protection des routes sensibles

## 📄 Licence

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.

## 👥 Contribution

Les contributions sont les bienvenues ! N'hésitez pas à :
1. Fork le projet
2. Créer une branche pour votre fonctionnalité
3. Commiter vos changements
4. Pousser vers la branche
5. Ouvrir une Pull Request 