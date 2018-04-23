CREATE SCHEMA postOfToday;


CREATE TABLE posts (
     id MEDIUMINT NOT NULL AUTO_INCREMENT,
     posts VARCHAR(255) UNIQUE NOT NULL,
     total_rate bigint NOT NULL,
     PRIMARY KEY (id)
);

CREATE TABLE post_of_the_day(
	id MEDIUMINT NOT NULL AUTO_INCREMENT,
    post_of_the_day varchar(255) NOT NULL,
    total_rate BIGINT NOT NULL,
    PRIMARY KEY (id)
);