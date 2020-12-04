CREATE TABLE maps
(
    id BIGSERIAL PRIMARY KEY NOT NULL,
    name VARCHAR(20) NOT NULL
);

INSERT INTO maps
    (name)
VALUES('Dust II');
INSERT INTO maps
    (name)
VALUES('Mirage');
INSERT INTO maps
    (name)
VALUES('Overpass');
INSERT INTO maps
    (name)
VALUES('Inferno');
INSERT INTO maps
    (name)
VALUES('Train');
INSERT INTO maps
    (name)
VALUES('Cache');
INSERT INTO maps
    (name)
VALUES('Vertigo');

CREATE TABLE teams
(

    id BIGSERIAL PRIMARY KEY NOT NULL,
    name VARCHAR(40) NOT NULL UNIQUE,
    password VARCHAR(200) NOT NULL,
    win INTEGER NOT NULL,
    defeat INTEGER NOT NULL,
    score INTEGER NOT NULL,
    excluded INTEGER NOT NULL

);

CREATE TABLE matches
(
    id BIGSERIAL NOT NULL,
    team_1 VARCHAR(40) NOT NULL,
    team_2 VARCHAR(40) NOT NULL,
    score_1 INTEGER NOT NULL,
    score_2 INTEGER NOT NULL,
    date DATE NOT NULL,
    map_1 VARCHAR(20),
    map_2 VARCHAR(20),
    map_3 VARCHAR(20)
);

CREATE TABLE players
(

    id BIGSERIAL PRIMARY KEY NOT NULL,
    name VARCHAR(40) NOT NULL,
    username VARCHAR(40) NOT NULL UNIQUE,
    password VARCHAR(200) NOT NULL,
    class VARCHAR(3) NOT NULL,
    team_id BIGINT,
    ra INTEGER NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    adm INTEGER NOT NULL,
    rank VARCHAR(20) NOT NULL,
    kill INTEGER NOT NULL,
    death INTEGER NOT NULL,
    kd NUMERIC NOT NULL,
    excluded INTEGER NOT NULL,

    FOREIGN KEY
    (team_id) REFERENCES teams
    (id)
);

    INSERT INTO players
        (name, username, password, class, team_id, ra, email, rank, adm, kill, death, kd, excluded)
    VALUES
        ('Administrador', 'Admin 4FUN', 'cXdlMTIzUVdF', '83B', null, 00000000, 'adm@adm.com.br', 'Global Elite', 1, 0, 0, 0.0, 0);
