DROP SCHEMA IF EXISTS day8;
CREATE SCHEMA day8;
USE day8;

DROP TABLE IF EXISTS members;

CREATE TABLE members
(
  id           INT(10),
  name     VARCHAR(40)
);

INSERT INTO members (id, name) VALUES (1, "Ito");
INSERT INTO members (id, name) VALUES (2, "Miki");
INSERT INTO members (id, name) VALUES (3, "Okamoto");
INSERT INTO members (id, name) VALUES (4, "Yamasaki");
