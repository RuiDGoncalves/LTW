PRAGMA foreign_keys = on;

CREATE TABLE account (
	idAccount INTEGER PRIMARY KEY,
	username NVARCHAR2(20) NOT NULL,
	email NVARCHAR2(20) NOT NULL,
	password NVARCHAR2(20) NOT NULL
);

CREATE TABLE poll(
	idPoll INTEGER PRIMARY KEY,
	title NVARCHAR2(20) NOT NULL,
	image NVARCHAR2(20) NOT NULL,
	public BOOLEAN,
	accountId INTEGER,
	FOREIGN KEY(accountId) REFERENCES account(idAccount)
);

CREATE TABLE question(
	idQuestion INTEGER PRIMARY KEY,
	quest NVARCHAR2(20) NOT NULL,
	pollId INTEGER,
	FOREIGN KEY(pollId) REFERENCES poll(idPoll)
);

CREATE TABLE answer(
	idAnswer INTEGER PRIMARY KEY,
	answ NVARCHAR2(20) NOT NULL,
	votes INTEGER,
	questionId INTEGER,
	FOREIGN KEY(questionId) REFERENCES question(idQuestion)
);

---- EXEMPLO DE CONTA ----
INSERT INTO account (idAccount, username, email, password)  
		VALUES (1, 'user1', 'user1@fe.up.pt', 'pass1');

INSERT INTO account (idAccount, username, email, password)  
		VALUES (2, 'user2', 'user2@fe.up.pt', 'pass2');

INSERT INTO account (idAccount, username, email, password)  
		VALUES (3, 'user3', 'user3@fe.up.pt', 'pass3');
