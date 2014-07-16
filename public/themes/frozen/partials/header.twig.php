
<a id="server-logo" href="/" title="{{ Theme.get('serverName') }}"><!-- {{ Theme.get('serverName') }} --></a>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">Blog Post</a>
        </div>

        <!-- Top Navbar -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href=""><i class="fa fa-user"></i> Username</a>
                    {# Userpanel mit den wichtigsten Links #}
                </li>
                <li class="{# Link zu Forum-Nachrichten #}">
                    <a href=""><i class="fa fa-book"></i> Messages</a>
                </li>
                <li>
                    <a href=""><i class="fa fa-envelope"></i> Notifications</a>
                    {# Neue Antworten auf Beiträge, Neue Achievements, neue allgemeine Ankündigungen #}
                </li>

                {# Rechter Teil #}
                <li class="pull-right {% if canVote %}navbar-green{% endif %}">
                    <a href=""><i class="fa fa-envelope"></i> Vote (Votepunkte)</a>
                    {# Link zur Vote-Page #}
                </li>
                <li class="pull-right">
                    <a href=""><i class="fa fa-envelope"></i> Donate (&amp; punkte)</a>
                    {# Link zur Donation Page #}
                </li>


            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>


<div id="navbar-main">
    <ul>
        {% for row in Theme.get('mainMenu') %}
            <li><a href="{{ row.link|raw }}">{{ row.name }}</a></li>
        {% endfor %}
    </ul>
    <ul class="nav nav-pills">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Messages</a></li>
    </ul>
</div>