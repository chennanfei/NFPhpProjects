use lianghao;

/* users */
create table users (
    id varchar(20) not null,
    password varchar(60) not null,
    login_ip varchar(16) not null,
    login_time datetime not null,
    primary key(id)
) engine=InnoDB default charset=utf8;

/* site_channels */
create table site_channels (
    id varchar(10) not null,
    english_title varchar(20) not null,
    chinese_title varchar(20) not null,
    primary key (id)
) engine=InnoDB default charset=utf8;

/* programs */
create table programs (
    id varchar(20) not null,
    english_title varchar(20) not null,
    chinese_title varchar(20) not null,
    display_order int not null,
    site_channel_id varchar(10) not null,
    primary key (id),
    constraint programs_sc_id foreign key(site_channel_id) references site_channels(id)
) engine=InnoDB default charset=utf8;

/* gateway_images */
create table gateway_images (
    id int auto_increment not null,
    image_name varchar(120) not null,
    creator varchar(20) not null,
    created_time datetime not null,
    updated_time datetime not null,
    display_order int not null,
    site_channel_id varchar(10) not null,
    primary key (id),
    constraint gwi_sc_id foreign key(site_channel_id) references site_channels(id),
    constraint gwi_uid foreign key(creator) references users(id)
) engine=InnoDB default charset=utf8;

create table projects (
    id int auto_increment not null,
    creator varchar(20) not null,
    chinese_address varchar(100),
    chinese_description varchar(1000),
    chinese_title varchar(200),
    display_order int not null default 1,
    english_address varchar(100),
    english_description varchar(1000),
    english_title varchar(200),
    project_date varchar(12),
    status tinyint not null default 1,
    show_description tinyint not null default 0,
    program_id varchar(20) not null,
    created_time datetime not null,
    updated_time datetime not null,
    primary key (id),
    constraint proj_pid foreign key(program_id) references programs(id),
    constraint proj_uid foreign key(creator) references users(id)
) engine=InnoDB default charset=utf8;

create table project_images (
    id int auto_increment not null,
    image_name varchar(120) not null,
    alias_name varchar(80) null,
    creator varchar(20) not null,
    created_time datetime not null,
    updated_time datetime not null,
    display_order int not null,
    display_position varchar(10) not null default 'center',
    project_id varchar(20) not null,
    is_previewed boolean not null default 0,
    is_half boolean not null default 0,
    primary key (id),
    constraint project_images_uid foreign key(creator) references users(id)
) engine=InnoDB default charset=utf8;

create table team_members (
    id int auto_increment not null,
    image_name varchar(120) not null,
    member_name varchar(120) not null,
    creator varchar(20) not null,
    created_time datetime not null,
    updated_time datetime not null,
    display_order int not null,
    primary key (id),
    constraint ti_uid foreign key(creator) references users(id)
) engine=InnoDB default charset=utf8;

alter table project_images add alias_name varchar(80) null;


insert into users values(
    'liufenghua',
    '$2y$10$8nq6YrxBqBFm/vwsTBXp/.yy8XMKb22lruzONdbv69Ls84CRGMWWu',
    '192.168.1.6',
    '2015-01-01 12:00:00'
);

insert into site_channels values('work', 'Work', '工作'),('life', 'Life', '生活');

insert into programs values('guideDesign', 'Wayfinding System', 'Wayfinding System', 1, 'work'),
    ('webDesign', 'Website Design', 'Website Design', 2, 'work'),
    ('brandDesign', 'Branding & VI System', 'Branding & VI System', 3, 'work'),
    ('otherDesign', 'Other Design', 'Other Design', 4, 'work'),
    ('lifeNews', 'News', 'News', 1, 'life'),
    ('lifeTeam', 'Team', 'Team', 2, 'life'),
    ('lifeDays', 'Products', 'Products', 3, 'life'),
    ('lifeDiscovery', 'Discovery', 'Discovery', 4, 'life');
