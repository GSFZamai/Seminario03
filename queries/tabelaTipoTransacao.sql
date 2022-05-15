create table Tipo_Transacao(
	Id int not null PRIMARY key AUTO_INCREMENT,
    Descricao varchar(100) not null
);

--Popular Tabela

INSERT INTO Tipo_Transacao(Descricao) Value("Entrada");
INSERT INTO Tipo_Transacao(Descricao) Value("Saída");