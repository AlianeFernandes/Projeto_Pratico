CREATE DATABASE crud_market;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (login, password)
VALUES (
    'admin',
    '1234'
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL
);

INSERT INTO products (name, description, price)
VALUES (
    'Arroz',
    'Pacote 1kg',
    5.79
);

INSERT INTO products (name, description, price)
VALUES (
    'Feijão',
    'Pacote 1kg',
    6.29
);



INSERT INTO products (name, description, price)
VALUES (
    'Óleo',
    '1l',
    7.09
);

INSERT INTO products (name, description, price)
VALUES (
    'Milho para pipoca',
    'Pacote 500g',
    7.19
);

INSERT INTO products (name, description, price)
VALUES (
    'Margarina',
    'Pote 250g',
    6.39
);
