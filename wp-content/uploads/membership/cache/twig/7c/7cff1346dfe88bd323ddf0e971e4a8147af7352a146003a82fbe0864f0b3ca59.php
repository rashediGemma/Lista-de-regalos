<?php

/* @activity/partials/activity-gallery-modal.twig */
class __TwigTemplate_49d526e3c8d87da30bebaba24e1f976ec9e494ebd26e851954c0970a1da30da8 extends Twig_Template
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
        echo "<div class=\" sc-membership ui basic modal mp-gallery-modal\">
\t<div class=\"ui active dimmer modal-loader\">
\t\t<div class=\"ui loader\"></div>
\t</div>
\t<div class=\"image-index\"><span class=\"current-index\"></span> ";
        // line 5
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("of")), "html", null, true);
        echo " <span class=\"total\"></span></div>
\t<div class=\"controls\" style=\"display: none\">
\t\t<div class=\"prev-button\">
\t\t\t<i class=\"chevron left icon\"></i>
\t\t</div>
\t\t<div class=\"next-button\">
\t\t\t<i class=\"chevron right icon\"></i>
\t\t</div>
\t</div>
\t<i class=\"close icon\"></i>
\t<div class=\"image-content\">
\t\t<div class=\"image\">
\t\t\t<img alt=\"\"/>
\t\t</div>
\t</div>
</div>

";
    }

    public function getTemplateName()
    {
        return "@activity/partials/activity-gallery-modal.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 5,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\" sc-membership ui basic modal mp-gallery-modal\">
\t<div class=\"ui active dimmer modal-loader\">
\t\t<div class=\"ui loader\"></div>
\t</div>
\t<div class=\"image-index\"><span class=\"current-index\"></span> {{ translate('of') }} <span class=\"total\"></span></div>
\t<div class=\"controls\" style=\"display: none\">
\t\t<div class=\"prev-button\">
\t\t\t<i class=\"chevron left icon\"></i>
\t\t</div>
\t\t<div class=\"next-button\">
\t\t\t<i class=\"chevron right icon\"></i>
\t\t</div>
\t</div>
\t<i class=\"close icon\"></i>
\t<div class=\"image-content\">
\t\t<div class=\"image\">
\t\t\t<img alt=\"\"/>
\t\t</div>
\t</div>
</div>

{#<script type=\"text/javascript\" src=\"{{ assets('base', '/lib/jquery.history.js') }}\"></script>#}", "@activity/partials/activity-gallery-modal.twig", "C:\\xampp\\htdocs\\lista_regalos\\wp-content\\plugins\\membership-by-supsystic\\src\\Membership\\Activity\\views\\partials\\activity-gallery-modal.twig");
    }
}
