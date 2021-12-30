<?php
class DB
{
    public function connect() {
        return mysqli_connect('localhost', 'root', '', 'users');
    }
}