<?php

class UserController extends BaseController {

    public function index() {
        $this->view('users/user');
    }
    public function register() {
        $this->view('users/register');
    }

    public function login() {
        $this->view('users/login');
    }
}