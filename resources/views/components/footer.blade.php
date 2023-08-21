<footer class="footer mt-4" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
    <div class="containerfooter">
        <div class="row">
            <div class="col-md-4">
                <h4>About Us</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et convallis lectus.</p>
            </div>
            <div class="col-md-4">
                <h4>Categories</h4>
                <ul class="list-unstyled">
                    <li><a href="{{ route('ads.index', ['category' => 'espana']) }}">España</a></li>
                    <li><a href="{{ route('ads.index', ['category' => 'Agenda2030']) }}">Agenda2030</a></li>
                    <li><a href="{{ route('ads.index', ['category' => 'Alarmismo']) }}">Alarmismo climático</a></li>
                    <li><a href="{{ route('ads.index', ['category' => 'covid']) }}">Covid 2.0</a></li>
                    <li><a href="{{ route('ads.index', ['category' => 'autoritarismo']) }}">Autoritarismo</a></li>
                    <li><a href="{{ route('ads.index', ['category' => 'globalismo']) }}">Globalismo</a></li>
                    <li><a href="{{ route('ads.index', ['category' => 'lgtbiq+']) }}">Lgtbiq+</a></li>
                    <li><a href="{{ route('ads.index', ['category' => 'ideologia']) }}">Ideología de Género</a></li>
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
