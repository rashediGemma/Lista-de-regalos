<?php

/* @design/styles.twig */
class __TwigTemplate_1c94b9ce4a0d793f5e8d48f1efa59ff3435545981a3216748f53cd609d70a1b8 extends Twig_Template
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
        echo "<style id=\"membership-custom-styles\">

\t";
        // line 3
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "default-theme-colors", array(), "array") == "false")) {
            // line 4
            echo "
\t\t.sc-membership {
\t\t\tbackground: ";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "sc-background-color", array(), "array"), "html", null, true);
            echo "!important;
\t\t}
\t\t.sc-membership .ui.primary.button,
\t\t.ui.modals .ui.primary.button {
\t\t\tbackground: ";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "primary-button-color", array(), "array"), "html", null, true);
            echo "!important;
\t\t\t";
            // line 12
            echo "\t\t\t";
            if ($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array(), "any", false, true), "general", array(), "any", false, true), "primary-button-text-color", array(), "array", true, true)) {
                // line 13
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "primary-button-text-color", array(), "array"), "html", null, true);
                echo "!important;
\t\t\t";
            }
            // line 15
            echo "\t\t}


\t\t.sc-membership .ui.primary.button:active,
\t\t.sc-membership .ui.primary.buttons .button:active,
\t\t.ui.modals .ui.primary.button:active,
\t\t.ui.modals .ui.primary.buttons .button:active,
\t\t.sc-membership .ui.primary.button:hover,
\t\t.sc-membership .ui.primary.buttons .button:hover,
\t\t.ui.modals .ui.primary.button:hover,
\t\t.ui.modals .ui.primary.buttons .button:hover {
\t\t\t";
            // line 26
            if ($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "primary-button-hover-color", array(), "array")) {
                // line 27
                echo "\t\t\t\tbackground: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "primary-button-hover-color", array(), "array"), "html", null, true);
                echo "!important;
\t\t\t";
            }
            // line 29
            echo "\t\t}


\t\t.sc-membership .ui.secondary.button,
\t\t.ui.modals .mbs-add-attachment,
\t\t.ui.modals .ui.secondary.button {
\t\t\tbackground: ";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "secondary-button-color", array(), "array"), "html", null, true);
            echo "!important;
\t\t\t";
            // line 37
            echo "\t\t\t";
            if ($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array(), "any", false, true), "general", array(), "any", false, true), "secondary-button-text-color", array(), "array", true, true)) {
                // line 38
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "secondary-button-text-color", array(), "array"), "html", null, true);
                echo "!important;
\t\t\t";
            }
            // line 40
            echo "\t\t}

\t\t";
            // line 42
            if ($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array(), "any", false, true), "general", array(), "any", false, true), "secondary-button-text-color", array(), "array", true, true)) {
                // line 43
                echo "\t\t\t.ui.modals .mbs-add-attachment .icon.attach {
\t\t\t\tcolor: ";
                // line 44
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "secondary-button-text-color", array(), "array"), "html", null, true);
                echo "!important;
\t\t\t}
\t\t";
            }
            // line 47
            echo "
\t\t.sc-membership .ui.secondary.button:hover,
\t\t.sc-membership .ui.secondary.buttons .button:hover,
\t\t.ui.modals .ui.secondary.button:hover,
\t\t.ui.modals .ui.secondary.buttons .button:hover {
\t\t\tbackground: ";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "secondary-button-hover-color", array(), "array"), "html", null, true);
            echo "!important;
\t\t}
\t\t";
            // line 55
            echo "\t\t.post-activity-buttons .button[data-action=\"add-smile-to-text\"] {
\t\t\tbackground-color: ";
            // line 56
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array(), "any", false, true), "general", array(), "any", false, true), "smile-button-bg-color", array(), "array", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array(), "any", false, true), "general", array(), "any", false, true), "smile-button-bg-color", array(), "array"), "#fff")) : ("#fff")), "html", null, true);
            echo " !important;
\t\t}
\t\t.post-activity-buttons .button[data-action=\"add-smile-to-text\"]:hover {
\t\t\tbackground-color: ";
            // line 59
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array(), "any", false, true), "general", array(), "any", false, true), "smile-button-hover-bg-color", array(), "array", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array(), "any", false, true), "general", array(), "any", false, true), "smile-button-hover-bg-color", array(), "array"), "#ddd")) : ("#ddd")), "html", null, true);
            echo " !important;
\t\t}
\t\t";
            // line 62
            echo "\t\t";
            $context["smileBtnIconSize"] = (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array(), "any", false, true), "general", array(), "any", false, true), "smiles-button-icon-size-text-font-size-number", array(), "array", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array(), "any", false, true), "general", array(), "any", false, true), "smiles-button-icon-size-text-font-size-number", array(), "array"), 20)) : (20));
            // line 63
            echo "\t\t";
            $context["smileBtnIconSizeUnits"] = (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array(), "any", false, true), "general", array(), "any", false, true), "smiles-button-icon-size-text-font-unit-select", array(), "array", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array(), "any", false, true), "general", array(), "any", false, true), "smiles-button-icon-size-text-font-unit-select", array(), "array"), "px")) : ("px"));
            // line 64
            echo "\t\t";
            $context["smileBtnIconWidthAndHeightSize"] = (((($context["smileBtnIconSizeUnits"] ?? null) == "em")) ? ((($context["smileBtnIconSize"] ?? null) + 1)) : ((($context["smileBtnIconSize"] ?? null) + 16)));
            // line 65
            echo "\t\t";
            // line 71
            echo "\t\t";
            $context["smileWrapperIconSizeWidth"] = (((($context["smileBtnIconSizeUnits"] ?? null) == "em")) ? ((($context["smileBtnIconSize"] ?? null) * 6)) : (((((6 * ($context["smileBtnIconSize"] ?? null)) + (6 * 5)) + (6 * 8)) + (6 * 8))));
            // line 72
            echo "\t\t.post-activity-buttons .button[data-action=\"add-smile-to-text\"] {
\t\t\tfont-size: ";
            // line 73
            echo twig_escape_filter($this->env, ($context["smileBtnIconSize"] ?? null), "html", null, true);
            echo twig_escape_filter($this->env, ($context["smileBtnIconSizeUnits"] ?? null), "html", null, true);
            echo "!important;
\t\t}
\t\t.mbs-smiles-wrapper {
\t\t\twidth: ";
            // line 76
            echo twig_escape_filter($this->env, ($context["smileWrapperIconSizeWidth"] ?? null), "html", null, true);
            echo "px;
\t\t}
\t\t.mbs-sw-one-smile {
\t\t\twidth: ";
            // line 79
            echo twig_escape_filter($this->env, ($context["smileBtnIconWidthAndHeightSize"] ?? null), "html", null, true);
            echo twig_escape_filter($this->env, ($context["smileBtnIconSizeUnits"] ?? null), "html", null, true);
            echo "!important;
\t\t\theight: ";
            // line 80
            echo twig_escape_filter($this->env, ($context["smileBtnIconWidthAndHeightSize"] ?? null), "html", null, true);
            echo twig_escape_filter($this->env, ($context["smileBtnIconSizeUnits"] ?? null), "html", null, true);
            echo "!important;
\t\t\tfont-size: ";
            // line 81
            echo twig_escape_filter($this->env, ($context["smileBtnIconSize"] ?? null), "html", null, true);
            echo twig_escape_filter($this->env, ($context["smileBtnIconSizeUnits"] ?? null), "html", null, true);
            echo "!important;
\t\t\tline-height: ";
            // line 82
            echo twig_escape_filter($this->env, ($context["smileBtnIconSize"] ?? null), "html", null, true);
            echo twig_escape_filter($this->env, ($context["smileBtnIconSizeUnits"] ?? null), "html", null, true);
            echo "!important;
\t\t}

\t\t.ui.form input, .ui.form textarea {
\t\t\tborder-color: ";
            // line 86
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "input-border-color", array(), "array"), "html", null, true);
            echo "!important;
\t\t\tbackground-color: ";
            // line 87
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "input-background-color", array(), "array"), "html", null, true);
            echo "!important;
\t\t\t";
            // line 89
            echo "\t\t\t";
            if ($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array(), "any", false, true), "general", array(), "any", false, true), "input-text-color", array(), "array", true, true)) {
                // line 90
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "input-text-color", array(), "array"), "html", null, true);
                echo "!important;
\t\t\t";
            }
            // line 92
            echo "\t\t}

\t\t.ui.form input:focus, .ui.form textarea:focus {
\t\t\tborder-color: ";
            // line 95
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "input-border-focus-color", array(), "array"), "html", null, true);
            echo "!important;
\t\t\tbackground-color: ";
            // line 96
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "input-background-focus-color", array(), "array"), "html", null, true);
            echo "!important;
\t\t}

\t\t.ui.form input::-webkit-input-placeholder { color: ";
            // line 99
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "input-placeholder-color", array(), "array"), "html", null, true);
            echo "!important; }
\t\t.ui.form textarea::-webkit-input-placeholder { color: ";
            // line 100
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "input-placeholder-color", array(), "array"), "html", null, true);
            echo "!important; }
\t\t.ui.form input:-moz-placeholder { color: ";
            // line 101
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "input-placeholder-color", array(), "array"), "html", null, true);
            echo "!important;}
\t\t.ui.form textarea:-moz-placeholder { color: ";
            // line 102
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "input-placeholder-color", array(), "array"), "html", null, true);
            echo "!important;}
\t\t.ui.form input::-moz-placeholder {color: ";
            // line 103
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "input-placeholder-color", array(), "array"), "html", null, true);
            echo "!important;}
\t\t.ui.form textarea::-moz-placeholder {color: ";
            // line 104
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "input-placeholder-color", array(), "array"), "html", null, true);
            echo "!important;}
\t\t.ui.form input:-ms-input-placeholder {color: ";
            // line 105
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "input-placeholder-color", array(), "array"), "html", null, true);
            echo "!important;}
\t\t.ui.form textarea:-ms-input-placeholder {color: ";
            // line 106
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "input-placeholder-color", array(), "array"), "html", null, true);
            echo "!important;}

\t\t";
            // line 109
            echo "\t\t";
            if ($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array(), "any", false, true), "general", array(), "any", false, true), "label-text-color", array(), "array", true, true)) {
                // line 110
                echo "\t\t\t.ui.form label {
\t\t\t\tcolor: ";
                // line 111
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "label-text-color", array(), "array"), "html", null, true);
                echo "!important;
\t\t\t}
\t\t";
            }
            // line 114
            echo "\t";
        }
        // line 115
        echo "
\t#mp-profile .ui.container {
\t\twidth: ";
        // line 117
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "profile", array()), "container-max-width", array(), "array"), "html", null, true);
        echo "!important;
\t}

\t.mp-profile-header {
\t\tbackground-color: ";
        // line 121
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "profile", array()), "header-background-color", array(), "array"), "html", null, true);
        echo "!important;
\t\t";
        // line 122
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "profile", array()), "avatar-style", array(), "array") != null)) {
            // line 123
            echo "\t\t\tbackground-color: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "profile", array()), "avatar-style", array(), "array"), "html", null, true);
            echo "!important;
\t\t";
        }
        // line 125
        echo "\t}

\t";
        // line 127
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "avatar-style", array(), "array") == "round")) {
            // line 128
            echo "\t\t.sc-membership .mp-avatar,
\t\t.sc-membership .mp-avatar img,
\t\t.sc-membership .mp-avatar .mp-update-avatar-overlay,
\t\t.sc-membership .mp-user-card .mp-user-avatar,
\t\t.sc-membership .mp-user-card .mp-user-avatar img,
\t\t.sc-membership .mp-group-card .mp-group-logo,
\t\t.sc-membership .mp-group-card .mp-group-logo img,
\t\t#conversations .conversation-image,
\t\t#conversations .mp-message-avatar,
\t\t#conversations .mp-message-avatar img,
\t\t.sc-membership .mp-activity-container .mp-activity-header-image,
\t\t.sc-membership .mp-activity-container .mp-activity-header-image img,
\t\t.sc-membership .mp-activity-post-form .mp-activity-post-avatar,
\t\t.sc-membership .mp-activity-post-form .mp-activity-post-avatar img,
\t\t.sc-membership .mp-logo,
\t\t.sc-membership .mp-logo img,
\t\t.sc-membership .mp-logo .mp-update-logo-overlay,
\t\t.sc-membership .mp-activity-container .activity-author-group,
\t\t.sc-membership .mp-activity-container .activity-author-user,
\t\t.sc-membership .mp-activity-container .comment-container .avatar,
\t\t.sc-membership .mp-activity-container .comment-container .avatar img,
\t\t.sc-membership .mp-activity-container .mp-comment-form-author,
\t\t.sc-membership .mp-activity-container .mp-comment-form-author img,
\t\t.sc-membership .mp-activity-container .menu img.avatar
\t\t{
\t\t\tborder-radius: 5px;
\t\t}
\t";
        }
        // line 156
        echo "
\t";
        // line 157
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "avatar-style", array(), "array") == "circle")) {
            // line 158
            echo "\t\t.sc-membership .mp-avatar,
\t\t.sc-membership .mp-avatar img,
\t\t.sc-membership .mp-avatar .mp-update-avatar-overlay,
\t\t.sc-membership .mp-user-card .mp-user-avatar,
\t\t.sc-membership .mp-user-card .mp-user-avatar img,
\t\t.sc-membership .mp-group-card .mp-group-logo,
\t\t.sc-membership .mp-group-card .mp-group-logo img,
\t\t#conversations .conversation-image,
\t\t#conversations .mp-message-avatar,
\t\t#conversations .mp-message-avatar img,
\t\t.sc-membership .mp-activity-container .mp-activity-header-image,
\t\t.sc-membership .mp-activity-container .mp-activity-header-image img,
\t\t.sc-membership .mp-activity-post-form .mp-activity-post-avatar,
\t\t.sc-membership .mp-activity-post-form .mp-activity-post-avatar img,
\t\t.sc-membership .mp-logo,
\t\t.sc-membership .mp-logo img,
\t\t.sc-membership .mp-logo .mp-update-logo-overlay,
\t\t.sc-membership .mp-activity-container .activity-author-group,
\t\t.sc-membership .mp-activity-container .activity-author-user,
\t\t.sc-membership .mp-activity-container .comment-container .avatar,
\t\t.sc-membership .mp-activity-container .comment-container .avatar img,
\t\t.sc-membership .mp-activity-container .mp-comment-form-author,
\t\t.sc-membership .mp-activity-container .mp-comment-form-author img,
\t\t.sc-membership .mp-activity-container .menu img.avatar
\t\t{
\t\t\tborder-radius: 50%;
\t\t}

\t";
        }
        // line 187
        echo "
\t";
        // line 188
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "general", array()), "avatar-style", array(), "array") == "square")) {
            // line 189
            echo "\t\t.sc-membership .mp-avatar,
\t\t.sc-membership .mp-avatar img,
\t\t.sc-membership .mp-avatar .mp-update-avatar-overlay,
\t\t.sc-membership .mp-user-card .mp-user-avatar,
\t\t.sc-membership .mp-user-card .mp-user-avatar img,
\t\t.sc-membership .mp-group-card .mp-group-logo,
\t\t.sc-membership .mp-group-card .mp-group-logo img,
\t\t#conversations .conversation-image,
\t\t#conversations .mp-message-avatar,
\t\t#conversations .mp-message-avatar img,
\t\t.sc-membership .mp-activity-container .mp-activity-header-image,
\t\t.sc-membership .mp-activity-container .mp-activity-header-image img,
\t\t.sc-membership .mp-activity-post-form .mp-activity-post-avatar,
\t\t.sc-membership .mp-activity-post-form .mp-activity-post-avatar img,
\t\t.sc-membership .mp-logo,
\t\t.sc-membership .mp-logo img,
\t\t.sc-membership .mp-logo .mp-update-logo-overlay,
\t\t.sc-membership .mp-activity-container .activity-author-group,
\t\t.sc-membership .mp-activity-container .activity-author-user,
\t\t.sc-membership .mp-activity-container .comment-container .avatar,
\t\t.sc-membership .mp-activity-container .comment-container .avatar img,
\t\t.sc-membership .mp-activity-container .mp-comment-form-author,
\t\t.sc-membership .mp-activity-container .mp-comment-form-author img,
\t\t.sc-membership .mp-activity-container .menu img.avatar
\t\t{
\t\t\tborder-radius: 0;
\t\t}
\t";
        }
        // line 217
        echo "
\t";
        // line 218
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "profile", array()), "show-display-name", array(), "array") == "false")) {
            // line 219
            echo "\t\t.sc-membership .mp-cover-container .mp-user-display-name {
\t\t\tdisplay: none;
\t\t}
\t";
        }
        // line 223
        echo "
\t";
        // line 224
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "auth", array()), "login-secondary-button", array(), "array") == "false")) {
            // line 225
            echo "\t\t.sc-membership .ui.button.mp-login-secondary-button {
\t\t\tdisplay: none;
\t\t}
\t";
        }
        // line 229
        echo "
    ";
        // line 230
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "members", array()), "show-friends-and-followers", array(), "array") != "true")) {
            // line 231
            echo "        .mp-social-stats {
            display: none!important;
        }
    ";
        }
        // line 235
        echo "\t";
        // line 236
        echo "\t";
        // line 237
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "primary-buttons-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "primary-buttons-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "primary-buttons-text-color-check", array(), "array") == 1))) {
            // line 238
            echo "\t\t.ui.modals .ui.button.primary,
\t\t.sc-membership .ui.button.primary {
\t\t\t";
            // line 240
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "primary-buttons-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 241
($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "primary-buttons-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 242
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "primary-buttons-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "primary-buttons-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 244
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "primary-buttons-text-font-family-check", array(), "array") == 1)) {
                // line 245
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "primary-buttons-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 247
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "primary-buttons-text-color-check", array(), "array") == 1)) {
                // line 248
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "primary-buttons-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 250
            echo "\t\t}
\t";
        }
        // line 252
        echo "\t";
        // line 253
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "secondary-buttons-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "secondary-buttons-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "secondary-buttons-text-color-check", array(), "array") == 1))) {
            // line 254
            echo "\t\t.ui.modals .ui.secondary.button,
\t\t.sc-membership .ui.button.secondary:not(.icon) {
\t\t\t";
            // line 256
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "secondary-buttons-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 257
($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "secondary-buttons-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 258
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "secondary-buttons-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "secondary-buttons-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 260
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "secondary-buttons-text-font-family-check", array(), "array") == 1)) {
                // line 261
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "secondary-buttons-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 263
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "secondary-buttons-text-color-check", array(), "array") == 1)) {
                // line 264
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "secondary-buttons-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 266
            echo "\t\t}
\t";
        }
        // line 268
        echo "\t";
        // line 269
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "page-header-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "page-header-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "page-header-text-color-check", array(), "array") == 1))) {
            // line 270
            echo "\t\t.entry-header .entry-title {
\t\t\t";
            // line 271
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "page-header-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 272
($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "page-header-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 273
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "page-header-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "page-header-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 275
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "page-header-text-font-family-check", array(), "array") == 1)) {
                // line 276
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "page-header-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 278
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "page-header-text-color-check", array(), "array") == 1)) {
                // line 279
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "page-header-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 281
            echo "\t\t}
\t";
        }
        // line 283
        echo "\t";
        // line 284
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "text-input-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "text-input-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "text-input-text-color-check", array(), "array") == 1))) {
            // line 285
            echo "\t\t.sc-membership input[type=\"text\"],
\t\t/*.sc-membership input[type=\"password\"],*/
\t\t/*.sc-membership input[type=\"email\"],*/
\t\t.sc-membership .ui.form input[type=\"text\"],
\t\t.sc-membership .ui.form input[type=\"text\"]:focus,
\t\t.sc-membership .ui.form input[type=\"password\"],
\t\t.sc-membership .ui.form input[type=\"email\"] {
\t\t\t";
            // line 292
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "text-input-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 293
($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "text-input-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 294
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "text-input-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "text-input-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 296
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "text-input-text-font-family-check", array(), "array") == 1)) {
                // line 297
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "text-input-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 299
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "text-input-text-color-check", array(), "array") == 1)) {
                // line 300
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "text-input-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 302
            echo "\t\t}
\t";
        }
        // line 304
        echo "\t";
        // line 305
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "about-text-after-label-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "about-text-after-label-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "about-text-after-label-text-color-check", array(), "array") == 1))) {
            // line 306
            echo "\t\t.sc-membership .ui.form .mp-field-data p  {
\t\t\t";
            // line 307
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "about-text-after-label-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 308
($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "about-text-after-label-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 309
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "about-text-after-label-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "about-text-after-label-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 311
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "about-text-after-label-text-font-family-check", array(), "array") == 1)) {
                // line 312
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "about-text-after-label-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 314
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "about-text-after-label-text-color-check", array(), "array") == 1)) {
                // line 315
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "about-text-after-label-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 317
            echo "\t\t}
\t";
        }
        // line 319
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "labels-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "labels-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "labels-text-color-check", array(), "array") == 1))) {
            // line 320
            echo "\t\t.sc-membership .ui.form label {
\t\t\t";
            // line 321
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "labels-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 322
($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "labels-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 323
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "labels-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "labels-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 325
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "labels-text-font-family-check", array(), "array") == 1)) {
                // line 326
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "labels-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 328
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "labels-text-color-check", array(), "array") == 1)) {
                // line 329
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "labels-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 331
            echo "\t\t}
\t";
        }
        // line 333
        echo "\t";
        // line 334
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "small-labels-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "small-labels-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "small-labels-text-color-check", array(), "array") == 1))) {
            // line 335
            echo "\t\t.sc-membership .ui.form label small {
\t\t\t";
            // line 336
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "small-labels-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 337
($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "small-labels-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 338
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "small-labels-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "small-labels-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 340
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "small-labels-text-font-family-check", array(), "array") == 1)) {
                // line 341
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "small-labels-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 343
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "small-labels-text-color-check", array(), "array") == 1)) {
                // line 344
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "small-labels-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 346
            echo "\t\t}
\t";
        }
        // line 348
        echo "\t";
        // line 349
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "links-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "links-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "links-text-color-check", array(), "array") == 1))) {
            // line 350
            echo "\t\t.sc-membership .ui.form a {
\t\t\t";
            // line 351
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "links-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 352
($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "links-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 353
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "links-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "links-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 355
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "links-text-font-family-check", array(), "array") == 1)) {
                // line 356
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "links-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 358
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "links-text-color-check", array(), "array") == 1)) {
                // line 359
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "general", array()), "links-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 361
            echo "\t\t}
\t";
        }
        // line 363
        echo "\t";
        // line 364
        echo "\t";
        // line 365
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "user-name-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "user-name-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "user-name-text-color-check", array(), "array") == 1))) {
            // line 366
            echo "\t\t.sc-membership .mp-user-display-name {
\t\t\t";
            // line 367
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "user-name-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 368
($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "user-name-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 369
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "user-name-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "user-name-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 371
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "user-name-text-font-family-check", array(), "array") == 1)) {
                // line 372
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "user-name-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 374
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "user-name-text-color-check", array(), "array") == 1)) {
                // line 375
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "user-name-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 377
            echo "\t\t}
\t";
        }
        // line 379
        echo "\t";
        // line 380
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "counters-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "counters-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "counters-text-color-check", array(), "array") == 1))) {
            // line 381
            echo "\t\t.sc-membership .mp-profile-social-stats a.statistic div.value {
\t\t\t";
            // line 382
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "counters-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 383
($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "counters-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 384
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "counters-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "counters-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 386
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "counters-text-font-family-check", array(), "array") == 1)) {
                // line 387
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "counters-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 389
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "counters-text-color-check", array(), "array") == 1)) {
                // line 390
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "counters-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 392
            echo "\t\t}
\t";
        }
        // line 394
        echo "\t";
        // line 395
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "counters-label-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "counters-label-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "counters-label-text-color-check", array(), "array") == 1))) {
            // line 396
            echo "\t\t.sc-membership .mp-profile-social-stats a.statistic div.label {
\t\t\t";
            // line 397
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "counters-label-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 398
($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "counters-label-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 399
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "counters-label-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "counters-label-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 401
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "counters-label-text-font-family-check", array(), "array") == 1)) {
                // line 402
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "counters-label-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 404
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "counters-label-text-color-check", array(), "array") == 1)) {
                // line 405
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "counters-label-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 407
            echo "\t\t}
\t";
        }
        // line 409
        echo "\t";
        // line 410
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "tab-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "tab-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "tab-text-color-check", array(), "array") == 1))) {
            // line 411
            echo "\t\t.sc-membership .profile-nav-menu a.item,
\t\t.sc-membership .profile-nav-menu .ui.dropdown .menu a.item {
\t\t\t";
            // line 413
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "tab-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 414
($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "tab-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 415
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "tab-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "tab-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 417
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "tab-text-font-family-check", array(), "array") == 1)) {
                // line 418
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "tab-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 420
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "tab-text-color-check", array(), "array") == 1)) {
                // line 421
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "tab-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 423
            echo "\t\t}
\t";
        }
        // line 425
        echo "\t";
        // line 426
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "tab-menu-hover-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "tab-menu-hover-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "tab-menu-hover-text-color-check", array(), "array") == 1))) {
            // line 427
            echo "\t\t.sc-membership .profile-nav-menu a.item:hover,
\t\t.sc-membership .profile-nav-menu .ui.dropdown .menu a.item:hover {
\t\t\t";
            // line 429
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "tab-menu-hover-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 430
($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "tab-menu-hover-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 431
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "tab-menu-hover-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "tab-menu-hover-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 433
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "tab-menu-hover-text-font-family-check", array(), "array") == 1)) {
                // line 434
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "tab-menu-hover-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 436
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "tab-menu-hover-text-color-check", array(), "array") == 1)) {
                // line 437
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "tab-menu-hover-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 439
            echo "\t\t}
\t";
        }
        // line 441
        echo "\t";
        // line 442
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "message-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "message-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "message-text-color-check", array(), "array") == 1))) {
            // line 443
            echo "\t\t.sc-membership .mp-activity-container .mp-form-textarea {
\t\t\t";
            // line 444
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "message-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 445
($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "message-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 446
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "message-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "message-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 448
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "message-text-font-family-check", array(), "array") == 1)) {
                // line 449
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "message-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 451
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "message-text-color-check", array(), "array") == 1)) {
                // line 452
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "message-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 454
            echo "\t\t}
\t";
        }
        // line 456
        echo "\t";
        // line 457
        echo "\t";
        if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-buttons-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-buttons-text-color-check", array(), "array") == 1))) {
            // line 458
            echo "\t\t.ui.modals .ui.secondary.button.icon,
\t\t.sc-membership .ui.button.secondary.icon {
\t\t";
            // line 460
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-buttons-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 461
($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-buttons-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 462
                echo "\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-buttons-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-buttons-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t";
            }
            // line 464
            echo "\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-buttons-text-color-check", array(), "array") == 1)) {
                // line 465
                echo "\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-buttons-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t";
            }
            // line 467
            echo "\t\t}
\t";
        }
        // line 469
        echo "\t";
        // line 470
        echo "\t";
        if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-buttons-hover-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-buttons-hover-text-color-check", array(), "array") == 1))) {
            // line 471
            echo "\t\t.sc-membership .post-form-buttons .icon.button:hover {
\t\t\t";
            // line 472
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-buttons-hover-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 473
($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-buttons-hover-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 474
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-buttons-hover-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-buttons-hover-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 476
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-buttons-hover-text-color-check", array(), "array") == 1)) {
                // line 477
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-buttons-hover-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 479
            echo "\t\t}
\t";
        }
        // line 481
        echo "\t";
        // line 482
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-user-name-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-user-name-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-user-name-text-color-check", array(), "array") == 1))) {
            // line 483
            echo "\t\t.sc-membership .mp-activity .ui.basic a,
\t\t.sc-membership .mp-activity-comments .mp-comment-content a.author,
\t\t.sc-membership .mp-activity-header-title a {
\t\t\t";
            // line 486
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-user-name-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 487
($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-user-name-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 488
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-user-name-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-user-name-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 490
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-user-name-text-font-family-check", array(), "array") == 1)) {
                // line 491
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-user-name-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 493
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-user-name-text-color-check", array(), "array") == 1)) {
                // line 494
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-user-name-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 496
            echo "\t\t}
\t";
        }
        // line 498
        echo "\t";
        // line 499
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-text-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-text-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-text-text-color-check", array(), "array") == 1))) {
            // line 500
            echo "\t\t.sc-membership .mp-activity-content {
\t\t\t";
            // line 501
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-text-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 502
($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-text-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 503
                echo "\t\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-text-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-text-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t\t";
            }
            // line 505
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-text-text-font-family-check", array(), "array") == 1)) {
                // line 506
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-text-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 508
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-text-text-color-check", array(), "array") == 1)) {
                // line 509
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-text-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 511
            echo "\t\t}
\t";
        }
        // line 513
        echo "\t";
        // line 514
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-other-text-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-other-text-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-other-text-text-color-check", array(), "array") == 1))) {
            // line 515
            echo "\t\t.sc-membership .mp-activity .ui.basic,
\t\t.sc-membership .mp-activity-header-title {
\t\t\t";
            // line 517
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-other-text-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 518
($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-other-text-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 519
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-other-text-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-other-text-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 521
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-other-text-text-font-family-check", array(), "array") == 1)) {
                // line 522
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-other-text-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 524
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-other-text-text-color-check", array(), "array") == 1)) {
                // line 525
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-other-text-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 527
            echo "\t\t}
\t";
        }
        // line 529
        echo "

\t";
        // line 532
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-comment-text-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-comment-text-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-comment-text-text-color-check", array(), "array") == 1))) {
            // line 533
            echo "\t\t.sc-membership .mp-activity-comments .mp-comment-content .text {
\t\t\t";
            // line 534
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-comment-text-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 535
($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-comment-text-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 536
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-comment-text-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-comment-text-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 538
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-comment-text-text-font-family-check", array(), "array") == 1)) {
                // line 539
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-comment-text-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 541
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-comment-text-text-color-check", array(), "array") == 1)) {
                // line 542
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-comment-text-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 544
            echo "\t\t}
\t";
        }
        // line 546
        echo "\t";
        // line 547
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-date-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-date-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-date-text-color-check", array(), "array") == 1))) {
            // line 548
            echo "\t\t.sc-membership .mp-activity-comments .date,
\t\t.sc-membership .mp-activity-header-title .date {
\t\t\t";
            // line 550
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-date-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 551
($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-date-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 552
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-date-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-date-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 554
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-date-text-font-family-check", array(), "array") == 1)) {
                // line 555
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-date-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 557
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-date-text-color-check", array(), "array") == 1)) {
                // line 558
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-date-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 560
            echo "\t\t}
\t";
        }
        // line 562
        echo "\t";
        // line 563
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-icons-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-icons-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-icons-text-color-check", array(), "array") == 1))) {
            // line 564
            echo "\t\t.sc-membership .mp-activity-actions a {
\t\t\t";
            // line 565
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-icons-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 566
($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-icons-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 567
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-icons-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-icons-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 569
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-icons-text-font-family-check", array(), "array") == 1)) {
                // line 570
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-icons-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 572
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-icons-text-color-check", array(), "array") == 1)) {
                // line 573
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-icons-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 575
            echo "\t\t}
\t";
        }
        // line 577
        echo "\t";
        // line 578
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-icons-hover-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-icons-hover-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-icons-hover-text-color-check", array(), "array") == 1))) {
            // line 579
            echo "\t\t.sc-membership .mp-activity-actions a:hover {
\t\t\t";
            // line 580
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-icons-hover-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 581
($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-icons-hover-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 582
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-icons-hover-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-icons-hover-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 584
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-icons-hover-text-font-family-check", array(), "array") == 1)) {
                // line 585
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-icons-hover-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 587
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-icons-hover-text-color-check", array(), "array") == 1)) {
                // line 588
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "post-icons-hover-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 590
            echo "\t\t}
\t";
        }
        // line 592
        echo "\t";
        // line 593
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "deleted-post-entry-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "deleted-post-entry-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "deleted-post-entry-text-color-check", array(), "array") == 1))) {
            // line 594
            echo "\t\t.sc-membership .mp-activity .mp-activity-content.mp-activity-removed {
\t\t\t";
            // line 595
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "deleted-post-entry-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 596
($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "deleted-post-entry-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 597
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "deleted-post-entry-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "deleted-post-entry-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 599
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "deleted-post-entry-text-font-family-check", array(), "array") == 1)) {
                // line 600
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "deleted-post-entry-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 602
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "deleted-post-entry-text-color-check", array(), "array") == 1)) {
                // line 603
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "deleted-post-entry-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 605
            echo "\t\t}
\t";
        }
        // line 607
        echo "\t";
        // line 608
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "menu-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "menu-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "menu-text-color-check", array(), "array") == 1))) {
            // line 609
            echo "\t\t.sc-membership .mp-activity-menu .item {
\t\t\t";
            // line 610
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "menu-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 611
($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "menu-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 612
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "menu-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "menu-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 614
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "menu-text-font-family-check", array(), "array") == 1)) {
                // line 615
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "menu-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 617
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "menu-text-color-check", array(), "array") == 1)) {
                // line 618
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "menu-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 620
            echo "\t\t}
\t";
        }
        // line 622
        echo "\t";
        // line 623
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "menu-hover-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "menu-hover-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "menu-hover-text-color-check", array(), "array") == 1))) {
            // line 624
            echo "\t\t.sc-membership .mp-activity-menu .item:hover {
\t\t\t";
            // line 625
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "menu-hover-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 626
($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "menu-hover-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 627
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "menu-hover-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "menu-hover-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 629
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "menu-hover-text-font-family-check", array(), "array") == 1)) {
                // line 630
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "menu-hover-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 632
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "menu-hover-text-color-check", array(), "array") == 1)) {
                // line 633
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "menu-hover-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 635
            echo "\t\t}
\t";
        }
        // line 637
        echo "\t";
        // line 638
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "conversation-messages-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "conversation-messages-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "conversation-messages-text-color-check", array(), "array") == 1))) {
            // line 639
            echo "\t\t.sc-membership .comments.conversation-messages .text {
\t\t\t";
            // line 640
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "conversation-messages-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 641
($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "conversation-messages-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 642
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "conversation-messages-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "conversation-messages-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 644
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "conversation-messages-text-font-family-check", array(), "array") == 1)) {
                // line 645
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "conversation-messages-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 647
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "conversation-messages-text-color-check", array(), "array") == 1)) {
                // line 648
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "profile", array()), "conversation-messages-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 650
            echo "\t\t}
\t";
        }
        // line 652
        echo "
\t";
        // line 654
        echo "\t";
        // line 655
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-text-color-check", array(), "array") == 1))) {
            // line 656
            echo "\t\t.sc-membership .activity-filter {
\t\t\t";
            // line 657
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 658
($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 659
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 661
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-text-font-family-check", array(), "array") == 1)) {
                // line 662
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 664
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-text-color-check", array(), "array") == 1)) {
                // line 665
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 667
            echo "\t\t}
\t";
        }
        // line 669
        echo "\t";
        // line 670
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-hover-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-hover-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-hover-text-color-check", array(), "array") == 1))) {
            // line 671
            echo "\t\t.sc-membership .activity-filter:hover {
\t\t\t";
            // line 672
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-hover-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 673
($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-hover-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 674
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-hover-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-hover-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 676
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-hover-text-font-family-check", array(), "array") == 1)) {
                // line 677
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-hover-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 679
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-hover-text-color-check", array(), "array") == 1)) {
                // line 680
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-hover-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 682
            echo "\t\t}
\t";
        }
        // line 684
        echo "\t";
        // line 685
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-menu-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-menu-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-menu-text-color-check", array(), "array") == 1))) {
            // line 686
            echo "\t\t.sc-membership .activity-filter .header,
\t\t.sc-membership .activity-filter .activity-filter-item,
\t\t.sc-membership .activity-filter .menu .activity-type-item {
\t\t\t";
            // line 689
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-menu-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 690
($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-menu-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 691
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-menu-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-menu-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 693
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-menu-text-font-family-check", array(), "array") == 1)) {
                // line 694
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-menu-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 696
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-menu-text-color-check", array(), "array") == 1)) {
                // line 697
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-menu-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 699
            echo "\t\t}
\t";
        }
        // line 701
        echo "\t";
        // line 702
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-menu-hover-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-menu-hover-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-menu-hover-text-color-check", array(), "array") == 1))) {
            // line 703
            echo "\t\t.sc-membership .activity-filter .header:hover,
\t\t.sc-membership .activity-filter .activity-filter-item:hover,
\t\t.sc-membership .activity-filter .menu .activity-type-item:hover {
\t\t\t";
            // line 706
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-menu-hover-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 707
($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-menu-hover-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 708
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-menu-hover-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-menu-hover-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 710
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-menu-hover-text-font-family-check", array(), "array") == 1)) {
                // line 711
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-menu-hover-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 713
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-menu-hover-text-color-check", array(), "array") == 1)) {
                // line 714
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "activity", array()), "filter-button-menu-hover-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 716
            echo "\t\t}
\t";
        }
        // line 718
        echo "
\t";
        // line 720
        echo "\t";
        // line 721
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "user-name-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "user-name-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "user-name-text-color-check", array(), "array") == 1))) {
            // line 722
            echo "\t\t.sc-membership .mp-user-card a.header {
\t\t\t";
            // line 723
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "user-name-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 724
($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "user-name-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 725
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "user-name-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "user-name-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 727
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "user-name-text-font-family-check", array(), "array") == 1)) {
                // line 728
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "user-name-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 730
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "user-name-text-color-check", array(), "array") == 1)) {
                // line 731
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "user-name-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 733
            echo "\t\t}
\t";
        }
        // line 735
        echo "\t";
        // line 736
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "user-name-hover-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "user-name-hover-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "user-name-hover-text-color-check", array(), "array") == 1))) {
            // line 737
            echo "\t\t.sc-membership .mp-user-card a.header:hover {
\t\t\t";
            // line 738
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "user-name-hover-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 739
($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "user-name-hover-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 740
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "user-name-hover-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "user-name-hover-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 742
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "user-name-hover-text-font-family-check", array(), "array") == 1)) {
                // line 743
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "user-name-hover-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 745
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "user-name-hover-text-color-check", array(), "array") == 1)) {
                // line 746
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "user-name-hover-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 748
            echo "\t\t}
\t";
        }
        // line 750
        echo "\t";
        // line 751
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "counters-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "counters-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "counters-text-color-check", array(), "array") == 1))) {
            // line 752
            echo "\t\t.sc-membership .mp-user-card .statistic div.value {
\t\t\t";
            // line 753
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "counters-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 754
($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "counters-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 755
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "counters-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "counters-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 757
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "counters-text-font-family-check", array(), "array") == 1)) {
                // line 758
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "counters-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 760
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "counters-text-color-check", array(), "array") == 1)) {
                // line 761
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "counters-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 763
            echo "\t\t}
\t";
        }
        // line 765
        echo "\t";
        // line 766
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "counters-label-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "counters-label-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "counters-label-text-color-check", array(), "array") == 1))) {
            // line 767
            echo "\t\t.sc-membership .mp-user-card .statistic div.label {
\t\t\t";
            // line 768
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "counters-label-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 769
($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "counters-label-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 770
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "counters-label-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "counters-label-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 772
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "counters-label-text-font-family-check", array(), "array") == 1)) {
                // line 773
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "counters-label-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 775
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "counters-label-text-color-check", array(), "array") == 1)) {
                // line 776
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "members", array()), "counters-label-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 778
            echo "\t\t}
\t";
        }
        // line 780
        echo "\t";
        // line 781
        echo "\t";
        // line 782
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "tab-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "tab-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "tab-text-color-check", array(), "array") == 1))) {
            // line 783
            echo "\t\t.sc-membership .groups-tab-items a.item {
\t\t\t";
            // line 784
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "tab-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 785
($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "tab-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 786
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "tab-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "tab-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 788
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "tab-text-font-family-check", array(), "array") == 1)) {
                // line 789
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "tab-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 791
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "tab-text-color-check", array(), "array") == 1)) {
                // line 792
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "tab-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 794
            echo "\t\t}
\t";
        }
        // line 796
        echo "\t";
        // line 797
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "user-name-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "user-name-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "user-name-text-color-check", array(), "array") == 1))) {
            // line 798
            echo "\t\t.sc-membership .ui.card.mp-group-card a.header {
\t\t\t";
            // line 799
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "user-name-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 800
($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "user-name-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 801
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "user-name-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "user-name-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 803
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "user-name-text-font-family-check", array(), "array") == 1)) {
                // line 804
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "user-name-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 806
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "user-name-text-color-check", array(), "array") == 1)) {
                // line 807
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "user-name-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 809
            echo "\t\t}
\t";
        }
        // line 811
        echo "\t";
        // line 812
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "user-name-hover-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "user-name-hover-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "user-name-hover-text-color-check", array(), "array") == 1))) {
            // line 813
            echo "\t\t.sc-membership .ui.card.mp-group-card a.header:hover {
\t\t\t";
            // line 814
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "user-name-hover-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 815
($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "user-name-hover-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 816
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "user-name-hover-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "user-name-hover-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 818
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "user-name-hover-text-font-family-check", array(), "array") == 1)) {
                // line 819
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "user-name-hover-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 821
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "user-name-hover-text-color-check", array(), "array") == 1)) {
                // line 822
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "user-name-hover-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 824
            echo "\t\t}
\t";
        }
        // line 826
        echo "\t";
        // line 827
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "group-type-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "group-type-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "group-type-text-color-check", array(), "array") == 1))) {
            // line 828
            echo "\t\t.sc-membership .ui.card.mp-group-card .mbs-group-g-type small {
\t\t\t";
            // line 829
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "group-type-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 830
($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "group-type-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 831
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "group-type-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "group-type-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 833
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "group-type-text-font-family-check", array(), "array") == 1)) {
                // line 834
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "group-type-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 836
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "group-type-text-color-check", array(), "array") == 1)) {
                // line 837
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "group-type-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 839
            echo "\t\t}
\t";
        }
        // line 841
        echo "\t";
        // line 842
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "follower-count-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "follower-count-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "follower-count-text-color-check", array(), "array") == 1))) {
            // line 843
            echo "\t\t.sc-membership .ui.card.mp-group-card .mbs-group-followers small {
\t\t\t";
            // line 844
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "follower-count-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 845
($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "follower-count-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 846
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "follower-count-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "follower-count-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 848
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "follower-count-text-font-family-check", array(), "array") == 1)) {
                // line 849
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "follower-count-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 851
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "follower-count-text-color-check", array(), "array") == 1)) {
                // line 852
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "groups", array()), "follower-count-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 854
            echo "\t\t}
\t";
        }
        // line 856
        echo "
\t";
        // line 858
        echo "\t";
        // line 859
        echo "\t";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "search", array()), "nothing-found-text-font-size-check", array(), "array") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "search", array()), "nothing-found-text-font-family-check", array(), "array") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "search", array()), "nothing-found-text-color-check", array(), "array") == 1))) {
            // line 860
            echo "\t\t.sc-membership .ui.message {
\t\t\t";
            // line 861
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "search", array()), "nothing-found-text-font-size-check", array(), "array") == 1) && twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 862
($context["settings"] ?? null), "design", array()), "fonts", array()), "search", array()), "nothing-found-text-font-unit-select", array(), "array"), array(0 => "px", 1 => "em")))) {
                // line 863
                echo "\t\t\t\tfont-size: ";
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "search", array()), "nothing-found-text-font-size-number", array(), "array") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "search", array()), "nothing-found-text-font-unit-select", array(), "array")), "html", null, true);
                echo "  !important;
\t\t\t";
            }
            // line 865
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "search", array()), "nothing-found-text-font-family-check", array(), "array") == 1)) {
                // line 866
                echo "\t\t\t\tfont-family: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "search", array()), "nothing-found-text-font-family-select", array(), "array"), "html", null, true);
                echo "\" !important;
\t\t\t";
            }
            // line 868
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "search", array()), "nothing-found-text-color-check", array(), "array") == 1)) {
                // line 869
                echo "\t\t\t\tcolor: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "design", array()), "fonts", array()), "search", array()), "nothing-found-text-color-input", array(), "array"), "html", null, true);
                echo " !important;
\t\t\t";
            }
            // line 871
            echo "\t\t}
\t";
        }
        // line 873
        echo "</style>
";
    }

    public function getTemplateName()
    {
        return "@design/styles.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  2043 => 873,  2039 => 871,  2033 => 869,  2030 => 868,  2024 => 866,  2021 => 865,  2015 => 863,  2013 => 862,  2012 => 861,  2009 => 860,  2006 => 859,  2004 => 858,  2001 => 856,  1997 => 854,  1991 => 852,  1988 => 851,  1982 => 849,  1979 => 848,  1973 => 846,  1971 => 845,  1970 => 844,  1967 => 843,  1964 => 842,  1962 => 841,  1958 => 839,  1952 => 837,  1949 => 836,  1943 => 834,  1940 => 833,  1934 => 831,  1932 => 830,  1931 => 829,  1928 => 828,  1925 => 827,  1923 => 826,  1919 => 824,  1913 => 822,  1910 => 821,  1904 => 819,  1901 => 818,  1895 => 816,  1893 => 815,  1892 => 814,  1889 => 813,  1886 => 812,  1884 => 811,  1880 => 809,  1874 => 807,  1871 => 806,  1865 => 804,  1862 => 803,  1856 => 801,  1854 => 800,  1853 => 799,  1850 => 798,  1847 => 797,  1845 => 796,  1841 => 794,  1835 => 792,  1832 => 791,  1826 => 789,  1823 => 788,  1817 => 786,  1815 => 785,  1814 => 784,  1811 => 783,  1808 => 782,  1806 => 781,  1804 => 780,  1800 => 778,  1794 => 776,  1791 => 775,  1785 => 773,  1782 => 772,  1776 => 770,  1774 => 769,  1773 => 768,  1770 => 767,  1767 => 766,  1765 => 765,  1761 => 763,  1755 => 761,  1752 => 760,  1746 => 758,  1743 => 757,  1737 => 755,  1735 => 754,  1734 => 753,  1731 => 752,  1728 => 751,  1726 => 750,  1722 => 748,  1716 => 746,  1713 => 745,  1707 => 743,  1704 => 742,  1698 => 740,  1696 => 739,  1695 => 738,  1692 => 737,  1689 => 736,  1687 => 735,  1683 => 733,  1677 => 731,  1674 => 730,  1668 => 728,  1665 => 727,  1659 => 725,  1657 => 724,  1656 => 723,  1653 => 722,  1650 => 721,  1648 => 720,  1645 => 718,  1641 => 716,  1635 => 714,  1632 => 713,  1626 => 711,  1623 => 710,  1617 => 708,  1615 => 707,  1614 => 706,  1609 => 703,  1606 => 702,  1604 => 701,  1600 => 699,  1594 => 697,  1591 => 696,  1585 => 694,  1582 => 693,  1576 => 691,  1574 => 690,  1573 => 689,  1568 => 686,  1565 => 685,  1563 => 684,  1559 => 682,  1553 => 680,  1550 => 679,  1544 => 677,  1541 => 676,  1535 => 674,  1533 => 673,  1532 => 672,  1529 => 671,  1526 => 670,  1524 => 669,  1520 => 667,  1514 => 665,  1511 => 664,  1505 => 662,  1502 => 661,  1496 => 659,  1494 => 658,  1493 => 657,  1490 => 656,  1487 => 655,  1485 => 654,  1482 => 652,  1478 => 650,  1472 => 648,  1469 => 647,  1463 => 645,  1460 => 644,  1454 => 642,  1452 => 641,  1451 => 640,  1448 => 639,  1445 => 638,  1443 => 637,  1439 => 635,  1433 => 633,  1430 => 632,  1424 => 630,  1421 => 629,  1415 => 627,  1413 => 626,  1412 => 625,  1409 => 624,  1406 => 623,  1404 => 622,  1400 => 620,  1394 => 618,  1391 => 617,  1385 => 615,  1382 => 614,  1376 => 612,  1374 => 611,  1373 => 610,  1370 => 609,  1367 => 608,  1365 => 607,  1361 => 605,  1355 => 603,  1352 => 602,  1346 => 600,  1343 => 599,  1337 => 597,  1335 => 596,  1334 => 595,  1331 => 594,  1328 => 593,  1326 => 592,  1322 => 590,  1316 => 588,  1313 => 587,  1307 => 585,  1304 => 584,  1298 => 582,  1296 => 581,  1295 => 580,  1292 => 579,  1289 => 578,  1287 => 577,  1283 => 575,  1277 => 573,  1274 => 572,  1268 => 570,  1265 => 569,  1259 => 567,  1257 => 566,  1256 => 565,  1253 => 564,  1250 => 563,  1248 => 562,  1244 => 560,  1238 => 558,  1235 => 557,  1229 => 555,  1226 => 554,  1220 => 552,  1218 => 551,  1217 => 550,  1213 => 548,  1210 => 547,  1208 => 546,  1204 => 544,  1198 => 542,  1195 => 541,  1189 => 539,  1186 => 538,  1180 => 536,  1178 => 535,  1177 => 534,  1174 => 533,  1171 => 532,  1167 => 529,  1163 => 527,  1157 => 525,  1154 => 524,  1148 => 522,  1145 => 521,  1139 => 519,  1137 => 518,  1136 => 517,  1132 => 515,  1129 => 514,  1127 => 513,  1123 => 511,  1117 => 509,  1114 => 508,  1108 => 506,  1105 => 505,  1099 => 503,  1097 => 502,  1096 => 501,  1093 => 500,  1090 => 499,  1088 => 498,  1084 => 496,  1078 => 494,  1075 => 493,  1069 => 491,  1066 => 490,  1060 => 488,  1058 => 487,  1057 => 486,  1052 => 483,  1049 => 482,  1047 => 481,  1043 => 479,  1037 => 477,  1034 => 476,  1028 => 474,  1026 => 473,  1025 => 472,  1022 => 471,  1019 => 470,  1017 => 469,  1013 => 467,  1007 => 465,  1004 => 464,  998 => 462,  996 => 461,  995 => 460,  991 => 458,  988 => 457,  986 => 456,  982 => 454,  976 => 452,  973 => 451,  967 => 449,  964 => 448,  958 => 446,  956 => 445,  955 => 444,  952 => 443,  949 => 442,  947 => 441,  943 => 439,  937 => 437,  934 => 436,  928 => 434,  925 => 433,  919 => 431,  917 => 430,  916 => 429,  912 => 427,  909 => 426,  907 => 425,  903 => 423,  897 => 421,  894 => 420,  888 => 418,  885 => 417,  879 => 415,  877 => 414,  876 => 413,  872 => 411,  869 => 410,  867 => 409,  863 => 407,  857 => 405,  854 => 404,  848 => 402,  845 => 401,  839 => 399,  837 => 398,  836 => 397,  833 => 396,  830 => 395,  828 => 394,  824 => 392,  818 => 390,  815 => 389,  809 => 387,  806 => 386,  800 => 384,  798 => 383,  797 => 382,  794 => 381,  791 => 380,  789 => 379,  785 => 377,  779 => 375,  776 => 374,  770 => 372,  767 => 371,  761 => 369,  759 => 368,  758 => 367,  755 => 366,  752 => 365,  750 => 364,  748 => 363,  744 => 361,  738 => 359,  735 => 358,  729 => 356,  726 => 355,  720 => 353,  718 => 352,  717 => 351,  714 => 350,  711 => 349,  709 => 348,  705 => 346,  699 => 344,  696 => 343,  690 => 341,  687 => 340,  681 => 338,  679 => 337,  678 => 336,  675 => 335,  672 => 334,  670 => 333,  666 => 331,  660 => 329,  657 => 328,  651 => 326,  648 => 325,  642 => 323,  640 => 322,  639 => 321,  636 => 320,  633 => 319,  629 => 317,  623 => 315,  620 => 314,  614 => 312,  611 => 311,  605 => 309,  603 => 308,  602 => 307,  599 => 306,  596 => 305,  594 => 304,  590 => 302,  584 => 300,  581 => 299,  575 => 297,  572 => 296,  566 => 294,  564 => 293,  563 => 292,  554 => 285,  551 => 284,  549 => 283,  545 => 281,  539 => 279,  536 => 278,  530 => 276,  527 => 275,  521 => 273,  519 => 272,  518 => 271,  515 => 270,  512 => 269,  510 => 268,  506 => 266,  500 => 264,  497 => 263,  491 => 261,  488 => 260,  482 => 258,  480 => 257,  479 => 256,  475 => 254,  472 => 253,  470 => 252,  466 => 250,  460 => 248,  457 => 247,  451 => 245,  448 => 244,  442 => 242,  440 => 241,  439 => 240,  435 => 238,  432 => 237,  430 => 236,  428 => 235,  422 => 231,  420 => 230,  417 => 229,  411 => 225,  409 => 224,  406 => 223,  400 => 219,  398 => 218,  395 => 217,  365 => 189,  363 => 188,  360 => 187,  329 => 158,  327 => 157,  324 => 156,  294 => 128,  292 => 127,  288 => 125,  282 => 123,  280 => 122,  276 => 121,  269 => 117,  265 => 115,  262 => 114,  256 => 111,  253 => 110,  250 => 109,  245 => 106,  241 => 105,  237 => 104,  233 => 103,  229 => 102,  225 => 101,  221 => 100,  217 => 99,  211 => 96,  207 => 95,  202 => 92,  196 => 90,  193 => 89,  189 => 87,  185 => 86,  177 => 82,  172 => 81,  167 => 80,  162 => 79,  156 => 76,  149 => 73,  146 => 72,  143 => 71,  141 => 65,  138 => 64,  135 => 63,  132 => 62,  127 => 59,  121 => 56,  118 => 55,  113 => 52,  106 => 47,  100 => 44,  97 => 43,  95 => 42,  91 => 40,  85 => 38,  82 => 37,  78 => 35,  70 => 29,  64 => 27,  62 => 26,  49 => 15,  43 => 13,  40 => 12,  36 => 10,  29 => 6,  25 => 4,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<style id=\"membership-custom-styles\">

\t{% if settings.design.general['default-theme-colors'] == 'false' %}

\t\t.sc-membership {
\t\t\tbackground: {{ settings.design.general['sc-background-color'] }}!important;
\t\t}
\t\t.sc-membership .ui.primary.button,
\t\t.ui.modals .ui.primary.button {
\t\t\tbackground: {{ settings.design.general['primary-button-color'] }}!important;
\t\t\t{# New feature compatibility #}
\t\t\t{% if settings.design.general['primary-button-text-color'] is defined %}
\t\t\t\tcolor: {{ settings.design.general['primary-button-text-color'] }}!important;
\t\t\t{% endif %}
\t\t}


\t\t.sc-membership .ui.primary.button:active,
\t\t.sc-membership .ui.primary.buttons .button:active,
\t\t.ui.modals .ui.primary.button:active,
\t\t.ui.modals .ui.primary.buttons .button:active,
\t\t.sc-membership .ui.primary.button:hover,
\t\t.sc-membership .ui.primary.buttons .button:hover,
\t\t.ui.modals .ui.primary.button:hover,
\t\t.ui.modals .ui.primary.buttons .button:hover {
\t\t\t{% if settings.design.general['primary-button-hover-color'] %}
\t\t\t\tbackground: {{ settings.design.general['primary-button-hover-color'] }}!important;
\t\t\t{% endif %}
\t\t}


\t\t.sc-membership .ui.secondary.button,
\t\t.ui.modals .mbs-add-attachment,
\t\t.ui.modals .ui.secondary.button {
\t\t\tbackground: {{ settings.design.general['secondary-button-color'] }}!important;
\t\t\t{# New feature compatibility #}
\t\t\t{% if settings.design.general['secondary-button-text-color'] is defined %}
\t\t\t\tcolor: {{ settings.design.general['secondary-button-text-color'] }}!important;
\t\t\t{% endif %}
\t\t}

\t\t{% if settings.design.general['secondary-button-text-color'] is defined %}
\t\t\t.ui.modals .mbs-add-attachment .icon.attach {
\t\t\t\tcolor: {{ settings.design.general['secondary-button-text-color'] }}!important;
\t\t\t}
\t\t{% endif %}

\t\t.sc-membership .ui.secondary.button:hover,
\t\t.sc-membership .ui.secondary.buttons .button:hover,
\t\t.ui.modals .ui.secondary.button:hover,
\t\t.ui.modals .ui.secondary.buttons .button:hover {
\t\t\tbackground: {{ settings.design.general['secondary-button-hover-color'] }}!important;
\t\t}
\t\t{# Smile button background#}
\t\t.post-activity-buttons .button[data-action=\"add-smile-to-text\"] {
\t\t\tbackground-color: {{ settings.design.general['smile-button-bg-color']|default('#fff') }} !important;
\t\t}
\t\t.post-activity-buttons .button[data-action=\"add-smile-to-text\"]:hover {
\t\t\tbackground-color: {{ settings.design.general['smile-button-hover-bg-color']|default('#ddd') }} !important;
\t\t}
\t\t{# Smile button icon size#}
\t\t{% set smileBtnIconSize = settings.design.general['smiles-button-icon-size-text-font-size-number'] | default(20) %}
\t\t{% set smileBtnIconSizeUnits = settings.design.general['smiles-button-icon-size-text-font-unit-select'] | default('px') %}
\t\t{% set smileBtnIconWidthAndHeightSize = (smileBtnIconSizeUnits == 'em') ? (smileBtnIconSize + 1) : (smileBtnIconSize + 16) %}
\t\t{#
\t\t\t\t6 *5px word space;
\t\t\t\t6 *20px smile width;
\t\t\t\t6 *8px margin-left;
\t\t\t\t6 *8px margin-right;
\t\t#}
\t\t{% set smileWrapperIconSizeWidth = (smileBtnIconSizeUnits == 'em') ? (smileBtnIconSize*6) : (6*smileBtnIconSize + 6*5 + 6*8 + 6*8) %}
\t\t.post-activity-buttons .button[data-action=\"add-smile-to-text\"] {
\t\t\tfont-size: {{ smileBtnIconSize }}{{ smileBtnIconSizeUnits }}!important;
\t\t}
\t\t.mbs-smiles-wrapper {
\t\t\twidth: {{ smileWrapperIconSizeWidth }}px;
\t\t}
\t\t.mbs-sw-one-smile {
\t\t\twidth: {{ smileBtnIconWidthAndHeightSize }}{{ smileBtnIconSizeUnits }}!important;
\t\t\theight: {{ smileBtnIconWidthAndHeightSize }}{{ smileBtnIconSizeUnits }}!important;
\t\t\tfont-size: {{ smileBtnIconSize }}{{ smileBtnIconSizeUnits }}!important;
\t\t\tline-height: {{ smileBtnIconSize }}{{ smileBtnIconSizeUnits }}!important;
\t\t}

\t\t.ui.form input, .ui.form textarea {
\t\t\tborder-color: {{ settings.design.general['input-border-color'] }}!important;
\t\t\tbackground-color: {{ settings.design.general['input-background-color'] }}!important;
\t\t\t{# New feature compatibility #}
\t\t\t{% if settings.design.general['input-text-color'] is defined %}
\t\t\t\tcolor: {{ settings.design.general['input-text-color'] }}!important;
\t\t\t{% endif %}
\t\t}

\t\t.ui.form input:focus, .ui.form textarea:focus {
\t\t\tborder-color: {{ settings.design.general['input-border-focus-color'] }}!important;
\t\t\tbackground-color: {{ settings.design.general['input-background-focus-color'] }}!important;
\t\t}

\t\t.ui.form input::-webkit-input-placeholder { color: {{ settings.design.general['input-placeholder-color'] }}!important; }
\t\t.ui.form textarea::-webkit-input-placeholder { color: {{ settings.design.general['input-placeholder-color'] }}!important; }
\t\t.ui.form input:-moz-placeholder { color: {{ settings.design.general['input-placeholder-color'] }}!important;}
\t\t.ui.form textarea:-moz-placeholder { color: {{ settings.design.general['input-placeholder-color'] }}!important;}
\t\t.ui.form input::-moz-placeholder {color: {{ settings.design.general['input-placeholder-color'] }}!important;}
\t\t.ui.form textarea::-moz-placeholder {color: {{ settings.design.general['input-placeholder-color'] }}!important;}
\t\t.ui.form input:-ms-input-placeholder {color: {{ settings.design.general['input-placeholder-color'] }}!important;}
\t\t.ui.form textarea:-ms-input-placeholder {color: {{ settings.design.general['input-placeholder-color'] }}!important;}

\t\t{# New feature compatibility #}
\t\t{% if settings.design.general['label-text-color'] is defined %}
\t\t\t.ui.form label {
\t\t\t\tcolor: {{ settings.design.general['label-text-color'] }}!important;
\t\t\t}
\t\t{% endif %}
\t{% endif %}

\t#mp-profile .ui.container {
\t\twidth: {{ settings.design.profile['container-max-width'] }}!important;
\t}

\t.mp-profile-header {
\t\tbackground-color: {{ settings.design.profile['header-background-color'] }}!important;
\t\t{% if settings.design.profile['avatar-style'] != null %}
\t\t\tbackground-color: {{ settings.design.profile['avatar-style'] }}!important;
\t\t{% endif %}
\t}

\t{% if settings.design.general['avatar-style'] == 'round' %}
\t\t.sc-membership .mp-avatar,
\t\t.sc-membership .mp-avatar img,
\t\t.sc-membership .mp-avatar .mp-update-avatar-overlay,
\t\t.sc-membership .mp-user-card .mp-user-avatar,
\t\t.sc-membership .mp-user-card .mp-user-avatar img,
\t\t.sc-membership .mp-group-card .mp-group-logo,
\t\t.sc-membership .mp-group-card .mp-group-logo img,
\t\t#conversations .conversation-image,
\t\t#conversations .mp-message-avatar,
\t\t#conversations .mp-message-avatar img,
\t\t.sc-membership .mp-activity-container .mp-activity-header-image,
\t\t.sc-membership .mp-activity-container .mp-activity-header-image img,
\t\t.sc-membership .mp-activity-post-form .mp-activity-post-avatar,
\t\t.sc-membership .mp-activity-post-form .mp-activity-post-avatar img,
\t\t.sc-membership .mp-logo,
\t\t.sc-membership .mp-logo img,
\t\t.sc-membership .mp-logo .mp-update-logo-overlay,
\t\t.sc-membership .mp-activity-container .activity-author-group,
\t\t.sc-membership .mp-activity-container .activity-author-user,
\t\t.sc-membership .mp-activity-container .comment-container .avatar,
\t\t.sc-membership .mp-activity-container .comment-container .avatar img,
\t\t.sc-membership .mp-activity-container .mp-comment-form-author,
\t\t.sc-membership .mp-activity-container .mp-comment-form-author img,
\t\t.sc-membership .mp-activity-container .menu img.avatar
\t\t{
\t\t\tborder-radius: 5px;
\t\t}
\t{% endif %}

\t{% if settings.design.general['avatar-style'] == 'circle' %}
\t\t.sc-membership .mp-avatar,
\t\t.sc-membership .mp-avatar img,
\t\t.sc-membership .mp-avatar .mp-update-avatar-overlay,
\t\t.sc-membership .mp-user-card .mp-user-avatar,
\t\t.sc-membership .mp-user-card .mp-user-avatar img,
\t\t.sc-membership .mp-group-card .mp-group-logo,
\t\t.sc-membership .mp-group-card .mp-group-logo img,
\t\t#conversations .conversation-image,
\t\t#conversations .mp-message-avatar,
\t\t#conversations .mp-message-avatar img,
\t\t.sc-membership .mp-activity-container .mp-activity-header-image,
\t\t.sc-membership .mp-activity-container .mp-activity-header-image img,
\t\t.sc-membership .mp-activity-post-form .mp-activity-post-avatar,
\t\t.sc-membership .mp-activity-post-form .mp-activity-post-avatar img,
\t\t.sc-membership .mp-logo,
\t\t.sc-membership .mp-logo img,
\t\t.sc-membership .mp-logo .mp-update-logo-overlay,
\t\t.sc-membership .mp-activity-container .activity-author-group,
\t\t.sc-membership .mp-activity-container .activity-author-user,
\t\t.sc-membership .mp-activity-container .comment-container .avatar,
\t\t.sc-membership .mp-activity-container .comment-container .avatar img,
\t\t.sc-membership .mp-activity-container .mp-comment-form-author,
\t\t.sc-membership .mp-activity-container .mp-comment-form-author img,
\t\t.sc-membership .mp-activity-container .menu img.avatar
\t\t{
\t\t\tborder-radius: 50%;
\t\t}

\t{% endif %}

\t{% if settings.design.general['avatar-style'] == 'square' %}
\t\t.sc-membership .mp-avatar,
\t\t.sc-membership .mp-avatar img,
\t\t.sc-membership .mp-avatar .mp-update-avatar-overlay,
\t\t.sc-membership .mp-user-card .mp-user-avatar,
\t\t.sc-membership .mp-user-card .mp-user-avatar img,
\t\t.sc-membership .mp-group-card .mp-group-logo,
\t\t.sc-membership .mp-group-card .mp-group-logo img,
\t\t#conversations .conversation-image,
\t\t#conversations .mp-message-avatar,
\t\t#conversations .mp-message-avatar img,
\t\t.sc-membership .mp-activity-container .mp-activity-header-image,
\t\t.sc-membership .mp-activity-container .mp-activity-header-image img,
\t\t.sc-membership .mp-activity-post-form .mp-activity-post-avatar,
\t\t.sc-membership .mp-activity-post-form .mp-activity-post-avatar img,
\t\t.sc-membership .mp-logo,
\t\t.sc-membership .mp-logo img,
\t\t.sc-membership .mp-logo .mp-update-logo-overlay,
\t\t.sc-membership .mp-activity-container .activity-author-group,
\t\t.sc-membership .mp-activity-container .activity-author-user,
\t\t.sc-membership .mp-activity-container .comment-container .avatar,
\t\t.sc-membership .mp-activity-container .comment-container .avatar img,
\t\t.sc-membership .mp-activity-container .mp-comment-form-author,
\t\t.sc-membership .mp-activity-container .mp-comment-form-author img,
\t\t.sc-membership .mp-activity-container .menu img.avatar
\t\t{
\t\t\tborder-radius: 0;
\t\t}
\t{% endif %}

\t{% if settings.design.profile['show-display-name'] == 'false' %}
\t\t.sc-membership .mp-cover-container .mp-user-display-name {
\t\t\tdisplay: none;
\t\t}
\t{% endif %}

\t{% if settings.design.auth['login-secondary-button'] == 'false' %}
\t\t.sc-membership .ui.button.mp-login-secondary-button {
\t\t\tdisplay: none;
\t\t}
\t{% endif %}

    {% if settings.design.members['show-friends-and-followers'] != 'true' %}
        .mp-social-stats {
            display: none!important;
        }
    {% endif %}
\t{# General #}
\t{# Primary button #}
\t{% if settings.design.fonts.general['primary-buttons-text-font-size-check'] == 1 or settings.design.fonts.general['primary-buttons-text-font-family-check'] == 1 or settings.design.fonts.general['primary-buttons-text-color-check'] == 1 %}
\t\t.ui.modals .ui.button.primary,
\t\t.sc-membership .ui.button.primary {
\t\t\t{% if settings.design.fonts.general['primary-buttons-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.general['primary-buttons-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.general['primary-buttons-text-font-size-number'] ~ settings.design.fonts.general['primary-buttons-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.general['primary-buttons-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.general['primary-buttons-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.general['primary-buttons-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.general['primary-buttons-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Secondary button #}
\t{% if settings.design.fonts.general['secondary-buttons-text-font-size-check'] == 1 or settings.design.fonts.general['secondary-buttons-text-font-family-check'] == 1 or settings.design.fonts.general['secondary-buttons-text-color-check'] == 1 %}
\t\t.ui.modals .ui.secondary.button,
\t\t.sc-membership .ui.button.secondary:not(.icon) {
\t\t\t{% if settings.design.fonts.general['secondary-buttons-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.general['secondary-buttons-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.general['secondary-buttons-text-font-size-number'] ~ settings.design.fonts.general['secondary-buttons-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.general['secondary-buttons-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.general['secondary-buttons-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.general['secondary-buttons-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.general['secondary-buttons-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Page Header #}
\t{% if settings.design.fonts.general['page-header-text-font-size-check'] == 1 or settings.design.fonts.general['page-header-text-font-family-check'] == 1 or settings.design.fonts.general['page-header-text-color-check'] == 1 %}
\t\t.entry-header .entry-title {
\t\t\t{% if settings.design.fonts.general['page-header-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.general['page-header-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.general['page-header-text-font-size-number'] ~ settings.design.fonts.general['page-header-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.general['page-header-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.general['page-header-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.general['page-header-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.general['page-header-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Text input #}
\t{% if settings.design.fonts.general['text-input-text-font-size-check'] == 1 or settings.design.fonts.general['text-input-text-font-family-check'] == 1 or settings.design.fonts.general['text-input-text-color-check'] == 1 %}
\t\t.sc-membership input[type=\"text\"],
\t\t/*.sc-membership input[type=\"password\"],*/
\t\t/*.sc-membership input[type=\"email\"],*/
\t\t.sc-membership .ui.form input[type=\"text\"],
\t\t.sc-membership .ui.form input[type=\"text\"]:focus,
\t\t.sc-membership .ui.form input[type=\"password\"],
\t\t.sc-membership .ui.form input[type=\"email\"] {
\t\t\t{% if settings.design.fonts.general['text-input-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.general['text-input-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.general['text-input-text-font-size-number'] ~ settings.design.fonts.general['text-input-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.general['text-input-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.general['text-input-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.general['text-input-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.general['text-input-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Labels #}
\t{% if settings.design.fonts.profile['about-text-after-label-text-font-size-check'] == 1 or settings.design.fonts.profile['about-text-after-label-text-font-family-check'] == 1 or settings.design.fonts.profile['about-text-after-label-text-color-check'] == 1 %}
\t\t.sc-membership .ui.form .mp-field-data p  {
\t\t\t{% if settings.design.fonts.profile['about-text-after-label-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.profile['about-text-after-label-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.profile['about-text-after-label-text-font-size-number'] ~ settings.design.fonts.profile['about-text-after-label-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['about-text-after-label-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.profile['about-text-after-label-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['about-text-after-label-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.profile['about-text-after-label-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{% if settings.design.fonts.general['labels-text-font-size-check'] == 1 or settings.design.fonts.general['labels-text-font-family-check'] == 1 or settings.design.fonts.general['labels-text-color-check'] == 1 %}
\t\t.sc-membership .ui.form label {
\t\t\t{% if settings.design.fonts.general['labels-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.general['labels-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.general['labels-text-font-size-number'] ~ settings.design.fonts.general['labels-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.general['labels-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.general['labels-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.general['labels-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.general['labels-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Small labels #}
\t{% if settings.design.fonts.general['small-labels-text-font-size-check'] == 1 or settings.design.fonts.general['small-labels-text-font-family-check'] == 1 or settings.design.fonts.general['small-labels-text-color-check'] == 1 %}
\t\t.sc-membership .ui.form label small {
\t\t\t{% if settings.design.fonts.general['small-labels-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.general['small-labels-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.general['small-labels-text-font-size-number'] ~ settings.design.fonts.general['small-labels-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.general['small-labels-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.general['small-labels-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.general['small-labels-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.general['small-labels-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Links #}
\t{% if settings.design.fonts.general['links-text-font-size-check'] == 1 or settings.design.fonts.general['links-text-font-family-check'] == 1 or settings.design.fonts.general['links-text-color-check'] == 1 %}
\t\t.sc-membership .ui.form a {
\t\t\t{% if settings.design.fonts.general['links-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.general['links-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.general['links-text-font-size-number'] ~ settings.design.fonts.general['links-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.general['links-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.general['links-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.general['links-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.general['links-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Profile Page#}
\t{# User name #}
\t{% if settings.design.fonts.profile['user-name-text-font-size-check'] == 1 or settings.design.fonts.profile['user-name-text-font-family-check'] == 1 or settings.design.fonts.profile['user-name-text-color-check'] == 1 %}
\t\t.sc-membership .mp-user-display-name {
\t\t\t{% if settings.design.fonts.profile['user-name-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.profile['user-name-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.profile['user-name-text-font-size-number'] ~ settings.design.fonts.profile['user-name-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['user-name-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.profile['user-name-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['user-name-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.profile['user-name-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Counters #}
\t{% if settings.design.fonts.profile['counters-text-font-size-check'] == 1 or settings.design.fonts.profile['counters-text-font-family-check'] == 1 or settings.design.fonts.profile['counters-text-color-check'] == 1 %}
\t\t.sc-membership .mp-profile-social-stats a.statistic div.value {
\t\t\t{% if settings.design.fonts.profile['counters-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.profile['counters-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.profile['counters-text-font-size-number'] ~ settings.design.fonts.profile['counters-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['counters-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.profile['counters-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['counters-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.profile['counters-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Counters label #}
\t{% if settings.design.fonts.profile['counters-label-text-font-size-check'] == 1 or settings.design.fonts.profile['counters-label-text-font-family-check'] == 1 or settings.design.fonts.profile['counters-label-text-color-check'] == 1 %}
\t\t.sc-membership .mp-profile-social-stats a.statistic div.label {
\t\t\t{% if settings.design.fonts.profile['counters-label-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.profile['counters-label-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.profile['counters-label-text-font-size-number'] ~ settings.design.fonts.profile['counters-label-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['counters-label-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.profile['counters-label-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['counters-label-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.profile['counters-label-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Tab #}
\t{% if settings.design.fonts.profile['tab-text-font-size-check'] == 1 or settings.design.fonts.profile['tab-text-font-family-check'] == 1 or settings.design.fonts.profile['tab-text-color-check'] == 1 %}
\t\t.sc-membership .profile-nav-menu a.item,
\t\t.sc-membership .profile-nav-menu .ui.dropdown .menu a.item {
\t\t\t{% if settings.design.fonts.profile['tab-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.profile['tab-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.profile['tab-text-font-size-number'] ~ settings.design.fonts.profile['tab-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['tab-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.profile['tab-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['tab-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.profile['tab-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Tab menu hover #}
\t{% if settings.design.fonts.profile['tab-menu-hover-text-font-size-check'] == 1 or settings.design.fonts.profile['tab-menu-hover-text-font-family-check'] == 1 or settings.design.fonts.profile['tab-menu-hover-text-color-check'] == 1 %}
\t\t.sc-membership .profile-nav-menu a.item:hover,
\t\t.sc-membership .profile-nav-menu .ui.dropdown .menu a.item:hover {
\t\t\t{% if settings.design.fonts.profile['tab-menu-hover-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.profile['tab-menu-hover-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.profile['tab-menu-hover-text-font-size-number'] ~ settings.design.fonts.profile['tab-menu-hover-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['tab-menu-hover-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.profile['tab-menu-hover-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['tab-menu-hover-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.profile['tab-menu-hover-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Message #}
\t{% if settings.design.fonts.profile['message-text-font-size-check'] == 1 or settings.design.fonts.profile['message-text-font-family-check'] == 1 or settings.design.fonts.profile['message-text-color-check'] == 1 %}
\t\t.sc-membership .mp-activity-container .mp-form-textarea {
\t\t\t{% if settings.design.fonts.profile['message-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.profile['message-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.profile['message-text-font-size-number'] ~ settings.design.fonts.profile['message-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['message-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.profile['message-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['message-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.profile['message-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Post buttons #}
\t{% if settings.design.fonts.profile['post-buttons-text-font-size-check'] == 1 or settings.design.fonts.profile['post-buttons-text-color-check'] == 1 %}
\t\t.ui.modals .ui.secondary.button.icon,
\t\t.sc-membership .ui.button.secondary.icon {
\t\t{% if settings.design.fonts.profile['post-buttons-text-font-size-check'] == 1
\t\t\tand settings.design.fonts.profile['post-buttons-text-font-unit-select'] in ['px', 'em'] %}
\t\t\tfont-size: {{ settings.design.fonts.profile['post-buttons-text-font-size-number'] ~ settings.design.fonts.profile['post-buttons-text-font-unit-select'] }}  !important;
\t\t{% endif %}
\t\t{% if settings.design.fonts.profile['post-buttons-text-color-check'] == 1 %}
\t\t\tcolor: {{ settings.design.fonts.profile['post-buttons-text-color-input'] }} !important;
\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Post buttons hover #}
\t{% if settings.design.fonts.profile['post-buttons-hover-text-font-size-check'] == 1 or settings.design.fonts.profile['post-buttons-hover-text-color-check'] == 1 %}
\t\t.sc-membership .post-form-buttons .icon.button:hover {
\t\t\t{% if settings.design.fonts.profile['post-buttons-hover-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.profile['post-buttons-hover-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.profile['post-buttons-hover-text-font-size-number'] ~ settings.design.fonts.profile['post-buttons-hover-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['post-buttons-hover-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.profile['post-buttons-hover-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Post user name #}
\t{% if settings.design.fonts.profile['post-user-name-text-font-size-check'] == 1 or settings.design.fonts.profile['post-user-name-text-font-family-check'] == 1 or settings.design.fonts.profile['post-user-name-text-color-check'] == 1 %}
\t\t.sc-membership .mp-activity .ui.basic a,
\t\t.sc-membership .mp-activity-comments .mp-comment-content a.author,
\t\t.sc-membership .mp-activity-header-title a {
\t\t\t{% if settings.design.fonts.profile['post-user-name-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.profile['post-user-name-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.profile['post-user-name-text-font-size-number'] ~ settings.design.fonts.profile['post-user-name-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['post-user-name-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.profile['post-user-name-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['post-user-name-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.profile['post-user-name-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Post text #}
\t{% if settings.design.fonts.profile['post-text-text-font-size-check'] == 1 or settings.design.fonts.profile['post-text-text-font-family-check'] == 1 or settings.design.fonts.profile['post-text-text-color-check'] == 1 %}
\t\t.sc-membership .mp-activity-content {
\t\t\t{% if settings.design.fonts.profile['post-text-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.profile['post-text-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\t\tfont-size: {{ settings.design.fonts.profile['post-text-text-font-size-number'] ~ settings.design.fonts.profile['post-text-text-font-unit-select'] }}  !important;
\t\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['post-text-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.profile['post-text-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['post-text-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.profile['post-text-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Post other text #}
\t{% if settings.design.fonts.profile['post-other-text-text-font-size-check'] == 1 or settings.design.fonts.profile['post-other-text-text-font-family-check'] == 1 or settings.design.fonts.profile['post-other-text-text-color-check'] == 1 %}
\t\t.sc-membership .mp-activity .ui.basic,
\t\t.sc-membership .mp-activity-header-title {
\t\t\t{% if settings.design.fonts.profile['post-other-text-text-font-size-check'] == 1
\t\t\tand settings.design.fonts.profile['post-other-text-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.profile['post-other-text-text-font-size-number'] ~ settings.design.fonts.profile['post-other-text-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['post-other-text-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.profile['post-other-text-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['post-other-text-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.profile['post-other-text-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}


\t{# Post comment text #}
\t{% if settings.design.fonts.profile['post-comment-text-text-font-size-check'] == 1 or settings.design.fonts.profile['post-comment-text-text-font-family-check'] == 1 or settings.design.fonts.profile['post-comment-text-text-color-check'] == 1 %}
\t\t.sc-membership .mp-activity-comments .mp-comment-content .text {
\t\t\t{% if settings.design.fonts.profile['post-comment-text-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.profile['post-comment-text-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.profile['post-comment-text-text-font-size-number'] ~ settings.design.fonts.profile['post-comment-text-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['post-comment-text-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.profile['post-comment-text-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['post-comment-text-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.profile['post-comment-text-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Post date #}
\t{% if settings.design.fonts.profile['post-date-text-font-size-check'] == 1 or settings.design.fonts.profile['post-date-text-font-family-check'] == 1 or settings.design.fonts.profile['post-date-text-color-check'] == 1 %}
\t\t.sc-membership .mp-activity-comments .date,
\t\t.sc-membership .mp-activity-header-title .date {
\t\t\t{% if settings.design.fonts.profile['post-date-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.profile['post-date-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.profile['post-date-text-font-size-number'] ~ settings.design.fonts.profile['post-date-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['post-date-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.profile['post-date-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['post-date-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.profile['post-date-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Post icons #}
\t{% if settings.design.fonts.profile['post-icons-text-font-size-check'] == 1 or settings.design.fonts.profile['post-icons-text-font-family-check'] == 1 or settings.design.fonts.profile['post-icons-text-color-check'] == 1 %}
\t\t.sc-membership .mp-activity-actions a {
\t\t\t{% if settings.design.fonts.profile['post-icons-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.profile['post-icons-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.profile['post-icons-text-font-size-number'] ~ settings.design.fonts.profile['post-icons-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['post-icons-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.profile['post-icons-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['post-icons-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.profile['post-icons-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Post icons hover #}
\t{% if settings.design.fonts.profile['post-icons-hover-text-font-size-check'] == 1 or settings.design.fonts.profile['post-icons-hover-text-font-family-check'] == 1 or settings.design.fonts.profile['post-icons-hover-text-color-check'] == 1 %}
\t\t.sc-membership .mp-activity-actions a:hover {
\t\t\t{% if settings.design.fonts.profile['post-icons-hover-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.profile['post-icons-hover-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.profile['post-icons-hover-text-font-size-number'] ~ settings.design.fonts.profile['post-icons-hover-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['post-icons-hover-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.profile['post-icons-hover-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['post-icons-hover-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.profile['post-icons-hover-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Deleted Post entry #}
\t{% if settings.design.fonts.profile['deleted-post-entry-text-font-size-check'] == 1 or settings.design.fonts.profile['deleted-post-entry-text-font-family-check'] == 1 or settings.design.fonts.profile['deleted-post-entry-text-color-check'] == 1 %}
\t\t.sc-membership .mp-activity .mp-activity-content.mp-activity-removed {
\t\t\t{% if settings.design.fonts.profile['deleted-post-entry-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.profile['deleted-post-entry-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.profile['deleted-post-entry-text-font-size-number'] ~ settings.design.fonts.profile['deleted-post-entry-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['deleted-post-entry-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.profile['deleted-post-entry-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['deleted-post-entry-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.profile['deleted-post-entry-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Menu #}
\t{% if settings.design.fonts.profile['menu-text-font-size-check'] == 1 or settings.design.fonts.profile['menu-text-font-family-check'] == 1 or settings.design.fonts.profile['menu-text-color-check'] == 1 %}
\t\t.sc-membership .mp-activity-menu .item {
\t\t\t{% if settings.design.fonts.profile['menu-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.profile['menu-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.profile['menu-text-font-size-number'] ~ settings.design.fonts.profile['menu-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['menu-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.profile['menu-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['menu-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.profile['menu-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Menu hover #}
\t{% if settings.design.fonts.profile['menu-hover-text-font-size-check'] == 1 or settings.design.fonts.profile['menu-hover-text-font-family-check'] == 1 or settings.design.fonts.profile['menu-hover-text-color-check'] == 1 %}
\t\t.sc-membership .mp-activity-menu .item:hover {
\t\t\t{% if settings.design.fonts.profile['menu-hover-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.profile['menu-hover-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.profile['menu-hover-text-font-size-number'] ~ settings.design.fonts.profile['menu-hover-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['menu-hover-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.profile['menu-hover-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['menu-hover-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.profile['menu-hover-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Conversation messages text #}
\t{% if settings.design.fonts.profile['conversation-messages-text-font-size-check'] == 1 or settings.design.fonts.profile['conversation-messages-text-font-family-check'] == 1 or settings.design.fonts.profile['conversation-messages-text-color-check'] == 1 %}
\t\t.sc-membership .comments.conversation-messages .text {
\t\t\t{% if settings.design.fonts.profile['conversation-messages-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.profile['conversation-messages-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.profile['conversation-messages-text-font-size-number'] ~ settings.design.fonts.profile['conversation-messages-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['conversation-messages-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.profile['conversation-messages-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.profile['conversation-messages-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.profile['conversation-messages-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}

\t{# Activity Page #}
\t{# Filter button #}
\t{% if settings.design.fonts.activity['filter-button-text-font-size-check'] == 1 or settings.design.fonts.activity['filter-button-text-font-family-check'] == 1 or settings.design.fonts.activity['filter-button-text-color-check'] == 1 %}
\t\t.sc-membership .activity-filter {
\t\t\t{% if settings.design.fonts.activity['filter-button-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.activity['filter-button-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.activity['filter-button-text-font-size-number'] ~ settings.design.fonts.activity['filter-button-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.activity['filter-button-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.activity['filter-button-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.activity['filter-button-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.activity['filter-button-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Filter button hover #}
\t{% if settings.design.fonts.activity['filter-button-hover-text-font-size-check'] == 1 or settings.design.fonts.activity['filter-button-hover-text-font-family-check'] == 1 or settings.design.fonts.activity['filter-button-hover-text-color-check'] == 1 %}
\t\t.sc-membership .activity-filter:hover {
\t\t\t{% if settings.design.fonts.activity['filter-button-hover-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.activity['filter-button-hover-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.activity['filter-button-hover-text-font-size-number'] ~ settings.design.fonts.activity['filter-button-hover-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.activity['filter-button-hover-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.activity['filter-button-hover-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.activity['filter-button-hover-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.activity['filter-button-hover-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Filter button menu #}
\t{% if settings.design.fonts.activity['filter-button-menu-text-font-size-check'] == 1 or settings.design.fonts.activity['filter-button-menu-text-font-family-check'] == 1 or settings.design.fonts.activity['filter-button-menu-text-color-check'] == 1 %}
\t\t.sc-membership .activity-filter .header,
\t\t.sc-membership .activity-filter .activity-filter-item,
\t\t.sc-membership .activity-filter .menu .activity-type-item {
\t\t\t{% if settings.design.fonts.activity['filter-button-menu-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.activity['filter-button-menu-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.activity['filter-button-menu-text-font-size-number'] ~ settings.design.fonts.activity['filter-button-menu-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.activity['filter-button-menu-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.activity['filter-button-menu-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.activity['filter-button-menu-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.activity['filter-button-menu-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Filter button menu hover #}
\t{% if settings.design.fonts.activity['filter-button-menu-hover-text-font-size-check'] == 1 or settings.design.fonts.activity['filter-button-menu-hover-text-font-family-check'] == 1 or settings.design.fonts.activity['filter-button-menu-hover-text-color-check'] == 1 %}
\t\t.sc-membership .activity-filter .header:hover,
\t\t.sc-membership .activity-filter .activity-filter-item:hover,
\t\t.sc-membership .activity-filter .menu .activity-type-item:hover {
\t\t\t{% if settings.design.fonts.activity['filter-button-menu-hover-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.activity['filter-button-menu-hover-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.activity['filter-button-menu-hover-text-font-size-number'] ~ settings.design.fonts.activity['filter-button-menu-hover-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.activity['filter-button-menu-hover-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.activity['filter-button-menu-hover-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.activity['filter-button-menu-hover-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.activity['filter-button-menu-hover-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}

\t{# Members Page #}
\t{# User name #}
\t{% if settings.design.fonts.members['user-name-text-font-size-check'] == 1 or settings.design.fonts.members['user-name-text-font-family-check'] == 1 or settings.design.fonts.members['user-name-text-color-check'] == 1 %}
\t\t.sc-membership .mp-user-card a.header {
\t\t\t{% if settings.design.fonts.members['user-name-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.members['user-name-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.members['user-name-text-font-size-number'] ~ settings.design.fonts.members['user-name-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.members['user-name-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.members['user-name-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.members['user-name-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.members['user-name-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# User name hover #}
\t{% if settings.design.fonts.members['user-name-hover-text-font-size-check'] == 1 or settings.design.fonts.members['user-name-hover-text-font-family-check'] == 1 or settings.design.fonts.members['user-name-hover-text-color-check'] == 1 %}
\t\t.sc-membership .mp-user-card a.header:hover {
\t\t\t{% if settings.design.fonts.members['user-name-hover-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.members['user-name-hover-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.members['user-name-hover-text-font-size-number'] ~ settings.design.fonts.members['user-name-hover-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.members['user-name-hover-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.members['user-name-hover-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.members['user-name-hover-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.members['user-name-hover-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Counters #}
\t{% if settings.design.fonts.members['counters-text-font-size-check'] == 1 or settings.design.fonts.members['counters-text-font-family-check'] == 1 or settings.design.fonts.members['counters-text-color-check'] == 1 %}
\t\t.sc-membership .mp-user-card .statistic div.value {
\t\t\t{% if settings.design.fonts.members['counters-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.members['counters-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.members['counters-text-font-size-number'] ~ settings.design.fonts.members['counters-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.members['counters-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.members['counters-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.members['counters-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.members['counters-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Counters label #}
\t{% if settings.design.fonts.members['counters-label-text-font-size-check'] == 1 or settings.design.fonts.members['counters-label-text-font-family-check'] == 1 or settings.design.fonts.members['counters-label-text-color-check'] == 1 %}
\t\t.sc-membership .mp-user-card .statistic div.label {
\t\t\t{% if settings.design.fonts.members['counters-label-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.members['counters-label-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.members['counters-label-text-font-size-number'] ~ settings.design.fonts.members['counters-label-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.members['counters-label-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.members['counters-label-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.members['counters-label-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.members['counters-label-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Group Page #}
\t{# Tab #}
\t{% if settings.design.fonts.groups['tab-text-font-size-check'] == 1 or settings.design.fonts.groups['tab-text-font-family-check'] == 1 or settings.design.fonts.groups['tab-text-color-check'] == 1 %}
\t\t.sc-membership .groups-tab-items a.item {
\t\t\t{% if settings.design.fonts.groups['tab-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.groups['tab-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.groups['tab-text-font-size-number'] ~ settings.design.fonts.groups['tab-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.groups['tab-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.groups['tab-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.groups['tab-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.groups['tab-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# User name #}
\t{% if settings.design.fonts.groups['user-name-text-font-size-check'] == 1 or settings.design.fonts.groups['user-name-text-font-family-check'] == 1 or settings.design.fonts.groups['user-name-text-color-check'] == 1 %}
\t\t.sc-membership .ui.card.mp-group-card a.header {
\t\t\t{% if settings.design.fonts.groups['user-name-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.groups['user-name-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.groups['user-name-text-font-size-number'] ~ settings.design.fonts.groups['user-name-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.groups['user-name-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.groups['user-name-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.groups['user-name-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.groups['user-name-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# User name hover #}
\t{% if settings.design.fonts.groups['user-name-hover-text-font-size-check'] == 1 or settings.design.fonts.groups['user-name-hover-text-font-family-check'] == 1 or settings.design.fonts.groups['user-name-hover-text-color-check'] == 1 %}
\t\t.sc-membership .ui.card.mp-group-card a.header:hover {
\t\t\t{% if settings.design.fonts.groups['user-name-hover-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.groups['user-name-hover-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.groups['user-name-hover-text-font-size-number'] ~ settings.design.fonts.groups['user-name-hover-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.groups['user-name-hover-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.groups['user-name-hover-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.groups['user-name-hover-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.groups['user-name-hover-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Group type #}
\t{% if settings.design.fonts.groups['group-type-text-font-size-check'] == 1 or settings.design.fonts.groups['group-type-text-font-family-check'] == 1 or settings.design.fonts.groups['group-type-text-color-check'] == 1 %}
\t\t.sc-membership .ui.card.mp-group-card .mbs-group-g-type small {
\t\t\t{% if settings.design.fonts.groups['group-type-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.groups['group-type-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.groups['group-type-text-font-size-number'] ~ settings.design.fonts.groups['group-type-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.groups['group-type-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.groups['group-type-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.groups['group-type-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.groups['group-type-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
\t{# Follower count #}
\t{% if settings.design.fonts.groups['follower-count-text-font-size-check'] == 1 or settings.design.fonts.groups['follower-count-text-font-family-check'] == 1 or settings.design.fonts.groups['follower-count-text-color-check'] == 1 %}
\t\t.sc-membership .ui.card.mp-group-card .mbs-group-followers small {
\t\t\t{% if settings.design.fonts.groups['follower-count-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.groups['follower-count-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.groups['follower-count-text-font-size-number'] ~ settings.design.fonts.groups['follower-count-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.groups['follower-count-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.groups['follower-count-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.groups['follower-count-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.groups['follower-count-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}

\t{# Search Page #}
\t{# Nothing is found #}
\t{% if settings.design.fonts.search['nothing-found-text-font-size-check'] == 1 or settings.design.fonts.search['nothing-found-text-font-family-check'] == 1 or settings.design.fonts.search['nothing-found-text-color-check'] == 1 %}
\t\t.sc-membership .ui.message {
\t\t\t{% if settings.design.fonts.search['nothing-found-text-font-size-check'] == 1
\t\t\t\tand settings.design.fonts.search['nothing-found-text-font-unit-select'] in ['px', 'em'] %}
\t\t\t\tfont-size: {{ settings.design.fonts.search['nothing-found-text-font-size-number'] ~ settings.design.fonts.search['nothing-found-text-font-unit-select'] }}  !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.search['nothing-found-text-font-family-check'] == 1 %}
\t\t\t\tfont-family: \"{{ settings.design.fonts.search['nothing-found-text-font-family-select'] }}\" !important;
\t\t\t{% endif %}
\t\t\t{% if settings.design.fonts.search['nothing-found-text-color-check'] == 1 %}
\t\t\t\tcolor: {{ settings.design.fonts.search['nothing-found-text-color-input'] }} !important;
\t\t\t{% endif %}
\t\t}
\t{% endif %}
</style>
", "@design/styles.twig", "C:\\xampp\\htdocs\\lista_regalos\\wp-content\\plugins\\membership-by-supsystic\\src\\Membership\\Design\\views\\styles.twig");
    }
}
