CREATE DATABASE hospital;

USE hospital;

CREATE TABLE unidade_de_saude(
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
	tipo VARCHAR(40) NOT NULL,
	nome VARCHAR(60) NOT NULL
);

CREATE TABLE medico(
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
	id_unidade INTEGER REFERENCES unidade_de_saude(id),
	nome VARCHAR(60) NOT NULL,
	CRM CHAR(10) UNIQUE NOT NULL,
	senha VARCHAR(60) NOT NULL,
	especialidade VARCHAR(60) NOT NULL,
	email VARCHAR(40)
);

#ALTER TABLE medico ADD email VARCHAR(40);

CREATE TABLE paciente(
	id INTEGER  AUTO_INCREMENT PRIMARY KEY,
	id_medico INTEGER NOT NULL REFERENCES medico(id),
	data_atendimento DATE,
	situacao VARCHAR(50),
	cpf VARCHAR(15) NOT NULL UNIQUE,
	nome VARCHAR(60) NOT NULL,
	nascimento DATE,
	sexo CHAR(1) CHECK(sexo IN('M','F')),
	endereco VARCHAR(60),
	cep CHAR(9),
	bairro VARCHAR(60),
	cidade VARCHAR(60),
	estado CHAR(2),
	#unidade de saúde
	id_unidade INTEGER NOT NULL REFERENCES unidade_de_saude(id),
	#Sintomas 10!
	febre BOOLEAN,
	dor_cabeca BOOLEAN,
	dor_olhos BOOLEAN,
	perda_apetite BOOLEAN,
	mancha_pele BOOLEAN,
	vomito BOOLEAN,
	tontura BOOLEAN,
	cansaco BOOLEAN,
	moleza BOOLEAN,
	dor_ossos BOOLEAN,
	#parecer.
	parecer_medico TEXT
);

#inserindo unidades médicas.
INSERT INTO unidade_de_saude VALUES(default,"Hospital Geral","Hospital Municipal Alan Turing");
INSERT INTO unidade_de_saude VALUES(default,"Posto de saude","UBS/AMA Ada Lovelace");
INSERT INTO unidade_de_saude VALUES(default,"Centro de saude","Centro de saúde Margaret Hamilton");
INSERT INTO unidade_de_saude VALUES(default,"Policlinca","Policlinca E. Moore");
INSERT INTO unidade_de_saude VALUES(default,"Hospital Especializado","Hospital Especializado Steve Jobs");
INSERT INTO unidade_de_saude VALUES(default,"Unidade Mista","Unidade mista Steve Wozniak");

#inserindo médicos.
INSERT INTO medico VALUES(default,1,"Linus Torvalds","12345","12345","Clínico Geral","dr@servidor.com.br ");
INSERT INTO medico VALUES(default,2,"Serge Brinn","12346","12345","Clínico Geral","dr@servidor.com.br ");
INSERT INTO medico VALUES(default,3,"Shigeru Miyamoto","12347","12345","Clínico Geral","dr@servidor.com.br  ");
INSERT INTO medico VALUES(default,4,"Mark Zuckerberg","12348","12345","Clínico Geral","dr@servidor.com.br");
INSERT INTO medico VALUES(default,5,"Ada Lovelace","12349","12345","Clínico Geral","dr@servidor.com.br ");
