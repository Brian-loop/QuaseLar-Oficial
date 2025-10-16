drop table fotos;

CREATE TABLE img_animal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_arquivo VARCHAR(255) NOT NULL,
    localizacao VARCHAR(255) NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `tb_adocao` (
  `id_adocao` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nome_pet` varchar(100) DEFAULT NULL,
  `raca` varchar(100) DEFAULT NULL,
  `sexo` varchar(5) DEFAULT NULL,
  `porte` enum('Pequeno','Medio','Grande') DEFAULT NULL,
  `castrado` varchar(3) DEFAULT NULL,
  `idade_valor` int(11) DEFAULT NULL,
  `idade_tipo` varchar(50) DEFAULT NULL,
  `motivo_da_adocao` text DEFAULT NULL,
  `especie` varchar(255) NOT NULL,
  `vacinado` varchar(50) DEFAULT NULL
)

drop table tb_adocao;


CREATE TABLE `tb_adocao` (
  `id_adocao` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nome_pet` varchar(100) DEFAULT NULL,
  `raca` varchar(100) DEFAULT NULL,
  `sexo` varchar(5) DEFAULT NULL,
  `porte` enum('Pequeno','Medio','Grande') DEFAULT NULL,
  `castrado` varchar(3) DEFAULT NULL,
  `idade_valor` int(11) DEFAULT NULL,
  `idade_tipo` varchar(50) DEFAULT NULL,
  `motivo_da_adocao` text DEFAULT NULL,
  `especie` varchar(255) NOT NULL,
  `vacinado` varchar(50) DEFAULT NULL
);

delete DATABASE db_quaselar;

create DATABASE db_quaselar_oficial;


use db_quaselar_oficial;


CREATE TABLE `tb_adocao` (
  `id_adocao` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nome_pet` varchar(100) DEFAULT NULL,
  `raca` varchar(100) DEFAULT NULL,
  `sexo` varchar(5) DEFAULT NULL,
  `porte` enum('Pequeno','Medio','Grande') DEFAULT NULL,
  `castrado` varchar(3) DEFAULT NULL,
  `idade_valor` int(11) DEFAULT NULL,
  `idade_tipo` varchar(50) DEFAULT NULL,
  `motivo_da_adocao` text DEFAULT NULL,
  `especie` varchar(255) NOT NULL,
  `vacinado` varchar(50) DEFAULT NULL
)

CREATE TABLE img_animal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_arquivo VARCHAR(255) NOT NULL,
    localizacao VARCHAR(255) NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE `tb_editar_perfil` (
  `id_editar_perfil` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `adicionar_numero` varchar(20) DEFAULT NULL,
  `data_nasc` datetime DEFAULT NULL
)

CREATE TABLE `tb_procurados` (
  `id_procurados` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nome_p` varchar(100) DEFAULT NULL,
  `especie_p` varchar(50) DEFAULT NULL,
  `raca_p` varchar(100) DEFAULT NULL,
  `sexo_p` varchar(5) DEFAULT NULL,
  `porte_p` enum('Pequeno','Medio','Grande') DEFAULT NULL,
  `ultima_vez_visto` varchar(255) DEFAULT NULL,
  `Idade_valor` int(11) NOT NULL,
  `idade_tipo` varchar(255) DEFAULT NULL
);

CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cep` int(8) DEFAULT NULL,
  `cpf` int(11) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
)