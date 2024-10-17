Cette API permet d'effectuer toutes les actions du CRUD sur la base de données.

La base de données est composée de 3 types d'informations :
- les ID
- les noms
- les emails

# Récupérer les données :

On peut récupérer les données de la base par rapport aux trois informations disponibles.

Pour cela, il faut faire une requête get, en mettant dans les paramètres de cette requête les filtres que vous souhaitez appliquer.

S'il n'y a aucun paramètre dans la requête, alors toute la base de données sera envoyée dans la réponse.

Pour filtrer par nom, il faut mettre ?name=NomQueVousSouhaitezChercher dans l'url

Pour filtrer par email, il faut mettre ?email=EmailQueVousSouhaitezChercher dans l'url

Pour filtrer par id, il faut mettre ?id=IDQueVousSouhaitezChercher dans l'url


# Créer une nouvelle entrée dans la base :

Pour cela, il faut faire une requête POST, avec dans le corps de la requête les informations suivantes :

- nom
- email

La réponse d'une telle requête contiendra l'id, le nom et l'email pour vous confirmer la création d'une nouvelle entrée dans la base.


# Modifier une entrée de la base :

Pour cela, il faut faire une requête PUT, avec dans le corps de la requête les informations suivantes :

- id à modifier
- nouveau nom
- nouveau email

A savoir que si l'un des paramètres reste inchangé, vous n'êtes pas obligés de le renseigner.

La réponse contiendra les nouvelles infos pour confirmer la modification


# Supprimer une entrée de la base

Pour cela, il faut envoyer une requête DELETE, avec dans le corps de la requête l'id de l'entrée à supprimer dans la base.

La réponse contiendra le nom ainsi que l'email de l'entrée supprimée.