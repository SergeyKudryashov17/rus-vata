<div class="list-type-product">
    <div class="head-list">Наша продукция</div>
    <ul>
        <?php
        if( $menu_items = wp_get_nav_menu_items('menu-catalog') ) :
            // Вывод основных пунктов меню
            foreach ($menu_items as $menu_item) : ?>
                <li class="type-head">
                    <a href="<?php echo $menu_item->url ?>">
                        <div class="name-type"><?php echo $menu_item->title;  ?></div>
                    </a>
                </li>
                <?php
                // Вывод дочерних таксономий и построение меню
                $category_product = get_field('category-product', $menu_item->object_id);
                $taxonomyName = 'type-products-taxo';

                // Вывод дочерних таксономий 1 уровень
                $args = array(
                    'taxonomy' => $taxonomyName,
                    'hide_empty' => false,
                    'parent' => $category_product->term_id
                );
                $child_terms = get_terms($args);

                if(!empty( $child_terms ) && !is_wp_error( $child_terms )) :
                    foreach ($child_terms as $child_term) :
                        $id_page = get_page_by_title($child_term->name, 'ARRAY_A', 'page');

                        // Поиск дочерних таксономий 2 уровень
                        $args_child = array(
                            'taxonomy' => $taxonomyName,
                            'hide_empty' => false,
                            'parent' => $child_term->term_id
                        );
                        $child_terms_2 = get_terms($args_child);

                        if(!empty( $child_terms_2 ) && !is_wp_error( $child_terms_2 )) :
                            $showClass = 'd-inline-block';
                        else:
                            $showClass = 'd-none';
                        endif;
                        ?>

                        <li>
                            <div class="name-type">
                                <a href="<?php echo get_permalink($id_page['ID']) ?>"><?php echo $child_term->name ?></a>
                                <i class="fa fa-chevron-down <?php echo $showClass ?>" aria-hidden="true"></i>
                            </div>

                            <?php
                            // Проверка существуют ли дочерние элементы
                            if(!empty( $child_terms_2 ) && !is_wp_error( $child_terms_2 )) : ?>

                                <ul class="sub-type-product">
                                    <?php foreach ($child_terms_2 as $child_term_2) : ?>
                                    <li>
                                        <a href="<?php echo get_term_link($child_term_2->term_id, $taxonomyName) ?>">
                                            <div class="name-sub-type">
                                                <img class="logo-brand-menu" src="<?php echo get_field('img', $taxonomyName.'_'.$child_term_2->term_id)?>" alt="">
                                                <?php echo $child_term_2->name ?>
                                            </div>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>

                            <?php endif; ?>
                        </li>

                    <?php
                    endforeach;
                endif;
            endforeach;
        endif;
        ?>
    </ul>
    <div class="expand-menu">
        <i class="fa fa-chevron-down d-inline-block rotate-md" aria-hidden="true"></i>
    </div>
</div>
