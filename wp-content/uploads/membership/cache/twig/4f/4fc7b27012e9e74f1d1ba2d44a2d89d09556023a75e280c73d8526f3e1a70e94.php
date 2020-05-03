<?php

/* @users/about.twig */
class __TwigTemplate_f9ef6e238656628d7d62cbc91c44afb19ac9658c4f35774d227d1a4b3367a48b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@users/profile.twig", "@users/about.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@users/profile.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "\t<div class=\"ui basic vertical segment\" id=\"mp-about\">
\t\t<div class=\"ui grid\">
\t\t\t<div class=\"sixteen wide mobile six wide tablet five wide computer column\">
\t\t\t\t<div class=\"ui stackable secondary vertical fluid pointing menu about-tabs\">
\t\t\t\t\t";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["sections"] ?? null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
            // line 9
            echo "\t\t\t\t\t\t<a class=\"item ";
            if ($this->getAttribute($context["loop"], "first", array())) {
                echo "active";
            }
            echo "\" data-tab=\"";
            echo twig_escape_filter($this->env, $context["section"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["section"], "html", null, true);
            echo "</a>
\t\t\t\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['section'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "                    ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["environment"] ?? null), "dispatcher", array()), "dispatch", array(0 => "profileAboutMenu"), "method"), "html", null, true);
        echo "
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"sixteen wide mobile ten wide tablet eleven wide computer column\">
\t\t\t\t";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["sections"] ?? null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
            // line 16
            echo "\t\t\t\t\t<div class=\"ui tab ";
            if ($this->getAttribute($context["loop"], "first", array())) {
                echo "active";
            }
            echo "\" data-tab=\"";
            echo twig_escape_filter($this->env, $context["section"], "html", null, true);
            echo "\">
\t\t\t\t\t\t";
            // line 17
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["fields"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                // line 18
                echo "
\t\t\t\t\t\t\t";
                // line 19
                if (((($this->getAttribute($context["field"], "section", array()) == $context["section"]) && ($this->getAttribute($context["field"], "enabled", array()) == true)) && ($this->getAttribute($context["field"], "hideInProfile", array()) != true))) {
                    // line 20
                    echo "                                ";
                    ob_start();
                    // line 21
                    echo "                                    ";
                    if ($this->getAttribute($context["field"], "validations", array())) {
                        // line 22
                        echo "\t\t\t\t\t\t\t\t\t\tdata-validations=\"";
                        echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute($context["field"], "validations", array())), "html", null, true);
                        echo "\"
                                    ";
                    }
                    // line 24
                    echo "                                ";
                    $context["validations"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 25
                    echo "\t\t\t\t\t\t\t\t<div class=\"ui vertical segment\">
\t\t\t\t\t\t\t\t\t<div class=\"ui form mp-field\" data-field-name=\"";
                    // line 26
                    echo twig_escape_filter($this->env, $this->getAttribute($context["field"], "name", array()), "html", null, true);
                    echo "\" data-field-type=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["field"], "type", array()), "html", null, true);
                    echo "\"";
                    echo twig_escape_filter($this->env, ($context["validations"] ?? null), "html", null, true);
                    echo ">
\t\t\t\t\t\t\t\t\t\t<div class=\"ui relaxed grid\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"sixteen wide mobile six wide tablet five wide computer column\">
\t\t\t\t\t\t\t\t\t\t\t\t<label>";
                    // line 29
                    echo twig_escape_filter($this->env, $this->getAttribute($context["field"], "label", array()), "html", null, true);
                    echo "</label>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"sixteen wide mobile ten wide tablet eleven wide computer column\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"mp-field-data\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 33
                    if (($this->env->getExtension('Membership_Users_Twig')->isCurrentUser(($context["requestedUser"] ?? null)) && ($this->getAttribute($context["field"], "name", array()) != "user_login"))) {
                        // line 34
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"ui button mini primary field-edit-action\"><i class=\"write icon\"></i>";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Edit")), "html", null, true);
                        echo "</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 36
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 37
                    if ( !twig_test_empty($this->getAttribute($context["field"], "data", array()))) {
                        // line 38
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if ($this->getAttribute($context["field"], "options", array())) {
                            // line 39
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["data"] = array();
                            // line 40
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["field"], "options", array()));
                            foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                                // line 41
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                if (twig_in_filter($this->getAttribute($context["option"], "id", array()), $this->getAttribute($context["field"], "data", array()))) {
                                    // line 42
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    $context["data"] = twig_array_merge(($context["data"] ?? null), array(0 => $this->getAttribute($context["option"], "name", array())));
                                    // line 43
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 44
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 45
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            echo twig_escape_filter($this->env, twig_join_filter(($context["data"] ?? null), " • "), "html", null, true);
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 47
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["field"], "data", array()), "html", null, true);
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 49
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 50
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if ($this->getAttribute($context["field"], "options", array())) {
                            // line 51
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["data"] = array();
                            // line 52
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["field"], "options", array()));
                            foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                                // line 53
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                if ($this->getAttribute($context["option"], "checked", array())) {
                                    // line 54
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    $context["data"] = twig_array_merge(($context["data"] ?? null), array(0 => $this->getAttribute($context["option"], "name", array())));
                                    // line 55
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 56
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 57
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            echo twig_escape_filter($this->env, twig_join_filter(($context["data"] ?? null), " • "), "html", null, true);
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 59
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 60
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 62
                    if ($this->env->getExtension('Membership_Users_Twig')->isCurrentUser(($context["requestedUser"] ?? null))) {
                        // line 63
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"mp-field-edit\" style=\"display: none\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 64
                        if (($this->getAttribute($context["field"], "type", array()) == "text")) {
                            // line 65
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["field"], "data", array()), "html", null, true);
                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute(                        // line 66
$context["field"], "type", array()) == "email")) {
                            // line 67
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"email\" value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["field"], "data", array()), "html", null, true);
                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute(                        // line 68
$context["field"], "type", array()) == "password")) {
                            // line 69
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"password\" value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["field"], "data", array()), "html", null, true);
                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute(                        // line 70
$context["field"], "type", array()) == "numeric")) {
                            // line 71
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"number\" value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["field"], "data", array()), "html", null, true);
                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute(                        // line 72
$context["field"], "type", array()) == "date")) {
                            // line 73
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\ttype=\"text\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tclass=\"date-field\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tvalue=\"";
                            // line 76
                            echo twig_escape_filter($this->env, $this->getAttribute($context["field"], "data", array()), "html", null, true);
                            echo "\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tdata-format=\"";
                            // line 77
                            echo twig_escape_filter($this->env, $this->getAttribute($context["field"], "format", array()), "html", null, true);
                            echo "\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" value=\"";
                            // line 79
                            echo twig_escape_filter($this->env, $this->getAttribute($context["field"], "timestamp", array()), "html", null, true);
                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute(                        // line 80
$context["field"], "type", array()) == "scroll")) {
                            // line 81
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<select class=\"ui fluid multiple search selection dropdown\" multiple>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 82
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["field"], "options", array()));
                            foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                                // line 83
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                $context["checked"] = false;
                                // line 84
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                if (($this->getAttribute($context["field"], "data", array()) &&  !twig_test_empty($this->getAttribute($context["field"], "data", array())))) {
                                    // line 85
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if (twig_in_filter($this->getAttribute($context["option"], "id", array()), $this->getAttribute($context["field"], "data", array()))) {
                                        // line 86
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        $context["checked"] = true;
                                        // line 87
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 88
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                } else {
                                    // line 89
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tno data
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 90
                                    if ($this->getAttribute($context["option"], "checked", array())) {
                                        // line 91
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        $context["checked"] = true;
                                        // line 92
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 93
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 94
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["option"], "id", array()), "html", null, true);
                                echo "\" ";
                                if (($context["checked"] ?? null)) {
                                    echo "selected";
                                }
                                echo ">";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["option"], "name", array()), "html", null, true);
                                echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 96
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute(                        // line 97
$context["field"], "type", array()) == "drop")) {
                            // line 98
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<select class=\"ui fluid search single dropdown\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 99
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["field"], "options", array()));
                            foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                                // line 100
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                $context["checked"] = false;
                                // line 101
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                if (($this->getAttribute($context["field"], "data", array()) &&  !twig_test_empty($this->getAttribute($context["field"], "data", array())))) {
                                    // line 102
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if (($this->getAttribute($context["option"], "id", array()) == $this->getAttribute($context["field"], "data", array()))) {
                                        // line 103
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        $context["checked"] = true;
                                        // line 104
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 105
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                } else {
                                    // line 106
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if ($this->getAttribute($context["option"], "checked", array())) {
                                        // line 107
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        $context["checked"] = true;
                                        // line 108
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 109
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 110
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["option"], "id", array()), "html", null, true);
                                echo "\" ";
                                if (($context["checked"] ?? null)) {
                                    echo "selected";
                                }
                                echo ">";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["option"], "name", array()), "html", null, true);
                                echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 112
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute(                        // line 113
$context["field"], "type", array()) == "radio")) {
                            // line 114
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"inline fields\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 115
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["field"], "options", array()));
                            foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                                // line 116
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"field\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"ui radio checkbox\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 118
                                $context["checked"] = false;
                                // line 119
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                if (($this->getAttribute($context["field"], "data", array()) &&  !twig_test_empty($this->getAttribute($context["field"], "data", array())))) {
                                    // line 120
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if (twig_in_filter($this->getAttribute($context["option"], "id", array()), $this->getAttribute($context["field"], "data", array()))) {
                                        // line 121
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        $context["checked"] = true;
                                        // line 122
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 123
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                } else {
                                    // line 124
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if ($this->getAttribute($context["option"], "checked", array())) {
                                        // line 125
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        $context["checked"] = true;
                                        // line 126
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 127
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 128
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["field"], "name", array()), "html", null, true);
                                echo "\" id=\"";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["field"], "name", array()), "html", null, true);
                                echo "-";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["option"], "id", array()), "html", null, true);
                                echo "\" value=\"";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["option"], "id", array()), "html", null, true);
                                echo "\" ";
                                if (($context["checked"] ?? null)) {
                                    echo "checked";
                                }
                                echo " class=\"hidden\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"";
                                // line 129
                                echo twig_escape_filter($this->env, $this->getAttribute($context["field"], "name", array()), "html", null, true);
                                echo "-";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["option"], "id", array()), "html", null, true);
                                echo "\">";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["option"], "name", array()), "html", null, true);
                                echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 133
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute(                        // line 134
$context["field"], "type", array()) == "checkbox")) {
                            // line 135
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"inline fields\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 136
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["field"], "options", array()));
                            foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                                // line 137
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"field\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"ui checkbox\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 139
                                $context["checked"] = false;
                                // line 140
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                if (($this->getAttribute($context["field"], "data", array()) &&  !twig_test_empty($this->getAttribute($context["field"], "data", array())))) {
                                    // line 141
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if (twig_in_filter($this->getAttribute($context["option"], "id", array()), $this->getAttribute($context["field"], "data", array()))) {
                                        // line 142
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        $context["checked"] = true;
                                        // line 143
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 144
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                } else {
                                    // line 145
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if ($this->getAttribute($context["option"], "checked", array())) {
                                        // line 146
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        $context["checked"] = true;
                                        // line 147
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 148
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 149
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" id=\"";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["field"], "name", array()), "html", null, true);
                                echo "-";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["option"], "id", array()), "html", null, true);
                                echo "\" value=\"";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["option"], "id", array()), "html", null, true);
                                echo "\" ";
                                if (($context["checked"] ?? null)) {
                                    echo "checked";
                                }
                                echo " class=\"hidden\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"";
                                // line 150
                                echo twig_escape_filter($this->env, $this->getAttribute($context["field"], "name", array()), "html", null, true);
                                echo "-";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["option"], "id", array()), "html", null, true);
                                echo "\">";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["option"], "name", array()), "html", null, true);
                                echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 154
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 156
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"ui vertical segment edit-action-buttons\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"ui primary mini button save-action\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"icon save\"></i> ";
                        // line 158
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Save")), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"ui mini button cancel-action\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"icon cancel\"></i> ";
                        // line 161
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Cancel")), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 166
                    echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                }
                // line 171
                echo "\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 172
            echo "\t\t\t\t\t</div>
\t\t\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['section'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 174
        echo "                ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["environment"] ?? null), "dispatcher", array()), "dispatch", array(0 => "profileAboutTabs"), "method"), "html", null, true);
        echo "
\t\t\t</div>
\t\t</div>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "@users/about.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  610 => 174,  595 => 172,  589 => 171,  582 => 166,  574 => 161,  568 => 158,  564 => 156,  560 => 154,  546 => 150,  533 => 149,  530 => 148,  527 => 147,  524 => 146,  521 => 145,  518 => 144,  515 => 143,  512 => 142,  509 => 141,  506 => 140,  504 => 139,  500 => 137,  496 => 136,  493 => 135,  491 => 134,  488 => 133,  474 => 129,  459 => 128,  456 => 127,  453 => 126,  450 => 125,  447 => 124,  444 => 123,  441 => 122,  438 => 121,  435 => 120,  432 => 119,  430 => 118,  426 => 116,  422 => 115,  419 => 114,  417 => 113,  414 => 112,  399 => 110,  396 => 109,  393 => 108,  390 => 107,  387 => 106,  384 => 105,  381 => 104,  378 => 103,  375 => 102,  372 => 101,  369 => 100,  365 => 99,  362 => 98,  360 => 97,  357 => 96,  342 => 94,  339 => 93,  336 => 92,  333 => 91,  331 => 90,  328 => 89,  325 => 88,  322 => 87,  319 => 86,  316 => 85,  313 => 84,  310 => 83,  306 => 82,  303 => 81,  301 => 80,  297 => 79,  292 => 77,  288 => 76,  283 => 73,  281 => 72,  276 => 71,  274 => 70,  269 => 69,  267 => 68,  262 => 67,  260 => 66,  255 => 65,  253 => 64,  250 => 63,  248 => 62,  244 => 60,  241 => 59,  235 => 57,  229 => 56,  226 => 55,  223 => 54,  220 => 53,  215 => 52,  212 => 51,  209 => 50,  206 => 49,  200 => 47,  194 => 45,  188 => 44,  185 => 43,  182 => 42,  179 => 41,  174 => 40,  171 => 39,  168 => 38,  166 => 37,  163 => 36,  157 => 34,  155 => 33,  148 => 29,  138 => 26,  135 => 25,  132 => 24,  126 => 22,  123 => 21,  120 => 20,  118 => 19,  115 => 18,  111 => 17,  102 => 16,  85 => 15,  77 => 11,  54 => 9,  37 => 8,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@users/profile.twig' %}

{% block content %}
\t<div class=\"ui basic vertical segment\" id=\"mp-about\">
\t\t<div class=\"ui grid\">
\t\t\t<div class=\"sixteen wide mobile six wide tablet five wide computer column\">
\t\t\t\t<div class=\"ui stackable secondary vertical fluid pointing menu about-tabs\">
\t\t\t\t\t{% for section in sections %}
\t\t\t\t\t\t<a class=\"item {% if loop.first %}active{% endif %}\" data-tab=\"{{ section }}\">{{ section }}</a>
\t\t\t\t\t{% endfor %}
                    {{ environment.dispatcher.dispatch('profileAboutMenu') }}
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"sixteen wide mobile ten wide tablet eleven wide computer column\">
\t\t\t\t{% for section in sections %}
\t\t\t\t\t<div class=\"ui tab {% if loop.first %}active{% endif %}\" data-tab=\"{{ section }}\">
\t\t\t\t\t\t{% for field in fields %}

\t\t\t\t\t\t\t{% if field.section == section and field.enabled == true and field.hideInProfile != true %}
                                {% set validations %}
                                    {% if field.validations %}
\t\t\t\t\t\t\t\t\t\tdata-validations=\"{{ field.validations|json_encode() }}\"
                                    {% endif %}
                                {% endset %}
\t\t\t\t\t\t\t\t<div class=\"ui vertical segment\">
\t\t\t\t\t\t\t\t\t<div class=\"ui form mp-field\" data-field-name=\"{{ field.name }}\" data-field-type=\"{{ field.type }}\"{{ validations }}>
\t\t\t\t\t\t\t\t\t\t<div class=\"ui relaxed grid\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"sixteen wide mobile six wide tablet five wide computer column\">
\t\t\t\t\t\t\t\t\t\t\t\t<label>{{ field.label }}</label>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"sixteen wide mobile ten wide tablet eleven wide computer column\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"mp-field-data\">
\t\t\t\t\t\t\t\t\t\t\t\t\t{% if isCurrentUser(requestedUser) and field.name != 'user_login' %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"ui button mini primary field-edit-action\"><i class=\"write icon\"></i>{{ translate('Edit') }}</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if field.data is not empty %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if field.options %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set data = [] %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% for option in field.options %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if option.id in field.data %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set data = data|merge([option.name]) %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{{ data|join(' • ') }}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{{ field.data }}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if field.options %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set data = [] %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% for option in field.options %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if option.checked %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set data = data|merge([option.name]) %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{{ data|join(' • ') }}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t{% if isCurrentUser(requestedUser) %}
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"mp-field-edit\" style=\"display: none\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if field.type == 'text' %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" value=\"{{ field.data }}\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% elseif field.type == 'email' %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"email\" value=\"{{ field.data }}\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% elseif field.type == 'password' %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"password\" value=\"{{ field.data }}\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% elseif field.type == 'numeric' %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"number\" value=\"{{ field.data }}\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% elseif field.type == 'date' %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\ttype=\"text\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tclass=\"date-field\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tvalue=\"{{ field.data }}\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tdata-format=\"{{ field.format }}\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" value=\"{{ field.timestamp }}\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% elseif field.type == 'scroll' %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<select class=\"ui fluid multiple search selection dropdown\" multiple>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% for option in field.options %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set checked = false %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if field.data and field.data is not empty %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if option.id in field.data %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set checked = true %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tno data
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if option.checked %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set checked = true %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"{{ option.id }}\" {% if checked %}selected{% endif %}>{{ option.name }}</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% elseif field.type == 'drop' %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<select class=\"ui fluid search single dropdown\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% for option in field.options %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set checked = false %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if field.data and field.data is not empty %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if option.id == field.data %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set checked = true %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if option.checked %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set checked = true %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"{{ option.id }}\" {% if checked %}selected{% endif %}>{{ option.name }}</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% elseif field.type == 'radio' %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"inline fields\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% for option in field.options %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"field\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"ui radio checkbox\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set checked = false %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if field.data and field.data is not empty %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if option.id in field.data %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set checked = true %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if option.checked %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set checked = true %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"{{ field.name }}\" id=\"{{ field.name }}-{{ option.id }}\" value=\"{{ option.id }}\" {% if checked  %}checked{% endif %} class=\"hidden\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"{{ field.name }}-{{ option.id }}\">{{ option.name }}</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% elseif field.type == 'checkbox' %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"inline fields\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% for option in field.options %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"field\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"ui checkbox\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set checked = false %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if field.data and field.data is not empty %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if option.id in field.data %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set checked = true %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if option.checked %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set checked = true %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" id=\"{{ field.name }}-{{ option.id }}\" value=\"{{ option.id }}\" {% if checked  %}checked{% endif %} class=\"hidden\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"{{ field.name }}-{{ option.id }}\">{{ option.name }}</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"ui vertical segment edit-action-buttons\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"ui primary mini button save-action\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"icon save\"></i> {{ translate('Save') }}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"ui mini button cancel-action\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"icon cancel\"></i> {{ translate('Cancel') }}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t</div>
\t\t\t\t{% endfor %}
                {{ environment.dispatcher.dispatch('profileAboutTabs') }}
\t\t\t</div>
\t\t</div>
\t</div>
{% endblock %}", "@users/about.twig", "C:\\xampp\\htdocs\\lista_regalos\\wp-content\\plugins\\membership-by-supsystic\\src\\Membership\\Users\\views\\about.twig");
    }
}
