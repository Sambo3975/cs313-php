CREATE TABLE topics (
	topic_id SERIAL PRIMARY KEY,
	name varchar(31)
);

INSERT INTO topics (name)
	VALUES ('Faith');
	
INSERT INTO topics (name)
	VALUES ('Sacrifice');
	
INSERT INTO topics (name)
	VALUES ('Charity');

CREATE TABLE scripture (
	scripture_id SERIAL PRIMARY KEY,
	book varchar(31),
	chapter int,
	verse int,
	content text
);

CREATE TABLE scriptures_topics (
	topic_id int NOT NULL REFERENCES topics (topic_id),
	scripture_id int NOT NULL REFERENCES scripture (scripture_id)
);
