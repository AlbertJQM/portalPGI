CREATE TABLE personal(
    IdPersonal INT AUTO_INCREMENT NOT NULL,
    CI VARCHAR(10) NOT NULL,
    Nombre VARCHAR(25) NOT NULL,
    Paterno VARCHAR(20),
    Materno VARCHAR(20),
    Telefono VARCHAR(10) NOT NULL,
    Usuario VARCHAR(20) NOT NULL,
    Contraseña VARCHAR(20) NOT NULL,
    Rol VARCHAR(15) NOT NULL,
    
    PRIMARY KEY(IdPersonal)
)

CREATE TABLE noticia(
	IdNoticia INT AUTO_INCREMENT NOT NULL,
    IdPersonal int NOT NUll,
    Titulo VARCHAR(50) NOT NULL,
    Descripcion VARCHAR(200) NOT NULL,
    Fecha DATE NOT NULL,
    Portada VARCHAR(100),
    Archivo VARCHAR(100),
    Condicion int NOT NULL,
    
    PRIMARY KEY(IdNoticia),
    CONSTRAINT Personal_Noticia FOREIGN KEY(IdPersonal) REFERENCES personal(IdPersonal)   
)