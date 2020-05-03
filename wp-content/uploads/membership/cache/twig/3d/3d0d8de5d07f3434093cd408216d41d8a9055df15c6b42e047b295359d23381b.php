<?php

/* @activity/partials/activity-report-modal.twig */
class __TwigTemplate_5c5fc8a664cb65647bb95657310cdb6ae5b2141959dfe71e45f04bc9c2cf58fd extends Twig_Template
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
        echo "<div class=\"ui small modal\" id=\"report-activity-modal\">
\t<i class=\"close icon\"></i>
\t<div class=\"header\">
\t\t";
        // line 4
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Report post")), "html", null, true);
        echo "
\t</div>
\t<div class=\"content\">
\t\t<div class=\"ui form\">
\t\t\t<div class=\"field\">
\t\t\t\t<label>";
        // line 9
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Message")), "html", null, true);
        echo "</label>
\t\t\t\t<textarea rows=\"5\"></textarea>
\t\t\t</div>
\t\t</div>
\t</div>
\t<div class=\"actions\">
\t\t<button class=\"ui button mini secondary cancel\">";
        // line 15
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Cancel")), "html", null, true);
        echo "</button>
\t\t<button class=\"ui positive mini primary button\">";
        // line 16
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Send")), "html", null, true);
        echo "</button>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "@activity/partials/activity-report-modal.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 16,  41 => 15,  32 => 9,  24 => 4,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"ui small modal\" id=\"report-activity-modal\">
\t<i class=\"close icon\"></i>
\t<div class=\"header\">
\t\t{{ translate('Report post') }}
\t</div>
\t<div class=\"content\">
\t\t<div class=\"ui form\">
\t\t\t<div class=\"field\">
\t\t\t\t<label>{{ translate('Message') }}</label>
\t\t\t\t<textarea rows=\"5\"></textarea>
\t\t\t</div>
\t\t</div>
\t</div>
\t<div class=\"actions\">
\t\t<button class=\"ui button mini secondary cancel\">{{ translate('Cancel') }}</button>
\t\t<button class=\"ui positive mini primary button\">{{ translate('Send') }}</button>
\t</div>
</div>", "@activity/partials/activity-report-modal.twig", "C:\\xampp\\htdocs\\lista_regalos\\wp-content\\plugins\\membership-by-supsystic\\src\\Membership\\Activity\\views\\partials\\activity-report-modal.twig");
    }
}
