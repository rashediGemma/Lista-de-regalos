<?php

/* @auth/login.twig */
class __TwigTemplate_07f956fd335cc96cade83949112acfc5b9693c7d8e4656274c90abc87fc95eba extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"sc-membership\">
\t<div class=\"ui centered grid\">
\t\t<div class=\"column left aligned\">
\t\t\t";
        // line 4
        $this->loadTemplate("@auth/partials/login-form.twig", "@auth/login.twig", 4)->display($context);
        // line 5
        echo "\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "@auth/login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 5,  24 => 4,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"sc-membership\">
\t<div class=\"ui centered grid\">
\t\t<div class=\"column left aligned\">
\t\t\t{% include '@auth/partials/login-form.twig' %}
\t\t</div>
\t</div>
</div>", "@auth/login.twig", "C:\\xampp\\htdocs\\lista_regalos\\wp-content\\plugins\\membership-by-supsystic\\src\\Membership\\Auth\\views\\login.twig");
    }
}
