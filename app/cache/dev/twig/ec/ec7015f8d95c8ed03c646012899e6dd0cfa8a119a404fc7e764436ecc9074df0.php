<?php

/* base.html.twig */
class __TwigTemplate_25830227c6926a2cca128e49d95a2eb47ee973aa83f175cb04082bafadf9390a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_7e70f834d6db9b634a76a90fef031496c987fab838648bedea14081157489248 = $this->env->getExtension("native_profiler");
        $__internal_7e70f834d6db9b634a76a90fef031496c987fab838648bedea14081157489248->enter($__internal_7e70f834d6db9b634a76a90fef031496c987fab838648bedea14081157489248_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_7e70f834d6db9b634a76a90fef031496c987fab838648bedea14081157489248->leave($__internal_7e70f834d6db9b634a76a90fef031496c987fab838648bedea14081157489248_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_173bb1bc5e6ace03c6b4812142d9d2ebf459b6a1c6c21e312642fab7a2b04a42 = $this->env->getExtension("native_profiler");
        $__internal_173bb1bc5e6ace03c6b4812142d9d2ebf459b6a1c6c21e312642fab7a2b04a42->enter($__internal_173bb1bc5e6ace03c6b4812142d9d2ebf459b6a1c6c21e312642fab7a2b04a42_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_173bb1bc5e6ace03c6b4812142d9d2ebf459b6a1c6c21e312642fab7a2b04a42->leave($__internal_173bb1bc5e6ace03c6b4812142d9d2ebf459b6a1c6c21e312642fab7a2b04a42_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_64990a7b4834ab8a3d06abbb8247085b9a3bede376fba7e86871f945c5df9e38 = $this->env->getExtension("native_profiler");
        $__internal_64990a7b4834ab8a3d06abbb8247085b9a3bede376fba7e86871f945c5df9e38->enter($__internal_64990a7b4834ab8a3d06abbb8247085b9a3bede376fba7e86871f945c5df9e38_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_64990a7b4834ab8a3d06abbb8247085b9a3bede376fba7e86871f945c5df9e38->leave($__internal_64990a7b4834ab8a3d06abbb8247085b9a3bede376fba7e86871f945c5df9e38_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_72cf779b2a81452940b6f9f8c92bfc43a816dc3d5ecc73c58fa69c28a798d9e8 = $this->env->getExtension("native_profiler");
        $__internal_72cf779b2a81452940b6f9f8c92bfc43a816dc3d5ecc73c58fa69c28a798d9e8->enter($__internal_72cf779b2a81452940b6f9f8c92bfc43a816dc3d5ecc73c58fa69c28a798d9e8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_72cf779b2a81452940b6f9f8c92bfc43a816dc3d5ecc73c58fa69c28a798d9e8->leave($__internal_72cf779b2a81452940b6f9f8c92bfc43a816dc3d5ecc73c58fa69c28a798d9e8_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_05d411b8239eec49dd97ead60c3bfe5ccc7a26b11e7ccdc33d25d314f7a11066 = $this->env->getExtension("native_profiler");
        $__internal_05d411b8239eec49dd97ead60c3bfe5ccc7a26b11e7ccdc33d25d314f7a11066->enter($__internal_05d411b8239eec49dd97ead60c3bfe5ccc7a26b11e7ccdc33d25d314f7a11066_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_05d411b8239eec49dd97ead60c3bfe5ccc7a26b11e7ccdc33d25d314f7a11066->leave($__internal_05d411b8239eec49dd97ead60c3bfe5ccc7a26b11e7ccdc33d25d314f7a11066_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}Welcome!{% endblock %}</title>*/
/*         {% block stylesheets %}{% endblock %}*/
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     </head>*/
/*     <body>*/
/*         {% block body %}{% endblock %}*/
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
