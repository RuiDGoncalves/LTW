CREATE TABLE account(
	idAccount INTEGER PRIMARY KEY,
	username NVARCHAR2(20) NOT NULL,
	email NVARCHAR2(20) NOT NULL,
	password NVARCHAR2(20) NOT NULL
);

---- EXEMPLO DE CONTA ----
INSERT INTO account (idAccount, username, email, password)  
		VALUES (1, 'user1', 'user1@fe.up.pt', 'pass1');

INSERT INTO account (idAccount, username, email, password)  
		VALUES (2, 'user2', 'user2@fe.up.pt', 'pass2');

INSERT INTO account (idAccount, username, email, password)  
		VALUES (3, 'user3', 'user3@fe.up.pt', 'pass3');
