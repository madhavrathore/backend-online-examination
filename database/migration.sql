create database online_examination;

use online_examination;

create table IF NOT EXISTS  users(
	id INT PRIMARY KEY AUTO_INCREMENT,
	name varchar(255),
	email varchar(255),
	password varchar(255),
	phone_number INT,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
create table IF NOT EXISTS institutes(
	id INT PRIMARY KEY AUTO_INCREMENT,
	name varchar(255),
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
create table IF NOT EXISTS subjects
(
	id int PRIMARY KEY AUTO_INCREMENT,
	name varchar(255),
	institute_id INT,
	max_marks INT,
	no_of_questions INT,
	min_passing_marks INT,
	exam_duration INT,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

create table IF NOT EXISTS questions
(
	id INT AUTO_INCREMENT PRIMARY KEY,
	question TEXT(255),
	subject_id INT,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
	
create table  IF NOT EXISTS question_options
(
    id INT PRIMARY KEY AUTO_INCREMENT,
	question_id INT,
    value TEXT,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);


create table  IF NOT EXISTS answers
(       
    id INT PRIMARY KEY AUTO_INCREMENT,
    question_id INT,
    question_option_id INT,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);


create table IF NOT EXISTS tests
(
     id INT PRIMARY KEY AUTO_INCREMENT,      
     subject_id INT,
     test_date DATETIME,
     is_submitted BOOLEAN,
     start_time TIME,
     finish_time TIME,
     user_id INT not null,
     created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
     updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    
);


create table IF NOT EXISTS user_answers
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    question_id INT,
    question_option_id INT,
    test_id INT,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);



//insertind data into 




insert into test values("","1",)







	
