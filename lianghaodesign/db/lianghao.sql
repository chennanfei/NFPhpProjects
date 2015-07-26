create databse if not exists lianghao default charset utf8 collate utf8_general_ci?

/* users */
create table users (
    id varchar(20) not null,
    password varchar(60) not null,
    login_ip varchar(16) not null,
    login_time datetime not null,
    primary key(id)
) engine=InnoDB default charset=utf8;

insert into users values(
    'liufenghua',
    '$2y$10$8nq6YrxBqBFm/vwsTBXp/.yy8XMKb22lruzONdbv69Ls84CRGMWWu',
    '192.168.1.6',
    '2015-01-01 12:00:00'
);

/* site_channels */
create table site_channels (
    id int auto_increment not null,
    english_title varchar(20) not null,
    chinese_title varchar(20) not null,
    primary key (id)
) engine=InnoDB default charset=utf8;

insert into site_channels values(null, 'Work', '工作'),(null, 'Life', '生活');

/* programs */
create table programs (
    id int auto_increment not null,
    english_title varchar(20) not null,
    chinese_title varchar(20) not null,
    display_order int not null,
    site_channel_id int not null,
    primary key (id),
    constraint programs_sc_id foreign key(site_channel_id) references site_channels(id)
) engine=InnoDB default charset=utf8;

insert into programs values(null, 'Wayfinding System', 'Wayfinding System', 1, 1),
    (null, 'Website Design', 'Website Design', 2, 1),
    (null, 'Branding & VI System', 'Branding & VI System', 3, 1),
    (null, 'Other Design', 'Other Design', 4, 1),
    (null, 'News', 'News', 1, 2),
    (null, 'Team', 'Team', 2, 2),
    (null, 'Products', 'Products', 3, 2),
    (null, 'Discovery', 'Discovery', 4, 2);

/* gateway_images */
create table gateway_images (
    id int auto_increment not null,
    image_name varchar(120) not null,
    creator varchar(20) not null,
    created_time datetime not null,
    updated_time datetime not null,
    display_order int not null,
    site_channel_id int not null,
    primary key (id),
    constraint gwi_sc_id foreign key(site_channel_id) references site_channels(id),
    constraint gwi_uid foreign key(creator) references users(id)
);

insert into gateway_images values(null, 'test.jpg', 'liufenghua', '2015-01-01 12:00:00', '2015-01-01 12:00:00', 1, 1);
insert into gateway_images values(null, 'test2.jpg', 'liufenghua', '2015-01-01 12:00:00', '2015-01-01 12:00:00', 2, 1);
