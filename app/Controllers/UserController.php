<?php
# Este é o controlador responsável  por interagir com o modelo de usuário e exibir as views relacionadas
class userController extends Controller{
    //Metodo padrão que será chamado na rota/users
    public function index() {
        //Carregar o controle de usuário
        $userModel = $this->models('User');
        //Obtem a lista de usuários do modelo
        $users = $userModel->getUsers();

        //Carrega a view 'user' passando os dados do usuario
        $this->view('userView', ['users'=>$users]);
    }
}
?>