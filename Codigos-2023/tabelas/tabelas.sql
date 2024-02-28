CREATE TABLE usuario
(
    id_usu          serial NOT NULL,
    nome_usu        character varying(350) NOT NULL,
    email_usu       character varying(350) NOT NULL,
    dtnasc_usu      date NOT NULL,
    senha_usu       character varying(150) NOT NULL,
    username_usu    character varying(350) NOT NULL,
    quantmoedas_usu integer NOT NULL,
    pont_usu        integer NOT NULL,
    primeiravez_usu bool NOT NULL,
    CONSTRAINT  usuarios_pkey   PRIMARY KEY (id_usu),
    CONSTRAINT  email_unico     UNIQUE (email_usu)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

CREATE TABLE produto
(
    id_pro          serial NOT NULL,
    nome_pro        character varying(350) NOT NULL,
    preco_pro       integer NOT NULL,
    src_pro         character varying(350) NOT NULL,
    usando_pro      bool NOT NULL,
    bloqueado_pro   bool NOT NULL,
    CONSTRAINT  produtos_pkey   PRIMARY KEY (id_pro)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

CREATE TABLE administrador
(
    id_admin      serial NOT NULL,
    email_admin   character varying(350) NOT NULL,
    senha_admin   character varying(150) NOT NULL,
    CONSTRAINT  administrador_pkey   PRIMARY KEY (id_admin)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

CREATE TABLE mundo
(
    id_admin      serial NOT NULL,
    email_admin   character varying(350) NOT NULL,
    senha_admin   character varying(150) NOT NULL,
    CONSTRAINT  administrador_pkey   PRIMARY KEY (id_admin)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

SELECT * FROM usuario;
