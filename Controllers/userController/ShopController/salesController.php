<?php

class SalesController extends BaseController {

    public function sales() {
        $this->renderCustomerView('userView/shop/salesMaterial', []);
    }
}
