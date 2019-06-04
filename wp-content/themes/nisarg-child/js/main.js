function visibilite(thingId){

    //Je definis une nouvelle variable nomme targetElement
    var targetElement;

    //J'attribut a la variable targetElement l'identifiant de l'element cliqué
    targetElement = document.getElementById(thingId) ;
    
    //Je definis une nouvelle variable nomme "content" et contenant un tableau avec les entrees "Culture" et "Sports"
    var content = ['Culture','Sports'];

    //Je definis une nouvelle variable nomme index qui feras un index du contenu de la variable "content"
    var index = content.indexOf(thingId);

    // J'ajoute a ma variable index une condition : si index est egal a 0 alors il vaut 1 sinon il vaut toujours 0
    index = index == 0 ? 1 : 0;

    //Je definis une variable otherElement qui seras l'autre element non cliqué
    var otherElement;

    //J'ajoute a ma variable otherElement l'action : récupere l'element par son identifiant, puis je lui passe en parametre
    //l'index généré par ma variable index (et vaudras donc systematiquement l'identifiant inverse à celui cliqué)
    otherElement = document.getElementById(content[index]);

    //Enfin j'execute ma condition dans laquelle : Si un premier clic et l'element ciblé à un style égal à "display:none" (visibilité = caché)
    if (targetElement.style.display == "none") {

            //Alors le contenus ciblé dans la variable "targetElement" (l'element cliqué) devient display:initial (visibilité = visible)
            targetElement.style.display = "initial" ;
            //Et le contenu l'autre element non ciblé dans la variable "otherElement" (l'élément non cliqué) devient display:none (visibilité = caché)
            otherElement.style.display = "none";
    //Sinon le nouvel element ciblé au clic: 
    } else {

            //Le contenu ciblé "targetElement" devient "display:initial" (visibilite = visible)
            targetElement.style.display = "initial" ;

            //Le contenu de l'element non ciblé devient "display:none" (visibilite = caché)
            otherElement.style.display = "none";
    }
}