create sequence faq_id_seq;

create table faq (
	id integer not null default nextval('faq_id_seq') primary key,
	question char(48) not null,
	answer char(48) not null
);