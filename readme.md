# Ref Prog Web - Portfolio

![Logo BTS SIO](/assets/Logo_BTS-SIO_850-200.png)

-----

## Contexte

Ce portfolio est un travail pratique réalisé dans le cadre du cours de Référencement et Programmation Web en BTS SIO au lycée Paul Louis Courier. L'objectif de ce projet est de concevoir un site web dynamique en exploitant les fonctionnalités de PHP (variables, boucles, conditions, inclusions).

-----

## Structure du projet

```text
.
├── assets/
└── public/
    ├── assets/
    ├── data/
    ├── includes/
    └── vues/
```

  * **`assets/`** : Contient les ressources globales liées au dépôt Git (comme les images pour le README).
  * **`public/`** : Dossier racine du serveur web. Il contient le point d'entrée principal (`index.php`) et la configuration globale.
  * **`public/assets/`** : Regroupe les fichiers statiques du site internet (feuilles de style CSS, images, etc.).
  * **`public/data/`** : Stocke les sources de données brutes, notamment au format JSON (ex: la liste des projets).
  * **`public/includes/`** : Contient les fragments de code PHP réutilisables sur plusieurs pages, tels que l'en-tête (`header.php`) et le pied de page (`footer.php`).
  * **`public/vues/`** : Héberge les scripts PHP correspondant aux différentes pages du site (CV, projets, contact).

-----

## Utiliser le projet

*💡 Pour tester ce projet localement, nous utilisons Docker afin d'isoler l'environnement serveur (Apache et PHP 8.2).*

1.  **Cloner le dépôt localement :**

```bash
git clone <URL_DU_DEPOT>
cd <NOM_DU_DOSSIER>
```

  * `git clone` : Cette commande permet de copier l'intégralité du code source depuis le serveur distant (GitHub) vers votre ordinateur.
  * `cd` : (*Change Directory*) Permet de se déplacer dans le dossier fraîchement téléchargé.

2.  **Démarrer l'environnement avec Docker :**

```bash
docker compose up -d
```

  * `docker compose up` : Lit le fichier `docker-compose.yaml` pour télécharger l'image PHP/Apache, configurer les volumes, exposer le port 80 et lancer le conteneur `portfolio-web-dev`.
  * `-d` : (*Detached mode*) Exécute le conteneur en arrière-plan, ce qui vous permet de continuer à utiliser votre terminal.

3.  **Accéder au site :**
    Ouvrez votre navigateur et accédez à l'adresse : `http://localhost`.

-----

## Avancement

  - [x] Design responsive et intégration CSS
  - [x] Mise en place de l'architecture PHP (Inclusions Header/Footer)
  - [x] Page : Présentation personnelle
  - [x] Page : Présentation de la formation BTS SIO
  - [ ] Page : Curriculum Vitae dynamique (génération via tableaux)
  - [ ] Page : Galerie des projets (lecture et traitement depuis un fichier JSON)
  - [ ] Page : Formulaire de contact fonctionnel

-----

## Mainteneurs

**Louis MEDO** | [Linkedin](https://www.linkedin.com/in/louismedo/) | [Portfolio](https://louis.loutik.fr/) | [GitHub](https://github.com/FireToak)

---

<div align="center">
  <br/>
  <small><i>Dernière mise à jour : 21 mars 2026</i></small>
</div>