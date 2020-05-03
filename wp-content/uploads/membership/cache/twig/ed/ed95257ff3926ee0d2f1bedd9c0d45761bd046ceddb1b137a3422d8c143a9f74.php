<?php

/* @users/members.twig */
class __TwigTemplate_db9066b18de925b3dafdd9fb9da5657231137216de2f9ff9f7b246307f7e7689 extends Twig_Template
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
        $context["paginationIsEnabled"] = ($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "members", array()), "show-pages", array(), "array") == "true");
        // line 2
        $context["tabsIsEnabled"] = ($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "members", array()), "show-tabs", array(), "array") == "true");
        // line 3
        $context["showRoleList"] = (twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "members", array()), "roles-to-display", array(), "array")) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "members", array()), "roles-to-display", array(), "array"), 0, array(), "array") == "all"));
        // line 4
        echo "
<div class=\"sc-membership\">
    <div class=\"ui grid\">
        <div class=\"wide column\">

            <div class=\"ui form basic vertical segment\" id=\"mbsMembersSearchForm\">
                <div class=\"ui fluid icon input ";
        // line 10
        if (($context["paginationIsEnabled"] ?? null)) {
            echo "action";
        }
        echo " ";
        if ( !($context["showRoleList"] ?? null)) {
            echo "mbsSolo";
        }
        echo "\" id=\"mbsMsfUserNameWr\">
                    <input type=\"text\" placeholder=\"";
        // line 11
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Find user...")), "html", null, true);
        echo "\" id=\"users-search-input\" value=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["request"] ?? null), "query", array()), "search", array()), "html", null, true);
        echo "\">
                    ";
        // line 12
        if (($context["paginationIsEnabled"] ?? null)) {
            // line 13
            echo "                        <button class=\"ui icon button\"><i class=\"search icon\"></i></button>
                    ";
        } else {
            // line 15
            echo "                        <i class=\"search icon\"></i>
                    ";
        }
        // line 17
        echo "                </div>
\t\t\t\t";
        // line 18
        if (($context["showRoleList"] ?? null)) {
            // line 19
            echo "\t\t\t\t\t<div class=\"field\" id=\"mbsMsfUserRoleWr\">
\t\t\t\t\t\t<select name=\"mbsFindUserRoleSlct\" id=\"mbsMsfUserRoleId\">
\t\t\t\t\t\t\t";
            // line 21
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["userRoleList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["oneRole"]) {
                // line 22
                echo "\t\t\t\t\t\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["oneRole"], "id", array()), "html", null, true);
                echo "\" ";
                if (($this->getAttribute($context["oneRole"], "selected", array()) == true)) {
                    echo "selected=\"selected\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["oneRole"], "name", array()), "html", null, true);
                echo "</option>
\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['oneRole'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            echo "\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t";
        } else {
            // line 27
            echo "\t\t\t\t\t";
            // line 28
            echo "\t\t\t\t\t<input type=\"hidden\" name=\"mbsFindUserRoleSlct\" id=\"mbsMsfUserRoleId\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "members", array()), "roles-to-display", array(), "array"), 0, array(), "array"), "html", null, true);
            echo "\"/>
\t\t\t\t";
        }
        // line 30
        echo "\t\t\t</div>
\t        ";
        // line 31
        if ((($context["user"] ?? null) && ($context["tabsIsEnabled"] ?? null))) {
            // line 32
            echo "\t\t\t\t<div class=\"ui basic vertical segment\">
\t\t\t\t\t<div class=\"ui center aligned container member-tabs\" style=\"position: relative;\">
\t\t\t\t\t\t<button class=\"ui mini primary button ";
            // line 34
            if ((($context["userType"] ?? null) == "all")) {
                echo "active";
            }
            echo "\" data-current-url=\"";
            echo twig_escape_filter($this->env, ($context["membersPageUrl"] ?? null), "html", null, true);
            echo "\" data-user-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["user"] ?? null), "id", array()), "html", null, true);
            echo "\" data-count=\"";
            echo twig_escape_filter($this->env, ($context["total_count"] ?? null), "html", null, true);
            echo "\" data-action=\"all\" style=\"\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("All members")), "html", null, true);
            echo "<span class=\"sc-count\">";
            echo twig_escape_filter($this->env, ($context["total_count"] ?? null), "html", null, true);
            echo "</span></button>
\t\t\t\t\t\t<button class=\"ui mini primary button ";
            // line 35
            if ((($context["userType"] ?? null) == "friends")) {
                echo "active";
            }
            echo "\" data-current-url=\"";
            echo twig_escape_filter($this->env, ($context["membersPageUrl"] ?? null), "html", null, true);
            echo "\" data-user-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["user"] ?? null), "id", array()), "html", null, true);
            echo "\" data-count=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["user"] ?? null), "friends", array()), "html", null, true);
            echo "\" data-action=\"friends\" style=\"\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Friends")), "html", null, true);
            echo "<span class=\"sc-count\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["user"] ?? null), "friends", array()), "html", null, true);
            echo "</span></button>
\t\t\t\t\t\t<button class=\"ui mini primary button ";
            // line 36
            if ((($context["userType"] ?? null) == "follows")) {
                echo "active";
            }
            echo "\" data-current-url=\"";
            echo twig_escape_filter($this->env, ($context["membersPageUrl"] ?? null), "html", null, true);
            echo "\" data-user-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["user"] ?? null), "id", array()), "html", null, true);
            echo "\" data-count=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["user"] ?? null), "follows", array()), "html", null, true);
            echo "\" data-action=\"follows\" style=\"\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Follows")), "html", null, true);
            echo "<span class=\"sc-count\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["user"] ?? null), "follows", array()), "html", null, true);
            echo "</span></button>
\t\t\t\t\t\t<button class=\"ui mini primary button ";
            // line 37
            if ((($context["userType"] ?? null) == "followers")) {
                echo "active";
            }
            echo "\" data-current-url=\"";
            echo twig_escape_filter($this->env, ($context["membersPageUrl"] ?? null), "html", null, true);
            echo "\" data-user-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["user"] ?? null), "id", array()), "html", null, true);
            echo "\" data-count=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["user"] ?? null), "followers", array()), "html", null, true);
            echo "\" data-action=\"followers\" style=\"\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Followers")), "html", null, true);
            echo "<span class=\"sc-count\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["user"] ?? null), "followers", array()), "html", null, true);
            echo "</span></button>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t        ";
        }
        // line 41
        echo "            <div class=\"ui basic vertical segment\">
                <div class=\"ui two cards stackable users-list\">
                    ";
        // line 43
        $this->loadTemplate("@users/partials/users-list.twig", "@users/members.twig", 43)->display(array("users" => ($context["users"] ?? null)));
        // line 44
        echo "                </div>
\t            <div class=\"ui two cards stackable users-list-tabs\" style=\"display: none\"></div>
            </div>

            ";
        // line 48
        if ((($context["paginationIsEnabled"] ?? null) &&  !twig_test_empty(($context["users"] ?? null)))) {
            // line 49
            echo "\t            <div class=\"ui center aligned container users-list-pagination\">
                    ";
            // line 50
            $this->loadTemplate("@users/partials/users-list-pagination.twig", "@users/members.twig", 50)->display(array("totalPages" => ($context["totalPages"] ?? null), "currentPage" => ($context["currentPage"] ?? null), "userType" => ($context["userType"] ?? null)));
            // line 51
            echo "                </div>
            ";
        }
        // line 53
        echo "
            ";
        // line 54
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "members", array()), "show-load-more-button", array(), "array") == "true")) {
            // line 55
            echo "                <div class=\"ui basic vertical segment\" id=\"users-list-load-more\">
                    <div class=\"ui center aligned container\">
                        <button class=\"ui mini primary button\" style=\"display: none\">";
            // line 57
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Load more")), "html", null, true);
            echo "</button>
                    </div>
                </div>
            ";
        }
        // line 61
        echo "
            <div class=\"ui basic segment very padded users-list-loader\" style=\"display: none\">
                <div class=\"ui active loader\"></div>
            </div>

            ";
        // line 66
        if (twig_test_empty(($context["users"] ?? null))) {
            // line 67
            echo "                ";
            if ( !twig_test_empty($this->getAttribute($this->getAttribute(($context["request"] ?? null), "query", array()), "search", array()))) {
                // line 68
                echo "                    <div class=\"ui center aligned container\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Your search returned no results.")), "html", null, true);
                echo "</div>
                ";
            } else {
                // line 70
                echo "                    <div class=\"ui center aligned container\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("There is no users yet.")), "html", null, true);
                echo "</div>
                ";
            }
            // line 72
            echo "            ";
        }
        // line 73
        echo "
        </div>
    </div>

\t";
        // line 77
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["environment"] ?? null), "dispatcher", array()), "dispatch", array(0 => "users.send.message.modal.wnd"), "method"), "html", null, true);
        echo "
</div>

";
        // line 80
        if ( !($context["userLoggedIn"] ?? null)) {
            // line 81
            echo "\t";
            $this->loadTemplate("@auth/partials/login-modal.twig", "@users/members.twig", 81)->display($context);
        }
    }

    public function getTemplateName()
    {
        return "@users/members.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  256 => 81,  254 => 80,  248 => 77,  242 => 73,  239 => 72,  233 => 70,  227 => 68,  224 => 67,  222 => 66,  215 => 61,  208 => 57,  204 => 55,  202 => 54,  199 => 53,  195 => 51,  193 => 50,  190 => 49,  188 => 48,  182 => 44,  180 => 43,  176 => 41,  157 => 37,  141 => 36,  125 => 35,  109 => 34,  105 => 32,  103 => 31,  100 => 30,  94 => 28,  92 => 27,  87 => 24,  72 => 22,  68 => 21,  64 => 19,  62 => 18,  59 => 17,  55 => 15,  51 => 13,  49 => 12,  43 => 11,  33 => 10,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% set paginationIsEnabled = settings.design.members['show-pages'] == 'true' %}
{% set tabsIsEnabled = settings.design.members['show-tabs'] == 'true' %}
{% set showRoleList = (settings.design.members['roles-to-display'] | length and settings.design.members['roles-to-display'][0] == 'all') %}

<div class=\"sc-membership\">
    <div class=\"ui grid\">
        <div class=\"wide column\">

            <div class=\"ui form basic vertical segment\" id=\"mbsMembersSearchForm\">
                <div class=\"ui fluid icon input {% if paginationIsEnabled %}action{% endif %} {% if not showRoleList %}mbsSolo{% endif %}\" id=\"mbsMsfUserNameWr\">
                    <input type=\"text\" placeholder=\"{{ translate('Find user...') }}\" id=\"users-search-input\" value=\"{{ request.query.search }}\">
                    {% if paginationIsEnabled %}
                        <button class=\"ui icon button\"><i class=\"search icon\"></i></button>
                    {% else %}
                        <i class=\"search icon\"></i>
                    {% endif %}
                </div>
\t\t\t\t{% if showRoleList %}
\t\t\t\t\t<div class=\"field\" id=\"mbsMsfUserRoleWr\">
\t\t\t\t\t\t<select name=\"mbsFindUserRoleSlct\" id=\"mbsMsfUserRoleId\">
\t\t\t\t\t\t\t{% for oneRole in userRoleList %}
\t\t\t\t\t\t\t\t<option value=\"{{ oneRole.id }}\" {% if oneRole.selected == true %}selected=\"selected\"{% endif %}>{{ oneRole.name }}</option>
\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t{% else %}
\t\t\t\t\t{# if parameter in design not equal \"All\" - showing users for current role #}
\t\t\t\t\t<input type=\"hidden\" name=\"mbsFindUserRoleSlct\" id=\"mbsMsfUserRoleId\" value=\"{{ settings.design.members['roles-to-display'][0] }}\"/>
\t\t\t\t{% endif %}
\t\t\t</div>
\t        {% if user and tabsIsEnabled %}
\t\t\t\t<div class=\"ui basic vertical segment\">
\t\t\t\t\t<div class=\"ui center aligned container member-tabs\" style=\"position: relative;\">
\t\t\t\t\t\t<button class=\"ui mini primary button {% if userType == 'all' %}active{% endif %}\" data-current-url=\"{{ membersPageUrl }}\" data-user-id=\"{{ user.id }}\" data-count=\"{{ total_count }}\" data-action=\"all\" style=\"\">{{ translate('All members') }}<span class=\"sc-count\">{{ total_count }}</span></button>
\t\t\t\t\t\t<button class=\"ui mini primary button {% if userType == 'friends' %}active{% endif %}\" data-current-url=\"{{ membersPageUrl }}\" data-user-id=\"{{ user.id }}\" data-count=\"{{ user.friends }}\" data-action=\"friends\" style=\"\">{{ translate('Friends') }}<span class=\"sc-count\">{{ user.friends }}</span></button>
\t\t\t\t\t\t<button class=\"ui mini primary button {% if userType == 'follows' %}active{% endif %}\" data-current-url=\"{{ membersPageUrl }}\" data-user-id=\"{{ user.id }}\" data-count=\"{{ user.follows }}\" data-action=\"follows\" style=\"\">{{ translate('Follows') }}<span class=\"sc-count\">{{ user.follows }}</span></button>
\t\t\t\t\t\t<button class=\"ui mini primary button {% if userType == 'followers' %}active{% endif %}\" data-current-url=\"{{ membersPageUrl }}\" data-user-id=\"{{ user.id }}\" data-count=\"{{ user.followers }}\" data-action=\"followers\" style=\"\">{{ translate('Followers') }}<span class=\"sc-count\">{{ user.followers }}</span></button>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t        {% endif %}
            <div class=\"ui basic vertical segment\">
                <div class=\"ui two cards stackable users-list\">
                    {% include '@users/partials/users-list.twig' with {'users': users} only %}
                </div>
\t            <div class=\"ui two cards stackable users-list-tabs\" style=\"display: none\"></div>
            </div>

            {% if paginationIsEnabled and users is not empty %}
\t            <div class=\"ui center aligned container users-list-pagination\">
                    {% include '@users/partials/users-list-pagination.twig' with {'totalPages': totalPages, 'currentPage': currentPage, 'userType': userType} only %}
                </div>
            {% endif %}

            {% if settings.design.members['show-load-more-button'] == 'true' %}
                <div class=\"ui basic vertical segment\" id=\"users-list-load-more\">
                    <div class=\"ui center aligned container\">
                        <button class=\"ui mini primary button\" style=\"display: none\">{{ translate('Load more') }}</button>
                    </div>
                </div>
            {% endif %}

            <div class=\"ui basic segment very padded users-list-loader\" style=\"display: none\">
                <div class=\"ui active loader\"></div>
            </div>

            {% if users is empty %}
                {% if request.query.search is not empty %}
                    <div class=\"ui center aligned container\">{{ translate('Your search returned no results.') }}</div>
                {% else %}
                    <div class=\"ui center aligned container\">{{ translate('There is no users yet.') }}</div>
                {% endif %}
            {% endif %}

        </div>
    </div>

\t{{ environment.dispatcher.dispatch('users.send.message.modal.wnd') }}
</div>

{% if not userLoggedIn %}
\t{% include '@auth/partials/login-modal.twig' %}
{% endif %}", "@users/members.twig", "C:\\xampp\\htdocs\\lista_regalos\\wp-content\\plugins\\membership-by-supsystic\\src\\Membership\\Users\\views\\members.twig");
    }
}
