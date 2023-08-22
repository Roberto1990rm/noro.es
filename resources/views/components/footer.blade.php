<footer class="footer mt-4" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
    <div class="containerfooter">
        <div class="row">
            <div class="col-md-4">
                <h4>Sobre Noro News</h4>
                <p>Esta plataforma nace para dar voz a temas marginados por la corrupción mediática y política, buscando destacar lo subyacente y relevante que a menudo se pasa por alto.</p>
            </div>
            <div class="col-md-4">
                <h4>Categories</h4>
                <ul class="list-unstyled">
                    <li><a href="{{ route('ads.index', ['category' => 'espana']) }}">España</a></li>
                    <li><a href="{{ route('ads.index', ['category' => 'Agenda2030']) }}">Agenda2030</a></li>
                    <li><a href="{{ route('ads.index', ['category' => 'inmigracion']) }}">Fronteras abiertas</a></li>
                    <li><a href="{{ route('ads.index', ['category' => 'autoritarismo']) }}">Autoritarismo</a></li>
                    <li><a href="{{ route('ads.index', ['category' => 'lgtbiq+']) }}">Lgtbiq+</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4>Contact Us</h4>
                <p>Email: beanroka@gmail.com</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <hr>
                <p>&copy; {{ date('2023') }} Noro.es / All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
