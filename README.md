# PARROT_V1
# Garage Vincent Parrot - Site Web

Ce site web est un exercice dans le cadre d'une formation pour le garage Vincent Parrot, réalisé avec les dernières technologies web.

## Technologies Utilisées

- **Front-end** :
  - HTML 5 pour l'architecture du site.
  - Bootstrap, CSS 3 pour la mise en forme.
  - JavaScript pour l'interactivité.

- **Back-end** :
  - XAMPP pour le développement local.
  - Apache, MySQL, PhpMyAdmin pour le serveur web et la base de données.
  - PHP 8.2 (PDO) pour la communication avec la base de données.

## Installation en Local

1. **XAMPP** : Téléchargez [XAMPP](https://www.apachefriends.org/index.html) (Windows, macOS, Linux).

2. **Code Source** : Clonez ou téléchargez le code source: https://github.com/Julien0927/PARROT_V1.git du site.

3. **Base de Données** : 
   - Créez une base de données nommée "garage_vincent_parrot" via PhpMyAdmin.
   - Importez la structure de la base de données à partir du fichier SQL inclus dans le code source.
   - Connexion à phpMyAdmin :
Vous devriez voir la page de connexion de phpMyAdmin. Si vous avez déjà un compte d'administrateur, entrez votre nom d'utilisateur et votre mot de passe, puis cliquez sur le bouton "Entrer".
Si c'est la première fois que vous utilisez phpMyAdmin, vous pouvez vous connecter avec les identifiants par défaut. Par exemple, pour XAMPP en local, le nom d'utilisateur est souvent "root" et le mot de passe est généralement vide. Cependant, il est fortement recommandé de définir un mot de passe sécurisé pour votre compte d'administrateur dès que possible.

Accéder à la gestion des utilisateurs :
Une fois connecté à phpMyAdmin, recherchez l'onglet "Compte utilisateurs" dans la barre de navigation supérieure. Cliquez dessus.

Créer un nouvel utilisateur :
Sur la page de gestion des utilisateurs, vous verrez une option pour "Nouvel utilisateur". Cliquez sur cette option pour créer un nouvel utilisateur.

Configurer les informations de l'utilisateur :
Fournir les informations suivantes pour créer un nouvel utilisateur :
Nom de l'utilisateur : C'est le nom que l'utilisateur utilisera pour se connecter à la base de données.
Hôte : Vous pouvez généralement laisser cette option à sa valeur par défaut, qui permet à l'utilisateur de se connecter depuis n'importe quelle adresse IP.
Mot de passe : Choisissez un mot de passe sécurisé pour l'utilisateur. Il est important de créer un mot de passe fort pour des raisons de sécurité.
Cochez l'option "Générer un mot de passe" si vous souhaitez que phpMyAdmin génère un mot de passe sécurisé pour vous.


4. **Configuration** : 
   - Assurez-vous que le fichier de configuration (pdo.php) contient les bonnes informations de connexion à la base de données.

5. **Lancement** : Ouvrez votre navigateur et accédez au site en tapant `http://localhost/PARROT_v1/index.php`.

## Tests

Utilisez les profils de connexion suivants pour tester les fonctionnalités :

- **Profil Administrateur** :
  - Email : v.parrot@parrot.fr
  - Mot de passe : ECFStudi2324

- **Profil Employé** :
  - Email : h.michel@parrot.fr
  - Mot de passe : ECFStudi2324
