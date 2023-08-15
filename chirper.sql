PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
DROP TABLE IF EXISTS `user`;
DROP TABLE IF EXISTS `chirps`;

CREATE TABLE `user` (
  -- Note that storing passwords in plaintext like this is very, very bad.
  -- But we'll address that issue later.
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  email TEXT UNIQUE NOT NULL,
  username TEST UNIQUE NOT NULL,
  password TEXT NOT NULL,
  firstName TEXT NOT NULL,
  lastName TEXT NOT NULL,
  profile TEXT NOT NULL
);

INSERT INTO "user" VALUES(1,'zeus@olympus.com','zeus','$2y$10$fnpuwzNWO8ROAT3oJcvl1e7IwbEUG2URfTuVH9yWWttl.c.HnppQi','Zeus','Jupiter','I am the god of the sky and thunder. King of the gods.');
INSERT INTO "user" VALUES(2,'ares@olympus.com','ares', '$2y$10$ZW0K1YZ4TwWHz/1vgGfYr.Rksv56mTesFcb7SCv0iSYNgz3RMcveq','Ares','Mars','I am the Olympian god of courage and war.');
INSERT INTO "user" VALUES(3,'demeter@olympus.com','demeter', '$2y$10$Ri1pArNEc8ZV4lBLvsyZ/e5usqmXVzD5.HDCLal8uklVDj2.ShdWi','Demeter','Ceres','I am the Olympian goddess of the harvest and agriculture.');
INSERT INTO "user" VALUES(4,'hermes@olympus.com','hermes', '$2y$10$wkhykt97pVZjuPUwB.6rQ.k3ovGb8oeR56yBwjGotLDINPK4PLNcq','Hermes','Mercury','I am the messenger of the gods.');
INSERT INTO "user" VALUES(5,'apollo@olympus.com','apollo', '$2y$10$Hhm/Cxlj5edvwW1zdFdKoeUofr6wexPj1SL9VoMP7Id2IwwwV9sCC','Apollo','Phoebus','Music, dance, truth, prophecy; you name it I am there.');

-- Sky@Thund3r = $2y$10$fnpuwzNWO8ROAT3oJcvl1e7IwbEUG2URfTuVH9yWWttl.c.HnppQi
-- C0urage@W4r = $2y$10$ZW0K1YZ4TwWHz/1vgGfYr.Rksv56mTesFcb7SCv0iSYNgz3RMcveq
-- H4rv3st = $2y$10$Ri1pArNEc8ZV4lBLvsyZ/e5usqmXVzD5.HDCLal8uklVDj2.ShdWi
-- M3ssenger! = $2y$10$wkhykt97pVZjuPUwB.6rQ.k3ovGb8oeR56yBwjGotLDINPK4PLNcq
-- UC4nD@nceIfUW4nt2 = $2y$10$Hhm/Cxlj5edvwW1zdFdKoeUofr6wexPj1SL9VoMP7Id2IwwwV9sCC

CREATE TABLE `chirps`
(
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  datestamp DATETIME NOT NULL,
  chirp_content VARCHAR(140) NOT NULL,
  user_id INTEGER NOT NULL,
    FOREIGN KEY (user_id)
    REFERENCES user(id)
    ON DELETE CASCADE
);

INSERT INTO "chirps" VALUES(1, '2020-03-04 09:15:00', 'Happy birthday @apollo! I love you @apollo.', 1);
INSERT INTO "chirps" VALUES(2, '2021-01-01 09:20:00', '@zeus, dad stop embarassing me!', 5);
INSERT INTO "chirps" VALUES(3, '2021-01-23 09:15:00', 'Where my thieves at?', 4);
INSERT INTO "chirps" VALUES(4, '2021-01-25 12:15:00', 'I just love fresh salad in the afternoon. Lets get lunch @noon.', 3);
INSERT INTO "chirps" VALUES(5, '2021-02-14 12:15:00', 'Sometimes I get the feeling my kids don''t really like me.', 1);
                            
DELETE FROM sqlite_sequence;
INSERT INTO "sqlite_sequence" VALUES('chirps',5);
INSERT INTO "sqlite_sequence" VALUES('user',5);
PRAGMA foreign_keys=ON;
COMMIT;
