<?php

class InventoryController extends BaseController {

    public function inventory() {
        $this->renderView('inventory/stock');
    }
}