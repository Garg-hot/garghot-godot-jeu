-- Création de la base de données cuisine
CREATE DATABASE cuisine;
USE cuisine;

-- Création de la table ingredients
CREATE TABLE ingredients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    sprite VARCHAR(255) NOT NULL
);

-- Création de la table Plat
CREATE TABLE Plat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_plat VARCHAR(255) NOT NULL
);

-- Création de la table Plat_ingredient
CREATE TABLE Plat_ingredient (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_plat INT,
    id_ingredient INT,
    FOREIGN KEY (id_plat) REFERENCES Plat(id),
    FOREIGN KEY (id_ingredient) REFERENCES ingredients(id)
);

-- Insertion des données dans la table ingredients
INSERT INTO ingredients (nom, sprite) VALUES
    ('banane', 'banana.png'),
    ('poulet', 'poulet.png'),
    ('carrot', 'carrot.png'),
    ('fromage', 'cheese.png');

-- Insertion des données dans la table Plat
INSERT INTO Plat (nom_plat) VALUES ('Pizza');
INSERT INTO Plat (nom_plat) VALUES ('Salade');
INSERT INTO Plat (nom_plat) VALUES ('MItiaBeloha');

-- Insertion des données dans la table Plat_ingredient
INSERT INTO Plat_ingredient (id_plat, id_ingredient) VALUES
(1, 1), -- Pizza contient Poulet
(1, 2); -- Pizza contient Fromage

-- Création de la table Clients
CREATE TABLE Clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL
);

-- Insertion des données dans la table Clients (exemples)
INSERT INTO Clients (nom) VALUES ('Client1'), ('Client2');

-- Création de la table Commande
CREATE TABLE Commande (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_client INT,
    statut VARCHAR(50) NOT NULL,
    FOREIGN KEY (id_client) REFERENCES Clients(id)
);

-- Création de la table de liaison Commande_Plat
CREATE TABLE Commande_Plat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_commande INT,
    id_plat INT,
    FOREIGN KEY (id_commande) REFERENCES Commande(id),
    FOREIGN KEY (id_plat) REFERENCES Plat(id)
);

-- Insertion d'une commande (exemple)
INSERT INTO Commande (id_client, statut) VALUES (1, 'En cours');

-- Insertion de plats dans la commande (exemples)
INSERT INTO Commande_Plat (id_commande, id_plat) VALUES (1, 1);  -- Plat Pizza dans la commande
INSERT INTO Commande_Plat (id_commande, id_plat) VALUES (1, 2);  -- Plat Salade dans la commande
