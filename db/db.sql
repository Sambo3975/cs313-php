-- Reset User Table
-- Run script with this part to "factory reset" the database
DROP TABLE quotes, media, categories, quote_users;

CREATE TABLE quote_users (
	id SERIAL PRIMARY KEY,
	username VARCHAR(31) NOT NULL,
	password VARCHAR(31) NOT NULL,
	isAdmin BOOLEAN NOT NULL,
	name VARCHAR(31)
);

INSERT INTO quote_users (username, password, isAdmin, name)
	VALUES ('Sambo', '$50PointsToGryffind0r$', TRUE, 'Sam Knight');
	
INSERT INTO quote_users (username, password, isAdmin)
	VALUES ('Tony Stank', 'RunninOverFatKids', FALSE);

-- Media
-- Valid values for the medium from which a quote can originate and their html classes
CREATE TABLE media (
	id SERIAL PRIMARY KEY,
	name VARCHAR(31)	-- labels that appear on radio buttons
);
--                                name
INSERT INTO media (name) VALUES( 'A Friend');
INSERT INTO media (name) VALUES( 'Book');
INSERT INTO media (name) VALUES( 'General Conference');
INSERT INTO media (name) VALUES( 'Magazine');
INSERT INTO media (name) VALUES( 'Movie');
INSERT INTO media (name) VALUES( 'Newspaper');
INSERT INTO media (name) VALUES( 'Scripture');
INSERT INTO media (name) VALUES( 'TV Show');
INSERT INTO media (name) VALUES( 'Other');

-- Categories
CREATE TABLE categories (
	id SERIAL PRIMARY KEY,
	name VARCHAR(31)
);
--                                     name
INSERT INTO categories (name) VALUES( 'Humor');
INSERT INTO categories (name) VALUES( 'Inspirational');
INSERT INTO categories (name) VALUES( 'Interesting Fact');
INSERT INTO categories (name) VALUES( 'Religious');
INSERT INTO categories (name) VALUES( 'Other');

-- Quotes
CREATE TABLE quotes (
	id       SERIAL primary key,
	quote          TEXT NOT NULL,
	attribution    VARCHAR(31) NOT NULL,
	source         VARCHAR(31) NOT NULL,
	medium_id      INT REFERENCES media(id) NOT NULL,
	category_id    INT REFERENCES categories(id) NOT NULL,
	user_id        INT REFERENCES quote_users(id) NOT NULL,
	submissionDate DATE
);

INSERT INTO quotes (quote, attribution, source, medium_id, category_id, user_id, submissionDate)
	VALUES ('Do or do not. There is no try.',
		'Yoda', 'Star Wars', 5, 2, 1, '2018-10-13');

INSERT INTO quotes (quote, attribution, source, medium_id, category_id, user_id, submissionDate)
	VALUES ('You''re making me beat up grass!',
		'Rocket the Raccoon', 'Guardians of the Galaxy', 5, 1, 2, '2018-10-13');

INSERT INTO quotes (quote, attribution, source, medium_id, category_id, user_id, submissionDate)
	VALUES ('And it came to pass that I, Nephi, said unto my father: I will go and do the things which the Lord hath commanded, for I know that the Lord giveth no commandments unto the children of men, save he shall prepare a way for them that they may accomplish the thing which he commandeth them.',
		'Nephi', '1 Nephi 3:7', 7, 4, 1, '2018-10-13');
