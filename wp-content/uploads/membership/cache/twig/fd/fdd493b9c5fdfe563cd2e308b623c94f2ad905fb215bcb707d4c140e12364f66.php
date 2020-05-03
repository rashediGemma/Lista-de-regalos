<?php

/* @groups/partials/invite-modal-users.twig */
class __TwigTemplate_652a76f055c82d1d0519f999caa109cf3f73acfa0cecc53afc89fa787a431133 extends Twig_Template
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
        $this->loadTemplate("@groups/partials/invite-modal-users.twig", "@groups/partials/invite-modal-users.twig", 1, "1942629827")->display($context);
    }

    public function getTemplateName()
    {
        return "@groups/partials/invite-modal-users.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% embed '@users/partials/users-list.twig' %}
\t{% block actionButtons %}
\t\t<div class=\"ui mini primary button\" data-action=\"invite-user\">{{ translate('Invite') }}</div>
\t\t<div class=\"ui mini primary button\" data-action=\"invite-administrator\">{{ translate('Invite as administrator') }}</div>
\t\t<div class=\"ui mini primary button\" data-action=\"cancel-invitation\">{{ translate('Cancel invitation') }}</div>
\t{% endblock %}
{% endembed %}
", "@groups/partials/invite-modal-users.twig", "C:\\xampp\\htdocs\\lista_regalos\\wp-content\\plugins\\membership-by-supsystic\\src\\Membership\\Groups\\views\\partials\\invite-modal-users.twig");
    }
}


/* @groups/partials/invite-modal-users.twig */
class __TwigTemplate_652a76f055c82d1d0519f999caa109cf3f73acfa0cecc53afc89fa787a431133_1942629827 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->loadTemplate("@users/partials/users-list.twig", "@groups/partials/invite-modal-users.twig", 1);
        $this->blocks = array(
            'actionButtons' => array($this, 'block_actionButtons'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@users/partials/users-list.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_actionButtons($context, array $blocks = array())
    {
        // line 3
        echo "\t\t<div class=\"ui mini primary button\" data-action=\"invite-user\">";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Invite")), "html", null, true);
        echo "</div>
\t\t<div class=\"ui mini primary button\" data-action=\"invite-administrator\">";
        // line 4
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Invite as administrator")), "html", null, true);
        echo "</div>
\t\t<div class=\"ui mini primary button\" data-action=\"cancel-invitation\">";
        // line 5
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Cancel invitation")), "html", null, true);
        echo "</div>
\t";
    }

    public function getTemplateName()
    {
        return "@groups/partials/invite-modal-users.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 5,  86 => 4,  81 => 3,  78 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% embed '@users/partials/users-list.twig' %}
\t{% block actionButtons %}
\t\t<div class=\"ui mini primary button\" data-action=\"invite-user\">{{ translate('Invite') }}</div>
\t\t<div class=\"ui mini primary button\" data-action=\"invite-administrator\">{{ translate('Invite as administrator') }}</div>
\t\t<div class=\"ui mini primary button\" data-action=\"cancel-invitation\">{{ translate('Cancel invitation') }}</div>
\t{% endblock %}
{% endembed %}
", "@groups/partials/invite-modal-users.twig", "C:\\xampp\\htdocs\\lista_regalos\\wp-content\\plugins\\membership-by-supsystic\\src\\Membership\\Groups\\views\\partials\\invite-modal-users.twig");
    }
}
