
create table if not exists friends(
    `id` int primary key auto_increment ,
     `user_id` tinyint unsigned not null,
     `friends_id` tinyint unsigned not null ,
     `status` enum('approved','pending','rejected') default 'pending',
     `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);