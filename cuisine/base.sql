create database cuisine;
use cuisine;

create table ingredients (
    id int auto_increment primary key,
    nom varchar(255),
    sprite varchar(255) not null
);

CREATE TABLE Plat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_plat VARCHAR(255) NOT NULL
);

CREATE TABLE Plat_ingredient (
    id INT AUTO_INCREMENT PRIMARY KEY,  -- Clé primaire unique pour chaque relation
    id_plat INT,
    id_ingredient INT,
    FOREIGN KEY (id_plat) REFERENCES Plat(id),
    FOREIGN KEY (id_ingredient) REFERENCES ingredients(id)
);

insert into ingredients (nom, sprite) values
    ('banane', 'banana.png'),
    ('poulet', 'poulet.png'),
    ('carrot', 'carrot.png'),
    ('fromage', 'cheese.png');



INSERT INTO Plat (nom_plat) VALUES ('Pizza');
INSERT INTO Plat (nom_plat) VALUES ('Salade');
INSERT INTO Plat (nom_plat) VALUES ('MItiaBeloha');


INSERT INTO ingredients (nom) VALUES ('Poulet'), ('Fromage');


INSERT INTO Plat_ingredient (id_plat, id_ingredient) VALUES
(1, 1), -- Pizza contient Poulet
(1, 2); -- Pizza contient Fromage

