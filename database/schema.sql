create DATABASE db_covid;
USE db_covid;

CREATE TABLE t_admin(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(60) NOT NULL,
    mdp VARCHAR(60) NOT NULL,
    UNIQUE INDEX(username,mdp)
);

CREATE TABLE t_token(
    idadmin INT,
    token VARCHAR(200) NOT NULL,
    dateexpiration DATETIME NOT NULL,
    FOREIGN KEY (idadmin) REFERENCES t_admin(id)
);

CREATE TABLE t_information(
    id INT AUTO_INCREMENT PRIMARY KEY,
    categorie VARCHAR(40) NOT NULL, -- prevention // symptome // traitement
    descri TEXT NOT NULL
);

CREATE TABLE t_statistique(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nouveaucas DECIMAL(16,2) DEFAULT 0, -- entier
    gueris DECIMAL(16, 2) DEFAULT 0, 
    deces DECIMAL(16, 2) DEFAULT 0, 
    lieu INT -- 1=mondial(autre que madagascar) // 2=madagascar
);


CREATE TABLE t_actualite (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre TEXT NOT NULL,
    evenement TEXT NOT NULL,
    dateevent DATE NOT NULL,
    lieu INT -- 1=mondial(autre que madagascar) // 2=madagascar
);
