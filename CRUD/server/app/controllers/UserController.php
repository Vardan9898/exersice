<?php
    require_once '../models/User.php';
    class UserController {
        public function index() {
            $users = new User();
            return $users->get();
        }
        public function destroy($id) {
            $users = new User();
            return $users->delete($id);
        }
        public function updateUser($id, $name) {
            $users = new User();
            return $users->update($id, $name);
        }
        public function store($name) {
            $users = new User();
            return $users->create($name);
        }
    }
