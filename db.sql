
CREATE TABLE privilege(
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(120) NOT NULL,
	access ENUM ('partial', 'total') NOT NULL DEFAULT 'partial'
);

CREATE TABLE user(
	id INT PRIMARY KEY AUTO_INCREMENT,
	privilege_id INT NOT NULL,
	user VARCHAR(120) NOT NULL,
	pass VARCHAR(120) NOT NULL
);

ALTER TABLE user
ADD CONSTRAINT fk_privilege FOREIGN KEY (privilege_id)
REFERENCES privilege (id);

INSERT INTO privilege (name, access) VALUES ('avanzado', 'total');
INSERT INTO privilege (name, access) VALUES ('intermedio', 'partial');
INSERT INTO privilege (name, access) VALUES ('básico', 'partial');

INSERT INTO user (privilege_id, user, pass) VALUES
(1, 'admin', md5('123'));
INSERT INTO user (privilege_id, user, pass) VALUES
(2, 'moder', md5('456'));
INSERT INTO user (privilege_id, user, pass) VALUES
(3, 'user', md5('789'));