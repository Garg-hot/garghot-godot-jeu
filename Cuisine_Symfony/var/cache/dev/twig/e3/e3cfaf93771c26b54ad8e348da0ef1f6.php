<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* admin/plat/index.html.twig */
class __TwigTemplate_63cc6176728e814a8efc9821d2694e27 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/plat/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/plat/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "admin/plat/index.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Tous les plats!";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "    <h1>Tous les plats</h1>
    <P>
        <a href=\"";
        // line 8
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin.plat.create");
        yield "\">Ajouter un nouveau plat</a>
    </P>
    <table >
        <thead>
            <tr>
                <th>Nom</th>
                <th scope=\"col\">Categorie</th> 
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
    ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["plats"]) || array_key_exists("plats", $context) ? $context["plats"] : (function () { throw new RuntimeError('Variable "plats" does not exist.', 19, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["plat"]) {
            // line 20
            yield "            <tr>
                <td>
                    <a href=\"";
            // line 22
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin.plat.show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "slug", [], "any", false, false, false, 22), "id" => CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "id", [], "any", false, false, false, 22)]), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "nom", [], "any", false, false, false, 22), "html", null, true);
            yield "</a>
                </td>
                <td>";
            // line 24
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "categorie", [], "any", false, true, false, 24), "nom", [], "any", true, true, false, 24)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "categorie", [], "any", false, false, false, 24), "nom", [], "any", false, false, false, 24), "")) : ("")), "html", null, true);
            yield "</td>
                <td>
                    <div>
                        <a href=\"";
            // line 27
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin.plat.edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "id", [], "any", false, false, false, 27)]), "html", null, true);
            yield "\">Editer</a>
                        <form action=\"";
            // line 28
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin.plat.delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "id", [], "any", false, false, false, 28)]), "html", null, true);
            yield "\" method=\"post\">
                            <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
                            <button type=\"submit\">Supprimer</button>
                        </form>
                    </div>
                </td>
            <tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['plat'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        yield "        </tbody>
    </table>

    <h5>plats de moins de ";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["minute_max"]) || array_key_exists("minute_max", $context) ? $context["minute_max"] : (function () { throw new RuntimeError('Variable "minute_max" does not exist.', 39, $this->source); })()), "html", null, true);
        yield "min</h5>

     <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th scope=\"col\">Categorie</th> 
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
    ";
        // line 50
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["plats_10min"]) || array_key_exists("plats_10min", $context) ? $context["plats_10min"] : (function () { throw new RuntimeError('Variable "plats_10min" does not exist.', 50, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["plat"]) {
            // line 51
            yield "            <tr>
                <td>
                    <a href=\"";
            // line 53
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin.plat.edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "id", [], "any", false, false, false, 53)]), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "nom", [], "any", false, false, false, 53), "html", null, true);
            yield "</a>
                </td>
                <td>";
            // line 55
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "categorie", [], "any", false, true, false, 55), "nom", [], "any", true, true, false, 55)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "categorie", [], "any", false, false, false, 55), "nom", [], "any", false, false, false, 55), "")) : ("")), "html", null, true);
            yield "</td>
                <td>
                    <div>
                        <a href=\"";
            // line 58
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin.plat.edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "id", [], "any", false, false, false, 58)]), "html", null, true);
            yield "\">Editer</a>
                        <form action=\"";
            // line 59
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin.plat.delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["plat"], "id", [], "any", false, false, false, 59)]), "html", null, true);
            yield "\" method=\"post\">
                            <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
                            <button type=\"submit\">Supprimer</button>
                        </form>
                    <div>
                </td>
            <tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['plat'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 67
        yield "        </tbody>
    </table>


";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/plat/index.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  215 => 67,  201 => 59,  197 => 58,  191 => 55,  184 => 53,  180 => 51,  176 => 50,  162 => 39,  157 => 36,  143 => 28,  139 => 27,  133 => 24,  126 => 22,  122 => 20,  118 => 19,  104 => 8,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Tous les plats!{% endblock %}

{% block body %}
    <h1>Tous les plats</h1>
    <P>
        <a href=\"{{ path('admin.plat.create') }}\">Ajouter un nouveau plat</a>
    </P>
    <table >
        <thead>
            <tr>
                <th>Nom</th>
                <th scope=\"col\">Categorie</th> 
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
    {% for plat in plats %}
            <tr>
                <td>
                    <a href=\"{{ path('admin.plat.show', {'slug': plat.slug, 'id': plat.id }) }}\">{{ plat.nom }}</a>
                </td>
                <td>{{ plat.categorie.nom | default('')}}</td>
                <td>
                    <div>
                        <a href=\"{{ path('admin.plat.edit', {'id': plat.id }) }}\">Editer</a>
                        <form action=\"{{ path('admin.plat.delete', {'id': plat.id }) }}\" method=\"post\">
                            <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
                            <button type=\"submit\">Supprimer</button>
                        </form>
                    </div>
                </td>
            <tr>
    {% endfor %}
        </tbody>
    </table>

    <h5>plats de moins de {{minute_max }}min</h5>

     <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th scope=\"col\">Categorie</th> 
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
    {% for plat in plats_10min %}
            <tr>
                <td>
                    <a href=\"{{ path('admin.plat.edit', {id: plat.id }) }}\">{{ plat.nom }}</a>
                </td>
                <td>{{ plat.categorie.nom | default('')}}</td>
                <td>
                    <div>
                        <a href=\"{{ path('admin.plat.edit', {'id': plat.id }) }}\">Editer</a>
                        <form action=\"{{ path('admin.plat.delete', {'id': plat.id }) }}\" method=\"post\">
                            <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
                            <button type=\"submit\">Supprimer</button>
                        </form>
                    <div>
                </td>
            <tr>
    {% endfor %}
        </tbody>
    </table>


{% endblock %}
 ", "admin/plat/index.html.twig", "D:\\FINAL LESY BRADA\\Cuisine_Symfony\\templates\\admin\\plat\\index.html.twig");
    }
}
