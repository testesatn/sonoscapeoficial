<?php
/**
 * The default template for displaying content.
 *
 * Used for both single and index/archive/author/catagory/search/tag.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<div class="container row-fluid">
    <div class="col-md-12">
        <header class="entry-header half-row2">
            <?php
            if ( is_single() ) :
                the_title( '<h1 class="entry-title text-center">', '</h1>' );
            else :
                the_title( '<h1 class="entry-title text-center"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
            endif;
            ?>
        </header><!-- .entry-header -->
    </div>
    <div class="col-md-9">
    <div class="col-md-12">            
        <?php
            // Obtenha o slug da marca do post atual
            $marca_slug = sanitize_title_with_dashes(get_the_terms($post, 'marca')[0]->name);
                // Converta os slugs para letras maiúsculas e substitua os espaços por hífens
            $image_name = strtoupper($marca_slug);
            // Diretório URI das imagens
            $image_directory_uri = get_template_directory_uri() . '/assets/images/';
            // Caminho completo para a imagem usando o nome formatado
            $image_path = $image_directory_uri . $image_name . '.png';
            // Alt da imagem usando o título do post
            $image_alt =  strtoupper($marca_slug);
            // Exiba a imagem
            echo '<img class="center-block col-md-3 sb" src="' . $image_path . '" alt="' . $image_alt . '">';
        ?>       
    </div>
        <div class="col-md-12">
        <?php
        // Obtenha o slug da marca do post atual
        $marca_slug = sanitize_title_with_dashes(get_the_terms($post, 'marca')[0]->name);

        // Obtenha o slug da potência do post atual
        $potencia_slug = sanitize_title_with_dashes(get_the_terms($post, 'potencia')[0]->name);

        // Converta os slugs para letras maiúsculas e substitua os espaços por hífens
        $image_name = strtoupper($marca_slug . '-' . $potencia_slug);

        // Diretório URI das imagens
        $image_directory_uri = get_template_directory_uri() . '/assets/images/fontes/';

        // Caminho completo para a imagem usando o nome formatado
        $image_path = $image_directory_uri . $image_name . '.png';

        // Alt da imagem usando o título do post
        $image_alt = get_the_title();

        // Exiba a imagem
        echo '<img class="img-responsive" src="' . $image_path . '" alt="' . $image_alt . '">';
        ?>
        </div>
           

        <div class="col-md-12">
            <div class="col-md-12 nopad text-center bartop">
                <h2><?php the_title(); ?></h2>
            </div>
        </div>

        <div class="col-md-12">
            <div class="col-md-12 nopad text-center bgbot">
                <h2 class="fwhite"><i class="fa fa-phone"></i> (62) 3911-7400 | <i class="fab fa-whatsapp"></i> (62) 9.9916-1717</h2>
                <p class=white></p>
            </div>
        </div>


    </div>

    <div class="col-md-3 bglat text-center">
        <img id="imgcall" class="img-responsive" src="<?php echo get_template_directory_uri() ?>/assets/images/tpview.png" alt="servidores">
        <h3 class="color2 half-row2 fcall">Problemas?? <span class="fwhite"><?php the_title();?></span>
            <hr>
            fale conosco e veja como podemos lhe ajudar</h3>
        <h4 class="fwhite fcall">Clique e fale solicite uma avaliação</h4>
        <a class="btn btn-lg btn-success" href="<?php echo esc_url( home_url( 'contato' ) ); ?>">CONTATO</a>
    </div>
</div>

