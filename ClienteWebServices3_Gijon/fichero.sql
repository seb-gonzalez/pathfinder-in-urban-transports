create table if not exists EXCEPCIONES(
idExcepcion Integer not null AUTO_INCREMENT,
Fecha Date not null,
Hora Time not null,
Tipo varchar(200) not null,
Descripcion varchar(500) not null,
PRIMARY KEY(idExcepcion)
)ENGINE=InnoDB;


create table if not exists tipoLINEAS(
idTipoLinea varchar(10) not null,
Tipo varchar(50) not null,
PRIMARY KEY (idTipoLinea)
)ENGINE=InnoDB;



create table if not exists LINEAS (
idLinea Integer not null,
idTipoLinea varchar(10) not null,
Descripcion varchar(50) not null,
PRIMARY KEY (idLinea),
KEY lineasAjena (idTipoLinea),
FOREIGN KEY (idTipoLinea) REFERENCES tipoLINEAS (idTipoLinea) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;



create table if not exists TRAYECTOS (
idTrayecto Integer not null,
idLinea Integer not null,
Descripcion varchar(100) not null,
Sentido varchar(10) not null,
idExtremos Integer not null ,
PRIMARY KEY(idTrayecto, idLinea))ENGINE=InnoDB;




create table if not exists PARADAS (
idParada Integer not null,
Descripcion varchar(50) not null,
Lat Double Precision not null,
Lng Double Precision not null,
PRIMARY KEY(idParada))ENGINE=InnoDB;


create table if not exists EXTREMOS(
idExtremos Integer not null,
idOrigenParada Integer not null,
idDestinoParada Integer not null,
PRIMARY KEY(idExtremos),
KEY extremosAjena1 (idOrigenParada),
FOREIGN KEY (idOrigenParada) REFERENCES PARADAS (idParada) ON DELETE CASCADE ON UPDATE CASCADE,
KEY extremosAjena2 (idDestinoParada),
FOREIGN KEY (idDestinoParada) REFERENCES PARADAS (idParada) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;






create table if not exists TRAMOS (
idParada Integer not null,
idLinea Integer not null,
idTrayecto Integer not null,
Orden Integer not null,
Descripcion varchar(50) not null,
PRIMARY KEY(idParada, idLinea, idTrayecto),
KEY tramosAjena1(idParada),
FOREIGN KEY (idParada) REFERENCES PARADAS(idParada) ON DELETE CASCADE ON UPDATE CASCADE,
KEY tramosAjena2(idLinea),
FOREIGN KEY (idLinea) REFERENCES LINEAS(idLinea) ON DELETE CASCADE ON UPDATE CASCADE,
KEY tramosAjena3(idTrayecto, idLinea),
FOREIGN KEY (idTrayecto, idLinea) REFERENCES TRAYECTOS(idTrayecto, idLinea) ON DELETE CASCADE ON UPDATE CASCADE)ENGINE=InnoDB;


create table if not exists AUTOBUS (
idAutobus Integer not null,
Matricula varchar(50) not null,
Modelo varchar(50) not null,
PRIMARY KEY (idAutobus))ENGINE=InnoDB;



create table if not exists LOCALIZACION (
idAutobus Integer NOT NULL,
FechaActualizacion date NOT NULL,
HoraActualizacion time NOT NULL,
idSiguienteParada Integer not null,
Lat Double Precision not null,
Lng Double Precision not null,
PRIMARY KEY(idAutobus, FechaActualizacion, HoraActualizacion),
KEY localizacionAjena(idAutobus),
FOREIGN KEY (idAutobus) REFERENCES AUTOBUS(idAutobus) ON DELETE CASCADE ON UPDATE CASCADE,
KEY localizacionAjena2(idSiguienteParada),
FOREIGN KEY (idSiguienteParada) REFERENCES PARADAS(idParada) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;





create table if not exists POSICIONVIVA (
idAutobus Integer not null,
idLinea Integer not null,
idTrayecto Integer not null,
FechaActualizacion date not null,
HoraActualizacion time not null,
idSiguienteParada Integer not null,
Lat Double Precision not null,
Lng Double Precision not null,

PRIMARY KEY (idAutobus),
KEY posicionvivaAjena(idAutobus),
FOREIGN KEY (idAutobus) REFERENCES AUTOBUS (idAutobus) ON DELETE CASCADE ON UPDATE CASCADE,
KEY posicionvivaAjena2(idSiguienteParada),
FOREIGN KEY (idSiguienteParada) REFERENCES PARADAS (idParada) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

create table if not exists CARRERA (
idLoc Integer not null AUTO_INCREMENT,
idAutobus Integer not null,
FechaActualizacion date not null,
HoraActualizacion time not null,
idParada Integer not null,
idLinea Integer not null,
idTrayecto Integer not null,
Minutos Integer not null,
Distancia Double Precision not null,
PRIMARY KEY (idLoc),
KEY carreraAjena1(idAutobus),
FOREIGN KEY (idAutobus) REFERENCES AUTOBUS (idAutobus) ON DELETE CASCADE ON UPDATE CASCADE,
KEY carreraAjena2(idLinea),
FOREIGN KEY (idLinea) REFERENCES LINEAS (idLinea) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

commit;


