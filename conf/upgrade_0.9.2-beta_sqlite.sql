alter table #prefix#faq add column "category" "int not null default 0";

alter table #prefix#faq add index (category, sort);

create table #prefix#faq_category (
	id int not null auto_increment primary key,
	name char(72) not null,
	index (name)
);