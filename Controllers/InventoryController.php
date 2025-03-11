<?php

class InventoryController extends BaseController {

    public function inventory() {
        $this->view('inventory/stock');
    }
}