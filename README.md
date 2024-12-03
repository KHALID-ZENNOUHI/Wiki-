# 📚 Wiki Platform - Système de Gestionnaire de Contenu Collaboratif

**Wiki Platform** est une application web intuitive permettant de créer, gérer et partager facilement des wikis. Elle intègre un back-office pour les administrateurs et auteurs, ainsi qu’un front-office pour une expérience utilisateur fluide et engageante.

---

## 📖 Contexte
Ce projet vise à :
- Simplifier la gestion des catégories, tags et wikis pour les administrateurs.
- Permettre aux auteurs de créer, modifier et supprimer leurs contenus.
- Offrir une interface utilisateur agréable pour la découverte et la navigation des wikis.

---

## 🛠️ Fonctionnalités Clés

### Back Office (Administrateur)
- **Gestion des Catégories** : Créer, modifier et supprimer des catégories.
- **Gestion des Tags** : Créer, modifier et supprimer des tags associés aux wikis.
- **Gestion des Wikis** : Archiver les contenus inappropriés.
- **Statistiques** : Tableau de bord affichant les statistiques clés (catégories, tags, wikis).

### Back Office (Auteurs)
- **Création et Gestion des Wikis** : Ajouter, modifier, ou supprimer des wikis personnels.
- **Organisation des Contenus** : Associer une catégorie et plusieurs tags à chaque wiki.

### Front Office
- **Inscription et Connexion** : 
  - Création de compte utilisateur.
  - Connexion avec redirection selon le rôle (Admin vers Dashboard, Utilisateur vers Home).
- **Recherche Dynamique (AJAX)** : Barre de recherche pour wikis, catégories et tags.
- **Affichage Dynamique** : 
  - Derniers wikis ajoutés.
  - Dernières catégories créées.
- **Page Détail Wiki** : Vue détaillée d’un wiki, avec contenu, catégories, tags, et auteur.

---

## 💡 Bonus
- **Upload d’Images** : Ajouter des images enrichissant le contenu.
- **Architecture MVC** : 
  - Système de routage.
  - Organisation des classes avec namespaces (Autoload).

---

## 🔧 Technologies Utilisées
### Frontend
- **HTML5** : Structure des pages.
- **CSS Framework** : Styles et mise en page responsive.
- **JavaScript** : Fonctionnalités interactives.

### Backend
- **PHP 8 (Architecture MVC)** : Gestion de la logique métier et des requêtes.
- **PDO** : Interactions sécurisées avec la base de données.

### Base de Données
- **MySQL** : Gestion des données avec schéma relationnel.

---

## 🎯 Critères de Performance

### Planification
- **Gestion des tâches** : Utilisation de Trello/Jira pour suivre les User Stories.
- **Commits Journaliers** : Suivi des changements sur GitHub.

### Optimisation
- **Design Responsive** : Interface adaptative pour tout type d’écran.
- **Validation des Formulaires** :
  - **Frontend** : Validation client avec HTML5 et JS.
  - **Backend** : Protection contre XSS et CSRF.
- **Sécurité** :
  - Prévention contre les injections SQL (requêtes préparées).
  - Échappement des données sensibles pour éviter les attaques XSS.

---

## 🌟 Objectif
Créer une plateforme collaborative robuste et intuitive qui encourage la création et le partage de connaissances au sein d’une communauté dynamique.
