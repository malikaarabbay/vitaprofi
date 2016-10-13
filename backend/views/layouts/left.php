<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [

//                    [
//                        'label' => 'Магазин', 'icon' => 'fa fa-shopping-cart', 'url' => '#',
//                        'items' => [
//                            [
//                                'label' => 'Каталог', 'icon' => 'fa fa-circle-o', 'url' => '#',
//                                'items' => [
//                                    ['label' => 'Товары', 'icon' => 'fa fa-circle-o', 'url' => ['product/index'],],
//                                    ['label' => 'Категории', 'icon' => 'fa fa-circle-o', 'url' => ['product/index'],],
//                                    ['label' => 'Производители', 'icon' => 'fa fa-circle-o', 'url' => ['product/index'],],
//                                    ['label' => 'Атрибуты', 'icon' => 'fa fa-circle-o', 'url' => ['product/index'],],
//
//                                ],
//                            ],
//                            [
//                                'label' => 'Заказы', 'icon' => 'fa fa-circle-o', 'url' => ['product/index'],
//                            ],
//                        ],
//                    ],

                    ['label' => 'Пользователи', 'icon' => 'fa fa-users', 'url' => ['user/index'],],
                    ['label' => 'Новости', 'icon' => 'fa fa-bullhorn', 'url' => ['news/index'],],
                    ['label' => 'Категория', 'icon' => 'fa fa-folder', 'url' => ['category/index'],],
                    ['label' => 'Продукция', 'icon' => 'fa fa-shopping-cart', 'url' => ['product/index'],],
                    ['label' => 'Для Профессионалов', 'icon' => 'fa fa-file-archive-o', 'url' => ['file/index'],],
                    ['label' => 'Статьи', 'icon' => 'fa fa-pencil', 'url' => ['article/index'],],
                    ['label' => 'Галерея', 'icon' => 'fa fa-file-photo-o', 'url' => ['gallery/index'],],
                    ['label' => 'Слайдер', 'icon' => 'fa fa-image', 'url' => ['slider/index'],],
                    ['label' => 'Баннер', 'icon' => 'fa fa-image', 'url' => ['banner/index'],],
//                    ['label' => 'Обратная связь', 'icon' => 'fa fa-envelope', 'url' => ['feedback/index'],],
//                    ['label' => 'Тексты', 'icon' => 'fa fa-file-text-o', 'url' => ['text/index'],],
                    ['label' => 'Отзыви', 'icon' => 'fa  fa-comments-o', 'url' => ['review/index'],],
//                    ['label' => 'Настройки', 'icon' => 'fa fa-cog', 'url' => ['settings/index'],],
//                    ['label' => 'Образец', 'icon' => 'fa fa-image', 'url' => ['example/index'],],




//                    [
//                        'label' => 'Same tools',
//                        'icon' => 'fa fa-share',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
//                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'fa fa-circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'fa fa-circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
//                        ],
//                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
