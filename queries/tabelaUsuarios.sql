create TABLE Usuarios(
	Id int not null PRIMARY KEY AUTO_INCREMENT,
    Nome varchar(100) not null,
    Email varchar(100) not null,
    Senha char(40) not null,
    Data Timestamp not null DEFAULT CURRENT_TIMESTAMP
);