INSERT INTO Alias (Alias_ID, Criminal_ID, Alias)
VALUES (298492, 382764, 'Big Jake'),
       (003631, 052523, 'Sprite'),
       (725517, 538982, 'Gunner'),
       (127383, 210735, 'Lil K'),
       (435769, 261552, 'Jesus'),
       (127486, 527184, 'KJ'),
       (048731, 637237, 'Dawg')
       (255274, 578629, 'Spice')
       (269385, 811248, 'JD'),
       (513894, 342378, 'Monster');

INSERT INTO Criminals (Criminal_ID, Last, First, Street, City, State, Zip, Phone, V_status, P_status)
VALUES (382764, 'Burke', 'Jake', '872 Stetson Ave', 'Palo Alto', 'CA', '28746', '5109873772', 'N', 'N'),
       (052523, 'Mckinney', 'Michael', '1028 Matte St', 'Taccoa', 'GA', '56280', '8167239091', 'N', 'N'),
       (538982, 'Stone', 'Trevon', '97 Fulton Ave', 'Jackson', 'MS', '90626', '9532458983', 'N', 'N'),
       (210735, 'Yates', 'Kyle', '261 Yoder Ave', 'Concord', 'CA', '14382', '3052642852', 'N', 'N'),
       (261552, 'Taylor', 'Preston', '783 Chung St', 'Queens', 'NY', '38861', '9168728043', 'N', 'N'),
       (527184, 'Berry', 'Kendrick', '20 James St', 'San Francisco', 'CA', '93428', '4159283825', 'N', 'N'),
       (637237, 'Brennan', 'Simon', '2489 Red Blvd', 'Deerfield Beach', 'FL', '86473', '8022348658', 'N', 'N'),
       (578629, 'Moss', 'Wilson', '267 Brick Ave', 'Jackson', 'MS', '41871', '2873641407', 'N', 'N'),
       (811248, 'Palmer', 'Jarvis', '90126 Lowe Rd', 'Denver', 'CO', '53008', '4529854801', 'N', 'N'),
       (342378, 'Whitaker', 'Derrick', '1408 Decker', 'New York', 'NY', '10036', '9172895230', 'N', 'N');

INSERT INTO Crimes (Crime_ID, Criminal_ID, Classification, Date_charged, Status, Hearing_date, Appeal_cut_date)
VALUES (534687156, 382764, 'U', '2022-08-23', 'CL', '2023-07-19', '2023-08-19'),
       (582375231, 052523, 'U', '2021-12-19', 'CA', '2022-05-20', '2022-06-20'),
       (147289047, 538982, 'U', '2022-10-04', 'IA', '2023-10-24', '2023-11-24'),
       (417289336, 210735, 'U', '2022-02-20', 'CA', '2022-08-02', '2022-09-02'),
       (298342834, 261552, 'U', '2022-11-20', 'CA', '2023-04-11', '2023-05-11'),
       (156789398, 527184, 'U', '2022-07-30', 'CL', '2022-12-15', '2023-01-15'),
       (473902517, 637237, 'U', '2021-01-01', 'CA', '2021-09-29', '2021-10-29'),
       (109293744, 578629, 'U', '2021-02-05', 'IA', '2021-10-07', '2021-11-07'),
       (936410853, 811248, 'U', '2022-06-12', 'CL', '2023-05-21', '2023-06-21'),
       (157809343, 342378, 'U', '2022-05-15', 'CA', '2022-12-18', '2023-01-18');