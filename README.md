<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Documentation de l'API de Gestion des Employés et Services

Bienvenue dans la documentation de l'API de Gestion des Employés et Services.  
Cette API fournit des endpoints pour
gérer les employés et les services au sein d'une entreprise.

## Introduction

Cette API permet aux développeurs d'accéder aux fonctionnalités suivantes :

- Créer, lire, mettre à jour et supprimer des employés.
- Créer, lire, mettre à jour et supprimer des services offerts par l'entreprise.
- Assigner des employés à des services.

## Endpoints

### Employés

Récupère la liste de tous les employés :

#### `GET /api/employer`

```http
GET /api/employer
Accept: application/json
```

Exemple de réponse :

```json
{
    "data": [
        {
            "id": 1,
            "matricule": "lfNp1ET",
            "prenom": "Dominique",
            "nom": "Faure",
            "tel": "+33 (0)4 35 93 07 82",
            "email": "gomez.juliette@example.com",
            "salaire": 462,
            "dateNaiss": "1992-09-26",
            "service_id": 1,
            "service": {
                "id": 1,
                "libelle": "Gestion de bases de données"
            }
        },
        {
            "id": 2,
            "matricule": "6YCHdgW",
            "prenom": "Amélie",
            "nom": "Brun",
            "tel": "0914275784",
            "email": "timothee46@example.com",
            "salaire": 354,
            "dateNaiss": "1997-11-09",
            "service_id": 1,
            "service": {
                "id": 1,
                "libelle": "Gestion de bases de données"
            }
        }
    ]
}
```

Crée un nouvel employé :

#### `POST /api/employer`

```http
POST /api/employer
Content-Type: application/json

{
  "matricule": 12345,
  "prenom": "John",
  "nom": "Doe",
  "tel": "123456789",
  "email": "john.doe@example.com",
  "salaire": 50000,
  "dateNaiss": "1990-01-01",
  "service_id": 1
}
```

Exemple de réponse :

```json
{
    "data": {
        "id": 3,
        "matricule": 12345,
        "prenom": "John",
        "nom": "Doe",
        "tel": "123456789",
        "email": "john.doe@example.com",
        "salaire": 50000,
        "dateNaiss": "1990-01-01",
        "service_id": 1
    }
}
```

Récupère les informations d'un employé spécifique par son ID :

#### `GET /api/employer/{id}`

```http
GET /api/employer/3
Accept: application/json
```

Exemple de réponse :

```json
{
    "data": {
        "id": 3,
        "matricule": 12345,
        "prenom": "John",
        "nom": "Doe",
        "tel": "123456789",
        "email": "john.doe@example.com",
        "salaire": 50000,
        "dateNaiss": "1990-01-01",
        "service_id": 1
    }
}
```

Met à jour les informations d'un employé spécifique par son ID :

#### `PATCH /api/employer/{id}`

```http
PATCH /api/employer/3
Content-Type: application/json

{
  "matricule": 12345,
  "prenom": "lamine",
  "nom": "diallo",
  "tel": "123456789",
  "email": "lamine.diallo@example.com",
  "salaire": 50000,
  "dateNaiss": "1990-01-01",
  "service_id": 3
}
```

Exemple de réponse :

```json
{
    "data": {
        "id": 3,
        "matricule": 12345,
        "prenom": "lamine",
        "nom": "diallo",
        "tel": "123456789",
        "email": "lamine.diallo@example.com",
        "salaire": 50000,
        "dateNaiss": "1990-01-01",
        "service_id": 3
    }
}
```

Supprime un employé spécifique par son ID :

#### `DELETE /api/employer/{id}`

```http
DELETE /api/employer/3
```

Exemple de réponse :

```json
"Employé supprimé avec succès"
```

### Services

Récupère la liste de tous les services disponibles :

#### `GET /api/service`

```http
GET /api/service
Accept: application/json
```

Exemple de réponse :

```json
{
    "data": [
        {
            "id": 1,
            "libelle": "Gestion de bases de données"
        },
        {
            "id": 2,
            "libelle": "Développement d'applications mobiles"
        },
        {
            "id": 3,
            "libelle": "Réseaux informatiques"
        },
        {
            "id": 4,
            "libelle": "Développement Web"
        }
    ]
}
```

Crée un nouveau service :

#### `POST /api/service`

```http
POST /api/service
Content-Type: application/json

{
  "libelle": "Pédiatrie"
}
```

Exemple de réponse :

```json
{
    "data": {
        "id": 5,
        "libelle": "Pédiatrie"
    }
}
```

Récupère les informations d'un service spécifique par son ID :

#### `GET /api/service/{id}`

```http
GET /api/service/5
Accept: application/json
```

Exemple de réponse :

```json
{
    "data": {
        "id": 5,
        "libelle": "Pédiatrie"
    }
}
```

Met à jour les informations d'un service spécifique par son ID :

#### `PATCH /api/service/{id}`

```http
PATCH /api/service/5
Content-Type: application/json

{
  "libelle": "Chirurgie"
}
```

Exemple de réponse :

```json
{
    "data": {
        "id": 5,
        "libelle": "Chirurgie"
    }
}
```

Supprime un service spécifique par son ID :

#### `DELETE /api/service/{id}`

```http
DELETE /api/service/5
```

Exemple de réponse :

```json
"Service supprimé avec succès"
```

## Réponses

Les réponses de l'API sont au format JSON et suivent la structure suivante :

```json
{
    "data": {}
}
```

En cas d'erreur, la réponse suivra cette structure :

```json
{
    "error": "Message d'erreur"
}
```

## Exemples de Code

### JavaScript

```js
// Exemple de requête pour lister les employés
fetch('http://localhost:8000/api/employer')
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.error(error));
```

---

## Contribution au Projet

Nous accueillons les contributions à notre projet ! Si vous souhaitez contribuer, veuillez suivre ces étapes simples :

1. **Fork du Projet :**  
   Cliquez sur le bouton **`Fork`** en haut de la page du dépôt pour créer une copie de notre projet sur votre compte
   GitHub.


2. **Clonage du Projet :**  
   Clonez votre fork du projet sur votre machine locale.

```bash
git clone https://github.com/LamineGitHub/DevTeamConnectApi.git
```

3. **Création d'une Branche :**  
   Créez une branche pour votre contribution :

```bash
git checkout -b nouvelle-fonctionnalite
```

4. **Effectuer les Modifications :**  
   Faites les modifications nécessaires dans le code, en suivant les conventions de codage du projet.


5. **Validation des Modifications :**  
   Avant de soumettre, assurez-vous que votre code fonctionne correctement.


6. **Commit des Modifications :**  
   Ajoutez vos modifications à l'index et créez un commit :

```bash
git add .
git commit -m "Ajout de la nouvelle fonctionnalité"
```

7. **Push des Modifications :**  
   Poussez vos modifications vers votre fork sur GitHub :

````bash
git push origin nouvelle-fonctionnalite
````

8. **Création d'une Pull Request (PR) :**

- Rendez-vous sur la page de votre fork sur GitHub.
- Cliquez sur le bouton **`Compare & pull request`** à côté de la branche que vous venez de pousser.
- Remplissez le formulaire de la Pull Request avec les détails pertinents.
- Cliquez sur **`Create pull request`** pour ouvrir la PR.

9. **Attente de la Revue :**

- Votre PR sera examinée par les contributeurs du projet.
- Soyez prêt à apporter des modifications en fonction des retours, si nécessaire.

10. **Fusion de la PR :**

- Une fois que votre PR est approuvée, elle sera fusionnée dans la branche principale du projet.

11. **Synchronisation avec la Branche Principale (Optionnel) :**

- Pour maintenir votre fork à jour avec les dernières modifications de la branche principale :

```bash
  git checkout main
  git pull upstream main
  git push origin main
```

Merci pour votre Contribution !

Votre contribution aide à améliorer notre projet pour tout le monde.
