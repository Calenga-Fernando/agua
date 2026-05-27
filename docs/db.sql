/* Projecto de automação */

CREATE TABLE agua (
    id_agua INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR (255) UNIQUE NOT NULL
)ENGINE=InnoDB;

CREATE TABLE medicao (
    turbidez FLOAT NOT NULL,
    latitude DECIMAL(9,6),
    ph FLOAT NOT NULL,
    temperatura FLOAT NOT NULL,
    longitude DECIMAL(9, 6),
    localizacao VARCHAR (255),
    id_medicao INT PRIMARY KEY auto_increment,
    registado_em DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    id_agua INT NOT NULL,

    FOREIGN KEY (id_agua)
      REFERENCES agua (id_agua)
      ON DELETE RESTRICT
)ENGINE=InnoDB;