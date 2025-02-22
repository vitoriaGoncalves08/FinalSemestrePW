<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* ./private/dashboard.twig */
class __TwigTemplate_a23138c0ffee8f569faa661a8791ef87cf188d760e5f1ccd9bced755f0e58d14 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'metas_data' => [$this, 'block_metas_data'],
            'title' => [$this, 'block_title'],
            'styles' => [$this, 'block_styles'],
            'body' => [$this, 'block_body'],
            'scripts' => [$this, 'block_scripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "template/html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("template/html.twig", "./private/dashboard.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function block_metas_data($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " ";
    }

    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        echo "Shoes | Painel Administrativo ";
    }

    public function block_styles($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, ($context["file"] ?? null), "html", null, true);
        echo "css/dashboard.css\" />
<link
  rel=\"stylesheet\"
  href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\"
/>
";
    }

    // line 8
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 9
        echo "
<main id=\"dashboard\">
  <div class=\"box_cima\">
    <div class=\"content_1\">
      <h2>MARCA COM + PRODUTOS</h2>
      <img class=\"nike\" src=\"";
        // line 14
        echo twig_escape_filter($this->env, ($context["file"] ?? null), "html", null, true);
        echo "img/vectors/logo_NIKE.svg\" />
      <p>";
        // line 15
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, ($context["countBrand"] ?? null)), "html", null, true);
        echo "</p>
    </div>
    <div class=\"content_2\">
      <h2>MÉDIA DOS PREÇOS</h2>
      <img class=\"money\" src=\"";
        // line 19
        echo twig_escape_filter($this->env, ($context["file"] ?? null), "html", null, true);
        echo "img/vectors/S.svg\" />
      <p class=\"media\">R\$ ";
        // line 20
        echo twig_escape_filter($this->env, ($context["avgPrice"] ?? null), "html", null, true);
        echo ",00</p>
    </div>
    <div class=\"content_3\">
      <h2>CATEGORIA + VENDIDA</h2>
      <img class=\"catego\" src=\"";
        // line 24
        echo twig_escape_filter($this->env, ($context["file"] ?? null), "html", null, true);
        echo "img/vectors/list.svg\" />
      <p>";
        // line 25
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, ($context["countCategory"] ?? null)), "html", null, true);
        echo "</p>
    </div>
    <div class=\"content_4\">
      <h2>GÊNERO + ACESSADO</h2>
      <img class=\"unissex\" src=\"";
        // line 29
        echo twig_escape_filter($this->env, ($context["file"] ?? null), "html", null, true);
        echo "img/vectors/Unissex.svg\" />
      <p>";
        // line 30
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, ($context["genderA"] ?? null)), "html", null, true);
        echo "</p>
    </div>
  </div>
  <div class=\"box_baixo\">
    <div class=\"content_5\">
      <section>
        <h2 class=\"graf\">GRÁFICO</h2>
        <div class=\"div-graf\">
          <!--Div that will hold the pie chart-->
          <div id=\"chart_div\"></div>
        </div>
        <div class=\"div-graf\">
          <div id=\"columnchart_values\"></div>
        </div>
      </section>
    </div>
    <div class=\"content_6\">
      <h2 class=\"title_filter\">FILTROS</h2>
      <div id=\"filter\">
        <div class=\"form-filters\">
          <select name=\"selectFilter\" required id=\"selectFilter\">
            <option value=\"0\">Selecione</option>
            <option value=\"1\">Categoria</option>
            <option value=\"2\">Marca</option>
            <option value=\"3\">Gênero</option>
          </select>
        </div>
      </div>
    </div>
  </div>
</main>

";
    }

    // line 62
    public function block_scripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 63
        echo "<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, ($context["file"] ?? null), "html", null, true);
        echo "js/dashboard.js\"></script>
<script
  type=\"text/javascript\"
  src=\"https://www.gstatic.com/charts/loader.js\"
></script>
<script type=\"text/javascript\">
  // Load the Visualization API and the corechart package.
  google.charts.load(\"current\", { packages: [\"corechart\"] });

  google.charts.setOnLoadCallback(drawChart());
  // Set a callback to run when the Google Visualization API is loaded.
  document
    .querySelector(\".box_baixo select\")
    .addEventListener(\"change\", (e) => {
      let options = e.target.options;
      // console.log(options);
      if (options.selectedIndex == 2) {
        google.charts.setOnLoadCallback(drawChart(1, \"Marca\"));
      } else if (options.selectedIndex == 3) {
        google.charts.setOnLoadCallback(drawChart(2, \"Gênero\"));
      } else {
        google.charts.setOnLoadCallback(drawChart());
      }
    });

  // Callback that creates and populates a data table,
  // instantiates the pie chart, passes in the data and
  // draws it.
  async function drawChart(type = 0, name = \"Categoria\") {
    // Create the data table.
    [brand, category, gender] = await requests();
    var data = new google.visualization.DataTable();
    let rows;
    if (type == 0) {
      rows = category.map((el) => {
        return [el.nameCategory, +el.ct];
      });
    } else if (type == 1) {
      rows = brand.map((el) => {
        return [el.nameBrand, +el.ct];
      });
    } else if (type == 2) {
      rows = gender.map((el) => {
        return [el.genderShoe, +el.ct];
      });
    }
    data.addColumn(\"string\", \"Topping\");
    data.addColumn(\"number\", \"Slices\");
    data.addRows(rows);

    var options = {
      title: name,
      width: \"100%\",
      height: \"100%\",
      colors: [\"#0071B7\", \"#542886\", \"#00ACEE\", \"#933D97\"],
    };

    // Instantiate and draw our chart, passing in some options.
    
    setTimeout(()=>{
      var chart = new google.visualization.PieChart(
        document.querySelector(\"#chart_div\")
      );
      chart.draw(data, options);
    },2000)
  }
</script>
";
    }

    public function getTemplateName()
    {
        return "./private/dashboard.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  166 => 63,  162 => 62,  125 => 30,  121 => 29,  114 => 25,  110 => 24,  103 => 20,  99 => 19,  92 => 15,  88 => 14,  81 => 9,  77 => 8,  66 => 3,  59 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "./private/dashboard.twig", "C:\\xampp\\htdocs\\Escola\\2b\\FinalSemestrePW\\app\\view\\private\\dashboard.twig");
    }
}
