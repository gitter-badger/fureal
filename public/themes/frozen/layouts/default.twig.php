<!DOCTYPE html>
<html class="frozen">
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <title>
        {{ Theme.get('title') }}
    </title>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="author" content="Alexander Pape" />
    <meta name="keywords" content="{{ Theme.get('keywords') }}">
    <meta name="description" content="{{ Theme.get('description') }}">

    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicons
    ================================================== -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ Theme.asset().url('ico/apple-touch-icon-144-precomposed.png')|raw }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ Theme.asset().url('ico/apple-touch-icon-114-precomposed.png')|raw }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ Theme.asset().url('ico/apple-touch-icon-72-precomposed.png')|raw }}">
    <link rel="apple-touch-icon-precomposed" href="{{ Theme.asset().url('ico/apple-touch-icon-57-precomposed.png')|raw}}">
    <link rel="shortcut icon" href="{{ Theme.asset().url('ico/favicon.png')|raw}}">

    <!-- CSS
    ================================================== -->

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

    {{ Theme.asset().styles() }}
    {{ Theme.asset().scripts() }}

    {% block scripts %}
        <script type="text/javascript">
            var Config = {
            };
        </script>
    {% endblock %}
</head>
<body>
<div id="wrapper">

    {% block headertop %}
        {{ Theme.partial('header_top') }}
    {% endblock %}


    <div class="container">
        {% block header %}
            {{ Theme.partial('header') }}
        {% endblock %}

        {{ Theme.content() }}
    </div>

    <div id="push"></div>

</div>

{% block footer %}
    {{ Theme.partial('footer') }}
{% endblock %}

{% block tracking %}
    {{ Theme.partial('tracking') }}
{% endblock %}

<!-- Javascripts
================================================== -->
{{ Theme.asset().scripts() }}

</body>
</html>