CREATE TABLE posts (
	post_id int(11) AUTO_INCREMENT PRIMARY KEY not null,
    post_subject LONGTEXT not null,
    post_content LONGTEXT not null,
    post_imgName LONGTEXT not null,
    post_author varchar(255) not null,
    post_date datetime not null,
    post_update_at datetime 

);


CREATE TABLE users (
	user_id int(11) AUTO_INCREMENT PRIMARY KEY not null,
    username varchar(255) not null,
    email varchar(255) not null,
    password varchar(255) not null,
    signup_date varchar(255) not null
);

CREATE TABLE comments (
    id int(11) AUTO_INCREMENT PRIMARY KEY not null,
    fullname varchar(255) not null,
    post_id int(11) not null,
    comment LONGTEXT not null,
    comment_date varchar(255) not null
);