drop table if exists aux;

create table aux as
SELECT a.fl_id_animal,d.idpersona,'8888',concat(fechainicio) as kk,observaciones 
FROM intranet.adoptantes as d, albergue.tb_animales as a
where d.idanimal=a.fl_registro;

insert into tb_adopciones (fl_id_animal, fl_id_persona, fl_id_voluntario, fl_fecha,fl_observaciones)
SELECT d.fl_id_animal,p.fl_id_persona,'8888',kk,observaciones 
FROM albergue.aux as d, albergue.tb_personas as p
where d.idpersona=p.fl_id
;

drop table if exists aux;

