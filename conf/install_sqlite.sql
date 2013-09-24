create table #prefix#faq (
	id integer primary key,
	question char(128) not null,
	answer text not null,
	sort int not null
);

create index #prefix#faq_sort on #prefix#faq (sort);
