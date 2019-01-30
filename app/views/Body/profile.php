<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 6/30/2016
 * Time: 2:03 AM
 */?>

<main  class="profileMain">
	<div class="jumbo" style="
    width: 100%;
    height: 426px;
    background: url(<?php echo($_SESSION['imageUrl']);?> )center center no-repeat;
    background-size: cover;
"   >  </div>
	<div class="container icons">
		<div class="big-icon"></div>
		<div class="rate">
			<a class="star-btn add-btn btn-floating btn-large waves-effect waves-light blue darken-1"><i class="material-icons">star</i></a>
			<a class="like-btn add-btn btn-floating btn-large waves-effect waves-light blue darken-1"><i class="material-icons">thumb_up</i></a>
		</div>
		<div class="add" id="">
			<a class="add-btn btn-floating btn-large waves-effect waves-light black"><i class="material-icons">settings</i></a>
		</div>
	</div>
	<div class="details">

		<h3><?php  echo($_SESSION['FirstName']);  ?></h3>

	</div>
	<div class="container bio">
			<div class="title">
				<h6>Biography</h6>
			</div>
			<div class="content">
				<p><?php    echo($_SESSION['bio']);  ?></p>
			</div>
			<hr />
	</div>
	<div class="container pics">
		<div class="title">
			<h6>Recently Viewed</h6>
		</div>
		<div class="row row-1">
			<div class="col m6 s12">
				<div class="card">
            		<div class="card-image" id="first-img">
              			<span class="card-title">Inception</span>
            		</div>
          		</div>
			</div>
			<div class="col m6 s12">
				<div class="card">
            		<div class="card-image" id="second-img">
              			<span class="card-title">Django Unchained</span>
            		</div>
          		</div>
			</div>
		</div>
		<div class="row">
			<div class="col m6 s12">
				<div class="card">
            		<div class="card-image" id="third-img">
              			<span class="card-title">The Wolf of Wallstreet</span>
            		</div>
          		</div>
			</div>
			<div class="col m6 s12">
				<div class="card">
            		<div class="card-image" id="forth-img">
              			<span class="card-title">The Great Gatsby</span>
            		</div>
          		</div>
			</div>
		</div>
	</div>
	<div class="container posts">
		<div class="title">
			<h6>Posts</h6>
		</div>
		<div class="row">
        	<div class="col s12 m6">
          		<div class="card blue-grey">
            		<div class="card-content white-text">
              			<span class="card-title">Post title</span>
              			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem aliquid nobis nesciunt nulla laudantium aspernatur, delectus sed, minus ex perspiciatis...</p>
            		</div>
					<div class="card-action">
						<a href="#">Read more...</a>
						<div class="tags">
							<div class="chip">
Story
							</div>
							<div class="chip">
Adventure
							</div>
						</div>
						<i class="material-icons card-love">favorite_border</i>
					</div>
          		</div>
        	</div>
			<div class="col s12 m6">
          		<div class="card blue-grey">
            		<div class="card-content white-text">
              			<span class="card-title">Post title</span>
              			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem aliquid nobis nesciunt nulla laudantium aspernatur, delectus sed, minus ex perspiciatis...</p>
            		</div>
					<div class="card-action">
						<a href="#">Read more...</a>
						<div class="tags">
							<div class="chip">
Personal
							</div>
						</div>
						<i class="material-icons card-love">favorite_border</i>
					</div>
          		</div>
        	</div>
      	</div>
		<div class="row">
        	<div class="col s12 m6">
          		<div class="card blue-grey">
            		<div class="card-content white-text">
              			<span class="card-title">Post title</span>
              			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem aliquid nobis nesciunt nulla laudantium aspernatur, delectus sed, minus ex perspiciatis...</p>
            		</div>
					<div class="card-action">
						<a href="#">Read more...</a>
						<div class="tags">
							<div class="chip">
Love
							</div>
							<div class="chip">
Fiction
							</div>
						</div>
						<i class="material-icons card-love">favorite_border</i>
					</div>
          		</div>
        	</div>
			<div class="col s12 m6">
          		<div class="card blue-grey">
            		<div class="card-content white-text">
              			<span class="card-title">Post title</span>
              			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem aliquid nobis nesciunt nulla laudantium aspernatur, delectus sed, minus ex perspiciatis...</p>
            		</div>
					<div class="card-action">
						<a href="#">Read more...</a>
						<div class="tags">
							<div class="chip">
Story
							</div>
							<div class="chip">
Sad
							</div>
						</div>
						<i class="material-icons card-love">favorite_border</i>
					</div>
          		</div>
        	</div>
      	</div>
		<div class="row">
        	<div class="col s12 m6">
          		<div class="card blue-grey">
            		<div class="card-content white-text">
              			<span class="card-title">Post title</span>
              			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem aliquid nobis nesciunt nulla laudantium aspernatur, delectus sed, minus ex perspiciatis...</p>
            		</div>
					<div class="card-action">
						<a href="#">Read more...</a>
						<div class="tags">
							<div class="chip">
Happy
							</div>
							<div class="chip">
Fiction
							</div>
						</div>
						<i class="material-icons card-love">favorite_border</i>
					</div>
          		</div>
        	</div>
			<div class="col s12 m6">
          		<div class="card blue-grey">
            		<div class="card-content white-text">
              			<span class="card-title">Post title</span>
              			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem aliquid nobis nesciunt nulla laudantium aspernatur, delectus sed, minus ex perspiciatis...</p>
            		</div>
					<div class="card-action">
						<a href="#">Read more...</a>
						<div class="tags">
							<div class="chip">
Erotic
							</div>
							<div class="chip">
Fiction
							</div>
						</div>
						<i class="material-icons card-love">favorite_border</i>
					</div>
          		</div>
        	</div>
      	</div>
	</div>

	<div class="fixed-action-btn fab" >
    	<a class="btn-floating btn-large red">
      		<i class="large material-icons">arrow_drop_up</i>
		</a>
    	<ul>
      		<li><a class="btn-floating orange"><i class="material-icons">thumb_up</i></a></li>
			<li><a class="btn-floating green"><i class="material-icons">star</i></a></li>
			<li><a class="btn-floating blue"><i class="material-icons">add</i></a></li>
		</ul>
  	</div>
</main>
