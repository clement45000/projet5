# Boulangerie-Pâtisserie  (projet étudiant fictif)

Projet étudiant lors de ma formation developpeur web Junior au sein de la plateforme OPENCLASSROOM

Ce projet contient :
- Une page d'accueil présentation de l'entreprise
- Une page concernant les produits de l'entreprise organisés par catégorie.
- Un système de News avec la possibilité de pouvoir poster des commentaires si l'utilisateur est connecté.
- Une page permettant de situer l'entreprise avec google map
- Un formulaire de contact.
- Un système d'affichge de la météo actuelle (récupération de données de l'api openweather au format json via javascript)
- Un système d'administration des News qui permet de supprimer afficher et modifier les news ainsi que les commentaires associés
- Un système d'administration concernant l'ajout la suppression et la modification des produits de l'entreprise
- Un système d'inscription pour l'utilisateur
- Un système de connexion pour l'tulisateur
- Un système permettant à l'administrateur de se connecter.

Fabriqué avec :
- Symfony 5.1
- Php 7.2.5
- Wamp pour le server Locale
- Ovh pour l'hébergement

Configuration:
- Symfony 5.1 
- Php 7.2.5
- Projet herbergé sur Ovh
- Configuration dans le fichier .env concernant l'envoie e-mail (Pour l'hebergeur OVH) MAILER_DSN=smtp://adress_du_site:mot_de_passe_ssl0.ovh.net:587
- Concernant le css "Utilisation de Bootswatch cdn"
- Apache pack est utilisé concernant la mise en ligne 
- Pour l'autolading, utilisation de PSR-4
- Concernant les namespaces ils sont par défault.

Pour l'installation :
- Télécharger L'applicationsymfony, utilisez la version 5.1
- Configurez php pour la version 7.2.5
- Pour la bases de données un fichier un export se situe à la racine
- Configurez votre fichier.env pour la connection à la base de donées avec le nom de la bdd
- Et pour l'envoi de e-mail via l'hebergeur OVH n'oublié pas de configurer votre Mailer.

Auteur : Larpent Clément élève au sein de la plateforme Openclassromms 2020
