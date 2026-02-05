<?php

namespace App\Core;

class Router
{

    /*
    *Permet de demarrer le router et de gerer generiquement les routes
    *@params : ----
    *@return : ----
    */
    public function run(): void
    {
        // recup le type de methode utilisé GET POST PATCH DELETE
        $reqMethod = $_SERVER['REQUEST_METHOD'];
        //on a http://localhost:8000/user/12
        //parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) -> /user/12
        //trim(/user/12, '/') va a partir de /user/12 retirer au debut et à la fin les /
        //on aura $uri = user/12
        $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        //ça va nous donner ["user", "12"]
        $segments = explode('/', $uri);

        // [0]_>user et [1]_>12
        $entity = $segments[0] ?? null;
        $id = $segments[1] ?? null;

        //si c'est vide non trouvé
        if (!$entity) {
            $this->notFound();
            return;
        }

        // On construit le namespace du controleur souhaité ici App\Controller\UserController
        $controllerClass = $this->isController($entity);

        // si la class n'existe pas non trouvé
        if (!class_exists($controllerClass)) {
            $this->notFound();
            return;
        }

        // on instancie le controlleur ex: UserController
        $controller = new $controllerClass(); //à voir si method exist prends rellement le nom d'une class seulement

        // on determine la methode à utiliser l'id est optionnel s'il est null c'est gerer
        $action = $this->isAction($reqMethod, $id);

        // https://www.php.net/manual/fr/function.method-exists.php
        if (!method_exists($controller, $action)) {
            $this->methodNotAllowed();
            return;
        }

        //si l'id existe on passe en parametre à l'action l'id sinon non
        $id ? $controller::$action((int) $id) : $controller::$action();
    }


    /*
    *Permet de construire le namespace d'un Controller
    *@params : String nom d'une entity
    *@return : String namespace du Controller correspondant à l'entity
    *ex: user _> User . Controller _> return UserController
    */    
    private function isController(string $entity): string
    {      
        return ucfirst($entity) . 'Controller';
    }


    /*
    *Permet de renvoyer l'action à faire en fonction de la methode
    *@params : String nom de la methode utiliser par la requete
             : String optionnel contenant l'id
    *@return : String le nom de l'action à réaliser
    *ex: GET 12  _>  one
    */ 
    private function isAction(string $reqMethod, ?string $id): string
    {
        return match ($reqMethod) {
            'GET'    => $id ? 'one'    : 'list',
            'POST'   => 'create',
            'PUT'  => 'update',
            'DELETE' => 'delete',
            default  => ''
        };
    }


    /*
    *Permet renvoyer une erreur 404
    *@params : ----
    *@return : ----
    *ex: { 'error': 'Not found'}
    */     
    private function notFound(): void
    {
        http_response_code(404);
        echo json_encode(['error' => 'Not found']);
    }

    /*
    *Permet renvoyer une erreur 405 si la methode en correspônd à rien du Controller
    *@params : ----
    *@return : ----
    *ex: { 'error': 'Not found'}
    */  
    private function methodNotAllowed(): void
    {
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
    }
}
