-- Esto es un comentario

SELECT * FROM users;
SELECT * FROM crud.users;
SELECT name, email, password FROM users;
SELECT name, email FROM users WHERE email LIKE '2';
SELECT name, email FROM users WHERE email LIKE 'e%';
SELECT count(*) FROM users;
SELECT count(*) as Numusers FROM users;
SELECT name AS minombre, email as MiEMAIL FROM users;

SELECT name, email, city
FROM users, cities
WHERE cities_idcity = cities.idcity;

SELECT name, email, city
FROM users
INNER JOIN cities
ON idcity = users.cities_idcity;

-- Usuarios que estan en "Barcelona"
SELECT name, email, city
FROM users
INNER JOIN cities
ON idcity = users.cities_idcity
WHERE city LIKE "Barcelona";

-- Usuarios y sus hobbies
SELECT name, email, hobby
FROM users
INNER JOIN users_has_hobbies
ON users_iduser = users.iduser
INNER JOIN hobbies
ON idhobby = users_has_hobbies.hobbies_idhobby;

-- Ciudades que no tienen usuarios
SELECT city, email
FROM cities LEFT JOIN users
ON cities_idcity = cities.idcity 
WHERE users.iduser is null;

SELECT city, email
FROM cities LEFT JOIN users
ON cities_idcity = cities.idcity 
WHERE isnull(users.iduser);

-- Usuarios y sus hobbies separados por comas
SELECT name, email, group_concat(hobby)
FROM users
INNER JOIN users_has_hobbies
ON users_iduser = users.iduser
INNER JOIN hobbies
ON idhobby = users_has_hobbies.hobbies_idhobby
GROUP BY iduser;









