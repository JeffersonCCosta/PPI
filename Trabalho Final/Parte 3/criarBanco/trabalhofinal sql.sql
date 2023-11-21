create database meuBanco;

use meuBanco;


CREATE TABLE medicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    especialidade VARCHAR(255) NOT NULL,
    dr_dra VARCHAR(255) NOT NULL,
    nome VARCHAR(255) NOT NULL,
    sobrenome VARCHAR(255) NOT NULL,
    imagem_url VARCHAR(255) NOT NULL,
    detalhes TEXT
);

CREATE TABLE consulta (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    idade INT NOT NULL,
    sus INT NOT NULL,
    genero VARCHAR(20) NOT NULL,
    objetivo TEXT,
    exercicio ENUM('sim', 'nao'),
    alimentacao ENUM('sim', 'nao'),
    dieta_especifica VARCHAR(255),
    refeicoes_diarias INT,
    alimentos_processados VARCHAR(20),
    consumo_alcool ENUM('sim', 'nao'),
    tabagismo ENUM('sim', 'nao'),
    tipo_medico VARCHAR(20),
    data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO medicos (especialidade, dr_dra, nome, sobrenome, imagem_url, detalhes) VALUES 
('Psiquiatra', 'Drª', 'Isabela', 'Mendes', 'imagens/incone-medica.png', 'Descrição detalhada sobre o Dr. Isabela Mendes'), 
('Psiquiatra', 'Dr', 'Rodrigo', 'Costa', 'imagens/incone-medico.png', 'Descrição detalhada sobre o Dr. Rodrigo Costa'), 
('Psiquiatra', 'Drª', 'Mariana', 'Ramos', 'imagens/incone-medica.png', 'Descrição detalhada sobre a Dra. Mariana Ramos'),  

('Nutricionista', 'Dr', 'André', 'Santos', 'imagens/incone-medico.png', 'Descrição detalhada sobre o Dr. André Santos'), 
('Nutricionista', 'Drª', 'Carolina', 'Ferreira', 'imagens/incone-medica.png', 'Descrição detalhada sobre a Dra. Carolina Ferreira'), 
('Nutricionista', 'Dr', 'Luís', 'Oliveira', 'imagens/incone-medico.png', 'Descrição detalhada sobre o Dr. Luís Oliveira'),  

('Assistente Social', 'Drª', 'Sofia', 'Pereira', 'imagens/incone-medica.png', 'Descrição detalhada sobre a Dra. Sofia Pereira'), 
('Assistente Social', 'Dr', 'Felipe', 'Cardoso', 'imagens/incone-medico.png', 'Descrição detalhada sobre o Dr. Felipe Cardoso'), 
('Assistente Social', 'Drª', 'Camila', 'Silva', 'imagens/incone-medica.png', 'Descrição detalhada sobre a Dra. Camila Silva'),  

('Cardiologista', 'Dr', 'Gustavo', 'Rodrigues', 'imagens/incone-medica.png', 'Descrição detalhada sobre a Dr. Gustavo Rodrigues'), 
('Cardiologista', 'Drª', 'Laura', 'Almeida', 'imagens/incone-medica.png', 'Descrição detalhada sobre o Dra. Laura Almeida'), 
('Cardiologista', 'Dr', 'Pedro', 'Fernandes', 'imagens/incone-medica.png', 'Descrição detalhada sobre a Dr. Pedro Fernandes'),  

('Enfermeiro', 'Drª', 'Rafaela', 'Vieira', 'imagens/incone-medica.png', 'Descrição detalhada sobre a Dra. Rafaela Vieira'), 
('Enfermeiro', 'Drª', 'Helena', 'Ribeiro', 'imagens/incone-medica.png', 'Descrição detalhada sobre o Dra. Helena Ribeiro'), 
('Enfermeiro', 'Dr', 'Lucas', 'Miranda', 'imagens/incone-medico.png', 'Descrição detalhada sobre a Dr. Lucas Miranda'),  

('Terapeuta', 'Dr', 'André', 'Moreira', 'imagens/incone-medico.png', 'Descrição detalhada sobre a Dr. André Moreira'), 
('Terapeuta', 'Drª', 'Beatriz', 'Nunes', 'imagens/incone-medica.png', 'Descrição detalhada sobre o Dra. Beatriz Nunes'), 
('Terapeuta', 'Dr', 'Renato', 'Santos', 'imagens/incone-medico.png', 'Descrição detalhada sobre a Dr. Renato Santos')


