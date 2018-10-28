-- Basic join
--------------
SELECT q.id, submissionDate, c.name AS category, m.name AS medium
	FROM quotes q, media m, categories c
	WHERE q.medium_id = m.id
	AND q.category_id = c.id
;

-- Search by Medium
--------------------
SELECT q.id, submissionDate, c.name AS category, m.name AS medium
	FROM quotes q, media m, categories c
	WHERE q.medium_id = 5
;
-- No good; returns a cartesian product of all 3 tables; yikes

SELECT * FROM quotes 
	INNER JOIN media
	ON (media.id = quotes.medium_id)
;
