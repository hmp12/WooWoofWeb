
CREATE DATABASE gaugauDB;

DROP TABLE user;
CREATE TABLE user (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(30) NOT NULL,
	usr VARCHAR(30) UNIQUE NOT NULL,
	email VARCHAR(50) UNIQUE NOT NULL,
	avatar VARCHAR(50),
	google VARCHAR(50) UNIQUE,
	facebook VARCHAR(50) UNIQUE,
	twitter VARCHAR(50) UNIQUE,
	phone INT(11),
	pass VARCHAR(50) NOT NULL,
	position INT(11),
	status INT(11),
	gender VARCHAR(6),
	description VARCHAR(256), 
	reg_date TIMESTAMP
);

DROP TABLE messages;
CREATE TABLE messages (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	body longtext NOT NULL,
	user VARCHAR(30) NOT NULL,
	reg_date TIMESTAMP
);

DROP TABLE aiml;
CREATE TABLE aiml (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	pattern VARCHAR(256) NOT NULL,
	thatpattern VARCHAR(256),
	template VARCHAR(256) NOT NULL,
	topic VARCHAR(256),
	filename VARCHAR(256),
	reg_date TIMESTAMP
);

DROP TABLE categories;
CREATE TABLE categories (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	label VARCHAR(100) NOT NULL,
	url VARCHAR(100) NOT NULL,
	type INT(11) NOT NULL,
	sort INT(11) NOT NULL,
	parent_id INT(11) NOT NULL,
	reg_date TIMESTAMP
);

DROP TABLE photos;
CREATE TABLE photos (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	url VARCHAR(100) NOT NULL,
	type INT(11) NOT NULL,
	size INT(11) NOT NULL,
	reg_date TIMESTAMP
);

DROP TABLE posts
CREATE TABLE posts (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	title text COLLATE utf8_unicode_ci NOT NULL,
	descr text COLLATE utf8_unicode_ci NOT NULL,
	url_thumb text COLLATE utf8_unicode_ci NOT NULL,
	slug text COLLATE utf8_unicode_ci NOT NULL,
	keywords text COLLATE utf8_unicode_ci NOT NULL,
	body longtext COLLATE utf8_unicode_ci NOT NULL,
	cate_1_id INT(11) NOT NULL,
	cate_2_id INT(11) NOT NULL,
	cate_3_id INT(11) NOT NULL,
	author_id INT(11) NOT NULL,
	status INT(11) NOT NULL,
	view INT(11) NOT NULL,
	reg_date TIMESTAMP
)