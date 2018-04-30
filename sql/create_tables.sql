CREATE SCHEMA postOfToday;

CREATE SCHEMA videoOfToday;

CREATE TABLE postOfToday.posts (
     id MEDIUMINT NOT NULL AUTO_INCREMENT,
     posts VARCHAR(255) UNIQUE NOT NULL,
     total_rate bigint NOT NULL,
     PRIMARY KEY (id)
);

CREATE TABLE postOfToday.best_posts (
     id MEDIUMINT NOT NULL AUTO_INCREMENT,
     posts VARCHAR(255) UNIQUE NOT NULL,
     total_rate bigint NOT NULL,
     PRIMARY KEY (id)
);


CREATE TABLE postOfToday.post_of_the_day(
	id MEDIUMINT NOT NULL AUTO_INCREMENT,
    post_of_the_day varchar(255) NOT NULL,
    total_rate BIGINT NOT NULL,
    PRIMARY KEY (id)
);


CREATE TABLE videoOfToday.videos (
     id MEDIUMINT NOT NULL AUTO_INCREMENT,
     url VARCHAR(255) UNIQUE NOT NULL,
     path VARCHAR(255) UNIQUE NOT NULL,
     video_type VARCHAR(100) NOT NULL,
     total_rate bigint NOT NULL,
     PRIMARY KEY (id)
);

CREATE TABLE videoOfToday.best_videos (
     id MEDIUMINT NOT NULL AUTO_INCREMENT,
     url VARCHAR(255) UNIQUE NOT NULL,
     path VARCHAR(255) UNIQUE NOT NULL,
     video_type VARCHAR(100) NOT NULL,
     total_rate bigint NOT NULL,
     PRIMARY KEY (id)
);


CREATE TABLE videoOfToday.video_of_the_day (
     id MEDIUMINT NOT NULL AUTO_INCREMENT,
     url VARCHAR(255) UNIQUE NOT NULL,
     path VARCHAR(255) UNIQUE NOT NULL,
     video_type VARCHAR(100) NOT NULL,
     total_rate bigint NOT NULL,
     PRIMARY KEY (id)
);