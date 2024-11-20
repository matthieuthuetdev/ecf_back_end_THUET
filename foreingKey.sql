USE festival;

ALTER TABLE `candidats` ADD CONSTRAINT `user_dep` FOREIGN KEY (`departement_user`) REFERENCES `departements` (`id_dep`);