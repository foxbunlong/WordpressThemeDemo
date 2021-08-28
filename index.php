<?php get_header();
?>

    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
              <br/><br/>
              <h2>About Landing-Page</h2>
              <br/>
                <p>Landing-Page is a free Bootstrap 3 theme created by Start Bootstrap. It can be yours right now, simply download the template on <a href="http://startbootstrap.com/template-overviews/landing-page/">the preview page</a>. The theme is open source, and you can use it for any purpose, personal or commercial.</p>
                <p>The Jekyll version is brought to you by <a href="https://github.com/swcool">Shane Weng</a></p>
                <p>This theme features stock photos by <a href="http://join.deathtothestockphoto.com//">Death to the Stock Photo</a>.</p>
                <p>Landing-Page includes full HTML, CSS, and custom JavaScript files along with LESS files for easy customization.</p>
                <br/>
              </div>
        </div>
    </section>

    <section id="services">

<!-- Page Content -->
{% for post in site.posts reversed %}
  {% capture thecycle %}{% cycle 'odd', 'even' %}{% endcapture %}
    {% if thecycle == 'odd' %}
    <div class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">{{ post.title }}</h2>
                    <div class="lead">{{ post.content }}</div>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="img/services/{{ post.img }}" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->
    {% else %}

    <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">{{ post.title }}</h2>
                    <div class="lead">{{ post.content }}</div>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                  <img class="img-responsive" src="img/services/{{ post.img }}" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->
    {% endif %}
{% endfor %}
</section>

<!-- Contacts -->
<section id="contact">
	<div class="banner">
		<div class="container">

			<div class="row">
				<div class="col-lg-6">
					<h2>Keep in Touch:</h2>
				</div>
				<div class="col-lg-6">
					<ul class="list-inline banner-social-buttons">
						{% for social in site.social %}
						<li>
							<a href="{{ social.url }}" class="btn btn-default btn-lg"><i class="fa fa-{{ social.title }} fa-fw"></i> <span class="network-name">{{ social.title }}</span></a>
						</li>
						{% endfor %}
					</ul>
				</div>
			</div>

		</div>
		<!-- /.container -->

	</div>
</section>
<!-- /.banner -->

<?php
while (have_posts()) {
    the_post();
?>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php the_content(); ?>
<?php
}

get_footer();
?>