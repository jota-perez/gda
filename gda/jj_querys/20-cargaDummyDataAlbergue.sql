INSERT INTO `tb_albergue_localizaciones` VALUES 
    (1,'h1',10,now(),now()),
	(2,'c1',10,now(),now()),
	(3,'ni1',10,now(),now()),
	(4,'nd1',10,now(),now());


insert into tb_aux_origenes (fl_origen_es)
	select distinct lower(trim(procedenciadestino)) 
    from intranet.entradasalidas
    where entradasalida like '%Entrada%' and procedenciadestino!='' and procedenciadestino is not null
    and procedenciadestino not like '%-%-%';
