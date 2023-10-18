API : Documentation

Get /users.php : 
si la requête est réussie --> renvoie tous les users 

Exemple de résultat attendu : 

[
    {"id":2,"name":"Anthony","email":"anthony.charreyron@etu.imt-nord-europe.fr"},{"id":4,"name":"fifi","email":"fifi@disney.com"},{"id":5,"name":"loulou","email":"loulou@disney.com"},{"id":6,"name":"Ad\u00e8le","email":"adele.patarot@etu.imt-nord-europe.fr"},{"id":7,"name":"clipsapso","email":"clipsapso@poney.com"},{"id":8,"name":"aladin","email":"aladin@leroidesvoleurs.com"},{"id":13,"name":"riri","email":"riri@disney.com"},{"id":15,"name":"hello","email":"hello@world.com"},{"id":16,"name":"luc","email":"luc.fabresse@idaw.aled"},{"id":17,"name":"boloss","email":"cestAnthony@leboloss.fr"},{"id":21,"name":"test4","email":"essai@try.com"}
]


Get /users.php /:id : 
si la requête est réussie --> lit un seul user grâce à un id (code 200 requête executée)
sinon : ereur 404 --> le user n'est pas trouvé 

Exemple de résultat attendu :

[
    {
        "id": 2,
        "name": "Anthony",
        "email": "anthony.charreyron@etu.imt-nord-europe.fr"
    }
]


Post : 
si la requête est réussie --> renvoie l'id du user ajouté (code 201 bine créé)
sinon : code 500 --> erreur interne au serveur : problème lors de la création de l'utilisateur

Exemple de résultat attendu :

{
    "id": "22"
}


Put : 
si la requête est réussie --> renvoie le nom et le mail modifiés (code 200 requête executée)
sinon code 404 --> l'utilisateur à update n'a pas été trouvé 
si il les paramètres ne sont pas entrés : code 400 --> bad request : paramètres invalides 

Exemple de résultat attendu :

{
    "name": "test3",
    "email": "essai@try.com"
}


Delete : 
si la requête est réussie --> renvoie "Utilisateur supprime avec succes" (code 200 requête executée)
code 404 --> l'utilisateur n'a pas été trouvé 
si il les paramètres ne sont pas entrés : code 400 --> bad request : paramètres invalides 

{"message":"Utilisateur supprime avec succes"}