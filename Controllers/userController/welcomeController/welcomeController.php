<?php

class WelcomeController extends BaseController {

    public function welcome() {
        $this->renderAuthView('userView/welcome/welcome');
    }
}