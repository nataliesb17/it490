-- The following query will make a table which stores all the user info
-- such as the user's name, username, password, and email.

CREATE TABLE user_info (
	
	username VARCHAR(50) PRIMARY KEY,
	password VARCHAR(50) NOT NULL,
	name VARCHAR(50),
	email VARCHAR (MAX)
	
)

-- !!! IMPORTANT !!!
-- When inserting password into the table, enter the value as shown below:
-- HASHBYTE ('SHA1', 'password')
