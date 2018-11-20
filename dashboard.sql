create table status_p(
    id_status int,
    nom_status varchar(50),
    CONSTRAINT pk_status PRIMARY KEY (id_status)
)

create table player(
    id_player int identity(1,1) not null,
    nombre varchar(80),
    mmr int,
    id_status int,
    CONSTRAINT pk_player PRIMARY key(id_player),
    CONSTRAINT fk_status FOREIGN KEY(id_status) REFERENCES status_p(id_status)
)

create table producto(
    id_producto int identity(1,1) not null,
    nombre varchar(50),
    clasificacion varchar(50),
    precio float,
    date_act date;
    CONSTRAINT pk_producto PRIMARY KEY(id_producto)
)

create table ventas(
    id_producto int,
    num_ventas int,
    date_act date not null default current_timestamp
    CONSTRAINT fk_producto FOREIGN KEY(id_producto) REFERENCES producto(id_producto)
)

create table heroe(
    id_heroe int,
    nombre varchar(50),
    tipo_heroe varchar(50),
    foto varbinary(max) not null,
    CONSTRAINT pk_heroe PRIMARY KEY(id_heroe)
)

create table stats_h(
    id_heroe int,
    dps int,
    armadura int,
    daño_base int,
    resistencia int,
    CONSTRAINT fk_stats FOREIGN KEY (id_heroe) REFERENCES heroe(id_heroe)
)

create table partida(
    id_partida int,
    id_player int,
    id_heroe int,
    fecha_partida date,
    resultado varchar(50),
    CONSTRAINT pk_partida PRIMARY KEY(id_partida),
    CONSTRAINT fk_pplayer FOREIGN KEY(id_player) REFERENCES player(id_player),
    CONSTRAINT fk_pheroe FOREIGN KEY(id_heroe) REFERENCES heroe(id_heroe)
)

CREATE table desc_partida(
    id_partida int,
    minuto int,
    epm float,
    opm float,
    apm int,
    CONSTRAINT fK_partida FOREIGN KEY(id_partida) REFERENCES partida(id_partida)
)