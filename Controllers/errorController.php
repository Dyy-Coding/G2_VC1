<?php

class ErrorController extends BaseController {

    public function error() {
        $this->renderAuthView('views/errors/404.php');
    }
}