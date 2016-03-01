CREATE TABLE posts
(
	id MEDIUMINT NOT NULL AUTO_INCREMENT,
	title VARCHAR(255),
	body VARCHAR(255),
	PRIMARY KEY (id)
)
CREATE TABLE comments
(
	Comment_id MEDIUMINT NOT NULL AUTO_INCREMENT,
	COMMENT VARCHAR(255),
	posts_id MEDIUMINT,
	PRIMARY KEY (Comment_id),
	FOREIGN KEY (posts_id) REFERENCES posts(id)
	ON DELETE CASCADE
	ON UPDATE CASCADE
)

INSERT INTO posts (title, body) VALUES ('JavaScript and CS', 'Javascript body test and Css Body test');
INSERT INTO posts (title, body) VALUES ('C# and Asp.net', 'C# body test and asp.net body test');
INSERT INTO posts (title, body) VALUES ('Php and laravel', 'Php body test and laravel body test');


INSERT INTO comments(COMMENT, posts_id) VALUES ('javascript coment one', 1);
INSERT INTO comments(COMMENT, posts_id) VALUES ('javascript coment two', 1);
INSERT INTO comments(COMMENT, posts_id) VALUES ('javascript coment three', 1);

INSERT INTO comments(COMMENT, posts_id) VALUES ('C# coment one', 2);
INSERT INTO comments(COMMENT, posts_id) VALUES ('C# coment two', 2);
INSERT INTO comments(COMMENT, posts_id) VALUES ('C# coment three', 2);

INSERT INTO comments(COMMENT, posts_id) VALUES ('PHP coment one', 3);
INSERT INTO comments(COMMENT, posts_id) VALUES ('PHP coment two', 3);
INSERT INTO comments(COMMENT, posts_id) VALUES ('PHP coment three', 3);

SELECT * FROM posts
SELECT * FROM comments



