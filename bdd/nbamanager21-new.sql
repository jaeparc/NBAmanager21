CREATE TABLE `USER`(
 id_user INTEGER PRIMARY KEY AUTO_INCREMENT,
 pseudo VARCHAR(255) NOT NULL,
 mail VARCHAR(255) NOT NULL,
 password VARCHAR(255) NOT NULL,
 nom VARCHAR(255) NOT NULL,
 prenom VARCHAR(255) NOT NULL
);

CREATE TABLE `GAME`(
 id_game INTEGER PRIMARY KEY AUTO_INCREMENT,
 date_game DATE,
 id_user INTEGER NOT NULL,
 CONSTRAINT fk_gameuser FOREIGN KEY (id_user) REFERENCES USER(id_user) ON DELETE CASCADE
);

CREATE TABLE `CONFERENCE`(
 id_conference INTEGER PRIMARY KEY AUTO_INCREMENT,
 nom_conference VARCHAR(255) NOT NULL
);

CREATE TABLE `DIVISION`(
 id_division INTEGER PRIMARY KEY AUTO_INCREMENT,
 nom_division VARCHAR(255) NOT NULL,
 id_conference INTEGER NOT NULL,
 CONSTRAINT fk_divconf FOREIGN KEY (id_conference) REFERENCES CONFERENCE(id_conference) ON DELETE CASCADE
);

CREATE TABLE `TEAM`(
 id_team INTEGER PRIMARY KEY AUTO_INCREMENT,
 name_team VARCHAR(255) NOT NULL,
 city VARCHAR(255) NOT NULL,
 gym VARCHAR(255) NOT NULL,
 staffsalary FLOAT DEFAULT 15,
 salarycap FLOAT DEFAULT 109.1,
 id_game INTEGER NOT NULL,
 id_game_fav INTEGER NOT NULL,
 id_division INTEGER NOT NULL,
 CONSTRAINT fk_teamgame FOREIGN KEY (id_game) REFERENCES GAME(id_game) ON DELETE CASCADE,
 CONSTRAINT fk_teamgamefav FOREIGN KEY (id_game_fav) REFERENCES GAME(id_game) ON DELETE CASCADE,
 CONSTRAINT fk_teamdiv FOREIGN KEY (id_division) REFERENCES DIVISION(id_division) ON DELETE CASCADE
);

CREATE TABLE `MATCH`(
 id_match INTEGER PRIMARY KEY AUTO_INCREMENT,
 date_match DATE NOT NULL,
 score VARCHAR(255) NOT NULL,
 id_game INTEGER NOT NULL,
 id_team_dom INTEGER NOT NULL,
 id_team_ext INTEGER NOT NULL,
 CONSTRAINT fk_matchgame FOREIGN KEY (id_game) REFERENCES GAME(id_game) ON DELETE CASCADE,
 CONSTRAINT fk_matchteamdom FOREIGN KEY (id_team_dom) REFERENCES TEAM(id_team) ON DELETE CASCADE,
 CONSTRAINT fk_matchteamext FOREIGN KEY (id_team_ext) REFERENCES TEAM(id_team) ON DELETE CASCADE
);
Salary,

CREATE TABLE `PERSON`(
  id_person INTEGER PRIMARY KEY AUTO_INCREMENT,
  nom_person VARCHAR(255) NOT NULL,
  age INTEGER NOT NULL,
  wage INTEGER NOT NULL,
  contract_year INTEGER
  id_team INTEGER,
  CONSTRAINT fk_personteam FOREIGN KEY (id_team) REFERENCES TEAM(id_team) ON DELETE CASCADE
);

CREATE TABLE `PLAYER`(
 id_player INTEGER PRIMARY KEY AUTO_INCREMENT,
 num_jersey INTEGER NOT NULL,
 position VARCHAR(255) NOT NULL,
 atk INTEGER NOT NULL,
 def INTEGER NOT NULL,
 hurt INTEGER NOT NULL,
 id_person INTEGER NOT NULL,
 id_game INTEGER NOT NULL,
 CONSTRAINT fk_playerperson FOREIGN KEY (id_person) REFERENCES PERSON(id_person) ON DELETE CASCADE,
 CONSTRAINT fk_playergame FOREIGN KEY (id_game) REFERENCES GAME(id_game) ON DELETE CASCADE,
);

CREATE TABLE `STAFF`(
 id_staff INTEGER PRIMARY KEY AUTO_INCREMENT,
 function VARCHAR(255) NOT NULL,
 skill INTEGER NOT NULL,
 id_person INTEGER NOT NULL,
 id_game INTEGER NOT NULL,
 CONSTRAINT fk_staffperson FOREIGN KEY (id_person) REFERENCES PERSON(id_person) ON DELETE CASCADE,
 CONSTRAINT fk_staffgame FOREIGN KEY (id_game) REFERENCES GAME(id_game) ON DELETE CASCADE,
);
