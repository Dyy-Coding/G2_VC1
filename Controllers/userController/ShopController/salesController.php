<?php

class SalesController extends BaseController {

    public function sales() {
        $this->renderAuthView('userView/shop/salesMaterial');
    }
}