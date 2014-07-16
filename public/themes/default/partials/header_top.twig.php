<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">Fureal</a>
        </div>

        <!-- Top Navbar -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
            {% if Auth.check() %}
                {# Logged in? #}
                <li>
                    <a href="{{ URL.to('user') }}"><i class="glyphicon glyphicon-user"></i> {{ Auth.user().username }}</a>
                    {# Userpanel mit den wichtigsten Links #}
                </li>
                {% if (Auth.user().hasRole('admin')) %}
                    <li><a href="{{ URL.to('admin') }}">Admin</a></li>
                {% endif %}
                <li class="{# Link zu Forum-Nachrichten #}">
                    <a href="{{ URL.to('') }}"><i class="glyphicon glyphicon-"></i> Messages</a>
                </li>
                <li>
                    <a href="{{ URL.to('') }}"><i class="glyphicon glyphicon-bell"></i> Notifications</a>
                    {# Neue Antworten auf Beiträge, Neue Achievements, neue allgemeine Ankündigungen #}
                </li>
            {% endif %}
            </ul>
            <ul class="nav navbar-nav pull-right">
                {% if Auth.check() %}
                    {# Logged in? #}
                    {# Rechter Teil #}
                    <li class="pull-right nav-vote {% if canVote %}navbar-green{% endif %}">
                        <a href="{{ URL.to('') }}">Vote (Votepunkte)</a>
                        {# Link zur Vote-Page #}
                    </li>
                    <li class="pull-right">
                        <a href="{{ URL.to('') }}">Donate (&amp; punkte)</a>
                        {# Link zur Donation Page #}
                    </li>
                    <li><a href="{{ URL.to('user/logout') }}">Logout</a></li>
                {% else %}
                    <li class="{{ (Request.is('user/login') ? 'active' : '') }}"><a href="{{ URL.to('user/login') }}">{{ Lang.get('site.login') }}</a></li>
                    <li class="{{ (Request.is('user/register') ? 'active' : '') }}"><a href="{{ URL.to('user/create') }}">{{ Lang.get('site.sign_up') }}</a></li>
                {% endif %}
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>