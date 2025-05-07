# Symfony Developer Portfolio

## Présentation

Ce projet est un portfolio de développeur web et mobile moderne, multilingue, construit avec Symfony. Il est pensé pour être **facilement personnalisable** et s’adapter à n’importe quel profil (compétences, expériences, projets, etc.).

---

## Fonctionnalités

- 🌐 Support multilingue (dossiers de traduction)
- 📱 Design responsive
- 🚀 Personnalisation simple (infos, compétences, projets…)
- 📧 Formulaire de contact intégré (avec envoi d’e-mails)
- 📝 Mentions légales, politique de confidentialité
- 🔒 Bonnes pratiques de sécurité Symfony
- 🗂️ Organisation claire du code et des templates (Twig)[1]

---

## Personnalisation

### 1. **Informations personnelles**

Modifie le fichier :  
- `src/Service/PortfolioService.php`  
  - **Compétences** : adapte les méthodes `getSkills()`
  - **Expériences** : `getExperiences()`
  - **Formations** : `getEducations()`
  - **Données personnelles** : `getPersonalInfo()`

### 2. **Contact et détails personnels**

Modifie :  
- `src/Controller/HomeController.php`  
  - Configuration de l’envoi d’e-mail (service `EmailService`)
  - Date de naissance pour le calcul de l’âge (si affiché)

### 3. **Mentions légales et conformité**

Modifie :  
- `templates/home/legal_notice.html.twig`  
  - Tes infos personnelles, SIRET, adresse, etc.
  - Les conditions légales adaptées à ta situation

### 4. **SEO et configuration webmaster**

- `public/robots.txt` : règles d’indexation
- `public/sitemap.xml` : URLs et pages à indexer

### 5. **Traductions**

Tout le contenu multilingue est dans le dossier `translations/` :
- `messages.fr.yaml` : français
- `messages.en.yaml` : anglais
- Ajoute d’autres langues si besoin

---

## Installation

### Prérequis

- PHP 8.1+
- Composer
- Symfony CLI

### Étapes

```bash
git clone https://github.com/sgrosrey/developer-portfolio.git
cd developer-portfolio
composer install
```

- Configure les variables d’environnement dans `.env` (copie de `.env.example` si besoin)
- Lance le serveur de développement :
```bash
symfony server:start
```

---

## Déploiement

- Compatible avec tout hébergement PHP/Symfony moderne
- Configure bien tes variables d’environnement en production

---

## Contribution

- Fork le projet et adapte-le à ton profil
- Les Pull Requests sont bienvenues !

---

## Licence

Ce projet est sous licence MIT.

---

## Ressources utiles

- [Documentation Symfony](https://symfony.com/doc/current/index.html)[10]
- [Guide sur les templates Twig](https://symfony.com/doc/current/templates.html)[1]
- [Exemple de personnalisation de portfolio Symfony](https://jeremygrimont.fr/projet/6)[11]

---

**N.B. :**  
Ce projet est pensé pour être un socle professionnel, facilement personnalisable, et respectant les standards de qualité Symfony.  
Pour toute question ou suggestion, n’hésite pas à ouvrir une issue ou une PR !

---

**English version below**

---

# Symfony Developer Portfolio

## Overview

This is a modern, multilingual developer portfolio built with Symfony, designed for easy customization and adaptation to any developer profile.

### Features

- 🌐 Multilingual support (translations directory)
- 📱 Responsive design
- 🚀 Easy customization (skills, experience, projects…)
- 📧 Integrated contact form (with email sending)
- 📝 Legal notice and privacy policy pages
- 🔒 Symfony security best practices
- 🗂️ Clear code and template organization (Twig)[1]

### Customization

#### 1. **Personal information**

Edit:  
- `src/Service/PortfolioService.php`  
  - **Skills**: update `getSkills()`
  - **Experience**: update `getExperiences()`
  - **Education**: update `getEducations()`
  - **Personal details**: update `getPersonalInfo()`

#### 2. **Contact and personal details**

Edit:  
- `src/Controller/HomeController.php`  
  - Configure email sending (`EmailService`)
  - Set birthdate for age calculation (if displayed)

#### 3. **Legal and compliance**

Edit:  
- `templates/home/legal_notice.html.twig`  
  - Your personal/business info, SIRET, address, etc.
  - Adapt legal terms to your situation

#### 4. **SEO and webmaster configuration**

- `public/robots.txt`: crawling/indexing rules
- `public/sitemap.xml`: update URLs and pages

#### 5. **Translations**

All multilingual content is in `translations/`:
- `messages.fr.yaml`: French
- `messages.en.yaml`: English
- Add more languages as needed

---

## Setup Instructions

### Prerequisites

- PHP 8.1+
- Composer
- Symfony CLI

### Installation

```bash
git clone https://github.com/sgrosrey/developer-portfolio.git
cd developer-portfolio
composer install
```

- Configure your environment variables in `.env` (copy from `.env.example` if needed)
- Start the development server:
```bash
symfony server:start
```

---

## Deployment

- Deployable on any modern PHP/Symfony hosting
- Ensure all environment variables are properly set in production

---

## Contributing

- Fork and adapt for your own use
- Pull requests are welcome!

---

## License

This project is licensed under the MIT License.

---

## Useful resources

- [Symfony Documentation](https://symfony.com/doc/current/index.html)[10]
- [Twig Templates Guide](https://symfony.com/doc/current/templates.html)[1]
- [Portfolio Symfony Example](https://jeremygrimont.fr/projet/6)[11]

---

**This project is designed as a professional, easily customizable base, following Symfony best practices.**  
For questions or suggestions, feel free to open an issue or pull request!