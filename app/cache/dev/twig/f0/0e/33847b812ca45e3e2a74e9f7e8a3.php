<?php

/* AdminBundle:AdminUser:login.html.twig */
class __TwigTemplate_f00e33847b812ca45e3e2a74e9f7e8a3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('body', $context, $blocks);
    }

    public function block_body($context, array $blocks = array())
    {
        // line 2
        echo " <header>
        <h1>Health Care Abroad Administrator Login Page</h1>
</header>

<form action=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_login"), "html", null, true);
        echo "\" method=\"POST\" class=\"user\">
    aklajsdklasd

    <input type=\"submit\" value=\"Submit\" name=\"login\"/>
</form>
";
    }

    public function getTemplateName()
    {
        return "AdminBundle:AdminUser:login.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  32 => 6,  26 => 2,  20 => 1,);
    }
}
