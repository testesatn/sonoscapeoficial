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

<div class="half-fluid nopad">
    <div class="col-md-12 nopad">
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
    <div class="col-md-12 nopad">
        <div class="col-md-9 nopad center">
        
        <?php
            // Obter os termos da taxonomia "marca"
            $terms_marca = get_the_terms($post, 'marca');
            $terms_tipo = get_the_terms($post, 'tipo');
            $image_url = '';

            // Verificar se há termos de taxonomia
            if ($terms_marca && !is_wp_error($terms_marca)) {
                // Obter o slug da marca do post atual
                $marca_slug = sanitize_title_with_dashes($terms_marca[0]->name);
            } else {
                $marca_slug = ''; // Define como vazio se não houver termos de marca
            }
            if ($terms_tipo && !is_wp_error($terms_tipo)) {
                // Obter o slug do tipo do post atual
                $tipo_slug = sanitize_title_with_dashes($terms_tipo[0]->slug);
            } else {
                $tipo_slug = ''; // Define como vazio se não houver termos de tipo
            }
            // Verifique se ambos tipo e marca estão definidos
            if (!empty($marca_slug) && !empty($tipo_slug)) {
                // Converta o slug do tipo para letras maiúsculas e substitua os espaços por hífens
                $image_name = strtoupper(sanitize_title_with_dashes($tipo_slug));
            } elseif (!empty($marca_slug)) {
                $image_name = ''; // Apenas a marca está definida, então não há nome de imagem
            } elseif (!empty($tipo_slug)) {
                // Converta o slug do tipo para letras maiúsculas e substitua os espaços por hífens
                $image_name = strtoupper(sanitize_title_with_dashes($tipo_slug));
            }
            // Diretório URI das imagens
            $image_directory_uri = get_template_directory_uri() . '/assets/images/prod/';
            // Caminho completo para a imagem usando o nome formatado
            $image_path = $image_directory_uri . $image_name . '.jpg';
            // Alt da imagem usando o título do post
            $image_alt = get_the_title();
            // Defina a variável de URL da imagem
            $image_url = $image_path;
            ?>

            <!-- Mais tarde no seu template onde você deseja exibir a imagem -->
            <?php if ($image_url): ?>
                <img class="img-responsive" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
            <?php endif; ?>               
        </div>

        <div class="col-md-12 nopad">
            <div class="col-md-9 center text-center"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="col-md-6 center-block" src="<?php echo get_template_directory_uri() ?>/assets/images/logo2.png" alt="<?php bloginfo( 'name' ); ?>"></a></div>
        </div>

        <div class="col-md-12 nopad">
            <div class="col-md-9 center text-center bgcolor4 barra">                       
                <h2 class="text-center white"><?php the_title(); ?></h2>
            </div>
        </div>

        <div class="col-md-12 nopad bgcolor4 btfix rounded">
            <div class="col-md-6 nopad text-center half-row2">
                <h3 class="fwhite" >Soluções SONOSCAPE</h3>
                <p class="fwhite">Líder em Manutenção dos Equipamentos de <br> Ultrasonografia SONOSCAPE no Brasil.</p>
                <h4 class="fwhite fcall">Fale com um especialista</h4>
             <a class="btn btn-lg btn-success" href="https://api.whatsapp.com/send/?phone=%2B5562996107777&text&type=phone_number&app_absent=0"><i class="fab fa-whatsapp"></i> ESPECIALISTA ONLINE</a>
            </div>
            <div class="col-md-6 text-center">                
                    <ul class="nodec fwhite">                   
                    <li><h3><i class="fas fa-phone"></i> (62) 3110 5757</h3></li>
                    <li><h3><i class="fas fa-phone"></i> Nacional: 0800 717 7772</h3></li>
                    <li><h3><i class="fab fa-whatsapp"></i> (62) 99610 7777</h3></li>
                    <li><h3><i class="fab fa-whatsapp"></i> (62) 7533 5757</h3></li>
                    </ul>
            </div>
        </div>
    </div>
</div>


