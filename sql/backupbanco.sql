CREATE DATABASE IF NOT EXISTS db_quaselar_oficial;

USE db_quaselar_oficial;

CREATE TABLE tb_usuario (
    id_usuario INT(11) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255),
    email VARCHAR(255),
    telefone VARCHAR(255),
    cpf VARCHAR(14),
    cep VARCHAR(9),
    endereco VARCHAR(255),
    senha VARCHAR(255),
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('HABILITADO', 'DESABILITADO'),
    tipo_usuario ENUM('admin','usuario') DEFAULT 'usuario',
    PRIMARY KEY (id_usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE tb_adocao (
    id_adocao INT(11) NOT NULL AUTO_INCREMENT,
    id_usuario INT(11),
    nome_pet VARCHAR(255),
    raca VARCHAR(100),
    idade INT(2),
    semanas_meses_anos ENUM('Semanas', 'Meses', 'Anos'),
    sexo ENUM('Macho', 'Femea'),
    castrado ENUM('SIM', 'NAO'),
    especie ENUM('Cao', 'Gato', 'Ave', 'Peixe', 'Roedor', 'Coelho', 'Outros'),
    porte ENUM('Pequeno', 'Medio', 'Grande'),
    vacinado ENUM('SIM', 'NAO'),
    motivo_da_doacao VARCHAR(255),
    data_criacao_cad_pet TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status_cad_pet ENUM('ATIVO', 'DESATIVADO'),
    PRIMARY KEY (id_adocao),
    FOREIGN KEY (id_usuario) REFERENCES tb_usuario(id_usuario)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE tb_img_animal (
    id_img_animal INT(11) NOT NULL AUTO_INCREMENT,
    id_adocao INT(11),
    nome_arquivo VARCHAR(255),
    localizacao VARCHAR(300),
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_img_animal),
    FOREIGN KEY (id_adocao) REFERENCES tb_adocao(id_adocao)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE tb_procurados (
    id_procurados INT(11) NOT NULL AUTO_INCREMENT,
    id_usuario INT(11),
    nome_p VARCHAR(100),
    sexo_p ENUM('Macho', 'Femea'),
    idade_p INT(2),
    semanas_meses_anos_p ENUM('Semanas', 'Meses', 'Anos'),
    porte_p ENUM('Pequeno', 'Medio', 'Grande'),
    raca_p VARCHAR(100),
    especie_P VARCHAR(100),
    ultima_vez_visto VARCHAR(255),
    data_criacao_cad_p TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status_p ENUM('Procura-se', 'Encontrado'),
    PRIMARY KEY (id_procurados),
    FOREIGN KEY (id_usuario) REFERENCES tb_usuario(id_usuario)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE tb_img_procurados (
    id_img_procurados INT(11) NOT NULL AUTO_INCREMENT,
    id_procurados INT(11),
    nome_arquivo VARCHAR(255),
    localizacao VARCHAR(300),
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_img_procurados),
    FOREIGN KEY (id_procurados) REFERENCES tb_procurados(id_procurados)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- para o adm --    

UPDATE tb_usuario 
SET status = 'HABILITADO' 
WHERE status IS NULL OR status = '';

ALTER TABLE tb_usuario 
MODIFY status ENUM('HABILITADO', 'DESABILITADO') NOT NULL DEFAULT 'HABILITADO';
--=====================================================---
ALTER TABLE tb_adocao 
MODIFY status_cad_pet ENUM('ATIVO', 'DESATIVADO') NOT NULL DEFAULT 'ATIVO';



-- ALTER TABLE tb_usuario ADD COLUMN tipo_usuario ENUM('admin','usuario') DEFAULT 'usuario';
INSERT INTO tb_usuario (nome, email, senha, tipo_usuario)
VALUES ('Administrador', 'admin@site.com', 
        '$2y$10$M6I7gnw6YovWlYj0rf3X6uK2H8l.YVnXr8xK8IahRu.CtVxZ0VgQa', 
        'admin');


