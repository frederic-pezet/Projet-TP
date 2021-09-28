#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: f39r6_roles
#------------------------------------------------------------

CREATE TABLE f39r6_roles(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (100) NOT NULL
	,CONSTRAINT roles_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: f39r6_users
#------------------------------------------------------------

CREATE TABLE f39r6_users(
        id                        Int  Auto_increment  NOT NULL ,
        username                  Varchar (100) NOT NULL ,
        nintendo_network_username Varchar (100) ,
        origin_username           Varchar (100) ,
        psn_username              Varchar (100) ,
        xbox_live_username        Varchar (100) ,
        password                  Varchar (255) NOT NULL ,
        mail                      Varchar (255) NOT NULL ,
        id_roles            Int NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (id)

	,CONSTRAINT users_roles_FK FOREIGN KEY (id_roles) REFERENCES f39r6_roles(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: f39r6_tournaments
#------------------------------------------------------------

CREATE TABLE f39r6_tournaments(
        id                   Int  Auto_increment  NOT NULL ,
        creationDate         Datetime NOT NULL ,
        tournamentDate       Datetime NOT NULL ,
        startInscriptionDate Datetime NOT NULL ,
        endInscriptionDate   Datetime NOT NULL
	,CONSTRAINT tournaments_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: f39r6_matchPhases
#------------------------------------------------------------

CREATE TABLE f39r6_matchPhases(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (20) NOT NULL
	,CONSTRAINT matchPhases_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: f39r6_matchs
#------------------------------------------------------------

CREATE TABLE f39r6_matchs(
        id                   Int  Auto_increment  NOT NULL ,
        day                  Int NOT NULL ,
        id_tournaments Int NOT NULL ,
        id_matchPhases Int NOT NULL
	,CONSTRAINT matchs_PK PRIMARY KEY (id)

	,CONSTRAINT matchs_tournaments_FK FOREIGN KEY (id_tournaments) REFERENCES f39r6_tournaments(id)
	,CONSTRAINT matchs_matchPhases_FK FOREIGN KEY (id_matchPhases) REFERENCES f39r6_matchPhases(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: f39r6_firstPhaseMatchResults
#------------------------------------------------------------

CREATE TABLE f39r6_firstPhaseMatchResults(
        id                Int  Auto_increment  NOT NULL ,
        points            Varchar (100) NOT NULL ,
        scoredGoalsNumber Int NOT NULL ,
        takenGoalsNumber  Int NOT NULL ,
        goalsDifference   Int NOT NULL ,
        number            Int NOT NULL ,
        id_matchs   Int NOT NULL
	,CONSTRAINT firstPhaseMatchResults_PK PRIMARY KEY (id)

	,CONSTRAINT firstPhaseMatchResults_matchs_FK FOREIGN KEY (id_matchs) REFERENCES f39r6_matchs(id)
	,CONSTRAINT firstPhaseMatchResults_matchs_AK UNIQUE (id_matchs)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: f39r6_teams
#------------------------------------------------------------

CREATE TABLE f39r6_teams(
        id             Int  Auto_increment  NOT NULL ,
        name           Varchar (100) NOT NULL ,
        logo           Varchar (255) NOT NULL ,
        jersey         Varchar (255) NOT NULL ,
        id_users Int NOT NULL
	,CONSTRAINT teams_PK PRIMARY KEY (id)

	,CONSTRAINT teams_users_FK FOREIGN KEY (id_users) REFERENCES f39r6_users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: f39r6_versusTeams
#------------------------------------------------------------

CREATE TABLE f39r6_versusTeams(
        id                   Int  Auto_increment  NOT NULL ,
        id_matchs      Int NOT NULL ,
        id_firstTeam       Int NOT NULL ,
        id_secondTeam Int NOT NULL
	,CONSTRAINT versusTeams_PK PRIMARY KEY (id)

	,CONSTRAINT versusTeams_matchs_FK FOREIGN KEY (id_matchs) REFERENCES f39r6_matchs(id)
	,CONSTRAINT versusTeams_teams1_FK FOREIGN KEY (id_firstTeam) REFERENCES f39r6_teams(id)
	,CONSTRAINT versusTeams_teams2_FK FOREIGN KEY (id_secondTeam) REFERENCES f39r6_teams(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: f39r6_firstPhaseRankings
#------------------------------------------------------------

CREATE TABLE f39r6_firstPhaseRankings(
        id                   Int  Auto_increment  NOT NULL ,
        rank                 Int ,
        points               Int NOT NULL ,
        qualified            Bool ,
        id_tournaments Int NOT NULL ,
        id_teams       Int NOT NULL
	,CONSTRAINT firstPhaseRankings_PK PRIMARY KEY (id)

	,CONSTRAINT firstPhaseRankings_tournaments_FK FOREIGN KEY (id_tournaments) REFERENCES f39r6_tournaments(id)
	,CONSTRAINT firstPhaseRankings_team0_FK FOREIGN KEY (id_teams) REFERENCES f39r6_teams(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: f39r6_finalRankings
#------------------------------------------------------------

CREATE TABLE f39r6_finalRankings(
        id   Int  Auto_increment  NOT NULL ,
        rank Int,
		id_tournaments Int NOT NULL ,
        id_teams       Int NOT NULL
	,CONSTRAINT finalRankings_PK PRIMARY KEY (id)
	,CONSTRAINT finalRankings_tournaments_FK FOREIGN KEY (id_tournaments) REFERENCES f39r6_tournaments(id)
	,CONSTRAINT finalRankings_teams FOREIGN KEY (id_teams) REFERENCES f39r6_teams(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: f39r6_finalPhaseMatchResults
#------------------------------------------------------------

CREATE TABLE f39r6_finalPhaseMatchResults(
        id              Int  Auto_increment  NOT NULL ,
        score           Int NOT NULL ,
        id_teams  Int NOT NULL ,
        id_matchs Int NOT NULL
	,CONSTRAINT finalPhaseMatchResults_PK PRIMARY KEY (id)

	,CONSTRAINT finalPhaseMatchResults_teams_FK FOREIGN KEY (id_teams) REFERENCES f39r6_teams(id)
	,CONSTRAINT finalPhaseMatchResults_matchs_FK FOREIGN KEY (id_matchs) REFERENCES f39r6_matchs(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: f39r6_teamsCompositionForTournaments
#------------------------------------------------------------

CREATE TABLE f39r6_teamsCompositionForTournaments(
        id                   Int  Auto_increment  NOT NULL ,
        groupeName           Varchar (10) ,
        id_teams       Int NOT NULL ,
        id_users       Int NOT NULL ,
        id_tournaments Int NOT NULL
	,CONSTRAINT f39r6_teamsCompositionForTournaments_PK PRIMARY KEY (id)

	,CONSTRAINT teamsCompositionForTournaments_teams_FK FOREIGN KEY (id_teams) REFERENCES f39r6_teams(id)
	,CONSTRAINT teamsCompositionForTournaments_users_FK FOREIGN KEY (id_users) REFERENCES f39r6_users(id)
	,CONSTRAINT teamsCompositionForTournaments_tournaments_FK FOREIGN KEY (id_tournaments) REFERENCES f39r6_tournaments(id)
)ENGINE=InnoDB;

