CREATE TABLE account(
	idAccount NUMBER PRIMARY KEY,
	username NVARCHAR2(20) NOT NULL,
	email NVARCHAR2(20) NOT NULL,
	password NVARCHAR2(20) NOT NULL
);

---- EXEMPLO DE CONTA ----
INSERT INTO account (idAccount, username, email, password)  
		VALUES (1, 'user1', 'user1@fe.up.pt', 'pass');

