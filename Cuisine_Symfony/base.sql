INSERT INTO categorie (nom, slug, created_at, updated_at)  
VALUES  
('Plat principal','plat-pincipal','2025-01-30 12:00:00', '2025-01-30 12:00:00'),  
('Entree', 'entree','2025-01-30 12:00:00', '2025-01-30 12:00:00');

INSERT INTO plat (nom, slug, description, created_at, updated_at, duration, categorie_id)  
VALUES  
('Pizza Maison', 'pizza-maison', 'Une pizza avec une base de pain, garnie de sauce tomate, fromage et charcuterie.', '2025-01-30 12:00:00', '2025-01-30 12:00:00', 30, 1),  
('Pâtes Carbonara', 'pates-carbonara', 'Des pâtes crémeuses avec du fromage, de la charcuterie et un œuf.', '2025-01-30 12:15:00', '2025-01-30 12:15:00', 20, 1),  
('Riz Sauté au Porc', 'riz-saute-porc', 'Un riz sauté avec du porc, de l’oignon et de la tomate.', '2025-01-30 12:30:00', '2025-01-30 12:30:00', 25, 1),  
('Gratin de Pâtes', 'gratin-de-pates', 'Un gratin de pâtes au fromage avec de la charcuterie et un peu d’oignon.', '2025-01-30 12:45:00', '2025-01-30 12:45:00', 35, 1),  
('Soupe à l\'Oignon', 'soupe-oignon', 'Une soupe chaude préparée avec de l’oignon et du bouillon de soupe.', '2025-01-30 13:00:00', '2025-01-30 13:00:00', 40, 2),  
('Pain Perdu', 'pain-perdu', 'Du pain trempé dans un mélange d’œuf et de fromage, puis doré à la poêle.', '2025-01-30 13:15:00', '2025-01-30 13:15:00', 15, 2),  
('Salade de Riz', 'salade-de-riz', 'Une salade fraîche composée de riz, de tomate et de charcuterie.', '2025-01-30 13:30:00', '2025-01-30 13:30:00', 20, 2),  
('Omelette Fromage', 'omelette-fromage', 'Une omelette moelleuse avec du fromage et un peu de charcuterie.', '2025-01-30 13:45:00', '2025-01-30 13:45:00', 10, 2);

INSERT INTO ingredient (nom, created_at, updated_at)
VALUES 
    ('Tomate', '2025-01-30 12:00:00', '2025-01-30 12:00:00'),
    ('Pâtes', '2025-01-30 12:00:00', '2025-01-30 12:00:00'),
    ('Oignon', '2025-01-30 12:00:00', '2025-01-30 12:00:00'),
    ('Bouillon de soupe', '2025-01-30 12:00:00', '2025-01-30 12:00:00'),
    ('Fromage', '2025-01-30 12:00:00', '2025-01-30 12:00:00'),
    ('Pain', '2025-01-30 12:00:00', '2025-01-30 12:00:00'),
    ('Charcuterie', '2025-01-30 12:00:00', '2025-01-30 12:00:00'),
    ('Riz', '2025-01-30 12:00:00', '2025-01-30 12:00:00'),
    ('Porc', '2025-01-30 12:00:00', '2025-01-30 12:00:00'),
    ('Oeuf', '2025-01-30 12:00:00', '2025-01-30 12:00:00');

