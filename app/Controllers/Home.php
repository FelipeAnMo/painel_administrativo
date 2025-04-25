<?php

define('URLROOT', 'http://localhost:8000');

class Home extends Controller
{
    public function index() {
        session_start();
        if(empty($_SESSION['user'])) {
            header('Location: ' . URLROOT . '/Home/login');
            exit;
        }

        $this->view('index');
    }

    public function login() {
        session_start();
        if(!empty($_SESSION['user'])) {
            header('Location: ' . URLROOT . '/Home/index');
            exit;
        }
        
        $this->view('login');
    }

    public function authenticate() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $senha = $_POST['senha'] ?? '';
    
            $userModel = $this->model('User');
            $user = $userModel->authenticate($email, $senha);
    
            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                header('Location: ' . URLROOT . '/home/index');
                exit;
            } else {
                $data['error_message'] = 'E-mail ou senha incorretos.';
                $this->view('login', $data);
            }
        } else {
            header('Location: ' . URLROOT . '/login');
            exit;
        }
    }    

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ' . URLROOT . '/Home/login');
        exit;
    }

    public function alunos() {
        $alunoModel = $this->model('Aluno');
    
        $nome = isset($_GET['nome']) ? trim($_GET['nome']) : '';
        $email = isset($_GET['email']) ? trim($_GET['email']) : '';
    
        $alunos = $alunoModel->buscarAlunos($nome, $email);
    
        $data['alunos'] = $alunos;
    
        $this->view('alunos', $data);
    }

    public function alunosAdd() {
        $alunoModel = $this->model('Aluno');
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = trim($_POST['nome']);
            $email = trim($_POST['email']);
            $data_nascimento = trim($_POST['data_nascimento']);
    
            $alunoModel->adicionarAluno($nome, $email, $data_nascimento);

            header('Location: ' . URLROOT . '/Home/alunos');
            exit;
        } else {
            $this->view('alunosAdd');
        }
    }

    public function alunosRemove($id = null) {
        if ($id !== null) {
            $alunoModel = $this->model('Aluno');
            $alunoModel->removerAluno($id);
        }
    
        header('Location: ' . URLROOT . '/Home/alunos');
        exit;
    }

    public function alunosEdit($id = null) {
        $alunoModel = $this->model('Aluno');
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = trim($_POST['nome']);
            $email = trim($_POST['email']);
            $data_nascimento = trim($_POST['data_nascimento']);
    
            $alunoModel->atualizarAluno($id, $nome, $email, $data_nascimento);
    
            header('Location: ' . URLROOT . '/Home/alunos');
            exit;
        } else {
            $aluno = $alunoModel->buscarAlunoPorId($id);
            $data['aluno'] = $aluno;
    
            $this->view('alunosEdit', $data);
        }
    }

    public function matriculas()
    {
        $matriculaModel = $this->model('Matricula');
        $data['matriculas'] = $matriculaModel->listarMatriculas();
        $this->view('matriculas', $data);
    }

    public function matriculasAdd()
    {
        $matriculaModel = $this->model('Matricula');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $aluno_id = $_POST['aluno_id'] ?? null;
            $curso_id = $_POST['curso_id'] ?? null;

            if ($aluno_id && $curso_id) {
                $matriculaModel->adicionarMatricula($aluno_id, $curso_id);
                header("Location: " . URLROOT . "/Home/matriculas");
                exit;
            } else {
                $data['error'] = "Selecione um aluno e um curso.";
            }
        }

        $data['alunos'] = $matriculaModel->listarAlunos();
        $data['cursos'] = $matriculaModel->listarCursos();

        $this->view('matriculasAdd', $data);
    }

    public function cursos()
    {
        $cursoModel = $this->model('Curso');

        $data['cursos'] = $cursoModel->listarCursos();

        $this->view('cursos', $data);
    }

    public function cursosAdd()
    {
        $cursoModel = $this->model('Curso');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = trim($_POST['titulo']);
            $descricao = trim($_POST['descricao']);

            if (empty($titulo) || empty($descricao)) {
                $data['error'] = "Preencha todos os campos obrigatórios.";
                $this->view('cursosAdd', $data);
                return;
            }

            $cursoModel->adicionarCurso($titulo, $descricao);
            header('Location: ' . URLROOT . '/Home/cursos');
            exit;
        }

        $this->view('cursosAdd');
    }

    public function cursosRemove($id)
    {
        $cursoModel = $this->model('Curso');
        
        if ($cursoModel->deletarCurso($id)) {
            header('Location: ' . URLROOT . '/Home/cursos');
            exit;
        } else {
            echo "Erro ao deletar o curso.";
        }
    }

    public function cursosEdit($id)
    {
        $cursoModel = $this->model('Curso');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = trim($_POST['titulo']);
            $descricao = trim($_POST['descricao']);

            if (empty($titulo) || empty($descricao)) {
                $data['error'] = "Preencha todos os campos obrigatórios.";
                $data['curso'] = ['id' => $id, 'titulo' => $titulo, 'descricao' => $descricao];
                $this->view('cursosEdit', $data);
                return;
            }

            $cursoModel->atualizarCurso($id, $titulo, $descricao);
            header('Location: ' . URLROOT . '/Home/cursos');
            exit;
        }

        $curso = $cursoModel->buscarCursoPorId($id);

        if ($curso) {
            $data['curso'] = $curso;
            $this->view('cursosEdit', $data);
        } else {
            echo "Curso não encontrado.";
        }
    }
}

?>