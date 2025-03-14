<?php

class UserController extends BaseController {

    public function index() {
        $this->view('users/user');
    }
    public function addusers() {
        $this->view('adminView/addNewuser/adduser');
    }

    public function login() {
        $this->view('adminView/login/login');
    }
}