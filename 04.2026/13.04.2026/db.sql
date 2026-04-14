create or replace table types
(
    type_id int unsigned auto_increment
        primary key,
    name    varchar(100) null
);

create or replace table tanks
(
    tank_id int auto_increment
        primary key,
    name    varchar(255) null,
    vin     varchar(17)  null,
    type_id int unsigned null,
    constraint tanks_types_type_id_fk
        foreign key (type_id) references types (type_id)
);

