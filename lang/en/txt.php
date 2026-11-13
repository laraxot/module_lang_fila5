<?php

declare(strict_types=1);

return [
    'fields' => [
        'email' => [
            'label' => 'Email',
            'placeholder' => 'Enter your email',
            'tooltip' => 'Use a valid email address',
            'icon' => 'heroicon-o-envelope',
            'helper_text' => '',
        ],
        'password' => [
            'label' => 'Password',
            'placeholder' => 'Enter your password',
            'tooltip' => 'Password must contain at least 8 characters',
            'icon' => 'heroicon-o-lock-closed',
            'helper_text' => '',
        ],
        'remember' => [
            'label' => 'Remember me',
            'tooltip' => 'Keep me signed in on this device',
            'helper_text' => '',
        ],
        'test' => [
            'tooltip' => '',
        ],
        'test_date' => [
            'tooltip' => '',
        ],
        'applyFilters' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'toggleColumns' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'reorderRecords' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'options' => [
            'prefix-icon-color' => [
                'description' => 'options.prefix-icon-color',
                'helper_text' => 'options.prefix-icon-color',
                'placeholder' => 'options.prefix-icon-color',
                'label' => 'options.prefix-icon-color',
            ],
            'allow_multiple' => [
                'description' => 'options.allow_multiple',
                'label' => 'options.allow_multiple',
                'placeholder' => 'options.allow_multiple',
                'helper_text' => 'options.allow_multiple',
            ],
            'visibility' => [
                'values' => [
                    'description' => 'options.visibility.values',
                    'label' => 'options.visibility.values',
                    'placeholder' => 'options.visibility.values',
                    'helper_text' => 'options.visibility.values',
                ],
                'active' => [
                    'label' => 'options.visibility.active',
                    'placeholder' => 'options.visibility.active',
                    'helper_text' => 'options.visibility.active',
                    'description' => 'options.visibility.active',
                ],
                'fieldID' => [
                    'label' => 'options.visibility.fieldID',
                    'placeholder' => 'options.visibility.fieldID',
                    'helper_text' => 'options.visibility.fieldID',
                    'description' => 'options.visibility.fieldID',
                ],
            ],
            'confirmation-message' => [
                'label' => 'options.confirmation-message',
                'placeholder' => 'options.confirmation-message',
                'helper_text' => 'options.confirmation-message',
                'description' => 'options.confirmation-message',
            ],
            'require-login' => [
                'label' => 'options.require-login',
                'placeholder' => 'options.require-login',
                'helper_text' => 'options.require-login',
                'description' => 'options.require-login',
            ],
            'one-entry-per-user' => [
                'label' => 'options.one-entry-per-user',
                'placeholder' => 'options.one-entry-per-user',
                'helper_text' => 'options.one-entry-per-user',
                'description' => 'options.one-entry-per-user',
            ],
            'show-as' => [
                'label' => 'options.show-as',
                'placeholder' => 'options.show-as',
                'helper_text' => 'options.show-as',
                'description' => 'options.show-as',
            ],
            'emails-notification' => [
                'label' => 'options.emails-notification',
                'placeholder' => 'options.emails-notification',
                'helper_text' => 'options.emails-notification',
                'description' => 'options.emails-notification',
            ],
            'primary_color' => [
                'label' => 'options.primary_color',
                'placeholder' => 'options.primary_color',
                'helper_text' => 'options.primary_color',
                'description' => 'options.primary_color',
            ],
            'logo' => [
                'label' => 'options.logo',
                'placeholder' => 'options.logo',
                'helper_text' => 'options.logo',
                'description' => 'options.logo',
            ],
            'cover' => [
                'label' => 'options.cover',
                'placeholder' => 'options.cover',
                'helper_text' => 'options.cover',
                'description' => 'options.cover',
            ],
            'prefix-icon' => [
                'description' => 'options.prefix-icon',
                'helper_text' => 'options.prefix-icon',
                'placeholder' => 'options.prefix-icon',
                'label' => 'options.prefix-icon',
            ],
            'htmlId' => [
                'label' => 'options.htmlId',
                'placeholder' => 'options.htmlId',
                'helper_text' => 'options.htmlId',
                'description' => 'options.htmlId',
            ],
            'hint' => [
                'text' => [
                    'label' => 'options.hint.text',
                    'placeholder' => 'options.hint.text',
                    'helper_text' => 'options.hint.text',
                    'description' => 'options.hint.text',
                ],
                'icon' => [
                    'label' => 'options.hint.icon',
                    'placeholder' => 'options.hint.icon',
                    'helper_text' => 'options.hint.icon',
                    'description' => 'options.hint.icon',
                ],
                'color' => [
                    'label' => 'options.hint.color',
                    'placeholder' => 'options.hint.color',
                    'helper_text' => 'options.hint.color',
                    'description' => 'options.hint.color',
                ],
                'icon-tooltip' => [
                    'label' => 'options.hint.icon-tooltip',
                    'placeholder' => 'options.hint.icon-tooltip',
                    'helper_text' => 'options.hint.icon-tooltip',
                    'description' => 'options.hint.icon-tooltip',
                ],
            ],
            'is_required' => [
                'label' => 'options.is_required',
                'placeholder' => 'options.is_required',
                'helper_text' => 'options.is_required',
                'description' => 'options.is_required',
            ],
            'column_span_full' => [
                'label' => 'options.column_span_full',
                'placeholder' => 'options.column_span_full',
                'helper_text' => 'options.column_span_full',
                'description' => 'options.column_span_full',
            ],
            'hidden_label' => [
                'label' => 'options.hidden_label',
                'placeholder' => 'options.hidden_label',
                'helper_text' => 'options.hidden_label',
                'description' => 'options.hidden_label',
            ],
            'dataSource' => [
                'label' => 'options.dataSource',
                'placeholder' => 'options.dataSource',
                'helper_text' => 'options.dataSource',
                'description' => 'options.dataSource',
            ],
            'dateType' => [
                'label' => 'options.dateType',
                'placeholder' => 'options.dateType',
                'helper_text' => 'options.dateType',
                'description' => 'options.dateType',
            ],
            'minValue' => [
                'label' => 'options.minValue',
                'placeholder' => 'options.minValue',
                'helper_text' => 'options.minValue',
                'description' => 'options.minValue',
            ],
            'maxValue' => [
                'label' => 'options.maxValue',
                'placeholder' => 'options.maxValue',
                'helper_text' => 'options.maxValue',
                'description' => 'options.maxValue',
            ],
            'suffix' => [
                'label' => 'options.suffix',
                'placeholder' => 'options.suffix',
                'helper_text' => 'options.suffix',
                'description' => 'options.suffix',
            ],
            'suffix-icon' => [
                'label' => 'options.suffix-icon',
                'placeholder' => 'options.suffix-icon',
                'helper_text' => 'options.suffix-icon',
                'description' => 'options.suffix-icon',
            ],
            'suffix-icon-color' => [
                'label' => 'options.suffix-icon-color',
                'placeholder' => 'options.suffix-icon-color',
                'helper_text' => 'options.suffix-icon-color',
                'description' => 'options.suffix-icon-color',
            ],
            'prefix' => [
                'label' => 'options.prefix',
                'placeholder' => 'options.prefix',
                'helper_text' => 'options.prefix',
                'description' => 'options.prefix',
            ],
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'resetFilters' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'openFilters' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'value' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'values-list' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'user_id' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'name' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'slug' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'category_id' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'description' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'details' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'is_active' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'ordering' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'start_date' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'end_date' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'extensions' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'sections' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'fields' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'type' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'compact' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'aside' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'borderless' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'icon' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'columns' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'itemIsDefault' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'delete' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'edit' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'isActive' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'status' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'notes' => [
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
        ],
        'responses_count' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'itemKey' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'forms_count' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'responses_exists' => [
            'helper_text' => '',
            'tooltip' => '',
        ],
        'logo' => [
            'helper_text' => '',
            'label' => '',
            'tooltip' => '',
        ],
        'category' => [
            'name' => [
                'description' => 'category.name',
                'helper_text' => '',
            ],
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'view' => [
            'tooltip' => '',
        ],
        'address' => [
            'label' => 'address2',
            'tooltip' => '',
        ],
        'location' => [
            'address' => [
                'label' => 'location.address',
                'placeholder' => 'location.address',
                'helper_text' => 'location.address',
                'description' => 'location.address',
            ],
        ],
        'file1' => [
            'jpg' => [
                'label' => 'file1.jpg',
                'placeholder' => 'file1.jpg',
                'helper_text' => 'file1.jpg',
                'description' => 'file1.jpg',
            ],
        ],
<<<<<<< .merge_file_SLLoHz
        'id' => [
            'label' => 'id',
            'placeholder' => 'id',
            'helper_text' => 'id',
            'description' => 'id',
        ],
        'created_at' => [
            'label' => 'created_at',
            'placeholder' => 'created_at',
            'helper_text' => 'created_at',
            'description' => 'created_at',
        ],
        'updated_at' => [
            'label' => 'updated_at',
        ],
        'appointment_date' => [
            'label' => 'appointment_date',
            'placeholder' => 'appointment_date',
            'helper_text' => 'appointment_date',
            'description' => 'appointment_date',
        ],
        'contact' => [
            'label' => 'contact',
        ],
        'invoice' => [
            'label' => 'invoice',
            'placeholder' => 'invoice',
            'helper_text' => 'invoice',
            'description' => 'invoice',
        ],
        'contract' => [
            'label' => 'contract',
            'placeholder' => 'contract',
            'helper_text' => 'contract',
            'description' => 'contract',
        ],
        'receipt' => [
            'label' => 'receipt',
            'placeholder' => 'receipt',
            'helper_text' => 'receipt',
            'description' => 'receipt',
        ],
        'ha_diritto' => [
            'label' => 'ha_diritto',
            'placeholder' => 'ha_diritto',
            'helper_text' => 'ha_diritto',
            'description' => 'ha_diritto',
        ],
        'motivo' => [
            'label' => 'motivo',
            'placeholder' => 'motivo',
            'helper_text' => 'motivo',
            'description' => 'motivo',
        ],
        'matr' => [
            'label' => 'matr',
            'placeholder' => 'matr',
            'helper_text' => 'matr',
            'description' => 'matr',
        ],
        'cognome' => [
            'label' => 'last name',
            'placeholder' => 'last name',
            'helper_text' => 'last name',
            'description' => 'last name',
        ],
        'nome' => [
            'label' => 'first name',
            'placeholder' => 'first name',
            'helper_text' => 'first name',
            'description' => 'first name',
        ],
        'propro' => [
            'label' => 'propro',
            'placeholder' => 'propro',
            'helper_text' => 'propro',
            'description' => 'propro',
        ],
        'posfun' => [
            'label' => 'posfun',
            'placeholder' => 'posfun',
            'helper_text' => 'posfun',
            'description' => 'posfun',
        ],
        'posiz' => [
            'label' => 'posiz',
            'placeholder' => 'posiz',
            'helper_text' => 'posiz',
            'description' => 'posiz',
        ],
        'posiz_txt' => [
            'label' => 'posiz_txt',
            'placeholder' => 'posiz_txt',
            'helper_text' => 'posiz_txt',
            'description' => 'posiz_txt',
        ],
        'disci1' => [
            'label' => 'disci1',
            'placeholder' => 'disci1',
            'helper_text' => 'disci1',
            'description' => 'disci1',
        ],
        'disci1_txt' => [
            'label' => 'disci1_txt',
            'placeholder' => 'disci1_txt',
            'helper_text' => 'disci1_txt',
            'description' => 'disci1_txt',
        ],
        'stabi' => [
            'label' => 'stabi',
            'placeholder' => 'stabi',
            'helper_text' => 'stabi',
            'description' => 'stabi',
        ],
        'stabi_txt' => [
            'label' => 'stabi_txt',
            'placeholder' => 'stabi_txt',
            'helper_text' => 'stabi_txt',
            'description' => 'stabi_txt',
        ],
        'repar' => [
            'label' => 'repar',
            'placeholder' => 'repar',
            'helper_text' => 'repar',
            'description' => 'repar',
        ],
        'repar_txt' => [
            'label' => 'repar_txt',
            'placeholder' => 'repar_txt',
            'helper_text' => 'repar_txt',
            'description' => 'repar_txt',
        ],
        'dal' => [
            'label' => 'from',
            'placeholder' => 'from',
            'helper_text' => '',
            'description' => 'from',
        ],
        'al' => [
            'label' => 'to',
            'placeholder' => 'to',
            'helper_text' => '',
            'description' => 'to',
        ],
        'anno' => [
            'label' => 'year',
            'placeholder' => 'year',
            'helper_text' => '',
            'description' => 'year',
        ],
        'gg_presenza_dalal' => [
            'label' => 'gg_presenza_dalal',
            'placeholder' => 'gg_presenza_dalal',
            'helper_text' => 'gg_presenza_dalal',
            'description' => 'gg_presenza_dalal',
        ],
        'gg_assenza_dalal' => [
            'label' => 'gg_assenza_dalal',
            'placeholder' => 'gg_assenza_dalal',
            'helper_text' => 'gg_assenza_dalal',
            'description' => 'gg_assenza_dalal',
        ],
        'hh_assenza_dalal' => [
            'label' => 'hh_assenza_dalal',
            'placeholder' => 'hh_assenza_dalal',
            'helper_text' => 'hh_assenza_dalal',
            'description' => 'hh_assenza_dalal',
=======
        'dal' => [
            'helper_text' => '',
        ],
        'al' => [
            'helper_text' => '',
        ],
        'anno' => [
            'helper_text' => '',
>>>>>>> .merge_file_mnMhn2
        ],
        'valutatore_id' => [
            'helper_text' => '',
        ],
        'nome_diri' => [
            'helper_text' => '',
        ],
        'txt' => [
            'label' => 'Text',
            'placeholder' => 'Text',
            'helper_text' => 'Text',
            'description' => 'Text',
        ],
        'note' => [
            'helper_text' => '',
<<<<<<< .merge_file_SLLoHz
            'description' => 'note',
        ],
        'data' => [
            'label' => 'date',
            'placeholder' => 'date',
            'helper_text' => 'date',
            'description' => 'date',
        ],
        'created_by' => [
            'label' => 'created_by',
            'placeholder' => 'created_by',
            'helper_text' => 'created_by',
            'description' => 'created_by',
=======
>>>>>>> .merge_file_mnMhn2
        ],
        'extra_attributes' => [
            'type' => [
                'label' => 'extra_attributes.type',
                'placeholder' => 'extra_attributes.type',
                'helper_text' => 'extra_attributes.type',
                'description' => 'extra_attributes.type',
            ],
            'anno' => [
                'label' => 'extra_attributes.anno',
                'placeholder' => 'extra_attributes.anno',
                'helper_text' => 'extra_attributes.anno',
                'description' => 'extra_attributes.anno',
            ],
        ],
        'user' => [
            'name' => [
                'label' => 'user.name',
                'placeholder' => 'user.name',
                'helper_text' => 'user.name',
                'description' => 'user.name',
            ],
        ],
        'quadrimestre' => [
            'helper_text' => '',
        ],
    ],
    'actions' => [
        'authenticate' => [
            'label' => 'Authenticate',
            'tooltip' => 'Sign in to the system',
            'icon' => 'ui-login',
            'color' => 'primary',
        ],
        'login' => [
            'label' => 'Sign in',
            'tooltip' => 'Sign in with your credentials',
            'icon' => 'heroicon-o-key',
            'color' => 'success',
        ],
        'request' => [
            'icon' => 'request',
        ],
        'hidePassword' => [
            'icon' => 'hidePassword',
        ],
        'showPassword' => [
            'icon' => 'ui-showPassword',
        ],
        'list_log_activities' => [
            'icon' => 'list_log_activities',
        ],
        'table_layout_toggle' => [
            'icon' => 'table_layout_toggle',
        ],
        'update_coordinates' => [
            'icon' => 'update_coordinates',
        ],
        'edit' => [
            'icon' => 'edit',
        ],
        'delete' => [
            'icon' => 'delete',
        ],
        'SendRecordsNotificationBulkAction' => [
            'icon' => 'SendRecordsNotificationBulkAction',
        ],
        'changePassword' => [
            'icon' => 'changePassword',
        ],
        'test' => [
            'icon' => 'test',
        ],
        'register' => [
            'icon' => 'register',
        ],
        'refresh' => [
            'icon' => 'refresh',
        ],
        'gg_presenza_dalal' => [
            'icon' => 'gg_presenza_dalal',
        ],
        'gg_assenza_dalal' => [
            'icon' => 'gg_assenza_dalal',
        ],
        'hh_assenza_dalal' => [
            'icon' => 'hh_assenza_dalal',
        ],
        'stabi' => [
            'icon' => 'stabi',
        ],
        'repar' => [
            'icon' => 'repar',
        ],
        'nome_stabi' => [
            'icon' => 'nome_stabi',
        ],
        'logout' => [
            'icon' => 'logout',
        ],
        'profile' => [
            'icon' => 'profile',
        ],
        'convert' => [
            'icon' => 'convert',
        ],
        'field' => [
            'icon' => 'field',
        ],
        'bet_action' => [
            'icon' => 'bet_action',
        ],
        'export_xls_lazy_cov' => [
            'icon' => 'export_xls_lazy_cov',
        ],
        'export_xls_cov' => [
            'icon' => 'export_xls_cov',
        ],
        'title' => [
            'icon' => 'title',
        ],
        'export_pdf' => [
            'icon' => 'export_pdf',
        ],
        'export_flusso' => [
            'icon' => 'export_flusso',
        ],
        'ImportAction' => [
            'icon' => 'ImportAction',
        ],
        'next' => [
            'icon' => 'next',
        ],
        'previous' => [
            'icon' => 'previous',
        ],
        'billing' => [
            'icon' => 'billing',
        ],
        'view' => [
            'icon' => 'view',
        ],
    ],
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => '100',
        'name' => 'Txt',
        'plural' => 'Txt',
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'sections' => [
<<<<<<< .merge_file_SLLoHz
        'address' => [
            'label' => 'address',
            'heading' => 'address',
        ],
        'diritto' => [
            'label' => 'diritto',
            'heading' => 'diritto',
        ],
        'lavoratore' => [
            'label' => 'lavoratore',
            'heading' => 'lavoratore',
        ],
        'qua' => [
            'label' => 'qua',
            'heading' => 'qua',
        ],
        'rep' => [
            'label' => 'rep',
            'heading' => 'rep',
        ],
        'periodo' => [
            'label' => 'periodo',
            'heading' => 'periodo',
        ],
        'assenze' => [
            'label' => 'assenze',
            'heading' => 'assenze',
        ],
        'Dettagli Log' => [
            'label' => 'Log Details',
            'heading' => 'Log Details',
        ],
=======
>>>>>>> .merge_file_mnMhn2
        'empty' => [
            'label' => '',
            'heading' => '',
        ],
<<<<<<< .merge_file_SLLoHz
        'field' => [
            'label' => 'field',
            'heading' => 'field',
        ],
        'Luogo' => [
            'label' => 'Luogo',
            'heading' => 'Luogo',
        ],
        'Disservizio' => [
            'label' => 'Disservizio',
            'heading' => 'Disservizio',
        ],
        'Autore della segnalazione' => [
            'label' => 'Report author',
            'heading' => 'Report author',
        ],
    ],
    'steps' => [
        'test' => [
            'label' => 'test',
        ],
        'Informativa sulla privacy' => [
            'label' => 'Privacy notice',
        ],
        'Dati di segnalazione' => [
            'label' => 'Report data',
        ],
        'Riepilogo' => [
            'label' => 'Riepilogo',
        ],
=======
>>>>>>> .merge_file_mnMhn2
    ],
];
