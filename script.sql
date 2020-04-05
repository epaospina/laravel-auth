create table migrations
(
    id        serial       not null
        constraint migrations_pkey
            primary key,
    migration varchar(255) not null,
    batch     integer      not null
);

alter table migrations
    owner to postgres;

create table users
(
    id                serial       not null
        constraint users_pkey
            primary key,
    name              varchar(191) not null,
    email             varchar(191) not null
        constraint users_email_unique
            unique,
    email_verified_at timestamp(0),
    password          varchar(191) not null,
    remember_token    varchar(100),
    created_at        timestamp(0),
    updated_at        timestamp(0)
);

alter table users
    owner to postgres;

create table password_resets
(
    email      varchar(191) not null,
    token      varchar(191) not null,
    created_at timestamp(0)
);

alter table password_resets
    owner to postgres;

create index password_resets_email_index
    on password_resets (email);

create table roles
(
    id          serial       not null
        constraint roles_pkey
            primary key,
    name        varchar(191) not null,
    description varchar(191) not null,
    created_at  timestamp(0),
    updated_at  timestamp(0)
);

alter table roles
    owner to postgres;

create table role_user
(
    id         serial  not null
        constraint role_user_pkey
            primary key,
    role_id    integer not null,
    user_id    integer not null,
    created_at timestamp(0),
    updated_at timestamp(0)
);

alter table role_user
    owner to postgres;

create table customer
(
    id         serial       not null
        constraint customer_pkey
            primary key,
    signing    varchar(191) not null,
    addresses  varchar(191) not null,
    city       varchar(191) not null,
    postal_cod varchar(191) not null,
    phone      varchar(191),
    mobile     varchar(191) not null,
    email      varchar(191) not null,
    created_at timestamp(0),
    updated_at timestamp(0),
    province   varchar(191)
);

alter table customer
    owner to postgres;

create table information_car
(
    id          serial               not null
        constraint information_car_pkey
            primary key,
    model_car   varchar(191)         not null,
    color_car   varchar(191),
    vin         varchar(191)         not null,
    documents   varchar(191)         not null,
    customer_id integer              not null
        constraint information_car_customer_id_foreign
            references customer,
    created_at  timestamp(0),
    updated_at  timestamp(0),
    status      boolean default true not null,
    is_pending  boolean default true not null
);

alter table information_car
    owner to postgres;

create table driver_data
(
    id         serial       not null
        constraint driver_data_pkey
            primary key,
    user_id    integer      not null
        constraint driver_data_user_id_foreign
            references users,
    cap        varchar(191) not null,
    date_cap   date         not null,
    created_at timestamp(0),
    updated_at timestamp(0)
);

alter table driver_data
    owner to postgres;

create table services
(
    id         serial           not null
        constraint services_pkey
            primary key,
    nombre     varchar(191)     not null,
    precio     double precision not null,
    created_at timestamp(0),
    updated_at timestamp(0)
);

alter table services
    owner to postgres;

create table cars_pending
(
    id         serial       not null
        constraint cars_pending_pkey
            primary key,
    array_cars varchar(191) not null,
    user_id    integer      not null,
    created_at timestamp(0),
    updated_at timestamp(0)
);

alter table cars_pending
    owner to postgres;

create table countries
(
    id         serial       not null
        constraint countries_pkey
            primary key,
    country    varchar(191) not null,
    created_at timestamp(0),
    updated_at timestamp(0)
);

alter table countries
    owner to postgres;

create table load_orders
(
    id                 serial               not null
        constraint load_orders_pkey
            primary key,
    hash               varchar(191),
    contact_person     varchar(191)         not null,
    customer_id        integer              not null
        constraint load_orders_customer_id_foreign
            references customer,
    date_upload        timestamp(0)         not null,
    bill_to            varchar(191)         not null,
    import_company     varchar(191)         not null,
    created_at         timestamp(0),
    updated_at         timestamp(0),
    status             boolean default true not null,
    price              double precision,
    constancy          varchar(191),
    payment_type_other varchar(191),
    countries_id       integer default 1    not null
        constraint load_orders_countries_id_foreign
            references countries
);

alter table load_orders
    owner to postgres;

create table data_download
(
    id                  serial       not null
        constraint data_download_pkey
            primary key,
    contact_download    varchar(191) not null,
    load_orders_id      integer      not null
        constraint data_download_load_orders_id_foreign
            references load_orders,
    driver_data_id      integer      not null
        constraint data_download_driver_data_id_foreign
            references driver_data,
    cmr                 varchar(191) not null,
    observations        varchar(191) not null,
    addresses_download  varchar(191) not null,
    city_download       varchar(191) not null,
    postal_cod_download varchar(191) not null,
    mobile_download     varchar(191) not null,
    created_at          timestamp(0),
    updated_at          timestamp(0)
);

alter table data_download
    owner to postgres;

create table bills
(
    id                serial                                                           not null
        constraint bills_pkey
            primary key,
    num_bill          varchar(191)                                                     not null,
    name_client       varchar(191)                                                     not null,
    department_client varchar(191)                                                     not null,
    city_client       varchar(191)                                                     not null,
    address_client    varchar(191)                                                     not null,
    postal_cod_client varchar(191)                                                     not null,
    description       varchar(191)                                                     not null,
    unit_price        varchar(191)                                                     not null,
    price             varchar(191)                                                     not null,
    iva               varchar(191)                                                     not null,
    cif               varchar(191) default 'B-00000000'::character varying             not null,
    observations      varchar(191)                                                     not null,
    payment_type      varchar(191) default 'Transferencia Bancaria'::character varying not null,
    load_orders_id    integer                                                          not null
        constraint bills_load_orders_id_foreign
            references load_orders,
    created_at        timestamp(0),
    updated_at        timestamp(0)
);

alter table bills
    owner to postgres;

create table data_load
(
    id              serial       not null
        constraint data_load_pkey
            primary key,
    addresses_load  varchar(191) not null,
    city_load       varchar(191) not null,
    postal_cod_load varchar(191) not null,
    phone_load      varchar(191),
    mobile_load     varchar(191) not null,
    load_orders_id  integer      not null
        constraint data_load_load_orders_id_foreign
            references load_orders,
    created_at      timestamp(0),
    updated_at      timestamp(0),
    date_load       date
);

alter table data_load
    owner to postgres;

create table order_cmr
(
    id         serial       not null
        constraint order_cmr_pkey
            primary key,
    enrollment varchar(191) not null,
    created_at timestamp(0),
    updated_at timestamp(0)
);

alter table order_cmr
    owner to postgres;


