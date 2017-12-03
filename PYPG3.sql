CREATE DATABASE PYPG3;

USE PYPG3;

CREATE TABLE Rol(
	PK_IDROL INT AUTO_INCREMENT,
    DescripcionRol VARCHAR(30) NOT NULL,
    CONSTRAINT PK_IDROL PRIMARY KEY(PK_IDROL)
) ENGINE=INNODB;

INSERT INTO Rol(DescripcionRol) VALUES ('Cliente'),('Proveedor');

CREATE TABLE Usuario( 
	PK_IDUsuario INT AUTO_INCREMENT,
    Correo VARCHAR(150) UNIQUE NOT NULL,
	Contrasena VARBINARY(32) NOT NULL,
	Salt VARBINARY(32) NOT NULL,
    FechaRegistro DATE NOT NULL,
	Activo BIT NOT NULL DEFAULT 1,
    IDRol INT NOT NULL,
	CONSTRAINT FK_Rol_Usuario FOREIGN KEY (IDRol) REFERENCES Rol(PK_IDROL) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT PK_Usuario PRIMARY KEY(PK_IDUsuario)
) ENGINE=INNODB;

DESCRIBE Usuario;

/*DELETE FROM Usuario WHERE PK_IDUsuario > 0;
DELETE FROM Cliente WHERE PK_IDCliente > 0;
DELETE FROM Proveedor WHERE PK_IDProveedor > 0;
SELECT * FROM Usuario;*/

CREATE TABLE Cliente(
	Nombre VARCHAR(50) NOT NULL,
    Apellido VARCHAR(50) NOT NULL,
	FechaNacimiento DATE NOT NULL,
	PK_IDCliente INT NOT NULL,
    Activo BIT NOT NULL DEFAULT 1,	
    CONSTRAINT FK_Cliente_Usuario FOREIGN KEY (PK_IDCliente) REFERENCES Usuario(PK_IDUsuario) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT PK_Cliente PRIMARY KEY(PK_IDCliente)
) ENGINE=INNODB;

#Tablas para los incidentes 
CREATE TABLE Proveedor(
	NombreEmpresa VARCHAR(100) NOT NULL,
    Activo BIT NOT NULL DEFAULT 1,
    PK_IDProveedor INT NOT NULL,
    URL VARCHAR(300) NOT NULL,
    NombrePersonaConacto VARCHAR(300),
    EmailPersonaContacto VARCHAR(150),
    CONSTRAINT FK_Proveedor_Usuario FOREIGN KEY (PK_IDProveedor) REFERENCES Usuario(PK_IDUsuario) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT PK_Proveedor PRIMARY KEY (PK_IDProveedor)
) ENGINE=INNODB;

CREATE TABLE TipoSoftware(
	PK_IDTipoSoftware INT AUTO_INCREMENT NOT NULL,
    DescripcionTipoSoftware VARCHAR(100) NOT NULL,
    CONSTRAINT PK_TipoSoftware PRIMARY KEY(PK_IDTipoSoftware)
);

INSERT INTO TipoSoftware(DescripcionTipoSoftware) VALUES ('Salud'),('Facturación'),('Educación'),('Política'),('Entretenimiento'),('Móviles'),('Diseño'),('Arquitectura'),('Otros');

CREATE TABLE Software(
	PK_IDSoftware INT AUTO_INCREMENT,
    NombreSoftware VARCHAR(45) NOT NULL,
    DescripcionSoftware VARCHAR(45) NOT NULL,
    Activo BIT NOT NULL DEFAULT 1,
    TipoSoftware INT NOT NULL,
    IDProveedor INT NOT NULL,
    CONSTRAINT PK_Software PRIMARY KEY(PK_IDSoftware),
    CONSTRAINT FK_TipoSoftware_Software FOREIGN KEY (TipoSoftware) REFERENCES TipoSoftware(PK_IDTipoSoftware) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT FK_Software_Proveedor FOREIGN KEY (IDProveedor) REFERENCES Proveedor(PK_IDProveedor) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=INNODB;



CREATE TABLE TipoIncidente(
	PK_IDTipoIncidente INT AUTO_INCREMENT,
    DescripcionTipoIncidente VARCHAR(45) NOT NULL,
    CONSTRAINT PK_TipoIncidente PRIMARY KEY(PK_IDTipoIncidente)
) ENGINE=INNODB;

INSERT INTO TipoIncidente(DescripcionTipoIncidente) VALUES ('Bug'), ('Mejora'),('Pregunta'), ('Ayuda');

CREATE TABLE EstadoIncidente(
	PK_IDEstadoIncidente INT AUTO_INCREMENT,
    DescripcionEstadoIncidente VARCHAR(45) NOT NULL,
	CONSTRAINT PK_EstadoIncidente PRIMARY KEY (PK_IDEstadoIncidente)
) ENGINE=INNODB;

INSERT INTO EstadoIncidente(DescripcionEstadoIncidente) VALUES('Abierto'), ('En Proceso'), ('Cerrado'), ('Duplicado'),('Solucionado');

CREATE TABLE Incidente(
	PK_IDIncidente INT AUTO_INCREMENT,
    NombreIncidente VARCHAR(45) NOT NULL,
    DescripcionIncidente VARCHAR(500) NOT NULL,
    EstadoIncidente INT NOT NULL,
    TipoIncidente INT NOT NULL,
    Cliente INT NOT NULL,
    Proveedor INT NOT NULL,
    CONSTRAINT FK_TipoIncidente_Incidente FOREIGN KEY (TipoIncidente) REFERENCES TipoIncidente(PK_IDTipoIncidente)  ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FK_Cliente_Incidente FOREIGN KEY (Cliente) REFERENCES Cliente(PK_IDCliente) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FK_Proveedor_Incidente FOREIGN KEY (Proveedor) REFERENCES Proveedor(PK_IDProveedor) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FK_EstadoIncidente_Incidente FOREIGN KEY (EstadoIncidente) REFERENCES EstadoIncidente(PK_IDEstadoIncidente) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT PK_Incidente PRIMARY KEY (PK_IDIncidente),
	Activo BIT NOT NULL DEFAULT 1
) ENGINE=INNODB;


CREATE TABLE Comentarios(
	PK_IDComentarios INT AUTO_INCREMENT,
    DescripcionComentario VARCHAR(300) NOT NULL,
    Incidente INT NOT NULL,
    Usuario INT,
    Activo BIT NOT NULL DEFAULT 1,
    FechaComentario DATE NOT NULL,
    CONSTRAINT FK_Incidente_Comentarios FOREIGN KEY (Incidente) REFERENCES Incidente(PK_IDIncidente) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FK_Usuario_Comentarios FOREIGN KEY (Usuario) REFERENCES Usuario(PK_IDUsuario) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT PK_IDComentarios PRIMARY KEY(PK_IDComentarios)
    
) ENGINE=INNODB;

CREATE TABLE Documentos(
	PK_IDDocumentos INT AUTO_INCREMENT,
    DescripcionDocumentos VARCHAR(45) NOT NULL,
    Documento MEDIUMBLOB NOT NULL,
    Incidente INT NOT NULL,
    Activo BIT NOT NULL DEFAULT 1,
    CONSTRAINT FK_Incidente_Documentos FOREIGN KEY (Incidente) REFERENCES Incidente(PK_IDIncidente) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT PK_Documentos PRIMARY KEY(PK_IDDocumentos)
) ENGINE=INNODB;


