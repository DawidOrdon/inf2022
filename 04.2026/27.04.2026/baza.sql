create or replace table stop_cafe
(
    id    int unsigned auto_increment
        primary key,
    nazwa varchar(100) null,
    cena  float        null
);