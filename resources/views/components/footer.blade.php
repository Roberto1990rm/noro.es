<footer class="footer mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>About Us</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et convallis lectus.</p>
            </div>
            <div class="col-md-4">
                <h4>Categories</h4>
                <ul class="list-unstyled">
                    <li><a href="{{ route('ads.index', ['category' => 'nacional']) }}">Nacional</a></li>
                    <li><a href="{{ route('ads.index', ['category' => 'internacional']) }}">Internacional</a></li>
                    <li><a href="{{ route('ads.index', ['category' => 'politica']) }}">Politica</a></li>
                    <li><a href="{{ route('ads.index', ['category' => 'economia']) }}">Economia</a></li>
                    <!-- Agrega más categorías aquí -->
                </ul>
            </div>
            <div class="col-md-4">
                <h4>Contact Us</h4>
                <p>Email: contact@yournewswebsite.com</p>
                <p>Phone: +123-456-7890</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <hr>
                <p>&copy; {{ date('Y') }} Your News Website. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
