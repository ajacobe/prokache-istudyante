<?php

/* ::base.html.twig */
class __TwigTemplate_2daa590e973eca5aece2cfbacdbcf88d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

        ";
        // line 7
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "b7e4182_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b7e4182_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/compiled-admin_bootstrap.min_1.js");
            // line 11
            echo "
            <script src=\"";
            // line 12
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "b7e4182"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b7e4182") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/compiled-admin.js");
            // line 11
            echo "
            <script src=\"";
            // line 12
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 14
        echo "            ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "325dbb4_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_325dbb4_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/325dbb4_bootstrap.min_1.css");
            // line 18
            echo "            ";
            // asset "325dbb4_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_325dbb4_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/325dbb4_bootstrap-responsive.min_2.css");
            echo "            ";
        } else {
            // asset "325dbb4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_325dbb4") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/325dbb4.css");
            echo "            ";
        }
        unset($context["asset_url"]);
        // line 19
        echo "            
    </head>
    ";
        // line 21
        $this->displayBlock('body', $context, $blocks);
        // line 22
        echo "</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Istudyante";
    }

    // line 21
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 21,  81 => 5,  77 => 22,  75 => 21,  71 => 19,  60 => 18,  55 => 14,  49 => 12,  46 => 11,  39 => 12,  36 => 11,  32 => 7,  27 => 5,  21 => 1,);
    }
}
