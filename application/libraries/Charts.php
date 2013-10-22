<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
* @author : Élisson Barbosa
*
* @version : 1.0
* Date : Out 19, 2012
* Function : Charts manipulation
* Purpose : Like result do it easily  generate presentation of faster and rich graphs.
*
* @access public
* @param array
* @return string
**/
class Charts
{
    public $_all;
    private $_js;
    private $__render = 'container';
    private $__option;
    private $header;
    private $_subtitle;
    private $_pane;
    private $_navigation;
    private $_loading;
    private $_lang;
    private $_labels;
    private $_global;
    private $_exporting;
    private $_credits;
    private $_title;
    private $_serie;
    private $_plot;
    private $_legend;
    private $_colors;
    private $_chart;
    private $_xaxis;
    private $_yaxis;
    private $_tooltip;
    private $var_subtitle;
    private $var_pane;
    private $var_navigation;
    private $var_loading;
    private $var_lang;
    private $var_labels;
    private $var_global;
    private $var_exporting;
    private $var_credits;
    private $var_colors;
    private $var_serie;
    private $var_title;
    private $var_chart;
    private $var_xaxis;
    private $var_yaxis;
    private $var_tooltip;
    private $var_legend;
    private $var_plot;
   
    
    public function __construct() {
            $this->__render = '__div'.  random_string('alnum',10);
    }
    
    protected function set_header()
    {
        $this->header = <<<EOF
   <div id="$this->__render" {$this->get_divoptions()}></div>
        <script type="text/javascript">
            $(function () {
                   var $this->__render = new Highcharts.Chart({

EOF;

    }
    public function js_inject($js)
    {
        $this->_js = $js;
    }
    /*@function divoptions
     * @param String
     * @return A custon CSS for render div 
     */ 
    public function divoptions($opt){
        if(!is_array($opt)){
            $this->__option = str_replace(array('=','->'),':',$opt);
        }
        else{
            foreach ($opt as $key => $val)
            {
                $__temp[] = "$key:$val";
            }
            $this->__option = join(';', $__temp);
        }
    }
    public function get_divoptions()
    {
        return $this->__option ? "style=\"{$this->__option}\"" : '';
    }
    
    public function add_serie($dado = array())
    {     //TODO verificar a necessidade de utilizar filtro por tipo de chart ou uma função por tipo de chart $this->chart_type/$this->charts->new(*);
          $this->set_serie($dado);
    }
    /*
     * função gatilho para setar os valores passados por parâmetro, e gatilho para montar a estrutura final do método chamado.
     * 
     */
    public function subtitle($values)
    {
        $this->set_subtitle($values);
        $this->mount_subtitle();
    }
    public function pane($values)
    {
        $this->set_pane($values);
        $this->mount_pane();
    }
    public function navigation($values)
    {
        $this->set_navigation($values);
        $this->mount_navigation();
    }
    public function loading($values)
    {
        $this->set_loading($values);
        $this->mount_loading();
    }
    public function lang($values)
    {
        $this->set_lang($values);
        $this->mount_lang();
    }
    public function labels($values)
    {
        $this->set_labels($values);
        $this->mount_labels();
    }
    public function _global($values = '')
    {
        $this->set_global($values);
        $this->mount_global();
    }
    public function exporting($values = '')
    {
        $this->set_exporting($values);
        $this->mount_exporting();
    }
    public function credits($values = '')
    {
        $this->set_credits($values);
        $this->mount_credits();
    }
    public function colors($values)
    {
        $this->set_colors($values);
        $this->mount_colors();
    }
    public function chart($values)
    {
        $this->set_chart($values);
        $this->mount_chart();
    }
    public function tooltip($values)
    {
        $this->set_tooltip($values);
        $this->mount_tooltip();
    }
    public function xaxis($values)
    {
        $this->set_xaxis($values);
        $this->mount_xaxis();
    }
    public function yaxis($values)
    {
        $this->set_yaxis($values);
        $this->mount_yaxis();
    }
    public function title($values)
    {
        $this->set_title($values);
        $this->mount_title();
    }
    public function plotoptions($values)
    {
        $this->set_plot($values);
        $this->mount_plotoption();
    }
    public function legend($values)
    {
        $this->set_legend($values);
        $this->mount_legend();
    }
    /*
     * monta array formatado, contendo os valores passados por parâmetro
     * @return array 
     */
    public function set_serie($values)
    {
        foreach ($values as $value => $key){
            if (is_string($key)){
                $this->au__[$value] = "'{$key}'";
            }elseif(is_bool($key)){
                $this->au__[$value] = $key == false ? 'false' : 'true';
            }
            elseif(is_array($key)){
                if($value == 'data'){
                    $this->au__[$value] =  "[{$this->normalize_data($key)}]";
                }else{
                   $this->au__[$value] = "{{$this->normalize_array($key)}}";
                }
            }
            else{
                $this->au__[$value] = $key;
            }
        }
        $this->var_serie[] = $this->au__;
        unset($this->au__);
    }
    protected function set_colors($values)
    {
        $this->var_colors[] = "'".implode("','",$values)."'";
    }
    protected function set_subtitle($values)
    {
        foreach ($values as $value => $key){
            if (is_string($key)){
                $this->var_subtitle[$value] = "'{$key}'";
            }elseif(is_bool($key)){
                $this->var_subtitle[$value] = $key == false ? 'false' : 'true';
            }elseif(is_array($key)){
                $this->var_subtitle[$value] = "{{$this->normalize_array($key)}}";
            }else{
                $this->var_subtitle[$value] = $key;
            }
        }
    }
    protected function set_pane($values)
    {
        foreach ($values as $value => $key){
            if (is_string($key)){
                $this->var_pane[$value] = "'{$key}'";
            }elseif(is_bool($key)){
                $this->var_pane[$value] = $key == false ? 'false' : 'true';
            }elseif(is_array($key)){
                $this->var_pane[$value] = "{{$this->normalize_array($key)}}";
            }else{
                $this->var_pane[$value] = $key;
            }
        }
    }
    protected function set_navigation($values)
    {
        foreach ($values as $value => $key){
            if (is_string($key)){
                $this->var_navigation[$value] = "'{$key}'";
            }elseif(is_bool($key)){
                $this->var_navigation[$value] = $key == false ? 'false' : 'true';
            }elseif(is_array($key)){
                $this->var_navigation[$value] = "{{$this->normalize_array($key)}}";
            }else{
                $this->var_navigation[$value] = $key;
            }
        }
    }
    protected function set_loading($values)
    {
        foreach ($values as $value => $key){
            if (is_string($key)){
                $this->var_loading[$value] = "'{$key}'";
            }elseif(is_bool($key)){
                $this->var_loading[$value] = $key == false ? 'false' : 'true';
            }elseif(is_array($key)){
                $this->var_loading[$value] = "{{$this->normalize_array($key)}}";
            }else{
                $this->var_loading[$value] = $key;
            }
        }
    }
    protected function set_lang($values)
    {
        foreach ($values as $value => $key){
            if (is_string($key)){
                $this->var_lang[$value] = "'{$key}'";
            }elseif(is_bool($key)){
                $this->var_lang[$value] = $key == false ? 'false' : 'true';
            }elseif(is_array($key)){
                $this->var_lang[$value] = "{{$this->normalize_array($key)}}";
            }else{
                $this->var_lang[$value] = $key;
            }
        }
    }
    protected function set_labels($values)
    {
        foreach ($values as $value => $key){
            if (is_string($key)){
                $this->var_labels[$value] = "'{$key}'";
            }elseif(is_bool($key)){
                $this->var_labels[$value] = $key == false ? 'false' : 'true';
            }elseif(is_array($key)){
                $this->var_labels[$value] = $value == 'items' ? "[{{$this->normalize_array($key)}}]" : "{{$this->normalize_array($key)}}";
            }else{
                $this->var_labels[$value] = $key;
            }
        }
    }
    protected function set_global($values)
    {
        foreach ($values as $value => $key){
            if (is_string($key)){
                $this->var_global[$value] = "'{$key}'";
            }elseif(is_bool($key)){
                $this->var_global[$value] = $key == false ? 'false' : 'true';
            }elseif(is_array($key)){
                $this->var_global[$value] = "{{$this->normalize_array($key)}}";
            }else{
                $this->var_global[$value] = $key;
            }
        }
    }
    protected function set_exporting($values)
    {
        foreach ($values as $value => $key){
            if (is_string($key)){
                $this->var_exporting[$value] = "'{$key}'";
            }elseif(is_bool($key)){
                $this->var_exporting[$value] = $key == false ? 'false' : 'true';
            }elseif(is_array($key)){
                $this->var_exporting[$value] = "{{$this->normalize_array($key)}}";
            }else{
                $this->var_exporting[$value] = $key;
            }
        }
    }
    protected function set_tooltip($values)
    {
        foreach ($values as $value => $key){
            if (is_string($key)){
                $this->var_tooltip[$value] = "'{$key}'";
            }elseif(is_bool($key)){
                $this->var_tooltip[$value] = $key == false ? 'false' : 'true';
            }elseif(is_array($key)){
                $this->var_tooltip[$value] = "{{$this->normalize_array($key)}}";
            }else{
                $this->var_tooltip[$value] = $key;
            }
        }
    }
    protected function set_credits($values)
    {
        foreach ($values as $value => $key){
            if (is_string($key)){
                $this->var_credits[$value] = "'{$key}'";
            }elseif(is_bool($key)){
                $this->var_credits[$value] = $key == false ? 'false' : 'true';
            }elseif(is_array($key)){
                $this->var_credits[$value] = "{{$this->normalize_array($key)}}";
            }else{
                $this->var_credits[$value] = $key;
            }
        }
    }
    protected function set_title($values)
    {
        foreach ($values as $value => $key){
            if (is_string($key)){
                $this->var_title[$value] = "'{$key}'";
            }elseif(is_bool($key)){
                $this->var_title[$value] = $key == false ? 'false' : 'true';
            }elseif(is_array($key)){
                $this->var_title[$value] = "{{$this->normalize_array($key)}}";
            }else{
                $this->var_title[$value] = $key;
            }
        }
    }
    protected function set_chart($values)
    {
        foreach ($values as $value => $key){
            if (is_string($key)){
                    $this->var_chart[$value] = $value != 'events' ? "'{$key}'" : "{{$key}}";
            }elseif(is_bool($key)){
                $this->var_chart[$value] = $key == false ? 'false' : 'true';
            }elseif(is_array($key)){
                $this->var_chart[$value] = "{{$this->normalize_array($key)}}";
            }else{
                $this->var_chart[$value] = $key;
            }
        }
    }
    protected function set_xaxis($values)
    {
        foreach ($values as $value => $key){
            if (is_string($key)){
                $this->var_xaxis[$value] = "'{$key}'";
            }elseif(is_bool($key)){
                $this->var_xaxis[$value] = $key == false ? 'false' : 'true';
            }elseif(is_array($key)){
                $this->var_xaxis[$value] = $value != 'categories' ? "{{$this->normalize_array($key)}}" : "['".  implode("','",$key)."']";
            }else{
                $this->var_xaxis[$value] = $key;
            }
        }
    }
    protected function set_yaxis($values)
    {
        foreach ($values as $value => $key){
            if (is_string($key)){
                $this->var_yaxis[$value] = "'{$key}'";
            }elseif(is_bool($key)){
                $this->var_yaxis[$value] = $key == false ? 'false' : 'true';
            }elseif(is_array($key)){
                $this->var_yaxis[$value] = $value != 'categories' ? "{{$this->normalize_array($key)}}" : "['".  implode("','",$key)."']";
            }else{
                $this->var_yaxis[$value] = $key;
            }
        }
    }
    protected function set_plot($values)
    {
        foreach ($values as $value => $key){
            if (is_string($key)){
                $this->var_plot[$value] = strstr($key,':')? $key :"'{$key}'";
            }elseif(is_bool($key)){
                $this->var_plot[$value] = $key == false ? 'false' : 'true';
            }elseif(is_array($key)){
                $this->var_plot[$value] = "{{$this->normalize_array($key)}}";
            }else{
                $this->var_plot[$value] = $key;
            }
        }
    }
    protected function set_legend($values)
    {
        foreach ($values as $value => $key){
            if (is_string($key)){
                $this->var_legend[$value] = "'{$key}'";
            }elseif(is_bool($key)){
                $this->var_legend[$value] = $key == false ? 'false' : 'true';
            }elseif(is_array($key)){
                $this->var_legend[$value] = "{{$this->normalize_array($key)}}";
            }else{
                $this->var_legend[$value] = $key;
            }
        }
    }
    private function mount_colors()
    {
        $this->_colors =  str_replace(',', ','.PHP_EOL, implode(',',$this->var_colors));
    }
    private function mount_subtitle()
    {
       $_subtitle = array();
       foreach($this->var_subtitle as $valor => $k){
                $_subtitle[] = "{$valor}: {$k}";
       }
           $this->_subtitle =  join(','.PHP_EOL, $_subtitle);
    }
    private function mount_pane()
    {
       $_pane = array();
       foreach($this->var_pane as $valor => $k){
                $_pane[] = "{$valor}: {$k}";
       }
           $this->_pane =   join(','.PHP_EOL, $_pane);
    }
    private function mount_navigation()
    {
       $_navigation = array();
       foreach($this->var_navigation as $valor => $k){
                $_navigation[] = "{$valor}: {$k}";
       }
           $this->_navigation =   join(','.PHP_EOL, $_navigation);
    }
    private function mount_loading()
    {
       $_loading = array();
       foreach($this->var_loading as $valor => $k){
                $_loading[] = "{$valor}: {$k}";
       }
           $this->_loading =  join(','.PHP_EOL, $_loading);
    }
    private function mount_lang()
    {
       $_lang = array();
       foreach($this->var_lang as $valor => $k){
                $_lang[] = "{$valor}: {$k}";
       }
           $this->_lang =   join(','.PHP_EOL, $_lang);
    }
    private function mount_labels()
    {
       $_labels = array();
       foreach($this->var_labels as $valor => $k){
                $_labels[] = "{$valor}: {$k}";
       }
           $this->_labels =  join(','.PHP_EOL, $_labels);
    }
    private function mount_global()
    {
       $_global = array();
       foreach($this->var_global as $valor => $k){
                $_global[] = "{$valor}: {$k}";
       }
           $this->_global =   join(','.PHP_EOL, $_global);
    }
    private function mount_exporting()
    {
       $_exporting = array();
       foreach($this->var_exporting as $valor => $k){
                $_exporting[] = "{$valor}: {$k}";
       }
           $this->_exporting =  join(','.PHP_EOL, $_exporting);
    }
    private function mount_credits()
    {
       $_credits = array();
       foreach($this->var_credits as $valor => $k){
                $_credits[] = "{$valor}: {$k}";
       }
           $this->_credits =  join(','.PHP_EOL, $_credits);
    }
    private function mount_tooltip()
    {
       $_tooltip = array();
       foreach($this->var_tooltip as $valor => $k){
                $_tooltip[] = "{$valor}: {$k}";
       }
           $this->_tooltip =   join(','.PHP_EOL, $_tooltip);
    }
    private function mount_serie()
    {
       $_serie = array();
       foreach($this->var_serie as $values){
           foreach ($values as $k => $v){
              $_array_ini[] = "{$k}: {$v}";
           }
           $_serie[] = implode(',',$_array_ini);
           unset($_array_ini);
      }
      $this->_serie = implode('},'.PHP_EOL.'{',$_serie);
    }
    private function mount_title()
    {
       $_title = array();
       foreach($this->var_title as $valor => $k){
                $_title[] = "{$valor}: {$k}";
       }
           $this->_title =   join(','.PHP_EOL, $_title);
    }
    private function mount_chart()
    {
       $_chart = array();
       $render_is_set = FALSE;
       
       foreach($this->var_chart as $valor => $k){
                $_chart[] = "{$valor}: {$k}";
                if($valor == 'renderTo')
                {
                    $render_is_set = TRUE;
                }
       }
      if($render_is_set === FALSE)
      {
          $_chart[] = "renderTo:'{$this->__render}'";
      }
       $this->_chart =  join(','.PHP_EOL, $_chart);
    }
    private function mount_xaxis()
    {
       $_xaxis = array();
       foreach($this->var_xaxis as $valor => $k){
                $_xaxis[] = "{$valor}: {$k}";
       }
       $this->_xaxis =  join(','.PHP_EOL, $_xaxis);
    }
    private function mount_yaxis()
    {
       $_yaxis = array();
       foreach($this->var_yaxis as $valor => $k){
                $_yaxis[] = "{$valor}: {$k}";
       }
       $this->_yaxis = join(','.PHP_EOL, $_yaxis);
    }
    private function mount_plotoption()
    {
       $_plotOptions = array();
       foreach($this->var_plot as $valor => $k){
                $_plotOptions[] = "{$valor}: {$k}";
       }
       $this->_plot = join(','.PHP_EOL, $_plotOptions);
    }
    private function mount_legend()
    {
       $_legend = array();
       foreach($this->var_legend as $valor => $k){
                $_legend[] = "{$valor}: {$k}";
       }
       $this->_legend = join(','.PHP_EOL, $_legend);
    }
    /*
     *recupera o array contendo os elementos referidos
     *@return array
     * 
     */
    private function get_subtitle()
    {
        return $this->_subtitle;
    }
    private function get_pane()
    {
        return $this->_pane;
    }
    private function get_navigation()
    {
        return $this->_navigation;
    }
    private function get_loading()
    {
        return $this->_loading;
    }
    private function get_lang()
    {
        return $this->_lang;
    }
    private function get_labels()
    {
        return $this->_labels;
    }
    private function get_global()
    {
        return $this->_global;
    }
    private function get_exporting()
    {
        return $this->_exporting;
    }
    private function get_credits()
    {
        return $this->_credits;
    }
    private function get_colors()
    {
        return $this->_colors;
    }
    private function get_tooltip()
    {
        return $this->_tooltip;
    }
    private function get_title()
    {
        return $this->_title;
    }
    private function get_legend(){
        return $this->_legend;
    }
    private function get_chart()
    {
        return $this->_chart;
    }
    private function get_xaxis()
    {
        return $this->_xaxis;
    }
    private function get_yaxis()
    {
        return $this->_yaxis;
    }
    
    private function get_plotoption()
    {
        return $this->_plot;
    }
    private function get_serie()
    {
        return $this->_serie;
    }
    private function set_body()
    {
        /*
         * Verifica se os metodos foram setados.
         * @return string contendo os códigos javascript correspondentes
         */
        
        $extract = array();
        
            $extract[] = $this->_subtitle != null ? PHP_EOL."subtitle: {{$this->get_subtitle()}}" : null;
            
            $extract[] = $this->_pane != null ?  PHP_EOL."pane: {{$this->get_pane()}}" : null;
            
            $extract[] = $this->_navigation != null ?  PHP_EOL."navigation: {{$this->get_navigation()}}" : null;
            
            $extract[] = $this->_loading != null ?  PHP_EOL."loading: {{$this->get_loading()}}" : null;
            
            $extract[] = $this->_lang != null ?  PHP_EOL."lang: {{$this->get_lang()}}" : null;
            
            $extract[] = $this->_labels != null ?  PHP_EOL."labels: {{$this->get_labels()}}" : null;
            
            $extract[] = $this->_global != null ?  PHP_EOL."global: {{$this->get_global()}}" : null;
            
            $extract[] = $this->_exporting != null ?  PHP_EOL."exporting: {{$this->get_exporting()}}" : null;
            
            $extract[] = $this->_credits != null ?  PHP_EOL."credits: {{$this->get_credits()}}" : null;
            
            $extract[] = $this->_serie != null ?  PHP_EOL."series:[{ {$this->get_serie()}}]" : null;
            
            $extract[] = $this->_tooltip != null ?  PHP_EOL."tooltip: {{$this->get_tooltip()}}" : null;
            
            $extract[] = $this->_legend != null ?  PHP_EOL."legend: {{$this->get_legend()}}" : null;
            
            $extract[] = $this->_plot != null ?  PHP_EOL."plotOptions: {{$this->get_plotoption()}}" : null;
            
            $extract[] = $this->_yaxis != null ?  PHP_EOL."yAxis: {{$this->get_yaxis()}}" : null;
            
            $extract[] = $this->_xaxis != null ?  PHP_EOL."xAxis: {{$this->get_xaxis()}}" : null;
            
            $extract[] = $this->_chart != null ?  PHP_EOL."chart: {{$this->get_chart()}}" : null;
            
            $extract[] = $this->_title != null ?  PHP_EOL."title: {{$this->get_title()}}" : null;
            
            $extract[] = $this->_tooltip != null ?  PHP_EOL."tooltip: {{$this->get_tooltip()}}" : null;
            
            $extract[] = $this->_colors != null ?  PHP_EOL."colors: [{$this->get_colors()}]" : null;
                
            foreach ($extract as $k => $empt)
            { /*
              * retira as posições do array $extract com valores nulos.
              */
                if($empt == null)
                {
                    unset($extract[$k]);
                }
            }
             $extract = join(','.PHP_EOL, $extract);
        
        $this->body = "{$extract}});";
    }
    private function chart_create()
    {
        $Charts = "{$this->header}{$this->body}{$this->_js}});</script>";
        return $Charts;
    }
   
    public function close()
    {
        $this->set_header();
        $this->mount_serie();
        $this->set_body();
        return $this->chart_create();
    }
    public function build()
    {
        $this->set_header();
        $this->mount_serie();
        $this->set_body();
        echo $this->chart_create();
    }
    //TODO implementar opções para delimitadores da string.
    /*
     * 
     * 
     * Nomalizando os dados de Arrays especifico  de array('nome' => 'dado')
     * 
     * 
     *@return String  nomearray:{ nome : 'dado'}
     */
    public function normalize_data($data = array())
    {
        $normal = array();
        
        foreach ($data as $key => $value){
            if(is_array($value)){
                if($value == 'data'){
                    $normal[] = '{'.$this->normalize_array($value).'}';
                }else{
                    $normal[] = '['.$this->normalize_array($value).']';
                }
            }else{
                $normal[] = $value;
            }
        }
        $normalizer = implode(',', $normal);
        return $normalizer;
    }
    
    public function normalize_array($array = array())
    {
         $normal = array();
         
         foreach ($array as $value => $key){
            if (is_string($key)){
                $normal[] = $this->n_is_string($value, $key);
            }elseif(is_bool($key)){
                $normal[] = $this->n_is_bool($value,$key);
            }elseif(is_array($key)){
                $normal[] = $value.':{ '.  $this->n_is_array($key).'}';
            }
            else{
                $normal[] = $this->n_is_number($value,$key);
            }
        }
        $normalizer = implode(',', $normal);
        return $normalizer;
    }
    public function n_is_bool($k, $v)
    {
        $aux = $v == false ? 'false' : 'true';
        return $normal = $k.': '.$aux;
    }
    public function n_is_string($k, $v)
    {  
        if($k == 'events')
        {
            return "{$k} :{{$v}}".PHP_EOL;
        }
        elseif($k == 'formatter')
        {
            return "{$k} :{$v}".PHP_EOL;
        }
        else
        {  
            return "{$k} :'{$v}'";
        }
        
    }
    public function n_is_number($k, $v)
    {
        if($k == 'data'){
            return $normal = $k.': ['.$v.']';
        }
        else
        {
            return $normal = $k.': '.$v;
        }
    }
    public function n_is_array($d)
    {
        foreach ($d as $k => $v){
            if(is_bool($v)){
                $aux[] = $this->n_is_bool($k, $v);
            }elseif (is_string($v)) {
                $aux[] = $this->n_is_string($k, $v);
            }elseif(is_numeric($v)) {
                $aux[] = $this->n_is_number($k, $v);
            }elseif (is_array($v)) {
                $aux[] = $this->_is_array($v);
            }
        }
        return $aux = implode(',', $aux);
    }
    public function _is_array($d)
    {
         foreach ($d as $k => $v){
            if(is_bool($v)){
                $aux[] = $this->n_is_bool($k, $v);
            }elseif (is_string($v)) {
                $aux[] = $this->n_is_string($k, $v);
            }elseif(is_numeric($v)) {
                $aux[] = $this->n_is_number($k, $v);
            }
        }
       $aux = implode(',', $aux);
       return $k.':{'.$aux.'}'.PHP_EOL;
    }
    
}