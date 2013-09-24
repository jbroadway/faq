create table #prefix#faq (
	id int not null auto_increment primary key,
	question char(128) not null,
	answer text not null,
	sort int not null,
	index (sort)
);