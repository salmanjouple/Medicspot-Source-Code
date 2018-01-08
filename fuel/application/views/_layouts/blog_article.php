<?php 
$slug = uri_segment(2);

if ($slug) :

	$article = fuel_model('articles', array('find' => 'one', 'where' => array('slug' => $slug)));

	if (empty($article)) :
		redirect_404();
	endif;

else:

	$tags = fuel_model('tags');

endif;

if (!empty($article)) : ?>
	<?php $this->load->view('_blocks/header')?>
	<div class="blog-background"></div>

	<page id="blog">
		<section id="blog-index-header" class="text-section">
			<div class="container">
				<div class="section-header">
					<h1><?=fuel_edit($article)?><?=$article->title?></h1>
					<div class="author"><?=$article->author->name?></div>
				</div>
			</div>
		</section>

		<section id="blog-article">
			<div class="container">
				<div class="article">
					<p class="introduction">
						<?=$article->summary?>
						
						<?=$article->content_formatted?>
					</p>
				</div>

			</div>
		</section>
	</page>
<?php $this->load->view('_blocks/footer')?>
<?php else: ?>

<?php endif; ?>

