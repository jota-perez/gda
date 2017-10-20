insert into tb_animales_ficha_sanitaria
	(fl_id_animal,fl_id_persona,fl_fecha,fl_tratamiento)
SELECT a.fl_id_animal,8888,fecha,tratamiento FROM intranet.fichavet as f
inner join albergue.tb_animales as a
on f.idanimal=a.fl_registro
where f.fecha > '2010-01-01'