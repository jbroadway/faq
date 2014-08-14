create table #prefix#faq (
	id int not null auto_increment primary key,
	question char(128) not null,
	answer text not null,
	sort int not null,
	category int not null default 0,
	index (category, sort)
);

create table #prefix#faq_category (
	id int not null auto_increment primary key,
	name char(72) not null,
	index (name)
);