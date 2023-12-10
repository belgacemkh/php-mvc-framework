# Building a PHP MVC Framework from Scratch
In this tutorial, you will learn how to build a PHP Model-View-Controller (MVC) framework from scratch.
## Step 1: Setting up the Project
Create a new directory for your project and navigate to it using the command line:
```
mkdir php-mvc-framework
cd php-mvc-framework
```
Initialize a new Composer project:
```
composer init
```
Follow the prompts to set up your project. When asked for dependencies, leave it empty for now.
## Step 2: Creating the Directory Structure
Create the following directory structure for your project:
```
src/
    Controllers/
    Models/
    Views/
```
## Step 3: Building the Core Components Router
Create a new file named Router.php in the src/ directory. This file will contain the main routing logic for your framework.
```
<?php

namespace MVC;

class Router {
    protected $routes = [];

    public function addRoute($route, $controller, $action) {
        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    public function dispatch($uri) {
        if (array_key_exists($uri, $this->routes)) {
            $controller = $this->routes[$uri]['controller'];
            $action = $this->routes[$uri]['action'];

            $controller = new $controller();
            $controller->$action();
        } else {
            throw new \Exception("No route found for URI: $uri");
        }
    }
}
```
## Base Controller
Create a new file named Controller.php in the src/ directory. This file will contain the base controller class that all other controllers will extend.
```
<?php

namespace MVC;

class Controller {
    protected function render($view, $data = []) {
        extract($data);

        include "Views/$view.php";
    }
}
```
## Implementing an Example Application
### Creating a Model
Create a new file named User.php in the src/Models/ directory. This model will represent a user in your application.
```
<?php

namespace MVC\Models;

class User {
    public $name;
    public $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }
}
```

    
    
