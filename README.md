# Tisane Lotan

Tisane Lotan est une application web conçue pour gérer divers aspects d'une entreprise liée au thé, se concentrant probablement sur les produits, les commandes, les catégories et éventuellement les points de vente.

## Table des matières

- [À propos](#à-propos)
- [Fonctionnalités](#fonctionnalités)
- [Installation](#installation)
- [Utilisation](#utilisation)
- [Structure des fichiers](#structure-des-fichiers)
- [Contribution](#contribution)
- [Licence](#licence)

## À propos

Tisane Lotan offre une plateforme robuste pour la gestion de votre entreprise de thé. Elle inclut des fonctionnalités pour la gestion des produits, le traitement des commandes, l'organisation par catégories et l'interaction avec les utilisateurs. L'application utilise Laravel pour le backend et Livewire pour les composants frontend dynamiques, assurant une expérience utilisateur réactive et efficace.

## Fonctionnalités

Basé sur la structure des fichiers fournie, Tisane Lotan semble offrir les fonctionnalités clés suivantes :

**Panneau d'administration :**
- **Gestion des produits :** Ajouter, modifier et gérer les produits de thé.
- **Gestion des catégories :** Organiser les produits en différentes catégories.
- **Gestion des commandes :** Consulter et gérer les commandes des clients.
- **Gestion des commentaires :** Gérer les commentaires liés aux produits ou aux commandes.
- **Gestion des points de vente :** Gérer et suivre les différents lieux de vente.
- **Authentification utilisateur :** Connexion sécurisée, inscription, réinitialisation du mot de passe et vérification de l'e-mail.

**Espace Invité/Public :**
- **Liste des produits :** Parcourir les produits de thé disponibles.
- **Navigation par catégorie :** Explorer les produits par catégorie.
- **Informations sur les lieux :** Potentiellement consulter des informations sur les emplacements ou les magasins.

**Fonctionnalités principales :**
- **Notifications par e-mail :** Pour les commandes, les commentaires et autres événements du système.
- **Gestion de base de données :** Stockage de données structurées pour toutes les entités de l'application.

## Installation

Pour configurer Tisane Lotan sur votre machine locale, suivez ces étapes :

1.  **Cloner le dépôt :**
    ```bash
    git clone <url_du_dépôt>
    cd tisane-lotan
    ```
2.  **Installer les dépendances Composer :**
    ```bash
    composer install
    ```
3.  **Installer les dépendances Node.js (pour Livewire/assets frontend) :**
    ```bash
    npm install
    npm run dev # Ou npm run prod pour la version de production
    ```
4.  **Créer une copie du fichier `.env.example` et le nommer `.env` :**
    ```bash
    cp .env.example .env
    ```
5.  **Générer une clé d'application :**
    ```bash
    php artisan key:generate
    ```
6.  **Configurer votre base de données dans le fichier `.env` :**
    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nom_de_votre_base_de_donnees
    DB_USERNAME=utilisateur_de_votre_base_de_donnees
    DB_PASSWORD=mot_de_passe_de_votre_base_de_donnees
    ```
7.  **Exécuter les migrations de la base de données :**
    ```bash
    php artisan migrate
    ```
8.  **(Facultatif) Alimenter la base de données avec des données initiales :**
    ```bash
    php artisan db:seed
    ```
9.  **Démarrer le serveur de développement Laravel :**
    ```bash
    php artisan serve
    ```

Vous devriez maintenant pouvoir accéder à l'application dans votre navigateur à l'adresse `http://127.0.0.1:8000`.

## Utilisation

### Accès Administrateur

Naviguez vers la page de connexion ( `/login/t-admin`) et utilisez vos identifiants d'administrateur pour accéder au tableau de bord, pour vous inscrire Naviguez vers la page d'enregistrement (`/register/t-admin`). De là, vous pouvez gérer les produits, les catégories, les commandes, les commentaires et d'autres tâches administratives.

### Accès Invité/Public

Les utilisateurs peuvent parcourir les produits et les catégories directement depuis la page d'accueil ou des routes publiques spécifiques.

## Structure des fichiers

Le projet suit une structure de répertoire Laravel standard, avec une organisation supplémentaire pour les composants et vues Livewire.