
{% if errors.all()|length > 0 %}
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Error</h4>
    Please check the form below for errors
</div>
{% endif %}

{% if Session.has('success') %}
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Success</h4>
    {% if message is iterable %}
        {% for m in message %}
            {{ m }}
        {% endfor %}
    {% else %}
        {{ message }}
    {% endif %}
</div>
{% endif %}

{% if Session.has('error') %}
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Error</h4>
    {% if message is iterable %}
        {% for m in message %}
            {{ m }}
        {% endfor %}
    {% else %}
        {{ message }}
    {% endif %}
</div>
{% endif %}

{% if Session.has('warning') %}
<div class="alert alert-warning alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Warning</h4>
    {% if message is iterable %}
        {% for m in message %}
            {{ m }}
        {% endfor %}
    {% else %}
        {{ message }}
    {% endif %}
</div>
{% endif %}

{% if Session.has('info') %}
<div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Info</h4>
    {% if message is iterable %}
        {% for m in message %}
            {{ m }}
        {% endfor %}
    {% else %}
        {{ message }}
    {% endif %}
</div>
{% endif %}
