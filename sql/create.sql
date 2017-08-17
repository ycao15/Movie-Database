-- Movie
create table Movie(
	id INT not null, 
	title VARCHAR(100) not null, 
	year INT not null, 
	rating VARCHAR(10), 
	company VARCHAR(50), 
	primary key (id),
	check(year >= 1878 AND year <= 2017)) 
		-- first ever motion footage was in 1878 (the horse)
	ENGINE = INNODB;

-- Actor
create table Actor(
	id INT not null, 
	last VARCHAR(20) not null, 
	first VARCHAR(20) not null, 
	sex VARCHAR(6) not null, 
	dob DATE not null, 
	dod DATE,
	primary key (id),
	check (sex = 'Female' OR sex = 'Male'))
	ENGINE = INNODB;

-- Sales
create table Sales(
	mid INT not null, 
	ticketsSold INT not null, 
	totalIncome INT not null,
	foreign key (mid) references Movie(id))
	ENGINE = INNODB;

-- Director
create table Director(
	id INT not null, 
	last VARCHAR(20) not null, 
	first VARCHAR(20) not null, 
	dob DATE not null, 
	dod DATE,
	primary key (id))
	ENGINE = INNODB;

-- MovieGenre
create table MovieGenre(
	mid INT not null, 
	genre VARCHAR(20) not null,
	foreign key (mid) references Movie(id))
	ENGINE = INNODB;

-- MovieDirector
create table MovieDirector(
	mid INT not null, 
	did INT not null,
	foreign key (mid) references Movie(id),
	foreign key (did) references Director(id))
	ENGINE = INNODB;

-- MovieActor
create table MovieActor(
	mid INT not null, 
	aid INT not null, 
	role VARCHAR(50),
	foreign key (mid) references Movie(id),
	foreign key (aid) references Actor(id))
	ENGINE = INNODB;

-- MovieRating
create table MovieRating(
	mid INT not null, 
	imdb INT not null, 
	rot INT not null,
	foreign key (mid) references Movie(id),
	check (rot >= 0 AND rot <= 100 AND imdb >= 0 AND imdb <= 100))
	ENGINE = INNODB;

-- Review
create table Review(
	name VARCHAR(20), 
	time TIMESTAMP not null, 
	mid INT not null, 
	rating INT not null, 
	comment VARCHAR(500),
	foreign key (mid) references Movie(id),
	check (rating >= 0 AND rating <= 100))
	ENGINE = INNODB;

-- MaxPersonID
create table MaxPersonID(id INT not null)
	ENGINE = INNODB;

-- MaxMovieID
create table MaxMovieID(id INT not null)
	ENGINE = INNODB;
	