<?php
class Router
{

    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    /**
     * Returns request string
     */
    private function getURI()
    {
        if(!empty(trim(substr($_SERVER['REQUEST_URI'],6),'/'))){
            return trim(substr($_SERVER['REQUEST_URI'],6),'/');
        }
    }

    public function run()
    {
        // ვკითხულობთ URI-ს
        $uri = $this->getURI();

        // ვამოწმებთ არსებობს თუ არა ასეთი რექუესტი routes.php-ში
        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                // ვსაზღვრავთ კონტროლერს, ექშნს და პარამეტრებს

                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));

                $parameters = $segments;

                // ვაერთებთ კონტროლერს
                $controllerFile = ROOT . '/controllers/' .
                    $controllerName . '.php';
               // echo $controllerFile;
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                // ვქმნით ობიექტს და ვიძახებთ მეთოდს
                $controllerObject = new $controllerName;


                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);


                if ($result != null) {
                    break;
                }
            }
        }
    }

}