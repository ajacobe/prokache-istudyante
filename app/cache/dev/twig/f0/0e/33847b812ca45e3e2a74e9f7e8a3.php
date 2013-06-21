<?php

/* AdminBundle:AdminUser:login.html.twig */
class __TwigTemplate_f00e33847b812ca45e3e2a74e9f7e8a3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo " <header>
        <h1>Istudyante Login Page</h1>
</header>

<form action=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_login"), "html", null, true);
        echo "\" method=\"POST\" class=\"user\">
    <div class=\"control-group\">
        <label class=\"control-label\" for=\"inputEmail\">Email</label>
        <div class=\"controls\">
        <input id=\"inputEmail\" class=\"input-large\" type=\"text\" value=\"\" name=\"_username\">
    </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\" for=\"inputPassword\">Password</label>
        <div class=\"controls\">
        <input id=\"inputPassword\" class=\"input-large\" type=\"password\" name=\"_password\">
        </div>
    </div>
    <div class=\"controls\">
        <input class=\"btn btn-primary\" type=\"submit\" value=\"Login\" name=\"submit\">
        </div>
        <div class=\"controls\">
        <a href=\"\">Forgot Password?</a>
    </div>

</form>
";
    }

    public function getTemplateName()
    {
        return "AdminBundle:AdminUser:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 7,  31 => 3,  28 => 2,);
    }
}
