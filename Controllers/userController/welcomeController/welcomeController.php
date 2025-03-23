<?php

class WelcomeController extends BaseController {

    public function welcome() {
        $this->renderView('userView/welcome/welcome');
    }
}