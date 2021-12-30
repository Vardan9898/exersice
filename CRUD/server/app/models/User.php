<?php
    class User {
        protected $conn;
        protected array $response = [];

        public function connect() {
            return mysqli_connect('localhost', 'root', '', 'users');
        }


        public function get() {
            $sql = "SELECT * FROM `users`";
            $users = mysqli_query($this->connect(), $sql);
            $response = [
                'data' => mysqli_fetch_all($users, MYSQLI_ASSOC)
            ];

            if(count($response) > 0) {
                return json_encode($response);
            }
        }


        public function delete($id) {
            $sql = "DELETE FROM `users` WHERE `id` = $id";
            $users = mysqli_query($this->connect(), $sql);
            $response = [
                'data' => []
            ];
            if(count($response) > 0) {
                return json_encode($response);
            }
        }
    public function update($id, $name) {
        $sql = "UPDATE 
                    `users` 
                SET 
                    `name` = '$name'
                WHERE `id` = $id";
        $users = mysqli_query($this->connect(), $sql);
        $response = [
            'data' => []
        ];
        if(count($response) > 0) {
            return json_encode($response);
        }
    }
        public function create($name) {
            $sql = "INSERT INTO `users` (`name`) VALUES ('$name')";
            $users = mysqli_query($this->connect(), $sql);
            $response = [
                'data' => []
            ];
            if(count($response) > 0) {
                return json_encode($response);
            }
        }
    }