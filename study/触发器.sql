




触发器 trigger

需求：

商品表：goods

订单表：order

分析：

监视谁：ord

监视动作：insert

触发时间：after

触发事件：update



create table good(
gid int,
name varchar(20),
num smallint
);

create table ord(
oid int,
gid int,
much smallint
);

insert into good values
('1','cat','34'),
('2','dog','65'),
('3','pig','21');


查看：show triggers
删除：drop trigger name

delimiter $

create trigger t1
after
insert
on ord
for each row
begin
update good set num = num-2 where gid = 1;
end$

create trigger t1
after
insert
on ord
for each row
begin
update good set num = num-new.much where gid = new.gid;
end$

create trigger t3
after
delete
on ord
for each row
begin
update good set num = num+old.much where gid = old.gid;
end$

#修改订单数量（仅仅改数量）
create trigger t4
before
update
on ord
for each row
begin
update good set num = num + old.much - new.much where gid = old.gid;
end$

防止爆仓
create trigger t5
before
insert
on ord
for each row
begin

declare
rnum int;
select num into @rnum from good where gid = new.gid;

if new.much > rnum then
	set new.much = rnum;
end if;

update good set num = num-new.much where gid = new.gid;
end$