<?php
use himiklab\thumbnail\EasyThumbnailImage;
use frontend\widgets\ShareLinks;
use common\models\Lang;
use yii\helpers\Url;
use common\models\Category;
/* @var $this yii\web\View */

(Lang::getCurrent()->id == 1) ? $this->title = $category->title_en : ' ';
(Lang::getCurrent()->id == 2) ? $this->title = $category->title_ru : ' ';
(Lang::getCurrent()->id == 3) ? $this->title = $category->title_kz : ' ';
//
//$this->registerMetaTag(['name'=> 'keywords', 'content' =>  $model->meta_keywords]);
//$this->registerMetaTag(['name'=> 'description', 'content' => $model->meta_description]);

?>

<div class="container">
    <div class="cr">
        <div class="title">
            <?= (Lang::getCurrent()->id == 1) ? $category->title_en : ' '; ?>
            <?= (Lang::getCurrent()->id == 2) ? $category->title_ru : ' '; ?>
            <?= (Lang::getCurrent()->id == 3) ? $category->title_kz : ' '; ?>
        </div>
        <div class="catalog">
        <?php foreach ($parentCategories as $parentCategory) { ?>
            <div class="catalog-item product-item ">
                <?php
                echo \himiklab\thumbnail\EasyThumbnailImage::thumbnailImg(
                    $parentCategory->imagePath, 590, 250, \himiklab\thumbnail\EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                    [
                        'class' => 'product-item__img'
                    ]
                );
                ?>
                <div class="catalog-item__text">
                    <?= (Lang::getCurrent()->id == 1) ? $parentCategory->title_en : ' '; ?>
                    <?= (Lang::getCurrent()->id == 2) ? $parentCategory->title_ru : ' '; ?>
                    <?= (Lang::getCurrent()->id == 3) ? $parentCategory->title_kz : ' '; ?>
                </div>
            </div>
        <?php } ?>
        </div>
        <div class="catalog-box">
            <div class="catalog-box__item ">
                <ul class="catalog-menu">
                    <?php $i = 0; foreach ($thrdParentCategories as $thrdParentCategory) { ?>
                    <li class="catalog-menu__item <?= ($i == 0) ? 'active' : ''?>">
                        <?= (Lang::getCurrent()->id == 1) ? $thrdParentCategory->title_en : ' '; ?>
                        <?= (Lang::getCurrent()->id == 2) ? $thrdParentCategory->title_ru : ' '; ?>
                        <?= (Lang::getCurrent()->id == 3) ? $thrdParentCategory->title_kz : ' '; ?>
                    </li>
                    <?php $i++; } ?>
                </ul>
                <div class="catalog-tabs">
                    <div class="catalog-tab__item active">
                        <div class="product-card">
                            <div class="product-card__img">
                                <div class="new-card">Новинка</div>
                                <img src="" alt="">
                            </div>
                            <div class="product-card__description">
                                <div class="product-name">
                                    Название продукта
                                </div>
                                <p>Товарищи! постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение соответствующий условий активизации. Идейные соображения высшего порядка, а также постоянное информационно-пропагандистское обеспечение нашей деятельности требуют от нас анализа направлений прогрессивного развития. Не следует, однако забывать, что новая модель организационной деятельности в значительной степени обуславливает создание систем массового участия. Не следует, однако забывать, что дальнейшее развитие различных форм деятельности способствует подготовки и реализации модели развития. Разнообразный и богатый опыт реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития.</p>
                                <a href="" class="product-button button">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card__img">
                                <div class="new-card">Новинка 1 раздел</div>
                                <img src="" alt="">
                            </div>
                            <div class="product-card__description">
                                <div class="product-name">
                                    Название продукта
                                </div>
                                <p>Товарищи! постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение соответствующий условий активизации. Идейные соображения высшего порядка, а также постоянное информационно-пропагандистское обеспечение нашей деятельности требуют от нас анализа направлений прогрессивного развития. Не следует, однако забывать, что новая модель организационной деятельности в значительной степени обуславливает создание систем массового участия. Не следует, однако забывать, что дальнейшее развитие различных форм деятельности способствует подготовки и реализации модели развития. Разнообразный и богатый опыт реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития.</p>
                                <a href="" class="product-button button">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>

                    <div class="catalog-tab__item">
                        <div class="product-card">
                            <div class="product-card__img">
                                <div class="new-card">Новинка</div>
                                <img src="" alt="">
                            </div>
                            <div class="product-card__description">
                                <div class="product-name">
                                    Название продукта
                                </div>
                                <p>Товарищи! постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение соответствующий условий активизации. Идейные соображения высшего порядка, а также постоянное информационно-пропагандистское обеспечение нашей деятельности требуют от нас анализа направлений прогрессивного развития. Не следует, однако забывать, что новая модель организационной деятельности в значительной степени обуславливает создание систем массового участия. Не следует, однако забывать, что дальнейшее развитие различных форм деятельности способствует подготовки и реализации модели развития. Разнообразный и богатый опыт реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития.</p>
                                <a href="" class="product-button button">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card__img">
                                <div class="new-card">Новинка</div>
                                <img src="" alt="">
                            </div>
                            <div class="product-card__description">
                                <div class="product-name">
                                    Название продукта 2 раздел
                                </div>
                                <p>Товарищи! постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение соответствующий условий активизации. Идейные соображения высшего порядка, а также постоянное информационно-пропагандистское обеспечение нашей деятельности требуют от нас анализа направлений прогрессивного развития. Не следует, однако забывать, что новая модель организационной деятельности в значительной степени обуславливает создание систем массового участия. Не следует, однако забывать, что дальнейшее развитие различных форм деятельности способствует подготовки и реализации модели развития. Разнообразный и богатый опыт реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития.</p>
                                <a href="" class="product-button button">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="catalog-box__item">
                <ul class="catalog-menu">
                    <li class="catalog-menu__item">НАЗВАНИЕ РАЗДЕЛА2 </li>
                    <li class="catalog-menu__item">НАЗВАНИЕ РАЗДЕЛА2 </li>
                    <li class="catalog-menu__item">НАЗВАНИЕ РАЗДЕЛА2 </li>
                    <li class="catalog-menu__item">НАЗВАНИЕ РАЗДЕЛА2 </li>
                    <li class="catalog-menu__item">НАЗВАНИЕ РАЗДЕЛА 2</li>
                </ul>
                <div class="catalog-tabs">
                    <div class="catalog-tab__item">
                        <div class="product-card">
                            <div class="product-card__img">
                                <div class="new-card">Новинка</div>
                                <img src="" alt="">
                            </div>
                            <div class="product-card__description">
                                <div class="product-name">
                                    Название продукта2
                                </div>
                                <p>Товарищи! постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение соответствующий условий активизации. Идейные соображения высшего порядка, а также постоянное информационно-пропагандистское обеспечение нашей деятельности требуют от нас анализа направлений прогрессивного развития. Не следует, однако забывать, что новая модель организационной деятельности в значительной степени обуславливает создание систем массового участия. Не следует, однако забывать, что дальнейшее развитие различных форм деятельности способствует подготовки и реализации модели развития. Разнообразный и богатый опыт реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития.</p>
                                <a href="" class="product-button button">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card__img">
                                <div class="new-card">Новинка</div>
                                <img src="" alt="">
                            </div>
                            <div class="product-card__description">
                                <div class="product-name">
                                    Название продукта2
                                </div>
                                <p>Товарищи! постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение соответствующий условий активизации. Идейные соображения высшего порядка, а также постоянное информационно-пропагандистское обеспечение нашей деятельности требуют от нас анализа направлений прогрессивного развития. Не следует, однако забывать, что новая модель организационной деятельности в значительной степени обуславливает создание систем массового участия. Не следует, однако забывать, что дальнейшее развитие различных форм деятельности способствует подготовки и реализации модели развития. Разнообразный и богатый опыт реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития.</p>
                                <a href="" class="product-button button">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>
                    <div class="catalog-tab__item">
                        <div class="product-card">
                            <div class="product-card__img">
                                <div class="new-card">Новинка</div>
                                <img src="" alt="">
                            </div>
                            <div class="product-card__description">
                                <div class="product-name">
                                    Название продукта2
                                </div>
                                <p>Товарищи! постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение соответствующий условий активизации. Идейные соображения высшего порядка, а также постоянное информационно-пропагандистское обеспечение нашей деятельности требуют от нас анализа направлений прогрессивного развития. Не следует, однако забывать, что новая модель организационной деятельности в значительной степени обуславливает создание систем массового участия. Не следует, однако забывать, что дальнейшее развитие различных форм деятельности способствует подготовки и реализации модели развития. Разнообразный и богатый опыт реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития.</p>
                                <a href="" class="product-button button">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card__img">
                                <div class="new-card">Новинка</div>
                                <img src="" alt="">
                            </div>
                            <div class="product-card__description">
                                <div class="product-name">
                                    Название продукта2
                                </div>
                                <p>Товарищи! постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение соответствующий условий активизации. Идейные соображения высшего порядка, а также постоянное информационно-пропагандистское обеспечение нашей деятельности требуют от нас анализа направлений прогрессивного развития. Не следует, однако забывать, что новая модель организационной деятельности в значительной степени обуславливает создание систем массового участия. Не следует, однако забывать, что дальнейшее развитие различных форм деятельности способствует подготовки и реализации модели развития. Разнообразный и богатый опыт реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития.</p>
                                <a href="" class="product-button button">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="catalog-box__item">
                <ul class="catalog-menu">
                    <li class="catalog-menu__item">НАЗВАНИЕ РАЗДЕЛА3 </li>
                    <li class="catalog-menu__item">НАЗВАНИЕ РАЗДЕЛА3 </li>
                    <li class="catalog-menu__item">НАЗВАНИЕ РАЗДЕЛА33 </li>
                    <li class="catalog-menu__item">НАЗВАНИЕ РАЗДЕЛА3 </li>
                    <li class="catalog-menu__item">НАЗВАНИЕ РАЗДЕЛА3 </li>
                </ul>
                <div class="catalog-tabs">
                    <div class="catalog-tab__item">
                        <div class="product-card">
                            <div class="product-card__img">
                                <div class="new-card">Новинка</div>
                                <img src="" alt="">
                            </div>
                            <div class="product-card__description">
                                <div class="product-name">
                                    Название продукта3
                                </div>
                                <p>Товарищи! постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение соответствующий условий активизации. Идейные соображения высшего порядка, а также постоянное информационно-пропагандистское обеспечение нашей деятельности требуют от нас анализа направлений прогрессивного развития. Не следует, однако забывать, что новая модель организационной деятельности в значительной степени обуславливает создание систем массового участия. Не следует, однако забывать, что дальнейшее развитие различных форм деятельности способствует подготовки и реализации модели развития. Разнообразный и богатый опыт реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития.</p>
                                <a href="" class="product-button button">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card__img">
                                <div class="new-card">Новинка</div>
                                <img src="" alt="">
                            </div>
                            <div class="product-card__description">
                                <div class="product-name">
                                    Название продукта3
                                </div>
                                <p>Товарищи! постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение соответствующий условий активизации. Идейные соображения высшего порядка, а также постоянное информационно-пропагандистское обеспечение нашей деятельности требуют от нас анализа направлений прогрессивного развития. Не следует, однако забывать, что новая модель организационной деятельности в значительной степени обуславливает создание систем массового участия. Не следует, однако забывать, что дальнейшее развитие различных форм деятельности способствует подготовки и реализации модели развития. Разнообразный и богатый опыт реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития.</p>
                                <a href="" class="product-button button">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>
                    <div class="catalog-tab__item">
                        <div class="product-card">
                            <div class="product-card__img">
                                <div class="new-card">Новинка</div>
                                <img src="" alt="">
                            </div>
                            <div class="product-card__description">
                                <div class="product-name">
                                    Название продукта3
                                </div>
                                <p>Товарищи! постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение соответствующий условий активизации. Идейные соображения высшего порядка, а также постоянное информационно-пропагандистское обеспечение нашей деятельности требуют от нас анализа направлений прогрессивного развития. Не следует, однако забывать, что новая модель организационной деятельности в значительной степени обуславливает создание систем массового участия. Не следует, однако забывать, что дальнейшее развитие различных форм деятельности способствует подготовки и реализации модели развития. Разнообразный и богатый опыт реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития.</p>
                                <a href="" class="product-button button">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card__img">
                                <div class="new-card">Новинка</div>
                                <img src="" alt="">
                            </div>
                            <div class="product-card__description">
                                <div class="product-name">
                                    Название продукта3
                                </div>
                                <p>Товарищи! постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение соответствующий условий активизации. Идейные соображения высшего порядка, а также постоянное информационно-пропагандистское обеспечение нашей деятельности требуют от нас анализа направлений прогрессивного развития. Не следует, однако забывать, что новая модель организационной деятельности в значительной степени обуславливает создание систем массового участия. Не следует, однако забывать, что дальнейшее развитие различных форм деятельности способствует подготовки и реализации модели развития. Разнообразный и богатый опыт реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития.</p>
                                <a href="" class="product-button button">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>