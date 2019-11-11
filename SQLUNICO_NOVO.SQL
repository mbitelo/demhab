DROP DATABASE IF EXISTS PortalDemhab;

CREATE DATABASE IF NOT EXISTS PortalDemhab;

use PortalDemhab;

CREATE TABLE IF NOT EXISTS portal_aviso (
  idAviso INT(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  texto VARCHAR(500) NOT NULL,
  dataPost DATETIME NOT NULL,
  dataLimite DATETIME NOT NULL,
  CONSTRAINT pk_aviso PRIMARY key (idAviso)
);

CREATE TABLE IF NOT EXISTS portal_log (
  idLog INT(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  computador VARCHAR(30) NOT NULL,
  ip VARCHAR(20) NOT NULL,
  dataHora DATETIME NOT NULL,
  pagina VARCHAR(50) NOT NULL,
  acao VARCHAR(100),
  CONSTRAINT pk_log PRIMARY key (idLog)
);

CREATE TABLE IF NOT EXISTS demhab_regime(
  idReg INT(1) UNSIGNED ZEROFILL NOT NULL,
  descReg VARCHAR(20) NOT NULL,
  CONSTRAINT pk_regime PRIMARY KEY (idReg)
);

CREATE TABLE IF NOT EXISTS demhab_setor(
  idSetor INT(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  nomeSetor VARCHAR(15) NOT NULL,
  CONSTRAINT pk_setor PRIMARY KEY (idSetor)
);

CREATE TABLE IF NOT EXISTS demhab_servidor(
  idServ INT(3) UNSIGNED ZEROFILL NOT NULL,
  nomeServ VARCHAR(25) NOT NULL,
  sobrenomeServ VARCHAR(100) NOT NULL,
  txtJur VARCHAR(15) NOT NULL,
  cargo VARCHAR(100) NOT NULL,
  statusServ INT(1) NOT NULL,
  idReg INT(1) UNSIGNED ZEROFILL NOT NULL,
  idSetor INT(2) UNSIGNED ZEROFILL NOT NULL,
  CONSTRAINT pk_servidor PRIMARY KEY (idServ),
  CONSTRAINT fk_serset FOREIGN KEY (idSetor) REFERENCES demhab_setor(idSetor),
  CONSTRAINT fk_serreg FOREIGN KEY (idReg) REFERENCES demhab_regime(idReg)
);

CREATE TABLE IF NOT EXISTS locacao_motorista(
  idMot INT(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  nomeMot VARCHAR(15) NOT NULL,
  statusMot BIT NOT NULL,
  telefone CHAR(9) NOT NULL,
  CONSTRAINT pk_motorista PRIMARY KEY (idMot)
);

CREATE TABLE IF NOT EXISTS locacao_carro(
  idCarro INT(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  placa CHAR(7) NOT NULL,
  idMot INT(2) UNSIGNED ZEROFILL NOT NULL,
  CONSTRAINT pk_carro PRIMARY KEY (idCarro),
  CONSTRAINT fk_carmot FOREIGN KEY (idMot) REFERENCES locacao_motorista(idMot)
);

CREATE TABLE IF NOT EXISTS locacao_reserva(
  idReserva INT(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  dia DATE NOT NULL,
  hora TIME NOT NULL,
  destino VARCHAR(50) NOT NULL,
  horaRetorno TIME,
  statusRes BIT NOT NULL,
  idServ INT(3) UNSIGNED ZEROFILL NOT NULL,
  idCarro INT(2) UNSIGNED ZEROFILL NOT NULL,
  CONSTRAINT pk_reserva PRIMARY KEY (idReserva),
  CONSTRAINT fk_resser FOREIGN KEY (idServ) REFERENCES demhab_servidor(idServ),
  CONSTRAINT fk_rescar FOREIGN KEY (idCarro) REFERENCES locacao_carro(idCarro)
);

CREATE TABLE IF NOT EXISTS requerimento_corpo(
  idReq INT(4) ZEROFILL NOT NULL AUTO_INCREMENT,
  idUnico CHAR(10) NOT NULL,
  conteudo VARCHAR(10000) NOT NULL,
  dataHora DATETIME NOT NULL,
  CONSTRAINT pk_requerimento PRIMARY KEY (idReq)
);

CREATE TABLE IF NOT EXISTS requerimento_estilo(
  idEstilo CHAR(1) NOT NULL,
  conteudo VARCHAR(10000) NOT NULL,
  CONSTRAINT pk_estilo PRIMARY KEY (idEstilo)
);

INSERT INTO `locacao_motorista` (`idMot`, `nomeMot`, `statusMot`, `telefone`) VALUES
  (1, 'Fernando', 1, '984151396'),
  (2, 'Maicon', 0, '991718853'),
  (3, 'Leandro', 1, '993924162');

INSERT INTO `locacao_carro` (`idCarro`, `placa`, `idMot`) VALUES
  (1, 'IVM5099', 1),
  (2, 'OWW8091', 3);

INSERT INTO `demhab_setor`(`idSetor`, `nomeSetor`) VALUES
  (1,'Administrativo'),
  (2,'Juridico'),
  (3,'Fiscalização'),
  (4,'Social'),
  (5,'Tecnico'),
  (6,'Gabinete'),
  (7,'Financeiro');

INSERT INTO `demhab_regime` (`idReg`, `descReg`) VALUES
  (1, 'Estatutário'),
  (2, 'Estágio'),
  (3, 'Cargo em Comissão');

INSERT INTO `demhab_servidor` (`idServ`, `nomeServ`, `sobrenomeServ`, `idReg`, txtJur, `cargo`, `statusServ`, `idSetor`) VALUES
  (001, 'Mikhael', 'Bitelo Furtado', 2, '', 'Estágiario III', '1', 01),
  (002, 'Priscila Taís', 'Marins Voltz', 2, '', 'Estágiario II', '0', 01),
  (003, 'Laerte', 'Souza de Oliveira', 1, '', 'Diretor de Departamento (Administrativo e Financeiro)', '1', 07),
  (004, 'Andréa', 'Bandeira Bitencourt', 3, '15.135/2016', 'Chefe de Divisão (Financeiro)', '1', 07),
  (005, 'Alessandro', 'Pereira Rodrigues', 1, '', 'Agente Administrativo II', '1', 01),
  (006, 'Iana', 'de Azevedo', 1, '', 'Assistente Social', '1', 04),
  (007, 'Jéssica', 'da Silveira', 2, '', 'Estágiario III', '1', 04),
  (008, 'Aline', 'Rosário Cordeiro', 2, '', 'Estágiario IV', '1', 04),
  (009, 'Thalia', 'Cortina da Silveira', 3, '14.679/2016', 'Diretor de Departamento (Produção Habitacional)', '1', 05),
  (010, 'Luciane', 'Machado Ferreira', 3, '14.484/2015', 'Diretora-Presidente', '1', 06),
  (011, 'Victor', 'Rafael Johnson', 3, '15.111/2016', 'Diretor de Departamento (Comunitário de Regularização Fundiária)', '1', 06),
  (012, 'Marina', 'Matheos Corrêa', 2, '', 'Estágiario III', '1', 02),
  (013, 'Renata', 'Rodrigues Zinelli', 3, '12.998/2013', 'Assessora Jurídica', '1', 02),
  (014, 'Valmor', 'Valter Gadenz Junior', 1, '', 'Engenheiro', '1', 05),
  (015, 'Nilton', 'Ourique Medeiros', 1, '', 'Arquiteto', '1', 05),
  (016, 'Karine', 'Martins Leite', 1, '', 'Fiscal', '1', 05),
  (017, 'Rafael', 'Mendes de Lima', 1, '', 'Topógrafo', '1', 05),
  (018, 'Laís', 'Ferreira da Silva', 3, '', 'Chefe de Divisão (Programas Habitacionais)', '0', 04),
  (019, 'Jorge Luis', 'Leão Machado', 1, '', 'Fiscal', '0', 03),
  (020, 'Airton', 'Leal Vasconcelos', 1, '', 'Auxiliar Executivo II', '0', 04),
  (021, 'Silvana', 'Pacheco Lemos', 1, '', 'Assistente Social', '1', 04),
  (022, 'Natalia', 'Lhul', 3, '15.360/2016', 'Chefe de Divisão (Programas Habitacionais)', '1', 04);

INSERT INTO `portal_aviso` (`idAviso`, `texto`, dataPost, dataLimite) VALUES
  (null,'Bem-vindo ao portal DEMHAB','2016-11-01 00:00:00','2016-12-01 00:00:00'),
  (null,'Com enorme satisfação que apresentamos o meio de comunicação oficial do Departamento com os seus colaboradores','2016-11-01 00:00:00','2016-12-01 00:00:00'),
  (null,'Criado pelo setor de tecnologia da informação','2016-11-01 00:00:00','2016-12-01 00:00:00');

INSERT INTO `requerimento_estilo` (`idEstilo`, `conteudo`) VALUES
  ('A', '<style>table, tr, td {border: none}.titulo{height: 80px;font-weight: bold;text-align: center;}.corpo {text-align: justify;height: 310px;}.data{text-align: right;height:200px;}.assinatura{height:200x;text-align:center;border-top: 1px solid black;}.rodape{height:35x;}</style>'),
  ('B', '<style>.titulo{height: 80px;font-weight: bold;text-align: center;}.corpo {text-align: justify;height: 310px;}.corpo > td {border: 1px solid black;}.assinatura{text-align:center;border-top: 1px solid black;}</style>'),
  ('C', '<style>td{border: 1px solid black;border-collapse: collapse;text-align:center;}.tbl, th{border: 1px solid black;border-collapse: collapse;text-align:left;}.folga{background-color: gray;}.cabecalho{text-align: center;}.titulo{height: 80px;font-weight: bold;border: none;}.hora{width: 12%;}.data{width: 6%;}.ass{width: 23%;}.nome{width: 70%;}.mes{width: 30%;}.turno{width: 24%;}.footer td{border: none;}.assinatura{text-align:center;border-top: 1px solid black;}</style>');

