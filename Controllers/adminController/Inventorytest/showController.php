<?php 

class ShowController extends BaseController {
    private $productShow;

    // private function __construct() {
    //     $this-productShow
    // }
    public function productShow(){
        $this->productShow->renderAuthView("adminView/invemtories/productshow");
    }
}