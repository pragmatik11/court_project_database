<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* contraventionale/show.html.twig */
class __TwigTemplate_6beb1aa9eb95f42c8d4e1b925ded01aca50101d155e09b564e20419d6414d073 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "contraventionale/show.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "contraventionale/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "contraventionale/show.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <h1>Contraventionale</h1>

    <table>
        <tbody>
            <tr>
                <th>Id</th>
                <td>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute(($context["contraventionale"] ?? $this->getContext($context, "contraventionale")), "id", []), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Numar</th>
                <td>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute(($context["contraventionale"] ?? $this->getContext($context, "contraventionale")), "numar", []), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Nume</th>
                <td>";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute(($context["contraventionale"] ?? $this->getContext($context, "contraventionale")), "nume", []), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Descriere</th>
                <td>";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute(($context["contraventionale"] ?? $this->getContext($context, "contraventionale")), "descriere", []), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Data</th>
                <td>";
        // line 26
        if ($this->getAttribute(($context["contraventionale"] ?? $this->getContext($context, "contraventionale")), "data", [])) {
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute(($context["contraventionale"] ?? $this->getContext($context, "contraventionale")), "data", []), "Y-m-d H:i:s"), "html", null, true);
        }
        echo "</td>
            </tr>

            <th>Upload</th>
            <a href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl(("uploads/upload/" . $this->getAttribute(($context["contraventionale"] ?? $this->getContext($context, "contraventionale")), "pdfFilename", []))), "html", null, true);
        echo "\">View (PDF)</a>
            </tr>
        </tbody>
    </table>

    <ul>
        <li>
            <a href=\"";
        // line 37
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("contraventionale_index");
        echo "\">Back to the list</a>
        </li>
        <li>
            <a href=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("contraventionale_edit", ["id" => $this->getAttribute(($context["contraventionale"] ?? $this->getContext($context, "contraventionale")), "id", [])]), "html", null, true);
        echo "\">Edit</a>
        </li>
        <li>
            ";
        // line 43
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["delete_form"] ?? $this->getContext($context, "delete_form")), 'form_start');
        echo "
                <input type=\"submit\" value=\"Delete\">
            ";
        // line 45
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["delete_form"] ?? $this->getContext($context, "delete_form")), 'form_end');
        echo "
        </li>
    </ul>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "contraventionale/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 45,  127 => 43,  121 => 40,  115 => 37,  105 => 30,  96 => 26,  89 => 22,  82 => 18,  75 => 14,  68 => 10,  60 => 4,  51 => 3,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block body %}
    <h1>Contraventionale</h1>

    <table>
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ contraventionale.id }}</td>
            </tr>
            <tr>
                <th>Numar</th>
                <td>{{ contraventionale.numar }}</td>
            </tr>
            <tr>
                <th>Nume</th>
                <td>{{ contraventionale.nume }}</td>
            </tr>
            <tr>
                <th>Descriere</th>
                <td>{{ contraventionale.descriere }}</td>
            </tr>
            <tr>
                <th>Data</th>
                <td>{% if contraventionale.data %}{{ contraventionale.data|date('Y-m-d H:i:s') }}{% endif %}</td>
            </tr>

            <th>Upload</th>
            <a href=\"{{ asset('uploads/upload/'~ contraventionale.pdfFilename) }}\">View (PDF)</a>
            </tr>
        </tbody>
    </table>

    <ul>
        <li>
            <a href=\"{{ path('contraventionale_index') }}\">Back to the list</a>
        </li>
        <li>
            <a href=\"{{ path('contraventionale_edit', { 'id': contraventionale.id }) }}\">Edit</a>
        </li>
        <li>
            {{ form_start(delete_form) }}
                <input type=\"submit\" value=\"Delete\">
            {{ form_end(delete_form) }}
        </li>
    </ul>
{% endblock %}
", "contraventionale/show.html.twig", "/var/www/court_database2/app/Resources/views/contraventionale/show.html.twig");
    }
}
