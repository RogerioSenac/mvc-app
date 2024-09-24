<?php
#Este arquivo será responsável por lidar com os dados dos usuários.

class user{
    //Simulando a obtenção de dados do usuário
    Public function getUsers(){
        //Em caso real, voê teria a conexão com o banco de dados
        return[
            ['id'=>1,'nome'=>'Joao','email'=>'joao@email.com'],
            ['id'=>2,'nome'=>'Maria','email'=>'maria@email.com'],
            ['id'=>3,'nome'=>'Rogerio','email'=>'rogerio.uol.com']
        ];
    }
}



?>