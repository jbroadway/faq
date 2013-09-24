create sequence #prefix#faq_id_seq;

create table #prefix#faq (
	id integer not null default nextval('#prefix#faq_id_seq') primary key,
	question char(128) not null,
	answer text not null,
	sort int not null
);

create index #prefix#faq_sort on #prefix#faq (sort);
