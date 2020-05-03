<?php

/* @groups/group.twig */
class __TwigTemplate_94e6a624d941c3d03868faf95bf5632c470b0f5f01858160accea91d52bf6284 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div id=\"mp-group\" class=\"sc-membership\">
\t";
        // line 2
        if (( !$this->getAttribute(($context["requestedGroup"] ?? null), "isBlocked", array()) || call_user_func_array($this->env->getFunction('currentUserCan')->getCallable(), array("can-block-groups")))) {
            // line 3
            echo "\t\t<div class=\"mp-cover-container\">
\t\t\t<div class=\"ui inverted dimmer cover-loader\">
\t\t\t\t<div class=\"ui loader\"></div>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"mp-cover\">
\t\t\t\t<img width=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "groups", array()), "cover-size", array(), "array"), "width", array()), "html", null, true);
            echo "\"
\t\t\t\t     height=\"";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "groups", array()), "cover-size", array(), "array"), "height", array()), "html", null, true);
            echo "\"
\t\t\t\t     class=\"ui fluid image cover-image\"
\t\t\t\t     src=\"";
            // line 12
            echo twig_escape_filter($this->env, $this->env->getExtension('Membership_Groups_Twig')->groupsCover(($context["requestedGroup"] ?? null), "default"), "html", null, true);
            echo "\">
\t\t\t</div>
\t\t\t
\t\t\t";
            // line 15
            if ($this->env->getExtension('Membership_Groups_Twig')->canEditGroup(($context["requestedGroup"] ?? null))) {
                // line 16
                echo "\t\t\t\t<div class=\"mp-update-cover ";
                if ($this->env->getExtension('Membership_Groups_Twig')->isDefaultGroupCover(($context["requestedGroup"] ?? null))) {
                    echo "default";
                }
                echo "\">
\t\t\t\t\t<div class=\"ui top right pointing dropdown item\">
\t\t\t\t\t\t<i class=\"photo icon\"></i>
\t\t\t\t\t\t<div class=\"menu\">
\t\t\t\t\t\t\t<a class=\"item\" data-action=\"upload-photo\">";
                // line 20
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Upload photo")), "html", null, true);
                echo "</a>
\t\t\t\t\t\t\t<a class=\"item\" data-action=\"remove-photo\">";
                // line 21
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Remove")), "html", null, true);
                echo "</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"mp-crop-cover-action\">
\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"save-photo\">";
                // line 27
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Save")), "html", null, true);
                echo "</button>
\t\t\t\t\t<button class=\"ui mini secondary button\" data-action=\"cancel\">";
                // line 28
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Cancel")), "html", null, true);
                echo "</button>
\t\t\t\t</div>
\t\t\t";
            }
            // line 31
            echo "\t\t\t
\t\t\t<div class=\"mp-group-display-name\">";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute(($context["requestedGroup"] ?? null), "name", array()), "html", null, true);
            echo "</div>
\t\t\t
\t\t\t<div class=\"mp-logo-container\">
\t\t\t\t<div class=\"mp-logo ";
            // line 35
            if ($this->env->getExtension('Membership_Groups_Twig')->isDefaultGroupLogo(($context["requestedGroup"] ?? null))) {
                echo "default";
            }
            echo " update-logo-menu\">
\t\t\t\t\t<img width=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "groups", array()), "logo-size", array(), "array"), "width", array()), "html", null, true);
            echo "\"
\t\t\t\t\t     height=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "groups", array()), "logo-size", array(), "array"), "height", array()), "html", null, true);
            echo "\"
\t\t\t\t\t     src=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->env->getExtension('Membership_Groups_Twig')->groupsLogo(($context["requestedGroup"] ?? null), "default"), "html", null, true);
            echo "\"
\t\t\t\t\t     class=\"logo-image\">
\t\t\t\t\t";
            // line 40
            if ($this->env->getExtension('Membership_Groups_Twig')->canEditGroup(($context["requestedGroup"] ?? null))) {
                // line 41
                echo "\t\t\t\t\t\t<div class=\"mp-update-logo-overlay\">
\t\t\t\t\t\t\t<span>";
                // line 42
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Change logo image")), "html", null, true);
                echo "</span>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"ui inverted dimmer logo-loader\">
\t\t\t\t\t\t\t<div class=\"ui loader\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"ui top left pointing dropdown item\">
\t\t\t\t\t\t\t<div class=\"menu\">
\t\t\t\t\t\t\t\t<a class=\"item\" data-action=\"upload-logo\">";
                // line 49
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Upload logo")), "html", null, true);
                echo "</a>
\t\t\t\t\t\t\t\t<a class=\"item\" data-action=\"remove-logo\">";
                // line 50
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Remove")), "html", null, true);
                echo "</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
            }
            // line 54
            echo "\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t
\t\t";
            // line 58
            if ($this->getAttribute(($context["requestedGroup"] ?? null), "currentUserIsBanned", array())) {
                // line 59
                echo "\t\t\t<div class=\"ui negative message\">
\t\t\t\t<p>";
                // line 60
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("You are is blocked by group administrator")), "html", null, true);
                echo "</p>
\t\t\t</div>
\t\t";
            } else {
                // line 63
                echo "\t\t\t";
                if (($context["userLoggedIn"] ?? null)) {
                    // line 64
                    echo "\t\t\t\t<div class=\"ui secondary mini menu mp-group-action-menu\">
\t\t\t\t\t<div class=\"right menu\" style=\"display: none\">
\t\t\t\t\t\t";
                    // line 66
                    if ($this->env->getExtension('Membership_Groups_Twig')->canSendJoinRequest(($context["requestedGroup"] ?? null))) {
                        // line 67
                        echo "\t\t\t\t\t\t\t<div class=\"horizontally fitted item\">
\t\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"send-request\">";
                        // line 68
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Send a request")), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    // line 72
                    echo "\t\t\t\t\t\t";
                    if ($this->env->getExtension('Membership_Groups_Twig')->canCancelJoinRequest(($context["requestedGroup"] ?? null))) {
                        // line 73
                        echo "\t\t\t\t\t\t\t<div class=\"horizontally fitted item\">
\t\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"cancel-request\">";
                        // line 74
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Cancel request")), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    // line 78
                    echo "\t\t\t\t\t\t";
                    if ($this->env->getExtension('Membership_Groups_Twig')->canJoinGroup(($context["requestedGroup"] ?? null))) {
                        // line 79
                        echo "\t\t\t\t\t\t\t<div class=\"horizontally fitted item\">
\t\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"join-group\">";
                        // line 80
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Join group")), "html", null, true);
                        echo "</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    // line 83
                    echo "\t\t\t\t\t\t";
                    if ($this->env->getExtension('Membership_Groups_Twig')->canLeaveGroup(($context["requestedGroup"] ?? null))) {
                        // line 84
                        echo "\t\t\t\t\t\t\t<div class=\"horizontally fitted item\">
\t\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"leave-group\">";
                        // line 85
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Leave group")), "html", null, true);
                        echo "</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    // line 88
                    echo "\t\t\t\t\t\t";
                    if ($this->env->getExtension('Membership_Groups_Twig')->canFollowGroup(($context["requestedGroup"] ?? null))) {
                        // line 89
                        echo "\t\t\t\t\t\t\t<div class=\"horizontally fitted item\">
\t\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"follow\">";
                        // line 90
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Follow")), "html", null, true);
                        echo "</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    // line 93
                    echo "\t\t\t\t\t\t";
                    if ($this->env->getExtension('Membership_Groups_Twig')->canUnfollowGroup(($context["requestedGroup"] ?? null))) {
                        // line 94
                        echo "\t\t\t\t\t\t\t<div class=\"horizontally fitted item\">
\t\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"unfollow\">";
                        // line 95
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Unfollow")), "html", null, true);
                        echo "</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    // line 98
                    echo "\t\t\t\t\t\t";
                    if ($this->env->getExtension('Membership_Groups_Twig')->canInviteToGroup(($context["requestedGroup"] ?? null))) {
                        // line 99
                        echo "\t\t\t\t\t\t\t<div class=\"horizontally fitted item\">
\t\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"invite-users\">";
                        // line 100
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Invite friends")), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    // line 104
                    echo "\t\t\t\t\t\t
\t\t\t\t\t\t";
                    // line 105
                    if ($this->env->getExtension('Membership_Groups_Twig')->canEditGroup(($context["requestedGroup"] ?? null))) {
                        // line 106
                        echo "\t\t\t\t\t\t\t<div class=\"horizontally fitted item\">
\t\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"invite-administrators\">";
                        // line 107
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Invite
\t\t\t\t\t\t\t\t\tadministrators")), "html", null, true);
                        // line 108
                        echo "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    // line 112
                    echo "\t\t\t\t\t\t";
                    if (call_user_func_array($this->env->getFunction('currentUserCan')->getCallable(), array("can-block-groups"))) {
                        // line 113
                        echo "\t\t\t\t\t\t\t<div class=\"horizontally fitted item\">
\t\t\t\t\t\t\t\t";
                        // line 114
                        if ( !$this->getAttribute(($context["requestedGroup"] ?? null), "isBlocked", array())) {
                            // line 115
                            echo "\t\t\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"block\">";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Block group")), "html", null, true);
                            echo "</button>
\t\t\t\t\t\t\t\t";
                        } else {
                            // line 117
                            echo "\t\t\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"unblock\">";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Unblock group")), "html", null, true);
                            echo "</button>
\t\t\t\t\t\t\t\t";
                        }
                        // line 119
                        echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    // line 121
                    echo "\t\t\t\t\t\t<div class=\"ui dropdown item\">
\t\t\t\t\t\t\t<i class=\"ellipsis vertical icon\"></i>
\t\t\t\t\t\t\t<div class=\"menu\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
                } else {
                    // line 128
                    echo "\t\t\t\t<div class=\"ui secondary mini menu mp-group-action-menu\">
\t\t\t\t\t<div class=\"right menu\" style=\"display: none\">
\t\t\t\t\t\t
\t\t\t\t\t\t<div class=\"horizontally fitted item\">
\t\t\t\t\t\t\t";
                    // line 132
                    if (($this->getAttribute($this->getAttribute(($context["group"] ?? null), "settings", array()), "type", array()) == "open")) {
                        // line 133
                        echo "\t\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"login\">";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Join group")), "html", null, true);
                        echo "</button>
\t\t\t\t\t\t\t";
                    } else {
                        // line 135
                        echo "\t\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"login\">";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Send a request")), "html", null, true);
                        echo "</button>
\t\t\t\t\t\t\t";
                    }
                    // line 137
                    echo "\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"horizontally fitted item\">
\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"login\">";
                    // line 139
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Follow")), "html", null, true);
                    echo "</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
                }
                // line 144
                echo "\t\t\t
\t\t\t";
                // line 145
                if (($this->getAttribute(($context["requestedGroup"] ?? null), "isBlocked", array()) && call_user_func_array($this->env->getFunction('currentUserCan')->getCallable(), array("can-block-groups")))) {
                    // line 146
                    echo "\t\t\t\t<div class=\"ui negative message\">
\t\t\t\t\t<p>";
                    // line 147
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Group is blocked")), "html", null, true);
                    echo "</p>
\t\t\t\t</div>
\t\t\t";
                }
                // line 150
                echo "
            ";
                // line 151
                if (((($this->getAttribute($this->getAttribute(($context["requestedGroup"] ?? null), "settings", array()), "read-activity", array(), "array") == "members-only") && ($this->getAttribute(($context["requestedGroup"] ?? null), "currentUserIsFollowing", array()) == true)) || ($this->getAttribute($this->getAttribute(($context["requestedGroup"] ?? null), "settings", array()), "read-activity", array(), "array") == "all"))) {
                    // line 152
                    echo "                <div class=\"mp-group-nav-menu\">
                    <div class=\"ui secondary pointing menu profile-nav-menu\">

                        ";
                    // line 155
                    $context["menuItems"] = array("activity" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Activity")), "members" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Members")));
                    // line 159
                    echo "
                        ";
                    // line 160
                    if ($this->env->getExtension('Membership_Groups_Twig')->canEditGroup(($context["requestedGroup"] ?? null))) {
                        // line 161
                        echo "                            ";
                        $context["menuItems"] = twig_array_merge(($context["menuItems"] ?? null), array("settings" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Settings"))));
                        // line 162
                        echo "                        ";
                    }
                    // line 163
                    echo "
                        ";
                    // line 164
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["menuItems"] ?? null));
                    foreach ($context['_seq'] as $context["id"] => $context["title"]) {
                        // line 165
                        echo "                            ";
                        $context["url"] = call_user_func_array($this->env->getFunction('groupUrl')->getCallable(), array(($context["requestedGroup"] ?? null), array("action" => $context["id"])));
                        // line 166
                        echo "                            <a class=\"item ";
                        if ((($context["action"] ?? null) == $context["id"])) {
                            echo " active";
                        }
                        echo "\" href=\"";
                        echo twig_escape_filter($this->env, ($context["url"] ?? null), "html", null, true);
                        echo "\">
                                ";
                        // line 167
                        echo twig_escape_filter($this->env, $context["title"], "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t";
                        // line 168
                        if ((($this->getAttribute(($context["counts"] ?? null), "unapproved", array()) > 0) && ($context["id"] == "members"))) {
                            // line 169
                            echo "                                    <div class=\"ui mini label red\">";
                            echo twig_escape_filter($this->env, $this->getAttribute(($context["counts"] ?? null), "unapproved", array()), "html", null, true);
                            echo "</div>
                                ";
                        }
                        // line 171
                        echo "\t\t\t\t\t\t\t\t";
                        // line 172
                        echo "                                    ";
                        // line 173
                        echo "\t\t\t\t\t\t\t\t";
                        // line 174
                        echo "
                            </a>
                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['id'], $context['title'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 177
                    echo "
                    </div>
                </div>

                <div class=\"ui modal sc-membership\" id=\"logo-modal\">
                    <i class=\"close icon\"></i>
                    <div class=\"header\">";
                    // line 183
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Group logo picture")), "html", null, true);
                    echo "</div>
                    <div class=\"content\">
                        <div class=\"ui basic segment blurring logo-image-container\">
                            <div class=\"ui inverted dimmer\">
                                <div class=\"ui loader\"></div>
                            </div>
                            <div class=\"mp-logo-modal-image\">
                                <img class=\"logo-modal-image\">
                            </div>
                        </div>
                    </div>
                    <div class=\"actions\">
                        <button class=\"ui mini secondary button cancel\" data-action=\"cancel\">";
                    // line 195
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Cancel")), "html", null, true);
                    echo "</button>
                        <button class=\"ui mini primary button primary\" data-action=\"save-photo\">";
                    // line 196
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Save")), "html", null, true);
                    echo "</button>
                    </div>
                </div>

                <div class=\"ui modal long\" id=\"invite-administrators-modal\">
                    <i class=\"close icon\"></i>
                    <div class=\"header\">";
                    // line 202
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Invite administrators")), "html", null, true);
                    echo "</div>
                    <div class=\"content\">
                        <div class=\"ui basic vertical segment form users-search-input mbsSearchInputWrapp\">
                            <div class=\"ui fluid icon input\">
                                <input type=\"text\" placeholder=\"";
                    // line 206
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Find user...")), "html", null, true);
                    echo "\">
                                <i class=\"search icon\"></i>
                            </div>
                        </div>
                        <div class=\"ui two stackable cards users-list\">
                            ";
                    // line 211
                    $this->loadTemplate("@groups/partials/invite-modal-users.twig", "@groups/group.twig", 211)->display(array_merge($context, array("users" => ($context["usersToInvite"] ?? null))));
                    // line 212
                    echo "                        </div>
                        <div class=\"ui basic segment very padded list-loader\" style=\"display:none;\">
                            <div class=\"ui active loader\"></div>
                        </div>
                    </div>
                </div>

                <div class=\"ui modal long\" id=\"invite-users-modal\">
                    <i class=\"close icon\"></i>
                    <div class=\"header\">";
                    // line 221
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Invite users")), "html", null, true);
                    echo "</div>

                    <div class=\"content\">
                        <div class=\"ui basic vertical segment form users-search-input\">
                            <div class=\"ui fluid icon input\">
                                <input type=\"text\" placeholder=\"";
                    // line 226
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Find user...")), "html", null, true);
                    echo "\">
                                <i class=\"search icon\"></i>
                            </div>
                        </div>
                        <div class=\"ui two stackable cards users-list\">
                            ";
                    // line 231
                    $this->loadTemplate("@groups/partials/invite-modal-users.twig", "@groups/group.twig", 231)->display(array_merge($context, array("users" => ($context["usersToInvite"] ?? null))));
                    // line 232
                    echo "                        </div>
                        <div class=\"ui basic segment very padded list-loader\" style=\"display:none;\">
                            <div class=\"ui active loader\"></div>
                        </div>
                    </div>
                </div>
                ";
                    // line 238
                    $this->displayBlock('content', $context, $blocks);
                    // line 239
                    echo "            ";
                } else {
                    // line 240
                    echo "                <div class=\"ui negative message\">
                    <p>";
                    // line 241
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Access to this page is restricted.")), "html", null, true);
                    echo "</p>
                </div>
            ";
                }
                // line 244
                echo "

\t\t";
            }
            // line 247
            echo "\t
\t";
        } else {
            // line 249
            echo "\t\t<div class=\"ui negative message\">
\t\t\t<p>";
            // line 250
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Group is blocked by administrator")), "html", null, true);
            echo "</p>
\t\t</div>
\t";
        }
        // line 253
        echo "\t
\t";
        // line 254
        if ( !($context["userLoggedIn"] ?? null)) {
            // line 255
            echo "\t\t";
            $this->loadTemplate("@auth/partials/login-modal.twig", "@groups/group.twig", 255)->display($context);
            // line 256
            echo "\t";
        }
        // line 257
        echo "</div>";
    }

    // line 238
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "@groups/group.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  548 => 238,  544 => 257,  541 => 256,  538 => 255,  536 => 254,  533 => 253,  527 => 250,  524 => 249,  520 => 247,  515 => 244,  509 => 241,  506 => 240,  503 => 239,  501 => 238,  493 => 232,  491 => 231,  483 => 226,  475 => 221,  464 => 212,  462 => 211,  454 => 206,  447 => 202,  438 => 196,  434 => 195,  419 => 183,  411 => 177,  403 => 174,  401 => 173,  399 => 172,  397 => 171,  391 => 169,  389 => 168,  385 => 167,  376 => 166,  373 => 165,  369 => 164,  366 => 163,  363 => 162,  360 => 161,  358 => 160,  355 => 159,  353 => 155,  348 => 152,  346 => 151,  343 => 150,  337 => 147,  334 => 146,  332 => 145,  329 => 144,  321 => 139,  317 => 137,  311 => 135,  305 => 133,  303 => 132,  297 => 128,  288 => 121,  284 => 119,  278 => 117,  272 => 115,  270 => 114,  267 => 113,  264 => 112,  258 => 108,  255 => 107,  252 => 106,  250 => 105,  247 => 104,  240 => 100,  237 => 99,  234 => 98,  228 => 95,  225 => 94,  222 => 93,  216 => 90,  213 => 89,  210 => 88,  204 => 85,  201 => 84,  198 => 83,  192 => 80,  189 => 79,  186 => 78,  179 => 74,  176 => 73,  173 => 72,  166 => 68,  163 => 67,  161 => 66,  157 => 64,  154 => 63,  148 => 60,  145 => 59,  143 => 58,  137 => 54,  130 => 50,  126 => 49,  116 => 42,  113 => 41,  111 => 40,  106 => 38,  102 => 37,  98 => 36,  92 => 35,  86 => 32,  83 => 31,  77 => 28,  73 => 27,  64 => 21,  60 => 20,  50 => 16,  48 => 15,  42 => 12,  37 => 10,  33 => 9,  25 => 3,  23 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"mp-group\" class=\"sc-membership\">
\t{% if not requestedGroup.isBlocked or currentUserCan('can-block-groups') %}
\t\t<div class=\"mp-cover-container\">
\t\t\t<div class=\"ui inverted dimmer cover-loader\">
\t\t\t\t<div class=\"ui loader\"></div>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"mp-cover\">
\t\t\t\t<img width=\"{{ settings.groups['cover-size'].width }}\"
\t\t\t\t     height=\"{{ settings.groups['cover-size'].height }}\"
\t\t\t\t     class=\"ui fluid image cover-image\"
\t\t\t\t     src=\"{{ groupCover(requestedGroup, 'default') }}\">
\t\t\t</div>
\t\t\t
\t\t\t{% if canEditGroup(requestedGroup) %}
\t\t\t\t<div class=\"mp-update-cover {% if isDefaultGroupCover(requestedGroup) %}default{% endif %}\">
\t\t\t\t\t<div class=\"ui top right pointing dropdown item\">
\t\t\t\t\t\t<i class=\"photo icon\"></i>
\t\t\t\t\t\t<div class=\"menu\">
\t\t\t\t\t\t\t<a class=\"item\" data-action=\"upload-photo\">{{ translate('Upload photo') }}</a>
\t\t\t\t\t\t\t<a class=\"item\" data-action=\"remove-photo\">{{ translate('Remove') }}</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"mp-crop-cover-action\">
\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"save-photo\">{{ translate('Save') }}</button>
\t\t\t\t\t<button class=\"ui mini secondary button\" data-action=\"cancel\">{{ translate('Cancel') }}</button>
\t\t\t\t</div>
\t\t\t{% endif %}
\t\t\t
\t\t\t<div class=\"mp-group-display-name\">{{ requestedGroup.name }}</div>
\t\t\t
\t\t\t<div class=\"mp-logo-container\">
\t\t\t\t<div class=\"mp-logo {% if isDefaultGroupLogo(requestedGroup) %}default{% endif %} update-logo-menu\">
\t\t\t\t\t<img width=\"{{ settings.groups['logo-size'].width }}\"
\t\t\t\t\t     height=\"{{ settings.groups['logo-size'].height }}\"
\t\t\t\t\t     src=\"{{ groupLogo(requestedGroup, 'default') }}\"
\t\t\t\t\t     class=\"logo-image\">
\t\t\t\t\t{% if canEditGroup(requestedGroup) %}
\t\t\t\t\t\t<div class=\"mp-update-logo-overlay\">
\t\t\t\t\t\t\t<span>{{ translate('Change logo image') }}</span>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"ui inverted dimmer logo-loader\">
\t\t\t\t\t\t\t<div class=\"ui loader\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"ui top left pointing dropdown item\">
\t\t\t\t\t\t\t<div class=\"menu\">
\t\t\t\t\t\t\t\t<a class=\"item\" data-action=\"upload-logo\">{{ translate('Upload logo') }}</a>
\t\t\t\t\t\t\t\t<a class=\"item\" data-action=\"remove-logo\">{{ translate('Remove') }}</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t{% endif %}
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t
\t\t{% if requestedGroup.currentUserIsBanned %}
\t\t\t<div class=\"ui negative message\">
\t\t\t\t<p>{{ translate('You are is blocked by group administrator') }}</p>
\t\t\t</div>
\t\t{% else %}
\t\t\t{% if userLoggedIn %}
\t\t\t\t<div class=\"ui secondary mini menu mp-group-action-menu\">
\t\t\t\t\t<div class=\"right menu\" style=\"display: none\">
\t\t\t\t\t\t{% if canSendJoinRequest(requestedGroup) %}
\t\t\t\t\t\t\t<div class=\"horizontally fitted item\">
\t\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"send-request\">{{ translate('Send a request') }}
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t{% if canCancelJoinRequest(requestedGroup) %}
\t\t\t\t\t\t\t<div class=\"horizontally fitted item\">
\t\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"cancel-request\">{{ translate('Cancel request') }}
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t{% if canJoinGroup(requestedGroup) %}
\t\t\t\t\t\t\t<div class=\"horizontally fitted item\">
\t\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"join-group\">{{ translate('Join group') }}</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t{% if canLeaveGroup(requestedGroup) %}
\t\t\t\t\t\t\t<div class=\"horizontally fitted item\">
\t\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"leave-group\">{{ translate('Leave group') }}</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t{% if canFollowGroup(requestedGroup) %}
\t\t\t\t\t\t\t<div class=\"horizontally fitted item\">
\t\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"follow\">{{ translate('Follow') }}</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t{% if canUnfollowGroup(requestedGroup) %}
\t\t\t\t\t\t\t<div class=\"horizontally fitted item\">
\t\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"unfollow\">{{ translate('Unfollow') }}</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t{% if canInviteToGroup(requestedGroup) %}
\t\t\t\t\t\t\t<div class=\"horizontally fitted item\">
\t\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"invite-users\">{{ translate('Invite friends') }}
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t
\t\t\t\t\t\t{% if canEditGroup(requestedGroup) %}
\t\t\t\t\t\t\t<div class=\"horizontally fitted item\">
\t\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"invite-administrators\">{{ translate('Invite
\t\t\t\t\t\t\t\t\tadministrators') }}
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t{% if currentUserCan('can-block-groups') %}
\t\t\t\t\t\t\t<div class=\"horizontally fitted item\">
\t\t\t\t\t\t\t\t{% if not requestedGroup.isBlocked %}
\t\t\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"block\">{{ translate('Block group') }}</button>
\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"unblock\">{{ translate('Unblock group') }}</button>
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t<div class=\"ui dropdown item\">
\t\t\t\t\t\t\t<i class=\"ellipsis vertical icon\"></i>
\t\t\t\t\t\t\t<div class=\"menu\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t{% else %}
\t\t\t\t<div class=\"ui secondary mini menu mp-group-action-menu\">
\t\t\t\t\t<div class=\"right menu\" style=\"display: none\">
\t\t\t\t\t\t
\t\t\t\t\t\t<div class=\"horizontally fitted item\">
\t\t\t\t\t\t\t{% if group.settings.type == 'open' %}
\t\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"login\">{{ translate('Join group') }}</button>
\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"login\">{{ translate('Send a request') }}</button>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"horizontally fitted item\">
\t\t\t\t\t\t\t<button class=\"ui mini primary button\" data-action=\"login\">{{ translate('Follow') }}</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t{% endif %}
\t\t\t
\t\t\t{% if requestedGroup.isBlocked and currentUserCan('can-block-groups') %}
\t\t\t\t<div class=\"ui negative message\">
\t\t\t\t\t<p>{{ translate('Group is blocked') }}</p>
\t\t\t\t</div>
\t\t\t{% endif %}

            {% if (requestedGroup.settings['read-activity'] == 'members-only' and requestedGroup.currentUserIsFollowing == true) or (requestedGroup.settings['read-activity'] == 'all') %}
                <div class=\"mp-group-nav-menu\">
                    <div class=\"ui secondary pointing menu profile-nav-menu\">

                        {% set menuItems = {
                        'activity': translate('Activity'),
                        'members': translate('Members')
                        } %}

                        {% if canEditGroup(requestedGroup) %}
                            {% set menuItems = menuItems|merge({'settings': translate('Settings') }) %}
                        {% endif %}

                        {% for id, title in menuItems %}
                            {% set url = groupUrl(requestedGroup, {'action': id}) %}
                            <a class=\"item {% if action == id %} active{% endif %}\" href=\"{{ url }}\">
                                {{ title }}
\t\t\t\t\t\t\t\t{% if counts.unapproved > 0 and id == 'members'%}
                                    <div class=\"ui mini label red\">{{ counts.unapproved }}</div>
                                {% endif %}
\t\t\t\t\t\t\t\t{#{% if id in unreadNotifications|keys %}#}
                                    {#<div class=\"ui mini label red\">{{ unreadNotifications[id] }}</div>#}
\t\t\t\t\t\t\t\t{#{% endif %}#}

                            </a>
                        {% endfor %}

                    </div>
                </div>

                <div class=\"ui modal sc-membership\" id=\"logo-modal\">
                    <i class=\"close icon\"></i>
                    <div class=\"header\">{{ translate('Group logo picture') }}</div>
                    <div class=\"content\">
                        <div class=\"ui basic segment blurring logo-image-container\">
                            <div class=\"ui inverted dimmer\">
                                <div class=\"ui loader\"></div>
                            </div>
                            <div class=\"mp-logo-modal-image\">
                                <img class=\"logo-modal-image\">
                            </div>
                        </div>
                    </div>
                    <div class=\"actions\">
                        <button class=\"ui mini secondary button cancel\" data-action=\"cancel\">{{ translate('Cancel') }}</button>
                        <button class=\"ui mini primary button primary\" data-action=\"save-photo\">{{ translate('Save') }}</button>
                    </div>
                </div>

                <div class=\"ui modal long\" id=\"invite-administrators-modal\">
                    <i class=\"close icon\"></i>
                    <div class=\"header\">{{ translate('Invite administrators') }}</div>
                    <div class=\"content\">
                        <div class=\"ui basic vertical segment form users-search-input mbsSearchInputWrapp\">
                            <div class=\"ui fluid icon input\">
                                <input type=\"text\" placeholder=\"{{ translate('Find user...') }}\">
                                <i class=\"search icon\"></i>
                            </div>
                        </div>
                        <div class=\"ui two stackable cards users-list\">
                            {% include '@groups/partials/invite-modal-users.twig' with {'users': usersToInvite} %}
                        </div>
                        <div class=\"ui basic segment very padded list-loader\" style=\"display:none;\">
                            <div class=\"ui active loader\"></div>
                        </div>
                    </div>
                </div>

                <div class=\"ui modal long\" id=\"invite-users-modal\">
                    <i class=\"close icon\"></i>
                    <div class=\"header\">{{ translate('Invite users') }}</div>

                    <div class=\"content\">
                        <div class=\"ui basic vertical segment form users-search-input\">
                            <div class=\"ui fluid icon input\">
                                <input type=\"text\" placeholder=\"{{ translate('Find user...') }}\">
                                <i class=\"search icon\"></i>
                            </div>
                        </div>
                        <div class=\"ui two stackable cards users-list\">
                            {% include '@groups/partials/invite-modal-users.twig' with {'users': usersToInvite} %}
                        </div>
                        <div class=\"ui basic segment very padded list-loader\" style=\"display:none;\">
                            <div class=\"ui active loader\"></div>
                        </div>
                    </div>
                </div>
                {% block content %}{% endblock %}
            {% else %}
                <div class=\"ui negative message\">
                    <p>{{ translate('Access to this page is restricted.') }}</p>
                </div>
            {% endif %}


\t\t{% endif %}
\t
\t{% else %}
\t\t<div class=\"ui negative message\">
\t\t\t<p>{{ translate('Group is blocked by administrator') }}</p>
\t\t</div>
\t{% endif %}
\t
\t{% if not userLoggedIn %}
\t\t{% include '@auth/partials/login-modal.twig' %}
\t{% endif %}
</div>", "@groups/group.twig", "C:\\xampp\\htdocs\\lista_regalos\\wp-content\\plugins\\membership-by-supsystic\\src\\Membership\\Groups\\views\\group.twig");
    }
}
