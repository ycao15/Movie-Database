-- Movie
load data local infile '~/data/movie.del' into table Movie
	fields terminated by ',' optionally enclosed by '"';

-- Actor
load data local infile '~/data/actor1.del' into table Actor
	fields terminated by ',' optionally enclosed by '"';
load data local infile '~/data/actor2.del' into table Actor
	fields terminated by ',' optionally enclosed by '"';
load data local infile '~/data/actor3.del' into table Actor
	fields terminated by ',' optionally enclosed by '"';

-- Sales
load data local infile '~/data/sales.del' into table Sales
	fields terminated by ',' optionally enclosed by '"';

-- Director
load data local infile '~/data/director.del' into table Director
	fields terminated by ',' optionally enclosed by '"';

-- MovieGenre
load data local infile '~/data/moviegenre.del' into table MovieGenre
	fields terminated by ',' optionally enclosed by '"';

-- MovieDirector
load data local infile '~/data/moviedirector.del' into table MovieDirector
	fields terminated by ',';

-- MovieActor
load data local infile '~/data/movieactor1.del' into table MovieActor
	fields terminated by ',' optionally enclosed by '"';
load data local infile '~/data/movieactor2.del' into table MovieActor
	fields terminated by ',' optionally enclosed by '"';

-- MovieRating
load data local infile '~/data/movierating.del' into table MovieRating
	fields terminated by ',';

-- MaxPersonID
insert into MaxPersonID values(69000);

-- MaxMovieID
insert into MaxMovieID values(4750);
	