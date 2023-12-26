<div class="container">
        <section class="comment-box-layout">
            <h2>1 review for <span>Iphone 14 Pro Max 1TB</span></h2>

            <div class="content-comment mt-5">
                <div class="user-info">
                    <img src="public/images/content/comment/53444f91e698c0c7caa2dbc3bdbf93fc.png" alt="">
                    <div class="box-user">
                        <div class="star-rating">
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <p class="username">Van Hoang</p>
                        <p>April 1,2021</p>
                    </div>
                </div>
                <div class="commnet-content-box">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi eius repudiandae aliquid molestias.
                    Nam vero nulla nemo, animi est necessitatibus earum explicabo, iste accusantium corporis maxime
                    deleniti minima odit fugiat.
                </div>
            </div>

            <button class="btn-write-comment" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                aria-controls="offcanvasRight">Write a comment</button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel"
                style="width: 700px;">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasRightLabel">Your product name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <form action="comment.php" method="post">
                        <div class="d-flex">
                            <p>Your rating: </p>
                            <div class="star-rating ms-3" id="star-rating">
                                <i class="fa-regular fa-star" data-star="1"></i>
                                <i class="fa-regular fa-star" data-star="2"></i>
                                <i class="fa-regular fa-star" data-star="3"></i>
                                <i class="fa-regular fa-star" data-star="4"></i>
                                <i class="fa-regular fa-star" data-star="5"></i>
                            </div>
                            <input type="hidden" id="rating-input" name="rating" readonly>
                        </div>

                        <div class="box-text">
                            <div class="form-group">
                                <textarea id="editor" name="content" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Save" class="btn btn-primary mt-3">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <script src="public/ckeditor5/build/ckeditor.js"></script>
    <script src="public/bootstrap-5/js/bootstrap.bundle.min.js"></script>
    <script>
        ClassicEditor
	.create( document.querySelector( '#editor' ), {
		// Editor configuration.
	} )
	.then( editor => {
		window.editor = editor;
	} )
	.catch( handleSampleError );
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const starContainer = document.getElementById('star-rating');
            const stars = starContainer.querySelectorAll('.fa-star');
            const ratingInput = document.getElementById('rating-input');

            starContainer.addEventListener('click', function (event) {
                const clickedStar = event.target;
                if (clickedStar.classList.contains('fa-star')) {
                    const clickedStarIndex = parseInt(clickedStar.getAttribute('data-star'));

                    // Reset all stars
                    stars.forEach(star => {
                        star.classList.remove('fa-solid');
                        star.classList.add('fa-regular');
                    });

                    // Highlight clicked stars
                    for (let i = 0; i < clickedStarIndex; i++) {
                        stars[i].classList.remove('fa-regular');
                        stars[i].classList.add('fa-solid');
                    }

                    // Update input value
                    ratingInput.value = clickedStarIndex;
                }
            });
        });


    </script>