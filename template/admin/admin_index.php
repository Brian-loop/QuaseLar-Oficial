<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel Administrativo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../admin/style.css">
    <script defer src="../admin/script.js"></script>
</head>

<body>
    <!-- Topbar -->
    <div class="topbar">
        <button class="toggle-btn" id="menu-toggle">☰</button>
        <h5 class="m-0">Painel Administrativo</h5>
    </div>

    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <h4>Admin Painel</h4>

            <a data-bs-toggle="collapse" href="#usuariosMenu" role="button">Gerenciar Usuários</a>
            <div class="collapse submenu" id="usuariosMenu">
                <a href="#" onclick="showSection('usuarios-cadastrar')" class="links">Cadastrar Novo Usuário</a>
                <a href="#" onclick="showSection('usuarios-listar')" class="links">Listar Usuários</a>
            </div>

            <a data-bs-toggle="collapse" href="#animaisMenu" role="button">Gerenciar Animais</a>
            <div class="collapse submenu" id="animaisMenu">
                <a href="#" onclick="showSection('animais-cadastrar')" class="links">Cadastrar Novo Animal</a>
                <a href="#" onclick="showSection('animais-listar')" class="links">Listar Animais</a>
            </div>

            <a data-bs-toggle="collapse" href="#desaparecidosMenu" role="button">Gerenciar Animais Desaparecidos</a>
            <div class="collapse submenu" id="desaparecidosMenu">
                <a href="#" onclick="showSection('desaparecidos-registrar')" class="links">Cadastrar Animal
                    Desaparecido</a>
                <a href="#" onclick="showSection('desaparecidos-listar')" class="links">Lista de Desaparecidos</a>
            </div>

            <a href="/QuaseLar-Oficial/index.php" style="background-color: rgb(202, 43, 43);">Sair</a>
        </div>

        <!-- Conteúdo -->
        <div class="content">
            <!-- HOME -->
            <div id="home" class="section active">
                <h2>Bem-vindo ao Painel Administrativo</h2>
                <p>Selecione uma das opções do menu lateral.</p>
            </div>

            <!-- CADASTRAR USUÁRIO -->
            <div id="usuarios-cadastrar" class="section">
                <h3>Cadastrar Novo Usuário</h3>
                <form class="mt-3" action="adm_cad_usuario.php" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" placeholder="Digite o nome">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Digite o email">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Telefone</label>
                            <input type="text" class="form-control" placeholder="(99) 99999-9999">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">CPF</label>
                            <input type="text" class="form-control" placeholder="Digite o CPF">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">CEP</label>
                            <input type="text" class="form-control" placeholder="Digite o CEP">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Número</label>
                            <input type="text" class="form-control" placeholder="Digite o número">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Endereço</label>
                            <input type="text" class="form-control" placeholder="Rua, número, bairro">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Senha</label>
                            <input type="password" class="form-control" placeholder="Digite a senha">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Confirmar senha</label>
                            <input type="password" class="form-control" placeholder="Confirme a senha">
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- LISTAR USUÁRIOS -->
            <div id="usuarios-listar" class="section">
                <h3>Lista de Usuários</h3>
                <div class="col-12 mx-auto border bg-white p-3"
                    style="width: 1200px; height: 500px; overflow-x: auto; overflow-y: auto;">
                    <div class="table-responsive">
                        <table class="table table-bordered border-secondary table-striped align-middle css-table">
                            <thead class="table-dark">
                                <tr class="tr-css">
                                    <th>Ações</th>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>CPF</th>
                                    <th>CEP</th>
                                    <th>Endereço</th>
                                    <th>Senha</th>
                                    <th>Data do Cadastro</th>
                                    <th>Tipo de usuario</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr-css">
                                    <td><button class="btn btn-warning btn-sm" id="btnAdminCadUsuario">Editar</button>
                                        <button class="btn btn-danger btn-sm">Excluir</button>
                                    </td>
                                    <td>1</td>
                                    <td>Mark LEonardo luis</td>
                                    <td>email@example.com</td>
                                    <td>19995667307</td>
                                    <td>23849695766</td>
                                    <td>136278922</td>
                                    <td>rua da batata 1233 vila dor Santa-barabara</td>
                                    <td>1386281736812638126381628376128736812736</td>
                                    <td>2025-10-31 14:24:15</td>
                                    <td>admin</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- ================================================================================================================== -->
                <!-- modal de alteração de usuario -->
                <div class="modal fade" id="adminModal1" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar informações do Usuário</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Fechar"></button>
                            </div>
                            <div class="modal-body">
                                <form class="mt-3">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Nome</label>
                                            <input type="text" class="form-control" placeholder="Digite o nome">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" placeholder="Digite o email">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Telefone</label>
                                            <input type="text" class="form-control" placeholder="(99) 99999-9999">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">CPF</label>
                                            <input type="text" class="form-control" placeholder="Digite o CPF">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">CEP</label>
                                            <input type="text" class="form-control" placeholder="Digite o CEP">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Número</label>
                                            <input type="text" class="form-control" placeholder="Digite o número">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Endereço</label>
                                            <input type="text" class="form-control" placeholder="Rua, número, bairro">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Senha</label>
                                            <input type="password" class="form-control" placeholder="Digite a senha">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Confirmar senha</label>
                                            <input type="password" class="form-control" placeholder="Confirme a senha">
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success">Salvar alterações</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ================================================================================================================== -->
            </div>

            <!-- CADASTRAR ANIMAIS -->
            <div id="animais-cadastrar" class="section">
                <h3>Cadastrar Novo Animal</h3>
                <form class="mt-3">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nome do Animal</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Raça</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Idade</label>
                            <div class="align-items-center d-flex">

                                <input type="number" class="form-control" style="width: 4rem;">
                                <select name="" id="" class="form-select" style="width: 8rem;">
                                    <option value="">Semanas</option>
                                    <option value="">Meses</option>
                                    <option value="">Anos</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Sexo</label>
                            <select class="form-select">
                                <option>Macho</option>
                                <option>Fêmea</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label">Espécie</label>
                            <select class="form-select">
                                <option>Cachorro</option>
                                <option>Gato</option>
                                <option>Coelho</option>
                                <option>Roedor</option>
                                <option>Répteis</option>
                                <option>Outro</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Castrado</label>
                            <select class="form-select">
                                <option>Sim</option>
                                <option>Não</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Vacinado</label>
                            <select class="form-select">
                                <option>Sim</option>
                                <option>Não</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Porte</label>
                            <select class="form-select">
                                <option>Pequeno</option>
                                <option>Médio</option>
                                <option>Grande</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <div class="card shadow-sm mt-3">
                                <div class="card-body">
                                    <h4 class="mb-3">Enviar até 5 imagens</h4>
                                    <div class="mb-3 d-flex gap-2">
                                        <input class="form-control" type="file" id="inputImagensAnimais"
                                            accept="image/*" multiple>
                                        <button type="button" class="btn btn-success" style="width: 200px;"
                                            onclick="handleImageUpload('animais')">Adicionar
                                            Imagem</button>
                                    </div>
                                    <label style="font-size: 0.785rem;">Clique no botão "Adicionar Imagem" para
                                        visualizar a
                                        imagem ou as imagens selecionada.</label>
                                    <div class="preview-container d-flex flex-wrap gap-2" id="previewAnimais"></div>
                                    <button type="button" class="btn btn-outline-secondary mt-3"
                                        onclick="resetarPreview('animais')">Limpar</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Motivo da doação</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary">Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- LISTAR ANIMAIS -->
            <div id="animais-listar" class="section">
                <h3>Lista de Animais</h3>
                <div class="col-12 mx-auto border bg-white p-3"
                    style="width: 1200px; height: 500px; overflow-x: auto; overflow-y: auto;">
                    <div class="table-responsive">
                        <table class="table table-bordered border-secondary table-striped align-middle css-table">
                            <thead class="table-dark">
                                <tr class="tr-css">
                                    <th>Ações</th>
                                    <th>ID</th>
                                    <th>Nome do Animal</th>
                                    <th>Raça</th>
                                    <th>Idade</th>
                                    <th>Semanas/Meses/Anos</th>
                                    <th>Sexo</th>
                                    <th>Castrado</th>
                                    <th>Especie</th>
                                    <th>Porte</th>
                                    <th>Vacinado</th>
                                    <th>Imagens</th>
                                    <th>Motivo da Doação</th>
                                    <th>Data do Cadastro</th>
                                    <th>Status(Ativo/Desativado)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr-css">
                                    <td><button class="btn btn-warning btn-sm" id="btnAdminCadPets">Editar</button>
                                        <button class="btn btn-danger btn-sm">Excluir</button>
                                    </td>
                                    <td>1</td>
                                    <td>Lila</td>
                                    <td>Vira-lata</td>
                                    <td>9</td>
                                    <td>Meses</td>
                                    <td>Fêmea</td>
                                    <td>Nao</td>
                                    <td>Cachorro</td>
                                    <td>Grande</td>
                                    <td>Nao</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalAnimais1">Ver Imagens</button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modalAnimais1" tabindex="-1"
                                            aria-labelledby="labelAnimais1" aria-hidden="true">
                                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="labelAnimais1">Galeria de Imagens -
                                                            Lila
                                                        </h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row g-2">
                                                            <div class="col-6 col-md-2"><img
                                                                    src="./img/Captura de tela 2025-09-02 194943.png"
                                                                    class="img-fluid rounded"></div>
                                                            <div class="col-6 col-md-2"><img src="./img/Captura2.png"
                                                                    class="img-fluid rounded"></div>
                                                            <div class="col-6 col-md-2"><img src="./img/Captura3.png"
                                                                    class="img-fluid rounded"></div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-danger"
                                                            data-bs-dismiss="modal">Fechar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Na minha rua de casa</td>
                                    <td>2025-10-31 14:24:15</td>
                                    <td>Ativo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- ================================================================================================================== -->
            <!-- modal de alteração de cadastro de pets -->
            <div class="modal fade" id="adminModal2" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-success text-white">
                            <h5 class="modal-title">Editar Cadastro de animal em doação</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Fechar"></button>
                        </div>
                        <div class="modal-body">
                            <form class="mt-3">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Nome do Animal</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Raça</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Idade</label>
                                        <div class="align-items-center d-flex">

                                            <input type="number" class="form-control" style="width: 4rem;">
                                            <select name="" id="" class="form-select" style="width: 8rem;">
                                                <option value="">Semanas</option>
                                                <option value="">Meses</option>
                                                <option value="">Anos</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Sexo</label>
                                        <select class="form-select">
                                            <option>Macho</option>
                                            <option>Fêmea</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label class="form-label">Espécie</label>
                                        <select class="form-select">
                                            <option>Cachorro</option>
                                            <option>Gato</option>
                                            <option>Coelho</option>
                                            <option>Roedor</option>
                                            <option>Répteis</option>
                                            <option>Outro</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Castrado</label>
                                        <select class="form-select">
                                            <option>Sim</option>
                                            <option>Não</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Vacinado</label>
                                        <select class="form-select">
                                            <option>Sim</option>
                                            <option>Não</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Porte</label>
                                        <select class="form-select">
                                            <option>Pequeno</option>
                                            <option>Médio</option>
                                            <option>Grande</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="card shadow-sm mt-3">
                                            <div class="card-body">
                                                <h6 class="mb-3">Imagens cadastradas</h6>

                                                <div class="preview-container d-flex flex-wrap gap-2"
                                                    id="previewAnimais">
                                                    <div class="card shadow-sm p-1" style="width: 120px;">
                                                        <img src="./img/Captura de tela 2025-09-02 194013.png"
                                                            class="img-fluid rounded" alt="">
                                                        <div class="text-center mt-1">
                                                            <small class="text-truncate d-block">nome
                                                                arquivo</small>
                                                            <button type="button"
                                                                class="btn btn-sm btn-outline-danger mt-1">Remover</button>
                                                            <button type="button"
                                                                class="btn btn-sm btn-outline-secondary mt-1">Alterar</button>

                                                        </div>
                                                    </div>

                                                </div>
                                                <button type="button" class="btn btn-outline-info mt-3">Adicionar
                                                    imagens</button>
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="margin-bottom: 2rem; margin-top: 1rem;">
                                            <label class="form-label">Motivo da doação</label>
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary">Salvar alterações</button>
                                        </div>
                                    </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- ================================================================================================================== -->

        </div>

        <!-- CADASTRAR DESAPARECIDOS -->
        <div id="desaparecidos-registrar" class="section">
            <h3>Cadastrar Animal Desaparecido</h3>
            <form class="mt-3">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nome do Animal Desaparecido</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Raça</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Idade</label>
                        <div class="align-items-center d-flex">

                            <input type="number" class="form-control" style="width: 4rem;">
                            <select name="" id="" class="form-select" style="width: 8rem;">
                                <option value="">Semanas</option>
                                <option value="">Meses</option>
                                <option value="">Anos</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Sexo</label>
                        <select class="form-select">
                            <option>Macho</option>
                            <option>Fêmea</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Espécie</label>
                        <select class="form-select">
                            <option>Cachorro</option>
                            <option>Gato</option>
                            <option>Coelho</option>
                            <option>Roedor</option>
                            <option>Répteis</option>
                            <option>Outro</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Castrado</label>
                        <select class="form-select">
                            <option>Sim</option>
                            <option>Não</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Porte</label>
                        <select class="form-select">
                            <option>Pequeno</option>
                            <option>Médio</option>
                            <option>Grande</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <div class="card shadow-sm mt-3">
                            <div class="card-body">
                                <h4 class="mb-3">Enviar até 5 imagens</h4>
                                <div class="mb-3 d-flex gap-2">
                                    <input class="form-control" type="file" id="inputImagensDesaparecidos"
                                        accept="image/*" multiple>
                                    <button type="button" class="btn btn-success" style="width: 200px;"
                                        onclick="handleImageUpload('desaparecidos')">Adicionar Imagem</button>
                                </div>
                                <label style="font-size: 0.785rem;">Clique no botão "Adicionar Imagem" para
                                    visualizar a
                                    imagem ou as imagens selecionada.</label>
                                <div class="preview-container d-flex flex-wrap gap-2" id="previewDesaparecidos">
                                </div>
                                <button type="button" class="btn btn-outline-secondary mt-3"
                                    onclick="resetarPreview('desaparecidos')">Limpar</button>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Ultima vez visto</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- LISTAR DESAPARECIDOS -->
        <div id="desaparecidos-listar" class="section">
            <h3>Lista de Animais Desaparecidos</h3>
            <div class="col-12 mx-auto border bg-white p-3"
                style="width: 1200px; height: 500px; overflow-x: auto; overflow-y: auto;">
                <div class="table-responsive">
                    <table class="table table-bordered border-secondary table-striped align-middle css-table">
                        <thead class="table-dark">
                            <tr class="tr-css">
                                <th>Ações</th>
                                <th>ID</th>
                                <th>Nome do Animal Desaparecido</th>
                                <th>Raça</th>
                                <th>Idade</th>
                                <th>Semanas/Meses/Anos</th>
                                <th>Sexo</th>
                                <th>Especie</th>
                                <th>Porte</th>
                                <th>Imagens</th>
                                <th>Ultima vez visto</th>
                                <th>Data do Cadastro</th>
                                <th>Status(Procura-se/Encontrado)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tr-css">
                                <td>
                                    <button class="btn btn-warning btn-sm" id="btnAdminCadProdurados">Editar</button>
                                    <button class="btn btn-danger btn-sm">Excluir</button>
                                </td>
                                <td>1</td>
                                <td>Rex</td>
                                <td>Vira-lata</td>
                                <td>2</td>
                                <td>Meses</td>
                                <td>Macho</td>
                                <td>Cachorro</td>
                                <td>Médio</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalDesaparecido1">Ver Imagens</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalDesaparecido1" tabindex="-1"
                                        aria-labelledby="labelDesaparecido1" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="labelDesaparecido1">Galeria de
                                                        Imagens -
                                                        Rex</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row g-2">
                                                        <div class="col-6 col-md-2"><img
                                                                src="./img/Captura de tela 2025-09-02 194013.png"
                                                                class="img-fluid rounded"></div>
                                                        <div class="col-6 col-md-2"><img src="./img/Captura2.png"
                                                                class="img-fluid rounded"></div>
                                                        <div class="col-6 col-md-2"><img src="./img/Captura3.png"
                                                                class="img-fluid rounded"></div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-danger"
                                                        data-bs-dismiss="modal">Fechar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>Problemas de saúde</td>
                                <td>2025-10-31 14:24:15</td>
                                <td>Ativo</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- ================================================================================================================== -->
        <!-- modal de alteração de cadastro de procurados -->
        <div class="modal fade" id="adminModal3" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Editar informações do animal desaparecido</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        <form class="mt-3">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nome do Animal Desaparecido</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Raça</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Idade</label>
                                    <div class="align-items-center d-flex">

                                        <input type="number" class="form-control" style="width: 4rem;">
                                        <select name="" id="" class="form-select" style="width: 8rem;">
                                            <option value="">Semanas</option>
                                            <option value="">Meses</option>
                                            <option value="">Anos</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Sexo</label>
                                    <select class="form-select">
                                        <option>Macho</option>
                                        <option>Fêmea</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Espécie</label>
                                    <select class="form-select">
                                        <option>Cachorro</option>
                                        <option>Gato</option>
                                        <option>Coelho</option>
                                        <option>Roedor</option>
                                        <option>Répteis</option>
                                        <option>Outro</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label class="form-label">Castrado</label>
                                    <select class="form-select">
                                        <option>Sim</option>
                                        <option>Não</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label class="form-label">Porte</label>
                                    <select class="form-select">
                                        <option>Pequeno</option>
                                        <option>Médio</option>
                                        <option>Grande</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <div class="card shadow-sm mt-3">
                                        <div class="card-body">
                                            <h6 class="mb-3">Imagens cadastradas</h6>

                                            <div class="preview-container d-flex flex-wrap gap-2" id="previewAnimais">
                                                <div class="card shadow-sm p-1" style="width: 120px;">
                                                    <img src="./img/Captura de tela 2025-09-02 194013.png"
                                                        class="img-fluid rounded" alt="">
                                                    <div class="text-center mt-1">
                                                        <small class="text-truncate d-block">nome
                                                            arquivo</small>
                                                        <button type="button"
                                                            class="btn btn-sm btn-outline-danger mt-1">Remover</button>
                                                        <button type="button"
                                                            class="btn btn-sm btn-outline-secondary mt-1">Alterar</button>

                                                    </div>
                                                </div>

                                            </div>
                                            <button type="button" class="btn btn-outline-info mt-3">Adicionar
                                                imagens</button>
                                        </div>
                                    </div>

                                    <div class="col-md-12" style="margin-top: 1rem; margin-bottom: 2rem;">
                                        <label class="form-label">Ultima vez visto</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary">Cadastrar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ================================================================================================================== -->

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>