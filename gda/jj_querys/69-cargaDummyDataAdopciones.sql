drop table if exists albergue.aux;
create table aux
SELECT idanimal,concat(fecha) as kk,entradasalida,procedenciadestino,observaciones
FROM intranet.entradasalidas as i
where i.idanimal in (select fl_registro from tb_animales);

insert into tb_animales_libro_registro
(fl_id_animal,fl_fecha,fl_tipo,fl_ori_des,fl_observaciones)
SELECT a.fl_id_animal,kk,entradasalida,procedenciadestino,observaciones
FROM aux as i
inner join albergue.tb_animales as a
	on i.idanimal=a.fl_registro
;