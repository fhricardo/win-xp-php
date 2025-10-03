CREATE DATABASE ecommerce;

USE ecommerce;

-- Usuários (Login)
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    senha VARCHAR(255)
);

-- Fornecedores
CREATE TABLE fornecedores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_empresa VARCHAR(100),
    cnpj VARCHAR(20),
    telefone VARCHAR(20),
    email VARCHAR(100),
    endereco VARCHAR(200)
);

-- Clientes
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    cpf VARCHAR(20),
    telefone VARCHAR(20),
    email VARCHAR(100),
    endereco VARCHAR(200)
);


-- Produtos
CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    descricao TEXT,
    preco DECIMAL(10,2),
    quantidade INT,
    fornecedor_id INT,
    FOREIGN KEY (fornecedor_id) REFERENCES fornecedores(id)
);
