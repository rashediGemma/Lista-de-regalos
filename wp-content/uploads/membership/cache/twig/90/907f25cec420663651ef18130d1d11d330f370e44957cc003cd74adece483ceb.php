<?php

/* @activity/partials/activity-attachment-template.twig */
class __TwigTemplate_517abf3a5f9fd025843f55e3b1143b4ce41e454765e3c5ccefe8fcd8811da66a extends Twig_Template
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
        echo "<script id=\"mbsImageAttachmentTemplate\" type=\"text/html\">
\t<div class=\"mbs-one-any-attachment\" title=\"\">
\t\t<img class=\"ui image mbs-att-image\" src=\"";
        // line 3
        echo twig_escape_filter($this->env, ($context["attachmentIcon"] ?? null), "html", null, true);
        echo "\">
\t\t<span class=\"mbs-image-caption\"></span>
\t\t<div class=\"mp-attachment-image-overlay\"></div>
\t\t<div class=\"mp-progress-bar\">
\t\t\t<div class=\"ui tiny indicating progress active\">
\t\t\t\t<div class=\"bar\" style=\"width: 1%; transition-duration: 300ms;\"></div>
\t\t\t</div>
\t\t</div>
\t\t<i class=\"close icon\"></i>
\t</div>
</script>";
    }

    public function getTemplateName()
    {
        return "@activity/partials/activity-attachment-template.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<script id=\"mbsImageAttachmentTemplate\" type=\"text/html\">
\t<div class=\"mbs-one-any-attachment\" title=\"\">
\t\t<img class=\"ui image mbs-att-image\" src=\"{{ attachmentIcon }}\">
\t\t<span class=\"mbs-image-caption\"></span>
\t\t<div class=\"mp-attachment-image-overlay\"></div>
\t\t<div class=\"mp-progress-bar\">
\t\t\t<div class=\"ui tiny indicating progress active\">
\t\t\t\t<div class=\"bar\" style=\"width: 1%; transition-duration: 300ms;\"></div>
\t\t\t</div>
\t\t</div>
\t\t<i class=\"close icon\"></i>
\t</div>
</script>", "@activity/partials/activity-attachment-template.twig", "C:\\xampp\\htdocs\\lista_regalos\\wp-content\\plugins\\membership-by-supsystic\\src\\Membership\\Activity\\views\\partials\\activity-attachment-template.twig");
    }
}
