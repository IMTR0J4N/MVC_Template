<?php

namespace MVC\App;

    abstract class Controller {
        public function loadModelManager(string $model) {
            $modelManagerPath = "MDT\Models\\".$model."Manager";

            return new $modelManagerPath;
        }

        public function render(string $path, array $data = []): void {
            extract($data);

            ob_start();

            require "../src/Views/$path.php";

            $content = ob_get_clean();

            require_once '../src/Views/layout/default.php';
        }
    }
?>