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
    nom_plat VARCHAR(255) NOT NULL,
    sprite VARCHAR(255) NOT NULL
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
    ('fromage', 'cheese.png'),
    ('laitue', 'lettuce.png');     -- Nouvel ingrédient ajouté

-- Insertion des données dans la table Plat
INSERT INTO Plat (nom_plat, sprite) VALUES ('Pizza', 'pizza.png');
INSERT INTO Plat (nom_plat, sprite) VALUES ('Salade', 'salade.png');
INSERT INTO Plat (nom_plat, sprite) VALUES ('Spaghetti', 'spaghetti.png');  -- Nouveau plat ajouté

-- Insertion des données dans la table Plat_ingredient
INSERT INTO Plat_ingredient (id_plat, id_ingredient) VALUES
(1, 1), -- Pizza contient Poulet
(1, 2), -- Pizza contient Fromage
(1, 5), -- Pizza contient Laitue
(2, 3), -- Salade contient Carrot
(2, 4), -- Salade contient Banane
(2, 5), -- Salade contient Laitue
(3, 1), -- Spaghetti contient Banane
(3, 2), -- Spaghetti contient Poulet
(3, 3), -- Spaghetti contient Carrot
(3, 4); -- Spaghetti contient Fromage



-- Création de la table Commande
CREATE TABLE Commande (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_client VARCHAR(100),
    statut INT
);

-- Création de la table de liaison Commande_Plat
CREATE TABLE Commande_Plat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_commande INT,
    id_plat INT,
    FOREIGN KEY (id_commande) REFERENCES Commande(id),
    FOREIGN KEY (id_plat) REFERENCES Plat(id)
);

-- Insertion de trois commandes (exemples)
INSERT INTO Commande (id_client, statut) VALUES (1, '0'); -- Commande 1 par Client1
INSERT INTO Commande (id_client, statut) VALUES (2, '0'); -- Commande 2 par Client2
INSERT INTO Commande (id_client, statut) VALUES (3, '0'); -- Commande 3 par Client3

-- Insertion de plats dans les commandes (exemples)
INSERT INTO Commande_Plat (id_commande, id_plat) VALUES (1, 1);  -- Plat Pizza dans la commande 1
INSERT INTO Commande_Plat (id_commande, id_plat) VALUES (1, 1);  -- Plat Salade dans la commande 1
INSERT INTO Commande_Plat (id_commande, id_plat) VALUES (2, 3);  -- Plat Salade dans la commande 2
INSERT INTO Commande_Plat (id_commande, id_plat) VALUES (3, 2);  -- Plat Spaghetti dans la commande 3
INSERT INTO Commande_Plat (id_commande, id_plat) VALUES (3, 3);  -- Plat Spaghetti dans la commande 3
