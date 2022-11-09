BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "Projects" (
	"id"	INTEGER,
	"name"	STRING(15),
	"description"	TEXT,
	"teams"	STRING(45),
	PRIMARY KEY("id")
);
CREATE TABLE IF NOT EXISTS "Teams" (
	"id"	INTEGER,
	"name"	STRING(15),
	"project"	STRING(20),
	"devs"	STRING(130),
	"lead"	STRING(12),
	PRIMARY KEY("id")
);
CREATE TABLE IF NOT EXISTS "Users" (
	"id"	INTEGER,
	"username"	STRING(12),
	"pass"	STRING(10),
	"fname"	STRING(10),
	"lname"	STRING(15),
	"role"	STRING(10),
	"team"	INTEGER(1),
	PRIMARY KEY("id")
);
CREATE TABLE IF NOT EXISTS "Vacations" (
	"id"	INTEGER,
	"from"	DATE,
	"until"	DATE,
	"dor"	DATE,
	"halfday"	BOOLEAN,
	"approved"	BOOLEAN,
	"declarator"	STRING(12),
	PRIMARY KEY("id")
);
INSERT INTO "Users" VALUES (1,'yordanp','6&Wx33CVth','Yordan','Petrov','Developer',4);
INSERT INTO "Users" VALUES (2,'mitkoviv','parola','Ivan','Mitkov','Developer',1);
INSERT INTO "Users" VALUES (3,'nikita_l','7e*2F3ebXB','Nikola','Lubenov','Team Lead',2);
INSERT INTO "Users" VALUES (4,'g_andrea','Qwerty123!','Andrea','Georgieva','Developer',2);
INSERT INTO "Users" VALUES (5,'stoyu404','lizottess!','Stoyu','Hristov','Unassigned',3);
INSERT INTO "Users" VALUES (6,'albena-pav','htmlcool22','Albena','Pavlova','Unassigned',5);
INSERT INTO "Users" VALUES (7,'patrikcho','1g86H8K%h4','Patrik','Polenov','Developer',8);
INSERT INTO "Users" VALUES (8,'krasimira95','Ny930#nIEm','Krasimira','Kristianova','Developer',10);
INSERT INTO "Users" VALUES (9,'matthews','EpcPassword!','Matthew','Stoyanov','Developer',6);
INSERT INTO "Users" VALUES (10,'nikfor70','7v&9G&8A#9','Nikifor','Popov','Team Lead',1);
INSERT INTO "Users" VALUES (11,'momchill','gabriela4eva','Momchil','Karapetov','Unassigned',7);
INSERT INTO "Users" VALUES (12,'simon33','rP4U3p0&Y3','Simeon','Bachev','Developer',9);
INSERT INTO "Users" VALUES (13,'m_spasov','1R3u9B^3sx','Mladen','Spasov','Developer',3);
INSERT INTO "Users" VALUES (14,'boichevaaa','Cr002y*iHx','Rodopa','Boicheva','Developer',10);
INSERT INTO "Users" VALUES (15,'dragon','6U9M4y&vTu','Dragan','Valov','Developer',2);
INSERT INTO "Users" VALUES (16,'zdravkopekov','petkov1989','Zdravko','Petkov','Team Lead',9);
INSERT INTO "Users" VALUES (17,'vakovsky','HAHAHAHA!','Dimitur','Vakovsky','Developer',5);
INSERT INTO "Users" VALUES (18,'b_violeta','tC7w06!pz7','Violeta','Borisova','Team Lead',4);
INSERT INTO "Users" VALUES (19,'patr_spas','patrik08!!','Patrik','Spanakov','Developer',1);
INSERT INTO "Users" VALUES (20,'kaloyan_grig','D9j5$6Adt9','Kaloyan','Grigorov','Developer',7);
INSERT INTO "Users" VALUES (21,'kar_rus_01','M9*y49u3tW','Karina','Ruseva','Developer',3);
INSERT INTO "Users" VALUES (22,'vladnik','Vladko1914!','Vladimir','Nikolov','Unassigned',8);
INSERT INTO "Users" VALUES (23,'balkanski','O77p^76YEb','Vasil','Balkanski','Developer',6);
INSERT INTO "Users" VALUES (24,'petur_trikos','vM#J2298TL','Peter','Trikos','Team Lead',10);
INSERT INTO "Users" VALUES (25,'lia_sl','82Tf3%8Pmk','Lia','Slavcheva','Developer',1);
INSERT INTO "Users" VALUES (26,'v_vasileva','cucumbersell','Valeria','Vasileva','Team Lead',5);
INSERT INTO "Users" VALUES (27,'manush','3Es%0g0P6J','Manush','Stranev','Developer',2);
INSERT INTO "Users" VALUES (28,'hristov','Tff53!C3iR','Theodor','Hristov','Unassigned',5);
INSERT INTO "Users" VALUES (29,'viki_asenova','todorivasil','Viktoria','Asenova','Team Lead',6);
INSERT INTO "Users" VALUES (30,'kirilova_pol','Mt668%VOY@','Polina','Kirilova','Developer',8);
INSERT INTO "Users" VALUES (31,'kolyov_mario','supermario!','Mario','Kolyov','Developer',1);
INSERT INTO "Users" VALUES (32,'spiderman','doeswhateva','Peter','Parker','Unassigned',7);
INSERT INTO "Users" VALUES (33,'maria_georg',19284757,'Maria','Gerganova','Developer',9);
INSERT INTO "Users" VALUES (34,'e_vladimirov','yN239J%4I2','Emil','Vladimirov','Developer',2);
INSERT INTO "Users" VALUES (35,'stratiev','balkanski_s.','Stanislav','Stratiev','Developer',10);
INSERT INTO "Users" VALUES (36,'aanton','cars42781','Anton','Andreev','Unassigned',4);
INSERT INTO "Users" VALUES (37,'nikoleta_f','burgasimore','Nikoleta','Foteva','Developer',7);
INSERT INTO "Users" VALUES (38,'tutunev','9iH6*Wu5ib','Ekaterina','Dudin','Developer',5);
INSERT INTO "Users" VALUES (39,'bratovanov','dE7q2@96rc','Petko','Bratovanov','Team Lead',8);
INSERT INTO "Users" VALUES (40,'beldeva_doni','nightdancing','Donika','Beldeva','Developer',3);
INSERT INTO "Users" VALUES (41,'tariiski_n','Life_himiq4!','Nikola','Tariiski','Unassigned',6);
INSERT INTO "Users" VALUES (42,'i_monchev','P0zL1o#8Lo','Ilian','Monchev','Team Lead',7);
INSERT INTO "Users" VALUES (43,'kris-kutin','g1Q1#L6GRE','Kristian','Kutin','Developer',10);
INSERT INTO "Users" VALUES (44,'karavelov','E27nE4B*U8','Vladislav','Karavelov','Developer',9);
INSERT INTO "Users" VALUES (45,'lukanov_stef','biraimore:)','Stefan','Lukanov','Developer',4);
INSERT INTO "Users" VALUES (46,'miro_boykov','6p71P!RB3G','Miroslav','Boykov','Team Lead',3);
INSERT INTO "Users" VALUES (47,'cherganski','D25i110*4F','Samuil','Cherganski','Developer',8);
INSERT INTO "Users" VALUES (48,'shopova42','Il411%u%uk','Dalia','Shopova','Developer',6);
INSERT INTO "Users" VALUES (49,'l_kochanov','v3O19l@aeM','Lazar','Kochanov','Developer',4);
INSERT INTO "Users" VALUES (50,'ivo_dimitrov','Fake_troll!#','Ivailo','Dimitrov','Unassigned',9);
COMMIT;
