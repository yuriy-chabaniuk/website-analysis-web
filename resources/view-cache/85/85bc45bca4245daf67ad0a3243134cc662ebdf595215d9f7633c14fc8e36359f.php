<?php

/* report.php */
class __TwigTemplate_c7d8cf2330b83b1a8596fe56b346281aa1c7edcf50903139e29d411aee03bf0c extends Twig_Template
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
        echo "<html xmlns:v-on=\"http://www.w3.org/1999/xhtml\">
<head>
    <title>Competitive Analysis</title>
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"/assets/css/app.css\">
</head>
<body>
<div id=\"root\" class=\"container-fluid\">

    <form class=\"form-horizontal\" method=\"post\" action=\"#\">
        <div class=\"row\">
            <div class=\"col-md-3 col-sm-3\"></div>
            <div class=\"col-md-6 col-sm-6\">
                <div class=\"page-header\">
                    <img src=\"/assets/images/e_EZbgLD.jpg\" width=\"50px\" height=\"50px\" style=\"float: left;\" />
                    <h1>&nbsp;Competitive Analysis</h1>
                </div>
            </div>
            <div class=\"col-md-3 col-sm-3\"></div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-2 col-sm-2\"></div>
            <div class=\"col-md-6 col-sm-6\">
                <div class=\"form-group\">
                    <div class=\"col-sm-9\">
                        <label for=\"url\" class=\"control-label\">Your Url</label>
                        <input type=\"text\" v-model=\"url\" class=\"form-control\" id=\"url\" name=\"url\" placeholder=\"yourwebsite.com\" >
                    </div>
                </div>
            </div>
            <div class=\"col-md-3 col-sm-3\" v-if=\"url.length > 1\">
<!--                <a class=\"bootstrap-link\" v-on:click=\"showCompetitorPage\">Competitor Report</a>-->
<!--                <span> | </span>-->
<!--                <a class=\"bootstrap-link\" v-on:click=\"showIndividualPage\">Individual Report</a>-->
            </div>
        </div>
        <div class=\"row\" v-if=\"state === 'competitor'\">
            <div class=\"col-md-2 col-sm-2\"></div>
            <div class=\"col-md-2 col-sm-2\">
                <div class=\"form-group\">
                    <div class=\"col-sm-12\">
                        <input type=\"text\" v-model=\"competitor1url\" class=\"form-control\" id=\"competitor1url\" name=\"competitor1url\" placeholder=\"competitor1.com\">
                    </div>
                </div>
            </div>
            <div class=\"col-md-1 col-sm-1\">vs</div>
            <div class=\"col-md-2 col-sm-2\">
                <div class=\"form-group\">
                    <div class=\"col-sm-12\">
                        <input type=\"text\" v-model=\"competitor2url\" class=\"form-control\" id=\"competitor2url\" name=\"competitor2url\" placeholder=\"competitor2.com\">
                    </div>
                </div>
            </div>
            <div class=\"col-md-1 col-sm-1\">vs</div>
            <div class=\"col-md-2 col-sm-2\">
                <div class=\"form-group\">
                    <div class=\"col-sm-12\">
                        <input type=\"text\" v-model=\"competitor3url\" class=\"form-control\" id=\"competitor3url\" name=\"competitor3url\" placeholder=\"competitor3.com\">
                    </div>
                </div>

            </div>
            <div class=\"col-md-1 col-sm-1\">

            </div>
            <div class=\"col-md-1 col-sm-1\"></div>
        </div>
        <div class=\"row\" v-if=\"state === 'competitor' || state == 'individual'\">
            <div class=\"col-md-2 col-sm-2\"></div>
            <div class=\"col-md-8 col-sm-8\">
                <button type=\"button\" v-on:click.prevent=\"run\" class=\"btn btn-primary btn-block\">Run</button>
            </div>
            <div class=\"col-md-2 col-sm-2\"></div>
        </div>
    </form>

    <div id=\"individual-report\" v-if=\"state === 'individual' && individual.analytics.length > 0 \">
        <div id=\"individual-ceo-performance\">
            <div class=\"row\">
                <div class=\"col-md-1 col-sm-1\"></div>
                <div class=\"col-md-10 col-sm-10\">
                    <h3>SEO Performance</h3>
                </div>
                <div class=\"col-md-1 col-sm-1\"></div>
            </div>
            <div class=\"row\">
                <div class=\"col-md-1 col-sm-1\"></div>
                <div class=\"col-md-10 col-sm-10\">
                    <span>Active for: FILL</span>
                </div>
                <div class=\"col-md-1 col-sm-1\"></div>
            </div>
            <div class=\"row\">
                <div class=\"col-md-1\"></div>
                <div class=\"col-md-10\">
                    <table class=\"table table-striped\">
                        <tr>
                            <th>Organic Keywords</th>
                            <th>Monthly SEO Clicks</th>
                            <th>Monthly SEO Click Value</th>
                            <th>Sum Of Rank Change</th>
                        </tr>
                        <tr v-for=\"val in individual.analytics\">
                            <td>";
        // line 104
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["val"] ?? null), "num_organic_keywords", array()), "html", null, true);
        echo "</td>
                            <td>";
        // line 105
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["val"] ?? null), "organic_clicks_per_month", array()), "html", null, true);
        echo "</td>
                            <td>FILL</td>
                            <td>FILL</td>
                        </tr>
                    </table>
                </div>
                <div class=\"col-md-1\"></div>
            </div>
        </div>

        <div class=\"row\">
            <div class=\"col-md-1\"></div>
            <div class=\"col-md-10\">
                <div class=\"col-md-6\" style=\"padding-left: 0px;\">
                    <div class=\"col-md-12 col-sm-12\" style=\"padding-left: 0px;\">
                        <h3>Keyword Placement</h3>
                    </div>
                    <div class=\"col-md-12\"  style=\"padding: 0px;\">
                        <table class=\"table table-striped\">
                            <tr>
                                <th>Page 1</th>
                                <th>Almost There</th>
                                <th>Page 2 To 5</th>
                                <th>Just Fell Off</th>
                            </tr>
                            <tr v-if=\"individual.keywordPlacement.Page1\">
                                <td >";
        // line 131
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["individual"] ?? null), "keywordPlacement", array()), "Page1", array()), "html", null, true);
        echo "</td>
                                <td >";
        // line 132
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["individual"] ?? null), "keywordPlacement", array()), "AlmostThere", array()), "html", null, true);
        echo "</td>
                                <td >";
        // line 133
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["individual"] ?? null), "keywordPlacement", array()), "Pages2To5", array()), "html", null, true);
        echo "</td>
                                <td>FILL</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class=\"col-md-6\" style=\"padding: 0px;\">
                    <div class=\"col-md-12 col-sm-12\" style=\"padding: 0px;\">
                        <h3>Ranking Performance</h3>
                    </div>
                    <div class=\"col-md-12\" style=\"padding: 0px;\">
                        <table class=\"table table-striped\">
                            <tr>
                                <th>Newly Ranked</th>
                                <th>Improved Ranks</th>
                                <th>Lost Ranks</th>
                            </tr>
                            <tr v-for=\"val in individual.analytics\">
                                <td>FILL</td>
                                <td>FILL</td>
                                <td>FILL</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class=\"col-md-1\"></div>
        </div>

        <div id=\"individual-ppc-performance\">
            <div class=\"row\" >
                <div class=\"col-md-1 col-sm-1\"></div>
                <div class=\"col-md-10 col-sm-10\">
                    <h3>PPC Performance</h3>
                </div>
                <div class=\"col-md-1 col-sm-1\"></div>
            </div>
            <div class=\"row\">
                <div class=\"col-md-1 col-sm-1\"></div>
                <div class=\"col-md-10 col-sm-10\">
                    <span>Active for: FILL</span>
                </div>
                <div class=\"col-md-1 col-sm-1\"></div>
            </div>

            <div class=\"row\">
                <div class=\"col-md-1\"></div>
                <div class=\"col-md-10\">
                    <table class=\"table table-striped\">
                        <tr>
                            <th>Paid keywords</th>
                            <th>Monthly PPC Clicks</th>
                            <th>Monthly PPC Budget</th>
                            <th>Missed Monthly Impression</th>
                        </tr>
                        <tr v-for=\"val in individual.analytics\">
                            <td>";
        // line 189
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["val"] ?? null), "num_paid_keywords", array()), "html", null, true);
        echo "</td>
                            <td>";
        // line 190
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["val"] ?? null), "paid_clicks_per_month", array()), "html", null, true);
        echo "</td>
                            <td>";
        // line 191
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["val"] ?? null), "monthly_adwords_budget", array()), "html", null, true);
        echo "</td>
                            <td>FILL</td>
                        </tr>
                    </table>
                </div>
                <div class=\"col-md-1\"></div>
            </div>
        </div>
    </div>

    <div id=\"competitor-report\" v-if=\"state === 'competitor' && analytics.length > 0\">
        <div class=\"row\">
            <div class=\"col-md-1\"></div>
            <div class=\"col-md-10 table-responsive\">
                <data-table class=\"table table-striped table-sorted\" :data=\"analytics\" :columns-to-display=\"competitorSeoColumns\" :display-names=\"competitorSeoNames\">
                    <template slot=\"caption\"><h3>SEO Comparison</h3></template>
                </data-table>
            </div>
            <div class=\"col-md-1\"></div>
        </div>

        <div class=\"row\">
            <div class=\"col-md-1\"></div>
            <div class=\"col-md-10 table-responsive\">
                <data-table class=\"table table-striped table-sorted\" :data=\"analytics\" :columns-to-display=\"competitorPpcColumns\" :display-names=\"competitorPpcNames\">
                    <template slot=\"caption\"><h3>PPC Comparison</h3></template>
                    <template slot=\"daily_adwords_budget\" scope=\"props\">
                        \$";
        // line 218
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["props"] ?? null), "entry", array()), "daily_adwords_budget", array()), "html", null, true);
        echo "
                    </template>
                    <template slot=\"monthly_adwords_budget\" scope=\"props\">
                        \$";
        // line 221
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["props"] ?? null), "entry", array()), "monthly_adwords_budget", array()), "html", null, true);
        echo "
                    </template>
                </data-table>
            </div>
            <div class=\"col-md-1\"></div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-1 col-sm-1\"></div>
            <div class=\"col-md-10 col-sm-10\">
                <h3>Market Competitors</h3>
            </div>
            <div class=\"col-md-1 col-sm-1\"></div>
        </div>

        <div class=\"row\">
            <div class=\"col-md-1 col-sm-1\"></div>
            <div class=\"col-md-5 col-sm-5\">
                <data-table class=\"table table-striped table-sorted\" :data=\"topCompetitors.organic\" :columns-to-display=\"topCompetitorsColumns\" :display-names=\"topCompetitorNames\">
                    <template slot=\"caption\">Top Organic Competitors</template>
                </data-table>
            </div>
            <div class=\"col-md-5 col-sm-5\">
                <data-table class=\"table table-striped table-sorted\" :data=\"topCompetitors.paid\" :columns-to-display=\"topCompetitorsColumns\" :display-names=\"topCompetitorNames\">
                    <template slot=\"caption\">Top Paid Competitors</template>
                </data-table>
            </div>
            <div class=\"col-md-1 col-sm-1\"></div>
        </div>
    </div>

    <div v-if=\"loading\" class=\"loader\">
        <div class=\"loader-inner\"></div>
    </div>
</div>


<script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js\"></script>
<script src=\"https://unpkg.com/vue@2.4.1\"></script>
<script type=\"text/javascript\" src=\"https://cdn.rawgit.com/mikemenaker/vue-data-table/1.0.3/src/v-data-table.min.js\"></script>
<script src=\"/assets/js/report.js\"></script>
<style>
    .bootstrap-link {
        cursor: pointer;
    }
</style>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "report.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  268 => 221,  262 => 218,  232 => 191,  228 => 190,  224 => 189,  165 => 133,  161 => 132,  157 => 131,  128 => 105,  124 => 104,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "report.php", "/var/www/html/website-analysis-web/resources/views/report.php");
    }
}
