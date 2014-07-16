
<a id="server-logo" href="{{ URL.to("") }}" title="{{ serverName }}"><!-- {{ serverName }} --></a>

{% block mainMenu %}
    <div id="navbar-main">
        <ul class="nav nav-pills">
            {% for row in Theme.get('nav-main') %}
                <li><a href="{{ row.link|raw }}">{{ row.name }}</a></li>
            {% endfor %}
        </ul>
    </div>
{% endblock %}


