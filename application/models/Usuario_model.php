<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class usuario_model extends CI_Model
{

    private $table  = "usuarios";
    private $prefix = "";

    private $tipos_usuarios = array(
        1 => '',
    );

    private $views = array(
        'high_profile' => 'view_high_profile_users',
    );

    //resultados de retorno
    private $resultados = array(
        'operacao' => false,
        'mensagem' => null,
        'erro'     => null,
        'dados'    => null,
    );

    /**
     * get()
     * - Recupera os dados da tabela
     * @param $id = id específico
     * @param $view = 'view específica'
     * @param $default (true - padrão) = 'flag para incluir ou não as clausulas where que definem hierarquia'
     */
    public function get($id = null, $view = null, $p_flag = true)
    {

        if ($view == null) {
            $this->db->from($this->table);
        } else {
            $this->db->from($this->views[$view]);
        }

        $result = $this->db->get();
        return $result;
    }

    /**
     * results()
     * - Retorna os resultados armazenados no resultado de resultados
     * @param (bool) $clear = 'limpar resultados durante o processo'
     */
    private function resposta($clear = true)
    {
        $r = $this->resultados;

        if ($clear) {
            foreach ($this->resultados as $k => $v) {
                $this->resultados[$k] = null;
            }
        }

        return (object) $r;
    } //results()

    /**
     * validate_forms()
     * - Valida formulários relacionados às rotinas de insert/update do banco
     * @param $form = 'formulário a ser validado'
     */
    private function validate_forms($form = 'login')
    {

        //Variáveis
        //Regras genéricas
        $default = 'trim|required';

        //delimitadores de erros
        $this->form_validation->set_error_delimiters('<small class="col-red">', '</small>');

        //Regras
        //Regras das colunas da tabela somenta para campos editáveis
        $rules['login'] = array(
            array(array( #VARCHAR(15) NOT NULL
            'field' => 'username',
                'label' => 'Login',
                'rules' => 'min_length[5]|' . $default . (($form == 'add') ? '|is_unique[rev_usuario.login]' : null),
            )),
            array(array( #VARCHAR(60) NOT NULL
            'field' => 'password',
                'label' => 'Senha',
                'rules' => 'min_length[5]|max_length[15]' . $default,
            )),
        );

        //regras para registro de informações de primeiro login
        $rules['first-login'] = array(
            array(array( #VARCHAR(15) NOT NULL
            'field' => 'username-cad',
                'label' => 'Login',
                'rules' => 'min_length[5]|' . $default . (($form == 'add') ? '|is_unique[rev_usuario.login]' : null),
            )),
            array(array( #VARCHAR(60) NOT NULL
            'field' => 'password-cad',
                'label' => 'Senha',
                'rules' => 'min_length[5]|max_length[15]|is_equal_f()' . $default,
            )),
            array(array( #VARCHAR(60) NOT NULL
            'field' => 'password-confirmation-cad',
                'label' => 'Senha',
                'rules' => 'min_length[5]|max_length[15]' . $default,
            )),
            array(array( #VARCHAR(45) NOT NULL
            'field' => 'email-cad',
                'label' => 'Email',
                'rules' => 'min_length[5]|max_length[96]|valid_email|' . $default . (($form == 'first-login') ? '|is_unique[usuarios.email]' : null),
            )),
        );

        //configure all forma validations for specified form by parameter
        foreach ($rules[$form] as $rule) {
            $this->form_validation->set_rules($rule);
        }

        return $this->form_validation->run();

    } //forms()

    /**
     * add()
     * - Adiciona um registro a esta tabela
     * @param $options = array();
     */
    public function add()
    {

    } //add()

    /**
     * update()
     * @param $id = 'id do usuário'
     */
    public function update($id)
    {

    } //add()

    public function verificaNomeUsuario($name = '')
    {
        $this->db->where('nome', $name);
        $user = $this->get(null, null, false)->row_array();

        return (is_null($user)) ? 'false' : ($user['alterou_senha'] == 1 ? 'registered' : 'true');
    }

    /**
     * login()
     * - efetua login no sistema
     * @param (string) $profile = 'tipo de login'
     */
    public function registro()
    {

        //if( $this->validate_forms('first-login') ) {
        if (1 == 1) {
            //Procura pelos usuarios no banco
            $this->db->where(array(
                'nome' => $this->input->post('username-cad'),
                //'status' => 1 //Usuário deve estar atinvo
            ));

            $user = $this->get(null, null, true)->row_array();

            if (!empty($user) && ($user['alterou_senha'] == 0)) {
                //rotina de redefinição de senha

                $data = array(
                    'alterou_senha' => 1,
                    'email'         => $this->input->post('email-cad'),
                    'senha_net'     => sha1($this->input->post('password-cad')),
                );

                $this->db->where('nome', $this->input->post('username-cad'));
                $update = $this->db->update($this->table, $data);

                if ($update) {
                    $this->update_session($user);
                    $this->resultados['mensagem'] = 'Registro realizado com sucesso!';
                    $this->resultados['operacao'] = true;
                } else {
                    $this->resultados['mensagem'] = 'Erro ao registrar os dados, tente novamente mais tarde';
                    $this->resultados['erro']     = 'ERROR_STORE_DATA';
                }
            } else {
                $this->resultados['mensagem'] = 'Usuário ou senha incorreto(s)!';
                $this->resultados['erro']     = 'WRONG_USER_INFO';
            }
        }

        return $this->resposta();
    }

    /**
     * login()
     * - efetua login no sistema
     * @param (string) $profile = 'tipo de login'
     */
    public function login()
    {
        //Variáveis
        //$this->load->library('bcrypt');

        //Se os campos foram preenchidos e enviados corretamente
        if ($this->validate_forms('login')) {
            //if( 1 == 1 ) {

            //Procura pelos usuarios no banco
            $this->db->where(array(
                'nome' => $this->input->post('username'),
                //'status' => 1 //Usuário deve estar atinvo
            ));

            $user = $this->get(null, null, true)->row_array();

            //Existe um usuário com esse login e a senha esta correta
            if (!empty($user) && (sha1($this->input->post('password')) == $user['senha_net']) && $user['alterou_senha'] == 1) //$this->bcrypt->validate($this->input->post('senha'), $user['senha']) )
            //if( !empty($user) && ($this->input->post('password') == $user['senha']))//$this->bcrypt->validate($this->input->post('senha'), $user['senha']) )
            {
                //Define os dados de sessão do usuário
                $this->update_session($user);

                //Retorna verdadeiro
                $this->resultados['mensagem'] = 'Login realizado com sucesso!';
                $this->resultados['operacao'] = true;
            }
            //Usuario não encontrado ou ainda não alterou a senha
            else {
                if (!empty($user) && ($user['alterou_senha'] == 0)) {
                    //rotina de redefinição de senha

                    $this->resultados['mensagem'] = 'Você ainda não registrou seus dados! Clique abaixo em "Validar Usuário" e cadastre sua senha e email para acessar o sistema web!';

                    $this->resultados['erro'] = 'FIRST_LOGIN';
                } else {
                    $this->resultados['mensagem'] = 'Usuário ou senha incorreto(s)!';
                    $this->resultados['erro']     = 'WRONG_USER_INFO';
                }
            }

        }

        return $this->resposta();
    } //login()

    /**
     * logout()
     * - destroi sessão do usuário
     */
    public function logout()
    {
        $this->session->sess_destroy();
        return true;
    } //logout()

    /**
     * validate_session()
     * - valida a sessão do usuario
     * @param (array) = permissoes necessárias para a página
     */
    public function validate_session($needed_permissions)
    {
        if ($this->session->userdata('user_login') != null && $this->session->userdata('user_password') != null) {
            //tenta recuperar dados no banco
            //Procura pelos usuarios no banco

            $this->db->where(array(
                'nome' => $this->session->userdata('user_login'),
                //'status' => 1 //Usuário deve estar ativo
            ));

            $user = $this->get(null, null, false)->row_array();

            //Existe um usuário com esse login e a senha esta correta
            if (!empty($user) && $this->session->userdata('user_password') == $user['senha_net']) {

                //Atualiza dados básicos da sessão
                /*echo '<pre>';
                print_r($user);
                echo '</pre>';*/

                $this->update_session($user, 'short');

                //Se o usuário tem as permissões necessárias
                if (is_array($needed_permissions)) {
                    if (in_array($this->session->userdata('user_permissions'), $needed_permissions)) {
                        return true;
                    }

                } elseif ($this->session->userdata('user_permissions') == $needed_permissions) {
                    return true;
                }

                //Sem permissão para acessar
                else {
                    return 'NO_HAS_PERMISSIONS';
                }

                //O usuário não está logado
            } else {
                return 'NOT_LOGGED';
            }
        } else {
            return 'NOT_LOGED';
        }
    } //validate_session()

    /**
     * update_session()
     * - atualiza os dados da sessão
     * @param (array) $data = [dados da sessão]
     * @param (string) $type = 'tipo de atualização'
     */
    private function update_session($data, $type = 'all')
    {

        //Atualiza variávels de longa duração
        if ($type == 'lasting' || $type == 'all') {

            $this->session->set_userdata(array(
                'user_id'    => $data['codigo'],
                'user_login' => $data['nome'],
            ));
        }

        //Atualiza variveis de curta duração
        if ($type == 'short' || $type == 'all') {
            $this->session->set_userdata(array(
                //'user_password' => $data['senha'],
                'user_password'    => $data['senha_net'],
                //'user_permissions' => $data['tipo'],
                'user_permissions' => 1,
                'user_name'        => $data['nome'],

            ));
        }
    } //update_session()

    public function html_select($id = null)
    {
        if ($id != null) {
            $this->db->where('id !=', $id);
        }

        $paginas = $this->get(null, 'active_user')->result_array();
        $array   = array('' => '[ Nenhuma ]');
        foreach ($paginas as $p) {
            $array[$p['id']] = $p['nome'] . '(' . $p['status'] . ')';
        }
        return $array;
    }

    private function file($file = "")
    {
        //Carrega library
        $this->load->library('upload_files');
        //Define subpasta da imagem
        $this->upload_files->setSubpasta('fotos_perfil');
        //Se não foi informado o 'file'
        if ($file == "") {
            //Tenta enviar
            $send = $this->upload_files->send_file('add_foto');

            //Retorna em formato de objeto
            return (object) $send;
        } else {
            $this->upload_files->delete_file($file);
        }
    }

} //Users_model

/* End of file users_model.php */
/* Location: ./application/models/users_model.php */
