CREATE TABLE Recetas (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(255) NOT NULL,
    Descripción TEXT,
    Ingredientes TEXT NOT NULL,
    Tiempo_estimado INT NOT NULL, -- en minutos
    Preparación TEXT NOT NULL,
    Dificultad VARCHAR(50),
    Categoría VARCHAR(100),
    Porciones INT,
    Autor VARCHAR(100),
    Fecha_creación DATE,
    Fecha_actualización DATE
);

CREATE TABLE Categorías (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL
);

CREATE TABLE Etiquetas (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL
);

CREATE TABLE Recetas_Categorías (
    Receta_ID INT,
    Categoría_ID INT,
    FOREIGN KEY (Receta_ID) REFERENCES Recetas(ID),
    FOREIGN KEY (Categoría_ID) REFERENCES Categorías(ID)
);

CREATE TABLE Recetas_Etiquetas (
    Receta_ID INT,
    Etiqueta_ID INT,
    FOREIGN KEY (Receta_ID) REFERENCES Recetas(ID),
    FOREIGN KEY (Etiqueta_ID) REFERENCES Etiquetas(ID)
);
INSERT INTO Recetas (Nombre, Descripción, Ingredientes, Tiempo_estimado, Preparación, Dificultad, Categoría, Porciones, Autor, Fecha_creación, Fecha_actualización)
VALUES 
('Tortilla de Patatas', 'Una clásica receta española.', 'Patatas, Huevos, Cebolla, Aceite de oliva, Sal', 45, '1. Pelar y cortar las patatas y cebolla. 2. Freír en aceite de oliva. 3. Batir los huevos. 4. Mezclar todo y cocinar.', 'Fácil', 'Desayunos', 4, 'Juan Pérez', '2024-05-01', '2024-05-01'),
