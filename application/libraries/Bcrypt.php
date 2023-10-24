<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'third_party/password_compat/lib/password.php';

class Bcrypt {

    public function __construct() {
        if (!function_exists('password_hash')) {
            show_error('Bcrypt requires the password hashing functions to be enabled.');
        }
    }

    public function hash($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function verify($password, $hashed_password) {
        return password_verify($password, $hashed_password);
    }
}
