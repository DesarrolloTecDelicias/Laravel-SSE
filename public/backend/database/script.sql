INSERT INTO `careers` (`name`, `created_at`, `updated_at`) VALUES ('INGENIERÍA INDUSTRIAL', NOW(), NOW());
INSERT INTO `careers` (`name`, `created_at`, `updated_at`) VALUES ('INGENIERÍA ELECTROMECÁNICA', NOW(), NOW());
INSERT INTO `careers` (`name`, `created_at`, `updated_at`) VALUES ('INGENIERÍA SISTEMAS COMPUTACIONALES', NOW(), NOW());
INSERT INTO `careers` (`name`, `created_at`, `updated_at`) VALUES ('INGENIERÍA GESTIÓN EMPRESARIAL', NOW(), NOW());
INSERT INTO `careers` (`name`, `created_at`, `updated_at`) VALUES ('INGENIERÍA ENERGÍAS RENOVABLES', NOW(), NOW());
INSERT INTO `careers` (`name`, `created_at`, `updated_at`) VALUES ('INGENIERÍA EN TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIONES', NOW(), NOW());
INSERT INTO `careers` (`name`, `created_at`, `updated_at`) VALUES ('LICENCIATURA EN INFORMÁTICA', NOW(), NOW());

-- Especialidades
----Industrial
SELECT @industrial := `id` FROM careers WHERE name = 'INGENIERÍA INDUSTRIAL';
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('CALIDAD Y MANUFACTURA', @industrial, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('MANUFACTURA Y PRODUCTIVIDAD', @industrial, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('MANUFACTURA INTELIGENTE', @industrial, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('HERRAMIENTAS DE MANUFACTURA Y MEJORA CONTINUA', @industrial, NOW(), NOW());


----Electromecánica
SELECT @electro := `id` FROM careers WHERE name = 'INGENIERÍA ELECTROMECÁNICA';
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('INSTRUMENTACIÓN', @electro, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('INSTRUMENTACIÓN Y CONTROL', @electro, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('MECATRÓNICA', @electro, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('AUTOMATIZACIÓN Y CONTROL', @electro, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('SISTEMAS DE PROGRAMACIÓN ELECTRÓNICA', @electro, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('AUTOMATIZACIÓN', @electro, NOW(), NOW());


----Sistemas
SELECT @sistemas := `id` FROM careers WHERE name = 'INGENIERÍA SISTEMAS COMPUTACIONALES';
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('REDES Y SISTEMAS DISTRIBUIDOS', @sistemas, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIONES', @sistemas, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('ADMINISTRACIÓN DE TECNOLOGÍAS DE LA INFORMACIÓN', @sistemas, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('ESTÁNDARES ABIERTOS', @sistemas, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('INGENIERÍA DE SOFTWARE', @sistemas, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('DESARROLLO ÁGIL DE SOFTWARE', @sistemas, NOW(), NOW());


----Electromecánica
SELECT @gestion := `id` FROM careers WHERE name = 'INGENIERÍA GESTIÓN EMPRESARIAL';
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('DESARROLLO GLOBAL DE NEGOCIOS', @gestion, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('CREACIÓN Y DESARROLLO ESTRATÉGICO DE NEGOCIOS', @gestion, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('DESARROLLO DE NEGOCIOS INTERNACIONALES', @gestion, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('CALIDAD EN EL DESARROLLO ESTRATÉGICO DE NEGOCIOS', @gestion, NOW(), NOW());


----Renovables
SELECT @renovables := `id` FROM careers WHERE name = 'INGENIERÍA ENERGÍAS RENOVABLES';
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('MODELADO SOLAR Y EÓLICO', @renovables, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('DISEÑO SOLAR Y EÓLICO', @renovables, NOW(), NOW());


----Tics
SELECT @tics := `id` FROM careers WHERE name = 'INGENIERÍA EN TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIONES';
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('ADMINISTRACIÓN DE LA INFORMACIÓN DIGITAL', @tics, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('INTERCONECTIVIDAD DE REDES', @tics, NOW(), NOW());


----Info
SELECT @info := `id` FROM careers WHERE name = 'LICENCIATURA EN INFORMÁTICA';
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('SISTEMAS DE INFORMACIÓN', @info, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('TECNOLOGÍAS DE LA INFORMACIÓN Y GESTIÓN', @info, NOW(), NOW());
INSERT INTO `specialties` (`name`, `id_career`, `created_at`, `updated_at`) VALUES ('GESTIÓN DE TECNOLOGÍAS DE LA INFORMACIÓN', @info, NOW(), NOW());


