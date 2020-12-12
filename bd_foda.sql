drop database if exists bdfoda;
create database bdfoda;
use bdfoda;

create table USUARIO(
    loginU varchar(30),
    nombresApellidos varchar(60),
    DNI char(8),
    direccion varchar(60),
    telefono varchar(60),
    correo varchar(60),
    contra varchar(60),
    tipo varchar(60),
    primary key(loginU)
);

create table EMPRESA(
    idEmpresa int auto_increment,
    nombreEmpresa varchar(30),
    RUC char(11),
    mision varchar(60),
    vision varchar(60),
    propuestaValor varchar(60),
    factorDiferenciador varchar(60),
    objetivo varchar(60),
    primary key(idEmpresa)
);

create table ESTRATEGIA(
    idEstrategia int auto_increment,    
    idEmpresa int,
    tipoEstrategia char(2),
    descEstrat varchar(60),
    primary key(idEstrategia, idEmpresa),
    foreign key(idEmpresa) references EMPRESA(idEmpresa)
);

create table ELEMENTO(
    idElemento int auto_increment,
    idEmpresa int,
    tipoElemento char(1),
    descElemento varchar(60),
    primary key(idElemento, idEmpresa),
    foreign key(idEmpresa) references EMPRESA(idEmpresa)
);

create table DETALLE_ESTRATEGIA(
    idEstrategia int,
    idEmpresa int,
    idElemento int,
    primary key(idEstrategia, idEmpresa, idElemento),
    foreign key(idEstrategia) references ESTRATEGIA(idEstrategia),
    foreign key(idEmpresa) references ESTRATEGIA(idEmpresa), 
    foreign key(idElemento) references ELEMENTO(idElemento)
);