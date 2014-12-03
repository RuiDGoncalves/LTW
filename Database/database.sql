PRAGMA foreign_keys = ON;

CREATE TABLE account (
	idAccount INTEGER PRIMARY KEY,
	username NVARCHAR2(20) NOT NULL,
	email NVARCHAR2(20) NOT NULL,
	password NVARCHAR2(20) NOT NULL
);

CREATE TABLE poll(
	idPoll INTEGER PRIMARY KEY AUTOINCREMENT,
	idAccount INTEGER CONSTRAINT idAccount REFERENCES account(idAccount),
	title TEXT NOT NULL,
	image TEXT NOT NULL,
	public TEXT NOT NULL
);

CREATE TABLE question(
	idQuestion INTEGER PRIMARY KEY AUTOINCREMENT,
	idPoll INTEGER CONSTRAINT idPoll REFERENCES poll(idPoll),
	qText TEXT NOT NULL
);

CREATE TABLE answer(
	idAnswer INTEGER PRIMARY KEY AUTOINCREMENT,
	idQuestion INTEGER CONSTRAINT idQuestion REFERENCES question(idQuestion),
	aText TEXT NOT NULL,
	votes INTEGER NOT NULL
);

CREATE TABLE rela(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	idQuestion INTEGER CONSTRAINT idQuestion REFERENCES question(idQuestion),
	idAccount INTEGER CONSTRAINT idAccount REFERENCES account(idAccount)
);

---- EXEMPLO DE CONTA ----
INSERT INTO account (idAccount, username, email, password)  
		VALUES (1, 'user1', 'user1@fe.up.pt', 'pass1');

INSERT INTO account (idAccount, username, email, password)  
		VALUES (2, 'user2', 'user2@fe.up.pt', 'pass2');

INSERT INTO account (idAccount, username, email, password)  
		VALUES (3, 'user3', 'user3@fe.up.pt', 'pass3');
