CREATE DATABASE alumnosDB;
USE alumnosDB;
CREATE TABLE alumnos (
  ncontrol char(11) NOT NULL,
  nombre varchar(50) DEFAULT NULL,
  especialidad int(1) DEFAULT NULL,
  grado int(1) DEFAULT NULL,
  grupo int(1) DEFAULT NULL,
  turno int(1) DEFAULT NULL,
  pasatiempo1 int(1) DEFAULT NULL,
  pasatiempo2 int(1) DEFAULT NULL,
  pasatiempo3 int(1) DEFAULT NULL,
  pasatiempo4 int(1) DEFAULT NULL,
  observaciones varchar(555) DEFAULT NULL,
  PRIMARY KEY (ncontrol)
);

CREATE TABLE usuarios (
  numusuario int(11) NOT NULL AUTO_INCREMENT,
  usuario varchar(15) DEFAULT NULL,
  password char(8) DEFAULT NULL,
  PRIMARY KEY (numusuario)
);

