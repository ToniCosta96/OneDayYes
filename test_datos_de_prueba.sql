
ALTER TABLE usuarios AUTO_INCREMENT = 1;
INSERT INTO `usuarios` (`username`, `name`, `password`, `email`, `roles`, `fecha_creacion`) VALUES
('a', 'usuario admin', '$2y$13$wRFdOegtZzjmpXKq4k40q.pRZmcYK353rNZRmVFV8spm0GG3yFqOS', 'admin1@gmail.com', '[\"ROLE_ADMIN\"]', '2018-02-04'),
('user', 'usuario', '$2y$13$wRFdOegtZzjmpXKq4k40q.pRZmcYK353rNZRmVFV8spm0GG3yFqOS', 'user@gmail.com', '[\"ROLE_USER\"]', '2018-02-05'),
('admin', 'administrador', '$2y$13$JTfq6JaFursmTwU4CD9R0ONvNveETxLy2Zk1N8egu9fRBuBr0fzZi', 'admin_2@gmail.com', '[\"ROLE_ADMIN\"]', '2018-02-10'),
('user2', 'usuario 2', '$2y$13$wRFdOegtZzjmpXKq4k40q.pRZmcYK353rNZRmVFV8spm0GG3yFqOS', 'u2@gmail.com', '[\"ROLE_USER\"]', '2018-02-15'),
('user3', 'usuario 3', '$2y$13$wRFdOegtZzjmpXKq4k40q.pRZmcYK353rNZRmVFV8spm0GG3yFqOS', 'u3@gmail.com', '[\"ROLE_USER\"]', '2018-02-16');

ALTER TABLE contacto AUTO_INCREMENT = 1;
INSERT INTO `contacto` (`nombre`, `email`, `asunto`, `comentario`) VALUES
('usuarioExterno', 'aa@a.com', 'asunto-', 'comentario comentario comentario comentario comentario comentario comentario comentario comentario comentario comentario comentario comentario comentario comentario comentario '),
('usuario 2', 'u2@gmail.com', 'Mensaje sobre Lamu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac gravida nulla, et fermentum sem. Quisque ac purus magna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras nisi lacus, porttitor at erat vitae, cursus sodales sapien. Phasellus vitae hendrerit tellus. Aliquam erat volutpat. Morbi at purus leo. Vivamus consequat gravida sem, ac venenatis lorem fringilla imperdiet.'),
('usuario 2', 'u2@gmail.com', 'Mensaje sobre Lamu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac gravida nulla, et fermentum sem. Quisque ac purus magna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras nisi lacus, porttitor at erat vitae, cursus sodales sapien. Phasellus vitae hendrerit tellus. Aliquam erat volutpat. Morbi at purus leo. Vivamus consequat gravida sem, ac venenatis lorem fringilla imperdiet.\r\n\r\nUt euismod elit vel nisi mollis efficitur. Praesent vel elementum enim, at venenatis nulla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean non massa a erat suscipit tincidunt nec non sapien. Cras faucibus eros in purus pellentesque lacinia. Vivamus vel leo ante. Sed vestibulum vestibulum purus, non consectetur lacus tincidunt quis. In hac habitasse platea dictumst. Donec venenatis sapien eu lacus tincidunt ultricies. Ut elementum non urna ut pellentesque. Sed lacinia rutrum neque non luctus. Vivamus sed egestas leo, vel fermentum risus. Sed euismod sagittis nulla et sollicitudin. Vivamus eu justo odio. Donec tincidunt tortor vel libero mattis pellentesque. Morbi at commodo nunc.\r\n\r\nNulla rutrum, turpis quis placerat vehicula, justo justo egestas enim, et auctor tellus erat id nisi. Fusce faucibus elit at nulla fringilla ultricies. Nullam quis lectus rhoncus, ultrices risus et, viverra enim. Pellentesque mattis in purus nec sollicitudin. Vestibulum quis molestie magna, quis bibendum sapien. Morbi ultrices, est vitae malesuada tempus, sapien dui egestas ligula, sit amet viverra felis erat ut ex. Nulla vulputate sagittis nunc at commodo.\r\n\r\nEtiam in nisi vel justo porta tristique. Praesent quis lorem mauris. Aliquam luctus, urna sed fermentum viverra, turpis nisi placerat purus, ut venenatis mauris mi eget justo. Nam venenatis tortor arcu, eu convallis ligula porta eget. Fusce massa sem, porta a tellus vel, lacinia egestas ante. Donec sit amet dolor varius, condimentum elit placerat, commodo dui. Sed suscipit libero justo, vel sollicitudin diam luctus sagittis.\r\n\r\nAenean fringilla porta libero, eget dapibus est placerat eu. Donec malesuada purus non iaculis mattis. In condimentum vestibulum leo quis rutrum. Aliquam lacinia sodales lectus, sed iaculis orci cursus at. Etiam ut diam pharetra, porttitor lorem in, consequat arcu. Mauris luctus viverra lorem in pretium. Integer maximus lacus ut mi feugiat tincidunt. Vivamus erat massa, rutrum interdum leo in, consectetur feugiat eros. Nunc quis risus ipsum.');
