<?php

return [
    'userManagement'          => [
        'title'          => 'Пользователи',
        'title_singular' => 'User management',
    ],
    'permission'              => [
        'title'          => 'Разрешения',
        'title_singular' => 'Разрешения',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Имя',
            'title_helper'      => '',
            'created_at'        => 'Дата обновления',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'                    => [
        'title'          => 'Роли',
        'title_singular' => 'Роль',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Имя',
            'title_helper'       => '',
            'permissions'        => 'Разрешения',
            'permissions_helper' => '',
            'created_at'         => 'Дата обновления',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'                    => [
        'title'          => 'Список',
        'title_singular' => 'Пользователя',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Имя',
            'familiya'                 => 'Фамилия',
            'otchestvo'                => 'Отчество',
            'num_licensy'              => 'Номер лицензии',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Пароль',
            'password_helper'          => '',
            'roles'                    => 'Роли',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
            'inn'                      => 'ИНН',
            'mfo'                      => 'МФО',
            'number'                   => 'Номер телефона',
            'description'              => 'Описание',
            'position'                 => 'Должность',
        ],
    ],
    'clientManagementSetting' => [
        'title'          => 'Организация',
        'title2'          => 'внутренного контроля',
        'title_singular' => 'Settings',
    ],
    'currency'                => [
        'title'          => 'Currencies',
        'title_singular' => 'Currency',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => '',
            'name'                 => 'Name',
            'name_helper'          => '',
            'code'                 => 'Currency code',
            'code_helper'          => '',
            'main_currency'        => 'Main currency',
            'main_currency_helper' => '',
            'created_at'           => 'Created at',
            'created_at_helper'    => '',
            'updated_at'           => 'Updated At',
            'updated_at_helper'    => '',
            'deleted_at'           => 'Deleted At',
            'deleted_at_helper'    => '',
        ],
    ],
    'transactionType'         => [
        'title'          => 'Надзорное ведомство',
        'title_singular' => 'Вид организации',
        'fields'         => [
            'id'                => 'ID',
            'add'                => 'Добавить',
            'id_helper'         => '',
            'name'              => 'Наименование',
            'name_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
        ],
    ],
    'incomeSource'            => [
        'title'          => 'ПВК',
        'title_singular' => 'Добавить файл',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'name'               => 'Наименование',
            'name_helper'        => '',
            'fee_percent'        => 'Fee Percent',
            'fee_percent_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => '',
            'file'               => 'Файл',
            'download'           => 'Скачать',
        ],
    ],
    'clientStatus'            => [
        'title'          => 'Client statuses',
        'title_singular' => 'Client status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
        ],
    ],
    'projectStatus'           => [
        'title'          => 'Project statuses',
        'title_singular' => 'Project status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
        ],
    ],
    'clientManagement'        => [
        'title'          => 'Client management',
        'title_singular' => 'Client management',
    ],
    'client'                  => [
        'title'          => 'Clients',
        'title_singular' => 'Client',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'first_name'        => 'First name',
            'first_name_helper' => '',
            'last_name'         => 'Last name',
            'last_name_helper'  => '',
            'company'           => 'Company',
            'company_helper'    => '',
            'email'             => 'Email',
            'email_helper'      => '',
            'phone'             => 'Phone',
            'phone_helper'      => '',
            'website'           => 'Website',
            'website_helper'    => '',
            'skype'             => 'Skype',
            'skype_helper'      => '',
            'country'           => 'Country',
            'country_helper'    => '',
            'status'            => 'Client Status',
            'status_helper'     => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
        ],
    ],
    'project'                 => [
        'title'          => 'Projects',
        'title_singular' => 'Project',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'name'               => 'Name',
            'name_helper'        => '',
            'client'             => 'Client',
            'client_helper'      => '',
            'description'        => 'Description',
            'description_helper' => '',
            'start_date'         => 'Start Date',
            'start_date_helper'  => '',
            'budget'             => 'Budget',
            'budget_helper'      => '',
            'status'             => 'Project Status',
            'status_helper'      => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => '',
        ],
    ],
    'note'                    => [
        'title'          => 'Сотрудники',
        'title_singular' => 'Добавить cотрудника',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'project'           => 'Project',
            'name'              => 'Ф.И.О',
            'number'            => 'Номер телефона',
            'position'          => 'Должность',
            'project_helper'    => '',
            'note_text'         => 'Note Text',
            'note_text_helper'  => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
        ],
    ],
    'document'                => [
        'title'          => 'Перечени',
        'title_singular' => 'Документ',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => '',
            'project'              => 'Тип',
            'project_helper'       => '',
            'document_file'        => 'File',
            'document_file_helper' => '',
            'name'                 => 'Document Name',
            'name_helper'          => '',
            'description'          => 'Описание',
            'description_helper'   => '',
            'created_at'           => 'Дата создания',
            'created_at_helper'    => '',
            'updated_at'           => 'Updated At',
            'updated_at_helper'    => '',
            'deleted_at'           => 'Deleted At',
            'deleted_at_helper'    => '',
            'document1'             => 'Национальный ',
            'document2'             => 'Международный',
        ],
    ],
    'transaction'             => [
        'title'          => 'Transactions',
        'title_singular' => 'Transaction',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => '',
            'project'                 => 'Project',
            'project_helper'          => '',
            'transaction_type'        => 'Вид организации',
            'transaction_type_helper' => '',
            'income_source'           => 'Income Source',
            'income_source_helper'    => '',
            'amount'                  => 'Amount',
            'amount_helper'           => '',
            'currency'                => 'Currency',
            'currency_helper'         => '',
            'transaction_date'        => 'Transaction Date',
            'transaction_date_helper' => '',
            'name'                    => 'Name',
            'name_helper'             => '',
            'description'             => 'Description',
            'description_helper'      => '',
            'created_at'              => 'Created at',
            'created_at_helper'       => '',
            'updated_at'              => 'Updated At',
            'updated_at_helper'       => '',
            'deleted_at'              => 'Deleted At',
            'deleted_at_helper'       => '',
            'add'                     => 'Добавить тип организации',
            'table'                   => 'Таблица типов организации',
        ],
    ],
    'clientReport'            => [
        'title'          => 'Reports',
        'title_singular' => 'Report',
        'reports'        => [
            'month'       => 'Month',
            'income'      => 'Income',
            'expenses'    => 'Expenses',
            'fees'        => 'Fees',
            'total'       => 'Total',
            'allProjects' => 'All projects',
        ],
    ],
];
