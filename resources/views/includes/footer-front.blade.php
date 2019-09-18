 <footer class="footer-container">
        
	        <div class="container">
	        	<div class="row">
	        		
                    <div class="col">
                    	&copy; Bootstrap 4 Carousel with Multiple Items. Download it for free on <a href="https://azmind.com">AZMIND</a>.
                    </div>
                    
                </div>
	        </div>
                	
  </footer>

        <!-- Javascript -->
		<script src="{{asset('front/js/jquery-3.3.1.min.js')}}"></script>
		<script src="{{asset('front/js/jquery-migrate-3.0.0.min.js')}}"></script>
		<script src="{{asset('front/js/popper.min.js')}}"></script>
		<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script src="{{asset('front/js/jquery.backstretch.min.js')}}"></script>
        <script src="{{asset('front/js/wow.min.js')}}"></script>
        <script src="{{asset('front/js/scripts.js')}}"></script>

        <script>
            var yourNavigation = $(".nav");
                stickyDiv = "sticky";
                yourHeader = $('.header').height();

            $(window).scroll(function() {
              if( $(this).scrollTop() > yourHeader ) {
                yourNavigation.addClass(stickyDiv);
              } else {
                yourNavigation.removeClass(stickyDiv);
              }
            });
        </script>
