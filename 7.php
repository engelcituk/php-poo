<?php

    interface acceso {
        public function login();
        public function logout();
    }

    class Usuario implements acceso{

        public function login()
        {
            return  __CLASS__ . ' implementa la logica del login <br>';
            
        }
        public function logout()
        {
            return  __CLASS__ . ' implementa la logica del logout <br>';
            
        }
    }

$usuario = new Usuario();

echo $usuario->login();
echo $usuario->logout();

    