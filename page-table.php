<?php
/**
 * Template Name: Table
 */


$args = array(
    'post_type'=>'page',
	'posts_per_page' => -1
); ?>

<table>
<tr style="background:#ccc">
<td>Страница</td>
<td>Яндекс</td>
<td>Гугл</td>
</tr>
<?php
$all_blog = get_sites(['number'=>'500']);
foreach ($all_blog as $key=>$blog){
    // print_r($blog);
    switch_to_blog($blog->blog_id);
    $blogposts = query_posts( $args );
    foreach ( $blogposts as $blogpost ):
        $word = get_city();
    ?>
    <tr>
    <td><a href="<?= get_permalink($blogpost->ID); ?>"><?= get_the_title($blogpost->ID);?> <?= get_declension($word,1); ?></a></td>
    <?= carbon_get_post_meta($blogpost->ID, 'check_ya') ? '<td style="background:green">YES</td>' : '<td>NO</td>'?></td>
    <?= carbon_get_post_meta($blogpost->ID, 'check_go') ? '<td style="background:green">YES</td>' : '<td>NO</td>'?></td>
    </tr>
    <?php endforeach;
    restore_current_blog();
} ?>
</table>