-- Run script with this part to "factory reset" the database
DROP TABLE media, categories, quotes;

-- Media
-- Valid values for the medium from which a quote can originate and their html classes
CREATE TABLE media (
	name VARCHAR(32) primary key,	-- labels that appear on radio buttons
	tag  VARCHAR(32)				-- html class
);
--                         name                  tag
INSERT INTO media VALUES( 'A Friend',           'friend'     );
INSERT INTO media VALUES( 'Book',               'book'       );
INSERT INTO media VALUES( 'General Conference', 'conference' );
INSERT INTO media VALUES( 'Magazine',           'magazine'   );
INSERT INTO media VALUES( 'Movie',              'movie'      );
INSERT INTO media VALUES( 'Newspaper'   ,        'newspaper' );
INSERT INTO media VALUES( 'Scripture',          'scripture'  );
INSERT INTO media VALUES( 'TV Show',            'tv'         );
INSERT INTO media VALUES( 'Other',              'zz-other'   );

-- Categories
CREATE TABLE categories (
	name VARCHAR(32) primary key,
	tag  VARCHAR(32)
);
--                              name                tag
INSERT INTO categories VALUES( 'Humor',            'humor'         );
INSERT INTO categories VALUES( 'Inspirational',    'inspirational' );
INSERT INTO categories VALUES( 'Interesting Fact', 'fact'          );
INSERT INTO categories VALUES( 'Other',            'zz-other'      );
INSERT INTO categories VALUES( 'Religious',        'religious'     );

-- Quotes
CREATE TABLE quotes (
	id          SERIAL primary key,
	quote       TEXT,
	attribution VARCHAR(32),
	source      VARCHAR(32),
	medium      VARCHAR(32) REFERENCES media(name),
	category    VARCHAR(32) REFERENCES categories(name),
	submitter   VARCHAR(32),
	submissionDate DATE
);

INSERT INTO quotes (quote, attribution, source, medium, category, submitter, submissionDate)
	VALUES ('Do or do not. There is no try.',
		'Yoda', 'Star Wars', 'Movie', 'Inspirational', 'Sam Knight', '2018-10-13');

INSERT INTO quotes (quote, attribution, source,      medium,  category,       submitter,   submissionDate)
	VALUES ('You''re making me beat up grass!',
		'Rocket the Raccoon', 'Guardians of the Galaxy', 'Movie', 'Humor', 'Sam Knight', '2018-10-13');

INSERT INTO quotes (quote, attribution, source,      medium,  category,       submitter,   submissionDate)
	VALUES ('And it came to pass that I, Nephi, said unto my father: I will go and do the things which the Lord hath commanded, for I know that the Lord giveth no commandments unto the children of men, save he shall prepare a way for them that they may accomplish the thing which he commandeth them.',
		'Nephi', '1 Nephi 3:7', 'Scripture', 'Religious', 'Sam Knight', '2018-10-13');
