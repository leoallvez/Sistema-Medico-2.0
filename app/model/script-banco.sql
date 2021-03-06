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

#Atualizando nomes da cidade por estado;

UPDATE paciente SET cidade = "Rio Branco" WHERE estado = "AC" ;
UPDATE paciente SET cidade = "Maceio" WHERE estado = "AL" ;
UPDATE paciente SET cidade = "Macapa" WHERE estado = "AP" ;
UPDATE paciente SET cidade = "Manaus" WHERE estado = "AM" ;
UPDATE paciente SET cidade = "Salvador" WHERE estado = "BA" ;
UPDATE paciente SET cidade = "Fortaleza" WHERE estado = "CE" ;
UPDATE paciente SET cidade = "Brasilia" WHERE estado = "DF" ;
UPDATE paciente SET cidade = "Vitoria" WHERE estado = "ES" ;
UPDATE paciente SET cidade = "Goiania" WHERE estado = "GO" ;
UPDATE paciente SET cidade = "Sao Luis" WHERE estado = "MA" ;
UPDATE paciente SET cidade = "Cuiaba" WHERE estado = "MT";
UPDATE paciente SET cidade = "Campo Grande" WHERE estado = "MS";
UPDATE paciente SET cidade = "Belo Horizonte" WHERE estado = "MG";
UPDATE paciente SET cidade = "Belem" WHERE estado = "PA";
UPDATE paciente SET cidade = "Joao Pessoa" WHERE estado = "PB";
UPDATE paciente SET cidade = "Curitiba" WHERE estado = "PR";
UPDATE paciente SET cidade = "Recife" WHERE estado = "PE";
UPDATE paciente SET cidade = "Teresinha" WHERE estado = "PI";
UPDATE paciente SET cidade = "Rio de janeiro" WHERE estado = "RJ";
UPDATE paciente SET cidade = "Rio Grande do Norte" WHERE estado = "RN";
UPDATE paciente SET cidade = "Rio Grande do Sul" WHERE estado = "RS";
UPDATE paciente SET cidade = "Porto Velho" WHERE estado = "RO";
UPDATE paciente SET cidade = "Boa Vista" WHERE estado = "RR";
UPDATE paciente SET cidade = "Florianopolis" WHERE estado = "SC";
UPDATE paciente SET cidade = "Sao Paulo" WHERE estado = "SP";
UPDATE paciente SET cidade = "Aracaju" WHERE estado = "SE";
UPDATE paciente SET cidade = "Palmas" WHERE estado = "TO";

select distinct estado, cidade from paciente order by estado;

UPDATE paciente
SET
	id_medico = 2,
	data_atendimento = '2016/05/29',
	situacao = 'internado',
	cpf = "00000000000",
	nome = "Leo Alves",
	nascimento = '1982/09/10',
	sexo = 'M',
	endereco = 'Ruas das Peras',
	cep = '000000000',
	bairro = 'X',
	cidade = 'X',
	estado = 'SP',
	#unidade de saúde
	id_unidade = 1,
	#Sintomas 10!
	febre = 1,
	dor_cabeca = 1,
	dor_olhos = 1,
	perda_apetite = 1,
	mancha_pele = 1,
	vomito = 1,
	tontura = 1,
	cansaco = 1,
	moleza = 1,
	dor_ossos = 1,
	parecer_medico = 'Paciente extremamento doente'
WHERE
	id = 1

	delete from medico;
	delete from paciente;
	delete from unidade_de_saude;

