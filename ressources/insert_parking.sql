Insert Into PLACE (NUmPlace,Etat)
Values
(1,0),
(2,0),
(3,0),
(4,0),
(5,0),
(6,1),
(7,0);


Insert Into UTILISATEUR (IDpersonne,MotDePasse,Nom,Prenom,Tel, AdRue,CP,Ville,Mail,Etat,NumPlace)
Values
(60, '$2y$10$J7TncI0McaNwxtRi6u9GeePqvQ1KGSki4K/RxDd/AEj3eOBUl0HO.', 'Carole','demz','0326339685', '4, rue Brule', '51200', 'FISMES','test@gmail.com',0,1),
(56, '$2y$10$J7TncI0McaNwxtRi6u9GeePqvQ1KGSki4K/RxDd/AEj3eOBUl0HO.', 'Antoinette','flor', '0326339685', '1, rue de la Mediterranee', '51140', 'ROMAIN','test@gmail.com',0,2),
(47, '$2y$10$J7TncI0McaNwxtRi6u9GeePqvQ1KGSki4K/RxDd/AEj3eOBUl0HO.', 'Sandrine','flem', '0326339685', '21 rue de la Mediterranee', '51100', 'REIMS','test@gmail.com',0,3),
(48, '$2y$10$J7TncI0McaNwxtRi6u9GeePqvQ1KGSki4K/RxDd/AEj3eOBUl0HO.', 'Laurence','prin', '0326339685','15 rue Pasentiers', '51100', 'REIMS','test@gmail.com',0,4),
(59, '$2y$10$J7TncI0McaNwxtRi6u9GeePqvQ1KGSki4K/RxDd/AEj3eOBUl0HO.', 'Lucille','teuf','0326339685', '12 place Centrale', '02320', 'LONGUEVAL','test@gmail.com',0,5),
(17, '$2y$10$J7TncI0McaNwxtRi6u9GeePqvQ1KGSki4K/RxDd/AEj3eOBUl0HO.', 'Lucien','ti', '0326339685', '12 rue de la Justice', '51100',	'REIMS','test@gmail.com',0,6),
(46, '$2y$10$J7TncI0McaNwxtRi6u9GeePqvQ1KGSki4K/RxDd/AEj3eOBUl0HO.', '_','test', '0326339685', '103 avenue Lear', '51100', 'REIMS','test@gmail.com',0,7);

Insert Into ADMIN (IDAdmin,MotDePasse)
Values
('ADMIN','$2y$10$J7TncI0McaNwxtRi6u9GeePqvQ1KGSki4K/RxDd/AEj3eOBUl0HO.');


Insert Into LIGUE (NumLigue,AdresseRue,CP,Ville)
Values
('0001','8 rue de la compoterie','79885','Caen');

Insert Into LISTEATTENTE (Rang,IDpersonne)
Values
(1,60),
(2,56),
(3,47);

Insert Into RESERVATION (NumReservation,DateReservation,DateExpiration,NUmPlace,IDpersonne)
Values
(00000,'2015-08-28','2015-08-29',1,60),
(00001,'2015-08-28','2015-08-29',2,56),
(00002,'2015-08-28','2015-08-29',3,47);
