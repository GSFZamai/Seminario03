USE financas;
CREATE TABLE Transacoes(
	Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Descricao VARCHAR(100) NOT NULL,
    Valor DOUBLE(10,2) NOT NULL,
    Tipo_Transacao int NOT NULL,
    Exibe TINYINT NOT NULL DEFAULT 1,
    Data DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
    Id_Usuario INT,
    CONSTRAINT FK_Transacoes_Usuarios FOREIGN KEY (Id_Usuario) REFERENCES usuarios(Id),
    CONSTRAINT FK_Transacoes_TipoTransacao FOREIGN KEY (Tipo_Transacao) REFERENCES Tipo_Transacao(Id)   
);

ALTER TABLE transacoes ADD CONSTRAINT FK_Transacao_Usuario FOREIGN KEY transacoes(Id_Usuario) REFERENCES usuarios(Id);