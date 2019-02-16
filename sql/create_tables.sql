CREATE SCHEMA postOfToday;

CREATE SCHEMA videoOfToday;




CREATE TABLE videoOfToday.videos (
     id MEDIUMINT NOT NULL AUTO_INCREMENT,
     url VARCHAR(255) UNIQUE NOT NULL,
     path VARCHAR(255) UNIQUE NOT NULL,
     video_type VARCHAR(100) NOT NULL,
     total_rate bigint NOT NULL,
     uploadDate datetime,
     PRIMARY KEY (id)
);

CREATE TABLE videoOfToday.best_videos (
     id MEDIUMINT NOT NULL AUTO_INCREMENT,
     url VARCHAR(255) UNIQUE NOT NULL,
     path VARCHAR(255) UNIQUE NOT NULL,
     video_type VARCHAR(100) NOT NULL,
     total_rate bigint NOT NULL,
     uploadDate datetime,
     PRIMARY KEY (id)
);

