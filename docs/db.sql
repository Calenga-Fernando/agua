CREATE TABLE medicao (
    id_medicao   INT          PRIMARY KEY AUTO_INCREMENT,
    registado_em DATETIME     DEFAULT CURRENT_TIMESTAMP,
    ph           FLOAT        NOT NULL,
    turbidez     FLOAT        NOT NULL,
    temperatura  FLOAT        NOT NULL,
    latitude     DECIMAL(9,6),
    longitude    DECIMAL(9,6),
    resultado    ENUM('potavel','nao_potavel') NOT NULL,
    localizacao  VARCHAR(255)
) ENGINE=InnoDB;